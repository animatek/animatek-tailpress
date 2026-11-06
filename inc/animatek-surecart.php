<?php
/**
 * Estilos de SureCart con los colores de Animatek, para la tienda (page-tienda.php) y las
 * fichas (single-sc_product.php). SureCart pinta su tema claro sobre el fondo oscuro del
 * sitio; todo va acotado a .animatek-tienda para no tocar el checkout ni el carrito.
 *
 * Las tarjetas tienen alto fijo: la imagen a 4:3 y el título a dos líneas, para que un
 * nombre largo no descuadre la fila. Sin imagen, un degradado azul en vez de un hueco.
 *
 * @package Animatek
 */

function animatek_surecart_estilos(): void {
    ?>
<style>
.animatek-tienda { color: #cbd5e1; }
.animatek-tienda .wp-block-surecart-product-page { max-width: none; margin: 0; }
.animatek-tienda .wp-block-columns.alignwide { gap: 3rem; align-items: flex-start !important; margin-bottom: 0; }
.animatek-tienda .wp-block-surecart-product-media,
.animatek-tienda .wp-block-surecart-product-media img,
.animatek-tienda .sc-image-slider img {
    border-radius: 1rem; overflow: hidden; margin: 0;
}
.animatek-tienda .wp-block-surecart-product-media img { width: 100%; height: auto; display: block; background: #1e293b; }
.animatek-tienda .wp-block-surecart-product-title,
.animatek-tienda h1, .animatek-tienda h2, .animatek-tienda h3 {
    color: #f8fafc !important; font-weight: 800; letter-spacing: -0.01em; line-height: 1.15;
}
.animatek-tienda .wp-block-surecart-product-selected-price-amount { color: #f8fafc; font-weight: 700; }
.animatek-tienda .wp-block-surecart-product-description,
.animatek-tienda .wp-block-surecart-product-description * { color: #cbd5e1 !important; line-height: 1.65; }
.animatek-tienda label, .animatek-tienda .wp-block-surecart-product-quantity { color: #94a3b8 !important; }
.animatek-tienda .wp-block-surecart-product-quantity input,
.animatek-tienda .wp-block-surecart-product-quantity button,
.animatek-tienda .sc-input-group, .animatek-tienda .sc-input-group * {
    background: #1e293b !important; color: #f8fafc !important; border-color: #334155 !important;
}
.animatek-tienda .sc-button__link, .animatek-tienda .wp-block-button__link {
    border-radius: 9999px !important; font-weight: 700 !important; transition: background .15s, border-color .15s;
}
/* El primero (Añadir al carrito) relleno con el azul de la marca; Comprar ya, contorno */
.animatek-tienda .wp-block-surecart-product-buy-buttons .wp-block-button:first-child .sc-button__link,
.animatek-tienda .wp-block-surecart-product-buy-buttons .wp-block-button:first-child .wp-block-button__link {
    background: #2C7FFF !important; color: #fff !important; border: 1px solid #2C7FFF !important;
}
.animatek-tienda .wp-block-surecart-product-buy-buttons .wp-block-button:first-child .sc-button__link:hover {
    background: #1f6ae0 !important;
}
.animatek-tienda .wp-block-surecart-product-buy-buttons .wp-block-button:not(:first-child) .sc-button__link,
.animatek-tienda .wp-block-surecart-product-buy-buttons .wp-block-button:not(:first-child) .wp-block-button__link {
    background: transparent !important; color: #f8fafc !important; border: 1px solid #475569 !important;
}
.animatek-tienda .wp-block-surecart-product-buy-buttons .wp-block-button:not(:first-child) .sc-button__link:hover {
    border-color: #2C7FFF !important;
}
/* Sin foto en el producto SureCart pone un marcador gris enorme: en su lugar, un recuadro oscuro */
.animatek-tienda .wp-block-column:has(> .wp-block-surecart-product-media img[src*="images/placeholder"]) > * {
    display: none !important;
}
.animatek-tienda .wp-block-column:has(> .wp-block-surecart-product-media img[src*="images/placeholder"]) {
    aspect-ratio: 4 / 3; border-radius: 1rem; border: 1px solid #334155;
    background: radial-gradient(circle at 30% 20%, rgba(44,127,255,.35), transparent 60%),
                linear-gradient(135deg, #1e3a8a 0%, #0f172a 100%);
}
@media (max-width: 781px) {
    .animatek-tienda .wp-block-columns.alignwide { gap: 1.5rem; }
}
/* ---- Tarjetas de producto: la tienda y "You may also like" ---- */
.animatek-tienda .wp-block-surecart-product-list-related { margin-top: 4rem; }
.animatek-tienda .wp-block-surecart-product-template { align-items: stretch; }
.animatek-tienda .sc-product-item,
.animatek-tienda .sc-product-item > form,
.animatek-tienda .sc-product-item-link { height: 100%; }
.animatek-tienda .sc-product-item-link { display: flex; flex-direction: column; text-decoration: none !important; }
.animatek-tienda .sc-product-item-link > .wp-block-group {
    flex: 1; display: flex; flex-direction: column;
    background: #1e293b !important; border: 1px solid #334155 !important; border-radius: 1rem !important;
    overflow: hidden; transition: border-color .15s, transform .15s;
}
.animatek-tienda .sc-product-item-link:hover > .wp-block-group { border-color: #2C7FFF !important; transform: translateY(-2px); }
.animatek-tienda .sc-product-item-link > .wp-block-group > .wp-block-group { background: transparent !important; border-radius: 0 !important; }
/* Mismo alto para todas: la imagen a 4:3 fija y el título a dos líneas */
.animatek-tienda .sc-product-item .wp-block-cover {
    aspect-ratio: 4 / 3 !important; min-height: 0 !important; height: auto !important;
    border-radius: 0 !important; margin: 0 !important;
}
.animatek-tienda .sc-product-item .wp-block-cover:not(:has(img)) {
    background: radial-gradient(circle at 30% 20%, rgba(44,127,255,.35), transparent 60%),
                linear-gradient(135deg, #1e3a8a 0%, #0f172a 100%);
}
.animatek-tienda .sc-product-item .wp-block-surecart-product-title {
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
    min-height: 2.6em; line-height: 1.3; font-size: 1rem !important; color: #f8fafc !important;
}
.animatek-tienda .sc-product-item .wp-block-surecart-product-list-price,
.animatek-tienda .sc-product-item .wp-block-surecart-product-list-price * { color: #94a3b8 !important; font-weight: 600; }
.animatek-tienda .sc-product-item .wp-block-surecart-product-collection-tags,
.animatek-tienda .sc-product-item .wp-block-surecart-product-collection-tags * { color: #64748b !important; }
/* Lo de debajo de la imagen, con aire y pegado arriba */
.animatek-tienda .sc-product-item-link > .wp-block-group > :not(.wp-block-group:first-child) { padding-inline: 1rem; }
.animatek-tienda .sc-product-item-link > .wp-block-group > :last-child { padding-bottom: 1rem; }
.animatek-tienda .wp-block-surecart-product-list-related button {
    color: #f8fafc !important; border-color: #475569 !important; background: transparent !important;
}
/* ---- Página de la tienda: filtros y buscador ---- */
.animatek-tienda .wp-block-surecart-product-list-search { margin-bottom: 1.5rem !important; }
.animatek-tienda .wp-block-surecart-product-list-filter-checkboxes-label,
.animatek-tienda .wp-block-surecart-product-list-sort-radio-group-label { color: #f8fafc !important; }
.animatek-tienda input[type="search"], .animatek-tienda input[type="text"] {
    background: #1e293b !important; color: #f8fafc !important; border-color: #334155 !important;
}
</style>
    <?php
}
