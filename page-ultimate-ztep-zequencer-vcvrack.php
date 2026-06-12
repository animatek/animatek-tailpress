<?php
/**
 * Template Name: UZZ VCV Rack
 */

get_header();
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
                <div class="inline-flex flex-wrap items-center gap-1 p-1 rounded-full bg-white border border-slate-200 shadow-sm">
                    <span class="px-3 py-1.5 rounded-full text-xs font-semibold bg-primary text-white shadow-sm" aria-current="page">
                        UZZ · VCV Rack
                    </span>
                    <a href="<?php echo esc_url(home_url('/ultimate-ztep-zequencer')); ?>" class="px-3 py-1.5 rounded-full text-xs font-semibold text-slate-700 hover:text-primary hover:bg-slate-100 transition">
                        UZZ · Max for Live
                    </a>
                    <a href="<?php echo esc_url(home_url('/oxi-cv')); ?>" class="px-3 py-1.5 rounded-full text-xs font-semibold text-slate-700 hover:text-primary hover:bg-slate-100 transition">
                        OXI-CV
                    </a>
                    <a href="<?php echo esc_url(home_url('/animatek-nme/')); ?>" class="px-3 py-1.5 rounded-full text-xs font-semibold text-slate-700 hover:text-primary hover:bg-slate-100 transition">
                        Animatek NME
                    </a>
                </div>
                <a href="<?php echo esc_url(home_url('/ultimate-ztep-zequencer-vcvrack-eng')); ?>" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 rounded-full text-xs font-semibold text-slate-700 hover:border-primary hover:text-primary transition shadow-sm">
                    <span>EN</span>
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
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight text-slate-900">
                        UZZ - <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-cyan-600">VCV Rack</span>
                    </h1>
                    <p class="text-lg sm:text-xl text-slate-700 leading-relaxed max-w-2xl">
                        Secuenciador de 16 pasos para VCV Rack 2.x. Temporización precisa, improvisación estructurada y flexibilidad modular. Cada paso tiene Pitch, Octava, Duración, Mod1/Mod2 y Prob/Pulse. Diez modos de dirección, acumulador de semitonos y probabilidad global multiplicativa.
                    </p>
                </div>

                <div class="relative">
                    <div class="absolute inset-0 rounded-3xl bg-white/60 blur-3xl"></div>
                    <div class="relative rounded-3xl border border-slate-200 shadow-2xl bg-slate-900 px-2 py-2">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary/20 to-red-500/20 blur-3xl opacity-40"></div>
                        <img src="https://animatek.net/wp-content/uploads/2026/04/UZZ_2_5.webp"
                             alt="Interfaz UZZ VCV Rack"
                             class="w-full aspect-video object-cover object-top relative z-10 rounded-3xl">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 pb-20">
        <div class="grid lg:grid-cols-[1.4fr_0.9fr] gap-8 items-start">
            <div class="space-y-10">

                <div class="space-y-4">
                    <div class="flex items-center gap-2 sm:gap-3 text-left text-slate-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-primary shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a1 1 0 0 1-1-1v-1a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v1a1 1 0 0 1-1 1"/>
                            <path d="M19 15V6.5a1 1 0 0 0-7 0v11a1 1 0 0 1-7 0V9"/>
                            <path d="M21 21v-2h-4"/>
                            <path d="M3 5v2a1 1 0 0 0 1 1h1a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H3a1 1 0 0 0-1 1"/>
                            <path d="M3 3v2h4"/>
                        </svg>
                        <p class="text-lg sm:text-xl font-semibold leading-tight mb-0 text-left">De Max for Live a VCV Rack</p>
                    </div>
                    <div class="space-y-3 text-slate-700 leading-relaxed">
                        <p class="text-base">UZZ nació como un dispositivo de Max for Live. Este port a VCV Rack 2.x preserva la filosofía original: temporización precisa, improvisación estructurada y flexibilidad modular total. Pensado para directo y estudio, prioriza la velocidad de edición y la musicalidad inmediata.</p>
                        <p class="text-base">Cada paso tiene su propio <strong>Pitch, Octava, Duración relativa al tempo, Mod1, Mod2 y un knob bipolar Prob/Pulse</strong>. La ventana activa es configurable (Start + número de pasos) con wrap-around. Accumulator de semitonos, probabilidad global multiplicativa y salida de gate polifónica completan el módulo.</p>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-slate-900 mb-6 border-b border-slate-200 pb-2">Modos de paso</h4>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                        <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <div class="font-mono text-xs font-bold text-primary mb-1">Play</div>
                            <p class="text-xs text-slate-600">Dispara el paso normalmente.</p>
                        </div>
                        <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <div class="font-mono text-xs font-bold text-primary mb-1">Mute</div>
                            <p class="text-xs text-slate-600">Avanza pero no genera gate ni pitch.</p>
                        </div>
                        <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <div class="font-mono text-xs font-bold text-primary mb-1">Skip</div>
                            <p class="text-xs text-slate-600">Salta el paso sin consumir tiempo de reloj.</p>
                        </div>
                        <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <div class="font-mono text-xs font-bold text-primary mb-1">Accum Up</div>
                            <p class="text-xs text-slate-600">Suma semitonos al acumulador de pitch.</p>
                        </div>
                        <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <div class="font-mono text-xs font-bold text-primary mb-1">Accum Down</div>
                            <p class="text-xs text-slate-600">Resta semitonos al acumulador de pitch.</p>
                        </div>
                        <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <div class="font-mono text-xs font-bold text-primary mb-1">Pulse</div>
                            <p class="text-xs text-slate-600">Multiplica el gate según el knob Prob/Pulse.</p>
                        </div>
                        <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <div class="font-mono text-xs font-bold text-primary mb-1">Gated</div>
                            <p class="text-xs text-slate-600">Gate activo mientras llega pulso de reloj.</p>
                        </div>
                        <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <div class="font-mono text-xs font-bold text-primary mb-1">Hold</div>
                            <p class="text-xs text-slate-600">Mantiene el pitch y gate del paso anterior.</p>
                        </div>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-slate-900 mb-6 border-b border-slate-200 pb-2">Parámetros por paso</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <div class="flex items-center gap-2 text-primary font-mono text-xs font-bold uppercase mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 4v16M6 8h4m-4 6h7m5-10v16m0-12h-6m6 8h-3"/>
                                </svg>
                                Pitch & Octava
                            </div>
                            <p class="text-sm text-slate-600 font-sans">Tono 0–12 semitonos. Desplazamiento de octava −2 a +2.</p>
                        </div>
                        <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <div class="flex items-center gap-2 text-primary font-mono text-xs font-bold uppercase mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="9" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 7v5l3 3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Duración
                            </div>
                            <p class="text-sm text-slate-600 font-sans">Relativa al tempo. Controla la articulación de cada nota.</p>
                        </div>
                        <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <div class="flex items-center gap-2 text-primary font-mono text-xs font-bold uppercase mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="8" cy="12" r="3"/>
                                    <circle cx="16" cy="12" r="3"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 5v2m0 10v2m8-2v2m0-14v2"/>
                                </svg>
                                MOD 1 / MOD 2
                            </div>
                            <p class="text-sm text-slate-600 font-sans">Dos salidas CV independientes. Menú contextual: unipolar (0–10 V) o bipolar (±5 V).</p>
                        </div>
                        <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <div class="flex items-center gap-2 text-primary font-mono text-xs font-bold uppercase mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 2v20M2 12h20"/>
                                </svg>
                                Prob / Pulse
                            </div>
                            <p class="text-sm text-slate-600 font-sans">Knob bipolar: lado izquierdo = probabilidad de gate; lado derecho = multiplicador de pulso.</p>
                        </div>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-slate-900 mb-6 border-b border-slate-200 pb-2">10 modos de dirección</h4>
                    <div class="grid grid-cols-2 sm:grid-cols-5 gap-3">
                        <?php
                        $directions = [
                            ['Forward',   'Avanza paso a paso.'],
                            ['Backward',  'Retrocede paso a paso.'],
                            ['Pendulum',  'Ida y vuelta sin repetir extremos.'],
                            ['Ping-Pong', 'Ida y vuelta repitiendo extremos.'],
                            ['Random',    'Paso aleatorio en cada pulso.'],
                            ['Drunk',     'Deambula sin perder el pulso.'],
                            ['Odd/Even',  'Alterna pasos pares e impares.'],
                            ['Jump',      'Saltos definidos entre pasos.'],
                            ['Converge',  'Avanza desde extremos hacia el centro.'],
                            ['Diverge',   'Avanza desde el centro hacia los extremos.'],
                        ];
                        foreach ($directions as $dir): ?>
                        <div class="bg-white px-3 py-3 rounded-xl border border-slate-100 shadow-sm">
                            <div class="font-mono text-xs font-bold text-primary mb-1"><?php echo esc_html($dir[0]); ?></div>
                            <p class="text-[11px] text-slate-500"><?php echo esc_html($dir[1]); ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm">
                    <h4 class="font-bold text-slate-900 mb-6 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="9" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3 12h18" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 3c2.5 3.5 2.5 14 0 18" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7 5c1.5 2 1.5 12 0 14" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17 5c-1.5 2-1.5 12 0 14" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Control global
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4 text-sm text-slate-700 font-sans">
                            <div>
                                <strong class="block text-slate-800 mb-1">Clock ratios</strong>
                                ÷8 a ×8 y más allá, con swing integrado para groove y polirritmias controladas.
                            </div>
                            <div>
                                <strong class="block text-slate-800 mb-1">Active Window</strong>
                                Start configurable + número de pasos activos con wrap-around. Desplaza el patrón sin tocar los valores.
                            </div>
                            <div>
                                <strong class="block text-slate-800 mb-1">Swing</strong>
                                Cantidad de shuffle ajustable. Un 5–10 % humaniza sin destruir la rejilla.
                            </div>
                        </div>
                        <div class="space-y-4 text-sm text-slate-700 font-sans">
                            <div>
                                <strong class="block text-slate-800 mb-1">Global Probability</strong>
                                Knob multiplicativo sobre el disparo de gate de todos los pasos a la vez.
                            </div>
                            <div>
                                <strong class="block text-slate-800 mb-1">Accumulator</strong>
                                Offset en semitonos que se acumula en pasos ACCUM UP/DOWN. Wrap configurable para contener el rango.
                            </div>
                            <div>
                                <strong class="block text-slate-800 mb-1">Global Glide</strong>
                                Slew en la salida V/Oct (portamento de 0 a 2 s) aplicado globalmente a todas las notas.
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-slate-900 mb-6 border-b border-slate-200 pb-2">Randomize & Shift por fila</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="flex gap-3 items-start p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                            <div class="p-2 bg-blue-50 text-primary rounded-lg shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M3 15c3-4 6-4 9 0s6 4 9 0" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M3 9c3 4 6 4 9 0s6-4 9 0" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div>
                                <h5 class="font-bold text-sm text-slate-800 mb-1">Randomize por fila</h5>
                                <p class="text-xs text-slate-600">Botón y entrada CV para re-aleatorizar cada fila: Pitch, Oct, Mode, Dur, Mod1, Mod2, Prob.</p>
                            </div>
                        </div>
                        <div class="flex gap-3 items-start p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                            <div class="p-2 bg-blue-50 text-primary rounded-lg shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m7 7 5-5 5 5M7 17l5 5 5-5M7 12h10"/>
                                </svg>
                            </div>
                            <div>
                                <h5 class="font-bold text-sm text-slate-800 mb-1">Shift ↑/↓ por fila</h5>
                                <p class="text-xs text-slate-600">Flechas para desplazar todos los valores de cada fila, incluida la fila Prob/Pulse.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-8 relative overflow-hidden border border-slate-200 shadow-sm">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-primary/10 rounded-full blur-3xl pointer-events-none"></div>
                    <div class="relative z-10">
                        <h4 class="text-slate-900 font-bold mb-8 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="4" y="4" width="16" height="16" rx="2" ry="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9 9h6v6H9z" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4 9h5v6H4zM15 9h5v6h-5z" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9 4v5M15 4v5M9 15v5M15 15v5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Zona de patch
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                            <div>
                                <div class="flex items-center gap-2 mb-4 text-yellow-600 font-mono text-xs font-bold tracking-wider uppercase">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 12h13"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m13 5 7 7-7 7"/>
                                    </svg>
                                    Entradas
                                </div>
                                <ul class="space-y-3 text-sm font-mono text-slate-700">
                                    <li><span class="text-slate-900 font-bold">CLOCK IN:</span> Pulso de avance de paso.</li>
                                    <li><span class="text-slate-900 font-bold">RESET IN:</span> Vuelve al inicio (Select).</li>
                                    <li><span class="text-slate-900 font-bold">XPOSE IN:</span> Transposición global 1 V/oct.</li>
                                    <li><span class="text-slate-900 font-bold">RAND IN ×7:</span> Triggers por fila — Pitch, Oct, Mode, Dur, Mod1, Mod2, Prob.</li>
                                </ul>
                            </div>
                            <div>
                                <div class="flex items-center gap-2 mb-4 text-green-600 font-mono text-xs font-bold tracking-wider uppercase">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m20 12-7-7-7 7"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14"/>
                                    </svg>
                                    Salidas
                                </div>
                                <ul class="space-y-3 text-sm font-mono text-slate-700">
                                    <li><span class="text-slate-900 font-bold">V/OCT + Glide:</span> Pitch con slew 0–2 s.</li>
                                    <li><span class="text-slate-900 font-bold">GATE OUT:</span> Conmutable Gate/Trigger.</li>
                                    <li><span class="text-slate-900 font-bold">POLY GATE:</span> Un canal por paso activo.</li>
                                    <li><span class="text-slate-900 font-bold">MOD 1/2 OUT:</span> CV con step-lock.</li>
                                    <li><span class="text-slate-900 font-bold">EOC OUT:</span> Pulso de fin de ciclo.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <aside class="space-y-8">
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-lg">
                    <div class="mb-6 text-center">
                        <img src="https://animatek.net/wp-content/uploads/2025/11/logovcv.webp" alt="Logo VCV" class="w-12 h-12 mx-auto mb-2 opacity-80 object-contain">
                        <h4 class="text-lg font-bold text-slate-900">Biblioteca VCV</h4>
                    </div>
                    <a href="https://library.vcvrack.com/Animatek/UZZ"
                       target="_blank"
                       class="block w-full text-center bg-primary hover:bg-primary/90 text-white font-bold py-4 px-6 rounded-xl transition-all transform hover:-translate-y-1 shadow-md shadow-primary/20 flex items-center justify-center gap-2">
                        <i data-lucide="download-cloud" class="w-5 h-5"></i>
                        Añadir a mi Rack
                    </a>
                    <p class="text-xs text-slate-500 text-center mt-4 font-sans leading-relaxed">
                        Disponible para VCV Rack Free & Pro.<br>Compatible con Windows, Mac y Linux.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                    <div class="rounded-xl overflow-hidden mb-4">
                        <img src="https://animatek.net/wp-content/uploads/2025/11/UZZ_Curso.webp" alt="Curso gratis de UZZ para VCV" class="w-full h-auto object-cover">
                    </div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 text-[11px] font-bold tracking-widest uppercase bg-primary/10 text-primary rounded-full mb-3">
                        <span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span>
                        Apúntate ya
                    </div>
                    <h4 class="text-lg font-bold text-slate-900 mb-2">Curso gratis de UZZ para VCV</h4>
                    <p class="text-sm text-slate-600 leading-relaxed mb-4">
                        Flujo completo para improvisar y crear patrones complejos con UZZ en VCV Rack. Aprende paso a paso y aplica al directo o estudio.
                    </p>
                    <a href="<?php echo esc_url(home_url('/cursos/curso-uzz/')); ?>"
                       class="block w-full text-center bg-primary hover:bg-primary/90 text-white font-bold py-3 px-4 rounded-xl transition-all transform hover:-translate-y-0.5 shadow-md shadow-primary/20">
                        Empezar curso
                    </a>
                </div>

                <div class="bg-white p-1 rounded-2xl border border-slate-200 shadow-sm">
                    <div class="rounded-xl overflow-hidden">
                        <iframe width="100%" height="200" src="https://www.youtube.com/embed/r3QMHA-M_ZM?start=598" title="Review de Omri Cohen" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="p-4">
                        <div class="flex items-start gap-3">
                            <div class="bg-red-50 p-2 rounded-full text-red-600"><i data-lucide="youtube" class="w-4 h-4"></i></div>
                            <div>
                                <p class="text-sm text-slate-800 font-medium italic mb-1 font-sans">"Omri Cohen destacó UZZ en su resumen de módulos."</p>
                                <p class="text-xs text-slate-500 font-sans">Noviembre 2025</p>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </section>
</main>

<?php
get_footer();
