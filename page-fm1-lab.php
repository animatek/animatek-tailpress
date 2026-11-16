<?php
/**
 * Template Name: FM-1 Lab
 *
 * La guía gratuita del M-VAVE FM-1, detrás del formulario de la lista «FM-1» (lista 24 de Brevo).
 * Mismo mecanismo y mismo diseño que el VCV Rack Lab: brevo-locker + contenido bloqueado en secciones
 * numeradas (`seccion-1`…), y origen-video.php (dentro del locker) guarda de qué vídeo viene con
 * ?utm_content=<id>.
 *
 * El PDF que se manda por correo sale de imprimir esta misma página: los estilos de impresión quitan
 * el bloqueo, la cabecera, la franja de Labs y las secciones que no tienen sentido en papel.
 *
 * Fuentes: el repo FM1-Animatek (docs/01 a 04), la lista de fm1-emu y el README de m-flasher.
 * Los firmwares cambian cada semana: la sección 5 lleva la fecha.
 */

/** El PDF de la guía, en el S3 de los cursos (lo sube Javier). Vacío = no se enseña el botón. */
const ANIMATEK_FM1_LAB_PDF    = 'https://animatekcursos.s3.us-east-2.amazonaws.com/guia-fm1-animatek.pdf';
const ANIMATEK_FM1_AFILIADO   = 'https://link.amazon/B0gLGJn4G';
const ANIMATEK_FM1_EMU        = 'https://joakimeriksson.github.io/fm1-emu/';

get_header();

/* Piezas de diseño del VCV Lab, para no repetirlas en cada sección. */
$seccion   = 'max-w-7xl mx-auto px-6 mb-[6.25rem] scroll-mt-24';
$caja      = 'bg-white rounded-[1.75rem] border border-slate-200 dark:border-slate-700/50 shadow-sm overflow-hidden relative p-8 sm:p-12';
$texto     = 'text-slate-600 dark:text-slate-300 leading-relaxed';
$enlace    = 'text-primary hover:text-primary/80 no-underline border-b border-primary/20 hover:border-primary';
$tarjeta   = 'flex items-center p-4 rounded-xl bg-slate-50 dark:bg-slate-800/40 border border-slate-200 dark:border-slate-700/50 hover:border-slate-400 hover:bg-white dark:hover:bg-slate-800/60 transition-all group shadow-sm';
$panel     = 'bg-slate-50 dark:bg-slate-800/40 p-6 rounded-2xl border border-slate-200 dark:border-slate-700/50';
$mini      = 'bg-white p-5 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm';
$etiqueta  = 'inline-block px-2 py-1 rounded text-[10px] font-bold bg-slate-100 dark:bg-slate-800/40 text-slate-700 mb-2 uppercase tracking-wider';
$boton     = 'inline-flex items-center justify-center rounded-full bg-primary hover:bg-primary/90 text-white font-bold py-2.5 px-5 text-xs transition-colors shadow-md shadow-primary/20';
$boton2    = 'inline-flex items-center justify-center rounded-full border border-slate-300 dark:border-slate-600 text-slate-700 dark:text-slate-200 hover:border-primary hover:text-primary font-bold py-2.5 px-5 text-xs transition-colors';

/** Los iconos de las secciones (heroicons, trazo 1.5). */
$iconos = [
    'chip'     => 'M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 002.25-2.25V6.75a2.25 2.25 0 00-2.25-2.25H6.75A2.25 2.25 0 004.5 6.75v10.5a2.25 2.25 0 002.25 2.25zm.75-12h9v9h-9v-9z',
    'check'    => 'M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
    'shield'   => 'M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z',
    'upload'   => 'M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5',
    'squares'  => 'M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z',
    'music'    => 'M9 9l10.5-3m0 6.553v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 11-.99-3.467l2.31-.66a2.25 2.25 0 001.632-2.163zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 01-.99-3.467l2.31-.66A2.25 2.25 0 009 15.553z',
    'stack'    => 'M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3',
    'monitor'  => 'M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25',
    'lifebuoy' => 'M16.712 4.33a9.027 9.027 0 011.652 1.306c.51.51.944 1.064 1.306 1.652M16.712 4.33l-3.448 4.138m3.448-4.138a9.014 9.014 0 00-9.424 0M19.67 7.288l-4.138 3.448m4.138-3.448a9.014 9.014 0 010 9.424m-4.138-5.976a3.736 3.736 0 00-.88-1.388 3.737 3.737 0 00-1.388-.88m2.268 2.268a3.765 3.765 0 010 2.528m-2.268-4.796a3.765 3.765 0 00-2.528 0m4.796 4.796c-.181.506-.475.982-.88 1.388a3.736 3.736 0 01-1.388.88m2.268-2.268l4.138 3.448m0 0a9.027 9.027 0 01-1.306 1.652c-.51.51-1.064.944-1.652 1.306m0 0l-3.448-4.138m3.448 4.138a9.014 9.014 0 01-9.424 0m5.976-4.138a3.765 3.765 0 01-2.528 0m0 0a3.736 3.736 0 01-1.388-.88 3.737 3.737 0 01-.88-1.388m2.268 2.268L7.288 19.67m0 0a9.024 9.024 0 01-1.652-1.306 9.027 9.027 0 01-1.306-1.652m0 0l4.138-3.448M4.33 16.712a9.014 9.014 0 010-9.424m4.138 5.976a3.765 3.765 0 010-2.528m0 0c.181-.506.475-.982.88-1.388a3.736 3.736 0 011.388-.88m-2.268 2.268L4.33 7.288m6.406 1.18L7.288 4.33m0 0a9.024 9.024 0 00-1.652 1.306A9.025 9.025 0 004.33 7.288',
    'play'     => 'M21 12a9 9 0 11-18 0 9 9 0 0118 0z M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z',
    'heart'    => 'M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z',
];

/** Cabecera de sección al estilo del VCV Lab: número, icono y título. */
$titulo = static function ( int $n, string $icono, string $texto, string $extra = '' ) use ( $iconos ): void {
    ?>
    <h2 class="mb-8 flex items-center gap-3 relative z-10 text-2xl sm:text-3xl <?php echo esc_attr( $extra ); ?>">
        <span class="w-8 h-8 rounded-full bg-primary/10 text-primary text-sm font-bold flex items-center justify-center shrink-0"><?php echo (int) $n; ?></span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden sm:block w-8 h-8 text-primary shrink-0" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="<?php echo esc_attr( $iconos[ $icono ] ); ?>" />
        </svg>
        <?php echo esc_html( $texto ); ?>
    </h2>
    <?php
};

/** Enlace externo con el estilo de texto del Lab. */
$ext = static function ( string $url, string $txt ) use ( $enlace ): string {
    return '<a href="' . esc_url( $url ) . '" target="_blank" rel="noopener" class="' . esc_attr( $enlace ) . '">' . esc_html( $txt ) . '</a>';
};

/* Los firmwares de la sección 5: [nombre, autor, qué es, id del emulador, código]. */
$firmwares = [
    'Grooveboxes: hacer temas enteros' => [
        [ 'SLOOP', 'isod89', 'Groovebox en directo de cuatro pistas en loop. El más popular de todos, y la base de muchos otros.', 'sloop', 'https://github.com/isod89/sloop-fm1' ],
        [ 'LOOM-8', 'Charles Vestal', 'Ocho pistas sobre nueve motores, inspirada en el OP-XY de Teenage Engineering.', 'loom', 'https://github.com/charlesvestal/fm1-loom' ],
        [ 'Skiff', 'illuminus5', 'Seis pistas, catorce motores de sinte y batería, secuenciador de 64 pasos con acordes y ratchets.', 'skiff', 'https://github.com/illuminus5/skiff' ],
        [ 'JIANT', 'juanjiant-bit', 'Groovebox «biosintética»: seis pistas dibujadas como seres vivos y un FM de seis operadores de Dexed.', 'jiant', 'https://github.com/juanjiant-bit/JIANT' ],
    ],
    'Sintes para tocar' => [
        [ 'Clipper', 'isod89', 'El sinte profundo: 23 motores y 407 sonidos, de FM de seis operadores a wavetables, un Juno y modelado físico, con editor web.', 'clipper', 'https://github.com/isod89/clipper-fm1' ],
        [ 'Melodee', 'keremimo', 'Para tocar a gusto: escalas microtonales, un Casio CZ-1 y un Dexed, grabación sin cuantizar.', 'melodee', 'https://github.com/keremimo/melodee' ],
        [ 'Felucca', 'Hügelton', 'El firmware abierto original, del que salieron muchos: FM de cuatro operadores, secuenciador, arpegiador y efectos.', 'felucca', 'https://github.com/hugelton/Felucca' ],
        [ 'Mini-Tone', 'Stéphane Schmitz', 'Felucca con seis pistas y motores nuevos: SID, los 48 modelos de Braids, una 303 y guiños a Elektron.', 'minitone', 'https://github.com/eldontyrellcorp/Mini-Tone' ],
    ],
    'Que suene solo, acordes y modular' => [
        [ 'AMB-1', 'Charles Vestal', 'Ambient generativo inspirado en Music for Airports de Eno. No se toca: se cuida.', 'amb', 'https://github.com/charlesvestal/fm1-amb' ],
        [ 'FoMni', 'Charles Vestal', 'Un arpa de acordes estilo Omnichord: mantienes un acorde y rasgueas las teclas.', 'fomni', 'https://github.com/charlesvestal/fm1-fomni' ],
        [ 'HERA', 'Ben Badio', 'Groovebox de acordes al estilo del Roland J-6: cien juegos de acordes y frases sobre un sinte tipo Juno.', 'hera', 'https://github.com/benbadio/hera-fm1' ],
        [ 'Kitten Rack', 'Black Kitten Devices', 'Un modular dentro del FM-1: más de 50 módulos estilo Eurorack conectados con cables en la propia pantalla.', 'kittenrack', 'https://github.com/BlackKittenDevices/kitten-rack' ],
    ],
];

/* Los vídeos de la sección 10. */
$videos = [
    [ 'tHdZthKB6Uw', 'El sintetizador de 70 € que ha vuelto loca a la industria', '22:43', 'La historia', 'Del chip de altavoz Bluetooth a más de 150 firmwares en cinco semanas, y qué significa para los sintes.' ],
    [ 'uMQZTRQruyA', 'Un mini Serum GRATIS en un sinte de 70 €', '10:16', 'SHRUB', 'Quién es Steve Duda, cómo se instala SHRUB y su editor en el navegador.' ],
    [ 'aSCG8NeZyHw', 'FM-1 con ATEK303: mi 303 portátil sincronizado en Bitwig', '1:45:52', 'Directo', 'El ATEK303 en el FM-1, sincronizado con Bitwig y tocado en directo.' ],
];
?>

<style>
    /* El PDF es para leer en pantalla: página ancha, para que salgan las rejillas de escritorio. */
    @page { size: 1280px 1810px; margin: 0; }
    @media print {
        header, footer, #labs-banner, #locker-gate, .fixed, .sticky, .cookie-banner, #cookie-law-info-bar, .fm1-no-print {
            display: none !important;
        }
        body { background: white !important; color: black !important; }
        main { background: white !important; }
        #locked-content {
            filter: none !important; opacity: 1 !important; height: auto !important;
            overflow: visible !important; pointer-events: auto !important; user-select: auto !important;
        }
        #locked-content > .absolute { display: none !important; }
        #locked-content > section { break-before: page; margin-bottom: 0 !important; }
        #locked-content > section:first-of-type { break-before: auto; }
        .animatek-hero-section { padding-top: 3rem !important; padding-bottom: 3rem !important; margin-bottom: 1rem !important; }
        .shadow-sm, .shadow-md, .shadow-xl { box-shadow: none !important; }
        .blur-3xl { display: none !important; }
    }
</style>

<main id="primary" class="bg-slate-200 text-slate-900">

    <!-- Hero -->
    <section class="animatek-hero-section relative overflow-hidden mb-24 px-6 sm:px-10 py-32 text-slate-50"
        style="background-image: linear-gradient(135deg, rgba(15,23,42,0.93), rgba(15,23,42,0.72)), url('https://i.ytimg.com/vi/tHdZthKB6Uw/maxresdefault.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="relative max-w-7xl mx-auto grid gap-12 lg:grid-cols-[1.4fr_1fr] items-center z-10">
            <div class="space-y-6">
                <span class="inline-flex items-center gap-2 px-3 py-1 text-xs font-bold tracking-[0.18em] uppercase border border-white/20 rounded-full bg-white/10 text-white">
                    FM-1 Lab
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight text-white">
                    FM-1 Starter Pack <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-cyan-300">v1.0</span>
                </h1>
                <p class="text-xl text-slate-300 leading-relaxed max-w-3xl">
                    Todo lo que necesitas para sacarle partido al M-VAVE FM-1: cambiar de firmware sin miedo,
                    los que merecen la pena, probarlos sin tener el sinte y qué hacer si se queda bloqueado.
                </p>
                <ul class="flex flex-wrap gap-3 text-sm font-semibold text-slate-200">
                    <li class="rounded-full border border-white/15 bg-white/5 px-3 py-1">11 secciones</li>
                    <li class="rounded-full border border-white/15 bg-white/5 px-3 py-1">12 firmwares para probar en el navegador</li>
                    <li class="rounded-full border border-white/15 bg-white/5 px-3 py-1">Guía web + PDF</li>
                </ul>
            </div>
            <div class="hidden lg:block">
                <div class="rounded-2xl overflow-hidden border border-white/15 shadow-2xl shadow-black/40">
                    <picture>
                        <source srcset="<?php echo esc_url( get_theme_file_uri( 'images/atek303-fm1-web.webp' ) ); ?>" type="image/webp">
                        <img src="<?php echo esc_url( get_theme_file_uri( 'images/atek303-fm1-web.png' ) ); ?>" alt="El FM-1 en el navegador con el ATEK303 sonando" width="1280" height="816" class="w-full h-auto">
                    </picture>
                </div>
            </div>
        </div>
    </section>

    <?php
    get_template_part('template-parts/brevo-locker', null, [
        'form_action' => 'https://a2fe0a0a.sibforms.com/serve/MUIFANVvPBn6DoxeDot0Iiesawn3FxKMB7i1w2VMLdE_xqDrBwbqoAdO7yQsEFr7IjJ3scl8qqkPFaOFN6cQb0FNZ5XC2DjPJ5_ktTOYAa0-IYe4gOljtCmc4Ele4ZyMkxix1_vyTjLAoyUqvtPa2QRw5OQgAV4n_hp7HKYCvjL4Yhf5K0MlGDKWjamip2zLI3FFlmnrnakCKawH',
        'storage_key' => 'fm1_lab_unlocked',
        'title'       => 'Desbloquea la guía completa del FM-1 + recibe el PDF',
        'description' => 'Deja tu email y se abren aquí mismo las 11 secciones, <strong>gratis</strong>. Te mando también el PDF. Solo te escribiré de cosas del FM-1: firmwares nuevos, trucos y vídeos.',
        'email_label' => 'Tu email',
    ]);
    ?>

    <!-- CONTENIDO BLOQUEADO -->
    <div id="locked-content" class="relative transition-all duration-1000 filter blur-xl grayscale opacity-20 h-[600px] overflow-hidden select-none pointer-events-none">
        <div class="absolute inset-0 z-10 bg-gradient-to-b from-transparent to-white/80"></div>

        <?php if ( ANIMATEK_FM1_LAB_PDF ) : ?>
        <div class="fm1-no-print max-w-7xl mx-auto px-6 mb-10 flex flex-wrap items-center justify-center gap-3">
            <a href="<?php echo esc_url( ANIMATEK_FM1_LAB_PDF ); ?>" class="<?php echo esc_attr( $boton ); ?> text-sm py-3 px-6" download>
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                Descargar la guía en PDF
            </a>
            <a href="#seccion-10" class="<?php echo esc_attr( $boton2 ); ?> text-sm py-3 px-6">Ver los vídeos del FM-1</a>
        </div>
        <?php endif; ?>

        <!-- 1. Qué es el FM-1 -->
        <section id="seccion-1" class="<?php echo esc_attr( $seccion ); ?>">
            <div class="<?php echo esc_attr( $caja ); ?>">
                <?php $titulo( 1, 'chip', 'Qué es el FM-1 y por qué todo el mundo habla de él' ); ?>

                <div class="grid gap-10 lg:grid-cols-[1.3fr_1fr]">
                    <div class="space-y-4 text-lg <?php echo esc_attr( $texto ); ?>">
                        <p>El <strong>M-VAVE FM-1</strong> es un sinte de bolsillo de unos 70 €. De fábrica es un FM de cuatro operadores al estilo DX7: 27 teclas, siete encoders, pantalla a color, altavoz y USB-C.</p>
                        <p>Lo curioso es lo que lleva dentro. El chip no es de sintes: es un <strong>JieLi AC791N</strong>, el mismo tipo de chip que mueve los altavoces Bluetooth baratos. Poco, pero suficiente para sonar muy bien si el código está bien hecho.</p>
                        <p>Y aquí viene lo bueno: las actualizaciones <strong>no van firmadas</strong>. El sinte acepta cualquier firmware bien empaquetado. En cuanto alguien se dio cuenta, a finales de septiembre de 2026, la comunidad se puso a escribir los suyos. En cinco semanas había <strong>más de 150</strong>. Y M-VAVE, en vez de cerrarlo, publicó su propio código.</p>
                        <p>Así que el FM-1 ya no es un sinte: es una caja que puede ser muchos sintes.</p>
                    </div>

                    <div class="<?php echo esc_attr( $panel ); ?> self-start">
                        <h3 class="text-lg font-bold text-slate-800 mb-4">La máquina, en corto</h3>
                        <dl class="grid grid-cols-2 gap-3 text-sm">
                            <?php
                            foreach ( [
                                'Chip'      => 'JieLi AC791N',
                                'CPU'       => '2 núcleos a 240 MHz',
                                'Memoria'   => '1 MB de flash',
                                'Audio'     => '44,1 kHz estéreo',
                                'Pantalla'  => '240 × 240, color',
                                'Teclado'   => '27 teclas',
                                'Controles' => '7 encoders, 14 botones',
                                'Conexiones'=> 'USB-C, MIDI TRS, Bluetooth',
                            ] as $k => $v ) :
                                ?>
                                <div class="<?php echo esc_attr( $mini ); ?> p-3">
                                    <dt class="text-[11px] font-bold uppercase tracking-wider text-slate-500"><?php echo esc_html( $k ); ?></dt>
                                    <dd class="font-semibold text-slate-800"><?php echo esc_html( $v ); ?></dd>
                                </div>
                            <?php endforeach; ?>
                        </dl>
                    </div>
                </div>

                <h3 class="text-xl font-bold text-slate-800 mt-12 mb-6">La comunidad, por dónde moverte</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <?php
                    $comunidad = [
                        [ 'https://www.youtube.com/@animatek', 'YouTube Animatek', 'Los vídeos del FM-1 y los directos', 'group-hover:bg-red-600', 'M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z' ],
                        [ 'https://discord.gg/emUkHRrvtk', 'Discord Animatek', 'Pregunta y enseña lo que haces', 'group-hover:bg-indigo-600', 'M20.317 4.37a19.79 19.79 0 00-4.885-1.515.074.074 0 00-.079.037c-.21.375-.444.865-.608 1.25a18.27 18.27 0 00-5.487 0 12.64 12.64 0 00-.617-1.25.077.077 0 00-.079-.037A19.74 19.74 0 003.677 4.37a.07.07 0 00-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 00.031.057 19.9 19.9 0 005.993 3.03.078.078 0 00.084-.028c.462-.63.874-1.295 1.226-1.994a.076.076 0 00-.041-.106 13.1 13.1 0 01-1.872-.892.077.077 0 01-.008-.128c.126-.094.252-.192.372-.291a.074.074 0 01.078-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 01.078.01c.12.099.246.198.373.292a.077.077 0 01-.006.127 12.3 12.3 0 01-1.873.892.077.077 0 00-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 00.084.028 19.84 19.84 0 006.002-3.03.077.077 0 00.032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 00-.031-.03z' ],
                        [ 'https://www.reddit.com/r/MVaveFM1/', 'r/MVaveFM1', 'La comunidad grande, en inglés', 'group-hover:bg-orange-600', 'M12 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0zm5.01 4.744c.688 0 1.25.561 1.25 1.249a1.25 1.25 0 0 1-2.498.056l-2.597-.547-.8 3.747c1.824.07 3.48.632 4.674 1.488.308-.309.73-.491 1.207-.491.968 0 1.754.786 1.754 1.754 0 .716-.435 1.333-1.01 1.614a3.111 3.111 0 0 1 .042.52c0 2.694-3.13 4.87-7.004 4.87-3.874 0-7.004-2.176-7.004-4.87 0-.183.015-.366.043-.534A1.748 1.748 0 0 1 4.028 12c0-.968.786-1.754 1.754-1.754.463 0 .898.196 1.207.49 1.207-.883 2.878-1.43 4.744-1.487l.885-4.182a.342.342 0 0 1 .14-.197.35.35 0 0 1 .238-.042l2.906.617a1.214 1.214 0 0 1 1.108-.701z' ],
                        [ 'https://thefirmwarehub.com/', 'The Firmware Hub', 'Muchos firmwares y la vuelta al oficial', 'group-hover:bg-emerald-600', 'M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z' ],
                        [ 'https://github.com/cicloid/awesome-fm-1', 'awesome-fm-1', 'Lista cuidada de todo lo que sale', 'group-hover:bg-slate-900', 'M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12' ],
                        [ home_url( '/fm1/' ), 'Firmwares de Animatek', 'El ATEK303 y lo que venga', 'group-hover:bg-primary', 'M9 9l10.5-3m0 6.553v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 11-.99-3.467l2.31-.66a2.25 2.25 0 001.632-2.163zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 01-.99-3.467l2.31-.66A2.25 2.25 0 009 15.553z' ],
                    ];
                    foreach ( $comunidad as [ $url, $nombre, $sub, $hover, $path ] ) :
                        $propio = 0 === strpos( $url, home_url() );
                        ?>
                        <a href="<?php echo esc_url( $url ); ?>" <?php echo $propio ? '' : 'target="_blank" rel="noopener"'; ?> class="<?php echo esc_attr( $tarjeta ); ?>">
                            <span class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800/40 text-slate-600 flex items-center justify-center mr-4 shrink-0 group-hover:text-white transition-all <?php echo esc_attr( $hover ); ?>">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="<?php echo esc_attr( $path ); ?>" /></svg>
                            </span>
                            <span>
                                <span class="block font-bold text-slate-800"><?php echo esc_html( $nombre ); ?></span>
                                <span class="block text-sm text-slate-500"><?php echo esc_html( $sub ); ?></span>
                            </span>
                        </a>
                    <?php endforeach; ?>
                </div>

                <!-- ¿Dónde se compra? -->
                <div class="mt-10 flex flex-col gap-5 rounded-2xl border border-amber-300/60 bg-amber-50 dark:bg-amber-500/10 dark:border-amber-500/30 p-6 sm:flex-row sm:items-center">
                    <div class="flex-1">
                        <p class="font-bold text-slate-900 dark:text-white mb-1">¿Todavía no lo tienes?</p>
                        <p class="text-sm <?php echo esc_attr( $texto ); ?>">
                            Ronda los 70 €. Si lo compras desde mi enlace de Amazon, a ti te cuesta lo mismo y a mí me
                            llega una pequeña comisión que ayuda a seguir haciendo esto.
                        </p>
                        <p class="text-[11px] text-slate-500 mt-2">Como afiliado de Amazon, obtengo ingresos por las compras adscritas que cumplen los requisitos aplicables.</p>
                    </div>
                    <a href="<?php echo esc_url( ANIMATEK_FM1_AFILIADO ); ?>" target="_blank" rel="sponsored noopener" class="<?php echo esc_attr( $boton ); ?> text-sm py-3 px-6 shrink-0">
                        Ver el FM-1 en Amazon
                    </a>
                </div>
            </div>
        </section>

        <!-- 2. Antes de instalar nada -->
        <section id="seccion-2" class="<?php echo esc_attr( $seccion ); ?>">
            <div class="<?php echo esc_attr( $caja ); ?>">
                <?php $titulo( 2, 'check', 'Antes de instalar nada' ); ?>
                <p class="text-lg mb-8 max-w-3xl <?php echo esc_attr( $texto ); ?>">Cambiar de firmware es fácil y casi siempre sale bien. Pero cinco minutos de preparación te ahorran un susto.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <?php
                    $checks = [
                        [ '01', 'Haz una copia de seguridad', 'La primera vez, copia la memoria entera del FM-1 con M-Flasher (sección 3). Tarda unos minutos y es tu seguro para siempre.' ],
                        [ '02', 'Exporta tus sonidos', 'Cada firmware guarda sus datos a su manera y el nuevo pisa los del anterior. Si tienes presets que te gustan, sácalos antes.' ],
                        [ '03', 'Batería cargada', 'Que no se apague a mitad de instalación.' ],
                        [ '04', 'Cable directo, sin hub', 'Del FM-1 al ordenador, con un cable USB de datos (no uno de solo carga).' ],
                        [ '05', 'Chrome o Edge', 'Los instaladores web van por WebMIDI, y Firefox o Safari no siempre lo traen.' ],
                        [ '06', 'No toques nada', 'Mientras instala, ni el cable ni los botones. Son un par de minutos.' ],
                    ];
                    foreach ( $checks as [ $n, $t, $d ] ) :
                        ?>
                        <div class="<?php echo esc_attr( $mini ); ?>">
                            <span class="text-primary font-black text-2xl"><?php echo esc_html( $n ); ?></span>
                            <strong class="block text-slate-900 mt-1 mb-2"><?php echo esc_html( $t ); ?></strong>
                            <p class="text-sm text-slate-500 leading-relaxed"><?php echo esc_html( $d ); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- 3. M-Flasher -->
        <section id="seccion-3" class="<?php echo esc_attr( $seccion ); ?>">
            <div class="<?php echo esc_attr( $caja ); ?>">
                <?php $titulo( 3, 'shield', 'M-Flasher: copia de seguridad, reinstalar y rescatar' ); ?>

                <div class="grid gap-10 lg:grid-cols-2 items-start">
                    <div class="space-y-4 text-lg <?php echo esc_attr( $texto ); ?>">
                        <p><strong>M-Flasher</strong>, de Julius Vitkauskas, es la herramienta que le recomendaría a cualquiera. Es un programa con ventana, gratis y de código abierto (MIT), para <strong>Windows, Mac y Linux</strong>. Nada de terminal.</p>
                        <ul class="list-disc pl-6 space-y-2 text-base">
                            <li><strong>Copia de seguridad</strong> de la memoria entera, y restaurarla.</li>
                            <li><strong>Instalar firmware</strong> desde los paquetes <code>.fwsc</code> de M-VAVE, tal cual los bajas.</li>
                            <li>Un <strong>mapa de la memoria</strong> que te enseña qué va a cambiar antes de escribir nada.</li>
                            <li>Comprueba que el paquete es para tu modelo y verifica todo lo que escribe.</li>
                            <li>Funciona aunque el firmware esté roto, porque habla con el modo de descarga del chip.</li>
                        </ul>
                        <p class="text-base">Sirve también para el <strong>Fame MiniFM</strong> (el FM-1 con otra marca) y para los teclados SMK-37 Pro y Elite.</p>
                        <div class="flex flex-wrap gap-3 pt-2">
                            <a href="https://jvitkauskas.github.io/m-apps/flasher/" target="_blank" rel="noopener" class="<?php echo esc_attr( $boton ); ?>">Descargar M-Flasher</a>
                            <a href="https://jvitkauskas.github.io/m-apps/flasher/guide/" target="_blank" rel="noopener" class="<?php echo esc_attr( $boton2 ); ?>">Guía paso a paso (inglés)</a>
                        </div>
                    </div>
                    <figure class="rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-700/50 shadow-sm">
                        <img src="https://raw.githubusercontent.com/jvitkauskas/m-flasher/HEAD/docs/screenshot.jpg" alt="M-Flasher conectado a un FM-1 en modo descarga: el panel del aparato, las operaciones y el mapa de la memoria" class="w-full h-auto">
                        <figcaption class="text-xs text-slate-500 p-3 bg-slate-50">M-Flasher conectado a un FM-1. Captura de su repositorio.</figcaption>
                    </figure>
                </div>

                <div class="<?php echo esc_attr( $panel ); ?> mt-10">
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Cómo se pone en modo descarga</h3>
                    <p class="text-sm text-slate-600 mb-6">Depende de lo que tenga dentro. Conéctalo con cable de datos y:</p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="<?php echo esc_attr( $mini ); ?>">
                            <span class="<?php echo esc_attr( $etiqueta ); ?>">Oficial o Felucca</span>
                            <strong class="block text-slate-900 mb-1">Solo conéctalo</strong>
                            <p class="text-xs text-slate-500">M-Flasher lo encuentra por USB MIDI y su botón <strong>DOWNLOAD MODE</strong> lo cambia de modo.</p>
                        </div>
                        <div class="<?php echo esc_attr( $mini ); ?>">
                            <span class="<?php echo esc_attr( $etiqueta ); ?>">Felucca, SLOOP…</span>
                            <strong class="block text-slate-900 mb-1">OCT− y OCT+ 5 segundos</strong>
                            <p class="text-xs text-slate-500">Con el firmware funcionando, mantén las dos teclas de octava.</p>
                        </div>
                        <div class="<?php echo esc_attr( $mini ); ?>">
                            <span class="<?php echo esc_attr( $etiqueta ); ?>">Con m-bootloader</span>
                            <strong class="block text-slate-900 mb-1">REC al encender</strong>
                            <p class="text-xs text-slate-500">Mantén REC mientras lo enciendes. <?php echo $ext( 'https://github.com/jvitkauskas/m-bootloader', 'm-bootloader' ); ?> se instala desde M-Flasher y añade un menú de rescate.</p>
                        </div>
                    </div>
                    <p class="text-slate-800 font-bold border-t border-slate-200 dark:border-slate-700/50 pt-4 mt-6 text-center">
                        Recomendación: lo primero que hagas con M-Flasher, una copia de seguridad. Guárdala en dos sitios.
                    </p>
                </div>
                <p class="text-xs text-slate-500 mt-4">No es oficial: no tiene relación con M-VAVE ni con JieLi. Hace una copia antes de escribir y comprueba cada escritura, pero se usa bajo tu responsabilidad.</p>
            </div>
        </section>

        <!-- 4. Cómo se cambia de firmware -->
        <section id="seccion-4" class="<?php echo esc_attr( $seccion ); ?>">
            <div class="<?php echo esc_attr( $caja ); ?>">
                <?php $titulo( 4, 'upload', 'Cómo se cambia de firmware' ); ?>
                <p class="text-lg mb-8 max-w-3xl <?php echo esc_attr( $texto ); ?>">Un firmware del FM-1 viene en un archivo <code>.fwsc</code> y se instala por USB. Hay tres caminos. Elige el tuyo:</p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                    <a href="https://thefirmwarehub.com/" target="_blank" rel="noopener" class="<?php echo esc_attr( $mini ); ?> hover:border-slate-400 transition-colors block">
                        <span class="<?php echo esc_attr( $etiqueta ); ?>">El más fácil</span>
                        <strong class="block text-slate-900 text-lg mb-2">The Firmware Hub</strong>
                        <p class="text-sm text-slate-500">Muchos firmwares en una sola web. Conectas, eliges, instalas. Y tiene un botón para <strong>volver al oficial</strong>.</p>
                    </a>
                    <div class="<?php echo esc_attr( $mini ); ?>">
                        <span class="<?php echo esc_attr( $etiqueta ); ?>">Desde su web</span>
                        <strong class="block text-slate-900 text-lg mb-2">El instalador de cada uno</strong>
                        <p class="text-sm text-slate-500">Muchos autores tienen su página con un botón de instalar. SHRUB, por ejemplo, desde <?php echo $ext( 'https://shrub.audio/', 'shrub.audio' ); ?>: «Install on FM-1», aceptas el permiso MIDI y esperas.</p>
                    </div>
                    <a href="https://jvitkauskas.github.io/m-apps/flasher/" target="_blank" rel="noopener" class="<?php echo esc_attr( $mini ); ?> hover:border-slate-400 transition-colors block">
                        <span class="<?php echo esc_attr( $etiqueta ); ?>">Con un archivo</span>
                        <strong class="block text-slate-900 text-lg mb-2">M-Flasher</strong>
                        <p class="text-sm text-slate-500">Si tienes el <code>.fwsc</code> descargado, incluido el oficial de M-VAVE. Es también el camino para dejarlo como venía.</p>
                    </a>
                </div>

                <div class="rounded-2xl border border-primary/30 bg-primary/5 dark:bg-primary/10 p-6">
                    <p class="<?php echo esc_attr( $texto ); ?>">
                        <strong class="text-slate-900 dark:text-white">Un truco que conviene saber.</strong>
                        Muchos firmwares de la comunidad (los de la familia Felucca, que son la mayoría) traen un <strong>modo de rescate</strong>:
                        si mantienes <strong>OCT−</strong> mientras enciendes, arranca solo el actualizador, sin sonido, y desde ahí instalas otro.
                        Si el firmware falla dos veces al arrancar, entra solo en ese modo.
                    </p>
                </div>
            </div>
        </section>

        <!-- 5. Qué firmware probar -->
        <section id="seccion-5" class="<?php echo esc_attr( $seccion ); ?>">
            <div class="<?php echo esc_attr( $caja ); ?>">
                <?php $titulo( 5, 'squares', 'Qué firmware probar según lo que quieras hacer' ); ?>
                <p class="text-lg mb-2 max-w-3xl <?php echo esc_attr( $texto ); ?>">Hay más de 150 y salen nuevos cada semana, así que esto no es una lista completa: es por dónde empezaría yo. Todos se pueden <strong>probar en el navegador</strong> antes de instalarlos.</p>
                <p class="text-xs text-slate-500 mb-10">Selección de noviembre de 2026.</p>

                <?php foreach ( $firmwares as $grupo => $lista ) : ?>
                    <h3 class="text-xl font-bold text-slate-800 mb-5 mt-10 first:mt-0"><?php echo esc_html( $grupo ); ?></h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                        <?php foreach ( $lista as [ $nombre, $autor, $que, $emu, $codigo ] ) : ?>
                            <div class="flex flex-col rounded-2xl border border-slate-200 bg-slate-50 dark:border-slate-700/50 dark:bg-slate-800/40 p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-primary/40 hover:shadow-lg hover:shadow-primary/10">
                                <strong class="text-lg text-slate-900 dark:text-white"><?php echo esc_html( $nombre ); ?></strong>
                                <span class="text-xs font-semibold text-primary mb-3"><?php echo esc_html( $autor ); ?></span>
                                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed flex-1"><?php echo esc_html( $que ); ?></p>
                                <div class="flex flex-wrap gap-2 mt-4">
                                    <a href="<?php echo esc_url( ANIMATEK_FM1_EMU . '?fw=' . $emu ); ?>" target="_blank" rel="noopener" class="<?php echo esc_attr( $boton ); ?> py-2 px-4">▶ Probar</a>
                                    <a href="<?php echo esc_url( $codigo ); ?>" target="_blank" rel="noopener" class="<?php echo esc_attr( $boton2 ); ?> py-2 px-4">Código</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>

                <!-- SHRUB aparte: no es abierto ni va en el emulador -->
                <div class="mt-12 grid gap-6 rounded-2xl border border-slate-200 dark:border-slate-700/50 bg-slate-900 text-white p-6 sm:p-8 md:grid-cols-[1fr_1.4fr] items-center">
                    <a href="https://youtu.be/uMQZTRQruyA" target="_blank" rel="noopener" class="block rounded-xl overflow-hidden">
                        <img src="https://i.ytimg.com/vi/uMQZTRQruyA/hqdefault.jpg" alt="Vídeo: un mini Serum gratis en un sinte de 70 €, SHRUB para M-VAVE FM-1" class="w-full aspect-video object-cover">
                    </a>
                    <div>
                        <span class="inline-block px-2 py-1 rounded text-[10px] font-bold bg-white/10 mb-2 uppercase tracking-wider">Aparte: SHRUB</span>
                        <h3 class="text-2xl font-bold mb-3 text-white">El mini Serum de Steve Duda</h3>
                        <p class="text-slate-300 leading-relaxed mb-4">El creador de Serum lo ha metido en el FM-1: dos osciladores con las wavetables de Serum, los filtros de Serum 2, cuatro voces, siete efectos y cien presets. Gratis y en beta. Su editor en el navegador es lo mejor que tiene, y <strong>funciona sin el FM-1</strong>.</p>
                        <p class="text-sm text-slate-400 mb-5">La pega: es de código cerrado, así que no va en el FM1 Dock y sustituye al firmware que tengas.</p>
                        <div class="flex flex-wrap gap-3">
                            <a href="https://shrub.audio/" target="_blank" rel="noopener" class="<?php echo esc_attr( $boton ); ?>">Abrir shrub.audio</a>
                            <a href="https://youtu.be/uMQZTRQruyA" target="_blank" rel="noopener" class="inline-flex items-center justify-center rounded-full border border-white/30 text-white hover:border-white font-bold py-2.5 px-5 text-xs transition-colors">Ver el vídeo</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6. ATEK303 -->
        <section id="seccion-6" class="<?php echo esc_attr( $seccion ); ?>">
            <div class="<?php echo esc_attr( $caja ); ?>">
                <?php $titulo( 6, 'music', 'ATEK303: el firmware acid de Animatek' ); ?>
                <div class="grid gap-10 lg:grid-cols-2 items-center">
                    <div class="rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-700/50 shadow-xl shadow-slate-300/40">
                        <picture>
                            <source srcset="<?php echo esc_url( get_theme_file_uri( 'images/atek303-fm1-web.webp' ) ); ?>" type="image/webp">
                            <img src="<?php echo esc_url( get_theme_file_uri( 'images/atek303-fm1-web.png' ) ); ?>" alt="El FM-1 en el navegador con el ATEK303 sonando" width="1280" height="816" class="w-full h-auto" loading="lazy">
                        </picture>
                    </div>
                    <div class="space-y-4 text-lg <?php echo esc_attr( $texto ); ?>">
                        <p>La 303 que tienes en VCV Rack, ahora dentro del FM-1. Una línea acid con su <strong>secuenciador generativo</strong>: le das densidad, rango, acentos y slides, y el patrón se rehace solo. Tiene editor de pasos, presets, efectos y se sincroniza con un reloj MIDI externo.</p>
                        <p>Gratis y de código abierto (GPL-3.0). Y no hace falta tener el aparato para probarlo.</p>
                        <div class="flex flex-wrap gap-3 pt-2">
                            <a href="https://animatek.github.io/FM1-Animatek/atek303/play/" target="_blank" rel="noopener" class="<?php echo esc_attr( $boton ); ?>">▶ Tocarlo en el navegador</a>
                            <a href="<?php echo esc_url( home_url( '/atek303-fm1/' ) ); ?>" class="<?php echo esc_attr( $boton2 ); ?>">Manual y descarga</a>
                            <a href="https://animatek.github.io/FM1-Animatek/atek303/cheatsheet/" target="_blank" rel="noopener" class="<?php echo esc_attr( $boton2 ); ?>">Cheat sheet</a>
                            <a href="https://github.com/animatek/FM1-Animatek" target="_blank" rel="noopener" class="<?php echo esc_attr( $boton2 ); ?>">Código</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 7. FM1 Dock -->
        <section id="seccion-7" class="<?php echo esc_attr( $seccion ); ?>">
            <div class="<?php echo esc_attr( $caja ); ?>">
                <?php $titulo( 7, 'stack', 'FM1 Dock: varios firmwares sin reinstalar' ); ?>
                <div class="grid gap-8 lg:grid-cols-[1.4fr_1fr] items-start">
                    <div class="space-y-4 text-lg <?php echo esc_attr( $texto ); ?>">
                        <p>Lo normal es que el FM-1 tenga un solo firmware dentro: si quieres otro, lo reinstalas y el anterior desaparece. <strong>FM1 Dock</strong>, de Joakim Eriksson, cambia eso. Se instala una vez y lleva dentro varios «módulos» entre los que saltas con el botón HOME, sin reinstalar nada.</p>
                        <p>La pega: solo entran los firmwares adaptados al Dock, y para adaptarlos hace falta el código. Por eso <strong>SHRUB no va en el Dock</strong>.</p>
                        <div class="flex flex-wrap gap-3 pt-2">
                            <a href="https://joakimeriksson.github.io/fm1-dock/" target="_blank" rel="noopener" class="<?php echo esc_attr( $boton ); ?>">FM1 Dock</a>
                            <a href="<?php echo esc_url( ANIMATEK_FM1_EMU . '?fw=fm1dock' ); ?>" target="_blank" rel="noopener" class="<?php echo esc_attr( $boton2 ); ?>">▶ Probarlo en el navegador</a>
                        </div>
                    </div>
                    <div class="<?php echo esc_attr( $panel ); ?>">
                        <h3 class="text-lg font-bold text-slate-800 mb-3">Algunos módulos del Dock</h3>
                        <ul class="space-y-2 text-sm text-slate-600">
                            <li><strong>ATEK303</strong>: el nuestro, con el reloj MIDI afinado.</li>
                            <li><strong>OberVave</strong>, <strong>CS-1</strong> y <strong>Scintilla</strong>: sintes.</li>
                            <li><strong>FM-1 SID</strong>: el chip del Commodore 64, con reproductor y editor.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- 8. Pruébalos sin tener el FM-1 -->
        <section id="seccion-8" class="<?php echo esc_attr( $seccion ); ?>">
            <div class="<?php echo esc_attr( $caja ); ?>">
                <?php $titulo( 8, 'monitor', 'Pruébalos sin tener el FM-1' ); ?>
                <p class="text-lg mb-8 max-w-3xl <?php echo esc_attr( $texto ); ?>">Para mí, de lo mejor del invento. Joakim Eriksson hizo un <strong>emulador del FM-1 entero</strong> que corre los firmwares tal cual, los mismos archivos que instalarías. Sirve para decidir cuál te va antes de instalarlo, o para saber si el FM-1 es para ti.</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="<?php echo esc_url( ANIMATEK_FM1_EMU ); ?>" target="_blank" rel="noopener" class="<?php echo esc_attr( $mini ); ?> hover:border-slate-400 transition-colors block">
                        <span class="<?php echo esc_attr( $etiqueta ); ?>">Navegador</span>
                        <strong class="block text-slate-900 text-lg mb-2">fm1-emu</strong>
                        <p class="text-sm text-slate-500">Eliges un firmware, Start, y lo tocas con el teclado del ordenador, el ratón o un teclado MIDI.</p>
                    </a>
                    <a href="https://github.com/joakimeriksson/fm1-emu/releases/latest" target="_blank" rel="noopener" class="<?php echo esc_attr( $mini ); ?> hover:border-slate-400 transition-colors block">
                        <span class="<?php echo esc_attr( $etiqueta ); ?>">DAW</span>
                        <strong class="block text-slate-900 text-lg mb-2">El plugin</strong>
                        <p class="text-sm text-slate-500">VST3, AU y CLAP para Mac y Windows: el FM-1 dentro de tu DAW, con cualquier firmware.</p>
                    </a>
                    <a href="https://shrub.audio/" target="_blank" rel="noopener" class="<?php echo esc_attr( $mini ); ?> hover:border-slate-400 transition-colors block">
                        <span class="<?php echo esc_attr( $etiqueta ); ?>">SHRUB</span>
                        <strong class="block text-slate-900 text-lg mb-2">Su editor web</strong>
                        <p class="text-sm text-slate-500">El de SHRUB funciona sin el FM-1: entras y lo tocas con el teclado.</p>
                    </a>
                </div>
            </div>
        </section>

        <!-- 9. Si se queda bloqueado -->
        <section id="seccion-9" class="<?php echo esc_attr( $seccion ); ?>">
            <div class="<?php echo esc_attr( $caja ); ?>">
                <?php $titulo( 9, 'lifebuoy', 'Si se queda bloqueado' ); ?>
                <p class="text-lg mb-8 max-w-3xl <?php echo esc_attr( $texto ); ?>">Primero, calma: es raro, y casi siempre tiene arreglo. Las herramientas son de la comunidad, no de M-VAVE. Tres casos, de más fácil a más difícil:</p>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                    <div class="rounded-2xl border-t-4 border-emerald-500 bg-slate-50 dark:bg-slate-800/40 border-x border-b border-x-slate-200 border-b-slate-200 dark:border-x-slate-700/50 dark:border-b-slate-700/50 p-6">
                        <span class="text-xs font-black uppercase tracking-wider text-emerald-600">Caso 1 · Fácil</span>
                        <p class="font-bold text-slate-900 mt-2 mb-2">Arranca, pero va mal o no deja instalar otro</p>
                        <p class="text-sm text-slate-600">Enciende con <strong>OCT−</strong> pulsado (modo de rescate) y vuelve al oficial desde The Firmware Hub, el instalador del firmware o M-Flasher.</p>
                    </div>
                    <div class="rounded-2xl border-t-4 border-amber-500 bg-slate-50 dark:bg-slate-800/40 border-x border-b border-x-slate-200 border-b-slate-200 dark:border-x-slate-700/50 dark:border-b-slate-700/50 p-6">
                        <span class="text-xs font-black uppercase tracking-wider text-amber-600">Caso 2 · Medio</span>
                        <p class="font-bold text-slate-900 mt-2 mb-2">Pantalla negra, pero el ordenador ve un disco «WL82 UBOOT1.00»</p>
                        <p class="text-sm text-slate-600">Bloqueo blando: el modo de arranque del chip sigue vivo. <strong>M-Flasher</strong> lo detecta y reinstala el firmware oficial. Si lo prefieres por terminal, está el <?php echo $ext( 'https://github.com/Quixotic7/MvaveFM1Unbricker', 'MvaveFM1Unbricker' ); ?>.</p>
                    </div>
                    <div class="rounded-2xl border-t-4 border-red-500 bg-slate-50 dark:bg-slate-800/40 border-x border-b border-x-slate-200 border-b-slate-200 dark:border-x-slate-700/50 dark:border-b-slate-700/50 p-6">
                        <span class="text-xs font-black uppercase tracking-wider text-red-600">Caso 3 · Difícil</span>
                        <p class="font-bold text-slate-900 mt-2 mb-2">Pantalla negra y nada por USB, solo la luz de carga</p>
                        <p class="text-sm text-slate-600">Bloqueo duro. Hay que abrirlo y usar una plaquita de pocos euros (XIAO RP2040): el <?php echo $ext( 'https://github.com/kurogedelic/FM-1-transporter', 'FM-1 Transporter' ); ?>. Hay una <?php echo $ext( 'https://github.com/GoodPerson42/FM1-Unbricking-For-Dummies', 'guía para principiantes' ); ?>.</p>
                    </div>
                </div>
                <p class="text-sm text-slate-500 mt-6 max-w-3xl">Lo único sin arreglo es que se rompa la zona de arranque del chip, y ninguna herramienta de instalación la escribe: instalando firmwares normales no deberías verlo nunca. Por eso vale tanto la copia de seguridad del primer día.</p>
            </div>
        </section>

        <!-- 10. Vídeos -->
        <section id="seccion-10" class="<?php echo esc_attr( $seccion ); ?> fm1-no-print">
            <div class="<?php echo esc_attr( $caja ); ?>">
                <?php $titulo( 10, 'play', 'Los vídeos del FM-1' ); ?>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php foreach ( $videos as [ $id, $tit, $dur, $tag, $desc ] ) : ?>
                        <a href="<?php echo esc_url( 'https://youtu.be/' . $id ); ?>" target="_blank" rel="noopener" class="group overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-primary/40 hover:shadow-lg hover:shadow-primary/10 dark:border-slate-700/50 dark:bg-slate-800/40 block">
                            <div class="relative aspect-video overflow-hidden bg-slate-200 dark:bg-slate-800">
                                <img src="<?php echo esc_url( 'https://i.ytimg.com/vi/' . $id . '/hqdefault.jpg' ); ?>" alt="<?php echo esc_attr( $tit ); ?>" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy">
                                <span class="absolute left-3 top-3 rounded-full bg-slate-950/80 px-2.5 py-1 text-[11px] font-bold uppercase tracking-[0.12em] text-white backdrop-blur"><?php echo esc_html( $tag ); ?></span>
                                <span class="absolute right-3 bottom-3 rounded bg-slate-950/80 px-2 py-0.5 text-[11px] font-bold text-white"><?php echo esc_html( $dur ); ?></span>
                            </div>
                            <div class="p-5">
                                <h3 class="text-base font-bold text-slate-900 dark:text-white leading-snug mb-2"><?php echo esc_html( $tit ); ?></h3>
                                <p class="text-xs leading-relaxed text-slate-600 dark:text-slate-400"><?php echo esc_html( $desc ); ?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- 11. Apoya y sigue -->
        <section id="seccion-11" class="<?php echo esc_attr( $seccion ); ?>">
            <div class="<?php echo esc_attr( $caja ); ?>">
                <?php $titulo( 11, 'heart', 'Si esto te sirve' ); ?>
                <p class="text-lg mb-8 max-w-3xl <?php echo esc_attr( $texto ); ?>">Esta guía es gratis y lo seguirá siendo, igual que el ATEK303. Si quieres echar una mano, hay tres formas, y ninguna es obligatoria:</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <a href="https://www.patreon.com/animatek" target="_blank" rel="noopener" class="group rounded-2xl border border-slate-200 bg-slate-50 dark:bg-slate-800/40 dark:border-slate-700/50 p-6 shadow-sm transition hover:-translate-y-1 hover:border-[#f96854]/60 block">
                        <span class="w-12 h-12 rounded-full bg-[#f96854]/10 text-[#f96854] flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M14.82 2.41c3.96 0 7.18 3.24 7.18 7.21 0 3.96-3.22 7.18-7.18 7.18-3.97 0-7.21-3.22-7.21-7.18 0-3.97 3.24-7.21 7.21-7.21M2 21.6h3.5V2.41H2V21.6z"/></svg>
                        </span>
                        <strong class="block text-lg text-slate-900 dark:text-white mb-2">Patreon</strong>
                        <p class="text-sm text-slate-600 dark:text-slate-400">Paga las horas que hay detrás de los vídeos, las guías y los firmwares. Los mecenas salen al final de cada vídeo.</p>
                    </a>
                    <a href="<?php echo esc_url( ANIMATEK_FM1_AFILIADO ); ?>" target="_blank" rel="sponsored noopener" class="group rounded-2xl border border-slate-200 bg-slate-50 dark:bg-slate-800/40 dark:border-slate-700/50 p-6 shadow-sm transition hover:-translate-y-1 hover:border-amber-400 block">
                        <span class="w-12 h-12 rounded-full bg-amber-500/10 text-amber-600 flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/></svg>
                        </span>
                        <strong class="block text-lg text-slate-900 dark:text-white mb-2">Comprar el FM-1 desde mi enlace</strong>
                        <p class="text-sm text-slate-600 dark:text-slate-400">A ti te cuesta lo mismo y a mí me llega una pequeña comisión de Amazon.</p>
                    </a>
                    <a href="https://www.youtube.com/@animatek?sub_confirmation=1" target="_blank" rel="noopener" class="group rounded-2xl border border-slate-200 bg-slate-50 dark:bg-slate-800/40 dark:border-slate-700/50 p-6 shadow-sm transition hover:-translate-y-1 hover:border-red-400 block">
                        <span class="w-12 h-12 rounded-full bg-red-500/10 text-red-600 flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                        </span>
                        <strong class="block text-lg text-slate-900 dark:text-white mb-2">Suscribirte al canal</strong>
                        <p class="text-sm text-slate-600 dark:text-slate-400">Y contarme en los comentarios qué firmware quieres que pruebe en el siguiente vídeo.</p>
                    </a>
                </div>
                <p class="text-[11px] text-slate-500 mt-4">Como afiliado de Amazon, obtengo ingresos por las compras adscritas que cumplen los requisitos aplicables.</p>

                <div class="mt-10 <?php echo esc_attr( $panel ); ?> fm1-no-print">
                    <p class="text-slate-700 dark:text-slate-200 mb-4"><strong>¿Te interesa también la síntesis en el ordenador?</strong> Hay dos Labs más, igual de gratis:</p>
                    <div class="flex flex-wrap gap-3">
                        <a href="<?php echo esc_url( home_url( '/vcvrack-lab/' ) ); ?>" class="<?php echo esc_attr( $boton2 ); ?>">VCV Rack Lab · modular</a>
                        <a href="<?php echo esc_url( home_url( '/bitwig-lab/' ) ); ?>" class="<?php echo esc_attr( $boton2 ); ?>">Bitwig Lab · producción</a>
                    </div>
                </div>

                <p class="text-lg mt-10 <?php echo esc_attr( $texto ); ?>">Esta guía irá creciendo con lo que vaya saliendo. Lo nuevo te llegará por correo, solo cosas del FM-1.</p>
                <p class="text-lg mt-4 <?php echo esc_attr( $texto ); ?>">Happy patching 👽👊<br><strong class="text-slate-900 dark:text-white">Javi / Animatek</strong></p>
            </div>
        </section>

    </div> <!-- fin del contenido bloqueado -->

</main>

<?php
get_footer();
