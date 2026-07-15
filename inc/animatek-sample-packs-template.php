<?php
/**
 * Shared renderer for the Animatek Sample Packs section.
 *
 * @package Animatek
 */

function animatek_sample_packs_data(): array {
    return [
        [
            'title'        => 'POSITRONICOS — Sample Pack',
            'slug'         => 'positronicos-sample-pack',
            'status'       => 'Disponible',
            'price'        => 'Gratis / descarga directa',
            'cover'        => home_url( '/wp-content/uploads/2026/06/positronicos-cover.png' ),
            'download_url' => home_url( '/wp-content/uploads/2026/06/positronicos-sample-pack.zip' ),
            'size'         => '1.09 GB',
            'samples'      => '65 WAV',
            'duration'     => '1:43:38',
            'source'       => 'Directo de casi 7 horas',
            'source_url'   => 'https://youtube.com/live/sU7Q4shIREE?feature=share',
            'summary'      => 'Loops, drones cortos, micro fragmentos y glitches extraídos del universo sonoro de POSITRONICOS.',
            'details'      => [
                '46 loops / drones cortos',
                '19 micro fragmentos / glitches',
                'WAV listos para sampler, granular, texturas y transiciones',
            ],
            'tags'         => [ 'ambient', 'drone', 'sound design', 'WAV', 'live extract' ],
            // Previews MP3 (~30 s, 128 kbps) generados desde los WAV del pack.
            'previews'     => [
                [
                    'label' => 'Dawn · loop/drone',
                    'url'   => home_url( '/wp-content/uploads/2026/06/previews/positronicos-preview-dawn.mp3' ),
                ],
                [
                    'label' => 'Ghost · drone',
                    'url'   => home_url( '/wp-content/uploads/2026/06/previews/positronicos-preview-ghost.mp3' ),
                ],
                [
                    'label' => 'Aurora · loop',
                    'url'   => home_url( '/wp-content/uploads/2026/06/previews/positronicos-preview-aurora.mp3' ),
                ],
                [
                    'label' => 'Law Spark · glitch',
                    'url'   => home_url( '/wp-content/uploads/2026/06/previews/positronicos-preview-law-spark.mp3' ),
                ],
            ],
        ],
    ];
}

function animatek_sample_packs_render_page(): void {
    $packs = animatek_sample_packs_data();
    ?>
    <main id="primary" class="bg-slate-950 text-slate-50">
        <section class="relative overflow-hidden px-6 py-14 lg:py-20 isolate bg-slate-950">
            <div class="absolute inset-0 pointer-events-none opacity-40 hero-grid"></div>
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute -left-24 -top-24 h-80 w-80 rounded-full bg-primary/15 blur-3xl"></div>
                <div class="absolute right-0 top-1/3 h-72 w-72 rounded-full bg-amber-300/20 blur-3xl"></div>
                <div class="absolute -bottom-24 left-1/3 h-72 w-72 rounded-full bg-cyan-400/15 blur-3xl"></div>
            </div>

            <div class="relative z-10 max-w-7xl mx-auto grid lg:grid-cols-[1.05fr_0.95fr] gap-10 items-center">
                <div class="space-y-6">
                    <span class="inline-flex items-center gap-2 rounded-full border border-cyan-300/25 bg-cyan-300/10 px-3 py-1.5 text-[11px] font-bold uppercase tracking-[0.18em] text-cyan-100">
                        Sample Packs
                    </span>
                    <div class="space-y-4">
                        <h1 class="text-4xl sm:text-5xl lg:text-7xl font-extrabold tracking-tight text-white leading-[0.98]">
                            Samples sacados de <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 via-primary to-orange-300">directos reales</span>
                        </h1>
                        <p class="max-w-2xl text-lg text-slate-300 leading-relaxed">
                            Packs WAV creados a partir de sesiones largas, demos, directos y experimentos de Animatek. Material imperfecto, usable y con historia: drones, texturas, glitches, loops y fragmentos para remezclar.
                        </p>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <a href="#packs" class="inline-flex items-center justify-center rounded-full bg-primary px-6 py-3 text-sm font-extrabold text-white shadow-lg shadow-primary/20 transition hover:-translate-y-0.5 hover:bg-primary/90 !no-underline">
                            Ver packs
                        </a>
                        <a href="https://animatek.bandcamp.com/album/positronicos" target="_blank" rel="noopener" class="inline-flex items-center justify-center rounded-full border border-white/15 bg-white/10 px-6 py-3 text-sm font-bold text-white transition hover:bg-white/15 !no-underline">
                            Escuchar POSITRONICOS
                        </a>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute -inset-6 rounded-3xl bg-gradient-to-br from-cyan-400/20 via-primary/10 to-orange-400/20 blur-2xl"></div>
                    <div class="relative rounded-3xl border border-white/10 bg-white/10 p-4 shadow-2xl backdrop-blur">
                        <img src="<?php echo esc_url( $packs[0]['cover'] ); ?>" alt="<?php echo esc_attr( $packs[0]['title'] ); ?>" class="aspect-square w-full rounded-2xl object-cover shadow-2xl" loading="eager">
                    </div>
                </div>
            </div>
        </section>

        <section id="packs" class="bg-slate-100 text-slate-900 px-6 py-12 lg:py-16">
            <div class="max-w-7xl mx-auto space-y-8">
                <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-5">
                    <div class="space-y-2 max-w-3xl">
                        <p class="text-[11px] uppercase tracking-[0.18em] font-bold text-primary">Catálogo</p>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-950">Sample packs disponibles</h2>
                        <p class="text-slate-600 leading-relaxed">
                            La idea: cada disco/directo puede dejar un pack hermano para la web. El álbum vive en Bandcamp; los samples viven aquí.
                        </p>
                    </div>
                    <div class="rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-bold text-slate-700 shadow-sm">
                        <?php echo esc_html( count( $packs ) ); ?> pack publicado
                    </div>
                </div>

                <div class="grid gap-6 lg:grid-cols-2">
                    <?php foreach ( $packs as $pack ) : ?>
                        <article class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                            <div class="grid md:grid-cols-[0.8fr_1.2fr]">
                                <div class="relative min-h-72 bg-slate-900">
                                    <img src="<?php echo esc_url( $pack['cover'] ); ?>" alt="<?php echo esc_attr( $pack['title'] ); ?>" class="h-full w-full object-cover" loading="lazy">
                                    <div class="absolute left-4 top-4 rounded-full bg-emerald-400 px-3 py-1 text-[11px] font-black uppercase tracking-[0.14em] text-emerald-950 shadow">
                                        <?php echo esc_html( $pack['status'] ); ?>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-5 p-6 sm:p-8">
                                    <div class="space-y-3">
                                        <div class="flex flex-wrap gap-2">
                                            <?php foreach ( $pack['tags'] as $tag ) : ?>
                                                <span class="rounded-full border border-slate-200 bg-slate-50 px-2.5 py-1 text-[10px] font-bold uppercase tracking-[0.12em] text-slate-600">
                                                    <?php echo esc_html( $tag ); ?>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                        <h3 class="text-2xl sm:text-3xl font-extrabold leading-tight text-slate-950">
                                            <?php echo esc_html( $pack['title'] ); ?>
                                        </h3>
                                        <p class="text-slate-600 leading-relaxed">
                                            <?php echo esc_html( $pack['summary'] ); ?>
                                        </p>
                                    </div>

                                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                                        <div class="rounded-2xl bg-slate-100 p-3">
                                            <p class="text-[10px] uppercase tracking-[0.14em] font-bold text-slate-500">Samples</p>
                                            <p class="text-lg font-extrabold text-slate-950"><?php echo esc_html( $pack['samples'] ); ?></p>
                                        </div>
                                        <div class="rounded-2xl bg-slate-100 p-3">
                                            <p class="text-[10px] uppercase tracking-[0.14em] font-bold text-slate-500">Duración</p>
                                            <p class="text-lg font-extrabold text-slate-950"><?php echo esc_html( $pack['duration'] ); ?></p>
                                        </div>
                                        <div class="rounded-2xl bg-slate-100 p-3">
                                            <p class="text-[10px] uppercase tracking-[0.14em] font-bold text-slate-500">Archivo</p>
                                            <p class="text-lg font-extrabold text-slate-950"><?php echo esc_html( $pack['size'] ); ?></p>
                                        </div>
                                        <div class="rounded-2xl bg-slate-100 p-3">
                                            <p class="text-[10px] uppercase tracking-[0.14em] font-bold text-slate-500">Precio</p>
                                            <p class="text-sm font-extrabold text-slate-950"><?php echo esc_html( $pack['price'] ); ?></p>
                                        </div>
                                    </div>

                                    <?php if ( ! empty( $pack['previews'] ) ) : ?>
                                        <div class="space-y-2">
                                            <p class="text-[10px] uppercase tracking-[0.14em] font-bold text-slate-500">Escucha el pack</p>
                                            <div class="space-y-1.5">
                                                <?php foreach ( $pack['previews'] as $preview ) : ?>
                                                    <div class="pack-preview flex items-center gap-3 rounded-full border border-slate-200 bg-slate-50 px-2 py-1.5" data-src="<?php echo esc_url( $preview['url'] ); ?>">
                                                        <button type="button" class="preview-toggle inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-primary text-white shadow-sm transition hover:bg-primary/85" aria-label="<?php echo esc_attr( sprintf( 'Reproducir %s', $preview['label'] ) ); ?>">
                                                            <svg class="icon-play h-3.5 w-3.5 translate-x-px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M8 5.14v13.72c0 .8.87 1.3 1.56.89l11.02-6.86a1.05 1.05 0 0 0 0-1.78L9.56 4.25A1.05 1.05 0 0 0 8 5.14Z"/></svg>
                                                            <svg class="icon-pause hidden h-3.5 w-3.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7 5h3.5v14H7zM13.5 5H17v14h-3.5z"/></svg>
                                                        </button>
                                                        <span class="truncate text-sm font-bold text-slate-700"><?php echo esc_html( $preview['label'] ); ?></span>
                                                        <div class="ml-auto mr-2 h-1.5 w-20 shrink-0 overflow-hidden rounded-full bg-slate-200 sm:w-28">
                                                            <div class="preview-progress h-full w-0 bg-primary transition-[width] duration-150"></div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <ul class="space-y-2 text-sm text-slate-600">
                                        <?php foreach ( $pack['details'] as $detail ) : ?>
                                            <li class="flex gap-2">
                                                <span class="mt-1.5 h-2 w-2 rounded-full bg-primary shrink-0"></span>
                                                <span><?php echo esc_html( $detail ); ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>

                                    <div class="mt-auto flex flex-col sm:flex-row gap-3">
                                        <a href="<?php echo esc_url( $pack['download_url'] ); ?>" class="inline-flex flex-1 items-center justify-center rounded-full bg-slate-950 px-5 py-3 text-sm font-extrabold text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-primary !no-underline" download>
                                            Descargar ZIP
                                        </a>
                                        <a href="<?php echo esc_url( $pack['source_url'] ); ?>" target="_blank" rel="noopener" class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-5 py-3 text-sm font-bold text-slate-700 transition hover:border-primary/40 hover:text-primary !no-underline">
                                            Ver directo fuente
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>
    <script>
    (function () {
        // Mini-reproductor de previews: solo suena uno a la vez y el audio
        // se descarga bajo demanda (al primer play de cada fila).
        var active = null;

        document.querySelectorAll('.pack-preview').forEach(function (row) {
            var btn      = row.querySelector('.preview-toggle');
            var playIco  = row.querySelector('.icon-play');
            var pauseIco = row.querySelector('.icon-pause');
            var bar      = row.querySelector('.preview-progress');
            var audio    = null;

            var showPlaying = function (playing) {
                playIco.classList.toggle('hidden', playing);
                pauseIco.classList.toggle('hidden', !playing);
            };

            var stop = function () {
                if (audio) { audio.pause(); }
                showPlaying(false);
            };

            btn.addEventListener('click', function () {
                if (active && active.row !== row) { active.stop(); }

                if (!audio) {
                    audio = new Audio(row.dataset.src);
                    audio.addEventListener('timeupdate', function () {
                        if (audio.duration) {
                            bar.style.width = (audio.currentTime / audio.duration) * 100 + '%';
                        }
                    });
                    audio.addEventListener('ended', function () {
                        showPlaying(false);
                        bar.style.width = '0%';
                    });
                }

                if (audio.paused) {
                    audio.play();
                    showPlaying(true);
                    active = { row: row, stop: stop };
                } else {
                    stop();
                }
            });
        });
    })();
    </script>
    <?php
}
