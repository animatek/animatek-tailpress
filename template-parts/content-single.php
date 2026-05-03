<?php
/**
 * Template part for displaying single posts (two-column hero).
 *
 * @package Animatek
 */

// Lectura estimada
$content      = get_post_field('post_content', get_the_ID());
$word_count   = str_word_count(wp_strip_all_tags($content));
$reading_time = max(1, ceil($word_count / 220)); // 220 palabras/min aprox

// Categorías (máx 2)
$categories = get_the_category();
$cat_palette = [
    'bg-primary/15 text-primary border-primary/30',
    'bg-amber-100 text-amber-900 border-amber-200',
    'bg-emerald-100 text-emerald-900 border-emerald-200',
    'bg-rose-100 text-rose-800 border-rose-200',
    'bg-cyan-100 text-cyan-900 border-cyan-200',
];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('relative'); ?>>
    <div class="bg-slate-50 dark:bg-slate-800/40 rounded-3xl overflow-hidden shadow-lg border border-slate-200 dark:border-slate-700/50 mb-8">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <!-- Columna izquierda: imagen -->
            <div class="relative bg-slate-900 h-[300px] lg:h-auto min-h-[300px]">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large', [
                        'class'   => 'absolute inset-0 w-full h-full object-cover object-center block',
                        'loading' => 'eager',
                    ]); ?>
                <?php else : ?>
                    <div class="absolute inset-0 w-full h-full bg-gradient-to-br from-slate-800 via-slate-900 to-slate-800"></div>
                <?php endif; ?>
            </div>

            <!-- Columna derecha: metadatos -->
            <div class="flex flex-col justify-between p-7 md:p-8 gap-5">
                <?php if (!empty($categories)) : ?>
                    <div>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-semibold rounded-full border <?php echo esc_attr($cat_palette[0]); ?>">
                            <span aria-hidden="true">#</span><?php echo esc_html($categories[0]->name); ?>
                        </span>
                    </div>
                <?php endif; ?>

                <h1 class="text-3xl md:text-4xl font-extrabold leading-tight text-slate-900">
                    <?php the_title(); ?>
                </h1>

                <div class="flex flex-wrap items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs text-slate-600 border border-slate-200 rounded-full bg-slate-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="9"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7v5l3 2"/>
                        </svg>
                        <?php echo esc_html(get_the_date('d M Y')); ?>
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs text-slate-600 border border-slate-200 rounded-full bg-slate-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l3.5 2"/>
                            <circle cx="12" cy="12" r="9"/>
                        </svg>
                        <?php echo esc_html($reading_time); ?> min de lectura
                    </span>
                    <?php
                    $tags = get_the_tags();
                    if ($tags) :
                        $tag_palette = [
                            'bg-primary/10 text-primary border-primary/20',
                            'bg-amber-100 text-amber-800 border-amber-200',
                            'bg-emerald-100 text-emerald-800 border-emerald-200',
                            'bg-rose-100 text-rose-700 border-rose-200',
                            'bg-cyan-100 text-cyan-800 border-cyan-200',
                        ];
                        $index = 0;
                        foreach (array_slice($tags, 0, 3) as $tag) :
                            $palette_class = $tag_palette[$index % count($tag_palette)];
                            $index++;
                            ?>
                            <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"
                               class="inline-flex items-center gap-1 px-3 py-1 rounded-full border <?php echo esc_attr($palette_class); ?> font-semibold text-[11px] uppercase tracking-[0.16em] hover:opacity-80 transition">
                                #<?php echo esc_html($tag->name); ?>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="flex items-center gap-3 pt-5 border-t border-slate-100">
                    <img src="https://animatek.net/wp-content/uploads/2025/04/Javier_Melgar_animatek.webp" 
                         alt="<?php the_author(); ?>" 
                         class="w-9 h-9 rounded-full object-cover flex-shrink-0 shadow-sm border border-slate-200 dark:border-slate-700/50">
                    <div>
                        <p class="text-sm font-bold text-slate-900 leading-tight"><?php the_author(); ?></p>
                        <p class="text-xs text-slate-500 leading-tight">Productor · Animatek</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-[720px] mx-auto mt-8">
        <div class="post-content text-[15px] md:text-base text-slate-800 leading-relaxed space-y-6">
            <?php
            the_content();

            wp_link_pages([
                'before' => '<div class="mt-6 text-sm text-slate-500">Páginas: ',
                'after'  => '</div>',
            ]);
            ?>
        </div>
    </div>

    <?php get_template_part('template-parts/block-explora'); ?>

    <nav class="mt-8 pb-8">
        <div class="grid gap-3 md:grid-cols-2">
            <div class="bg-slate-50 dark:bg-slate-800/40 border border-slate-200 dark:border-slate-700/50 rounded-2xl p-4 hover:-translate-y-0.5 transition">
                <?php previous_post_link(
                    '<span class="block text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400 mb-1">← Anterior</span><span class="block text-sm font-semibold text-slate-700 hover:text-primary transition">%link</span>',
                    '%title'
                ); ?>
            </div>
            <div class="bg-slate-50 dark:bg-slate-800/40 border border-slate-200 dark:border-slate-700/50 rounded-2xl p-4 hover:-translate-y-0.5 transition text-left md:text-right">
                <?php next_post_link(
                    '<span class="block text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400 mb-1">Siguiente →</span><span class="block text-sm font-semibold text-slate-700 hover:text-primary transition">%link</span>',
                    '%title'
                ); ?>
            </div>
        </div>
    </nav>
</article>
