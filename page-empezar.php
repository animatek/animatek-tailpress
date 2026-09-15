<?php
/**
 * Template Name: Empezar
 *
 * "¿Por dónde empiezo?" — el enrutador, en su página propia.
 *
 * Es el enlace para pegar en las descripciones de YouTube. El recorrido y las
 * listas están en inc/animatek-empezar.php y los pinta
 * template-parts/block-enrutador.php, que es el mismo que vive dentro del Lab.
 *
 * Aquí cada resultado empuja al Lab, que es lo único de todo esto que deja un
 * correo en la lista; los vídeos se abren dentro de la página para no regalar
 * la visita a YouTube.
 *
 * @package Animatek
 */

get_header();
?>

<main id="primary" class="bg-slate-50 text-slate-900">

    <section class="relative overflow-hidden bg-slate-950">
        <div class="absolute inset-0 pointer-events-none opacity-40 hero-grid"></div>
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -left-24 -top-32 h-64 w-64 rounded-full bg-primary/15 blur-3xl"></div>
            <div class="absolute -right-16 -bottom-32 h-64 w-64 rounded-full bg-emerald-300/10 blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-4xl px-6 sm:px-10 py-10 sm:py-14 text-center space-y-4">
            <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Animatek · Por dónde empiezo</p>
            <h1 class="text-[28px] sm:text-4xl font-black leading-[1.1] tracking-tight text-white">
                Dime en qué punto estás y te digo qué ver
            </h1>
            <p class="mx-auto max-w-2xl text-[15px] sm:text-lg leading-relaxed text-slate-300">
                Hay más de cuatrocientos vídeos en el canal y no todos valen para ti hoy. Dos preguntas y te doy una lista corta, en orden, con lo gratis por delante.
            </p>
        </div>
    </section>

    <div class="mx-auto max-w-4xl px-6 py-10 sm:py-14">
        <?php
        get_template_part(
            'template-parts/block-enrutador',
            null,
            array(
                'contexto' => 'publico',
                'nivel'    => 'h2',
            )
        );
        ?>

        <p class="mt-12 border-t border-slate-200 pt-6 text-sm leading-relaxed text-slate-500">
            Nada de esto hay que pagarlo para empezar: el canal, los Labs y el
            <a href="<?php echo esc_url( home_url( '/glosario/' ) ); ?>">glosario</a> son gratis y se quedan donde están.
            Si prefieres un camino ordenado en vez de ir picoteando, están los
            <a href="<?php echo esc_url( home_url( '/academia/' ) ); ?>">cursos</a>.
        </p>
    </div>
</main>

<?php
get_footer();
