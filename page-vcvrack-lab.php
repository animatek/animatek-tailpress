<?php
/**
 * Template Name: VCV Rack Lab
 */


get_header();
?>

<!-- PRINT STYLES FOR PDF GENERATION -->
<style>
    @media print {

        /* 1. Hide Interface Elements */
        header,
        footer,
        #locker-gate,
        .fixed,
        .sticky,
        #unlock-btn,
        nav,
        .cookie-banner,
        #cookie-law-info-bar {
            display: none !important;
        }

        /* 2. Format Sections as Pages */
        body {
            background: white !important;
            font-size: 12pt;
            color: black !important;
        }

        main>section {
            break-before: page;
            /* Force new page for each section */
            page-break-before: always;
            margin-bottom: 0 !important;
            padding-top: 20px !important;
        }

        /* First section and Hero don't need a break before */
        main>section:first-of-type,
        .animatek-hero-section {
            break-before: auto;
            page-break-before: auto;
        }

        /* 3. Unlock Content for Print (Override JS Locker) */
        #locked-content {
            filter: none !important;
            opacity: 1 !important;
            height: auto !important;
            overflow: visible !important;
            pointer-events: auto !important;
        }

        .blur-xl {
            filter: none !important;
        }

        .grayscale {
            filter: none !important;
        }

        .opacity-20 {
            opacity: 1 !important;
        }

        /* 4. Layout Adjustments */
        .max-w-7xl {
            max-width: 100% !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        .shadow-sm,
        .shadow-xl,
        .shadow-lg {
            box-shadow: none !important;
            border: 1px solid #ddd !important;
            /* Replace shadows with borders */
        }

        /* Avoid breaking inside cards */
        .bg-white,
        .rounded-xl,
        .card,
        img,
        blockquote {
            break-inside: avoid;
            page-break-inside: avoid;
        }

        /* Ensure background colors print */
        * {
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        /* Hide large decorations to save ink/space */
        .blur-3xl {
            display: none !important;
        }

        /* Links as text */
        a {
            text-decoration: none !important;
            color: #000 !important;
        }

        /* Hide unnecessary interactive sections for PDF */
        #template-part-explora {
            display: none !important;
        }

        /* Hide "Tutoriales Recomendados" (Section 11) for PDF only */
        main>section:nth-of-type(11) {
            display: none !important;
        }

        /* Hide "Plantillas y Descargas" (Section 12) for PDF only */
        main>section:nth-of-type(12) {
            display: none !important;
        }
    }
</style>

<main id="primary" class="bg-slate-200 text-slate-900">

    <!-- Hero Section -->
    <section class="animatek-hero-section relative overflow-hidden mb-24 px-6 sm:px-10 py-32 text-slate-50"
        style="background-image: linear-gradient(135deg, rgba(15,23,42,0.9), rgba(15,23,42,0.8)), url('https://animatek.net/wp-content/uploads/2025/04/VCVportada.webp'); background-size: cover; background-position: center; background-repeat: no-repeat;">

        <div class="relative max-w-7xl mx-auto grid gap-12 z-10">
            <div class="space-y-6">
                <span
                    class="inline-flex items-center gap-2 px-3 py-1 text-xs font-bold tracking-[0.18em] uppercase border border-white/20 rounded-full bg-white/10 text-white">
                    VCV Rack Lab
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight text-white">
                    VCV Rack Starter Pack <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-cyan-300">v2.0</span>
                </h1>
                <p class="text-xl text-slate-300 leading-relaxed max-w-3xl">
                    Tu guía esencial para dominar la síntesis modular. Desde la primera conexión hasta la creación de
                    parches complejos.
                </p>


            </div>
        </div>
    </section>


    <?php
    get_template_part('template-parts/brevo-locker', null, [
        'form_action' => animatek_vcv_lab_form_action(),
        'storage_key' => animatek_vcv_lab_storage_key(),
        'title'       => 'Desbloquea la Guía Web Completa + Recibe el PDF para descargar',
        'description' => 'Introduce tu email para acceder <strong>GRATIS</strong> a todas las Secciones (1 a 12). Desbloqueo inmediato. Solo te enviaremos trucos de VCV Rack, nada de spam.',
        'email_label' => 'Introduzca su dirección de e-mail',
    ]);
    ?>


    <!-- LOCKED CONTENT WRAPPER -->
    <div id="locked-content"
        class="relative transition-all duration-1000 filter blur-xl grayscale opacity-20 h-[600px] overflow-hidden select-none pointer-events-none">
        <div class="absolute inset-0 z-10 bg-gradient-to-b from-transparent to-white/80"></div>

        <!-- 1. Introducción y Ecosistema -->
        <section class="max-w-7xl mx-auto px-6 mb-[6.25rem]">
            <div class="bg-white rounded-[1.75rem] border border-slate-200 dark:border-slate-700/50 shadow-sm overflow-hidden relative p-8 sm:p-12">
                <h2 class="mb-8 flex items-center gap-3">
                    <span
                        class="w-8 h-8 rounded-full bg-primary/10 text-primary text-sm font-bold flex items-center justify-center">1</span>
                    Introducción y Ecosistema
                </h2>

                <div class="prose prose-slate prose-lg max-w-none text-slate-600">
                    <p>
                        Bienvenido al fascinante mundo de la síntesis modular. Este "Starter Pack" recopila la esencia de
                        los recursos disponibles en
                        <a href="https://www.animatek.net"
                            class="text-primary hover:text-primary/80 no-underline border-b border-primary/20 hover:border-primary">animatek.net</a>
                        forjados a través de años de experiencia docente.
                    </p>
                    <p>
                        Para acelerar tu aprendizaje, te recomiendo encarecidamente unirte a nuestra comunidad:
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-6 not-prose">
                        <a href="https://www.youtube.com/user/animatek" target="_blank"
                            class="flex items-center p-4 rounded-xl bg-slate-50 dark:bg-slate-800/40 border border-slate-200 dark:border-slate-700/50 hover:border-slate-400 hover:bg-white dark:hover:bg-slate-800/60 transition-all group shadow-sm">
                            <span
                                class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800/40 text-slate-600 flex items-center justify-center mr-4 group-hover:bg-red-600 group-hover:text-white transition-all">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                                </svg>
                            </span>
                            <div>
                                <div class="font-bold text-slate-800">YouTube</div>
                                <div class="text-sm text-slate-500">Tutoriales y directos</div>
                            </div>
                        </a>
                        <a href="https://discord.gg/emUkHRrvtk" target="_blank"
                            class="flex items-center p-4 rounded-xl bg-slate-50 dark:bg-slate-800/40 border border-slate-200 dark:border-slate-700/50 hover:border-slate-400 hover:bg-white dark:hover:bg-slate-800/60 transition-all group shadow-sm">
                            <span
                                class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800/40 text-slate-600 flex items-center justify-center mr-4 group-hover:bg-indigo-600 group-hover:text-white transition-all">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M20.317 4.3698a19.7913 19.7913 0 00-4.8851-1.5152.0741.0741 0 00-.0785.0371c-.211.3753-.4447.8648-.6083 1.2495-1.8447-.2762-3.68-.2762-5.4868 0-.1636-.3933-.4058-.8742-.6177-1.2495a.077.077 0 00-.0785-.037 19.7363 19.7363 0 00-4.8852 1.515.0699.0699 0 00-.0321.0277C.5334 9.0458-.319 13.5799.0992 18.0578a.0824.0824 0 00.0312.0561c2.0528 1.5076 4.0413 2.4228 5.9929 3.0294a.0777.0777 0 00.0842-.0276c.4616-.6304.8731-1.2952 1.226-1.9942a.076.076 0 00-.0416-.1057c-.6528-.2476-1.2743-.5495-1.8722-.8923a.077.077 0 01-.0076-.1277c.1258-.0943.2517-.1923.3718-.2914a.0743.0743 0 01.0776-.0105c3.9278 1.7933 8.18 1.7933 12.0614 0a.0739.0739 0 01.0785.0095c.1202.099.246.1981.3728.2924a.077.077 0 01-.0066.1276 12.2986 12.2986 0 01-1.873.8914.0766.0766 0 00-.0407.1067c.3604.698.7719 1.3628 1.225 1.9932a.076.076 0 00.0842.0286c1.961-.6067 3.9495-1.5219 6.0023-3.0294a.077.077 0 00.0313-.0552c.5004-5.177-.8382-9.6739-3.5485-13.6604a.061.061 0 00-.0312-.0286zM8.02 15.3312c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9555-2.4189 2.157-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.419-2.1568 2.419zm7.9748 0c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9554-2.4189 2.1569-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.419-2.1568 2.419z" />
                                </svg>
                            </span>
                            <div>
                                <div class="font-bold text-slate-800">Discord</div>
                                <div class="text-sm text-slate-500">Comunidad de ayuda</div>
                            </div>
                        </a>
                        <a href="https://www.facebook.com/groups/spainvcvrackusers" target="_blank"
                            class="flex items-center p-4 rounded-xl bg-slate-50 dark:bg-slate-800/40 border border-slate-200 dark:border-slate-700/50 hover:border-slate-400 hover:bg-white dark:hover:bg-slate-800/60 transition-all group shadow-sm">
                            <span
                                class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800/40 text-slate-600 flex items-center justify-center mr-4 group-hover:bg-blue-600 group-hover:text-white transition-all">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </span>
                            <div>
                                <div class="font-bold text-slate-800">Facebook VCV Rack</div>
                                <div class="text-sm text-slate-500">Grupo de usuarios en Español</div>
                            </div>
                        </a>
                        <a href="https://patchstorage.com/explore/?search_query=&tax_platform%5B%5D=vcv-rack&tax_post_tag=&orderby=modified&wpas_id=search_form&wpas_submit=1"
                            target="_blank"
                            class="flex items-center p-4 rounded-xl bg-slate-50 dark:bg-slate-800/40 border border-slate-200 dark:border-slate-700/50 hover:border-slate-400 hover:bg-white dark:hover:bg-slate-800/60 transition-all group shadow-sm">
                            <span
                                class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800/40 text-slate-600 flex items-center justify-center mr-4 group-hover:bg-amber-600 group-hover:text-white transition-all">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM5 19V5h14v14H5zm3-12h8v2H8zm0 4h8v2H8zm0 4h5v2H8z" />
                                </svg>
                            </span>
                            <div>
                                <div class="font-bold text-slate-800">Patchstorage</div>
                                <div class="text-sm text-slate-500">Librería de patches</div>
                            </div>
                        </a>
                        <a href="<?php echo esc_url(home_url('/glosario/')); ?>"
                            class="flex items-center p-4 rounded-xl bg-slate-50 dark:bg-slate-800/40 border border-slate-200 dark:border-slate-700/50 hover:border-slate-400 hover:bg-white dark:hover:bg-slate-800/60 transition-all group shadow-sm">
                            <span
                                class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800/40 text-slate-600 flex items-center justify-center mr-4 group-hover:bg-emerald-600 group-hover:text-white transition-all">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                </svg>
                            </span>
                            <div>
                                <div class="font-bold text-slate-800">Glosario</div>
                                <div class="text-sm text-slate-500">Términos de síntesis y VCV Rack</div>
                            </div>
                        </a>
                        <a href="https://www.reddit.com/r/vcvrack/" target="_blank"
                            class="flex items-center p-4 rounded-xl bg-slate-50 dark:bg-slate-800/40 border border-slate-200 dark:border-slate-700/50 hover:border-slate-400 hover:bg-white dark:hover:bg-slate-800/60 transition-all group shadow-sm">
                            <span
                                class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800/40 text-slate-600 flex items-center justify-center mr-4 group-hover:bg-orange-600 group-hover:text-white transition-all">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0zm5.01 4.744c.688 0 1.25.561 1.25 1.249a1.25 1.25 0 0 1-2.498.056l-2.597-.547-.8 3.747c1.824.07 3.48.632 4.674 1.488.308-.309.73-.491 1.207-.491.968 0 1.754.786 1.754 1.754 0 .716-.435 1.333-1.01 1.614a3.111 3.111 0 0 1 .042.52c0 2.694-3.13 4.87-7.004 4.87-3.874 0-7.004-2.176-7.004-4.87 0-.183.015-.366.043-.534A1.748 1.748 0 0 1 4.028 12c0-.968.786-1.754 1.754-1.754.463 0 .898.196 1.207.49 1.207-.883 2.878-1.43 4.744-1.487l.885-4.182a.342.342 0 0 1 .14-.197.35.35 0 0 1 .238-.042l2.906.617a1.214 1.214 0 0 1 1.108-.701zM9.25 12C8.561 12 8 12.562 8 13.25c0 .687.561 1.248 1.25 1.248.687 0 1.248-.561 1.248-1.249 0-.688-.561-1.249-1.249-1.249zm5.5 0c-.687 0-1.248.561-1.248 1.25 0 .687.561 1.248 1.249 1.248.688 0 1.249-.561 1.249-1.249 0-.687-.562-1.249-1.25-1.249zm-5.466 3.99a.327.327 0 0 0-.231.094.33.33 0 0 0 0 .463c.842.842 2.484.913 2.961.913.477 0 2.105-.056 2.961-.913a.361.361 0 0 0 .029-.463.33.33 0 0 0-.464 0c-.547.533-1.684.73-2.512.73-.828 0-1.979-.196-2.512-.73a.326.326 0 0 0-.232-.095z" />
                                </svg>
                            </span>
                            <div>
                                <div class="font-bold text-slate-800">Reddit</div>
                                <div class="text-sm text-slate-500">Subreddit r/vcvrack</div>
                            </div>
                        </a>
                        <a href="https://community.vcvrack.com/" target="_blank"
                            class="flex items-center p-4 rounded-xl bg-slate-50 dark:bg-slate-800/40 border border-slate-200 dark:border-slate-700/50 hover:border-slate-400 hover:bg-white dark:hover:bg-slate-800/60 transition-all group shadow-sm">
                            <span
                                class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800/40 text-slate-600 flex items-center justify-center mr-4 group-hover:bg-teal-600 group-hover:text-white transition-all">
                                <img src="https://animatek.net/wp-content/uploads/2025/11/logovcv.webp" alt="VCV Rack"
                                    class="w-6 h-6 object-contain opacity-80 group-hover:opacity-100 transition-opacity">
                            </span>
                            <div>
                                <div class="font-bold text-slate-800">Foro Oficial VCV</div>
                                <div class="text-sm text-slate-500">Comunidad Oficial</div>
                            </div>
                        </a>
                    </div>

                    <div class="bg-slate-50 dark:bg-slate-800/40 p-6 rounded-2xl border border-slate-200 dark:border-slate-700/50 my-8">
                        <h3 class="text-xl font-bold text-slate-800 mb-6 flex items-center gap-2">🤔 ¿VCV Rack Free, Pro o
                            Cardinal?</h3>
                        <p class="text-sm text-slate-600 mb-6">
                            Existen tres formas principales de usar VCV Rack. Elige tu arma:
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                            <!-- Free -->
                            <a href="https://vcvrack.com/Rack" target="_blank"
                                class="bg-white p-4 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-slate-400 transition-colors block">
                                <span
                                    class="inline-block px-2 py-1 rounded text-[10px] font-bold bg-slate-100 dark:bg-slate-800/40 text-slate-700 mb-2">FREE</span>
                                <strong class="block text-slate-900 mb-1">Standalone</strong>
                                <p class="text-xs text-slate-500">App independiente. Ideal para aprender y directos.
                                    Gratuita.</p>
                            </a>

                            <!-- Pro -->
                            <a href="https://vcvrack.com/Rack#get" target="_blank"
                                class="bg-white p-4 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-slate-400 transition-colors block">
                                <span
                                    class="inline-block px-2 py-1 rounded text-[10px] font-bold bg-slate-100 dark:bg-slate-800/40 text-slate-700 mb-2">PRO</span>
                                <strong class="block text-slate-900 mb-1">VST Plugin</strong>
                                <p class="text-xs text-slate-500">Úsalo DENTRO de Ableton/Logic. De pago. Soporte oficial.
                                </p>
                            </a>

                            <!-- Fork -->
                            <a href="https://cardinal.kx.studio/" target="_blank"
                                class="bg-white p-4 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-slate-400 transition-colors block">
                                <span
                                    class="inline-block px-2 py-1 rounded text-[10px] font-bold bg-slate-100 dark:bg-slate-800/40 text-slate-700 mb-2">FORK</span>
                                <strong class="block text-slate-900 mb-1">Cardinal</strong>
                                <p class="text-xs text-slate-500">Versión VST gratuita y Open Source. La alternativa
                                    inteligente.</p>
                            </a>
                        </div>

                        <p class="text-slate-800 font-bold border-t border-slate-200 dark:border-slate-700/50 pt-4 text-center">
                            🚀 Recomendación: Empieza con la versión <span class="text-slate-600">Standalone
                                Gratuita</span>.
                        </p>
                    </div>


                </div>
            </div>
        </section>


        <!-- 2. Primeros Pasos: Interfaz y Cables -->
        <section class="max-w-7xl mx-auto px-6 mb-[6.25rem]">
            <div
                class="bg-white rounded-[1.75rem] border border-slate-200 dark:border-slate-700/50 shadow-sm overflow-hidden p-8 sm:p-12 relative group">
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-slate-100 dark:bg-slate-800/40 rounded-full blur-3xl -mr-20 -mt-20 opacity-50 dark:opacity-5 group-hover:opacity-100 dark:group-hover:opacity-10 transition-opacity">
                </div>

                <h2 class="mb-8 flex items-center gap-3 relative z-10">
                    <span
                        class="w-8 h-8 rounded-full bg-primary/10 text-primary text-sm font-bold flex items-center justify-center">2</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8 text-primary">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                    </svg>
                    Primeros Pasos: Interfaz y Cables
                </h2>

                <!-- Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12 relative z-10">
                    <!-- Module Mgmt -->
                    <div
                        class="bg-white p-6 rounded-2xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-primary/30 transition-colors">
                        <h3 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                            <span>📦</span> Gestión de Módulos
                        </h3>
                        <ul class="space-y-4 text-slate-600 text-sm">
                            <li class="flex flex-col gap-1">
                                <span class="font-semibold text-slate-900 flex items-center gap-2">➕ Añadir</span>
                                <span><kbd
                                        class="bg-slate-100 dark:bg-slate-800/40 px-1.5 py-0.5 rounded font-mono text-slate-500 border border-slate-200 dark:border-slate-700/50">Click
                                        Dcho</kbd> o pulsa <kbd
                                        class="bg-slate-100 dark:bg-slate-800/40 px-1.5 py-0.5 rounded font-mono text-slate-500 border border-slate-200 dark:border-slate-700/50">ENTER</kbd>
                                    en cualquier parte del patch.</span>
                            </li>
                            <li class="flex flex-col gap-1">
                                <span class="font-semibold text-slate-900 flex items-center gap-2">✋ Mover</span>
                                <span>Arrastra con <kbd
                                        class="bg-slate-100 dark:bg-slate-800/40 px-1.5 py-0.5 rounded font-mono text-slate-500 border border-slate-200 dark:border-slate-700/50">Click
                                        Izqd</kbd>. (Usa <kbd
                                        class="bg-slate-100 dark:bg-slate-800/40 px-1.5 py-0.5 rounded font-mono text-slate-500 border border-slate-200 dark:border-slate-700/50">Ctrl</kbd>
                                    + Arrastrar para empujar varios).</span>
                            </li>
                            <li class="flex flex-col gap-1 pt-2 pb-1">
                                <p
                                    class="text-sm bg-slate-50 dark:bg-slate-800/60 text-slate-700 dark:text-slate-300 p-3 rounded-lg border border-slate-200 dark:border-slate-700 italic">
                                    "Puedes gestionar grupos de módulos seleccionandolos y puedes guardarlos y
                                    rellamarlos, esto es lo mas parecido a un preset que vas a encontrar en VCV."
                                </p>
                            </li>
                            <li class="flex flex-col gap-1">
                                <span class="font-semibold text-slate-900 flex items-center gap-2">💾 Guardar
                                    Selección</span>
                                <span>Selecciona varios módulos, <kbd
                                        class="bg-slate-100 dark:bg-slate-800/40 px-1.5 py-0.5 rounded font-mono text-slate-500 border border-slate-200 dark:border-slate-700/50">Click
                                        Dcho</kbd> y elige "Save selection as...".</span>
                            </li>
                            <li class="flex flex-col gap-1">
                                <span class="font-semibold text-slate-900 flex items-center gap-2">📂 Importar
                                    Selección</span>
                                <span>Para recuperar el grupo, ve a <strong>File > Import selection</strong>.</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Cable Mgmt -->
                    <div
                        class="bg-white p-6 rounded-2xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-primary/30 transition-colors">
                        <h3 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                            <span>🔌</span> Gestión de Cables
                        </h3>
                        <div class="space-y-4 text-sm text-slate-600">
                            <div class="flex flex-col gap-1">
                                <span class="font-semibold text-slate-900">Crear conexión</span>
                                <p>Arrastra desde cualquier puerto (negro=entrada, otros=salida).</p>
                            </div>
                            <div class="flex flex-col gap-1">
                                <span class="font-semibold text-slate-900">Apilar cables (Stack)</span>
                                <p>Mantén <kbd
                                        class="bg-slate-100 dark:bg-slate-800/40 px-1.5 py-0.5 rounded font-mono text-slate-500 border border-slate-200 dark:border-slate-700/50">Ctrl</kbd>
                                    al conectar para sacar múltiples cables de una sola salida (Mult).</p>
                            </div>

                            <div class="mt-4 p-3 bg-slate-50 dark:bg-slate-800/40 rounded-lg border border-slate-100 dark:border-slate-700/50 text-center">
                                <img src="https://animatek.net/wp-content/uploads/2026/01/colores_Cables.webp"
                                    alt="Cable Menu" class="w-full h-auto rounded object-cover shadow-sm mb-2">
                                <p class="text-xs italic">"Click derecho en el puerto para elegir color antes de sacar
                                    el
                                    cable."</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Visual Infographic for Cables -->
                <div class="bg-slate-50 dark:bg-slate-800/40 rounded-2xl border border-slate-200 dark:border-slate-700/50 overflow-hidden shadow-sm relative z-10">
                    <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700/50">
                        <h3 class="text-lg font-bold text-slate-800">Código de Colores (Método Animatek)</h3>
                        <p class="text-slate-500 text-sm">Estandariza tus parches para leer el flujo de señal de un
                            vistazo.
                        </p>
                    </div>
                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 divide-y sm:divide-y-0 sm:divide-x divide-slate-200">

                        <!-- AUDIO -->
                        <div class="p-6 relative group overflow-hidden hover:bg-white dark:hover:bg-slate-800/60 transition-colors">
                            <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
                                <!-- Icon reused -->
                            </div>
                            <div class="w-full h-2 bg-purple-600 rounded-full mb-4 shadow-sm"></div>

                            <h4 class="text-purple-700 font-bold mb-2 flex items-center gap-2"><span>🔊</span> AUDIO
                            </h4>
                            <p class="text-xs text-slate-500">Lo que escuchas. Osciladores, Filtros, FX.</p>
                        </div>

                        <!-- TRIGGER -->
                        <div class="p-6 relative group overflow-hidden hover:bg-slate-50 dark:bg-slate-800/40 dark:hover:bg-slate-800/60 transition-colors">
                            <div class="w-full h-2 bg-cyan-400 rounded-full mb-4 shadow-sm"></div>
                            <h4 class="text-blue-600 font-bold mb-2 flex items-center gap-2"><span>⚡</span> CLCK / TRIG
                                /
                                GATE</h4>
                            <p class="text-xs text-slate-500">Golpes, disparos, relojes. "DO IT NOW".</p>
                        </div>

                        <!-- PITCH -->
                        <div class="p-6 relative group overflow-hidden hover:bg-slate-50 dark:bg-slate-800/40 dark:hover:bg-slate-800/60 transition-colors">
                            <div class="w-full h-2 bg-yellow-400 rounded-full mb-4 shadow-sm"></div>
                            <h4 class="text-yellow-600 font-bold mb-2 flex items-center gap-2"><span>🎹</span> V/OCT
                            </h4>
                            <p class="text-xs text-slate-500">Notas musicales. 1 Voltio = 1 Octava.</p>
                        </div>

                        <!-- MODULATION -->
                        <div class="p-6 relative group overflow-hidden hover:bg-slate-50 dark:bg-slate-800/40 dark:hover:bg-slate-800/60 transition-colors">
                            <div class="w-full h-2 bg-green-400 rounded-full mb-4 shadow-sm"></div>
                            <h4 class="text-green-600 font-bold mb-2 flex items-center gap-2"><span>🌊</span>
                                MODULACIONES
                            </h4>
                            <p class="text-xs text-slate-500">Movimiento. Todo lo que mueve knobs por ti.</p>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <!-- 3. Configuración Audio & MIDI -->
        <section class="max-w-7xl mx-auto px-6 mb-[6.25rem]">
            <div class="bg-white rounded-[1.75rem] border border-slate-200 dark:border-slate-700/50 shadow-sm overflow-hidden p-8 sm:p-12">
                <h2 class="mb-8 flex items-center gap-3 relative z-10">
                    <span
                        class="w-8 h-8 rounded-full bg-primary/10 text-primary text-sm font-bold flex items-center justify-center">3</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8 text-primary">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                    </svg>
                    Configuración de Audio y MIDI
                </h2>

                <div class="space-y-12 md:space-y-16">
                    <!-- MIDI BLOCK -->
                    <div class="flex flex-col md:flex-row gap-8 lg:gap-12 items-start relative z-10">
                        <!-- Text Content -->
                        <div class="w-full md:w-1/2 ">
                            <h3 class="text-primary text-2xl font-bold mb-4 flex items-center gap-2">🎹 Módulos MIDI
                            </h3>
                            <p class="text-slate-600 text-base leading-relaxed mb-6">
                                El puente entre VCV y tu mundo exterior (DAW, Teclado USB).
                            </p>

                            <div class="grid grid-cols-2 gap-4">
                                <!-- Card 1 -->
                                <div class="col-span-2 bg-slate-50 dark:bg-slate-800/40/50 dark:bg-slate-800/40 rounded-xl p-4 border border-slate-200 dark:border-slate-700/50">
                                    <strong class="block text-slate-800 dark:text-slate-200 mb-1 text-sm">📡 MIDI-CV (Entrada)</strong>
                                    <p class="text-xs text-slate-600">Recibe notas de tu teclado y las convierte en
                                        voltaje
                                        para el rack.</p>
                                </div>

                                <!-- Outputs List -->
                                <div class="bg-white p-3 rounded-xl border border-slate-200 dark:border-slate-700/50">
                                    <strong class="text-primary text-sm block mb-1">V/OCT</strong>
                                    <span class="text-xs text-slate-500">¿Qué nota es?</span>
                                </div>
                                <div class="bg-white p-3 rounded-xl border border-slate-200 dark:border-slate-700/50">
                                    <strong class="text-primary text-sm block mb-1">GATE</strong>
                                    <span class="text-xs text-slate-500">¿Tecla pulsada?</span>
                                </div>
                                <div class="bg-white p-3 rounded-xl border border-slate-200 dark:border-slate-700/50">
                                    <strong class="text-primary text-sm block mb-1">VEL</strong>
                                    <span class="text-xs text-slate-500">¿Con qué fuerza?</span>
                                </div>
                                <div class="bg-white p-3 rounded-xl border border-slate-200 dark:border-slate-700/50">
                                    <strong class="text-primary text-sm block mb-1">CLK</strong>
                                    <span class="text-xs text-slate-500">Sincronía BPM.</span>
                                </div>
                                <div class="bg-white p-3 rounded-xl border border-slate-200 dark:border-slate-700/50">
                                    <strong class="text-primary text-sm block mb-1">CLK/N</strong>
                                    <span class="text-xs text-slate-500">Subdivisiones de reloj (Click Dcho >
                                        Opciones).</span>
                                </div>
                                <div class="bg-white p-3 rounded-xl border border-slate-200 dark:border-slate-700/50">
                                    <strong class="text-primary text-sm block mb-1">RETR</strong>
                                    <span class="text-xs text-slate-500">Reinicia las envolventes (Retrigger).</span>
                                </div>
                            </div>
                        </div>

                        <!-- Image Content -->
                        <div class="w-full md:w-1/2 order-1 md:order-2">
                            <div
                                class="group relative max-w-[380px] mx-auto rounded-2xl p-2 bg-white border border-slate-200 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-primary/10 transition-all duration-500 transform hover:-translate-y-1 md:-mt-18">
                                <div
                                    class="absolute inset-0 bg-gradient-to-tr from-slate-100 via-transparent to-slate-50 rounded-2xl -z-10">
                                </div>
                                <img src="https://animatek.net/wp-content/uploads/2026/01/ModulosMIDI.webp"
                                    alt="Módulos MIDI-CV y CV-MIDI en VCV Rack"
                                    class="w-full h-auto rounded-xl shadow-sm dark:shadow-none dark:ring-1 dark:ring-white/10">
                                <div
                                    class="absolute bottom-4 left-4 right-4 bg-white/90 dark:bg-slate-900/90 backdrop-blur-sm px-4 py-2 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-300 border border-white/50 dark:border-slate-700/50 shadow-sm text-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    MIDI-CV (Izquierda) &bull; CV-MIDI (Derecha)
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SEPARATOR -->
                    <div class="w-full h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>

                    <!-- AUDIO BLOCK -->
                    <div class="flex flex-col md:flex-row gap-8 lg:gap-12 items-start">
                        <!-- Image Content -->
                        <div class="w-full md:w-1/2">
                            <div
                                class="group relative rounded-2xl p-2 bg-white border border-slate-200 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-primary/10 transition-all duration-500 transform hover:-translate-y-1">
                                <div
                                    class="absolute inset-0 bg-gradient-to-tl from-slate-100 via-transparent to-slate-50 rounded-2xl -z-10">
                                </div>
                                <img src="https://animatek.net/wp-content/uploads/2026/01/Audio_Decvices.webp"
                                    alt="Módulos de Audio en VCV Rack" class="w-full h-auto rounded-xl shadow-sm dark:shadow-none dark:ring-1 dark:ring-white/10">
                                <div
                                    class="absolute bottom-4 left-4 right-4 bg-white/90 dark:bg-slate-900/90 backdrop-blur-sm px-4 py-2 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-300 border border-white/50 dark:border-slate-700/50 shadow-sm text-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    Audio 8, Audio 2 & Audio 16
                                </div>
                            </div>
                        </div>

                        <!-- Text Content -->
                        <div class="w-full md:w-1/2">
                            <h3 class="text-primary text-2xl font-bold mb-4 flex items-center gap-2">🔊 Salida de Audio
                            </h3>
                            <p class="text-slate-600 text-base leading-relaxed mb-6">
                                El módulo <strong>Audio 8</strong> es tu tarjeta de sonido virtual.
                            </p>

                            <div class="bg-slate-50 dark:bg-slate-800/40/50 dark:bg-slate-800/40 rounded-xl p-5 border border-slate-200 dark:border-slate-700/50 mb-6 space-y-3">
                                <div class="flex items-center gap-3">
                                    <span
                                        class="h-6 w-6 rounded-full bg-slate-100 dark:bg-slate-800/40 text-slate-700 text-xs font-bold flex items-center justify-center">1</span>
                                    <span class="text-sm text-slate-700"><strong>Driver:</strong> ASIO / WASAPI /
                                        CoreAudio / ALSA / JACK / PulseAudio.</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span
                                        class="h-6 w-6 rounded-full bg-slate-100 dark:bg-slate-800/40 text-slate-700 text-xs font-bold flex items-center justify-center">2</span>
                                    <span class="text-sm text-slate-700"><strong>Device:</strong> Tu interfaz de audio
                                        (ej:
                                        Focusrite).</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span
                                        class="h-6 w-6 rounded-full bg-slate-100 dark:bg-slate-800/40 text-slate-700 text-xs font-bold flex items-center justify-center">3</span>
                                    <span class="text-sm text-slate-700"><strong>Buffer:</strong> Latencia vs
                                        Estabilidad.</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SEPARATOR -->
                    <div class="w-full h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>

                    <!-- MIDI CC BLOCK -->
                    <div class="flex flex-col md:flex-row gap-8 lg:gap-12 items-center">
                        <!-- Text Content -->
                        <div class="w-full md:w-1/2 prose prose-slate max-w-none order-2 md:order-1">
                            <h3 class="text-primary text-2xl mb-4">Control MIDI Avanzado</h3>
                            <p class="text-slate-600 text-base leading-relaxed mb-4">
                                También podemos recibir mensajes de cambio de controladores o CC, o enviar valores de
                                cambio
                                de voltaje o CV a dispositivos MIDI externos usando módulos como <strong>MIDI
                                    CC-CV</strong>, <strong>CV-MIDI</strong>, <strong>GATE-MIDI</strong> o
                                <strong>MIDI-MAP</strong>.
                            </p>
                            <p class="text-slate-600 text-base leading-relaxed">
                                Otro dispositivo muy interesante para mapear parámetros es el <strong>Micro-map</strong>
                                de
                                Storm Melder. Los parámetros que están mapeados se les añade un pequeño cuadradito de
                                colores indicativo de que han quedado mapeados.
                            </p>
                        </div>

                        <!-- Image Content -->
                        <div class="w-full md:w-1/2 order-1 md:order-2">
                            <div
                                class="group relative rounded-2xl p-2 bg-white border border-slate-200 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-primary/10 transition-all duration-500 transform hover:-translate-y-1">
                                <div
                                    class="absolute inset-0 bg-gradient-to-tr from-slate-100 via-transparent to-slate-50 rounded-2xl -z-10">
                                </div>
                                <img src="https://animatek.net/wp-content/uploads/2026/01/Modulos_de_mapeo.webp"
                                    alt="Mapeo MIDI y Control" class="w-full h-auto rounded-xl shadow-sm dark:shadow-none dark:ring-1 dark:ring-white/10">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pro Tip Box -->
                <blockquote
                    class="mt-8 border-l-4 border-slate-400 bg-slate-50 dark:bg-slate-800/40 p-4 rounded-r-xl relative z-10 w-full col-span-2">
                    <div class="flex items-center gap-2 mb-1 text-slate-700 font-bold text-xs uppercase tracking-wider">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                        </svg>
                        Tip de Configuración
                    </div>
                    <p class="text-slate-700 italic text-sm">
                        "Si escuchas chasquidos o 'pops' en el audio, aumenta el <strong>Block Size</strong> a 1024 o
                        2048.
                        Aumenta la latencia pero mejora la estabilidad."
                    </p>
                </blockquote>
            </div>

        </section>

        <!-- 4. Conceptos Básicos: VCO -->
        <section class="max-w-7xl mx-auto px-6 mb-[6.25rem]">
            <div class="bg-white rounded-[1.75rem] border border-slate-200 dark:border-slate-700/50 shadow-sm overflow-hidden p-8 sm:p-12">

                <div class="flex flex-col md:flex-row gap-8 lg:gap-12 items-start">

                    <!-- Text Content (Left) -->
                    <div class="w-full md:w-1/2 order-2 md:order-1 relative z-10">
                        <h2 class="mb-6 flex items-center gap-3">
                            <span
                                class="w-8 h-8 rounded-full bg-primary/10 text-primary text-sm font-bold flex items-center justify-center">4</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8 text-primary">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                            </svg>
                            El Corazón: VCO
                        </h2>

                        <p class="text-slate-600 text-base leading-relaxed mb-6">
                            El <strong>Voltage Controlled Oscillator</strong> es tu fuente de sonido. Genera una onda
                            constante que esculpirás después.
                        </p>

                        <!-- Conceptos clave en grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                            <!-- Card 1: Outputs -->
                            <div
                                class="bg-slate-50 dark:bg-slate-800/40/50 dark:bg-slate-800/40 rounded-xl p-4 border border-slate-200 dark:border-slate-700/50 hover:border-slate-400 dark:hover:border-indigo-600 transition-colors">
                                <h4
                                    class="text-primary font-bold mb-3 text-sm uppercase tracking-wide flex items-center gap-2">
                                    <span>📤</span> Salidas
                                </h4>
                                <ul class="space-y-2 text-sm text-slate-700">
                                    <li
                                        class="flex items-center gap-2 bg-white px-2 py-1 rounded border border-slate-200 dark:border-slate-700/50">
                                        <span class="font-bold text-lg leading-none">~</span> Sinusoidal (Pura)
                                    </li>
                                    <li
                                        class="flex items-center gap-2 bg-white px-2 py-1 rounded border border-slate-200 dark:border-slate-700/50">
                                        <span class="font-bold text-lg leading-none">/\</span> Triangular (Suave)
                                    </li>
                                    <li
                                        class="flex items-center gap-2 bg-white px-2 py-1 rounded border border-slate-200 dark:border-slate-700/50">
                                        <span class="font-bold text-lg leading-none">N</span> Diente de Sierra (Rica)
                                    </li>
                                    <li
                                        class="flex items-center gap-2 bg-white px-2 py-1 rounded border border-slate-200 dark:border-slate-700/50">
                                        <span class="font-bold text-lg leading-none">Π</span> Cuadrada (Digital)
                                    </li>
                                </ul>
                            </div>

                            <!-- Card 2: Inputs -->
                            <div
                                class="bg-slate-50 dark:bg-slate-800/40/50 dark:bg-slate-800/40 rounded-xl p-4 border border-slate-200 dark:border-slate-700/50 hover:border-slate-400 dark:hover:border-green-600 transition-colors">
                                <h4
                                    class="text-slate-600 font-bold mb-3 text-sm uppercase tracking-wide flex items-center gap-2">
                                    <span>📥</span> Entradas
                                </h4>
                                <ul class="space-y-2 text-sm text-slate-700">
                                    <li class="flex justify-between items-center border-b border-slate-200 dark:border-slate-700/50 pb-1">
                                        <span>V/OCT</span> <span class="text-xs text-slate-400">Afinación</span>
                                    </li>
                                    <li class="flex justify-between items-center border-b border-slate-200 dark:border-slate-700/50 pb-1">
                                        <span>FM</span> <span class="text-xs text-slate-400">Vibrato</span>
                                    </li>
                                    <li class="flex justify-between items-center border-b border-slate-200 dark:border-slate-700/50 pb-1">
                                        <span>PWM</span> <span class="text-xs text-slate-400">Ancho Pulso</span>
                                    </li>
                                    <li class="flex justify-between items-center"><span>SYNC</span> <span
                                            class="text-xs text-slate-400">Reset</span></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Pro Tip Box -->
                        <blockquote
                            class="mt-4 border-l-4 border-primary bg-primary/5 p-4 rounded-r-xl relative z-10 w-full">
                            <div
                                class="flex items-center gap-2 mb-1 text-primary font-bold text-xs uppercase tracking-wider">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                </svg>
                                Tip de Patcheo
                            </div>
                            <p class="text-slate-700 italic text-sm">
                                "Algunos VCO, como el <strong>ONA de Nano Modules</strong>, no solo sirven para sonar.
                                Tienen
                                un conmutador para convertirlos en LFOs. Baja el switch <strong>'LFO/VCO'</strong> a
                                'Low'
                                y
                                úsalo como un modulador extra para filtros."
                            </p>
                        </blockquote>
                    </div>

                    <!-- Image Content (Right) -->
                    <div class="w-full md:w-1/2 order-1 md:order-2">
                        <div
                            class="group relative max-w-[480x] mx-auto rounded-2xl p-2 bg-white border border-slate-200 dark:border-slate-700/50 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-primary/10 transition-all duration-500 transform hover:-translate-y-1 md:mt-4">
                            <div
                                class="absolute inset-0 bg-gradient-to-tl from-slate-100 via-transparent to-slate-50 rounded-2xl -z-10">
                            </div>
                            <img src="https://animatek.net/wp-content/uploads/2026/01/VCOS.webp"
                                alt="Módulos VCO: VCV, Surge XT Classic y Befaco Even"
                                class="w-full h-auto rounded-xl shadow-sm dark:shadow-none dark:ring-1 dark:ring-white/10">
                            <div
                                class="absolute bottom-4 left-4 right-4 bg-white/90 dark:bg-slate-900/90 backdrop-blur-sm px-4 py-2 rounded-lg text-xs font-medium text-slate-600 dark:text-slate-300 border border-white/50 dark:border-slate-700/50 shadow-sm text-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                VCV VCO &bull; Surge Classic &bull; Befaco Even
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- 5. Filters VCF -->
        <section class="max-w-7xl mx-auto px-6 mb-[6.25rem]">
            <div
                class="bg-white rounded-[1.75rem] border border-slate-200 dark:border-slate-700/50 shadow-sm overflow-hidden p-8 sm:p-12 relative group">
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-slate-100 dark:bg-slate-800/40 rounded-full blur-3xl -mr-20 -mt-20 opacity-50 dark:opacity-5 group-hover:opacity-100 dark:group-hover:opacity-10 transition-opacity">
                </div>
                <h2 class="mb-8 flex items-center gap-3 relative z-10">
                    <span
                        class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800/40 text-slate-600 text-sm font-bold flex items-center justify-center">5</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8 text-indigo-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                    </svg>
                    Esculpir el sonido con los Filtros VCF
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 relative z-10">
                    <!-- Card 1 -->
                    <div
                        class="bg-white p-5 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-slate-400 transition-colors">
                        <strong class="block text-slate-800 dark:text-slate-200 mb-2 font-bold text-lg">✂️ Síntesis Sustractiva</strong>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            El filtro es el escultor. Comenzamos con un tono rico (onda de sierra) y <strong>eliminamos
                                frecuencias</strong> para moldear el timbre final.
                        </p>
                    </div>
                    <!-- Card 2 -->
                    <div
                        class="bg-white p-5 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-slate-400 transition-colors">
                        <strong class="block text-slate-800 dark:text-slate-200 mb-2 font-bold text-lg">📉 Tipos de Corte</strong>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            <span class="font-semibold text-slate-700">LPF (Paso Bajo):</span> Corta agudos (sonido
                            opaco).<br>
                            <span class="font-semibold text-slate-700">HPF (Paso Alto):</span> Corta graves (sonido
                            fino).
                        </p>
                    </div>
                    <!-- Card 3 -->
                    <div
                        class="bg-white p-5 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-slate-400 transition-colors">
                        <strong class="block text-slate-800 dark:text-slate-200 mb-2 font-bold text-lg">🎛️ Control por Voltaje</strong>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Un <em>Voltage Controlled Filter (VCF)</em> permite mover el corte (Cutoff) automáticamente
                            usando <strong>envolventes o LFOs</strong>.
                        </p>
                    </div>
                    <!-- Card 4 -->
                    <div
                        class="bg-white p-5 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-slate-400 transition-colors">
                        <strong class="block text-slate-800 dark:text-slate-200 mb-2 font-bold text-lg">📦 Variantes</strong>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Desde los clásicos analógicos hasta los <strong>Low Pass Gates (LPG)</strong> que controlan
                            tono y volumen simultáneamente (estilo Buchla).
                        </p>
                    </div>
                </div>

                <!-- Pro Tip Box -->
                <blockquote class="mt-8 border-l-4 border-slate-400 dark:border-indigo-500 bg-slate-50 dark:bg-slate-800/40/50 dark:bg-slate-800/40 p-4 rounded-r-xl relative z-10">
                    <div
                        class="flex items-center gap-2 mb-1 text-slate-700 font-bold text-xs uppercase tracking-wider">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                        Tip de Patcheo
                    </div>
                    <p class="text-slate-700 italic text-sm">
                        "Conecta la salida de una <strong>Envolvente (ADSR)</strong> a la entrada
                        <strong>Freq/Cutoff</strong>
                        del filtro. Esto crea ese clásico sonido percusivo o de bajo que se vuelve más brillante al
                        inicio
                        de la nota."
                    </p>
                </blockquote>
            </div>
        </section>

        <!-- 6. ADSR -->
        <section class="max-w-7xl mx-auto px-6 mb-[6.25rem]">
            <div
                class="bg-white rounded-[1.75rem] border border-slate-200 dark:border-slate-700/50 shadow-sm overflow-hidden p-8 sm:p-12 relative group">
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-slate-100 dark:bg-slate-800/40 rounded-full blur-3xl -mr-20 -mt-20 opacity-50 dark:opacity-5 group-hover:opacity-100 dark:group-hover:opacity-10 transition-opacity">
                </div>
                <h2 class="mb-8 flex items-center gap-3 relative z-10">
                    <span
                        class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800/40 text-slate-600 text-sm font-bold flex items-center justify-center">6</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-8 h-8 text-blue-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12h4.5l3 7.5 6-15 3 7.5h4.5" />
                    </svg>
                    ADSR: El control del sonido en el tiempo
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 relative z-10">
                    <!-- Card 1 -->
                    <div
                        class="bg-white p-5 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-slate-400 transition-colors">
                        <strong class="block text-slate-800 dark:text-slate-200 mb-2 font-bold text-lg">🔄 Ciclo de Vida</strong>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Cuatro etapas dan forma a la nota:<br>
                            <strong>Attack</strong> (Subida), <strong>Decay</strong> (Caída), <strong>Sustain</strong>
                            (Mantenimiento) y <strong>Release</strong> (Liberación).
                        </p>
                    </div>
                    <!-- Card 2 -->
                    <div
                        class="bg-white p-5 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-slate-400 transition-colors">
                        <strong class="block text-slate-800 dark:text-slate-200 mb-2 font-bold text-lg">⚡ Generación de CV</strong>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Convierte un disparo (Gate) en una <strong>curva de voltaje</strong> que dibuja la evolución
                            del
                            sonido en el tiempo.
                        </p>
                    </div>
                    <!-- Card 3 -->
                    <div
                        class="bg-white p-5 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-slate-400 transition-colors">
                        <strong class="block text-slate-800 dark:text-slate-200 mb-2 font-bold text-lg">🎯 Destinos Clave</strong>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Se conecta al <strong>VCA</strong> (para el volumen) y al <strong>VCF</strong> (para el
                            brillo). Sin ADSR, el sonido sería un "beep" estático "on/off".
                        </p>
                    </div>
                    <!-- Card 4 -->
                    <div
                        class="bg-white p-5 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-slate-400 transition-colors">
                        <strong class="block text-slate-800 dark:text-slate-200 mb-2 font-bold text-lg">🚪 Gate vs. Trigger</strong>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            El <strong>Gate</strong> sostiene la nota (fase Sustain). El <strong>Trigger</strong> solo
                            la
                            dispara (útil para percusión).
                        </p>
                    </div>
                </div>

                <!-- Pro Tip Box -->
                <blockquote class="mt-8 border-l-4 border-slate-400 bg-slate-50 dark:bg-slate-800/40 p-4 rounded-r-xl relative z-10">
                    <div class="flex items-center gap-2 mb-1 text-slate-700 font-bold text-xs uppercase tracking-wider">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        Tip de Patcheo
                    </div>
                    <p class="text-slate-700 italic text-sm">
                        "Para crear un sonido tipo <strong>'Pluck'</strong> (cuerda pulsada), usa un Attack a cero, un
                        Decay corto, Sustain a cero y un poco de Release. ¡Snappy!"
                    </p>
                </blockquote>
            </div>
        </section>

        <!-- 7. Modulaciones -->
        <section class="max-w-7xl mx-auto px-6 mb-[6.25rem]">
            <div
                class="bg-white rounded-[1.75rem] border border-slate-200 dark:border-slate-700/50 shadow-sm overflow-hidden p-8 sm:p-12 relative group">
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-slate-100 dark:bg-slate-800/40 rounded-full blur-3xl -mr-20 -mt-20 opacity-50 dark:opacity-5 group-hover:opacity-100 dark:group-hover:opacity-10 transition-opacity">
                </div>
                <h2 class="mb-8 flex items-center gap-3 relative z-10">
                    <span
                        class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800/40 text-slate-600 text-sm font-bold flex items-center justify-center">7</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8 text-purple-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.75 4.75a1 1 0 011.06.059l9.314 7.45a1 1 0 001.272 0l4.344-3.475M4.75 19.25a1 1 0 001.06-.059l9.314-7.45a1 1 0 011.272 0l4.344 3.475" />
                    </svg>
                    Modulaciones: La vida en el sonido
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 relative z-10">
                    <!-- Card 1 -->
                    <div
                        class="bg-white p-5 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-slate-400 transition-colors">
                        <strong class="block text-slate-800 dark:text-slate-200 mb-2 font-bold text-lg">🌊 Fuentes de Movimiento</strong>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Los moduladores son las "manos invisibles" que giran los knobs por ti. Generan voltaje para
                            <strong>alterar parámetros</strong> automáticamente.
                        </p>
                    </div>
                    <!-- Card 2 -->
                    <div
                        class="bg-white p-5 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-slate-400 transition-colors">
                        <strong class="block text-slate-800 dark:text-slate-200 mb-2 font-bold text-lg">🐌 LFOs</strong>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            <em>Low Frequency Oscillators</em>. Son osciladores tan lentos que no se oyen, pero se
                            "sienten"
                            como cambios rítmicos.
                        </p>
                    </div>
                    <!-- Card 3 -->
                    <div
                        class="bg-white p-5 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-slate-400 transition-colors">
                        <strong class="block text-slate-800 dark:text-slate-200 mb-2 font-bold text-lg">🎸 Efectos Musicales</strong>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            LFO &rarr; VCA = <strong>Tremolo</strong> (volumen).<br>
                            LFO &rarr; VCO Pitch = <strong>Vibrato</strong> (afinación).
                        </p>
                    </div>
                    <!-- Card 4 -->
                    <div
                        class="bg-white p-5 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-slate-400 transition-colors">
                        <strong class="block text-slate-800 dark:text-slate-200 mb-2 font-bold text-lg">📻 Síntesis FM</strong>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Si aceleras un LFO hasta rango de audio, se convierte en modulador FM, creando timbres
                            <strong>metálicos y complejos</strong>.
                        </p>
                    </div>
                </div>

                <!-- Pro Tip Box -->
                <blockquote class="mt-8 border-l-4 border-slate-400 bg-slate-50 dark:bg-slate-800/40 p-4 rounded-r-xl relative z-10">
                    <div
                        class="flex items-center gap-2 mb-1 text-slate-700 font-bold text-xs uppercase tracking-wider">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                        Tip de Patcheo
                    </div>
                    <p class="text-slate-700 italic text-sm">
                        "Usa un LFO lento para modular el <strong>Pulse Width (PWM)</strong> de una onda cuadrada.
                        ¡Obtendrás un sutil efecto 'Chorus' instantáneo!"
                    </p>
                </blockquote>
            </div>
        </section>

        <!-- 8. Voltaje -->
        <section class="max-w-7xl mx-auto px-6 mb-[6.25rem]">
            <div
                class="bg-white rounded-[1.75rem] border border-slate-200 dark:border-slate-700/50 shadow-sm overflow-hidden p-8 sm:p-12 relative group">
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-slate-100 dark:bg-slate-800/40 rounded-full blur-3xl -mr-20 -mt-20 opacity-50 dark:opacity-5 group-hover:opacity-100 dark:group-hover:opacity-10 transition-opacity">
                </div>

                <h2 class="mb-6 flex items-center gap-3 relative z-10 w-full">
                    <span
                        class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800/40 text-slate-600 text-sm font-bold flex items-center justify-center shrink-0">8</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8 text-amber-500 shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                    </svg>
                    Voltaje: La forma de comunicación de los sintes
                </h2>

                <!-- Intro Text -->
                <p class="text-slate-600 mb-8 leading-relaxed max-w-4xl relative z-10">
                    En el mundo modular, no existe diferencia real entre el sonido y las instrucciones de control; todo
                    es
                    electricidad. Sin embargo, para dominar el sistema es crucial entender los dos "dialectos"
                    principales
                    que hablan los módulos: señales unipolares y bipolares.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 relative z-10">

                    <!-- Card 1: Unipolar -->
                    <div
                        class="bg-white p-5 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-slate-400 transition-colors h-full flex flex-col">
                        <strong
                            class="block text-slate-800 dark:text-slate-200 mb-3 font-bold text-lg leading-tight flex items-center gap-2">
                            <span>📈</span> Unipolares <span
                                class="text-xs bg-slate-100 dark:bg-slate-800/40 text-slate-500 px-2 py-0.5 rounded font-normal">0V a
                                +10V</span>
                        </strong>
                        <p class="text-sm text-slate-600 leading-relaxed mb-4 flex-grow">
                            Rango solo positivo. Como un pedal de acelerador: de cero al máximo.
                        </p>
                        <ul class="text-xs text-slate-700 dark:text-slate-200 mt-auto bg-slate-100 dark:bg-slate-800 p-3 rounded-lg border border-slate-200 dark:border-slate-700">
                            <li class="flex gap-2 items-start"><span
                                    class="font-bold text-slate-700 dark:text-slate-400 whitespace-nowrap">Usos:</span> <span>Envolventes,
                                    Volúmenes (VCA).</span></li>
                        </ul>
                    </div>

                    <!-- Card 2: Bipolar -->
                    <div
                        class="bg-white p-5 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-slate-400 transition-colors h-full flex flex-col">
                        <strong
                            class="block text-slate-800 dark:text-slate-200 mb-3 font-bold text-lg leading-tight flex items-center gap-2">
                            <span>〰️</span> Bipolares <span
                                class="text-xs bg-slate-100 dark:bg-slate-800/40 text-slate-500 px-2 py-0.5 rounded font-normal">±5V</span>
                        </strong>
                        <p class="text-sm text-slate-600 leading-relaxed mb-4 flex-grow">
                            Oscilan sobre cero (positivo y negativo). Empujan y tiran.
                        </p>
                        <ul class="text-xs text-slate-700 dark:text-slate-200 mt-auto bg-slate-100 dark:bg-slate-800 p-3 rounded-lg border border-slate-200 dark:border-slate-700">
                            <li class="flex gap-2 items-start"><span
                                    class="font-bold text-slate-700 dark:text-slate-400 whitespace-nowrap">Usos:</span> <span>Audio, LFOs
                                    (Vibrato).</span></li>
                        </ul>
                    </div>

                    <!-- Card 3: 1V/Oct -->
                    <div
                        class="bg-white p-5 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-slate-400 transition-colors h-full flex flex-col">
                        <strong
                            class="block text-slate-800 dark:text-slate-200 mb-3 font-bold text-lg leading-tight flex items-center gap-2">
                            <span>📏</span> Estándar 1V/Oct
                        </strong>
                        <p class="text-sm text-slate-600 leading-relaxed mb-4 flex-grow">
                            La regla de oro de la afinación. <strong>+1 Voltio = +1 Octava</strong>. Sin esto, los
                            osciladores no afinan.
                        </p>
                        <div class="mt-auto">
                            <div
                                class="flex items-center gap-2 p-2 bg-slate-100 dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-200 text-sm font-semibold justify-center">
                                🟡 Cable Amarillo
                            </div>
                        </div>
                    </div>

                    <!-- Card 4: Logic Gates -->
                    <div
                        class="bg-white p-5 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-slate-400 transition-colors h-full flex flex-col">
                        <strong
                            class="block text-slate-800 dark:text-slate-200 mb-3 font-bold text-lg leading-tight flex items-center gap-2">
                            <span>0️⃣1️⃣</span> Lógica / Gate
                        </strong>
                        <p class="text-sm text-slate-600 leading-relaxed mb-4 flex-grow">
                            Lenguaje rítmico binario (On/Off).
                        </p>
                        <ul class="text-xs text-slate-700 dark:text-slate-200 mb-3 mt-auto bg-slate-100 dark:bg-slate-800 p-3 rounded-lg border border-slate-200 dark:border-slate-700">
                            <li><strong>Gate:</strong> Duración (tecla pulsada).</li>
                            <li><strong>Trigger:</strong> Disparo instantáneo.</li>
                        </ul>
                        <div
                            class="flex items-center gap-2 p-2 bg-slate-100 dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-200 text-sm font-semibold justify-center">
                            🔵 Cable Azul
                        </div>
                    </div>

                </div>

                <!-- Pro Tip Box -->
                <blockquote class="mt-8 border-l-4 border-slate-400 bg-slate-50 dark:bg-slate-800/40 p-4 rounded-r-xl relative z-10">
                    <div class="flex items-center gap-2 mb-1 text-slate-700 dark:text-slate-400 font-bold text-xs uppercase tracking-wider">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        Tip de Patcheo
                    </div>
                    <p class="text-slate-700 dark:text-slate-300 italic text-sm">
                        "¡Mezcla, no solo conectes! Sumar una Envolvente + un LFO usando un Mixer antes de ir al filtro
                        te
                        dará una modulación compleja y evolutiva."
                    </p>
                </blockquote>
            </div>
        </section>

        <!-- 9. Creación Musical -->
        <section class="max-w-7xl mx-auto px-6 mb-[6.25rem]">
            <div class="bg-white rounded-[1.75rem] border border-slate-200 dark:border-slate-700/50 shadow-sm overflow-hidden p-8 sm:p-12">
                <h2 class="mb-8 flex items-center gap-3">
                    <span
                        class="w-8 h-8 rounded-full bg-primary/10 text-primary text-sm font-bold flex items-center justify-center">9</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8 text-primary">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 9l10.5-3m0 6.553v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 11-.99-3.467l2.31-.66a2.25 2.25 0 001.632-2.163zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 01-.99-3.467l2.31-.66A2.25 2.25 0 009 15.553z" />
                    </svg>
                    Creación Musical
                </h2>

                <!-- Secuenciadores Block (No bg container needed as it's the main content now) -->
                <div>
                    <h3 class="text-2xl font-bold text-primary mb-4">Secuenciadores</h3>
                    <p class="text-slate-600 mb-8 leading-relaxed max-w-3xl">
                        Uno de los puntos fuertes del mundo Eurorack y por tanto de VCV son los secuenciadores. Podemos
                        crear secuencias muy creativas con ellos y sin duda son un elemento en el que vas a gastar mucho
                        tiempo.
                    </p>

                    <!-- Secondary Sequencers Group -->
                    <div class="space-y-8 mb-8">

                        <!-- Top: Image -->
                        <div
                            class="group relative rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-700/50 shadow-lg max-w-4xl mx-auto">
                            <div
                                class="absolute inset-0 bg-gradient-to-tr from-slate-100/50 via-transparent to-slate-50/50 -z-10">
                            </div>
                            <img src="https://animatek.net/wp-content/uploads/2026/01/Sequencers.webp"
                                alt="Secuenciadores VCV Rack"
                                class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-700">
                            <div
                                class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-6 pt-12">
                                <p class="text-white text-sm font-medium">Colección de Secuenciadores Esenciales</p>
                            </div>
                        </div>

                        <!-- Bottom: Grid of 4 Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <!-- Card 1: SEQ3 -->
                            <div
                                class="bg-white p-5 rounded-xl text-slate-700 border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-primary/50 transition-colors h-full">
                                <strong
                                    class="block text-slate-900 text-lg mb-2 font-bold flex items-center gap-2"><span>🎹</span>
                                    SEQ 3 <span
                                        class="text-xs font-normal text-slate-400 bg-slate-100 dark:bg-slate-800/40 px-2 rounded-full">VCV</span></strong>
                                <p class="text-slate-600 text-sm leading-relaxed">El clásico. 3 pistas de 8 pasos.
                                    Simple
                                    pero potente para empezar a entender el concepto de paso a paso.</p>
                            </div>

                            <!-- Card 2: ADDR-SEQ -->
                            <div
                                class="bg-white p-5 rounded-xl text-slate-700 border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-primary/50 transition-colors h-full">
                                <strong
                                    class="block text-slate-900 text-lg mb-2 font-bold flex items-center gap-2"><span>📍</span>
                                    ADDR-SEQ <span
                                        class="text-xs font-normal text-slate-400 bg-slate-100 dark:bg-slate-800/40 px-2 rounded-full">Bogaudio</span></strong>
                                <p class="text-slate-600 text-sm leading-relaxed">Secuenciador direccionable. Puedes
                                    saltar
                                    a cualquier paso mediante voltaje. Hasta 16 pasos con expansor.</p>
                            </div>

                            <!-- Card 3: Turing Machine -->
                            <div
                                class="bg-white p-5 rounded-xl text-slate-700 border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-primary/50 transition-colors h-full">
                                <strong
                                    class="block text-slate-900 text-lg mb-2 font-bold flex items-center gap-2"><span>🎲</span>
                                    Turing Machine</strong>
                                <p class="text-slate-600 text-sm leading-relaxed mb-3">Generador de secuencias
                                    aleatorias
                                    que se pueden bloquear en bucles repetitivos.</p>
                                <a href="https://youtu.be/foCTfwMyZ8Q" target="_blank"
                                    class="inline-flex items-center text-slate-600 hover:text-slate-700 font-bold text-xs bg-slate-50 dark:bg-slate-800/40 px-3 py-1.5 rounded-full border border-slate-200 dark:border-slate-700/50">
                                    <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                                    </svg>
                                    Ver Tutorial
                                </a>
                            </div>

                            <!-- Card 4: Noteseq16 -->
                            <div
                                class="bg-white p-5 rounded-xl text-slate-700 border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-primary/50 transition-colors h-full">
                                <strong
                                    class="block text-slate-900 text-lg mb-2 font-bold flex items-center gap-2"><span>🎼</span>
                                    Noteseq16 <span
                                        class="text-xs font-normal text-slate-400 bg-slate-100 dark:bg-slate-800/40 px-2 rounded-full">JW</span></strong>
                                <p class="text-slate-600 text-sm leading-relaxed">Secuenciador visual con cuantizador
                                    integrado. Dibuja tus melodías directamente.</p>
                            </div>

                        </div>

                        <!-- Pro Tip Box -->
                        <blockquote
                            class="mt-8 border-l-4 border-slate-400 bg-slate-50 dark:bg-slate-800/40 p-4 rounded-r-xl relative z-10 w-full col-span-2">
                            <div
                                class="flex items-center gap-2 mb-1 text-slate-700 font-bold text-xs uppercase tracking-wider">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Tip de Patcheo
                            </div>
                            <p class="text-slate-700 italic text-sm">
                                "Usa un <strong>Clock Divider</strong> antes del reloj de tu secuenciador. Te permitirá
                                tener melodías lentas mientras tus ritmos van rápido (o polirritmos si divides por
                                números
                                impares)."
                            </p>
                        </blockquote>
                    </div>

                    <!-- Featured: UZZ RACK (Full Width) -->
                    <div
                        class="bg-white p-0 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:shadow-lg transition-all group overflow-hidden">
                        <div class="flex flex-col md:flex-row">
                            <!-- Image -->
                            <div class="w-full md:w-2/5 relative overflow-hidden bg-slate-100 dark:bg-slate-800/40 h-64 md:h-auto">
                                <img src="https://animatek.net/wp-content/uploads/2025/11/UZZ_Curso.webp"
                                    alt="UZZ Rack VCV"
                                    class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 absolute inset-0">
                                <div class="absolute inset-0 ring-1 ring-inset ring-black/5"></div>
                            </div>

                            <!-- Content -->
                            <div class="p-6 md:p-8 w-full md:w-3/5 flex flex-col justify-center">
                                <strong class="block text-slate-900 text-xl mb-3 font-bold">UZZ Rack (Animatek)</strong>
                                <p class="mb-6 text-slate-600 leading-relaxed">
                                    Secuenciador de 16 pasos diseñado específicamente para VCV Rack. Ofrece funciones
                                    aleatorias controladas y una matriz de modulación interna capaz de mover cualquier
                                    parámetro dentro del patch. Está orientado al directo: permite improvisar, mutar
                                    patrones y generar secuencias en evolución directamente en el entorno modular.
                                </p>

                                <!-- Links -->
                                <div class="flex gap-3 flex-wrap">
                                    <a href="http://localhost:8081/ultimate-ztep-zequencer-vcvrack/" target="_blank"
                                        class="inline-flex items-center text-sm font-bold text-white bg-primary px-5 py-2.5 rounded-full hover:bg-primary/90 transition-colors shadow-lg shadow-primary/20">
                                        Ver Módulo
                                    </a>
                                    <a href="https://animatek.net/cursos/curso-uzz/" target="_blank"
                                        class="inline-flex items-center text-sm font-bold text-primary bg-primary/10 px-5 py-2.5 rounded-full hover:bg-primary/20 transition-colors">
                                        Ver Curso
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 10. Logic & Quantizers -->
        <section class="max-w-7xl mx-auto px-6 mb-[6.25rem]">
            <div
                class="bg-white rounded-[1.75rem] border border-slate-200 dark:border-slate-700/50 shadow-sm overflow-hidden p-8 sm:p-12 relative group">
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-slate-200 rounded-full blur-3xl -mr-20 -mt-20 opacity-50 dark:opacity-5 group-hover:opacity-100 dark:group-hover:opacity-10 transition-opacity">
                </div>
                <h2 class="mb-8 flex items-center gap-3 relative z-10">
                    <span
                        class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800/40 text-slate-700 text-sm font-bold flex items-center justify-center">10</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8 text-slate-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 16.5V21m3.75-18v1.5m0 16.5V21m-9-1.5h10.5a2.25 2.25 0 002.25-2.25V6.75a2.25 2.25 0 00-2.25-2.25H6.75A2.25 2.25 0 004.5 6.75v10.5a2.25 2.25 0 002.25 2.25z" />
                    </svg>
                    Operaciones lógicas, S&H y mecanismos
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 relative z-10 mb-12">
                    <!-- Card 1 -->
                    <div
                        class="bg-white p-5 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-slate-400 transition-colors">
                        <strong class="block text-slate-900 mb-2 font-bold text-lg">📸 Sample & Hold</strong>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Como una cámara: al recibir un trigger, "congela" el voltaje de entrada hasta el próximo
                            disparo, creando pasos escalonados.
                        </p>
                    </div>
                    <!-- Card 2 -->
                    <div
                        class="bg-white p-5 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-slate-400 transition-colors">
                        <strong class="block text-slate-900 mb-2 font-bold text-lg">⏳ Clock Dividers</strong>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Módulos esenciales para ritmos. Dividen el pulso principal (/2, /4, /8) para crear compases
                            más lentos o polirritmias complejas.
                        </p>
                    </div>
                    <!-- Card 3 -->
                    <div
                        class="bg-white p-5 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-slate-400 transition-colors">
                        <strong class="block text-slate-900 mb-2 font-bold text-lg">⚖️ Módulos Lógicos</strong>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Comparadores y Puertas (AND, OR). Toman decisiones musicales: "¿Si A es mayor que B,
                            entonces
                            dispara el bombo?".
                        </p>
                    </div>
                    <!-- Card 4 -->
                    <div
                        class="bg-white p-5 rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm hover:border-slate-400 transition-colors">
                        <strong class="block text-slate-900 mb-2 font-bold text-lg">🎹 Cuantización</strong>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            El "Auto-Tune" modular. Fuerza los voltajes "desafinados" a entrar en la escala musical que
                            elijas.
                        </p>
                    </div>
                </div>

                <!-- Pro Tip Box -->
                <blockquote class="mb-12 border-l-4 border-slate-400 bg-slate-50 dark:bg-slate-800/40 p-4 rounded-r-xl relative z-10">
                    <div class="flex items-center gap-2 mb-1 text-slate-700 font-bold text-xs uppercase tracking-wider">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                        Tip de Patcheo
                    </div>
                    <p class="text-slate-700 italic text-sm">
                        "Usa un <strong>Bernoulli Gate</strong> para añadir probabilidad a tus hi-hats. A veces suenan,
                        a
                        veces no. Eso es 'Human Feel'."
                    </p>
                </blockquote>

                <!-- Quantizers Block Merged -->
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-2xl font-bold text-slate-600">Cuantizadores</h3>
                        <a href="https://library.vcvrack.com/?query=&brand=&tag=Quantizer" target="_blank"
                            class="text-xs font-bold text-slate-600 bg-slate-50 dark:bg-slate-800/40 px-3 py-1.5 rounded-full border border-slate-200 dark:border-slate-700/50 hover:bg-slate-100 dark:bg-slate-800/40 transition-colors">
                            Ver todos en Library
                        </a>
                    </div>
                    <p class="text-slate-600 mb-8 leading-relaxed">
                        Módulos que corrigen el voltaje para ajustarlo a una escala musical. Imprescindibles para que
                        tus
                        secuencias suenen afinadas.
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Card 1: cQuantizer -->
                        <div
                            class="bg-white rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm p-5 hover:border-slate-400 hover:shadow-md transition-all group relative overflow-hidden">
                            <div
                                class="absolute top-0 right-0 w-16 h-16 bg-slate-50 dark:bg-slate-800/40 rounded-bl-full -mr-8 -mt-8 transition-transform group-hover:scale-110">
                            </div>
                            <div class="relative z-10 flex flex-col h-full">
                                <div class="flex items-center gap-3 mb-4">
                                    <span
                                        class="w-10 h-10 rounded-lg bg-slate-100 dark:bg-slate-800/40 flex items-center justify-center text-slate-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                        </svg>
                                    </span>
                                    <div>
                                        <h4
                                            class="font-bold text-slate-900 group-hover:text-slate-600 transition-colors">
                                            <a href="https://library.vcvrack.com/JW-Modules/Quantizer" target="_blank"
                                                class="hover:text-slate-600">Quantizer</a>
                                        </h4>
                                        <span
                                            class="inline-block text-[10px] font-bold uppercase tracking-wider text-slate-500 bg-slate-100 dark:bg-slate-800/40 px-2 py-0.5 rounded-full mt-1">JW
                                            Modules</span>
                                    </div>
                                </div>
                                <p class="text-sm text-slate-600 flex-grow mt-2">
                                    El "Must Have" rápido. 3 Knobs esenciales: Escala, Tónica y Octava. Sin menús.
                                </p>
                            </div>
                        </div>

                        <!-- Card 2: Quantizer (VCV) -->
                        <div
                            class="bg-white rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm p-5 hover:border-slate-400 hover:shadow-md transition-all group relative overflow-hidden">
                            <div
                                class="absolute top-0 right-0 w-16 h-16 bg-slate-50 dark:bg-slate-800/40 rounded-bl-full -mr-8 -mt-8 transition-transform group-hover:scale-110">
                            </div>
                            <div class="relative z-10 flex flex-col h-full">
                                <div class="flex items-center gap-3 mb-4">
                                    <span
                                        class="w-10 h-10 rounded-lg bg-slate-100 dark:bg-slate-800/40 flex items-center justify-center text-slate-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                    </span>
                                    <div>
                                        <h4
                                            class="font-bold text-slate-900 group-hover:text-slate-600 transition-colors">
                                            <a href="https://library.vcvrack.com/Fundamental/Quantizer" target="_blank"
                                                class="hover:text-slate-600">Quantizer</a>
                                        </h4>
                                        <span
                                            class="inline-block text-[10px] font-bold uppercase tracking-wider text-slate-500 bg-slate-100 dark:bg-slate-800/40 px-2 py-0.5 rounded-full mt-1">Fundamental</span>
                                    </div>
                                </div>
                                <p class="text-sm text-slate-600 flex-grow mt-2">
                                    El nativo. Click derecho para elegir escala. Knob 'OFST' para corregir la afinación.
                                </p>
                            </div>
                        </div>

                        <!-- Card 3: Quantum -->
                        <div
                            class="bg-white rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm p-5 hover:border-slate-400 hover:shadow-md transition-all group relative overflow-hidden">
                            <div
                                class="absolute top-0 right-0 w-16 h-16 bg-slate-50 dark:bg-slate-800/40 rounded-bl-full -mr-8 -mt-8 transition-transform group-hover:scale-110">
                            </div>
                            <div class="relative z-10 flex flex-col h-full">
                                <div class="flex items-center gap-3 mb-4">
                                    <span
                                        class="w-10 h-10 rounded-lg bg-slate-100 dark:bg-slate-800/40 flex items-center justify-center text-slate-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                        </svg>
                                    </span>
                                    <div>
                                        <h4
                                            class="font-bold text-slate-900 group-hover:text-slate-600 transition-colors">
                                            <a href="https://library.vcvrack.com/ML_modules/Quantum" target="_blank"
                                                class="hover:text-slate-600">Quantum</a>
                                        </h4>
                                        <span
                                            class="inline-block text-[10px] font-bold uppercase tracking-wider text-slate-500 bg-slate-100 dark:bg-slate-800/40 px-2 py-0.5 rounded-full mt-1">ML
                                            Modules</span>
                                    </div>
                                </div>
                                <p class="text-sm text-slate-600 flex-grow mt-2">
                                    Visual. Selección de notas activas mediante botones tipo piano. Ideal para escalas
                                    custom.
                                </p>
                            </div>
                        </div>

                        <!-- Card 4: Harmonàig -->
                        <div
                            class="bg-white rounded-xl border border-slate-200 dark:border-slate-700/50 shadow-sm p-5 hover:border-slate-400 hover:shadow-md transition-all group relative overflow-hidden">
                            <div
                                class="absolute top-0 right-0 w-16 h-16 bg-slate-100 dark:bg-slate-800/40 rounded-bl-full -mr-8 -mt-8 transition-transform group-hover:scale-110">
                            </div>
                            <div class="relative z-10 flex flex-col h-full">
                                <div class="flex items-center gap-3 mb-4">
                                    <span
                                        class="w-10 h-10 rounded-lg bg-slate-800 flex items-center justify-center text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </span>
                                    <div>
                                        <h4
                                            class="font-bold text-slate-900 group-hover:text-slate-600 transition-colors">
                                            <a href="https://library.vcvrack.com/Instruo/harmonaig" target="_blank"
                                                class="hover:text-slate-600">Harmonàig</a>
                                        </h4>
                                        <span
                                            class="inline-block text-[10px] font-bold uppercase tracking-wider text-slate-500 bg-slate-100 dark:bg-slate-800/40 px-2 py-0.5 rounded-full mt-1">Instruō</span>
                                    </div>
                                </div>
                                <p class="text-sm text-slate-600 flex-grow mt-2">
                                    La bestia polifónica. 4 voces para crear acordes automáticos diatónicos. Premium.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 11. Tutoriales Recomendados -->
        <section class="max-w-7xl mx-auto px-6 mb-[6.25rem]">
            <div class="bg-white rounded-[1.75rem] border border-slate-200 dark:border-slate-700/50 shadow-sm overflow-hidden p-8 sm:p-12">
                <h2 class="mb-8 flex items-center gap-3">
                    <span
                        class="w-8 h-8 rounded-full bg-primary/10 text-primary text-sm font-bold flex items-center justify-center">11</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8 text-primary">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.499 5.216 50.59 50.59 0 00-2.658.812m-15.482 0a50.697 50.697 0 01-1.772-.779 50.502 50.502 0 0117.254 0 50.71 50.71 0 01-1.772.779m-15.482 0c.32.17.65.334.99.497m15.481 0c-.32.17-.65.334-.99.497" />
                    </svg>
                    Tutoriales Recomendados (Para Empezar)
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <!-- Video 1 -->
                    <div class="space-y-3 group">
                        <h3
                            class="text-lg font-bold text-slate-900 group-hover:text-primary transition-colors leading-tight">
                            Tu Primera Secuencia
                        </h3>
                        <div
                            class="rounded-xl overflow-hidden shadow-lg group-hover:shadow-xl transition-all border border-slate-200 dark:border-slate-700/50">
                            <div class="aspect-video relative bg-slate-100 dark:bg-slate-800/40">
                                <button onclick="playYoutubeVideo(this, 'https://www.youtube.com/embed/MD2Cd_zOnn4?autoplay=1')" class="w-full h-full text-left relative block focus:outline-none">
                                    <img src="https://img.youtube.com/vi/MD2Cd_zOnn4/maxresdefault.jpg"
                                        alt="Tu Primera Secuencia"
                                        class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                        loading="lazy">
                                    <span class="absolute inset-0 bg-slate-950/20 transition group-hover:bg-slate-950/10"></span>
                                    <span class="absolute left-1/2 top-1/2 flex h-14 w-14 -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full bg-red-600 text-white shadow-lg transition group-hover:scale-110">
                                        <svg class="h-6 w-6 translate-x-0.5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M8 5v14l11-7z" />
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Video 2 -->
                    <div class="space-y-3 group">
                        <h3
                            class="text-lg font-bold text-slate-900 group-hover:text-primary transition-colors leading-tight">
                            VCV Rack desde Cero
                        </h3>
                        <div
                            class="rounded-xl overflow-hidden shadow-lg group-hover:shadow-xl transition-all border border-slate-200 dark:border-slate-700/50">
                            <div class="aspect-video relative bg-slate-100 dark:bg-slate-800/40">
                                <button onclick="playYoutubeVideo(this, 'https://www.youtube.com/embed/rhl2ecDW0SY?autoplay=1')" class="w-full h-full text-left relative block focus:outline-none">
                                    <img src="https://img.youtube.com/vi/rhl2ecDW0SY/maxresdefault.jpg"
                                        alt="VCV Rack desde Cero"
                                        class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                        loading="lazy">
                                    <span class="absolute inset-0 bg-slate-950/20 transition group-hover:bg-slate-950/10"></span>
                                    <span class="absolute left-1/2 top-1/2 flex h-14 w-14 -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full bg-red-600 text-white shadow-lg transition group-hover:scale-110">
                                        <svg class="h-6 w-6 translate-x-0.5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M8 5v14l11-7z" />
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Video 3 -->
                    <div class="space-y-3 group">
                        <h3
                            class="text-lg font-bold text-slate-900 group-hover:text-primary transition-colors leading-tight">
                            Guía Completa MixMaster
                        </h3>
                        <div
                            class="rounded-xl overflow-hidden shadow-lg group-hover:shadow-xl transition-all border border-slate-200 dark:border-slate-700/50">
                            <div class="aspect-video relative bg-slate-100 dark:bg-slate-800/40">
                                <button onclick="playYoutubeVideo(this, 'https://www.youtube.com/embed/zsey6XzKDNA?autoplay=1')" class="w-full h-full text-left relative block focus:outline-none">
                                    <img src="https://img.youtube.com/vi/zsey6XzKDNA/maxresdefault.jpg"
                                        alt="Guía Completa MixMaster"
                                        class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                        loading="lazy">
                                    <span class="absolute inset-0 bg-slate-950/20 transition group-hover:bg-slate-950/10"></span>
                                    <span class="absolute left-1/2 top-1/2 flex h-14 w-14 -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full bg-red-600 text-white shadow-lg transition group-hover:scale-110">
                                        <svg class="h-6 w-6 translate-x-0.5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M8 5v14l11-7z" />
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Video 4 -->
                    <div class="space-y-3 group">
                        <h3
                            class="text-lg font-bold text-slate-900 group-hover:text-primary transition-colors leading-tight">
                            Primeros Pasos con Cardinal
                        </h3>
                        <div
                            class="rounded-xl overflow-hidden shadow-lg group-hover:shadow-xl transition-all border border-slate-200 dark:border-slate-700/50">
                            <div class="aspect-video relative bg-slate-100 dark:bg-slate-800/40">
                                <button onclick="playYoutubeVideo(this, 'https://www.youtube.com/embed/tFrtnotI6AU?autoplay=1')" class="w-full h-full text-left relative block focus:outline-none">
                                    <img src="https://img.youtube.com/vi/tFrtnotI6AU/maxresdefault.jpg"
                                        alt="Primeros Pasos con Cardinal"
                                        class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                        loading="lazy">
                                    <span class="absolute inset-0 bg-slate-950/20 transition group-hover:bg-slate-950/10"></span>
                                    <span class="absolute left-1/2 top-1/2 flex h-14 w-14 -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full bg-red-600 text-white shadow-lg transition group-hover:scale-110">
                                        <svg class="h-6 w-6 translate-x-0.5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M8 5v14l11-7z" />
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Video 5 -->
                    <div class="space-y-3 group">
                        <h3
                            class="text-lg font-bold text-slate-900 group-hover:text-primary transition-colors leading-tight">
                            Automatización en el DAW
                        </h3>
                        <div
                            class="rounded-xl overflow-hidden shadow-lg group-hover:shadow-xl transition-all border border-slate-200 dark:border-slate-700/50">
                            <div class="aspect-video relative bg-slate-100 dark:bg-slate-800/40">
                                <button onclick="playYoutubeVideo(this, 'https://www.youtube.com/embed/KJKx-im6D3I?autoplay=1')" class="w-full h-full text-left relative block focus:outline-none">
                                    <img src="https://img.youtube.com/vi/KJKx-im6D3I/maxresdefault.jpg"
                                        alt="Automatización en el DAW"
                                        class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                        loading="lazy">
                                    <span class="absolute inset-0 bg-slate-950/20 transition group-hover:bg-slate-950/10"></span>
                                    <span class="absolute left-1/2 top-1/2 flex h-14 w-14 -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full bg-red-600 text-white shadow-lg transition group-hover:scale-110">
                                        <svg class="h-6 w-6 translate-x-0.5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M8 5v14l11-7z" />
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Video 6 -->
                    <div class="space-y-3 group">
                        <h3
                            class="text-lg font-bold text-slate-900 group-hover:text-primary transition-colors leading-tight">
                            Sintetizador de 3 Osciladores
                        </h3>
                        <div
                            class="rounded-xl overflow-hidden shadow-lg group-hover:shadow-xl transition-all border border-slate-200 dark:border-slate-700/50">
                            <div class="aspect-video relative bg-slate-100 dark:bg-slate-800/40">
                                <button onclick="playYoutubeVideo(this, 'https://www.youtube.com/embed/VQBSR6qAL_k?autoplay=1')" class="w-full h-full text-left relative block focus:outline-none">
                                    <img src="https://img.youtube.com/vi/VQBSR6qAL_k/maxresdefault.jpg"
                                        alt="Sintetizador 3 Osciladores"
                                        class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                        loading="lazy">
                                    <span class="absolute inset-0 bg-slate-950/20 transition group-hover:bg-slate-950/10"></span>
                                    <span class="absolute left-1/2 top-1/2 flex h-14 w-14 -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full bg-red-600 text-white shadow-lg transition group-hover:scale-110">
                                        <svg class="h-6 w-6 translate-x-0.5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M8 5v14l11-7z" />
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Course Playlist -->
                <div class="mt-12">
                    <div
                        class="bg-white rounded-2xl p-8 text-slate-900 border border-slate-200 dark:border-slate-700/50 shadow-sm relative overflow-hidden group">
                        <!-- Background decoration -->
                        <div
                            class="absolute inset-0 opacity-30 pointer-events-none bg-[radial-gradient(circle_at_20%_20%,rgba(33,112,245,0.15),transparent_35%),radial-gradient(circle_at_80%_30%,rgba(56,189,248,0.12),transparent_30%),radial-gradient(circle_at_50%_80%,rgba(99,102,241,0.12),transparent_30%)]">
                        </div>

                        <div
                            class="relative z-10 flex flex-col md:flex-row items-center gap-8 text-center md:text-left">
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold mb-2 text-slate-900">Curso Completo UZZ Rack</h3>
                                <p class="text-slate-600 mb-6">Domina el secuenciador definitivo para VCV Rack. Una
                                    serie de
                                    tutoriales paso a paso para sacarle todo el partido.</p>
                                <a href="https://www.youtube.com/playlist?list=PLEQa2KGITfTsMysD_-YTAgrPIHfKYkBwo"
                                    target="_blank"
                                    class="inline-flex items-center justify-center bg-primary hover:bg-primary/90 text-white font-bold py-3 px-6 rounded-full transition-colors shadow-lg shadow-primary/30">
                                    Ver Playlist en YouTube
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </a>
                            </div>
                            <div
                                class="w-full md:w-1/2 aspect-video rounded-xl overflow-hidden shadow-lg border border-slate-200 dark:border-slate-700/50 group-hover:shadow-xl transition-all relative bg-slate-100 dark:bg-slate-800/40">
                                <button onclick="playYoutubeVideo(this, 'https://www.youtube.com/embed/videoseries?list=PLEQa2KGITfTsMysD_-YTAgrPIHfKYkBwo&autoplay=1')" class="w-full h-full text-left relative block focus:outline-none">
                                    <img src="https://img.youtube.com/vi/QPkYPGQTJz8/maxresdefault.jpg"
                                        alt="Curso UZZ Rack"
                                        class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                        loading="lazy">
                                    <span class="absolute inset-0 bg-slate-950/20 transition group-hover:bg-slate-950/10"></span>
                                    <span class="absolute left-1/2 top-1/2 flex h-14 w-14 -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full bg-red-600 text-white shadow-lg transition group-hover:scale-110">
                                        <svg class="h-6 w-6 translate-x-0.5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M8 5v14l11-7z" />
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- 12. Plantillas y Descargas -->
        <section id="descargas" class="max-w-7xl mx-auto px-6 mb-[6.25rem] scroll-mt-24">
            <div class="bg-white rounded-[1.75rem] border border-slate-200 dark:border-slate-700/50 shadow-sm overflow-hidden p-8 sm:p-12">
                <h2 class="mb-8 flex items-center gap-3">
                    <span
                        class="w-8 h-8 rounded-full bg-primary/10 text-primary text-sm font-bold flex items-center justify-center">12</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8 text-primary">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg>
                    Plantillas y Patches Descargables
                </h2>

                <p class="text-slate-600 dark:text-slate-300 leading-relaxed mb-8 max-w-3xl">
                    Descarga plantillas y patches listos para usar en VCV Rack. Estos recursos están diseñados para ayudarte a arrancar rápidamente tus proyectos con una estructura organizada y un flujo de señal optimizado.
                </p>

                <!-- Puente a Patch Lab: aquí es donde más pega, porque el curso va justo de esto -->
                <div class="mb-8 flex flex-col gap-4 rounded-2xl border border-primary/30 bg-primary/5 p-6 sm:flex-row sm:items-center dark:border-primary/30 dark:bg-primary/10">
                    <p class="flex-1 text-slate-700 dark:text-slate-200 leading-relaxed text-[15px]">
                        <strong class="font-bold text-slate-900 dark:text-white">¿Y si en vez de descargar un patch lo montas tú?</strong>
                        En <strong class="font-semibold">Patch Lab 01</strong> se construyen cinco patches completos de principio a fin, explicando por qué va cada cable donde va. Incluye los <code class="font-mono text-[13px]">.vcv</code> y dos plantillas de techno.
                    </p>
                    <a href="https://animatek.net/patch-lab-01/" class="btn-primary shrink-0 text-sm">
                        Ver Patch Lab 01
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7 7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Plantilla 2026 Card -->
                    <div class="group overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-primary/40 hover:shadow-lg hover:shadow-primary/10 dark:border-slate-700/50 dark:bg-slate-800/40">
                        <div class="relative aspect-video overflow-hidden bg-slate-200 dark:bg-slate-800">
                            <img src="https://animatek.net/wp-content/uploads/2026/06/Plantilla2026.webp"
                                alt="Plantilla VCV Rack 2026"
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            <span class="absolute left-3 top-3 rounded-full bg-slate-950/80 px-2.5 py-1 text-[11px] font-bold uppercase tracking-[0.12em] text-white backdrop-blur">
                                #vcvs #selection
                            </span>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-between gap-3 mb-2">
                                <h3 class="text-xl font-bold text-slate-900 dark:text-white">Plantilla 2026</h3>
                                <span class="rounded-full border border-primary/30 bg-primary/10 px-2.5 py-1 text-[11px] font-semibold text-primary">v1.0</span>
                            </div>
                            <p class="text-sm font-semibold leading-snug text-slate-700 dark:text-slate-200 mb-3">
                                Plantilla base de selección (.vcvs) para iniciar tus parches en VCV Rack
                            </p>
                            <p class="text-xs leading-relaxed text-slate-600 dark:text-slate-400">
                                Una estructura base organizada con selección de módulos esenciales de reloj, mezcla y utilidades configurados bajo el código de colores de Animatek. Ideal para ahorrar tiempo y empezar con buen pie.
                            </p>
                            <div class="mt-6 flex flex-wrap gap-3">
                                <a href="https://animatekcursos.s3.us-east-2.amazonaws.com/Patches+VCVRACK/Plantilla+2026+(selection).vcvs.zip" class="inline-flex items-center justify-center rounded-full bg-primary hover:bg-primary/90 text-white font-bold py-2.5 px-5 text-xs transition-colors shadow-md shadow-primary/20" download>
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Descargar Plantilla
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- FixedRack 40 Cosas Card -->
                    <div class="group overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-primary/40 hover:shadow-lg hover:shadow-primary/10 dark:border-slate-700/50 dark:bg-slate-800/40">
                        <div class="relative aspect-video overflow-hidden bg-slate-200 dark:bg-slate-800">
                            <img src="https://animatek.net/wp-content/uploads/2026/07/FixedArregaldo.webp"
                                alt="FixedRack 40 Cosas VCV Rack"
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            <span class="absolute left-3 top-3 rounded-full bg-slate-950/80 px-2.5 py-1 text-[11px] font-bold uppercase tracking-[0.12em] text-white backdrop-blur">
                                #vcv #fixed
                            </span>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-between gap-3 mb-2">
                                <h3 class="text-xl font-bold text-slate-900 dark:text-white">FixedRack · 40 Cosas</h3>
                                <span class="rounded-full border border-primary/30 bg-primary/10 px-2.5 py-1 text-[11px] font-semibold text-primary">v1.0</span>
                            </div>
                            <p class="text-sm font-semibold leading-snug text-slate-700 dark:text-slate-200 mb-3">
                                Patch fijo (.vcv) con las 40 claves esenciales para dominar VCV Rack
                            </p>
                            <p class="text-xs leading-relaxed text-slate-600 dark:text-slate-400">
                                Ocho años de experiencia con el modular destilados en 40 claves prácticas: fundamentals (VCO, LFO, VCA), workflow con código de colores, ritmo generativo y optimización de CPU. El atajo para pasar del caos a patches coherentes y profesionales.
                            </p>
                            <div class="mt-6 flex flex-wrap gap-3">
                                <a href="https://animatekcursos.s3.us-east-2.amazonaws.com/Preset+y+Recursos/FixedRack40cosas.vcv.zip" class="inline-flex items-center justify-center rounded-full bg-primary hover:bg-primary/90 text-white font-bold py-2.5 px-5 text-xs transition-colors shadow-md shadow-primary/20" download>
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Descargar Patch
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php get_template_part( 'template-parts/block-sound-pack' ); ?>

            </div>
        </section>

        <?php get_template_part('template-parts/block-siguiente-paso'); ?>

        <?php get_template_part('template-parts/block-developers'); ?>

    </div> <!-- End locked-content closing (Before Explora block) -->

    <?php get_template_part('template-parts/block-explora'); ?>

</main>


<script>
function playYoutubeVideo(button, embedUrl) {
    const container = button.parentElement;
    container.innerHTML = `<iframe class="w-full h-full" src="${embedUrl}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
}
</script>

<?php
get_footer();
