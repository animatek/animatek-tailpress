<?php

function animatek_vcv_modules_data(): array {
    return [
        'uzz-vcv' => [
            'title' => 'UZZ',
            'subtitle' => '16-Step Sequencer',
            'badge' => 'VCV Rack · 2.5.0 · Free & Pro',
            'slug' => '/ultimate-ztep-zequencer-vcvrack/',
            'library_url' => 'https://library.vcvrack.com/Animatek/UZZ',
            'manual_url' => 'https://github.com/animatek/UZZ-VCV-RACK',
            'source_url' => 'https://github.com/animatek/UZZ-VCV-RACK',
            'image' => 'https://animatek.net/wp-content/uploads/2026/06/UZZ_ancha.webp',
            'alt' => 'UZZ sequencer for VCV Rack',
            'intro' => 'Secuenciador de 16 pasos para VCV Rack 2.x. Temporización precisa, improvisación estructurada y flexibilidad modular: cada paso tiene Pitch, Octava, Duración, Mod1/Mod2 y Prob/Pulse.',
            'lead' => [],
            'features_title' => '',
            'features' => [],
            'manual_sections' => [],
            'inputs' => [],
            'outputs' => [],
        ],
        'unit-d' => [
            'title' => 'UNIT-D',
            'subtitle' => 'Deterministic Generative Sequencer',
            'badge' => 'VCV Rack · 2.5.4 · 12 HP',
            'slug' => '/unit-d/',
            'library_url' => 'https://library.vcvrack.com/Animatek/UnitDistanceSeq',
            'manual_url' => 'https://github.com/animatek/UZZ-VCV-RACK/blob/main/Manuals/UNIT-D_Manual_EN.md',
            'source_url' => 'https://github.com/animatek/UZZ-VCV-RACK',
            'image' => 'https://animatek.net/wp-content/uploads/2026/06/Unit-d_imagen.webp',
            'alt' => 'UNIT-D module for VCV Rack',
            'intro' => 'UNIT-D convierte una estructura geométrica en música: genera una nube 2D de nodos, conecta puntos según una regla de distancia y transforma el recorrido por ese grafo en pitch, gates, accents y modulación X/Y.',
            'lead' => [
                'No es un generador aleatorio descontrolado. Con el mismo seed y los mismos parámetros, UNIT-D repite la misma estructura, así que permite explorar patrones vivos sin perder la posibilidad de volver a una frase concreta.',
                'Está pensado para melodías generativas, líneas modulares semi-repetitivas, contrapunto, material polifónico y patches donde pitch, acento y modulación salen de una misma lógica.',
            ],
            'features_title' => 'Concepto musical',
            'features' => [
                ['Puntos = estados musicales', 'Cada nodo del grafo representa una posible nota o estado del patrón.'],
                ['Líneas = transiciones', 'Las conexiones marcan por dónde puede moverse el walker en cada pulso de reloj.'],
                ['X/Y como modulación', 'La posición del nodo genera voltajes relacionados para timbre, filtro, FM, decay o cualquier destino CV.'],
                ['Densidad como energía', 'El número de conexiones controla acentos, movimiento y complejidad musical.'],
                ['LOCK gradual', 'Congela progresivamente frases de 16 o 32 pasos, hacia delante o hacia atrás.'],
                ['Polifonía', 'Modo contextual de 1 a 8 voces con seed compartido o grafos por voz.'],
            ],
            'manual_sections' => [
                ['Quick start', 'Clock a CLK, V/O a un oscilador, GATE a una envolvente, ACC a amplitud/filtro, y X/Y a parámetros tímbricos.'],
                ['Shape', 'SEED, NODES, RADIUS, TOL y DENS definen la geometría base.'],
                ['Traversal', 'WALK, LOCK, GDEN y GLEN definen cómo se interpreta la geometría en el tiempo.'],
                ['Musical reading', 'RNG, V/O, ACC, X e Y deciden cómo el recorrido se convierte en sonido.'],
            ],
            'inputs' => ['CLK', 'RST', 'SEED CV', 'DENS CV'],
            'outputs' => ['V/O', 'GATE', 'ACC', 'X CV', 'Y CV'],
        ],
        'multi' => [
            'title' => 'MULTI',
            'subtitle' => '10HP Expander for OXI-CV / ONE',
            'badge' => 'VCV Rack · 2.5.4 · 10 HP',
            'slug' => '/multi/',
            'library_url' => 'https://library.vcvrack.com/Animatek/OxiCvExp',
            'manual_url' => 'https://animatek.net/oxi-cv/',
            'source_url' => 'https://github.com/animatek/UZZ-VCV-RACK',
            'image' => 'https://animatek.net/wp-content/uploads/2026/06/MultExpander.webp',
            'alt' => 'MULTI expander for OXI-CV in VCV Rack',
            'intro' => 'MULTI es el expander de 10 HP para OXI-CV/ONE. Añade ocho tracks configurables con salidas independientes de V/Oct, Gate y Velocity para trabajar en modos Multitrack y Matriceal.',
            'lead' => [
                'Debe colocarse inmediatamente a la derecha del módulo principal para establecer el enlace de expander.',
                'Refleja la configuración activa de tracks y convierte el flujo MIDI del Oxi One en salidas CV multipista dentro de VCV Rack.',
            ],
            'features_title' => 'Qué añade MULTI',
            'features' => [
                ['8 tracks configurables', 'Cada track expone V/Oct, Gate y Velocity de forma independiente.'],
                ['Modo Multitrack', 'Ideal para secuenciar varias voces o instrumentos desde Oxi One.'],
                ['Modo Matriceal', 'Pensado para explotar los modos avanzados del controlador con salidas separadas.'],
                ['Enlace automático', 'Comunicación por expander link al colocarlo junto a OXI-CV/ONE.'],
            ],
            'manual_sections' => [
                ['Colocación', 'MULTI debe ir inmediatamente a la derecha de OXI-CV/ONE.'],
                ['Configuración', 'Los tracks activos se reflejan desde el módulo principal.'],
                ['Uso típico', 'Patch de 8 voces, drums, capas melódicas o control multipista desde Oxi One.'],
            ],
            'inputs' => [],
            'outputs' => ['8x V/OCT', '8x GATE', '8x VELOCITY'],
        ],
        'oxi-cv' => [
            'title' => 'OXI-CV',
            'subtitle' => 'MIDI-to-CV bridge for Oxi One',
            'badge' => 'VCV Rack · 2.5.0 · 6 HP + MULTI expander',
            'slug' => '/oxi-cv/',
            'library_url' => 'https://library.vcvrack.com/Animatek/OxiCv',
            'manual_url' => 'https://animatek.net/oxi-cv/',
            'source_url' => 'https://github.com/animatek/UZZ-VCV-RACK',
            'image' => 'https://animatek.net/wp-content/uploads/2026/06/OxiCVancha.webp',
            'alt' => 'OXI-CV module for VCV Rack',
            'intro' => 'OXI-CV es un conversor MIDI-to-CV de 6 HP diseñado para el secuenciador Oxi One, con soporte para Mono, Poly, Chord, Multitrack y Matriceal.',
            'lead' => [
                'Convierte el flujo MIDI del Oxi One en señales V/Oct, Gate, Velocity, CC, Clock, CLK/n y Run dentro de VCV Rack.',
                'El expander MULTI amplía OXI-CV con ocho tracks configurables y salidas independientes de V/Oct, Gate y Velocity.',
            ],
            'features_title' => 'OXI-CV + MULTI',
            'features' => [
                ['V/Oct, Gate, Velocity', 'Salidas principales para controlar una voz desde Oxi One.'],
                ['8 CC outputs', 'Ocho salidas de Control Change con CC configurable por slot.'],
                ['Clock, CLK/n y Run', 'Reloj, divisiones de reloj y transporte sincronizado.'],
                ['MULTI expander', '8 tracks adicionales con V/Oct, Gate y Velocity independientes.'],
            ],
            'manual_sections' => [
                ['OXI-CV', 'Usa el módulo principal para Mono, Poly, Chord y control MIDI-to-CV compacto.'],
                ['MULTI', 'Coloca el expander inmediatamente a la derecha para modos Multitrack y Matriceal.'],
                ['Patch típico', 'Oxi One controla melodía, clocks, CCs y hasta 8 voces separadas dentro de VCV Rack.'],
            ],
            'inputs' => ['MIDI from Oxi One'],
            'outputs' => ['V/OCT', 'GATE', 'VELOCITY', '8x CC', 'CLOCK', 'CLK/n', 'RUN', 'MULTI tracks'],
        ],
        'apc40-ctrl' => [
            'title' => 'APC40 CTRL',
            'subtitle' => 'Akai APC40 MIDI-to-CV Bridge',
            'badge' => 'VCV Rack · 2.5.4 · 13 HP',
            'slug' => '/apc40-ctrl/',
            'library_url' => 'https://library.vcvrack.com/Animatek/Apc40Ctrl',
            'manual_url' => 'https://github.com/animatek/UZZ-VCV-RACK',
            'source_url' => 'https://github.com/animatek/UZZ-VCV-RACK',
            'image' => 'https://animatek.net/wp-content/uploads/2026/06/APC40.webp',
            'alt' => 'APC40 CTRL module for VCV Rack',
            'intro' => 'APC40 CTRL convierte los controles continuos del Akai APC40 en salidas CV dentro de VCV Rack, sin tener que remapear manualmente cada knob o fader.',
            'lead' => [
                'Captura Track Control, Device Control, Cue, Master, Crossfader y los ocho faders de canal.',
                'Cada control principal incluye attenuverter para escalar o invertir el voltaje antes de enviarlo al patch.',
            ],
            'features_title' => 'Mapa de controles',
            'features' => [
                ['Track Controls T1-T8', 'CC 48-55 en canal MIDI 1, con attenuverter por salida.'],
                ['Device Knobs D1-D8', 'CC 16-23 en canal MIDI 1, preparados para modulación directa.'],
                ['Cue, Master y Crossfader', 'CC 47, CC 14 y CC 11 con salida CV independiente.'],
                ['8 Channel Faders', 'Todos usan CC 7, pero en canales MIDI 1-8 para ocho salidas separadas.'],
            ],
            'manual_sections' => [
                ['Rango de salida', 'Los controles entregan 0-10 V antes del escalado/inversión.'],
                ['Canales', 'Los knobs escuchan en canal 1; la columna de faders usa canales 1-8.'],
                ['Uso típico', 'Control performativo de mezclas, sends, morphs, filtros o macros en Rack.'],
            ],
            'inputs' => ['MIDI from APC40'],
            'outputs' => ['T1-T8', 'D1-D8', 'CUE', 'MASTER', 'XFAD', 'F1-F8'],
        ],
        'blank-3' => [
            'title' => 'BLANK 3',
            'subtitle' => '3HP Animatek Blank Panel',
            'badge' => 'VCV Rack · 2.5.4 · 3 HP',
            'slug' => '/blank-3/',
            'library_url' => 'https://library.vcvrack.com/Animatek/Blank3',
            'manual_url' => 'https://github.com/animatek/UZZ-VCV-RACK',
            'source_url' => 'https://github.com/animatek/UZZ-VCV-RACK',
            'image' => 'https://animatek.net/wp-content/uploads/2026/06/Blank.webp',
            'alt' => 'BLANK 3 panel for VCV Rack',
            'intro' => 'BLANK 3 es un panel blank de 3 HP para llenar huecos pequeños en tus patches de VCV Rack manteniendo el lenguaje visual de Animatek.',
            'lead' => [
                'Incluye artwork dark/light y un patrón sutil con logos Animatek animados a baja opacidad.',
                'Desde el menú contextual puedes pausar la animación globalmente para congelar el panel y reducir trabajo en reposo.',
            ],
            'features_title' => 'Utilidad visual',
            'features' => [
                ['3 HP', 'Formato pequeño para completar huecos estrechos.'],
                ['Dark / Light', 'Tema de panel seleccionable desde menú contextual.'],
                ['Animación sutil', 'Logos Animatek con movimiento lento y baja opacidad.'],
                ['Pause animation', 'Opción global para congelar la animación cuando prefieras un rack estático.'],
            ],
            'manual_sections' => [
                ['Uso', 'Añádelo como cualquier módulo de VCV Library para separar zonas del patch.'],
                ['Tema', 'Cambia entre panel claro y oscuro desde el menú contextual.'],
                ['Rendimiento', 'Usa Pause animation si quieres reducir actividad visual en patches grandes.'],
            ],
            'inputs' => [],
            'outputs' => [],
        ],
    ];
}

function animatek_vcv_modules_nav( string $current_slug, string $locale = 'es' ): void {
    $is_en   = 'en' === $locale;
    $suffix  = $is_en ? '-eng' : '';
    $current = preg_replace( '/-eng$/', '', $current_slug );

    $vcv_modules = [
        'ultimate-ztep-zequencer-vcvrack' => 'UZZ',
        'unit-d'                          => 'UNIT-D',
        'oxi-cv'                          => 'OXI-CV',
        'apc40-ctrl'                      => 'APC40 CTRL',
        'blank-3'                         => 'BLANK 3',
    ];

    $families = [
        'vcv' => [
            'label' => 'VCV Rack',
            'url'   => '/software' . $suffix . '/#vcv-rack',
            'slugs' => array_merge( array_keys( $vcv_modules ), [ 'multi' ] ),
        ],
        'max' => [
            'label' => 'Max for Live',
            'url'   => '/ultimate-ztep-zequencer' . $suffix . '/',
            'slugs' => [ 'ultimate-ztep-zequencer' ],
        ],
        'nme' => [
            'label' => 'Animatek NME',
            'url'   => '/animatek-nme' . $suffix . '/',
            'slugs' => [ 'animatek-nme' ],
        ],
    ];

    $current_family = '';
    foreach ( $families as $key => $family ) {
        if ( in_array( $current, $family['slugs'], true ) ) {
            $current_family = $key;
            break;
        }
    }

    $pill_active = 'px-3 py-1.5 rounded-full text-xs font-semibold bg-primary text-white shadow-sm';
    $pill_link   = 'px-3 py-1.5 rounded-full text-xs font-semibold text-slate-700 hover:text-primary hover:bg-slate-100 transition';
    ?>
    <nav class="inline-flex flex-wrap items-center gap-1 p-1 rounded-full bg-white border border-slate-200 shadow-sm" aria-label="Software Animatek">
        <a href="<?php echo esc_url( home_url( '/software' . $suffix . '/' ) ); ?>" class="<?php echo esc_attr( $pill_link ); ?> inline-flex items-center gap-1.5">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="7" height="7" rx="1"/>
                <rect x="14" y="3" width="7" height="7" rx="1"/>
                <rect x="3" y="14" width="7" height="7" rx="1"/>
                <rect x="14" y="14" width="7" height="7" rx="1"/>
            </svg>
            Software
        </a>
        <span class="h-4 w-px bg-slate-200" aria-hidden="true"></span>

        <?php if ( 'vcv' === $current_family ) : ?>
            <span class="px-2 text-[10px] font-bold uppercase tracking-widest text-slate-400">VCV Rack</span>
            <?php foreach ( $vcv_modules as $slug => $label ) : ?>
                <?php if ( $slug === $current ) : ?>
                    <span class="<?php echo esc_attr( $pill_active ); ?>" aria-current="page"><?php echo esc_html( $label ); ?></span>
                <?php else : ?>
                    <a href="<?php echo esc_url( home_url( '/' . $slug . $suffix . '/' ) ); ?>" class="<?php echo esc_attr( $pill_link ); ?>"><?php echo esc_html( $label ); ?></a>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else : ?>
            <?php foreach ( $families as $key => $family ) : ?>
                <?php if ( $key === $current_family ) : ?>
                    <span class="<?php echo esc_attr( $pill_active ); ?>" aria-current="page"><?php echo esc_html( $family['label'] ); ?></span>
                <?php else : ?>
                    <a href="<?php echo esc_url( home_url( $family['url'] ) ); ?>" class="<?php echo esc_attr( $pill_link ); ?>"><?php echo esc_html( $family['label'] ); ?></a>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </nav>
    <?php
}

function animatek_vcv_module_en_copy( string $module_slug ): array {
    $copy = [
        'uzz-vcv' => [
            'intro' => '16-step sequencer for VCV Rack 2.x. Precise timing, structured improvisation and modular flexibility: every step has Pitch, Octave, Duration, Mod1/Mod2 and Prob/Pulse.',
        ],
        'multi' => [
            'intro' => 'MULTI is the 10HP expander for OXI-CV/ONE. It adds eight configurable tracks with independent V/Oct, Gate and Velocity outputs for Multitrack and Matriceal modes.',
        ],
        'unit-d' => [
            'intro' => 'UNIT-D turns geometry into music: it creates a seeded 2D cloud of nodes, connects points using a distance rule, and turns graph traversal into pitch, gates, accents and X/Y modulation.',
            'lead' => [
                'It is not an uncontrolled random source. With the same seed and the same settings, UNIT-D repeats the same structure, so you can explore living patterns without losing the ability to return to a phrase.',
                'It is built for generative melodies, semi-repetitive modular lines, counterpoint, polyphonic material and patches where pitch, accent and modulation come from one shared logic.',
            ],
            'features_title' => 'Musical concept',
            'features' => [
                ['Points = musical states', 'Each graph node represents a possible note or pattern state.'],
                ['Lines = transitions', 'Connections define where the walker can move on each clock pulse.'],
                ['X/Y as modulation', 'Node position generates related voltages for timbre, filters, FM, decay or any CV destination.'],
                ['Density as energy', 'The number of connections controls accents, movement and musical complexity.'],
                ['Gradual LOCK', 'Progressively freezes 16 or 32-step phrases, forward or reverse.'],
                ['Polyphony', 'Context-menu polyphony from 1 to 8 voices, with shared seed or per-voice graphs.'],
            ],
            'manual_sections' => [
                ['Quick start', 'Patch clock to CLK, V/O to an oscillator, GATE to an envelope, ACC to amplitude/filter, and X/Y to timbral parameters.'],
                ['Shape', 'SEED, NODES, RADIUS, TOL and DENS define the base geometry.'],
                ['Traversal', 'WALK, LOCK, GDEN and GLEN define how that geometry is played over time.'],
                ['Musical reading', 'RNG, V/O, ACC, X and Y decide how traversal becomes sound.'],
            ],
        ],
        'apc40-ctrl' => [
            'intro' => 'APC40 CTRL converts the continuous controls of the Akai APC40 into CV outputs inside VCV Rack, without manually remapping every knob or fader.',
            'lead' => [
                'It captures Track Control, Device Control, Cue, Master, Crossfader and the eight channel faders.',
                'Each main control includes an attenuverter so the voltage can be scaled or inverted before it reaches the patch.',
            ],
            'features_title' => 'Control map',
            'features' => [
                ['Track Controls T1-T8', 'CC 48-55 on MIDI channel 1, with one attenuverter per output.'],
                ['Device Knobs D1-D8', 'CC 16-23 on MIDI channel 1, ready for direct modulation.'],
                ['Cue, Master and Crossfader', 'CC 47, CC 14 and CC 11 with independent CV outputs.'],
                ['8 Channel Faders', 'All use CC 7, but on MIDI channels 1-8 for eight separate outputs.'],
            ],
            'manual_sections' => [
                ['Output range', 'Controls output 0-10 V before scaling or inversion.'],
                ['Channels', 'Knobs listen on channel 1; the fader column uses channels 1-8.'],
                ['Typical use', 'Performance control for mixes, sends, morphs, filters or macros in Rack.'],
            ],
        ],
        'oxi-cv' => [
            'intro' => 'OXI-CV is a 6HP MIDI-to-CV bridge designed for the Oxi One sequencer, covering Mono, Poly, Chord, Multitrack and Matriceal modes.',
            'lead' => [
                'It converts the Oxi One MIDI stream into V/Oct, Gate, Velocity, CC, Clock, CLK/n and Run signals inside VCV Rack.',
                'The MULTI expander extends OXI-CV with eight configurable tracks and independent V/Oct, Gate and Velocity outputs.',
            ],
            'features_title' => 'OXI-CV + MULTI',
            'features' => [
                ['V/Oct, Gate, Velocity', 'Main outputs for controlling one voice from Oxi One.'],
                ['8 CC outputs', 'Eight Control Change outputs with configurable CC number per slot.'],
                ['Clock, CLK/n and Run', 'Clock, clock divisions and synchronized transport.'],
                ['MULTI expander', '8 additional tracks with independent V/Oct, Gate and Velocity outputs.'],
            ],
            'manual_sections' => [
                ['OXI-CV', 'Use the main module for Mono, Poly, Chord and compact MIDI-to-CV control.'],
                ['MULTI', 'Place the expander immediately to the right for Multitrack and Matriceal modes.'],
                ['Typical patch', 'Oxi One controls melody, clocks, CCs and up to 8 separate voices inside VCV Rack.'],
            ],
        ],
        'blank-3' => [
            'intro' => 'BLANK 3 is a 3HP blank panel for filling small gaps in VCV Rack patches while keeping the Animatek visual language.',
            'lead' => [
                'It includes dark/light artwork and a subtle low-opacity animated Animatek logo pattern.',
                'From the context menu, the animation can be paused globally to freeze the panel and reduce idle visual activity.',
            ],
            'features_title' => 'Visual utility',
            'features' => [
                ['3 HP', 'Small format for narrow empty spaces.'],
                ['Dark / Light', 'Panel theme selectable from the context menu.'],
                ['Subtle animation', 'Animatek logos drift slowly at low opacity.'],
                ['Pause animation', 'Global option to freeze animation when you prefer a static rack.'],
            ],
            'manual_sections' => [
                ['Use', 'Add it like any VCV Library module to separate patch zones.'],
                ['Theme', 'Switch between light and dark panel from the context menu.'],
                ['Performance', 'Use Pause animation if you want to reduce visual activity in large patches.'],
            ],
        ],
    ];

    return $copy[ $module_slug ] ?? [];
}

function animatek_vcv_module_render( string $module_slug, string $locale = 'es' ): void {
    $modules = animatek_vcv_modules_data();
    $module  = $modules[ $module_slug ] ?? null;

    if ( ! $module ) {
        return;
    }

    $is_en = 'en' === $locale;

    if ( $is_en ) {
        $module = array_replace( $module, animatek_vcv_module_en_copy( $module_slug ) );
        $module['slug'] = rtrim( $module['slug'], '/' ) . '-eng/';
        if ( 'unit-d' === $module_slug ) {
            $module['manual_url'] = 'https://github.com/animatek/UZZ-VCV-RACK/blob/main/Manuals/UNIT-D_Manual_EN.md';
        }
    }

    $ui = $is_en ? [
        'library_cta' => 'Add from VCV Library',
        'manual_cta' => 'Manual / docs',
        'quick_manual' => 'Quick manual',
        'library_title' => 'VCV Library',
        'add_to_rack' => 'Add to my Rack',
        'source' => 'Source code',
        'patch_points' => 'Patch points',
        'inputs' => 'Inputs',
        'outputs' => 'Outputs',
        'no_inputs' => 'No inputs: output, control or visual utility module.',
        'no_outputs' => 'No outputs: used as a blank panel.',
        'more_modules' => 'More Animatek modules',
        'language_label' => 'ES',
        'language_url' => home_url( '/' . $module_slug . '/' ),
    ] : [
        'library_cta' => 'Añadir desde VCV Library',
        'manual_cta' => 'Manual / docs',
        'quick_manual' => 'Manual rápido',
        'library_title' => 'VCV Library',
        'add_to_rack' => 'Añadir a mi Rack',
        'source' => 'Código fuente',
        'patch_points' => 'Patch points',
        'inputs' => 'Entradas',
        'outputs' => 'Salidas',
        'no_inputs' => 'Sin entradas: módulo de salida, control o utilidad visual.',
        'no_outputs' => 'Sin salidas: se usa como panel blank.',
        'more_modules' => 'Más módulos Animatek',
        'language_label' => 'EN',
        'language_url' => home_url( '/' . $module_slug . '-eng/' ),
    ];
    ?>
    <main id="primary" class="bg-slate-200 text-slate-900">
        <section class="relative overflow-hidden px-6 sm:px-10 py-16 bg-gradient-to-br from-slate-50 via-white to-slate-100 text-slate-900 mb-[6.25rem]">
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute -left-24 -top-16 h-72 w-72 bg-primary/15 blur-3xl rounded-full"></div>
                <div class="absolute right-10 top-10 h-64 w-64 bg-cyan-300/20 blur-3xl rounded-full"></div>
                <div class="absolute -right-20 bottom-0 h-72 w-72 bg-indigo-300/20 blur-3xl"></div>
            </div>

            <div class="max-w-7xl mx-auto space-y-6 relative z-10">
                <div class="flex flex-wrap items-center gap-3">
                    <?php animatek_vcv_modules_nav( $is_en ? $module_slug . '-eng' : $module_slug, $locale ); ?>
                    <a href="<?php echo esc_url( $ui['language_url'] ); ?>" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 rounded-full text-xs font-semibold text-slate-700 hover:border-primary hover:text-primary transition shadow-sm">
                        <span><?php echo esc_html( $ui['language_label'] ); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="9" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3 12h18" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 3c2.5 3.5 2.5 14 0 18" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7 5c1.5 2 1.5 12 0 14" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17 5c-1.5 2-1.5 12 0 14" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>

                <div class="grid gap-8 lg:grid-cols-[1.05fr_0.95fr] items-center">
                    <div class="space-y-5">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold tracking-widest uppercase">
                            <?php echo esc_html( $module['badge'] ); ?>
                        </div>
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight text-slate-900">
                            <?php echo esc_html( $module['title'] ); ?>
                        </h1>
                        <p class="text-xl text-primary font-bold"><?php echo esc_html( $module['subtitle'] ); ?></p>
                        <p class="text-lg sm:text-xl text-slate-700 leading-relaxed max-w-2xl">
                            <?php echo esc_html( $module['intro'] ); ?>
                        </p>
                        <div class="flex flex-wrap gap-3 pt-2">
                            <a href="<?php echo esc_url( $module['library_url'] ); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center rounded-xl bg-primary px-5 py-3 text-sm font-bold text-white shadow-md shadow-primary/20 transition hover:-translate-y-0.5 hover:bg-primary/90">
                                <?php echo esc_html( $ui['library_cta'] ); ?>
                            </a>
                            <a href="<?php echo esc_url( $module['manual_url'] ); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-bold text-slate-800 transition hover:-translate-y-0.5 hover:border-primary hover:text-primary">
                                <?php echo esc_html( $ui['manual_cta'] ); ?>
                            </a>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="absolute inset-0 rounded-3xl bg-white/60 blur-3xl"></div>
                        <div class="relative rounded-3xl border border-slate-200 shadow-2xl bg-slate-900 px-2 py-2">
                            <div class="absolute inset-0 bg-gradient-to-r from-primary/20 to-cyan-500/20 blur-3xl opacity-40"></div>
                            <img src="<?php echo esc_url( $module['image'] ); ?>" alt="<?php echo esc_attr( $module['alt'] ); ?>" class="w-full aspect-video object-contain relative z-10 rounded-3xl bg-slate-950">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="max-w-7xl mx-auto px-6 pb-20">
            <div class="grid lg:grid-cols-[1.4fr_0.9fr] gap-8 items-start">
                <div class="space-y-10">
                    <div class="space-y-4 text-slate-700 leading-relaxed">
                        <?php foreach ( $module['lead'] as $paragraph ) : ?>
                            <p class="text-base"><?php echo esc_html( $paragraph ); ?></p>
                        <?php endforeach; ?>
                    </div>

                    <div>
                        <h2 class="text-2xl font-extrabold text-slate-900 mb-6 border-b border-slate-200 pb-2"><?php echo esc_html( $module['features_title'] ); ?></h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <?php foreach ( $module['features'] as $feature ) : ?>
                                <div class="flex gap-3 items-start p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                                    <div class="p-2 bg-blue-50 text-primary rounded-lg shrink-0">
                                        <i data-lucide="circle-dot" class="w-5 h-5"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-sm text-slate-800 mb-1"><?php echo esc_html( $feature[0] ); ?></h3>
                                        <p class="text-xs text-slate-600"><?php echo esc_html( $feature[1] ); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-8 border border-slate-200 shadow-sm">
                        <h2 class="text-2xl font-extrabold text-slate-900 mb-6"><?php echo esc_html( $ui['quick_manual'] ); ?></h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <?php foreach ( $module['manual_sections'] as $section ) : ?>
                                <div>
                                    <h3 class="font-bold text-slate-900 mb-1"><?php echo esc_html( $section[0] ); ?></h3>
                                    <p class="text-sm text-slate-600 leading-relaxed"><?php echo esc_html( $section[1] ); ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <aside class="space-y-8">
                    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-lg">
                        <div class="mb-6 text-center">
                            <img src="https://animatek.net/wp-content/uploads/2025/11/logovcv.webp" alt="Logo VCV" class="w-12 h-12 mx-auto mb-2 opacity-80 object-contain">
                            <h4 class="text-lg font-bold text-slate-900"><?php echo esc_html( $ui['library_title'] ); ?></h4>
                            <p class="text-xs text-slate-500 mt-1"><?php echo esc_html( $module['badge'] ); ?></p>
                        </div>
                        <a href="<?php echo esc_url( $module['library_url'] ); ?>" target="_blank" rel="noopener noreferrer" class="flex w-full items-center justify-center gap-2 rounded-xl bg-primary px-5 py-4 text-center font-bold text-white shadow-md shadow-primary/20 transition hover:-translate-y-1 hover:bg-primary/90">
                            <i data-lucide="download-cloud" class="w-5 h-5"></i>
                            <?php echo esc_html( $ui['add_to_rack'] ); ?>
                        </a>
                        <a href="<?php echo esc_url( $module['source_url'] ); ?>" target="_blank" rel="noopener noreferrer" class="mt-3 block w-full text-center border border-slate-200 bg-slate-50 hover:border-primary hover:text-primary text-slate-700 font-bold py-3 px-4 rounded-xl transition">
                            <?php echo esc_html( $ui['source'] ); ?>
                        </a>
                    </div>

                    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                        <h4 class="font-bold text-slate-900 mb-4"><?php echo esc_html( $ui['patch_points'] ); ?></h4>
                        <div class="space-y-5">
                            <div>
                                <h5 class="text-xs font-bold uppercase tracking-widest text-slate-500 mb-2"><?php echo esc_html( $ui['inputs'] ); ?></h5>
                                <?php if ( $module['inputs'] ) : ?>
                                    <ul class="flex flex-wrap gap-2">
                                        <?php foreach ( $module['inputs'] as $input ) : ?>
                                            <li class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-700"><?php echo esc_html( $input ); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else : ?>
                                    <p class="text-sm text-slate-500"><?php echo esc_html( $ui['no_inputs'] ); ?></p>
                                <?php endif; ?>
                            </div>
                            <div>
                                <h5 class="text-xs font-bold uppercase tracking-widest text-slate-500 mb-2"><?php echo esc_html( $ui['outputs'] ); ?></h5>
                                <?php if ( $module['outputs'] ) : ?>
                                    <ul class="flex flex-wrap gap-2">
                                        <?php foreach ( $module['outputs'] as $output ) : ?>
                                            <li class="rounded-full bg-primary/10 px-3 py-1 text-xs font-bold text-primary"><?php echo esc_html( $output ); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else : ?>
                                    <p class="text-sm text-slate-500"><?php echo esc_html( $ui['no_outputs'] ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                        <h4 class="font-bold text-slate-900 mb-4"><?php echo esc_html( $ui['more_modules'] ); ?></h4>
                        <div class="grid gap-2">
                            <?php foreach ( animatek_vcv_modules_data() as $slug => $item ) : ?>
                                <?php if ( $slug === $module_slug || 'multi' === $slug ) { continue; } ?>
                                <a href="<?php echo esc_url( home_url( $is_en ? rtrim( $item['slug'], '/' ) . '-eng/' : $item['slug'] ) ); ?>" class="flex items-center justify-between rounded-xl border border-slate-100 bg-slate-50 px-3 py-2 text-sm font-bold text-slate-700 transition hover:border-primary hover:text-primary">
                                    <?php echo esc_html( $item['title'] ); ?>
                                    <span class="text-xs text-slate-400">v<?php echo esc_html( preg_replace( '/^.*?(\d+\.\d+\.\d+).*$/', '$1', $item['badge'] ) ); ?></span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </aside>
            </div>
        </section>
    </main>
    <?php
}
