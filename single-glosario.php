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
    $autor   = get_post_meta( $id, 'agl_autor', true );
    $manual  = get_post_meta( $id, 'agl_manual', true );
    $web     = get_post_meta( $id, 'agl_web', true );

    $afiliado  = get_post_meta( $id, 'agl_afiliado', true );
    $etiquetas = function_exists( 'agl_lineas' ) ? agl_lineas( get_post_meta( $id, 'agl_etiquetas', true ) ) : [];

    // La imagen destacada manda: es la via para software y marcas, donde no hay captura
    // que deducir. Si no hay, se prueba con la de la library, que solo tienen los modulos.
    $captura = has_post_thumbnail( $id )
        ? get_the_post_thumbnail_url( $id, 'large' )
        : ( function_exists( 'agl_captura' ) ? agl_captura( $id ) : '' );

    // Los modulos de esta marca, para que la ficha de una marca no sea un callejon.
    $de_la_marca = ( 'marca' === $tipo && function_exists( 'agl_modulos_de_marca' ) )
        ? agl_modulos_de_marca( $id )
        : [];
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

            <div class="relative z-10 max-w-5xl mx-auto px-6 pt-10 pb-14 sm:pt-14">

                <nav class="flex items-center gap-2 text-sm text-slate-400 mb-8" aria-label="Migas de pan">
                    <a href="<?php echo esc_url( $url_glosario ); ?>" class="hover:text-primary transition-colors">Glosario</a>
                    <span class="text-slate-600">&rsaquo;</span>
                    <a href="<?php echo esc_url( get_term_link( $terminos[0] ) ); ?>" class="hover:text-primary transition-colors"><?php echo esc_html( $cat['label'] ); ?></a>
                </nav>

                <div class="flex flex-col md:flex-row md:items-start gap-8 lg:gap-12">

                    <?php if ( $captura ) : ?>
                        <?php // Las capturas de la library son verticales (1520px de alto y ancho
                              // variable segun los HP): se limita el alto y el ancho sale solo, que
                              // es como se alinean en un rack. La columna se lleva el ancho maximo
                              // del modulo mas gordo para que el texto no baile de ficha en ficha.
                              // Si el enlace esta muerto, la imagen se quita y la ficha sigue. ?>
                        <div class="shrink-0 md:w-[300px] lg:w-[340px] flex md:justify-center">
                            <img src="<?php echo esc_url( $captura ); ?>"
                                 alt="<?php echo esc_attr( get_the_title() ); ?>"
                                 class="max-h-[320px] md:max-h-[460px] w-auto max-w-full rounded-xl border border-slate-800 shadow-2xl shadow-black/40"
                                 onerror="this.closest('div').remove()">
                        </div>
                    <?php endif; ?>

                    <div class="min-w-0 flex-1">

                        <div class="flex items-start gap-4">
                            <?php if ( ! $captura ) : ?>
                                <div class="shrink-0 w-16 h-16 sm:w-20 sm:h-20 rounded-2xl <?php echo esc_attr( $cat['bg'] ); ?> border <?php echo esc_attr( $cat['border'] ); ?> flex items-center justify-center">
                                    <svg class="w-8 h-8 sm:w-10 sm:h-10 <?php echo esc_attr( $cat['text'] ); ?>" viewBox="0 0 24 24" fill="none"
                                         stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <?php echo $svg; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                    </svg>
                                </div>
                            <?php endif; ?>
                            <h1 class="min-w-0 text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight text-white break-words pt-1"><?php the_title(); ?></h1>
                        </div>

                        <div class="flex flex-wrap items-center gap-2 mt-4">
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold border <?php echo esc_attr( $cat['bg'] . ' ' . $cat['text'] . ' ' . $cat['border'] ); ?>">
                                <?php echo esc_html( $cat['label'] ); ?>
                            </span>
                            <?php if ( $marca ) : ?>
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold border border-slate-700 bg-slate-900/60 text-slate-200"><?php echo esc_html( $marca ); ?></span>
                            <?php endif; ?>
                            <?php // Las etiquetas de la library ("Attenuator", "Polyphonic") van mas
                                  // apagadas que la categoria y la marca: informan, no clasifican. ?>
                            <?php foreach ( $etiquetas as $etiqueta ) : ?>
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-medium border border-slate-800 bg-slate-900/40 text-slate-400"><?php echo esc_html( $etiqueta ); ?></span>
                            <?php endforeach; ?>
                        </div>

                        <div class="mt-6 text-lg leading-relaxed text-slate-300
                                    [&_p]:mb-5 [&_p:last-child]:mb-0
                                    [&_strong]:text-white [&_strong]:font-semibold
                                    [&_a]:text-primary [&_a]:underline
                                    [&_code]:text-primary [&_code]:bg-slate-900 [&_code]:px-1.5 [&_code]:py-0.5 [&_code]:rounded [&_code]:text-base
                                    [&_ul]:list-disc [&_ul]:pl-6 [&_ul]:space-y-2 [&_ul]:mb-5
                                    [&_h2]:text-white [&_h2]:font-extrabold [&_h2]:text-xl [&_h2]:mt-8 [&_h2]:mb-3">
                            <?php the_content(); ?>
                        </div>

                        <?php
                        // Ficha tecnica. Van solo los datos que no se pueden deducir y que sirven
                        // para algo: quien lo firma, donde se lee y donde se descarga. La version
                        // se deja fuera a proposito: caduca a la semana siguiente.
                        //
                        // El enlace de afiliado sustituye a la web oficial cuando lo hay: son el
                        // mismo destino, y tener los dos seria mandar trafico a la version que no
                        // paga. Sale marcado como `sponsored`, que es lo que toca.
                        $host_oficial = $oficial ? wp_parse_url( $oficial, PHP_URL_HOST ) : '';
                        $etiqueta_of  = ( 'library.vcvrack.com' === $host_oficial ) ? 'VCV Library' : 'Ficha oficial';

                        $enlaces = array_filter( [
                            'Manual'           => $manual,
                            'Web oficial'      => $afiliado ?: $web,
                            $etiqueta_of       => $oficial,
                        ] );

                        // Sin duplicar: en software la web suele estar tambien en el campo oficial.
                        $enlaces = array_unique( $enlaces );
                        ?>
                        <?php if ( $autor || $enlaces ) : ?>
                            <div class="mt-8 pt-6 border-t border-slate-800 flex flex-wrap items-center gap-x-5 gap-y-2 text-sm">
                                <?php if ( $autor ) : ?>
                                    <span class="text-slate-400">Autor: <span class="text-slate-200 font-semibold"><?php echo esc_html( $autor ); ?></span></span>
                                <?php endif; ?>

                                <?php foreach ( $enlaces as $etiqueta => $url ) : ?>
                                    <?php $rel = ( $afiliado && $url === $afiliado ) ? 'sponsored nofollow noopener' : 'nofollow noopener'; ?>
                                    <a href="<?php echo esc_url( $url ); ?>" rel="<?php echo esc_attr( $rel ); ?>" target="_blank"
                                       class="inline-flex items-center gap-1.5 font-semibold text-primary hover:underline">
                                        <?php echo esc_html( $etiqueta ); ?>
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/>
                                        </svg>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php // `relative` para que el contenido quede por encima del degradado del hero,
              // que al estar posicionado se pintaba sobre el primer parrafo. ?>
        <div class="relative z-10 max-w-5xl mx-auto px-6 pb-16">

            <?php if ( $videos ) : ?>
                <?php // Esto es lo que no puede copiar nadie: no una definicion de manual,
                      // sino el momento exacto de un directo donde se explica. La miniatura
                      // y el minuto salen del propio enlace, sin API ni campo extra. ?>
                <section class="mt-12">
                    <h2 class="text-lg font-extrabold text-white mb-1">Dónde lo explico</h2>
                    <p class="text-sm text-slate-400 mb-5">Cada enlace abre el directo en el momento justo.</p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <?php foreach ( $videos as $v ) : ?>
                            <?php $yt = function_exists( 'agl_video' ) ? agl_video( $v ) : []; ?>

                            <?php if ( $yt ) : ?>
                                <a href="<?php echo esc_url( $yt['url'] ); ?>" rel="noopener" target="_blank"
                                   class="group block rounded-xl overflow-hidden border border-slate-800 bg-slate-900/60 hover:border-slate-600 transition-colors">
                                    <div class="relative">
                                        <img src="<?php echo esc_url( $yt['miniatura'] ); ?>" alt="" loading="lazy"
                                             class="w-full aspect-video object-cover" onerror="this.remove()">
                                        <span class="absolute inset-0 flex items-center justify-center bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity">
                                            <svg class="w-12 h-12 text-white drop-shadow" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path d="M8 5.14v14l11-7-11-7z" />
                                            </svg>
                                        </span>
                                        <?php if ( $yt['momento'] ) : ?>
                                            <span class="absolute bottom-2 right-2 px-1.5 py-0.5 rounded bg-black/80 text-white text-xs font-semibold tabular-nums"><?php echo esc_html( $yt['momento'] ); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <p class="px-3 py-2.5 text-sm font-semibold text-slate-200 group-hover:text-primary transition-colors">
                                        <?php echo $yt['momento']
                                            ? esc_html( sprintf( 'Lo explico en el %s', $yt['momento'] ) )
                                            : esc_html( 'Ver el directo' ); ?>
                                    </p>
                                </a>
                            <?php else : ?>
                                <a href="<?php echo esc_url( $v ); ?>" rel="noopener" target="_blank"
                                   class="block rounded-xl border border-slate-800 bg-slate-900/60 px-3 py-2.5 text-sm text-primary hover:underline break-all"><?php echo esc_html( $v ); ?></a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>

            <?php if ( $de_la_marca ) : ?>
                <?php // La ficha de una marca no cuenta nada por si sola: lo que aporta es
                      // que desde ella se llegue a sus modulos. ?>
                <section class="mt-12">
                    <h2 class="text-lg font-extrabold text-white mb-5">Sus módulos en el glosario</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">
                        <?php foreach ( $de_la_marca as $mod ) :
                            $mod_img = function_exists( 'agl_captura' ) ? agl_captura( $mod->ID ) : '';
                            ?>
                            <a href="<?php echo esc_url( get_permalink( $mod ) ); ?>"
                               class="group flex flex-col items-center text-center gap-2 p-4 rounded-2xl border border-slate-800 bg-slate-900/60 hover:bg-slate-800/80 hover:border-slate-600 transition-all duration-200 hover:-translate-y-1">
                                <?php if ( $mod_img ) : ?>
                                    <img src="<?php echo esc_url( $mod_img ); ?>" alt="" loading="lazy"
                                         class="h-24 w-auto rounded" onerror="this.remove()">
                                <?php endif; ?>
                                <span class="text-sm font-bold text-white leading-tight group-hover:text-primary transition-colors"><?php echo esc_html( get_the_title( $mod ) ); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
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
