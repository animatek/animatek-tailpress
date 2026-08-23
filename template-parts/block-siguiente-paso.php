<?php
/**
 * Bloque "por dónde sigo" — la escalera del catálogo.
 *
 * Pensado para el final de los recursos gratuitos (los Labs, el ebook, posts
 * largos): quien acaba de leer una guía entera es quien más cerca está de
 * querer un curso, y hasta ahora ahí no había nada.
 *
 * Uso por defecto (escalera de VCV Rack):
 *     get_template_part( 'template-parts/block-siguiente-paso' );
 *
 * Eligiendo qué cursos y en qué orden:
 *     get_template_part( 'template-parts/block-siguiente-paso', null, array(
 *         'cursos' => array( 'bitwig', 'uzz' ),
 *         'intro'  => 'Texto de entrada a medida.',
 *     ) );
 *
 * Claves disponibles: vcv-rack · patch-lab · bitwig · uzz
 *
 * NO lleva precios a propósito. El precio ya vive en SureCart, en TutorLMS y en
 * el array de page-academia.php; meterlo aquí sería un cuarto sitio que se
 * desincroniza. Los enlaces llevan a páginas donde el precio siempre es el
 * correcto.
 *
 * @package Animatek
 */

defined( 'ABSPATH' ) || exit;

$animatek_catalogo = array(
	'vcv-rack'  => array(
		'titulo'   => 'Curso VCV Rack desde cero',
		'gancho'   => 'Los fundamentos',
		'texto'    => 'Qué hace cada módulo y por qué. Osciladores, filtros, VCA, envolventes y control por voltaje, construyendo una voz completa paso a paso. Si el Lab te ha dejado con ganas pero con dudas, empieza aquí.',
		'url'      => 'https://animatek.net/cursos/vcv-rack-desde-cero/',
		'cta'      => 'Ver el curso',
		'etiqueta' => 'Empieza aquí',
		'et_cls'   => 'bg-amber-400 text-amber-950',
	),
	'patch-lab' => array(
		'titulo'   => 'Patch Lab 01',
		'gancho'   => 'Cinco patches terminados',
		'texto'    => 'Ya sabes lo que hace un VCA y aun así no terminas nada. Aquí se montan cinco patches enteros delante de ti —techno, dos generativos y un drone— con los archivos .vcv y dos plantillas para que los abras y los rompas.',
		'url'      => 'https://animatek.net/patch-lab-01/',
		'cta'      => 'Ver el curso',
		'etiqueta' => 'El siguiente paso',
		'et_cls'   => 'bg-primary text-white',
	),
	'bitwig'    => array(
		'titulo'   => 'Curso Bitwig Studio',
		'gancho'   => 'El DAW, de cero y bien hecho',
		'texto'    => 'Pistas, clips, dispositivos y el flujo de trabajo oficial de Bitwig, por un Certified Trainer. Está en producción y se publica por bloques: si entras ahora, entras como alumno fundador y recibes las lecciones según salen.',
		'url'      => 'https://animatek.net/curso-bitwig-studio/',
		'cta'      => 'Ver el curso',
		'etiqueta' => 'Empieza aquí',
		'et_cls'   => 'bg-amber-400 text-amber-950',
	),
	'uzz'       => array(
		'titulo'   => 'Curso UZZ',
		'gancho'   => 'Gratis, 16 lecciones',
		'texto'    => 'UZZ es un secuenciador por pasos que hice yo, y no existe otra formación sobre él en ningún sitio. Funciona en Bitwig, en Ableton y en VCV Rack. El curso es gratuito y no pide tarjeta.',
		'url'      => 'https://animatek.net/cursos/curso-uzz/',
		'cta'      => 'Empezar gratis',
		'etiqueta' => 'Gratis',
		'et_cls'   => 'bg-green-500 text-white',
	),
);

$animatek_claves = isset( $args['cursos'] ) && is_array( $args['cursos'] )
	? $args['cursos']
	: array( 'vcv-rack', 'patch-lab' );

$animatek_pasos = array();
foreach ( $animatek_claves as $clave ) {
	if ( isset( $animatek_catalogo[ $clave ] ) ) {
		$animatek_pasos[] = $animatek_catalogo[ $clave ];
	}
}

if ( empty( $animatek_pasos ) ) {
	return;
}

$animatek_titulo = $args['titulo'] ?? __( '¿Y ahora por dónde sigo?', 'animatek' );
$animatek_intro  = $args['intro'] ?? 'El Lab es gratis y lo seguirá siendo: con esto ya puedes moverte sin perderte. Si prefieres un camino ordenado en vez de ir picoteando, esto es la continuación natural.';
$animatek_cierre = $args['cierre'] ?? 'Si prefieres seguir por libre, el Lab y el canal de YouTube se quedan donde están: no hace falta que compres nada para seguir aprendiendo.';
?>

<section class="max-w-7xl mx-auto px-6 mb-[6.25rem]">
	<div class="bg-white rounded-[1.75rem] border border-slate-200 dark:border-slate-700/50 shadow-sm overflow-hidden p-8 sm:p-12">

		<h2 class="mb-4 flex items-center gap-3">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-primary" aria-hidden="true">
				<path stroke-linecap="round" stroke-linejoin="round" d="M3 19.5l6-6 4 4 8-8M15 5.5h5v5" />
			</svg>
			<?php echo esc_html( $animatek_titulo ); ?>
		</h2>

		<p class="text-slate-600 dark:text-slate-300 leading-relaxed mb-8 max-w-3xl">
			<?php echo esc_html( $animatek_intro ); ?>
		</p>

		<div class="grid grid-cols-1 gap-8 <?php echo count( $animatek_pasos ) > 1 ? 'md:grid-cols-2' : ''; ?>">
			<?php foreach ( $animatek_pasos as $indice => $paso ) : ?>
				<div class="group flex flex-col overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-primary/40 hover:shadow-lg hover:shadow-primary/10 dark:border-slate-700/50 dark:bg-slate-800/40">

					<div class="mb-4 flex items-center gap-3">
						<span class="w-8 h-8 rounded-full bg-primary/10 text-primary text-sm font-bold flex items-center justify-center">
							<?php echo esc_html( str_pad( (string) ( $indice + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
						</span>
						<span class="rounded-full px-3 py-1 text-[11px] font-bold uppercase tracking-[0.12em] <?php echo esc_attr( $paso['et_cls'] ); ?>">
							<?php echo esc_html( $paso['etiqueta'] ); ?>
						</span>
					</div>

					<h3 class="text-xl font-bold text-slate-900 dark:text-white">
						<?php echo esc_html( $paso['titulo'] ); ?>
					</h3>
					<p class="mt-1 text-sm font-semibold text-primary">
						<?php echo esc_html( $paso['gancho'] ); ?>
					</p>

					<p class="mt-3 text-slate-600 dark:text-slate-300 leading-relaxed text-[15px]">
						<?php echo esc_html( $paso['texto'] ); ?>
					</p>

					<div class="mt-6 pt-4 border-t border-slate-200 dark:border-slate-700/50">
						<a href="<?php echo esc_url( $paso['url'] ); ?>" class="btn-primary text-sm">
							<?php echo esc_html( $paso['cta'] ); ?>
							<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7 7 7-7 7" />
							</svg>
						</a>
					</div>

				</div>
			<?php endforeach; ?>
		</div>

		<p class="mt-8 text-sm leading-relaxed text-slate-500 dark:text-slate-400">
			<?php echo esc_html( $animatek_cierre ); ?>
		</p>

	</div>
</section>
