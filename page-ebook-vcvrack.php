<?php
/* Template Name: Ebook VCV Rack */
get_header();
?>

<main id="primary" class="bg-slate-200 text-slate-900">
    <section class="relative overflow-hidden px-6 py-16 lg:py-20 text-white isolate" style="background-image: linear-gradient(135deg, rgba(15,23,42,0.95), rgba(15,23,42,0.78)), url('https://animatek.net/wp-content/uploads/2025/05/Bono_hora.webp'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-gradient-to-br from-primary/25 via-slate-900/30 to-slate-950/85"></div>
        <div class="absolute -left-36 top-0 w-80 h-80 bg-cyan-400/12 rounded-full blur-[120px]"></div>
        <div class="absolute -right-24 -bottom-12 w-96 h-96 bg-blue-600/12 rounded-full blur-[140px]"></div>

        <div class="max-w-4xl mx-auto relative z-10 space-y-8 text-center lg:text-left">
            <div class="inline-flex items-center gap-2 px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] rounded-full bg-white/10 border border-white/15 backdrop-blur">
                Ebook gratuito • VCV Rack 2
            </div>
            <div class="space-y-4">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight text-white drop-shadow">
                    Tus primeros pasos con <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-cyan-300">VCV Rack 2</span>
                </h1>
                <p class="text-lg sm:text-xl text-slate-100 leading-relaxed max-w-3xl mx-auto lg:mx-0">
                    Guía práctica de síntesis modular: módulos esenciales, flujo de señal, cableado limpio y patches listos para que suenes en minutos.
                </p>
            </div>
            <div class="grid sm:flex gap-3 sm:gap-4 justify-center lg:justify-start">
                <a href="#descargar" class="btn-primary w-full sm:w-auto">
                    Descargar ebook gratis
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7 7 7-7 7"/>
                    </svg>
                </a>
                <a href="#que-aprenderas" class="btn-secondary w-full sm:w-auto">
                    Ver temario
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7 7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <section id="que-aprenderas" class="py-20 bg-slate-50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <p class="text-xs uppercase tracking-[0.14em] font-semibold text-primary">Contenido clave</p>
                <h2>Qué aprenderás</h2>
                <p class="text-lg text-slate-600">Domina los fundamentos de la síntesis modular sin perderte en los cables: patching limpio, módulos imprescindibles y flujo de señal claro.</p>
            </div>

            <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <article class="group bg-white rounded-2xl border border-slate-200/80 p-5 sm:p-6 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 0 0-1.022-.547l-2.387-.477a6 6 0 0 0-3.86.517l-.318.158a6 6 0 0 1-3.86.517L6.05 15.21a2 2 0 0 0-1.806.547M8 4h8l-1 1v5.172a2 2 0 0 0 .586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 0 0 9 10.172V5L8 4z"/>
                            </svg>
                        </span>
                        <h3 class="text-base font-semibold text-slate-900">Síntesis sustractiva</h3>
                    </div>
                    <p class="text-sm text-slate-600 leading-relaxed">Qué es y cómo aplicarla en modular para esculpir tu sonido desde cero.</p>
                </article>

                <article class="group bg-white rounded-2xl border border-slate-200/80 p-5 sm:p-6 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-purple-50 text-purple-600 group-hover:bg-purple-600 group-hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m-6 8a2 2 0 1 0 0-4m0 4a2 2 0 1 1 0-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 1 0 0-4m0 4a2 2 0 1 1 0-4m0 4v2m0-6V4"/>
                            </svg>
                        </span>
                        <h3 class="text-base font-semibold text-slate-900">Módulos esenciales</h3>
                    </div>
                    <p class="text-sm text-slate-600 leading-relaxed">VCO, VCF, VCA… descubre el set mínimo necesario para sonar bien.</p>
                </article>

                <article class="group bg-white rounded-2xl border border-slate-200/80 p-5 sm:p-6 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </span>
                        <h3 class="text-base font-semibold text-slate-900">Gestión y cableado</h3>
                    </div>
                    <p class="text-sm text-slate-600 leading-relaxed">Añadir, organizar y rutear señales con cabeza y orden.</p>
                </article>

                <article class="group bg-white rounded-2xl border border-slate-200/80 p-5 sm:p-6 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50 text-amber-600 group-hover:bg-amber-600 group-hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.536 8.464a5 5 0 0 1 0 7.072m2.828-9.9a9 9 0 0 1 0 12.728M5.586 15H4a1 1 0 0 1-1-1v-4a1 1 0 0 1 1-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                            </svg>
                        </span>
                        <h3 class="text-base font-semibold text-slate-900">Audio sin clics</h3>
                    </div>
                    <p class="text-sm text-slate-600 leading-relaxed">Configura Audio 8/16 correctamente y mantén la latencia bajo control.</p>
                </article>

                <article class="group bg-white rounded-2xl border border-slate-200/80 p-5 sm:p-6 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-rose-50 text-rose-600 group-hover:bg-rose-600 group-hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                            </svg>
                        </span>
                        <h3 class="text-base font-semibold text-slate-900">Secuenciadores</h3>
                    </div>
                    <p class="text-sm text-slate-600 leading-relaxed">Domina el SEQ3 y explora opciones más avanzadas para tus melodías.</p>
                </article>

                <article class="group bg-white rounded-2xl border border-slate-200/80 p-5 sm:p-6 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4 7 8-3 8 3-8 3-8-3Z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 10v4c0 1.7 2.7 3 6 3s6-1.3 6-3v-4"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v10"/>
                            </svg>
                        </span>
                        <h3 class="text-base font-semibold text-slate-900">Cuantizadores</h3>
                    </div>
                    <p class="text-sm text-slate-600 leading-relaxed">Voltajes afinados a escala musical para armonías coherentes.</p>
                </article>
            </div>

            <div class="mt-10 text-center">
                <p class="inline-flex items-center gap-2 text-sm text-slate-600 bg-slate-50 border border-slate-200 px-4 py-2 rounded-full shadow-sm">
                    <span class="text-lg">🎁</span>
                    Incluye enlaces a tutoriales, recursos y devs recomendados (Vult, Befaco, Audible Instruments, JW-Modules…).
                </p>
            </div>
        </div>
    </section>

    <section class="py-20 bg-slate-50">
        <div class="max-w-6xl mx-auto px-6 grid lg:grid-cols-[1.1fr_0.9fr] gap-12 items-start">
            <div class="space-y-5">
                <p class="text-xs uppercase tracking-[0.14em] font-semibold text-primary">Qué hay dentro</p>
                <h2>Dentro del ebook</h2>
                <p class="text-base text-slate-600 max-w-2xl">Checklist accionable, ejemplos de patching y flujos de trabajo para que pases de “no suena” a tu primer loop sólido sin perder tiempo.</p>
                <ul class="space-y-4">
                    <li class="flex gap-3">
                        <span class="mt-1 flex h-6 w-6 items-center justify-center rounded-full bg-green-100 text-green-600 shrink-0">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <p class="text-base leading-relaxed text-slate-700"><strong>Gestión de módulos y cableado:</strong> añadir/mover/conectar con códigos de color para flujo claro.</p>
                    </li>
                    <li class="flex gap-3">
                        <span class="mt-1 flex h-6 w-6 items-center justify-center rounded-full bg-green-100 text-green-600 shrink-0">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <p class="text-base leading-relaxed text-slate-700"><strong>Uso de módulos MIDI:</strong> integra teclado/controladores, salidas y rutas típicas.</p>
                    </li>
                    <li class="flex gap-3">
                        <span class="mt-1 flex h-6 w-6 items-center justify-center rounded-full bg-green-100 text-green-600 shrink-0">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <p class="text-base leading-relaxed text-slate-700"><strong>Configuración de audio:</strong> salidas con Audio 8/16, evitar distorsión y clics.</p>
                    </li>
                    <li class="flex gap-3">
                        <span class="mt-1 flex h-6 w-6 items-center justify-center rounded-full bg-green-100 text-green-600 shrink-0">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <p class="text-base leading-relaxed text-slate-700"><strong>Osciladores (VCO):</strong> formas de onda, parámetros y modulaciones útiles.</p>
                    </li>
                    <li class="flex gap-3">
                        <span class="mt-1 flex h-6 w-6 items-center justify-center rounded-full bg-green-100 text-green-600 shrink-0">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <p class="text-base leading-relaxed text-slate-700"><strong>Secuenciadores:</strong> del SEQ3 a opciones avanzadas, ideas creativas.</p>
                    </li>
                    <li class="flex gap-3">
                        <span class="mt-1 flex h-6 w-6 items-center justify-center rounded-full bg-green-100 text-green-600 shrink-0">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <p class="text-base leading-relaxed text-slate-700"><strong>Cuantizadores:</strong> voltajes afinados para melodías y armonías coherentes.</p>
                    </li>
                    <li class="flex gap-3">
                        <span class="mt-1 flex h-6 w-6 items-center justify-center rounded-full bg-green-100 text-green-600 shrink-0">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <p class="text-base leading-relaxed text-slate-700"><strong>Módulos esenciales:</strong> cómo suscribirte/descargar colecciones clave.</p>
                    </li>
                </ul>
            </div>

            <div class="bg-white rounded-3xl border border-slate-200 shadow-xl p-8 md:p-10 space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold uppercase tracking-[0.14em]">
                    Diseñado para ti
                </div>
                <h3 class="text-2xl font-bold text-slate-900">¿Para quién es?</h3>
                <p class="text-slate-600 leading-relaxed">Si estás empezando con VCV Rack 2 o vuelves después de un tiempo, este ebook te da un mapa simple para no perderte.</p>
                <div class="space-y-3">
                    <div class="flex items-start gap-3">
                        <span class="mt-1 w-2.5 h-2.5 rounded-full bg-primary"></span>
                        <p class="text-sm text-slate-700">Productores que quieren entender la síntesis modular sin atascarse en la técnica.</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="mt-1 w-2.5 h-2.5 rounded-full bg-primary"></span>
                        <p class="text-sm text-slate-700">Músicos que buscan patches rápidos para directo o jam sessions.</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="mt-1 w-2.5 h-2.5 rounded-full bg-primary"></span>
                        <p class="text-sm text-slate-700">Alumnos de mis cursos que quieren repasar lo básico con ejemplos claros.</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 text-sm text-slate-500 pt-2">
                    <div class="flex -space-x-2">
                        <div class="w-10 h-10 rounded-full bg-slate-200 border-2 border-white"></div>
                        <div class="w-10 h-10 rounded-full bg-slate-300 border-2 border-white"></div>
                        <div class="w-10 h-10 rounded-full bg-slate-400 border-2 border-white"></div>
                    </div>
                    <span>Únete a la comunidad y comparte tus patches.</span>
                </div>
            </div>
        </div>
    </section>

    <section id="descargar" class="relative pt-24 pb-56 bg-slate-50 text-slate-900 overflow-hidden">
        <div class="absolute inset-0 opacity-60 pointer-events-none">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-blue-100 rounded-full blur-[120px]"></div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-cyan-100 rounded-full blur-[120px]"></div>
        </div>

        <div class="max-w-3xl mx-auto px-6 relative z-10">
            <div class="text-center space-y-4 mb-12">
                <p class="text-xs uppercase tracking-[0.14em] font-semibold text-primary">Descarga inmediata</p>
                <h2>Descarga el ebook gratis</h2>
                <p class="text-slate-600 text-lg">Completa el formulario y recibe tu copia al instante en tu correo.</p>
            </div>

            <div class="bg-white rounded-3xl p-4 md:p-5 shadow-2xl text-slate-900 border border-slate-200 max-w-xl mx-auto">
                <p class="text-sm text-slate-600 mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12.5 9.5 17 19 7"/>
                    </svg>
                    Sin spam: solo recibirás el PDF y recursos de VCV Rack.
                </p>

                <div class="ebook-form">
                    <style>
                        .ebook-form #sib-container,
                        .ebook-form #sib-container input,
                        .ebook-form #sib-container textarea,
                        .ebook-form #sib-container button,
                        .ebook-form #sib-container .sib-form-message-panel__inner-text {
                            font-family: 'Inter', sans-serif !important;
                        }
                        .ebook-form #sib-container {
                            background: transparent !important;
                            border: none !important;
                            max-width: 100% !important;
                        }
                        .ebook-form #sib-container form {
                            text-align: left !important;
                        }
                        .ebook-form #sib-container .sib-input .input {
                            width: 100%;
                            border-radius: 0.8rem;
                            border: 1px solid #e2e8f0;
                            padding: 0.75rem 0.95rem;
                            font-size: 14px;
                            background: #f8fafc;
                            color: #0f172a;
                        }
                        .ebook-form #sib-container .sib-form-block {
                            padding: 6px 0;
                        }
                        .ebook-form #sib-form-container .entry__error--primary {
                            font-size: 13px !important;
                            text-align: left !important;
                            border-radius: 0.75rem !important;
                        }
                        .ebook-form #sib-container .sib-form-message-panel {
                            max-width: 100% !important;
                        }
                        .ebook-form #sib-container .sib-form-block__button {
                            border-radius: 0.8rem !important;
                            padding: 0.9rem 1.2rem !important;
                            width: 100%;
                            justify-content: center;
                            font-weight: 700 !important;
                            background: #2C7FFF !important;
                            border-color: #2C7FFF !important;
                            color: #ffffff !important;
                            box-shadow: 0 12px 30px -18px rgba(44, 127, 255, 0.6);
                        }
                        .ebook-form #sib-container .sib-form-block__button:hover {
                            background: #1c63d9 !important;
                            border-color: #1c63d9 !important;
                        }
                        .ebook-form #sib-container .g-recaptcha > div {
                            margin: auto;
                        }
                        .ebook-form #sib-container a {
                            color: #2C7FFF;
                            text-decoration: underline;
                        }
                    </style>
                    <link rel="stylesheet" href="https://sibforms.com/forms/end-form/build/sib-styles.css">

                    <div class="sib-form">
                        <div id="sib-form-container" class="sib-form-container">
                            <div id="error-message" class="sib-form-message-panel" style="font-size:16px; text-align:left; color:#661d1d; background-color:#ffeded; border-radius:12px; border-color:#ff4949;">
                                <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
                                    <svg viewBox="0 0 512 512" class="sib-icon sib-notification__icon">
                                        <path d="M256 40c118.621 0 216 96.075 216 216 0 119.291-96.61 216-216 216-119.244 0-216-96.562-216-216 0-119.203 96.602-216 216-216m0-32C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm-11.49 120h22.979c6.823 0 12.274 5.682 11.99 12.5l-7 168c-.268 6.428-5.556 11.5-11.99 11.5h-8.979c-6.433 0-11.722-5.073-11.99-11.5l-7-168c-.283-6.818 5.167-12.5 11.99-12.5zM256 340c-15.464 0-28 12.536-28 28s12.536 28 28 28 28-12.536 28-28-12.536-28-28-28z" />
                                    </svg>
                                    <span class="sib-form-message-panel__inner-text">No hemos podido validar su suscripción.</span>
                                </div>
                            </div>

                            <div id="success-message" class="sib-form-message-panel" style="font-size:16px; text-align:left; color:#085229; background-color:#e7faf0; border-radius:12px; border-color:#13ce66;">
                                <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
                                    <svg viewBox="0 0 512 512" class="sib-icon sib-notification__icon">
                                        <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 464c-118.664 0-216-96.055-216-216 0-118.663 96.055-216 216-216 118.664 0 216 96.055 216 216 0 118.663-96.055 216-216 216zm141.63-274.961L217.15 376.071c-4.705 4.667-12.303 4.637-16.97-.068l-85.878-86.572c-4.667-4.705-4.637-12.303.068-16.97l8.52-8.451c4.705-4.667 12.303-4.637 16.97.068l68.976 69.533 163.441-162.13c4.705-4.667 12.303-4.637 16.97.068l8.451 8.52c4.668 4.705 4.637 12.303-.068 16.97z" />
                                    </svg>
                                    <span class="sib-form-message-panel__inner-text">Se ha realizado su suscripción.</span>
                                </div>
                            </div>

                            <div id="sib-container" class="sib-container--large sib-container--vertical">
                                <form id="sib-form" method="POST" action="https://a2fe0a0a.sibforms.com/serve/MUIFAF4EfB3MddtY1F0HmurJhYX-y8iBadsYb3R4hDhpghd4q34nzWiCStsEmNcTIgpk6RS0zFQt60GSTPNUY4_pqXxwL1Hw1PsmK7RyNk3gPKROS49WozqcUB5lbZoTVRc6ixsm7KyPwHNLZI9SygYlUspANsR9Fa4LXBhuzcFfnIXqkMOH-o4gxYAOscknfAwsPYtxtFsaaL0N" data-type="subscription">
                                    <div class="sib-input sib-form-block">
                                        <div class="form__entry entry_block">
                                            <div class="form__label-row">
                                                <div class="entry__field">
                                                    <input class="input" type="email" id="EMAIL" name="EMAIL" autocomplete="off" placeholder="Email" data-required="true" required />
                                                </div>
                                            </div>
                                            <label class="entry__error entry__error--primary"></label>
                                        </div>
                                    </div>

                                    <div class="sib-input sib-form-block">
                                        <div class="form__entry entry_block">
                                            <div class="form__label-row">
                                                <div class="entry__field">
                                                    <input class="input" maxlength="200" type="text" id="NOMBRE" name="NOMBRE" autocomplete="off" placeholder="Nombre" data-required="true" required />
                                                </div>
                                            </div>
                                            <label class="entry__error entry__error--primary"></label>
                                        </div>
                                    </div>

                                    <div class="sib-captcha sib-form-block">
                                        <div class="form__entry entry_block">
                                            <div class="form__label-row">
                                                <script>
                                                    function handleCaptchaResponse() {
                                                        var event = new Event('captchaChange');
                                                        document.getElementById('sib-captcha').dispatchEvent(event);
                                                    }
                                                </script>
                                                <div class="g-recaptcha sib-visible-recaptcha" id="sib-captcha" data-sitekey="6LfYva8rAAAAAM7hkxaRncY2HwcGZhg1PVI8MNVO" data-callback="handleCaptchaResponse" style="direction:ltr"></div>
                                            </div>
                                            <label class="entry__error entry__error--primary"></label>
                                        </div>
                                    </div>

                                    <div class="sib-form-block">
                                        <button class="sib-form-block__button sib-form-block__button-with-loader btn-primary w-full justify-center" form="sib-form" type="submit">
                                            <svg class="icon clickable__icon progress-indicator__icon sib-hide-loader-icon" viewBox="0 0 512 512">
                                                <path d="M460.116 373.846l-20.823-12.022c-5.541-3.199-7.54-10.159-4.663-15.874 30.137-59.886 28.343-131.652-5.386-189.946-33.641-58.394-94.896-95.833-161.827-99.676C261.028 55.961 256 50.751 256 44.352V20.309c0-6.904 5.808-12.337 12.703-11.982 83.556 4.306 160.163 50.864 202.11 123.677 42.063 72.696 44.079 162.316 6.031 236.832-3.14 6.148-10.75 8.461-16.728 5.01z" />
                                            </svg>
                                            Descargar ebook
                                        </button>
                                    </div>

                                    <input type="text" name="email_address_check" value="" class="input--hidden">
                                    <input type="hidden" name="locale" value="es">
                                </form>
                            </div>
                        </div>
                    </div>

                    <script>
                        window.REQUIRED_CODE_ERROR_MESSAGE = 'Elija un código de país';
                        window.LOCALE = 'es';
                        window.EMAIL_INVALID_MESSAGE = window.SMS_INVALID_MESSAGE = "La información que ha proporcionado no es válida. Compruebe el formato del campo e inténtelo de nuevo.";
                        window.REQUIRED_ERROR_MESSAGE = "Este campo no puede quedarse vacío. ";
                        window.GENERIC_INVALID_MESSAGE = "La información que ha proporcionado no es válida. Compruebe el formato del campo e inténtelo de nuevo.";
                        window.translation = {
                            common: {
                                selectedList: '{quantity} lista seleccionada',
                                selectedLists: '{quantity} listas seleccionadas',
                                selectedOption: '{quantity} seleccionado',
                                selectedOptions: '{quantity} seleccionados',
                            }
                        };
                        var AUTOHIDE = Boolean(1);
                    </script>
                    <script defer src="https://sibforms.com/forms/end-form/build/main.js"></script>
                    <script src="https://www.google.com/recaptcha/api.js?hl=es"></script>
                </div>
            </div>
        </div>
        <br><br><br>
        
    </section>
</main>

<?php get_footer(); ?>
