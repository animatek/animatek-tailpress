# Changelog

All notable changes to TailPress will be documented in this file.

## [Sin publicar] - 2026-11-12

### Añadido — Claude
- **`/atek303/words/<id>.json` redirige a GitHub Pages** (`animatek_atek303_words_redirect()`, 302 con
  `Access-Control-Allow-Origin: *`): los firmwares del ATEK303 llevan grabada esa URL para el lector de pantalla
  del FM-1 (fm1-reader), que la pide desde el navegador en modo CORS y daba 404. Los ficheros viven en `gh-pages` de
  `animatek/FM1-Animatek` (`atek303/words/`). Probado en local (`:8081`): 302 con CORS y nombres no válidos a 404.
  Issue `animatek/FM1-Animatek#1`.

## [5.9.4] - 2026-11-07

### Añadido — Claude
- **FM-1 en inglés: `/fm1-eng/` y `/atek303-fm1-eng/`**, páginas virtuales como las de G1-Emu (sin entrada en la base
  de datos; `animatek_render_virtual_fm1_eng_pages()`), con `lang="en"`, SEO propio con alternates es/en en las
  cuatro páginas, entrada en el sitemap de software y botón ES / EN. La plantilla (`inc/animatek-fm1-template.php`)
  pasa a llevar el texto en los dos idiomas (`animatek_atek303_fm1_copy()`). La tarjeta de Software en inglés
  enlaza a la versión inglesa y dice «1.1».
- **Iconos en vez de botones**, al estilo de The Firmware Hub: cuadro oscuro con raya de color arriba y el icono
  (tocar en el navegador, descargar, Firmware Hub, cheat sheet, novedades, código), con su nombre debajo.
- **Imágenes nuevas**: la imagen grande es ahora la versión del navegador con COSMIC TRAX sonando
  (`atek303-fm1-web.png/.webp`; también en la imagen para redes, `atek303-fm1-og.png`), y la galería pasa a nueve
  pantallas sacadas del simulador con los presets de fábrica: VCF sonando con la batería, DELAY, editor, lista de
  presets con NEXT, SAVE, OVERWRITE?, OPTIONS, ajuste fino y el tema AMBER. Revisado en local.

## [5.9.3] - 2026-11-07

### Cambiado — Claude
- **/atek303-fm1/ con la 1.1 publicada** (`inc/animatek-fm1-template.php`). Fuera el aviso «todavía no se puede
  descargar»: botones «Descargar la 1.1 (.fwsc)» (la release de GitHub), «Tócalo en el navegador» (GitHub Pages del
  repo) y «The Firmware Hub», y enlaces a las notas de la versión y a la cheat sheet. La versión vive en
  `ATEK303_FM1_VERSION` y los enlaces en `animatek_atek303_fm1_links()`. Manual al día: 64 pasos, editor por
  páginas, 12 presets de fábrica, pantalla de guardar, OPTIONS (OCT− + HOME), MIDI de salida, limitador, reloj
  externo e instalación probada. La tarjeta de /fm1/ pasa de «En pruebas» a «Versión 1.1». Revisado en local.

## [5.9.2] - 2026-11-06

### Cambiado — Claude
- **Software: NME destacada y las tarjetas en orden** (2026-11-06, `inc/animatek-software-hub.php`). Orden nuevo:
  NME, G1-Emu, VCV Rack, FM-1 y UZZ. NME ocupa dos columnas y dos filas (`'featured' => true`) con la captura de la
  0.26 (`ANME-26.webp`) y las otras cuatro van a su lado en 2x2, sin la quinta tarjeta suelta. Los textos de NME
  dejan de decir solo «Patreon»: «Beta · 19 € · Open Source» y «App de escritorio · Beta · 19 € o Patreon», y la
  sección de NME de más abajo gana el botón «Comprar · 19 €» (directo al pago). Revisado en local, escritorio y móvil.

## [5.9.1] - 2026-11-06

### Añadido — Claude
- **Botón «Código en GitHub» en `/fm1/` y `/atek303-fm1/`** (`inc/animatek-fm1-template.php`): el repo de los
  firmwares ya es público, `animatek/FM1-Animatek` (GPL-3.0). En `/fm1/` lleva a la raíz del repo y en el ATEK303 a
  su carpeta `atek303/`. La URL sale de `animatek_fm1_repo_url()`. El aviso «Todavía no se puede descargar» se
  queda: el código está, el firmware compilado no se publica hasta probarlo en un FM-1 real.

## [5.9.0] - 2026-11-06

### Añadido — Claude
- **Ficha de producto de SureCart y botón de compra de NME** (2026-11-06). Plantilla nueva
  `single-sc_product.php`: las fichas de `/products/...` dejan de pasar por `single.php` (tarjeta de entrada
  con fecha, «min de lectura» y autor, y el bloque de SureCart encajado en 720 px, con la imagen montada sobre el
  título y el texto oscuro del tema claro de SureCart sobre el fondo oscuro). Ahora: migas a la Tienda, ancho
  completo, colores de Animatek (botón principal azul, el secundario en contorno), tarjetas relacionadas oscuras
  y, si el producto no tiene foto, un recuadro oscuro en vez del marcador gris. Estilos acotados a
  `.animatek-producto`, sin tocar el checkout. En `/animatek-nme/` y `/animatek-nme-eng/`
  (`inc/animatek-nme-template.php`): botón **Comprar ya · 19 €** (azul, directo al pago de SureCart) delante
  de Patreon en la cabecera y en la llamada final, nota de pago único con enlace a la ficha, y los textos que
  decían que las builds eran solo de Patreon. Revisado en local, escritorio y móvil.
  **La tienda (`/tienda/`) también tiene plantilla**, `page-tienda.php`: cabecera propia y el listado a todo el
  ancho, fuera de la tarjeta de página. Los estilos de SureCart pasan a `inc/animatek-surecart.php`
  (`animatek_surecart_estilos()`, acotados a `.animatek-tienda`), compartidos por la tienda y las fichas: tarjetas
  de producto de alto fijo (imagen 4:3 y título a dos líneas) y, sin imagen, un degradado azul.
- **Firmwares para el M-VAVE FM-1** (2026-11-06). Página índice `/fm1/` (`page-fm1.php`), pensada para que entren
  los firmwares que vengan, y página del **ATEK303 para FM-1** `/atek303-fm1/` (`page-atek303-fm1.php`) con su
  manual: botones, las ocho páginas, secuenciador, editor de pasos, presets, MIDI, instalación, créditos y el aviso
  de firmware no oficial. Las dos se pintan desde `inc/animatek-fm1-template.php` y usan capturas del simulador y
  del emulador (`images/atek303-fm1-*.png`). Tarjeta «Firmwares FM-1» en el hub de software
  (`inc/animatek-software-hub.php`). **No hay descarga:** la página dice que se publicará cuando esté probado en un
  FM-1 real. Solo en español (la versión inglesa del hub enlaza a la página en español). Creadas y revisadas en el
  WordPress local (`localhost:8081`); en producción hay que crear las páginas con esos slugs al publicar el tema.
- **FM-1: tarjeta directa al ATEK303, heros compactos y SEO** (2026-11-06). La tarjeta de Software se llama
  «ATEK303 para FM-1» y va a `/atek303-fm1/`: mientras haya un solo firmware, `/fm1/` existe pero no se enlaza.
  Los dos heros son más bajos, sin el enlace «← Software» / «← Firmwares», y llevan a la derecha la captura del
  emulador del FM-1 con el ATEK303 sonando (`images/atek303-fm1-vst.{webp,png}`, sacada con `fm1-live --shot`);
  en `/fm1/` las tarjetas suben. Contextos SEO de las dos páginas en `animatek_software_seo_context()` (título,
  descripción, canonical, imagen social `images/atek303-fm1-og.png` de 1200×630, CollectionPage para `/fm1/` y
  SoftwareApplication sin offers para el ATEK303, que aún no se descarga).

## [5.8.0] - 2026-10-21

### Añadido — Claude
- **Lista de correo «Nord Modular» en G1-Emu y Animatek NME** (`template-parts/brevo-form-g1.php`,
  usado desde `inc/animatek-g1-emu-template.php` y `inc/animatek-nme-template.php`, en
  español e inglés). Formulario de la lista 23 de Brevo con el aspecto del tema: título, una frase y un
  campo de email con botón, en la columna derecha del hero, debajo de la imagen del producto, para que
  se vea al entrar y el hero no crezca (argumento `compact`). Usa el JS de Brevo
  (`main.js`), que necesita los contenedores `.form__label-row` y `.entry__field`: sin ellos el
  formulario se enviaba de forma nativa en vez de por AJAX. A diferencia del de Bitwig, no
  fuerza `display:none` sobre los avisos de éxito y error de Brevo, así que quien se apunta ve
  la confirmación. Las páginas `-eng` llevan el mismo formulario con los textos en inglés
  (argumento `locale`); el envío va al mismo formulario de Brevo, que es el español, así que los
  errores que devuelva su servidor saldrían en español.
  **Cambio local, sin commit; probado en localhost:8081, pendiente de producción.**

- **Imagen de G1-Emu: la del README del repo** (`images/g1-emu.png`, hero de `/g1-emu/` y
  `/g1-emu-eng/`, tarjeta de `/software/` y metadatos sociales de `functions.php`). Sustituye a una
  captura antigua del panel (1202×470) por `docs/g1-emu-panel.png` de `animatek/G1-Emu`,
  reducida a 1600×660 y cuantizada a 256 colores (258 KB frente a los 730 KB del original).
  Mismo nombre de archivo para que los tres usos cambien a la vez; `width`/`height` del hero
  puestos a 1600×660. **Cambio local, sin commit.**

## [5.7.4] - 2026-10-13

### Cambiado — Claude
- **Clases privadas: precios a la baja** (`page-clases-privadas.php`). El pack de 5 horas pasa
  de 300 € a 150 € tachando 200 €, con la etiqueta «5 plazas» y la nota «precio especial para
  los 5 primeros alumnos; después, 200 €». La mentoría de 10 horas pasa de 550 € (tachado 600)
  a 350 € (tachado 400, «Ahorras 50 €»). La hora suelta sigue a 60 €. A 300 € no entraba nadie.
  **El cobro va por SureCart:** los enlaces conservan los mismos `price_id`; Javier actualizó allí
  los tres importes antes de publicar este release, para que la ficha y el pago coincidan.
- **Clases privadas: la página dice quién enseña.** El H1 pasa de «Clases y asesoramiento
  personalizado» a «Clases de Bitwig y VCV Rack con un formador certificado», y el subtítulo
  nombra a Javier Melgar, la certificación de Bitwig, el español y lo online. El logo de Bitwig
  Certified Trainer deja de ir al 70 % de opacidad. Dos preguntas nuevas en las FAQ (quién da
  las clases; idioma y desde dónde). Datos estructurados `Person` (con la credencial de Bitwig)
  y `Service` (con tres ofertas) en `wp_head`: en producción la página no tenía ninguno. Los
  precios pasan a `$clases_precios`, arriba del archivo, y de ahí los leen las tarjetas y el
  schema. Motivo: el último alumno llegó preguntando a ChatGPT por profesores de Bitwig.
  Comprobado en local (`:8081`): el JSON-LD se lee bien y sin errores de PHP.

### Añadido — Claude
- **Software: los módulos de VCV de Animatek 2.5.9.** Tarjetas para ATEK303, ATEK303 SEQ, CAP,
  BUS, ADSRTEK y FILTERTEK, con imágenes de sus paneles en `images/vcv/` (capturas de Rack con el
  mismo degradado y marco que las demás) y textos en español e inglés. Como aún no tienen página
  propia (`'page' => false`), la tarjeta y el menú «Más módulos» enlazan a su manual en GitHub,
  en castellano o en inglés según el idioma (`animatek_vcv_module_url()`).
- Todas las tarjetas con manual en GitHub llevan además un enlace «Manual», y las páginas de
  módulo en español enlazan al manual en castellano (`manual_url_es`). UZZ, APC40 CTRL y BLANK 3
  apuntaban a la raíz del repo y ahora van a su manual.
- Orden de las tarjetas: secuenciadores y voz, cadena de audio, puentes MIDI y panel ciego.

## [5.7.3] - 2026-10-01

### Cambiado — Claude
- **Taller online** (`/taller-sintetizador-modular/`): deja de ser el taller de VCV Rack
  del 27 y 29 de octubre (25 €, nadie apuntado) y pasa a ser un taller de Bitwig, desde
  el 15 de noviembre, muestra en directo del curso «Bitwig desde dentro». Mientras no
  haya horario ni precio no vende: lista de espera con el formulario de Brevo de la lista
  de Bitwig (`template-parts/brevo-form-bitwig.php`, el mismo de la página del curso). El
  slug no cambia porque lo enlazan quince vídeos.
- **G1-Emu**: sección «Así suena» con el Sound Demo 01 (`youtube-nocookie`) y mención del
  VST3 en beta, que por ahora hay que compilar.

### Corregido — Claude
- Las páginas `-eng` (G1-Emu, NME, Software) salían con `og:locale` `es_ES` y el WebPage
  del schema de Rank Math con `inLanguage` `es`. Ahora toman el idioma del contexto SEO.

## [5.7.2] - 2026-09-30

### Añadido — Codex
- Página inglesa `/g1-emu-eng/` con traducción completa de la landing y
  selector ES/EN. Plantilla compartida y botón de apoyo en Patreon en ambos idiomas.
- Software EN y navegación enlazan a G1-Emu y NME en inglés. Metadatos por idioma,
  canonical, hreflang, atributo HTML lang y ruta inglesa en el sitemap.
- Verificado: build Vite, sintaxis PHP, HTTP 200 en ambas rutas, idiomas y
  metadatos, enlaces del selector, sitemap y revisión visual de la página inglesa.

## [5.7.1] - 2026-09-30

### Cambiado — Codex
- Software (ES/EN) y navegación compartida: orden G1-Emu, Animatek NME,
  VCV Rack y Max for Live.
- Botón «Apoyar en Patreon» en la cabecera de G1-Emu, con el enlace y estilo
  rojo de NME; conserva los accesos a descargas y repositorio.
- Verificación: compilación Vite, sintaxis PHP de las tres plantillas,
  orden de tarjetas y destino del botón comprobados en WordPress local.

## [5.7.0] - 2026-09-30

### Añadido — Codex
- Nueva landing `/g1-emu/`, con el estilo de NME,
  captura del panel, funciones, requisitos de ROM, primeros pasos, estado pre-alpha
  y enlaces al repositorio, descargas, documentación y colaboración en GitHub.
- Acceso desde Software (ES/EN) y la navegación compartida. Ruta virtual sin alta
  en WordPress, plantilla seleccionable, SEO y sitemap. Captura incluida en `images/`
  para que forme parte del ZIP del tema (`resources/` se excluye de los releases).
- Verificación: build Vite, sintaxis PHP de los cinco archivos afectados, HTTP 200,
  metadatos y JSON-LD, captura cargada y revisión visual de escritorio y móvil.
- Distribución mediante el release del tema; la instalación en producción se realiza
  desde las actualizaciones de WordPress.

## [5.6.0] - 2026-09-15

### Added
- **Header actions**: account and contact links now render as icon buttons in their own
  group on the right (`.header-actions`), outside the menu list. The account icon is
  session-aware: user outline when logged out, initial on a brand-colour disc when logged in.
- **Full-screen mobile menu** (`#mobile-nav`): a dedicated overlay with large type and its
  own account/contact buttons, instead of shrinking the desktop `<ul>` under the header.

- **`/empezar/`**: a two-question path that returns a hand-picked list instead of filtering
  the catalogue — 13 endings, 55 videos taken from the channel's real catalogue, with the
  free stuff (Labs, glossary) ahead of the paid courses. Data in `inc/animatek-empezar.php`;
  courses are named by key and read from `animatek_cursos()`, so prices are never duplicated.
  Panels are server-rendered and the JS only shows and hides, so results are crawlable and
  individually linkable (`/empezar/#res-r_techno`). Needs a page with slug `empezar`.
- The Labs lead every result they fit (12 of 13) with per-result text naming the chapter that
  answers that question, and the card states up front that the guide opens with an email —
  they are the only piece of the page that adds a contact to Brevo.
- The router moved into `template-parts/block-enrutador.php` and now also runs inside the VCV
  Rack Lab, replacing section 11's flat list of six tutorials. Inside the Lab it does not
  advertise the Lab: it jumps to the chapter that answers the question (`#seccion-N`), so the
  12 sections gained anchors.
- Router videos play inline via `youtube-nocookie` instead of linking out to YouTube.
- The router remembers the chosen path in `localStorage`, so someone who answered on
  `/empezar/` and then unlocks the Lab lands on their result instead of being asked the same
  two questions again. A hash link still wins over the remembered path.
- The Lab's UZZ card points at `/cursos/curso-uzz/` instead of the YouTube playlist, keeps its
  artwork, drops the play button and reads its title, badge, meta and CTA from
  `animatek_cursos()`. The free UZZ course also leads the "camino ordenado" block in five
  router results, with free courses marked in green.

### Removed
- The Lab's large UZZ card: the course already shows up as a small card inside the router's
  result, where it appears only when it is relevant. Section 11 is now heading, one line and
  the router. UZZ's `gancho` becomes "16 lecciones, sin tarjeta" — "free" already comes
  through the badge.
- `playYoutubeVideo()` from the VCV Rack Lab: section 11's six videos are the router now, and
  the UZZ card no longer plays anything.

- **Latest posts strip** (`template-parts/block-ultimos-posts.php`) under the home hero:
  eight most recent posts, thumbnail, title and date, no autoplay.

### Changed
- The primary nav switches to the overlay below `lg` (960 px, per `theme.css`) instead of
  `md` (782 px): seven items plus the logo and the action icons no longer fit on a tablet.
- `header.php` no longer renders the "Cuenta" and "Contacto" menu items in the list;
  `wp_nav_menu_objects` filters them out and `animatek_header_action_items()` reads their
  URLs from the menu, with a fallback to the Tutor dashboard when there is no "Cuenta" item.
- New `.icon-btn` and `.mobile-nav` styles live in `@layer components` in `app.css`; being
  unlayered would have beaten Tailwind utilities such as `lg:hidden`.

### Fixed
- `/empezar/` now listens for `hashchange`: moving from `#res-a` to `#res-b` does not reload
  the page, so a second result link in the same YouTube description did nothing when clicked.
- The overlay's top gap is measured from the header (or the WordPress admin bar, whichever
  sits lower) when it opens, instead of a fixed `6rem` padding that hid the first menu item
  behind the admin bar — which is 46 px on mobile, not 32.

### Removed
- The `walker_nav_menu_start_el` filter that swapped the "Cuenta" title for an icon, and the
  inline `nav_menu_item_title` filter in `header.php` that did the same for "Contacto".

## [5.1.0] - 2026-04-16

### Added
- **Hero Editorial B1**: New header structure for posts with image on the left and metadata on the right.
- **Post Navigation**: Smooth post-to-post navigation aligned with content column.
- **Pill Chips**: Styled tags and categories with "pill" format and micro-interactions.
- **Blog Redesign**: Complete overhaul of the post layout for better visual hierarchy.

### Fixed
- Padding and gap classes in hero metadata columns.
- Alignment issues in editorial components.

## [5.0.0] - 2025-10-24

- Major update to default styling and template files
- Vite as default compiler ([docs](https://tailpress.io/docs/5.0/vite))
- Use composer autoloading
- Use `tailpress/framework` package for theme setup
- Improvement default comments styling
- Adding `Pagination` class
- Search bar in header
- Create a ZIP-version of your theme ([docs](https://tailpress.io/docs/5.0/release#using-tailpress-cli))

## 4.0.1

- Update npm dependencies by @jeffreyvr in #269

## 4.0.0

- Adding Tailwind CSS v4 support by @jeffreyvr in #254
- Add support for responsive embeds by @brendannee in #217

## 3.4.0

- Use `mix.options({ manifest: false })` instead of deprecated `Mix.manifest.refresh = _ => void 0`

## 3.3.0

- Update to Tailwind 3.3.0
- Laravel Mix is now the default compiler (with the TailPress installer (^v2.0.0), use `compiler="esbuild"` if you want to keep using esbuild)

## 3.2.0

- Update to Tailwind 3.2.0

## 3.1.0
- Tailwind font sizes are now set as defined in `theme.json`.
- Breakpoints now based on WordPress defaults (https://developer.wordpress.org/block-editor/reference-guides/packages/packages-viewport/#usage).
- Providing `w-content`, `max-w-content`, `w-wide` and `max-w-wide` utility classes.
- Content width is now actually the width as defined in `theme.json`.
- Fixing align wide, width as defined in `theme.json`.
- Updating Tailwind CSS to version 3.1.0.
- Fix issues package.json scripts on Windows.

## 3.0.0 - 2021-12-14

- Updating Tailwind to 3.0.0.

### TailPress installer

- The TailPress installer (^0.2.0) now allows you to use Laravel Mix instead of esbuild by setting --compiler=mix.
- You may now also set dbname, dbuser, dbpass and dbhost.

## 2.0.0 - 2021-09-03

- Switching to Tailwind CLI and esbuild instead of LaraveL Mix.
- Removing `theme` subdirectory setup as it is no longer needed with the new build setup.
- Removing `TailPress` class and it's functions (`tailpress()->get_header()` etc.) throughout the theme.
- New `tailpress_asset` function to get the URL of an asset (previously `tailpress_mix`).
- `tailpress_asset` function thaty appends a `time` parameter if [wp_get_environment_type()](https://developer.wordpress.org/reference/functions/wp_get_environment_type/) does not return `production` for cache busting (instead of the previously used versioned assets through `mix-manifest.json`).
- Update screenshot.png.
- Remove `block-editor.css`, only use `editor-style.css`.
- Moving `editor-style.css` from root to `css` directory.
- Update readme.

## 1.0.0 - 2021-08-25

- Replace `tailpress.json` with `theme.json` as used by WordPress core.
- Move template files into `theme` subdirectory.
- Move tailwind plugin to a [separate repository](https://github.com/jeffreyvr/tailwindcss-tailpress).
- Update readme and adding section on using installer.

## 0.1.0 - 2021-06-17

- No longer depending on jQuery.
- Fixes text color classes for the Block Editor.
- Use safelist.txt to prevent WP classes from being purged.
- Readme changes.
- MIT License.

## 0.0.9 - 2021-04-05

- Updating to Tailwind CSS v2.1 which includes the JIT engine in core among other things.

## 0.0.8 - 2021-03-23

- Using TailwindCSS JIT for way faster compiling.
- Updated readme.
- Fix loading styling in block editor.
- Check if mix-manifest.json file exists to prevent warning message.

## 0.0.7 - 2021-02-15

- Adding the option to apply submenu_class to the wp_nav_menu args.
- Adding the option to apply classes on li_class and submenu_class on specific depths, like: li_class_0.

### 0.0.6 - 2021-02-08

- Fixes issue on Windows.

## 0.0.5 - 2020-12-24

- Set selectors on single line since this seems to cause issues (nested CSS) with production build (#241a612).

## 0.0.4 - 2020-12-23

- Add nested CSS support for PostCSS.
- Minor readme changes.

## 0.0.3 - 2020-12-22

- Update Laravel Mix from version 5^ to 6^.
- Removing Laravel Mix Tailwind, defining plugins within webpack.mix.js instead.
- Switching from Sass to PostCSS for faster compiling.
- Moved TailPress colors and font size settings to tailpress.json file.
- Use tailpress.json to populate editor-color-palette and editor-font-sizes theme support automatically.
- New screenshot.
- Update readme.
- Other minor fixes and improvements.

## 0.0.2 - 2020-11-24

- Adding basic support for the block editor Gutenberg by generating alignment, font size and color classes.
Contains four theme colors out of the box, being primary, secondary, dark and light. This is adjustable of course.
- Loading a editor-style.css.
- Removing double slashes on resulting manifest asset URLs.
- Modified template files to have a better starting point (including horizontal main navigation, footer always at the bottom for short pages).
- Added a basic 404 page template.

## 0.0.1 - 2020-11-19

- Init release.
