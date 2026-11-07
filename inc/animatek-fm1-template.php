<?php
/**
 * Firmwares de Animatek para el M-VAVE FM-1: el índice (/fm1/, /fm1-eng/) y la página del ATEK303 (/atek303-fm1/,
 * /atek303-fm1-eng/) con su manual, en español y en inglés. Contenido: el repo FM1-Animatek (atek303/README.md).
 *
 * El ATEK303 se descarga de la release de GitHub (la más nueva: ATEK303_FM1_VERSION) y está enviado a The Firmware
 * Hub; se toca también en el navegador (GitHub Pages del repo). Al sacar otra versión, cambiar la constante.
 * Las capturas de la pantalla salen del simulador de fm1-base con los presets de fábrica (240 px, a 480 sin suavizar).
 */

const ATEK303_FM1_VERSION = '1.1';

/** El repo público de los firmwares (GPL-3.0). */
function animatek_fm1_repo_url( string $path = '' ): string {
    return 'https://github.com/animatek/FM1-Animatek' . ( '' !== $path ? '/tree/main/' . $path : '' );
}

/** Los enlaces del ATEK303: la release, el .fwsc, la versión para el navegador, la cheat sheet y el hub. */
function animatek_atek303_fm1_links(): array {
    return [
        'release' => 'https://github.com/animatek/FM1-Animatek/releases/tag/atek303-v' . ATEK303_FM1_VERSION,
        'fwsc'    => 'https://github.com/animatek/FM1-Animatek/releases/download/atek303-v' . ATEK303_FM1_VERSION . '/atek303-' . ATEK303_FM1_VERSION . '.fwsc',
        'play'    => 'https://animatek.github.io/FM1-Animatek/atek303/play/',
        'cheat'   => 'https://animatek.github.io/FM1-Animatek/atek303/cheatsheet/',
        'hub'     => 'https://thefirmwarehub.com/',
        'code'    => animatek_fm1_repo_url( 'atek303' ),
    ];
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

/** El texto en el idioma de la página. */
function animatek_fm1_t( string $lang, string $es, string $en ): string {
    return 'en' === $lang ? $en : $es;
}

/** El enlace a la otra versión de idioma (ES / EN), como en G1-Emu. */
function animatek_fm1_lang_switch( string $slug, string $lang ): void {
    $is_en = 'en' === $lang;
    ?>
    <a href="<?php echo esc_url( home_url( '/' . $slug . ( $is_en ? '' : '-eng' ) . '/' ) ); ?>" hreflang="<?php echo esc_attr( $is_en ? 'es' : 'en' ); ?>" lang="<?php echo esc_attr( $is_en ? 'es' : 'en' ); ?>" class="inline-flex min-h-9 items-center justify-center rounded-md border border-slate-200 bg-white px-3 py-1.5 text-xs font-bold text-slate-700 transition hover:bg-slate-100 focus-visible:outline-2 focus-visible:outline-primary dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-200"><?php echo esc_html( $is_en ? 'ES' : 'EN' ); ?></a>
    <?php
}

/**
 * Los accesos del ATEK303 como iconos, al estilo de The Firmware Hub: un cuadro oscuro con una raya de color arriba
 * y el icono en ese color, con su nombre debajo.
 */
function animatek_fm1_icon_links( array $items ): void {
    $icons = [
        'play'     => '<path d="M8 5v14l11-7z" fill="currentColor"/>',
        'download' => '<path d="M12 4v11m0 0l-4.5-4.5M12 15l4.5-4.5M5 19h14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>',
        'plug'     => '<path d="M9 3v5M15 3v5M6 8h12v3a6 6 0 0 1-12 0zM12 17v4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>',
        'doc'      => '<path d="M7 3h7l5 5v13H7zM14 3v5h5M10 13h6M10 17h6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>',
        'notes'    => '<path d="M4 5h16v11H9l-5 4zM8 9h8M8 12h5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>',
        'code'     => '<path d="M9 7l-5 5 5 5M15 7l5 5-5 5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>',
    ];
    ?>
    <div class="flex flex-wrap gap-3">
        <?php foreach ( $items as $it ) : ?>
            <a href="<?php echo esc_url( $it['url'] ); ?>"<?php echo ! empty( $it['external'] ) ? ' target="_blank" rel="noopener noreferrer"' : ''; ?> aria-label="<?php echo esc_attr( $it['label'] ); ?>" title="<?php echo esc_attr( $it['label'] ); ?>" class="group flex w-20 flex-col items-center gap-1.5 focus-visible:outline-none">
                <span class="flex h-14 w-20 items-center justify-center rounded-lg border-t-4 bg-[#1E2026] shadow-sm transition group-hover:-translate-y-0.5 group-hover:bg-[#262932] group-focus-visible:outline-2 group-focus-visible:outline-offset-2 group-focus-visible:outline-primary" style="border-top-color: <?php echo esc_attr( $it['color'] ); ?>; color: <?php echo esc_attr( $it['color'] ); ?>;">
                    <svg viewBox="0 0 24 24" width="26" height="26" aria-hidden="true"><?php echo $icons[ $it['icon'] ]; // phpcs:ignore -- SVG fijo de arriba ?></svg>
                </span>
                <span class="text-center text-xs font-bold leading-tight text-slate-700 dark:text-zinc-300"><?php echo esc_html( $it['label'] ); ?></span>
            </a>
        <?php endforeach; ?>
    </div>
    <?php
}

/** La versión del navegador con el ATEK303 sonando: el FM-1 entero, con la pantalla de verdad. */
function animatek_fm1_render_web_shot( string $lang = 'es' ): void {
    ?>
    <figure class="space-y-2">
        <a href="<?php echo esc_url( animatek_atek303_fm1_links()['play'] ); ?>" target="_blank" rel="noopener noreferrer" class="block transition hover:-translate-y-0.5">
            <picture>
                <source srcset="<?php echo esc_url( get_theme_file_uri( 'images/atek303-fm1-web.webp' ) ); ?>" type="image/webp">
                <img src="<?php echo esc_url( get_theme_file_uri( 'images/atek303-fm1-web.png' ) ); ?>" alt="<?php echo esc_attr( animatek_fm1_t( $lang, 'El FM-1 en el navegador con el ATEK303 sonando: el preset COSMIC TRAX en la pantalla, knobs, botones y teclas', 'The FM-1 in the browser playing ATEK303: the COSMIC TRAX preset on screen, knobs, buttons and keys' ) ); ?>" width="1280" height="816" class="w-full">
            </picture>
        </a>
        <figcaption class="text-xs <?php echo esc_attr( animatek_fm1_styles()['muted'] ); ?>"><?php echo esc_html( animatek_fm1_t( $lang, 'El ATEK303 en la versión para el navegador: el mismo firmware, con sonido. Pulsa la imagen para tocarlo.', 'ATEK303 in the browser version: the same firmware, with sound. Click the picture to play it.' ) ); ?></figcaption>
    </figure>
    <?php
}

/** El aviso común: firmware no oficial, a tu riesgo, cómo volver atrás. */
function animatek_fm1_render_safety( string $lang = 'es' ): void {
    $s = animatek_fm1_styles();
    $tips = 'en' === $lang ? [
        'Back up first'           => 'Before changing firmware, save your sounds and projects with the tool of the firmware you have. Each firmware uses the memory its own way, and the new one may overwrite what was there.',
        'Battery and cable'       => 'A charged battery, a data cable straight to the computer (no USB hub) and Chrome or Edge, the browsers with Web MIDI. Do not unplug anything until it finishes.',
        'Back to the stock one'   => 'You can always go back to the M-VAVE firmware with its updater or with The Firmware Hub.',
        'If something goes wrong' => 'If the firmware fails to start twice, the FM-1 drops into a safe mode with USB on, to reinstall. Holding REC at power-on enters the chip\'s update mode. For an FM-1 that does not start, there are community rescue tools over USB.',
    ] : [
        'Copia de seguridad'   => 'Antes de cambiar de firmware, guarda tus sonidos y proyectos con la herramienta del firmware que tengas. Cada firmware usa la memoria a su manera y el nuevo puede pisar lo anterior.',
        'Batería y cable'      => 'Batería cargada, cable de datos directo al ordenador (sin hub USB) y Chrome o Edge, que son los navegadores con Web MIDI. No desconectes nada hasta que termine.',
        'Vuelta al oficial'    => 'Siempre puedes volver al firmware de M-VAVE con su actualizador o con The Firmware Hub.',
        'Si algo sale mal'     => 'Si el firmware falla dos veces al arrancar, el FM-1 entra solo en un modo seguro con el USB activo para reinstalar. Mantener REC al encender lleva al modo de actualización del chip. Para un FM-1 que no arranca existen herramientas de rescate por USB de la comunidad.',
    ];
    ?>
    <section class="<?php echo esc_attr( $s['section'] ); ?>">
        <div class="mb-8 space-y-3">
            <p class="<?php echo esc_attr( $s['kicker'] ); ?>"><?php echo esc_html( animatek_fm1_t( $lang, 'Antes de instalar', 'Before you install' ) ); ?></p>
            <h2 class="<?php echo esc_attr( $s['h2'] ); ?>"><?php echo esc_html( animatek_fm1_t( $lang, 'Un firmware no oficial se instala a tu riesgo', 'An unofficial firmware is installed at your own risk' ) ); ?></h2>
            <p class="max-w-3xl <?php echo esc_attr( $s['muted'] ); ?>"><?php echo esc_html( animatek_fm1_t( $lang, 'Instalar un firmware de la comunidad es seguro si se hace con cuidado, pero no lo hace ni lo respalda M-VAVE. Cuatro cosas que conviene saber:', 'Installing a community firmware is safe if you take care, but it is not made or endorsed by M-VAVE. Four things worth knowing:' ) ); ?></p>
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

function animatek_fm1_render_trademarks( string $lang = 'es' ): void {
    $s = animatek_fm1_styles();
    ?>
    <section class="border-t border-zinc-300 dark:border-zinc-800">
        <div class="mx-auto max-w-7xl px-6 py-10 text-sm sm:px-10 <?php echo esc_attr( $s['muted'] ); ?>">
            <p><?php echo esc_html( animatek_fm1_t( $lang, 'M-VAVE y FM-1 son marcas de sus propietarios; TB-303 es una marca de Roland Corporation. Se usan aquí solo para identificar el aparato y el sonido de referencia. Estos firmwares son proyectos independientes de Animatek, sin relación con M-VAVE ni con Roland.', 'M-VAVE and FM-1 are trademarks of their owners; TB-303 is a trademark of Roland Corporation. They are used here only to identify the device and the reference sound. These firmwares are independent Animatek projects, not affiliated with M-VAVE or Roland.' ) ); ?></p>
        </div>
    </section>
    <?php
}

/** /fm1/ y /fm1-eng/: los firmwares de Animatek para el FM-1. */
function animatek_fm1_render_hub( string $lang = 'es' ): void {
    $s = animatek_fm1_styles();
    $en = 'en' === $lang;
    $firmwares = [
        [
            'url'    => home_url( $en ? '/atek303-fm1-eng/' : '/atek303-fm1/' ),
            'image'  => get_theme_file_uri( 'images/atek303-fm1-seq.png' ),
            'alt'    => animatek_fm1_t( $lang, 'Pantalla del ATEK303 en el FM-1 con el preset COSMIC TRAX sonando', 'ATEK303 screen on the FM-1 playing the COSMIC TRAX preset' ),
            'title'  => 'ATEK303',
            'meta'   => animatek_fm1_t( $lang, 'Versión ', 'Version ' ) . ATEK303_FM1_VERSION . animatek_fm1_t( $lang, ' · Gratis · GPLv3', ' · Free · GPLv3' ),
            'text'   => animatek_fm1_t( $lang, 'La voz del ATEK303 de VCV Rack y su generador de patrones acid de 64 pasos, con efectos, editor de pasos, 12 presets de fábrica y MIDI. Se toca también en el navegador.', 'The ATEK303 voice from VCV Rack and its 64-step acid pattern generator, with effects, a step editor, 12 factory presets and MIDI. You can also play it in the browser.' ),
        ],
    ];
    ?>
    <main id="primary" class="bg-zinc-100 text-zinc-950 dark:bg-zinc-950 dark:text-white">
        <section class="relative overflow-hidden bg-slate-50 text-slate-900 dark:bg-zinc-900 dark:text-white">
            <div class="pointer-events-none absolute inset-0 opacity-40 hero-grid"></div>
            <div class="relative mx-auto grid max-w-7xl items-center gap-8 px-6 py-10 sm:px-10 lg:grid-cols-[1fr_minmax(0,30rem)] lg:py-12">
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <p class="<?php echo esc_attr( $s['kicker'] ); ?>">Animatek · Software · M-VAVE FM-1</p>
                        <?php animatek_fm1_lang_switch( 'fm1', $lang ); ?>
                    </div>
                    <h1 class="text-4xl font-black leading-none sm:text-5xl"><?php echo esc_html( animatek_fm1_t( $lang, 'Firmwares para el FM-1', 'Firmwares for the FM-1' ) ); ?></h1>
                    <p class="max-w-2xl text-lg leading-relaxed text-slate-700 dark:text-zinc-300"><?php echo esc_html( animatek_fm1_t( $lang, 'El M-VAVE FM-1 es un sinte de bolsillo que se puede reprogramar: le instalas otro firmware y se convierte en otro instrumento. Aquí van los que hacemos en Animatek. Son gratis y de código abierto.', 'The M-VAVE FM-1 is a pocket synth you can reprogram: install another firmware and it becomes another instrument. These are the ones we make at Animatek. They are free and open source.' ) ); ?></p>
                    <div class="pt-2">
                        <?php animatek_fm1_icon_links( [
                            [ 'icon' => 'code', 'color' => '#9CA3AF', 'url' => animatek_fm1_repo_url(), 'label' => animatek_fm1_t( $lang, 'Código', 'Code' ), 'external' => true ],
                        ] ); ?>
                    </div>
                </div>
                <?php animatek_fm1_render_web_shot( $lang ); ?>
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
                    <p class="mb-2 text-xs font-black uppercase tracking-widest <?php echo esc_attr( $s['muted'] ); ?>"><?php echo esc_html( animatek_fm1_t( $lang, 'Próximamente', 'Coming next' ) ); ?></p>
                    <h2 class="mb-2 text-2xl font-black"><?php echo esc_html( animatek_fm1_t( $lang, 'Más firmwares', 'More firmwares' ) ); ?></h2>
                    <p class="leading-relaxed <?php echo esc_attr( $s['muted'] ); ?>"><?php echo esc_html( animatek_fm1_t( $lang, 'El ATEK303 es el primero. Habrá más: cuando estén probados en un FM-1 real, aparecerán aquí.', 'ATEK303 is the first. More will come: once tested on a real FM-1, they will show up here.' ) ); ?></p>
                </div>
            </div>
        </section>

        <?php animatek_fm1_render_safety( $lang ); ?>
        <?php animatek_fm1_render_trademarks( $lang ); ?>
    </main>
    <?php
}

/** El texto de la página del ATEK303, en un idioma. */
function animatek_atek303_fm1_copy( string $lang ): array {
    $v = ATEK303_FM1_VERSION;
    if ( 'en' === $lang ) {
        return [
            'kicker'   => 'Firmware for the M-VAVE FM-1 · Version ' . $v . ' · GPLv3',
            'subtitle' => 'The VCV Rack 303, inside the FM-1.',
            'lead'     => 'The ATEK303 voice and its acid pattern generator, in a pocket synth. Press PLAY and a line plays; turn the knobs and it moves. No computer and no cables, if you like.',
            'links'    => [ 'Play in browser', 'Download ' . $v, 'Firmware Hub', 'Cheat sheet', 'What\'s new', 'Code' ],
            'more'     => [ 'Read the manual', 'ATEK303 in VCV Rack' ],
            'features' => [
                'The ATEK303 voice'          => 'The same engine as the VCV Rack module: Open303 with the ATEK oscillator and diode filter, modelled on the 303 schematic. Against the original the difference stays at -51 dB: it is the same sound. With its fine tuning, as in VCV.',
                'The acid pattern generator' => 'SEQ makes a new line of up to 64 steps; the mutations change the rhythm, the octaves or the slides and accents. It is the ATEK303 SEQ algorithm: the same seed gives the same pattern in VCV and on the FM-1.',
                'Stereo effects'             => 'Distortion (overdrive, RAT or fuzz), chorus or flanger, a tempo-synced ping-pong delay and a plate reverb. At the output, a limiter that makes it louder without clipping.',
                'Step editor and presets'    => 'A piano roll in pages of 16 steps to touch up the pattern note by note, 12 factory presets and 32 slots with a save screen that asks before overwriting.',
                'MIDI in and out'            => 'Notes, CC and clock in; the sequencer\'s notes and the clock go out over USB, to record the line in your DAW or play another synth with it.',
                'Try it in the browser'      => 'The same firmware built for the web: the FM-1 on screen, with sound, nothing to install.',
            ],
            'gallery_title' => 'The screens',
            'gallery'  => [
                'seq'          => 'Playing: the preset\'s name, the four filter knobs and the strip of steps, the one sounding framed. Battery top right.',
                'delay'        => 'DELAY page: the ping-pong follows the tempo. At the bottom, the page navigator.',
                'editor'       => 'The step editor: the note in the piano roll; octave, gate, accent and slide underneath.',
                'presets'      => 'The preset list: each one loads as you reach it; while playing, the change waits for the end of the pattern (NEXT).',
                'save'         => 'SAVE: slot and name. Over a slot in use it says OVERWRITE…',
                'overwrite'    => '…and asks before replacing it: NO / YES.',
                'options'      => 'OPTIONS (OCT− + HOME): colour, MIDI channels, the sequencer\'s notes and clock out.',
                'options-fine' => 'The fine tuning of the VCV module, in the same menu.',
                'amber'        => 'The AMBER theme, one of the five colours of fm1-base besides the Animatek blue.',
            ],
            'manual_kicker' => 'Manual',
            'manual_title'  => 'How to use it',
            'buttons_title' => 'The buttons',
            'buttons'  => [
                [ 'PLAY', 'Starts and stops the sequencer. If MIDI clock comes in, it follows it.' ],
                [ 'SEQ', 'A new pattern (new seed). While playing, it comes in on the next bar. With LOCK on, it mutates the three layers instead.' ],
                [ 'ENV / LFO / ARP', 'Mutate the rhythm, the notes (octaves) and the slides and accents of the page on view. In the editor, ENV toggles the accent and LFO the slide.' ],
                [ 'REC', 'Undoes the last mutation or edit.' ],
                [ 'GLO', 'LOCK: SEQ mutates instead of making a new seed.' ],
                [ 'EDIT', 'Opens and closes the step editor.' ],
                [ 'FX', 'Jumps to the effect pages; pressed again, to the next one.' ],
                [ 'HOME', 'Steps through VCF, VOICE, PATT and SEQ; from the editor, the list or an effect, back to VCF.' ],
                [ 'OCT− + HOME', 'OPTIONS: screen colour, MIDI channels, notes and clock out, and the voice\'s fine tuning.' ],
                [ 'SAVE', 'Opens the save screen: slot and name; over a slot in use it asks OVERWRITE? NO / YES.' ],
                [ 'OCT− / OCT+', 'The octave (OCT− on release, since it also works in combinations).' ],
                [ 'Keys', 'With the sequencer stopped they play the voice: legato slides and a hard press is an accent. With the sequencer running they transpose the pattern: the key becomes the root.' ],
            ],
            'pages_title' => 'The pages',
            'pages_text'  => 'SELECT walks the eight pages; each puts four parameters on K1 to K4. The navigator at the bottom of the screen marks the page you are on.',
            'pages'    => [
                [ 'VCF', 'CUTOFF, RESO, ENV MOD, DECAY' ],
                [ 'VOICE', 'ACCENT, TUNE, WAVE (saw or square), GATE (length of the sequencer\'s notes)' ],
                [ 'PATT', 'DENSITY, RANGE, ACCENTS, SLIDES: the pattern regrows from its seed as you turn them' ],
                [ 'SEQ', 'STEPS (1 to 64), SCALE, TEMPO, ROOT' ],
                [ 'DELAY', 'TIME (1/16 to dotted 1/4), FEEDBACK, TONE, MIX' ],
                [ 'CHOR', 'TYPE (chorus or flanger), RATE, DEPTH, MIX' ],
                [ 'DRIVE', 'TYPE (off, overdrive, RAT, fuzz), DRIVE, TONE, LEVEL' ],
                [ 'REVRB', 'DECAY, DAMP, PRE-DELAY, MIX' ],
            ],
            'manual'   => [
                'First steps' => [
                    'Press PLAY: preset 01, COSMIC TRAX, plays.',
                    'Press SEQ for another pattern, or ENV, LFO and ARP to mutate the one playing. REC undoes.',
                    'Turn K1 to K4 to change the sound. SELECT changes page and the navigator at the bottom tells you where you are.',
                    'Press a key while it plays to transpose the line.',
                    'Press SAVE twice: it is kept as a preset with an acid name.',
                ],
                'The sequencer' => [
                    'Patterns come from the ATEK303 SEQ generator: scale degrees with their octave, ties, slides and accents. SCALE and ROOT change the output without losing the pattern.',
                    'Up to 64 steps in four pages of 16: the strip shows the page playing, with four marks above it.',
                    'DENSITY, RANGE, ACCENTS and SLIDES regrow the pattern from the same seed in real time: raising the density adds notes without changing the ones there.',
                    'With external MIDI clock it follows START, STOP and CONTINUE at six ticks a step, step-exact with the DAW. On screen the tempo says EXT.',
                ],
                'The step editor' => [
                    'EDIT opens it. SELECT walks the 16 steps of the page and K4 changes page.',
                    'K1 changes the gate (rest, note or tie), K2 the octave and K3 the note a semitone at a time. A key sets the step\'s note and moves on.',
                    'ENV toggles the accent and LFO the slide. A slide into the same note plays legato, as on a 303.',
                    'Hold OCT− and turn K4 to change the pattern length (1 to 64 steps).',
                ],
                'Presets' => [
                    '12 factory presets and 32 slots in the FM-1\'s memory, with an internal backup copy: a power cut halfway through saving does not lose them.',
                    'Each preset keeps the pattern (with its seed and mutations), the voice, the effects, the tempo, the scale, the root and the octave.',
                    'Turn PRESETS to open the list: the cursor loads each preset as it passes. While playing, the change waits for the end of the pattern, as on a 303 (NEXT). ENV twice deletes the selected one and HOME closes the list.',
                    'The presets can be copied to the computer and back over USB with fm1-base\'s backup tool.',
                ],
                'OPTIONS (OCT− + HOME)' => [
                    'COLOR: the Animatek blue or the fm1-base themes (green, amber, cyan, red and mono).',
                    'MIDI: input channel (all or one), output channel, the sequencer\'s notes over USB and the clock out.',
                    'FINE TUNING: the same menu as the VCV ATEK303: pulse width, oscillator droops, filter drive, slide time, auto-legato, saturations, analogue drift and unit.',
                    'The options belong to the unit, not to the presets, and are saved when you close the menu.',
                ],
                'MIDI' => [
                    'In over USB and the TRS minijack: with the sequencer stopped, notes play the voice (velocity 100 or more: accent; overlapping notes: slide); running, they transpose the pattern.',
                    'CC 74 cutoff, 71 resonance, 75 env mod, 76 decay, 77 accent, 78 tune and 79 wave.',
                    'Out over USB: the keys and the sequencer\'s notes (accent at velocity 127) and, if switched on, the clock.',
                ],
            ],
            'install_title' => 'Install',
            'install'  => [
                'Download the .fwsc file of release ' . $v . ' on GitHub and install it with the community web installer (Chrome or Edge) or with fm1-base\'s fm1_install.py script. It has also been sent to The Firmware Hub, to install it from there in one click.',
                'Tested on a real FM-1: it installs from the stock V15 firmware and from another firmware, and you can leave it again. It carries the community update loader, so you can always install another one over it or go back to the official M-VAVE firmware.',
                'Presets saved with 1.0 do not load in 1.1 (the format changed with the 64 steps).',
            ],
            'credits_title' => 'Credits and licence',
            'credits'  => [
                'ATEK303 for FM-1 is free software (GPL-3.0) by Animatek.',
                'The voice starts from Open303 by Robin Schmidt (MIT licence).',
                'It runs on fm1-base by Charles Vestal (MPL-2.0) and felucca-bsp by Hügelton Instruments (MPL-2.0).',
            ],
        ];
    }
    return [
        'kicker'   => 'Firmware para M-VAVE FM-1 · Versión ' . $v . ' · GPLv3',
        'subtitle' => 'El 303 de VCV Rack, dentro del FM-1.',
        'lead'     => 'La voz del ATEK303 y su generador de patrones acid, en un sinte de bolsillo. Pulsas PLAY y suena una línea; giras los knobs y se mueve. Sin ordenador y sin cables, si no quieres.',
        'links'    => [ 'Tocar en el navegador', 'Descargar ' . $v, 'Firmware Hub', 'Cheat sheet', 'Novedades', 'Código' ],
        'more'     => [ 'Leer el manual', 'ATEK303 en VCV Rack' ],
        'features' => [
            'La voz del ATEK303'           => 'El mismo motor que el módulo de VCV Rack: Open303 con el oscilador y el filtro de diodos de ATEK, modelados sobre el esquema del 303. Comparado con el original, la diferencia queda a -51 dB: es el mismo sonido. Con su ajuste fino, como en VCV.',
            'El generador de patrones acid' => 'SEQ crea una línea nueva de hasta 64 pasos; las mutaciones cambian el ritmo, las octavas o los slides y acentos. Es el algoritmo del ATEK303 SEQ: la misma semilla da el mismo patrón en VCV y en el FM-1.',
            'Efectos en estéreo'           => 'Distorsión (overdrive, RAT o fuzz), chorus o flanger, delay ping-pong sincronizado al tempo y una reverb de placa. A la salida, un limitador que sube el volumen sin recortar.',
            'Editor de pasos y presets'     => 'Un piano roll por páginas de 16 pasos para retocar el patrón nota a nota, 12 presets de fábrica y 32 huecos con pantalla de guardar y confirmación.',
            'MIDI de entrada y salida'      => 'Notas, CC y reloj de entrada; las notas del secuenciador y el reloj salen por USB, para grabar la línea en el DAW o tocar otro sinte con ella.',
            'Pruébalo en el navegador'      => 'El mismo firmware compilado para la web: el FM-1 en pantalla, con sonido, sin instalar nada.',
        ],
        'gallery_title' => 'Las pantallas',
        'gallery'  => [
            'seq'          => 'Sonando: el nombre del preset, los cuatro knobs del filtro y la tira de pasos, con el que suena enmarcado. Arriba a la derecha, la batería.',
            'delay'        => 'Página DELAY: el ping-pong sigue el tempo. Abajo, el navegador de páginas.',
            'editor'       => 'El editor de pasos: la nota en el piano roll; octava, gate, acento y slide debajo.',
            'presets'      => 'La lista de presets: se cargan al pasar por ellos; sonando, el cambio espera al final del patrón (NEXT).',
            'save'         => 'SAVE: hueco y nombre. Sobre un hueco ocupado avisa con OVERWRITE…',
            'overwrite'    => '…y pregunta antes de pisarlo: NO / YES.',
            'options'      => 'OPTIONS (OCT− + HOME): color, canales MIDI, notas y reloj de salida.',
            'options-fine' => 'El ajuste fino del módulo de VCV, en el mismo menú.',
            'amber'        => 'El tema AMBER, uno de los cinco colores de fm1-base, además del azul de Animatek.',
        ],
        'manual_kicker' => 'Manual',
        'manual_title'  => 'Cómo se usa',
        'buttons_title' => 'Los botones',
        'buttons'  => [
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
        ],
        'pages_title' => 'Las páginas',
        'pages_text'  => 'SELECT recorre las ocho páginas; cada una reparte cuatro parámetros en K1 a K4. El navegador al pie de la pantalla marca la página en la que estás.',
        'pages'    => [
            [ 'VCF', 'CUTOFF, RESO, ENV MOD, DECAY' ],
            [ 'VOICE', 'ACCENT, TUNE, WAVE (sierra o cuadrada), GATE (duración de las notas del secuenciador)' ],
            [ 'PATT', 'DENSITY, RANGE, ACCENTS, SLIDES: el patrón vuelve a crecer desde su semilla al girarlos' ],
            [ 'SEQ', 'STEPS (1 a 64), SCALE, TEMPO, ROOT' ],
            [ 'DELAY', 'TIME (de 1/16 a 1/4 con puntillo), FEEDBACK, TONE, MIX' ],
            [ 'CHOR', 'TYPE (chorus o flanger), RATE, DEPTH, MIX' ],
            [ 'DRIVE', 'TYPE (off, overdrive, RAT, fuzz), DRIVE, TONE, LEVEL' ],
            [ 'REVRB', 'DECAY, DAMP, PRE-DELAY, MIX' ],
        ],
        'manual'   => [
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
        ],
        'install_title' => 'Instalación',
        'install'  => [
            'Descarga el archivo .fwsc de la release ' . $v . ' en GitHub e instálalo con el instalador web de la comunidad (Chrome o Edge) o con el script fm1_install.py de fm1-base. Está enviado también a The Firmware Hub, para instalarlo desde allí con un clic.',
            'Probado en un FM-1 real: se instala desde el firmware oficial V15 y desde otro firmware, y se puede salir de él. Lleva la vía de actualización de la comunidad, así que siempre se puede instalar otro encima o volver al oficial de M-VAVE.',
            'Los presets guardados con la 1.0 no se cargan en la 1.1 (el formato cambió con los 64 pasos).',
        ],
        'credits_title' => 'Créditos y licencia',
        'credits'  => [
            'ATEK303 para FM-1 es software libre (GPL-3.0) de Animatek.',
            'La voz parte de Open303, de Robin Schmidt (licencia MIT).',
            'Funciona sobre fm1-base, de Charles Vestal (MPL-2.0), y felucca-bsp, de Hügelton Instruments (MPL-2.0).',
        ],
    ];
}

/** /atek303-fm1/ y /atek303-fm1-eng/: el ATEK303 para el FM-1, con su manual. */
function animatek_atek303_fm1_render( string $lang = 'es' ): void {
    $s = animatek_fm1_styles();
    $c = animatek_atek303_fm1_copy( $lang );
    $links = animatek_atek303_fm1_links();
    if ( ! function_exists( 'animatek_vcv_modules_data' ) ) {
        require_once get_theme_file_path( 'inc/animatek-vcv-module-template.php' );
    }
    $modules = animatek_vcv_modules_data();
    $vcv_url = isset( $modules['atek303'] ) ? animatek_vcv_module_url( $modules['atek303'], 'en' === $lang ) : home_url( 'en' === $lang ? '/software-eng/#vcv-rack' : '/software/#vcv-rack' );
    $img = static function ( string $name ): string {
        return get_theme_file_uri( 'images/atek303-fm1-' . $name . '.png' );
    };
    $icon_links = [
        [ 'icon' => 'play', 'color' => '#22C55E', 'url' => $links['play'], 'label' => $c['links'][0], 'external' => true ],
        [ 'icon' => 'download', 'color' => '#2C7FFF', 'url' => $links['fwsc'], 'label' => $c['links'][1] ],
        [ 'icon' => 'plug', 'color' => '#EC4899', 'url' => $links['hub'], 'label' => $c['links'][2], 'external' => true ],
        [ 'icon' => 'doc', 'color' => '#A855F7', 'url' => $links['cheat'], 'label' => $c['links'][3], 'external' => true ],
        [ 'icon' => 'notes', 'color' => '#FD9A00', 'url' => $links['release'], 'label' => $c['links'][4], 'external' => true ],
        [ 'icon' => 'code', 'color' => '#9CA3AF', 'url' => $links['code'], 'label' => $c['links'][5], 'external' => true ],
    ];
    ?>
    <main id="primary" class="bg-zinc-100 text-zinc-950 dark:bg-zinc-950 dark:text-white">
        <section class="relative overflow-hidden bg-slate-50 text-slate-900 dark:bg-zinc-900 dark:text-white">
            <div class="pointer-events-none absolute inset-0 opacity-40 hero-grid"></div>
            <div class="relative mx-auto max-w-7xl px-6 py-10 sm:px-10 lg:py-12">
                <div class="grid items-center gap-8 lg:grid-cols-[1fr_minmax(0,36rem)]">
                    <div class="space-y-5">
                        <div class="flex items-center gap-3">
                            <p class="<?php echo esc_attr( $s['kicker'] ); ?>"><?php echo esc_html( $c['kicker'] ); ?></p>
                            <?php animatek_fm1_lang_switch( 'atek303-fm1', $lang ); ?>
                        </div>
                        <div class="space-y-3">
                            <h1 class="text-4xl font-black leading-none sm:text-5xl lg:text-6xl">ATEK303</h1>
                            <p class="text-xl font-semibold text-primary sm:text-2xl"><?php echo esc_html( $c['subtitle'] ); ?></p>
                        </div>
                        <p class="text-lg leading-relaxed text-slate-700 dark:text-zinc-300"><?php echo esc_html( $c['lead'] ); ?></p>
                        <?php animatek_fm1_icon_links( $icon_links ); ?>
                        <p class="text-sm font-semibold">
                            <a href="#manual" class="text-primary underline-offset-2 hover:underline"><?php echo esc_html( $c['more'][0] ); ?></a>
                            <span class="<?php echo esc_attr( $s['muted'] ); ?>"> · </span>
                            <a href="<?php echo esc_url( $vcv_url ); ?>" class="text-primary underline-offset-2 hover:underline"><?php echo esc_html( $c['more'][1] ); ?></a>
                        </p>
                    </div>
                    <?php animatek_fm1_render_web_shot( $lang ); ?>
                </div>
            </div>
        </section>

        <section class="<?php echo esc_attr( $s['section'] ); ?>">
            <div class="grid gap-5 md:grid-cols-2">
                <?php foreach ( $c['features'] as $title => $text ) : ?>
                    <div class="<?php echo esc_attr( $s['card'] ); ?>">
                        <h2 class="mb-2 text-xl font-extrabold"><?php echo esc_html( $title ); ?></h2>
                        <p class="leading-relaxed <?php echo esc_attr( $s['muted'] ); ?>"><?php echo esc_html( $text ); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="bg-[#16181C] text-white">
            <div class="<?php echo esc_attr( $s['section'] ); ?>">
                <h2 class="mb-8 text-3xl font-black"><?php echo esc_html( $c['gallery_title'] ); ?></h2>
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <?php foreach ( $c['gallery'] as $name => $caption ) : ?>
                        <figure class="space-y-3">
                            <img src="<?php echo esc_url( $img( $name ) ); ?>" alt="<?php echo esc_attr( $caption ); ?>" width="480" height="480" class="w-full rounded-lg" style="image-rendering: pixelated;" loading="lazy">
                            <figcaption class="text-sm leading-relaxed text-zinc-400"><?php echo esc_html( $caption ); ?></figcaption>
                        </figure>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section id="manual" class="<?php echo esc_attr( $s['section'] ); ?>">
            <div class="mb-10 space-y-3">
                <p class="<?php echo esc_attr( $s['kicker'] ); ?>"><?php echo esc_html( $c['manual_kicker'] ); ?></p>
                <h2 class="<?php echo esc_attr( $s['h2'] ); ?>"><?php echo esc_html( $c['manual_title'] ); ?></h2>
            </div>

            <h3 class="mb-4 text-2xl font-black"><?php echo esc_html( $c['buttons_title'] ); ?></h3>
            <div class="mb-12 overflow-hidden rounded-lg border border-zinc-300 bg-white dark:border-zinc-700 dark:bg-zinc-900">
                <table class="w-full text-left text-sm">
                    <tbody>
                        <?php foreach ( $c['buttons'] as $row ) : ?>
                            <tr class="border-b border-zinc-200 last:border-0 dark:border-zinc-800">
                                <th class="w-40 px-5 py-3 align-top font-black text-primary"><?php echo esc_html( $row[0] ); ?></th>
                                <td class="px-5 py-3 leading-relaxed"><?php echo esc_html( $row[1] ); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <h3 class="mb-4 text-2xl font-black"><?php echo esc_html( $c['pages_title'] ); ?></h3>
            <p class="mb-4 max-w-3xl <?php echo esc_attr( $s['muted'] ); ?>"><?php echo esc_html( $c['pages_text'] ); ?></p>
            <div class="mb-12 grid gap-3 sm:grid-cols-2">
                <?php foreach ( $c['pages'] as $row ) : ?>
                    <div class="flex gap-4 rounded-lg border border-zinc-300 bg-white p-4 dark:border-zinc-700 dark:bg-zinc-900">
                        <span class="w-16 shrink-0 font-black text-primary"><?php echo esc_html( $row[0] ); ?></span>
                        <span class="text-sm leading-relaxed"><?php echo esc_html( $row[1] ); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="grid gap-8 lg:grid-cols-2">
                <?php foreach ( $c['manual'] as $title => $items ) : ?>
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
                    <h2 class="mb-3 text-2xl font-black"><?php echo esc_html( $c['install_title'] ); ?></h2>
                    <?php foreach ( $c['install'] as $p ) : ?>
                        <p class="mb-3 leading-relaxed <?php echo esc_attr( $s['muted'] ); ?>"><?php echo esc_html( $p ); ?></p>
                    <?php endforeach; ?>
                </div>
                <div class="<?php echo esc_attr( $s['card'] ); ?>">
                    <h2 class="mb-3 text-2xl font-black"><?php echo esc_html( $c['credits_title'] ); ?></h2>
                    <?php foreach ( $c['credits'] as $p ) : ?>
                        <p class="mb-3 leading-relaxed <?php echo esc_attr( $s['muted'] ); ?>"><?php echo esc_html( $p ); ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <?php animatek_fm1_render_safety( $lang ); ?>
        <?php animatek_fm1_render_trademarks( $lang ); ?>
    </main>
    <?php
}
