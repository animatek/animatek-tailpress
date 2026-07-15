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
    'samples' => [
        'label' => 'Sample Packs',
        'description' => 'Samples WAV, loops, drones y material para sound design',
        'slugs' => ['sample-packs', 'samples', 'pack-samples', 'packs-samples', 'sound-design'],
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
        return 'border-emerald-400/40 bg-emerald-500/15 text-emerald-300';
    }

    if (str_contains($slug, 'sample') || str_contains($slug, 'sound-design')) {
        return 'border-cyan-400/40 bg-cyan-500/15 text-cyan-300';
    }

    if (str_contains($slug, 'vcv') || str_contains($slug, 'patch')) {
        return 'border-blue-400/40 bg-blue-500/15 text-blue-300';
    }

    if (str_contains($slug, 'bundle')) {
        return 'border-amber-400/40 bg-amber-500/15 text-amber-300';
    }

    if (str_contains($slug, 'project') || str_contains($slug, 'proyecto') || str_contains($slug, 'streaming')) {
        return 'border-purple-400/40 bg-purple-500/15 text-purple-300';
    }

    return 'border-slate-400/30 bg-slate-500/15 text-slate-300';
};

?>

<main id="primary" class="bg-slate-100 text-slate-900">

    <!-- ═══════════════ HERO ═══════════════ -->
    <section class="relative overflow-hidden bg-slate-950">
        <!-- Grid pattern -->
        <div class="absolute inset-0 pointer-events-none opacity-40 hero-grid"></div>

        <!-- Blobs decorativos -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -left-24 -top-24 h-80 w-80 rounded-full bg-primary/15 blur-3xl"></div>
            <div class="absolute right-0 top-1/3 h-72 w-72 rounded-full bg-amber-300/20 blur-3xl"></div>
            <div class="absolute -bottom-24 left-1/3 h-72 w-72 rounded-full bg-cyan-400/15 blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-7xl space-y-8 px-6 py-14 sm:px-10 lg:py-16">
            <!-- Título + contador -->
            <div class="flex flex-wrap items-end justify-between gap-6">
                <div class="space-y-3">
                    <p class="text-xs font-bold uppercase tracking-widest text-slate-500">ANIMATEK · PACKS</p>
                    <h1 class="text-4xl font-black leading-none text-slate-900 sm:text-5xl">Packs</h1>
                    <p class="max-w-2xl text-base leading-relaxed text-slate-600 sm:text-lg">
                        Patches, proyectos, presets, samples y bundles creados en vídeos, directos y sesiones reales de Animatek.
                    </p>
                </div>
                <div class="inline-flex min-h-9 items-center gap-1.5 justify-center rounded-md border border-slate-200 bg-white px-3 py-1.5 text-xs font-bold leading-none text-slate-700 shadow-sm">
                    <?php echo esc_html($packs_query->found_posts); ?> packs
                </div>
            </div>

            <!-- Filtros -->
            <div class="flex flex-wrap gap-2">
                <?php foreach ($pack_filters as $filter_key => $filter):
                    $is_active = ($filter_key === $active_filter);
                    $filter_url = add_query_arg('tipo', $filter_key, get_permalink());
                ?>
                    <a href="<?php echo esc_url($filter_url); ?>#packs"
                        class="inline-flex items-center gap-2 rounded-full border px-3.5 py-2 text-sm font-bold transition <?php echo $is_active ? 'bg-primary text-white border-primary shadow-md shadow-primary/20' : 'bg-white text-slate-700 border-slate-200 hover:border-primary/40 hover:text-primary hover:-translate-y-0.5'; ?>"
                        title="<?php echo esc_attr($filter['description']); ?>">
                        <?php echo esc_html($filter['label']); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ═══════════════ GRID DE PACKS ═══════════════ -->
    <section id="packs" class="mx-auto max-w-7xl scroll-mt-24 px-6 py-12 sm:px-10 lg:py-16">
        <?php if ($packs_query->have_posts()): ?>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                <?php while ($packs_query->have_posts()): $packs_query->the_post();
                    $categories = get_the_category();
                    $display_categories = array_values(array_filter($categories, static function ($category): bool {
                        return 'packs' !== $category->slug;
                    }));
                    $display_categories = !empty($display_categories) ? $display_categories : $categories;
                    $price = get_post_meta(get_the_ID(), 'pack_price', true);
                    $download_type = get_post_meta(get_the_ID(), 'pack_type', true);
                ?>
                    <article <?php post_class('group flex flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:border-slate-300 hover:shadow-lg'); ?>>
                        <a href="<?php the_permalink(); ?>" class="relative block aspect-video overflow-hidden bg-slate-950 !no-underline">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('medium_large', [
                                    'class' => 'h-full w-full object-cover object-top transition duration-300 group-hover:scale-105',
                                    'loading' => 'lazy',
                                ]); ?>
                            <?php else: ?>
                                <div class="h-full w-full bg-gradient-to-br from-slate-900 via-slate-800 to-primary/80 flex items-center justify-center text-white">
                                    <span class="text-4xl">📦</span>
                                </div>
                            <?php endif; ?>

                            <!-- Overlay gradiente -->
                            <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/70 to-transparent"></div>

                            <!-- Badges sobre la imagen -->
                            <div class="absolute left-3 top-3 flex flex-wrap gap-1.5">
                                <?php foreach (array_slice($display_categories, 0, 2) as $category): ?>
                                    <span class="inline-flex items-center rounded-md border px-2.5 py-1 text-[10px] font-black uppercase tracking-wider backdrop-blur-sm <?php echo esc_attr($animatek_category_badge_class($category->slug)); ?>">
                                        <?php echo esc_html($category->name); ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>

                            <?php if (!empty($price)): ?>
                                <span class="absolute top-3 right-3 rounded-md bg-white/95 text-slate-900 text-[11px] font-black px-2.5 py-1 shadow-sm backdrop-blur-sm">
                                    <?php echo esc_html($price); ?>
                                </span>
                            <?php endif; ?>
                        </a>

                        <div class="flex flex-1 flex-col gap-3 p-5">
                            <div>
                                <h3 class="text-lg font-extrabold leading-tight text-slate-900">
                                    <a href="<?php the_permalink(); ?>" class="!no-underline text-slate-900 transition hover:text-primary">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                            </div>

                            <p class="text-sm leading-relaxed text-slate-600 line-clamp-2 flex-1">
                                <?php echo wp_kses_post(get_the_excerpt()); ?>
                            </p>

                            <div class="mt-auto flex items-center justify-between border-t border-slate-100 pt-3">
                                <span class="text-[11px] uppercase tracking-[0.14em] font-semibold text-slate-400">
                                    <?php echo !empty($download_type) ? esc_html($download_type) : esc_html(get_the_date('d M Y')); ?>
                                </span>
                                <a href="<?php the_permalink(); ?>" class="text-sm font-bold text-primary hover:underline !no-underline">
                                    Ver pack &rarr;
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else: ?>
            <div class="rounded-2xl border border-slate-200 bg-white p-10 sm:p-14 text-center shadow-sm">
                <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100">
                    <span class="text-3xl">📦</span>
                </div>
                <h3 class="text-2xl font-black text-slate-900 mb-3">Todavía no hay packs con este filtro</h3>
                <p class="text-slate-600 max-w-xl mx-auto leading-relaxed">
                    Cuando publiques posts con la categoría Packs, aparecerán automáticamente aquí. Si quieres usar filtros, añade también categorías como Pack VCV, Pack Bitwig, Bundle, Proyecto o Patch.
                </p>
                <a href="<?php echo esc_url(get_permalink()); ?>" class="mt-6 inline-flex items-center justify-center rounded-full bg-primary px-5 py-3 text-sm font-bold text-white shadow-md shadow-primary/20 transition hover:-translate-y-0.5 hover:bg-primary/90 !no-underline">
                    Ver todos los packs
                </a>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php
get_footer();
