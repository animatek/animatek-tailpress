<?php
/**
 * Firmwares de Animatek para el M-VAVE FM-1: el índice (/fm1/) y la página del ATEK303 (/atek303-fm1/) con su
 * manual. Contenido: el repo FM1-Animatek (atek303/README.md). Solo en español por ahora.
 *
 * El ATEK303 se descarga de la release de GitHub (la más nueva: ATEK303_FM1_VERSION) y está enviado a The Firmware
 * Hub; se toca también en el navegador (GitHub Pages del repo). Al sacar otra versión, cambiar la constante.
 */

const ATEK303_FM1_VERSION = '1.1';

/** Los enlaces del ATEK303: la release, la versión para el navegador, la cheat sheet y el hub. */
function animatek_atek303_fm1_links(): array {
    return [
        'release' => 'https://github.com/animatek/FM1-Animatek/releases/tag/atek303-v' . ATEK303_FM1_VERSION,
        'fwsc'    => 'https://github.com/animatek/FM1-Animatek/releases/download/atek303-v' . ATEK303_FM1_VERSION . '/atek303-' . ATEK303_FM1_VERSION . '.fwsc',
        'play'    => 'https://animatek.github.io/FM1-Animatek/atek303/play/',
        'cheat'   => 'https://animatek.github.io/FM1-Animatek/atek303/cheatsheet/',
        'hub'     => 'https://thefirmwarehub.com/',
    ];
}

/** El repo público de los firmwares (GPL-3.0). */
function animatek_fm1_repo_url( string $path = '' ): string {
    return 'https://github.com/animatek/FM1-Animatek' . ( '' !== $path ? '/tree/main/' . $path : '' );
}

function animatek_fm1_styles(): array {
    return [
        'button'  => 'inline-flex min-h-11 items-center justify-center rounded-full px-5 py-3 text-sm font-extrabold transition hover:-translate-y-0.5 focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-primary',
        'card'    => 'rounded-lg border border-zinc-300 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900',
        'kicker'  => 'text-xs font-black uppercase tracking-widest text-primary',
        'h2'      => 'text-3xl font-black leading-tight sm:text-4xl',
        'muted'   => 'text-zinc-600 dark:text-zinc-400',
        'section' => 'mx-auto max-w-7xl px-6 py-14 sm:px-10',
    ];
}

/** La captura del emulador del FM-1 (el plugin de Bitwig y su versión web) con el ATEK303 sonando. */
function animatek_fm1_render_vst_shot(): void {
    ?>
    <figure class="space-y-2">
        <picture>
            <source srcset="<?php echo esc_url( get_theme_file_uri( 'images/atek303-fm1-vst.webp' ) ); ?>" type="image/webp">
            <img src="<?php echo esc_url( get_theme_file_uri( 'images/atek303-fm1-vst.png' ) ); ?>" alt="El ATEK303 sonando en el emulador del FM-1: pantalla con cutoff, resonancia, env mod y decay, y la tira de 16 pasos" width="1280" height="820" class="w-full rounded-xl shadow-xl">
        </picture>
        <figcaption class="text-xs <?php echo esc_attr( animatek_fm1_styles()['muted'] ); ?>">El ATEK303 en el emulador del FM-1 (plugin CLAP para el DAW).</figcaption>
    </figure>
    <?php
}

/** El aviso común: firmware no oficial, a tu riesgo, cómo volver atrás. */
function animatek_fm1_render_safety(): void {
    $s = animatek_fm1_styles();
    $tips = [
        'Copia de seguridad'   => 'Antes de cambiar de firmware, guarda tus sonidos y proyectos con la herramienta del firmware que tengas. Cada firmware usa la memoria a su manera y el nuevo puede pisar lo anterior.',
        'Batería y cable'      => 'Batería cargada, cable de datos directo al ordenador (sin hub USB) y Chrome o Edge, que son los navegadores con Web MIDI. No desconectes nada hasta que termine.',
        'Vuelta al oficial'    => 'Siempre puedes volver al firmware de M-VAVE con su actualizador o con The Firmware Hub.',
        'Si algo sale mal'     => 'Si el firmware falla dos veces al arrancar, el FM-1 entra solo en un modo seguro con el USB activo para reinstalar. Mantener REC al encender lleva al modo de actualización del chip. Para un FM-1 que no arranca existen herramientas de rescate por USB de la comunidad.',
    ];
    ?>
    <section class="<?php echo esc_attr( $s['section'] ); ?>">
        <div class="mb-8 space-y-3">
            <p class="<?php echo esc_attr( $s['kicker'] ); ?>">Antes de instalar</p>
            <h2 class="<?php echo esc_attr( $s['h2'] ); ?>">Un firmware no oficial se instala a tu riesgo</h2>
            <p class="max-w-3xl <?php echo esc_attr( $s['muted'] ); ?>">Instalar un firmware de la comunidad es seguro si se hace con cuidado, pero no lo hace ni lo respalda M-VAVE. Cuatro cosas que conviene saber:</p>
        </div>
        <div class="grid gap-5 md:grid-cols-2">
            <?php foreach ( $tips as $title => $text ) : ?>
                <div class="<?php echo esc_attr( $s['card'] ); ?>">
                    <h3 class="mb-2 text-lg font-extrabold"><?php echo esc_html( $title ); ?></h3>
                    <p class="leading-relaxed <?php echo esc_attr( $s['muted'] ); ?>"><?php echo esc_html( $text ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php
}

function animatek_fm1_render_trademarks(): void {
    $s = animatek_fm1_styles();
    ?>
    <section class="border-t border-zinc-300 dark:border-zinc-800">
        <div class="mx-auto max-w-7xl px-6 py-10 text-sm sm:px-10 <?php echo esc_attr( $s['muted'] ); ?>">
            <p>M-VAVE y FM-1 son marcas de sus propietarios; TB-303 es una marca de Roland Corporation. Se usan aquí solo para identificar el aparato y el sonido de referencia. Estos firmwares son proyectos independientes de Animatek, sin relación con M-VAVE ni con Roland.</p>
        </div>
    </section>
    <?php
}

/** /fm1/: los firmwares de Animatek para el FM-1. */
function animatek_fm1_render_hub(): void {
    $s = animatek_fm1_styles();
    $firmwares = [
        [
            'url'    => home_url( '/atek303-fm1/' ),
            'image'  => get_theme_file_uri( 'images/atek303-fm1-seq.png' ),
            'alt'    => 'Pantalla del ATEK303 en el FM-1 con los cuatro knobs del filtro y la tira de 16 pasos',
            'title'  => 'ATEK303',
            'meta'   => 'Versión ' . ATEK303_FM1_VERSION . ' · Gratis · GPLv3',
            'text'   => 'La voz del ATEK303 de VCV Rack y su generador de patrones acid de 64 pasos, con efectos, editor de pasos, 12 presets de fábrica y MIDI. Se toca también en el navegador.',
        ],
    ];
    ?>
    <main id="primary" class="bg-zinc-100 text-zinc-950 dark:bg-zinc-950 dark:text-white">
        <section class="relative overflow-hidden bg-slate-50 text-slate-900 dark:bg-zinc-900 dark:text-white">
            <div class="pointer-events-none absolute inset-0 opacity-40 hero-grid"></div>
            <div class="relative mx-auto grid max-w-7xl items-center gap-8 px-6 py-10 sm:px-10 lg:grid-cols-[1fr_minmax(0,30rem)] lg:py-12">
                <div class="space-y-4">
                    <p class="<?php echo esc_attr( $s['kicker'] ); ?>">Animatek · Software · M-VAVE FM-1</p>
                    <h1 class="text-4xl font-black leading-none sm:text-5xl">Firmwares para el FM-1</h1>
                    <p class="max-w-2xl text-lg leading-relaxed text-slate-700 dark:text-zinc-300">El M-VAVE FM-1 es un sinte de bolsillo que se puede reprogramar: le instalas otro firmware y se convierte en otro instrumento. Aquí van los que hacemos en Animatek. Son gratis y de código abierto.</p>
                    <div class="flex flex-wrap gap-3 pt-2">
                        <a href="<?php echo esc_url( animatek_fm1_repo_url() ); ?>" target="_blank" rel="noopener noreferrer" class="<?php echo esc_attr( $s['button'] ); ?> border border-zinc-300 bg-white text-zinc-900 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white">Código en GitHub</a>
                    </div>
                </div>
                <?php animatek_fm1_render_vst_shot(); ?>
            </div>
        </section>

        <section class="mx-auto max-w-7xl px-6 pb-14 pt-8 sm:px-10">
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <?php foreach ( $firmwares as $fw ) : ?>
                    <a href="<?php echo esc_url( $fw['url'] ); ?>" class="group flex flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:border-slate-300 hover:shadow-lg dark:border-zinc-700 dark:bg-zinc-900">
                        <div class="bg-[#16181C] p-6">
                            <img src="<?php echo esc_url( $fw['image'] ); ?>" alt="<?php echo esc_attr( $fw['alt'] ); ?>" class="mx-auto aspect-square w-full max-w-xs rounded-md" style="image-rendering: pixelated;" loading="lazy">
                        </div>
                        <div class="flex flex-1 flex-col gap-2 p-6">
                            <p class="text-xs font-black uppercase tracking-widest text-primary"><?php echo esc_html( $fw['meta'] ); ?></p>
                            <h2 class="text-2xl font-black"><?php echo esc_html( $fw['title'] ); ?></h2>
                            <p class="leading-relaxed <?php echo esc_attr( $s['muted'] ); ?>"><?php echo esc_html( $fw['text'] ); ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
                <div class="flex flex-col justify-center rounded-2xl border border-dashed border-zinc-300 p-8 dark:border-zinc-700">
                    <p class="mb-2 text-xs font-black uppercase tracking-widest <?php echo esc_attr( $s['muted'] ); ?>">Próximamente</p>
                    <h2 class="mb-2 text-2xl font-black">Más firmwares</h2>
                    <p class="leading-relaxed <?php echo esc_attr( $s['muted'] ); ?>">El ATEK303 es el primero. Habrá más: cuando estén probados en un FM-1 real, aparecerán aquí.</p>
                </div>
            </div>
        </section>

        <?php animatek_fm1_render_safety(); ?>
        <?php animatek_fm1_render_trademarks(); ?>
    </main>
    <?php
}

/** /atek303-fm1/: el ATEK303 para el FM-1, con su manual. */
function animatek_atek303_fm1_render(): void {
    $s = animatek_fm1_styles();
    if ( ! function_exists( 'animatek_vcv_modules_data' ) ) {
        require_once get_theme_file_path( 'inc/animatek-vcv-module-template.php' );
    }
    $modules = animatek_vcv_modules_data();
    $vcv_url = isset( $modules['atek303'] ) ? animatek_vcv_module_url( $modules['atek303'], false ) : home_url( '/software/#vcv-rack' );
    $img = static function ( string $name ): string {
        return get_theme_file_uri( 'images/atek303-fm1-' . $name . '.png' );
    };
    $links = animatek_atek303_fm1_links();
    $features = [
        'La voz del ATEK303'           => 'El mismo motor que el módulo de VCV Rack: Open303 con el oscilador y el filtro de diodos de ATEK, modelados sobre el esquema del 303. Comparado con el original, la diferencia queda a -51 dB: es el mismo sonido. Con su ajuste fino, como en VCV.',
        'El generador de patrones acid' => 'SEQ crea una línea nueva de hasta 64 pasos; las mutaciones cambian el ritmo, las octavas o los slides y acentos. Es el algoritmo del ATEK303 SEQ: la misma semilla da el mismo patrón en VCV y en el FM-1.',
        'Efectos en estéreo'           => 'Distorsión (overdrive, RAT o fuzz), chorus o flanger, delay ping-pong sincronizado al tempo y una reverb de placa. A la salida, un limitador que sube el volumen sin recortar.',
        'Editor de pasos y presets'     => 'Un piano roll por páginas de 16 pasos para retocar el patrón nota a nota, 12 presets de fábrica y 32 huecos con pantalla de guardar y confirmación.',
        'MIDI de entrada y salida'      => 'Notas, CC y reloj de entrada; las notas del secuenciador y el reloj salen por USB, para grabar la línea en el DAW o tocar otro sinte con ella.',
        'Pruébalo en el navegador'      => 'El mismo firmware compilado para la web: el FM-1 en pantalla, con sonido, sin instalar nada.',
    ];
    $gallery = [
        'delay'   => 'Página DELAY: el ping-pong sigue el tempo. Abajo, la tira de pasos y el navegador de páginas.',
        'seq'     => 'Con el secuenciador en marcha, el paso que suena va enmarcado.',
        'editor'  => 'El editor de pasos: la nota en el piano roll; octava, gate, acento y slide debajo.',
        'presets' => 'La lista de presets: se cargan al pasar por ellos; sonando, el cambio espera al final del patrón.',
    ];
    $buttons = [
        [ 'PLAY', 'Arranca y para el secuenciador. Si le llega reloj MIDI, lo sigue.' ],
        [ 'SEQ', 'Un patrón nuevo (semilla nueva). Sonando, entra en el siguiente compás. Con LOCK activo, muta las tres capas en lugar de crear uno nuevo.' ],
        [ 'ENV / LFO / ARP', 'Mutan el ritmo, las notas (octavas) y los slides y acentos de la página a la vista. En el editor, ENV pone o quita el acento y LFO el slide.' ],
        [ 'REC', 'Deshace la última mutación o edición.' ],
        [ 'GLO', 'LOCK: SEQ muta en vez de crear una semilla nueva.' ],
        [ 'EDIT', 'Abre y cierra el editor de pasos.' ],
        [ 'FX', 'Salta a las páginas de efectos; pulsado otra vez, a la siguiente.' ],
        [ 'HOME', 'Recorre VCF, VOICE, PATT y SEQ; desde el editor, la lista o un efecto, vuelve a VCF.' ],
        [ 'OCT− + HOME', 'OPTIONS: color de la pantalla, canales MIDI, notas y reloj de salida, y el ajuste fino de la voz.' ],
        [ 'SAVE', 'Abre la pantalla de guardar: hueco y nombre; sobre un hueco ocupado pregunta OVERWRITE? NO / YES.' ],
        [ 'OCT− / OCT+', 'La octava (OCT− al soltarlo, porque también sirve para combinaciones).' ],
        [ 'Teclas', 'Con el secuenciador parado, tocan la voz: legato hace slide y una pulsación fuerte es un acento. Con el secuenciador sonando, transportan el patrón: la tecla pasa a ser la nota base.' ],
    ];
    $pages = [
        [ 'VCF', 'CUTOFF, RESO, ENV MOD, DECAY' ],
        [ 'VOICE', 'ACCENT, TUNE, WAVE (sierra o cuadrada), GATE (duración de las notas del secuenciador)' ],
        [ 'PATT', 'DENSITY, RANGE, ACCENTS, SLIDES: el patrón vuelve a crecer desde su semilla al girarlos' ],
        [ 'SEQ', 'STEPS (1 a 64), SCALE, TEMPO, ROOT' ],
        [ 'DELAY', 'TIME (de 1/16 a 1/4 con puntillo), FEEDBACK, TONE, MIX' ],
        [ 'CHOR', 'TYPE (chorus o flanger), RATE, DEPTH, MIX' ],
        [ 'DRIVE', 'TYPE (off, overdrive, RAT, fuzz), DRIVE, TONE, LEVEL' ],
        [ 'REVRB', 'DECAY, DAMP, PRE-DELAY, MIX' ],
    ];
    $manual = [
        'Primeros pasos' => [
            'Pulsa PLAY: suena el preset 01, COSMIC TRAX.',
            'Pulsa SEQ para generar otro patrón, o ENV, LFO y ARP para mutar el que suena. REC deshace.',
            'Gira K1 a K4 para cambiar el sonido. SELECT cambia de página y el navegador de abajo te dice dónde estás.',
            'Pulsa una tecla mientras suena para transportar la línea.',
            'Pulsa SAVE dos veces: se guarda como preset con un nombre acid.',
        ],
        'El secuenciador' => [
            'Los patrones salen del generador del ATEK303 SEQ: grados de escala con su octava, ties, slides y acentos. SCALE y ROOT cambian la salida sin perder el patrón.',
            'Hasta 64 pasos en cuatro páginas de 16: la tira enseña la página que suena, con cuatro marcas encima.',
            'DENSITY, RANGE, ACCENTS y SLIDES regeneran el patrón desde la misma semilla en tiempo real: subir la densidad añade notas sin cambiar las que había.',
            'Con reloj MIDI externo sigue START, STOP y CONTINUE, a seis pulsos por paso, clavado con el DAW. En pantalla, el tempo dice EXT.',
        ],
        'El editor de pasos' => [
            'EDIT lo abre. SELECT recorre los 16 pasos de la página y K4 cambia de página.',
            'K1 cambia el gate (silencio, nota o tie), K2 la octava y K3 la nota de semitono en semitono. Una tecla pone la nota del paso y pasa al siguiente.',
            'ENV pone o quita el acento y LFO el slide. Un slide hacia la misma nota suena legato, como en un 303.',
            'OCT− mantenido y K4 cambian la longitud del patrón (de 1 a 64 pasos).',
        ],
        'Presets' => [
            '12 presets de fábrica y 32 huecos en la memoria del FM-1, con copia de seguridad interna: un corte de luz a mitad de guardar no los pierde.',
            'Cada preset guarda el patrón (con su semilla y mutaciones), la voz, los efectos, el tempo, la escala, la raíz y la octava.',
            'Gira PRESETS para abrir la lista: el cursor carga cada preset al pasar. Sonando, el cambio espera al final del patrón, como en un 303 (NEXT). ENV dos veces borra el seleccionado y HOME cierra la lista.',
            'Los presets se pueden copiar al ordenador y devolver por USB con la herramienta de copia de fm1-base.',
        ],
        'OPTIONS (OCT− + HOME)' => [
            'COLOR: el azul de Animatek o los temas de fm1-base (verde, ámbar, cian, rojo y mono).',
            'MIDI: canal de entrada (todos o uno), canal de salida, las notas del secuenciador por USB y el reloj de salida.',
            'FINE TUNING: el mismo menú del ATEK303 de VCV: anchura de pulso, caídas del oscilador, drive del filtro, tiempo de slide, auto-legato, saturaciones, deriva analógica y unidad.',
            'Las opciones son del aparato, no de los presets, y se guardan al cerrar.',
        ],
        'MIDI' => [
            'Entrada por USB y por el minijack TRS: con el secuenciador parado, las notas tocan la voz (velocidad 100 o más: acento; notas solapadas: slide); sonando, transportan el patrón.',
            'CC 74 cutoff, 71 resonancia, 75 env mod, 76 decay, 77 accent, 78 tune y 79 wave.',
            'Salida por USB: las teclas y las notas del secuenciador (acento con velocidad 127) y, si se activa, el reloj.',
        ],
    ];
    $install = [
        'Descarga el archivo .fwsc de la release ' . ATEK303_FM1_VERSION . ' en GitHub e instálalo con el instalador web de la comunidad (Chrome o Edge) o con el script fm1_install.py de fm1-base. Está enviado también a The Firmware Hub, para instalarlo desde allí con un clic.',
        'Probado en un FM-1 real: se instala desde el firmware oficial V15 y desde otro firmware, y se puede salir de él. Lleva la vía de actualización de la comunidad, así que siempre se puede instalar otro encima o volver al oficial de M-VAVE.',
        'Los presets guardados con la 1.0 no se cargan en la 1.1 (el formato cambió con los 64 pasos).',
    ];
    $credits = [
        'ATEK303 para FM-1 es software libre (GPL-3.0) de Animatek.',
        'La voz parte de Open303, de Robin Schmidt (licencia MIT).',
        'Funciona sobre fm1-base, de Charles Vestal (MPL-2.0), y felucca-bsp, de Hügelton Instruments (MPL-2.0).',
    ];
    ?>
    <main id="primary" class="bg-zinc-100 text-zinc-950 dark:bg-zinc-950 dark:text-white">
        <section class="relative overflow-hidden bg-slate-50 text-slate-900 dark:bg-zinc-900 dark:text-white">
            <div class="pointer-events-none absolute inset-0 opacity-40 hero-grid"></div>
            <div class="relative mx-auto max-w-7xl px-6 py-10 sm:px-10 lg:py-12">
                <div class="grid items-center gap-8 lg:grid-cols-[1fr_minmax(0,34rem)]">
                    <div class="space-y-5">
                        <p class="<?php echo esc_attr( $s['kicker'] ); ?>">Firmware para M-VAVE FM-1 · Versión <?php echo esc_html( ATEK303_FM1_VERSION ); ?> · GPLv3</p>
                        <div class="space-y-3">
                            <h1 class="text-4xl font-black leading-none sm:text-5xl lg:text-6xl">ATEK303</h1>
                            <p class="text-xl font-semibold text-primary sm:text-2xl">El 303 de VCV Rack, dentro del FM-1.</p>
                        </div>
                        <p class="text-lg leading-relaxed text-slate-700 dark:text-zinc-300">La voz del ATEK303 y su generador de patrones acid, en un sinte de bolsillo. Pulsas PLAY y suena una línea; giras los knobs y se mueve. Sin ordenador y sin cables, si no quieres.</p>
                        <div class="flex flex-wrap gap-3">
                            <a href="<?php echo esc_url( $links['fwsc'] ); ?>" class="<?php echo esc_attr( $s['button'] ); ?> bg-primary text-white">Descargar la <?php echo esc_html( ATEK303_FM1_VERSION ); ?> (.fwsc)</a>
                            <a href="<?php echo esc_url( $links['play'] ); ?>" target="_blank" rel="noopener noreferrer" class="<?php echo esc_attr( $s['button'] ); ?> bg-[#FD9A00] text-zinc-950">Tócalo en el navegador</a>
                            <a href="<?php echo esc_url( $links['hub'] ); ?>" target="_blank" rel="noopener noreferrer" class="<?php echo esc_attr( $s['button'] ); ?> border border-zinc-300 bg-white text-zinc-900 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white">The Firmware Hub</a>
                        </div>
                        <p class="text-sm <?php echo esc_attr( $s['muted'] ); ?>">Gratis y de código abierto. <a href="<?php echo esc_url( $links['release'] ); ?>" target="_blank" rel="noopener noreferrer" class="font-semibold text-primary underline-offset-2 hover:underline">Notas de la versión <?php echo esc_html( ATEK303_FM1_VERSION ); ?></a> · <a href="<?php echo esc_url( $links['cheat'] ); ?>" target="_blank" rel="noopener noreferrer" class="font-semibold text-primary underline-offset-2 hover:underline">Cheat sheet (PDF y web)</a></p>
                        <div class="flex flex-wrap gap-3">
                            <a href="<?php echo esc_url( $vcv_url ); ?>" class="<?php echo esc_attr( $s['button'] ); ?> border border-zinc-300 bg-white text-zinc-900 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white">ATEK303 en VCV Rack</a>
                            <a href="#manual" class="<?php echo esc_attr( $s['button'] ); ?> border border-zinc-300 bg-white text-zinc-900 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white">Leer el manual</a>
                            <a href="<?php echo esc_url( animatek_fm1_repo_url( 'atek303' ) ); ?>" target="_blank" rel="noopener noreferrer" class="<?php echo esc_attr( $s['button'] ); ?> border border-zinc-300 bg-white text-zinc-900 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white">Código en GitHub</a>
                        </div>
                    </div>
                    <?php animatek_fm1_render_vst_shot(); ?>
                </div>
            </div>
        </section>

        <section class="<?php echo esc_attr( $s['section'] ); ?>">
            <div class="grid gap-5 md:grid-cols-2">
                <?php foreach ( $features as $title => $text ) : ?>
                    <div class="<?php echo esc_attr( $s['card'] ); ?>">
                        <h2 class="mb-2 text-xl font-extrabold"><?php echo esc_html( $title ); ?></h2>
                        <p class="leading-relaxed <?php echo esc_attr( $s['muted'] ); ?>"><?php echo esc_html( $text ); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="bg-[#16181C] text-white">
            <div class="<?php echo esc_attr( $s['section'] ); ?>">
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    <?php foreach ( $gallery as $name => $caption ) : ?>
                        <figure class="space-y-3">
                            <img src="<?php echo esc_url( $img( $name ) ); ?>" alt="<?php echo esc_attr( $caption ); ?>" class="w-full rounded-lg" style="image-rendering: pixelated;" loading="lazy">
                            <figcaption class="text-sm leading-relaxed text-zinc-400"><?php echo esc_html( $caption ); ?></figcaption>
                        </figure>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section id="manual" class="<?php echo esc_attr( $s['section'] ); ?>">
            <div class="mb-10 space-y-3">
                <p class="<?php echo esc_attr( $s['kicker'] ); ?>">Manual</p>
                <h2 class="<?php echo esc_attr( $s['h2'] ); ?>">Cómo se usa</h2>
            </div>

            <h3 class="mb-4 text-2xl font-black">Los botones</h3>
            <div class="mb-12 overflow-hidden rounded-lg border border-zinc-300 bg-white dark:border-zinc-700 dark:bg-zinc-900">
                <table class="w-full text-left text-sm">
                    <tbody>
                        <?php foreach ( $buttons as $row ) : ?>
                            <tr class="border-b border-zinc-200 last:border-0 dark:border-zinc-800">
                                <th class="w-40 px-5 py-3 align-top font-black text-primary"><?php echo esc_html( $row[0] ); ?></th>
                                <td class="px-5 py-3 leading-relaxed"><?php echo esc_html( $row[1] ); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <h3 class="mb-4 text-2xl font-black">Las páginas</h3>
            <p class="mb-4 max-w-3xl <?php echo esc_attr( $s['muted'] ); ?>">SELECT recorre las ocho páginas; cada una reparte cuatro parámetros en K1 a K4. El navegador al pie de la pantalla marca la página en la que estás.</p>
            <div class="mb-12 grid gap-3 sm:grid-cols-2">
                <?php foreach ( $pages as $row ) : ?>
                    <div class="flex gap-4 rounded-lg border border-zinc-300 bg-white p-4 dark:border-zinc-700 dark:bg-zinc-900">
                        <span class="w-16 shrink-0 font-black text-primary"><?php echo esc_html( $row[0] ); ?></span>
                        <span class="text-sm leading-relaxed"><?php echo esc_html( $row[1] ); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="grid gap-8 lg:grid-cols-2">
                <?php foreach ( $manual as $title => $items ) : ?>
                    <div>
                        <h3 class="mb-3 text-2xl font-black"><?php echo esc_html( $title ); ?></h3>
                        <ul class="list-disc space-y-2 pl-5 leading-relaxed <?php echo esc_attr( $s['muted'] ); ?>">
                            <?php foreach ( $items as $item ) : ?>
                                <li><?php echo esc_html( $item ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="<?php echo esc_attr( $s['section'] ); ?> pt-0">
            <div class="grid gap-8 lg:grid-cols-2">
                <div class="<?php echo esc_attr( $s['card'] ); ?>">
                    <h2 class="mb-3 text-2xl font-black">Instalación</h2>
                    <?php foreach ( $install as $p ) : ?>
                        <p class="mb-3 leading-relaxed <?php echo esc_attr( $s['muted'] ); ?>"><?php echo esc_html( $p ); ?></p>
                    <?php endforeach; ?>
                </div>
                <div class="<?php echo esc_attr( $s['card'] ); ?>">
                    <h2 class="mb-3 text-2xl font-black">Créditos y licencia</h2>
                    <?php foreach ( $credits as $p ) : ?>
                        <p class="mb-3 leading-relaxed <?php echo esc_attr( $s['muted'] ); ?>"><?php echo esc_html( $p ); ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <?php animatek_fm1_render_safety(); ?>
        <?php animatek_fm1_render_trademarks(); ?>
    </main>
    <?php
}
