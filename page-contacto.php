<?php

get_header();
?>

<main id="primary" class="bg-slate-50 text-slate-900">
    <section class="relative overflow-hidden py-16 sm:py-20">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -left-20 -top-10 h-64 w-64 bg-primary/10 blur-3xl rounded-full"></div>
            <div class="absolute right-10 top-6 h-52 w-52 bg-cyan-200/30 blur-3xl rounded-full"></div>
            <div class="absolute -right-16 bottom-0 h-72 w-72 bg-indigo-200/25 blur-3xl rounded-full"></div>
        </div>

        <div class="relative max-w-6xl mx-auto px-6 space-y-10">
            <div class="space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold uppercase tracking-[0.12em]">
                    Hablemos
                </div>
                <div class="grid gap-6 lg:grid-cols-[1.05fr_0.95fr] items-start">
                    <div class="space-y-6">
                        <div class="space-y-3">
                            <h1 class="text-4xl sm:text-5xl font-extrabold leading-tight text-slate-900">Hablemos de música, patches y directos.</h1>
                            <p class="text-lg text-slate-600 max-w-2xl">Si quieres clases privadas, colaborar en un proyecto o tienes dudas sobre los cursos, envía tu mensaje y coordinamos una respuesta a medida.</p>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-4 py-1.5 rounded-full text-xs font-semibold uppercase tracking-[0.1em] bg-primary/10 text-primary border border-primary/20">Clases 1:1</span>
                            <span class="px-4 py-1.5 rounded-full text-xs font-semibold uppercase tracking-[0.1em] bg-emerald-100 text-emerald-700 border border-emerald-200">VCV Rack & Bitwig</span>
                            <span class="px-4 py-1.5 rounded-full text-xs font-semibold uppercase tracking-[0.1em] bg-amber-100 text-amber-700 border border-amber-200">Proyectos y directos</span>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="bg-slate-50 dark:bg-slate-800/40 border border-slate-200 dark:border-slate-700/50 rounded-2xl p-5 shadow-sm">
                                <div class="flex items-center gap-3 mb-3">
                                    <h3 class="font-bold text-slate-900 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m6 19 3-7 5 3 4-10"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16s.3 4 3 4c3 0 3-4 3-4"/>
                                        </svg>
                                        Clases privadas
                                    </h3>
                                </div>
                                <p class="text-sm text-slate-600 mb-3">Define objetivos, nivel y horarios. Preparo un plan a medida para Bitwig, VCV Rack o diseño sonoro.</p>
                                <a href="<?php echo esc_url(home_url('/clases-privadas')); ?>" class="inline-flex items-center text-primary font-semibold text-sm hover:underline">
                                    Ver detalles
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7 7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="bg-slate-50 dark:bg-slate-800/40 border border-slate-200 dark:border-slate-700/50 rounded-2xl p-5 shadow-sm">
                                <div class="flex items-center gap-3 mb-3">
                                    <h3 class="font-bold text-slate-900 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="12" cy="12" r="9" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.09 9a3 3 0 0 1 5.91 1c0 2-2 2.5-2 4"/>
                                            <circle cx="12" cy="17" r="0.5" fill="currentColor"/>
                                        </svg>
                                        Dudas generales
                                    </h3>
                                </div>
                                <p class="text-sm text-slate-600 mb-3">Licencias, colaboraciones, soporte de cursos o invitaciones a eventos.</p>
                                <?php $contact_email = antispambot(get_option('admin_email')); ?>
                                <a href="mailto:<?php echo esc_attr($contact_email); ?>" class="inline-flex items-center text-slate-800 font-semibold text-sm hover:text-primary transition">
                                    <?php echo esc_html($contact_email); ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 4h16v16H4z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4 4 8 8 8-8"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate-50 dark:bg-slate-800/40 border border-slate-200 dark:border-slate-700/50 rounded-2xl shadow-lg shadow-primary/5 p-6 sm:p-8">
                        <div class="space-y-2 mb-6">
                            <p class="text-xs font-semibold uppercase tracking-[0.12em] text-primary">Formulario</p>
                            <h2>Envíame un mensaje</h2>
                            <p class="text-sm text-slate-600">Indica contexto, nivel y horario preferido. Respondo normalmente en 24-48h.</p>
                        </div>

                        <div class="space-y-4">
                            <?php echo do_shortcode('[fluentform id="1"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
