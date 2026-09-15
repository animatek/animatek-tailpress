<?php
/**
 * Barra de últimos artículos del blog.
 *
 * Una tira horizontal justo debajo del hero de la home: el blog existía y no se
 * veía desde la portada, así que solo llegaba quien pinchaba en el menú.
 *
 * Se desliza con el dedo, con la rueda del ratón en horizontal y con el
 * teclado (el contenedor es enfocable). No lleva autoplay a propósito: una tira
 * que se mueve sola obliga a perseguir lo que quieres leer.
 *
 * Uso:
 *     get_template_part( 'template-parts/block-ultimos-posts' );
 *     get_template_part( 'template-parts/block-ultimos-posts', null, array( 'cuantos' => 6 ) );
 *
 * @package Animatek
 */

defined( 'ABSPATH' ) || exit;

$animatek_cuantos = isset( $args['cuantos'] ) ? (int) $args['cuantos'] : 8;

$animatek_posts = get_posts(
	array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => $animatek_cuantos,
		'ignore_sticky_posts' => true,
	)
);

if ( empty( $animatek_posts ) ) {
	return;
}
?>

<section class="ticker" aria-label="<?php esc_attr_e( 'Últimos artículos del blog', 'animatek' ); ?>">
	<a class="ticker__label" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">
		<span class="ticker__label-texto"><?php esc_html_e( 'Blog', 'animatek' ); ?></span>
		<svg class="ticker__chevrones" viewBox="0 0 34 12" fill="none" aria-hidden="true">
			<polyline points="2,2 8,6 2,10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
			<polyline points="12,2 18,6 12,10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
			<polyline points="22,2 28,6 22,10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
		</svg>
	</a>

	<div class="ticker__pista" tabindex="0" role="group" aria-label="<?php esc_attr_e( 'Artículos recientes', 'animatek' ); ?>">
		<?php foreach ( $animatek_posts as $animatek_post ) : ?>
			<a class="ticker__item" href="<?php echo esc_url( get_permalink( $animatek_post ) ); ?>">
				<span class="ticker__img">
					<?php if ( has_post_thumbnail( $animatek_post ) ) : ?>
						<?php
						echo get_the_post_thumbnail(
							$animatek_post,
							'thumbnail',
							array(
								'alt'      => '',
								'loading'  => 'lazy',
								'decoding' => 'async',
							)
						);
						?>
					<?php else : ?>
						<span class="ticker__img-vacia" aria-hidden="true">A</span>
					<?php endif; ?>
				</span>
				<span class="ticker__texto">
					<span class="ticker__titulo"><?php echo esc_html( get_the_title( $animatek_post ) ); ?></span>
					<span class="ticker__fecha"><?php echo esc_html( get_the_date( 'd.m.Y', $animatek_post ) ); ?></span>
				</span>
			</a>
		<?php endforeach; ?>

		<a class="ticker__item ticker__item--todos" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">
			<span class="ticker__texto">
				<span class="ticker__titulo"><?php esc_html_e( 'Ver todos los artículos', 'animatek' ); ?></span>
			</span>
			<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6" /></svg>
		</a>
	</div>
</section>
