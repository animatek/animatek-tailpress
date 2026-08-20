<?php
// Barra de aviso global de los Labs, cerrable (recordado en localStorage).
// En los propios labs también sale, pero contextual: solo se anuncia el
// otro lab (en VCV Lab sale Bitwig Lab y viceversa) y siempre la oferta.
$is_vcv_lab    = is_page( 'vcvrack-lab' );
$is_bitwig_lab = is_page( 'bitwig-lab' );
$in_lab        = $is_vcv_lab || $is_bitwig_lab;

// Oferta en curso: precio fundador de Patch Lab 01.
// Se muestra hasta el final del 20 de agosto y luego desaparece sola.
$vcv_offer_url    = 'https://animatek.net/cursos/patch-lab-01/';
$vcv_offer_active = current_time( 'timestamp' ) < strtotime( '2026-08-21 00:00:00' );
?>
<div id="labs-banner" class="hidden border-b border-slate-200 bg-slate-50 text-slate-700">
    <div class="relative mx-auto flex max-w-7xl flex-wrap items-center justify-center gap-x-4 gap-y-2 px-10 py-2.5 text-sm sm:px-12">
        <p class="flex items-center gap-2 font-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M10 2v6.5L4.5 18A2 2 0 0 0 6.2 21h11.6a2 2 0 0 0 1.7-3L14 8.5V2"/>
                <path d="M8.5 2h7"/>
                <path d="M7 15h10"/>
            </svg>
            <?php if ( $in_lab ) : ?>
                <span><strong>Sigue aprendiendo gratis:</strong> conoce el otro Lab</span>
            <?php else : ?>
                <span><strong>Labs gratis:</strong> guías completas para empezar de cero</span>
            <?php endif; ?>
        </p>
        <span class="flex flex-wrap items-center justify-center gap-2">
            <?php if ( ! $is_vcv_lab ) : ?>
                <a href="<?php echo esc_url( home_url( '/vcvrack-lab/' ) ); ?>" class="rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-bold text-primary shadow-sm transition hover:border-primary/40 hover:bg-primary/5">VCV Rack Lab</a>
            <?php endif; ?>
            <?php if ( ! $is_bitwig_lab ) : ?>
                <a href="<?php echo esc_url( home_url( '/bitwig-lab/' ) ); ?>" class="rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-bold text-primary shadow-sm transition hover:border-primary/40 hover:bg-primary/5">Bitwig Lab</a>
            <?php endif; ?>
        </span>
        <?php if ( $vcv_offer_active ) : ?>
            <a href="<?php echo esc_url( $vcv_offer_url ); ?>" class="inline-flex items-center gap-2 rounded-full bg-primary px-3 py-1 text-xs font-bold text-white shadow-sm transition hover:bg-primary/90">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/>
                </svg>
                <span><strong>Precio fundador:</strong> Patch Lab 01 a 35€ hasta el 20 de agosto · después 45€</span>
            </a>
        <?php endif; ?>
        <?php if ( ! $vcv_offer_active ) : ?>
            <button type="button" id="labs-banner-close" aria-label="<?php esc_attr_e( 'Cerrar aviso', 'animatek' ); ?>" class="absolute right-3 top-1/2 -translate-y-1/2 rounded-full p-1.5 text-slate-400 transition hover:bg-slate-200 hover:text-slate-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true">
                    <path d="M6 6l12 12M18 6 6 18"/>
                </svg>
            </button>
        <?php endif; ?>
    </div>
</div>
<script>
(function () {
    var banner = document.getElementById('labs-banner');
    if (!banner) { return; }
    var close = document.getElementById('labs-banner-close');
    // Durante la oferta el aviso es fijo: no hay botón de cerrar, así que
    // siempre se muestra. Fuera de oferta se puede cerrar (se recuerda en localStorage).
    if (close) {
        var KEY = 'animatek-labs-banner';
        try {
            if (localStorage.getItem(KEY) === 'closed') { return; }
        } catch (e) {}
        close.addEventListener('click', function () {
            banner.remove();
            try { localStorage.setItem(KEY, 'closed'); } catch (e) {}
        });
    }
    banner.classList.remove('hidden');
})();
</script>
