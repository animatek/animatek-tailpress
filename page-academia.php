<?php
/**
 * Template Name: Academia
 */

get_header();

// ---------------------------------------------------------------------------
// Datos de los cursos. Para añadir o editar un curso, toca solo este array.
//
// Campos:
//   titulo / subtitulo   Nombre y frase corta (el subtítulo es opcional).
//   imagen / alt         Portada cuadrada (1600x1600). Se muestra entera, sin recortar.
//   texto                Descripción de la tarjeta. 2-3 líneas.
//   badge / badge_cls    Etiqueta sobre la portada (opcional).
//   meta                 Hasta 3 datos cortos: lecciones, duración, nivel.
//   precio               Número en euros, o null si el curso es gratis.
//   precio_antes         Precio normal cuando hay oferta. Al caducar la oferta pasa
//                        a ser el precio que se muestra: la subida es automática.
//   oferta_texto         Nombre de la oferta ("Precio fundador").
//   oferta_hasta         Último día de la oferta, 'Y-m-d'. Vacío = sin oferta.
//   destacado            true para resaltar el curso con borde de color.
//   url / cta            Destino y texto del botón.
//
// El orden del array es el orden en que se muestran: lo nuevo o lo importante, arriba.
// ---------------------------------------------------------------------------
$cursos = [
    [
        'titulo'       => 'Patch Lab 01',
        'subtitulo'    => '5 patches completos de VCV Rack, de cero a sonando',
        'imagen'       => 'https://animatek.net/wp-content/uploads/2026/08/04-patch-lab-01-portada-1600.webp',
        'alt'          => 'Patch Lab 01, curso de VCV Rack de Animatek',
        'texto'        => 'Cinco patches construidos delante de ti, cable a cable: una plantilla base de techno, un track completo, dos sistemas autogenerativos y un drone armónico. Incluye los archivos .vcv para abrirlos, romperlos y hacerlos tuyos.',
        'badge'        => 'Nuevo',
        'badge_cls'    => 'bg-primary text-white shadow',
        'meta'         => [ '6 lecciones', '2h 07 de vídeo', 'Intermedio' ],
        // 19 € es el precio, no una oferta: sin 'precio_antes' ni fecha, así no
        // sale tachado ni con cuenta atrás. Cuadra con SureCart, que es quien cobra.
        'precio'       => 19,
        'destacado'    => true,
        'url'          => 'https://animatek.net/patch-lab-01/',
        'cta'          => 'Ver el curso',
    ],
    [
        'titulo'    => 'Curso VCV Rack',
        'subtitulo' => 'Síntesis modular desde cero, con los módulos esenciales',
        'imagen'    => 'https://animatek.net/wp-content/uploads/2025/04/Curso_Cuadrada.webp',
        'alt'       => 'Curso VCV Rack desde cero',
        'texto'     => 'Fundamentos reales de síntesis con VCV Rack 2 usando solo los módulos esenciales. Construyes una voz sustractiva desde cero y entiendes voltajes, osciladores, filtros, VCA, envolventes, modulación, secuenciación y control por voltaje.',
        'badge'     => 'Más vendido',
        'badge_cls' => 'bg-amber-400 text-amber-950 shadow',
        'meta'      => [ '34 lecciones', 'Principiante', 'A tu ritmo' ],
        'precio'    => 29,
        'url'       => 'https://animatek.net/cursos/vcv-rack-desde-cero/',
        'cta'       => 'Empezar el curso',
    ],
    [
        'titulo'    => 'Curso UZZ',
        'subtitulo' => 'El secuenciador por pasos para improvisar',
        'imagen'    => 'https://animatek.net/wp-content/uploads/2025/11/UZZ_Curso.webp',
        'alt'       => 'Curso UZZ gratis',
        'texto'     => 'Curso gratuito para dominar UZZ, el secuenciador por pasos diseñado para improvisar y crear patrones complejos con rapidez. Aprendes todas sus funciones, salidas y posibilidades dentro de Bitwig, Ableton y VCV Rack.',
        'badge'     => 'Gratis',
        'badge_cls' => 'bg-green-400 text-green-950 shadow',
        'meta'      => [ '16 lecciones', 'Principiante', 'Sin tarjeta' ],
        'precio'    => null,
        'url'       => 'https://animatek.net/cursos/curso-uzz/',
        'cta'       => 'Empezar gratis',
    ],
];

// ---------------------------------------------------------------------------
// Resuelve precio y oferta de un curso según la fecha de hoy.
// Cuando la oferta caduca, el precio pasa solo a 'precio_antes'.
// ---------------------------------------------------------------------------
$resolver_precio = static function ( array $curso ) : array {
    $precio  = $curso['precio'] ?? null;
    $antes   = $curso['precio_antes'] ?? null;
    $hasta   = $curso['oferta_hasta'] ?? '';
    $vigente = $hasta && $antes && current_time( 'timestamp' ) <= strtotime( $hasta . ' 23:59:59' );

    if ( ! $vigente && $antes ) {
        $precio = $antes;
    }

    return [
        'gratis'  => null === $precio,
        'importe' => null === $precio ? 'Gratis' : $precio . '€',
        'antes'   => $vigente ? $antes . '€' : '',
        'oferta'  => $vigente ? ( $curso['oferta_texto'] ?? 'Oferta' ) : '',
        'hasta'   => $vigente ? date_i18n( 'j F', strtotime( $hasta ) ) : '',
        'vigente' => $vigente,
    ];
};

// Ahora mismo no hay ninguna oferta activa: los precios de arriba son los precios.
// El mecanismo de oferta ('precio_antes' + 'oferta_hasta') sigue disponible para
// cuando haga falta, y caduca solo.

// Ruta recomendada. Añade pasos según crezca el catálogo.
$ruta = [
    [
        'paso'  => '01',
        'nombre'=> 'Curso VCV Rack',
        'texto' => 'Los fundamentos: qué hace cada módulo y por qué. Empieza aquí si vienes de cero.',
        'url'   => 'https://animatek.net/cursos/vcv-rack-desde-cero/',
    ],
    [
        'paso'  => '02',
        'nombre'=> 'Patch Lab 01',
        'texto' => 'Ya sabes las piezas: ahora monta máquinas enteras. Cinco patches terminados.',
        'url'   => 'https://animatek.net/patch-lab-01/',
    ],
    [
        'paso'  => '03',
        'nombre'=> 'Mentoría 1:1',
        'texto' => 'Sesiones privadas para revisar tus proyectos y desatascar lo que se te resista.',
        'url'   => home_url( '/clases-privadas/' ),
    ],
];

// Chips de credibilidad del hero.
$hero_chips = [ 'Bitwig Certified Trainer', 'Acceso 24/7', 'Actualizaciones incluidas' ];

$icono_check = '<svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 shrink-0 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>';
?>

<main id="primary" class="bg-slate-50 text-slate-900 dark:bg-slate-950 dark:text-slate-100">

    <!-- 1. HERO COMPACTO -->
    <section class="relative overflow-hidden bg-slate-950">
        <div class="absolute inset-0 pointer-events-none opacity-40 hero-grid"></div>
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -left-24 -top-32 h-64 w-64 rounded-full bg-primary/15 blur-3xl"></div>
            <div class="absolute -right-16 -bottom-32 h-64 w-64 rounded-full bg-amber-300/15 blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-5xl px-6 sm:px-10 py-8 sm:py-12 text-center space-y-3 sm:space-y-4">
            <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-400">ANIMATEK · ACADEMIA</p>
            <h1 class="text-[28px] sm:text-4xl font-black leading-[1.1] tracking-tight text-white">
                Cursos de síntesis modular y producción
            </h1>
            <p class="mx-auto max-w-2xl text-[15px] sm:text-lg leading-relaxed text-slate-300">
                Online, a tu ritmo y con proyectos reales. Sin relleno: solo lo que de verdad usas para hacer música.
            </p>

            <div class="flex flex-wrap items-center justify-center gap-1.5 sm:gap-2 pt-1">
                <?php foreach ( $hero_chips as $chip ) : ?>
                    <span class="inline-flex items-center gap-1.5 rounded-full border border-white/10 bg-white/5 px-2.5 py-1 sm:px-3 sm:py-1.5 text-[11px] sm:text-xs font-semibold text-slate-200">
                        <?php echo $icono_check; // phpcs:ignore WordPress.Security.EscapeOutput ?>
                        <?php echo esc_html( $chip ); ?>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 2. CURSOS -->
    <section id="cursos" class="max-w-7xl mx-auto px-6 sm:px-10 py-8 sm:py-14 scroll-mt-24">
        <div class="mb-6 sm:mb-8 flex flex-wrap items-end justify-between gap-3">
            <div>
                <div class="flex flex-wrap items-center gap-3">
                    <h2 class="text-2xl sm:text-3xl font-black tracking-tight text-slate-900 dark:text-white">Cursos online</h2>
                    <span class="rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-semibold text-slate-500 dark:border-white/10 dark:bg-slate-900 dark:text-slate-400">
                        <?php echo esc_html( count( $cursos ) ); ?> disponibles
                    </span>
                </div>
                <p class="mt-1 text-sm leading-relaxed text-slate-600 dark:text-slate-400">Elige por dónde empezar. Acceso de por vida y actualizaciones incluidas.</p>
            </div>
        </div>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <?php
            foreach ( $cursos as $curso ) :
                $precio    = $resolver_precio( $curso );
                $destacado = ! empty( $curso['destacado'] );
                ?>
                <article class="group relative flex flex-col overflow-hidden rounded-2xl border bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-primary/10 dark:bg-slate-900 <?php echo $destacado ? 'border-primary/50 dark:border-primary/50' : 'border-slate-200 dark:border-white/10'; ?>">

                    <!-- Portada: cuadrada y sin recortes; el fondo desenfocado rellena los lados -->
                    <a href="<?php echo esc_url( $curso['url'] ); ?>" class="relative block aspect-[4/3] overflow-hidden bg-slate-950">
                        <img src="<?php echo esc_url( $curso['imagen'] ); ?>" alt="" aria-hidden="true" class="absolute inset-0 h-full w-full scale-125 object-cover opacity-40 blur-2xl" loading="lazy">
                        <img src="<?php echo esc_url( $curso['imagen'] ); ?>" alt="<?php echo esc_attr( $curso['alt'] ); ?>" class="relative mx-auto h-full w-auto max-w-full object-contain transition duration-500 group-hover:scale-105" loading="lazy">

                        <?php if ( ! empty( $curso['badge'] ) ) : ?>
                            <span class="absolute left-3 top-3 inline-flex items-center rounded-full px-3 py-1 text-[10px] font-bold uppercase tracking-wider <?php echo esc_attr( $curso['badge_cls'] ); ?>"><?php echo esc_html( $curso['badge'] ); ?></span>
                        <?php endif; ?>

                    </a>

                    <div class="flex flex-1 flex-col gap-3 p-5">
                        <div class="space-y-1">
                            <h3 class="text-xl font-extrabold leading-tight text-slate-900 dark:text-white">
                                <a href="<?php echo esc_url( $curso['url'] ); ?>" class="transition hover:text-primary"><?php echo esc_html( $curso['titulo'] ); ?></a>
                            </h3>
                            <?php if ( ! empty( $curso['subtitulo'] ) ) : ?>
                                <p class="text-sm font-semibold text-primary"><?php echo esc_html( $curso['subtitulo'] ); ?></p>
                            <?php endif; ?>
                        </div>

                        <p class="text-sm leading-relaxed text-slate-600 line-clamp-4 dark:text-slate-300"><?php echo esc_html( $curso['texto'] ); ?></p>

                        <div class="flex flex-wrap gap-x-4 gap-y-1.5 text-xs font-medium text-slate-500 dark:text-slate-400">
                            <?php foreach ( $curso['meta'] as $meta ) : ?>
                                <span class="inline-flex items-center gap-1.5">
                                    <?php echo $icono_check; // phpcs:ignore WordPress.Security.EscapeOutput ?>
                                    <?php echo esc_html( $meta ); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>

                        <div class="mt-auto border-t border-slate-100 pt-4 dark:border-white/5">
                            <?php if ( $precio['oferta'] ) : ?>
                                <p class="mb-1.5 text-[11px] font-bold uppercase tracking-wide text-amber-600 dark:text-amber-400">
                                    <?php echo esc_html( $precio['oferta'] ); ?> (<?php echo esc_html( $precio['hasta'] ); ?>)
                                </p>
                            <?php endif; ?>
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex items-baseline gap-2">
                                    <span class="text-2xl font-black <?php echo $precio['gratis'] ? 'text-emerald-600 dark:text-emerald-400' : 'text-slate-900 dark:text-white'; ?>">
                                        <?php echo esc_html( $precio['importe'] ); ?>
                                    </span>
                                    <?php if ( $precio['antes'] ) : ?>
                                        <span class="text-sm font-semibold text-slate-400 line-through dark:text-slate-500"><?php echo esc_html( $precio['antes'] ); ?></span>
                                    <?php endif; ?>
                                </div>
                                <a href="<?php echo esc_url( $curso['url'] ); ?>" class="btn-primary shrink-0 whitespace-nowrap px-5 text-sm">
                                    <?php echo esc_html( $curso['cta'] ); ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7 7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>

        </div>

        <!-- Cierre de la rejilla: banda fija, se mantenga el número de cursos que se mantenga -->
        <div class="mt-6 flex flex-col items-center justify-between gap-4 rounded-2xl border-2 border-dashed border-slate-300 bg-white/40 px-6 py-5 text-center sm:flex-row sm:text-left dark:border-white/10 dark:bg-white/[0.02]">
            <div class="flex items-center gap-4">
                <span class="hidden h-10 w-10 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary sm:inline-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14"/></svg>
                </span>
                <div>
                    <h3 class="text-base font-bold text-slate-900 dark:text-white">Más cursos en camino</h3>
                    <p class="mt-0.5 text-sm leading-relaxed text-slate-600 dark:text-slate-400">
                        La serie Patch Lab continúa y hay más cursos en producción. Entérate el primero desde el canal o desde Patreon.
                    </p>
                </div>
            </div>
            <div class="flex shrink-0 flex-wrap items-center justify-center gap-3">
                <a href="https://www.youtube.com/@animatek" target="_blank" rel="noopener noreferrer" class="text-sm font-bold text-primary hover:underline">YouTube</a>
                <span class="text-slate-300 dark:text-slate-600">·</span>
                <a href="https://www.patreon.com/c/animatek" target="_blank" rel="noopener noreferrer" class="text-sm font-bold text-primary hover:underline">Patreon</a>
            </div>
        </div>
    </section>

    <!-- 3. POR DÓNDE EMPEZAR -->
    <section class="max-w-7xl mx-auto px-6 sm:px-10 pb-14">
        <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm dark:border-white/10 dark:bg-slate-900">
            <div class="mb-6 text-center">
                <span class="inline-flex items-center gap-2 rounded-full border border-primary/20 bg-primary/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.12em] text-primary">Ruta recomendada</span>
                <h2 class="mt-3 text-2xl font-black tracking-tight text-slate-900 dark:text-white">¿Por dónde empiezo?</h2>
            </div>
            <ol class="grid gap-4 md:grid-cols-3">
                <?php foreach ( $ruta as $paso ) : ?>
                    <li class="relative flex flex-col gap-2 rounded-2xl border border-slate-200 bg-slate-50 p-5 transition hover:border-primary/40 dark:border-white/10 dark:bg-slate-950">
                        <span class="text-xs font-black tracking-[0.2em] text-primary"><?php echo esc_html( $paso['paso'] ); ?></span>
                        <a href="<?php echo esc_url( $paso['url'] ); ?>" class="text-lg font-extrabold text-slate-900 transition hover:text-primary dark:text-white">
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            <?php echo esc_html( $paso['nombre'] ); ?>
                        </a>
                        <p class="text-sm leading-relaxed text-slate-600 dark:text-slate-400"><?php echo esc_html( $paso['texto'] ); ?></p>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </section>

    <!-- 4. BITWIG CERTIFIED TRAINER -->
    <section class="max-w-6xl mx-auto px-6 sm:px-10 pb-16">
        <div class="flex flex-col lg:flex-row items-center gap-8 lg:gap-10 rounded-3xl border border-slate-200 bg-white p-8 shadow-sm dark:border-white/10 dark:bg-slate-900">
            <div class="w-full max-w-sm lg:max-w-xs rounded-xl overflow-hidden border border-slate-100 bg-slate-50 dark:border-white/10 dark:bg-slate-950">
                <img src="https://animatek.net/wp-content/uploads/2025/04/Certified-Trainer-Banner.webp" alt="Bitwig Studio Certified Trainer" class="w-full h-full object-contain" loading="lazy">
            </div>
            <div class="space-y-3 text-center lg:text-left">
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold uppercase tracking-[0.12em] border border-primary/20">Formación oficial</span>
                <h3 class="text-2xl font-bold text-slate-900 dark:text-white">Bitwig Studio Certified Trainer</h3>
                <p class="text-base text-slate-600 dark:text-slate-300 leading-relaxed">
                    Animatek es Certified Trainer de Bitwig Studio: la propia Bitwig GmbH me ha evaluado y reconocido oficialmente como formador autorizado. Para ti significa que aprendes el flujo de trabajo oficial de Bitwig, bien hecho desde el principio.
                </p>
            </div>
        </div>
    </section>

    <!-- 5. MENTORÍA 1:1 -->
    <section class="max-w-7xl mx-auto px-6 sm:px-10 pb-16">
        <div class="grid gap-10 lg:grid-cols-[1.1fr_0.9fr] items-center">
            <div class="space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold uppercase tracking-[0.12em] border border-primary/20">
                    Mentoría 1:1
                </div>
                <h3 class="text-3xl lg:text-4xl font-bold leading-tight text-slate-900 dark:text-white">Acompaña tu curso con sesiones privadas</h3>
                <p class="text-lg text-slate-700 dark:text-slate-300 leading-relaxed">
                    Combina el curso con mentoría para acelerar: revisión de proyectos, dudas técnicas y guía personalizada para que avances sin fricción.
                </p>
                <div class="grid sm:grid-cols-2 gap-3 text-sm text-slate-700 dark:text-slate-200">
                    <?php
                    $mentoria = [
                        'Clases por Zoom/Discord grabadas',
                        'Revisión en profundidad de tus proyectos',
                        'Resolución de dudas técnicas al momento',
                        'Diseño sonoro avanzado y flujo creativo',
                    ];
                    foreach ( $mentoria as $item ) : ?>
                        <div class="flex items-start gap-2 bg-white border border-slate-200 rounded-xl p-3 shadow-sm dark:bg-slate-900 dark:border-white/10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span><?php echo esc_html( $item ); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div>
                    <a href="<?php echo esc_url( home_url( '/clases-privadas' ) ); ?>" class="btn-primary">
                        Ver clases privadas
                    </a>
                </div>
            </div>
            <div class="relative">
                <img src="https://animatek.net/wp-content/uploads/2025/04/Clasesonline.webp" alt="Mentoría 1 a 1 Animatek" class="w-full rounded-3xl shadow-xl border border-slate-200 object-cover dark:border-white/10" loading="lazy">
            </div>
        </div>
    </section>

    <!-- 6. TESTIMONIOS -->
    <?php get_template_part( 'template-parts/block-testimonios' ); ?>

    <!-- 7. FAQ -->
    <section class="max-w-5xl mx-auto px-6 sm:px-10 pb-[2.25rem]">
        <div class="text-center mb-10">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold uppercase tracking-[0.1em] border border-primary/20">
                Preguntas frecuentes
            </div>
            <h2 class="mt-4 text-slate-900 dark:text-white">Resuelve tus dudas antes de empezar</h2>
        </div>

        <div class="space-y-4">
            <?php
            $faqs = [
                [
                    'q' => '¿Qué curso hago primero?',
                    'a' => 'Si empiezas de cero, el Curso VCV Rack: ahí están los fundamentos (osciladores, filtros, VCA, envolventes, 1V/oct). Si eso ya lo tienes y lo que te falta es terminar patches, ve directo a Patch Lab 01.',
                ],
                [
                    'q' => '¿Necesito conocimientos previos?',
                    'a' => 'Para el Curso VCV Rack y para UZZ no: empezamos desde cero. Patch Lab 01 es de nivel intermedio y da por sabidas las piezas básicas de síntesis.',
                ],
                [
                    'q' => '¿El software es gratuito?',
                    'a' => 'VCV Rack tiene versión gratuita y open source, y los cursos de VCV Rack funcionan con ella: no hace falta Rack Pro. Los módulos que se usan en Patch Lab 01 son todos gratuitos y están en la biblioteca oficial de VCV. Bitwig sí es un programa comercial y necesitas licencia.',
                ],
                [
                    'q' => '¿Cómo accedo a los cursos?',
                    'a' => 'Acceso online en tu panel, disponible 24/7 para aprender a tu ritmo, con las futuras actualizaciones incluidas.',
                ],
                [
                    'q' => '¿Tengo acceso para siempre?',
                    'a' => 'Sí. Una vez dentro, el curso es tuyo: entras cuando quieras, avanzas a tu ritmo e incluye las futuras actualizaciones del contenido.',
                ],
                [
                    'q' => '¿Qué pasa cuando termina un precio de lanzamiento?',
                    'a' => 'El precio sube a su valor normal en la fecha anunciada. Y si alguna vez recoloco un curso y su precio cambia, quien ya lo compró mantiene el acceso completo y todas las actualizaciones, sin pagar ni recuperar la diferencia.',
                ],
                [
                    'q' => '¿Puedo combinar curso y mentoría?',
                    'a' => 'Sí, es la forma más rápida de avanzar. Sigues el curso a tu ritmo y reservas sesiones 1:1 para revisar proyectos y resolver dudas concretas.',
                ],
            ];
            foreach ( $faqs as $faq ) : ?>
                <details class="group bg-white border border-slate-200 rounded-2xl open:border-primary transition-all duration-300 shadow-sm dark:bg-slate-900 dark:border-white/10 dark:open:border-primary">
                    <summary class="flex justify-between items-center p-6 cursor-pointer font-semibold text-lg text-slate-800 dark:text-slate-100 select-none">
                        <?php echo esc_html( $faq['q'] ); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="chevron w-5 h-5 text-slate-400 group-open:text-primary transition-transform duration-300 group-open:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6"/>
                        </svg>
                    </summary>
                    <div class="px-6 pb-6 pt-0 text-slate-600 dark:text-slate-300 leading-relaxed">
                        <?php echo esc_html( $faq['a'] ); ?>
                    </div>
                </details>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php
get_footer();
