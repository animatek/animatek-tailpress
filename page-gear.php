<?php
/**
 * Template Name: Mi Equipo y Setup
 *
 * @package Animatek
 */

// Optimización SEO y Marcado Estructurado JSON-LD
add_action( 'wp_head', function() {
    ?>
    <meta name="description" content="Descubre el setup completo de producción musical, sintetizadores, secuenciadores, Eurorack y software de Javier Melgar (Animatek)." />
    <link rel="canonical" href="<?php echo esc_url( home_url( '/gear/' ) ); ?>" />
    
    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="Mi Equipo y Setup 2026 | Animatek" />
    <meta property="og:description" content="Descubre el setup de producción musical, sintetizadores, secuenciadores, Eurorack y software de Javier Melgar (Animatek)." />
    <meta property="og:url" content="<?php echo esc_url( home_url( '/gear/' ) ); ?>" />
    <meta property="og:type" content="profile" />
    <meta property="og:image" content="<?php echo esc_url( get_stylesheet_directory_uri() . '/screenshot.png' ); ?>" />
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Mi Equipo y Setup 2026 | Animatek" />
    <meta name="twitter:description" content="Descubre el setup de producción musical, sintetizadores, secuenciadores, Eurorack y software de Javier Melgar (Animatek)." />
    <meta name="twitter:image" content="<?php echo esc_url( get_stylesheet_directory_uri() . '/screenshot.png' ); ?>" />

    <!-- Marcado Estructurado JSON-LD -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ItemList",
      "name": "Setup y Equipo de Estudio de Animatek",
      "description": "Listado oficial de sintetizadores, secuenciadores, Eurorack y software utilizados por Animatek (Javier Melgar).",
      "url": "<?php echo esc_url( home_url( '/gear/' ) ); ?>",
      "numberOfItems": 10,
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Elektron Octatrack & Digitakt"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "OXI One Mk1"
        },
        {
          "@type": "ListItem",
          "position": 3,
          "name": "Nord Modular G1"
        },
        {
          "@type": "ListItem",
          "position": 4,
          "name": "Bitwig Studio v6"
        },
        {
          "@type": "ListItem",
          "position": 5,
          "name": "VCV Rack"
        },
        {
          "@type": "ListItem",
          "position": 6,
          "name": "Ultimate Ztep Zequencer"
        },
        {
          "@type": "ListItem",
          "position": 7,
          "name": "OXI Coral"
        },
        {
          "@type": "ListItem",
          "position": 8,
          "name": "Dreadbox Eudemonia"
        },
        {
          "@type": "ListItem",
          "position": 9,
          "name": "Behringer System 100"
        },
        {
          "@type": "ListItem",
          "position": 10,
          "name": "TipTop Audio uZeus"
        }
      ]
    }
    </script>
    <?php
} );

get_header();

// =========================================================================
// CONFIGURACIÓN DE AFILIADOS (Edita esto con tus propios códigos y enlaces)
// =========================================================================
$affiliate_config = [
    'bitwig_url' => 'https://www.bitwig.com/en/buy/?ref=220025', // Enlace de afiliado para Bitwig Studio
    'amazon_tag' => '', // Tu ID de afiliado de Amazon (ej: 'animatek-21')
    'thomann_url' => 'https://thmn.to/thocf/fkyrpit1bl', // Tu enlace de afiliado de Thomann directo (curated list)
];

/**
 * Función auxiliar para generar enlaces a Amazon con el tag de afiliado
 */
function get_amazon_affiliate_url($query, $tag = '') {
    $search_query = urlencode($query);
    if (!empty($tag)) {
        return "https://www.amazon.es/s?k={$search_query}&tag={$tag}";
    }
    return "https://www.amazon.es/s?k={$search_query}";
}
?>

<main id="primary" class="bg-slate-100 dark:bg-[#13131F] text-slate-900 dark:text-slate-100 transition-colors duration-300 min-h-screen">
    
    <!-- Hero Section -->
    <section class="relative overflow-hidden px-6 sm:px-10 py-20 bg-gradient-to-br from-slate-50 via-white to-slate-100 dark:from-[#1A1A2E] dark:via-[#13131F] dark:to-[#1E1E38] text-slate-900 border-b border-slate-200/80 dark:border-slate-800/80">
        <!-- Glow accents -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -left-24 -top-16 h-80 w-80 bg-[#2C7FFF]/10 dark:bg-[#2C7FFF]/15 blur-3xl rounded-full"></div>
            <div class="absolute right-10 top-10 h-72 w-72 bg-[#24B979]/10 dark:bg-[#24B979]/15 blur-3xl rounded-full"></div>
        </div>

        <div class="max-w-7xl mx-auto relative z-10">
            <div class="grid gap-12 lg:grid-cols-[1.2fr_0.8fr] items-center">
                <div class="space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#2C7FFF]/10 dark:bg-[#2C7FFF]/20 text-[#2C7FFF] dark:text-[#60a5fa] text-xs font-bold tracking-widest uppercase">
                        ⚡ Mi Setup & Hardware 2026
                    </div>
                    
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight text-slate-900 dark:text-white">
                        Mi Equipo y <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#2C7FFF] to-[#24B979]">Herramientas</span>
                    </h1>
                    
                    <p class="text-lg sm:text-xl text-slate-700 dark:text-slate-300 leading-relaxed max-w-2xl">
                        ¡Hola! Si vienes desde mis tutoriales de YouTube, aquí tienes recopilado todo el equipamiento que utilizo en mi estudio: desde mi software principal hasta mis sintetizadores hardware y módulos de Eurorack.
                    </p>
                    
                    <p class="text-sm text-slate-500 dark:text-slate-400">
                        * Algunos de los enlaces a continuación son afiliados. Al comprar a través de ellos me ayudas a mantener el canal sin coste adicional para ti.
                    </p>

                    <!-- CTAs -->
                    <div class="flex flex-wrap items-center gap-2 pt-2">
                        <a href="https://www.youtube.com/@animatek" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-xs font-bold text-white bg-[#FF0000] hover:bg-[#CC0000] transition-all duration-200 shadow-sm">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                            YouTube
                        </a>
                        <a href="https://discord.com/invite/emUkHRrvtk" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-xs font-bold text-white bg-[#5865F2] hover:bg-[#4752C4] transition-all duration-200 shadow-sm">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028 14.09 14.09 0 0 0 1.226-1.994.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.419 0 1.334-.956 2.419-2.157 2.419zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.419 0 1.334-.946 2.419-2.157 2.419z"/>
                            </svg>
                            Discord
                        </a>
                        <a href="https://www.patreon.com/c/animatek" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-xs font-bold text-white bg-[#F96854] hover:bg-[#e0533f] transition-all duration-200 shadow-sm">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path d="M15.386 6.226c-3.196 0-5.577 2.42-5.577 5.59 0 3.16 2.38 5.58 5.577 5.58 3.206 0 5.587-2.42 5.587-5.58 0-3.17-2.38-5.59-5.587-5.59zm-9.33 16.774H9.42V1.5H6.056v21.5z"/>
                            </svg>
                            Patreon
                        </a>
                        <a href="https://animatek.net/consulta-gratuita/" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-xs font-bold text-slate-800 dark:text-slate-200 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 border border-slate-300 dark:border-slate-700 transition-all duration-200 shadow-sm">
                            <i data-lucide="calendar" class="w-4 h-4 text-[#2C7FFF]"></i>
                            Clase Privada Gratis
                        </a>
                    </div>
                </div>

                <!-- Right Side: Graphic Visualizer -->
                <div class="relative hidden lg:block">
                    <div class="absolute inset-0 rounded-3xl bg-[#2C7FFF]/5 blur-3xl"></div>
                    <div class="relative rounded-3xl border border-slate-200 dark:border-slate-800 shadow-2xl bg-slate-900 p-6 space-y-6">
                        <div class="absolute top-2 right-4 flex gap-1.5">
                            <span class="w-3 h-3 rounded-full bg-red-500"></span>
                            <span class="w-3 h-3 rounded-full bg-yellow-500"></span>
                            <span class="w-3 h-3 rounded-full bg-green-500"></span>
                        </div>
                        <div class="flex items-center gap-3 border-b border-slate-800 pb-4">
                            <div class="p-2.5 rounded-xl bg-[#2C7FFF]/10 text-[#2C7FFF]">
                                <i data-lucide="sliders" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <div class="text-sm font-bold text-white">Animatek Studio Live</div>
                                <div class="text-xs text-[#24B979] flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#24B979] animate-pulse"></span>
                                    Sincronizado
                                </div>
                            </div>
                        </div>
                        <!-- Mock Waveform/Audio Level display -->
                        <div class="space-y-3 font-mono text-xs text-slate-400">
                            <div class="flex justify-between items-center">
                                <span>DAW MASTER</span>
                                <span class="text-[#2C7FFF] font-bold">Bitwig Studio v6</span>
                            </div>
                            <div class="h-2 bg-slate-800 rounded-full overflow-hidden flex">
                                <div class="bg-gradient-to-r from-[#2C7FFF] to-[#24B979] w-[82%] h-full"></div>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <span>VCV RACK L/R</span>
                                <span class="text-[#24B979]">Modular Host</span>
                            </div>
                            <div class="h-2 bg-slate-800 rounded-full overflow-hidden flex">
                                <div class="bg-[#24B979] w-[65%] h-full animate-pulse"></div>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <span>EURORACK OUT</span>
                                <span class="text-yellow-500">DC-Coupled Connect</span>
                            </div>
                            <div class="h-2 bg-slate-800 rounded-full overflow-hidden flex">
                                <div class="bg-yellow-500 w-[74%] h-full"></div>
                            </div>
                        </div>
                        <div class="pt-4 border-t border-slate-800 flex justify-between text-xs text-slate-500">
                            <span>OS: Linux CachyOS</span>
                            <span>MIDI/CV active</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Navigation Hub -->
    <div class="sticky top-[72px] z-40 bg-white/90 dark:bg-[#13131F]/90 backdrop-blur border-b border-slate-200 dark:border-slate-800 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4 flex flex-wrap gap-4 items-center justify-center md:justify-start">
            <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Saltar a:</span>
            <a href="#hardware" class="text-sm font-bold text-slate-700 hover:text-[#2C7FFF] dark:text-slate-300 dark:hover:text-[#60a5fa] transition">
                🎛️ Hardware & Sintes
            </a>
            <a href="#software" class="text-sm font-bold text-slate-700 hover:text-[#2C7FFF] dark:text-slate-300 dark:hover:text-[#60a5fa] transition">
                💿 Software y Sistema
            </a>
            <a href="#eurorack" class="text-sm font-bold text-slate-700 hover:text-[#2C7FFF] dark:text-slate-300 dark:hover:text-[#60a5fa] transition">
                🔌 Eurorack Modular
            </a>
            <a href="#academy" class="text-sm font-bold text-slate-700 hover:text-[#2C7FFF] dark:text-slate-300 dark:hover:text-[#60a5fa] transition">
                🎓 Clases y Cursos
            </a>
        </div>
    </div>

    <!-- Hardware Section -->
    <section id="hardware" class="max-w-7xl mx-auto px-6 py-20 scroll-mt-24">
        <div class="space-y-4 mb-12">
            <h2 class="text-3xl font-extrabold text-slate-900 dark:text-white flex items-center gap-3">
                <i data-lucide="sliders" class="w-8 h-8 text-[#24B979]"></i>
                Sintetizadores y Secuenciadores
            </h2>
            <p class="text-slate-600 dark:text-slate-400 text-lg">El hardware que toco, secuencio y grabo en mis pistas.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Elektron Card -->
            <div class="bg-white dark:bg-[#202030] rounded-2xl border border-slate-200/80 dark:border-slate-800 p-6 shadow-sm flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="p-3 bg-red-100 dark:bg-red-950/30 text-red-600 dark:text-red-400 rounded-xl w-fit">
                        <i data-lucide="music" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">Elektron Octatrack & Digitakt</h3>
                    <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">
                        Octatrack es el cerebro de mis directos para el procesado y mezcla en tiempo real. Digitakt aporta el motor rítmico principal, samplers ágiles y el potente secuenciador de Elektron para estructurar patrones en vivo.
                    </p>
                </div>
                <div class="pt-6 mt-6 border-t border-slate-200/60 dark:border-slate-800">
                    <a href="<?php echo esc_url($affiliate_config['thomann_url']); ?>" target="_blank" rel="noopener noreferrer" class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 font-bold text-white bg-[#111625] hover:bg-[#1a2238] border border-slate-800 hover:border-orange-500 rounded-xl transition duration-300 shadow-md text-sm">
                        <i data-lucide="shopping-bag" class="w-4 h-4 text-orange-500"></i>
                        Ver en Thomann
                    </a>
                </div>
            </div>

            <!-- OXI One Card -->
            <div class="bg-white dark:bg-[#202030] rounded-2xl border border-slate-200/80 dark:border-slate-800 p-6 shadow-sm flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="p-3 bg-blue-100 dark:bg-blue-950/30 text-[#2C7FFF] rounded-xl w-fit">
                        <i data-lucide="grid" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">OXI One Mk1</h3>
                    <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">
                        Mi secuenciador de hardware favorito. Me permite improvisar y dirigir todo mi Eurorack y sintes externos mediante CV y MIDI. Sus modos de composición generativos e interfaz visual son insustituibles en mi flujo de directo.
                    </p>
                </div>
                <div class="pt-6 mt-6 border-t border-slate-200/60 dark:border-slate-800">
                    <a href="<?php echo esc_url($affiliate_config['thomann_url']); ?>" target="_blank" rel="noopener noreferrer" class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 font-bold text-white bg-[#111625] hover:bg-[#1a2238] border border-slate-800 hover:border-orange-500 rounded-xl transition duration-300 shadow-md text-sm">
                        <i data-lucide="shopping-bag" class="w-4 h-4 text-orange-500"></i>
                        Ver en Thomann
                    </a>
                </div>
            </div>

            <!-- Nord Modular Card -->
            <div class="bg-white dark:bg-[#202030] rounded-2xl border border-slate-200/80 dark:border-slate-800 p-6 shadow-sm flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="p-3 bg-yellow-100 dark:bg-yellow-950/30 text-yellow-600 dark:text-yellow-400 rounded-xl w-fit">
                        <i data-lucide="cpu" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">Nord Modular G1</h3>
                    <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">
                        Un sintetizador legendario. Combina la flexibilidad de programar patches modulares en el ordenador con la potencia y el sonido del procesado DSP dedicado en hardware físico. Además, he desarrollado el editor moderno <strong>Animatek NME</strong> para mantenerlo vivo y programable en sistemas actuales.
                    </p>
                </div>
                <div class="pt-6 mt-6 border-t border-slate-200/60 dark:border-slate-800 grid grid-cols-2 gap-3">
                    <a href="<?php echo esc_url(home_url('/animatek-nme/')); ?>" class="inline-flex items-center justify-center gap-1.5 px-3 py-2.5 font-bold text-slate-800 dark:text-slate-100 bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600 border border-slate-350 dark:border-slate-600 rounded-xl transition duration-300 shadow-sm text-xs">
                        <i data-lucide="sliders" class="w-3.5 h-3.5 text-yellow-500"></i>
                        Animatek NME
                    </a>
                    <a href="https://reverb.com/es/item/95336311-clavia-nord-modular-g1" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-1.5 px-3 py-2.5 font-bold text-white bg-[#111625] hover:bg-[#1a2238] border border-slate-800 hover:border-[#2C7FFF] rounded-xl transition duration-300 shadow-md text-xs">
                        <i data-lucide="search" class="w-3.5 h-3.5 text-[#2C7FFF]"></i>
                        Ver en Reverb
                    </a>
                </div>
            </div>

            <!-- Bitwig Connect Card -->
            <div class="bg-white dark:bg-[#202030] rounded-2xl border border-slate-200/80 dark:border-slate-800 p-6 shadow-sm flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="p-3 bg-[#24B979]/10 text-[#24B979] rounded-xl w-fit">
                        <i data-lucide="radio" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">Interfaz: Bitwig Connect 4/12</h3>
                    <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">
                        La interfaz DC-coupled específica lanzada por Bitwig. Perfecta para comunicar el ordenador con el Eurorack, permitiendo enviar voltajes de control (CV) analógicos directamente desde Bitwig Studio a mis módulos.
                    </p>
                </div>
                <div class="pt-6 mt-6 border-t border-slate-200/60 dark:border-slate-800 grid grid-cols-2 gap-3">
                    <a href="<?php echo esc_url($affiliate_config['bitwig_url']); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-1.5 px-3 py-2.5 font-bold text-slate-800 dark:text-slate-100 bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600 border border-slate-350 dark:border-slate-600 rounded-xl transition duration-300 shadow-sm text-xs">
                        <i data-lucide="external-link" class="w-3.5 h-3.5 text-[#2C7FFF]"></i>
                        Bitwig
                    </a>
                    <a href="<?php echo esc_url($affiliate_config['thomann_url']); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-1.5 px-3 py-2.5 font-bold text-white bg-[#111625] hover:bg-[#1a2238] border border-slate-800 hover:border-orange-500 rounded-xl transition duration-300 shadow-md text-xs">
                        <i data-lucide="shopping-bag" class="w-3.5 h-3.5 text-orange-500"></i>
                        Thomann
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Software & System Section -->
    <section id="software" class="bg-white dark:bg-[#1a1a2a] border-y border-slate-200/80 dark:border-slate-800/80 py-20 scroll-mt-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="space-y-4 mb-12">
                <h2 class="text-3xl font-extrabold text-slate-900 dark:text-white flex items-center gap-3">
                    <i data-lucide="disc" class="w-8 h-8 text-[#2C7FFF]"></i>
                    Software y Sistema
                </h2>
                <p class="text-slate-600 dark:text-slate-400 text-lg">El entorno digital donde estructuro mis tracks, desarrollo proyectos y realizo directos.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Bitwig Card -->
                <div class="bg-slate-50 dark:bg-[#202034] rounded-2xl border border-slate-200/80 dark:border-slate-800 p-8 shadow-sm flex flex-col justify-between group hover:shadow-md transition">
                    <div class="space-y-5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold px-2.5 py-1 rounded bg-[#2C7FFF]/10 text-[#2C7FFF] dark:text-[#60a5fa]">DAW PRINCIPAL</span>
                            <!-- Bitwig Logo enlazado -->
                            <a href="<?php echo esc_url($affiliate_config['bitwig_url']); ?>" target="_blank" rel="noopener noreferrer" class="block opacity-80 hover:opacity-100 transition">
                                <img src="https://animatek.net/wp-content/uploads/2025/11/pngwing.com_.png" alt="Bitwig Studio" class="h-6 w-auto" />
                            </a>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white">Bitwig Studio</h3>
                        <p class="text-slate-600 dark:text-slate-300 leading-relaxed text-sm sm:text-base">
                            Mi DAW predilecto. Su enfoque modular, sistema de moduladores cruzados y su entorno de síntesis <strong>The Grid</strong> lo convierten en una herramienta sin rival. Me permite crear flujos de trabajo personalizados e integrar hardware a través de señales CV de forma nativa.
                        </p>
                    </div>
                    
                    <div class="pt-6 mt-6 border-t border-slate-100 dark:border-slate-800">
                        <a href="<?php echo esc_url($affiliate_config['bitwig_url']); ?>" target="_blank" rel="noopener noreferrer" class="btn-primary w-full inline-flex items-center justify-center gap-2">
                            <i data-lucide="external-link" class="w-4 h-4"></i>
                            Conseguir Bitwig Studio
                        </a>
                    </div>
                </div>

                <!-- VCV Rack Card -->
                <div class="bg-slate-50 dark:bg-[#202034] rounded-2xl border border-slate-200/80 dark:border-slate-800 p-8 shadow-sm flex flex-col justify-between group hover:shadow-md transition">
                    <div class="space-y-5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold px-2.5 py-1 rounded bg-[#24B979]/10 text-[#24B979]">MODULAR VIRTUAL</span>
                            <img src="https://animatek.net/wp-content/uploads/2025/11/logovcv.webp" alt="VCV Rack" class="h-6 w-auto object-contain opacity-80" />
                        </div>
                        
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white">VCV Rack</h3>
                        <p class="text-slate-600 dark:text-slate-300 leading-relaxed text-sm sm:text-base">
                            El simulador de Eurorack definitivo. Lo utilizo en mis streams para explicar voltajes, señales de control y arquitectura de síntesis. Es la herramienta principal de mi curso y mis laboratorios de sonido modular.
                        </p>
                    </div>
                    
                    <div class="pt-6 mt-6 border-t border-slate-100 dark:border-slate-800">
                        <a href="https://vcvrack.com" target="_blank" rel="noopener" class="btn-secondary w-full inline-flex items-center justify-center gap-2">
                            <i data-lucide="download" class="w-4 h-4"></i>
                            Descargar VCV Rack
                        </a>
                    </div>
                </div>

                <!-- Linux System Card -->
                <div class="bg-slate-50 dark:bg-[#202034] rounded-2xl border border-slate-200/80 dark:border-slate-800 p-8 shadow-sm flex flex-col justify-between group hover:shadow-md transition">
                    <div class="space-y-5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold px-2.5 py-1 rounded bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300">SISTEMA OPERATIVO</span>
                            <div class="flex gap-2">
                                <!-- Linux Icon / Arch Icon placeholders via SVG -->
                                <svg class="h-6 w-6 text-slate-600 dark:text-slate-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm.843 14.152c-.105.105-.285.105-.389 0l-1.942-1.942a.276.276 0 0 1 0-.39l.195-.195c.105-.105.285-.105.39 0l1.552 1.552 3.882-3.882c.105-.105.285-.105.39 0l.195.195c.105.105.105.285 0 .39l-4.283 4.282z"/>
                                </svg>
                            </div>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white">Linux (CachyOS / Arch)</h3>
                        <p class="text-slate-600 dark:text-slate-300 leading-relaxed text-sm sm:text-base">
                            Hago música enteramente en Linux. Utilizo <strong>CachyOS</strong> (basado en Arch Linux) optimizado para baja latencia, rendimiento en tiempo real (kernel-rt) y estabilidad absoluta. Demuestra que Linux es una plataforma profesional de producción sonora.
                        </p>
                    </div>
                    
                    <div class="pt-6 mt-6 border-t border-slate-100 dark:border-slate-800">
                        <a href="https://cachyos.org" target="_blank" rel="noopener" class="btn-secondary w-full inline-flex items-center justify-center gap-2">
                            <i data-lucide="info" class="w-4 h-4"></i>
                            Ver CachyOS
                        </a>
                    </div>
                </div>

                <!-- Ultimate Ztep Zequencer Card -->
                <div class="bg-slate-50 dark:bg-[#202034] rounded-2xl border border-slate-200/80 dark:border-slate-800 p-8 shadow-sm flex flex-col justify-between group hover:shadow-md transition">
                    <div class="space-y-5">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold px-2.5 py-1 rounded bg-[#24B979]/15 text-[#24B979]">MIS PROYECTOS</span>
                            <span class="text-[#2C7FFF] font-bold font-mono text-sm">Software y Módulos</span>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white">Software y módulos Animatek</h3>
                        <p class="text-slate-600 dark:text-slate-300 leading-relaxed text-sm sm:text-base">
                            Desarrollo módulos y herramientas para composición, directo e integración hardware. La colección actual para VCV Rack incluye <strong>UZZ</strong>, <strong>UNIT-D</strong>, <strong>OXI-CV</strong>, <strong>MULTI</strong>, <strong>APC40 CTRL</strong> y utilidades como <strong>BLANK 3</strong>.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-2.5 py-1 rounded-full bg-slate-100 dark:bg-slate-800 text-[11px] font-bold text-slate-600 dark:text-slate-300">VCV Library 2.5.x</span>
                            <span class="px-2.5 py-1 rounded-full bg-slate-100 dark:bg-slate-800 text-[11px] font-bold text-slate-600 dark:text-slate-300">GPL-3.0</span>
                            <span class="px-2.5 py-1 rounded-full bg-slate-100 dark:bg-slate-800 text-[11px] font-bold text-slate-600 dark:text-slate-300">Windows · macOS · Linux</span>
                        </div>
                    </div>
                    
                    <div class="pt-6 mt-6 border-t border-slate-100 dark:border-slate-800 grid grid-cols-2 gap-3">
                        <a href="<?php echo esc_url(home_url('/ultimate-ztep-zequencer-vcvrack/')); ?>" class="inline-flex items-center justify-center gap-1.5 px-3 py-2.5 font-bold text-slate-800 dark:text-slate-100 bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600 border border-slate-350 dark:border-slate-600 rounded-xl transition duration-300 shadow-sm text-xs">
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5 text-[#2C7FFF]"></i>
                            Módulos VCV
                        </a>
                        <a href="https://library.vcvrack.com/Animatek" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-1.5 px-3 py-2.5 font-bold text-white bg-[#24B979] hover:bg-[#1f9e67] border border-[#24B979] rounded-xl transition duration-300 shadow-md text-xs">
                            <i data-lucide="cpu" class="w-3.5 h-3.5 text-white"></i>
                            VCV Library
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Eurorack Modular Section -->
    <section id="eurorack" class="max-w-7xl mx-auto px-6 py-20 scroll-mt-24">
        <div class="space-y-4 mb-12">
            <h2 class="text-3xl font-extrabold text-slate-900 dark:text-white flex items-center gap-3">
                <i data-lucide="cable" class="w-8 h-8 text-yellow-500"></i>
                Eurorack Modular Synth
            </h2>
            <p class="text-slate-600 dark:text-slate-400 text-lg">Mi sistema Eurorack físico actual. Desliza hacia los lados para explorar todos los módulos del rack.</p>
        </div>

        <!-- Simulated Eurorack Case Container -->
        <div class="w-full relative bg-slate-950 rounded-2xl border-4 border-slate-800 shadow-2xl p-4 overflow-hidden mb-12">
            
            <!-- Metallic rails top and bottom -->
            <div class="absolute left-0 right-0 top-3 h-2 bg-slate-700 border-y border-slate-600 opacity-60"></div>
            <div class="absolute left-0 right-0 bottom-3 h-2 bg-slate-700 border-y border-slate-600 opacity-60"></div>
            
            <!-- Horizontal scrollable area for modules -->
            <div class="overflow-x-auto whitespace-nowrap py-3 px-1 flex gap-0.5 scrollbar-thin scrollbar-thumb-slate-700 scrollbar-track-transparent">
                
                <!-- 1. TipTop Audio uZeus (4 HP) -->
                <div class="flex-shrink-0 w-16 min-h-[380px] bg-slate-300 border-x border-slate-400 relative flex flex-col justify-between p-2 shadow-lg text-slate-800 font-mono text-[10px]">
                    <div class="text-center font-bold">uZeus</div>
                    
                    <div class="flex flex-col items-center gap-4">
                        <!-- Power Switch -->
                        <div class="w-3 h-6 bg-slate-900 border border-slate-800 rounded relative cursor-pointer flex items-center justify-center">
                            <span class="w-2.5 h-2.5 bg-slate-600 rounded-sm absolute top-0.5 shadow"></span>
                        </div>
                        <span class="text-[8px] font-bold text-red-600">POWER</span>
                        
                        <!-- LEDs -->
                        <div class="flex flex-col gap-1 items-center">
                            <span class="w-2 h-2 rounded-full bg-green-500 shadow-[0_0_8px_rgba(34,197,94,0.8)]"></span>
                            <span class="w-2 h-2 rounded-full bg-blue-500 shadow-[0_0_8px_rgba(59,130,246,0.8)]"></span>
                        </div>
                    </div>
                    
                    <div class="text-center font-bold text-[8px] text-slate-600">4 HP</div>
                </div>

                <!-- 2. Nano Modules ONA (8 HP) -->
                <div class="flex-shrink-0 w-32 min-h-[380px] bg-slate-900 border-x border-slate-950 relative flex flex-col justify-between p-3 shadow-lg text-slate-100 font-sans text-xs">
                    <div class="text-center font-extrabold tracking-widest text-[#24B979]">ONA</div>
                    <div class="text-[9px] text-slate-400 text-center font-mono uppercase">VCO</div>
                    
                    <!-- Synthesizer controls (knobs) -->
                    <div class="flex flex-col items-center gap-6 my-2">
                        <!-- Pitch Knob -->
                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 rounded-full bg-slate-950 border-2 border-slate-700 flex items-center justify-center shadow-inner relative">
                                <span class="absolute top-1 w-0.5 h-3 bg-[#24B979] rounded"></span>
                            </div>
                            <span class="text-[9px] text-slate-400 mt-1 uppercase font-mono">Pitch</span>
                        </div>
                        
                        <!-- Waveforms jacks -->
                        <div class="grid grid-cols-2 gap-2 mt-2">
                            <div class="flex flex-col items-center">
                                <div class="w-6 h-6 rounded-full bg-zinc-800 border-2 border-zinc-600 flex items-center justify-center shadow-inner">
                                    <div class="w-3 h-3 rounded-full bg-black"></div>
                                </div>
                                <span class="text-[8px] text-slate-500 font-mono">Sine</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <div class="w-6 h-6 rounded-full bg-zinc-800 border-2 border-zinc-600 flex items-center justify-center shadow-inner">
                                    <div class="w-3 h-3 rounded-full bg-black"></div>
                                </div>
                                <span class="text-[8px] text-slate-500 font-mono">Saw</span>
                            </div>
                        </div>
                    </div>

                    <div class="text-center text-slate-500 text-[8px] font-mono">NANO · 8 HP</div>
                </div>

                <!-- 3. Nano Modules MAR (4 HP) -->
                <div class="flex-shrink-0 w-16 min-h-[380px] bg-slate-900 border-x border-slate-950 relative flex flex-col justify-between p-2 shadow-lg text-slate-100 font-sans text-xs">
                    <div class="text-center font-extrabold text-[#24B979]">MAR</div>
                    <div class="text-[8px] text-slate-400 text-center font-mono uppercase">LFO</div>
                    
                    <div class="flex flex-col items-center gap-5 my-4">
                        <!-- Tiny Knob -->
                        <div class="w-7 h-7 rounded-full bg-slate-950 border-2 border-slate-700 flex items-center justify-center shadow-inner relative">
                            <span class="absolute top-0.5 w-0.5.5 h-2 bg-slate-400 rounded"></span>
                        </div>
                        
                        <!-- Jack -->
                        <div class="w-6 h-6 rounded-full bg-zinc-800 border-2 border-zinc-600 flex items-center justify-center shadow-inner">
                            <div class="w-3 h-3 rounded-full bg-black"></div>
                        </div>
                    </div>
                    
                    <div class="text-center text-slate-500 text-[8px] font-mono">4 HP</div>
                </div>

                <!-- 4. Nano Modules FONT (8 HP) -->
                <div class="flex-shrink-0 w-32 min-h-[380px] bg-slate-900 border-x border-slate-950 relative flex flex-col justify-between p-3 shadow-lg text-slate-100 font-sans text-xs">
                    <div class="text-center font-extrabold tracking-widest text-[#24B979]">FONT</div>
                    <div class="text-[9px] text-slate-400 text-center font-mono uppercase">VCF</div>
                    
                    <div class="flex flex-col items-center gap-6 my-2">
                        <!-- Cutoff Knob -->
                        <div class="flex flex-col items-center">
                            <div class="w-12 h-12 rounded-full bg-slate-950 border-2 border-slate-700 flex items-center justify-center shadow-inner relative">
                                <span class="absolute top-1 w-0.5 h-3.5 bg-yellow-400 rounded"></span>
                            </div>
                            <span class="text-[9px] text-slate-400 mt-1 uppercase font-mono">Cutoff</span>
                        </div>
                        
                        <!-- Resonance -->
                        <div class="flex flex-col items-center">
                            <div class="w-8 h-8 rounded-full bg-slate-950 border-2 border-slate-700 flex items-center justify-center shadow-inner relative">
                                <span class="absolute top-0.5 w-0.5 h-2 bg-slate-400 rounded"></span>
                            </div>
                            <span class="text-[8px] text-slate-400 mt-1 uppercase font-mono">Reso</span>
                        </div>
                    </div>
                    
                    <div class="text-center text-slate-500 text-[8px] font-mono">NANO · 8 HP</div>
                </div>

                <!-- 5. OXI Coral (14 HP) -->
                <div class="flex-shrink-0 w-56 min-h-[380px] bg-[#1a1a24] border-x border-slate-950 relative flex flex-col justify-between p-3 shadow-lg text-slate-100 font-sans text-xs">
                    <div class="flex justify-between items-center px-1">
                        <span class="font-extrabold text-orange-500 tracking-wider">CORAL</span>
                        <span class="text-[9px] font-mono bg-orange-950/40 text-orange-400 px-1.5 py-0.5 rounded">OXI</span>
                    </div>
                    <div class="text-[9px] text-slate-400 text-center font-mono uppercase">Multi-engine Synth</div>

                    <!-- OLED screen simulation -->
                    <div class="mx-auto my-3 w-[80%] h-14 bg-blue-950/80 border border-blue-900 rounded p-2 font-mono text-[8px] text-cyan-400 flex flex-col justify-between">
                        <div class="flex justify-between">
                            <span>VCO: Acid</span>
                            <span>Filter: Low</span>
                        </div>
                        <div class="h-4 flex items-end gap-0.5">
                            <span class="h-2 w-1.5 bg-cyan-400"></span>
                            <span class="h-3 w-1.5 bg-cyan-400"></span>
                            <span class="h-1.5 w-1.5 bg-cyan-400"></span>
                            <span class="h-4 w-1.5 bg-cyan-400"></span>
                            <span class="h-2 w-1.5 bg-cyan-400"></span>
                        </div>
                    </div>

                    <!-- Knobs and buttons -->
                    <div class="grid grid-cols-2 gap-4 items-center px-3 my-2">
                        <div class="flex flex-col items-center">
                            <div class="w-9 h-9 rounded-full bg-slate-950 border-2 border-orange-500 flex items-center justify-center relative shadow-inner">
                                <span class="absolute top-0.5 w-0.5 h-2.5 bg-orange-500 rounded"></span>
                            </div>
                            <span class="text-[8px] text-slate-400 mt-1 uppercase font-mono">Engine</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-9 h-9 rounded-full bg-slate-950 border-2 border-slate-700 flex items-center justify-center relative shadow-inner">
                                <span class="absolute top-0.5 w-0.5 h-2.5 bg-slate-400 rounded"></span>
                            </div>
                            <span class="text-[8px] text-slate-400 mt-1 uppercase font-mono">Decay</span>
                        </div>
                    </div>

                    <!-- Audio Outputs -->
                    <div class="grid grid-cols-4 gap-1 px-2">
                        <?php for($i=1; $i<=4; $i++): ?>
                            <div class="flex flex-col items-center">
                                <div class="w-6 h-6 rounded-full bg-zinc-900 border border-orange-500/50 flex items-center justify-center shadow-inner">
                                    <div class="w-2.5 h-2.5 rounded-full bg-black"></div>
                                </div>
                                <span class="text-[7px] text-slate-500 font-mono">OUT <?php echo $i; ?></span>
                            </div>
                        <?php endfor; ?>
                    </div>

                    <div class="text-center text-slate-500 text-[8px] font-mono">OXI INSTRUMENTS · 14 HP</div>
                </div>

                <!-- 6. Dreadbox Eudemonia (10 HP) -->
                <div class="flex-shrink-0 w-40 min-h-[380px] bg-slate-800 border-x border-slate-900 relative flex flex-col justify-between p-3 shadow-lg text-slate-100 font-sans text-xs">
                    <div class="text-center font-bold tracking-widest text-[#2C7FFF]">EUDEMONIA</div>
                    <div class="text-[8px] text-slate-400 text-center font-mono uppercase">Filter · Mixer · VCA</div>
                    
                    <!-- Sliders & knobs -->
                    <div class="my-4 space-y-4">
                        <div class="flex justify-around">
                            <!-- Cutoff knob -->
                            <div class="flex flex-col items-center">
                                <div class="w-10 h-10 rounded-full bg-slate-950 border-2 border-[#2C7FFF] flex items-center justify-center relative shadow-inner">
                                    <span class="absolute top-1 w-0.5 h-3 bg-[#2C7FFF] rounded"></span>
                                </div>
                                <span class="text-[8px] text-slate-400 mt-1 uppercase font-mono">Cutoff</span>
                            </div>
                        </div>

                        <!-- 3 vertical sliders -->
                        <div class="flex justify-around items-center px-4 h-16 bg-slate-900/60 rounded p-2">
                            <div class="w-1 h-12 bg-black rounded relative flex items-center justify-center">
                                <span class="w-3 h-2 bg-[#2C7FFF] rounded absolute top-2 cursor-pointer shadow"></span>
                            </div>
                            <div class="w-1 h-12 bg-black rounded relative flex items-center justify-center">
                                <span class="w-3 h-2 bg-[#24B979] rounded absolute top-5 cursor-pointer shadow"></span>
                            </div>
                            <div class="w-1 h-12 bg-black rounded relative flex items-center justify-center">
                                <span class="w-3 h-2 bg-orange-500 rounded absolute top-8 cursor-pointer shadow"></span>
                            </div>
                        </div>
                    </div>

                    <div class="text-center text-slate-500 text-[8px] font-mono">DREADBOX · 10 HP</div>
                </div>

                <!-- 7. Behringer 112 VCO (16 HP) -->
                <div class="flex-shrink-0 w-64 min-h-[380px] bg-slate-200 border-x border-slate-350 relative flex flex-col justify-between p-3 shadow-lg text-slate-800 font-mono text-xs">
                    <div class="text-center font-bold tracking-tight text-slate-950">112 DUAL VCO</div>
                    <div class="text-[8px] text-slate-500 text-center font-mono uppercase">System 100 series</div>
                    
                    <!-- 2 identical sections -->
                    <div class="grid grid-cols-2 gap-4 my-2 flex-1">
                        <!-- VCO 1 -->
                        <div class="border-r border-slate-300 pr-2 space-y-3 flex flex-col justify-between py-1">
                            <div class="text-center font-bold text-[8px] text-slate-600">VCO 1</div>
                            <div class="flex flex-col items-center">
                                <div class="w-8 h-8 rounded-full bg-slate-900 border border-slate-700 flex items-center justify-center relative">
                                    <span class="absolute top-0.5 w-0.5 h-2.5 bg-white rounded"></span>
                                </div>
                                <span class="text-[8px] text-slate-500 mt-1 uppercase">Freq</span>
                            </div>
                            <div class="flex justify-around">
                                <div class="w-5 h-5 rounded-full bg-zinc-950 border border-slate-400 flex items-center justify-center">
                                    <div class="w-2 h-2 rounded-full bg-black"></div>
                                </div>
                                <div class="w-5 h-5 rounded-full bg-zinc-950 border border-slate-400 flex items-center justify-center">
                                    <div class="w-2 h-2 rounded-full bg-black"></div>
                                </div>
                            </div>
                        </div>

                        <!-- VCO 2 -->
                        <div class="pl-2 space-y-3 flex flex-col justify-between py-1">
                            <div class="text-center font-bold text-[8px] text-slate-600">VCO 2</div>
                            <div class="flex flex-col items-center">
                                <div class="w-8 h-8 rounded-full bg-slate-900 border border-slate-700 flex items-center justify-center relative">
                                    <span class="absolute top-0.5 w-0.5 h-2.5 bg-white rounded"></span>
                                </div>
                                <span class="text-[8px] text-slate-500 mt-1">Freq</span>
                            </div>
                            <div class="flex justify-around">
                                <div class="w-5 h-5 rounded-full bg-zinc-950 border border-slate-400 flex items-center justify-center">
                                    <div class="w-2 h-2 rounded-full bg-black"></div>
                                </div>
                                <div class="w-5 h-5 rounded-full bg-zinc-950 border border-slate-400 flex items-center justify-center">
                                    <div class="w-2 h-2 rounded-full bg-black"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center text-slate-400 text-[8px]">BEHRINGER · 16 HP</div>
                </div>

                <!-- 8. Behringer 130 VCA (16 HP) -->
                <div class="flex-shrink-0 w-64 min-h-[380px] bg-slate-200 border-x border-slate-350 relative flex flex-col justify-between p-3 shadow-lg text-slate-800 font-mono text-xs">
                    <div class="text-center font-bold tracking-tight text-slate-950">130 DUAL VCA</div>
                    <div class="text-[8px] text-slate-500 text-center font-mono uppercase">System 100 series</div>
                    
                    <div class="grid grid-cols-2 gap-4 my-2 flex-1">
                        <!-- VCA 1 -->
                        <div class="border-r border-slate-300 pr-2 flex flex-col justify-between py-1">
                            <div class="text-center font-bold text-[8px] text-slate-600">VCA 1</div>
                            <!-- Slider -->
                            <div class="h-20 w-3 bg-zinc-950 rounded mx-auto relative flex flex-col items-center">
                                <div class="absolute left-0.5 right-0.5 top-0 bottom-0 flex flex-col justify-between opacity-35 text-[6px]">
                                    <span>-</span><span>-</span><span>-</span><span>-</span>
                                </div>
                                <span class="w-5 h-2.5 bg-red-600 rounded absolute top-6 cursor-pointer shadow"></span>
                            </div>
                            <div class="flex justify-around">
                                <div class="w-5 h-5 rounded-full bg-zinc-950 border border-slate-400 flex items-center justify-center">
                                    <div class="w-2 h-2 rounded-full bg-black"></div>
                                </div>
                            </div>
                        </div>

                        <!-- VCA 2 -->
                        <div class="pl-2 flex flex-col justify-between py-1">
                            <div class="text-center font-bold text-[8px] text-slate-600">VCA 2</div>
                            <!-- Slider -->
                            <div class="h-20 w-3 bg-zinc-950 rounded mx-auto relative flex flex-col items-center">
                                <div class="absolute left-0.5 right-0.5 top-0 bottom-0 flex flex-col justify-between opacity-35 text-[6px]">
                                    <span>-</span><span>-</span><span>-</span><span>-</span>
                                </div>
                                <span class="w-5 h-2.5 bg-red-600 rounded absolute top-12 cursor-pointer shadow"></span>
                            </div>
                            <div class="flex justify-around">
                                <div class="w-5 h-5 rounded-full bg-zinc-950 border border-slate-400 flex items-center justify-center">
                                    <div class="w-2 h-2 rounded-full bg-black"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center text-slate-400 text-[8px]">BEHRINGER · 16 HP</div>
                </div>

                <!-- 9. Behringer 140 ADSR + LFO (8 HP) -->
                <div class="flex-shrink-0 w-32 min-h-[380px] bg-slate-200 border-x border-slate-350 relative flex flex-col justify-between p-3 shadow-lg text-slate-800 font-mono text-xs">
                    <div class="text-center font-bold tracking-tight text-slate-950">140 ADSR</div>
                    <div class="text-[8px] text-slate-500 text-center font-mono uppercase">ENV / LFO</div>
                    
                    <div class="flex-1 flex flex-col justify-around py-3">
                        <!-- Four sliders for ADSR -->
                        <div class="flex justify-around items-center px-1 h-24 bg-slate-300/40 border border-slate-300 rounded p-1.5">
                            <div class="w-1.5 h-20 bg-zinc-950 rounded relative flex items-center justify-center">
                                <span class="w-3.5 h-2 bg-blue-600 rounded absolute top-2 cursor-pointer"></span>
                            </div>
                            <div class="w-1.5 h-20 bg-zinc-950 rounded relative flex items-center justify-center">
                                <span class="w-3.5 h-2 bg-blue-600 rounded absolute top-8 cursor-pointer"></span>
                            </div>
                            <div class="w-1.5 h-20 bg-zinc-950 rounded relative flex items-center justify-center">
                                <span class="w-3.5 h-2 bg-blue-600 rounded absolute top-4 cursor-pointer"></span>
                            </div>
                            <div class="w-1.5 h-20 bg-zinc-950 rounded relative flex items-center justify-center">
                                <span class="w-3.5 h-2 bg-blue-600 rounded absolute top-14 cursor-pointer"></span>
                            </div>
                        </div>

                        <!-- Outputs jacks -->
                        <div class="flex justify-around mt-2">
                            <div class="w-5 h-5 rounded-full bg-zinc-950 border border-slate-400 flex items-center justify-center">
                                <div class="w-2 h-2 rounded-full bg-black"></div>
                            </div>
                            <div class="w-5 h-5 rounded-full bg-zinc-950 border border-slate-400 flex items-center justify-center">
                                <div class="w-2 h-2 rounded-full bg-black"></div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center text-slate-400 text-[8px]">BEHRINGER · 8 HP</div>
                </div>

            </div>
        </div>

        <!-- Descriptive module details in tabs/grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Nano modules -->
            <div class="bg-white dark:bg-[#202030] p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm space-y-3">
                <h3 class="text-lg font-bold text-slate-900 dark:text-white flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#24B979]"></span>
                    Nano Modules
                </h3>
                <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                    <strong>ONA</strong> (Oscilador analógico de núcleo triangular estable), <strong>MAR</strong> (Fuente de ruido, aleatoriedad, S&H y LFO dual compacto) y <strong>FONT</strong> (Filtro paso bajo analógico resonante con entrada visual y limitador integrado). Marca nacional con un diseño excelente.
                </p>
            </div>

            <!-- OXI Coral -->
            <div class="bg-white dark:bg-[#202030] p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm space-y-3">
                <h3 class="text-lg font-bold text-slate-900 dark:text-white flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-orange-500"></span>
                    OXI Coral
                </h3>
                <p class="text-sm text-slate-600 dark:text-[#cbd5e1] leading-relaxed">
                    Un módulo sintetizador multipista polifónico de 8 voces con motores de síntesis virtual analógico, FM, tabla de ondas, Acid, y sampler. Controlado por el secuenciador OXI One es una potencia creativa en tan solo 14 HP.
                </p>
            </div>

            <!-- Dreadbox Eudemonia -->
            <div class="bg-white dark:bg-[#202030] p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm space-y-3">
                <h3 class="text-lg font-bold text-slate-900 dark:text-white flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#2C7FFF]"></span>
                    Dreadbox Eudemonia
                </h3>
                <p class="text-sm text-slate-600 dark:text-[#cbd5e1] leading-relaxed">
                    Un módulo compacto que combina un mezclador de 3 entradas, un filtro paso bajo resonante de 2 polos de Dreadbox y un VCA exponencial. Ofrece ese sonido analógico tan cálido típico de la marca griega.
                </p>
            </div>

            <!-- Behringer Modules -->
            <div class="bg-white dark:bg-[#202030] p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm space-y-3">
                <h3 class="text-lg font-bold text-slate-900 dark:text-white flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-slate-400"></span>
                    Behringer System 100
                </h3>
                <p class="text-sm text-slate-600 dark:text-[#cbd5e1] leading-relaxed">
                    Los módulos <strong>112 (Dual VCO)</strong>, <strong>130 (Dual VCA)</strong> y <strong>140 (Dual ADSR + LFO)</strong> son recreaciones del clásico sintetizador modular Roland System-100m. Aportan una base de síntesis analógica sólida e intuitiva de gran formato.
                </p>
            </div>

            <!-- TipTop Audio uZeus -->
            <div class="bg-white dark:bg-[#202030] p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm space-y-3">
                <h3 class="text-lg font-bold text-slate-900 dark:text-white flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-red-500"></span>
                    TipTop Audio uZeus
                </h3>
                <p class="text-sm text-slate-600 dark:text-[#cbd5e1] leading-relaxed">
                    El módulo encargado de alimentar todo mi rack. Proporciona una potencia estable de +12V, -12V y +5V con conectores bus board de cinta plana en un formato ultra-reducido de 4 HP.
                </p>
            </div>

            <!-- Affiliate Banner for Eurorack (6th Card in Grid) -->
            <div class="bg-white dark:bg-[#202030] p-6 rounded-2xl border border-slate-200 dark:border-slate-800 border-l-4 border-l-orange-500 shadow-sm flex flex-col justify-between space-y-3">
                <div class="space-y-3">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white flex items-center gap-2">
                        <i data-lucide="sparkles" class="w-5 h-5 text-orange-500"></i>
                        ¿Buscas expandir tu Eurorack?
                    </h3>
                    <p class="text-sm text-slate-600 dark:text-[#cbd5e1] leading-relaxed">
                        Puedes encontrar la mayoría de estos módulos, cables de patch y fuentes de alimentación en Thomann.
                    </p>
                </div>
                <div class="pt-4 mt-auto">
                    <a href="<?php echo esc_url($affiliate_config['thomann_url']); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 font-bold text-white bg-[#111625] hover:bg-[#1a2238] border border-slate-800 hover:border-orange-500 rounded-xl transition duration-300 shadow-md text-xs w-full">
                        <i data-lucide="shopping-bag" class="w-4 h-4 text-orange-500"></i>
                        Ver en Thomann
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Academy CTA Section -->
    <section id="academy" class="bg-gradient-to-br from-[#1E1E35] to-[#22183a] text-slate-100 border-t border-slate-800 py-20 scroll-mt-24">
        <div class="max-w-7xl mx-auto px-6 text-center space-y-8">
            <div class="inline-flex p-3 bg-[#2C7FFF]/10 text-[#2C7FFF] rounded-2xl">
                <i data-lucide="graduation-cap" class="w-10 h-10"></i>
            </div>
            
            <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-white max-w-2xl mx-auto">
                ¿Quieres aprender a dominar estas herramientas?
            </h2>
            
            <p class="text-slate-300 text-lg max-w-3xl mx-auto leading-relaxed">
                No basta con tener buen equipo, hay que saber cómo exprimirlo. Si quieres avanzar en diseño sonoro, estructurar tu directos con Bitwig y modulares, o aprender VCV Rack paso a paso, puedo ayudarte.
            </p>

            <div class="flex flex-wrap justify-center gap-6 pt-4">
                <a href="<?php echo esc_url(home_url('/cursos/vcv-rack-desde-cero/')); ?>" class="btn-primary !bg-[#2C7FFF] !border-[#2C7FFF] hover:!bg-[#1c63d9] hover:!border-[#1c63d9] px-8 py-4 text-base font-bold shadow-lg">
                    Curso de VCV Rack desde Cero
                </a>
                <a href="<?php echo esc_url(home_url('/consulta-gratuita/')); ?>" class="btn-secondary !bg-[#202030] !border-slate-700 !text-white hover:!border-[#2C7FFF] hover:!text-[#2C7FFF] px-8 py-4 text-base font-bold">
                    Reserva tu Asesoría 1:1 Gratis
                </a>
            </div>
        </div>
    </section>

</main>

<!-- Load Lucide Icons CDN dynamically -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    });
</script>

<?php
get_footer();
