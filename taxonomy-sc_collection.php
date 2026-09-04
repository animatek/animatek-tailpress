<?php
/**
 * Colección de productos de SureCart.
 *
 * Sin esta plantilla, WordPress pinta el archivo de la taxonomía `sc_collection`
 * con index.php, o sea con la plantilla del blog: un "Collection: VCV RACK" con
 * el prefijo en inglés, la fecha, la firma del autor y un "Read more". Ni
 * precio, ni imagen, ni enlace a la ficha. Y ahí es justo donde llevan las migas
 * de pan de single-sc_product.php, así que se pisaba constantemente.
 *
 * El grid lo montan los bloques del propio plugin, no HTML nuestro: así el
 * precio, la imagen y el enlace salen de SureCart y no hay que replicar su
 * lógica. `surecart/product-list` detecta solo que está en un archivo de
 * taxonomía y filtra por el término (ProductListBlock::getQueryVars, rama
 * `is_tax()`), de ahí que no haga falta pasarle consulta.
 *
 * La tarjeta es la misma que usa el bloque de relacionados de la ficha, para
 * que las dos rejillas se vean igual y compartan el CSS de dark.css. Lo que no
 * se copia de la plantilla del plugin es su barra de tienda (orden, buscador,
 * filtros y botón de vista rápida): son cadenas en inglés que vienen escritas a
 * pelo en su HTML y aquí no aportan con cuatro productos en catálogo.
 *
 * @package Animatek
 */

get_header();

/*
 * Markup de bloques del listado. Va como cadena y no como plantilla de bloques
 * porque este es un tema clásico: no hay editor de plantillas donde tocarlo.
 */
$rejilla = <<<'HTML'
<!-- wp:surecart/product-list {"align":"wide","style":{"spacing":{"blockGap":"30px"}}} -->
<!-- wp:surecart/product-template {"align":"wide","style":{"spacing":{"blockGap":"30px"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":null}} -->
<!-- wp:group {"style":{"spacing":{"blockGap":"0px","padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}},"border":{"radius":"10px","color":"#9da4b030","width":"1px"},"dimensions":{"minHeight":"100%"}},"backgroundColor":"white","layout":{"type":"default"}} -->
<div class="wp-block-group has-border-color has-white-background-color has-background" style="border-color:#9da4b030;border-width:1px;border-radius:10px;min-height:100%;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px">
	<!-- wp:group {"style":{"color":{"background":"#0000000d"},"border":{"radius":{"topLeft":"10px","topRight":"10px","bottomLeft":"0px","bottomRight":"0px"}},"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"},"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group has-background" style="border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;background-color:#0000000d;margin-top:0px;margin-bottom:0px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px">
		<!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"isUserOverlayColor":true,"focalPoint":{"x":0.5,"y":0.5},"contentPosition":"top right","isDark":false,"style":{"dimensions":{"aspectRatio":"1"},"layout":{"selfStretch":"fit","flexSize":null},"spacing":{"margin":{"top":"0px","bottom":"0px"}},"border":{"radius":{"topLeft":"10px","topRight":"10px","bottomLeft":"0px","bottomRight":"0px"}}},"layout":{"type":"default"}} -->
		<div class="wp-block-cover is-light has-custom-content-position is-position-top-right" style="border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;margin-top:0px;margin-bottom:0px">
			<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
			<div class="wp-block-cover__inner-container">
				<!-- wp:surecart/product-sale-badge {"style":{"typography":{"fontSize":"12px"},"border":{"radius":"100px"}}} /-->
			</div>
		</div>
		<!-- /wp:cover -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"spacing":{"padding":{"right":"20px","left":"20px","top":"20px","bottom":"20px"},"blockGap":"10px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
	<div class="wp-block-group" style="padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px">
		<!-- wp:surecart/product-title {"level":2,"style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} /-->

		<!-- wp:group {"style":{"spacing":{"blockGap":"0.5em","margin":{"top":"0px","bottom":"0px"},"padding":{"right":"0px","left":"0px"}},"typography":{"lineHeight":"1"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px;padding-right:0px;padding-left:0px;line-height:1">
			<!-- wp:surecart/product-list-price {"style":{"typography":{"fontSize":"15px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"0px","top":"0px"}}}} /-->

			<!-- wp:surecart/product-scratch-price {"style":{"typography":{"fontSize":"15px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"0px","top":"0px"}}}} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- /wp:surecart/product-template -->
<!-- /wp:surecart/product-list -->
HTML;

$descripcion = term_description();
?>

<main id="primary" class="bg-slate-200 text-slate-900 min-h-screen pt-10 pb-16 md:pt-14 md:pb-24">
	<div class="max-w-6xl mx-auto px-4 md:px-6">

		<header class="mb-8 md:mb-10">
			<h1 class="text-3xl md:text-4xl font-bold tracking-tight"><?php single_term_title(); ?></h1>

			<?php if ( $descripcion ) : ?>
				<div class="mt-3 max-w-2xl text-slate-600"><?php echo wp_kses_post( $descripcion ); ?></div>
			<?php endif; ?>
		</header>

		<?php if ( ! have_posts() ) : ?>

			<p class="text-slate-600"><?php esc_html_e( 'Todavía no hay productos en esta colección.', 'animatek' ); ?></p>

		<?php elseif ( ! post_type_exists( 'sc_product' ) ) : ?>

			<?php // Sin SureCart activo los bloques no existen: listado escueto y a correr. ?>
			<ul class="space-y-3">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<li><a href="<?php the_permalink(); ?>" class="text-primary"><?php the_title(); ?></a></li>
				<?php endwhile; ?>
			</ul>

		<?php else : ?>

			<div class="animatek-coleccion">
				<?php echo do_blocks( $rejilla ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
			</div>

		<?php endif; ?>

	</div>
</main>

<?php
get_footer();
