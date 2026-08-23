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

- **`functions.php`** — Theme setup via TailPress fluent API (`tailpress()`), Vite manifest fallback enqueue, "Cuenta" menu item → account icon replacement, "Contacto" menu item → email icon replacement (in `header.php`), AJAX handler for `animatek_like`
- **`src/`** — PSR-4 autoloaded under `TailPress\` namespace:
  - `Pagination.php` — Custom numbered pagination with SVG prev/next icons
  - `Walkers/CommentWalker.php` — Custom comment HTML5 rendering
- **Page templates** (`page-*.php`) — 20+ custom landing pages. Many are content-heavy (1000+ lines of inline HTML with Tailwind classes). Named using WordPress convention `page-{slug}.php`
- **`template-parts/`** — Reusable blocks: `block-banner.php`, `block-faq.php`, `block-testimonios.php`, `block-explora.php`, `block-bitwig.php`, `block-developers.php`, `block-discografia.php`, plus `content.php`/`content-single.php`
- **`tutor/`** — Tutor LMS template overrides: `dashboard.php`, `single-course.php`, `single/course/lead-info.php`

### Theme Configuration

- `theme.json` — WordPress block editor schema v3. Content width: 960px, wide: 1280px. Custom color palette (Primary, Secondary, Dark, Light) and font sizes (xs through 9xl)
- `composer.json` — Requires `tailpress/framework ^5.0.4`, autoloads `src/` as `TailPress\` namespace

### Release Workflow

GitHub Actions (`.github/workflows/release.yml`): On release → `composer install --no-dev` → `npm ci && npm run build` → zip (excluding files in `.distignore`) → publish to GitHub release.

## Key Conventions

- **Language:** UI strings are in Spanish with text domain `'animatek'` and `__()` / `esc_html_e()` calls
- **Menu IDs:** `primary-navigation` (nav element), `primary-menu-toggle` (hamburger button). Mobile breakpoint at `md` (782px per `theme.css`)
- **Font:** Inter (weights 400, 500, 600, 700, 800) loaded from Google Fonts with handle `animatek-inter`
- **Mobile menu toggle:** handled by `resources/js/app.js` (`initPrimaryMenuToggle`). Uses `data-menu-bound` to prevent double-binding
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
# 3. esperar al workflow y descargar el zip del release
# 4. WordPress -> Apariencia -> Temas -> Añadir -> Subir tema -> reemplazar
# 5. purgar LiteSpeed
```

Comprobación de que la subida entró, sin depender de cachés ni de PHP:
`https://animatek.net/wp-content/themes/animatek-tailpress/screenshot.png`

**Si aun así hace falta FTP** (un arreglo urgente de un solo archivo), acuérdate de que
`npm run build` está roto por un symlink de vite: se lanza con
`node node_modules/vite/bin/vite.js build`, y hay que subir `dist/` entero porque los
nombres llevan hash. `dist/.vite/manifest.json` empieza por punto y muchos clientes FTP
lo ocultan.
