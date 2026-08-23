<?php
/**
 * Template Name: Patch Lab 01
 *
 * Landing previa a la ficha de TutorLMS. Existe porque la ficha de Tutor no se
 * puede maquetar: aquí se cuenta el curso con calma y el botón manda allí.
 *
 * Para editarla, toca solo la configuración y los arrays de aquí arriba.
 * El maquetado de abajo se alimenta de ellos.
 */

get_header();

// ---------------------------------------------------------------------------
// Configuración
// ---------------------------------------------------------------------------

// ID del curso en TutorLMS. Con el ID puesto, el botón se convierte solo en
// "Seguir con el curso" para quien ya lo tenga (hace falta el snippet
// [animatek_curso_cta] en functions.php). Con 0, sale un enlace normal a la
// ficha y la página funciona igual.
//
// Sacado del HTML de la ficha: body class "postid-48666", data-course-id y el
// shortlink /?p=48666. En el admin es el ?post= de la URL al editar el curso.
$pl_course_id = 48666;

// Enlace de compra directo de SureCart, que es quien cobra de verdad. Salta la
// ficha y va al checkout. Vacío = el botón manda a la ficha, que es lo normal;
// esto es útil sobre todo para emails.
// https://animatek.net/pago/?line_items[0][price_id]=e6a630a0-f1a4-42f5-b5e8-df5c0cf50fbf&line_items[0][quantity]=1
$pl_url_compra = '';

$pl_precio    = '19 €';
$pl_url_ficha = home_url( '/cursos/patch-lab-01/' );
$pl_video_id  = 'KffWMFIlEoE';

// Cómo se pinta la llamada a la acción:
//
//   'boton'  Precio grande + botón de la landing. El precio lo pone $pl_precio,
//            o sea que hay que acordarse de cuadrarlo con el de TutorLMS.
//
//   'caja'   La caja de matriculación de TutorLMS, la misma de la ficha: botón
//            "Compra 45 €", nivel, total de inscritos y última actualización.
//            El precio sale de TutorLMS, así que NUNCA puede desmentir al
//            checkout. A cambio manda su estética, no la de la página.
//
// Las dos necesitan $pl_course_id y el snippet en functions.php. Si falta algo,
// cae al enlace normal a la ficha y la página sigue funcionando.
$pl_cta_modo = 'boton';

// Póster del vídeo. Se puede subir a la mediateca y cambiar esta URL.
$pl_video_poster = 'https://i.ytimg.com/vi/' . $pl_video_id . '/maxresdefault.jpg';

// Imágenes. Se resuelven contra la carpeta de subidas del propio sitio, así que
// la misma plantilla vale en local y en producción sin tocar el dominio.
//
// Hay que subir estos seis archivos a la mediateca. Los originales están en el
// repo de contenido, en PACK-01-PATCH-LAB/04-imagenes/:
//
//   patch-lab-01-hero.webp        <- arte-v5-lissajous.png (convertido a webp)
//   patch-lab-01-techno.webp      <- 01 - Techno Pactch.webp
//   patch-lab-01-noteseq16.webp   <- 02 - Note Seq16.webp
//   patch-lab-01-neutrinode.webp  <- 03 - Neutrinoiude.webp
//   patch-lab-01-slips-steps.webp <- 04 - Slips y Steps.webp
//   patch-lab-01-harmonic.webp    <- 05 - Harmonic Oscilator Patch.webp
$pl_uploads = wp_get_upload_dir();
$pl_img     = trailingslashit( $pl_uploads['baseurl'] ) . '2026/08/';
$pl_hero_bg = $pl_img . 'patch-lab-01-hero.webp';

// ---------------------------------------------------------------------------
// Las seis lecciones. La 00 se pinta aparte porque no es un patch: es la
// plantilla de la que salen los demás.
// ---------------------------------------------------------------------------
$pl_leccion_cero = [
    'num'      => '00',
    'titulo'   => 'Plantilla base de techno',
    'duracion' => '11:53',
    'texto'    => 'El reloj, las divisiones, el mezclador y los envíos de efectos ya montados. La lección más corta y probablemente la que más tiempo te va a ahorrar. Van dos plantillas, de 8 y de 16 pasos.',
];

$pl_lecciones = [
    [
        'num'      => '01',
        'titulo'   => 'Techno Patch',
        'duracion' => '27:17',
        'imagen'   => $pl_img . 'patch-lab-01-techno.webp',
        'alt'      => 'Captura del patch de techno terminado en VCV Rack: relojes, mezclador MixMaster, tres Trummor 2 y dos voces de FM-OP.',
        'texto'    => 'Un track de techno completo: 30 módulos entre percusión, bajo, voces, filtro de Surge y delay sincronizado con Chronoblob. Aquí se ve cómo se ordena un patch grande para que no acabe siendo una maraña.',
        'chips'    => [ 'Trummor 2', 'MixMaster', 'Surge XT', 'Chronoblob' ],
    ],
    [
        'num'      => '02',
        'titulo'   => 'Autogenerativo con NoteSeq16',
        'duracion' => '20:31',
        'imagen'   => $pl_img . 'patch-lab-01-noteseq16.webp',
        'alt'      => 'Captura del patch autogenerativo con NoteSeq16: la matriz de notas de JW Modules alimentando cuatro voces de FM-OP.',
        'texto'    => 'NoteSeq16 como motor melódico, con cuatro voces de FM-OP y una de ellas con la secuencia invertida. El final de ciclo dispara el random y Chances decide cuándo. La clave no es la aleatoriedad: es acotarla para que el resultado siga teniendo sentido musical.',
        'chips'    => [ 'NoteSeq16', 'FM-OP', 'Chances' ],
    ],
    [
        'num'      => '03',
        'titulo'   => 'Autogenerativo con Neutrinode',
        'duracion' => '17:30',
        'imagen'   => $pl_img . 'patch-lab-01-neutrinode.webp',
        'alt'      => 'Captura del patch autogenerativo con Neutrinode: la red de nodos de Sha-Bang repartida en cuatro voces con filtros Lateralus.',
        'texto'    => 'Secuencias aleatorias con Neutrinode, repartidas por salida polifónica en dos voces distintas (Bleak y FM-OP). Un sistema que puedes dejar sonando y que no se repite. Lleva demo de sonido dentro del curso.',
        'chips'    => [ 'Neutrinode', 'Bleak', 'Lateralus' ],
    ],
    [
        'num'      => '04',
        'titulo'   => 'Slips y Steps',
        'duracion' => '29:55',
        'imagen'   => $pl_img . 'patch-lab-01-slips-steps.webp',
        'alt'      => 'Captura del patch Slips y Steps: los módulos de alefsbits añadiendo variación y probabilidad sobre una base de techno.',
        'texto'    => 'La lección más larga. Techno con slips y steps de alefsbits para meter variación y probabilidad en la secuencia, de forma que el patch evolucione sin que tengas que tocarlo.',
        'chips'    => [ 'alefsbits', 'Probabilidad', 'MixMaster' ],
    ],
    [
        'num'      => '05',
        'titulo'   => 'Harmonic Oscillator',
        'duracion' => '20:10',
        'imagen'   => $pl_img . 'patch-lab-01-harmonic.webp',
        'alt'      => 'Captura del patch Harmonic Oscillator: ocho octavadores entrando en un Merge, cuantizador y Plaits, con reverb de Surge.',
        'texto'    => 'Ocho octavadores a un Merge, de ahí a un cuantizador y a Plaits, todo a un MixMaster con dos LFOs moviendo volúmenes y reverb de Surge. Un drone armónico que se sostiene solo.',
        'chips'    => [ 'Plaits', 'Merge', 'Surge Reverb' ],
    ],
];

// ---------------------------------------------------------------------------
// Qué se lleva además de los vídeos
// ---------------------------------------------------------------------------
$pl_incluye = [
    [
        'titulo' => 'Los 5 archivos .vcv',
        'texto'  => 'Los patches terminados, con el código de colores de cables de Animatek. Para abrirlos, destriparlos y romperlos.',
        'icono'  => 'M4 4h7l2 2h7v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z',
    ],
    [
        'titulo' => '2 plantillas de techno',
        'texto'  => 'De 8 y de 16 pasos, con reloj, divisiones, mezclador y envíos ya montados. Empiezas por la parte divertida.',
        'icono'  => 'M3 6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2zM3 10h18M9 10v10',
    ],
    [
        'titulo' => '7 selecciones de voz',
        'texto'  => 'FM-OP, Bleak, Pony, Nano y las dos de Harmonic Oscillator. Copiar, pegar en cualquier patch y ya suena.',
        'icono'  => 'M12 3v10.55A4 4 0 1 0 14 17V7h4V3z',
    ],
    [
        'titulo' => 'Guía «Cómo leer un patch Animatek»',
        'texto'  => '9 páginas en PDF con el código de colores y el orden en que se lee un rack ajeno sin perderse.',
        'icono'  => 'M6 2h9l5 5v15H6zM15 2v5h5M9 13h6M9 17h6',
    ],
    [
        'titulo' => 'La lista de los 26 plugins',
        'texto'  => 'Todos gratuitos y desde la biblioteca oficial de VCV, con el orden de instalación. 16 de ellos sirven para los cinco patches.',
        'icono'  => 'M4 6h16M4 12h16M4 18h10',
    ],
    [
        'titulo' => '3 píldoras y una demo',
        'texto'  => 'Multiplicar un LFO con 8vert, probabilidades con Chances y macros con PatchMaster. Más la demo de sonido de Neutrinode.',
        'icono'  => 'M12 21a9 9 0 1 1 0-18 9 9 0 0 1 0 18zM10 8.5l6 3.5-6 3.5z',
    ],
];

// ---------------------------------------------------------------------------
// Para quién sí y para quién todavía no
// ---------------------------------------------------------------------------
$pl_para_ti = [
    'Ya entiendes los fundamentos (VCO, VCF, VCA, envolventes, 1V/oct) y ahora quieres hacer música con ellos.',
    'Tienes VCV Rack lleno de patches empezados y ninguno terminado.',
    'Te has quedado atrapado en los módulos Fundamental y no sabes por dónde entrar a la biblioteca.',
    'Quieres ver un patch grande ordenado por dentro, no un ejemplo de tres módulos.',
];

$pl_no_para_ti = [
    'Si estás empezando de cero. Este curso da por sabidas las piezas básicas.',
    'Si aún no tienes claro qué hace un VCA o qué es 1V/oct.',
    'Si lo que buscas es teoría de síntesis explicada módulo a módulo.',
];

$pl_requisitos = [
    'Un ordenador — Windows, Mac o Linux',
    'VCV Rack 2.6.6 o superior — descarga gratuita en vcvrack.com',
    'Funciona con VCV Rack Free. No hace falta Rack Pro',
    '26 plugins, todos gratuitos y desde la biblioteca oficial de VCV',
];

// ---------------------------------------------------------------------------
// Helpers de pintado
// ---------------------------------------------------------------------------
$pl_flecha = '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7 7 7-7 7"/></svg>';

$pl_check = '<svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-4 w-4 shrink-0 text-emerald-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>';

$pl_cruz = '<svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-4 w-4 shrink-0 text-rose-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M18 6L6 18"/></svg>';

/**
 * El botón de compra. Si hay ID de curso y el shortcode está registrado, sale
 * el botón de dos estados; si no, un enlace normal a la ficha.
 */
$pl_cta = static function ( $texto ) use ( $pl_course_id, $pl_precio, $pl_url_ficha, $pl_flecha ) {
    if ( $pl_course_id && shortcode_exists( 'animatek_curso_cta' ) ) {
        return do_shortcode(
            sprintf(
                '[animatek_curso_cta id="%d" precio="%s"]',
                $pl_course_id,
                esc_attr( $pl_precio )
            )
        );
    }

    return sprintf(
        '<a class="btn-primary" href="%s">%s %s</a>',
        esc_url( $pl_url_ficha ),
        esc_html( $texto ),
        $pl_flecha
    );
};

/**
 * La caja de matriculación de TutorLMS, si el modo 'caja' está activo y hay de
 * dónde sacarla. Devuelve cadena vacía si no, para que el llamador use $pl_cta.
 */
$pl_caja = static function () use ( $pl_cta_modo, $pl_course_id ) {
    if ( 'caja' !== $pl_cta_modo || ! $pl_course_id || ! shortcode_exists( 'animatek_caja_curso' ) ) {
        return '';
    }

    return do_shortcode( sprintf( '[animatek_caja_curso id="%d"]', $pl_course_id ) );
};
?>

<main id="primary" class="bg-slate-50 text-slate-900 dark:bg-slate-950 dark:text-slate-100">

    <!-- 1. HERO -->
    <section class="relative overflow-hidden bg-slate-950">
        <div class="absolute inset-0 bg-cover bg-center opacity-40" style="background-image:url('<?php echo esc_url( $pl_hero_bg ); ?>')" aria-hidden="true"></div>
        <div class="absolute inset-0 pointer-events-none opacity-30 hero-grid"></div>
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -left-24 -top-32 h-72 w-72 rounded-full bg-primary/20 blur-3xl"></div>
            <div class="absolute -right-16 -bottom-32 h-72 w-72 rounded-full bg-amber-300/15 blur-3xl"></div>
        </div>

        <div class="relative mx-auto grid max-w-7xl items-center gap-10 px-6 py-12 sm:px-10 sm:py-16 lg:grid-cols-2 lg:gap-14">

            <div class="space-y-5">
                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">
                    Curso · VCV Rack · Nivel intermedio
                </p>

                <h1 class="text-[34px] font-black leading-[1.05] tracking-tight text-white sm:text-5xl lg:text-6xl">
                    Patch Lab 01
                </h1>

                <p class="max-w-md text-[17px] leading-relaxed text-slate-300 sm:text-xl">
                    Cinco patches completos de VCV Rack, construidos desde cero y cable a cable.
                </p>

                <div class="flex flex-wrap items-center gap-x-3 gap-y-1.5 font-mono text-[13px] tabular-nums text-slate-400">
                    <span>2h07 de vídeo</span>
                    <span aria-hidden="true" class="text-slate-600">·</span>
                    <span>6 lecciones</span>
                    <span aria-hidden="true" class="text-slate-600">·</span>
                    <span>5 archivos .vcv</span>
                    <span aria-hidden="true" class="text-slate-600">·</span>
                    <span>VCV Rack gratuito</span>
                </div>

                <?php $pl_caja_hero = $pl_caja(); ?>

                <?php if ( $pl_caja_hero ) : ?>
                    <div class="tutor-box max-w-sm pt-2">
                        <?php echo $pl_caja_hero; // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    </div>
                <?php else : ?>
                    <div class="flex flex-wrap items-center gap-5 pt-2">
                        <span class="text-[44px] font-black leading-none tracking-tight text-white tabular-nums">
                            <?php echo esc_html( $pl_precio ); ?>
                        </span>
                        <?php echo $pl_cta( 'Ver el curso' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    </div>
                <?php endif; ?>

                <p class="font-mono text-[13px] text-slate-400">
                    Pago único · acceso inmediato y para siempre · sin suscripción
                </p>
            </div>

            <!--
                Póster en vez de iframe a propósito: LiteSpeed Cache aplica lazy
                load a los iframes y el embed se descuadra (ver la nota del
                reproductor de Tutor en app.css). Además carga mucho más rápido
                y no mete las cookies de YouTube en la página.
            -->
            <a href="https://www.youtube.com/watch?v=<?php echo esc_attr( $pl_video_id ); ?>"
               target="_blank" rel="noopener"
               class="group relative block aspect-video overflow-hidden rounded-2xl border border-white/10 bg-slate-950 shadow-2xl transition duration-300 hover:-translate-y-1 hover:border-primary/50">

                <img src="<?php echo esc_url( $pl_video_poster ); ?>"
                     alt="<?php esc_attr_e( 'Los cinco patches de Patch Lab 01 sonando en VCV Rack', 'animatek' ); ?>"
                     class="h-full w-full object-cover opacity-75 transition duration-500 group-hover:scale-105 group-hover:opacity-100"
                     loading="lazy" width="1280" height="720">

                <span class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/20 to-transparent"></span>

                <span class="absolute left-1/2 top-1/2 flex h-[72px] w-[72px] -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full border border-white/50 bg-slate-950/50 pl-1 text-white backdrop-blur transition duration-300 group-hover:scale-105 group-hover:border-white group-hover:bg-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5.14v13.72a1 1 0 0 0 1.54.84l10.5-6.86a1 1 0 0 0 0-1.68L9.54 4.3A1 1 0 0 0 8 5.14z"/></svg>
                </span>

                <span class="absolute inset-x-5 bottom-4 flex flex-wrap items-baseline gap-x-3 gap-y-1 font-mono text-[13px] text-slate-300">
                    <strong class="text-sm font-semibold text-white">Escucha los cinco patches</strong>
                    <span class="tabular-nums">9:28 · sin voz, solo el sonido</span>
                </span>
            </a>

        </div>
    </section>

    <!-- 2. DÓNDE ENCAJA -->
    <section class="mx-auto max-w-3xl px-6 py-10 sm:px-10 sm:py-14">
        <div class="rounded-2xl border border-white/10 bg-slate-900 p-6 font-mono text-[15px] leading-relaxed text-slate-200 shadow-xl sm:p-8">
            <div class="mb-5 flex gap-1.5" aria-hidden="true">
                <span class="h-2.5 w-2.5 rounded-full bg-rose-500"></span>
                <span class="h-2.5 w-2.5 rounded-full bg-amber-400"></span>
                <span class="h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
            </div>

            <p><span class="text-teal-300">~/animatek $</span> dónde encaja este curso</p>
            <p class="mt-3.5">
                Este no es el curso principal. El principal es el
                <a href="<?php echo esc_url( home_url( '/cursos/vcv-rack-desde-cero/' ) ); ?>" class="font-semibold text-white underline decoration-primary decoration-2 underline-offset-4">Curso VCV Rack desde cero</a>,
                y ahí se explican las piezas una a una.
            </p>
            <p class="mt-3.5">
                Este es <b class="font-semibold text-white">el taller de después</b>: cinco patches
                terminados para ver cómo se monta una máquina entera.
                <span class="text-slate-400">Práctico, corto y barato.</span>
            </p>
        </div>
    </section>

    <!-- 3. EL PROBLEMA -->
    <section class="mx-auto max-w-3xl px-6 py-8 sm:px-10 sm:py-12">
        <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-primary">Acerca de este curso</p>
        <h2 class="mt-3 text-2xl font-black leading-tight tracking-tight text-slate-900 sm:text-3xl dark:text-white">
            Ya sabes qué hace un VCA. Y aun así no terminas nada.
        </h2>

        <div class="mt-5 space-y-4 text-[17px] leading-relaxed text-slate-600 dark:text-slate-300">
            <p class="text-lg font-medium text-slate-800 sm:text-xl dark:text-slate-200">
                Abres VCV Rack, empiezas a meter módulos y a la media hora tienes algo que suena
                pero que no va a ninguna parte. Lo dejas ahí. Al día siguiente abres uno nuevo.
            </p>
            <p>
                Ese es el hueco que llena este curso. No es la teoría otra vez. Son cinco patches
                completos, de principio a fin, construidos delante de ti y explicando por qué va
                cada cable donde va.
            </p>
            <p>
                Un techno entero con su bombo, su bajo, sus voces y su mezcla. Dos sistemas
                autogenerativos que se tocan solos sin sonar a ruido aleatorio. Un drone armónico
                con ocho octavadores. Y antes de nada, una plantilla base para que no vuelvas a
                empezar desde el rack vacío.
            </p>
            <p>
                Aquí está la trampa de los fundamentos: entender las piezas por separado no te
                enseña a montar la máquina. Eso solo se aprende viendo montar máquinas enteras.
                Por eso ninguna lección corta antes de que el patch suene.
            </p>
        </div>
    </section>

    <!-- 4. LAS LECCIONES -->
    <section id="lecciones" class="bg-white py-10 sm:py-16 dark:bg-slate-900/40">
        <div class="mx-auto max-w-7xl px-6 sm:px-10">

            <div class="max-w-2xl">
                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-primary">Qué vas a construir</p>
                <h2 class="mt-3 text-2xl font-black leading-tight tracking-tight text-slate-900 sm:text-3xl dark:text-white">
                    Seis lecciones. Cada una es un patch entero.
                </h2>
                <p class="mt-3 text-[17px] leading-relaxed text-slate-600 dark:text-slate-400">
                    De rack vacío a patch sonando. Las capturas son los patches reales del curso,
                    tal y como acaban.
                </p>
            </div>

            <!-- Lección 00: va aparte porque no es un patch, es la plantilla -->
            <div class="mt-8 flex flex-col gap-4 rounded-2xl border border-slate-200 border-l-[3px] border-l-amber-400 bg-white p-6 shadow-sm sm:flex-row sm:items-center sm:gap-7 sm:p-7 dark:border-white/10 dark:border-l-amber-400 dark:bg-slate-900">
                <span class="font-mono text-2xl font-bold leading-none tabular-nums text-amber-500">
                    <?php echo esc_html( $pl_leccion_cero['num'] ); ?>
                </span>
                <div class="flex-1 space-y-1">
                    <h3 class="text-xl font-extrabold leading-tight text-slate-900 dark:text-white">
                        <?php echo esc_html( $pl_leccion_cero['titulo'] ); ?>
                    </h3>
                    <p class="text-[15px] leading-relaxed text-slate-600 dark:text-slate-400">
                        <?php echo esc_html( $pl_leccion_cero['texto'] ); ?>
                    </p>
                </div>
                <span class="shrink-0 font-mono text-[15px] tabular-nums text-slate-500 dark:text-slate-400">
                    <?php echo esc_html( $pl_leccion_cero['duracion'] ); ?>
                </span>
            </div>

            <!-- Los cinco patches -->
            <div class="mt-6 grid gap-6">
                <?php foreach ( $pl_lecciones as $i => $leccion ) : ?>
                    <article class="group grid overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-primary/30 hover:shadow-xl hover:shadow-primary/10 lg:grid-cols-[320px_minmax(0,1fr)] dark:border-white/10 dark:bg-slate-900">

                        <div class="relative min-h-[200px] overflow-hidden bg-slate-950 <?php echo ( $i % 2 ) ? 'lg:order-2' : ''; ?>">
                            <img src="<?php echo esc_url( $leccion['imagen'] ); ?>"
                                 alt="<?php echo esc_attr( $leccion['alt'] ); ?>"
                                 class="h-full w-full object-cover object-top opacity-90 transition duration-500 group-hover:scale-[1.03] group-hover:opacity-100"
                                 loading="lazy">
                        </div>

                        <div class="flex flex-col gap-3 p-6 sm:p-8">
                            <div class="flex flex-wrap items-baseline gap-x-3.5 gap-y-1">
                                <span class="font-mono text-lg font-bold tabular-nums text-primary">
                                    <?php echo esc_html( $leccion['num'] ); ?>
                                </span>
                                <h3 class="text-xl font-extrabold leading-tight tracking-tight text-slate-900 sm:text-[22px] dark:text-white">
                                    <?php echo esc_html( $leccion['titulo'] ); ?>
                                </h3>
                                <span class="ml-auto font-mono text-[15px] tabular-nums text-slate-500 dark:text-slate-400">
                                    <?php echo esc_html( $leccion['duracion'] ); ?>
                                </span>
                            </div>

                            <p class="text-[15px] leading-relaxed text-slate-600 dark:text-slate-300">
                                <?php echo esc_html( $leccion['texto'] ); ?>
                            </p>

                            <div class="mt-1 flex flex-wrap gap-1.5">
                                <?php foreach ( $leccion['chips'] as $chip ) : ?>
                                    <span class="rounded-full border border-primary/20 bg-primary/10 px-2.5 py-1 font-mono text-[12px] text-primary dark:border-primary/30 dark:text-blue-300">
                                        <?php echo esc_html( $chip ); ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

        </div>
    </section>

    <!-- 5. QUÉ TE LLEVAS -->
    <section class="mx-auto max-w-7xl px-6 py-10 sm:px-10 sm:py-16">
        <div class="max-w-2xl">
            <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-primary">Incluido</p>
            <h2 class="mt-3 text-2xl font-black leading-tight tracking-tight text-slate-900 sm:text-3xl dark:text-white">
                Qué te llevas además de los vídeos
            </h2>
        </div>

        <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            <?php foreach ( $pl_incluye as $item ) : ?>
                <div class="flex flex-col gap-2 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:border-primary/30 hover:shadow-lg dark:border-white/10 dark:bg-slate-900">
                    <span class="text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="<?php echo esc_attr( $item['icono'] ); ?>"/>
                        </svg>
                    </span>
                    <h3 class="text-[17px] font-bold leading-tight text-slate-900 dark:text-white">
                        <?php echo esc_html( $item['titulo'] ); ?>
                    </h3>
                    <p class="text-[15px] leading-relaxed text-slate-600 dark:text-slate-400">
                        <?php echo esc_html( $item['texto'] ); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- 6. PARA QUIÉN -->
    <section class="bg-white py-10 sm:py-16 dark:bg-slate-900/40">
        <div class="mx-auto max-w-7xl px-6 sm:px-10">

            <div class="max-w-2xl">
                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-primary">Antes de comprar</p>
                <h2 class="mt-3 text-2xl font-black leading-tight tracking-tight text-slate-900 sm:text-3xl dark:text-white">
                    Mira si este curso es para ti
                </h2>
                <p class="mt-3 text-[17px] leading-relaxed text-slate-600 dark:text-slate-400">
                    Prefiero que no lo compres a que lo compres y no te sirva.
                </p>
            </div>

            <div class="mt-8 grid gap-6 lg:grid-cols-2">

                <div class="flex flex-col gap-4 rounded-2xl border border-slate-200 border-t-[3px] border-t-emerald-500 bg-white p-7 shadow-sm dark:border-white/10 dark:border-t-emerald-500 dark:bg-slate-900">
                    <h3 class="text-xl font-extrabold text-slate-900 dark:text-white">Sí, este es tu sitio</h3>
                    <ul class="flex flex-col gap-3">
                        <?php foreach ( $pl_para_ti as $punto ) : ?>
                            <li class="flex gap-3 text-[15px] leading-relaxed text-slate-600 dark:text-slate-300">
                                <?php echo $pl_check; // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                <span><?php echo esc_html( $punto ); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="flex flex-col gap-4 rounded-2xl border border-slate-200 border-t-[3px] border-t-rose-500 bg-white p-7 shadow-sm dark:border-white/10 dark:border-t-rose-500 dark:bg-slate-900">
                    <h3 class="text-xl font-extrabold text-slate-900 dark:text-white">No, todavía no</h3>
                    <ul class="flex flex-col gap-3">
                        <?php foreach ( $pl_no_para_ti as $punto ) : ?>
                            <li class="flex gap-3 text-[15px] leading-relaxed text-slate-600 dark:text-slate-300">
                                <?php echo $pl_cruz; // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                <span><?php echo esc_html( $punto ); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <p class="mt-auto text-[15px] leading-relaxed text-slate-600 dark:text-slate-300">
                        Empieza por el
                        <a href="<?php echo esc_url( home_url( '/cursos/vcv-rack-desde-cero/' ) ); ?>" class="font-semibold text-primary hover:underline">Curso VCV Rack desde cero</a>
                        (29 €) y vuelve después. No pasa nada, es el orden natural.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- 7. REQUISITOS -->
    <section class="mx-auto max-w-3xl px-6 py-10 sm:px-10 sm:py-14">
        <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-primary">Lo que necesitas</p>
        <h2 class="mt-3 text-2xl font-black leading-tight tracking-tight text-slate-900 sm:text-3xl dark:text-white">
            Todo gratis menos el curso
        </h2>

        <ul class="mt-5 flex flex-col gap-2.5 rounded-2xl border border-slate-200 bg-white p-6 font-mono text-[15px] text-slate-600 shadow-sm sm:p-7 dark:border-white/10 dark:bg-slate-900 dark:text-slate-300">
            <?php foreach ( $pl_requisitos as $req ) : ?>
                <li class="flex gap-3">
                    <?php echo $pl_check; // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <span><?php echo esc_html( $req ); ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <!-- 8. JAVI -->
    <section class="bg-white py-10 sm:py-16 dark:bg-slate-900/40">
        <div class="mx-auto grid max-w-3xl gap-6 px-6 sm:grid-cols-[auto_minmax(0,1fr)] sm:gap-8 sm:px-10">

            <span class="flex h-20 w-20 shrink-0 items-center justify-center rounded-full border border-white/10 bg-slate-950 font-mono text-2xl font-bold text-blue-300">
                JM
            </span>

            <div class="space-y-4">
                <div>
                    <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-primary">Quién te lo cuenta</p>
                    <h2 class="mt-1.5 text-2xl font-black tracking-tight text-slate-900 dark:text-white">Javier Melgar</h2>
                </div>

                <p class="text-[15px] leading-relaxed text-slate-600 dark:text-slate-300">
                    Más de 25 años haciendo música electrónica. Empecé en los 90 con una TB-303 y
                    una TR-909 y desde entonces no he parado: producción, síntesis, proyectos como
                    MIGA, Ruido Vírico y The Netlab, y más de una década dando clase.
                </p>
                <p class="text-[15px] leading-relaxed text-slate-600 dark:text-slate-300">
                    Los patches de este curso salen de mis directos. Aquí están rehechos con calma,
                    ordenados y explicados paso a paso.
                </p>

                <div class="flex flex-wrap gap-2">
                    <?php foreach ( [ 'Bitwig Certified Trainer', 'Autor de UZZ', 'Canal de YouTube en español' ] as $cred ) : ?>
                        <span class="rounded-full border border-primary/20 bg-primary/10 px-3 py-1 text-xs font-semibold text-primary dark:border-primary/30 dark:text-blue-300">
                            <?php echo esc_html( $cred ); ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </section>

    <!-- 9. CTA FINAL -->
    <section class="mx-auto max-w-7xl px-6 py-10 sm:px-10 sm:py-16">
        <div class="relative flex flex-col items-center gap-5 overflow-hidden rounded-3xl bg-slate-950 px-6 py-14 text-center sm:px-10">

            <div class="absolute inset-0 pointer-events-none opacity-30 hero-grid"></div>
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute -left-20 -top-24 h-64 w-64 rounded-full bg-primary/20 blur-3xl"></div>
                <div class="absolute -right-16 -bottom-24 h-64 w-64 rounded-full bg-amber-300/10 blur-3xl"></div>
            </div>

            <p class="relative text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">Patch Lab 01</p>

            <h2 class="relative max-w-xl text-3xl font-black leading-tight tracking-tight text-white sm:text-4xl">
                Cinco patches terminados, no cinco explicaciones
            </h2>

            <p class="relative max-w-lg text-[17px] leading-relaxed text-slate-300">
                2h07 de vídeo, los cinco archivos, las plantillas y la guía. Un pago y ya es tuyo.
            </p>

            <?php $pl_caja_final = $pl_caja(); ?>

            <?php if ( ! $pl_caja_final ) : ?>
                <span class="relative text-[52px] font-black leading-none tracking-tight text-white tabular-nums">
                    <?php echo esc_html( $pl_precio ); ?>
                </span>
            <?php endif; ?>

            <div class="relative <?php echo $pl_caja_final ? 'tutor-box w-full max-w-sm text-left' : ''; ?>">
                <?php
                echo $pl_caja_final
                    ? $pl_caja_final                          // phpcs:ignore WordPress.Security.EscapeOutput
                    : $pl_cta( 'Ver el curso y comprarlo' );  // phpcs:ignore WordPress.Security.EscapeOutput
                ?>
            </div>

            <p class="relative font-mono text-[13px] leading-relaxed text-slate-400">
                Pago único · acceso inmediato y para siempre<br>
                ¿Dudas antes de comprar? Escríbeme y te digo si te sirve.
            </p>
        </div>
    </section>

</main>

<?php
get_footer();
