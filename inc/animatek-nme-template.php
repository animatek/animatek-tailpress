<?php

function animatek_nme_render_page( string $locale = 'es' ): void {
    if ( ! function_exists( 'animatek_vcv_modules_nav' ) ) {
        require_once get_theme_file_path( 'inc/animatek-vcv-module-template.php' );
    }

    $is_en = 'en' === $locale;

    $patreon_url = 'https://www.patreon.com/c/animatek';
    $github_url  = 'https://github.com/animatek/Animatek-NME';
    $image_url   = 'https://animatek.net/wp-content/uploads/2026/06/ANIMATEK-NME.png';

    $copy = $is_en ? [
        'template_badge' => 'BETA IN DEVELOPMENT · PATREON',
        'lang_label' => 'ES',
        'lang_url' => home_url( '/animatek-nme/' ),
        'hero_text' => 'A modern, native, open-source editor for the legendary Clavia Nord Modular G1, rebuilt from scratch with JUCE/C++. Runs on Windows, macOS and Linux with no Java or legacy runtime required.',
        'patreon' => 'Support on Patreon',
        'github' => 'View on GitHub',
        'disclaimer' => 'Nord Modular is a trademark of Clavia DMI AB. This project is an independent, community-developed editor and is not affiliated with or endorsed by Clavia.',
        'intro_title' => 'What is Animatek NME?',
        'intro' => [
            '<strong>Animatek NME</strong> - formerly <strong>Nomad2026</strong> - is a new editor for the <strong>Clavia Nord Modular G1</strong> synthesizer.',
            'It reimplements the original Nomad editor workflow as a modern, native, cross-platform desktop application based on <strong>JUCE/C++</strong>. The goal is to edit <code>.pch</code> patches, modules, cables, morphs, hardware knob assignments, MIDI controllers and full banks from current systems, without relying on old Java runtimes.',
            'It is an <strong>open-source</strong> project led by Animatek, with beta builds available to Patreon supporters.',
        ],
        'stack_title' => 'Technical stack',
        'sections' => [
            'Canvas & navigation' => [
                'Poly/Common modular canvas - pixel-oriented visual patch editing, split like the original editor.',
                'Zoom & pan - canvas zoom, smooth navigation and cable visibility tools.',
                'Enhanced QuickAdd - fast module search, relevance-ranked results and double-click on empty canvas.',
                'Search tags - all 110 modules include hand-written synonyms such as lp, hp, vca, s&h, glide, bitcrush, wah, acid, arpeggio and sidechain.',
                'Favorites - gold-starred modules appear first and persist across sessions.',
                'Multi-selection and fast editing - drag & drop, copy, paste, duplicate and duplicate with cables.',
                '.pch snippets - reusable module groups dragged directly into the canvas.',
                'Full Undo/Redo - modules, cables, parameters, morphs and renames; multi-module operations undo in one step.',
            ],
            'Modules & visuals' => [
                '110 rendered modules - knobs, sliders, displays and custom components.',
                '382 audited connectors - 1:1 mapping against module descriptors; connector direction and shape derived from descriptors.',
                '43 corrected jacks - jack colours now match their signal type.',
                'Consistent signal colours - audio, control and logic remain recognizable across jacks and cables.',
                'Visual themes - classic and dark themes, with more theme work tracked separately in Unreleased.',
                'Context-aware icons and displays - waveform shapes, Hz, degrees, BPM, seconds or ratios depending on context.',
                'Cable tools - shake function for overlapping cables and indicators for hidden cables.',
                'DrumSynth presets - custom presets stored directly in the module.',
            ],
            'Parameters, morphs and patch management' => [
                'Bidirectional real-time editing - knobs, sliders and buttons synchronized with the synth.',
                'Morphs and assignments - edit morphs, hardware knobs and MIDI CC mappings from the editor.',
                'Parameter Lock - protect parameters during initialization and randomization.',
                'Randomize / Initialize - musical randomization with automatic exclusions for morphs, mutes and volumes.',
                'Patch Settings - voices, keyboard/velocity range, pedal, bend range, portamento, octave shift and retrigger.',
                'Snapshots / variations - 8 patch states with interpolation; G2-style Patch Variations are tracked as upcoming work.',
            ],
            'Synth communication' => [
                'Full MIDI SysEx - connection, port auto-detection and state synchronization.',
                'Multi-Slot A/B/C/D support - each slot has independent patch state and undo history.',
                'Slot switching fixed - switching from the slot bar or Ctrl+1..4 now loads the selected slot patch correctly.',
                'Patch Browser - browse synth memory and local disk presets.',
                '891 patch slots - 9 banks x 99 slots.',
                'Bank transfer tools - save bank to disk, send folder to synth and backup all 9 banks into the preset library.',
                '.pch import/export - compatible with classic patch workflows.',
                'Connection watchdog - recovers stuck fetch states after front-panel bank/patch changes.',
                'Controller Snapshot - sends current MIDI CC assignment values for sequencing and recording workflows.',
            ],
        ],
        'floaters_title' => 'Floating windows added in 0.6.0',
        'floaters' => [
            'Knob Floater - live overview of 18 assignable knobs + Pedal, On/Off and Aftertouch. Interactive, synced and undoable.',
            'Keyboard Floater - virtual keyboard that plays the synth through the editor protocol, with DRONE and REPEAT modes.',
            'Patch Notes Floater - free-text patch notes saved inside .pch files under [Notes]. Monospaced font for ASCII tables.',
            'Window persistence - main window and floaters remember size, position, maximized state and display.',
        ],
        'beta_title' => 'Beta log',
        'beta_date' => '0.6.0 · June 11, 2026',
        'teaser_title' => 'What is coming next',
        'teaser' => 'And it does not stop here: the current branch already points toward G2-style variations, more visual themes and a Patch Mutator for evolving, crossing and interpolating sounds. Animatek NME is not just about opening old patches again; it is about making the Nord Modular G1 comfortable in a modern setup.',
        'cta_title' => 'Do you own a Nord Modular G1 and want to try the new editor?',
        'cta_body' => 'Animatek NME is in active beta development. You can support the project and access the builds through Patreon, or follow the code and report issues on GitHub.',
        'cta_patreon' => 'Become a supporter',
        'image_alt' => 'Animatek NME Nord Modular G1 editor screenshot',
    ] : [
        'template_badge' => 'BETA EN DESARROLLO · PATREON',
        'lang_label' => 'EN',
        'lang_url' => home_url( '/animatek-nme-eng/' ),
        'hero_text' => 'Un editor moderno, nativo y open-source para el legendario Clavia Nord Modular G1, reconstruido desde cero con JUCE/C++. Funciona en Windows, macOS y Linux sin depender de Java ni de entornos legacy.',
        'patreon' => 'Apoyar en Patreon',
        'github' => 'Ver en GitHub',
        'disclaimer' => 'Nord Modular es una marca registrada de Clavia DMI AB. Este proyecto es un editor independiente desarrollado por la comunidad y no está afiliado ni respaldado por Clavia.',
        'intro_title' => '¿Qué es Animatek NME?',
        'intro' => [
            '<strong>Animatek NME</strong> - antes <strong>Nomad2026</strong> - es un editor nuevo para el sintetizador <strong>Clavia Nord Modular G1</strong>.',
            'El proyecto reimplementa la experiencia del editor Nomad original en una aplicación moderna, nativa y multiplataforma basada en <strong>JUCE/C++</strong>. La idea es poder editar patches <code>.pch</code>, módulos, cables, morphs, knobs de hardware, controladores MIDI y bancos completos desde sistemas actuales, sin depender de runtimes Java antiguos.',
            'Es un proyecto <strong>open-source</strong> liderado por Animatek, con builds beta para supporters a través de Patreon.',
        ],
        'stack_title' => 'Stack técnico',
        'sections' => [
            'Canvas & navegación' => [
                'Canvas modular Poly/Common - edición visual orientada a píxel, separando áreas Poly y Common como en el editor original.',
                'Zoom & pan - zoom de canvas, navegación fluida y herramientas de visibilidad de cables.',
                'QuickAdd mejorado - búsqueda rápida de módulos, resultados ordenados por relevancia y doble clic en canvas vacío.',
                'Tags de búsqueda - los 110 módulos incluyen sinónimos escritos a mano: lp, hp, vca, s&h, glide, bitcrush, wah, acid, arpeggio y sidechain.',
                'Favoritos - módulos fijados con estrella dorada, listados primero y persistentes entre sesiones.',
                'Multi-selección y edición rápida - drag & drop, copiar, pegar, duplicar y duplicar cadenas con cables.',
                'Snippets .pch - grupos reutilizables de módulos como snippets arrastrables.',
                'Undo/Redo completo - módulos, cables, parámetros, morphs y renombrados; las operaciones multi-módulo se deshacen en un solo paso.',
            ],
            'Módulos & visual' => [
                '110 módulos renderizados - knobs, sliders, displays y componentes personalizados.',
                '382 conectores auditados - mapeo 1:1 contra descriptores de módulo; dirección y forma derivadas de los descriptores.',
                '43 jacks corregidos - colores ajustados para coincidir con el tipo de señal.',
                'Colores de señal coherentes - audio, control y lógica mantienen colores reconocibles en conectores y cables.',
                'Temas visuales - tema oscuro y clásico, con más trabajo de temas separado en Unreleased.',
                'Iconos y displays contextuales - formas de onda, valores en Hz, grados, BPM, segundos o ratios según el módulo.',
                'Cable tools - función shake para redistribuir cables solapados e indicadores para cables ocultos.',
                'DrumSynth presets - presets propios guardados dentro del módulo.',
            ],
            'Parámetros, morphs y patch management' => [
                'Edición bidireccional en tiempo real - knobs, sliders y botones sincronizados con el sintetizador.',
                'Morphs y asignaciones - edición de morphs, knobs de hardware y MIDI CC desde el editor.',
                'Parameter Lock - bloqueo de parámetros para protegerlos durante inicialización y randomización.',
                'Randomize / Initialize - randomización musical con exclusiones automáticas de morphs, mutes y volúmenes.',
                'Patch Settings - control de voces, rango de teclado/velocity, pedal, bend range, portamento, octave shift y retrigger.',
                'Snapshots / variaciones - 8 estados de patch con interpolación; Patch Variations estilo G2 queda separado como trabajo próximo.',
            ],
            'Comunicación con el sintetizador' => [
                'MIDI SysEx completo - conexión, auto-detección de puertos y sincronización de estado.',
                'Soporte Multi-Slot A/B/C/D - cada slot con patch e historial de undo independiente.',
                'Fix de cambio de slot - el cambio desde barra o Ctrl+1..4 ya carga correctamente el patch del slot seleccionado.',
                'Patch Browser - navegación por memoria del synth y presets locales.',
                '891 slots de patch - 9 bancos x 99 slots.',
                'Transferencia de bancos - guardar banco a disco, enviar carpeta de patches al synth y backup de los 9 bancos a la librería.',
                'Import/export .pch - compatible con el flujo clásico de patches.',
                'Watchdog de conexión - recuperación de estados de fetch bloqueados tras cambios desde el panel frontal.',
                'Controller Snapshot - envío de valores actuales de asignaciones MIDI CC para grabación y secuenciación.',
            ],
        ],
        'floaters_title' => 'Ventanas flotantes añadidas en 0.6.0',
        'floaters' => [
            'Knob Floater - vista de los 18 knobs asignables + Pedal, On/Off y Aftertouch. Interactivo, sincronizado y undoable.',
            'Keyboard Floater - teclado virtual que toca el synth mediante el protocolo del editor, con modos DRONE y REPEAT.',
            'Patch Notes Floater - notas de texto libre por patch guardadas dentro del .pch bajo [Notes]. Mantiene fuente monoespaciada para tablas ASCII.',
            'Persistencia de ventanas - tamaño, posición, maximizado y pantalla recordados entre sesiones.',
        ],
        'beta_title' => 'Beta log',
        'beta_date' => '0.6.0 · 11 junio 2026',
        'teaser_title' => 'Lo próximo',
        'teaser' => 'Y esto no se queda aquí: la rama actual ya apunta a variaciones estilo G2, más temas visuales y un Patch Mutator para explorar sonidos por evolución, cruce e interpolación. Animatek NME no busca solo volver a abrir patches antiguos; quiere convertir el Nord Modular G1 en un instrumento cómodo dentro de un setup moderno.',
        'cta_title' => '¿Tienes un Nord Modular G1 y quieres probar el nuevo editor?',
        'cta_body' => 'La beta de Animatek NME está en desarrollo activo. Puedes apoyar el proyecto y acceder a las builds desde Patreon, o seguir el código y reportar issues en GitHub.',
        'cta_patreon' => 'Convertirse en supporter',
        'image_alt' => 'Captura de Animatek NME para Nord Modular G1',
    ];

    $stack = $is_en ? [
        'JUCE / native C++' => 'A real desktop application, with no Java layer.',
        'Cross-platform' => 'Linux, Windows and macOS, including universal macOS arm64+x86_64 builds.',
        'MIDI SysEx' => 'Direct communication with the Nord Modular G1.',
        'Open Source' => 'Public code on GitHub and open issue tracking.',
        'Supporter beta' => 'Development builds distributed through Patreon.',
    ] : [
        'JUCE / C++ nativo' => 'Aplicación de escritorio real, sin capa Java.',
        'Multiplataforma' => 'Linux, Windows y macOS, incluyendo binario universal macOS arm64+x86_64.',
        'MIDI SysEx' => 'Comunicación directa con el Nord Modular G1.',
        'Open Source' => 'Código público en GitHub y seguimiento de issues abierto.',
        'Beta para supporters' => 'Builds de desarrollo distribuidas vía Patreon.',
    ];

    $beta_items = $is_en ? [
        'Binary CI/CD - Release builds for Linux, Windows and universal macOS through GitHub Actions.',
        'Patreon distribution - optional password-protected zip artifacts; not distributed as public GitHub Releases.',
        'Release checklist - repeatable steps for versioning, no-synth smoke tests, hardware tests, packaging and post-release tasks.',
        'Full project rename - app, window title, CMake targets and binary now use AnimatekNME.',
        '382 connectors audited - all connectors mapped against descriptors; 43 jacks corrected by signal type.',
        'Keyboard shortcuts - Ctrl+A, Ctrl+X, Escape, arrows, Ctrl+Shift+S, Ctrl+1..4, S for shake cables.',
        'QuickAdd with tags and favorites - relevance ranking, hand-written tags on 110 modules, persistent favorites and mouse-driven navigation.',
        'Patch Notes Floater - free-text notes saved in .pch.',
        'Knob Floater - live hardware assignment control.',
        'Keyboard Floater - virtual keyboard with DRONE and REPEAT modes.',
        'Window persistence - main window and floaters remember their state.',
        'Hardware fixes - Error 5, Pedal/Aftertouch/On-Off indices and patch loading on slot change.',
        'Improved snippets - import preserves connector direction and filters singleton modules.',
    ] : [
        'CI/CD de binarios - builds Release para Linux, Windows y macOS universal mediante GitHub Actions.',
        'Distribución Patreon - artefactos opcionalmente empaquetados en zip protegido por contraseña; no se publican como GitHub Releases públicos.',
        'Release checklist - pasos repetibles para versionado, tests sin synth, tests con hardware, packaging y post-release.',
        'Renombrado completo - app, ventana, targets CMake y binario pasan a AnimatekNME.',
        '382 conectores auditados - todos los conectores mapean contra descriptores; 43 jacks corregidos por tipo de señal.',
        'Atajos completos - Ctrl+A, Ctrl+X, Escape, flechas, Ctrl+Shift+S, Ctrl+1..4, S para shake cables.',
        'QuickAdd con tags y favoritos - búsqueda por relevancia, tags manuales en 110 módulos, favoritos persistentes y navegación con ratón.',
        'Patch Notes Floater - notas libres guardadas en .pch.',
        'Knob Floater - control de asignaciones hardware en vivo.',
        'Keyboard Floater - teclado virtual con modos DRONE y REPEAT.',
        'Persistencia de ventanas - estado de ventana principal y floaters recordado.',
        'Fixes hardware - Error 5, índices Pedal/Aftertouch/On-Off y carga de patch al cambiar slot.',
        'Snippets mejorados - importación preserva dirección de conectores y filtra módulos singleton.',
    ];

    $button_base      = 'inline-flex min-h-11 items-center justify-center rounded-lg px-5 py-3 text-sm font-extrabold leading-none transition duration-200 hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2';
    $button_primary   = $button_base . ' bg-[#FF424D] text-white shadow-lg hover:bg-[#e63844] focus:ring-[#FF424D] focus:ring-offset-white';
    $button_secondary = $button_base . ' border border-slate-300 bg-white text-slate-900 shadow-sm hover:bg-slate-100 focus:ring-slate-400 focus:ring-offset-white';
    $button_dark      = $button_base . ' border border-zinc-300 bg-zinc-950 text-white shadow-sm hover:bg-zinc-800 focus:ring-zinc-950 focus:ring-offset-white';
    $button_lang      = 'inline-flex min-h-9 items-center justify-center rounded-md border border-slate-200 bg-white px-3 py-1.5 text-xs font-bold leading-none text-slate-700 transition hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-primary/40';
    ?>

    <main id="primary" class="bg-zinc-100 text-zinc-950">
        <section class="relative overflow-hidden bg-slate-50 text-slate-900">
            <div class="absolute inset-0 pointer-events-none opacity-60 dark:hidden" style="background-image:linear-gradient(rgba(15,23,42,.06) 1px, transparent 1px),linear-gradient(90deg, rgba(15,23,42,.06) 1px, transparent 1px);background-size:28px 28px;"></div>
            <div class="absolute inset-0 pointer-events-none opacity-40 hidden dark:block" style="background-image:linear-gradient(rgba(255,255,255,.06) 1px, transparent 1px),linear-gradient(90deg, rgba(255,255,255,.06) 1px, transparent 1px);background-size:28px 28px;"></div>
            <div class="relative mx-auto max-w-7xl px-6 py-16 sm:px-10 lg:py-20">
                <div class="mb-8 flex flex-wrap items-center gap-3">
                    <div class="animatek-nme-software-nav">
                        <?php animatek_vcv_modules_nav( $is_en ? 'animatek-nme-eng' : 'animatek-nme', $is_en ? 'en' : 'es' ); ?>
                    </div>
                    <a href="<?php echo esc_url( $copy['lang_url'] ); ?>" class="<?php echo esc_attr( $button_lang ); ?>">
                        <span><?php echo esc_html( $copy['lang_label'] ); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="9" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3 12h18" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 3c2.5 3.5 2.5 14 0 18" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7 5c1.5 2 1.5 12 0 14" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17 5c-1.5 2-1.5 12 0 14" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>

                <div class="grid items-center gap-10 lg:grid-cols-[0.88fr_1.12fr]">
                    <div class="space-y-6">
                        <div class="inline-flex items-center rounded-md border border-yellow-400/50 bg-yellow-50 px-3 py-1.5 text-xs font-bold uppercase tracking-widest text-yellow-700 dark:border-[#F4D35E]/40 dark:bg-[#F4D35E]/10 dark:text-[#F4D35E]">
                            <?php echo esc_html( $copy['template_badge'] ); ?>
                        </div>
                        <div class="space-y-3">
                            <h1 class="max-w-3xl text-5xl font-black leading-none text-slate-900 sm:text-6xl lg:text-7xl">
                                Animatek NME
                            </h1>
                            <p class="text-xl font-semibold text-yellow-700 sm:text-2xl dark:text-[#F4D35E]">Nord Modular Editor G1</p>
                        </div>
                        <p class="max-w-2xl text-lg leading-relaxed text-slate-600">
                            <?php echo esc_html( $copy['hero_text'] ); ?>
                        </p>
                        <div class="flex flex-wrap gap-3">
                            <a href="<?php echo esc_url( $patreon_url ); ?>" target="_blank" rel="noopener noreferrer" class="<?php echo esc_attr( $button_primary ); ?>">
                                <?php echo esc_html( $copy['patreon'] ); ?>
                            </a>
                            <a href="<?php echo esc_url( $github_url ); ?>" target="_blank" rel="noopener noreferrer" class="<?php echo esc_attr( $button_secondary ); ?>">
                                <?php echo esc_html( $copy['github'] ); ?>
                            </a>
                        </div>
                        <p class="max-w-2xl border-l-4 border-yellow-400 pl-4 text-sm leading-relaxed text-slate-500 dark:border-[#F4D35E]">
                            <?php echo esc_html( $copy['disclaimer'] ); ?>
                        </p>
                    </div>

                    <figure class="relative">
                        <div class="overflow-hidden rounded-lg border border-slate-200 bg-zinc-950 shadow-2xl">
                            <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $copy['image_alt'] ); ?>" class="aspect-video w-full object-cover object-top">
                        </div>
                    </figure>
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-7xl px-6 py-16 sm:px-10">
            <div class="space-y-10">
                <div class="grid gap-6 border-b border-zinc-300 pb-10 lg:grid-cols-[0.72fr_1.28fr]">
                    <h2 class="max-w-xl text-3xl font-black tracking-tight text-zinc-950 sm:text-4xl">
                        <?php echo esc_html( $copy['intro_title'] ); ?>
                    </h2>
                    <div class="grid gap-4 text-base leading-relaxed text-zinc-700 md:grid-cols-3">
                        <?php foreach ( $copy['intro'] as $paragraph ) : ?>
                            <p><?php echo wp_kses_post( $paragraph ); ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="grid gap-8 lg:grid-cols-[20rem_minmax(0,1fr)]">
                    <aside class="lg:sticky lg:top-8 lg:self-start">
                        <div class="rounded-lg border border-zinc-300 bg-white p-5 shadow-sm">
                        <h3 class="mb-4 text-lg font-black text-zinc-950"><?php echo esc_html( $copy['stack_title'] ); ?></h3>
                        <dl class="space-y-4">
                            <?php foreach ( $stack as $term => $description ) : ?>
                                <div>
                                    <dt class="text-sm font-extrabold text-zinc-950"><?php echo esc_html( $term ); ?></dt>
                                    <dd class="mt-1 text-sm leading-relaxed text-zinc-600"><?php echo esc_html( $description ); ?></dd>
                                </div>
                            <?php endforeach; ?>
                        </dl>
                        </div>
                    </aside>

                    <div class="grid gap-5">
                        <?php foreach ( $copy['sections'] as $heading => $items ) : ?>
                            <section class="rounded-lg border border-zinc-300 bg-white p-5 shadow-sm">
                                <h3 class="mb-4 text-xl font-black text-zinc-950"><?php echo esc_html( $heading ); ?></h3>
                                <ul class="grid gap-3 text-sm leading-relaxed text-zinc-700 md:grid-cols-2">
                                    <?php foreach ( $items as $item ) : ?>
                                        <li class="border-t border-zinc-200 pt-3"><?php echo esc_html( $item ); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </section>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white">
            <div class="mx-auto grid max-w-7xl gap-8 px-6 py-16 sm:px-10 lg:grid-cols-[0.92fr_1.08fr]">
                <div class="rounded-lg border border-zinc-300 bg-[#F4D35E] p-6 text-zinc-950 shadow-sm">
                    <p class="text-sm font-black uppercase tracking-widest"><?php echo esc_html( $copy['beta_title'] ); ?></p>
                    <h2 class="mt-2 text-3xl font-black"><?php echo esc_html( $copy['beta_date'] ); ?></h2>
                    <ul class="mt-6 space-y-3 text-sm leading-relaxed">
                        <?php foreach ( $beta_items as $item ) : ?>
                            <li class="border-t border-zinc-950/20 pt-3"><?php echo esc_html( $item ); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="space-y-5">
                    <section class="rounded-lg border border-zinc-300 bg-zinc-100 p-6 shadow-sm">
                        <h2 class="text-2xl font-black text-zinc-950"><?php echo esc_html( $copy['floaters_title'] ); ?></h2>
                        <ul class="mt-5 grid gap-3 text-sm leading-relaxed text-zinc-700 sm:grid-cols-2">
                            <?php foreach ( $copy['floaters'] as $item ) : ?>
                                <li class="rounded-lg border border-zinc-300 bg-white p-4"><?php echo esc_html( $item ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </section>

                    <section class="rounded-lg border border-zinc-800 bg-[#101114] p-6 text-white shadow-sm">
                        <p class="text-sm font-black uppercase tracking-widest text-[#F4D35E]"><?php echo esc_html( $copy['teaser_title'] ); ?></p>
                        <p class="mt-3 text-base leading-relaxed text-zinc-200"><?php echo esc_html( $copy['teaser'] ); ?></p>
                    </section>
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-7xl px-6 py-16 sm:px-10">
            <div class="grid items-center gap-6 rounded-lg border border-zinc-300 bg-white p-6 shadow-sm lg:grid-cols-[1fr_auto]">
                <div>
                    <h2 class="text-2xl font-black text-zinc-950"><?php echo esc_html( $copy['cta_title'] ); ?></h2>
                    <p class="mt-3 max-w-3xl text-base leading-relaxed text-zinc-700"><?php echo esc_html( $copy['cta_body'] ); ?></p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <a href="<?php echo esc_url( $patreon_url ); ?>" target="_blank" rel="noopener noreferrer" class="<?php echo esc_attr( $button_primary ); ?>">
                        <?php echo esc_html( $copy['cta_patreon'] ); ?>
                    </a>
                    <a href="<?php echo esc_url( $github_url ); ?>" target="_blank" rel="noopener noreferrer" class="<?php echo esc_attr( $button_dark ); ?>">
                        <?php echo esc_html( $copy['github'] ); ?>
                    </a>
                </div>
            </div>
        </section>
    </main>
    <?php
}
