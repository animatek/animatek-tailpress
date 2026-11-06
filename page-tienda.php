<?php
/**
 * La tienda (/tienda/): el listado de productos de SureCart.
 *
 * Con page.php el listado iba dentro de la tarjeta de texto de una página normal y con el
 * tema claro de SureCart. Aquí va a todo el ancho, con cabecera propia y los estilos
 * compartidos con las fichas (inc/animatek-surecart.php).
 *
 * @package Animatek
 */

get_header();
require_once get_theme_file_path('inc/animatek-surecart.php');
animatek_surecart_estilos();
?>

<main class="min-h-screen pt-12 pb-16 md:pt-16 md:pb-24">
    <div class="max-w-6xl mx-auto px-4 md:px-6">
        <?php while (have_posts()) : the_post(); ?>
            <header class="mb-10 md:mb-14">
                <p class="text-sm font-semibold uppercase tracking-widest text-[#2C7FFF]"><?php esc_html_e('Animatek', 'animatek'); ?></p>
                <h1 class="mt-2 text-4xl md:text-5xl font-extrabold leading-tight text-white"><?php the_title(); ?></h1>
                <p class="mt-4 max-w-2xl text-lg leading-relaxed text-slate-400">
                    <?php echo has_excerpt()
                        ? wp_kses_post(get_the_excerpt())
                        : esc_html__('Cursos, talleres, patches y software para VCV Rack, Bitwig y el Nord Modular G1. Pago único, sin suscripciones.', 'animatek'); ?>
                </p>
            </header>

            <article id="post-<?php the_ID(); ?>" <?php post_class('animatek-tienda'); ?>>
                <?php the_content(); ?>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php
get_footer();
