<?php
// Barra de aviso global de los Labs. No se muestra en los propios labs
// y se puede cerrar (recordado en localStorage).
if ( is_page( [ 'vcvrack-lab', 'bitwig-lab' ] ) ) {
    return;
}
?>
<div id="labs-banner" class="hidden bg-primary text-white">
    <div class="relative mx-auto flex max-w-7xl flex-wrap items-center justify-center gap-x-4 gap-y-2 px-10 py-2.5 text-sm sm:px-12">
        <p class="flex items-center gap-2 font-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M10 2v6.5L4.5 18A2 2 0 0 0 6.2 21h11.6a2 2 0 0 0 1.7-3L14 8.5V2"/>
                <path d="M8.5 2h7"/>
                <path d="M7 15h10"/>
            </svg>
            <span><strong>Labs gratis:</strong> guías completas para empezar de cero</span>
        </p>
        <span class="flex flex-wrap items-center justify-center gap-2">
            <a href="<?php echo esc_url( home_url( '/vcvrack-lab/' ) ); ?>" class="rounded-full bg-white/15 px-3 py-1 text-xs font-bold transition hover:bg-white/30">VCV Rack Lab</a>
            <a href="<?php echo esc_url( home_url( '/bitwig-lab/' ) ); ?>" class="rounded-full bg-white/15 px-3 py-1 text-xs font-bold transition hover:bg-white/30">Bitwig Lab</a>
        </span>
        <button type="button" id="labs-banner-close" aria-label="<?php esc_attr_e( 'Cerrar aviso', 'animatek' ); ?>" class="absolute right-3 top-1/2 -translate-y-1/2 rounded-full p-1.5 text-white/70 transition hover:bg-white/15 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true">
                <path d="M6 6l12 12M18 6 6 18"/>
            </svg>
        </button>
    </div>
</div>
<script>
(function () {
    var banner = document.getElementById('labs-banner');
    if (!banner) { return; }
    var KEY = 'animatek-labs-banner';
    try {
        if (localStorage.getItem(KEY) === 'closed') { return; }
    } catch (e) {}
    banner.classList.remove('hidden');
    var close = document.getElementById('labs-banner-close');
    if (close) {
        close.addEventListener('click', function () {
            banner.remove();
            try { localStorage.setItem(KEY, 'closed'); } catch (e) {}
        });
    }
})();
</script>
