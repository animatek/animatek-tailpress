<?php

function animatek_nme_render_page( string $locale = 'es' ): void {
    if ( ! function_exists( 'animatek_vcv_modules_nav' ) ) {
        require_once get_theme_file_path( 'inc/animatek-vcv-module-template.php' );
    }

    $is_en = 'en' === $locale;

    $patreon_url = 'https://www.patreon.com/c/animatek';
    $github_url  = 'https://github.com/animatek/Animatek-NME';
    $image_url   = 'https://animatek.net/wp-content/uploads/2026/06/ANIMATEK-NME_imagen.png';

    $copy = $is_en ? [
        'template_badge' => 'BETA IN DEVELOPMENT · PATREON',
        'lang_label' => 'ES',
        'lang_url' => home_url( '/animatek-nme/' ),
        'hero_text' => 'A modern, native, open-source editor for the legendary Clavia Nord Modular G1, rebuilt from scratch with JUCE/C++. Runs on Windows, macOS and Linux with no Java or legacy runtime required.',
        'patreon' => 'Support on Patreon',
        'github' => 'View on GitHub',
        'disclaimer' => 'Nord Modular is a trademark of Clavia DMI AB. This project is an independent, community-developed editor and is not affiliated with or endorsed by Clavia.',
        'intro_title' => 'What is Animatek NME?',
        'intro_kicker' => 'Native editor · G1 workflow · current systems',
        'intro_lead' => 'A modern control room for the Nord Modular G1: patch editing, hardware communication and bank management rebuilt as one native desktop tool.',
        'intro_points' => [
            'Revives the original Nomad-style patch workflow without old Java runtimes.',
            'Edits .pch patches, modules, cables, morphs, MIDI CCs and hardware knob assignments.',
            'Keeps the project open-source while beta builds are distributed to Patreon supporters.',
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
        'intro_kicker' => 'Editor nativo · workflow G1 · sistemas actuales',
        'intro_lead' => 'Una sala de control moderna para el Nord Modular G1: edición de patches, comunicación con el hardware y gestión de bancos reunidas en una app de escritorio nativa.',
        'intro_points' => [
            'Recupera el flujo de trabajo tipo Nomad sin depender de runtimes Java antiguos.',
            'Edita patches .pch, módulos, cables, morphs, MIDI CCs y asignaciones de knobs físicos.',
            'Mantiene el proyecto open-source mientras las builds beta se distribuyen a supporters de Patreon.',
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

    $nme_icon = static function ( string $icon, string $class = 'h-5 w-5' ): string {
        $icons = [
            'workflow' => '<path d="M4 7h6"/><path d="M14 7h6"/><path d="M10 7a2 2 0 1 0 4 0 2 2 0 0 0-4 0Z"/><path d="M4 17h10"/><path d="M18 17h2"/><path d="M14 17a2 2 0 1 0 4 0 2 2 0 0 0-4 0Z"/>',
            'patch'    => '<rect x="4" y="4" width="16" height="16" rx="2"/><path d="M8 8h3v3H8z"/><path d="M13 13h3v3h-3z"/><path d="M11 9.5h2.5a2.5 2.5 0 0 1 0 5H11"/>',
            'open'     => '<path d="M8 19c5.5-1.2 9-5.3 9-11V5h-3C8.3 5 4.2 8.5 3 14c2.7-.5 4.5.2 5 5Z"/><path d="M9 15 4 20"/><path d="M13 8h3v3"/>',
            'code'     => '<path d="m9 18-6-6 6-6"/><path d="m15 6 6 6-6 6"/><path d="m14 4-4 16"/>',
            'platform' => '<rect x="3" y="4" width="18" height="12" rx="2"/><path d="M8 20h8"/><path d="M12 16v4"/>',
            'midi'     => '<path d="M5 8v8"/><path d="M9 6v12"/><path d="M15 6v12"/><path d="M19 8v8"/><path d="M3 12h18"/>',
            'github'   => '<path d="M9 19c-4 1.2-4-2-6-2"/><path d="M15 22v-3.9a3.4 3.4 0 0 0-1-2.6c3.2-.4 6.5-1.6 6.5-7A5.4 5.4 0 0 0 19 4.7 5 5 0 0 0 18.9 1S17.7.6 15 2.5a13.4 13.4 0 0 0-6 0C6.3.6 5.1 1 5.1 1A5 5 0 0 0 5 4.7a5.4 5.4 0 0 0-1.5 3.8c0 5.4 3.3 6.6 6.5 7a3.4 3.4 0 0 0-1 2.6V22"/>',
            'patreon'  => '<path d="M6 4v16"/><circle cx="15" cy="9" r="5"/>',
            'canvas'   => '<rect x="3" y="4" width="18" height="16" rx="2"/><path d="M8 9h3v3H8z"/><path d="M14 12h2"/><path d="M11 10.5h3"/>',
            'modules'  => '<rect x="4" y="4" width="6" height="6" rx="1"/><rect x="14" y="4" width="6" height="6" rx="1"/><rect x="4" y="14" width="6" height="6" rx="1"/><rect x="14" y="14" width="6" height="6" rx="1"/>',
            'sliders'  => '<path d="M4 7h10"/><path d="M18 7h2"/><circle cx="16" cy="7" r="2"/><path d="M4 17h2"/><path d="M10 17h10"/><circle cx="8" cy="17" r="2"/>',
            'release'  => '<path d="M12 3v6"/><path d="M15 6h-6"/><path d="M5 11a7 7 0 1 0 14 0"/><path d="M8 19h8"/>',
            'knob'     => '<circle cx="12" cy="12" r="7"/><path d="M12 12 16 8"/><path d="M6 19 4 21"/><path d="m18 19 2 2"/>',
            'keyboard' => '<rect x="3" y="7" width="18" height="10" rx="2"/><path d="M7 7v10"/><path d="M11 7v10"/><path d="M15 7v10"/><path d="M19 7v10"/>',
            'notes'    => '<path d="M6 3h9l3 3v15H6z"/><path d="M14 3v4h4"/><path d="M9 12h6"/><path d="M9 16h4"/>',
            'window'   => '<rect x="4" y="5" width="16" height="14" rx="2"/><path d="M4 9h16"/><path d="M8 13h4"/><path d="M14 13h2"/>',
            'mutator'  => '<path d="M4 17c5 0 5-10 10-10h6"/><path d="m17 4 3 3-3 3"/><path d="M4 7c2.8 0 4.1 3.1 5.5 5.7"/><path d="M14 17h6"/><path d="m17 14 3 3-3 3"/>',
        ];

        $inner = $icons[ $icon ] ?? $icons['workflow'];

        return '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr( $class ) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $inner . '</svg>';
    };

    $intro_icons   = [ 'workflow', 'patch', 'open' ];
    $stack_icons   = [ 'code', 'platform', 'midi', 'github', 'patreon' ];
    $section_icons = [ 'canvas', 'modules', 'sliders', 'midi' ];
    $floater_icons = [ 'knob', 'keyboard', 'notes', 'window' ];

    $button_base      = 'inline-flex min-h-11 items-center justify-center rounded-full px-5 py-3 text-sm font-extrabold leading-none transition duration-200 hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2';
    $button_primary   = $button_base . ' bg-[#FF424D] text-white shadow-lg hover:bg-[#e63844] focus:ring-[#FF424D] focus:ring-offset-white';
    $button_secondary = $button_base . ' border border-slate-300 bg-white text-slate-900 shadow-sm hover:bg-slate-100 focus:ring-slate-400 focus:ring-offset-white';
    $button_dark      = $button_base . ' border border-zinc-300 bg-zinc-950 text-white shadow-sm hover:bg-zinc-800 focus:ring-zinc-950 focus:ring-offset-white';
    $button_lang      = 'inline-flex min-h-9 items-center justify-center rounded-md border border-slate-200 bg-white px-3 py-1.5 text-xs font-bold leading-none text-slate-700 transition hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-primary/40';
    $pill_neutral     = 'inline-flex items-center rounded-md border border-zinc-300 px-3 py-1.5 text-xs font-black uppercase tracking-widest text-zinc-600 dark:border-zinc-600 dark:text-zinc-300';
    ?>

    <main id="primary" class="bg-zinc-100 text-zinc-950 dark:bg-zinc-950 dark:text-white">
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
                        <div class="<?php echo esc_attr( $pill_neutral ); ?>">
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
                <div class="border-b border-zinc-300 pb-12 dark:border-zinc-700">
                    <div class="grid gap-8 lg:grid-cols-[0.66fr_1.34fr] lg:items-start">
                        <div class="space-y-4">
                            <p class="<?php echo esc_attr( $pill_neutral ); ?>">
                                <?php echo esc_html( $copy['intro_kicker'] ); ?>
                            </p>
                            <h2 class="max-w-xl text-3xl font-black tracking-tight text-zinc-950 dark:text-white sm:text-5xl">
                                <?php echo esc_html( $copy['intro_title'] ); ?>
                            </h2>
                        </div>

                        <div class="space-y-8">
                            <p class="max-w-4xl text-2xl font-extrabold leading-tight text-zinc-950 dark:text-white sm:text-3xl">
                                <?php echo esc_html( $copy['intro_lead'] ); ?>
                            </p>

                            <div class="grid gap-4 md:grid-cols-3">
                                <?php foreach ( $copy['intro_points'] as $index => $point ) : ?>
                                    <div class="border-t-4 border-zinc-950 bg-white px-4 py-5 text-sm font-bold leading-relaxed text-zinc-800 shadow-sm dark:border-[#F4D35E] dark:bg-zinc-900 dark:text-zinc-100">
                                        <div class="mb-5 flex items-center justify-between gap-3 text-[#d22f3a] dark:text-[#F4D35E]">
                                            <span class="text-xs font-black"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
                                            <?php echo $nme_icon( $intro_icons[ $index ] ?? 'workflow', 'h-6 w-6' ); ?>
                                        </div>
                                        <p><?php echo esc_html( $point ); ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid gap-8 lg:grid-cols-[20rem_minmax(0,1fr)]">
                    <aside class="lg:sticky lg:top-8 lg:self-start">
                        <div class="rounded-lg border border-zinc-300 bg-white p-5 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
                        <h3 class="mb-4 flex items-center gap-3 text-lg font-black text-zinc-950 dark:text-white">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-md bg-zinc-100 text-[#d22f3a] dark:bg-zinc-950 dark:text-[#F4D35E]">
                                <?php echo $nme_icon( 'code' ); ?>
                            </span>
                            <?php echo esc_html( $copy['stack_title'] ); ?>
                        </h3>
                        <dl class="space-y-4">
                            <?php $stack_index = 0; ?>
                            <?php foreach ( $stack as $term => $description ) : ?>
                                <div class="grid grid-cols-[1.75rem_minmax(0,1fr)] gap-3">
                                    <dt class="flex h-7 w-7 items-center justify-center rounded-md bg-zinc-100 text-zinc-700 dark:bg-zinc-950 dark:text-zinc-300">
                                        <?php echo $nme_icon( $stack_icons[ $stack_index ] ?? 'code', 'h-4 w-4' ); ?>
                                        <span class="sr-only"><?php echo esc_html( $term ); ?></span>
                                    </dt>
                                    <dd>
                                        <p class="text-sm font-extrabold text-zinc-950 dark:text-zinc-100"><?php echo esc_html( $term ); ?></p>
                                        <p class="mt-1 text-sm leading-relaxed text-zinc-600 dark:text-zinc-400"><?php echo esc_html( $description ); ?></p>
                                    </dd>
                                </div>
                                <?php $stack_index++; ?>
                            <?php endforeach; ?>
                        </dl>
                        </div>
                    </aside>

                    <div class="grid gap-5">
                        <?php $section_icon_index = 0; ?>
                        <?php foreach ( $copy['sections'] as $heading => $items ) : ?>
                            <section class="rounded-lg border border-zinc-300 bg-white p-5 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
                                <h3 class="mb-4 flex items-center gap-3 text-xl font-black text-zinc-950 dark:text-white">
                                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-md bg-zinc-100 text-[#d22f3a] dark:bg-zinc-950 dark:text-[#F4D35E]">
                                        <?php echo $nme_icon( $section_icons[ $section_icon_index ] ?? 'modules' ); ?>
                                    </span>
                                    <?php echo esc_html( $heading ); ?>
                                </h3>
                                <ul class="grid gap-3 text-sm leading-relaxed text-zinc-700 dark:text-zinc-300 md:grid-cols-2">
                                    <?php foreach ( $items as $item ) : ?>
                                        <li class="border-t border-zinc-200 pt-3 dark:border-zinc-700"><?php echo esc_html( $item ); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </section>
                            <?php $section_icon_index++; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white dark:bg-zinc-950">
            <div class="mx-auto grid max-w-7xl gap-8 px-6 py-16 sm:px-10 lg:grid-cols-[0.92fr_1.08fr]">
                <div class="rounded-lg border border-zinc-300 bg-white p-6 text-zinc-950 shadow-sm dark:border-zinc-700 dark:bg-zinc-900 dark:text-white">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p class="<?php echo esc_attr( $pill_neutral ); ?>"><?php echo esc_html( $copy['beta_title'] ); ?></p>
                            <h2 class="mt-4 text-3xl font-black"><?php echo esc_html( $copy['beta_date'] ); ?></h2>
                        </div>
                        <span class="inline-flex h-12 w-12 shrink-0 items-center justify-center rounded-md bg-zinc-100 text-[#d22f3a] dark:bg-zinc-950 dark:text-[#F4D35E]">
                            <?php echo $nme_icon( 'release', 'h-7 w-7' ); ?>
                        </span>
                    </div>
                    <ul class="mt-6 space-y-3 text-sm leading-relaxed text-zinc-700 dark:text-zinc-300">
                        <?php foreach ( $beta_items as $item ) : ?>
                            <li class="border-t border-zinc-200 pt-3 dark:border-zinc-700"><?php echo esc_html( $item ); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="space-y-5">
                    <section class="rounded-lg border border-zinc-300 bg-zinc-100 p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
                        <h2 class="flex items-center gap-3 text-2xl font-black text-zinc-950 dark:text-white">
                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-md bg-white text-[#d22f3a] dark:bg-zinc-950 dark:text-[#F4D35E]">
                                <?php echo $nme_icon( 'window' ); ?>
                            </span>
                            <?php echo esc_html( $copy['floaters_title'] ); ?>
                        </h2>
                        <ul class="mt-5 grid gap-3 text-sm leading-relaxed text-zinc-700 dark:text-zinc-300 sm:grid-cols-2">
                            <?php foreach ( $copy['floaters'] as $index => $item ) : ?>
                                <li class="rounded-lg border border-zinc-300 bg-white p-4 dark:border-zinc-700 dark:bg-zinc-950">
                                    <span class="mb-3 inline-flex h-8 w-8 items-center justify-center rounded-md bg-zinc-100 text-[#d22f3a] dark:bg-zinc-900 dark:text-[#F4D35E]">
                                        <?php echo $nme_icon( $floater_icons[ $index ] ?? 'window', 'h-4 w-4' ); ?>
                                    </span>
                                    <p><?php echo esc_html( $item ); ?></p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </section>

                    <section class="rounded-lg border border-zinc-300 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
                        <div class="flex items-start gap-4">
                            <span class="inline-flex h-12 w-12 shrink-0 items-center justify-center rounded-md bg-zinc-100 text-[#d22f3a] dark:bg-zinc-950 dark:text-[#F4D35E]">
                                <?php echo $nme_icon( 'mutator', 'h-7 w-7' ); ?>
                            </span>
                            <div>
                                <p class="<?php echo esc_attr( $pill_neutral ); ?>"><?php echo esc_html( $copy['teaser_title'] ); ?></p>
                                <p class="mt-4 text-base leading-relaxed text-zinc-700 dark:text-zinc-300"><?php echo esc_html( $copy['teaser'] ); ?></p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-7xl px-6 py-16 sm:px-10">
            <div class="grid items-center gap-6 rounded-lg border border-zinc-300 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900 lg:grid-cols-[1fr_auto]">
                <div>
                    <h2 class="text-2xl font-black text-zinc-950 dark:text-white"><?php echo esc_html( $copy['cta_title'] ); ?></h2>
                    <p class="mt-3 max-w-3xl text-base leading-relaxed text-zinc-700 dark:text-zinc-300"><?php echo esc_html( $copy['cta_body'] ); ?></p>
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
