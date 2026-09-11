<?php
/**
 * Enrutador "¿Por dónde empiezo?".
 *
 * Dos preguntas y una lista curada. Vive en dos sitios con el mismo contenido
 * (inc/animatek-empezar.php) y distinto papel:
 *
 *   'publico'  — la página /empezar/, que es el enlace de las descripciones de
 *                YouTube. Ahí cada resultado empuja al Lab, que es lo único de
 *                todo esto que deja un correo en la lista.
 *   'lab'      — dentro del propio Lab, sustituyendo la lista plana de
 *                tutoriales recomendados. Ahí el Lab ya no se anuncia (estás
 *                dentro): su tarjeta se cambia por un salto al capítulo que
 *                responde a esa pregunta.
 *
 * Uso:
 *     get_template_part( 'template-parts/block-enrutador', null, array(
 *         'contexto' => 'lab',   // 'publico' por defecto
 *         'lab'      => 'vcv',   // en qué Lab estamos, para no anunciarlo
 *     ) );
 *
 * Los vídeos se abren dentro de la página, no en YouTube: mandar fuera a quien
 * acaba de decirte qué necesita es regalar la visita.
 *
 * @package Animatek
 */

defined( 'ABSPATH' ) || exit;

require_once get_theme_file_path( 'inc/animatek-empezar.php' );
require_once get_theme_file_path( 'inc/animatek-cursos.php' );

$animatek_contexto = ( $args['contexto'] ?? 'publico' ) === 'lab' ? 'lab' : 'publico';
$animatek_lab      = $args['lab'] ?? '';
$animatek_id       = 'enrutador-' . $animatek_contexto;

// Nivel de los titulares: en /empezar/ cuelgan del h1 del hero; dentro del Lab,
// del h2 de la sección. Saltarse un nivel se nota con lector de pantalla.
$animatek_h  = in_array( $args['nivel'] ?? '', array( 'h2', 'h3', 'h4' ), true ) ? $args['nivel'] : 'h3';
$animatek_h2 = 'h2' === $animatek_h ? 'h3' : 'h4';

$animatek_pasos      = animatek_empezar_pasos();
$animatek_resultados = animatek_empezar_resultados();

// La URL del Lab en el que estamos: su tarjeta no se pinta, se cambia por el salto.
$animatek_lab_propio = 'vcv' === $animatek_lab ? '/vcvrack-lab/' : ( 'bitwig' === $animatek_lab ? '/bitwig-lab/' : '' );
?>

<div
	class="enrutador"
	id="<?php echo esc_attr( $animatek_id ); ?>"
	data-enrutador
	<?php
	// Solo la página pública escribe el resultado en la URL: dentro del Lab el
	// hash es de las secciones de la guía y no se le pisa.
	echo 'publico' === $animatek_contexto ? 'data-hash="1"' : '';
	?>>

	<?php foreach ( $animatek_pasos as $animatek_clave => $animatek_paso ) : ?>
		<section
			class="empezar-panel"
			id="<?php echo esc_attr( $animatek_id . '-paso-' . $animatek_clave ); ?>"
			data-panel="paso-<?php echo esc_attr( $animatek_clave ); ?>"
			<?php echo 'inicio' === $animatek_clave ? '' : 'hidden'; ?>>

			<p class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-500">
				<?php printf( esc_html__( 'Paso %d de 2', 'animatek' ), (int) $animatek_paso['paso'] ); ?>
			</p>
			<<?php echo $animatek_h; ?> class="mt-2 mb-8 text-2xl sm:text-3xl font-black tracking-tight">
				<?php echo esc_html( $animatek_paso['pregunta'] ); ?>
			</<?php echo $animatek_h; ?>>

			<div class="grid gap-3">
				<?php foreach ( $animatek_paso['opciones'] as $animatek_opcion ) : ?>
					<button
						type="button"
						class="empezar-opcion"
						data-ir="<?php echo esc_attr( isset( $animatek_opcion['siguiente'] ) ? 'paso-' . $animatek_opcion['siguiente'] : 'res-' . $animatek_opcion['resultado'] ); ?>">
						<span class="empezar-opcion__num"><?php echo esc_html( $animatek_opcion['num'] ); ?></span>
						<span class="empezar-opcion__texto">
							<span class="empezar-opcion__titulo"><?php echo esc_html( $animatek_opcion['texto'] ); ?></span>
							<span class="empezar-opcion__detalle"><?php echo esc_html( $animatek_opcion['detalle'] ); ?></span>
						</span>
						<svg class="empezar-opcion__flecha" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6" /></svg>
					</button>
				<?php endforeach; ?>
			</div>

			<?php if ( 'inicio' !== $animatek_clave ) : ?>
				<button type="button" class="empezar-volver" data-volver>
					<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M11 18l-6-6 6-6" /></svg>
					<?php esc_html_e( 'Volver', 'animatek' ); ?>
				</button>
			<?php endif; ?>
		</section>
	<?php endforeach; ?>

	<?php foreach ( $animatek_resultados as $animatek_clave => $animatek_res ) : ?>
		<section
			class="empezar-panel"
			id="<?php echo esc_attr( $animatek_id . '-res-' . $animatek_clave ); ?>"
			data-panel="res-<?php echo esc_attr( $animatek_clave ); ?>"
			hidden>

			<p class="text-[11px] font-bold uppercase tracking-[0.2em] text-primary"><?php esc_html_e( 'Tu camino', 'animatek' ); ?></p>
			<<?php echo $animatek_h; ?> class="mt-2 text-2xl sm:text-3xl font-black tracking-tight">
				<?php echo esc_html( $animatek_res['titulo'] ); ?>
			</<?php echo $animatek_h; ?>>
			<p class="mt-3 max-w-2xl leading-relaxed text-slate-600">
				<?php echo esc_html( $animatek_res['texto'] ); ?>
			</p>

			<?php
			// Dentro del Lab, su propia tarjeta sobra: se cambia por el salto al capítulo.
			$animatek_enlaces = array();
			$animatek_salto   = 0;

			foreach ( $animatek_res['enlaces'] ?? array() as $animatek_enlace ) {
				if ( $animatek_lab_propio && $animatek_lab_propio === $animatek_enlace['url'] ) {
					$animatek_salto = (int) ( $animatek_res['seccion'] ?? 0 );
					continue;
				}

				$animatek_enlaces[] = $animatek_enlace;
			}
			?>

			<?php if ( $animatek_salto ) : ?>
				<?php
				// La 12 es la de descargas y ya tenía su propia ancla de antes:
				// no se le cambia, que está enlazada desde fuera.
				$animatek_ancla = 12 === $animatek_salto ? '#descargas' : '#seccion-' . $animatek_salto;
				?>
				<a class="empezar-salto" href="<?php echo esc_attr( $animatek_ancla ); ?>">
					<span class="empezar-salto__num"><?php echo (int) $animatek_salto; ?></span>
					<span>
						<?php esc_html_e( 'Ir a esa sección de la guía', 'animatek' ); ?>
						<small><?php esc_html_e( 'Ya la tienes desbloqueada, más arriba en esta página.', 'animatek' ); ?></small>
					</span>
					<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M6 13l6 6 6-6" /></svg>
				</a>
			<?php endif; ?>

			<?php if ( $animatek_enlaces ) : ?>
				<div class="mt-8 grid gap-3 <?php echo count( $animatek_enlaces ) > 1 ? 'sm:grid-cols-2' : ''; ?>">
					<?php foreach ( $animatek_enlaces as $animatek_enlace ) : ?>
						<?php $animatek_puerta = ! empty( $animatek_enlace['correo'] ); ?>
						<a class="empezar-recurso<?php echo $animatek_puerta ? ' empezar-recurso--puerta' : ''; ?>" href="<?php echo esc_url( home_url( $animatek_enlace['url'] ) ); ?>">
							<span class="empezar-recurso__etiqueta">
								<?php echo $animatek_puerta ? esc_html__( 'Guía completa · gratis', 'animatek' ) : esc_html__( 'Gratis', 'animatek' ); ?>
							</span>
							<span class="empezar-recurso__titulo"><?php echo esc_html( $animatek_enlace['titulo'] ); ?></span>
							<span class="empezar-recurso__texto"><?php echo esc_html( $animatek_enlace['texto'] ); ?></span>
							<?php if ( $animatek_puerta ) : ?>
								<span class="empezar-recurso__nota">
									<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75A2.25 2.25 0 0 1 4.5 4.5h15a2.25 2.25 0 0 1 2.25 2.25Z"></path><path d="M21.75 7.017a2.25 2.25 0 0 1-1.02 1.89l-6.75 4.5a2.25 2.25 0 0 1-2.46 0l-6.75-4.5a2.25 2.25 0 0 1-1.02-1.89"></path></svg>
									<?php esc_html_e( 'Se abre con tu correo. Nada de spam, y te sales cuando quieras.', 'animatek' ); ?>
								</span>
							<?php endif; ?>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $animatek_res['videos'] ) ) : ?>
				<<?php echo $animatek_h2; ?> class="mt-10 mb-4 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-500">
					<?php esc_html_e( 'En este orden', 'animatek' ); ?>
				</<?php echo $animatek_h2; ?>>
				<ol class="empezar-videos">
					<?php foreach ( $animatek_res['videos'] as $animatek_i => $animatek_video ) : ?>
						<li>
							<button type="button" class="empezar-video" data-video="<?php echo esc_attr( $animatek_video['id'] ); ?>">
								<span class="empezar-video__miniatura">
									<img
										src="https://i.ytimg.com/vi/<?php echo esc_attr( $animatek_video['id'] ); ?>/mqdefault.jpg"
										alt="" width="320" height="180" loading="lazy" decoding="async" />
									<span class="empezar-video__play" aria-hidden="true">
										<svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z" /></svg>
									</span>
								</span>
								<span class="empezar-video__cuerpo">
									<span class="empezar-video__titulo">
										<span class="empezar-video__num"><?php echo esc_html( sprintf( '%02d', $animatek_i + 1 ) ); ?></span>
										<?php echo esc_html( $animatek_video['titulo'] ); ?>
									</span>
									<span class="empezar-video__meta">
										<?php if ( $animatek_video['min'] >= 60 ) : ?>
											<span class="empezar-video__pill"><?php esc_html_e( 'Directo', 'animatek' ); ?></span>
										<?php endif; ?>
										<?php echo esc_html( animatek_empezar_duracion( (int) $animatek_video['min'] ) ); ?>
									</span>
								</span>
							</button>
						</li>
					<?php endforeach; ?>
				</ol>
			<?php endif; ?>

			<?php
			$animatek_cursos_res = empty( $animatek_res['cursos'] )
				? array()
				: animatek_cursos_por_clave( $animatek_res['cursos'] );
			?>
			<?php if ( $animatek_cursos_res ) : ?>
				<<?php echo $animatek_h2; ?> class="mt-10 mb-4 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-500">
					<?php esc_html_e( 'Si quieres el camino ordenado', 'animatek' ); ?>
				</<?php echo $animatek_h2; ?>>
				<div class="grid gap-3 <?php echo count( $animatek_cursos_res ) > 1 ? 'sm:grid-cols-2' : ''; ?>">
					<?php foreach ( $animatek_cursos_res as $animatek_curso ) : ?>
						<a class="empezar-curso" href="<?php echo esc_url( $animatek_curso['url'] ); ?>">
							<img src="<?php echo esc_url( $animatek_curso['imagen'] ); ?>" alt="" width="96" height="96" loading="lazy" decoding="async" />
							<span class="empezar-curso__cuerpo">
								<span class="empezar-curso__etiqueta"><?php echo esc_html( $animatek_curso['etiqueta'] ); ?></span>
								<span class="empezar-curso__titulo"><?php echo esc_html( $animatek_curso['titulo'] ); ?></span>
								<span class="empezar-curso__texto"><?php echo esc_html( $animatek_curso['gancho'] ); ?></span>
							</span>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<div class="mt-10 flex flex-wrap gap-3">
				<button type="button" class="empezar-volver" data-volver>
					<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M11 18l-6-6 6-6" /></svg>
					<?php esc_html_e( 'Volver', 'animatek' ); ?>
				</button>
				<button type="button" class="empezar-volver" data-reiniciar>
					<?php esc_html_e( 'Empezar otra vez', 'animatek' ); ?>
				</button>
			</div>
		</section>
	<?php endforeach; ?>
</div>
