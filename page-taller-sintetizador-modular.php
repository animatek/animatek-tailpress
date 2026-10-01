<?php
/**
 * Template Name: Taller online — Bitwig
 *
 * Hasta el 2026-10-01 era el taller de VCV Rack del 27 y 29 de octubre (25 €,
 * checkout directo de SureCart). Nadie se había apuntado, y se aplazó a
 * noviembre cambiando de tema: Bitwig es el eje del canal, y el taller va de la
 * mano del curso de Bitwig (page-curso-bitwig-studio.php), del que es una
 * muestra en directo. Quien tenga o compre el curso lo tendrá más barato o
 * incluido; la fórmula exacta se decide al abrir plazas. Mientras no haya horario cerrado la página **no vende**:
 * recoge interesados en la lista de Bitwig de Brevo y se les avisa desde ahí.
 *
 * El slug se queda (taller-sintetizador-modular): lo enlazan quince vídeos.
 * Cuando haya fechas, se vuelve a poner el botón de compra con su price_id de
 * SureCart y el control de plazas (ver el historial de este archivo).
 */

get_header();

$fecha_corta = 'Noviembre, desde el sábado 15';
?>

<main id="primary" class="bg-slate-200 text-slate-900">

    <!-- SECCIÓN 1 · HERO -->
    <section class="relative pt-16 pb-14 lg:pt-24 lg:pb-20 overflow-hidden bg-slate-900 text-slate-50">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-cover bg-center"
                style="background-image: url('https://animatek.net/wp-content/uploads/2022/04/Taller_Online.jpg');"></div>
            <div class="absolute inset-0 bg-gradient-to-br from-slate-950/95 via-slate-900/92 to-slate-900/85"></div>
        </div>

        <div class="relative z-10 container mx-auto px-6 max-w-4xl text-center">

            <p class="text-sm font-semibold text-primary mb-5">
                Taller online en directo &middot; lista de espera
            </p>

            <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold tracking-tight mb-6 text-white leading-[1.1]">
                Bitwig desde dentro:<br class="hidden md:inline"> de un proyecto vacío a un loop que respira
            </h1>

            <p class="text-lg md:text-xl text-slate-300 mb-9 max-w-2xl mx-auto leading-relaxed font-light">
                Dos sesiones por Zoom para dejar de perderte entre menús y clips: montamos un loop
                propio con tus sonidos, lo hacemos respirar con modulación y lo grabamos. Es lo que
                enseño en el curso de Bitwig, en directo y con tiempo para tus dudas.
            </p>

            <div class="flex flex-wrap items-center justify-center gap-3 mb-10 text-sm text-slate-300">
                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/5 border border-white/10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                        <path stroke-linecap="round" d="M16 2v4M8 2v4M3 10h18"/>
                    </svg>
                    <?php echo esc_html($fecha_corta); ?>
                </span>
                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/5 border border-white/10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                    </svg>
                    En directo por Zoom
                </span>
                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/5 border border-white/10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-1.13a4 4 0 10-4-4 4 4 0 004 4z"/>
                    </svg>
                    20 personas como mucho
                </span>
            </div>

            <a href="#lista-de-espera"
                class="inline-flex items-center justify-center px-8 py-4 bg-primary text-white text-base md:text-lg font-bold rounded-full hover:bg-blue-600 transition-colors shadow-lg">
                Apuntarme a la lista de espera
            </a>
            <p class="mt-4 text-sm text-slate-400">
                Todavía no se puede reservar: te aviso cuando haya horario y precio cerrados.
            </p>
        </div>
    </section>

    <!-- SECCIÓN 2 · LA CADENA QUE CONSTRUYES -->
    <section class="max-w-6xl mx-auto px-6 py-16 lg:py-24">
        <div class="max-w-2xl mb-12">
            <h2 class="mb-4">Esto es lo que sales construyendo</h2>
            <p class="text-lg text-slate-600 leading-relaxed">
                Un loop en Bitwig no es solo meter clips: es saber dónde vive cada sonido y qué lo mueve.
                Lo montamos entero, de izquierda a derecha, y luego le damos vida.
            </p>
        </div>

        <?php
        $cadena = [
            [
                'name'   => 'Proyecto y pistas',
                'role'   => 'Bitwig configurado de forma sana y un mapa claro: Arranger, Launcher, Browser y dónde va cada cosa.',
                'sesion' => 1,
            ],
            [
                'name'   => 'Clips',
                'role'   => 'Tu primer loop con clips MIDI y de audio, y cuándo usar el Launcher y cuándo el Arranger.',
                'sesion' => 1,
            ],
            [
                'name'   => 'Polymer',
                'role'   => 'El sinte de Bitwig como puerta a la síntesis: un bajo y un lead tuyos, no presets.',
                'sesion' => 1,
            ],
            [
                'name'   => 'Note Operators',
                'role'   => 'Probabilidad, repeticiones y velocidad para que el loop deje de sonar pegado.',
                'sesion' => 2,
            ],
            [
                'name'   => 'Moduladores',
                'role'   => 'LFO, Random, Steps: modular en vez de automatizar, y un primer vistazo a The Grid.',
                'sesion' => 2,
            ],
        ];
        ?>

        <div class="bg-white border border-slate-200 rounded-2xl p-6 md:p-8 shadow-sm">
            <ol class="flex flex-col md:flex-row md:items-stretch gap-0 md:gap-0">
                <?php foreach ($cadena as $i => $m): ?>
                    <?php if ($i > 0): ?>
                        <!-- cable -->
                        <li class="flex md:flex-col items-center justify-center px-4 md:px-2 py-2 md:py-0 shrink-0" aria-hidden="true">
                            <span class="block w-px h-6 md:w-8 md:h-px bg-primary/40"></span>
                        </li>
                    <?php endif; ?>
                    <li class="flex-1 min-w-0 rounded-xl border <?php echo $m['sesion'] === 2 ? 'border-primary bg-blue-50' : 'border-slate-200 bg-slate-50'; ?> p-4">
                        <p class="font-bold text-slate-900 mb-1 leading-snug"><?php echo esc_html($m['name']); ?></p>
                        <?php if ($m['sesion'] === 2): ?>
                            <p class="text-xs font-semibold text-blue-600 mb-2">Lo añadimos en la sesión 2</p>
                        <?php endif; ?>
                        <p class="text-sm text-slate-600 leading-relaxed"><?php echo esc_html($m['role']); ?></p>
                    </li>
                <?php endforeach; ?>
            </ol>

            <p class="mt-6 pt-6 border-t border-slate-200 text-sm text-slate-600 leading-relaxed">
                Al final de la segunda sesión lo exportamos, para quedarte con un audio tuyo y un
                proyecto que puedes seguir abriendo, no con un ejercicio.
            </p>
        </div>
    </section>
    <!-- SECCIÓN 3 · TEMARIO -->
    <section class="max-w-5xl mx-auto px-6 pb-16 lg:pb-24">
        <div class="max-w-2xl mb-12">
            <h2 class="mb-4">Qué vamos a ver</h2>
            <p class="text-lg text-slate-600 leading-relaxed">
                No es un tour por los menús. Cada bloque práctico va precedido del porqué: dónde vive el
                sonido en un proyecto de Bitwig y por qué modular es distinto de automatizar. El orden
                puede moverse un poco cuando cierre el horario.
            </p>
        </div>

        <?php
        $temario = [
            [
                'num'    => 'Sesión 1',
                'title'  => 'Tu loop, con tus sonidos',
                'when'   => 'Sábado 15 de noviembre · hora por confirmar',
                'bloques' => [
                    [
                        'min'  => '15 min',
                        'name' => 'Bitwig sin perderse',
                        'desc' => 'El mapa de la interfaz y una configuración sana: dónde guarda cada cosa, audio, latencia y una plantilla de inicio que te ahorra pasos cada vez.',
                    ],
                    [
                        'min'  => '25 min',
                        'name' => 'Pistas, Browser y clips',
                        'desc' => 'Tipos de pista, cadenas de dispositivos y tu primer loop con clips. Launcher o Arranger: para qué sirve cada uno, sin pelearse con ellos.',
                    ],
                    [
                        'min'  => '40 min',
                        'name' => 'Polymer: tus propios sonidos',
                        'desc' => 'Oscilador, filtro y envolvente en el sinte nativo de Bitwig. Diseñamos un bajo y un lead para el loop, entendiendo qué hace cada mando.',
                    ],
                    [
                        'min'  => '10 min',
                        'name' => 'Guardar y dejar tarea',
                        'desc' => 'Guardas el proyecto y te llevas dos o tres cosas concretas que probar antes de la segunda sesión.',
                    ],
                ],
            ],
            [
                'num'    => 'Sesión 2',
                'title'  => 'Que respire, y exportarlo',
                'when'   => 'Fecha y hora por confirmar',
                'bloques' => [
                    [
                        'min'  => '15 min',
                        'name' => 'Repaso de proyectos y dudas',
                        'desc' => 'Miramos lo que ha montado cada uno, desatascamos lo que se haya atragantado y comparamos soluciones distintas al mismo problema.',
                    ],
                    [
                        'min'  => '15 min',
                        'name' => 'Note Operators',
                        'desc' => 'Probabilidad, recurrence y repeat: el mismo clip suena distinto cada vuelta sin que parezca un error.',
                    ],
                    [
                        'min'  => '20 min',
                        'name' => 'Moduladores',
                        'desc' => 'LFO, Random y Steps sobre cualquier parámetro. Por qué modular no es automatizar, y un primer vistazo a The Grid para ver hasta dónde llega esto.',
                    ],
                    [
                        'min'  => '10 min',
                        'name' => 'Exportamos',
                        'desc' => 'Dejamos el loop terminado y lo exportamos sin clipping, para quedarte con un audio tuyo.',
                    ],
                ],
            ],
        ];
        ?>

        <div class="grid md:grid-cols-2 gap-6">
            <?php foreach ($temario as $s): ?>
                <div class="bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
                    <p class="text-sm font-bold text-primary mb-2"><?php echo esc_html($s['num']); ?></p>
                    <h3 class="text-xl font-bold text-slate-900 mb-2"><?php echo esc_html($s['title']); ?></h3>
                    <p class="text-sm font-semibold text-slate-500 mb-6"><?php echo esc_html($s['when']); ?></p>

                    <ol class="space-y-5">
                        <?php foreach ($s['bloques'] as $b): ?>
                            <li class="border-l-2 border-slate-200 pl-4">
                                <div class="flex items-baseline gap-2 mb-1 flex-wrap">
                                    <span class="font-bold text-slate-900 leading-snug"><?php echo esc_html($b['name']); ?></span>
                                    <span class="text-xs font-semibold text-slate-500 shrink-0"><?php echo esc_html($b['min']); ?></span>
                                </div>
                                <p class="text-sm text-slate-600 leading-relaxed"><?php echo esc_html($b['desc']); ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                </div>
            <?php endforeach; ?>
        </div>

        <p class="mt-6 text-sm text-slate-600 leading-relaxed max-w-3xl">
            Entre las dos sesiones dejamos unos días a propósito: es cuando trasteas por tu cuenta y
            aparecen las preguntas de verdad. Todo lo que usamos viene de serie en Bitwig: no hay
            que comprar ni instalar ningún plugin aparte.
        </p>
    </section>

    <!-- SECCIÓN 4 · DETALLES -->
    <section class="max-w-6xl mx-auto px-6 pb-16 lg:pb-24">
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <?php
            $detalles = [
                ['label' => 'Formato', 'value' => 'Dos sesiones'],
                ['label' => 'Fechas',  'value' => 'Desde el 15 de noviembre'],
                ['label' => 'Dónde',   'value' => 'Zoom, en directo'],
                ['label' => 'Grupo',   'value' => '20 personas como mucho'],
            ];
            foreach ($detalles as $d): ?>
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
                    <p class="text-xs font-semibold text-slate-500 mb-1"><?php echo esc_html($d['label']); ?></p>
                    <p class="text-base font-bold text-slate-900"><?php echo esc_html($d['value']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- SECCIÓN 5 · PARA QUIÉN ES / QUÉ TE LLEVAS -->
    <section class="max-w-6xl mx-auto px-6 pb-16 lg:pb-24">
        <div class="grid md:grid-cols-2 gap-6">

            <div class="bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
                <h3 class="text-xl font-bold text-slate-900 mb-5">Para quién es</h3>
                <ul class="space-y-3 text-slate-700 text-sm">
                    <?php
                    $para_quien = [
                        'Gente que acaba de llegar a Bitwig, o que lo tiene y siempre acaba perdida entre menús.',
                        'Si vienes de Ableton u otro DAW: vas a reconocer muchas cosas y a ver qué hace distinto Bitwig.',
                        'No hace falta saber de síntesis: se explica cada mando al tocarlo.',
                        'Si ya produces en Bitwig con soltura, este taller se te va a quedar corto.',
                    ];
                    foreach ($para_quien as $item): ?>
                        <li class="flex items-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mt-0.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span><?php echo esc_html($item); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
                <h3 class="text-xl font-bold text-slate-900 mb-5">Qué te llevas</h3>
                <ul class="space-y-3 text-slate-700 text-sm">
                    <?php
                    $que_llevas = [
                        'Tu proyecto de Bitwig con un loop propio, guardado y tuyo, para seguir trabajándolo.',
                        'El audio exportado, hecho en la segunda sesión.',
                        'Un bajo y un lead diseñados por ti en Polymer, en vez de presets.',
                        'Lo que se reutiliza siempre: Note Operators y moduladores sobre cualquier parámetro.',
                        'Tus dudas resueltas en directo, con nombre y apellidos.',
                    ];
                    foreach ($que_llevas as $item): ?>
                        <li class="flex items-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mt-0.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span><?php echo esc_html($item); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>
    </section>

    <!-- SECCIÓN 6 · PREGUNTAS -->
    <section class="max-w-3xl mx-auto px-6 pb-16 lg:pb-24">
        <h2 class="mb-8">Preguntas</h2>

        <div class="space-y-4">
            <?php
            // TODO (antes de abrir la venta): precio, horario, si se graban las sesiones y
            // qué pasa si alguien no puede asistir a una. Van aquí en cuanto estén.
            $faq = [
                [
                    'q' => '¿Cuándo es exactamente y cuánto cuesta?',
                    'a' => 'Empieza el sábado 15 de noviembre; la hora y la segunda sesión las cierro estos días, igual que el precio. Si te apuntas a la lista de espera, te escribo en cuanto estén, antes de anunciarlo en ningún otro sitio.',
                ],
                [
                    'q' => '¿Tiene que ver con el curso de Bitwig?',
                    'a' => 'Sí: es una muestra en directo de lo que enseño en el curso «Bitwig desde dentro», que está ahora en producción. Si tienes el curso o lo compras, el taller te va a salir más barato; el detalle lo cuento cuando abra las plazas.',
                ],
                [
                    'q' => '¿Necesito saber algo antes?',
                    'a' => 'No. Empezamos por un proyecto vacío y se explica cada cosa al usarla. Si nunca has abierto Bitwig, este es justo el sitio.',
                ],
                [
                    'q' => '¿Qué necesito tener?',
                    'a' => 'Bitwig Studio instalado, un ordenador, auriculares o altavoces, y conexión para el Zoom. No hace falta ningún plugin aparte. Si tienes una edición reducida de Bitwig y no sabes si te vale, escríbeme y lo miramos.',
                ],
                [
                    'q' => '¿Es en directo o son vídeos?',
                    'a' => 'En directo, las dos sesiones, por Zoom. Puedes interrumpir y preguntar cuando quieras: de eso se trata.',
                ],
                [
                    'q' => '¿Cuánta gente vamos a ser?',
                    'a' => 'Veinte como mucho. El taller está pensado para que dé tiempo a mirar lo que ha hecho cada uno en la segunda sesión.',
                ],
            ];
            foreach ($faq as $item): ?>
                <details class="group bg-white rounded-2xl border border-slate-200 overflow-hidden">
                    <summary class="flex items-center justify-between gap-4 p-6 cursor-pointer list-none text-slate-900 font-bold hover:text-primary transition-colors">
                        <span><?php echo esc_html($item['q']); ?></span>
                        <span class="transform group-open:rotate-180 transition-transform duration-200 text-slate-400 shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </summary>
                    <div class="px-6 pb-6 text-slate-600 leading-relaxed border-t border-slate-100 pt-4">
                        <p><?php echo esc_html($item['a']); ?></p>
                    </div>
                </details>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- SECCIÓN 7 · CTA FINAL -->
    <section class="max-w-4xl mx-auto px-6 pb-24 lg:pb-32">
        <div class="bg-slate-900 rounded-[2rem] px-8 py-12 lg:px-16 lg:py-16 text-center">
            <h2 class="text-white mb-4">¿Te aviso cuando abra las plazas?</h2>
            <p class="text-slate-300 text-lg mb-8 max-w-xl mx-auto leading-relaxed">
                Es la primera vez que hago este formato y el grupo es de veinte personas.
                Déjame tu email y te escribo cuando tenga horario y precio. Sin compromiso:
                apuntarte no te reserva ni te cobra nada.
            </p>
            <div id="lista-de-espera" class="text-left">
                <?php get_template_part('template-parts/brevo-form-bitwig', null, [
                    'etiqueta' => 'Tu email para avisarte del taller',
                    'boton'    => 'AVÍSAME',
                ]); ?>
            </div>
            <p class="mt-4 text-sm text-slate-400">
                Entras en la lista de Bitwig de Animatek: solo te escribo de Bitwig, y te das de baja con un clic.
            </p>
        </div>
    </section>

</main>

<?php get_footer(); ?>
