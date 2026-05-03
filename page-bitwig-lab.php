<?php
/**
 * Template Name: Bitwig Lab
 */

get_header();
?>

<main id="primary" class="bg-slate-100 text-slate-900 dark:bg-slate-950 dark:text-slate-100">

    <!-- Hero Section -->
    <section class="relative overflow-hidden px-6 sm:px-10 py-28 lg:py-32 text-slate-50"
        style="background-image: linear-gradient(90deg, rgba(15,23,42,0.86) 0%, rgba(15,23,42,0.7) 42%, rgba(15,23,42,0.22) 100%), url('https://animatek.net/wp-content/uploads/2026/04/GRID_portada.webp'); background-size: cover; background-position: center right; background-repeat: no-repeat;">
        <div class="relative max-w-7xl mx-auto z-10">
            <div class="max-w-4xl space-y-6">
                <span class="inline-flex items-center gap-2 px-3 py-1 text-xs font-bold tracking-[0.18em] uppercase border border-white/20 rounded-full bg-white/10 text-white">
                    Bitwig Lab
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight text-white">
                    Bitwig Starter Pack
                </h1>
                <p class="text-xl text-slate-300 leading-relaxed max-w-3xl">
                    Guia de iniciacion para empezar con Bitwig desde cero: ecosistema, primeros pasos en The Grid,
                    ventana principal y modulos basicos para construir tus primeros patches.
                </p>
            </div>
        </div>
    </section>

    <!-- LOCKER GATE -->
    <div id="locker-gate" class="max-w-4xl mx-auto px-6 -mt-10 mb-12 text-center relative z-20">
        <div class="bg-white p-8 rounded-2xl border border-slate-200 dark:border-white/10 dark:bg-slate-900 shadow-xl ring-4 ring-slate-50 dark:ring-white/5 relative overflow-hidden">
            <div class="mb-6">
                <span class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 dark:bg-white/10 text-slate-600 dark:text-slate-200 mb-4 animate-bounce">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </span>
                <h2 class="text-slate-900 dark:text-white mb-2">Desbloquea la guia completa de Bitwig Lab</h2>
                <p class="text-slate-600 dark:text-slate-300 max-w-lg mx-auto">
                    Introduce tu email para acceder <strong>GRATIS</strong> al Bitwig Starter Pack.
                    Desbloqueo inmediato. Solo te enviaremos recursos de Bitwig, nada de spam.
                </p>
            </div>

            <!-- Styles for Brevo (Scoped) -->
            <style>
                @font-face {
                    font-display: block;
                    font-family: Roboto;
                    src: url(https://assets.brevo.com/font/Roboto/Latin/normal/normal/7529907e9eaf8ebb5220c5f9850e3811.woff2) format("woff2"), url(https://assets.brevo.com/font/Roboto/Latin/normal/normal/25c678feafdc175a70922a116c9be3e7.woff) format("woff")
                }

                @font-face {
                    font-display: fallback;
                    font-family: Roboto;
                    font-weight: 600;
                    src: url(https://assets.brevo.com/font/Roboto/Latin/medium/normal/6e9caeeafb1f3491be3e32744bc30440.woff2) format("woff2"), url(https://assets.brevo.com/font/Roboto/Latin/medium/normal/71501f0d8d5aa95960f6475d5487d4c2.woff) format("woff")
                }

                @font-face {
                    font-display: fallback;
                    font-family: Roboto;
                    font-weight: 700;
                    src: url(https://assets.brevo.com/font/Roboto/Latin/bold/normal/3ef7cf158f310cf752d5ad08cd0e7e60.woff2) format("woff2"), url(https://assets.brevo.com/font/Roboto/Latin/bold/normal/ece3a1d82f18b60bcce0211725c476aa.woff) format("woff")
                }

                #sib-container input:-ms-input-placeholder,
                #sib-container input::placeholder,
                #sib-container textarea::placeholder {
                    text-align: left;
                    font-family: Helvetica, sans-serif;
                    color: #c0ccda;
                }

                #sib-container a {
                    text-decoration: underline;
                    color: #2BB2FC;
                }

                .sib-form-message-panel {
                    display: none;
                }
            </style>
            <link rel="stylesheet" href="https://sibforms.com/forms/end-form/build/sib-styles.css">

            <div class="sib-form" style="text-align: center;">
                <div id="sib-form-container" class="sib-form-container" style="display: inline-block; width: 100%; max-width: 540px;">
                    <div id="error-message" class="sib-form-message-panel" style="font-size:16px; text-align:left; font-family:Helvetica, sans-serif; color:#661d1d; background-color:#ffeded; border-radius:3px; border-color:#ff4949;max-width:540px;">
                        <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
                            <span class="sib-form-message-panel__inner-text">No hemos podido validar su suscripcion.</span>
                        </div>
                    </div>

                    <div id="success-message" class="sib-form-message-panel" style="font-size:16px; text-align:left; font-family:Helvetica, sans-serif; color:#085229; background-color:#e7faf0; border-radius:3px; border-color:#13ce66;max-width:540px;">
                        <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
                            <span class="sib-form-message-panel__inner-text">Se ha realizado su suscripcion.</span>
                        </div>
                    </div>

                    <div id="sib-container" class="sib-container--large sib-container--vertical" style="text-align:center; background-color:rgba(255,255,255,1); max-width:540px; border-radius:3px; border-width:1px; border-color:#C0CCD9; border-style:solid; direction:ltr">
                        <form id="sib-form" method="POST" action="https://a2fe0a0a.sibforms.com/serve/MUIFAOTAu3dD3XV99X__NrZf0gPI98ZRU8rLYa3QKa89c6CXoInqc3veK76j9vosdVQeqTFu4oBT-mFrhe_AT_BS-l3e-xJV_5_emKFnc2qhqE5AHQH8B1cRDW7ZTyzcCFso2CL1SxiJI8IknkP39P9Y0L8zAPtFjXrdbJaYyckOWj9kzJ6Hu3xx8CWfSiIF0QuJkLXL-dmVwsLQ" data-type="subscription">
                            <div style="padding: 8px 0;">
                                <div class="sib-input sib-form-block">
                                    <div class="form__entry entry_block">
                                        <div class="form__label-row ">
                                            <label class="entry__label" style="font-weight: 700; text-align:left; font-size:16px; font-family:Helvetica, sans-serif; color:#3c4858;" for="EMAIL" data-required="*">Introduzca su direccion de e-mail para ver el contenido</label>
                                            <div class="entry__field">
                                                <input class="input " type="text" id="EMAIL" name="EMAIL" autocomplete="off" placeholder="EMAIL" data-required="true" required />
                                            </div>
                                        </div>
                                        <label class="entry__error entry__error--primary" style="font-size:16px; text-align:left; font-family:Helvetica, sans-serif; color:#661d1d; background-color:#ffeded; border-radius:3px; border-color:#ff4949;"></label>
                                        <label class="entry__specification" style="font-size:12px; text-align:left; font-family:Helvetica, sans-serif; color:#8390A4; text-align:left">
                                            Introduce tu direccion de e-mail para suscribirte. Ej.: abc@xyz.com
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div style="padding: 8px 0;">
                                <div class="sib-form-block" style="text-align: left">
                                    <button class="sib-form-block__button sib-form-block__button-with-loader" style="font-size:16px; text-align:left; font-weight:700; font-family:Helvetica, sans-serif; color:#FFFFFF; background-color:#3E4857; border-radius:3px; border-width:0px;" form="sib-form" type="submit">
                                        <svg class="icon clickable__icon progress-indicator__icon sib-hide-loader-icon" viewBox="0 0 512 512">
                                            <path d="M460.116 373.846l-20.823-12.022c-5.541-3.199-7.54-10.159-4.663-15.874 30.137-59.886 28.343-131.652-5.386-189.946-33.641-58.394-94.896-95.833-161.827-99.676C261.028 55.961 256 50.751 256 44.352V20.309c0-6.904 5.808-12.337 12.703-11.982 83.556 4.306 160.163 50.864 202.11 123.677 42.063 72.696 44.079 162.316 6.031 236.832-3.14 6.148-10.75 8.461-16.728 5.01z" />
                                        </svg>
                                        SUSCRIBIRSE
                                    </button>
                                </div>
                            </div>
                            <input type="text" name="email_address_check" value="" class="input--hidden">
                            <input type="hidden" name="locale" value="es">
                            <input type="hidden" name="html_type" value="simple">
                        </form>
                    </div>
                </div>
            </div>

            <p class="text-xs text-slate-400 mt-2">*Si el formulario no carga, prueba a desactivar tu adblocker.</p>
        </div>
    </div>

    <!-- LOCKED CONTENT WRAPPER -->
    <!-- Bitwig Lab video cards v2: direct YouTube links + hqdefault thumbnails -->
    <div id="locked-content" class="relative transition-all duration-1000 filter blur-xl grayscale opacity-20 h-[600px] overflow-hidden select-none pointer-events-none">
        <div class="absolute inset-0 z-10 bg-gradient-to-b from-transparent to-slate-100 dark:to-slate-950"></div>

        <section class="max-w-7xl mx-auto px-6 py-16">
            <div class="grid gap-6">
                <article class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-white/10 shadow-sm p-8 sm:p-10">
                    <div class="flex items-start gap-5">
                        <span class="w-10 h-10 rounded-full bg-primary/10 text-primary text-sm font-bold flex items-center justify-center shrink-0">1.1</span>
                        <div class="w-full">
                            <h2 class="text-slate-900 dark:text-white mb-3">Introduccion y Ecosistema</h2>
                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                                Bienvenido al mundo de Bitwig Studio. Este Starter Pack resume lo esencial de los recursos de Animatek para que puedas empezar con una ruta clara: entender el ecosistema, elegir edicion, preparar tu entorno y entrar poco a poco en The Grid.
                            </p>

                            <div class="mt-8">
                                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-4">Comunidad y recursos</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <a href="https://www.youtube.com/user/animatek" target="_blank" rel="noopener"
                                        class="flex items-center p-4 rounded-xl bg-slate-50 dark:bg-slate-950/60 border border-slate-200 dark:border-white/10 hover:border-slate-400 hover:bg-white dark:hover:bg-slate-900 transition-all group shadow-sm">
                                        <span class="w-10 h-10 rounded-full bg-slate-100 dark:bg-white/10 text-slate-600 dark:text-slate-300 flex items-center justify-center mr-4 group-hover:bg-red-600 group-hover:text-white transition-all">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                                            </svg>
                                        </span>
                                        <span>
                                            <span class="block font-bold text-slate-800 dark:text-slate-100">YouTube Animatek</span>
                                            <span class="block text-sm text-slate-500 dark:text-slate-400">Tutoriales, directos y ejemplos</span>
                                        </span>
                                    </a>

                                    <a href="https://discord.gg/emUkHRrvtk" target="_blank" rel="noopener"
                                        class="flex items-center p-4 rounded-xl bg-slate-50 dark:bg-slate-950/60 border border-slate-200 dark:border-white/10 hover:border-slate-400 hover:bg-white dark:hover:bg-slate-900 transition-all group shadow-sm">
                                        <span class="w-10 h-10 rounded-full bg-slate-100 dark:bg-white/10 text-slate-600 dark:text-slate-300 flex items-center justify-center mr-4 group-hover:bg-indigo-600 group-hover:text-white transition-all">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M20.317 4.3698a19.7913 19.7913 0 00-4.8851-1.5152.0741.0741 0 00-.0785.0371c-.211.3753-.4447.8648-.6083 1.2495-1.8447-.2762-3.68-.2762-5.4868 0-.1636-.3933-.4058-.8742-.6177-1.2495a.077.077 0 00-.0785-.037 19.7363 19.7363 0 00-4.8852 1.515.0699.0699 0 00-.0321.0277C.5334 9.0458-.319 13.5799.0992 18.0578a.0824.0824 0 00.0312.0561c2.0528 1.5076 4.0413 2.4228 5.9929 3.0294a.0777.0777 0 00.0842-.0276c.4616-.6304.8731-1.2952 1.226-1.9942a.076.076 0 00-.0416-.1057c-.6528-.2476-1.2743-.5495-1.8722-.8923a.077.077 0 01-.0076-.1277c.1258-.0943.2517-.1923.3718-.2914a.0743.0743 0 01.0776-.0105c3.9278 1.7933 8.18 1.7933 12.0614 0a.0739.0739 0 01.0785.0095c.1202.099.246.1981.3728.2924a.077.077 0 01-.0066.1276 12.2986 12.2986 0 01-1.873.8914.0766.0766 0 00-.0407.1067c.3604.698.7719 1.3628 1.225 1.9932a.076.076 0 00.0842.0286c1.961-.6067 3.9495-1.5219 6.0023-3.0294a.077.077 0 00.0313-.0552c.5004-5.177-.8382-9.6739-3.5485-13.6604a.061.061 0 00-.0312-.0286zM8.02 15.3312c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9555-2.4189 2.157-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.419-2.1568 2.419zm7.9748 0c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9554-2.4189 2.1569-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.419-2.1568 2.419z" />
                                            </svg>
                                        </span>
                                        <span>
                                            <span class="block font-bold text-slate-800 dark:text-slate-100">Discord Animatek</span>
                                            <span class="block text-sm text-slate-500 dark:text-slate-400">Comunidad en español</span>
                                        </span>
                                    </a>

                                    <a href="https://www.bitwig.com/" target="_blank" rel="noopener"
                                        class="flex items-center p-4 rounded-xl bg-slate-50 dark:bg-slate-950/60 border border-slate-200 dark:border-white/10 hover:border-slate-400 hover:bg-white dark:hover:bg-slate-900 transition-all group shadow-sm">
                                        <span class="w-10 h-10 rounded-full bg-slate-100 dark:bg-white/10 text-slate-600 dark:text-slate-300 flex items-center justify-center mr-4 group-hover:bg-lime-500 group-hover:text-slate-950 transition-all">
                                            <img src="https://animatek.net/wp-content/uploads/2025/11/pngwing.com_.png" alt="Bitwig" class="w-6 h-6 object-contain opacity-80 group-hover:opacity-100 transition-opacity">
                                        </span>
                                        <span>
                                            <span class="block font-bold text-slate-800 dark:text-slate-100">Bitwig oficial</span>
                                            <span class="block text-sm text-slate-500 dark:text-slate-400">Descargas, manual y licencias</span>
                                        </span>
                                    </a>

                                    <a href="https://patchstorage.com/platform/bitwig-studio/" target="_blank" rel="noopener"
                                        class="flex items-center p-4 rounded-xl bg-slate-50 dark:bg-slate-950/60 border border-slate-200 dark:border-white/10 hover:border-slate-400 hover:bg-white dark:hover:bg-slate-900 transition-all group shadow-sm">
                                        <span class="w-10 h-10 rounded-full bg-slate-100 dark:bg-white/10 text-slate-600 dark:text-slate-300 flex items-center justify-center mr-4 group-hover:bg-amber-600 group-hover:text-white transition-all">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM5 19V5h14v14H5zm3-12h8v2H8zm0 4h8v2H8zm0 4h5v2H8z" />
                                            </svg>
                                        </span>
                                        <span>
                                            <span class="block font-bold text-slate-800 dark:text-slate-100">Patchstorage</span>
                                            <span class="block text-sm text-slate-500 dark:text-slate-400">Patches y presets para Bitwig</span>
                                        </span>
                                    </a>

                                    <a href="https://www.reddit.com/r/Bitwig/" target="_blank" rel="noopener"
                                        class="flex items-center p-4 rounded-xl bg-slate-50 dark:bg-slate-950/60 border border-slate-200 dark:border-white/10 hover:border-slate-400 hover:bg-white dark:hover:bg-slate-900 transition-all group shadow-sm">
                                        <span class="w-10 h-10 rounded-full bg-slate-100 dark:bg-white/10 text-slate-600 dark:text-slate-300 flex items-center justify-center mr-4 group-hover:bg-orange-600 group-hover:text-white transition-all">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M12 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0zm5.01 4.744c.688 0 1.25.561 1.25 1.249a1.25 1.25 0 0 1-2.498.056l-2.597-.547-.8 3.747c1.824.07 3.48.632 4.674 1.488.308-.309.73-.491 1.207-.491.968 0 1.754.786 1.754 1.754 0 .716-.435 1.333-1.01 1.614a3.111 3.111 0 0 1 .042.52c0 2.694-3.13 4.87-7.004 4.87-3.874 0-7.004-2.176-7.004-4.87 0-.183.015-.366.043-.534A1.748 1.748 0 0 1 4.028 12c0-.968.786-1.754 1.754-1.754.463 0 .898.196 1.207.49 1.207-.883 2.878-1.43 4.744-1.487l.885-4.182a.342.342 0 0 1 .14-.197.35.35 0 0 1 .238-.042l2.906.617a1.214 1.214 0 0 1 1.108-.701zM9.25 12C8.561 12 8 12.562 8 13.25c0 .687.561 1.248 1.25 1.248.687 0 1.248-.561 1.248-1.249 0-.688-.561-1.249-1.249-1.249zm5.5 0c-.687 0-1.248.561-1.248 1.25 0 .687.561 1.248 1.249 1.248.688 0 1.249-.561 1.249-1.249 0-.687-.562-1.249-1.25-1.249zm-5.466 3.99a.327.327 0 0 0-.231.094.33.33 0 0 0 0 .463c.842.842 2.484.913 2.961.913.477 0 2.105-.056 2.961-.913a.361.361 0 0 0 .029-.463.33.33 0 0 0-.464 0c-.547.533-1.684.73-2.512.73-.828 0-1.979-.196-2.512-.73a.326.326 0 0 0-.232-.095z" />
                                            </svg>
                                        </span>
                                        <span>
                                            <span class="block font-bold text-slate-800 dark:text-slate-100">Reddit</span>
                                            <span class="block text-sm text-slate-500 dark:text-slate-400">Subreddit r/Bitwig</span>
                                        </span>
                                    </a>

                                    <a href="https://discord.gg/BEGVRFGTvh" target="_blank" rel="noopener"
                                        class="flex items-center p-4 rounded-xl bg-slate-50 dark:bg-slate-950/60 border border-slate-200 dark:border-white/10 hover:border-slate-400 hover:bg-white dark:hover:bg-slate-900 transition-all group shadow-sm">
                                        <span class="w-10 h-10 rounded-full bg-slate-100 dark:bg-white/10 text-slate-600 dark:text-slate-300 flex items-center justify-center mr-4 group-hover:bg-violet-600 group-hover:text-white transition-all">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M20.317 4.3698a19.7913 19.7913 0 00-4.8851-1.5152.0741.0741 0 00-.0785.0371c-.211.3753-.4447.8648-.6083 1.2495-1.8447-.2762-3.68-.2762-5.4868 0-.1636-.3933-.4058-.8742-.6177-1.2495a.077.077 0 00-.0785-.037 19.7363 19.7363 0 00-4.8852 1.515.0699.0699 0 00-.0321.0277C.5334 9.0458-.319 13.5799.0992 18.0578a.0824.0824 0 00.0312.0561c2.0528 1.5076 4.0413 2.4228 5.9929 3.0294a.0777.0777 0 00.0842-.0276c.4616-.6304.8731-1.2952 1.226-1.9942a.076.076 0 00-.0416-.1057c-.6528-.2476-1.2743-.5495-1.8722-.8923a.077.077 0 01-.0076-.1277c.1258-.0943.2517-.1923.3718-.2914a.0743.0743 0 01.0776-.0105c3.9278 1.7933 8.18 1.7933 12.0614 0a.0739.0739 0 01.0785.0095c.1202.099.246.1981.3728.2924a.077.077 0 01-.0066.1276 12.2986 12.2986 0 01-1.873.8914.0766.0766 0 00-.0407.1067c.3604.698.7719 1.3628 1.225 1.9932a.076.076 0 00.0842.0286c1.961-.6067 3.9495-1.5219 6.0023-3.0294a.077.077 0 00.0313-.0552c.5004-5.177-.8382-9.6739-3.5485-13.6604a.061.061 0 00-.0312-.0286zM8.02 15.3312c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9555-2.4189 2.157-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.419-2.1568 2.419zm7.9748 0c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9554-2.4189 2.1569-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.419-2.1568 2.419z" />
                                            </svg>
                                        </span>
                                        <span>
                                            <span class="block font-bold text-slate-800 dark:text-slate-100">Discord oficial</span>
                                            <span class="block text-sm text-slate-500 dark:text-slate-400">Comunidad internacional de Bitwig</span>
                                        </span>
                                    </a>

                                    <a href="https://bitwish.top/" target="_blank" rel="noopener"
                                        class="flex items-center p-4 rounded-xl bg-slate-50 dark:bg-slate-950/60 border border-slate-200 dark:border-white/10 hover:border-slate-400 hover:bg-white dark:hover:bg-slate-900 transition-all group shadow-sm">
                                        <span class="w-10 h-10 rounded-full bg-slate-100 dark:bg-white/10 text-slate-600 dark:text-slate-300 flex items-center justify-center mr-4 group-hover:bg-emerald-600 group-hover:text-white transition-all">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3.75l2.3 4.66 5.14.75-3.72 3.63.88 5.12L12 15.5l-4.6 2.41.88-5.12-3.72-3.63 5.14-.75L12 3.75Z" />
                                            </svg>
                                        </span>
                                        <span>
                                            <span class="block font-bold text-slate-800 dark:text-slate-100">Bitwish</span>
                                            <span class="block text-sm text-slate-500 dark:text-slate-400">Peticiones de funciones para Bitwig</span>
                                        </span>
                                    </a>

                                    <a href="https://polarity.me/" target="_blank" rel="noopener"
                                        class="flex items-center p-4 rounded-xl bg-slate-50 dark:bg-slate-950/60 border border-slate-200 dark:border-white/10 hover:border-slate-400 hover:bg-white dark:hover:bg-slate-900 transition-all group shadow-sm">
                                        <span class="w-10 h-10 rounded-full bg-slate-100 dark:bg-white/10 text-slate-600 dark:text-slate-300 flex items-center justify-center mr-4 group-hover:bg-cyan-600 group-hover:text-white transition-all">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 5v14m7-7H5m10.8-6.8 3 3m0 7.6-3 3M8.2 5.2l-3 3m0 7.6 3 3" />
                                            </svg>
                                        </span>
                                        <span>
                                            <span class="block font-bold text-slate-800 dark:text-slate-100">Polarity</span>
                                            <span class="block text-sm text-slate-500 dark:text-slate-400">Recursos y tutoriales avanzados</span>
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <div class="grid gap-4 lg:grid-cols-3 mt-6">
                                <div class="rounded-xl border border-slate-200 bg-white p-5 dark:border-white/10 dark:bg-slate-900">
                                    <p class="text-xs font-bold uppercase tracking-[0.14em] text-primary mb-2">EUR 99</p>
                                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Bitwig Studio Essentials</h3>
                                    <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                                        Entrada al ecosistema Bitwig: pistas ilimitadas, VST/CLAP, herramientas de edicion, libreria esencial, Polymer, Sampler, Delay+ y un sistema inicial de modulacion.
                                    </p>
                                </div>
                                <div class="rounded-xl border border-slate-200 bg-white p-5 dark:border-white/10 dark:bg-slate-900">
                                    <p class="text-xs font-bold uppercase tracking-[0.14em] text-primary mb-2">EUR 199</p>
                                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Bitwig Studio Producer</h3>
                                    <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                                        Pensada para produccion mas completa: mas dispositivos, moduladores avanzados, libreria ampliada, audio comping, edicion por capas, multi-out y mas opciones de stretching.
                                    </p>
                                </div>
                                <div class="rounded-xl border border-slate-200 bg-white p-5 dark:border-white/10 dark:bg-slate-900">
                                    <p class="text-xs font-bold uppercase tracking-[0.14em] text-primary mb-2">EUR 399</p>
                                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Bitwig Studio</h3>
                                    <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                                        La version completa: todos los dispositivos principales, modulacion completa, libreria completa, Bitwig Circle y The Grid para crear instrumentos, efectos de audio y efectos de notas.
                                    </p>
                                </div>
                            </div>

                            <div class="mt-6 rounded-xl border border-primary/20 bg-primary/10 p-5 dark:border-primary/30 dark:bg-primary/10">
                                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Plan de actualizaciones de 12 meses</h3>
                                <p class="text-sm text-slate-700 dark:text-slate-200 leading-relaxed">
                                    Las licencias de Bitwig incluyen 12 meses de actualizaciones. Cuando el plan termina, puedes seguir usando la ultima version recibida: no es una suscripcion obligatoria. Si renuevas el plan, vuelves a recibir nuevas versiones durante otros 12 meses.
                                </p>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-white/10 shadow-sm p-8 sm:p-10">
                    <div class="flex items-start gap-5">
                        <span class="w-10 h-10 rounded-full bg-primary/10 text-primary text-sm font-bold flex items-center justify-center shrink-0">2</span>
                        <div class="w-full">
                            <h2 class="text-slate-900 dark:text-white mb-3">Todo empieza con el Dashboard</h2>
                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                                El Dashboard es el panel de control central de Bitwig. No sirve solo para tocar ajustes y preferencias: tambien unifica tus proyectos, plantillas, ejemplos, paquetes de sonido, librerias y recursos de ayuda en un mismo punto de entrada.
                            </p>

                            <div class="mt-8 overflow-hidden rounded-xl border border-slate-200 bg-slate-100 shadow-sm dark:border-white/10 dark:bg-slate-950/60">
                                <img src="https://animatek.net/wp-content/uploads/2026/04/Dashboard.webp"
                                    alt="Dashboard de Bitwig Studio"
                                    class="w-full h-auto object-cover">
                            </div>

                            <div class="grid gap-4 md:grid-cols-3 mt-8">
                                <div class="rounded-xl border border-slate-200 bg-slate-50 p-5 dark:border-white/10 dark:bg-slate-950/60">
                                    <span class="mb-4 flex h-10 w-10 items-center justify-center rounded-full bg-primary/10 text-primary">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 7.5A2.5 2.5 0 0 1 5.5 5h4.1l2 2H18.5A2.5 2.5 0 0 1 21 9.5v7A2.5 2.5 0 0 1 18.5 19h-13A2.5 2.5 0 0 1 3 16.5v-9Z" />
                                        </svg>
                                    </span>
                                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Proyectos a mano</h3>
                                    <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                                        Desde el Dashboard puedes buscar proyectos, abrir recientes, acceder a tu cuenta y arrancar desde plantillas o ejemplos ya preparados para no empezar en blanco.
                                    </p>
                                </div>

                                <div class="rounded-xl border border-slate-200 bg-slate-50 p-5 dark:border-white/10 dark:bg-slate-950/60">
                                    <span class="mb-4 flex h-10 w-10 items-center justify-center rounded-full bg-primary/10 text-primary">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 7.5 12 3 4 7.5m16 0-8 4.5m8-4.5v9L12 21m0-9L4 7.5m8 4.5v9m0-9L4 16.5" />
                                        </svg>
                                    </span>
                                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Paquetes y librerias</h3>
                                    <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                                        Tambien se gestionan los sound packs y librerias: contenido gratuito, paquetes incluidos con tu licencia y material adicional que puedes instalar cuando lo necesites.
                                    </p>
                                </div>

                                <div class="rounded-xl border border-slate-200 bg-slate-50 p-5 dark:border-white/10 dark:bg-slate-950/60">
                                    <span class="mb-4 flex h-10 w-10 items-center justify-center rounded-full bg-primary/10 text-primary">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 18h.01M9.6 9.4a2.6 2.6 0 1 1 4.1 2.1c-.9.6-1.7 1.2-1.7 2.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </span>
                                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Ayuda y manual</h3>
                                    <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                                        La seccion de ayuda enlaza novedades, noticias, tutoriales actualizados y documentacion del programa. El manual completo tambien esta disponible online.
                                    </p>
                                    <a href="https://www.bitwig.com/userguide/latest/welcome_to_bitwig_studio/" target="_blank" rel="noopener" class="inline-flex items-center justify-center rounded-full bg-slate-900 px-3 py-1.5 text-xs font-bold text-white transition hover:bg-primary dark:bg-white dark:text-slate-950 dark:hover:bg-primary dark:hover:text-white mt-4">
                                        Ver manual online
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="overflow-hidden rounded-2xl border border-primary/25 bg-gradient-to-br from-primary/10 via-white to-emerald-50 p-8 shadow-sm dark:border-primary/30 dark:from-primary/15 dark:via-slate-900 dark:to-emerald-950/30 sm:p-10">
                    <div class="grid gap-8 lg:grid-cols-[1.35fr_0.65fr] lg:items-center">
                        <div>
                            <div class="mb-5 flex flex-wrap items-center gap-3">
                                <span class="inline-flex items-center rounded-full border border-amber-400/40 bg-amber-400/15 px-3 py-1 text-xs font-bold uppercase tracking-[0.14em] text-amber-700 dark:border-amber-300/30 dark:bg-amber-400/10 dark:text-amber-200">
                                    Early Access
                                </span>
                                <span class="inline-flex items-center rounded-full border border-primary/25 bg-primary/10 px-3 py-1 text-xs font-bold uppercase tracking-[0.14em] text-primary">
                                    Curso en desarrollo
                                </span>
                            </div>

                            <h2 class="text-slate-900 dark:text-white mb-4">
                                Aprende Bitwig desde dentro, sin perderte entre menus, clips y cables virtuales.
                            </h2>

                            <p class="text-slate-700 dark:text-slate-200 leading-relaxed mb-5">
                                Un curso practico de Animatek para entender Bitwig desde la base: ubicaciones y configuracion, interfaz, pistas, clips, Polymer, Note Operators, moduladores, The Grid, Sampler y automatizaciones para crear musica electronica con un flujo claro y propio.
                            </p>

                            <div class="rounded-xl border border-amber-300/60 bg-amber-50 p-4 text-sm leading-relaxed text-amber-900 dark:border-amber-300/25 dark:bg-amber-400/10 dark:text-amber-100">
                                <strong>Importante:</strong> el curso no esta acabado. Esta en modo desarrollo y se publica por bloques. Si entras ahora, accedes en Early Access y recibes las lecciones conforme se vayan publicando.
                            </div>
                        </div>

                        <div class="rounded-xl border border-slate-200 bg-white p-6 text-center shadow-sm dark:border-white/10 dark:bg-slate-950/60">
                            <p class="text-xs font-bold uppercase tracking-[0.16em] text-primary mb-2">Preventa fundadora</p>
                            <p class="text-5xl font-extrabold text-slate-900 dark:text-white mb-1">29€</p>
                            <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">Precio Early Access</p>
                            <a href="<?php echo esc_url(home_url('/curso-bitwig-studio/')); ?>" class="btn-primary w-full justify-center">
                                Ver curso Bitwig
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7 7 7-7 7"/></svg>
                            </a>
                        </div>
                    </div>
                </article>

                <article class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-white/10 shadow-sm p-8 sm:p-10">
                    <div class="flex items-start gap-5">
                        <span class="w-10 h-10 rounded-full bg-primary/10 text-primary text-sm font-bold flex items-center justify-center shrink-0">3</span>
                        <div class="w-full">
                            <h2 class="text-slate-900 dark:text-white mb-3">Esta web esta en continuo desarrollo</h2>
                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                                Iremos metiendo novedades, recursos, ejemplos practicos y material relacionado con Bitwig Studio. La idea es que este Bitwig Lab crezca poco a poco como punto de entrada para aprender, consultar enlaces utiles y descargar patches o presets.
                            </p>
                        </div>
                    </div>
                </article>

                <article class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-white/10 shadow-sm p-8 sm:p-10">
                    <div class="flex items-start gap-5">
                        <span class="w-10 h-10 rounded-full bg-primary/10 text-primary text-sm font-bold flex items-center justify-center shrink-0">0</span>
                        <div class="w-full">
                            <h2 class="text-slate-900 dark:text-white mb-3">Descarga de patches y presets</h2>
                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                                Biblioteca de presets y patches del Bitwig Starter Pack. Iremos ampliando esta rejilla con nuevos sonidos y ejemplos de The Grid.
                            </p>

                            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-8">
                                <article class="group overflow-hidden rounded-xl border border-slate-200 bg-slate-50 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-primary/40 hover:shadow-lg hover:shadow-primary/10 dark:border-white/10 dark:bg-slate-950/70">
                                    <a href="https://www.youtube.com/watch?v=AAmcTG-oqUo" target="_blank" rel="noopener" class="block">
                                        <div class="relative aspect-video overflow-hidden bg-slate-200 dark:bg-slate-800">
                                            <img src="https://animatek.net/wp-content/uploads/2026/04/Sintebasico.webp"
                                                alt="Preset Sinte basico para The Grid en Bitwig"
                                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                                            <span class="absolute left-3 top-3 rounded-full bg-slate-950/80 px-2.5 py-1 text-[11px] font-bold uppercase tracking-[0.12em] text-white backdrop-blur">
                                                #thegrid
                                            </span>
                                        </div>
                                    </a>
                                    <div class="p-4">
                                        <div class="flex items-center justify-between gap-3 mb-2">
                                            <h3 class="text-lg font-bold text-slate-900 dark:text-white">Sinte basico</h3>
                                            <span class="rounded-full border border-primary/30 bg-primary/10 px-2.5 py-1 text-[11px] font-semibold text-primary">Preset 01</span>
                                        </div>
                                        <p class="text-sm font-semibold leading-snug text-slate-700 dark:text-slate-200 mb-2">
                                            The Grid desde cero: crea tu primer synth en Bitwig
                                        </p>
                                        <p class="text-xs leading-relaxed text-slate-600 dark:text-slate-300">
                                            Primer synth en <em>Polygrid</em>: modulos, filtros, prepatching, Gate/Pitch, mezcla de osciladores, envolventes y LFOs.
                                        </p>
                                        <div class="mt-4 flex flex-wrap gap-2">
                                            <a href="https://animatekcursos.s3.us-east-2.amazonaws.com/Preset+y+Recursos/Primer+Sinte+con+The+GRID.bwpreset.zip" class="inline-flex items-center justify-center rounded-full border border-primary/30 bg-primary/10 px-3 py-1.5 text-xs font-bold text-primary transition hover:bg-primary hover:text-white" download>
                                                Descarga
                                            </a>
                                            <a href="https://www.youtube.com/watch?v=AAmcTG-oqUo" target="_blank" rel="noopener" class="inline-flex items-center justify-center rounded-full bg-slate-900 px-3 py-1.5 text-xs font-bold text-white transition hover:bg-primary dark:bg-white dark:text-slate-950 dark:hover:bg-primary dark:hover:text-white">
                                                Ver video
                                            </a>
                                        </div>
                                    </div>
                                </article>

                                <article class="group overflow-hidden rounded-xl border border-slate-200 bg-slate-50 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-primary/40 hover:shadow-lg hover:shadow-primary/10 dark:border-white/10 dark:bg-slate-950/70">
                                    <a href="https://youtube.com/shorts/XtD6ISnL8NM?feature=share" target="_blank" rel="noopener" class="block">
                                        <div class="relative aspect-video overflow-hidden bg-slate-200 dark:bg-slate-800">
                                            <img src="https://animatek.net/wp-content/uploads/2026/04/303_GRID.webp"
                                                alt="Preset emulacion TB-303 para The Grid en Bitwig"
                                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                                            <span class="absolute left-3 top-3 rounded-full bg-slate-950/80 px-2.5 py-1 text-[11px] font-bold uppercase tracking-[0.12em] text-white backdrop-blur">
                                                #thegrid
                                            </span>
                                        </div>
                                    </a>
                                    <div class="p-4">
                                        <div class="flex items-center justify-between gap-3 mb-2">
                                            <h3 class="text-lg font-bold text-slate-900 dark:text-white">303 Grid</h3>
                                            <span class="rounded-full border border-primary/30 bg-primary/10 px-2.5 py-1 text-[11px] font-semibold text-primary">Preset 02</span>
                                        </div>
                                        <p class="text-sm font-semibold leading-snug text-slate-700 dark:text-slate-200 mb-2">
                                            Emulacion TB-303 de Roland en The Grid
                                        </p>
                                        <p class="text-xs leading-relaxed text-slate-600 dark:text-slate-300">
                                            Patch acido inspirado en la TB-303: secuencia, filtro resonante, envolvente y caracter clasico dentro de Bitwig.
                                        </p>
                                        <div class="mt-4 flex flex-wrap gap-2">
                                            <a href="https://animatekcursos.s3.us-east-2.amazonaws.com/Preset+y+Recursos/303+Day+2026.bwpreset.zip" class="inline-flex items-center justify-center rounded-full border border-primary/30 bg-primary/10 px-3 py-1.5 text-xs font-bold text-primary transition hover:bg-primary hover:text-white" download>
                                                Descarga
                                            </a>
                                            <a href="https://youtube.com/shorts/XtD6ISnL8NM?feature=share" target="_blank" rel="noopener" class="inline-flex items-center justify-center rounded-full bg-slate-900 px-3 py-1.5 text-xs font-bold text-white transition hover:bg-primary dark:bg-white dark:text-slate-950 dark:hover:bg-primary dark:hover:text-white">
                                                Ver video
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-white/10 shadow-sm p-8 sm:p-10">
                    <div class="flex items-start gap-5">
                        <span class="w-10 h-10 rounded-full bg-primary/10 text-primary text-sm font-bold flex items-center justify-center shrink-0">10</span>
                        <div class="w-full">
                            <h2 class="text-slate-900 dark:text-white mb-3">Glosario de Bitwig y The Grid</h2>
                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                                Los terminos de The Grid viven ahora en el glosario general, junto al resto de conceptos de sintesis, audio, VCV Rack y Bitwig Studio.
                            </p>
                            <a href="<?php echo esc_url(home_url('/glosario/')); ?>" class="inline-flex items-center justify-center rounded-full bg-slate-900 px-4 py-2 text-sm font-bold text-white transition hover:bg-primary dark:bg-white dark:text-slate-950 dark:hover:bg-primary dark:hover:text-white mt-5">
                                Abrir glosario
                                <svg class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7 7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>

                <article class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-white/10 shadow-sm p-8 sm:p-10">
                    <div class="flex items-start gap-5">
                        <span class="w-10 h-10 rounded-full bg-primary/10 text-primary text-sm font-bold flex items-center justify-center shrink-0">11</span>
                        <div class="w-full">
                            <h2 class="text-slate-900 dark:text-white mb-3">Tutoriales Recomendados (Para Empezar)</h2>
                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                                Seleccion de videos para empezar a orientarte en Bitwig, The Grid y los primeros flujos de trabajo.
                            </p>

                            <?php
                            $bitwig_tutorials = [
                                ['id' => 'AAmcTG-oqUo', 'title' => 'Primer synth en The Grid', 'alt' => 'The Grid desde cero: crea tu primer synth en Bitwig'],
                                ['id' => 'S1D3gYW04Ek', 'title' => 'Drones techno con Polymer', 'alt' => 'Como hacer drones para techno con Polymer'],
                                ['id' => 'xSfPvuPBmA8', 'title' => '9 claves antes de empezar', 'alt' => '9 cosas que debes saber antes de empezar en Bitwig Studio'],
                                ['id' => 'APB84m0aFyY', 'title' => 'Primer beat paso a paso', 'alt' => 'Como hacer tu primer beat en Bitwig paso a paso'],
                                ['id' => 'XZ1nNe1Pzog', 'title' => 'Pistas y eventos de audio', 'alt' => 'Como trabajar con pistas y eventos de audio en Bitwig Studio'],
                            ];
                            ?>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
                                <?php foreach ($bitwig_tutorials as $video) : ?>
                                    <div class="space-y-3 group">
                                        <h3 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-primary transition-colors leading-tight truncate">
                                            <?php echo esc_html($video['title']); ?>
                                        </h3>
                                        <a href="<?php echo esc_url('https://youtu.be/' . $video['id']); ?>" target="_blank" rel="noopener"
                                            class="block rounded-xl overflow-hidden shadow-lg group-hover:shadow-xl transition-all border border-slate-200 dark:border-white/10">
                                            <span class="aspect-video relative block bg-slate-100 dark:bg-slate-800/40">
                                                <img src="<?php echo esc_url('https://img.youtube.com/vi/' . $video['id'] . '/hqdefault.jpg'); ?>"
                                                    alt="<?php echo esc_attr($video['alt']); ?>"
                                                    class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                                    loading="lazy">
                                                <span class="absolute inset-0 bg-slate-950/20 transition group-hover:bg-slate-950/10"></span>
                                                <span class="absolute left-1/2 top-1/2 flex h-14 w-14 -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full bg-red-600 text-white shadow-lg transition group-hover:scale-110">
                                                    <svg class="h-6 w-6 translate-x-0.5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                        <path d="M8 5v14l11-7z" />
                                                    </svg>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-white/10 shadow-sm p-8 sm:p-10">
                    <div class="flex items-start gap-5">
                        <span class="w-10 h-10 rounded-full bg-primary/10 text-primary text-sm font-bold flex items-center justify-center shrink-0">12</span>
                        <div class="w-full">
                            <h2 class="text-slate-900 dark:text-white mb-3">Demos y sonidos</h2>
                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                                Videos para escuchar ideas, demos sonoras y ejemplos practicos creados con Bitwig.
                            </p>

                            <?php
                            $bitwig_demos = [
                                ['id' => 'jeM43M5jEv0', 'title' => '7 variaciones en The Grid', 'alt' => 'Bitwig Studio The Grid: 7 patch variations'],
                                ['id' => 'J6VzRX_rxKE', 'title' => 'Jamuary 2026: Free Source', 'alt' => 'Jamuary 2026 Day 2: Free Source'],
                                ['id' => 'Y9eTp8zuExQ', 'title' => 'OXI ONE con Bitwig', 'alt' => 'Demo OXI ONE con Bitwig: improvisacion creativa'],
                                ['id' => 'ouNJRgfdXy8', 'title' => 'Drones infinitos con Sampler', 'alt' => 'Techno drones infinitos con Sampler de Bitwig'],
                                ['id' => 'Z3eXUpNbBYk', 'title' => 'Ritmos euclidianos', 'alt' => 'Euclidean Rhythms patch in Bitwig'],
                                ['id' => 'dOPl30yP2c8', 'title' => 'Poly Grid autogenerativo', 'alt' => 'Autogenerative Poly Grid Patch 01'],
                                ['id' => '_QLsQoSbBYc', 'title' => 'Poly Grid y VCV Rack', 'alt' => 'Cuando Poly Grid de Bitwig conocio a VCV Rack'],
                            ];
                            ?>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
                                <?php foreach ($bitwig_demos as $video) : ?>
                                    <div class="space-y-3 group">
                                        <h3 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-primary transition-colors leading-tight truncate">
                                            <?php echo esc_html($video['title']); ?>
                                        </h3>
                                        <a href="<?php echo esc_url('https://youtu.be/' . $video['id']); ?>" target="_blank" rel="noopener"
                                            class="block rounded-xl overflow-hidden shadow-lg group-hover:shadow-xl transition-all border border-slate-200 dark:border-white/10">
                                            <span class="aspect-video relative block bg-slate-100 dark:bg-slate-800/40">
                                                <img src="<?php echo esc_url('https://img.youtube.com/vi/' . $video['id'] . '/hqdefault.jpg'); ?>"
                                                    alt="<?php echo esc_attr($video['alt']); ?>"
                                                    class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                                    loading="lazy">
                                                <span class="absolute inset-0 bg-slate-950/20 transition group-hover:bg-slate-950/10"></span>
                                                <span class="absolute left-1/2 top-1/2 flex h-14 w-14 -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full bg-red-600 text-white shadow-lg transition group-hover:scale-110">
                                                    <svg class="h-6 w-6 translate-x-0.5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                        <path d="M8 5v14l11-7z" />
                                                    </svg>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-white/10 shadow-sm p-8 sm:p-10">
                    <div class="flex items-start gap-5">
                        <span class="w-10 h-10 rounded-full bg-primary/10 text-primary text-sm font-bold flex items-center justify-center shrink-0">13</span>
                        <div class="w-full">
                            <h2 class="text-slate-900 dark:text-white mb-3">Canales de YouTube recomendados</h2>
                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                                En Bitwig no hay desarrolladores de modulos como en VCV Rack, asi que esta seccion funciona como lista de canales y creadores que merece la pena tener cerca para aprender, escuchar demos y descubrir flujos de trabajo.
                            </p>

                            <?php
                            $bitwig_channels = [
                                [
                                    'name' => 'Bitwig',
                                    'meta' => 'Canal oficial',
                                    'desc' => 'Novedades, dispositivos, workflows y presentaciones oficiales.',
                                    'url'  => 'https://www.youtube.com/user/bitwig',
                                    'tag'  => 'Oficial',
                                ],
                                [
                                    'name' => 'Polarity Music',
                                    'meta' => 'Tutoriales avanzados',
                                    'desc' => 'Uno de los grandes referentes de Bitwig: recursos, patches, directos y tecnicas profundas.',
                                    'url'  => 'https://www.youtube.com/c/PolarityMusic',
                                    'tag'  => 'Deep Bitwig',
                                ],
                                [
                                    'name' => 'Alckemy',
                                    'meta' => 'Bass experimental',
                                    'desc' => 'Canal de Ian/Greigh dedicado al bass experimental, neuro basses, glitches y diseno sonoro creativo.',
                                    'url'  => 'https://www.youtube.com/c/Alckemy',
                                    'tag'  => 'Workflow',
                                ],
                                [
                                    'name' => 'Audio Digital',
                                    'meta' => 'Produccion digital',
                                    'desc' => 'Reviews, guias, tutoriales y reflexiones sobre software, hardware y tecnicas de produccion musical.',
                                    'url'  => 'https://www.youtube.com/c/AudioDigital',
                                    'tag'  => 'Studio',
                                ],
                                [
                                    'name' => 'Baphometrix',
                                    'meta' => 'Mezcla y produccion',
                                    'desc' => 'Canal muy interesante para mezcla, produccion y conceptos tecnicos aplicables a Bitwig.',
                                    'url'  => 'https://www.youtube.com/c/Baphometrix',
                                    'tag'  => 'Mixing',
                                ],
                                [
                                    'name' => 'Garron',
                                    'meta' => 'Video recomendado',
                                    'desc' => 'Contenido educativo sobre produccion musical, diseno sonoro, guitarra, composicion y arreglos.',
                                    'url'  => 'https://www.youtube.com/watch?v=U5-BKiCKEhc',
                                    'tag'  => 'Vocoder',
                                ],
                                [
                                    'name' => 'The Bitwig Mycelium',
                                    'meta' => 'Comunidad y exploracion',
                                    'desc' => 'Ideas, patches y exploraciones alrededor del ecosistema Bitwig.',
                                    'url'  => 'https://www.youtube.com/@TheBitwigMycelium',
                                    'tag'  => 'Ideas',
                                ],
                                [
                                    'name' => 'Mattias Bitwig Lab',
                                    'meta' => 'Laboratorio Bitwig',
                                    'desc' => 'Canal dedicado por completo a Bitwig Studio: produccion, sound design, The Grid y tutoriales.',
                                    'url'  => 'https://www.youtube.com/@MattiasBitwigLab',
                                    'tag'  => 'Lab',
                                ],
                                [
                                    'name' => 'Bitwig Guide',
                                    'meta' => 'Guias y aprendizaje',
                                    'desc' => 'Tutoriales cortos y directos sobre dispositivos, instrumentos y efectos de Bitwig Studio.',
                                    'url'  => 'https://www.youtube.com/@BitwigGuide',
                                    'tag'  => 'Guia',
                                ],
                            ];
                            ?>

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                                <?php foreach ($bitwig_channels as $channel) : ?>
                                    <div class="bg-white dark:bg-slate-950/60 rounded-xl overflow-hidden border border-slate-200 dark:border-white/10 group hover:-translate-y-1 transition-transform duration-300 shadow-sm hover:shadow-md flex flex-col">
                                        <div class="p-5 flex-1 flex flex-col">
                                            <div class="mb-3">
                                                <h3 class="text-lg font-bold text-slate-900 dark:text-white leading-tight truncate"><?php echo esc_html($channel['name']); ?></h3>
                                                <p class="text-[10px] text-slate-400 uppercase tracking-widest mt-0.5"><?php echo esc_html($channel['meta']); ?></p>
                                            </div>
                                            <p class="text-slate-600 dark:text-slate-300 text-xs leading-relaxed mb-4 flex-1">
                                                <?php echo esc_html($channel['desc']); ?>
                                            </p>
                                            <div class="flex flex-wrap gap-2 mb-4">
                                                <a href="<?php echo esc_url($channel['url']); ?>" target="_blank" rel="noopener"
                                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 text-[10px] font-bold tracking-widest uppercase bg-transparent border border-red-200 rounded-full text-red-600 hover:bg-red-50 hover:border-red-300 hover:text-red-700 hover:shadow-sm transition-all group/link dark:border-white/20 dark:text-white dark:hover:bg-red-500/15 dark:hover:border-red-300/50 dark:hover:text-white">
                                                    <svg class="w-2.5 h-2.5 text-red-400 group-hover/link:text-red-600 dark:text-red-300 dark:group-hover/link:text-red-200 transition-colors" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                        <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                                                    </svg>
                                                    YouTube
                                                </a>
                                            </div>
                                            <div class="flex flex-wrap gap-1.5 mt-auto pt-3 border-t border-slate-100 dark:border-white/10">
                                                <span class="px-1.5 py-0.5 bg-slate-50 dark:bg-white/5 text-[10px] text-slate-500 dark:text-slate-400 rounded border border-slate-100 dark:border-white/10">
                                                    <?php echo esc_html($channel['tag']); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>
    </div>

</main>

<!-- LOCKER SCRIPT WITH BREVO INTEGRATION -->
<script>
    window.REQUIRED_CODE_ERROR_MESSAGE = 'Elija un codigo de pais';
    window.LOCALE = 'es';
    window.EMAIL_INVALID_MESSAGE = window.SMS_INVALID_MESSAGE = "La informacion que ha proporcionado no es valida. Compruebe el formato del campo e intentelo de nuevo.";
    window.REQUIRED_ERROR_MESSAGE = "Este campo no puede quedarse vacio. ";
    window.GENERIC_INVALID_MESSAGE = "La informacion que ha proporcionado no es valida. Compruebe el formato del campo e intentelo de nuevo.";
    window.translation = {
        common: {
            selectedList: '{quantity} lista seleccionada',
            selectedLists: '{quantity} listas seleccionadas',
            selectedOption: '{quantity} seleccionado',
            selectedOptions: '{quantity} seleccionados',
        }
    };
    var AUTOHIDE = Boolean(0);
</script>
<script defer src="https://sibforms.com/forms/end-form/build/main.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const lockedContent = document.getElementById('locked-content');
        const lockerGate = document.getElementById('locker-gate');
        const storageKey = 'bitwig_lab_unlocked';
        const successMessage = document.getElementById('success-message');

        if (localStorage.getItem(storageKey) === 'true') {
            unlockContent();
        }

        function unlockContent() {
            if (!lockerGate || !lockedContent) return;

            lockerGate.style.display = 'none';
            lockedContent.classList.remove('blur-xl', 'grayscale', 'opacity-20', 'h-[600px]', 'overflow-hidden', 'select-none', 'pointer-events-none');
            lockedContent.classList.add('opacity-100');

            const overlay = lockedContent.querySelector('.absolute.inset-0.bg-gradient-to-b');
            if (overlay) overlay.style.display = 'none';
        }

        if (successMessage) {
            const observer = new MutationObserver(function () {
                if (successMessage.style.display === 'block' || successMessage.style.display === '' || successMessage.offsetParent !== null) {
                    localStorage.setItem(storageKey, 'true');

                    setTimeout(() => {
                        unlockContent();
                        lockedContent.scrollIntoView({ behavior: 'smooth' });
                    }, 2000);
                }
            });

            observer.observe(successMessage, { attributes: true, attributeFilter: ['style', 'class'] });
        }

    });
</script>

<?php
get_footer();
