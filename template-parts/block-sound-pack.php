<?php
/**
 * Bloque del Sound Pack 01 — descarga gratuita.
 *
 * Vive aquí, en un template part, porque el pack va tanto en el VCV Rack Lab
 * como en el Bitwig Lab: los sonidos sirven igual en los dos sitios. Antes
 * tenía página propia (/vcv-rack-sound-pack-01/), que ahora redirige al Lab.
 *
 * Uso:
 *     get_template_part( 'template-parts/block-sound-pack' );
 *
 * El zip está en S3 y no pide registro. Si algún día se cambia de sitio,
 * se toca solo aquí y queda arreglado en los dos Labs a la vez.
 *
 * @package Animatek
 */

defined( 'ABSPATH' ) || exit;

// Carpeta pública de Google Drive. Está en Drive y no en S3 a propósito: el zip
// pesa 865 MB y servirlo desde S3 costaba dinero por cada descarga.
// Comprobado que abre sin cuenta de Google. Dentro: Animatek-ContentPack01.zip
$animatek_pack_url = 'https://drive.google.com/drive/folders/1qFnybYYz_wAs17bmcOx-VrJ7ttitYn0z';

$animatek_pack_contenido = array(
	array(
		'cantidad' => '38',
		'tipo'     => 'Drones',
		'texto'    => 'Texturas largas en C/D menor, para granular o samplear.',
	),
	array(
		'cantidad' => '9',
		'tipo'     => 'Bass loops',
		'texto'    => 'Graves listos para servir de base.',
	),
	array(
		'cantidad' => '5',
		'tipo'     => 'Kicks',
		'texto'    => 'Bombos con pegada que no ensucian la mezcla.',
	),
	array(
		'cantidad' => '6',
		'tipo'     => 'Stabs',
		'texto'    => 'Ataques melódicos para acentuar el track.',
	),
	array(
		'cantidad' => '2',
		'tipo'     => 'Hats loops',
		'texto'    => 'Ritmos de hi-hat para dar aire y movimiento.',
	),
	array(
		'cantidad' => '3',
		'tipo'     => 'Proyectos',
		'texto'    => 'Sesiones reales de Ableton: Nordmodular 01, Subs Julio 2020 y RackFArm.',
	),
);
?>

<div class="mt-8 overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 dark:border-slate-700/50 dark:bg-slate-800/40">
	<div class="p-6 sm:p-8">

		<div class="flex flex-col gap-6 items-start sm:flex-row sm:justify-between">

			<div class="max-w-2xl">
				<div class="mb-3 flex items-center gap-3">
					<span class="text-orange-600">
						<svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
							<path d="M3 10.5v3" />
							<path d="M7 6v12" />
							<path d="M11 3v18" />
							<path d="M15 7.5v9" />
							<path d="M19 5v14" />
						</svg>
					</span>
					<span class="rounded-full bg-green-100 px-3 py-1 text-xs font-bold uppercase tracking-widest text-green-700">Gratis</span>
				</div>

				<h3 class="text-xl font-bold text-slate-900 dark:text-white">Sound Pack 01</h3>
				<p class="mt-1 text-sm font-semibold text-orange-600">Texturas, loops y proyectos para arrancar ideas</p>

				<p class="mt-3 text-slate-600 dark:text-slate-300 leading-relaxed text-[15px]">
					Sonidos hechos con VCV Rack y sintetizadores modulares, listos para meter en
					cualquier DAW. No es material de relleno: son las texturas y los graves que
					uso yo cuando empiezo un tema y no quiero pelearme con el ruteo todavía.
					Sin registro ni formulario.
				</p>

				<p class="mt-3 text-sm text-slate-500 dark:text-slate-400">
					Un zip de <strong class="font-bold text-slate-700 dark:text-slate-300">865 MB</strong>
					alojado en Google Drive. Mejor bájalo por wifi y con calma.
				</p>
			</div>

			<a href="<?php echo esc_url( $animatek_pack_url ); ?>" class="btn-primary shrink-0 text-sm" target="_blank" rel="noopener">
				Descargar el pack
				<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
					<path stroke-linecap="round" stroke-linejoin="round" d="M12 4v12m0 0-4-4m4 4 4-4M4 20h16" />
				</svg>
			</a>

		</div>

		<div class="mt-6 grid grid-cols-1 gap-4 border-t border-slate-200 pt-6 sm:grid-cols-2 lg:grid-cols-3 dark:border-slate-700/50">
			<?php foreach ( $animatek_pack_contenido as $item ) : ?>
				<div class="flex gap-3">
					<span class="shrink-0 font-mono text-lg font-bold tabular-nums text-orange-600">
						<?php echo esc_html( $item['cantidad'] ); ?>
					</span>
					<div>
						<p class="text-sm font-bold text-slate-900 dark:text-white"><?php echo esc_html( $item['tipo'] ); ?></p>
						<p class="text-sm leading-relaxed text-slate-600 dark:text-slate-400"><?php echo esc_html( $item['texto'] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<p class="mt-6 text-sm leading-relaxed text-slate-500 dark:text-slate-400">
			<strong class="font-bold text-slate-700 dark:text-slate-300">Para sacarle partido:</strong>
			mete los drones en tu sampler (Simpler, Digitakt, Octatrack), gránulalos o mapea los
			puntos de inicio y fin. Los bajos, filtrados entre 80 y 120 Hz y en mono, para dejarle
			el subgrave al bombo.
		</p>

	</div>
</div>
