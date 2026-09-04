<?php
/**
 * Template Name: Taller VCV Rack — Sintetizador Modular
 */

get_header();

// Checkout directo de SureCart: el taller completo (dos sesiones) ya en el carrito.
$cta_url = 'https://animatek.net/pago/?line_items%5B0%5D%5Bprice_id%5D=a81cf267-0524-4ac7-a452-80fb79fd4657&line_items%5B0%5D%5Bquantity%5D=1';

// El aforo lo fijamos aquí: SureCart guarda cuántas quedan, no de cuántas se
// partía. Si cambias el aforo en SureCart, cámbialo también aquí.
$plazas_totales = 20;

// Las libres salen del stock real del producto en SureCart. El número de abajo
// solo se usa si el stock no se puede leer (plugin caído, producto sin control
// de stock o sin sincronizar todavía).
$producto_sc   = 'b4d1df75-6702-42e1-b0cd-e2e19e21cda2';
$stock         = function_exists('animatek_surecart_stock_disponible')
    ? animatek_surecart_stock_disponible($producto_sc)
    : null;
$plazas_libres = null !== $stock ? $stock : 20;

$plazas_libres = max(0, min($plazas_totales, (int) $plazas_libres));
$hay_plazas    = $plazas_libres > 0;
$vendidas      = $plazas_totales - $plazas_libres;
$pct_vendido   = $plazas_totales > 0 ? round(($vendidas / $plazas_totales) * 100) : 0;

// Mientras no se venda ninguna no anunciamos "quedan 20 de 20": diría que no se
// ha apuntado nadie. Hasta la primera venta, solo el aforo.
if (!$hay_plazas) {
    $plazas_texto = 'Plazas agotadas';
} elseif ($vendidas === 0) {
    $plazas_texto = 'Grupo de 20 personas';
} else {
    $plazas_texto = sprintf('Quedan %d de %d plazas', $plazas_libres, $plazas_totales);
}

$precio = '25 €';
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
                Taller online en directo &middot; primera edición
            </p>

            <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold tracking-tight mb-6 text-white leading-[1.1]">
                Monta tu primer sintetizador modular,<br class="hidden md:inline"> nota a nota y cable a cable
            </h1>

            <p class="text-lg md:text-xl text-slate-300 mb-9 max-w-2xl mx-auto leading-relaxed font-light">
                Dos sesiones por Zoom para construir en VCV Rack un sintetizador de tres osciladores
                desde un rack vacío, entender qué hace cada módulo y por qué, ponerle secuenciador y azar,
                y grabar cómo suena. Sin experiencia previa y sin gastar un euro en software.
            </p>

            <div class="flex flex-wrap items-center justify-center gap-3 mb-10 text-sm text-slate-300">
                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/5 border border-white/10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                        <path stroke-linecap="round" d="M16 2v4M8 2v4M3 10h18"/>
                    </svg>
                    Martes 27 y jueves 29 de octubre
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
                    <?php echo esc_html($plazas_texto); ?>
                </span>
            </div>

            <?php if ($hay_plazas): ?>
                <a href="<?php echo esc_url($cta_url); ?>"
                    class="inline-flex items-center justify-center px-8 py-4 bg-primary text-white text-base md:text-lg font-bold rounded-full hover:bg-blue-600 transition-colors shadow-lg">
                    Reservar mi plaza por <?php echo esc_html($precio); ?>
                </a>
                <p class="mt-4 text-sm text-slate-400">
                    Las dos sesiones incluidas. Pago único, sin suscripción.
                </p>
            <?php else: ?>
                <p class="inline-flex items-center justify-center px-8 py-4 bg-white/10 border border-white/20 text-white text-base font-bold rounded-full">
                    Las 20 plazas están cubiertas
                </p>
                <p class="mt-4 text-sm text-slate-400">
                    Habrá más ediciones. Escríbeme y te aviso de la siguiente.
                </p>
            <?php endif; ?>
        </div>
    </section>

    <!-- SECCIÓN 2 · LA CADENA QUE CONSTRUYES -->
    <section class="max-w-6xl mx-auto px-6 py-16 lg:py-24">
        <div class="max-w-2xl mb-12">
            <h2 class="mb-4">Esto es lo que sales construyendo</h2>
            <p class="text-lg text-slate-600 leading-relaxed">
                Un sintetizador no es una caja con botones: es una cadena de módulos por la que pasa una señal.
                La montamos entera, de izquierda a derecha, entendiendo qué hace cada eslabón.
            </p>
        </div>

        <?php
        $cadena = [
            [
                'name'   => '3 osciladores',
                'role'   => 'Generan el sonido. Los afinamos entre sí para que suenen gordos, no desafinados.',
                'sesion' => 1,
            ],
            [
                'name'   => 'Mezclador',
                'role'   => 'Junta las tres voces y decide cuánto pesa cada una.',
                'sesion' => 1,
            ],
            [
                'name'   => 'Filtro',
                'role'   => 'Quita y deja pasar frecuencias. Es donde el sonido empieza a tener carácter.',
                'sesion' => 1,
            ],
            [
                'name'   => 'Envolvente',
                'role'   => 'Da forma en el tiempo: si el sonido pega o entra despacio.',
                'sesion' => 1,
            ],
            [
                'name'   => 'Secuenciador',
                'role'   => 'Le pone notas y ritmo para que el patch toque solo.',
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
                Al final de la segunda sesión grabamos el resultado, para escuchar de qué es capaz
                lo que has montado y quedarte con un audio tuyo, no con un ejercicio.
            </p>
        </div>
    </section>
    <!-- SECCIÓN 3 · TEMARIO -->
    <section class="max-w-5xl mx-auto px-6 pb-16 lg:pb-24">
        <div class="max-w-2xl mb-12">
            <h2 class="mb-4">Qué vamos a ver</h2>
            <p class="text-lg text-slate-600 leading-relaxed">
                No es solo montar un patch y despedirse. Cada bloque práctico va precedido del
                porqué: de dónde sale esto, qué viaja de verdad por un cable y por qué la
                síntesis sustractiva se hace así y no de otra manera.
            </p>
        </div>

        <?php
        $temario = [
            [
                'num'    => 'Sesión 1',
                'title'  => 'Construcción',
                'when'   => 'Martes 27 de octubre, 19:00–21:00',
                'bloques' => [
                    [
                        'min'  => '15 min',
                        'name' => 'De dónde viene todo esto',
                        'desc' => 'Moog y Buchla, las dos escuelas que siguen partiendo el mundo modular en dos. Por qué el Minimoog es en el fondo un patch congelado, y por qué eso importa para lo que vamos a montar.',
                    ],
                    [
                        'min'  => '15 min',
                        'name' => 'Qué viaja por un cable',
                        'desc' => 'La idea que hace que un modular sea un modular: audio, control y disparo son el mismo voltaje. Qué son CV, gate y trigger, y qué significa el estándar de un voltio por octava.',
                    ],
                    [
                        'min'  => '10 min',
                        'name' => 'Tipos de síntesis, y por qué la sustractiva',
                        'desc' => 'Aditiva, sustractiva, FM, wavetable, granular y modelado físico en un vistazo. Dónde encaja cada una y por qué empezamos quitando frecuencias en lugar de sumarlas.',
                    ],
                    [
                        'min'  => '50 min',
                        'name' => 'Montamos el sintetizador de tres osciladores',
                        'desc' => 'Del rack vacío al sonido: tres VCO afinados entre sí, mezcla, filtro con resonancia y envolvente al VCA. Aquí es donde se entiende qué hace cada mando al tocarlo.',
                    ],
                    [
                        'min'  => '10 min',
                        'name' => 'Guardar el patch y dejar tarea',
                        'desc' => 'Guardas tu trabajo y te llevas dos o tres cosas concretas que probar antes del jueves. De ahí salen las preguntas de la segunda sesión.',
                    ],
                ],
            ],
            [
                'num'    => 'Sesión 2',
                'title'  => 'Movimiento, azar y grabación',
                'when'   => 'Jueves 29 de octubre, 19:00–20:00',
                'bloques' => [
                    [
                        'min'  => '15 min',
                        'name' => 'Repaso de patches y dudas',
                        'desc' => 'Miramos lo que ha montado cada uno, desatascamos lo que se haya atragantado y comparamos soluciones distintas al mismo problema.',
                    ],
                    [
                        'min'  => '15 min',
                        'name' => 'Secuenciadores: que toque solo',
                        'desc' => 'Con SEQ 3: notas, ritmo, longitud de la secuencia y por qué el gate y el CV de nota van por caminos separados. El patch deja de necesitar tus manos.',
                    ],
                    [
                        'min'  => '15 min',
                        'name' => 'Sample and hold: azar con criterio',
                        'desc' => 'Ruido más sample and hold para generar voltajes aleatorios, y un cuantizador para que ese azar caiga en notas de una escala. La técnica de la que salen medio los patches generativos que has oído.',
                    ],
                    [
                        'min'  => '10 min',
                        'name' => 'Sequential switch: la misma secuencia, otra cosa',
                        'desc' => 'Repartir una señal entre varios destinos, o alternar entre varias fuentes, para que una secuencia corta deje de sonar repetitiva.',
                    ],
                    [
                        'min'  => '5 min',
                        'name' => 'Grabamos',
                        'desc' => 'Dejamos el patch sonando y grabamos, para escuchar de qué es capaz lo que has montado y quedarte con un audio tuyo.',
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
            Entre las dos sesiones pasan dos días a propósito: es cuando trasteas por tu cuenta y
            aparecen las preguntas de verdad. Todos los módulos que usamos vienen de serie con VCV
            Rack, que es gratis: no hay que comprar ni instalar nada aparte.
        </p>
    </section>

    <!-- SECCIÓN 4 · DETALLES Y PLAZAS -->
    <section class="max-w-6xl mx-auto px-6 pb-16 lg:pb-24">
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-6">
            <?php
            $detalles = [
                ['label' => 'Duración', 'value' => '3 horas en dos días'],
                ['label' => 'Fechas',   'value' => '27 y 29 de octubre'],
                ['label' => 'Dónde',    'value' => 'Zoom, en directo'],
                ['label' => 'Precio',   'value' => $precio],
            ];
            foreach ($detalles as $d): ?>
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
                    <p class="text-xs font-semibold text-slate-500 mb-1"><?php echo esc_html($d['label']); ?></p>
                    <p class="text-base font-bold text-slate-900"><?php echo esc_html($d['value']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
            <div class="flex flex-wrap items-baseline justify-between gap-2 mb-3">
                <p class="font-bold text-slate-900"><?php echo esc_html($plazas_texto); ?></p>
                <p class="text-sm text-slate-600">
                    <?php echo $hay_plazas
                        ? 'El grupo es pequeño para que dé tiempo a mirar el patch de cada uno.'
                        : 'Esta edición está completa.'; ?>
                </p>
            </div>
            <div class="h-2 w-full rounded-full bg-slate-100 overflow-hidden">
                <div class="h-full rounded-full bg-primary" style="width: <?php echo esc_attr(max(4, $pct_vendido)); ?>%"></div>
            </div>
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
                        'Músicos y curiosos que quieren entender la síntesis modular por dentro.',
                        'No hace falta experiencia previa ni haber abierto VCV Rack nunca.',
                        'Te vale cualquier ordenador: VCV Rack es gratis y funciona en Windows, Mac y Linux.',
                        'Si ya montas patches con soltura, este taller se te va a quedar corto.',
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
                        'Tu patch de sintetizador de tres osciladores, guardado y tuyo.',
                        'Una grabación de cómo suena, hecha en la segunda sesión.',
                        'Los fundamentos de la síntesis sustractiva: onda, filtro, envolvente y secuencia.',
                        'Técnicas que se reutilizan siempre: sample and hold cuantizado y sequential switch.',
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
            // TODO (decidir antes de publicar): si se graban las sesiones y qué pasa
            // si alguien no puede asistir a una de las dos. Van aquí en cuanto lo tengas.
            $faq = [
                [
                    'q' => '¿Necesito saber de síntesis para venir?',
                    'a' => 'No. Empezamos por un rack vacío y se explica cada módulo al ponerlo. Si nunca has tocado un sintetizador, este es justo el sitio.',
                ],
                [
                    'q' => '¿Tengo que comprar algo?',
                    'a' => 'Solo el taller. VCV Rack es gratuito y todos los módulos que usamos vienen en el paquete Fundamental que trae de serie, secuenciador y sample and hold incluidos. Necesitas un ordenador, auriculares o altavoces, y conexión para el Zoom.',
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
            <h2 class="text-white mb-4">Nos vemos el martes 27</h2>
            <p class="text-slate-300 text-lg mb-8 max-w-xl mx-auto leading-relaxed">
                Es la primera vez que hago este formato y el grupo es de veinte personas.
                Si sale bien, habrá más ediciones; esta es la que puedes coger.
            </p>
            <?php if ($hay_plazas): ?>
                <a href="<?php echo esc_url($cta_url); ?>"
                    class="inline-flex items-center justify-center px-8 py-4 bg-primary text-white text-base md:text-lg font-bold rounded-full hover:bg-blue-600 transition-colors shadow-lg">
                    Reservar mi plaza por <?php echo esc_html($precio); ?>
                </a>
                <p class="mt-4 text-sm text-slate-400"><?php echo esc_html($plazas_texto); ?></p>
            <?php else: ?>
                <p class="inline-flex items-center justify-center px-8 py-4 bg-white/10 border border-white/20 text-white text-base font-bold rounded-full">
                    Plazas agotadas
                </p>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
