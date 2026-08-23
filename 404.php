<?php

get_header();
?>

<main id="primary" class="bg-slate-900 text-slate-50">
    <!-- 404 Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center pt-20 pb-10 lg:pt-0 overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-br from-slate-950 via-slate-900 to-slate-800"></div>
            <!-- Decorative Blurs -->
            <div class="absolute top-10 right-20 w-96 h-96 bg-primary/15 rounded-full blur-[120px] mix-blend-screen"></div>
            <div class="absolute -bottom-20 -left-32 w-96 h-96 bg-accent/10 rounded-full blur-[120px] mix-blend-screen"></div>
            <!-- Grid Background -->
            <div class="absolute inset-0 bg-[linear-gradient(rgba(100,116,139,0.1)_1px,transparent_1px),linear-gradient(90deg,rgba(100,116,139,0.1)_1px,transparent_1px)] bg-[size:40px_40px] opacity-20"></div>
        </div>

        <div class="relative z-10 container mx-auto px-6 max-w-4xl">
            <div class="text-center space-y-8">
                <!-- 404 Code -->
                <div class="space-y-4">
                    <div class="inline-block">
                        <div class="text-9xl md:text-[200px] font-black bg-gradient-to-r from-primary via-blue-500 to-primary bg-clip-text text-transparent leading-none">
                            404
                        </div>
                    </div>
                    <div class="h-1 w-24 mx-auto bg-gradient-to-r from-primary to-accent rounded-full"></div>
                </div>

                <!-- Terminal Message -->
                <div class="w-full rounded-xl bg-black/40 border border-slate-700/50 font-mono shadow-2xl overflow-hidden backdrop-blur-sm">
                    <!-- Terminal Header -->
                    <div class="bg-slate-800/60 px-4 py-2 flex items-center gap-2 border-b border-slate-700/50">
                        <div class="w-3 h-3 rounded-full bg-red-500"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                        <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        <span class="ml-2 text-xs text-slate-400 font-semibold">animatek/error.log</span>
                    </div>
                    <!-- Terminal Content -->
                    <div class="p-6 md:p-8 space-y-3 text-sm md:text-base leading-relaxed">
                        <div>
                            <span class="text-red-400 font-bold">error:</span> <span class="text-slate-300">módulo no encontrado</span>
                        </div>
                        <div>
                            <span class="text-slate-500">→ ruta:</span> <span class="text-amber-300"><?php echo esc_html( $_SERVER['REQUEST_URI'] ?? '/' ); ?></span>
                        </div>
                        <div>
                            <span class="text-slate-500">→ status:</span> <span class="text-rose-400 font-semibold">[ 404 NOT FOUND ]</span>
                        </div>
                        <div class="pt-2 border-t border-slate-700/50">
                            <span class="text-green-400">javi@animatek:~$</span> <span class="text-slate-400">help()</span>
                        </div>
                    </div>
                </div>

                <!-- Main Message -->
                <div class="space-y-4">
                    <h1 class="text-3xl md:text-4xl font-bold text-white leading-tight">
                        Oops, Módulo no conectado
                    </h1>
                    <p class="text-lg md:text-xl text-slate-300 max-w-2xl mx-auto leading-relaxed">
                        La señal se perdió en el patch. Parece que la página que buscas no existe o fue removida.
                    </p>
                </div>

                <!-- Secondary Buttons -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 max-w-2xl mx-auto pt-6">
                    <a href="<?php echo esc_url( home_url( '/sobre-mi' ) ); ?>"
                        class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-slate-700/50 hover:bg-slate-700 text-white font-semibold rounded-lg border border-slate-600 transition-all no-underline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Sobre mí
                    </a>
                    <a href="<?php echo esc_url( home_url( '/academia' ) ); ?>"
                        class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-slate-700/50 hover:bg-slate-700 text-white font-semibold rounded-lg border border-slate-600 transition-all no-underline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C6.5 6.253 2 10.998 2 17s4.5 10.747 10 10.747c5.5 0 10-4.998 10-10.747S17.5 6.253 12 6.253z" />
                        </svg>
                        Academia
                    </a>
                    <a href="<?php echo esc_url( home_url( '/clases-privadas' ) ); ?>"
                        class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-slate-700/50 hover:bg-slate-700 text-white font-semibold rounded-lg border border-slate-600 transition-all no-underline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        Clases Privadas
                    </a>
                </div>

                <!-- Home Button -->
                <div class="flex justify-center pt-6">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                        class="group relative inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-primary to-blue-600 text-white font-bold rounded-full hover:shadow-lg hover:shadow-primary/40 transition-all transform hover:-translate-y-1 no-underline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition-transform group-hover:-translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Volver al Inicio
                    </a>
                </div>

                <!-- Quick Links -->
                <div class="pt-8 border-t border-slate-700/50">
                    <p class="text-slate-400 text-sm mb-6">También puedes explorar:</p>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <a href="<?php echo esc_url( home_url( '/cursos' ) ); ?>" class="text-primary hover:text-blue-400 transition no-underline font-medium">
                            Cursos
                        </a>
                        <a href="<?php echo esc_url( home_url( '/sobre-mi' ) ); ?>" class="text-primary hover:text-blue-400 transition no-underline font-medium">
                            Sobre mí
                        </a>
                        <a href="<?php echo esc_url( home_url( '/contacto' ) ); ?>" class="text-primary hover:text-blue-400 transition no-underline font-medium">
                            Contacto
                        </a>
                        <a href="<?php echo esc_url( home_url( '/vcvrack-lab/' ) ); ?>" class="text-primary hover:text-blue-400 transition no-underline font-medium">
                            VCV Rack Lab
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();

