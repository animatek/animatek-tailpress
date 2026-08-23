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


// Tutor LMS 4: la web es dark-only, forzamos su tema oscuro nativo.
// Tutor estampa data-tutor-theme en <html> según la preferencia del usuario
// (UserPreference::add_theme_attribute, prioridad 10); aquí lo fijamos a dark
// en todas las páginas para que sus componentes usen los tokens oscuros.
add_filter( 'language_attributes', function ( $output ) {
    if ( false !== strpos( $output, 'data-tutor-theme=' ) ) {
        return preg_replace( '/data-tutor-theme="[^"]*"/', 'data-tutor-theme="dark"', $output );
    }
    return $output . ' data-tutor-theme="dark"';
}, 20 );

add_filter( 'tutor_user_preference_defaults', function ( $defaults ) {
    $defaults['theme'] = 'dark';
    return $defaults;
} );

// Tutor (el editor de P y R, con Pro activo) configura TinyMCE con el
// plugin "codesample", que WordPress no incluye de serie: TinyMCE lanza el
// aviso "Failed to initialize plugin: codesample" (y sin su CSS se pinta
// como una columna roja glitcheada). Sin el plugin, el botón nunca puede
// funcionar, así que lo quitamos de cualquier editor del frontend.
add_filter( 'tiny_mce_before_init', function ( $mce ) {
    if ( is_admin() ) {
        return $mce;
    }
    foreach ( [ 'plugins', 'toolbar1', 'toolbar2' ] as $key ) {
        if ( ! empty( $mce[ $key ] ) && is_string( $mce[ $key ] ) ) {
            $items       = array_map( 'trim', explode( ',', $mce[ $key ] ) );
            $mce[ $key ] = implode( ',', array_diff( $items, [ 'codesample' ] ) );
        }
    }
    return $mce;
}, 20 );

// Modal "Compartir" de los cursos: Tutor solo trae Facebook, X y LinkedIn.
// Su librería SocialShare también soporta whatsapp, email, reddit y pinterest
// (class_prefix "s_" + nombre de la plantilla). El modal sanea icon_html con
// wp_kses permitiendo solo <span>/<i>, así que los iconos que la fuente de
// Tutor no trae (WhatsApp, Pinterest, Email) van como <i> con una máscara
// SVG definida en dark.css (.atk-share-*).
add_filter( 'tutor_social_share_icons', function ( $icons ) {
    $icons['whatsapp'] = [
        'share_class' => 's_whatsapp',
        'icon_html'   => '<i class="tutor-valign-middle atk-share-icon atk-share-whatsapp"></i>',
        'text'        => '',
        'color'       => '#25D366',
    ];
    $icons['reddit'] = [
        'share_class' => 's_reddit',
        'icon_html'   => '<i class="tutor-valign-middle tutor-icon-brand-reddit"></i>',
        'text'        => '',
        'color'       => '#FF4500',
    ];
    $icons['pinterest'] = [
        'share_class' => 's_pinterest',
        'icon_html'   => '<i class="tutor-valign-middle atk-share-icon atk-share-pinterest"></i>',
        'text'        => '',
        'color'       => '#E60023',
    ];
    $icons['email'] = [
        'share_class' => 's_email',
        'icon_html'   => '<i class="tutor-valign-middle atk-share-icon atk-share-email"></i>',
        'text'        => '',
        'color'       => '#64748b',
    ];

    return $icons;
} );


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

/**
 * Página virtual del manual de Animatek NME, colgando de la landing.
 * El contenido se genera desde manual/*.md del repositorio del editor.
 */
function animatek_render_virtual_nme_manual_pages(): void {
	if ( is_admin() || wp_doing_ajax() ) {
		return;
	}

	$locales = [
		'animatek-nme/manual'     => 'es',
		'animatek-nme-eng/manual' => 'en',
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
	require_once get_theme_file_path( 'inc/animatek-nme-manual-template.php' );
	animatek_nme_manual_render_page( $locales[ $request_path ] );
	get_footer();
	exit;
}
add_action( 'template_redirect', 'animatek_render_virtual_nme_manual_pages', 1 );

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

function animatek_software_seo_trim_description( string $description, int $max_length = 158 ): string {
    $description = trim( wp_strip_all_tags( $description ) );

    if ( function_exists( 'mb_strlen' ) && mb_strlen( $description ) <= $max_length ) {
        return $description;
    }

    if ( ! function_exists( 'mb_strlen' ) && strlen( $description ) <= $max_length ) {
        return $description;
    }

    if ( function_exists( 'mb_substr' ) ) {
        $short = mb_substr( $description, 0, $max_length - 1 );
    } else {
        $short = substr( $description, 0, $max_length - 1 );
    }

    $last_space = strrpos( $short, ' ' );
    if ( false !== $last_space ) {
        $short = substr( $short, 0, $last_space );
    }

    return rtrim( $short, ' .,;:-' ) . '.';
}

function animatek_software_seo_context(): ?array {
    static $cache = [];

    $request_path = animatek_current_request_path();
    $site_name    = 'Animatek';

    // Las rutas virtuales desmarcan el 404 en template_redirect. Si a estas
    // alturas la consulta sigue siendo un 404, es que la pagina real ya no
    // existe: no le damos titulo ni robots indexables.
    if ( did_action( 'template_redirect' ) && is_404() ) {
        return null;
    }

    if ( array_key_exists( $request_path, $cache ) ) {
        return $cache[ $request_path ];
    }

    $software_image = 'https://animatek.net/wp-content/uploads/2026/04/UZZ_2_5.webp';
    $nme_image      = 'https://animatek.net/wp-content/uploads/2026/06/ANIMATEK-NME_imagen.png';
    $uzz_max_image  = 'https://animatek.net/wp-content/uploads/2017/08/screenshot.png';

    $contexts = [
        'software' => [
            'title'       => 'Software musical: VCV Rack, Ableton y Nord Modular',
            'description' => 'Secuenciadores, módulos y editores de Animatek para VCV Rack, Ableton Live y Clavia Nord Modular G1. Descubre software musical propio.',
            'canonical'   => home_url( '/software/' ),
            'locale'      => 'es_ES',
            'lang'        => 'es',
            'image'       => $software_image,
            'type'        => 'website',
            'alternates'  => [
                'es'        => home_url( '/software/' ),
                'en'        => home_url( '/software-eng/' ),
                'x-default' => home_url( '/software/' ),
            ],
            'schema_type' => 'CollectionPage',
        ],
        'software-eng' => [
            'title'       => 'Music Software: VCV Rack, Ableton and Nord Modular',
            'description' => 'Sequencers, VCV Rack modules and editors by Animatek for VCV Rack, Ableton Live and the Clavia Nord Modular G1.',
            'canonical'   => home_url( '/software-eng/' ),
            'locale'      => 'en_US',
            'lang'        => 'en',
            'image'       => $software_image,
            'type'        => 'website',
            'alternates'  => [
                'es'        => home_url( '/software/' ),
                'en'        => home_url( '/software-eng/' ),
                'x-default' => home_url( '/software/' ),
            ],
            'schema_type' => 'CollectionPage',
        ],
        'sample-packs' => [
            'title'       => 'Sample Packs WAV para ambient, drone y sound design',
            'description' => 'Sample packs de Animatek extraidos de directos y sesiones reales: loops, drones, glitches y texturas WAV para producir y remezclar.',
            'canonical'   => home_url( '/sample-packs/' ),
            'locale'      => 'es_ES',
            'lang'        => 'es',
            'image'       => home_url( '/wp-content/uploads/2026/06/positronicos-cover.png' ),
            'type'        => 'website',
            'alternates'  => [
                'es'        => home_url( '/sample-packs/' ),
                'x-default' => home_url( '/sample-packs/' ),
            ],
            'schema_type' => 'CollectionPage',
        ],
        'animatek-nme' => [
            'title'       => 'Animatek NME - Editor moderno para Nord Modular G1',
            'description' => 'Editor nativo y open-source para Clavia Nord Modular G1. Edita patches .pch, módulos, cables, morphs, MIDI y bancos sin Java antiguo.',
            'canonical'   => home_url( '/animatek-nme/' ),
            'locale'      => 'es_ES',
            'lang'        => 'es',
            'image'       => $nme_image,
            'type'        => 'product',
            'alternates'  => [
                'es'        => home_url( '/animatek-nme/' ),
                'en'        => home_url( '/animatek-nme-eng/' ),
                'x-default' => home_url( '/animatek-nme/' ),
            ],
            'schema_type' => 'SoftwareApplication',
            'app'         => [
                'name' => 'Animatek NME',
                'category' => 'MusicApplication',
                'operatingSystem' => 'Windows, macOS, Linux',
                'url' => home_url( '/animatek-nme/' ),
            ],
        ],
        'animatek-nme-eng' => [
            'title'       => 'Animatek NME - Modern Nord Modular G1 Editor',
            'description' => 'Native open-source editor for the Clavia Nord Modular G1. Edit .pch patches, modules, cables, morphs, MIDI and banks without old Java.',
            'canonical'   => home_url( '/animatek-nme-eng/' ),
            'locale'      => 'en_US',
            'lang'        => 'en',
            'image'       => $nme_image,
            'type'        => 'product',
            'alternates'  => [
                'es'        => home_url( '/animatek-nme/' ),
                'en'        => home_url( '/animatek-nme-eng/' ),
                'x-default' => home_url( '/animatek-nme/' ),
            ],
            'schema_type' => 'SoftwareApplication',
            'app'         => [
                'name' => 'Animatek NME',
                'category' => 'MusicApplication',
                'operatingSystem' => 'Windows, macOS, Linux',
                'url' => home_url( '/animatek-nme-eng/' ),
            ],
        ],
        // Estas tres no tienen imagen social propia: se queda la que ponga
        // Rank Math por defecto hasta que haya una por pagina.
        'glosario' => [
            'title'       => 'Glosario de producción musical, síntesis y audio',
            'description' => 'Términos esenciales de síntesis, mezcla, audio digital, VCV Rack y Bitwig Studio explicados en claro. Tu referencia rápida de producción musical.',
            'canonical'   => home_url( '/glosario/' ),
            'locale'      => 'es_ES',
            'lang'        => 'es',
            'image'       => '',
            'type'        => 'website',
            'schema_type' => 'WebPage',
        ],
        // Copy heredado del bloque que page-gear.php imprimia por su cuenta.
        'gear' => [
            'title'       => 'Mi Equipo y Setup 2026',
            'description' => 'Descubre el setup completo de producción musical, sintetizadores, secuenciadores, Eurorack y software de Javier Melgar (Animatek).',
            'canonical'   => home_url( '/gear/' ),
            'locale'      => 'es_ES',
            'lang'        => 'es',
            'image'       => get_stylesheet_directory_uri() . '/screenshot.png',
            'type'        => 'website',
            'schema_type' => 'WebPage',
        ],
        'bitwig-lab' => [
            'title'       => 'Bitwig Starter Pack: aprende Bitwig Studio desde cero',
            'description' => 'Guía gratuita de Bitwig Studio: la ventana principal, los módulos básicos y tus primeros patches, en vídeos cortos y ordenados para empezar.',
            'canonical'   => home_url( '/bitwig-lab/' ),
            'locale'      => 'es_ES',
            'lang'        => 'es',
            'image'       => '',
            'type'        => 'website',
            'schema_type' => 'WebPage',
        ],
        'animatek-nme/manual' => [
            'title'       => 'Manual de Animatek NME - Editor para Nord Modular G1',
            'description' => 'Manual de usuario de Animatek NME: instalación, conexión del Nord Modular G1, edición de patches, slots, MIDI y formatos de archivo.',
            'canonical'   => home_url( '/animatek-nme/manual/' ),
            'locale'      => 'es_ES',
            'lang'        => 'es',
            'image'       => $nme_image,
            'type'        => 'website',
            'alternates'  => [
                'es'        => home_url( '/animatek-nme/manual/' ),
                'en'        => home_url( '/animatek-nme-eng/manual/' ),
                'x-default' => home_url( '/animatek-nme/manual/' ),
            ],
            'schema_type' => 'TechArticle',
            'breadcrumb_parent' => [
                'name' => 'Animatek NME',
                'item' => home_url( '/animatek-nme/' ),
            ],
        ],
        'animatek-nme-eng/manual' => [
            'title'       => 'Animatek NME Manual - Nord Modular G1 Editor',
            'description' => 'User manual for Animatek NME: installing it, connecting the Nord Modular G1, editing patches, working with slots, MIDI and file formats.',
            'canonical'   => home_url( '/animatek-nme-eng/manual/' ),
            'locale'      => 'en_US',
            'lang'        => 'en',
            'image'       => $nme_image,
            'type'        => 'website',
            'alternates'  => [
                'es'        => home_url( '/animatek-nme/manual/' ),
                'en'        => home_url( '/animatek-nme-eng/manual/' ),
                'x-default' => home_url( '/animatek-nme/manual/' ),
            ],
            'schema_type' => 'TechArticle',
            'breadcrumb_parent' => [
                'name' => 'Animatek NME',
                'item' => home_url( '/animatek-nme-eng/' ),
            ],
        ],
        'ultimate-ztep-zequencer' => [
            'title'       => 'UZZ Max for Live - Secuenciador de 16 pasos para Ableton',
            'description' => 'Secuenciador Max for Live de 16 pasos con funciones random y matriz de modulación para controlar parámetros de Ableton Live.',
            'canonical'   => home_url( '/ultimate-ztep-zequencer/' ),
            'locale'      => 'es_ES',
            'lang'        => 'es',
            'image'       => $uzz_max_image,
            'type'        => 'product',
            'alternates'  => [
                'es'        => home_url( '/ultimate-ztep-zequencer/' ),
                'en'        => home_url( '/ultimate-ztep-zequencer-eng/' ),
                'x-default' => home_url( '/ultimate-ztep-zequencer/' ),
            ],
            'schema_type' => 'SoftwareApplication',
            'app'         => [
                'name' => 'UZZ Max for Live',
                'category' => 'MusicApplication',
                'operatingSystem' => 'Ableton Live with Max for Live',
                'url' => home_url( '/ultimate-ztep-zequencer/' ),
                'offers' => [
                    '@type' => 'Offer',
                    'price' => '10',
                    'priceCurrency' => 'EUR',
                    'availability' => 'https://schema.org/InStock',
                    'url' => home_url( '/ultimate-ztep-zequencer/' ),
                ],
            ],
        ],
        'ultimate-ztep-zequencer-eng' => [
            'title'       => 'UZZ Max for Live - 16-Step Sequencer for Ableton',
            'description' => '16-step Max for Live sequencer with random functions and a modulation matrix for controlling Ableton Live parameters.',
            'canonical'   => home_url( '/ultimate-ztep-zequencer-eng/' ),
            'locale'      => 'en_US',
            'lang'        => 'en',
            'image'       => $uzz_max_image,
            'type'        => 'product',
            'alternates'  => [
                'es'        => home_url( '/ultimate-ztep-zequencer/' ),
                'en'        => home_url( '/ultimate-ztep-zequencer-eng/' ),
                'x-default' => home_url( '/ultimate-ztep-zequencer/' ),
            ],
            'schema_type' => 'SoftwareApplication',
            'app'         => [
                'name' => 'UZZ Max for Live',
                'category' => 'MusicApplication',
                'operatingSystem' => 'Ableton Live with Max for Live',
                'url' => home_url( '/ultimate-ztep-zequencer-eng/' ),
                'offers' => [
                    '@type' => 'Offer',
                    'price' => '10',
                    'priceCurrency' => 'EUR',
                    'availability' => 'https://schema.org/InStock',
                    'url' => home_url( '/ultimate-ztep-zequencer-eng/' ),
                ],
            ],
        ],
    ];

    $module_routes = [
        'ultimate-ztep-zequencer-vcvrack'     => [ 'uzz-vcv', 'es' ],
        'ultimate-ztep-zequencer-vcvrack-eng' => [ 'uzz-vcv', 'en' ],
        'unit-d'                              => [ 'unit-d', 'es' ],
        'unit-d-eng'                          => [ 'unit-d', 'en' ],
        'oxi-cv'                              => [ 'oxi-cv', 'es' ],
        'oxi-cv-eng'                          => [ 'oxi-cv', 'en' ],
        'apc40-ctrl'                          => [ 'apc40-ctrl', 'es' ],
        'apc40-ctrl-eng'                      => [ 'apc40-ctrl', 'en' ],
        'blank-3'                             => [ 'blank-3', 'es' ],
        'blank-3-eng'                         => [ 'blank-3', 'en' ],
        'blank3'                              => [ 'blank-3', 'es' ],
        'blank3-eng'                          => [ 'blank-3', 'en' ],
    ];

    if ( isset( $module_routes[ $request_path ] ) ) {
        if ( ! function_exists( 'animatek_vcv_modules_data' ) ) {
            require_once get_theme_file_path( 'inc/animatek-vcv-module-template.php' );
        }

        [ $module_slug, $lang ] = $module_routes[ $request_path ];
        $modules = animatek_vcv_modules_data();
        $module  = $modules[ $module_slug ] ?? null;

        if ( $module ) {
            if ( 'en' === $lang ) {
                $module = array_replace( $module, animatek_vcv_module_en_copy( $module_slug ) );
            }

            $base_path = 'uzz-vcv' === $module_slug ? 'ultimate-ztep-zequencer-vcvrack' : trim( $modules[ $module_slug ]['slug'], '/' );
            $es_url    = home_url( '/' . $base_path . '/' );
            $en_url    = home_url( '/' . $base_path . '-eng/' );
            $url       = 'en' === $lang ? $en_url : $es_url;
            $title     = sprintf( '%s - %s para VCV Rack', $module['title'], $module['subtitle'] );

            if ( 'en' === $lang ) {
                $title = sprintf( '%s - %s for VCV Rack', $module['title'], $module['subtitle'] );
            }

            $contexts[ $request_path ] = [
                'title'       => $title,
                'description' => animatek_software_seo_trim_description( $module['intro'] ),
                'canonical'   => $url,
                'locale'      => 'en' === $lang ? 'en_US' : 'es_ES',
                'lang'        => $lang,
                'image'       => $module['image'],
                'type'        => 'product',
                'alternates'  => [
                    'es'        => $es_url,
                    'en'        => $en_url,
                    'x-default' => $es_url,
                ],
                'schema_type' => 'SoftwareApplication',
                'app'         => [
                    'name' => $module['title'] . ' VCV Rack',
                    'category' => 'MusicApplication',
                    'operatingSystem' => 'VCV Rack 2',
                    'url' => $url,
                    'offers' => [
                        '@type' => 'Offer',
                        'price' => '0',
                        'priceCurrency' => 'EUR',
                        'availability' => 'https://schema.org/InStock',
                        'url' => $module['library_url'],
                    ],
                ],
            ];
        }
    }

    $context = $contexts[ $request_path ] ?? null;

    if ( ! $context ) {
        $cache[ $request_path ] = null;

        return null;
    }

    $context['site_name'] = $site_name;

    $cache[ $request_path ] = $context;

    return $context;
}

function animatek_nme_document_title_parts( array $title ): array {
    $seo_context = animatek_software_seo_context();

    if ( $seo_context ) {
        $title['title'] = $seo_context['title'];
        $title['site']  = 'Animatek';
        unset( $title['tagline'] );

        return $title;
    }

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
 * Título tal y como se imprime en <title> y en las etiquetas sociales.
 */
function animatek_software_seo_full_title( array $context ): string {
    return $context['title'] . ' | Animatek';
}

/**
 * Puente con Rank Math para las rutas virtuales (manual de NME, /sample-packs/).
 *
 * Esas rutas no existen como página en la base de datos: WordPress marca la
 * consulta como 404 y Rank Math ya ha resuelto su contexto cuando
 * template_redirect la desmarca, así que imprimía "Página no encontrada" en el
 * <title> y en og:title. Le damos los valores de animatek_software_seo_context()
 * para que use los nuestros. Sin Rank Math instalado estos filtros no se
 * ejecutan y manda animatek_nme_document_title_parts().
 */
function animatek_rank_math_apply_seo_context(): void {
    add_filter(
        'rank_math/frontend/title',
        static function ( $title ) {
            $context = animatek_software_seo_context();

            return $context ? animatek_software_seo_full_title( $context ) : $title;
        }
    );

    add_filter(
        'rank_math/frontend/description',
        static function ( $description ) {
            $context = animatek_software_seo_context();

            return $context ? animatek_software_seo_trim_description( $context['description'] ) : $description;
        }
    );

    add_filter(
        'rank_math/frontend/canonical',
        static function ( $canonical ) {
            $context = animatek_software_seo_context();

            return $context ? $context['canonical'] : $canonical;
        }
    );

    add_filter(
        'rank_math/frontend/robots',
        static function ( $robots ) {
            if ( ! animatek_software_seo_context() ) {
                return $robots;
            }

            return [
                'index'             => 'index',
                'follow'            => 'follow',
                'max-image-preview' => 'max-image-preview:large',
            ];
        }
    );

    // og:type lo resuelve Rank Math por tipo de contenido y en estas rutas
    // devolvia "article"; el tema declara website o product.
    add_filter(
        'rank_math/opengraph/type',
        static function ( $type ) {
            $context = animatek_software_seo_context();

            if ( ! $context ) {
                return $type;
            }

            return 'product' === ( $context['type'] ?? '' ) ? 'product' : 'website';
        }
    );

    // La imagen social no sale de un post con miniatura, asi que se la damos
    // por el hook que Rank Math expone para eso.
    foreach ( [ 'facebook', 'twitter' ] as $network ) {
        add_action(
            'rank_math/opengraph/' . $network . '/add_images',
            static function ( $image_object ) {
                $context = animatek_software_seo_context();

                if ( $context && ! empty( $context['image'] ) && is_object( $image_object ) && method_exists( $image_object, 'add_image_by_url' ) ) {
                    $image_object->add_image_by_url( $context['image'] );
                }
            }
        );
    }

    // Rank Math pasa cada etiqueta social por rank_math/opengraph/{red}/{propiedad}.
    $social_tags = [
        'facebook/og_title'           => 'title',
        'facebook/og_description'     => 'description',
        'facebook/og_url'             => 'canonical',
        'facebook/og_image'           => 'image',
        'twitter/twitter_title'       => 'title',
        'twitter/twitter_description' => 'description',
        'twitter/twitter_image'       => 'image',
    ];

    foreach ( $social_tags as $filter => $key ) {
        add_filter(
            'rank_math/opengraph/' . $filter,
            static function ( $value ) use ( $key ) {
                $context = animatek_software_seo_context();

                if ( ! $context ) {
                    return $value;
                }

                if ( 'title' === $key ) {
                    return animatek_software_seo_full_title( $context );
                }

                if ( 'description' === $key ) {
                    return animatek_software_seo_trim_description( $context['description'] );
                }

                // Sin imagen propia se respeta la que haya resuelto Rank Math.
                return empty( $context[ $key ] ) ? $value : $context[ $key ];
            }
        );
    }
}
add_action( 'wp', 'animatek_rank_math_apply_seo_context' );

function animatek_software_schema_graph( array $context ): array {
    $organization = [
        '@type' => 'Organization',
        '@id'   => home_url( '/#organization' ),
        'name'  => 'Animatek',
        'url'   => home_url( '/' ),
        'logo'  => get_stylesheet_directory_uri() . '/screenshot.png',
    ];

    $web_page = [
        '@type'       => $context['schema_type'] ?? 'WebPage',
        '@id'         => trailingslashit( $context['canonical'] ) . '#webpage',
        'url'         => $context['canonical'],
        'name'        => $context['title'],
        'description' => $context['description'],
        'inLanguage'  => $context['lang'] ?? 'es',
        'isPartOf'    => [
            '@type' => 'WebSite',
            '@id'   => home_url( '/#website' ),
            'name'  => 'Animatek',
            'url'   => home_url( '/' ),
        ],
        'publisher'   => [
            '@id' => home_url( '/#organization' ),
        ],
        'image'       => empty( $context['image'] ) ? null : [
            '@type' => 'ImageObject',
            'url'   => $context['image'],
        ],
    ];

    if ( 'SoftwareApplication' === ( $context['schema_type'] ?? '' ) && ! empty( $context['app'] ) ) {
        $web_page = array_merge(
            $web_page,
            [
                '@type'               => 'SoftwareApplication',
                'applicationCategory' => $context['app']['category'] ?? 'MusicApplication',
                'operatingSystem'     => $context['app']['operatingSystem'] ?? '',
                'softwareVersion'     => $context['app']['softwareVersion'] ?? null,
                'downloadUrl'         => $context['app']['downloadUrl'] ?? null,
                'offers'              => $context['app']['offers'] ?? null,
                'author'              => [
                    '@id' => home_url( '/#organization' ),
                ],
            ]
        );

        $web_page['name'] = $context['app']['name'] ?? $context['title'];
    }

    $web_page = array_filter(
        $web_page,
        static function ( $value ) {
            return null !== $value && '' !== $value;
        }
    );

    $software_url = 'en' === ( $context['lang'] ?? 'es' ) ? home_url( '/software-eng/' ) : home_url( '/software/' );
    $breadcrumb = [
        '@type'           => 'BreadcrumbList',
        '@id'             => trailingslashit( $context['canonical'] ) . '#breadcrumb',
        'itemListElement' => [
            [
                '@type'    => 'ListItem',
                'position' => 1,
                'name'     => 'Animatek',
                'item'     => home_url( '/' ),
            ],
            [
                '@type'    => 'ListItem',
                'position' => 2,
                'name'     => 'Software',
                'item'     => $software_url,
            ],
        ],
    ];

    if ( ! in_array( animatek_current_request_path(), [ 'software', 'software-eng' ], true ) ) {
        // Las páginas que cuelgan de otra (el manual, bajo la landing de NME)
        // insertan a su padre antes de aparecer ellas.
        if ( ! empty( $context['breadcrumb_parent'] ) ) {
            $breadcrumb['itemListElement'][] = [
                '@type'    => 'ListItem',
                'position' => 3,
                'name'     => $context['breadcrumb_parent']['name'],
                'item'     => $context['breadcrumb_parent']['item'],
            ];
        }

        $breadcrumb['itemListElement'][] = [
            '@type'    => 'ListItem',
            'position' => count( $breadcrumb['itemListElement'] ) + 1,
            'name'     => $context['title'],
            'item'     => $context['canonical'],
        ];
    }

    return [
        '@context' => 'https://schema.org',
        '@graph'   => [
            $organization,
            $web_page,
            $breadcrumb,
        ],
    ];
}

/**
 * Rank Math ya imprime title, description, canonical, robots y las etiquetas
 * sociales, y desde animatek_rank_math_apply_seo_context() lo hace con nuestros
 * valores. Cuando esta activo, el tema solo aporta lo que el plugin no cubre en
 * estas rutas: los hreflang y su propio JSON-LD.
 */
function animatek_seo_plugin_owns_meta(): bool {
    return defined( 'RANK_MATH_VERSION' ) || class_exists( 'RankMath' );
}

function animatek_render_software_seo_head(): void {
    $context = animatek_software_seo_context();

    if ( ! $context ) {
        return;
    }

    $description = animatek_software_seo_trim_description( $context['description'] );
    $title       = animatek_software_seo_full_title( $context );
    $canonical   = $context['canonical'];
    $image       = $context['image'];
    $og_type     = 'product' === ( $context['type'] ?? '' ) ? 'product' : 'website';
    $plugin_meta = animatek_seo_plugin_owns_meta();

    if ( ! $plugin_meta ) :
        ?>
        <meta name="description" content="<?php echo esc_attr( $description ); ?>">
        <meta name="robots" content="index, follow, max-image-preview:large">
        <link rel="canonical" href="<?php echo esc_url( $canonical ); ?>">
        <?php
    endif;

    foreach ( $context['alternates'] ?? [] as $hreflang => $url ) :
        ?>
        <link rel="alternate" hreflang="<?php echo esc_attr( $hreflang ); ?>" href="<?php echo esc_url( $url ); ?>">
        <?php
    endforeach;

    if ( ! $plugin_meta ) :
        ?>
        <meta property="og:locale" content="<?php echo esc_attr( $context['locale'] ?? 'es_ES' ); ?>">
        <meta property="og:type" content="<?php echo esc_attr( $og_type ); ?>">
        <meta property="og:site_name" content="Animatek">
        <meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
        <meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
        <meta property="og:url" content="<?php echo esc_url( $canonical ); ?>">
        <meta property="og:image" content="<?php echo esc_url( $image ); ?>">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>">
        <meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>">
        <meta name="twitter:image" content="<?php echo esc_url( $image ); ?>">
        <?php
    endif;
    ?>
    <script type="application/ld+json"><?php echo wp_json_encode( animatek_software_schema_graph( $context ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?></script>
    <?php
}
add_action( 'wp_head', 'animatek_render_software_seo_head', 2 );

function animatek_software_sitemap_urls(): array {
    return [
        home_url( '/software/' ),
        home_url( '/software-eng/' ),
        home_url( '/animatek-nme/' ),
        home_url( '/animatek-nme-eng/' ),
        home_url( '/animatek-nme/manual/' ),
        home_url( '/animatek-nme-eng/manual/' ),
        home_url( '/ultimate-ztep-zequencer/' ),
        home_url( '/ultimate-ztep-zequencer-eng/' ),
        home_url( '/ultimate-ztep-zequencer-vcvrack/' ),
        home_url( '/ultimate-ztep-zequencer-vcvrack-eng/' ),
        home_url( '/unit-d/' ),
        home_url( '/unit-d-eng/' ),
        home_url( '/oxi-cv/' ),
        home_url( '/oxi-cv-eng/' ),
        home_url( '/apc40-ctrl/' ),
        home_url( '/apc40-ctrl-eng/' ),
        home_url( '/blank-3/' ),
        home_url( '/blank-3-eng/' ),
    ];
}

function animatek_render_software_sitemap(): void {
    if ( 'animatek-software-sitemap.xml' !== animatek_current_request_path() ) {
        return;
    }

    $lastmod_sources = [
        __FILE__,
        get_theme_file_path( 'inc/animatek-software-hub.php' ),
        get_theme_file_path( 'inc/animatek-nme-template.php' ),
        get_theme_file_path( 'inc/animatek-vcv-module-template.php' ),
    ];
    $lastmod = 0;

    foreach ( $lastmod_sources as $source ) {
        if ( file_exists( $source ) ) {
            $lastmod = max( $lastmod, (int) filemtime( $source ) );
        }
    }

    $lastmod = $lastmod ? gmdate( 'c', $lastmod ) : gmdate( 'c' );

    status_header( 200 );
    header( 'Content-Type: application/xml; charset=UTF-8' );

    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

    foreach ( animatek_software_sitemap_urls() as $url ) {
        echo "\t<url>\n";
        echo "\t\t<loc>" . esc_url( $url ) . "</loc>\n";
        echo "\t\t<lastmod>" . esc_html( $lastmod ) . "</lastmod>\n";
        echo "\t\t<changefreq>weekly</changefreq>\n";
        echo "\t\t<priority>0.8</priority>\n";
        echo "\t</url>\n";
    }

    echo '</urlset>';
    exit;
}
add_action( 'template_redirect', 'animatek_render_software_sitemap', 0 );

function animatek_add_software_sitemap_to_robots( string $output, bool $public ): string {
    if ( ! $public ) {
        return $output;
    }

    $sitemap = 'Sitemap: ' . home_url( '/animatek-software-sitemap.xml' );

    if ( false === strpos( $output, $sitemap ) ) {
        $output = rtrim( $output ) . "\n" . $sitemap . "\n";
    }

    return $output;
}
add_filter( 'robots_txt', 'animatek_add_software_sitemap_to_robots', 10, 2 );

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

/**
 * Página virtual /sample-packs/ para publicar sample packs sin depender de crear
 * una página manual en WordPress. Si existe una página real con ese slug, esta
 * ruta sigue renderizando el mismo diseño.
 */
function animatek_render_virtual_sample_packs_page(): void {
    if ( is_admin() || wp_doing_ajax() ) {
        return;
    }

    if ( 'sample-packs' !== animatek_current_request_path() ) {
        return;
    }

    global $wp_query;
    if ( $wp_query instanceof WP_Query ) {
        $wp_query->is_404  = false;
        $wp_query->is_page = true;
    }

    status_header( 200 );
    get_header();
    require_once get_theme_file_path( 'inc/animatek-sample-packs-template.php' );
    animatek_sample_packs_render_page();
    get_footer();
    exit;
}
add_action( 'template_redirect', 'animatek_render_virtual_sample_packs_page', 1 );

/**
 * LiteSpeed Cache minifica mal el bundle de Tutor: la copia optimizada de
 * assets/js/tutor.js que sirve desde /wp-content/litespeed/js/ se queda sin dos
 * llaves de cierre y revienta con "SyntaxError: expected expression, got ')'".
 * Al no ejecutarse el bundle no se registra ningún listener de Tutor, así que
 * "Mostrar más" (y el resto de <a href="#"> de Tutor) navegan a la propia URL
 * con almohadilla en lugar de desplegar.
 *
 * data-no-optimize="1" es la marca que LiteSpeed respeta para dejar un script
 * tal cual viene del plugin.
 */
function animatek_skip_litespeed_optimize_tutor_js( $tag, $handle ) {
    $handles = array( 'tutor-script', 'tutor-frontend' );

    if ( ! in_array( $handle, $handles, true ) ) {
        return $tag;
    }

    if ( false !== strpos( $tag, 'data-no-optimize' ) ) {
        return $tag;
    }

    return str_replace( '<script ', '<script data-no-optimize="1" ', $tag );
}
add_filter( 'script_loader_tag', 'animatek_skip_litespeed_optimize_tutor_js', 10, 2 );
