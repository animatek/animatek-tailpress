<?php

get_header();

$glosario = require __DIR__ . '/inc/glosario-data.php';
$categories = $glosario['categories'];
// Los terminos salen del plugin Animatek Glosario (editables desde el admin y con
// ficha propia). Si el plugin no esta activo, se sigue usando el array de siempre.
$terms      = function_exists('agl_terminos') ? agl_terminos() : $glosario['terms'];
$icons      = $glosario['icons'];
$icon_map   = $glosario['icon_map'];
$cat_icons  = $glosario['cat_icons'];

usort($terms, fn($a, $b) => strcasecmp($a['term'], $b['term']));

/** Inicial para agrupar. Lo que no empieza por letra cae en el grupo '#'. */
function glosario_letra(string $termino): string
{
    $inicial = strtoupper(mb_substr(remove_accents($termino), 0, 1));
    return preg_match('/[A-Z]/', $inicial) ? $inicial : '#';
}

/** Ancla valida para el enlace del indice: '#' no vale dentro de un href. */
function glosario_ancla(string $letra): string
{
    return $letra === '#' ? 'letter-num' : 'letter-' . $letra;
}

$grouped = [];
foreach ($terms as $t) {
    $grouped[glosario_letra($t['term'])][] = $t;
}
ksort($grouped);
// El grupo '#' va primero, como en cualquier glosario.
$alphabet = array_merge(['#'], range('A', 'Z'));

function glosario_icon(string $slug, string $category, array $icons, array $icon_map, array $cat_icons): string
{
    $key = $icon_map[$slug] ?? $cat_icons[$category] ?? 'sine';
    return $icons[$key] ?? $icons['sine'];
}
?>

<main id="primary" class="bg-slate-950 text-slate-50">

    <!-- Hero -->
    <section class="relative overflow-hidden px-6 sm:px-10 py-16 sm:py-20 text-center">
        <div class="absolute inset-0 bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950"></div>
        <div class="absolute top-0 right-0 -mr-40 -mt-40 w-[600px] h-[600px] bg-primary/15 rounded-full blur-[120px]">
        </div>
        <div
            class="absolute bottom-0 left-0 -ml-40 -mb-40 w-[500px] h-[500px] bg-emerald-500/10 rounded-full blur-[100px]">
        </div>

        <div class="relative z-10 max-w-4xl mx-auto space-y-5">
            <span
                class="inline-flex items-center gap-2 px-4 py-2 text-xs font-bold tracking-[0.2em] uppercase border border-white/20 rounded-full bg-white/10 text-white shadow-sm backdrop-blur-sm">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                </svg>
                Referencia
            </span>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight text-white">
                Glosario de Producción Musical
            </h1>
            <p class="text-lg sm:text-xl text-slate-300 leading-relaxed max-w-3xl mx-auto">
                Términos esenciales de síntesis, mezcla, audio digital, VCV Rack y Bitwig Studio. Tu referencia rápida
                para entender el lenguaje de la producción.
            </p>
            <?php // El bloque del Lab que hay al final de la pagina queda a 135 tarjetas de
                  // scroll: casi nadie llega. Aqui va el mismo enlace en discreto, para que
                  // se vea sin robarle el sitio al buscador. ?>
            <p class="text-sm text-slate-400">
                ¿Prefieres verlos sonando?
                <a href="<?php echo esc_url(home_url('/vcvrack-lab/')); ?>"
                    class="block sm:inline font-semibold text-primary underline decoration-primary/40 underline-offset-4 hover:decoration-primary transition-colors">
                    Entra gratis en el VCV Rack Lab
                </a>
            </p>
        </div>
    </section>

    <!-- Search + Filters -->
    <section class="max-w-5xl mx-auto px-6 -mt-6 relative z-10">
        <!-- Search bar + theme toggle -->
        <div class="flex gap-3 mb-6">
            <div class="relative flex-1">
                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-500 pointer-events-none"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8" />
                    <path stroke-linecap="round" d="m21 21-4.35-4.35" />
                </svg>
                <input type="text" id="glosario-search" placeholder="Buscar término..."
                    class="glosario-input w-full pl-12 pr-4 py-3.5 bg-slate-900 border border-slate-700 rounded-xl text-slate-100 placeholder-slate-500 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-base">
            </div>
            <button type="button" id="glosario-theme-toggle"
                class="glosario-theme-btn shrink-0 w-12 h-12 flex items-center justify-center rounded-xl border border-slate-700 bg-slate-900 text-slate-400 hover:text-white hover:border-slate-600 transition-colors"
                aria-label="Cambiar tema claro/oscuro" title="Modo día / noche">
                <!-- Moon icon (shown in dark mode) -->
                <svg class="glosario-icon-moon w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                </svg>
                <!-- Sun icon (shown in light mode) -->
                <svg class="glosario-icon-sun w-5 h-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                </svg>
            </button>
        </div>

        <!-- Category pills -->
        <div class="flex flex-wrap gap-2 mb-8" id="glosario-categories">
            <button data-category="all"
                class="glosario-pill active px-4 py-2 rounded-full text-sm font-semibold border transition-colors">
                Todos
            </button>
            <?php foreach ($categories as $key => $cat): ?>
            <button data-category="<?php echo esc_attr($key); ?>"
                class="glosario-pill px-4 py-2 rounded-full text-sm font-semibold border transition-colors">
                <?php echo esc_html($cat['label']); ?>
            </button>
            <?php
endforeach; ?>
        </div>
    </section>

    <!-- Alphabet bar -->
    <div class="sticky top-0 z-20 bg-slate-950/95 backdrop-blur border-b border-slate-800" id="glosario-alphabet">
        <div class="max-w-5xl mx-auto px-6 py-2 flex flex-wrap justify-center gap-1">
            <?php foreach ($alphabet as $letter): ?>
            <a href="#<?php echo glosario_ancla($letter); ?>"
                class="glosario-letter w-8 h-8 flex items-center justify-center rounded text-sm font-bold transition-colors <?php echo isset($grouped[$letter]) ? 'text-slate-300 hover:text-white hover:bg-slate-800' : 'text-slate-700 pointer-events-none'; ?>"
                <?php if (!isset($grouped[$letter])): ?>aria-disabled="true"
                <?php
    endif; ?>
                >
                <?php echo $letter; ?>
            </a>
            <?php
endforeach; ?>
        </div>
    </div>

    <!-- Term cards -->
    <section class="max-w-6xl mx-auto px-6 py-10">
        <div class="flex flex-col lg:flex-row lg:items-start gap-6">

        <?php // El formulario acompana todo el scroll del listado en vez de esperar al
              // final: con 135 tarjetas por delante, ahi abajo no llegaba nadie. ?>
        <aside id="glosario-lab-aside" class="lg:w-64 lg:shrink-0 lg:sticky lg:top-16">
            <?php get_template_part('template-parts/glosario-lab-form'); ?>
        </aside>

        <div id="glosario-list" class="min-w-0 flex-1">
        <?php foreach ($alphabet as $letter): ?>
        <?php if (isset($grouped[$letter])): ?>
        <div class="glosario-group mb-8" data-letter="<?php echo $letter; ?>">
            <h2 id="<?php echo glosario_ancla($letter); ?>"
                class="text-xl font-extrabold text-primary mb-4 scroll-mt-16 tracking-wide">
                <?php echo $letter; ?>
            </h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-3">
                <?php foreach ($grouped[$letter] as $t):
            $cat = $categories[$t['category']];
            $svg_inner = glosario_icon($t['slug'], $t['category'], $icons, $icon_map, $cat_icons);
            // La tarjeta lleva a la ficha del termino. Sin el plugin activo no hay
            // ficha a la que ir, asi que se pinta igual pero sin enlazar.
            $ficha = isset($t['url']) ? $t['url'] : '';
            $tag   = $ficha ? 'a' : 'div';
?>
                <<?php echo $tag; ?> <?php if ($ficha): ?>href="<?php echo esc_url($ficha); ?>"
                    <?php
        endif; ?>class="glosario-term glosario-card group flex flex-col items-center text-center gap-2.5 p-4 sm:p-5 rounded-2xl border border-slate-800 bg-slate-900/60<?php echo $ficha ? ' hover:bg-slate-800/80 hover:border-slate-600 transition-all duration-200 hover:-translate-y-1 hover:shadow-lg hover:shadow-primary/5' : ''; ?>"
                    data-category="<?php echo esc_attr($t['category']); ?>"
                    data-term="<?php echo esc_attr($t['term']); ?>"
                    data-definition="<?php echo esc_attr($t['definition']); ?>">
                    <div
                        class="glosario-icon w-12 h-12 rounded-xl <?php echo esc_attr($cat['bg']); ?> flex items-center justify-center transition-transform duration-200 group-hover:scale-110">
                        <svg class="w-6 h-6 <?php echo esc_attr($cat['text']); ?>" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <?php echo $svg_inner; ?>
                        </svg>
                    </div>
                    <span
                        class="glosario-card-name font-bold text-sm text-white leading-tight group-hover:text-primary transition-colors">
                        <?php echo esc_html($t['term']); ?>
                    </span>
                    <span
                        class="inline-block px-2 py-0.5 rounded-full text-[10px] font-semibold border <?php echo esc_attr($cat['bg'] . ' ' . $cat['text'] . ' ' . $cat['border']); ?>">
                        <?php echo esc_html($cat['label']); ?>
                    </span>
                </<?php echo $tag; ?>>
                <?php
        endforeach; ?>
            </div>
        </div>
        <?php
    endif; ?>
        <?php
endforeach; ?>

        <!-- Empty state -->
        <div id="glosario-empty" class="hidden text-center py-16">
            <svg class="w-12 h-12 mx-auto text-slate-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <p class="text-slate-500 text-lg">No se encontraron términos</p>
            <p class="text-slate-600 text-sm mt-1">Prueba con otra búsqueda o categoría</p>
        </div>
        </div>
        </div>
    </section>



</main>

<style>
    .glosario-pill {
        background-color: rgba(30, 41, 59, 0.8);
        border-color: rgba(51, 65, 85, 0.6);
        color: #94a3b8;
    }

    .glosario-pill:hover {
        border-color: #2C7FFF;
        color: #e2e8f0;
    }

    .glosario-pill.active {
        background-color: #2C7FFF;
        border-color: #2C7FFF;
        color: #ffffff;
    }

    /* ── Light mode overrides ── */
    #primary.glosario-light {
        background-color: #f8fafc;
        color: #0f172a;
    }

    /* Search input */
    .glosario-light .glosario-input {
        background-color: #ffffff;
        border-color: #cbd5e1;
        color: #0f172a;
    }

    .glosario-light .glosario-input::placeholder {
        color: #94a3b8;
    }

    /* Theme toggle button */
    .glosario-light .glosario-theme-btn {
        background-color: #ffffff;
        border-color: #cbd5e1;
        color: #64748b;
    }

    .glosario-light .glosario-theme-btn:hover {
        color: #0f172a;
        border-color: #94a3b8;
    }

    /* Pills */
    .glosario-light .glosario-pill {
        background-color: #ffffff;
        border-color: #e2e8f0;
        color: #64748b;
    }

    .glosario-light .glosario-pill:hover {
        border-color: #2C7FFF;
        color: #334155;
    }

    .glosario-light .glosario-pill.active {
        background-color: #2C7FFF;
        border-color: #2C7FFF;
        color: #ffffff;
    }

    /* Alphabet bar */
    .glosario-light #glosario-alphabet {
        background-color: rgba(248, 250, 252, 0.95);
        border-bottom-color: #e2e8f0;
    }

    .glosario-light .glosario-letter {
        color: #64748b;
    }

    .glosario-light .glosario-letter:hover {
        color: #0f172a;
        background-color: #f1f5f9;
    }

    .glosario-light .glosario-letter[aria-disabled="true"] {
        color: #cbd5e1;
    }

    /* Letter headings */
    .glosario-light .glosario-group h2 {
        color: #2C7FFF;
    }

    /* Term cards */
    .glosario-light .glosario-term {
        background-color: #ffffff;
        border-color: #e2e8f0;
    }

    .glosario-light .glosario-term:hover {
        background-color: #f8fafc;
        border-color: #cbd5e1;
    }

    .glosario-light .glosario-card-name {
        color: #0f172a;
    }

    .glosario-light .glosario-term:hover .glosario-card-name {
        color: #2C7FFF;
    }

    /* Category badges — light mode tints */
    .glosario-light .bg-blue-500\/15 {
        background-color: rgba(59, 130, 246, 0.1);
    }

    .glosario-light .text-blue-400 {
        color: #2563eb;
    }

    .glosario-light .border-blue-500\/25 {
        border-color: rgba(59, 130, 246, 0.2);
    }

    .glosario-light .bg-orange-500\/15 {
        background-color: rgba(249, 115, 22, 0.1);
    }

    .glosario-light .text-orange-400 {
        color: #ea580c;
    }

    .glosario-light .border-orange-500\/25 {
        border-color: rgba(249, 115, 22, 0.2);
    }

    .glosario-light .bg-emerald-500\/15 {
        background-color: rgba(16, 185, 129, 0.1);
    }

    .glosario-light .text-emerald-400 {
        color: #059669;
    }

    .glosario-light .border-emerald-500\/25 {
        border-color: rgba(16, 185, 129, 0.2);
    }

    .glosario-light .bg-purple-500\/15 {
        background-color: rgba(168, 85, 247, 0.1);
    }

    .glosario-light .text-purple-400 {
        color: #7c3aed;
    }

    .glosario-light .border-purple-500\/25 {
        border-color: rgba(168, 85, 247, 0.2);
    }

    .glosario-light .bg-slate-500\/15 {
        background-color: rgba(100, 116, 139, 0.1);
    }

    .glosario-light .text-slate-400 {
        color: #475569;
    }

    .glosario-light .border-slate-500\/25 {
        border-color: rgba(100, 116, 139, 0.2);
    }

    /* Empty state */
    .glosario-light #glosario-empty p:first-child {
        color: #64748b;
    }

    .glosario-light #glosario-empty p:last-child {
        color: #94a3b8;
    }

    .glosario-light #glosario-empty svg {
        color: #cbd5e1;
    }


    /* Icon visibility handled via JS */
    .glosario-light .glosario-icon-moon {
        display: none;
    }

    .glosario-light .glosario-icon-sun {
        display: block;
    }
</style>

<script>
    (function () {
        // ── Theme toggle ──
        var primary = document.getElementById('primary');
        var themeBtn = document.getElementById('glosario-theme-toggle');
        var STORAGE_KEY = 'glosario-theme';

        function applyTheme(mode) {
            if (mode === 'light') {
                primary.classList.add('glosario-light');
            } else {
                primary.classList.remove('glosario-light');
            }
        }

        // Restore saved preference
        var saved = localStorage.getItem(STORAGE_KEY);
        if (saved) applyTheme(saved);

        themeBtn.addEventListener('click', function () {
            var isLight = primary.classList.contains('glosario-light');
            var next = isLight ? 'dark' : 'light';
            applyTheme(next);
            localStorage.setItem(STORAGE_KEY, next);
        });

        // ── Search & filters ──
        var search = document.getElementById('glosario-search');
        var pills = document.querySelectorAll('.glosario-pill');
        var terms = document.querySelectorAll('.glosario-term');
        var groups = document.querySelectorAll('.glosario-group');
        var letters = document.querySelectorAll('.glosario-letter');
        var emptyState = document.getElementById('glosario-empty');
        var activeCategory = 'all';

        function filterTerms() {
            var query = search.value.toLowerCase().trim();
            var visibleCount = 0;

            terms.forEach(function (el) {
                var cat = el.getAttribute('data-category');
                var name = el.getAttribute('data-term').toLowerCase();
                var def = el.getAttribute('data-definition').toLowerCase();
                var matchCat = activeCategory === 'all' || cat === activeCategory;
                var matchSearch = !query || name.indexOf(query) !== -1 || def.indexOf(query) !== -1;
                var show = matchCat && matchSearch;
                el.style.display = show ? '' : 'none';
                if (show) visibleCount++;
            });

            groups.forEach(function (g) {
                var hasVisible = g.querySelector('.glosario-term[style=""], .glosario-term:not([style])');
                if (!hasVisible) {
                    var btns = g.querySelectorAll('.glosario-term');
                    hasVisible = false;
                    for (var i = 0; i < btns.length; i++) {
                        if (btns[i].style.display !== 'none') { hasVisible = true; break; }
                    }
                }
                g.style.display = hasVisible ? '' : 'none';
            });

            emptyState.classList.toggle('hidden', visibleCount > 0);
        }

        search.addEventListener('input', filterTerms);

        pills.forEach(function (pill) {
            pill.addEventListener('click', function () {
                pills.forEach(function (p) { p.classList.remove('active'); });
                pill.classList.add('active');
                activeCategory = pill.getAttribute('data-category');
                filterTerms();
            });
        });

        letters.forEach(function (a) {
            a.addEventListener('click', function (e) {
                e.preventDefault();
                var href = a.getAttribute('href');
                var target = document.querySelector(href);
                if (target && target.offsetParent !== null) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

    })();
</script>

<?php
get_footer();
