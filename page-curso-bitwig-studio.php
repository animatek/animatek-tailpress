<?php
/* Template Name: Curso Bitwig Early Access */
get_header();

// Datos de la barra de progreso agrupados por fases. Edita aquí los porcentajes según avance el curso.
$bitwig_fases = [
    [
        'titulo' => 'Fase 1 — Fundamentos',
        'bloques' => [
            ['label' => '0. Setup inicial: ubicaciones y configuración', 'value' => 30],
            ['label' => '1. Funcionamiento básico de Bitwig',            'value' => 0],
            ['label' => '2. Pistas y Browser',                            'value' => 0],
            ['label' => '3. Clips y primer ejemplo',                      'value' => 0],
        ],
    ],
    [
        'titulo' => 'Fase 2 — Síntesis y modulación',
        'bloques' => [
            ['label' => '4. Polymer',         'value' => 0],
            ['label' => '5. Note Operators',  'value' => 0],
            ['label' => '6. Moduladores',     'value' => 0],
        ],
    ],
    [
        'titulo' => 'Fase 3 — The Grid y Sampler',
        'bloques' => [
            ['label' => '7. The Grid — entrada rápida',  'value' => 0],
            ['label' => '8. Sampler',                    'value' => 0],
            ['label' => '9. The Grid — patches prácticos', 'value' => 0],
        ],
    ],
    [
        'titulo' => 'Fase 4 — Cierre',
        'bloques' => [
            ['label' => '10. Automatizaciones y cierre', 'value' => 0],
            ['label' => 'Proyecto final',                'value' => 0],
        ],
    ],
];

// Total global a partir de todos los bloques de todas las fases.
$bitwig_all = array_merge(...array_column($bitwig_fases, 'bloques'));
$bitwig_total = (int) round(array_sum(array_column($bitwig_all, 'value')) / max(1, count($bitwig_all)));

$bitwig_price_id = '82a06d1a-f799-456e-901c-9641d02621c3';
$cta_compra = '#comprar';
$cta_lista  = '#lista-interesados';
?>

<main id="primary" class="bg-slate-50 text-slate-900 dark:bg-slate-950 dark:text-slate-100">

    <!-- 1. HERO -->
    <section class="relative overflow-hidden px-6 py-20 lg:py-28 isolate">
        <div class="absolute inset-0 bg-gradient-to-br from-slate-100 via-white to-slate-100 dark:from-slate-950 dark:via-slate-900 dark:to-slate-950"></div>
        <div class="absolute -left-32 top-10 w-96 h-96 bg-emerald-400/20 dark:bg-emerald-500/15 rounded-full blur-[140px]"></div>
        <div class="absolute -right-24 bottom-0 w-[28rem] h-[28rem] bg-primary/15 rounded-full blur-[160px]"></div>

        <div class="max-w-5xl mx-auto relative z-10 space-y-8 text-center lg:text-left">
            <div class="flex flex-wrap items-center gap-3 justify-center lg:justify-start">
                <div class="inline-flex items-center gap-2 px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] rounded-full bg-amber-400/15 border border-amber-400/40 text-amber-700 dark:bg-amber-400/10 dark:border-amber-300/30 dark:text-amber-200 backdrop-blur">
                    <span aria-hidden="true">🚧</span> Early Access — curso en producción
                </div>
                <a href="https://www.bitwig.com/" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-slate-200 hover:border-emerald-400/60 hover:bg-slate-50 dark:bg-white/5 dark:border-white/10 dark:hover:border-emerald-400/40 dark:hover:bg-white/10 transition-colors backdrop-blur">
                    <img src="https://animatek.net/wp-content/uploads/2025/11/pngwing.com_.png" alt="Bitwig" class="h-4 w-auto" loading="lazy">
                    <span class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-700 dark:text-slate-200">Para Bitwig Studio</span>
                </a>
            </div>

            <div class="space-y-5">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-[1.05] tracking-tight text-slate-900 dark:text-white">
                    Aprende <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary via-cyan-500 to-primary dark:from-primary dark:via-cyan-300 dark:to-primary">Bitwig desde dentro</span>, sin perderte entre menús, clips y cables virtuales.
                </h1>
                <p class="text-lg sm:text-xl text-slate-600 dark:text-slate-300 leading-relaxed max-w-3xl mx-auto lg:mx-0">
                    Un curso práctico de Animatek para entender Bitwig desde la base: ubicaciones y configuración, interfaz, pistas, clips, Polymer, Note Operators, moduladores, The Grid, Sampler y automatizaciones para crear música electrónica con un flujo claro y propio.
                </p>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white dark:border-white/10 dark:bg-white/5 backdrop-blur p-5 text-left max-w-3xl mx-auto lg:mx-0 shadow-sm dark:shadow-none">
                <p class="text-sm text-slate-700 dark:text-slate-200 leading-relaxed">
                    <strong class="text-slate-900 dark:text-white">Importante:</strong> el curso todavía no está completo. Lo estoy creando en público y podrás ver el progreso bloque a bloque. Si entras ahora, pagas precio fundador y recibes las lecciones conforme se publiquen.
                </p>
            </div>

            <div class="grid sm:flex gap-3 sm:gap-4 justify-center lg:justify-start">
                <a href="<?php echo esc_url($cta_compra); ?>" class="btn-primary w-full sm:w-auto">
                    Entrar en Early Access — 29€
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7 7 7-7 7"/></svg>
                </a>
                <a href="<?php echo esc_url($cta_lista); ?>" class="btn-secondary w-full sm:w-auto">
                    Apuntarme a la lista de interesados
                </a>
            </div>

            <p class="text-xs text-slate-500 dark:text-slate-400 max-w-3xl mx-auto lg:mx-0">
                Curso en producción por bloques. Early Access a 29€. Después habrá una semana de lanzamiento a 39€ y finalmente pasará a 50€.
            </p>
        </div>
    </section>

    <!-- 2. BARRA DE PROGRESO -->
    <section id="progreso" class="py-20 bg-white border-y border-slate-200 dark:bg-slate-900/60 dark:border-white/5">
        <div class="max-w-4xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto space-y-3 mb-14">
                <p class="text-xs uppercase tracking-[0.2em] font-semibold text-primary dark:text-primary">Status público</p>
                <h2 class="text-slate-900 dark:text-white">Progreso de producción del curso</h2>
                <p class="text-slate-600 dark:text-slate-300">Estoy creando este curso por bloques. Aquí puedes ver en qué punto está cada parte y qué viene después.</p>
            </div>

            <div class="rounded-3xl border border-slate-200 bg-slate-50 dark:border-white/10 dark:bg-slate-950/60 backdrop-blur p-6 sm:p-8 shadow-lg dark:shadow-xl">
                <div class="flex items-center justify-between mb-6 pb-6 border-b border-slate-200 dark:border-white/10">
                    <div>
                        <p class="text-xs uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400 font-semibold">Avance global</p>
                        <p class="text-2xl font-bold text-slate-900 dark:text-white mt-1"><?php echo esc_html($bitwig_total); ?>%</p>
                    </div>
                    <div class="hidden sm:block text-right text-sm text-slate-500 dark:text-slate-400 max-w-xs leading-relaxed">
                        Sí, como Brandon Sanderson con sus novelas, pero con moduladores, clips y The Grid.
                    </div>
                </div>

                <div class="space-y-8">
                    <?php foreach ($bitwig_fases as $fase) :
                        $fase_total = (int) round(array_sum(array_column($fase['bloques'], 'value')) / max(1, count($fase['bloques'])));
                    ?>
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-sm font-bold uppercase tracking-[0.14em] text-emerald-600 dark:text-emerald-300"><?php echo esc_html($fase['titulo']); ?></h3>
                                <span class="text-xs font-mono text-slate-500 dark:text-slate-400"><?php echo esc_html($fase_total); ?>%</span>
                            </div>
                            <div class="space-y-3 pl-3 border-l-2 border-slate-200 dark:border-white/10">
                                <?php foreach ($fase['bloques'] as $item) : ?>
                                    <div>
                                        <div class="flex items-center justify-between mb-1.5 text-sm">
                                            <span class="text-slate-700 dark:text-slate-200"><?php echo esc_html($item['label']); ?></span>
                                            <span class="text-slate-500 dark:text-slate-400 font-mono text-xs"><?php echo esc_html($item['value']); ?>%</span>
                                        </div>
                                        <div class="h-1.5 rounded-full bg-slate-200 dark:bg-white/5 overflow-hidden">
                                            <div class="h-full rounded-full bg-gradient-to-r from-emerald-400 via-cyan-400 to-primary" style="width: <?php echo esc_attr($item['value']); ?>%"></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. PARA QUIÉN ES -->
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto space-y-3 mb-14">
                <p class="text-xs uppercase tracking-[0.18em] font-semibold text-primary dark:text-primary">Encaje</p>
                <h2 class="text-slate-900 dark:text-white">Este curso es para ti si…</h2>
            </div>

            <div class="grid lg:grid-cols-2 gap-6">
                <div class="rounded-2xl border border-emerald-300/60 bg-emerald-50 dark:border-emerald-400/20 dark:bg-emerald-500/5 p-8 sm:p-10">
                    <h3 class="text-lg font-bold text-emerald-700 dark:text-emerald-200 mb-5 flex items-center gap-2">
                        <span class="inline-flex h-7 w-7 items-center justify-center rounded-full bg-emerald-200 text-emerald-700 dark:bg-emerald-400/20 dark:text-emerald-300">✓</span>
                        Te encaja si…
                    </h3>
                    <ul class="space-y-3 text-slate-700 dark:text-slate-200 text-[15px] leading-relaxed">
                        <li class="flex gap-3"><span class="text-emerald-500 dark:text-emerald-400 mt-1">›</span> Has abierto Bitwig y te has sentido un poco perdido.</li>
                        <li class="flex gap-3"><span class="text-emerald-500 dark:text-emerald-400 mt-1">›</span> Vienes de Ableton, FL Studio, Logic u otro DAW y quieres entender la lógica de Bitwig.</li>
                        <li class="flex gap-3"><span class="text-emerald-500 dark:text-emerald-400 mt-1">›</span> Te interesa The Grid, pero no quieres saltar al vacío sin entender antes el programa.</li>
                        <li class="flex gap-3"><span class="text-emerald-500 dark:text-emerald-400 mt-1">›</span> Quieres producir música electrónica con un flujo más modular y flexible.</li>
                        <li class="flex gap-3"><span class="text-emerald-500 dark:text-emerald-400 mt-1">›</span> Te gustan los sintes, la modulación, VCV Rack o los sistemas generativos.</li>
                        <li class="flex gap-3"><span class="text-emerald-500 dark:text-emerald-400 mt-1">›</span> Quieres aprender desde la práctica, no desde una lista infinita de funciones.</li>
                    </ul>
                </div>

                <div class="rounded-2xl border border-rose-300/60 bg-rose-50 dark:border-rose-400/15 dark:bg-rose-500/5 p-8 sm:p-10">
                    <h3 class="text-lg font-bold text-rose-700 dark:text-rose-200 mb-5 flex items-center gap-2">
                        <span class="inline-flex h-7 w-7 items-center justify-center rounded-full bg-rose-200 text-rose-700 dark:bg-rose-400/15 dark:text-rose-300">✕</span>
                        No es para ti si…
                    </h3>
                    <ul class="space-y-3 text-slate-700 dark:text-slate-300 text-[15px] leading-relaxed">
                        <li class="flex gap-3"><span class="text-rose-500 dark:text-rose-400 mt-1">›</span> Buscas un curso avanzado de mezcla / mastering.</li>
                        <li class="flex gap-3"><span class="text-rose-500 dark:text-rose-400 mt-1">›</span> Quieres solo trucos rápidos sin entender el fondo.</li>
                        <li class="flex gap-3"><span class="text-rose-500 dark:text-rose-400 mt-1">›</span> Ya dominas Bitwig a nivel avanzado y The Grid en profundidad.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. QUÉ VAS A APRENDER -->
    <section id="temario" class="py-20 bg-white border-y border-slate-200 dark:bg-slate-900/60 dark:border-white/5">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto space-y-4 mb-14">
                <p class="text-xs uppercase tracking-[0.18em] font-semibold text-primary dark:text-primary">Temario</p>
                <h2 class="text-slate-900 dark:text-white">De la primera vez que abres Bitwig a tu primera mini-pieza con The Grid</h2>
                <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                    11 bloques que siguen el orden real en el que se aprende a producir con Bitwig: primero dejas el sistema configurado, luego entiendes la interfaz, después haces sonar tu primer loop y a partir de ahí vas sumando síntesis, modulación, The Grid, Sampler y automatizaciones hasta cerrar con una pieza propia.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
                <?php
                $bloques = [
                    ['n' => '00', 'titulo' => 'Setup inicial: ubicaciones y configuración', 'texto' => 'Ubicaciones de Bitwig (proyectos, biblioteca, paquetes, plugins, samples, caché), audio engine, latencia, MIDI y plantilla de inicio. Empiezas con Bitwig configurado de forma sana.'],
                    ['n' => '01', 'titulo' => 'Funcionamiento básico de Bitwig',           'texto' => 'Mapa de la interfaz: Arranger, Launcher, Inspector, Browser, dispositivos, mezclador, transporte y navegación. Entiendes dónde está cada cosa.'],
                    ['n' => '02', 'titulo' => 'Pistas y Browser',                          'texto' => 'Tipos de pistas, carga de instrumentos y efectos, Browser, cadenas de dispositivos y ruteo básico. Sabes dónde vive el sonido en tu proyecto.'],
                    ['n' => '03', 'titulo' => 'Clips y primer ejemplo',                    'texto' => 'Clips MIDI/audio, escenas, Launcher vs Arranger y creación de tu primer loop musical completo.'],
                    ['n' => '04', 'titulo' => 'Polymer',                                   'texto' => 'El sinte nativo de Bitwig como puerta de entrada a la síntesis: oscilador, filtro, envolvente, modulación. Diseñas tu primer bajo, lead y pad propios.'],
                    ['n' => '05', 'titulo' => 'Note Operators',                            'texto' => 'Probabilidad, recurrence, occurrence, repeat y velocity para que tus clips dejen de sonar a "loop pegado" y respiren.'],
                    ['n' => '06', 'titulo' => 'Moduladores',                               'texto' => 'Macro, LFO, Steps, Random, ADSR, Expressions. Modulación vs automatización, asignación correcta y ejemplos para dar vida a cualquier parámetro.'],
                    ['n' => '07', 'titulo' => 'The Grid: entrada rápida',                  'texto' => 'Qué es The Grid, tipos (Poly, FX, Note), señales básicas y primer patch que suena. Llegas con base de síntesis y modulación, así que el salto al modular es natural.'],
                    ['n' => '08', 'titulo' => 'Sampler',                                   'texto' => 'Sampler como instrumento creativo: cargar, recortar, afinar, modular y construir tus propios kits o texturas a partir de audio.'],
                    ['n' => '09', 'titulo' => 'The Grid: patches prácticos',               'texto' => 'Sinte sustractivo más completo, bajo acid, drone/ambient, percusión, FX Grid y Note Grid. Patches útiles, organizados y con macros para directo.'],
                    ['n' => '10', 'titulo' => 'Automatizaciones y cierre',                 'texto' => 'Automatizaciones de pista, de clip y en tiempo real, transiciones, limpieza y export sin clipping. Conviertes el loop del curso en una mini-pieza terminada.'],
                    ['n' => '★',  'titulo' => 'Proyecto final',                            'texto' => 'Mini-pieza de 60–90 segundos usando todo lo anterior: pistas, clips, Polymer o Sampler propio, al menos un patch de Grid, Note Operators, moduladores y automatizaciones.'],
                ];
                foreach ($bloques as $b) : ?>
                    <article class="group rounded-2xl border border-slate-200 bg-slate-50 dark:border-white/10 dark:bg-slate-950/50 p-7 sm:p-8 hover:border-emerald-400/60 dark:hover:border-emerald-400/40 hover:-translate-y-1 hover:shadow-lg dark:hover:shadow-none transition-all duration-300">
                        <div class="flex items-start justify-between mb-4">
                            <span class="font-mono text-xs text-primary dark:text-primary tracking-widest">BLOQUE <?php echo esc_html($b['n']); ?></span>
                            <span class="h-2 w-2 rounded-full bg-emerald-400/80 group-hover:bg-emerald-500 dark:bg-emerald-400/60 dark:group-hover:bg-emerald-300 transition-colors"></span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2"><?php echo esc_html($b['titulo']); ?></h3>
                        <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed"><?php echo esc_html($b['texto']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 5. QUÉ INCLUYE EL EARLY ACCESS -->
    <section class="py-20">
        <div class="max-w-5xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto space-y-3 mb-14">
                <p class="text-xs uppercase tracking-[0.18em] font-semibold text-primary dark:text-primary">Incluido</p>
                <h2 class="text-slate-900 dark:text-white">Qué recibes al entrar ahora</h2>
            </div>

            <div class="rounded-3xl border border-slate-200 bg-white dark:border-white/10 dark:bg-gradient-to-br dark:from-slate-900 dark:to-slate-950 p-8 sm:p-10 shadow-md dark:shadow-none">
                <ul class="grid sm:grid-cols-2 gap-x-8 gap-y-4 text-slate-700 dark:text-slate-200">
                    <?php
                    $incluye = [
                        'Acceso al curso <strong>Bitwig desde dentro</strong> conforme se publiquen los bloques.',
                        'Todas las actualizaciones de la primera edición incluidas.',
                        'Precio fundador antes de que suba al precio final.',
                        '<strong>Plantilla Bitwig Starter de Animatek</strong> (Bloque 0–2 ya configurados).',
                        'Pack de presets <strong>Polymer Starter</strong> y <strong>Grid Starter</strong> conforme se publiquen los bloques 4 y 7/9.',
                        '<strong>Mini-kit Sampler</strong> para el bloque 8.',
                        'Posibilidad de enviar dudas para priorizar lecciones.',
                        'Acceso a ejemplos / proyectos descargables cuando estén disponibles.',
                    ];
                    foreach ($incluye as $i) : ?>
                        <li class="flex gap-3 text-[15px] leading-relaxed">
                            <span class="flex-shrink-0 inline-flex h-6 w-6 items-center justify-center rounded-full bg-emerald-100 text-emerald-600 dark:bg-emerald-400/15 dark:text-emerald-300 mt-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.704 5.29a1 1 0 010 1.42l-7.5 7.5a1 1 0 01-1.42 0l-3.5-3.5a1 1 0 111.42-1.42L8.5 12.08l6.79-6.79a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            </span>
                            <span><?php echo wp_kses($i, ['strong' => []]); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <p class="mt-8 pt-6 border-t border-slate-200 dark:border-white/10 text-sm text-slate-500 dark:text-slate-400 leading-relaxed">
                    El curso está en construcción. No compras una biblioteca cerrada, compras acceso anticipado a una formación que irá creciendo bloque a bloque.
                </p>
            </div>
        </div>
    </section>

    <!-- 6. POR QUÉ APRENDER CONMIGO -->
    <section class="py-20 bg-white border-y border-slate-200 dark:bg-slate-900/60 dark:border-white/5">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <p class="text-xs uppercase tracking-[0.18em] font-semibold text-primary dark:text-primary mb-3">Sobre mí</p>
            <h2 class="text-slate-900 dark:text-white mb-6">Bitwig explicado desde la música, no desde el manual</h2>
            <div class="space-y-5 text-slate-600 dark:text-slate-300 text-lg leading-relaxed">
                <p>
                    Soy Javi Melgar / Animatek. Llevo más de 25 años haciendo música electrónica y soy <a href="https://www.bitwig.com/" target="_blank" rel="noopener" class="text-primary hover:text-primary/80 font-bold underline-offset-4 hover:underline">Bitwig Certified Trainer</a>. También desarrollo módulos para VCV Rack y trabajo desde una mentalidad modular: entender la señal, construir desde dentro y crear tus propias herramientas.
                </p>
                <p>
                    Este curso no va de memorizar todos los botones. Va de entender cómo piensa Bitwig para que puedas producir con más claridad.
                </p>
            </div>
        </div>
    </section>

    <!-- 7. CTA PREVENTA / PRECIO -->
    <section id="comprar" class="py-20">
        <div class="max-w-4xl mx-auto px-6">
            <div class="text-center space-y-3 mb-14">
                <p class="text-xs uppercase tracking-[0.18em] font-semibold text-primary dark:text-primary">Preventa fundadora</p>
                <h2 class="text-slate-900 dark:text-white">Entra ahora como alumno fundador</h2>
            </div>

            <div class="rounded-3xl border border-emerald-300 bg-gradient-to-br from-emerald-50 via-white to-white dark:border-emerald-400/30 dark:from-emerald-500/10 dark:via-slate-900 dark:to-slate-950 p-8 sm:p-10 shadow-2xl shadow-emerald-500/10 dark:shadow-emerald-500/5">
                <div class="text-center mb-8">
                    <p class="text-xs uppercase tracking-[0.2em] text-emerald-600 dark:text-emerald-300 font-semibold mb-2">Precio Early Access</p>
                    <p class="text-6xl sm:text-7xl font-extrabold text-slate-900 dark:text-white">29€</p>
                </div>

                <div class="grid sm:grid-cols-3 gap-4 mb-8">
                    <div class="rounded-xl border border-emerald-400 bg-emerald-100/60 dark:border-emerald-400/40 dark:bg-emerald-400/5 p-4 text-center">
                        <p class="text-xs uppercase tracking-wider text-emerald-700 dark:text-emerald-300 font-semibold mb-1">Ahora</p>
                        <p class="text-2xl font-bold text-slate-900 dark:text-white">29€</p>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Early Access</p>
                    </div>
                    <div class="rounded-xl border border-slate-200 bg-slate-50 dark:border-white/10 dark:bg-white/5 p-4 text-center">
                        <p class="text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400 font-semibold mb-1">Lanzamiento</p>
                        <p class="text-2xl font-bold text-slate-700 dark:text-slate-200">39€</p>
                        <p class="text-xs text-slate-500 dark:text-slate-500 mt-1">~7 días</p>
                    </div>
                    <div class="rounded-xl border border-slate-200 bg-slate-50 dark:border-white/10 dark:bg-white/5 p-4 text-center">
                        <p class="text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400 font-semibold mb-1">Final</p>
                        <p class="text-2xl font-bold text-slate-700 dark:text-slate-200">50€</p>
                        <p class="text-xs text-slate-500 dark:text-slate-500 mt-1">Precio estable</p>
                    </div>
                </div>

                <p class="text-center text-slate-600 dark:text-slate-300 mb-8 max-w-2xl mx-auto leading-relaxed">
                    El Early Access está pensado para quienes quieren entrar desde el principio, pagar menos y acompañar el proceso mientras el curso se va construyendo.
                </p>

                <style>
                    .bitwig-buy-now :is(a, button, .sc-button, .surecart-button) {
                        display: inline-flex !important;
                        align-items: center !important;
                        justify-content: center !important;
                        gap: 0.5rem !important;
                        padding: 1rem 2rem !important;
                        font-weight: 700 !important;
                        border-radius: 0.75rem !important;
                        border: 1px solid #2C7FFF !important;
                        background-color: #2C7FFF !important;
                        color: #ffffff !important;
                        box-shadow: 0 12px 30px -18px rgba(44, 127, 255, 0.6) !important;
                        text-decoration: none !important;
                    }

                    .bitwig-buy-now :is(a, button, .sc-button, .surecart-button):hover {
                        background-color: #1c63d9 !important;
                        border-color: #1c63d9 !important;
                    }
                </style>
                <div class="bitwig-buy-now flex justify-center">
                    <?php echo do_shortcode('[sc_buy_button class="btn-primary"]Comprar curso en Early Access 29€ [sc_line_item price_id=' . esc_attr($bitwig_price_id) . ' quantity=1][/sc_buy_button]'); ?>
                </div>

                <p class="text-center text-xs text-slate-500 dark:text-slate-400 mt-6">
                    El curso está en producción. Recibirás las lecciones conforme se publiquen y todas las actualizaciones de la primera edición estarán incluidas.
                </p>
            </div>
        </div>
    </section>

    <!-- 8. CTA LISTA DE CORREO -->
    <section id="lista-interesados" class="py-20 bg-white border-y border-slate-200 dark:bg-slate-900/60 dark:border-white/5">
        <div class="max-w-2xl mx-auto px-6">
            <div class="text-center space-y-3 mb-14">
                <p class="text-xs uppercase tracking-[0.18em] font-semibold text-primary dark:text-primary">Lista de interesados</p>
                <h2 class="text-slate-900 dark:text-white">¿Prefieres esperar un poco?</h2>
                <p class="text-slate-600 dark:text-slate-300">
                    Apúntate a la lista de interesados y te aviso cuando haya nuevos bloques, demos gratuitas y fecha de lanzamiento.
                </p>
            </div>

            <!-- Begin Brevo Form -->
            <style>
                @font-face {
                    font-display: block;
                    font-family: Roboto;
                    src: url(https://assets.brevo.com/font/Roboto/Latin/normal/normal/7529907e9eaf8ebb5220c5f9850e3811.woff2) format("woff2"), url(https://assets.brevo.com/font/Roboto/Latin/normal/normal/25c678feafdc175a70922a116c9be3e7.woff) format("woff");
                }

                @font-face {
                    font-display: fallback;
                    font-family: Roboto;
                    font-weight: 600;
                    src: url(https://assets.brevo.com/font/Roboto/Latin/medium/normal/6e9caeeafb1f3491be3e32744bc30440.woff2) format("woff2"), url(https://assets.brevo.com/font/Roboto/Latin/medium/normal/71501f0d8d5aa95960f6475d5487d4c2.woff) format("woff");
                }

                @font-face {
                    font-display: fallback;
                    font-family: Roboto;
                    font-weight: 700;
                    src: url(https://assets.brevo.com/font/Roboto/Latin/bold/normal/3ef7cf158f310cf752d5ad08cd0e7e60.woff2) format("woff2"), url(https://assets.brevo.com/font/Roboto/Latin/bold/normal/ece3a1d82f18b60bcce0211725c476aa.woff) format("woff");
                }

                #sib-container input:-ms-input-placeholder {
                    text-align: left;
                    font-family: Helvetica, sans-serif;
                    color: #c0ccda;
                }

                #sib-container input::placeholder {
                    text-align: left;
                    font-family: Helvetica, sans-serif;
                    color: #c0ccda;
                }

                #sib-container a {
                    text-decoration: underline;
                    color: #2BB2FC;
                }

                .sib-form-message-panel {
                    display: none;
                }

                .bitwig-interest-form .sib-form {
                    border-radius: 1rem;
                }

                .bitwig-interest-form #sib-container {
                    max-width: 100% !important;
                }

                .dark .bitwig-interest-form .sib-form,
                [data-theme="dark"] .bitwig-interest-form .sib-form {
                    background-color: transparent !important;
                }

                .dark .bitwig-interest-form #sib-container,
                [data-theme="dark"] .bitwig-interest-form #sib-container {
                    background-color: rgba(15, 23, 42, 0.72) !important;
                    border-color: rgba(255, 255, 255, 0.12) !important;
                    color: #e2e8f0 !important;
                }

                .dark .bitwig-interest-form #sib-container .entry__label,
                .dark .bitwig-interest-form #sib-container .entry__specification,
                .dark .bitwig-interest-form #sib-container .form__label-row,
                [data-theme="dark"] .bitwig-interest-form #sib-container .entry__label,
                [data-theme="dark"] .bitwig-interest-form #sib-container .entry__specification,
                [data-theme="dark"] .bitwig-interest-form #sib-container .form__label-row {
                    color: #e2e8f0 !important;
                }

                .dark .bitwig-interest-form #sib-container .entry__field,
                [data-theme="dark"] .bitwig-interest-form #sib-container .entry__field {
                    background-color: rgba(2, 6, 23, 0.55) !important;
                    border-color: rgba(148, 163, 184, 0.35) !important;
                }

                .dark .bitwig-interest-form #sib-container input,
                [data-theme="dark"] .bitwig-interest-form #sib-container input {
                    background-color: transparent !important;
                    color: #f8fafc !important;
                }

                .dark .bitwig-interest-form #sib-container input::placeholder,
                [data-theme="dark"] .bitwig-interest-form #sib-container input::placeholder {
                    color: #94a3b8 !important;
                }
            </style>
            <link rel="stylesheet" href="https://sibforms.com/forms/end-form/build/sib-styles.css">

            <div class="bitwig-interest-form">
            <div class="sib-form" style="text-align: center; background-color: #EFF2F7;">
                <div id="sib-form-container" class="sib-form-container">
                    <div id="error-message" class="sib-form-message-panel" style="font-size:16px; text-align:left; font-family:Helvetica, sans-serif; color:#661d1d; background-color:#ffeded; border-radius:3px; border-color:#ff4949;max-width:540px;">
                        <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
                            <span class="sib-form-message-panel__inner-text">No hemos podido validar su suscripción.</span>
                        </div>
                    </div>

                    <div id="success-message" class="sib-form-message-panel" style="font-size:16px; text-align:left; font-family:Helvetica, sans-serif; color:#085229; background-color:#e7faf0; border-radius:3px; border-color:#13ce66;max-width:540px;">
                        <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
                            <span class="sib-form-message-panel__inner-text">Se ha realizado su suscripción.</span>
                        </div>
                    </div>

                    <div id="sib-container" class="sib-container--large sib-container--vertical" style="text-align:center; background-color:rgba(255,255,255,1); max-width:540px; border-radius:3px; border-width:1px; border-color:#C0CCD9; border-style:solid;">
                        <form id="sib-form" method="POST" action="https://a2fe0a0a.sibforms.com/serve/MUIFAOTAu3dD3XV99X__NrZf0gPI98ZRU8rLYa3QKa89c6CXoInqc3veK76j9vosdVQeqTFu4oBT-mFrhe_AT_BS-l3e-xJV_5_emKFnc2qhqE5AHQH8B1cRDW7ZTyzcCFso2CL1SxiJI8IknkP39P9Y0L8zAPtFjXrdbJaYyckOWj9kzJ6Hu3xx8CWfSiIF0QuJkLXL-dmVwsLQ" data-type="subscription">
                            <div style="padding: 8px 0;">
                                <div class="sib-input sib-form-block">
                                    <div class="form__entry entry_block">
                                        <div class="form__label-row ">
                                            <label class="entry__label" style="font-weight: 700; text-align:left; font-size:16px; font-family:Helvetica, sans-serif; color:#3c4858;" for="EMAIL" data-required="*">Introduzca su dirección de e-mail para ver el contenido</label>

                                            <div class="entry__field">
                                                <input class="input " type="text" id="EMAIL" name="EMAIL" autocomplete="off" placeholder="EMAIL" data-required="true" required />
                                            </div>
                                        </div>

                                        <label class="entry__error entry__error--primary" style="font-size:16px; text-align:left; font-family:Helvetica, sans-serif; color:#661d1d; background-color:#ffeded; border-radius:3px; border-color:#ff4949;"></label>
                                        <label class="entry__specification" style="font-size:12px; text-align:left; font-family:Helvetica, sans-serif; color:#8390A4; text-align:left">
                                            Introduce tu dirección de e-mail para suscribirte. Ej.: abc@xyz.com
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div style="padding: 8px 0;">
                                <div class="sib-form-block" style="text-align: left">
                                    <button class="sib-form-block__button sib-form-block__button-with-loader" style="font-size:16px; text-align:left; font-weight:700; font-family:Helvetica, sans-serif; color:#FFFFFF; background-color:#3E4857; border-radius:3px; border-width:0px;" form="sib-form" type="submit">
                                        <svg class="icon clickable__icon progress-indicator__icon sib-hide-loader-icon" viewBox="0 0 512 512" style="">
                                            <path d="M460.116 373.846l-20.823-12.022c-5.541-3.199-7.54-10.159-4.663-15.874 30.137-59.886 28.343-131.652-5.386-189.946-33.641-58.394-94.896-95.833-161.827-99.676C261.028 55.961 256 50.751 256 44.352V20.309c0-6.904 5.808-12.337 12.703-11.982 83.556 4.306 160.163 50.864 202.11 123.677 42.063 72.696 44.079 162.316 6.031 236.832-3.14 6.148-10.75 8.461-16.728 5.01z" />
                                        </svg>
                                        SUSCRIBIRSE
                                    </button>
                                </div>
                            </div>
                            <input type="text" name="email_address_check" value="" class="input--hidden">
                            <input type="hidden" name="locale" value="es">
                            <input type="hidden" name="html_type" value="simple">
                        </form>
                    </div>
                </div>
            </div>
            </div>
            <script>
                window.REQUIRED_CODE_ERROR_MESSAGE = 'Elija un código de país';
                window.LOCALE = 'es';
                window.EMAIL_INVALID_MESSAGE = window.SMS_INVALID_MESSAGE = "La información que ha proporcionado no es válida. Compruebe el formato del campo e inténtelo de nuevo.";
                window.REQUIRED_ERROR_MESSAGE = "Este campo no puede quedarse vacío. ";
                window.GENERIC_INVALID_MESSAGE = "La información que ha proporcionado no es válida. Compruebe el formato del campo e inténtelo de nuevo.";
                window.translation = {
                    common: {
                        selectedList: '{quantity} lista seleccionada',
                        selectedLists: '{quantity} listas seleccionadas',
                        selectedOption: '{quantity} seleccionado',
                        selectedOptions: '{quantity} seleccionados',
                    }
                };
                var AUTOHIDE = Boolean(0);
            </script>
            <script defer src="https://sibforms.com/forms/end-form/build/main.js"></script>
            <!-- End Brevo Form -->
        </div>
    </section>

    <!-- 9. FAQ -->
    <section class="py-20">
        <div class="max-w-3xl mx-auto px-6">
            <div class="text-center mb-14">
                <p class="text-xs uppercase tracking-[0.18em] font-semibold text-primary dark:text-primary mb-3">FAQ</p>
                <h2 class="text-slate-900 dark:text-white">Preguntas frecuentes</h2>
            </div>

            <div class="space-y-3">
                <?php
                $faqs = [
                    ['¿El curso está terminado?', 'No. Está en producción. Por eso esta página es una preventa / Early Access con precio fundador reducido.'],
                    ['¿En qué orden voy a aprender?', 'El curso sigue una ruta de creación musical real: primero dejas Bitwig configurado (Bloque 0), entiendes la interfaz (1), creas pistas y clips (2–3), diseñas tus propios sonidos en Polymer (4), das vida a tus loops con Note Operators (5) y moduladores (6), entras en The Grid (7), exploras Sampler (8), profundizas en Grid (9) y cierras con automatizaciones y una mini-pieza propia (10 + proyecto final).'],
                    ['¿Por qué Polymer y los moduladores van antes de The Grid?', 'Para que cuando llegues a The Grid ya sepas qué es un oscilador, un filtro, una envolvente y una modulación. El salto al modular deja de ser traumático: solo cambia el formato visual, no los conceptos.'],
                    ['¿El precio va a subir?', 'Sí. Hay tres fases claras: Early Access fundador a 29€ mientras el curso está en producción, semana de lanzamiento a 39€ durante aproximadamente 7 días, y precio final a 50€. La subida no es una sorpresa: se avisa antes y está explicado en la página.'],
                    ['¿Por qué cuesta menos ahora?', 'Porque el curso todavía se está construyendo. Entras antes, pagas menos y recibes las actualizaciones conforme se publiquen.'],
                    ['¿Qué pasa si compro ahora?', 'Tendrás acceso al curso y recibirás las lecciones conforme se publiquen. Las actualizaciones de la primera edición estarán incluidas.'],
                    ['¿Cuándo estará completo?', 'La idea es publicarlo por bloques. El progreso se actualiza en esta página con la barra de avance.'],
                    ['¿Necesito saber Bitwig antes?', 'No. El curso empieza por Bloque 0 (configuración inicial) y Bloque 1 (mapa de la interfaz) antes de tocar nada musical.'],
                    ['¿Necesito saber síntesis modular?', 'No, aunque si vienes de VCV Rack te resultará familiar. Polymer prepara los conceptos antes y The Grid se explica desde cero.'],
                    ['¿Es solo para The Grid?', 'No. The Grid es una parte importante (dos bloques: entrada rápida y patches prácticos), pero antes trabajaremos toda la base de Bitwig: configuración, interfaz, pistas, clips, Polymer, Note Operators y moduladores.'],
                    ['¿Habrá proyectos descargables?', 'Sí: plantilla Bitwig Starter, presets Polymer Starter, presets Grid Starter, mini-kit Sampler y proyecto final de ejemplo, conforme avancen los bloques.'],
                    ['¿Puedo pedir temas o dudas?', 'Sí. Una ventaja del Early Access es que puedes enviar dudas para ayudar a priorizar lecciones.'],
                ];
                foreach ($faqs as $faq) : ?>
                    <details class="group rounded-2xl border border-slate-200 bg-white dark:border-white/10 dark:bg-slate-900/40 overflow-hidden open:border-emerald-400/50 open:bg-slate-50 dark:open:border-emerald-400/30 dark:open:bg-slate-900/70 transition-all">
                        <summary class="flex items-center justify-between p-5 sm:p-6 cursor-pointer list-none text-slate-900 dark:text-white font-semibold hover:text-emerald-600 dark:hover:text-emerald-300 transition-colors">
                            <span><?php echo esc_html($faq[0]); ?></span>
                            <span class="transform group-open:rotate-180 transition-transform duration-200 text-slate-400 flex-shrink-0 ml-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                            </span>
                        </summary>
                        <div class="px-5 sm:px-6 pb-6 text-slate-600 dark:text-slate-300 leading-relaxed border-t border-slate-200 dark:border-white/5 pt-4">
                            <p><?php echo esc_html($faq[1]); ?></p>
                        </div>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA FINAL -->
    <section class="py-20 bg-gradient-to-b from-white to-slate-50 dark:from-slate-900 dark:to-slate-950 border-t border-slate-200 dark:border-white/5">
        <div class="max-w-3xl mx-auto px-6 text-center space-y-6">
            <h2 class="text-slate-900 dark:text-white">¿Te apuntas a esta primera edición?</h2>
            <p class="text-slate-600 dark:text-slate-300 text-lg">
                Curso en producción. Early Access fundador. Precio reducido. Acceso por bloques. Progreso público.
            </p>
            <div class="grid sm:flex gap-3 sm:gap-4 justify-center pt-2">
                <a href="<?php echo esc_url($cta_compra); ?>" class="btn-primary">
                    Comprar Early Access — 29€
                </a>
                <a href="<?php echo esc_url($cta_lista); ?>" class="btn-secondary">
                    Apuntarme a la lista
                </a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
