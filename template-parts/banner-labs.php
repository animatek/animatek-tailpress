<?php
// Barra de aviso global de los Labs, justo debajo del header.
//
// Es fija: no se puede cerrar y no lleva JavaScript. Los Labs son la puerta de
// entrada gratuita del sitio, así que dejar que alguien la cierre para siempre
// era esconder la mejor captación que hay. Antes se cerraba y se recordaba en
// localStorage; se quitó el 2026-08-23 (issue #1).
//
// Sin sticky a propósito: el header ya lo es, y dos barras pegadas se pisan y
// comen demasiada pantalla en móvil.
//
// En los propios Labs sale igual, pero contextual: solo se anuncia el otro
// (en el VCV Lab sale el de Bitwig y al revés).
$is_vcv_lab    = is_page( 'vcvrack-lab' );
$is_bitwig_lab = is_page( 'bitwig-lab' );
$in_lab        = $is_vcv_lab || $is_bitwig_lab;
?>
<div id="labs-banner" class="border-b border-slate-200 bg-slate-50 text-slate-700">
    <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-center gap-x-4 gap-y-2 px-6 py-2.5 text-sm sm:px-10">
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
    </div>
</div>
