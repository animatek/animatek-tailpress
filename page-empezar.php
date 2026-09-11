<?php
/**
 * Template Name: Empezar
 *
 * "¿Por dónde empiezo?" — dos preguntas y una lista curada.
 *
 * El canal tiene más de cuatrocientos vídeos y la mitad son directos de dos
 * horas: quien llega nuevo no necesita un buscador, necesita que alguien le
 * diga por dónde. El recorrido y las listas están en inc/animatek-empezar.php;
 * los cursos salen de animatek_cursos(), así que los precios no se duplican.
 *
 * Todo se pinta en el HTML desde el principio y el JS solo enseña y esconde.
 * Así el buscador de Google lo ve, y funciona aunque el JS falle.
 *
 * @package Animatek
 */

require_once get_theme_file_path( 'inc/animatek-empezar.php' );
require_once get_theme_file_path( 'inc/animatek-cursos.php' );

$animatek_pasos       = animatek_empezar_pasos();
$animatek_resultados  = animatek_empezar_resultados();

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

    <div id="empezar" class="mx-auto max-w-4xl px-6 py-10 sm:py-14">

        <?php foreach ( $animatek_pasos as $animatek_clave => $animatek_paso ) : ?>
            <section
                class="empezar-panel"
                id="empezar-paso-<?php echo esc_attr( $animatek_clave ); ?>"
                data-panel="paso-<?php echo esc_attr( $animatek_clave ); ?>"
                <?php echo 'inicio' === $animatek_clave ? '' : 'hidden'; ?>>

                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-500">
                    Paso <?php echo esc_html( (string) $animatek_paso['paso'] ); ?> de 2
                </p>
                <h2 class="mt-2 mb-8 text-2xl sm:text-3xl font-black tracking-tight">
                    <?php echo esc_html( $animatek_paso['pregunta'] ); ?>
                </h2>

                <div class="grid gap-3">
                    <?php foreach ( $animatek_paso['opciones'] as $animatek_opcion ) : ?>
                        <button
                            type="button"
                            class="empezar-opcion"
                            <?php if ( isset( $animatek_opcion['siguiente'] ) ) : ?>
                                data-ir="paso-<?php echo esc_attr( $animatek_opcion['siguiente'] ); ?>"
                            <?php else : ?>
                                data-ir="res-<?php echo esc_attr( $animatek_opcion['resultado'] ); ?>"
                            <?php endif; ?>>
                            <span class="empezar-opcion__num"><?php echo esc_html( $animatek_opcion['num'] ); ?></span>
                            <span class="empezar-opcion__texto">
                                <span class="empezar-opcion__titulo"><?php echo esc_html( $animatek_opcion['texto'] ); ?></span>
                                <span class="empezar-opcion__detalle"><?php echo esc_html( $animatek_opcion['detalle'] ); ?></span>
                            </span>
                            <svg class="empezar-opcion__flecha" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6" /></svg>
                        </button>
                    <?php endforeach; ?>
                </div>

                <?php if ( 'inicio' !== $animatek_clave ) : ?>
                    <button type="button" class="empezar-volver" data-volver>
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M11 18l-6-6 6-6" /></svg>
                        Volver
                    </button>
                <?php endif; ?>
            </section>
        <?php endforeach; ?>

        <?php foreach ( $animatek_resultados as $animatek_clave => $animatek_res ) : ?>
            <section
                class="empezar-panel"
                id="empezar-res-<?php echo esc_attr( $animatek_clave ); ?>"
                data-panel="res-<?php echo esc_attr( $animatek_clave ); ?>"
                hidden>

                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-primary">Tu camino</p>
                <h2 class="mt-2 text-2xl sm:text-3xl font-black tracking-tight">
                    <?php echo esc_html( $animatek_res['titulo'] ); ?>
                </h2>
                <p class="mt-3 max-w-2xl leading-relaxed text-slate-600">
                    <?php echo esc_html( $animatek_res['texto'] ); ?>
                </p>

                <?php if ( ! empty( $animatek_res['enlaces'] ) ) : ?>
                    <div class="mt-8 grid gap-3 sm:grid-cols-2">
                        <?php foreach ( $animatek_res['enlaces'] as $animatek_enlace ) : ?>
                            <a class="empezar-recurso" href="<?php echo esc_url( home_url( $animatek_enlace['url'] ) ); ?>">
                                <span class="empezar-recurso__etiqueta">Gratis</span>
                                <span class="empezar-recurso__titulo"><?php echo esc_html( $animatek_enlace['titulo'] ); ?></span>
                                <span class="empezar-recurso__texto"><?php echo esc_html( $animatek_enlace['texto'] ); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if ( ! empty( $animatek_res['videos'] ) ) : ?>
                    <h3 class="mt-10 mb-4 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-500">
                        En este orden
                    </h3>
                    <ol class="empezar-videos">
                        <?php foreach ( $animatek_res['videos'] as $animatek_i => $animatek_video ) : ?>
                            <li>
                                <a href="https://www.youtube.com/watch?v=<?php echo esc_attr( $animatek_video['id'] ); ?>" target="_blank" rel="noopener noreferrer">
                                    <img
                                        src="https://i.ytimg.com/vi/<?php echo esc_attr( $animatek_video['id'] ); ?>/mqdefault.jpg"
                                        alt=""
                                        width="320" height="180" loading="lazy" decoding="async" />
                                    <span class="empezar-video__cuerpo">
                                        <span class="empezar-video__titulo">
                                            <span class="empezar-video__num"><?php echo esc_html( sprintf( '%02d', $animatek_i + 1 ) ); ?></span>
                                            <?php echo esc_html( $animatek_video['titulo'] ); ?>
                                        </span>
                                        <span class="empezar-video__meta">
                                            <?php if ( $animatek_video['min'] >= 60 ) : ?>
                                                <span class="empezar-video__pill">Directo</span>
                                            <?php endif; ?>
                                            <?php echo esc_html( animatek_empezar_duracion( (int) $animatek_video['min'] ) ); ?>
                                        </span>
                                    </span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                <?php endif; ?>

                <?php
                $animatek_cursos_res = empty( $animatek_res['cursos'] )
                    ? array()
                    : animatek_cursos_por_clave( $animatek_res['cursos'] );
                ?>
                <?php if ( $animatek_cursos_res ) : ?>
                    <h3 class="mt-10 mb-4 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-500">
                        Si quieres el camino ordenado
                    </h3>
                    <div class="grid gap-3 <?php echo count( $animatek_cursos_res ) > 1 ? 'sm:grid-cols-2' : ''; ?>">
                        <?php foreach ( $animatek_cursos_res as $animatek_curso ) : ?>
                            <a class="empezar-curso" href="<?php echo esc_url( $animatek_curso['url'] ); ?>">
                                <img src="<?php echo esc_url( $animatek_curso['imagen'] ); ?>" alt="" width="96" height="96" loading="lazy" decoding="async" />
                                <span class="empezar-curso__cuerpo">
                                    <span class="empezar-curso__etiqueta"><?php echo esc_html( $animatek_curso['etiqueta'] ); ?></span>
                                    <span class="empezar-curso__titulo"><?php echo esc_html( $animatek_curso['titulo'] ); ?></span>
                                    <span class="empezar-curso__texto"><?php echo esc_html( $animatek_curso['gancho'] ); ?></span>
                                </span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="mt-10 flex flex-wrap gap-3">
                    <button type="button" class="empezar-volver" data-volver>
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M11 18l-6-6 6-6" /></svg>
                        Volver
                    </button>
                    <button type="button" class="empezar-volver" data-reiniciar>
                        Empezar otra vez
                    </button>
                </div>
            </section>
        <?php endforeach; ?>

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
