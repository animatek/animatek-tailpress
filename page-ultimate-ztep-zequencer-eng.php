<?php
/**
 * Template Name: UZZ Max for Live (EN)
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
                <?php animatek_vcv_modules_nav( 'ultimate-ztep-zequencer-eng', 'en' ); ?>
                <a href="<?php echo esc_url(home_url('/ultimate-ztep-zequencer')); ?>" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 rounded-full text-xs font-semibold text-slate-700 hover:border-primary hover:text-primary transition shadow-sm">
                    <span>ES</span>
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
                        16-step sequencer built in Max for Live with random functions and a modulation matrix that can control any parameter in Live. Performance-oriented to improvise and generate evolving sequences on the fly.
                    </p>
                </div>

                <div class="relative">
                    <div class="absolute inset-0 rounded-3xl bg-white/60 blur-3xl"></div>
                    <div class="relative overflow-hidden rounded-3xl border border-slate-200 shadow-2xl bg-white">
                        <div class="absolute inset-x-0 top-0 h-28 bg-gradient-to-b from-primary/10 via-transparent to-transparent pointer-events-none"></div>
                        <img src="https://animatek.net/wp-content/uploads/2017/08/screenshot.png"
                             alt="UZZ Max for Live Interface"
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
                        <h3 class="text-2xl font-bold text-slate-900">The brain of your Live Set</h3>
                    </div>
                    <p class="text-base sm:text-lg text-slate-700 leading-relaxed">
                        UZZ is built to break creative blocks. Twist a couple of knobs and turn a basic MIDI line into a pattern with pitch, swing, probability, and modulation variations.
                    </p>
                    <p class="text-base sm:text-lg text-slate-700 leading-relaxed">
                        Its real power is the ability to <strong>automate any Ableton parameter</strong> using its modulation matrix. Turn a simple MIDI loop into a complex structure of timbral and rhythmic changes.
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
                        Per-step parameters
                    </h4>
                    <div class="grid grid-cols-1 gap-3 text-sm text-slate-700">
                        <div class="flex items-start gap-2">
                            <span class="text-primary">•</span>
                            <div><strong>Pitch & Octave:</strong> 0 to 12 semitones and -2 to +2 octaves per step.</div>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary">•</span>
                            <div><strong>Velocity & Duration:</strong> velocity 0-127 and note lengths from 1/128 to 1/2.</div>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary">•</span>
                            <div><strong>Play/Mute:</strong> mute steps to build syncopated grooves.</div>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary">•</span>
                            <div><strong>M1-M2 lanes:</strong> two extra sequencers dedicated to modulation.</div>
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
                        Global control
                    </h4>
                    <div class="space-y-3 text-sm text-slate-700">
                        <div class="flex items-start gap-2">
                            <span class="text-primary">•</span>
                            <div><strong>Playback direction:</strong> Forward, Backward, Back & Forth, Random, and Drunk.</div>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary">•</span>
                            <div><strong>Quantization:</strong> from 1/2 to 1/32, including triplets and dotted values.</div>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary">•</span>
                            <div><strong>Generative scales:</strong> pick tonic and scale (Chromatic, Dorian, Mixolydian, Pentatonic, etc.).</div>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary">•</span>
                            <div><strong>Swing:</strong> add groove and humanization by percentage.</div>
                        </div>
                    </div>
                    <div class="mt-4 p-4 rounded-xl border border-primary/20 bg-primary/5 shadow-sm">
                        <h5 class="text-sm font-semibold text-primary mb-2 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 9h6m-6 4h4m-4 4h6" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13 5h7m-7 4h5m-5 4h7m-7 4h5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Fast workflow
                        </h5>
                        <p class="text-sm text-slate-700 mb-0">
                            Forget manual preset saving. UZZ stores state when switching slots. Copy and paste patterns on the fly.
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
                            Route modulation from Pitch, Velocity, Duration, or M1/M2 lanes to any destination in Ableton or external hardware.
                        </p>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm font-mono text-slate-600">
                            <li class="flex items-center gap-2"><span class="text-primary">></span> 4x Parameter Maps (Ableton)</li>
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
                        <span class="text-3xl font-bold text-slate-900">€10</span>
                        <span class="bg-green-100 text-green-700 text-xs font-bold px-2 py-1 rounded uppercase">Version 3.2</span>
                    </div>
                    <a href="https://animatek.net/pago/?line_items%5B0%5D%5Bprice_id%5D=d9000889-837b-4f7e-8a7e-3e9ca2e2259e&line_items%5B0%5D%5Bquantity%5D=1"
                       target="_blank"
                       class="block w-full text-center bg-primary hover:bg-primary/90 text-white font-bold py-4 px-6 rounded-xl transition-all transform hover:-translate-y-1 shadow-md shadow-[0_16px_30px_-22px_rgba(33,112,245,0.6)]">
                        Buy now
                    </a>
                    <p class="text-xs text-slate-500 text-center mt-3 flex justify-center items-center gap-1 font-sans">
                        <i data-lucide="shield-check" class="w-3 h-3"></i> Secure payment & instant download
                    </p>
                </div>

                <div class="rounded-2xl overflow-hidden shadow-md border border-slate-200 bg-white">
                    <iframe width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/7336598&show_artwork=false&color=%232170F5&auto_play=false&hide_related=true&show_comments=false&show_user=true&show_reposts=false&show_teaser=false"></iframe>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <h4 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                        <i data-lucide="cpu" class="w-5 h-5 text-slate-400"></i> System requirements
                    </h4>
                    <ul class="space-y-2 text-sm text-slate-700 font-sans">
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Ableton Live 10, 11 or 12 Suite with a Max for Live license</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Max for Live 8</li>
                        <li class="mt-3 text-xs text-slate-500 border-t border-slate-100 pt-2">
                            *Includes Legacy version (UZZ 2.1) compatible with Ableton 8 / Max 6.
                        </li>
                    </ul>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                    <div class="flex items-center gap-2 text-sm font-semibold text-slate-800">
                        <i data-lucide="sparkles" class="w-4 h-4 text-primary"></i> What's new v3.2
                    </div>
                    <ul class="space-y-2 text-sm text-slate-700 list-disc pl-4 marker:text-primary font-sans">
                        <li>Optimized code: 48% lighter and faster.</li>
                        <li>Improved GUI and dropdown menus.</li>
                        <li>Auto-quantize adjustment.</li>
                        <li>Copy/Paste preset system.</li>
                        <li>Push compatibility (experimental banks).</li>
                    </ul>
                </div>
            </aside>
        </div>
    </section>
</main>

<?php
get_footer();
