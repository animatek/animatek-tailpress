<?php
/** Landing de G1-Emu. Contenido: README y docs/release-notes del emulador. */
function animatek_g1_emu_render_page( string $locale = 'es' ): void {
    $is_en = 'en' === $locale;
    $suffix = $is_en ? '-eng' : '';
    require_once get_theme_file_path( 'inc/animatek-vcv-module-template.php' );

    $github = 'https://github.com/animatek/G1-Emu';
    $patreon_url = 'https://www.patreon.com/c/animatek';
    $button = 'inline-flex min-h-11 items-center justify-center rounded-full px-5 py-3 text-sm font-extrabold transition hover:-translate-y-0.5 focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-primary';
    $card   = 'rounded-lg border border-zinc-300 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900';
    $copy = $is_en ? [
        'badge' => 'Pre-alpha · Open source · GPLv3',
        'subtitle' => 'The Nord Modular G1, emulated.',
        'hero' => 'The modular synth on your computer: its original operating system, an interactive panel and your .pch patches. Edit with Animatek NME and play on Linux, macOS or Windows.',
        'patreon' => 'Support on Patreon',
        'download' => 'Download on GitHub',
        'repository' => 'View repository',
        'rom_notice' => 'You need your own ROM and a compatible editor. No ROMs or firmware are included or provided.',
        'image_alt' => 'G1-Emu panel with the emulated synthesizer’s display, knobs, buttons and LEDs',
        'caption' => 'The emulator’s panel. Modules and cables are edited in an external editor.',
        'features_title' => 'A G1 on the other end of the PC Port.',
        'intro' => 'G1-Emu is the instrument; NME is the editor. Add modules, connect cables and send the patch to the emulator just as you would with the hardware. Other editors that speak the G1 protocol work too.',
        'listen_title' => 'How it sounds',
        'listen_text' => 'Sound Demo 01: G1-Emu alpha 10 playing a dozen and a half patches from start to finish, no talking. Pads, an organ, drones, sequencers and a four-slot patch with morphs, all loaded from Animatek NME.',
        'video_title' => 'Nord Modular G1 emulated (G1-Emu alpha 10) · Sound Demo 01',
        'start_title' => 'From first launch to first sound',
        'nme' => 'Discover Animatek NME',
        'docs' => 'Documentation',
        'windows' => 'Getting started on Windows',
        'community_title' => 'Built with the community',
        'status' => 'It already boots, connects to NME and plays in real time. It is still a pre-alpha: testing, hardware comparisons and unfinished features remain. Each release documents its improvements and known limitations.',
        'contribute_text' => 'You can contribute code, patch tests, recordings from a real G1, documentation or reproducible bug reports. This is a community project made in spare time, with no support service.',
        'contribute' => 'How to contribute',
        'issues' => 'Bugs and suggestions on GitHub',
        'roadmap' => 'Roadmap',
        'independent_title' => 'An independent project',
        'credits' => 'G1-Emu is open-source software licensed under GPLv3, started by Animatek on the Gearmulator core, building on the work of The Usual Suspects and the joelanders fork.',
        'trademarks' => 'It is not affiliated with, connected to or endorsed by Clavia DMI. Nord and Nord Modular are trademarks of Clavia DMI and are used here to identify the instrument being emulated.',
        'own_rom' => 'The ROM must be dumped from your own unit. The project does not distribute firmware or accept requests for ROMs.',
        'explore' => 'Explore G1-Emu on GitHub',
    ] : [
        'badge' => 'Pre-alpha · Código abierto · GPLv3',
        'subtitle' => 'El Nord Modular G1, emulado.',
        'hero' => 'El sintetizador modular en tu ordenador: su sistema operativo original, un panel interactivo y tus patches .pch. Edita desde Animatek NME y toca en Linux, macOS o Windows.',
        'patreon' => 'Apoyar en Patreon',
        'download' => 'Descargar en GitHub',
        'repository' => 'Ver repositorio',
        'rom_notice' => 'Necesitas tu propia ROM y un editor compatible. No se incluyen ni se proporcionan ROMs o firmware.',
        'image_alt' => 'Panel de G1-Emu con pantalla, controles giratorios, botones y LEDs del sintetizador emulado',
        'caption' => 'El panel del emulador. La edición de módulos y cables se realiza desde un editor externo.',
        'features_title' => 'Un G1 al otro lado del PC Port.',
        'intro' => 'G1-Emu hace de instrumento; NME hace de editor. Crea módulos, conecta cables y envía el patch al emulador como lo harías con el sintetizador físico. También admite otros editores que hablen el protocolo del G1.',
        'listen_title' => 'Así suena',
        'listen_text' => 'Sound Demo 01: G1-Emu alpha 10 tocando una quincena de patches de principio a fin, sin hablar. Pads, un órgano, drones, secuenciadores y un patch de cuatro slots con morphs, todos cargados desde Animatek NME.',
        'video_title' => 'Nord Modular G1 emulado (G1-Emu alpha 10) · Sound Demo 01',
        'start_title' => 'Del primer arranque al primer sonido',
        'nme' => 'Descubrir Animatek NME',
        'docs' => 'Documentación',
        'windows' => 'Primeros pasos en Windows',
        'community_title' => 'En desarrollo, con la comunidad',
        'status' => 'Ya arranca, se conecta con NME y suena en tiempo real. Sigue siendo una pre-alpha: quedan validaciones, comparaciones con hardware y funciones por completar. Las notas de cada versión recogen los avances y las limitaciones conocidas.',
        'contribute_text' => 'Puedes contribuir con código, pruebas de patches, grabaciones del G1 real, documentación o informes de errores reproducibles. Es un proyecto comunitario realizado en tiempo libre, sin servicio de soporte.',
        'contribute' => 'Cómo colaborar',
        'issues' => 'Errores y propuestas en GitHub',
        'roadmap' => 'Hoja de ruta',
        'independent_title' => 'Proyecto independiente',
        'credits' => 'G1-Emu es software de código abierto bajo licencia GPLv3, iniciado por Animatek sobre el núcleo de Gearmulator, con el trabajo de The Usual Suspects y el fork de joelanders como base.',
        'trademarks' => 'No está afiliado, conectado ni respaldado por Clavia DMI. Nord y Nord Modular son marcas de Clavia DMI y se utilizan aquí para identificar el instrumento emulado.',
        'own_rom' => 'La ROM debe proceder de tu propia unidad. El proyecto no distribuye firmware ni atiende solicitudes de ROMs.',
        'explore' => 'Explorar G1-Emu en GitHub',
    ];
    $features = $is_en ? [
        'The original OS on emulated hardware' => 'The Nord Modular G1 rack OS 3.03 runs on an emulated Motorola 68331 and four emulated DSP56303s. The engine is built on Gearmulator.',
        'A hands-on panel' => 'A display, 18 knobs, master volume, buttons and LEDs in a dedicated window. Settings brings together ROM selection, the audio device and output level.',
        'Bring your patches to life' => 'Oscillators, filters, envelopes, clocks and effects such as chorus and overdrive already run in real time. Saved patches stay in flash memory between sessions.',
        'Audio and MIDI for your studio' => 'PC Port connects to the editor; MIDI carries notes and controllers. On Linux, JACK provides four outputs and two inputs; without JACK, ALSA provides outputs 1/2. A VST3 is in beta, for now built from source, to play it inside your DAW.',
    ] : [
        'El sistema original, en hardware emulado' => 'El OS 3.03 del Nord Modular G1 rack se ejecuta sobre un Motorola 68331 y cuatro DSP56303 emulados. El motor se apoya en Gearmulator.',
        'Un panel que puedes tocar' => 'Pantalla, 18 controles giratorios, volumen general, botones y LEDs en una ventana propia. Settings reúne la selección de ROM, el dispositivo de audio y el nivel de salida.',
        'Patches que vuelven a sonar' => 'Osciladores, filtros, envolventes, relojes y efectos como chorus y overdrive ya funcionan en tiempo real. Los patches guardados se conservan en la memoria flash entre sesiones.',
        'Audio y MIDI para tu estudio' => 'PC Port para comunicarte con el editor y MIDI para notas y controladores. En Linux, JACK ofrece cuatro salidas y dos entradas; sin JACK, ALSA permite usar las salidas 1/2. Hay un VST3 en beta, por ahora compilándolo desde el código, para tocarlo dentro de tu DAW.',
    ];
    $steps = $is_en ? [
        'Download your build' => 'GitHub Releases has builds and release notes for Linux, macOS and Windows. These are unsigned pre-release versions.',
        'Select your ROM' => 'You need your own 512 KB ROM dump from a Nord Modular rack running OS 3.03. When you open G1-Emu, select the file in the window or in Settings.',
        'Connect the editor' => 'In Animatek NME, select PC Port as both MIDI input and output. Windows uses two separate loopMIDI cables: follow the guide linked below.',
        'Load a patch and play' => 'The slots start empty. Create or open a .pch file in your editor, send it to the emulator and play notes through the MIDI port. Without a loaded patch, there is no sound.',
    ] : [
        'Descarga tu versión' => 'En GitHub Releases encontrarás las compilaciones y sus notas para Linux, macOS y Windows. Son versiones preliminares y todavía no están firmadas.',
        'Selecciona tu ROM' => 'Necesitas un volcado propio de 512 KB de un Nord Modular rack con OS 3.03. Al abrir G1-Emu, selecciona el archivo desde la ventana o desde Settings.',
        'Conecta el editor' => 'En Animatek NME, selecciona PC Port como entrada y salida MIDI. En Windows se utilizan dos cables loopMIDI separados: sigue la guía enlazada más abajo.',
        'Carga un patch y toca' => 'Los slots empiezan vacíos. Crea o abre un archivo .pch en el editor, envíalo al emulador y manda notas por el puerto MIDI. Sin un patch cargado no hay sonido.',
    ];
    ?>
    <main id="primary" class="bg-zinc-100 text-zinc-950 dark:bg-zinc-950 dark:text-white">
        <section class="relative overflow-hidden bg-slate-50 text-slate-900 dark:bg-zinc-900 dark:text-white">
            <div class="pointer-events-none absolute inset-0 opacity-40 hero-grid"></div>
            <div class="relative mx-auto max-w-7xl px-6 py-16 sm:px-10 lg:py-20">
                <div class="mb-8 flex flex-wrap items-center gap-3">
                    <?php animatek_vcv_modules_nav( 'g1-emu' . $suffix, $is_en ? 'en' : 'es' ); ?>
                    <a href="<?php echo esc_url( home_url( $is_en ? '/g1-emu/' : '/g1-emu-eng/' ) ); ?>" hreflang="<?php echo esc_attr( $is_en ? 'es' : 'en' ); ?>" lang="<?php echo esc_attr( $is_en ? 'es' : 'en' ); ?>" class="inline-flex min-h-9 items-center justify-center rounded-md border border-slate-200 bg-white px-3 py-1.5 text-xs font-bold text-slate-700 transition hover:bg-slate-100 focus-visible:outline-2 focus-visible:outline-primary"><?php echo esc_html( $is_en ? 'ES' : 'EN' ); ?></a>
                </div>
                <div class="grid items-center gap-10 lg:grid-cols-2">
                    <div class="space-y-6">
                        <p class="text-xs font-black uppercase tracking-widest text-red-700 dark:text-red-300"><?php echo esc_html( $copy['badge'] ); ?></p>
                        <div class="space-y-3">
                            <h1 class="text-5xl font-black leading-none sm:text-6xl lg:text-7xl">G1-Emu</h1>
                            <p class="text-xl font-semibold text-yellow-700 sm:text-2xl dark:text-[#F4D35E]"><?php echo esc_html( $copy['subtitle'] ); ?></p>
                        </div>
                        <p class="max-w-2xl text-lg leading-relaxed text-slate-600 dark:text-zinc-300"><?php echo esc_html( $copy['hero'] ); ?></p>
                        <div class="flex flex-wrap gap-3">
                            <a href="<?php echo esc_url( $patreon_url ); ?>" target="_blank" rel="noopener noreferrer" class="<?php echo esc_attr( $button ); ?> bg-[#FF424D] text-white shadow-lg hover:bg-[#e63844] focus-visible:outline-[#FF424D]"><?php echo esc_html( $copy['patreon'] ); ?></a>
                            <a href="<?php echo esc_url( $github . '/releases' ); ?>" class="<?php echo esc_attr( $button ); ?> bg-primary text-white hover:bg-primary/90"><?php echo esc_html( $copy['download'] ); ?></a>
                            <a href="<?php echo esc_url( $github ); ?>" class="<?php echo esc_attr( $button ); ?> border border-slate-300 bg-white text-slate-900 hover:bg-slate-100"><?php echo esc_html( $copy['repository'] ); ?></a>
                        </div>
                        <p class="border-l-4 border-yellow-400 pl-4 text-sm leading-relaxed text-slate-600 dark:text-zinc-300"><?php echo esc_html( $copy['rom_notice'] ); ?></p>
                    </div>
                    <figure>
                        <div class="overflow-hidden rounded-lg border border-zinc-700 bg-zinc-950 shadow-2xl">
                            <img src="<?php echo esc_url( get_theme_file_uri( 'images/g1-emu.png' ) ); ?>" alt="<?php echo esc_attr( $copy['image_alt'] ); ?>" class="h-auto w-full" width="1202" height="470" fetchpriority="high">
                        </div>
                        <figcaption class="mt-3 text-sm text-slate-500 dark:text-zinc-400"><?php echo esc_html( $copy['caption'] ); ?></figcaption>
                    </figure>
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-7xl px-6 py-16 sm:px-10" aria-labelledby="g1-features">
            <div class="mb-10 grid gap-6 border-b border-zinc-300 pb-10 dark:border-zinc-700 lg:grid-cols-2">
                <h2 id="g1-features" class="text-3xl font-black sm:text-5xl"><?php echo esc_html( $copy['features_title'] ); ?></h2>
                <p class="text-xl leading-relaxed text-zinc-700 dark:text-zinc-300"><?php echo esc_html( $copy['intro'] ); ?></p>
            </div>
            <div class="grid gap-5 md:grid-cols-2">
                <?php foreach ( $features as $title => $text ) : ?>
                    <article class="<?php echo esc_attr( $card ); ?>">
                        <h3 class="mb-3 text-xl font-black"><?php echo esc_html( $title ); ?></h3>
                        <p class="leading-relaxed text-zinc-700 dark:text-zinc-300"><?php echo esc_html( $text ); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="mx-auto max-w-5xl px-6 pb-16 sm:px-10" aria-labelledby="g1-listen">
            <h2 id="g1-listen" class="text-3xl font-black sm:text-4xl"><?php echo esc_html( $copy['listen_title'] ); ?></h2>
            <p class="mt-4 max-w-3xl text-lg leading-relaxed text-zinc-700 dark:text-zinc-300"><?php echo esc_html( $copy['listen_text'] ); ?></p>
            <div class="mt-8 overflow-hidden rounded-lg border border-zinc-300 bg-black shadow-xl dark:border-zinc-700" style="position:relative;padding-top:56.25%;">
                <iframe src="https://www.youtube-nocookie.com/embed/3Pyff1PP19w" title="<?php echo esc_attr( $copy['video_title'] ); ?>" loading="lazy" style="position:absolute;inset:0;width:100%;height:100%;border:0;" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </section>

        <section class="bg-white dark:bg-zinc-900" aria-labelledby="g1-start">
            <div class="mx-auto max-w-7xl px-6 py-16 sm:px-10">
                <h2 id="g1-start" class="text-3xl font-black sm:text-4xl"><?php echo esc_html( $copy['start_title'] ); ?></h2>
                <ol class="mt-8 grid gap-5 md:grid-cols-2">
                    <?php $number = 0; ?>
                    <?php foreach ( $steps as $title => $text ) : ?>
                        <li class="border-t border-zinc-300 pt-5 dark:border-zinc-700">
                            <span class="text-sm font-black text-primary"><?php echo esc_html( sprintf( '%02d', ++$number ) ); ?></span>
                            <h3 class="my-3 text-xl font-black"><?php echo esc_html( $title ); ?></h3>
                            <p class="leading-relaxed text-zinc-700 dark:text-zinc-300"><?php echo esc_html( $text ); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ol>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="<?php echo esc_url( home_url( '/animatek-nme' . $suffix . '/' ) ); ?>" class="<?php echo esc_attr( $button ); ?> bg-primary text-white"><?php echo esc_html( $copy['nme'] ); ?></a>
                    <a href="<?php echo esc_url( $github . '/blob/main/README.md' ); ?>" class="<?php echo esc_attr( $button ); ?> border border-slate-300 bg-white text-slate-900"><?php echo esc_html( $copy['docs'] ); ?></a>
                    <a href="<?php echo esc_url( $github . '/blob/main/WINDOWS.md' ); ?>" class="<?php echo esc_attr( $button ); ?> border border-slate-300 bg-white text-slate-900"><?php echo esc_html( $copy['windows'] ); ?></a>
                </div>
            </div>
        </section>

        <section class="mx-auto grid max-w-7xl gap-6 px-6 py-16 sm:px-10 lg:grid-cols-2">
            <div class="<?php echo esc_attr( $card ); ?>">
                <h2 class="text-2xl font-black"><?php echo esc_html( $copy['community_title'] ); ?></h2>
                <p class="mt-4 leading-relaxed text-zinc-700 dark:text-zinc-300"><?php echo esc_html( $copy['status'] ); ?></p>
                <p class="mt-4 leading-relaxed text-zinc-700 dark:text-zinc-300"><?php echo esc_html( $copy['contribute_text'] ); ?></p>
                <div class="mt-6 flex flex-wrap gap-4 text-sm font-bold text-primary">
                    <a class="underline underline-offset-4" href="<?php echo esc_url( $github . '/blob/main/CONTRIBUTING.md' ); ?>"><?php echo esc_html( $copy['contribute'] ); ?></a>
                    <a class="underline underline-offset-4" href="<?php echo esc_url( $github . '/issues' ); ?>"><?php echo esc_html( $copy['issues'] ); ?></a>
                    <a class="underline underline-offset-4" href="<?php echo esc_url( $github . '/blob/main/ROADMAP.md' ); ?>"><?php echo esc_html( $copy['roadmap'] ); ?></a>
                </div>
            </div>
            <div class="<?php echo esc_attr( $card ); ?>">
                <h2 class="text-2xl font-black"><?php echo esc_html( $copy['independent_title'] ); ?></h2>
                <p class="mt-4 leading-relaxed text-zinc-700 dark:text-zinc-300"><?php echo esc_html( $copy['credits'] ); ?></p>
                <p class="mt-4 leading-relaxed text-zinc-700 dark:text-zinc-300"><?php echo esc_html( $copy['trademarks'] ); ?></p>
                <p class="mt-4 leading-relaxed text-zinc-700 dark:text-zinc-300"><?php echo esc_html( $copy['own_rom'] ); ?></p>
                <a href="<?php echo esc_url( $github ); ?>" class="<?php echo esc_attr( $button ); ?> mt-6 bg-primary text-white"><?php echo esc_html( $copy['explore'] ); ?></a>
            </div>
        </section>
    </main>
    <?php
}
