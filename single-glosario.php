<?php
/**
 * Ficha de un término del glosario.
 *
 * Los datos salen del plugin Animatek Glosario; el diseño es el de la web, con los
 * mismos iconos y colores por categoría que el índice de `page-glosario.php`.
 */

get_header();

$glosario   = require __DIR__ . '/inc/glosario-data.php';
$categories = $glosario['categories'];

if ( ! function_exists( 'glosario_icon' ) ) {
    function glosario_icon( string $slug, string $category, array $icons, array $icon_map, array $cat_icons ): string
    {
        $key = $icon_map[ $slug ] ?? $cat_icons[ $category ] ?? 'sine';
        return $icons[ $key ] ?? $icons['sine'];
    }
}

while ( have_posts() ) :
    the_post();

    $id       = get_the_ID();
    $terminos = get_the_terms( $id, 'glosario_categoria' );
    $cat_slug = ( $terminos && ! is_wp_error( $terminos ) ) ? $terminos[0]->slug : 'audio';
    $cat      = $categories[ $cat_slug ] ?? $categories['audio'];
    $svg      = glosario_icon( get_post_field( 'post_name', $id ), $cat_slug, $glosario['icons'], $glosario['icon_map'], $glosario['cat_icons'] );

    $tipo    = get_post_meta( $id, 'agl_tipo', true );
    $marca   = get_post_meta( $id, 'agl_marca', true );
    $oficial = get_post_meta( $id, 'agl_url_library', true );
    $videos  = function_exists( 'agl_lineas' ) ? agl_lineas( get_post_meta( $id, 'agl_videos', true ) ) : [];

    $url_glosario = home_url( '/glosario/' );

    // Otros términos de la misma categoría, para no dejar la ficha sin salida.
    $relacionados = get_posts( [
        'post_type'    => 'glosario',
        'post__not_in' => [ $id ],
        'numberposts'  => 6,
        'orderby'      => 'rand',
        'tax_query'    => [ [
            'taxonomy' => 'glosario_categoria',
            'field'    => 'slug',
            'terms'    => $cat_slug,
        ] ],
    ] );
    ?>

    <main id="primary" class="bg-slate-950 text-slate-50 min-h-screen">

        <div class="relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950"></div>
            <div class="absolute top-0 right-0 -mr-40 -mt-40 w-[500px] h-[500px] bg-primary/10 rounded-full blur-[120px]"></div>

            <div class="relative z-10 max-w-3xl mx-auto px-6 pt-10 pb-12 sm:pt-14">

                <nav class="flex items-center gap-2 text-sm text-slate-400 mb-8" aria-label="Migas de pan">
                    <a href="<?php echo esc_url( $url_glosario ); ?>" class="hover:text-primary transition-colors">Glosario</a>
                    <span class="text-slate-600">&rsaquo;</span>
                    <a href="<?php echo esc_url( get_term_link( $terminos[0] ) ); ?>" class="hover:text-primary transition-colors"><?php echo esc_html( $cat['label'] ); ?></a>
                </nav>

                <div class="flex items-start gap-5">
                    <div class="shrink-0 w-16 h-16 sm:w-20 sm:h-20 rounded-2xl <?php echo esc_attr( $cat['bg'] ); ?> border <?php echo esc_attr( $cat['border'] ); ?> flex items-center justify-center">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 <?php echo esc_attr( $cat['text'] ); ?>" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <?php echo $svg; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        </svg>
                    </div>

                    <div class="min-w-0 space-y-3 pt-1">
                        <h1 class="text-3xl sm:text-4xl font-extrabold leading-tight text-white break-words"><?php the_title(); ?></h1>
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold border <?php echo esc_attr( $cat['bg'] . ' ' . $cat['text'] . ' ' . $cat['border'] ); ?>">
                                <?php echo esc_html( $cat['label'] ); ?>
                            </span>
                            <?php if ( 'modulo' === $tipo && $marca ) : ?>
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold border border-slate-700 text-slate-300"><?php echo esc_html( $marca ); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-3xl mx-auto px-6 pb-16 -mt-4">

            <div class="text-lg leading-relaxed text-slate-300
                        [&_p]:mb-5 [&_p:last-child]:mb-0
                        [&_strong]:text-white [&_strong]:font-semibold
                        [&_a]:text-primary [&_a]:underline
                        [&_code]:text-primary [&_code]:bg-slate-900 [&_code]:px-1.5 [&_code]:py-0.5 [&_code]:rounded [&_code]:text-base
                        [&_ul]:list-disc [&_ul]:pl-6 [&_ul]:space-y-2 [&_ul]:mb-5
                        [&_h2]:text-white [&_h2]:font-extrabold [&_h2]:text-xl [&_h2]:mt-8 [&_h2]:mb-3">
                <?php the_content(); ?>
            </div>

            <?php if ( $oficial ) : ?>
                <a href="<?php echo esc_url( $oficial ); ?>" rel="nofollow noopener" target="_blank"
                   class="inline-flex items-center gap-2 mt-8 px-5 py-3 rounded-xl border border-slate-700 bg-slate-900/60 text-slate-200 font-semibold hover:border-primary hover:text-primary transition-colors">
                    Ver la ficha oficial
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/>
                    </svg>
                </a>
            <?php endif; ?>

            <?php if ( $videos ) : ?>
                <section class="mt-12">
                    <h2 class="text-lg font-extrabold text-white mb-4">Dónde lo uso</h2>
                    <ul class="space-y-2">
                        <?php foreach ( $videos as $v ) : ?>
                            <li>
                                <a href="<?php echo esc_url( $v ); ?>" class="text-primary hover:underline break-all"><?php echo esc_html( $v ); ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </section>
            <?php endif; ?>

            <?php if ( $relacionados ) : ?>
                <section class="mt-14 pt-10 border-t border-slate-800">
                    <h2 class="text-lg font-extrabold text-white mb-5">Más de <?php echo esc_html( $cat['label'] ); ?></h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        <?php foreach ( $relacionados as $rel ) :
                            $rel_svg = glosario_icon( $rel->post_name, $cat_slug, $glosario['icons'], $glosario['icon_map'], $glosario['cat_icons'] );
                            ?>
                            <a href="<?php echo esc_url( get_permalink( $rel ) ); ?>"
                               class="group flex flex-col items-center text-center gap-2 p-4 rounded-2xl border border-slate-800 bg-slate-900/60 hover:bg-slate-800/80 hover:border-slate-600 transition-all duration-200 hover:-translate-y-1">
                                <div class="w-10 h-10 rounded-xl <?php echo esc_attr( $cat['bg'] ); ?> flex items-center justify-center">
                                    <svg class="w-5 h-5 <?php echo esc_attr( $cat['text'] ); ?>" viewBox="0 0 24 24" fill="none"
                                         stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <?php echo $rel_svg; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                    </svg>
                                </div>
                                <span class="text-sm font-bold text-white leading-tight group-hover:text-primary transition-colors"><?php echo esc_html( get_the_title( $rel ) ); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>

            <p class="mt-14">
                <a href="<?php echo esc_url( $url_glosario ); ?>" class="inline-flex items-center gap-2 text-primary font-semibold hover:underline">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                    </svg>
                    Volver al glosario
                </a>
            </p>
        </div>
    </main>

<?php
endwhile;

get_footer();
