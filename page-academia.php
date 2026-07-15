<?php
/**
 * Template Name: Academia
 */

get_header();

// ---------------------------------------------------------------------------
// Datos de los cursos. Para añadir o editar un curso, toca solo este array.
// ---------------------------------------------------------------------------
$cursos = [
    [
        'titulo'    => 'Curso VCV Rack',
        'imagen'    => 'https://animatek.net/wp-content/uploads/2025/04/Curso_Cuadrada.webp',
        'alt'       => 'Curso VCV Rack desde cero',
        'texto'     => 'Fundamentos reales de síntesis con VCV Rack 2 usando solo los módulos esenciales. Construyes una voz sustractiva desde cero y entiendes voltajes, osciladores, filtros, VCA, envolventes, modulación, secuenciación y control por voltaje.',
        'badge'     => 'Más vendido',
        'badge_cls' => 'bg-amber-400 text-amber-950 shadow',
        'meta'      => [ '34 lecciones', 'Principiante', 'A tu ritmo' ],
        'precio'    => '29€',
        'precio_cls'=> 'text-white',
        'precio_box'=> 'bg-primary',
        'url'       => 'https://animatek.net/cursos/vcv-rack-desde-cero/',
        'cta'       => 'Empezar el curso',
    ],
    [
        'titulo'    => 'Curso Bitwig Studio',
        'imagen'    => 'https://animatek.net/wp-content/uploads/2026/04/GRID_portada.webp',
        'alt'       => 'Curso Bitwig Studio Early Access',
        'texto'     => 'Aprende Bitwig desde la base: interfaz, pistas, clips, Polymer, Note Operators, moduladores, The Grid, Sampler y automatizaciones. Curso en producción pública: entras a precio fundador y recibes las lecciones conforme se publican.',
        'badge'     => 'Early Access',
        'badge_cls' => 'bg-emerald-400 text-emerald-950 shadow',
        'meta'      => [ 'En producción', 'Principiante–Intermedio', 'Precio fundador' ],
        'precio'    => '29€',
        'precio_cls'=> 'text-white',
        'precio_box'=> 'bg-primary',
        'url'       => home_url( '/curso-bitwig-studio/' ),
        'cta'       => 'Ver curso',
    ],
    [
        'titulo'    => 'Curso UZZ',
        'imagen'    => 'https://animatek.net/wp-content/uploads/2025/11/UZZ_Curso.webp',
        'alt'       => 'Curso UZZ gratis',
        'texto'     => 'Curso gratuito para dominar UZZ, el secuenciador por pasos diseñado para improvisar y crear patrones complejos con rapidez. Aprendes todas sus funciones, salidas y posibilidades dentro de Bitwig, Ableton y VCV Rack.',
        'badge'     => 'Gratis',
        'badge_cls' => 'bg-green-400 text-green-950 shadow',
        'meta'      => [ '16 lecciones', 'Principiante', 'Sin tarjeta' ],
        'precio'    => 'Gratis',
        'precio_cls'=> 'text-emerald-600 dark:text-emerald-400',
        'precio_box'=> '',
        'url'       => 'https://animatek.net/cursos/curso-uzz/',
        'cta'       => 'Empezar gratis',
    ],
];

// Chips de credibilidad del hero.
$hero_chips = [ 'Bitwig Certified Trainer', 'Acceso 24/7 a tu ritmo', 'Actualizaciones incluidas' ];
?>

<main id="primary" class="bg-slate-50 text-slate-900 dark:bg-slate-950 dark:text-slate-100">

    <!-- 1. HERO -->
    <section class="relative overflow-hidden bg-slate-950">
        <div class="absolute inset-0 pointer-events-none opacity-40 hero-grid"></div>
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -left-24 -top-24 h-80 w-80 rounded-full bg-primary/15 blur-3xl"></div>
            <div class="absolute right-0 top-1/3 h-72 w-72 rounded-full bg-amber-300/20 blur-3xl"></div>
            <div class="absolute -bottom-24 left-1/3 h-72 w-72 rounded-full bg-cyan-400/15 blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-5xl px-6 sm:px-10 py-16 sm:py-20 text-center space-y-6">
            <p class="text-xs font-bold uppercase tracking-widest text-slate-500 dark:text-slate-400">ANIMATEK · ACADEMIA</p>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black leading-[1.05] tracking-tight text-slate-900 dark:text-white">
                Aprende síntesis y producción con Animatek
            </h1>
            <p class="text-lg sm:text-xl text-slate-600 dark:text-slate-300 leading-relaxed max-w-3xl mx-auto">
                Aprende síntesis modular y producción en Bitwig paso a paso, con proyectos reales y acceso a tu ritmo. Sin relleno: solo lo que de verdad usas para hacer música.
            </p>

            <div class="flex flex-wrap items-center justify-center gap-2">
                <?php foreach ( $hero_chips as $chip ) : ?>
                    <span class="inline-flex items-center gap-1.5 rounded-full border border-slate-200 bg-white px-3 py-1.5 text-xs font-semibold text-slate-700 shadow-sm dark:border-white/10 dark:bg-white/5 dark:text-slate-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        <?php echo esc_html( $chip ); ?>
                    </span>
                <?php endforeach; ?>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 justify-center pt-2">
                <a href="#cursos" class="btn-primary w-full sm:w-auto">
                    Ver los cursos
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7 7 7-7 7"/></svg>
                </a>
                <a href="<?php echo esc_url( home_url( '/clases-privadas' ) ); ?>" class="btn-secondary w-full sm:w-auto">
                    Mentoría 1:1
                </a>
            </div>
        </div>
    </section>

    <!-- 2. CURSOS -->
    <section id="cursos" class="max-w-7xl mx-auto px-6 sm:px-10 py-16 scroll-mt-24">
        <div class="mb-10 text-center space-y-3">
            <h2 class="text-3xl sm:text-4xl font-black tracking-tight text-slate-900 dark:text-white">Cursos online</h2>
            <p class="max-w-2xl mx-auto text-base leading-relaxed text-slate-600 dark:text-slate-300">Elige por dónde empezar. Todos los cursos son online y los avanzas a tu ritmo.</p>
        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <?php foreach ( $cursos as $curso ) : ?>
                <article class="group relative flex flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg dark:border-white/10 dark:bg-slate-900">
                    <a href="<?php echo esc_url( $curso['url'] ); ?>" class="relative block h-44 overflow-hidden bg-slate-950">
                        <img src="<?php echo esc_url( $curso['imagen'] ); ?>" alt="<?php echo esc_attr( $curso['alt'] ); ?>" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy">
                        <span class="absolute left-3 top-3 inline-flex items-center rounded-full px-3 py-1 text-[10px] font-bold uppercase tracking-wider <?php echo esc_attr( $curso['badge_cls'] ); ?>"><?php echo esc_html( $curso['badge'] ); ?></span>
                    </a>
                    <div class="flex flex-1 flex-col gap-3 p-5">
                        <h3 class="text-xl font-extrabold text-slate-900 dark:text-white">
                            <a href="<?php echo esc_url( $curso['url'] ); ?>" class="transition hover:text-primary"><?php echo esc_html( $curso['titulo'] ); ?></a>
                        </h3>
                        <p class="text-sm leading-relaxed text-slate-600 dark:text-slate-300"><?php echo esc_html( $curso['texto'] ); ?></p>

                        <div class="flex flex-wrap gap-x-4 gap-y-1.5 text-xs font-medium text-slate-500 dark:text-slate-400">
                            <?php foreach ( $curso['meta'] as $meta ) : ?>
                                <span class="inline-flex items-center gap-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                    <?php echo esc_html( $meta ); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>

                        <div class="mt-auto flex items-center justify-between border-t border-slate-100 pt-4 dark:border-white/5">
                            <?php if ( $curso['precio_box'] ) : ?>
                                <span class="inline-flex items-center rounded-full <?php echo esc_attr( $curso['precio_box'] ); ?> px-3 py-1.5 text-lg font-bold <?php echo esc_attr( $curso['precio_cls'] ); ?> shadow-sm"><?php echo esc_html( $curso['precio'] ); ?></span>
                            <?php else : ?>
                                <span class="text-2xl font-bold <?php echo esc_attr( $curso['precio_cls'] ); ?>"><?php echo esc_html( $curso['precio'] ); ?></span>
                            <?php endif; ?>
                            <a href="<?php echo esc_url( $curso['url'] ); ?>" class="btn-primary text-sm">
                                <?php echo esc_html( $curso['cta'] ); ?>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7 7 7-7 7"/></svg>
                            </a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- 3. BITWIG CERTIFIED TRAINER -->
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

    <!-- 4. MENTORÍA 1:1 -->
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

    <!-- 5. TESTIMONIOS -->
    <?php get_template_part( 'template-parts/block-testimonios' ); ?>

    <!-- 6. FAQ -->
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
                    'q' => '¿Necesito conocimientos previos?',
                    'a' => 'Para VCV Rack empezamos desde cero; para UZZ ayuda conocer tu DAW (Ableton/Bitwig). Todo está explicado paso a paso.',
                ],
                [
                    'q' => '¿El software es gratuito?',
                    'a' => 'VCV Rack tiene versión gratuita y open source. Bitwig es un programa comercial y necesitas una licencia.',
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
