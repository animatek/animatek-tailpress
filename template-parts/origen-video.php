<?php
/**
 * Guarda de qué vídeo de YouTube viene la visita, para que llegue a Brevo.
 *
 * Las descripciones del canal enlazan al ebook con `?yt=<idDelVideo>` (11
 * caracteres). Este fragmento lo recoge y lo mete en un campo oculto
 * ORIGEN_VIDEO del formulario de Brevo, que es el atributo de contacto donde
 * se guarda. Sin esto el parámetro llega a la landing y se pierde, y no hay
 * forma de saber qué vídeo trae a cada suscriptor.
 *
 * Se persiste en localStorage porque casi nadie se suscribe en el primer
 * pantallazo: la gente llega, mira, navega y vuelve. Si solo se leyera la URL,
 * se perdería el origen de todo el que no rellena el formulario de una sentada.
 *
 * Incluir en cualquier plantilla con formulario de Brevo:
 *   get_template_part('template-parts/origen-video');
 *
 * No añade clases de Tailwind, así que no hace falta reconstruir dist/.
 */
?>
<script>
(function () {
    var CLAVE = 'animatek_origen_video';
    var CAMPO = 'ORIGEN_VIDEO';

    function guardado() {
        try { return window.localStorage.getItem(CLAVE) || ''; } catch (e) { return ''; }
    }

    function guardar(valor) {
        try { window.localStorage.setItem(CLAVE, valor); } catch (e) { /* modo privado */ }
    }

    // Los IDs de YouTube son 11 caracteres de [A-Za-z0-9_-]. Validar evita
    // meter basura en el contacto si alguien manipula la URL.
    function deLaUrl() {
        var v = new URLSearchParams(window.location.search).get('yt');
        return v && /^[A-Za-z0-9_-]{11}$/.test(v) ? v : '';
    }

    var origen = deLaUrl();
    if (origen) {
        guardar(origen);            // la URL manda: es la visita más reciente
    } else {
        origen = guardado();
    }
    if (!origen) return;

    function rellenar() {
        var formularios = document.querySelectorAll('form[data-type="subscription"], #sib-form');
        for (var i = 0; i < formularios.length; i++) {
            var f = formularios[i];
            var campo = f.querySelector('input[name="' + CAMPO + '"]');
            if (!campo) {
                campo = document.createElement('input');
                campo.type = 'hidden';
                campo.name = CAMPO;
                f.appendChild(campo);
            }
            campo.value = origen;
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', rellenar);
    } else {
        rellenar();
    }
    // El locker inyecta su formulario después de cargar la página.
    document.addEventListener('animatek:formulario-listo', rellenar);
})();
</script>
