<?php

if (is_file(__DIR__.'/vendor/autoload_packages.php')) {
    require_once __DIR__.'/vendor/autoload_packages.php';
}

function tailpress(): TailPress\Framework\Theme
{
    return TailPress\Framework\Theme::instance()
        ->assets(fn($manager) => $manager
            ->withCompiler(new TailPress\Framework\Assets\ViteCompiler, fn($compiler) => $compiler
                ->registerAsset('resources/css/app.css', ['animatek-inter'])
                ->registerAsset('resources/js/app.js')
                ->editorStyleFile('resources/css/editor-style.css')
            )
            ->enqueueAssets()
        )
        ->features(fn($manager) => $manager->add(TailPress\Framework\Features\MenuOptions::class))
        ->menus(fn($manager) => $manager->add('primary', __( 'Primary Menu', 'animatek')))
        ->themeSupport(fn($manager) => $manager->add([
            'title-tag',
            'custom-logo',
            'post-thumbnails',
            'align-wide',
            'wp-block-styles',
            'responsive-embeds',
            'html5' => [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ]
        ]));
}

tailpress();


//Tutorlms
/*
add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_style('tutor'); 
    wp_dequeue_style('tutor-frontend'); 
    wp_dequeue_style('tutor-course'); 
    wp_dequeue_style('tutor-dashboard'); 
    wp_dequeue_style('tutor-woocommerce'); 
}, 20);
*/






function animatek_enqueue_assets(): void
{
    $font_handle = 'animatek-inter';
    $font_url = 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap';

    wp_enqueue_style($font_handle, $font_url, [], null);

    // Evita cargar el JS/CSS dos veces si TailPress ya los encoló.
    $tailpress_handle = 'tailpress-app';
    if (
        wp_script_is($tailpress_handle, 'enqueued')
        || wp_script_is($tailpress_handle, 'to_enqueue')
        || wp_script_is($tailpress_handle, 'registered')
    ) {
        return;
    }

    $manifest_path = get_theme_file_path('dist/.vite/manifest.json');
    if (file_exists($manifest_path)) {
        $manifest = json_decode(file_get_contents($manifest_path), true);

        $css_file = $manifest['resources/css/app.css']['file'] ?? null;
        $js_file  = $manifest['resources/js/app.js']['file'] ?? null;

        if ($css_file && !wp_style_is('tailpress-app', 'enqueued')) {
            wp_enqueue_style('animatek-main', get_theme_file_uri('dist/'.$css_file), [$font_handle], null);
        }

        if ($js_file && !wp_script_is('tailpress-app', 'enqueued')) {
            wp_enqueue_script('animatek-main', get_theme_file_uri('dist/'.$js_file), [], null, true);
        }
    }
}

// Se ejecuta después de TailPress (que usa prioridad 10) para detectar si ya encoló los assets.
add_action('wp_enqueue_scripts', 'animatek_enqueue_assets', 20);

add_action('after_setup_theme', function () {
    load_theme_textdomain('animatek', get_template_directory() . '/languages');
});

// Reemplaza el texto del ítem "Cuenta" por un icono accesible en el menú primario.
add_filter('walker_nav_menu_start_el', function ($item_output, $item, $depth, $args) {
    if (!isset($args->theme_location) || $args->theme_location !== 'primary') {
        return $item_output;
    }

    $title = isset($item->title) ? trim(strtolower($item->title)) : '';
    if ($title !== 'cuenta') {
        return $item_output;
    }

    $icon = '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">'
        . '<circle cx="12" cy="8" r="4" stroke-linecap="round" stroke-linejoin="round" />'
        . '<path d="M5 20c1-3 4-5 7-5s6 2 7 5" stroke-linecap="round" stroke-linejoin="round" />'
        . '</svg>';

    return preg_replace(
        '/>([^<]*)<\/a>/',
        '>' . $icon . '<span class="sr-only">Cuenta</span></a>',
        $item_output,
        1
    );
}, 10, 4);

// Fallback mínimo para asegurar el toggle del menú móvil incluso si los assets no cargan.
add_action('wp_footer', function () {
    ?>
    <script>
        (function () {
            if (window.animatekMenuInit) {
                return;
            }

            window.animatekMenuInit = function () {
                var nav = document.getElementById('primary-navigation');
                var toggle = document.getElementById('primary-menu-toggle');

                if (!nav || !toggle) {
                    return;
                }

                // Clone the button to remove any existing event listeners (from app.js or others)
                // This ensures we have a clean slate and prevents double-toggling or conflicts.
                var newToggle = toggle.cloneNode(true);
                toggle.parentNode.replaceChild(newToggle, toggle);
                toggle = newToggle;

                toggle.dataset.menuBound = 'true';

                var mq = window.matchMedia('(min-width: 782px)');

                var applyState = function (isOpen) {
                    if (isOpen) {
                        nav.classList.remove('hidden');
                        nav.style.display = 'flex';
                        nav.style.flexDirection = 'column';
                        toggle.setAttribute('aria-expanded', 'true');
                    } else {
                        nav.classList.add('hidden');
                        nav.style.display = 'none';
                        toggle.setAttribute('aria-expanded', 'false');
                    }
                };

                var sync = function () {
                    if (mq.matches) {
                        nav.classList.remove('hidden');
                        nav.style.display = '';
                        nav.style.flexDirection = '';
                        toggle.setAttribute('aria-expanded', 'true');
                        return;
                    }

                    applyState(!nav.classList.contains('hidden'));
                };

                var onClick = function (event) {
                    event.preventDefault();
                    var isHidden = nav.classList.contains('hidden');
                    applyState(isHidden);
                };

                toggle.setAttribute('aria-controls', 'primary-navigation');
                
                toggle.addEventListener('click', onClick);
                mq.addEventListener('change', sync);
                sync();
            };

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', window.animatekMenuInit, { once: true });
            } else {
                window.animatekMenuInit();
            }
        })();
    </script>
    <?php
}, 30);

/**
 * AJAX: registrar "like" en posts de la librería sonora.
 * Endpoint usado por page-libreria-sonora.php (action=animatek_like).
 */
function animatek_handle_like(): void {
    check_ajax_referer( 'animatek_like_nonce', 'nonce' );

    if ( ! is_user_logged_in() ) {
        wp_send_json_error( [ 'message' => __( 'Debes iniciar sesión para dar like.', 'animatek' ) ], 401 );
    }

    $post_id = isset( $_POST['post_id'] ) ? absint( $_POST['post_id'] ) : 0;
    $post    = $post_id ? get_post( $post_id ) : null;

    if ( ! $post || 'publish' !== $post->post_status ) {
        wp_send_json_error( [ 'message' => __( 'Recurso no válido.', 'animatek' ) ], 400 );
    }

    $user_id   = get_current_user_id();
    $user_key  = '_animatek_liked_posts';
    $count_key = '_animatek_like_count';

    $liked_by_user = (array) get_user_meta( $user_id, $user_key, true );

    if ( in_array( $post_id, $liked_by_user, true ) ) {
        $count = (int) get_post_meta( $post_id, $count_key, true );
        wp_send_json_error( [
            'message' => __( 'Ya diste like a este recurso.', 'animatek' ),
            'count'   => $count,
        ], 409 );
    }

    $liked_by_user[] = $post_id;
    update_user_meta( $user_id, $user_key, array_values( array_unique( array_map( 'absint', $liked_by_user ) ) ) );

    $count = (int) get_post_meta( $post_id, $count_key, true ) + 1;
    update_post_meta( $post_id, $count_key, $count );

    wp_send_json_success( [ 'count' => $count ] );
}
add_action( 'wp_ajax_animatek_like', 'animatek_handle_like' );
add_action( 'wp_ajax_nopriv_animatek_like', 'animatek_handle_like' );
