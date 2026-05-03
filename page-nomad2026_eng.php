<?php
/**
 * Template Name: NOMAD 2026 ENG
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
                    <a href="<?php echo esc_url(home_url('/ultimate-ztep-zequencer-eng')); ?>" class="px-3 py-1.5 rounded-full text-xs font-semibold text-slate-700 hover:text-primary hover:bg-slate-100 transition">
                        UZZ · Max for Live
                    </a>
                    <a href="<?php echo esc_url(home_url('/oxi-cv')); ?>" class="px-3 py-1.5 rounded-full text-xs font-semibold text-slate-700 hover:text-primary hover:bg-slate-100 transition">
                        OXI-CV
                    </a>
                    <span class="px-3 py-1.5 rounded-full text-xs font-semibold bg-primary text-white shadow-sm" aria-current="page">
                        Nomad2026
                    </span>
                </div>
                <a href="<?php echo esc_url(home_url('/nomad2026')); ?>" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 rounded-full text-xs font-semibold text-slate-700 hover:border-primary hover:text-primary transition shadow-sm">
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
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-100 text-amber-700 text-xs font-bold tracking-widest uppercase">
                        <span class="w-2 h-2 bg-amber-500 rounded-full animate-pulse"></span>
                        Beta in development · Patreon
                    </div>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight text-slate-900">
                        Nomad<span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-cyan-600">2026</span>
                    </h1>
                    <p class="text-lg sm:text-xl text-slate-700 leading-relaxed max-w-2xl">
                        A brand-new universal editor for the legendary <strong>Nord Modular G1</strong>, built from scratch with the JUCE framework. Native on Windows, Mac and Linux.
                    </p>
                    <div class="flex flex-wrap gap-3 pt-2">
                        <a href="https://www.patreon.com/c/animatek"
                           target="_blank"
                           style="background-color:#FF424D;color:#ffffff;"
                           class="inline-flex items-center gap-2 hover:opacity-90 font-bold py-3 px-6 rounded-xl transition-all transform hover:-translate-y-1 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M14.82 2.41C11.57 2.41 8.93 5.05 8.93 8.3c0 3.24 2.64 5.88 5.89 5.88 3.24 0 5.88-2.64 5.88-5.88 0-3.25-2.64-5.89-5.88-5.89zM3.1 21.59h3.17V2.41H3.1v19.18z"/>
                            </svg>
                            Support on Patreon
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
                             alt="Nomad2026 – Nord Modular G1 Editor"
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
                        <p class="text-lg sm:text-xl font-semibold leading-tight mb-0 text-left">What is Nomad2026?</p>
                    </div>
                    <div class="space-y-3 text-slate-700 leading-relaxed">
                        <p class="text-base">A brand-new, universal editor for the legendary <strong>Nord Modular G1</strong>. Built from scratch using the <strong>JUCE</strong> framework, bringing the heavy lifting of the old Java-based NOMAD into modern technologies.</p>
                        <p class="text-base">The goal is to make it run natively and smoothly on <strong>Windows, Mac and Linux</strong>, without any Java dependency or legacy runtimes. An open-source project led by Animatek.</p>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-slate-900 mb-6 border-b border-slate-200 pb-2">Tech stack</h4>
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
                                <p class="text-xs text-slate-600">Native C++. Real performance, no emulation layers.</p>
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
                                <h5 class="font-bold text-sm text-slate-800 mb-1">Cross-platform</h5>
                                <p class="text-xs text-slate-600">Windows, Mac and Linux. One native binary per platform.</p>
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
                                <p class="text-xs text-slate-600">Open code on GitHub. Community contributions welcome.</p>
                            </div>
                        </div>
                        <div class="flex gap-3 items-start p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                            <div class="p-2 bg-amber-50 text-amber-600 rounded-lg shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h5 class="font-bold text-sm text-amber-700 mb-1">Beta for supporters</h5>
                                <p class="text-xs text-slate-600">Early access to development builds via Patreon.</p>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Canvas & Navigation -->
                <div>
                    <h4 class="font-bold text-slate-900 mb-4 border-b border-slate-200 pb-2 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-primary shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
                        Canvas &amp; Navigation
                    </h4>
                    <ul class="space-y-2 text-sm text-slate-700 font-sans">
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Zoom &amp; Pan</strong> — Ctrl+wheel (75–300% centered on cursor), Z to zoom-to-selection, Shift+Z reset, middle-click drag to pan.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>QuickAdd</strong> — Space or double-click opens an instant search popup; hit Enter to drop any module right where your cursor is.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Split Poly/Common canvas</strong> — just like the original editor, with independent Multi-Slot A/B/C/D support.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Multi-select, drag &amp; drop, copy, paste, duplicate</strong> — including "Duplicate with cables" to clone entire module chains at once.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Full Undo/Redo</strong> — modules, cables, parameters, morphs, renames. Multi-module operations undo in a single step.</div></li>
                    </ul>
                </div>

                <!-- Modules & Visuals -->
                <div>
                    <h4 class="font-bold text-slate-900 mb-4 border-b border-slate-200 pb-2 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-primary shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="8" cy="12" r="3"/><circle cx="16" cy="12" r="3"/><path stroke-linecap="round" stroke-linejoin="round" d="M8 5v2m0 10v2m8-2v2m0-14v2"/></svg>
                        Modules &amp; Visuals
                    </h4>
                    <ul class="space-y-2 text-sm text-slate-700 font-sans">
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>110+ modules rendered</strong> — knobs, sliders and custom displays for envelopes, LFOs, filters, and more.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Dark / Light theme at runtime</strong> — toggle via View → Theme. 50-field ColorScheme with 86 variables for instant switching without restarting.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Real waveform icons</strong> — all oscillators and LFOs render their actual shape (sine, triangle, saw, square, noise). LFO viewer animates in real time.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Accurate value displays</strong> — frequency in Hz, phase in degrees, partial ratios, BPM, seconds — all context-aware.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Signal-type coloured cables</strong> — shake to redistribute overlapping cables, visual indicator for hidden cables on connectors.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Clear connector visuals</strong> — round outputs, square inputs with a physical-connector notch for easy patching.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>DrumSynth custom presets</strong> — save configurations directly in the module; they appear in the dropdown instantly.</div></li>
                    </ul>
                </div>

                <!-- Parameters & Morphs -->
                <div>
                    <h4 class="font-bold text-slate-900 mb-4 border-b border-slate-200 pb-2 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-primary shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 21v-6m0-4V3m8 18v-3m0-4V3m8 18v-6m0-4V3"/><circle cx="4" cy="11" r="2"/><circle cx="12" cy="14" r="2"/><circle cx="20" cy="11" r="2"/></svg>
                        Parameters, Morphs &amp; Snapshots
                    </h4>
                    <ul class="space-y-2 text-sm text-slate-700 font-sans">
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Bidirectional real-time editing</strong> — knobs, sliders and buttons send changes to the synth instantly.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Per-parameter context menu</strong> — default value, zero morph, morph group change (1–4). Hold Ctrl to expand the bipolar modulation range.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Randomization (Ctrl+R)</strong> — Simple (uniform) or Gaussian (musical, centre-biased) algorithm. Auto-excludes morphs, mutes, and volumes.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Parameter Locks</strong> — right-click to lock any knob or slider (yellow padlock). Initialization and randomization both respect locks.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Module Inspector</strong> — panel showing all morph assignments, hardware knob mappings and MIDI CC assignments. Edit morph intensities Bitwig-style.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>8 Parameter Snapshots</strong> — save/recall complete states. Timed interpolation from Instant to 60 s with smooth 30 ms morph and progress bar.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Patch Settings (Ctrl+P)</strong> — voices, velocity/keyboard range, pedal mode, bend range, portamento, octave shift, retrigger — all syncing in real time.</div></li>
                    </ul>
                </div>

                <!-- Synth Communication -->
                <div>
                    <h4 class="font-bold text-slate-900 mb-4 border-b border-slate-200 pb-2 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-primary shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>
                        Synth Communication
                    </h4>
                    <ul class="space-y-2 text-sm text-slate-700 font-sans">
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Full MIDI SysEx</strong> — auto-connect, patch retrieval and real-time parameter sync with the Nord Modular G1.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Patch Browser</strong> — 9 banks (891 slots), real-time search, hide-empty filter, double-click to load, right-click to copy/move/delete.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Send Patch to Synth</strong> — correct ACK protocol (section by section) with optional Store to Bank. .pch file I/O.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Multi-Slot A/B/C/D</strong> — each slot has its own patch, undo history and live sync — fully independent.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Real-time patch naming</strong> — double-click the name in the header to rename (max 15 chars, hardware limit). One-click Quick Save.</div></li>
                        <li class="flex items-start gap-2"><span class="text-primary mt-0.5 shrink-0">›</span><div><strong>Module Help (F1)</strong> — original v3.03 documentation with description and per-parameter explanation for all 157 modules.</div></li>
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
                            In the meantime, access the beta<br>by supporting on Patreon
                        </p>
                        <a href="https://www.patreon.com/c/animatek"
                           target="_blank"
                           style="background-color:#FF424D;color:#ffffff;"
                           class="mt-3 flex items-center justify-center gap-2 w-full text-center hover:opacity-90 font-bold py-3 px-6 rounded-xl transition-all transform hover:-translate-y-0.5 shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M14.82 2.41C11.57 2.41 8.93 5.05 8.93 8.3c0 3.24 2.64 5.88 5.89 5.88 3.24 0 5.88-2.64 5.88-5.88 0-3.25-2.64-5.89-5.88-5.89zM3.1 21.59h3.17V2.41H3.1v19.18z"/>
                            </svg>
                            Become a supporter
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
                            <div><strong class="text-slate-800">Piano-Roll in NoteSeqB</strong> — fully functional visual editor for more intuitive sequencing.</div>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-lg leading-none mt-0.5">📊</span>
                            <div><strong class="text-slate-800">Hz/kHz display</strong> — frequency displays now show actual Hz/kHz values.</div>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-lg leading-none mt-0.5">🔄</span>
                            <div><strong class="text-slate-800">Smart Radio Buttons</strong> — jump directly to any setting with a single click.</div>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-lg leading-none mt-0.5">🎼</span>
                            <div><strong class="text-slate-800">15 scales in KeyQuantizer</strong> — Dorian, Lydian, Blues and more.</div>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-lg leading-none mt-0.5">🎲</span>
                            <div><strong class="text-slate-800">Enhanced randomization</strong> — per-step random functions that won't mess up your loop.</div>
                        </li>
                    </ul>
                    <div class="mt-5 pt-4 border-t border-slate-100 text-xs text-slate-500 font-sans">
                        Download links (Mac, Windows and Linux)<br>available in the Patreon post.
                    </div>
                </div>

            </aside>
        </div>
    </section>
</main>

<?php
get_footer();
