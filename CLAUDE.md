# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Animatek WordPress theme (v5.0.0) for a Spanish-language music production education site (animatek.net). Built on **TailPress 5.0** framework with **Tailwind CSS v4** and **Vite**. Integrates with **Tutor LMS** for course management.

## Build Commands

```bash
npm run dev       # Vite dev server on port 3000 with HMR (origin: http://animatek.test)
npm run build     # Production build → dist/ with manifest
composer install  # PHP dependencies (TailPress framework)
```

No test suite or linter is configured.

## Architecture

### Asset Pipeline

- **Vite** (`vite.config.mjs`) compiles `resources/js/app.js`, `resources/css/app.css`, and `resources/css/editor-style.css` → `dist/` with content-hashed filenames
- `dist/.vite/manifest.json` maps source paths to built filenames
- Production base path: `/wp-content/themes/animatek-tailpress/dist/`
- TailPress framework enqueues assets at priority 10; a fallback in `functions.php` (`animatek_enqueue_assets`) reads the Vite manifest at priority 20 if TailPress hasn't already enqueued them

### CSS Structure (Tailwind v4)

- `resources/css/app.css` — Main entry: imports Tailwind, theme variables, utilities, and custom styles. Defines `@source` directives for JIT scanning and a custom `container` utility. Also sets base layer styles (body defaults, link colors, heading styles)
- `resources/css/theme.css` — `@theme` block: custom breakpoints (xs–2xl) and maps Tailwind color/typography tokens to WordPress CSS custom properties (`--wp--preset--*`)
- `resources/css/custom.css` — `.entry-content` and `.block-editor-block-list__layout` typography rules (headings, lists, links, figures)
- `resources/css/utilities.css` — WordPress alignment utilities (`container`, `alignfull`, `alignwide`, `alignnone`, `aligncenter`)
- `resources/css/editor-style.css` — Block editor styling
- `.btn-primary` and `.btn-secondary` classes are defined in `resources/css/app.css` (light) and `resources/css/dark.css` (dark mode overrides), used across page templates

### Tailwind Configuration

Pure Tailwind v4: no `tailwind.config.js`. Configuration lives in CSS:
- `@source` directives in `app.css` declare content paths for JIT scanning
- `@theme` block in `theme.css` defines design tokens (breakpoints, colors, fonts). `--color-primary` and `--color-accent` are read here; `bg-accent`/`text-accent`/`bg-primary` etc. are generated from these tokens.
- Brand color is unified to `#2C7FFF` (matching `theme.json`)

### PHP Structure

- **`functions.php`** — Theme setup via TailPress fluent API (`tailpress()`), Vite manifest fallback enqueue, `animatek_header_action_items()` / `animatek_account_url()` (cuenta y contacto del header), AJAX handler for `animatek_like`
- **`src/`** — PSR-4 autoloaded under `TailPress\` namespace:
  - `Pagination.php` — Custom numbered pagination with SVG prev/next icons
  - `Walkers/CommentWalker.php` — Custom comment HTML5 rendering
- **Page templates** (`page-*.php`) — 20+ custom landing pages. Many are content-heavy (1000+ lines of inline HTML with Tailwind classes). Named using WordPress convention `page-{slug}.php`
- **`template-parts/`** — Reusable blocks: `block-banner.php`, `block-faq.php`, `block-testimonios.php`, `block-explora.php`, `block-bitwig.php`, `block-developers.php`, `block-discografia.php`, `block-ultimos-posts.php`, `block-enrutador.php`, plus `content.php`/`content-single.php`
- **`block-enrutador.php`** — El recorrido "¿Por dónde empiezo?" (datos en `inc/animatek-empezar.php`). Vive en dos sitios: `/empezar/` (`contexto` `publico`, empuja al Lab, escribe el resultado en el hash) y dentro del VCV Rack Lab sustituyendo la sección 11 (`contexto` `lab`, `lab` `vcv`, salta a `#seccion-N` en vez de anunciar el Lab). Puede haber varios por página: el JS los inicializa por `[data-enrutador]`. **Las secciones del Lab llevan ancla `seccion-1`…`seccion-11`; la 12 es `#descargas` y no se renombra, que está enlazada desde fuera**
- **`tutor/`** — Tutor LMS template overrides: `dashboard.php`, `single-course.php`, `single/course/lead-info.php`

### Theme Configuration

- `theme.json` — WordPress block editor schema v3. Content width: 960px, wide: 1280px. Custom color palette (Primary, Secondary, Dark, Light) and font sizes (xs through 9xl)
- `composer.json` — Requires `tailpress/framework ^5.0.4`, autoloads `src/` as `TailPress\` namespace

### Release Workflow

GitHub Actions (`.github/workflows/release.yml`): On release → `composer install --no-dev` → `npm ci && npm run build` → zip (excluding files in `.distignore`) → publish to GitHub release.

## Key Conventions

- **Language:** UI strings are in Spanish with text domain `'animatek'` and `__()` / `esc_html_e()` calls
- **Menu IDs:** `primary-navigation` (nav de escritorio), `primary-menu-toggle` (hamburguesa), `mobile-nav` (overlay móvil a pantalla completa). El corte es `lg` (960px según `theme.css`): por debajo manda el overlay. Si cambia el breakpoint, hay que cambiarlo en los tres sitios — `header.php`, el `@media` de `.mobile-nav` en `app.css` y el `matchMedia` de `app.js`
- **Font:** Inter (weights 400, 500, 600, 700, 800) loaded from Google Fonts with handle `animatek-inter`
- **Mobile menu toggle:** handled by `resources/js/app.js` (`initPrimaryMenuToggle`). Uses `data-menu-bound` to prevent double-binding. Alterna `.is-open` en `#mobile-nav` y `.menu-open` en `<html>` (esta última es la que cambia la hamburguesa por el aspa)
- **El enrutador recuerda la elección** en `localStorage` (`animatek_camino`): quien contesta en `/empezar/` y luego entra al Lab ve su resultado, no las preguntas otra vez. Prioridad: hash > memoria > paso 1. Todo en `try/catch`, que en ventana privada revienta
- **Los vídeos del enrutador se abren dentro de la página**, con `youtube-nocookie`. Mandar a YouTube a quien acaba de decir qué necesita es regalar la visita, y desde el Lab es sacarlo de la guía que acaba de desbloquear
- **Cuenta y contacto no se pintan en el `<ul>`:** un filtro `wp_nav_menu_objects` los saca del menú y `animatek_header_action_items()` lee sus URLs para pintarlos como iconos a la derecha. Las URLs se siguen editando en Apariencia → Menús; si no hay ítem "Cuenta", `animatek_account_url()` cae al escritorio de Tutor
- **Button classes:** `.btn-primary` and `.btn-secondary` are defined as inline CSS in `header.php`, not as Tailwind utilities. Page templates use these classes extensively

## Despliegue

**No subas archivos sueltos por FTP.** El navegador ejecuta `dist/`, que está en
`.gitignore` y no viaja con los commits ni con las ramas: al mezclar PHP de una rama
con un `dist/` de otra salen estados a medias muy difíciles de diagnosticar.

El camino bueno es el release, que ya está montado en
`.github/workflows/release.yml` y hace `composer install` + `npm ci` + `npm run build`
antes de empaquetar:

```sh
# 1. subir la versión en style.css (Version: X.Y.Z)
# 2. commit y push a main
git tag vX.Y.Z && git push origin vX.Y.Z
gh release create vX.Y.Z --title "vX.Y.Z" --notes "…"
# 3. esperar al workflow
# 4. WordPress -> Escritorio -> Actualizaciones -> Comprobar de nuevo -> Actualizar
# 5. purgar LiteSpeed
# 6. purgar Cloudflare (APO): cachea el HTML aparte de LiteSpeed
```

**Cloudflare guarda su propia copia del HTML** (APO, `cf-cache-status: HIT`). Purgar solo
LiteSpeed no basta: el 2026-10-01 `/software/` llevaba **16 días** (`age: 1370581`) sirviendo
la versión sin la tarjeta de G1-Emu, aunque el tema estaba al día. Comprobarlo con
`curl -sI https://animatek.net/<ruta>/ | grep -i 'cf-cache-status\|^age'` y, si sale `HIT` con
una edad grande, purgar en Cloudflare (o desde su plugin en WordPress).

**El zip no se sube a mano.** `style.css` lleva las cabeceras de Git Updater
(`GitHub Theme URI: animatek/animatek-tailpress`, `Primary Branch: main`,
`Release Asset: true`), asi que publicar el release basta: el tema sale en el flujo
normal de actualizaciones de WordPress y se instala con un boton. `Release Asset` es
obligatorio porque el zip que genera GitHub por su cuenta no lleva `dist/`, que esta
en `.gitignore`; hay que usar el del workflow, que se llama `$repo-$tag.zip` por esa
misma convencion. El repo es publico: no hace falta token.

Si el aviso no aparece, es la cache de Git Updater, que guarda las respuestas de la
API de GitHub unas horas. Ajustes -> Git Updater -> Refresh Cache.

El plugin hermano `animatek-glosario` (repo aparte, fuera de este arbol) se despliega
igual, con `GitHub Plugin URI`. Cuando un cambio del tema depende de una funcion nueva
del plugin, **primero el plugin**: las plantillas las llaman con `function_exists()`,
asi que al reves no rompe nada, pero se queda a medias sin avisar.

**Convención de tags:** siempre `vX.Y.Z` (con la `v`). Los tags anteriores a `v5.1.0`
(`0.0.1` … `5.0.2`) usan el formato antiguo sin `v` y se quedan como están: son historia
ya publicada y renombrarlos rompería enlaces. Ojo: `1.0.0` y `v1.0.0` apuntan a commits
distintos, no son el mismo release.

**Higiene de ramas:** al mezclar una PR, borra la rama en local y en `origin`. `main` es
la única rama que sobrevive entre trabajos.

Comprobación de qué versión corre de verdad, sin depender de cachés ni de PHP: el
`style.css` servido es un archivo estático y lleva la cabecera `Version:` dentro.

```sh
curl -s https://animatek.net/wp-content/themes/animatek-tailpress/style.css | head -12
```

**Si aun así hace falta FTP** (un arreglo urgente de un solo archivo), acuérdate de que
`npm run build` está roto por un symlink de vite: se lanza con
`node node_modules/vite/bin/vite.js build`, y hay que subir `dist/` entero porque los
nombres llevan hash. `dist/.vite/manifest.json` empieza por punto y muchos clientes FTP
lo ocultan.

## El changelog común de CODE

Además del `CHANGELOG.md` de este repo, **todo cambio relevante se apunta también en
`/mnt/SPEED/CODE/CHANGELOG.md`**: el registro común de los siete proyectos, y lo que enseña la
página `Cambios` del panel. Sin esa línea el cambio no existe fuera de este repo — que es justo
lo que pasaba antes del 2026-09-10, cuando el panel solo leía el changelog de `Animatek.net`.

Ahí va el resumen: qué cambió, la verificación real, el agente, y el commit o la ruta del
changelog de este repo. El detalle técnico se queda aquí y no se duplica.

- Es un **enlace simbólico** a la nota de Obsidian `00 - Sistema/CHANGELOG - CODE.md`. Se edita
  el destino: nunca se sustituye por un archivo suelto ni se crea una segunda copia. Si no está
  disponible, se dice y se para; no se inventa otro sitio.
- Bajo la fecha local (Europe/Madrid), lo más reciente arriba y una sección por proyecto.
  Releer el bloque del día antes de escribir y tocar solo lo propio: ahí escriben varios agentes.
- Un cambio sin commitear se marca explícitamente como **cambio local, sin commit**.
- El panel lo recoge en la ingesta de cada mañana. Para verlo ya:
  `Animatek.net/panel/ingesta/actualizar.sh`.
- **No lo leas entero para escribir en él.** Crece unos 13 KB al día y está partido por meses:
  el mes en curso en la nota y los cerrados en `CHANGELOG - CODE/AAAA-MM.md`, al lado. Para
  consultarlo hay `cambios` — `cambios buscar "morph"`, `cambios de NME`, `cambios ver
  2026-09-10` —, que pregunta a la base y devuelve la entrada, no el archivo.
