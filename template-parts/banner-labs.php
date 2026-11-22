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
// (en el VCV Lab salen los otros dos, y así con cada uno).
$is_vcv_lab    = is_page( 'vcvrack-lab' );
$is_bitwig_lab = is_page( 'bitwig-lab' );
$is_fm1_lab    = is_page( 'fm1-lab' );
$in_lab        = $is_vcv_lab || $is_bitwig_lab || $is_fm1_lab;

// Black Friday 2026: del 22 al 30/11 la barra anuncia el pack de VCV Rack en vez de los
// Labs, para quien entra en la web sin estar en la lista. Se apaga sola el 30 a las 23:59.
// La fecha se mira en PHP y también en el navegador, porque LiteSpeed y Cloudflare sirven
// HTML cacheado: sin el script, una página guardada el 30 seguiría anunciando la oferta el 1.
// En la propia ficha del pack no sale (ya está en ella). Se puede borrar a partir del 1/12.
$bf_desde  = new DateTimeImmutable( '2026-11-22 00:00:00', new DateTimeZone( 'Europe/Madrid' ) );
$bf_hasta  = new DateTimeImmutable( '2026-11-30 23:59:59', new DateTimeZone( 'Europe/Madrid' ) );
$bf_ahora  = new DateTimeImmutable( 'now', new DateTimeZone( 'Europe/Madrid' ) );
$bf_url    = home_url( '/products/patch-lab-01-vcv-rack-basico/' );
$bf_activo = $bf_ahora >= $bf_desde && $bf_ahora <= $bf_hasta
    && false === strpos( $_SERVER['REQUEST_URI'] ?? '', '/products/patch-lab-01-vcv-rack-basico' );

if ( $bf_activo ) : ?>
<div id="bf-banner" class="border-b border-slate-200 bg-slate-50 text-slate-700" data-hasta="<?php echo esc_attr( $bf_hasta->getTimestamp() * 1000 ); ?>">
    <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-center gap-x-4 gap-y-2 px-6 py-2.5 text-sm sm:px-10">
        <p class="flex flex-wrap items-center justify-center gap-x-2 font-semibold">
            <strong class="text-amber-600">Black Friday:</strong>
            <span>los dos cursos de VCV Rack por <strong>29 €</strong> <span class="line-through opacity-60">48 €</span></span>
            <span class="text-slate-500">· hasta el lunes 30</span>
        </p>
        <a href="<?php echo esc_url( $bf_url ); ?>" class="rounded-full bg-primary px-3 py-1 text-xs font-bold text-white shadow-sm transition hover:bg-[#1f6ae0]">Ver el pack &rarr;</a>
    </div>
</div>
<?php endif; ?>
<div id="labs-banner" class="border-b border-slate-200 bg-slate-50 text-slate-700"<?php echo $bf_activo ? ' hidden' : ''; ?>>
    <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-center gap-x-4 gap-y-2 px-6 py-2.5 text-sm sm:px-10">
        <p class="flex items-center gap-2 font-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M10 2v6.5L4.5 18A2 2 0 0 0 6.2 21h11.6a2 2 0 0 0 1.7-3L14 8.5V2"/>
                <path d="M8.5 2h7"/>
                <path d="M7 15h10"/>
            </svg>
            <?php if ( $in_lab ) : ?>
                <span><strong>Sigue aprendiendo gratis:</strong> conoce los otros Labs</span>
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
            <?php if ( ! $is_fm1_lab ) : ?>
                <a href="<?php echo esc_url( home_url( '/fm1-lab/' ) ); ?>" class="rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-bold text-primary shadow-sm transition hover:border-primary/40 hover:bg-primary/5">FM-1 Lab</a>
            <?php endif; ?>
        </span>
    </div>
</div>
<?php if ( $bf_activo ) : ?>
<script>
(function () {
    var bf = document.getElementById('bf-banner');
    if (bf && Date.now() > Number(bf.getAttribute('data-hasta'))) {
        bf.remove();
        var labs = document.getElementById('labs-banner');
        if (labs) { labs.hidden = false; }
    }
})();
</script>
<?php endif; ?>
