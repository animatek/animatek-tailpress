<?php

get_header();
?>

<main id="primary" class="bg-slate-50 text-slate-900">

    <!-- Bloque 1 — Hero -->
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
                Hablemos 15 minutos sobre <span class="text-primary">tu proyecto</span>
            </h1>

            <div class="text-lg md:text-xl text-slate-300 mb-8 max-w-3xl mx-auto leading-relaxed font-light space-y-3">
                <p>
                    Una llamada gratuita para conocernos, ver en qué punto estás y diseñar juntos los siguientes pasos.
                </p>
                <p class="text-white font-semibold">
                    Sin compromiso. Sin presión. Solo una conversación técnica sobre tu música.
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
                             <span class="text-green-500 font-bold">javi@animatek:~$</span> <span class="text-slate-100">cat consulta_info.txt</span>
                        </div>
                        <div class="mb-4 text-gray-300">
                            15 minutos para escuchar tu proyecto, diagnosticar el cuello de botella técnico y proponerte un plan de acción concreto. Gratis, sin compromiso.
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

                <a href="#calendario"
                    class="group relative inline-flex items-center gap-2 px-7 py-3.5 bg-primary text-white text-base md:text-lg font-bold rounded-full hover:bg-blue-600 transition-all shadow-lg hover:shadow-primary/30 transform hover:-translate-y-1">
                    Reservar mi consulta
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 transition-transform group-hover:translate-y-1" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Bloque 2 — Qué vamos a hacer en 15 minutos -->
    <section class="max-w-5xl mx-auto px-6 pt-16 sm:pt-20 pb-16 sm:pb-20">
        <div class="text-center mb-10">
            <h2>¿Qué vamos a hacer en 15 minutos?</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 text-center space-y-4 hover:border-primary/30 hover:shadow-lg transition-all">
                <div class="inline-flex items-center justify-center h-14 w-14 rounded-2xl bg-primary/10 text-primary mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="12" cy="12" r="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path stroke-linecap="round" d="M12 2v4m0 12v4m10-10h-4M6 12H2"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900">Escuchar</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Tu nivel, tus herramientas y dónde te atascas.
                </p>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 text-center space-y-4 hover:border-primary/30 hover:shadow-lg transition-all">
                <div class="inline-flex items-center justify-center h-14 w-14 rounded-2xl bg-accent/10 text-accent mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8" stroke-linecap="round" stroke-linejoin="round"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-4.35-4.35"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900">Diagnosticar</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Identificar el cuello de botella: señal, ruteo, mezcla...
                </p>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 text-center space-y-4 hover:border-primary/30 hover:shadow-lg transition-all">
                <div class="inline-flex items-center justify-center h-14 w-14 rounded-2xl bg-amber-500/10 text-amber-600 mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/>
                        <rect x="9" y="3" width="6" height="4" rx="1" stroke-linecap="round" stroke-linejoin="round"/>
                        <path stroke-linecap="round" d="M9 12h6m-6 4h4"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900">Planificar</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Proponerte un plan de acción con pasos concretos.
                </p>
            </div>
        </div>
    </section>

    <!-- Bloque 3 — Calendario SSA -->
    <section id="calendario" class="max-w-6xl mx-auto px-6 pb-16 sm:pb-20">
        <div class="max-w-3xl text-center mx-auto space-y-3 mb-10">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold uppercase tracking-[0.12em]">
                Elige fecha y hora
            </div>
            <h2>Reserva tu consulta gratuita</h2>
            <p class="text-base text-slate-600">Selecciona el día y la hora que mejor te venga. Recibirás una confirmación por email.</p>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl shadow-lg shadow-primary/10 p-6 sm:p-8">
            <div class="bg-slate-50 border border-slate-200 rounded-xl p-4 sm:p-5">
                <?php echo do_shortcode('[ssa_booking type=consulta-gratuita-15-min]'); ?>
            </div>
            <p class="text-sm text-slate-500 mt-4 text-center">Calendario en horario CEST. Si necesitas otro hueco, escríbeme y lo ajustamos.</p>
        </div>
    </section>

    <!-- Bloque 4 — Refuerzo social -->
    <section class="max-w-4xl mx-auto px-6 pb-16 sm:pb-20">
        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6 sm:p-10 space-y-8">
            <div class="max-w-2xl mx-auto text-center space-y-4">
                <blockquote class="relative">
                    <span class="text-primary/15 text-6xl absolute -top-6 left-1/2 -translate-x-1/2 select-none font-serif">"</span>
                    <p class="text-lg sm:text-xl text-slate-700 leading-relaxed italic relative z-10 pt-4">
                        Desde la primera clase en remoto con Javi he estado haciendo música. Su pasión se transmite a los alumnos.
                    </p>
                </blockquote>
                <div class="flex items-center justify-center gap-3">
                    <img src="https://animatek.net/wp-content/uploads/2025/04/LuisCastellon.webp"
                         alt="Luis Castellón"
                         class="w-10 h-10 rounded-full object-cover border border-slate-200">
                    <div class="text-left">
                        <p class="text-sm font-bold text-slate-900">Luis Castellón</p>
                        <p class="text-xs text-slate-500">Mentoría 1:1</p>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <!-- Bloque 5 — FAQ mínima -->
    <section class="max-w-3xl mx-auto px-6 pb-20 sm:pb-28">
        <div class="text-center mb-10">
            <h2>Preguntas frecuentes</h2>
        </div>

        <div class="space-y-4">
            <details class="group bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                <summary class="flex items-center justify-between gap-4 px-6 py-5 cursor-pointer list-none font-semibold text-slate-900 hover:bg-slate-50 transition-colors">
                    ¿Es realmente gratis?
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 shrink-0 transition-transform group-open:rotate-45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5"/>
                    </svg>
                </summary>
                <div class="px-6 pb-5 text-slate-600 leading-relaxed">
                    Sí, sin compromiso. Es una toma de contacto para conocernos y ver si te puedo ayudar.
                </div>
            </details>

            <details class="group bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                <summary class="flex items-center justify-between gap-4 px-6 py-5 cursor-pointer list-none font-semibold text-slate-900 hover:bg-slate-50 transition-colors">
                    ¿Cómo es la llamada?
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 shrink-0 transition-transform group-open:rotate-45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5"/>
                    </svg>
                </summary>
                <div class="px-6 pb-5 text-slate-600 leading-relaxed">
                    Por videollamada (Zoom o Discord). Recibirás un enlace por email al confirmar.
                </div>
            </details>

            <details class="group bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                <summary class="flex items-center justify-between gap-4 px-6 py-5 cursor-pointer list-none font-semibold text-slate-900 hover:bg-slate-50 transition-colors">
                    ¿Necesito tener VCV Rack o Bitwig instalado?
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 shrink-0 transition-transform group-open:rotate-45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5"/>
                    </svg>
                </summary>
                <div class="px-6 pb-5 text-slate-600 leading-relaxed">
                    No es necesario para la consulta. Si decides continuar, te ayudo a configurar todo.
                </div>
            </details>
        </div>
    </section>

</main>

<?php
get_footer();
