<?php
/**
 * Template Name: UZZ Max for Live
 */

get_header();

require_once get_theme_file_path( 'inc/animatek-vcv-module-template.php' );
?>

<main id="primary" class="bg-slate-200 text-slate-900">
    <section class="animatek-hero-section relative overflow-hidden px-6 sm:px-10 py-16 bg-gradient-to-br from-slate-50 via-white to-slate-100 text-slate-900 mb-[6.25rem]">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -left-24 -top-16 h-72 w-72 bg-primary/15 blur-3xl rounded-full"></div>
            <div class="absolute right-10 top-10 h-64 w-64 bg-cyan-300/20 blur-3xl rounded-full"></div>
            <div class="absolute -right-20 bottom-0 h-72 w-72 bg-indigo-300/20 blur-3xl rounded-full"></div>
        </div>

        <div class="max-w-7xl mx-auto space-y-6 lg:space-y-8 relative z-10">
            <div class="flex flex-wrap items-center gap-3">
                <?php animatek_vcv_modules_nav( 'ultimate-ztep-zequencer' ); ?>
                <a href="<?php echo esc_url(home_url('/ultimate-ztep-zequencer-eng')); ?>" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 rounded-full text-xs font-semibold text-slate-700 hover:border-primary hover:text-primary transition shadow-sm">
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
                    UZZ <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-cyan-600">Sequencer</span>
                </h1>
                <p class="text-lg sm:text-xl text-slate-700 leading-relaxed max-w-2xl">
                    Secuenciador de 16 pasos creado en Max for Live, con funciones aleatorias y una matriz de modulación capaz de controlar cualquier parámetro de Live. Una herramienta orientada al directo, diseñada para improvisar y generar secuencias en evolución al vuelo.
                </p>
            </div>

            <div class="relative">
                <div class="absolute inset-0 rounded-3xl bg-white/60 blur-3xl"></div>
                <div class="relative overflow-hidden rounded-3xl border border-slate-200 shadow-2xl bg-white">
                        <div class="absolute inset-x-0 top-0 h-28 bg-gradient-to-b from-primary/10 via-transparent to-transparent pointer-events-none"></div>
                        <img src="https://animatek.net/wp-content/uploads/2017/08/screenshot.png"
                             alt="Interfaz UZZ Max for Live"
                             class="w-full aspect-video object-cover object-top">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 pb-20">
        <div class="grid lg:grid-cols-[1.4fr_0.9fr] gap-8 items-start">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="rounded-[1.75rem] border border-slate-200 bg-white shadow-sm p-6 sm:p-8 space-y-4 lg:col-span-2">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"/>
                        </svg>
                        <h3 class="text-2xl font-bold text-slate-900">El cerebro de tu Live Set</h3>
                    </div>
                    <p class="text-base sm:text-lg text-slate-700 leading-relaxed">
                        UZZ no es solo un secuenciador más. Es una herramienta diseñada para romper bloqueos creativos. Con este dispositivo podrás crear secuencias increíbles modificando sus parámetros aleatoriamente.
                    </p>
                    <p class="text-base sm:text-lg text-slate-700 leading-relaxed">
                        Además, su verdadera potencia reside en la capacidad de <strong>automatizar cualquier parámetro de Ableton</strong> utilizando su matriz de modulaciones. Convierte una secuencia MIDI simple en una estructura compleja de cambios tímbricos y rítmicos.
                    </p>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-7">
                    <h4 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 21v-6m0-4V3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4 11a2 2 0 1 0 0-4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10 15H4m6-4H4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14 21v-3m0-4V3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14 17a2 2 0 1 0 0-4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20 15h-6m6-4h-6" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 6v3m0 4v8" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 10a2 2 0 1 0 0 4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15 6h-6m6 8h-6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Parámetros por paso
                    </h4>
                    <div class="grid grid-cols-1 gap-3 text-sm text-slate-700">
                        <div class="flex items-start gap-2">
                            <span class="text-primary">•</span>
                            <div><strong>Pitch & Octava:</strong> rango de 0 a 12 semitonos y desplazamiento de -2 a +2 octavas por paso.</div>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary">•</span>
                            <div><strong>Velocidad & Duración:</strong> ajuste dinámico de velocity (0-127) y duración de nota (128n a 2n).</div>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary">•</span>
                            <div><strong>Modo Play/Mute:</strong> activa o desactiva pasos individuales para crear ritmos sincopados.</div>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary">•</span>
                            <div><strong>Controles M1-M2:</strong> dos secuenciadores extra dedicados exclusivamente a modulación.</div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200 shadow-sm">
                    <h4 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="9" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3 12h18" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 3c2.5 3.5 2.5 14 0 18" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7 5c1.5 2 1.5 12 0 14" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17 5c-1.5 2-1.5 12 0 14" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Control Global
                    </h4>
                    <div class="space-y-3 text-sm text-slate-700">
                        <div class="flex items-start gap-2">
                            <span class="text-primary">•</span>
                            <div><strong>Dirección de Reproducción:</strong> Forward, Backward, Back & Forth, Random y Drunk (Ebrio).</div>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary">•</span>
                            <div><strong>Cuantización:</strong> desde 1/2 hasta 1/32, incluyendo tresillos (Triplets) y puntillo (Dotted).</div>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary">•</span>
                            <div><strong>Escalas Generativas:</strong> selecciona tónica y escala (Chromática, Dórica, Mixolidia, Pentatónica, etc.).</div>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary">•</span>
                            <div><strong>Swing:</strong> añade groove y humanización porcentual.</div>
                        </div>
                    </div>
                    <div class="mt-4 p-4 rounded-xl border border-primary/20 bg-primary/5 shadow-sm">
                        <h5 class="text-sm font-semibold text-primary mb-2 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 9h6m-6 4h4m-4 4h6" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13 5h7m-7 4h5m-5 4h7m-7 4h5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Workflow Rápido
                        </h5>
                        <p class="text-sm text-slate-700 mb-0">
                            Olvídate de guardar presets manualmente. UZZ guarda el estado al cambiar de slot. Copia y pega patrones al vuelo.
                        </p>
                    </div>
                </div>

                <div class="bg-white rounded-[1.5rem] border border-slate-200 shadow-sm p-6 sm:p-8 relative overflow-hidden lg:col-span-2">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary/10 rounded-full blur-3xl"></div>
                    <div class="relative z-10 space-y-3">
                        <h4 class="text-slate-900 font-bold flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="6" cy="6" r="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="18" cy="6" r="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="6" cy="18" r="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="18" cy="18" r="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8 6h8M6 8v8m12-8v8M8 18h8" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8 8 16 16M8 16l8-8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Matrix Modulation
                        </h4>
                        <p class="text-sm text-slate-700 font-sans">
                            Envía señales de modulación desde el Tono, Velocidad, Duración o los controles M1/M2 hacia cualquier destino en Ableton o hardware externo.
                        </p>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm font-mono text-slate-600">
                            <li class="flex items-center gap-2"><span class="text-primary">></span> 4x Mapas de Parámetros (Ableton)</li>
                            <li class="flex items-center gap-2"><span class="text-primary">></span> 2x Control Change (CC)</li>
                            <li class="flex items-center gap-2"><span class="text-primary">></span> Program Change (PC)</li>
                            <li class="flex items-center gap-2"><span class="text-primary">></span> Pitch Bend & AfterTouch</li>
                        </ul>
                    </div>
                </div>

            </div>

            <aside class="space-y-6 lg:space-y-8">
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-lg lg:sticky lg:top-6">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-3xl font-bold text-slate-900">10€</span>
                        <span class="bg-green-100 text-green-700 text-xs font-bold px-2 py-1 rounded uppercase">Versión 3.2</span>
                    </div>
                    <a href="https://animatek.net/pago/?line_items%5B0%5D%5Bprice_id%5D=d9000889-837b-4f7e-8a7e-3e9ca2e2259e&line_items%5B0%5D%5Bquantity%5D=1"
                       target="_blank"
                       class="block w-full text-center bg-primary hover:bg-primary/90 text-white font-bold py-4 px-6 rounded-xl transition-all transform hover:-translate-y-1 shadow-md shadow-[0_16px_30px_-22px_rgba(33,112,245,0.6)]">
                        Comprar Ahora
                    </a>
                    <p class="text-xs text-slate-500 text-center mt-3 flex justify-center items-center gap-1 font-sans">
                        <i data-lucide="shield-check" class="w-3 h-3"></i> Pago seguro & Descarga inmediata
                    </p>
                </div>

                <div class="rounded-2xl overflow-hidden shadow-md border border-slate-200 bg-white">
                    <iframe width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/7336598&show_artwork=false&color=%232170F5&auto_play=false&hide_related=true&show_comments=false&show_user=true&show_reposts=false&show_teaser=false"></iframe>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <h4 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                        <i data-lucide="cpu" class="w-5 h-5 text-slate-400"></i> Requisitos del Sistema
                    </h4>
                    <ul class="space-y-2 text-sm text-slate-700 font-sans">
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Ableton Live 10, 11 o 12 Suite con licencia de Max for Live</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Max for Live 8</li>
                        <li class="mt-3 text-xs text-slate-500 border-t border-slate-100 pt-2">
                            *Incluye versión Legacy (UZZ 2.1) compatible con Ableton 8 / Max 6.
                        </li>
                    </ul>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                    <div class="flex items-center gap-2 text-sm font-semibold text-slate-800">
                        <i data-lucide="sparkles" class="w-4 h-4 text-primary"></i> Novedades v3.2
                    </div>
                    <ul class="space-y-2 text-sm text-slate-700 list-disc pl-4 marker:text-primary font-sans">
                        <li>Código optimizado: 48% más ligero y rápido.</li>
                        <li>Interfaz gráfica mejorada y menús desplegables.</li>
                        <li>Ajuste automático de cuantización.</li>
                        <li>Sistema de Copy/Paste de presets.</li>
                        <li>Compatible con Push (Bancos experimentales).</li>
                    </ul>
                </div>
            </aside>
        </div>
    </section>
</main>

<?php
get_footer();
