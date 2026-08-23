<?php

get_header();
?>

<main id="primary" class="bg-slate-200 text-slate-900">
    <section class="relative pt-8 pb-10 lg:pt-12 lg:pb-16 overflow-hidden bg-slate-900 text-slate-50 mb-0">
        <!-- Background Image & Overlay -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-cover bg-center"
                style="background-image: url('https://animatek.net/wp-content/uploads/2025/05/Bono_hora.webp');"></div>
            <div class="absolute inset-0 bg-gradient-to-br from-slate-950/90 via-slate-900/85 to-slate-800/80"></div>
            <!-- Decorative Blurs -->
            <div
                class="absolute top-0 right-0 -mr-32 -mt-32 w-[500px] h-[500px] bg-primary/20 rounded-full blur-[100px] mix-blend-overlay">
            </div>
            <div
                class="absolute bottom-0 left-0 -ml-32 -mb-32 w-[500px] h-[500px] bg-indigo-500/10 rounded-full blur-[100px] mix-blend-overlay">
            </div>
        </div>

        <div class="relative z-10 container mx-auto px-6 text-center max-w-5xl">
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold tracking-tight mb-6 text-white leading-tight">
                Bienvenid@ a <span class="text-primary">Animatek.</span>
            </h1>

            <div class="text-lg md:text-xl text-slate-300 mb-8 max-w-3xl mx-auto leading-relaxed font-light space-y-3">
                <p>
                    Soy <strong class="text-white">Javi</strong>, llevo más de 25 años haciendo ruido con sintes y vinilos.
                </p>
                <p>
                    Diseño workflows, patches y módulos en <strong class="text-white">VCV Rack</strong>.
                    Enseño <strong class="text-white">Bitwig Studio</strong> como Certified Trainer.
                    Y te ayudo a sacarle todo el jugo a tu setup, sea software, hardware o los dos.
                </p>
            </div>

            <div class="flex flex-col items-center gap-6">
                <div
                    class="w-full max-w-2xl rounded-lg bg-black border border-slate-700 font-mono text-left shadow-2xl overflow-hidden">
                    <!-- Terminal Header -->
                    <div class="bg-slate-800 px-4 py-2 flex items-center gap-2 border-b border-slate-700">
                        <div class="w-3 h-3 rounded-full bg-red-500"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                        <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        <div class="ml-2 text-xs text-slate-400 font-semibold">electronic music production — 80x24</div>
                    </div>
                    <!-- Terminal Content -->
                    <div class="p-4 md:p-6 text-sm md:text-base leading-relaxed text-slate-300">
                        <div class="mb-2">
                             <span class="text-green-500 font-bold">javi@animatek:~$</span> <span class="text-slate-100">cat philosophy.txt</span>
                        </div>
                        <div class="mb-4 text-gray-300">
                            Aquí no vamos de atajos ni de trucos virales.<br>
                            Esto va de aprender desde 0, entender la señal,<br>
                            diseñar tu sonido y disfrutar el proceso.<br>
                            Bienvenid@ al laboratorio.
                        </div>
                        <div>
                             <span class="text-green-500 font-bold">javi@animatek:~$</span> <span class="animate-pulse bg-slate-100 text-black px-1.5 ml-1">_</span>
                        </div>
                    </div>
                </div>

                <!-- Bitwig Certified Trainer badge -->
                <img src="https://animatek.net/wp-content/uploads/2025/04/Certified-Trainer-Banner.webp"
                     alt="Bitwig Certified Trainer"
                     class="h-8 md:h-10 w-auto opacity-70">

                <a href="#recorrido"
                    class="group relative inline-flex items-center gap-2 px-7 py-3.5 bg-primary text-white text-base md:text-lg font-bold rounded-full hover:bg-blue-600 transition-all shadow-lg hover:shadow-primary/30 transform hover:-translate-y-1">
                    Elegir mi camino
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 transition-transform group-hover:translate-y-1" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </a>
            </div>

        </div>
    </section>

    <!-- Bloque 2: Elige tu camino -->
    <section id="recorrido" class="max-w-7xl mx-auto px-6 pt-12 pb-16 lg:pt-16 lg:pb-24">
        <div class="text-center mb-16">
            <h2 class="mb-4">Cursos y Mentoría de Producción Musical:
                Elige tu Camino</h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                Tres formas de empezar según tu punto actual. Un método: comprender → practicar → feedback.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Opción A -->
            <div
                class="bg-white rounded-2xl p-8 border border-slate-200 shadow-sm hover:shadow-xl transition-all hover:border-primary/30 group relative overflow-hidden flex flex-col h-full">
                <div
                    class="absolute top-0 right-0 w-32 h-32 bg-slate-100 rounded-full -mr-16 -mt-16 transition-colors group-hover:bg-primary/5">
                </div>

                <div class="relative z-10 flex flex-col h-full">
                    <div class="mb-5">
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-primary/10 text-primary border border-primary/20">
                            Curso
                        </span>
                    </div>

                    <h3 class="text-xl font-bold text-slate-900 mb-3">VCV Rack desde cero</h3>
                    <p class="text-slate-600 mb-6 leading-relaxed">
                        Domina los fundamentos de síntesis modular: señal de audio, control por voltaje (CV) y patching
                        desde cero. Aprende a crear tus propios sintetizadores completos.
                    </p>

                    <ul class="mt-auto space-y-3 mb-6 text-sm text-slate-600">
                        <li class="flex items-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-emerald-500 flex-shrink-0"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span><strong>Resultado:</strong> Montas tu primer sinte completo y entiendes audio/CV sin
                                perderte.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary flex-shrink-0"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                            </svg>
                            <span><strong>Nivel:</strong> Empiezas o te lías con lo básico.</span>
                        </li>
                    </ul>

                    <div class="text-xs text-slate-400 font-medium mb-4 text-center">
                        Curso grabado · acceso inmediato
                    </div>

                    <a href="https://animatek.net/curso-vcvrack/"
                        class="btn-secondary w-full justify-center group-hover:border-primary/50 group-hover:text-primary">
                        Ir al curso VCV Rack (base)
                    </a>
                </div>
            </div>

            <!-- Opción B (Dark) -->
            <div
                class="bg-slate-900 rounded-2xl p-8 border border-slate-800 shadow-xl hover:shadow-2xl transition-all relative overflow-hidden group transform hover:-translate-y-1 flex flex-col h-full">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-slate-800/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                </div>

                <div class="relative z-10 flex flex-col h-full text-white">
                    <div class="mb-5">
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-primary text-white shadow-md shadow-primary/20 border border-primary/50">
                            Mentoría 1:1
                        </span>
                    </div>

                    <h3 class="text-xl font-bold mb-3 text-white">Mentoría 1:1 sobre tu proyecto</h3>
                    <p class="text-slate-100 mb-6 font-medium leading-relaxed">
                        Sesiones personalizadas sobre tu proyecto musical. Reviso tu trabajo, identificamos bloqueos
                        técnicos y creamos ejercicios específicos en Bitwig/VCV para superarlos.
                    </p>

                    <ul class="mt-auto space-y-3 mb-6 text-sm text-slate-300">
                        <li class="flex items-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-emerald-400 flex-shrink-0"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span><strong>Resultado:</strong> Detectas el cuello de botella y sales con un plan de
                                siguientes pasos.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-cyan-400 flex-shrink-0"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                            </svg>
                            <span><strong>Nivel:</strong> Ya produces, pero te bloqueas.</span>
                        </li>
                    </ul>

                    <div class="text-xs text-slate-400 font-medium mb-4 text-center">
                        Sesión 1:1 · foco en tu proyecto
                    </div>

                    <a href="<?php echo esc_url(home_url('/clases-privadas')); ?>"
                        class="btn-primary w-full justify-center shadow-lg shadow-primary/20">
                        Ver mentoría 1:1
                    </a>
                </div>
            </div>

            <!-- Opción C -->
            <div
                class="bg-white rounded-2xl p-8 border border-slate-200 shadow-sm hover:shadow-xl transition-all hover:border-cyan-400/30 group relative overflow-hidden flex flex-col h-full">
                <div
                    class="absolute top-0 right-0 w-32 h-32 bg-cyan-50 rounded-full -mr-16 -mt-16 transition-colors group-hover:bg-cyan-100/50">
                </div>

                <div class="relative z-10 flex flex-col h-full">
                    <div class="mb-5">
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-cyan-100 text-cyan-700 border border-cyan-200">
                            Gratis
                        </span>
                    </div>

                    <h3 class="text-xl font-bold text-slate-900 mb-3">Curso UZZ (gratis)</h3>
                    <p class="text-slate-600 mb-6 leading-relaxed">
                        Aprende secuenciación avanzada y modulación para crear patrones musicales con variación
                        controlada. Herramientas prácticas para generar ideas sin depender del azar.
                    </p>

                    <ul class="mt-auto space-y-3 mb-6 text-sm text-slate-600">
                        <li class="flex items-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-emerald-500 flex-shrink-0"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span><strong>Resultado:</strong> Un flujo práctico para generar ideas con intención (sin
                                depender del azar).</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary flex-shrink-0"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                            </svg>
                            <span><strong>Nivel:</strong> Tienes base y quieres herramientas/flujo.</span>
                        </li>
                    </ul>

                    <div class="text-xs text-slate-400 font-medium mb-4 text-center">
                        Mini-lecciones · acceso inmediato
                    </div>

                    <a href="https://animatek.net/cursos/curso-uzz/"
                        class="btn-secondary w-full text-sm px-5 py-2.5">
                        Acceder al curso UZZ (gratis)
                    </a>
                </div>
            </div>
        </div>



        <!-- Consulta gratuita CTA -->
        <div class="mt-16 max-w-2xl mx-auto">
            <div class="relative overflow-hidden bg-gradient-to-br from-slate-50 to-slate-100 rounded-3xl p-10 md:p-12 border border-slate-200 shadow-lg text-center">
                <!-- Decorative elements -->
                <div class="absolute top-0 right-0 -mr-20 -mt-20 w-40 h-40 bg-primary/5 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-40 h-40 bg-cyan-500/5 rounded-full blur-3xl"></div>
                
                <div class="relative z-10">
                    <h3 class="text-2xl md:text-3xl font-bold text-slate-900 mb-3">¿No sabes por dónde empezar?</h3>
                    <p class="text-lg text-slate-600 leading-relaxed mb-8 max-w-xl mx-auto">
                        Reserva una consulta gratuita de 15 minutos y lo vemos juntos.
                    </p>
                    <a href="<?php echo esc_url(home_url('/consulta-gratuita/#calendario')); ?>"
                        class="btn-primary px-8 py-4 text-base">
                        Reservar consulta gratuita
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Bloque 3: Cómo trabajo contigo -->
    <section class="max-w-4xl mx-auto px-6 mb-24 lg:mb-32">
        <div class="text-center">
            <h2 class="mb-4">Cómo trabajo contigo</h2>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto mb-12 leading-relaxed">
                Nada de ejemplos perfectos. Trabajamos sobre tu proyecto, tu patch, tu problema real.
            </p>
        </div>

        <div class="space-y-6">
            <!-- 1. Escuchamos -->
            <div class="flex items-start gap-5 bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <div class="w-10 h-10 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center flex-shrink-0 text-lg font-bold">1</div>
                <div>
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Escuchamos</h3>
                    <p class="text-slate-600 leading-relaxed">Qué suena mal, qué no funciona, dónde te atascas.</p>
                </div>
            </div>

            <!-- 2. Arreglamos -->
            <div class="flex items-start gap-5 bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <div class="w-10 h-10 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center flex-shrink-0 text-lg font-bold">2</div>
                <div>
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Arreglamos</h3>
                    <p class="text-slate-600 leading-relaxed">Ejercicios concretos aplicados a lo tuyo, no recetas genéricas.</p>
                </div>
            </div>

            <!-- 3. Repetimos -->
            <div class="flex items-start gap-5 bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <div class="w-10 h-10 rounded-full bg-primary/20 text-primary flex items-center justify-center flex-shrink-0 text-lg font-bold">3</div>
                <div>
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Repetimos</h3>
                    <p class="text-slate-600 leading-relaxed">Te llevas un método para que no vuelvas al mismo bloqueo.</p>
                </div>
            </div>
        </div>
    </section>








    <?php get_template_part('template-parts/block-testimonios'); ?>

    <?php get_template_part('template-parts/block-faq'); ?>

    <!-- Bloque Cierre: ¿Listo para avanzar? -->
    <section class="max-w-4xl mx-auto px-6 mb-24 lg:mb-32 text-center">
        <h2 class="mb-6">Comienza tu Formación en Producción
            Electrónica Hoy</h2>
        <p class="text-lg text-slate-600 mb-10 leading-relaxed">
            Si quieres claridad y progreso real, elige una puerta y empieza hoy.<br>
            Base para entenderlo todo, o acompañamiento para desbloquear tu proyecto.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="<?php echo esc_url(home_url('/consulta-gratuita')); ?>"
                class="w-full sm:w-auto btn-primary justify-center px-8 py-4 text-base">
                Reservar consulta gratuita
            </a>
            <a href="https://animatek.net/curso-vcvrack/"
                class="w-full sm:w-auto btn-secondary px-8 py-4 text-base">
                Empezar por el curso VCV (29&euro;)
            </a>
        </div>

        <a href="#recorrido"
            class="inline-flex items-center gap-2 mt-6 text-sm font-medium text-slate-500 hover:text-primary transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18" />
            </svg>
            Ver todas las opciones
        </a>
    </section>
    <?php
    get_footer();
