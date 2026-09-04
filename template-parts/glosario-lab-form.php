<?php
/**
 * Formulario del Lab que acompana al listado del glosario.
 *
 * Va en la columna de la izquierda, pegado al scroll, y desaparece en cuanto el
 * visitante deja el email: guarda la misma clave que el locker del Lab, asi que
 * quien se apunta aqui llega a /vcvrack-lab/ con la guia ya desbloqueada.
 *
 * No reutiliza `template-parts/brevo-locker.php` a proposito: aquel es una puerta
 * que tapa un `#locked-content`, y aqui no hay nada que tapar. Comparten el mismo
 * formulario de Brevo via `animatek_vcv_lab_form_action()`.
 *
 * Los ids `sib-form`, `sib-container`, `success-message` y `error-message` son los
 * que busca el script de Brevo; son unicos por pagina, y el glosario no tiene otro
 * formulario suyo.
 */

$action      = animatek_vcv_lab_form_action();
$storage_key = animatek_vcv_lab_storage_key();
?>
<div id="glosario-lab-form" class="glosario-lab-form rounded-2xl border border-slate-800 bg-slate-900/60 p-5">

    <p class="text-[11px] font-bold tracking-[0.18em] uppercase text-primary mb-2">VCV Rack Lab</p>

    <p class="glosario-lab-form-title text-base font-extrabold text-white leading-snug mb-2">
        Saber qué significa está bien. Saber usarlo está mejor.
    </p>

    <?php // En movil el bloque va encima de las tarjetas: sin este parrafo entra el
          // formulario entero sin empujar el glosario una pantalla hacia abajo. ?>
    <p class="glosario-lab-form-text hidden lg:block text-sm text-slate-400 leading-relaxed mb-4">
        Deja tu email y te abro la guía gratuita donde estos términos se convierten en parches que suenan.
    </p>

    <link rel="stylesheet" href="https://sibforms.com/forms/end-form/build/sib-styles.css">

    <div class="sib-form">
        <div id="sib-form-container" class="sib-form-container">

            <div id="error-message" class="sib-form-message-panel">
                <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
                    <span class="sib-form-message-panel__inner-text">No hemos podido validar tu suscripción.</span>
                </div>
            </div>

            <div id="success-message" class="sib-form-message-panel">
                <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
                    <span class="sib-form-message-panel__inner-text">Listo. Ya tienes el Lab abierto.</span>
                </div>
            </div>

            <div id="sib-container" class="sib-container--large sib-container--vertical">
                <form id="sib-form" method="POST" action="<?php echo esc_url( $action ); ?>" data-type="subscription">
                    <div class="sib-input sib-form-block">
                        <div class="form__entry entry_block">
                            <div class="form__label-row">
                                <label class="entry__label" for="EMAIL">Tu email</label>
                                <div class="entry__field">
                                    <input class="input" type="text" id="EMAIL" name="EMAIL" autocomplete="email"
                                        placeholder="tu@email.com" data-required="true" required />
                                </div>
                            </div>
                            <label class="entry__error entry__error--primary"></label>
                        </div>
                    </div>
                    <div class="sib-form-block">
                        <button class="sib-form-block__button sib-form-block__button-with-loader" form="sib-form"
                            type="submit">
                            <?php // El SVG no es decoracion: al enviar, el script de Brevo hace
                                  // `boton.querySelector("svg").removeClass(...)` sin comprobar si
                                  // existe. Sin el, el clic peta antes de mandar nada. ?>
                            <svg class="icon clickable__icon progress-indicator__icon sib-hide-loader-icon"
                                viewBox="0 0 512 512" aria-hidden="true">
                                <path d="M460.116 373.846l-20.823-12.022c-5.541-3.199-7.54-10.159-4.663-15.874 30.137-59.886 28.343-131.652-5.386-189.946-33.641-58.394-94.896-95.833-161.827-99.676C261.028 55.961 256 50.751 256 44.352V20.309c0-6.904 5.808-12.337 12.703-11.982 83.556 4.306 160.163 50.864 202.11 123.677 42.063 72.696 44.079 162.316 6.031 236.832-3.14 6.148-10.75 8.461-16.728 5.01z" />
                            </svg>
                            Entrar gratis en el Lab
                        </button>
                    </div>
                    <input type="text" name="email_address_check" value="" class="input--hidden">
                    <input type="hidden" name="locale" value="es">
                </form>
            </div>
        </div>
    </div>

    <p class="glosario-lab-form-nota text-[11px] text-slate-500 mt-3 leading-relaxed">
        Solo trucos de VCV Rack. Nada de spam, y te borras cuando quieras.
    </p>
</div>

<style>
    /* La caja de Brevo viene blanca y con 540px clavados en el HTML: hay que
       desmontarla a golpe de !important para que quepa en la columna y sea oscura.
       Misma receta que en `page-curso-bitwig-studio.php`. */
    .glosario-lab-form .sib-form {
        padding: 0 !important;
        background-color: transparent !important;
    }

    .glosario-lab-form .sib-form-container {
        max-width: 100% !important;
        width: 100% !important;
        display: block !important;
    }

    .glosario-lab-form #sib-container {
        max-width: 100% !important;
        padding: 0 !important;
        background-color: transparent !important;
        border: 0 !important;
        text-align: left !important;
    }

    .glosario-lab-form .entry__label {
        font-family: inherit !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        color: #94a3b8 !important;
        margin-bottom: 4px !important;
    }

    .glosario-lab-form .entry__field {
        background-color: rgba(2, 6, 23, 0.6) !important;
        border-color: rgba(148, 163, 184, 0.3) !important;
        border-radius: 10px !important;
    }

    .glosario-lab-form .entry__field:focus-within {
        border-color: #2C7FFF !important;
    }

    .glosario-lab-form #sib-container input {
        font-family: inherit !important;
        background-color: transparent !important;
        color: #f8fafc !important;
        padding: 10px 12px !important;
    }

    .glosario-lab-form #sib-container input::placeholder {
        font-family: inherit !important;
        color: #64748b !important;
    }

    .glosario-lab-form .sib-form-block {
        padding: 0 !important;
    }

    .glosario-lab-form .sib-input {
        padding-bottom: 10px !important;
    }

    .glosario-lab-form .sib-form-block__button {
        font-family: inherit !important;
        font-size: 14px !important;
        font-weight: 700 !important;
        width: 100% !important;
        justify-content: center !important;
        padding: 11px 14px !important;
        border-radius: 10px !important;
        background-color: #2C7FFF !important;
        color: #ffffff !important;
    }

    .glosario-lab-form .sib-form-block__button:hover {
        background-color: #1f6ce0 !important;
    }

    .glosario-lab-form .sib-form-block__button .progress-indicator__icon {
        fill: #ffffff !important;
        height: 1rem !important;
        width: 1rem !important;
        margin-right: 8px !important;
    }

    /* Los paneles de Brevo traen sus colores clavados; aqui solo hace falta que el
       de error se lea sobre oscuro. El de exito no llega a verse: en cuanto salta,
       el bloque entero desaparece. */
    .glosario-lab-form .sib-form-message-panel {
        font-family: inherit !important;
        font-size: 13px !important;
        max-width: 100% !important;
        margin-bottom: 10px !important;
        border-radius: 10px !important;
    }

    .glosario-lab-form .entry__error {
        font-family: inherit !important;
        font-size: 12px !important;
        border-radius: 8px !important;
    }

    /* Modo claro del glosario. */
    .glosario-light #glosario-lab-form {
        background-color: #ffffff;
        border-color: #e2e8f0;
    }

    .glosario-light .glosario-lab-form-title {
        color: #0f172a;
    }

    .glosario-light .glosario-lab-form-text {
        color: #475569;
    }

    .glosario-light .glosario-lab-form-nota {
        color: #94a3b8;
    }

    .glosario-light .glosario-lab-form .entry__label {
        color: #475569 !important;
    }

    .glosario-light .glosario-lab-form .entry__field {
        background-color: #ffffff !important;
        border-color: #cbd5e1 !important;
    }

    .glosario-light .glosario-lab-form #sib-container input {
        color: #0f172a !important;
    }
</style>

<script>
    window.REQUIRED_CODE_ERROR_MESSAGE = 'Elija un código de país';
    window.LOCALE = 'es';
    window.EMAIL_INVALID_MESSAGE = window.SMS_INVALID_MESSAGE = "La información que ha proporcionado no es válida.";
    window.REQUIRED_ERROR_MESSAGE = "Este campo no puede quedarse vacío.";
    window.GENERIC_INVALID_MESSAGE = "La información que ha proporcionado no es válida.";
    window.translation = {
        common: {
            selectedList: '{quantity} lista seleccionada',
            selectedLists: '{quantity} listas seleccionadas',
            selectedOption: '{quantity} seleccionado',
            selectedOptions: '{quantity} seleccionados',
        }
    };
    var AUTOHIDE = Boolean(0);
</script>
<script defer src="https://sibforms.com/forms/end-form/build/main.js"></script>
<script>
    (function () {
        var STORAGE_KEY = <?php echo wp_json_encode( $storage_key ); ?>;
        var aside = document.getElementById('glosario-lab-aside');
        var success = document.getElementById('success-message');

        // Se lee aqui mismo, no en DOMContentLoaded: el bloque ya esta en el DOM y
        // asi el que ya esta apuntado no llega a verlo parpadear.
        function esconder() {
            if (aside) aside.remove();
        }

        try {
            if (localStorage.getItem(STORAGE_KEY) === 'true') {
                esconder();
                return;
            }
        } catch (e) {
            // Navegador con el almacenamiento capado: se deja el formulario a la vista.
        }

        // Brevo no avisa de nada: solo destapa su panel de exito. Se vigila ese cambio.
        if (!success) return;
        var observer = new MutationObserver(function () {
            if (success.offsetParent === null) return;
            try {
                localStorage.setItem(STORAGE_KEY, 'true');
            } catch (e) { }
            observer.disconnect();
            setTimeout(esconder, 1200);
        });
        observer.observe(success, { attributes: true, attributeFilter: ['style', 'class'] });
    })();
</script>
