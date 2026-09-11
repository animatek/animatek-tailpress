# Changelog

All notable changes to TailPress will be documented in this file.

## [Unreleased]

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
