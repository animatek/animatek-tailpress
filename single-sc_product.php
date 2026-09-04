<?php
/**
 * Producto de SureCart.
 *
 * Sin esta plantilla, WordPress pinta un producto con single.php, es decir, con
 * la plantilla del blog: fecha de publicación, "1 min de lectura", firma del
 * autor y navegación al post anterior y siguiente. Nada de eso pinta en una
 * ficha de venta, y encima metía el bloque de SureCart en una columna de 720px.
 *
 * Aquí solo montamos el contenedor: el bloque `surecart/product-page` ya trae
 * imagen, título, precio, descripción, cantidad y botón de compra, y se edita
 * desde la plantilla de producto de SureCart, no desde aquí.
 *
 * @package Animatek
 */

get_header();

while ( have_posts() ) :
	the_post();

	$colecciones = get_the_terms( get_the_ID(), 'sc_collection' );
	$coleccion   = ( ! is_wp_error( $colecciones ) && ! empty( $colecciones ) ) ? $colecciones[0] : null;
	?>

	<main id="primary" class="bg-slate-200 text-slate-900 min-h-screen pt-10 pb-16 md:pt-14 md:pb-24">
		<div class="max-w-6xl mx-auto px-4 md:px-6">

			<?php if ( $coleccion ) : ?>
				<nav class="mb-6 text-sm" aria-label="Migas de pan">
					<a href="<?php echo esc_url( get_term_link( $coleccion ) ); ?>"
						class="inline-flex items-center gap-1.5 text-slate-600 hover:text-primary transition-colors">
						<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
						</svg>
						<?php echo esc_html( $coleccion->name ); ?>
					</a>
				</nav>
			<?php endif; ?>

			<article <?php post_class( 'animatek-producto bg-white border border-slate-200 rounded-3xl shadow-sm p-6 md:p-10' ); ?>>
				<?php the_content(); ?>
			</article>

		</div>
	</main>

	<?php
endwhile;

get_footer();
