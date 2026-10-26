<?php
/**
 * Locker de contenido con formulario nativo de Brevo.
 *
 * Renderiza la "puerta" (gate) que oculta el contenido bloqueado
 * hasta que el visitante se suscribe. Tras el éxito, el JS marca
 * la suscripción en localStorage y revela el contenedor que tenga
 * id="locked-content".
 *
 * @var array $args {
 *     @type string $form_action  URL POST del formulario Brevo (obligatorio).
 *     @type string $storage_key  Clave de localStorage para recordar el desbloqueo.
 *     @type string $title        Encabezado del locker.
 *     @type string $description  HTML de la descripción (puede contener <strong>).
 *     @type string $email_label  Texto de la etiqueta del input email.
 *     @type string $email_help   Ayuda opcional bajo el input.
 *     @type array  $extra_hidden Pares ['name' => 'value'] de inputs hidden adicionales.
 *     @type string $gate_class   Clases extra para el contenedor exterior.
 *     @type string $box_class    Clases extra para la tarjeta interior.
 * }
 */

$defaults = [
    'form_action'  => '',
    'storage_key'  => 'animatek_locker_unlocked',
    'title'        => 'Desbloquea el contenido',
    'description'  => 'Introduce tu email para acceder <strong>GRATIS</strong>.',
    'email_label'  => 'Introduzca su dirección de e-mail',
    'email_help'   => '',
    'extra_hidden' => [],
    'gate_class'   => '',
    'box_class'    => '',
];

$args = wp_parse_args(is_array($args ?? null) ? $args : [], $defaults);

if (empty($args['form_action'])) {
    return;
}
?>
<div id="locker-gate" class="max-w-4xl mx-auto px-6 mb-12 text-center relative z-20 <?php echo esc_attr($args['gate_class']); ?>">
    <div class="bg-white p-8 rounded-2xl border border-slate-200 dark:border-slate-700/50 dark:bg-slate-900 shadow-xl ring-4 ring-slate-50 dark:ring-white/5 relative overflow-hidden <?php echo esc_attr($args['box_class']); ?>">
        <div class="mb-6">
            <span class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 dark:bg-white/10 text-slate-600 dark:text-slate-200 mb-4 animate-bounce">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </span>
            <h2 class="text-slate-900 dark:text-white mb-2"><?php echo esc_html($args['title']); ?></h2>
            <p class="text-slate-600 dark:text-slate-300 max-w-lg mx-auto">
                <?php echo wp_kses_post($args['description']); ?>
            </p>
        </div>

        <style>
            @font-face { font-display: block; font-family: Roboto; src: url(https://assets.brevo.com/font/Roboto/Latin/normal/normal/7529907e9eaf8ebb5220c5f9850e3811.woff2) format("woff2"), url(https://assets.brevo.com/font/Roboto/Latin/normal/normal/25c678feafdc175a70922a116c9be3e7.woff) format("woff") }
            @font-face { font-display: fallback; font-family: Roboto; font-weight: 600; src: url(https://assets.brevo.com/font/Roboto/Latin/medium/normal/6e9caeeafb1f3491be3e32744bc30440.woff2) format("woff2"), url(https://assets.brevo.com/font/Roboto/Latin/medium/normal/71501f0d8d5aa95960f6475d5487d4c2.woff) format("woff") }
            @font-face { font-display: fallback; font-family: Roboto; font-weight: 700; src: url(https://assets.brevo.com/font/Roboto/Latin/bold/normal/3ef7cf158f310cf752d5ad08cd0e7e60.woff2) format("woff2"), url(https://assets.brevo.com/font/Roboto/Latin/bold/normal/ece3a1d82f18b60bcce0211725c476aa.woff) format("woff") }
            #sib-container input:-ms-input-placeholder,
            #sib-container input::placeholder,
            #sib-container textarea::placeholder { text-align: left; font-family: Helvetica, sans-serif; color: #c0ccda; }
            #sib-container a { text-decoration: underline; color: #2BB2FC; }
            .sib-form-message-panel { display: none; }
        </style>
        <link rel="stylesheet" href="https://sibforms.com/forms/end-form/build/sib-styles.css">

        <div class="sib-form" style="text-align: center;">
            <div id="sib-form-container" class="sib-form-container" style="display: inline-block; width: 100%; max-width: 540px;">
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

                <div id="sib-container" class="sib-container--large sib-container--vertical" style="text-align:center; background-color:rgba(255,255,255,1); max-width:540px; border-radius:3px; border-width:1px; border-color:#C0CCD9; border-style:solid; direction:ltr">
                    <form id="sib-form" method="POST" action="<?php echo esc_url($args['form_action']); ?>" data-type="subscription">
                        <div style="padding: 8px 0;">
                            <div class="sib-input sib-form-block">
                                <div class="form__entry entry_block">
                                    <div class="form__label-row">
                                        <label class="entry__label" style="font-weight: 700; text-align:left; font-size:16px; font-family:Helvetica, sans-serif; color:#3c4858;" for="EMAIL" data-required="*"><?php echo esc_html($args['email_label']); ?></label>
                                        <div class="entry__field">
                                            <input class="input " type="text" id="EMAIL" name="EMAIL" autocomplete="off" placeholder="EMAIL" data-required="true" required />
                                        </div>
                                    </div>
                                    <label class="entry__error entry__error--primary" style="font-size:16px; text-align:left; font-family:Helvetica, sans-serif; color:#661d1d; background-color:#ffeded; border-radius:3px; border-color:#ff4949;"></label>
                                    <?php if (!empty($args['email_help'])): ?>
                                    <label class="entry__specification" style="font-size:12px; text-align:left; font-family:Helvetica, sans-serif; color:#8390A4;">
                                        <?php echo esc_html($args['email_help']); ?>
                                    </label>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div style="padding: 8px 0;">
                            <div class="sib-form-block" style="text-align: left">
                                <button class="sib-form-block__button sib-form-block__button-with-loader" style="font-size:16px; text-align:left; font-weight:700; font-family:Helvetica, sans-serif; color:#FFFFFF; background-color:#3E4857; border-radius:3px; border-width:0px;" form="sib-form" type="submit">
                                    <svg class="icon clickable__icon progress-indicator__icon sib-hide-loader-icon" viewBox="0 0 512 512">
                                        <path d="M460.116 373.846l-20.823-12.022c-5.541-3.199-7.54-10.159-4.663-15.874 30.137-59.886 28.343-131.652-5.386-189.946-33.641-58.394-94.896-95.833-161.827-99.676C261.028 55.961 256 50.751 256 44.352V20.309c0-6.904 5.808-12.337 12.703-11.982 83.556 4.306 160.163 50.864 202.11 123.677 42.063 72.696 44.079 162.316 6.031 236.832-3.14 6.148-10.75 8.461-16.728 5.01z" />
                                    </svg>
                                    SUSCRIBIRSE
                                </button>
                            </div>
                        </div>
                        <input type="text" name="email_address_check" value="" class="input--hidden">
                        <input type="hidden" name="locale" value="es">
                        <?php foreach ($args['extra_hidden'] as $name => $value): ?>
                        <input type="hidden" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($value); ?>">
                        <?php endforeach; ?>
                        <?php // De qué vídeo de YouTube viene; lo rellena origen-video.php ?>
                        <input type="hidden" name="ORIGEN_VIDEO" value="">
                    </form>
                </div>
            </div>
        </div>

        <?php get_template_part('template-parts/origen-video'); ?>

        <p class="text-xs text-slate-400 mt-2">*Si el formulario no carga, prueba a desactivar tu adblocker.</p>
    </div>
</div>

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
        var STORAGE_KEY = <?php echo wp_json_encode($args['storage_key']); ?>;

        document.addEventListener('DOMContentLoaded', function () {
            var lockedContent = document.getElementById('locked-content');
            var lockerGate = document.getElementById('locker-gate');
            var successMessage = document.getElementById('success-message');

            function unlockContent() {
                if (!lockerGate || !lockedContent) return;
                lockerGate.style.display = 'none';
                lockedContent.classList.remove('blur-xl', 'grayscale', 'opacity-20', 'h-[600px]', 'overflow-hidden', 'select-none', 'pointer-events-none');
                lockedContent.classList.add('opacity-100');
                var overlay = lockedContent.querySelector('.absolute.inset-0.bg-gradient-to-b');
                if (overlay) overlay.style.display = 'none';
            }

            if (localStorage.getItem(STORAGE_KEY) === 'true') {
                unlockContent();
            }

            if (successMessage) {
                var observer = new MutationObserver(function () {
                    if (successMessage.style.display === 'block' || successMessage.style.display === '' || successMessage.offsetParent !== null) {
                        localStorage.setItem(STORAGE_KEY, 'true');
                        setTimeout(function () {
                            unlockContent();
                            lockedContent.scrollIntoView({ behavior: 'smooth' });
                        }, 2000);
                    }
                });
                observer.observe(successMessage, { attributes: true, attributeFilter: ['style', 'class'] });
            }
        });
    })();
</script>
