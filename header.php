<?php
/**
 * Theme header template.
 *
 * @package Animatek
 */

$animatek_actions = animatek_header_action_items();
$animatek_user    = is_user_logged_in() ? wp_get_current_user() : null;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> data-theme="dark">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <meta name="google-adsense-account" content="ca-pub-5093101899692258">
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-slate-200 text-zinc-900 antialiased'); ?>>
<?php do_action('tailpress_site_before'); ?>

<div id="page" class="min-h-screen flex flex-col">
    <?php do_action('tailpress_header'); ?>

    <header class="relative z-50 bg-white/95 border-b border-slate-200/80 shadow-[0_12px_60px_-40px_rgba(15,23,42,0.45)] backdrop-blur">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between gap-4 min-h-[72px]">
                <div class="flex items-center gap-3">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3 !no-underline">
                        <img src="https://animatek.net/wp-content/uploads/2025/05/Logotek2025azulwebp.webp" alt="<?php bloginfo('name'); ?>" class="h-10 w-auto object-contain" loading="lazy" />
                        <span class="text-lg font-semibold text-slate-900 tracking-tight"><?php bloginfo('name'); ?></span>
                    </a>
                </div>

                <?php if (has_nav_menu('primary')): ?>
                    <nav id="primary-navigation" class="hidden lg:flex lg:items-center lg:gap-6" aria-label="<?php esc_attr_e('Primary menu', 'animatek'); ?>">
                        <?php
                        wp_nav_menu([
                            'container'      => false,
                            'menu_class'     => 'flex items-center gap-6 text-sm font-bold uppercase tracking-wide [&_a]:text-black [&_a]:!no-underline [&_a:hover]:text-primary transition-colors [&_.current-menu-item_a]:text-primary [&_.current-menu-ancestor_a]:text-primary',
                            'theme_location' => 'primary',
                            'li_class'       => 'relative',
                            'fallback_cb'    => false,
                        ]);
                        ?>
                    </nav>
                <?php elseif (current_user_can('administrator')): ?>
                    <a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>" class="hidden lg:inline text-sm text-zinc-600"><?php esc_html_e('Edit Menus', 'animatek'); ?></a>
                <?php endif; ?>

                <?php
                /**
                 * Acciones del header: cuenta y contacto salen del <ul> del menú
                 * y viven aquí, a la derecha, donde se leen como iconos y no como
                 * dos entradas sueltas al final de una lista de texto.
                 */
                ?>
                <div class="header-actions flex items-center gap-2">
                    <?php if (!empty($animatek_actions['contacto'])): ?>
                        <a class="icon-btn" href="<?php echo esc_url($animatek_actions['contacto']); ?>" aria-label="<?php esc_attr_e('Contacto', 'animatek'); ?>" title="<?php esc_attr_e('Contacto', 'animatek'); ?>">
                            <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75A2.25 2.25 0 0 1 4.5 4.5h15a2.25 2.25 0 0 1 2.25 2.25Z"></path><path d="M21.75 7.017a2.25 2.25 0 0 1-1.02 1.89l-6.75 4.5a2.25 2.25 0 0 1-2.46 0l-6.75-4.5a2.25 2.25 0 0 1-1.02-1.89"></path></svg>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($animatek_actions['cuenta'])): ?>
                        <?php if ($animatek_user): ?>
                            <a class="icon-btn icon-btn--avatar" href="<?php echo esc_url($animatek_actions['cuenta']); ?>" aria-label="<?php esc_attr_e('Mi cuenta', 'animatek'); ?>" title="<?php echo esc_attr($animatek_user->display_name); ?>">
                                <span aria-hidden="true"><?php echo esc_html(animatek_user_initial($animatek_user)); ?></span>
                            </a>
                        <?php else: ?>
                            <a class="icon-btn" href="<?php echo esc_url($animatek_actions['cuenta']); ?>" aria-label="<?php esc_attr_e('Entrar', 'animatek'); ?>" title="<?php esc_attr_e('Entrar', 'animatek'); ?>">
                                <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"></circle><path d="M4 21a8 8 0 0 1 16 0"></path></svg>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if (has_nav_menu('primary')): ?>
                        <button
                            type="button"
                            aria-label="<?php esc_attr_e('Abrir menú', 'animatek'); ?>"
                            aria-expanded="false"
                            aria-controls="mobile-nav"
                            id="primary-menu-toggle"
                            class="icon-btn nav-toggle lg:hidden">
                            <svg class="i-open" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M3 6h18M3 12h18M3 18h18" /></svg>
                            <svg class="i-close" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M5 5l14 14M19 5 5 19" /></svg>
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <?php if (has_nav_menu('primary')): ?>
        <?php
        /**
         * Menú móvil: overlay propio a pantalla completa, no el <ul> de
         * escritorio encogido. El JS (resources/js/app.js) alterna .is-open.
         */
        ?>
        <div class="mobile-nav" id="mobile-nav" aria-hidden="true">
            <nav aria-label="<?php esc_attr_e('Menú móvil', 'animatek'); ?>">
                <?php
                wp_nav_menu([
                    'container'      => false,
                    'menu_class'     => 'mobile-nav__menu',
                    'theme_location' => 'primary',
                    'fallback_cb'    => false,
                ]);
                ?>
            </nav>

            <div class="mobile-nav__meta">
                <?php if (!empty($animatek_actions['cuenta'])): ?>
                    <a class="mobile-nav__btn" href="<?php echo esc_url($animatek_actions['cuenta']); ?>">
                        <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"></circle><path d="M4 21a8 8 0 0 1 16 0"></path></svg>
                        <?php echo $animatek_user ? esc_html__('Mi escritorio', 'animatek') : esc_html__('Entrar', 'animatek'); ?>
                    </a>
                <?php endif; ?>

                <?php if (!empty($animatek_actions['contacto'])): ?>
                    <a class="mobile-nav__btn" href="<?php echo esc_url($animatek_actions['contacto']); ?>">
                        <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75A2.25 2.25 0 0 1 4.5 4.5h15a2.25 2.25 0 0 1 2.25 2.25Z"></path><path d="M21.75 7.017a2.25 2.25 0 0 1-1.02 1.89l-6.75 4.5a2.25 2.25 0 0 1-2.46 0l-6.75-4.5a2.25 2.25 0 0 1-1.02-1.89"></path></svg>
                        <?php esc_html_e('Contacto', 'animatek'); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php get_template_part( 'template-parts/banner-labs' ); ?>

    <div id="content" class="site-content grow">
        <?php do_action('tailpress_content_start'); ?>
        <main>
