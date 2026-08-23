<?php
/**
 * Páginas de UZZ (Ultimate ZTEP Zequencer), en español e inglés.
 *
 * Antes eran cuatro plantillas: dos por producto, una por idioma, copiadas
 * literalmente. 451 líneas duplicadas en el par de VCV Rack y 232 en el de Max
 * for Live, lo que significaba que arreglar una errata era arreglarla dos veces
 * y que era fácil que una versión se quedara vieja.
 *
 * Ahora el marcado se escribe una vez y el texto vive en un diccionario. Es el
 * mismo patrón que ya usaban las páginas de módulos VCV
 * (inc/animatek-vcv-module-template.php) y el hub de software.
 *
 * Las cuatro plantillas de página quedan en cuatro líneas cada una:
 *
 *     animatek_ztep_vcv_render( 'es' );   // page-ultimate-ztep-zequencer-vcvrack.php
 *     animatek_ztep_vcv_render( 'en' );   // …-vcvrack-eng.php
 *     animatek_ztep_m4l_render( 'es' );   // page-ultimate-ztep-zequencer.php
 *     animatek_ztep_m4l_render( 'en' );   // …-eng.php
 *
 * Para cambiar un texto se toca el diccionario de abajo, en el idioma que sea.
 *
 * @package Animatek
 */

defined( 'ABSPATH' ) || exit;

/**
 * Devuelve un traductor: una función que dada una clave da el texto del idioma.
 *
 * @param array  $textos Diccionario clave => ['es'=>…, 'en'=>…].
 * @param string $locale 'es' o 'en'.
 *
 * @return callable(string):string
 */
function animatek_ztep_traductor( array $textos, string $locale ): callable {
	return static function ( string $clave ) use ( $textos, $locale ): string {
		if ( ! isset( $textos[ $clave ] ) ) {
			return '';
		}
		// Si falta la traducción se cae al español antes que dejar un hueco.
		return $textos[ $clave ][ $locale ] ?? $textos[ $clave ]['es'];
	};
}

/**
 * Cabecera común: navegación entre módulos y botón de cambio de idioma.
 *
 * @param string $slug_es Slug de la versión española, sin barras.
 * @param string $locale  Idioma actual.
 */
function animatek_ztep_cabecera( string $slug_es, string $locale ): void {
	$es      = 'es' === $locale;
	$actual  = $es ? $slug_es : $slug_es . '-eng';
	$otro    = $es ? $slug_es . '-eng' : $slug_es;
	$etiqueta = $es ? 'EN' : 'ES';
	?>
            <div class="flex flex-wrap items-center gap-3">
		<?php animatek_vcv_modules_nav( $actual, $locale ); ?>
                <a href="<?php echo esc_url( home_url( '/' . $otro ) ); ?>" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 rounded-full text-xs font-semibold text-slate-700 hover:border-primary hover:text-primary transition shadow-sm">
                    <span><?php echo esc_html( $etiqueta ); ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="9" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3 12h18" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 3c2.5 3.5 2.5 14 0 18" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7 5c1.5 2 1.5 12 0 14" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M17 5c-1.5 2-1.5 12 0 14" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
	<?php
}

/**
 * Página de UZZ para VCV Rack.
 *
 * @param string $locale 'es' o 'en'.
 */
function animatek_ztep_vcv_render( string $locale = 'es' ): void {
	$textos = array(
		'v001' => array(
			'es' => 'Secuenciador de 16 pasos para VCV Rack 2.x. Temporización precisa, improvisación estructurada y flexibilidad modular. Cada paso tiene Pitch, Octava, Duración, Mod1/Mod2 y Prob/Pulse. Diez modos de dirección, acumulador de semitonos y probabilidad global multiplicativa.',
			'en' => '16-step sequencer for VCV Rack 2.x. Precise timing, structured improvisation and total modular flexibility. Each step has Pitch, Octave, Duration, Mod1/Mod2 and Prob/Pulse. Ten direction modes, semitone accumulator and global multiplicative probability.',
		),
		'v002' => array(
			'es' => 'Interfaz UZZ VCV Rack',
			'en' => 'UZZ VCV Rack Interface',
		),
		'v003' => array(
			'es' => 'De Max for Live a VCV Rack',
			'en' => 'From Max for Live to VCV Rack',
		),
		'v004' => array(
			'es' => 'UZZ nació como un dispositivo de Max for Live. Este port a VCV Rack 2.x preserva la filosofía original: temporización precisa, improvisación estructurada y flexibilidad modular total. Pensado para directo y estudio, prioriza la velocidad de edición y la musicalidad inmediata.',
			'en' => 'UZZ was born as a Max for Live device. This port to VCV Rack 2.x preserves the original philosophy: precise timing, structured improvisation and total modular flexibility. Designed for live performance and studio, it prioritizes editing speed and immediate musicality.',
		),
		'v005' => array(
			'es' => 'Cada paso tiene su propio <strong>Pitch, Octava, Duración relativa al tempo, Mod1, Mod2 y un knob bipolar Prob/Pulse</strong>. La ventana activa es configurable (Start + número de pasos) con wrap-around. Accumulator de semitonos, probabilidad global multiplicativa y salida de gate polifónica completan el módulo.',
			'en' => 'Each step has its own <strong>Pitch, Octave, Duration relative to tempo, Mod1, Mod2 and a bipolar Prob/Pulse knob</strong>. The active window is configurable (Start + number of steps) with wrap-around. Semitone accumulator, global multiplicative probability and polyphonic gate output complete the module.',
		),
		'v006' => array(
			'es' => 'Modos de paso',
			'en' => 'Step modes',
		),
		'v007' => array(
			'es' => 'Dispara el paso normalmente.',
			'en' => 'Fires the step normally.',
		),
		'v008' => array(
			'es' => 'Avanza pero no genera gate ni pitch.',
			'en' => 'Advances but generates no gate or pitch.',
		),
		'v009' => array(
			'es' => 'Salta el paso sin consumir tiempo de reloj.',
			'en' => 'Skips the step without consuming clock time.',
		),
		'v010' => array(
			'es' => 'Suma semitonos al acumulador de pitch.',
			'en' => 'Adds semitones to the pitch accumulator.',
		),
		'v011' => array(
			'es' => 'Resta semitonos al acumulador de pitch.',
			'en' => 'Subtracts semitones from the pitch accumulator.',
		),
		'v012' => array(
			'es' => 'Multiplica el gate según el knob Prob/Pulse.',
			'en' => 'Multiplies the gate according to the Prob/Pulse knob.',
		),
		'v013' => array(
			'es' => 'Gate activo mientras llega pulso de reloj.',
			'en' => 'Gate active while clock pulse arrives.',
		),
		'v014' => array(
			'es' => 'Mantiene el pitch y gate del paso anterior.',
			'en' => 'Holds the pitch and gate of the previous step.',
		),
		'v015' => array(
			'es' => 'Parámetros por paso',
			'en' => 'Per-step parameters',
		),
		'v016' => array(
			'es' => 'Pitch & Octava',
			'en' => 'Pitch & Octave',
		),
		'v017' => array(
			'es' => 'Tono 0–12 semitonos. Desplazamiento de octava −2 a +2.',
			'en' => 'Pitch 0–12 semitones. Octave shift −2 to +2.',
		),
		'v018' => array(
			'es' => 'Duración',
			'en' => 'Duration',
		),
		'v019' => array(
			'es' => 'Relativa al tempo. Controla la articulación de cada nota.',
			'en' => 'Relative to tempo. Controls the articulation of each note.',
		),
		'v020' => array(
			'es' => 'Dos salidas CV independientes. Menú contextual: unipolar (0–10 V) o bipolar (±5 V).',
			'en' => 'Two independent CV outputs. Context menu: unipolar (0–10 V) or bipolar (±5 V).',
		),
		'v021' => array(
			'es' => 'Knob bipolar: lado izquierdo = probabilidad de gate; lado derecho = multiplicador de pulso.',
			'en' => 'Bipolar knob: left side = gate probability; right side = pulse multiplier.',
		),
		'v022' => array(
			'es' => '10 modos de dirección',
			'en' => '10 direction modes',
		),
		'v023' => array(
			'es' => 'Avanza paso a paso.',
			'en' => 'Advances step by step.',
		),
		'v024' => array(
			'es' => 'Retrocede paso a paso.',
			'en' => 'Goes backwards step by step.',
		),
		'v025' => array(
			'es' => 'Ida y vuelta sin repetir extremos.',
			'en' => 'Back and forth without repeating endpoints.',
		),
		'v026' => array(
			'es' => 'Ida y vuelta repitiendo extremos.',
			'en' => 'Back and forth repeating endpoints.',
		),
		'v027' => array(
			'es' => 'Paso aleatorio en cada pulso.',
			'en' => 'Random step on each pulse.',
		),
		'v028' => array(
			'es' => 'Deambula sin perder el pulso.',
			'en' => 'Wanders without losing the beat.',
		),
		'v029' => array(
			'es' => 'Alterna pasos pares e impares.',
			'en' => 'Alternates even and odd steps.',
		),
		'v030' => array(
			'es' => 'Saltos definidos entre pasos.',
			'en' => 'Defined jumps between steps.',
		),
		'v031' => array(
			'es' => 'Avanza desde extremos hacia el centro.',
			'en' => 'Advances from the edges toward the center.',
		),
		'v032' => array(
			'es' => 'Avanza desde el centro hacia los extremos.',
			'en' => 'Advances from the center toward the edges.',
		),
		'v033' => array(
			'es' => 'Control global',
			'en' => 'Global control',
		),
		'v034' => array(
			'es' => '÷8 a ×8 y más allá, con swing integrado para groove y polirritmias controladas.',
			'en' => '÷8 to ×8 and beyond, with integrated swing for groove and controlled polyrhythms.',
		),
		'v035' => array(
			'es' => 'Start configurable + número de pasos activos con wrap-around. Desplaza el patrón sin tocar los valores.',
			'en' => 'Configurable start + number of active steps with wrap-around. Shifts the pattern without touching the values.',
		),
		'v036' => array(
			'es' => 'Cantidad de shuffle ajustable. Un 5–10 % humaniza sin destruir la rejilla.',
			'en' => 'Adjustable shuffle amount. 5–10% humanizes without destroying the grid.',
		),
		'v037' => array(
			'es' => 'Knob multiplicativo sobre el disparo de gate de todos los pasos a la vez.',
			'en' => 'Multiplicative knob over the gate trigger of all steps at once.',
		),
		'v038' => array(
			'es' => 'Offset en semitonos que se acumula en pasos ACCUM UP/DOWN. Wrap configurable para contener el rango.',
			'en' => 'Semitone offset that accumulates on ACCUM UP/DOWN steps. Configurable wrap to contain the range.',
		),
		'v039' => array(
			'es' => 'Slew en la salida V/Oct (portamento de 0 a 2 s) aplicado globalmente a todas las notas.',
			'en' => 'Slew on the V/Oct output (portamento 0 to 2 s) applied globally to all notes.',
		),
		'v040' => array(
			'es' => 'Randomize & Shift por fila',
			'en' => 'Row Randomize & Shift',
		),
		'v041' => array(
			'es' => 'Randomize por fila',
			'en' => 'Row Randomize',
		),
		'v042' => array(
			'es' => 'Botón y entrada CV para re-aleatorizar cada fila: Pitch, Oct, Mode, Dur, Mod1, Mod2, Prob.',
			'en' => 'Button and CV input to re-randomize each row: Pitch, Oct, Mode, Dur, Mod1, Mod2, Prob.',
		),
		'v043' => array(
			'es' => 'Shift ↑/↓ por fila',
			'en' => 'Row Shift ↑/↓',
		),
		'v044' => array(
			'es' => 'Flechas para desplazar todos los valores de cada fila, incluida la fila Prob/Pulse.',
			'en' => 'Arrows to shift all values in each row, including the Prob/Pulse row.',
		),
		'v045' => array(
			'es' => 'Zona de patch',
			'en' => 'Patch area',
		),
		'v046' => array(
			'es' => 'Entradas',
			'en' => 'Inputs',
		),
		'v047' => array(
			'es' => 'Pulso de avance de paso.',
			'en' => 'Step advance pulse.',
		),
		'v048' => array(
			'es' => 'Vuelve al inicio (Select).',
			'en' => 'Returns to start (Select).',
		),
		'v049' => array(
			'es' => 'Transposición global 1 V/oct.',
			'en' => 'Global transposition 1 V/oct.',
		),
		'v050' => array(
			'es' => 'Triggers por fila — Pitch, Oct, Mode, Dur, Mod1, Mod2, Prob.',
			'en' => 'Per-row triggers — Pitch, Oct, Mode, Dur, Mod1, Mod2, Prob.',
		),
		'v051' => array(
			'es' => 'Salidas',
			'en' => 'Outputs',
		),
		'v052' => array(
			'es' => 'Pitch con slew 0–2 s.',
			'en' => 'Pitch with slew 0–2 s.',
		),
		'v053' => array(
			'es' => 'Conmutable Gate/Trigger.',
			'en' => 'Switchable Gate/Trigger.',
		),
		'v054' => array(
			'es' => 'Un canal por paso activo.',
			'en' => 'One channel per active step.',
		),
		'v055' => array(
			'es' => 'CV con step-lock.',
			'en' => 'CV with step-lock.',
		),
		'v056' => array(
			'es' => 'Pulso de fin de ciclo.',
			'en' => 'End-of-cycle pulse.',
		),
		'v057' => array(
			'es' => 'Nuevos módulos y versión 2.5.x',
			'en' => 'New modules and 2.5.x updates',
		),
		'v058' => array(
			'es' => 'La colección Animatek en VCV Rack ya no es solo UZZ: incluye generadores, controladores MIDI, utilidades y el ecosistema OXI-CV/MULTI.',
			'en' => 'The Animatek collection in VCV Rack is no longer just UZZ: it now includes generative tools, MIDI controllers, utilities and the OXI-CV/MULTI ecosystem.',
		),
		'v059' => array(
			'es' => 'Ver colección',
			'en' => 'View collection',
		),
		'v060' => array(
			'es' => 'Nuevo · Generativo',
			'en' => 'New · Generative',
		),
		'v061' => array(
			'es' => 'Secuenciador generativo determinista basado en recorridos por grafos de distancia unidad. Nodes 2D, transiciones de grafo, pitch cuantizado, gate, accent, X CV e Y CV.',
			'en' => 'Deterministic generative sequencer based on unit-distance graph walks. 2D nodes, graph transitions, quantized pitch, gate, accent, X CV and Y CV.',
		),
		'v062' => array(
			'es' => 'Secuenciador',
			'en' => 'Sequencer',
		),
		'v063' => array(
			'es' => '/ultimate-ztep-zequencer-vcvrack/',
			'en' => '/ultimate-ztep-zequencer-vcvrack-eng/',
		),
		'v064' => array(
			'es' => 'Secuenciador de pasos para improvisación estructurada, probabilidad, modos de dirección, acumulador de semitonos y modulación por paso.',
			'en' => 'Step sequencer for structured improvisation, probability, direction modes, semitone accumulator and per-step modulation.',
		),
		'v065' => array(
			'es' => 'Conversor MIDI-to-CV de 6 HP para Oxi One: V/Oct, Gate, Velocity, 8 CC, Clock, CLK/n y Run en modos Mono, Poly, Chord, Multitrack y Matriceal.',
			'en' => '6HP MIDI-to-CV for Oxi One: V/Oct, Gate, Velocity, 8 CC, Clock, CLK/n and Run in Mono, Poly, Chord, Multitrack and Matriceal modes.',
		),
		'v066' => array(
			'es' => 'Expander de OXI-CV',
			'en' => 'OXI-CV expander',
		),
		'v067' => array(
			'es' => 'Expander de 10 HP integrado en la página de OXI-CV, con 8 tracks configurables y salidas V/Oct, Gate y Velocity.',
			'en' => '10HP expander covered on the OXI-CV page, with 8 configurable tracks and V/Oct, Gate and Velocity outputs.',
		),
		'v068' => array(
			'es' => 'Puente MIDI-to-CV para Akai APC40: Track Control, Device Control, Cue, Crossfader y 8 faders de canal.',
			'en' => 'MIDI-to-CV bridge for Akai APC40: Track Control, Device Control, Cue, Crossfader and 8 channel faders.',
		),
		'v069' => array(
			'es' => 'Panel blank de 3 HP con logo Animatek para organizar visualmente tus patches.',
			'en' => '3HP blank panel with the Animatek logo for visually organizing your patches.',
		),
		'v070' => array(
			'es' => 'Biblioteca VCV',
			'en' => 'VCV Library',
		),
		'v071' => array(
			'es' => 'Añadir a mi Rack',
			'en' => 'Add to my Rack',
		),
		'v072' => array(
			'es' => 'Disponible para VCV Rack Free & Pro.<br>Compatible con Windows, Mac y Linux.',
			'en' => 'Available for VCV Rack Free &amp; Pro.<br>Compatible with Windows, Mac and Linux.',
		),
		'v073' => array(
			'es' => 'Código fuente',
			'en' => 'Source code',
		),
		'v074' => array(
			'es' => 'Curso gratis de UZZ para VCV',
			'en' => 'Free UZZ for VCV course',
		),
		'v075' => array(
			'es' => 'Apúntate ya',
			'en' => 'Sign up now',
		),
		'v076' => array(
			'es' => 'Curso gratis de UZZ para VCV',
			'en' => 'Free UZZ for VCV course',
		),
		'v077' => array(
			'es' => 'Flujo completo para improvisar y crear patrones complejos con UZZ en VCV Rack. Aprende paso a paso y aplica al directo o estudio.',
			'en' => 'Complete workflow for improvising and creating complex patterns with UZZ in VCV Rack. Learn step by step and apply it to live performance or studio.',
		),
		'v078' => array(
			'es' => 'Empezar curso',
			'en' => 'Start course',
		),
		'v079' => array(
			'es' => 'Review de Omri Cohen',
			'en' => 'Omri Cohen Review',
		),
		'v080' => array(
			'es' => 'Omri Cohen destacó UZZ en su resumen de módulos.',
			'en' => 'Omri Cohen featured UZZ in his module roundup.',
		),
		'v081' => array(
			'es' => 'Noviembre 2025',
			'en' => 'November 2025',
		),
	);

	$t = animatek_ztep_traductor( $textos, $locale );

	require_once get_theme_file_path( 'inc/animatek-vcv-module-template.php' );
	?>

<main id="primary" class="bg-slate-200 text-slate-900">
    <section class="relative overflow-hidden px-6 sm:px-10 py-16 bg-gradient-to-br from-slate-50 via-white to-slate-100 text-slate-900 mb-[6.25rem]">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -left-24 -top-16 h-72 w-72 bg-primary/15 blur-3xl rounded-full"></div>
            <div class="absolute right-10 top-10 h-64 w-64 bg-cyan-300/20 blur-3xl rounded-full"></div>
            <div class="absolute -right-20 bottom-0 h-72 w-72 bg-indigo-300/20 blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto space-y-6 relative z-10">
            <?php animatek_ztep_cabecera( 'ultimate-ztep-zequencer-vcvrack', $locale ); ?>

            <div class="grid gap-8 lg:grid-cols-[1.05fr_0.95fr] items-center">
                <div class="space-y-5">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight text-slate-900">
                        UZZ - <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-cyan-600">VCV Rack</span>
                    </h1>
                    <p class="text-lg sm:text-xl text-slate-700 leading-relaxed max-w-2xl">
                        <?php echo $t('v001'); ?>
                    </p>
                </div>

                <div class="relative">
                    <div class="absolute inset-0 rounded-3xl bg-white/60 blur-3xl"></div>
                    <div class="relative rounded-3xl border border-slate-200 shadow-2xl bg-slate-900 px-2 py-2">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary/20 to-red-500/20 blur-3xl opacity-40"></div>
                        <img src="https://animatek.net/wp-content/uploads/2026/04/UZZ_2_5.webp"
                             alt="<?php echo $t('v002'); ?>"
                             class="w-full aspect-video object-cover object-top relative z-10 rounded-3xl">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 pb-20">
        <div class="grid lg:grid-cols-[1.4fr_0.9fr] gap-8 items-start">
            <div class="space-y-10">

                <div class="space-y-4">
                    <div class="flex items-center gap-2 sm:gap-3 text-left text-slate-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-primary shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a1 1 0 0 1-1-1v-1a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v1a1 1 0 0 1-1 1"/>
                            <path d="M19 15V6.5a1 1 0 0 0-7 0v11a1 1 0 0 1-7 0V9"/>
                            <path d="M21 21v-2h-4"/>
                            <path d="M3 5v2a1 1 0 0 0 1 1h1a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H3a1 1 0 0 0-1 1"/>
                            <path d="M3 3v2h4"/>
                        </svg>
                        <p class="text-lg sm:text-xl font-semibold leading-tight mb-0 text-left"><?php echo $t('v003'); ?></p>
                    </div>
                    <div class="space-y-3 text-slate-700 leading-relaxed">
                        <p class="text-base"><?php echo $t('v004'); ?></p>
                        <p class="text-base"><?php echo $t('v005'); ?></p>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-slate-900 mb-6 border-b border-slate-200 pb-2"><?php echo $t('v006'); ?></h4>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                        <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <div class="font-mono text-xs font-bold text-primary mb-1">Play</div>
                            <p class="text-xs text-slate-600"><?php echo $t('v007'); ?></p>
                        </div>
                        <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <div class="font-mono text-xs font-bold text-primary mb-1">Mute</div>
                            <p class="text-xs text-slate-600"><?php echo $t('v008'); ?></p>
                        </div>
                        <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <div class="font-mono text-xs font-bold text-primary mb-1">Skip</div>
                            <p class="text-xs text-slate-600"><?php echo $t('v009'); ?></p>
                        </div>
                        <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <div class="font-mono text-xs font-bold text-primary mb-1">Accum Up</div>
                            <p class="text-xs text-slate-600"><?php echo $t('v010'); ?></p>
                        </div>
                        <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <div class="font-mono text-xs font-bold text-primary mb-1">Accum Down</div>
                            <p class="text-xs text-slate-600"><?php echo $t('v011'); ?></p>
                        </div>
                        <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <div class="font-mono text-xs font-bold text-primary mb-1">Pulse</div>
                            <p class="text-xs text-slate-600"><?php echo $t('v012'); ?></p>
                        </div>
                        <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <div class="font-mono text-xs font-bold text-primary mb-1">Gated</div>
                            <p class="text-xs text-slate-600"><?php echo $t('v013'); ?></p>
                        </div>
                        <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <div class="font-mono text-xs font-bold text-primary mb-1">Hold</div>
                            <p class="text-xs text-slate-600"><?php echo $t('v014'); ?></p>
                        </div>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-slate-900 mb-6 border-b border-slate-200 pb-2"><?php echo $t('v015'); ?></h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <div class="flex items-center gap-2 text-primary font-mono text-xs font-bold uppercase mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 4v16M6 8h4m-4 6h7m5-10v16m0-12h-6m6 8h-3"/>
                                </svg>
                                <?php echo $t('v016'); ?>
                            </div>
                            <p class="text-sm text-slate-600 font-sans"><?php echo $t('v017'); ?></p>
                        </div>
                        <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <div class="flex items-center gap-2 text-primary font-mono text-xs font-bold uppercase mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="9" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 7v5l3 3" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <?php echo $t('v018'); ?>
                            </div>
                            <p class="text-sm text-slate-600 font-sans"><?php echo $t('v019'); ?></p>
                        </div>
                        <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <div class="flex items-center gap-2 text-primary font-mono text-xs font-bold uppercase mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="8" cy="12" r="3"/>
                                    <circle cx="16" cy="12" r="3"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 5v2m0 10v2m8-2v2m0-14v2"/>
                                </svg>
                                MOD 1 / MOD 2
                            </div>
                            <p class="text-sm text-slate-600 font-sans"><?php echo $t('v020'); ?></p>
                        </div>
                        <div class="bg-white p-4 rounded-xl border border-slate-100 shadow-sm">
                            <div class="flex items-center gap-2 text-primary font-mono text-xs font-bold uppercase mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 2v20M2 12h20"/>
                                </svg>
                                Prob / Pulse
                            </div>
                            <p class="text-sm text-slate-600 font-sans"><?php echo $t('v021'); ?></p>
                        </div>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-slate-900 mb-6 border-b border-slate-200 pb-2"><?php echo $t('v022'); ?></h4>
                    <div class="grid grid-cols-2 sm:grid-cols-5 gap-3">
                        <?php
                        $directions = [
                            ['Forward',   $t('v023')],
                            ['Backward',  $t('v024')],
                            ['Pendulum',  $t('v025')],
                            ['Ping-Pong', $t('v026')],
                            ['Random',    $t('v027')],
                            ['Drunk',     $t('v028')],
                            ['Odd/Even',  $t('v029')],
                            ['Jump',      $t('v030')],
                            ['Converge',  $t('v031')],
                            ['Diverge',   $t('v032')],
                        ];
                        foreach ($directions as $dir): ?>
                        <div class="bg-white px-3 py-3 rounded-xl border border-slate-100 shadow-sm">
                            <div class="font-mono text-xs font-bold text-primary mb-1"><?php echo esc_html($dir[0]); ?></div>
                            <p class="text-[11px] text-slate-500"><?php echo esc_html($dir[1]); ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm">
                    <h4 class="font-bold text-slate-900 mb-6 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="9" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3 12h18" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 3c2.5 3.5 2.5 14 0 18" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7 5c1.5 2 1.5 12 0 14" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17 5c-1.5 2-1.5 12 0 14" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <?php echo $t('v033'); ?>
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4 text-sm text-slate-700 font-sans">
                            <div>
                                <strong class="block text-slate-800 mb-1">Clock ratios</strong>
                                <?php echo $t('v034'); ?>
                            </div>
                            <div>
                                <strong class="block text-slate-800 mb-1">Active Window</strong>
                                <?php echo $t('v035'); ?>
                            </div>
                            <div>
                                <strong class="block text-slate-800 mb-1">Swing</strong>
                                <?php echo $t('v036'); ?>
                            </div>
                        </div>
                        <div class="space-y-4 text-sm text-slate-700 font-sans">
                            <div>
                                <strong class="block text-slate-800 mb-1">Global Probability</strong>
                                <?php echo $t('v037'); ?>
                            </div>
                            <div>
                                <strong class="block text-slate-800 mb-1">Accumulator</strong>
                                <?php echo $t('v038'); ?>
                            </div>
                            <div>
                                <strong class="block text-slate-800 mb-1">Global Glide</strong>
                                <?php echo $t('v039'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-slate-900 mb-6 border-b border-slate-200 pb-2"><?php echo $t('v040'); ?></h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="flex gap-3 items-start p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                            <div class="p-2 bg-blue-50 text-primary rounded-lg shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M3 15c3-4 6-4 9 0s6 4 9 0" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M3 9c3 4 6 4 9 0s6-4 9 0" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div>
                                <h5 class="font-bold text-sm text-slate-800 mb-1"><?php echo $t('v041'); ?></h5>
                                <p class="text-xs text-slate-600"><?php echo $t('v042'); ?></p>
                            </div>
                        </div>
                        <div class="flex gap-3 items-start p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                            <div class="p-2 bg-blue-50 text-primary rounded-lg shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m7 7 5-5 5 5M7 17l5 5 5-5M7 12h10"/>
                                </svg>
                            </div>
                            <div>
                                <h5 class="font-bold text-sm text-slate-800 mb-1"><?php echo $t('v043'); ?></h5>
                                <p class="text-xs text-slate-600"><?php echo $t('v044'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-8 relative overflow-hidden border border-slate-200 shadow-sm">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-primary/10 rounded-full blur-3xl pointer-events-none"></div>
                    <div class="relative z-10">
                        <h4 class="text-slate-900 font-bold mb-8 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="4" y="4" width="16" height="16" rx="2" ry="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9 9h6v6H9z" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4 9h5v6H4zM15 9h5v6h-5z" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9 4v5M15 4v5M9 15v5M15 15v5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <?php echo $t('v045'); ?>
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                            <div>
                                <div class="flex items-center gap-2 mb-4 text-yellow-600 font-mono text-xs font-bold tracking-wider uppercase">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 12h13"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m13 5 7 7-7 7"/>
                                    </svg>
                                    <?php echo $t('v046'); ?>
                                </div>
                                <ul class="space-y-3 text-sm font-mono text-slate-700">
                                    <li><span class="text-slate-900 font-bold">CLOCK IN:</span> <?php echo $t('v047'); ?></li>
                                    <li><span class="text-slate-900 font-bold">RESET IN:</span> <?php echo $t('v048'); ?></li>
                                    <li><span class="text-slate-900 font-bold">XPOSE IN:</span> <?php echo $t('v049'); ?></li>
                                    <li><span class="text-slate-900 font-bold">RAND IN ×7:</span> <?php echo $t('v050'); ?></li>
                                </ul>
                            </div>
                            <div>
                                <div class="flex items-center gap-2 mb-4 text-green-600 font-mono text-xs font-bold tracking-wider uppercase">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m20 12-7-7-7 7"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14"/>
                                    </svg>
                                    <?php echo $t('v051'); ?>
                                </div>
                                <ul class="space-y-3 text-sm font-mono text-slate-700">
                                    <li><span class="text-slate-900 font-bold">V/OCT + Glide:</span> <?php echo $t('v052'); ?></li>
                                    <li><span class="text-slate-900 font-bold">GATE OUT:</span> <?php echo $t('v053'); ?></li>
                                    <li><span class="text-slate-900 font-bold">POLY GATE:</span> <?php echo $t('v054'); ?></li>
                                    <li><span class="text-slate-900 font-bold">MOD 1/2 OUT:</span> <?php echo $t('v055'); ?></li>
                                    <li><span class="text-slate-900 font-bold">EOC OUT:</span> <?php echo $t('v056'); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between mb-6">
                        <div>
                            <div class="inline-flex items-center gap-2 px-3 py-1 text-[11px] font-bold tracking-widest uppercase bg-primary/10 text-primary rounded-full mb-3">
                                VCV Library · Animatek
                            </div>
                            <h4 class="text-2xl font-extrabold text-slate-900"><?php echo $t('v057'); ?></h4>
                            <p class="text-sm text-slate-600 leading-relaxed mt-2 max-w-2xl">
                                <?php echo $t('v058'); ?>
                            </p>
                        </div>
                        <a href="https://library.vcvrack.com/Animatek"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-bold text-slate-800 hover:border-primary hover:text-primary transition">
                            <?php echo $t('v059'); ?>
                        </a>
                    </div>

                    <?php
                    $animatek_modules = [
                        [
                            'name' => 'UNIT-D',
                            'version' => '2.5.4',
                            'tag' => $t('v060'),
                            'url' => home_url('/unit-d/'),
                            'description' => $t('v061'),
                        ],
                        [
                            'name' => 'UZZ',
                            'version' => '2.5.0',
                            'tag' => $t('v062'),
                            'url' => home_url($t('v063')),
                            'description' => $t('v064'),
                        ],
                        [
                            'name' => 'OXI-CV',
                            'version' => '2.5.0',
                            'tag' => 'MIDI · CV',
                            'url' => home_url('/oxi-cv/'),
                            'description' => $t('v065'),
                        ],
                        [
                            'name' => 'MULTI',
                            'version' => '2.5.4',
                            'tag' => $t('v066'),
                            'url' => home_url('/oxi-cv/#multi'),
                            'description' => $t('v067'),
                        ],
                        [
                            'name' => 'APC40 CTRL',
                            'version' => '2.5.4',
                            'tag' => 'Controller',
                            'url' => home_url('/apc40-ctrl/'),
                            'description' => $t('v068'),
                        ],
                        [
                            'name' => 'BLANK 3',
                            'version' => '2.5.4',
                            'tag' => 'Utility',
                            'url' => home_url('/blank-3/'),
                            'description' => $t('v069'),
                        ],
                    ];
                    ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php foreach ($animatek_modules as $module): ?>
                            <a href="<?php echo esc_url($module['url']); ?>"
                               class="group block rounded-xl border border-slate-200 bg-slate-50 p-5 transition hover:-translate-y-0.5 hover:border-primary hover:bg-white hover:shadow-md">
                                <div class="flex items-start justify-between gap-4 mb-3">
                                    <div>
                                        <h5 class="text-lg font-extrabold text-slate-900 group-hover:text-primary transition"><?php echo esc_html($module['name']); ?></h5>
                                        <p class="text-[11px] font-bold uppercase tracking-widest text-slate-500"><?php echo esc_html($module['tag']); ?></p>
                                    </div>
                                    <span class="shrink-0 rounded-full bg-primary/10 px-2.5 py-1 text-xs font-bold text-primary">v<?php echo esc_html($module['version']); ?></span>
                                </div>
                                <p class="text-sm leading-relaxed text-slate-600"><?php echo esc_html($module['description']); ?></p>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>

            <aside class="space-y-8">
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-lg">
                    <div class="mb-6 text-center">
                        <img src="https://animatek.net/wp-content/uploads/2025/11/logovcv.webp" alt="Logo VCV" class="w-12 h-12 mx-auto mb-2 opacity-80 object-contain">
                        <h4 class="text-lg font-bold text-slate-900"><?php echo $t('v070'); ?></h4>
                    </div>
                    <a href="https://library.vcvrack.com/Animatek/UZZ"
                       target="_blank"
                       class="block w-full text-center bg-primary hover:bg-primary/90 text-white font-bold py-4 px-6 rounded-xl transition-all transform hover:-translate-y-1 shadow-md shadow-primary/20 flex items-center justify-center gap-2">
                        <i data-lucide="download-cloud" class="w-5 h-5"></i>
                        <?php echo $t('v071'); ?>
                    </a>
                    <p class="text-xs text-slate-500 text-center mt-4 font-sans leading-relaxed">
                        <?php echo $t('v072'); ?>
                    </p>
                    <a href="https://github.com/animatek/UZZ-VCV-RACK"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="mt-3 block w-full text-center border border-slate-200 bg-slate-50 hover:border-primary hover:text-primary text-slate-700 font-bold py-3 px-4 rounded-xl transition">
                        <?php echo $t('v073'); ?>
                    </a>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                    <div class="rounded-xl overflow-hidden mb-4">
                        <img src="https://animatek.net/wp-content/uploads/2025/11/UZZ_Curso.webp" alt="<?php echo $t('v074'); ?>" class="w-full h-auto object-cover">
                    </div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 text-[11px] font-bold tracking-widest uppercase bg-primary/10 text-primary rounded-full mb-3">
                        <span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span>
                        <?php echo $t('v075'); ?>
                    </div>
                    <h4 class="text-lg font-bold text-slate-900 mb-2"><?php echo $t('v076'); ?></h4>
                    <p class="text-sm text-slate-600 leading-relaxed mb-4">
                        <?php echo $t('v077'); ?>
                    </p>
                    <a href="<?php echo esc_url(home_url('/cursos/curso-uzz/')); ?>"
                       class="block w-full text-center bg-primary hover:bg-primary/90 text-white font-bold py-3 px-4 rounded-xl transition-all transform hover:-translate-y-0.5 shadow-md shadow-primary/20">
                        <?php echo $t('v078'); ?>
                    </a>
                </div>

                <div class="bg-white p-1 rounded-2xl border border-slate-200 shadow-sm">
                    <div class="rounded-xl overflow-hidden">
                        <iframe width="100%" height="200" src="https://www.youtube.com/embed/r3QMHA-M_ZM?start=598" title="<?php echo $t('v079'); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="p-4">
                        <div class="flex items-start gap-3">
                            <div class="bg-red-50 p-2 rounded-full text-red-600"><i data-lucide="youtube" class="w-4 h-4"></i></div>
                            <div>
                                <p class="text-sm text-slate-800 font-medium italic mb-1 font-sans">"<?php echo $t('v080'); ?>"</p>
                                <p class="text-xs text-slate-500 font-sans"><?php echo $t('v081'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </section>
</main>

	<?php
}

/**
 * Página de UZZ para Max for Live.
 *
 * @param string $locale 'es' o 'en'.
 */
function animatek_ztep_m4l_render( string $locale = 'es' ): void {
	$textos = array(
		'm001' => array(
			'es' => 'Secuenciador de 16 pasos creado en Max for Live, con funciones aleatorias y una matriz de modulación capaz de controlar cualquier parámetro de Live. Una herramienta orientada al directo, diseñada para improvisar y generar secuencias en evolución al vuelo.',
			'en' => '16-step sequencer built in Max for Live with random functions and a modulation matrix that can control any parameter in Live. Performance-oriented to improvise and generate evolving sequences on the fly.',
		),
		'm002' => array(
			'es' => 'Interfaz UZZ Max for Live',
			'en' => 'UZZ Max for Live Interface',
		),
		'm003' => array(
			'es' => 'El cerebro de tu Live Set',
			'en' => 'The brain of your Live Set',
		),
		'm004' => array(
			'es' => 'UZZ no es solo un secuenciador más. Es una herramienta diseñada para romper bloqueos creativos. Con este dispositivo podrás crear secuencias increíbles modificando sus parámetros aleatoriamente.',
			'en' => 'UZZ is built to break creative blocks. Twist a couple of knobs and turn a basic MIDI line into a pattern with pitch, swing, probability, and modulation variations.',
		),
		'm005' => array(
			'es' => 'Además, su verdadera potencia reside en la capacidad de <strong>automatizar cualquier parámetro de Ableton</strong> utilizando su matriz de modulaciones. Convierte una secuencia MIDI simple en una estructura compleja de cambios tímbricos y rítmicos.',
			'en' => 'Its real power is the ability to <strong>automate any Ableton parameter</strong> using its modulation matrix. Turn a simple MIDI loop into a complex structure of timbral and rhythmic changes.',
		),
		'm006' => array(
			'es' => 'Parámetros por paso',
			'en' => 'Per-step parameters',
		),
		'm007' => array(
			'es' => 'Pitch & Octava:</strong> rango de 0 a 12 semitonos y desplazamiento de -2 a +2 octavas por paso.',
			'en' => 'Pitch & Octave:</strong> 0 to 12 semitones and -2 to +2 octaves per step.',
		),
		'm008' => array(
			'es' => 'Velocidad & Duración:</strong> ajuste dinámico de velocity (0-127) y duración de nota (128n a 2n).',
			'en' => 'Velocity & Duration:</strong> velocity 0-127 and note lengths from 1/128 to 1/2.',
		),
		'm009' => array(
			'es' => 'Modo Play/Mute:</strong> activa o desactiva pasos individuales para crear ritmos sincopados.',
			'en' => 'Play/Mute:</strong> mute steps to build syncopated grooves.',
		),
		'm010' => array(
			'es' => 'Controles M1-M2:</strong> dos secuenciadores extra dedicados exclusivamente a modulación.',
			'en' => 'M1-M2 lanes:</strong> two extra sequencers dedicated to modulation.',
		),
		'm011' => array(
			'es' => 'Control Global',
			'en' => 'Global control',
		),
		'm012' => array(
			'es' => 'Dirección de Reproducción:</strong> Forward, Backward, Back & Forth, Random y Drunk (Ebrio).',
			'en' => 'Playback direction:</strong> Forward, Backward, Back & Forth, Random, and Drunk.',
		),
		'm013' => array(
			'es' => 'Cuantización:</strong> desde 1/2 hasta 1/32, incluyendo tresillos (Triplets) y puntillo (Dotted).',
			'en' => 'Quantization:</strong> from 1/2 to 1/32, including triplets and dotted values.',
		),
		'm014' => array(
			'es' => 'Escalas Generativas:</strong> selecciona tónica y escala (Chromática, Dórica, Mixolidia, Pentatónica, etc.).',
			'en' => 'Generative scales:</strong> pick tonic and scale (Chromatic, Dorian, Mixolydian, Pentatonic, etc.).',
		),
		'm015' => array(
			'es' => 'añade groove y humanización porcentual.',
			'en' => 'add groove and humanization by percentage.',
		),
		'm016' => array(
			'es' => 'Workflow Rápido',
			'en' => 'Fast workflow',
		),
		'm017' => array(
			'es' => 'Olvídate de guardar presets manualmente. UZZ guarda el estado al cambiar de slot. Copia y pega patrones al vuelo.',
			'en' => 'Forget manual preset saving. UZZ stores state when switching slots. Copy and paste patterns on the fly.',
		),
		'm018' => array(
			'es' => 'Envía señales de modulación desde el Tono, Velocidad, Duración o los controles M1/M2 hacia cualquier destino en Ableton o hardware externo.',
			'en' => 'Route modulation from Pitch, Velocity, Duration, or M1/M2 lanes to any destination in Ableton or external hardware.',
		),
		'm019' => array(
			'es' => '4x Mapas de Parámetros (Ableton)',
			'en' => '4x Parameter Maps (Ableton)',
		),
		'm020' => array(
			'es' => '10€',
			'en' => '€10',
		),
		'm021' => array(
			'es' => 'Versión 3.2',
			'en' => 'Version 3.2',
		),
		'm022' => array(
			'es' => 'Comprar Ahora',
			'en' => 'Buy now',
		),
		'm023' => array(
			'es' => 'Pago seguro & Descarga inmediata',
			'en' => 'Secure payment & instant download',
		),
		'm024' => array(
			'es' => 'Requisitos del Sistema',
			'en' => 'System requirements',
		),
		'm025' => array(
			'es' => 'Ableton Live 10, 11 o 12 Suite con licencia de Max for Live',
			'en' => 'Ableton Live 10, 11 or 12 Suite with a Max for Live license',
		),
		'm026' => array(
			'es' => '*Incluye versión Legacy (UZZ 2.1) compatible con Ableton 8 / Max 6.',
			'en' => '*Includes Legacy version (UZZ 2.1) compatible with Ableton 8 / Max 6.',
		),
		'm027' => array(
			'es' => 'Novedades v3.2',
			'en' => 'What\'s new v3.2',
		),
		'm028' => array(
			'es' => 'Código optimizado: 48% más ligero y rápido.',
			'en' => 'Optimized code: 48% lighter and faster.',
		),
		'm029' => array(
			'es' => 'Interfaz gráfica mejorada y menús desplegables.',
			'en' => 'Improved GUI and dropdown menus.',
		),
		'm030' => array(
			'es' => 'Ajuste automático de cuantización.',
			'en' => 'Auto-quantize adjustment.',
		),
		'm031' => array(
			'es' => 'Sistema de Copy/Paste de presets.',
			'en' => 'Copy/Paste preset system.',
		),
		'm032' => array(
			'es' => 'Compatible con Push (Bancos experimentales).',
			'en' => 'Push compatibility (experimental banks).',
		),
	);

	$t = animatek_ztep_traductor( $textos, $locale );

	require_once get_theme_file_path( 'inc/animatek-vcv-module-template.php' );
	?>

<main id="primary" class="bg-slate-200 text-slate-900">
    <section class="animatek-hero-section relative overflow-hidden px-6 sm:px-10 py-16 bg-gradient-to-br from-slate-50 via-white to-slate-100 text-slate-900 mb-[6.25rem]">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -left-24 -top-16 h-72 w-72 bg-primary/15 blur-3xl rounded-full"></div>
            <div class="absolute right-10 top-10 h-64 w-64 bg-cyan-300/20 blur-3xl rounded-full"></div>
            <div class="absolute -right-20 bottom-0 h-72 w-72 bg-indigo-300/20 blur-3xl rounded-full"></div>
        </div>

        <div class="max-w-7xl mx-auto space-y-6 lg:space-y-8 relative z-10">
            <?php animatek_ztep_cabecera( 'ultimate-ztep-zequencer', $locale ); ?>

            <div class="grid gap-8 lg:grid-cols-[1.05fr_0.95fr] items-center">
                <div class="space-y-5">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight text-slate-900">
                    UZZ <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-cyan-600">Sequencer</span>
                </h1>
                <p class="text-lg sm:text-xl text-slate-700 leading-relaxed max-w-2xl">
                    <?php echo $t('m001'); ?>
                </p>
            </div>

            <div class="relative">
                <div class="absolute inset-0 rounded-3xl bg-white/60 blur-3xl"></div>
                <div class="relative overflow-hidden rounded-3xl border border-slate-200 shadow-2xl bg-white">
                        <div class="absolute inset-x-0 top-0 h-28 bg-gradient-to-b from-primary/10 via-transparent to-transparent pointer-events-none"></div>
                        <img src="https://animatek.net/wp-content/uploads/2017/08/screenshot.png"
                             alt="<?php echo $t('m002'); ?>"
                             class="w-full aspect-video object-cover object-top">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 pb-20">
        <div class="grid lg:grid-cols-[1.4fr_0.9fr] gap-8 items-start">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="rounded-[1.75rem] border border-slate-200 bg-white shadow-sm p-6 sm:p-8 space-y-4 lg:col-span-2">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"/>
                        </svg>
                        <h3 class="text-2xl font-bold text-slate-900"><?php echo $t('m003'); ?></h3>
                    </div>
                    <p class="text-base sm:text-lg text-slate-700 leading-relaxed">
                        <?php echo $t('m004'); ?>
                    </p>
                    <p class="text-base sm:text-lg text-slate-700 leading-relaxed">
                        <?php echo $t('m005'); ?>
                    </p>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-7">
                    <h4 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 21v-6m0-4V3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4 11a2 2 0 1 0 0-4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10 15H4m6-4H4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14 21v-3m0-4V3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14 17a2 2 0 1 0 0-4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20 15h-6m6-4h-6" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 6v3m0 4v8" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 10a2 2 0 1 0 0 4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15 6h-6m6 8h-6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <?php echo $t('m006'); ?>
                    </h4>
                    <div class="grid grid-cols-1 gap-3 text-sm text-slate-700">
                        <div class="flex items-start gap-2">
                            <span class="text-primary">•</span>
                            <div><strong><?php echo $t('m007'); ?></div>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary">•</span>
                            <div><strong><?php echo $t('m008'); ?></div>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary">•</span>
                            <div><strong><?php echo $t('m009'); ?></div>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary">•</span>
                            <div><strong><?php echo $t('m010'); ?></div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200 shadow-sm">
                    <h4 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="9" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3 12h18" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 3c2.5 3.5 2.5 14 0 18" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7 5c1.5 2 1.5 12 0 14" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17 5c-1.5 2-1.5 12 0 14" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <?php echo $t('m011'); ?>
                    </h4>
                    <div class="space-y-3 text-sm text-slate-700">
                        <div class="flex items-start gap-2">
                            <span class="text-primary">•</span>
                            <div><strong><?php echo $t('m012'); ?></div>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary">•</span>
                            <div><strong><?php echo $t('m013'); ?></div>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary">•</span>
                            <div><strong><?php echo $t('m014'); ?></div>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-primary">•</span>
                            <div><strong>Swing:</strong> <?php echo $t('m015'); ?></div>
                        </div>
                    </div>
                    <div class="mt-4 p-4 rounded-xl border border-primary/20 bg-primary/5 shadow-sm">
                        <h5 class="text-sm font-semibold text-primary mb-2 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 9h6m-6 4h4m-4 4h6" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13 5h7m-7 4h5m-5 4h7m-7 4h5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <?php echo $t('m016'); ?>
                        </h5>
                        <p class="text-sm text-slate-700 mb-0">
                            <?php echo $t('m017'); ?>
                        </p>
                    </div>
                </div>

                <div class="bg-white rounded-[1.5rem] border border-slate-200 shadow-sm p-6 sm:p-8 relative overflow-hidden lg:col-span-2">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary/10 rounded-full blur-3xl"></div>
                    <div class="relative z-10 space-y-3">
                        <h4 class="text-slate-900 font-bold flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="6" cy="6" r="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="18" cy="6" r="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="6" cy="18" r="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="18" cy="18" r="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8 6h8M6 8v8m12-8v8M8 18h8" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8 8 16 16M8 16l8-8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Matrix Modulation
                        </h4>
                        <p class="text-sm text-slate-700 font-sans">
                            <?php echo $t('m018'); ?>
                        </p>
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm font-mono text-slate-600">
                            <li class="flex items-center gap-2"><span class="text-primary">></span> <?php echo $t('m019'); ?></li>
                            <li class="flex items-center gap-2"><span class="text-primary">></span> 2x Control Change (CC)</li>
                            <li class="flex items-center gap-2"><span class="text-primary">></span> Program Change (PC)</li>
                            <li class="flex items-center gap-2"><span class="text-primary">></span> Pitch Bend & AfterTouch</li>
                        </ul>
                    </div>
                </div>

            </div>

            <aside class="space-y-6 lg:space-y-8">
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-lg lg:sticky lg:top-6">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-3xl font-bold text-slate-900"><?php echo $t('m020'); ?></span>
                        <span class="bg-green-100 text-green-700 text-xs font-bold px-2 py-1 rounded uppercase"><?php echo $t('m021'); ?></span>
                    </div>
                    <a href="https://animatek.net/pago/?line_items%5B0%5D%5Bprice_id%5D=d9000889-837b-4f7e-8a7e-3e9ca2e2259e&line_items%5B0%5D%5Bquantity%5D=1"
                       target="_blank"
                       class="block w-full text-center bg-primary hover:bg-primary/90 text-white font-bold py-4 px-6 rounded-xl transition-all transform hover:-translate-y-1 shadow-md shadow-[0_16px_30px_-22px_rgba(33,112,245,0.6)]">
                        <?php echo $t('m022'); ?>
                    </a>
                    <p class="text-xs text-slate-500 text-center mt-3 flex justify-center items-center gap-1 font-sans">
                        <i data-lucide="shield-check" class="w-3 h-3"></i> <?php echo $t('m023'); ?>
                    </p>
                </div>

                <div class="rounded-2xl overflow-hidden shadow-md border border-slate-200 bg-white">
                    <iframe width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/7336598&show_artwork=false&color=%232170F5&auto_play=false&hide_related=true&show_comments=false&show_user=true&show_reposts=false&show_teaser=false"></iframe>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <h4 class="font-bold text-slate-900 mb-4 flex items-center gap-2">
                        <i data-lucide="cpu" class="w-5 h-5 text-slate-400"></i> <?php echo $t('m024'); ?>
                    </h4>
                    <ul class="space-y-2 text-sm text-slate-700 font-sans">
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> <?php echo $t('m025'); ?></li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Max for Live 8</li>
                        <li class="mt-3 text-xs text-slate-500 border-t border-slate-100 pt-2">
                            <?php echo $t('m026'); ?>
                        </li>
                    </ul>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                    <div class="flex items-center gap-2 text-sm font-semibold text-slate-800">
                        <i data-lucide="sparkles" class="w-4 h-4 text-primary"></i> <?php echo $t('m027'); ?>
                    </div>
                    <ul class="space-y-2 text-sm text-slate-700 list-disc pl-4 marker:text-primary font-sans">
                        <li><?php echo $t('m028'); ?></li>
                        <li><?php echo $t('m029'); ?></li>
                        <li><?php echo $t('m030'); ?></li>
                        <li><?php echo $t('m031'); ?></li>
                        <li><?php echo $t('m032'); ?></li>
                    </ul>
                </div>
            </aside>
        </div>
    </section>
</main>

	<?php
}
