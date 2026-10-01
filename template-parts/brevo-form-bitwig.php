<?php
/**
 * Formulario de Brevo de la lista de Bitwig, el mismo que el de interesados del
 * curso de Bitwig (page-curso-bitwig-studio.php). Lo usa la lista de espera del
 * taller: quien se apunta cae en la lista de Bitwig y se le avisa desde ahí.
 *
 * @var array $args {
 *     @type string $etiqueta  Texto sobre el campo de email.
 *     @type string $boton     Texto del botón.
 * }
 */
$args = wp_parse_args(is_array($args ?? null) ? $args : [], [
    'etiqueta' => 'Tu email',
    'boton'    => 'APUNTARME',
]);
?>
            <!-- Begin Brevo Form -->
            <style>
                @font-face {
                    font-display: block;
                    font-family: Roboto;
                    src: url(https://assets.brevo.com/font/Roboto/Latin/normal/normal/7529907e9eaf8ebb5220c5f9850e3811.woff2) format("woff2"), url(https://assets.brevo.com/font/Roboto/Latin/normal/normal/25c678feafdc175a70922a116c9be3e7.woff) format("woff");
                }

                @font-face {
                    font-display: fallback;
                    font-family: Roboto;
                    font-weight: 600;
                    src: url(https://assets.brevo.com/font/Roboto/Latin/medium/normal/6e9caeeafb1f3491be3e32744bc30440.woff2) format("woff2"), url(https://assets.brevo.com/font/Roboto/Latin/medium/normal/71501f0d8d5aa95960f6475d5487d4c2.woff) format("woff");
                }

                @font-face {
                    font-display: fallback;
                    font-family: Roboto;
                    font-weight: 700;
                    src: url(https://assets.brevo.com/font/Roboto/Latin/bold/normal/3ef7cf158f310cf752d5ad08cd0e7e60.woff2) format("woff2"), url(https://assets.brevo.com/font/Roboto/Latin/bold/normal/ece3a1d82f18b60bcce0211725c476aa.woff) format("woff");
                }

                #sib-container input:-ms-input-placeholder {
                    text-align: left;
                    font-family: Helvetica, sans-serif;
                    color: #c0ccda;
                }

                #sib-container input::placeholder {
                    text-align: left;
                    font-family: Helvetica, sans-serif;
                    color: #c0ccda;
                }

                #sib-container a {
                    text-decoration: underline;
                    color: #2BB2FC;
                }

                .sib-form-message-panel {
                    display: none;
                }

                .bitwig-interest-form .sib-form {
                    border-radius: 1rem;
                }

                .bitwig-interest-form #sib-container {
                    max-width: 100% !important;
                }

                .dark .bitwig-interest-form .sib-form,
                [data-theme="dark"] .bitwig-interest-form .sib-form {
                    background-color: transparent !important;
                }

                .dark .bitwig-interest-form #sib-container,
                [data-theme="dark"] .bitwig-interest-form #sib-container {
                    background-color: rgba(15, 23, 42, 0.72) !important;
                    border-color: rgba(255, 255, 255, 0.12) !important;
                    color: #e2e8f0 !important;
                }

                .dark .bitwig-interest-form #sib-container .entry__label,
                .dark .bitwig-interest-form #sib-container .entry__specification,
                .dark .bitwig-interest-form #sib-container .form__label-row,
                [data-theme="dark"] .bitwig-interest-form #sib-container .entry__label,
                [data-theme="dark"] .bitwig-interest-form #sib-container .entry__specification,
                [data-theme="dark"] .bitwig-interest-form #sib-container .form__label-row {
                    color: #e2e8f0 !important;
                }

                .dark .bitwig-interest-form #sib-container .entry__field,
                [data-theme="dark"] .bitwig-interest-form #sib-container .entry__field {
                    background-color: rgba(2, 6, 23, 0.55) !important;
                    border-color: rgba(148, 163, 184, 0.35) !important;
                }

                .dark .bitwig-interest-form #sib-container input,
                [data-theme="dark"] .bitwig-interest-form #sib-container input {
                    background-color: transparent !important;
                    color: #f8fafc !important;
                }

                .dark .bitwig-interest-form #sib-container input::placeholder,
                [data-theme="dark"] .bitwig-interest-form #sib-container input::placeholder {
                    color: #94a3b8 !important;
                }
            </style>
            <link rel="stylesheet" href="https://sibforms.com/forms/end-form/build/sib-styles.css">

            <div class="bitwig-interest-form">
            <div class="sib-form" style="text-align: center; background-color: #EFF2F7;">
                <div id="sib-form-container" class="sib-form-container">
                    <div id="error-message" class="sib-form-message-panel" style="font-size:16px; text-align:left; font-family:Helvetica, sans-serif; color:#661d1d; background-color:#ffeded; border-radius:3px; border-color:#ff4949;max-width:540px;">
                        <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
                            <span class="sib-form-message-panel__inner-text">No hemos podido validar su suscripción.</span>
                        </div>
                    </div>

                    <div id="success-message" class="sib-form-message-panel" style="font-size:16px; text-align:left; font-family:Helvetica, sans-serif; color:#085229; background-color:#e7faf0; border-radius:3px; border-color:#13ce66;max-width:540px;">
                        <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
                            <span class="sib-form-message-panel__inner-text">Se ha realizado su suscripción.</span>
                        </div>
                    </div>

                    <div id="sib-container" class="sib-container--large sib-container--vertical" style="text-align:center; background-color:rgba(255,255,255,1); max-width:540px; border-radius:3px; border-width:1px; border-color:#C0CCD9; border-style:solid;">
                        <form id="sib-form" method="POST" action="https://a2fe0a0a.sibforms.com/serve/MUIFAOTAu3dD3XV99X__NrZf0gPI98ZRU8rLYa3QKa89c6CXoInqc3veK76j9vosdVQeqTFu4oBT-mFrhe_AT_BS-l3e-xJV_5_emKFnc2qhqE5AHQH8B1cRDW7ZTyzcCFso2CL1SxiJI8IknkP39P9Y0L8zAPtFjXrdbJaYyckOWj9kzJ6Hu3xx8CWfSiIF0QuJkLXL-dmVwsLQ" data-type="subscription">
                            <div style="padding: 8px 0;">
                                <div class="sib-input sib-form-block">
                                    <div class="form__entry entry_block">
                                        <div class="form__label-row ">
                                            <label class="entry__label" style="font-weight: 700; text-align:left; font-size:16px; font-family:Helvetica, sans-serif; color:#3c4858;" for="EMAIL" data-required="*"><?php echo esc_html($args['etiqueta']); ?></label>

                                            <div class="entry__field">
                                                <input class="input " type="text" id="EMAIL" name="EMAIL" autocomplete="off" placeholder="EMAIL" data-required="true" required />
                                            </div>
                                        </div>

                                        <label class="entry__error entry__error--primary" style="font-size:16px; text-align:left; font-family:Helvetica, sans-serif; color:#661d1d; background-color:#ffeded; border-radius:3px; border-color:#ff4949;"></label>
                                        <label class="entry__specification" style="font-size:12px; text-align:left; font-family:Helvetica, sans-serif; color:#8390A4; text-align:left">
                                            Introduce tu dirección de e-mail para suscribirte. Ej.: abc@xyz.com
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div style="padding: 8px 0;">
                                <div class="sib-form-block" style="text-align: left">
                                    <button class="sib-form-block__button sib-form-block__button-with-loader" style="font-size:16px; text-align:left; font-weight:700; font-family:Helvetica, sans-serif; color:#FFFFFF; background-color:#3E4857; border-radius:3px; border-width:0px;" form="sib-form" type="submit">
                                        <svg class="icon clickable__icon progress-indicator__icon sib-hide-loader-icon" viewBox="0 0 512 512" style="">
                                            <path d="M460.116 373.846l-20.823-12.022c-5.541-3.199-7.54-10.159-4.663-15.874 30.137-59.886 28.343-131.652-5.386-189.946-33.641-58.394-94.896-95.833-161.827-99.676C261.028 55.961 256 50.751 256 44.352V20.309c0-6.904 5.808-12.337 12.703-11.982 83.556 4.306 160.163 50.864 202.11 123.677 42.063 72.696 44.079 162.316 6.031 236.832-3.14 6.148-10.75 8.461-16.728 5.01z" />
                                        </svg>
                                        <?php echo esc_html($args['boton']); ?>
                                    </button>
                                </div>
                            </div>
                            <input type="text" name="email_address_check" value="" class="input--hidden">
                            <input type="hidden" name="locale" value="es">
                            <input type="hidden" name="html_type" value="simple">
                        </form>
                    </div>
                </div>
            </div>
            </div>
            <script>
                window.REQUIRED_CODE_ERROR_MESSAGE = 'Elija un código de país';
                window.LOCALE = 'es';
                window.EMAIL_INVALID_MESSAGE = window.SMS_INVALID_MESSAGE = "La información que ha proporcionado no es válida. Compruebe el formato del campo e inténtelo de nuevo.";
                window.REQUIRED_ERROR_MESSAGE = "Este campo no puede quedarse vacío. ";
                window.GENERIC_INVALID_MESSAGE = "La información que ha proporcionado no es válida. Compruebe el formato del campo e inténtelo de nuevo.";
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
            <!-- End Brevo Form -->
