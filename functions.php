<?php

if (is_file(__DIR__.'/vendor/autoload_packages.php')) {
    require_once __DIR__.'/vendor/autoload_packages.php';
}

function tailpress(): TailPress\Framework\Theme
{
    return TailPress\Framework\Theme::instance()
        ->assets(fn($manager) => $manager
            ->withCompiler(new TailPress\Framework\Assets\ViteCompiler, fn($compiler) => $compiler
                ->registerAsset('resources/css/app.css')
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
            wp_enqueue_style('animatek-main', get_theme_file_uri('dist/'.$css_file), [], null);
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

function animatek_current_request_path(): string {
    return trim( (string) wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
}

function animatek_redirect_legacy_nme_urls(): void {
    if ( is_admin() || wp_doing_ajax() ) {
        return;
    }

    $redirects = [
        'nomad2026'     => home_url( '/animatek-nme/' ),
        'nomad2026_eng' => home_url( '/animatek-nme-eng/' ),
        'multi'         => home_url( '/oxi-cv/#multi' ),
    ];

    $request_path = animatek_current_request_path();

    if ( isset( $redirects[ $request_path ] ) ) {
        wp_safe_redirect( $redirects[ $request_path ], 301 );
        exit;
    }
}
add_action( 'template_redirect', 'animatek_redirect_legacy_nme_urls', 0 );

function animatek_render_virtual_nme_pages(): void {
    if ( is_admin() || wp_doing_ajax() ) {
        return;
    }

    $locales      = [
        'animatek-nme'     => 'es',
        'animatek-nme-eng' => 'en',
    ];
    $request_path = animatek_current_request_path();

    if ( ! isset( $locales[ $request_path ] ) ) {
        return;
    }

    global $wp_query;
    if ( $wp_query instanceof WP_Query ) {
        $wp_query->is_404  = false;
        $wp_query->is_page = true;
    }

    status_header( 200 );
    get_header();
    require_once get_theme_file_path( 'inc/animatek-nme-template.php' );
    animatek_nme_render_page( $locales[ $request_path ] );
    get_footer();
    exit;
}
add_action( 'template_redirect', 'animatek_render_virtual_nme_pages', 1 );

function animatek_render_virtual_vcv_module_pages(): void {
    if ( is_admin() || wp_doing_ajax() ) {
        return;
    }

    $modules      = [
        'unit-d'     => 'unit-d',
        'unit-d-eng' => 'unit-d|en',
        'oxi-cv-eng' => 'oxi-cv|en',
        'apc40-ctrl' => 'apc40-ctrl',
        'apc40-ctrl-eng' => 'apc40-ctrl|en',
        'blank-3'    => 'blank-3',
        'blank-3-eng' => 'blank-3|en',
        'blank3'     => 'blank-3',
        'blank3-eng' => 'blank-3|en',
    ];
    $request_path = animatek_current_request_path();

    if ( ! isset( $modules[ $request_path ] ) ) {
        return;
    }

    global $wp_query;
    if ( $wp_query instanceof WP_Query ) {
        $wp_query->is_404  = false;
        $wp_query->is_page = true;
    }

    status_header( 200 );
    get_header();
    require_once get_theme_file_path( 'inc/animatek-vcv-module-template.php' );
    $module_parts = explode( '|', $modules[ $request_path ] );
    animatek_vcv_module_render( $module_parts[0], $module_parts[1] ?? 'es' );
    get_footer();
    exit;
}
add_action( 'template_redirect', 'animatek_render_virtual_vcv_module_pages', 1 );

function animatek_nme_document_title_parts( array $title ): array {
    $request_path = animatek_current_request_path();

    if ( is_page( 'animatek-nme' ) || 'animatek-nme' === $request_path ) {
        $title['title'] = 'Animatek NME - Nord Modular Editor G1';
    } elseif ( is_page( 'animatek-nme-eng' ) || 'animatek-nme-eng' === $request_path ) {
        $title['title'] = 'Animatek NME - Nord Modular Editor G1';
    } elseif ( in_array( $request_path, [ 'unit-d', 'unit-d-eng', 'oxi-cv-eng', 'apc40-ctrl', 'apc40-ctrl-eng', 'blank-3', 'blank-3-eng', 'blank3', 'blank3-eng' ], true ) ) {
        $titles = [
            'unit-d'     => 'UNIT-D - VCV Rack Module',
            'unit-d-eng' => 'UNIT-D - VCV Rack Module',
            'oxi-cv-eng' => 'OXI-CV - VCV Rack Module',
            'apc40-ctrl' => 'APC40 CTRL - VCV Rack Module',
            'apc40-ctrl-eng' => 'APC40 CTRL - VCV Rack Module',
            'blank-3'    => 'BLANK 3 - VCV Rack Module',
            'blank-3-eng' => 'BLANK 3 - VCV Rack Module',
            'blank3'     => 'BLANK 3 - VCV Rack Module',
            'blank3-eng' => 'BLANK 3 - VCV Rack Module',
        ];
        $title['title'] = $titles[ $request_path ];
    }

    return $title;
}
add_filter( 'document_title_parts', 'animatek_nme_document_title_parts' );

/**
 * Devuelve la mejor URL disponible para el panel de alumno.
 * Tutor LMS decide el slug final en ajustes, así que evitamos hardcodear /my-account/.
 */
function animatek_get_student_dashboard_url(): string {
    if ( function_exists( 'tutor_utils' ) && is_object( tutor_utils() ) && method_exists( tutor_utils(), 'tutor_dashboard_url' ) ) {
        $dashboard_url = tutor_utils()->tutor_dashboard_url();

        if ( is_string( $dashboard_url ) && $dashboard_url ) {
            return $dashboard_url;
        }
    }

    return home_url( '/academia/' );
}

/**
 * URL del login social de Google provista por Nextend Social Login.
 * En producción aparece como /wp-login.php?loginSocial=google.
 */
function animatek_get_google_login_url( string $redirect_to = '' ): string {
    $args = [
        'loginSocial' => 'google',
    ];

    if ( $redirect_to ) {
        // Nextend puede ignorarlo según configuración, pero no rompe el flujo.
        $args['redirect_to'] = $redirect_to;
    }

    return add_query_arg( $args, wp_login_url() );
}

/**
 * Tras login, prioriza redirecciones legítimas de cursos protegidos.
 * Si no hay destino claro, manda al dashboard de Tutor LMS.
 */
function animatek_login_redirect( $redirect_to, $requested_redirect_to, $user ) {
    if ( is_wp_error( $user ) || ! $user instanceof WP_User ) {
        return $redirect_to;
    }

    if ( user_can( $user, 'manage_options' ) ) {
        return admin_url();
    }

    if ( $requested_redirect_to ) {
        $safe_requested = wp_validate_redirect( $requested_redirect_to, '' );
        if ( $safe_requested && false === strpos( $safe_requested, 'wp-login.php' ) ) {
            return $safe_requested;
        }
    }

    return animatek_get_student_dashboard_url();
}
add_filter( 'login_redirect', 'animatek_login_redirect', 10, 3 );

/**
 * Redirige visitas públicas normales de wp-login.php a /entrar/.
 * No toca POST, Google login, reset de contraseña, logout ni flujos internos.
 */
function animatek_redirect_plain_wp_login(): void {
    if ( is_user_logged_in() || 'GET' !== ( $_SERVER['REQUEST_METHOD'] ?? 'GET' ) ) {
        return;
    }

    if ( isset( $_GET['loginSocial'] ) || isset( $_GET['interim-login'] ) || isset( $_GET['reauth'] ) ) {
        return;
    }

    $action = isset( $_GET['action'] ) ? sanitize_key( wp_unslash( $_GET['action'] ) ) : 'login';
    $allowed_actions = [
        'lostpassword',
        'retrievepassword',
        'rp',
        'resetpass',
        'logout',
        'postpass',
        'register',
        'checkemail',
        'confirm_admin_email',
    ];

    if ( in_array( $action, $allowed_actions, true ) ) {
        return;
    }

    $entrar_url = home_url( '/entrar/' );

    if ( isset( $_GET['redirect_to'] ) ) {
        $redirect_to = esc_url_raw( wp_unslash( $_GET['redirect_to'] ) );
        if ( $redirect_to ) {
            $entrar_url = add_query_arg( 'redirect_to', $redirect_to, $entrar_url );
        }
    }

    wp_safe_redirect( $entrar_url );
    exit;
}
add_action( 'login_init', 'animatek_redirect_plain_wp_login' );
