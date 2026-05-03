<?php
/**
 * Template Name: NOMAD 2026
 */

get_header();
?>

<main id="primary" class="bg-slate-200 text-slate-900">
    <section class="relative overflow-hidden px-6 sm:px-10 py-16 bg-gradient-to-br from-slate-50 via-white to-slate-100 text-slate-900 mb-[6.25rem]">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -left-24 -top-16 h-72 w-72 bg-primary/15 blur-3xl rounded-full"></div>
            <div class="absolute right-10 top-10 h-64 w-64 bg-amber-300/20 blur-3xl rounded-full"></div>
            <div class="absolute -right-20 bottom-0 h-72 w-72 bg-indigo-300/20 blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto space-y-6 relative z-10">
            <div class="flex flex-wrap items-center gap-3">
                <div class="inline-flex flex-wrap items-center gap-1 p-1 rounded-full bg-white border border-slate-200 shadow-sm">
                    <a href="<?php echo esc_url(home_url('/ultimate-ztep-zequencer-vcvrack')); ?>" class="px-3 py-1.5 rounded-full text-xs font-semibold text-slate-700 hover:text-primary hover:bg-slate-100 transition">
                        UZZ · VCV Rack
                    </a>
                    <a href="<?php echo esc_url(home_url('/ultimate-ztep-zequencer')); ?>" class="px-3 py-1.5 rounded-full text-xs font-semibold text-slate-700 hover:text-primary hover:bg-slate-100 transition">
                        UZZ · Max for Live
                    </a>
                    <a href="<?php echo esc_url(home_url('/oxi-cv')); ?>" class="px-3 py-1.5 rounded-full text-xs font-semibold text-slate-700 hover:text-primary hover:bg-slate-100 transition">
                        OXI-CV
                    </a>
                    <span class="px-3 py-1.5 rounded-full text-xs font-semibold bg-primary text-white shadow-sm" aria-current="page">
                        Nomad2026
                    </span>
                </div>
                <a href="<?php echo esc_url(home_url('/nomad2026_eng')); ?>" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 rounded-full text-xs font-semibold text-slate-700 hover:border-primary hover:text-primary transition shadow-sm">
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
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-100 text-amber-700 text-xs font-bold tracking-widest uppercase">
                        <span class="w-2 h-2 bg-amber-500 rounded-full animate-pulse"></span>
                        Beta en desarrollo · Patreon
                    </div>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight text-slate-900">
                        Nomad<span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-cyan-600">2026</span>
                    </h1>
                    <p class="text-lg sm:text-xl text-slate-700 leading-relaxed max-w-2xl">
                        Editor universal para el legendario <strong>Nord Modular G1</strong>, construido desde cero con el framework JUCE. Nativo en Windows, Mac y Linux.
                    </p>
                    <div class="flex flex-wrap gap-3 pt-2">
                        <a href="https://www.patreon.com/c/animatek"
                           target="_blank"
                           style="background-color:#FF424D;color:#ffffff;"
                           class="inline-flex items-center gap-2 hover:opacity-90 font-bold py-3 px-6 rounded-xl transition-all transform hover:-translate-y-1 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M14.82 2.41C11.57 2.41 8.93 5.05 8.93 8.3c0 3.24 2.64 5.88 5.89 5.88 3.24 0 5.88-2.64 5.88-5.88 0-3.25-2.64-5.89-5.88-5.89zM3.1 21.59h3.17V2.41H3.1v19.18z"/>
                            </svg>
                            Apoyar en Patreon
                        </a>
                        <a href="https://github.com/animatek/Nomad2026"
                           target="_blank"
                           style="background-color:#0f172a;color:#ffffff;"
                           class="inline-flex items-center gap-2 hover:opacity-90 font-bold py-3 px-6 rounded-xl transition-all transform hover:-translate-y-1 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/>
                            </svg>
                            GitHub
                        </a>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute inset-0 rounded-3xl bg-white/60 blur-3xl"></div>
                    <div class="relative rounded-3xl border border-slate-200 shadow-2xl bg-slate-900 px-2 py-2">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary/20 to-amber-500/20 blur-3xl opacity-40"></div>
                        <img src="https://animatek.net/wp-content/uploads/2026/05/Nomad2026.webp"
                             alt="Nomad2026 – Editor Nord Modular G1"
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
                            <rect x="2" y="3" width="20" height="14" rx="2"/>
                            <path d="M8 21h8M12 17v4"/>
                        </svg>
                        <p class="text-lg sm:text-xl font-semibold leading-tight mb-0 text-left">¿Qué es Nomad2026?</p>
                    </div>
                    <div class="space-y-3 text-slate-700 leading-relaxed">
                        <p class="text-base">Un editor universal completamente nuevo para el legendario <strong>Nord Modular G1</strong>. Construido desde cero con el framework <strong>JUCE</strong>, trae las capacidades del antiguo editor Java-based NOMAD a tecnologías modernas.</p>
                        <p class="text-base">El objetivo es que funcione de forma nativa y fluida en <strong>Windows, Mac y Linux</strong>, sin depender de Java ni de entornos legacy. Un proyecto open-source liderado por Animatek.</p>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-slate-900 mb-6 border-b border-slate-200 pb-2">Stack técnico</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="flex gap-3 items-start p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                            <div class="p-2 bg-blue-50 text-primary rounded-lg shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="16 18 22 12 16 6"/>
                                    <polyline points="8 6 2 12 8 18"/>
                                </svg>
                            </div>
                            <div>
                                <h5 class="font-bold text-sm text-slate-800 mb-1">JUCE Framework</h5>
                                <p class="text-xs text-slate-600">C++ nativo. Rendimiento real, sin capas de emulación.</p>
                            </div>
                        </div>
                        <div class="flex gap-3 items-start p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                            <div class="p-2 bg-blue-50 text-primary rounded-lg shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="2" y="2" width="20" height="20" rx="2"/>
                                    <path d="M7 12h10M12 7v10"/>
                                </svg>
                            </div>
                            <div>
                                <h5 class="font-bold text-sm text-slate-800 mb-1">Multiplataforma</h5>
                                <p class="text-xs text-slate-600">Windows, Mac y Linux. Un solo binario nativo por plataforma.</p>
                            </div>
                        </div>
                        <div class="flex gap-3 items-start p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                            <div class="p-2 bg-blue-50 text-primary rounded-lg shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 00-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0020 4.77 5.07 5.07 0 0019.91 1S18.73.65 16 2.48a13.38 13.38 0 00-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 005 4.77a5.44 5.44 0 00-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 009 18.13V22"/>
                                </svg>
                            </div>
                            <div>
                                <h5 class="font-bold text-sm text-slate-800 mb-1">Open Source</h5>
                                <p class="text-xs text-slate-600">Código abierto en GitHub. La comunidad puede contribuir.</p>
                            </div>
                        </div>
                        <div class="flex gap-3 items-start p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                            <div class="p-2 bg-amber-50 text-amber-600 rounded-lg shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h5 class="font-bold text-sm text-amber-700 mb-1">Beta para supporters</h5>
                                <p class="text-xs text-slate-600">Acceso anticipado a builds de desarrollo via Patreon.</p>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Canvas & Navegación -->
                <div>
                    <h4 class="font-bold text-slate-900 mb-4 border-b border-slate-200 pb-2 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-primary shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
                        Canvas &amp; Navegación
                    </h4>
                    <ul class="space-y-2 text-sm text-slate-700 font-sans">
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Zoom &amp; Pan</strong> — Ctrl+rueda (75–300% centrado en cursor), Z para zoom a selección, Shift+Z reset, arrastrar con botón central.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>QuickAdd</strong> — Espacio o doble clic abre un popup de búsqueda instantánea; Enter suelta el módulo donde está el cursor.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Canvas Split Poly/Common</strong> — igual que el editor original, con soporte Multi-Slot A/B/C/D independiente.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Multi-selección, arrastrar y soltar, copiar, pegar, duplicar</strong> — incluyendo "Duplicar con cables" para clonar cadenas completas.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Undo/Redo completo</strong> — módulos, cables, parámetros, morphs, renombrado. Las operaciones multi-módulo se deshacen en un solo paso.</div></li>
                    </ul>
                </div>

                <!-- Módulos & Visual -->
                <div>
                    <h4 class="font-bold text-slate-900 mb-4 border-b border-slate-200 pb-2 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-primary shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="8" cy="12" r="3"/><circle cx="16" cy="12" r="3"/><path stroke-linecap="round" stroke-linejoin="round" d="M8 5v2m0 10v2m8-2v2m0-14v2"/></svg>
                        Módulos &amp; Visual
                    </h4>
                    <ul class="space-y-2 text-sm text-slate-700 font-sans">
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>+110 módulos renderizados</strong> — knobs, sliders y displays personalizados para envelopes, LFOs, filtros, etc.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Tema oscuro/claro en tiempo real</strong> — toggle desde View → Theme. Esquema de color de 50 campos y 86 variables para cambio instantáneo sin reiniciar.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Iconos de forma de onda reales</strong> — todos los osciladores y LFOs muestran su forma (seno, triángulo, sierra, cuadrada, ruido). Vista LFO animada en tiempo real.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Displays con valores reales</strong> — frecuencia en Hz, fase en grados, ratios de parciales, BPM, segundos según contexto.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Cables con colores por tipo de señal</strong> — shake para redistribuir cables solapados, indicador visual de cables ocultos en conectores.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Conectores visuales claros</strong> — salidas redondas, entradas cuadradas con ranura que simula el conector físico.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>DrumSynth con presets propios</strong> — guarda configuraciones en el módulo, aparecen en el menú desplegable al instante.</div></li>
                    </ul>
                </div>

                <!-- Parámetros & Morphs -->
                <div>
                    <h4 class="font-bold text-slate-900 mb-4 border-b border-slate-200 pb-2 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-primary shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 21v-6m0-4V3m8 18v-3m0-4V3m8 18v-6m0-4V3"/><circle cx="4" cy="11" r="2"/><circle cx="12" cy="14" r="2"/><circle cx="20" cy="11" r="2"/></svg>
                        Parámetros, Morphs &amp; Snapshots
                    </h4>
                    <ul class="space-y-2 text-sm text-slate-700 font-sans">
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Edición bidireccional en tiempo real</strong> — knobs, sliders y botones envían cambios al sintetizador al instante.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Menú contextual por parámetro</strong> — valor por defecto, zero morph, cambio de grupo de morph (1–4). Ctrl expande el rango bipolar de modulación.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Randomización (Ctrl+R)</strong> — algoritmo Simple (uniforme) o Gaussiano (musical, sesgado al centro). Excluye automáticamente morphs, mutes y volúmenes.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Bloqueo de parámetros</strong> — clic derecho para bloquear un knob o slider (candado amarillo). La inicialización y la randomización respetan los bloqueos.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Inspector de módulo</strong> — panel con todos los morphs, mapeos de knob hardware y asignaciones MIDI CC del módulo seleccionado. Edición de intensidades al estilo Bitwig.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>8 Snapshots de parámetros</strong> — guarda/recupera estados completos. Interpolación temporal de Instant a 60 s con morph suave a 30 ms y barra de progreso visual.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Patch Settings (Ctrl+P)</strong> — voces, rango de velocity/teclado, modo de pedal, bend range, portamento, octave shift y retrigger — todo en tiempo real.</div></li>
                    </ul>
                </div>

                <!-- Comunicación con el sintetizador -->
                <div>
                    <h4 class="font-bold text-slate-900 mb-4 border-b border-slate-200 pb-2 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-primary shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>
                        Comunicación con el sintetizador
                    </h4>
                    <ul class="space-y-2 text-sm text-slate-700 font-sans">
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>MIDI SysEx completo</strong> — auto-conexión, recuperación de parches y sincronización de parámetros en tiempo real con el Nord Modular G1.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Browser de parches</strong> — 9 bancos (891 slots), búsqueda en tiempo real, filtro "ocultar vacíos", doble clic para cargar, clic derecho para copiar/mover/eliminar.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Envío de parche al synth</strong> — protocolo ACK correcto (sección por sección) con opción de almacenar en banco. I/O de archivos .pch.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Multi-Slot A/B/C/D</strong> — cada slot con su propio parche, historial de undo y sincronización live independiente.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Edición de nombre en tiempo real</strong> — doble clic en el nombre del parche para renombrarlo (máx. 15 caracteres, limitación del hardware). Quick Save con un clic.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Ayuda de módulos (F1)</strong> — documentación original v3.03 con descripción y explicación por parámetro de los 157 módulos.</div></li>
                    </ul>
                </div>

            </div>

            <aside class="space-y-6">

                <!-- Coming Soon buy card -->
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-lg relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full blur-3xl pointer-events-none"></div>
                    <div class="relative z-10">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-3xl font-bold text-slate-400">— €</span>
                            <span class="bg-amber-100 text-amber-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">Coming Soon</span>
                        </div>
                        <button disabled
                                class="block w-full text-center bg-slate-200 text-slate-400 font-bold py-4 px-6 rounded-xl cursor-not-allowed select-none">
                            Coming Soon
                        </button>
                        <p class="text-xs text-slate-400 text-center mt-3 font-sans leading-relaxed">
                            Mientras tanto, accede a la beta<br>apoyando en Patreon
                        </p>
                        <a href="https://www.patreon.com/c/animatek"
                           target="_blank"
                           style="background-color:#FF424D;color:#ffffff;"
                           class="mt-3 flex items-center justify-center gap-2 w-full text-center hover:opacity-90 font-bold py-3 px-6 rounded-xl transition-all transform hover:-translate-y-0.5 shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M14.82 2.41C11.57 2.41 8.93 5.05 8.93 8.3c0 3.24 2.64 5.88 5.89 5.88 3.24 0 5.88-2.64 5.88-5.88 0-3.25-2.64-5.89-5.88-5.89zM3.1 21.59h3.17V2.41H3.1v19.18z"/>
                            </svg>
                            Convertirse en supporter
                        </a>
                    </div>
                </div>

                <!-- Beta changelog -->
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                    <div class="flex items-center gap-2 mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
                        </svg>
                        <h4 class="font-bold text-slate-900">Beta log · <span class="text-primary">v0.5.2</span></h4>
                    </div>
                    <ul class="space-y-3 text-sm text-slate-700 font-sans">
                        <li class="flex items-start gap-2">
                            <span class="text-lg leading-none mt-0.5">🎹</span>
                            <div><strong class="text-slate-800">Piano-Roll en NoteSeqB</strong> — editor visual completo para secuenciación más intuitiva.</div>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-lg leading-none mt-0.5">📊</span>
                            <div><strong class="text-slate-800">Hz/kHz real</strong> — los displays de frecuencia muestran valores reales.</div>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-lg leading-none mt-0.5">🔄</span>
                            <div><strong class="text-slate-800">Smart Radio Buttons</strong> — salto directo a cualquier ajuste con un clic.</div>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-lg leading-none mt-0.5">🎼</span>
                            <div><strong class="text-slate-800">15 escalas en KeyQuantizer</strong> — Dorian, Lydian, Blues y más.</div>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-lg leading-none mt-0.5">🎲</span>
                            <div><strong class="text-slate-800">Randomización avanzada</strong> — funciones aleatorias por paso sin afectar el loop.</div>
                        </li>
                    </ul>
                    <div class="mt-5 pt-4 border-t border-slate-100 text-xs text-slate-500 font-sans">
                        Builds disponibles para Mac, Windows y Linux<br>en el post de Patreon.
                    </div>
                </div>

            </aside>
        </div>
    </section>
</main>

<?php
get_footer();
