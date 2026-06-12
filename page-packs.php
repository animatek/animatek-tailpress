<?php
/**
 * Template Name: Packs
 *
 * Página índice para packs descargables de Animatek.
 * Los packs se publican como posts normales del blog y se muestran aquí
 * si pertenecen a alguna de las categorías configuradas abajo.
 */

get_header();

$pack_filters = [
    'todos' => [
        'label' => 'Todos',
        'description' => 'Todos los posts publicados con la categoría Packs',
        'slugs' => ['packs'],
    ],
    'vcv' => [
        'label' => 'VCV Rack',
        'description' => 'Patches, plantillas y sistemas modulares',
        'slugs' => ['pack-vcv', 'packs-vcv', 'vcv-rack', 'patch-vcv', 'patches-vcv'],
    ],
    'bitwig' => [
        'label' => 'Bitwig',
        'description' => 'Proyectos, presets y dispositivos',
        'slugs' => ['pack-bitwig', 'packs-bitwig', 'bitwig', 'bitwig-studio'],
    ],
    'bundles' => [
        'label' => 'Bundles',
        'description' => 'Recopilaciones y packs grandes',
        'slugs' => ['pack-bundle', 'packs-bundles', 'bundle', 'bundles'],
    ],
    'proyectos' => [
        'label' => 'Proyectos',
        'description' => 'Sesiones completas y archivos de directo',
        'slugs' => ['pack-proyecto', 'pack-project', 'packs-proyectos', 'streaming-pack', 'packs-streaming'],
    ],
    'patches' => [
        'label' => 'Patches',
        'description' => 'Patches concretos listos para abrir',
        'slugs' => ['pack-patch', 'packs-patches', 'patch-pack', 'patches'],
    ],
];

$active_filter = isset($_GET['tipo']) ? sanitize_key(wp_unslash($_GET['tipo'])) : 'todos';
if (!isset($pack_filters[$active_filter])) {
    $active_filter = 'todos';
}

$animatek_get_term_ids = static function (array $slugs): array {
    $ids = [];

    foreach ($slugs as $slug) {
        $term = get_category_by_slug($slug);
        if ($term) {
            $ids[] = (int) $term->term_id;
        }
    }

    return array_values(array_unique($ids));
};

$base_pack_category_ids = $animatek_get_term_ids($pack_filters['todos']['slugs']);
$filter_category_ids = 'todos' !== $active_filter ? $animatek_get_term_ids($pack_filters[$active_filter]['slugs']) : [];

$pack_query_args = [
    'post_type' => 'post',
    'posts_per_page' => 24,
    'ignore_sticky_posts' => true,
];

if (!empty($base_pack_category_ids)) {
    $pack_query_args['tax_query'] = [
        [
            'taxonomy' => 'category',
            'field' => 'term_id',
            'terms' => $base_pack_category_ids,
        ],
    ];

    if (!empty($filter_category_ids)) {
        $pack_query_args['tax_query']['relation'] = 'AND';
        $pack_query_args['tax_query'][] = [
            'taxonomy' => 'category',
            'field' => 'term_id',
            'terms' => $filter_category_ids,
        ];
    } elseif ('todos' !== $active_filter) {
        $pack_query_args['post__in'] = [0];
    }
} else {
    $pack_query_args['post__in'] = [0];
}

$packs_query = new WP_Query($pack_query_args);

$animatek_category_badge_class = static function ($slug): string {
    $slug = (string) $slug;

    if (str_contains($slug, 'bitwig')) {
        return 'bg-emerald-100 text-emerald-800 border-emerald-200';
    }

    if (str_contains($slug, 'vcv') || str_contains($slug, 'patch')) {
        return 'bg-blue-100 text-blue-800 border-blue-200';
    }

    if (str_contains($slug, 'bundle')) {
        return 'bg-amber-100 text-amber-800 border-amber-200';
    }

    if (str_contains($slug, 'project') || str_contains($slug, 'proyecto') || str_contains($slug, 'streaming')) {
        return 'bg-purple-100 text-purple-800 border-purple-200';
    }

    return 'bg-slate-100 text-slate-700 border-slate-200';
};
?>

<main id="primary" class="bg-slate-100 text-slate-900">
    <section class="relative overflow-hidden px-6 py-8 lg:py-10 bg-slate-950 text-slate-50 isolate">
        <div class="absolute -inset-4 bg-cover bg-center blur-[2px] scale-105 opacity-90" style="background-image: url('https://animatek.net/wp-content/uploads/2026/04/GRID_portada.webp');"></div>
        <div class="absolute inset-0 bg-slate-950/45"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/90 via-slate-950/55 to-slate-950/10"></div>

        <div class="relative z-10 max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">
                <div class="space-y-4 max-w-4xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 text-[11px] font-bold uppercase tracking-[0.18em] rounded-full bg-white/10 border border-white/15 backdrop-blur">
                        Packs Animatek
                    </div>
                    <div class="space-y-3">
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight text-white">
                            Recursos descargables para <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary via-cyan-300 to-emerald-300">abrir, estudiar y usar</span>
                        </h1>
                        <p class="text-base sm:text-lg text-slate-200 leading-relaxed max-w-2xl">
                            Patches, proyectos, presets, samples y bundles creados en vídeos, directos y sesiones reales de Animatek.
                        </p>
                    </div>
                </div>
                <div class="inline-flex w-fit items-center rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm font-bold text-white backdrop-blur">
                    <?php echo esc_html($packs_query->found_posts); ?> packs
                </div>
            </div>
        </div>
    </section>

    <section id="packs" class="relative z-10 max-w-7xl mx-auto px-6 py-8 lg:py-10">
        <div class="flex flex-col xl:flex-row xl:items-end xl:justify-between gap-5 mb-6">
            <div class="space-y-2 max-w-3xl">
                <p class="text-[11px] uppercase tracking-[0.18em] font-semibold text-primary">Catálogo</p>
                <h2 class="text-slate-900 text-3xl sm:text-4xl">Packs disponibles</h2>
                <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                    Todos los posts marcados con la categoría Packs. Usa los filtros para encontrar rápido recursos de VCV, Bitwig, bundles, proyectos o patches.
                </p>
            </div>
            <div class="flex flex-wrap gap-2">
                <?php foreach ($pack_filters as $filter_key => $filter):
                    $is_active = ($filter_key === $active_filter);
                    $filter_url = add_query_arg('tipo', $filter_key, get_permalink());
                ?>
                    <a href="<?php echo esc_url($filter_url); ?>#packs"
                        class="inline-flex items-center gap-2 rounded-full border px-3.5 py-2 text-sm font-bold transition <?php echo $is_active ? 'bg-primary text-white border-primary shadow-sm' : 'bg-white text-slate-700 border-slate-200 hover:border-primary/40 hover:text-primary'; ?>"
                        title="<?php echo esc_attr($filter['description']); ?>">
                        <?php echo esc_html($filter['label']); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <?php if ($packs_query->have_posts()): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4">
                <?php while ($packs_query->have_posts()): $packs_query->the_post();
                    $categories = get_the_category();
                    $display_categories = array_values(array_filter($categories, static function ($category): bool {
                        return 'packs' !== $category->slug;
                    }));
                    $display_categories = !empty($display_categories) ? $display_categories : $categories;
                    $price = get_post_meta(get_the_ID(), 'pack_price', true);
                    $download_type = get_post_meta(get_the_ID(), 'pack_type', true);
                ?>
                    <article <?php post_class('group bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm hover:-translate-y-1 hover:shadow-lg transition-all duration-300 flex flex-col'); ?>>
                        <a href="<?php the_permalink(); ?>" class="block relative aspect-[16/9] overflow-hidden bg-slate-100 !no-underline">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('medium_large', [
                                    'class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-105',
                                    'loading' => 'lazy',
                                ]); ?>
                            <?php else: ?>
                                <div class="h-full w-full bg-gradient-to-br from-slate-900 via-slate-800 to-primary/80 flex items-center justify-center text-white">
                                    <span class="text-4xl">📦</span>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($price)): ?>
                                <span class="absolute top-3 right-3 rounded-full bg-slate-950/85 text-white text-xs font-bold px-3 py-1 shadow">
                                    <?php echo esc_html($price); ?>
                                </span>
                            <?php endif; ?>
                        </a>

                        <div class="p-4 flex flex-col flex-1">
                            <div class="flex flex-wrap gap-1.5 mb-2.5 min-h-7">
                                <?php foreach (array_slice($display_categories, 0, 3) as $category): ?>
                                    <span class="inline-flex items-center rounded-full border px-2.5 py-1 text-[10px] font-bold uppercase tracking-[0.12em] <?php echo esc_attr($animatek_category_badge_class($category->slug)); ?>">
                                        <?php echo esc_html($category->name); ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>

                            <h3 class="text-base font-extrabold leading-tight text-slate-900 mb-2">
                                <a href="<?php the_permalink(); ?>" class="!no-underline text-slate-900 hover:text-primary transition-colors">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <p class="text-sm text-slate-600 leading-relaxed line-clamp-2 flex-1">
                                <?php echo wp_kses_post(get_the_excerpt()); ?>
                            </p>

                            <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between gap-3">
                                <span class="text-[11px] uppercase tracking-[0.14em] font-semibold text-slate-400">
                                    <?php echo !empty($download_type) ? esc_html($download_type) : esc_html(get_the_date('d M Y')); ?>
                                </span>
                                <a href="<?php the_permalink(); ?>" class="text-primary text-sm font-bold inline-flex items-center gap-1 !no-underline">
                                    Ver pack
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else: ?>
            <div class="rounded-3xl border border-slate-200 bg-white p-8 sm:p-10 text-center shadow-sm">
                <div class="text-5xl mb-4">📦</div>
                <h3 class="text-2xl font-bold text-slate-900 mb-3">Todavía no hay packs con este filtro</h3>
                <p class="text-slate-600 max-w-2xl mx-auto leading-relaxed">
                    Cuando publiques posts con la categoría Packs, aparecerán automáticamente aquí. Si quieres usar filtros, añade también categorías como Pack VCV, Pack Bitwig, Bundle, Proyecto o Patch.
                </p>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php
get_footer();
