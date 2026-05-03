<?php
/**
 * Theme header template.
 *
 * @package Animatek
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <script>
    (function() {
        var t = null;
        try { t = localStorage.getItem('animatek-theme'); } catch(e) {}
        if (t !== 'light') {
            document.documentElement.setAttribute('data-theme', 'dark');
        }
    })();
    </script>
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-slate-200 text-zinc-900 antialiased'); ?>>
<?php do_action('tailpress_site_before'); ?>

<div id="page" class="min-h-screen flex flex-col">
    <?php do_action('tailpress_header'); ?>

    <header class="relative z-50 bg-white/95 border-b border-slate-200/80 shadow-[0_12px_60px_-40px_rgba(15,23,42,0.45)] backdrop-blur">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between gap-4 min-h-[72px] relative">
                <div class="flex items-center gap-3">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3 !no-underline">
                        <img src="https://animatek.net/wp-content/uploads/2025/05/Logotek2025azulwebp.webp" alt="<?php bloginfo('name'); ?>" class="h-10 w-auto object-contain" loading="lazy" />
                        <span class="text-lg font-semibold text-slate-900 tracking-tight"><?php bloginfo('name'); ?></span>
                    </a>
                </div>

                <?php if (has_nav_menu('primary')): ?>
                    <button
                        type="button"
                        aria-label="<?php esc_attr_e('Toggle navigation', 'animatek'); ?>"
                        aria-expanded="false"
                        aria-controls="primary-navigation"
                        id="primary-menu-toggle"
                        class="md:hidden inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-3 py-2 text-slate-700 shadow-sm transition hover:border-primary hover:text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                <?php endif; ?>

                <nav id="primary-navigation" class="hidden flex flex-col md:flex md:flex-row items-start md:items-center gap-4 md:gap-6 absolute left-0 right-0 top-full z-30 bg-white px-6 py-4 border-b border-slate-200 shadow-lg md:static md:border-none md:bg-transparent md:px-0 md:py-0 md:shadow-none" aria-label="<?php esc_attr_e('Primary menu', 'animatek'); ?>">
                    <?php if (current_user_can('administrator') && !has_nav_menu('primary')): ?>
                        <a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>" class="text-sm text-zinc-600"><?php esc_html_e('Edit Menus', 'animatek'); ?></a>
                    <?php else: ?>
                        <?php
                        $contact_icon_filter = static function ($title, $item, $args, $depth) {
                            if ($args->theme_location !== 'primary') {
                                return $title;
                            }

                            if (strcasecmp(trim($title), 'Contacto') === 0) {
                                return '<span class="sr-only">Contacto</span><svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5"><path d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75A2.25 2.25 0 0 1 4.5 4.5h15a2.25 2.25 0 0 1 2.25 2.25Z"></path><path d="M21.75 7.017a2.25 2.25 0 0 1-1.02 1.89l-6.75 4.5a2.25 2.25 0 0 1-2.46 0l-6.75-4.5a2.25 2.25 0 0 1-1.02-1.89"></path></svg>';
                            }

                            return $title;
                        };

                        add_filter('nav_menu_item_title', $contact_icon_filter, 10, 4);

                        $menu_markup = wp_nav_menu([
                            'container'       => false,
                            'menu_class'      => 'flex flex-col md:flex-row md:items-center gap-4 md:gap-6 text-sm font-bold uppercase tracking-wide [&_a]:text-black [&_a]:!no-underline [&_a:hover]:text-primary transition-colors [&_.current-menu-item_a]:text-primary [&_.current-menu-ancestor_a]:text-primary',
                            'theme_location'  => 'primary',
                            'li_class'        => 'relative',
                            'fallback_cb'     => false,
                            'echo'            => false,
                        ]);

                        remove_filter('nav_menu_item_title', $contact_icon_filter, 10);

                        echo $menu_markup;
                        ?>
                    <?php endif; ?>
                </nav>

                <!-- Dark mode toggle -->
                <button
                    type="button"
                    id="dark-mode-toggle"
                    aria-label="<?php esc_attr_e('Activar modo oscuro', 'animatek'); ?>"
                    class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white p-2 text-slate-600 shadow-sm transition hover:border-primary hover:text-primary shrink-0">
                    <!-- Luna: visible en modo claro -->
                    <svg id="dark-toggle-moon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                    </svg>
                    <!-- Sol: visible en modo oscuro -->
                    <svg id="dark-toggle-sun" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 hidden">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                    </svg>
                </button>
            </div>
        </div>


    </header>

    <?php if (function_exists('rank_math_the_breadcrumbs')) : ?>
        <div class="max-w-7xl mx-auto px-6 py-2 text-sm text-slate-600 dark:text-slate-400">
            <?php rank_math_the_breadcrumbs(); ?>
        </div>
    <?php endif; ?>

    <div id="content" class="site-content grow">
        <?php do_action('tailpress_content_start'); ?>
        <main>
