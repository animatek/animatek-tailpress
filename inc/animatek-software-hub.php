<?php

function animatek_software_hub_render( string $locale = 'es' ): void {
    if ( ! function_exists( 'animatek_vcv_modules_data' ) ) {
        require_once get_theme_file_path( 'inc/animatek-vcv-module-template.php' );
    }

    $is_en  = 'en' === $locale;
    $suffix = $is_en ? '-eng' : '';

    $uzz_buy_url     = 'https://animatek.net/pago/?line_items%5B0%5D%5Bprice_id%5D=d9000889-837b-4f7e-8a7e-3e9ca2e2259e&line_items%5B0%5D%5Bquantity%5D=1';
    $patreon_url     = 'https://www.patreon.com/c/animatek';
    $vcv_library_url = 'https://library.vcvrack.com/Animatek';
    $vcv_image       = 'https://animatek.net/wp-content/uploads/2026/04/UZZ_2_5.webp';
    $uzz_max_image   = 'https://animatek.net/wp-content/uploads/2017/08/screenshot.png';
    $nme_image       = 'https://animatek.net/wp-content/uploads/2026/06/ANIMATEK-NME_imagen.png';

    $modules      = animatek_vcv_modules_data();
    $module_count = count( $modules );

    $copy = $is_en ? [
        'kicker'         => 'ANIMATEK · SOFTWARE',
        'lang_label'     => 'ES',
        'lang_url'       => home_url( '/software/' ),
        'title'          => 'Software',
        'intro'          => 'Sequencers, modules and editors made by Animatek, for VCV Rack, Ableton Live and the Clavia Nord Modular G1.',
        'card_vcv_title' => 'VCV Rack',
        'card_vcv_meta'  => $module_count . ' modules · Free',
        'card_vcv_text'  => 'Open-source modules in the VCV Library: sequencers, MIDI-to-CV bridges and utilities.',
        'card_max_title' => 'UZZ · Max for Live',
        'card_max_meta'  => '10€ · Ableton Live',
        'card_max_text'  => '16-step sequencer with a modulation matrix to control any Live parameter.',
        'card_nme_title' => 'Animatek NME',
        'card_nme_meta'  => 'Beta · Patreon',
        'card_nme_text'  => 'A new native editor for the Clavia Nord Modular G1, open source and cross-platform.',
        'vcv_title'      => 'Modules for VCV Rack',
        'vcv_badge'      => 'Free · Open Source',
        'vcv_text'       => 'Available in the VCV Library for Rack Free and Pro, on Windows, macOS and Linux. Source code on GitHub.',
        'vcv_cta'        => 'View module',
        'vcv_library'    => 'VCV Library',
        'vcv_collection' => 'Animatek collection in the VCV Library',
        'max_title'      => 'UZZ · Max for Live',
        'max_badge'      => 'Paid · 10€ · Ableton Live',
        'max_text'       => '16-step sequencer built in Max for Live, with random functions and a modulation matrix capable of controlling any Live parameter. Designed to improvise and generate evolving sequences on the fly.',
        'max_cta'        => 'Discover UZZ',
        'max_buy'        => 'Buy — 10€',
        'max_alt'        => 'UZZ Max for Live interface',
        'nme_badge'      => 'Desktop app · Beta · Patreon',
        'nme_title'      => 'Animatek NME',
        'nme_subtitle'   => 'Nord Modular Editor G1',
        'nme_text'       => 'A modern, native, open-source editor for the legendary Clavia Nord Modular G1, rebuilt from scratch with JUCE/C++. Runs on Windows, macOS and Linux.',
        'nme_cta'        => 'Discover Animatek NME',
        'nme_patreon'    => 'Patreon',
        'nme_alt'        => 'Animatek NME Nord Modular G1 editor screenshot',
    ] : [
        'kicker'         => 'ANIMATEK · SOFTWARE',
        'lang_label'     => 'EN',
        'lang_url'       => home_url( '/software-eng/' ),
        'title'          => 'Software',
        'intro'          => 'Secuenciadores, módulos y editores creados por Animatek, para VCV Rack, Ableton Live y el Clavia Nord Modular G1.',
        'card_vcv_title' => 'VCV Rack',
        'card_vcv_meta'  => $module_count . ' módulos · Gratis',
        'card_vcv_text'  => 'Módulos open-source en la VCV Library: secuenciadores, puentes MIDI-to-CV y utilidades.',
        'card_max_title' => 'UZZ · Max for Live',
        'card_max_meta'  => '10€ · Ableton Live',
        'card_max_text'  => 'Secuenciador de 16 pasos con matriz de modulación para controlar cualquier parámetro de Live.',
        'card_nme_title' => 'Animatek NME',
        'card_nme_meta'  => 'Beta · Patreon',
        'card_nme_text'  => 'Un nuevo editor nativo para el Clavia Nord Modular G1, open source y multiplataforma.',
        'vcv_title'      => 'Módulos para VCV Rack',
        'vcv_badge'      => 'Gratis · Open Source',
        'vcv_text'       => 'Disponibles en la VCV Library para Rack Free y Pro, en Windows, macOS y Linux. Código fuente en GitHub.',
        'vcv_cta'        => 'Ver módulo',
        'vcv_library'    => 'VCV Library',
        'vcv_collection' => 'Colección Animatek en la VCV Library',
        'max_title'      => 'UZZ · Max for Live',
        'max_badge'      => 'De pago · 10€ · Ableton Live',
        'max_text'       => 'Secuenciador de 16 pasos creado en Max for Live, con funciones aleatorias y una matriz de modulación capaz de controlar cualquier parámetro de Live. Diseñado para improvisar y generar secuencias en evolución al vuelo.',
        'max_cta'        => 'Descubrir UZZ',
        'max_buy'        => 'Comprar — 10€',
        'max_alt'        => 'Interfaz UZZ Max for Live',
        'nme_badge'      => 'App de escritorio · Beta · Patreon',
        'nme_title'      => 'Animatek NME',
        'nme_subtitle'   => 'Nord Modular Editor G1',
        'nme_text'       => 'Un editor moderno, nativo y open-source para el legendario Clavia Nord Modular G1, reconstruido desde cero con JUCE/C++. Funciona en Windows, macOS y Linux.',
        'nme_cta'        => 'Descubrir Animatek NME',
        'nme_patreon'    => 'Patreon',
        'nme_alt'        => 'Captura de Animatek NME para Nord Modular G1',
    ];

    $hero_cards = [
        [
            'url'         => '#vcv-rack',
            'image'       => $vcv_image,
            'alt'         => 'Módulos Animatek para VCV Rack',
            'title'       => $copy['card_vcv_title'],
            'meta'        => $copy['card_vcv_meta'],
            'text'        => $copy['card_vcv_text'],
            'badge_class' => 'border-green-400/40 bg-slate-950 text-green-300',
        ],
        [
            'url'         => home_url( '/ultimate-ztep-zequencer' . $suffix . '/' ),
            'image'       => $uzz_max_image,
            'alt'         => $copy['max_alt'],
            'title'       => $copy['card_max_title'],
            'meta'        => $copy['card_max_meta'],
            'text'        => $copy['card_max_text'],
            'badge_class' => 'border-slate-300 bg-white text-slate-600',
        ],
        [
            'url'         => home_url( '/animatek-nme' . $suffix . '/' ),
            'image'       => $nme_image,
            'alt'         => $copy['nme_alt'],
            'title'       => $copy['card_nme_title'],
            'meta'        => $copy['card_nme_meta'],
            'text'        => $copy['card_nme_text'],
            'badge_class' => 'border-slate-300 bg-white text-slate-600',
        ],
    ];

    $pill_neutral = 'inline-flex items-center rounded-md border border-slate-300 px-3 py-1.5 text-xs font-black uppercase tracking-widest text-slate-600 dark:border-slate-600 dark:text-slate-300';
    ?>
    <main id="primary" class="bg-slate-100 text-slate-900">

        <section class="relative overflow-hidden bg-slate-950">
            <div class="absolute inset-0 pointer-events-none opacity-40 hero-grid"></div>
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute -left-24 -top-24 h-80 w-80 rounded-full bg-primary/15 blur-3xl"></div>
                <div class="absolute right-0 top-1/3 h-72 w-72 rounded-full bg-amber-300/20 blur-3xl"></div>
                <div class="absolute -bottom-24 left-1/3 h-72 w-72 rounded-full bg-cyan-400/15 blur-3xl"></div>
            </div>
            <div class="relative mx-auto max-w-7xl space-y-10 px-6 py-14 sm:px-10 lg:py-16">
                <div class="flex flex-wrap items-end justify-between gap-6">
                    <div class="space-y-3">
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-500"><?php echo esc_html( $copy['kicker'] ); ?></p>
                        <h1 class="text-4xl font-black leading-none text-slate-900 sm:text-5xl"><?php echo esc_html( $copy['title'] ); ?></h1>
                        <p class="max-w-2xl text-base leading-relaxed text-slate-600 sm:text-lg"><?php echo esc_html( $copy['intro'] ); ?></p>
                    </div>
                    <a href="<?php echo esc_url( $copy['lang_url'] ); ?>" class="inline-flex min-h-9 items-center gap-1.5 justify-center rounded-md border border-slate-200 bg-white px-3 py-1.5 text-xs font-bold leading-none text-slate-700 transition hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-primary/40">
                        <span><?php echo esc_html( $copy['lang_label'] ); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="9" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3 12h18" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 3c2.5 3.5 2.5 14 0 18" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7 5c1.5 2 1.5 12 0 14" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17 5c-1.5 2-1.5 12 0 14" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>

                <div class="grid gap-4 sm:grid-cols-3">
                    <?php foreach ( $hero_cards as $card ) : ?>
                        <a href="<?php echo esc_url( $card['url'] ); ?>" class="group flex flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:border-slate-300 hover:shadow-lg">
                            <div class="relative h-32 overflow-hidden bg-slate-950 sm:h-36">
                                <img src="<?php echo esc_url( $card['image'] ); ?>" alt="<?php echo esc_attr( $card['alt'] ); ?>" class="h-full w-full object-cover object-top transition duration-300 group-hover:scale-105" loading="lazy">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 to-transparent"></div>
                                <span class="absolute left-3 top-3 inline-flex items-center rounded-md border px-2.5 py-1 text-[10px] font-black uppercase tracking-wider <?php echo esc_attr( $card['badge_class'] ); ?>"><?php echo esc_html( $card['meta'] ); ?></span>
                            </div>
                            <div class="flex flex-1 flex-col gap-1.5 p-4">
                                <h2 class="flex items-center justify-between gap-2 text-lg font-extrabold text-slate-900">
                                    <?php echo esc_html( $card['title'] ); ?>
                                    <span class="text-slate-400 transition group-hover:translate-x-1 group-hover:text-primary" aria-hidden="true">&rarr;</span>
                                </h2>
                                <p class="text-sm leading-relaxed text-slate-600"><?php echo esc_html( $card['text'] ); ?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-7xl px-6 py-16 sm:px-10">
            <div class="grid gap-6 lg:grid-cols-2">

                <div id="max-for-live" class="flex scroll-mt-24 flex-col overflow-hidden rounded-lg border border-slate-300 bg-white text-slate-950 shadow-sm dark:border-slate-700 dark:bg-slate-900 dark:text-white">
                    <a href="<?php echo esc_url( home_url( '/ultimate-ztep-zequencer' . $suffix . '/' ) ); ?>" class="block">
                        <img src="<?php echo esc_url( $uzz_max_image ); ?>" alt="<?php echo esc_attr( $copy['max_alt'] ); ?>" class="h-48 w-full object-cover object-top" loading="lazy">
                    </a>
                    <div class="flex flex-1 flex-col gap-4 p-6 sm:p-8">
                        <div class="flex items-start justify-between gap-4">
                            <span class="<?php echo esc_attr( $pill_neutral ); ?>"><?php echo esc_html( $copy['max_badge'] ); ?></span>
                        </div>
                        <h2 class="text-2xl font-black tracking-tight text-slate-950 dark:text-white sm:text-3xl"><?php echo esc_html( $copy['max_title'] ); ?></h2>
                        <p class="text-base leading-relaxed text-slate-700 dark:text-slate-300"><?php echo esc_html( $copy['max_text'] ); ?></p>
                        <div class="mt-auto flex flex-wrap gap-3 pt-4">
                            <a href="<?php echo esc_url( home_url( '/ultimate-ztep-zequencer' . $suffix . '/' ) ); ?>" class="inline-flex items-center justify-center rounded-full bg-primary px-5 py-3 text-sm font-bold text-white shadow-md shadow-primary/20 transition hover:-translate-y-0.5 hover:bg-primary/90">
                                <?php echo esc_html( $copy['max_cta'] ); ?>
                            </a>
                            <a href="<?php echo esc_url( $uzz_buy_url ); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center rounded-full border border-slate-300 bg-white px-5 py-3 text-sm font-bold text-slate-800 transition hover:-translate-y-0.5 hover:border-primary hover:text-primary dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100">
                                <?php echo esc_html( $copy['max_buy'] ); ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div id="animatek-nme" class="relative flex scroll-mt-24 flex-col overflow-hidden rounded-lg border border-slate-300 bg-white text-slate-950 shadow-sm dark:border-slate-700 dark:bg-slate-900 dark:text-white">
                    <a href="<?php echo esc_url( home_url( '/animatek-nme' . $suffix . '/' ) ); ?>" class="relative block">
                        <img src="<?php echo esc_url( $nme_image ); ?>" alt="<?php echo esc_attr( $copy['nme_alt'] ); ?>" class="h-48 w-full object-cover object-top" loading="lazy">
                    </a>
                    <div class="relative flex flex-1 flex-col gap-4 p-6 sm:p-8">
                        <div class="flex items-start justify-between gap-4">
                            <span class="<?php echo esc_attr( $pill_neutral ); ?>"><?php echo esc_html( $copy['nme_badge'] ); ?></span>
                        </div>
                        <div>
                            <h2 class="text-2xl font-black tracking-tight text-slate-950 dark:text-white sm:text-3xl"><?php echo esc_html( $copy['nme_title'] ); ?></h2>
                            <p class="text-base font-semibold text-slate-600 dark:text-slate-300"><?php echo esc_html( $copy['nme_subtitle'] ); ?></p>
                        </div>
                        <p class="text-base leading-relaxed text-slate-700 dark:text-slate-300"><?php echo esc_html( $copy['nme_text'] ); ?></p>
                        <div class="mt-auto flex flex-wrap gap-3 pt-4">
                            <a href="<?php echo esc_url( home_url( '/animatek-nme' . $suffix . '/' ) ); ?>" class="inline-flex items-center justify-center rounded-full bg-primary px-5 py-3 text-sm font-bold text-white shadow-md shadow-primary/20 transition hover:-translate-y-0.5 hover:bg-primary/90">
                                <?php echo esc_html( $copy['nme_cta'] ); ?>
                            </a>
                            <a href="<?php echo esc_url( $patreon_url ); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center rounded-full bg-[#FF424D] px-5 py-3 text-sm font-bold text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-[#e63844]">
                                <?php echo esc_html( $copy['nme_patreon'] ); ?>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section id="vcv-rack" class="mx-auto max-w-7xl scroll-mt-24 px-6 pb-16 sm:px-10">
            <div class="mb-10 flex flex-wrap items-end justify-between gap-4">
                <div class="space-y-3">
                    <span class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-xs font-bold uppercase tracking-widest text-green-700"><?php echo esc_html( $copy['vcv_badge'] ); ?></span>
                    <h2 class="text-3xl font-black tracking-tight text-slate-900 sm:text-4xl"><?php echo esc_html( $copy['vcv_title'] ); ?></h2>
                    <p class="max-w-2xl text-base leading-relaxed text-slate-600"><?php echo esc_html( $copy['vcv_text'] ); ?></p>
                </div>
                <a href="<?php echo esc_url( $vcv_library_url ); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-bold text-slate-700 shadow-sm transition hover:border-primary hover:text-primary">
                    <img src="https://animatek.net/wp-content/uploads/2025/11/logovcv.webp" alt="Logo VCV" class="h-5 w-5 object-contain">
                    <?php echo esc_html( $copy['vcv_collection'] ); ?>
                </a>
            </div>

            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <?php foreach ( $modules as $slug => $module ) : ?>
                    <?php
                    // page-multi.php solo existe en español; el resto tiene versión -eng.
                    $module_suffix = ( 'multi' === $slug ) ? '' : $suffix;
                    $page_url      = home_url( rtrim( $module['slug'], '/' ) . $module_suffix . '/' );
                    $en_copy       = $is_en ? animatek_vcv_module_en_copy( $slug ) : [];
                    $intro         = ! empty( $en_copy['intro'] ) ? $en_copy['intro'] : $module['intro'];
                    ?>
                    <article class="flex flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                        <a href="<?php echo esc_url( $page_url ); ?>" class="block bg-slate-950">
                            <img src="<?php echo esc_url( $module['image'] ); ?>" alt="<?php echo esc_attr( $module['alt'] ); ?>" class="aspect-video w-full object-cover object-top" loading="lazy">
                        </a>
                        <div class="flex flex-1 flex-col gap-3 p-5">
                            <span class="self-start rounded-full bg-primary/10 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-primary"><?php echo esc_html( $module['badge'] ); ?></span>
                            <div>
                                <h3 class="text-lg font-extrabold text-slate-900">
                                    <a href="<?php echo esc_url( $page_url ); ?>" class="transition hover:text-primary"><?php echo esc_html( $module['title'] ); ?></a>
                                </h3>
                                <p class="text-sm font-bold text-primary"><?php echo esc_html( $module['subtitle'] ); ?></p>
                            </div>
                            <p class="text-sm leading-relaxed text-slate-600"><?php echo esc_html( $intro ); ?></p>
                            <div class="mt-auto flex items-center justify-between border-t border-slate-100 pt-3">
                                <a href="<?php echo esc_url( $page_url ); ?>" class="text-sm font-bold text-primary hover:underline"><?php echo esc_html( $copy['vcv_cta'] ); ?> &rarr;</a>
                                <a href="<?php echo esc_url( $module['library_url'] ); ?>" target="_blank" rel="noopener noreferrer" class="text-xs font-semibold text-slate-500 transition hover:text-primary"><?php echo esc_html( $copy['vcv_library'] ); ?> &nearr;</a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

    </main>
    <?php
}
