<?php
/**
 * Ficha de producto de SureCart (post type sc_product).
 *
 * Sin esta plantilla WordPress caía en single.php, que trata el producto como una
 * entrada del blog: tarjeta con fecha, "min de lectura" y autor, y el bloque de
 * SureCart metido en la columna de 720 px del texto, donde la columna de la imagen
 * se salía por encima del título. Además SureCart pinta su tema claro (texto oscuro)
 * sobre el fondo oscuro del sitio. Aquí se le da el ancho completo y los colores
 * de Animatek; los estilos viven en inc/animatek-surecart.php, compartidos con la tienda.
 *
 * @package Animatek
 */

get_header();
?>

<?php
require_once get_theme_file_path('inc/animatek-surecart.php');
animatek_surecart_estilos();
?>

<main class="min-h-screen pt-10 pb-16 md:pt-14 md:pb-24">
    <div class="max-w-6xl mx-auto px-4 md:px-6">
        <nav class="mb-8 text-sm text-slate-400" aria-label="<?php esc_attr_e('Migas', 'animatek'); ?>">
            <a href="<?php echo esc_url(home_url('/tienda/')); ?>" class="hover:text-white"><?php esc_html_e('Tienda', 'animatek'); ?></a>
            <span class="mx-2" aria-hidden="true">/</span>
            <span class="text-slate-200"><?php the_title(); ?></span>
        </nav>

        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('animatek-tienda'); ?>>
                <?php the_content(); ?>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php
get_footer();
