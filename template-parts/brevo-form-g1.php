<?php
/**
 * Lista de correo «Nord Modular» (lista 23 de Brevo) para las páginas de G1-Emu y
 * Animatek NME. Es el formulario de Brevo de esa lista, con el mismo mecanismo
 * (su main.js valida y envía) pero con el aspecto del tema.
 *
 * Los avisos de éxito y error de Brevo se dejan como vienen: se muestran con
 * `.sib-form-message-panel--active`, así que aquí no se fuerza ningún `display`.
 *
 * @var array $args {
 *     @type string $locale  'es' (por defecto) o 'en'. Solo cambia los textos de la página:
 *                           el envío va siempre al mismo formulario de Brevo, que es el español,
 *                           así que los errores que devuelva su servidor salen en español.
 *     @type bool   $compact Sin márgenes de sección y con la tarjeta en una columna: para
 *                           colocarlo dentro de la columna del hero.
 * }
 */
$args = wp_parse_args(is_array($args ?? null) ? $args : [], ['locale' => 'es', 'compact' => false]);
$compact = (bool) $args['compact'];
$en   = 'en' === $args['locale'];
$t    = $en ? [
    'titulo'  => 'Interested in the Nord Modular G1?',
    'texto'   => 'A mailing list just for the G1: news about Animatek NME and G1-Emu, new releases and videos. Unsubscribe with one click.',
    'boton'   => 'SIGN ME UP',
    'email'   => 'Your email',
    'error'   => 'We could not confirm your subscription. Please try again.',
    'exito'   => 'Done! You are on the G1 list.',
    'invalid' => 'That email does not look valid. Check the format (e.g. name@mail.com).',
    'vacio'   => 'Enter your email.',
    'pais'    => 'Choose a country code',
    'lista'   => ['{quantity} list selected', '{quantity} lists selected', '{quantity} selected', '{quantity} selected'],
] : [
    'titulo'  => '¿Te interesa el Nord Modular G1?',
    'texto'   => 'Una lista de correo solo del G1: novedades de Animatek NME y G1-Emu, versiones nuevas y vídeos. Te das de baja con un clic.',
    'boton'   => 'APUNTARME',
    'email'   => 'Tu email',
    'error'   => 'No hemos podido validar tu suscripción. Inténtalo de nuevo.',
    'exito'   => '¡Listo! Ya estás en la lista del G1.',
    'invalid' => 'Ese email no parece válido. Revisa el formato (ej.: nombre@correo.com).',
    'vacio'   => 'Escribe tu email.',
    'pais'    => 'Elige un código de país',
    'lista'   => ['{quantity} lista seleccionada', '{quantity} listas seleccionadas', '{quantity} seleccionado', '{quantity} seleccionados'],
];
?>
<<?php echo $compact ? 'div' : 'section'; ?> class="g1-lista<?php echo $compact ? ' g1-lista--compact' : ' mx-auto max-w-7xl px-6 py-16 sm:px-10'; ?>" aria-labelledby="g1-lista-titulo">
    <style>
        .g1-lista__caja {
            display: grid;
            gap: 1.5rem 3rem;
            align-items: center;
            padding: 2rem;
            border: 1px solid #d4d4d8;
            border-radius: 0.5rem;
            background: #fff;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }
        @media (min-width: 1024px) {
            .g1-lista__caja { grid-template-columns: 1fr 1fr; }
        }
        .g1-lista__caja h2 { margin: 0; font-size: 1.5rem; font-weight: 900; line-height: 1.2; }
        .g1-lista__caja p { margin: 0.75rem 0 0; font-size: 1.0625rem; line-height: 1.6; color: #3f3f46; }
        .g1-lista .sib-form-container,
        .g1-lista .sib-input,
        .g1-lista .sib-form-block,
        .g1-lista .form__entry { width: 100%; max-width: none; margin: 0; padding: 0; box-sizing: border-box; }
        .g1-lista .form__label-row,
        .g1-lista .entry__field { display: block; width: 100%; margin: 0; padding: 0; border: 0; background: none; box-shadow: none; }
        .g1-lista__fila .form__label-row { flex: 1 1 14rem; }
        .g1-lista__fila input[type="text"] { box-sizing: border-box; width: 100%; min-width: 0; }
        .g1-lista--compact .g1-lista__caja { grid-template-columns: 1fr; gap: 1rem; padding: 1.25rem 1.5rem; }
        .g1-lista--compact .g1-lista__caja h2 { font-size: 1.25rem; }
        .g1-lista--compact .g1-lista__caja p { margin-top: 0.5rem; font-size: 1rem; }
        .g1-lista__fila { display: flex; flex-wrap: wrap; gap: 0.75rem; }
        .g1-lista__fila input[type="text"] {
            min-height: 3rem;
            padding: 0.5rem 1rem;
            font: inherit;
            font-size: 1.0625rem;
            color: #18181b;
            background: #fff;
            border: 1px solid #a1a1aa;
            border-radius: 9999px;
        }
        .g1-lista__fila input[type="text"]:focus-visible { outline: 2px solid #2C7FFF; outline-offset: 2px; }
        .g1-lista__fila button {
            min-height: 3rem;
            padding: 0.5rem 1.5rem;
            font: inherit;
            font-size: 0.9375rem;
            font-weight: 800;
            color: #fff;
            background: #2C7FFF;
            border: 0;
            border-radius: 9999px;
            cursor: pointer;
            transition: transform 0.15s;
        }
        .g1-lista__fila button:hover { transform: translateY(-2px); }
        .g1-lista__fila button:focus-visible { outline: 2px solid #2C7FFF; outline-offset: 4px; }
        .g1-lista__fila button svg { display: none; width: 1rem; height: 1rem; margin-right: 0.5rem; fill: currentColor; vertical-align: -2px; }
        .g1-lista__fila button svg.sib-hide-loader-icon { display: none; }
        .g1-lista .entry__error { display: none; margin-top: 0.75rem; padding: 0.5rem 0.75rem; font-size: 1rem; color: #661d1d; background: #ffeded; border: 1px solid #ff4949; border-radius: 0.375rem; }
        .g1-lista .entry__error:not(:empty) { display: block; }
        .g1-lista .sib-form-message-panel { margin: 1rem 0 0; padding: 0.25rem; font-size: 1.0625rem; border-radius: 0.375rem; }
        .g1-lista #success-message { color: #085229; background: #e7faf0; border-color: #13ce66; }
        .g1-lista #error-message { color: #661d1d; background: #ffeded; border-color: #ff4949; }

        [data-theme="dark"] .g1-lista__caja { background: #18181b; border-color: #3f3f46; box-shadow: none; }
        [data-theme="dark"] .g1-lista__caja p { color: #d4d4d8; }
        [data-theme="dark"] .g1-lista__fila input[type="text"] { color: #f4f4f5; background: #09090b; border-color: #52525b; }
        [data-theme="dark"] .g1-lista__fila input::placeholder { color: #a1a1aa; }
        [data-theme="dark"] .g1-lista #success-message { color: #bbf7d0; background: rgba(19, 206, 102, 0.12); }
        [data-theme="dark"] .g1-lista #error-message,
        [data-theme="dark"] .g1-lista .entry__error { color: #fecaca; background: rgba(255, 73, 73, 0.12); }
    </style>
    <link rel="stylesheet" href="https://sibforms.com/forms/end-form/build/sib-styles.css">

    <div class="g1-lista__caja">
        <div>
            <h2 id="g1-lista-titulo"><?php echo esc_html($t['titulo']); ?></h2>
            <p><?php echo esc_html($t['texto']); ?></p>
        </div>

        <div id="sib-form-container" class="sib-form-container">
            <form id="sib-form" method="POST" action="https://a2fe0a0a.sibforms.com/serve/MUIFAFEvL7DZe-vJ_T9d4MEWhCI552IxIu_-KuROMmiFmuUELi7xTM0mrAzhYOWY4TaljEqOx4KQSeWfYjYaya16AI3t5F54zwwxkqmdgIB4BYtIfAeHVjp0BrnmvoWnqzc24N71TI0WiK8Oek7Y4NIyKzHGKwjlSineNvw68IotCHnhKIB0LLmFZn5AusPRvFIAdLbpLCjqNZ-A" data-type="subscription">
                <div class="sib-input sib-form-block">
                    <div class="form__entry entry_block">
                        <div class="g1-lista__fila">
                            <div class="form__label-row">
                                <div class="entry__field">
                                    <input class="input" type="text" id="EMAIL" name="EMAIL" autocomplete="email" inputmode="email" placeholder="<?php echo esc_attr($t['email']); ?>" aria-label="<?php echo esc_attr($t['email']); ?>" data-required="true" required />
                                </div>
                            </div>
                            <button class="sib-form-block__button sib-form-block__button-with-loader" form="sib-form" type="submit">
                                <svg class="icon clickable__icon progress-indicator__icon sib-hide-loader-icon" viewBox="0 0 512 512" aria-hidden="true">
                                    <path d="M460.116 373.846l-20.823-12.022c-5.541-3.199-7.54-10.159-4.663-15.874 30.137-59.886 28.343-131.652-5.386-189.946-33.641-58.394-94.896-95.833-161.827-99.676C261.028 55.961 256 50.751 256 44.352V20.309c0-6.904 5.808-12.337 12.703-11.982 83.556 4.306 160.163 50.864 202.11 123.677 42.063 72.696 44.079 162.316 6.031 236.832-3.14 6.148-10.75 8.461-16.728 5.01z" />
                                </svg>
                                <?php echo esc_html($t['boton']); ?>
                            </button>
                        </div>
                        <label class="entry__error entry__error--primary" for="EMAIL"></label>
                    </div>
                </div>

                <div id="error-message" class="sib-form-message-panel" role="alert">
                    <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
                        <span class="sib-form-message-panel__inner-text"><?php echo esc_html($t['error']); ?></span>
                    </div>
                </div>
                <div id="success-message" class="sib-form-message-panel" role="status">
                    <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
                        <span class="sib-form-message-panel__inner-text"><?php echo esc_html($t['exito']); ?></span>
                    </div>
                </div>

                <input type="text" name="email_address_check" value="" class="input--hidden">
                <input type="hidden" name="locale" value="es">
                <input type="hidden" name="html_type" value="simple">
            </form>
        </div>
    </div>

    <script>
        window.REQUIRED_CODE_ERROR_MESSAGE = <?php echo wp_json_encode($t['pais']); ?>;
        window.LOCALE = <?php echo wp_json_encode($en ? 'en' : 'es'); ?>;
        window.EMAIL_INVALID_MESSAGE = window.SMS_INVALID_MESSAGE = <?php echo wp_json_encode($t['invalid']); ?>;
        window.REQUIRED_ERROR_MESSAGE = <?php echo wp_json_encode($t['vacio']); ?>;
        window.GENERIC_INVALID_MESSAGE = <?php echo wp_json_encode($t['invalid']); ?>;
        window.translation = {
            common: {
                selectedList: <?php echo wp_json_encode($t['lista'][0]); ?>,
                selectedLists: <?php echo wp_json_encode($t['lista'][1]); ?>,
                selectedOption: <?php echo wp_json_encode($t['lista'][2]); ?>,
                selectedOptions: <?php echo wp_json_encode($t['lista'][3]); ?>,
            }
        };
        var AUTOHIDE = Boolean(0);
    </script>
    <script defer src="https://sibforms.com/forms/end-form/build/main.js"></script>
</<?php echo $compact ? 'div' : 'section'; ?>>
