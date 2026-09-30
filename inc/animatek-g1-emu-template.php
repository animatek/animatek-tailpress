<?php
/** Landing de G1-Emu. Contenido: README y docs/release-notes del emulador. */
function animatek_g1_emu_render_page(): void {
    require_once get_theme_file_path( 'inc/animatek-vcv-module-template.php' );

    $github = 'https://github.com/animatek/G1-Emu';
    $patreon_url = 'https://www.patreon.com/c/animatek';
    $button = 'inline-flex min-h-11 items-center justify-center rounded-full px-5 py-3 text-sm font-extrabold transition hover:-translate-y-0.5 focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-primary';
    $card   = 'rounded-lg border border-zinc-300 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900';
    $features = [
        'El sistema original, en hardware emulado' => 'El OS 3.03 del Nord Modular G1 rack se ejecuta sobre un Motorola 68331 y cuatro DSP56303 emulados. El motor se apoya en Gearmulator.',
        'Un panel que puedes tocar' => 'Pantalla, 18 controles giratorios, volumen general, botones y LEDs en una ventana propia. Settings reúne la selección de ROM, el dispositivo de audio y el nivel de salida.',
        'Patches que vuelven a sonar' => 'Osciladores, filtros, envolventes, relojes y efectos como chorus y overdrive ya funcionan en tiempo real. Los patches guardados se conservan en la memoria flash entre sesiones.',
        'Audio y MIDI para tu estudio' => 'PC Port para comunicarte con el editor y MIDI para notas y controladores. En Linux, JACK ofrece cuatro salidas y dos entradas; sin JACK, ALSA permite usar las salidas 1/2.',
    ];
    $steps = [
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
                <div class="mb-8"><?php animatek_vcv_modules_nav( 'g1-emu' ); ?></div>
                <div class="grid items-center gap-10 lg:grid-cols-2">
                    <div class="space-y-6">
                        <p class="text-xs font-black uppercase tracking-widest text-red-700 dark:text-red-300">Pre-alpha · Código abierto · GPLv3</p>
                        <div class="space-y-3">
                            <h1 class="text-5xl font-black leading-none sm:text-6xl lg:text-7xl">G1-Emu</h1>
                            <p class="text-xl font-semibold text-yellow-700 sm:text-2xl dark:text-[#F4D35E]">El Nord Modular G1, emulado.</p>
                        </div>
                        <p class="max-w-2xl text-lg leading-relaxed text-slate-600 dark:text-zinc-300">El sintetizador modular en tu ordenador: su sistema operativo original, un panel interactivo y tus patches .pch. Edita desde Animatek NME y toca en Linux, macOS o Windows.</p>
                        <div class="flex flex-wrap gap-3">
                            <a href="<?php echo esc_url( $patreon_url ); ?>" target="_blank" rel="noopener noreferrer" class="<?php echo esc_attr( $button ); ?> bg-[#FF424D] text-white shadow-lg hover:bg-[#e63844] focus-visible:outline-[#FF424D]">Apoyar en Patreon</a>
                            <a href="<?php echo esc_url( $github . '/releases' ); ?>" class="<?php echo esc_attr( $button ); ?> bg-primary text-white hover:bg-primary/90">Descargar en GitHub</a>
                            <a href="<?php echo esc_url( $github ); ?>" class="<?php echo esc_attr( $button ); ?> border border-slate-300 bg-white text-slate-900 hover:bg-slate-100">Ver repositorio</a>
                        </div>
                        <p class="border-l-4 border-yellow-400 pl-4 text-sm leading-relaxed text-slate-600 dark:text-zinc-300">Necesitas tu propia ROM y un editor compatible. No se incluyen ni se proporcionan ROMs o firmware.</p>
                    </div>
                    <figure>
                        <div class="overflow-hidden rounded-lg border border-zinc-700 bg-zinc-950 shadow-2xl">
                            <img src="<?php echo esc_url( get_theme_file_uri( 'images/g1-emu.png' ) ); ?>" alt="Panel de G1-Emu con pantalla, controles giratorios, botones y LEDs del sintetizador emulado" class="h-auto w-full" width="1202" height="470" fetchpriority="high">
                        </div>
                        <figcaption class="mt-3 text-sm text-slate-500 dark:text-zinc-400">El panel del emulador. La edición de módulos y cables se realiza desde un editor externo.</figcaption>
                    </figure>
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-7xl px-6 py-16 sm:px-10" aria-labelledby="g1-features">
            <div class="mb-10 grid gap-6 border-b border-zinc-300 pb-10 dark:border-zinc-700 lg:grid-cols-2">
                <h2 id="g1-features" class="text-3xl font-black sm:text-5xl">Un G1 al otro lado<br class="hidden sm:block"> del PC Port.</h2>
                <p class="text-xl leading-relaxed text-zinc-700 dark:text-zinc-300">G1-Emu hace de instrumento; NME hace de editor. Crea módulos, conecta cables y envía el patch al emulador como lo harías con el sintetizador físico. También admite otros editores que hablen el protocolo del G1.</p>
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

        <section class="bg-white dark:bg-zinc-900" aria-labelledby="g1-start">
            <div class="mx-auto max-w-7xl px-6 py-16 sm:px-10">
                <h2 id="g1-start" class="text-3xl font-black sm:text-4xl">Del primer arranque al primer sonido</h2>
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
                    <a href="<?php echo esc_url( home_url( '/animatek-nme/' ) ); ?>" class="<?php echo esc_attr( $button ); ?> bg-primary text-white">Descubrir Animatek NME</a>
                    <a href="<?php echo esc_url( $github . '/blob/main/README.md' ); ?>" class="<?php echo esc_attr( $button ); ?> border border-slate-300 bg-white text-slate-900">Documentación</a>
                    <a href="<?php echo esc_url( $github . '/blob/main/WINDOWS.md' ); ?>" class="<?php echo esc_attr( $button ); ?> border border-slate-300 bg-white text-slate-900">Primeros pasos en Windows</a>
                </div>
            </div>
        </section>

        <section class="mx-auto grid max-w-7xl gap-6 px-6 py-16 sm:px-10 lg:grid-cols-2">
            <div class="<?php echo esc_attr( $card ); ?>">
                <h2 class="text-2xl font-black">En desarrollo, con la comunidad</h2>
                <p class="mt-4 leading-relaxed text-zinc-700 dark:text-zinc-300">Ya arranca, se conecta con NME y suena en tiempo real. Sigue siendo una pre-alpha: quedan validaciones, comparaciones con hardware y funciones por completar. Las notas de cada versión recogen los avances y las limitaciones conocidas.</p>
                <p class="mt-4 leading-relaxed text-zinc-700 dark:text-zinc-300">Puedes contribuir con código, pruebas de patches, grabaciones del G1 real, documentación o informes de errores reproducibles. Es un proyecto comunitario realizado en tiempo libre, sin servicio de soporte.</p>
                <div class="mt-6 flex flex-wrap gap-4 text-sm font-bold text-primary">
                    <a class="underline underline-offset-4" href="<?php echo esc_url( $github . '/blob/main/CONTRIBUTING.md' ); ?>">Cómo colaborar</a>
                    <a class="underline underline-offset-4" href="<?php echo esc_url( $github . '/issues' ); ?>">Errores y propuestas en GitHub</a>
                    <a class="underline underline-offset-4" href="<?php echo esc_url( $github . '/blob/main/ROADMAP.md' ); ?>">Hoja de ruta</a>
                </div>
            </div>
            <div class="<?php echo esc_attr( $card ); ?>">
                <h2 class="text-2xl font-black">Proyecto independiente</h2>
                <p class="mt-4 leading-relaxed text-zinc-700 dark:text-zinc-300">G1-Emu es software de código abierto bajo licencia GPLv3, iniciado por Animatek sobre el núcleo de Gearmulator, con el trabajo de The Usual Suspects y el fork de joelanders como base.</p>
                <p class="mt-4 leading-relaxed text-zinc-700 dark:text-zinc-300">No está afiliado, conectado ni respaldado por Clavia DMI. Nord y Nord Modular son marcas de Clavia DMI y se utilizan aquí para identificar el instrumento emulado.</p>
                <p class="mt-4 leading-relaxed text-zinc-700 dark:text-zinc-300">La ROM debe proceder de tu propia unidad. El proyecto no distribuye firmware ni atiende solicitudes de ROMs.</p>
                <a href="<?php echo esc_url( $github ); ?>" class="<?php echo esc_attr( $button ); ?> mt-6 bg-primary text-white">Explorar G1-Emu en GitHub</a>
            </div>
        </section>
    </main>
    <?php
}
