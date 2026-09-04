<?php
/**
 * Template Name: Clases Privadas
 */

get_header();
?>

<main id="primary" class="bg-slate-200 text-slate-900">

    <!-- SECCIÓN 1 · HERO + CTA GRATUITO -->
    <section class="relative pt-8 pb-10 lg:pt-12 lg:pb-16 overflow-hidden bg-slate-900 text-slate-50 mb-0">
        <!-- Background Image & Overlay -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-cover bg-center"
                style="background-image: url('https://animatek.net/wp-content/uploads/2025/05/Bono_hora.webp');"></div>
            <div class="absolute inset-0 bg-gradient-to-br from-slate-950/90 via-slate-900/85 to-slate-800/80"></div>
            <div class="absolute top-0 right-0 -mr-32 -mt-32 w-[500px] h-[500px] bg-primary/20 rounded-full blur-[100px] mix-blend-overlay"></div>
            <div class="absolute bottom-0 left-0 -ml-32 -mb-32 w-[500px] h-[500px] bg-indigo-500/10 rounded-full blur-[100px] mix-blend-overlay"></div>
        </div>

        <div class="relative z-10 container mx-auto px-6 text-center max-w-5xl">
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold tracking-tight mb-6 text-white leading-tight">
                Clases y asesoramiento <span class="text-primary">personalizado</span>
            </h1>

            <p class="text-lg md:text-xl text-slate-300 mb-8 max-w-3xl mx-auto leading-relaxed font-light">
                Sesiones 1:1 online, adaptadas a tu proyecto. Feedback directo, plan personalizado y seguimiento real.
            </p>

            <div class="flex flex-col items-center gap-6">
                <a href="<?php echo esc_url(home_url('/consulta-gratuita')); ?>"
                    class="group relative inline-flex items-center gap-2 px-7 py-3.5 bg-primary text-white text-base md:text-lg font-bold rounded-full hover:bg-blue-600 transition-all shadow-lg hover:shadow-primary/30 transform hover:-translate-y-1">
                    Reservar consulta gratuita de 15 min
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 transition-transform group-hover:translate-x-1" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>

                <!-- Bitwig Certified Trainer badge -->
                <img src="https://animatek.net/wp-content/uploads/2025/04/Certified-Trainer-Banner.webp"
                     alt="Bitwig Certified Trainer"
                     class="h-8 md:h-10 w-auto opacity-70">

                <p class="text-sm text-slate-400 max-w-lg mx-auto leading-relaxed">
                    Sin compromiso. Hablamos de tu situaci&oacute;n, tu nivel y tus objetivos. Si encaja, dise&ntilde;o un plan a tu medida.
                </p>
            </div>
        </div>
    </section>

    <!-- SECCIÓN 2 · CÓMO FUNCIONA -->
    <section class="max-w-6xl mx-auto px-6 py-16 lg:py-24">
        <div class="text-center mb-12">
            <h2 class="mb-4">Cómo funcionan las clases</h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">Un proceso claro y adaptado a ti, desde el primer contacto hasta que dominas tu setup.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <?php
            $steps = [
                [
                    'title' => 'Consulta gratuita',
                    'desc'  => 'Nos conocemos en 15 minutos. Me cuentas dónde estás, qué herramientas usas y qué quieres conseguir.',
                    'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>',
                    'color' => 'bg-primary/10 text-primary border-primary/20',
                ],
                [
                    'title' => 'Diagnóstico y plan',
                    'desc'  => 'Analizo tu nivel, tu flujo y tus bloqueos. Preparo un plan de sesiones adaptado a ti.',
                    'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>',
                    'color' => 'bg-primary/10 text-primary border-primary/20',
                ],
                [
                    'title' => 'Sesiones 1:1 por videollamada',
                    'desc'  => 'Trabajamos sobre tu proyecto real. Nada de plantillas: cada sesión se diseña para lo que necesitas esa semana.',
                    'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>',
                    'color' => 'bg-primary/10 text-primary border-primary/20',
                ],
                [
                    'title' => 'Seguimiento entre sesiones',
                    'desc'  => 'Tareas concretas, soporte por email/Discord y ajustes sobre la marcha para que avances de verdad.',
                    'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                    'color' => 'bg-primary/10 text-primary border-primary/20',
                ],
            ];
            foreach ($steps as $i => $step): ?>
                <div class="group step-card bg-white border-2 <?php echo esc_attr($step['color']); ?> rounded-2xl p-8 hover:shadow-lg transition-all relative overflow-hidden">
                    <!-- Decorative number -->
                    <div class="absolute top-4 right-4 text-6xl font-black opacity-5"><?php echo $i + 1; ?></div>
                    
                    <div class="relative z-10">
                        <!-- Icon -->
                        <div class="w-14 h-14 rounded-xl <?php echo esc_attr($step['color']); ?> flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <?php echo $step['icon']; ?>
                            </svg>
                        </div>
                        
                        <!-- Content -->
                        <h3 class="text-xl font-bold text-slate-900 mb-3"><?php echo esc_html($step['title']); ?></h3>
                        <p class="text-slate-600 leading-relaxed"><?php echo esc_html($step['desc']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- SECCIÓN 3 · PLANES Y PRECIOS -->
    <section id="planes" class="max-w-7xl mx-auto px-6 pb-16 lg:pb-24">
        <div class="text-center max-w-3xl mx-auto space-y-4 mb-8">
            <h2>Elige tu plan</h2>
            <p class="text-lg text-slate-600 leading-relaxed">
                Desde una sesi&oacute;n puntual hasta un programa completo. Todos incluyen la opci&oacute;n de empezar con una consulta gratuita.
            </p>
        </div>

        <!-- Consulta gratuita CTA -->
        <div class="max-w-2xl mx-auto text-center mb-12">
            <div class="bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl p-6 border border-slate-200 shadow-sm">
                <p class="text-lg text-slate-700 mb-3">&iquest;No sabes qu&eacute; plan elegir? No pasa nada.</p>
                <a href="<?php echo esc_url(home_url('/consulta-gratuita')); ?>"
                    class="inline-flex items-center gap-2 text-primary font-bold hover:underline">
                    Reservar consulta gratuita de 15 min
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- PLAN 1 · Sesión puntual -->
            <div class="bg-white border border-slate-200 rounded-2xl p-8 flex flex-col hover:border-primary/30 transition-all shadow-sm hover:shadow-lg">
                <div class="mb-6">
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Sesi&oacute;n puntual</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">Para quien necesita resolver una duda concreta, desbloquear un problema o recibir asesoramiento personalizado.</p>
                </div>
                <div class="mb-6">
                    <span class="text-4xl font-bold text-slate-900">60 &euro;</span>
                    <span class="text-slate-500 text-sm">/hora</span>
                </div>
                <ul class="mb-6 space-y-3 text-slate-700 text-sm flex-1">
                    <?php
                    $plan1 = [
                        'Asesoramiento para comprar un ordenador o equipo musical',
                        'Configuración de Linux, Windows y audio',
                        'Problemas con Bitwig, VCV Rack, MIDI o sintetizadores',
                        'Diseño y optimización del estudio',
                        'Revisión de patches y proyectos',
                        'Elección de software, plugins o hardware',
                        'Clases particulares sobre un tema específico',
                    ];
                    foreach ($plan1 as $item): ?>
                        <li class="flex items-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mt-0.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span><?php echo esc_html($item); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <p class="text-slate-500 text-sm leading-relaxed mb-8 border-l-2 border-primary/40 pl-3">
                    Cu&eacute;ntame tu problema antes de la sesi&oacute;n y dedicaremos la hora a encontrar una soluci&oacute;n pr&aacute;ctica. No necesitas seguir un curso ni contratar m&aacute;s sesiones.
                </p>
                <a href="https://animatek.net/pago/?line_items%5B0%5D%5Bprice_id%5D=c5b923cb-2139-4cde-a7b5-e96370391c0e&line_items%5B0%5D%5Bquantity%5D=1" target="_blank"
                    class="w-full block text-center bg-slate-100 border border-slate-200 hover:bg-primary hover:text-white hover:border-primary text-slate-700 font-semibold py-3 px-4 rounded-xl transition-all">
                    Reservar sesi&oacute;n
                </a>
            </div>


            <!-- PLAN 3 · Programa 5 horas -->
            <div class="bg-white border-2 border-primary rounded-2xl p-8 flex flex-col shadow-lg shadow-primary/15 relative overflow-hidden">
                <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-primary to-cyan-400"></div>
                <div class="absolute top-4 right-4">
                    <span class="bg-primary text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-sm">Pack 5 horas</span>
                </div>
                <div class="mb-6 mt-4">
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Programa 5 horas &mdash; Arranca tu sistema modular</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">Quieres montar tu entorno de trabajo en VCV Rack o Bitwig y empezar a crear con criterio.</p>
                </div>
                <div class="mb-6">
                    <span class="text-4xl font-bold text-slate-900">300 &euro;</span>
                    <span class="text-slate-500 text-sm">/pack</span>
                </div>
                <ul class="mb-8 space-y-3 text-slate-700 text-sm flex-1">
                    <?php
                    $plan3 = [
                        '4-5 sesiones 1:1 por videollamada',
                        'Diseñamos tu sistema base adaptado a tu estilo',
                        'Te llevas un patch o plantilla de trabajo reutilizable',
                        'Plan de trabajo entre sesiones (no solo hablar, sino avanzar)',
                        'Horarios flexibles y soporte por email/Discord entre sesiones',
                    ];
                    foreach ($plan3 as $item): ?>
                        <li class="flex items-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mt-0.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span><?php echo esc_html($item); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <a href="https://animatek.net/pago/?line_items%5B0%5D%5Bprice_id%5D=ed8ca26e-f74a-4c96-9311-f587634d5fb8&line_items%5B0%5D%5Bquantity%5D=1" target="_blank"
                    class="w-full block text-center bg-primary hover:bg-primary/90 text-white font-bold py-4 px-4 rounded-xl shadow-lg shadow-primary/30 transition-all">
                    Empezar programa 5h
                </a>
            </div>

            <!-- PLAN 4 · Mentoría 10 horas -->
            <div class="bg-white border border-slate-200 rounded-2xl p-8 flex flex-col hover:border-primary/30 transition-all shadow-sm hover:shadow-lg">
                <div class="mb-6">
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Mentor&iacute;a 10 horas &mdash; VCV Rack + Bitwig completo</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">Quieres dominar VCV Rack desde cero, integrarlo con Bitwig y terminar con un proyecto publicable.</p>
                </div>
                <div class="mb-6">
                    <span class="text-4xl font-bold text-slate-900">550 &euro;</span>
                    <span class="text-sm text-slate-400 line-through ml-2">600 &euro;</span>
                    <span class="text-green-700 text-xs font-bold ml-2 bg-green-100 px-2 py-1 rounded">Ahorras 50 &euro;</span>
                </div>
                <ul class="mb-8 space-y-3 text-slate-700 text-sm flex-1">
                    <?php
                    $plan4 = [
                        '10 sesiones 1:1 por videollamada',
                        'Fundamentos claros de VCV Rack y trabajo por módulos',
                        'Integración real con Bitwig: routing, grabación y mezcla',
                        'Proyecto final: tema o mini set terminado y listo para publicar',
                        'Base de trabajo replicable para futuros proyectos',
                    ];
                    foreach ($plan4 as $item): ?>
                        <li class="flex items-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mt-0.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span><?php echo esc_html($item); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <a href="https://animatek.net/pago/?line_items%5B0%5D%5Bprice_id%5D=94b501cc-4ed9-4526-bbb8-b1389173fd90&line_items%5B0%5D%5Bquantity%5D=1" target="_blank"
                    class="w-full block text-center bg-slate-100 border border-slate-200 hover:bg-primary hover:text-white hover:border-primary text-slate-700 font-semibold py-3 px-4 rounded-xl transition-all">
                    Unirme al programa 10h
                </a>
            </div>
        </div>

    </section>

    <!-- SECCIÓN 4 · QUÉ PUEDES APRENDER -->
    <section class="max-w-7xl mx-auto px-6 pb-16 lg:pb-24">
        <div class="text-center mb-10">
            <h2>Dominio t&eacute;cnico y creatividad sin l&iacute;mites</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
            <div class="group bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md hover:-translate-y-1 transition">
                <div class="flex items-center gap-3 mb-4">
                    <span class="h-10 w-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="4" y="4" width="6" height="6" rx="1.5"/><rect x="14" y="4" width="6" height="6" rx="1.5"/><rect x="4" y="14" width="6" height="6" rx="1.5"/><rect x="14" y="14" width="6" height="6" rx="1.5"/>
                        </svg>
                    </span>
                    <h3 class="text-lg font-bold text-slate-900">Bitwig Studio</h3>
                </div>
                <p class="text-sm leading-relaxed text-slate-600">Automatizaci&oacute;n, The Grid, composici&oacute;n avanzada y workflows h&iacute;bridos.</p>
            </div>

            <div class="group bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md hover:-translate-y-1 transition">
                <div class="flex items-center gap-3 mb-4">
                    <span class="h-10 w-10 rounded-xl bg-cyan-50 text-cyan-600 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12c2-4 4-4 6 0s4 4 6 0 4-4 6 0"/>
                        </svg>
                    </span>
                    <h3 class="text-lg font-bold text-slate-900">VCV Rack</h3>
                </div>
                <p class="text-sm leading-relaxed text-slate-600">Secuenciaci&oacute;n generativa, s&iacute;ntesis modular e integraci&oacute;n con DAW.</p>
            </div>

            <div class="group bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md hover:-translate-y-1 transition">
                <div class="flex items-center gap-3 mb-4">
                    <span class="h-10 w-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h2v12H4zM10 10h2v8h-2zM16 8h2v10h-2z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 18h18"/>
                        </svg>
                    </span>
                    <h3 class="text-lg font-bold text-slate-900">Producci&oacute;n</h3>
                </div>
                <p class="text-sm leading-relaxed text-slate-600">Workflow creativo, mezcla, dise&ntilde;o sonoro y estructura de tracks.</p>
            </div>

            <div class="group bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md hover:-translate-y-1 transition">
                <div class="flex items-center gap-3 mb-4">
                    <span class="h-10 w-10 rounded-xl bg-slate-900/10 text-slate-900 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="4" y="5" width="16" height="14" rx="2" ry="2"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 9h8m-8 4h5"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 5V3m12 2V3"/>
                        </svg>
                    </span>
                    <h3 class="text-lg font-bold text-slate-900">Hardware</h3>
                </div>
                <p class="text-sm leading-relaxed text-slate-600">Digitakt, Octatrack, Eurorack, controladores MIDI y setup live.</p>
            </div>
        </div>
    </section>

    <!-- SECCIÓN 5 · TESTIMONIO DESTACADO -->
    <section class="max-w-6xl mx-auto px-6 mb-16">
        <div class="bg-slate-900 rounded-[2rem] overflow-hidden shadow-xl relative">
            <div class="relative z-10 flex flex-col lg:flex-row items-stretch">
                <!-- Image Column -->
                <div class="lg:w-1/3 relative min-h-[300px]">
                    <img src="https://animatek.net/wp-content/uploads/2026/03/Valver.webp" 
                         alt="Valver - VCV Rack & Instalaciones" 
                         class="absolute inset-0 w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent lg:bg-gradient-to-r lg:from-transparent lg:to-slate-900"></div>
                </div>

                <!-- Content Column -->
                <div class="lg:w-2/3 p-6 md:p-10 lg:p-12 flex flex-col justify-center">
                    <div class="mb-4">
                        <span class="bg-primary/20 text-primary text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-[0.2em] border border-primary/30">Destacado: VCV Rack</span>
                    </div>

                    <blockquote class="relative">
                        <div class="text-white text-base md:text-lg font-light leading-relaxed space-y-4 mb-6 italic">
                            <p>
                                "He contratado un bono de 5 horas de clases con Javier Melgar para centrarme en <strong>VCV Rack y sistemas sonoros generativos</strong>. Lo que más destaco es cómo explica: parte de una idea muy simple —que al final todo es voltaje— y desde ahí va construyendo todo con una <strong>lógica aplastante</strong>."
                            </p>
                        </div>
                        
                        <footer class="flex items-center gap-4 border-t border-white/5 pt-4">
                            <div>
                                <h4 class="text-white font-bold text-base">Valver</h4>
                                <p class="text-primary text-xs font-medium">Artista Visual e Instalaciones</p>
                            </div>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN 6 · TESTIMONIOS -->
    <?php get_template_part('template-parts/block-testimonios'); ?>

    <!-- SECCIÓN 7 · FAQ -->
    <section class="max-w-3xl mx-auto px-6 pb-16 lg:pb-24">
        <div class="text-center mb-10">
            <h2>Preguntas frecuentes</h2>
        </div>

        <div class="space-y-4">
            <?php
            $faqs = [
                [
                    'q' => '¿Puedo grabar las clases?',
                    'a' => 'Sí, puedes grabarlas tú o pedir la grabación al terminar la sesión para repasar cuando quieras.',
                ],
                [
                    'q' => '¿Qué necesito para empezar?',
                    'a' => 'Ordenador con buena conexión, Discord y micrófono. Tarjeta de sonido o controlador MIDI son recomendables, no obligatorios.',
                ],
                [
                    'q' => '¿Qué pasa si no puedo asistir a una clase?',
                    'a' => 'Avisando con 24h reagendamos sin coste. Así mantienes el ritmo sin perder la sesión.',
                ],

            ];
            foreach ($faqs as $faq): ?>
                <details class="group bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                    <summary class="flex items-center justify-between gap-4 px-6 py-5 cursor-pointer list-none font-semibold text-slate-900 hover:bg-slate-50 transition-colors">
                        <?php echo esc_html($faq['q']); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 shrink-0 transition-transform group-open:rotate-45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5"/>
                        </svg>
                    </summary>
                    <div class="px-6 pb-5 text-slate-600 leading-relaxed">
                        <?php echo esc_html($faq['a']); ?>
                    </div>
                </details>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- SECCIÓN 7 · CTA FINAL -->
    <section class="max-w-4xl mx-auto px-6 pb-24 lg:pb-32 text-center">
        <h2 class="mb-6">&iquest;Listo para avanzar?</h2>
        <p class="text-lg text-slate-600 mb-10 leading-relaxed">
            Elige tu punto de entrada y empieza hoy. Si tienes dudas, la consulta gratuita es el mejor primer paso.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="<?php echo esc_url(home_url('/consulta-gratuita')); ?>"
                class="w-full sm:w-auto btn-primary justify-center px-8 py-4 text-base">
                Reservar consulta gratuita
            </a>
            <a href="<?php echo esc_url(home_url('/academia')); ?>"
                class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 text-base font-bold text-slate-700 bg-white border border-slate-300 rounded-lg hover:border-slate-400 hover:text-slate-900 transition-colors">
                Ver cursos online
            </a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
