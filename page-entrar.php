<?php
/**
 * Template Name: Entrar
 *
 * Página de acceso amable para alumnos de Animatek.
 * Evita mandar a usuarios normales al wp-login.php pelado y centraliza
 * Google login, email/contraseña y recuperación de acceso.
 *
 * @package Animatek
 */

$requested_redirect = isset( $_GET['redirect_to'] ) ? esc_url_raw( wp_unslash( $_GET['redirect_to'] ) ) : '';
$redirect_to         = $requested_redirect ?: animatek_get_student_dashboard_url();
$google_login_url    = animatek_get_google_login_url( $redirect_to );
$lost_password_url   = wp_lostpassword_url( $redirect_to );
$dashboard_url       = animatek_get_student_dashboard_url();
$courses_url         = home_url( '/academia/' );
$contact_url         = home_url( '/contacto/' );

get_header();
?>

<main id="primary" class="min-h-screen bg-slate-950 text-slate-100">
    <style>
        .animatek-login-card #loginform,
        .animatek-login-card .login-form {
            display: grid;
            gap: 1rem;
            margin: 0;
        }
        .animatek-login-card #loginform p {
            margin: 0;
        }
        .animatek-login-card #loginform label {
            display: block;
            margin-bottom: .45rem;
            color: #cbd5e1;
            font-size: .86rem;
            font-weight: 800;
        }
        .animatek-login-card #loginform input[type="text"],
        .animatek-login-card #loginform input[type="password"] {
            width: 100%;
            border: 1px solid rgba(148, 163, 184, .35);
            border-radius: 1rem;
            background: rgba(15, 23, 42, .78);
            color: #f8fafc;
            padding: .9rem 1rem;
            outline: none;
            transition: border-color .18s ease, box-shadow .18s ease, background .18s ease;
        }
        .animatek-login-card #loginform input[type="text"]:focus,
        .animatek-login-card #loginform input[type="password"]:focus {
            border-color: #2C7FFF;
            box-shadow: 0 0 0 4px rgba(44, 127, 255, .18);
            background: rgba(15, 23, 42, .95);
        }
        .animatek-login-card #loginform .login-remember label {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            color: #94a3b8;
            font-weight: 700;
        }
        .animatek-login-card #loginform input[type="checkbox"] {
            width: 1rem;
            height: 1rem;
            accent-color: #2C7FFF;
        }
        .animatek-login-card #loginform input[type="submit"] {
            width: 100%;
            cursor: pointer;
            border: 0;
            border-radius: 999px;
            background: #2C7FFF;
            color: #fff;
            padding: .95rem 1.15rem;
            font-weight: 900;
            box-shadow: 0 18px 38px rgba(44, 127, 255, .32);
            transition: transform .18s ease, box-shadow .18s ease, background .18s ease;
        }
        .animatek-login-card #loginform input[type="submit"]:hover {
            transform: translateY(-1px);
            background: #1d68df;
            box-shadow: 0 22px 48px rgba(44, 127, 255, .42);
        }
        .animatek-login-card .cf-turnstile,
        .animatek-login-card [class*="turnstile"] {
            margin-top: .35rem;
        }
    </style>

    <section class="relative overflow-hidden px-6 py-16 sm:py-20 lg:py-24">
        <div class="absolute inset-0 opacity-70" aria-hidden="true">
            <div class="absolute left-1/2 top-[-12rem] h-[34rem] w-[34rem] -translate-x-1/2 rounded-full bg-primary/25 blur-3xl"></div>
            <div class="absolute right-[-10rem] bottom-[-10rem] h-[28rem] w-[28rem] rounded-full bg-cyan-400/10 blur-3xl"></div>
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(255,255,255,.08),transparent_28rem)]"></div>
        </div>

        <div class="relative z-10 mx-auto grid max-w-6xl gap-10 lg:grid-cols-[1.05fr_0.95fr] lg:items-center">
            <div class="space-y-7">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center gap-3 !no-underline">
                    <img src="https://animatek.net/wp-content/uploads/2025/05/Logotek2025azulwebp.webp" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="h-11 w-auto" loading="lazy" />
                    <span class="text-sm font-black uppercase tracking-[0.22em] text-slate-300">Animatek</span>
                </a>

                <div class="space-y-5">
                    <span class="inline-flex rounded-full border border-white/15 bg-white/10 px-4 py-2 text-xs font-black uppercase tracking-[0.2em] text-cyan-200 shadow-sm backdrop-blur">
                        Acceso alumnos
                    </span>
                    <h1 class="max-w-4xl text-4xl font-black leading-[0.95] tracking-tight text-white sm:text-5xl lg:text-7xl">
                        Entra a tus cursos sin pelearte con WordPress.
                    </h1>
                    <p class="max-w-2xl text-lg leading-relaxed text-slate-300 sm:text-xl">
                        Usa el mismo método con el que compraste o te registraste. Si entraste con Google, vuelve a usar Google. Si compraste con email, usa ese mismo email.
                    </p>
                </div>

                <div class="grid gap-3 sm:grid-cols-3">
                    <div class="rounded-2xl border border-white/10 bg-white/[.06] p-4 backdrop-blur">
                        <div class="mb-2 text-2xl">01</div>
                        <p class="text-sm font-bold text-slate-200">Google arriba del todo si lo usaste al comprar.</p>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/[.06] p-4 backdrop-blur">
                        <div class="mb-2 text-2xl">02</div>
                        <p class="text-sm font-bold text-slate-200">Email y contraseña como alternativa limpia.</p>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/[.06] p-4 backdrop-blur">
                        <div class="mb-2 text-2xl">03</div>
                        <p class="text-sm font-bold text-slate-200">Si algo falla, hay ayuda directa y humana.</p>
                    </div>
                </div>
            </div>

            <aside class="animatek-login-card rounded-[2rem] border border-white/10 bg-white/[.08] p-5 shadow-2xl shadow-black/40 backdrop-blur-xl sm:p-7">
                <?php if ( is_user_logged_in() ) : ?>
                    <?php $current_user = wp_get_current_user(); ?>
                    <div class="space-y-6 rounded-[1.55rem] border border-emerald-300/20 bg-emerald-400/10 p-6">
                        <div>
                            <p class="text-sm font-black uppercase tracking-[0.18em] text-emerald-200">Sesión iniciada</p>
                            <h2 class="mt-2 text-2xl font-black text-white">
                                Hola, <?php echo esc_html( $current_user->display_name ?: $current_user->user_login ); ?>.
                            </h2>
                            <p class="mt-2 text-sm leading-relaxed text-slate-300">
                                Ya estás dentro. Puedes ir a tu panel de alumno o volver a la academia.
                            </p>
                        </div>
                        <div class="grid gap-3">
                            <a href="<?php echo esc_url( $dashboard_url ); ?>" class="inline-flex items-center justify-center rounded-full bg-primary px-5 py-3 text-sm font-black text-white !no-underline shadow-lg shadow-primary/25 transition hover:-translate-y-0.5 hover:bg-blue-600">
                                Ir a mi panel
                            </a>
                            <a href="<?php echo esc_url( $courses_url ); ?>" class="inline-flex items-center justify-center rounded-full border border-white/15 bg-white/10 px-5 py-3 text-sm font-black text-white !no-underline transition hover:bg-white/15">
                                Ver cursos
                            </a>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="space-y-6">
                        <div>
                            <p class="text-sm font-black uppercase tracking-[0.18em] text-cyan-200">Entrar</p>
                            <h2 class="mt-2 text-3xl font-black text-white">Accede a tu cuenta</h2>
                            <p class="mt-2 text-sm leading-relaxed text-slate-300">
                                Primero prueba con Google si lo usaste al comprar. Es la forma más rápida y evita líos de contraseña.
                            </p>
                        </div>

                        <a href="<?php echo esc_url( $google_login_url ); ?>" rel="nofollow" class="group flex w-full items-center justify-center gap-3 rounded-full border border-slate-300 bg-white px-5 py-3.5 text-sm font-black text-slate-950 !no-underline shadow-xl shadow-black/20 transition hover:-translate-y-0.5 hover:bg-slate-100">
                            <svg aria-hidden="true" class="h-5 w-5" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.1c-.22-.66-.35-1.36-.35-2.1s.13-1.44.35-2.1V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l3.66-2.84z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06L5.84 9.9C6.71 7.3 9.14 5.38 12 5.38z"/>
                            </svg>
                            Continuar con Google
                        </a>

                        <div class="flex items-center gap-3 text-xs font-black uppercase tracking-[0.18em] text-slate-500">
                            <span class="h-px flex-1 bg-white/10"></span>
                            o entra con email
                            <span class="h-px flex-1 bg-white/10"></span>
                        </div>

                        <div class="rounded-[1.35rem] border border-white/10 bg-slate-950/55 p-4 sm:p-5">
                            <?php
                            wp_login_form( [
                                'echo'           => true,
                                'redirect'       => $redirect_to,
                                'label_username' => __( 'Email o usuario', 'animatek' ),
                                'label_password' => __( 'Contraseña', 'animatek' ),
                                'label_remember' => __( 'Recuérdame', 'animatek' ),
                                'label_log_in'   => __( 'Entrar con email', 'animatek' ),
                                'remember'       => true,
                            ] );
                            ?>
                        </div>

                        <div class="flex flex-col gap-3 text-sm sm:flex-row sm:items-center sm:justify-between">
                            <a href="<?php echo esc_url( $lost_password_url ); ?>" class="font-bold text-cyan-200 !no-underline transition hover:text-white">
                                No recuerdo mi contraseña
                            </a>
                            <a href="<?php echo esc_url( $contact_url ); ?>" class="font-bold text-slate-300 !no-underline transition hover:text-white">
                                Necesito ayuda
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </aside>
        </div>
    </section>

    <section class="px-6 pb-20">
        <div class="mx-auto grid max-w-6xl gap-5 lg:grid-cols-3">
            <div class="rounded-3xl border border-white/10 bg-white/[.06] p-6">
                <h2 class="text-xl font-black text-white">Si compraste con Google</h2>
                <p class="mt-3 text-sm leading-relaxed text-slate-300">Pulsa “Continuar con Google” y usa la misma cuenta. No necesitas inventar una contraseña nueva.</p>
            </div>
            <div class="rounded-3xl border border-white/10 bg-white/[.06] p-6">
                <h2 class="text-xl font-black text-white">Si compraste con email</h2>
                <p class="mt-3 text-sm leading-relaxed text-slate-300">Usa el email de compra. Si no recuerdas la clave, pide una nueva desde el enlace de contraseña.</p>
            </div>
            <div class="rounded-3xl border border-white/10 bg-white/[.06] p-6">
                <h2 class="text-xl font-black text-white">Si sigue fallando</h2>
                <p class="mt-3 text-sm leading-relaxed text-slate-300">Escríbeme. Mejor revisar tu cuenta manualmente que dejarte dando vueltas entre formularios.</p>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
