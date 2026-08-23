<?php
/**
 * Template Name: OXI-CV
 */

get_header();

require_once get_theme_file_path( 'inc/animatek-vcv-module-template.php' );
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
                <?php animatek_vcv_modules_nav( 'oxi-cv' ); ?>
                <a href="<?php echo esc_url(home_url('/oxi-cv-eng/')); ?>" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 rounded-full text-xs font-semibold text-slate-700 hover:border-primary hover:text-primary transition shadow-sm">
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
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold tracking-widest uppercase">
                        VCV Rack · 6 HP
                    </div>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight text-slate-900">
                        OXI-<span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-cyan-600">CV</span>
                    </h1>
                    <p class="text-lg sm:text-xl text-slate-700 leading-relaxed max-w-2xl">
                        Conversor MIDI-a-CV de 6 HP diseñado específicamente para el secuenciador y controlador Oxi One. Cubre todos sus modos de salida: Mono, Poly, Chord, Multitrack y Matriceal.
                    </p>
                </div>

                <div class="relative">
                    <div class="absolute inset-0 rounded-3xl bg-white/60 blur-3xl"></div>
                    <div class="relative rounded-3xl border border-slate-200 shadow-2xl bg-slate-900 px-2 py-2">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary/20 to-cyan-500/20 blur-3xl opacity-40"></div>
                        <img src="https://animatek.net/wp-content/uploads/2026/04/Oxi_y_Expansor.webp"
                             alt="OXI-CV y OXI-CV Expansor"
                             class="w-full aspect-video object-cover object-top relative z-10 rounded-3xl">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 pb-20">
        <div class="grid lg:grid-cols-[1.4fr_0.9fr] gap-8 items-start">
            <div class="space-y-10">

                <!-- OXI-CV -->
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <span class="px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold font-mono">6 HP</span>
                        <h2 class="text-2xl font-extrabold text-slate-900">OXI-CV</h2>
                    </div>
                    <p class="text-base text-slate-700 leading-relaxed mb-8">
                        Módulo MIDI-a-CV de formato compacto creado para sacar el máximo partido al Oxi One. Convierte sus mensajes MIDI en señales CV precisas, cubriendo todos los modos de operación del controlador con un diseño de 6 HP que cabe en cualquier rack.
                    </p>

                    <h4 class="font-bold text-slate-900 mb-4 border-b border-slate-200 pb-2">Características</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="flex gap-3 items-start p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                            <div class="p-2 bg-blue-50 text-primary rounded-lg shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 18V5l12-2v13"/>
                                    <circle cx="6" cy="18" r="3"/>
                                    <circle cx="18" cy="16" r="3"/>
                                </svg>
                            </div>
                            <div>
                                <h5 class="font-bold text-sm text-slate-800 mb-1">V/Oct, Gate, Velocity</h5>
                                <p class="text-xs text-slate-600">Salidas de pitch, gate y velocity para la voz principal.</p>
                            </div>
                        </div>
                        <div class="flex gap-3 items-start p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                            <div class="p-2 bg-blue-50 text-primary rounded-lg shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="4" y="4" width="6" height="6" rx="1"/>
                                    <rect x="14" y="4" width="6" height="6" rx="1"/>
                                    <rect x="4" y="14" width="6" height="6" rx="1"/>
                                    <rect x="14" y="14" width="6" height="6" rx="1"/>
                                </svg>
                            </div>
                            <div>
                                <h5 class="font-bold text-sm text-slate-800 mb-1">8× CC outputs</h5>
                                <p class="text-xs text-slate-600">Ocho salidas de Control Change con número de CC configurable por slot.</p>
                            </div>
                        </div>
                        <div class="flex gap-3 items-start p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                            <div class="p-2 bg-blue-50 text-primary rounded-lg shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="9" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 7v5l3 3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div>
                                <h5 class="font-bold text-sm text-slate-800 mb-1">Clock & divisiones</h5>
                                <p class="text-xs text-slate-600">Salida de reloj y divisiones CLK/n de ÷1 a ÷32.</p>
                            </div>
                        </div>
                        <div class="flex gap-3 items-start p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                            <div class="p-2 bg-blue-50 text-primary rounded-lg shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 5 5L20 7"/>
                                </svg>
                            </div>
                            <div>
                                <h5 class="font-bold text-sm text-slate-800 mb-1">Run output</h5>
                                <p class="text-xs text-slate-600">Señal de arranque/parada sincronizada con el Oxi One.</p>
                            </div>
                        </div>
                        <div class="flex gap-3 items-start p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                            <div class="p-2 bg-blue-50 text-primary rounded-lg shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                                </svg>
                            </div>
                            <div>
                                <h5 class="font-bold text-sm text-slate-800 mb-1">Todos los modos Oxi One</h5>
                                <p class="text-xs text-slate-600">Compatible con Mono, Poly, Chord, Multitrack y Matriceal.</p>
                            </div>
                        </div>
                        <div class="flex gap-3 items-start p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                            <div class="p-2 bg-blue-50 text-primary rounded-lg shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3"/>
                                </svg>
                            </div>
                            <div>
                                <h5 class="font-bold text-sm text-slate-800 mb-1">Canal MIDI seleccionable</h5>
                                <p class="text-xs text-slate-600">Omni o canal específico. Compacto: solo 6 HP.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Divisor -->
                <div id="multi" class="border-t-2 border-dashed border-slate-300 pt-10 scroll-mt-24">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="px-3 py-1 rounded-full bg-slate-800 text-white text-xs font-bold font-mono">10 HP</span>
                        <h2 class="text-2xl font-extrabold text-slate-900">MULTI / OXI-CV Expansor</h2>
                        <span class="px-2 py-0.5 rounded bg-slate-100 text-slate-500 text-[11px] font-semibold">Expander</span>
                    </div>
                    <p class="text-base text-slate-700 leading-relaxed mb-8">
                        Expansor de 10 HP que desbloquea las capacidades multitracks de OXI-CV. Debe colocarse inmediatamente a la derecha del módulo principal. La comunicación es automática mediante el enlace de expander.
                    </p>

                    <div class="bg-white rounded-2xl p-8 border border-slate-200 shadow-sm relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-48 h-48 bg-slate-800/5 rounded-full blur-3xl"></div>
                        <div class="relative z-10">
                            <h4 class="font-bold text-slate-900 mb-6 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 3h4v4M7 21H3v-4M21 3l-7 7M3 21l7-7"/>
                                </svg>
                                Características
                            </h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-sm text-slate-700">
                                <div class="space-y-4">
                                    <div>
                                        <strong class="block text-slate-800 mb-1">8 tracks configurables</strong>
                                        Salidas independientes de V/Oct, Gate y Velocity por cada track.
                                    </div>
                                    <div>
                                        <strong class="block text-slate-800 mb-1">Modos Multitrack & Matriceal</strong>
                                        Funciona en paralelo con OXI-CV para los modos que requieren múltiples voces.
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <div>
                                        <strong class="block text-slate-800 mb-1">Colocación</strong>
                                        Debe ir inmediatamente a la derecha de OXI-CV para establecer el enlace de expander.
                                    </div>
                                    <div>
                                        <strong class="block text-slate-800 mb-1">Configuración espejada</strong>
                                        Refleja la configuración de tracks activos de OXI-CV mediante el enlace.
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 p-4 rounded-xl bg-slate-50 border border-slate-200 text-xs text-slate-600 font-mono">
                                <span class="text-primary font-bold">OXI-CV</span> · · · <span class="text-slate-800 font-bold">OXI-CV EXPANSOR</span>
                                <span class="block mt-1 text-slate-400">← enlace automático · colocar adyacentes →</span>
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
                    <div class="space-y-3">
                        <a href="https://library.vcvrack.com/Animatek/OxiCv"
                           target="_blank"
                           class="block w-full text-center bg-primary hover:bg-primary/90 text-white font-bold py-3 px-6 rounded-xl transition-all transform hover:-translate-y-1 shadow-md shadow-primary/20 flex items-center justify-center gap-2">
                            <i data-lucide="download-cloud" class="w-5 h-5"></i>
                            OXI-CV
                        </a>
                        <a href="https://library.vcvrack.com/Animatek/OxiCvExp"
                           target="_blank"
                           class="block w-full text-center bg-primary hover:bg-primary/90 text-white font-bold py-3 px-6 rounded-xl transition-all transform hover:-translate-y-1 shadow-md shadow-primary/20 flex items-center justify-center gap-2">
                            <i data-lucide="download-cloud" class="w-5 h-5"></i>
                            OXI-CV Expansor
                        </a>
                    </div>
                    <p class="text-xs text-slate-500 text-center mt-4 font-sans leading-relaxed">
                        Disponible para VCV Rack Free & Pro.<br>Compatible con Windows, Mac y Linux.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                    <h4 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                        <i data-lucide="cpu" class="w-5 h-5 text-slate-400"></i> Requisitos
                    </h4>
                    <ul class="space-y-2 text-sm text-slate-700 font-sans">
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> VCV Rack 2.x (Free o Pro)</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Oxi One (firmware actualizado)</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Conexión MIDI entre Oxi One y VCV</li>
                    </ul>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-2">
                    <h5 class="text-sm font-semibold text-slate-800 flex items-center gap-2">
                        <i data-lucide="info" class="w-4 h-4 text-primary"></i> Modos Oxi One soportados
                    </h5>
                    <ul class="space-y-1.5 text-sm text-slate-700 font-sans">
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-primary shrink-0"></span> Mono</li>
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-primary shrink-0"></span> Poly</li>
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-primary shrink-0"></span> Chord</li>
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-primary shrink-0"></span> Multitrack <span class="text-xs text-slate-400">(requiere Expansor)</span></li>
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-primary shrink-0"></span> Matriceal <span class="text-xs text-slate-400">(requiere Expansor)</span></li>
                    </ul>
                </div>
            </aside>
        </div>
    </section>
</main>

<?php
get_footer();
