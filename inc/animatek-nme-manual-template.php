<?php
/**
 * Manual de usuario de Animatek NME.
 *
 * El contenido no se escribe aquí: vive en manual/*.md del repositorio
 * Animatek-NME y se vuelca a inc/animatek-nme-manual-data.php con
 * `python3 tools/build-web-manual.py`. Este archivo es solo la página.
 */

function animatek_nme_manual_data(): array {
	static $data = null;

	if ( null === $data ) {
		$path = get_theme_file_path( 'inc/animatek-nme-manual-data.php' );
		$data = is_readable( $path ) ? (array) require $path : [];
	}

	return $data;
}

/**
 * Iconos del manual. Mismo trazo y misma rejilla de 24 que los de la landing,
 * para que las dos páginas se lean como una sola familia.
 */
function animatek_nme_manual_icon( string $icon, string $class = 'h-4 w-4' ): string {
	$icons = [
		'book'     => '<path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z"/>',
		'open'     => '<path d="M8 19c5.5-1.2 9-5.3 9-11V5h-3C8.3 5 4.2 8.5 3 14c2.7-.5 4.5.2 5 5Z"/><path d="M9 15 4 20"/><path d="M13 8h3v3"/>',
		'canvas'   => '<rect x="3" y="4" width="18" height="16" rx="2"/><path d="M8 9h3v3H8z"/><path d="M14 12h2"/><path d="M11 10.5h3"/>',
		'patch'    => '<rect x="4" y="4" width="16" height="16" rx="2"/><path d="M8 8h3v3H8z"/><path d="M13 13h3v3h-3z"/><path d="M11 9.5h2.5a2.5 2.5 0 0 1 0 5H11"/>',
		'midi'     => '<path d="M5 8v8"/><path d="M9 6v12"/><path d="M15 6v12"/><path d="M19 8v8"/><path d="M3 12h18"/>',
		'window'   => '<rect x="4" y="5" width="16" height="14" rx="2"/><path d="M4 9h16"/><path d="M8 13h4"/><path d="M14 13h2"/>',
		'notes'    => '<path d="M6 3h9l3 3v15H6z"/><path d="M14 3v4h4"/><path d="M9 12h6"/><path d="M9 16h4"/>',
		'keyboard' => '<rect x="3" y="7" width="18" height="10" rx="2"/><path d="M7 7v10"/><path d="M11 7v10"/><path d="M15 7v10"/><path d="M19 7v10"/>',
		'help'     => '<circle cx="12" cy="12" r="9"/><path d="M9.5 9.5a2.5 2.5 0 1 1 3.4 2.3c-.6.3-.9.8-.9 1.4v.3"/><path d="M12 17h.01"/>',
		'code'     => '<path d="m9 18-6-6 6-6"/><path d="m15 6 6 6-6 6"/><path d="m14 4-4 16"/>',
	];

	$inner = $icons[ $icon ] ?? $icons['book'];

	return '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr( $class ) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $inner . '</svg>';
}

function animatek_nme_manual_render_page( string $locale = 'es' ): void {
	if ( ! function_exists( 'animatek_vcv_modules_nav' ) ) {
		require_once get_theme_file_path( 'inc/animatek-vcv-module-template.php' );
	}

	$is_en = 'en' === $locale;
	$data  = animatek_nme_manual_data();

	$chapters = $data['chapters'][ $locale ] ?? $data['chapters']['en'] ?? [];
	$version  = $data['version'] ?? '';

	$patreon_url = 'https://www.patreon.com/c/animatek';
	$github_url  = 'https://github.com/animatek/Animatek-NME';

	$copy = $is_en ? [
		'badge'       => trim( 'User manual · v' . $version, ' ·v' ) ?: 'User manual',
		'title'       => 'Manual',
		'subtitle'    => 'Animatek NME · Nord Modular Editor G1',
		'lead'        => 'Everything the editor does: installing it, connecting your synth, editing patches, working with the four slots, and the file formats it uses. Nine chapters, written to be read once end to end and dipped into afterwards.',
		'toc'         => 'Chapters',
		'lang_label'  => 'ES',
		'lang_url'    => home_url( '/animatek-nme/manual/' ),
		'back_label'  => 'Animatek NME',
		'back_url'    => home_url( '/animatek-nme-eng/' ),
		'disclaimer'  => 'Nord Modular is a trademark of Clavia DMI AB. This project is an independent, community-developed editor and is not affiliated with or endorsed by Clavia.',
		'cta_title'   => 'Do you own a Nord Modular G1 and want to try the editor?',
		'cta_body'    => 'Animatek NME is in active development. You can support the project and get the builds through Patreon, or follow the code and report issues on GitHub.',
		'cta_patreon' => 'Become a supporter',
		'cta_github'  => 'View on GitHub',
		'foot'        => 'This manual covers Animatek NME %s. It is also in the repository, under manual/.',
		'empty'       => 'The manual has not been generated yet.',
	] : [
		'badge'       => trim( 'Manual de usuario · v' . $version, ' ·v' ) ?: 'Manual de usuario',
		'title'       => 'Manual',
		'subtitle'    => 'Animatek NME · Nord Modular Editor G1',
		'lead'        => 'Todo lo que hace el editor: instalarlo, conectar el sintetizador, editar patches, trabajar con los cuatro slots, y los formatos de archivo que usa. Nueve capítulos, pensados para leer del tirón la primera vez y consultar por partes después.',
		'toc'         => 'Capítulos',
		'lang_label'  => 'EN',
		'lang_url'    => home_url( '/animatek-nme-eng/manual/' ),
		'back_label'  => 'Animatek NME',
		'back_url'    => home_url( '/animatek-nme/' ),
		'disclaimer'  => 'Nord Modular es una marca registrada de Clavia DMI AB. Este proyecto es un editor independiente desarrollado por la comunidad y no está afiliado ni respaldado por Clavia.',
		'cta_title'   => '¿Tienes un Nord Modular G1 y quieres probar el editor?',
		'cta_body'    => 'Animatek NME está en desarrollo activo. Puedes apoyar el proyecto y acceder a las builds desde Patreon, o seguir el código y reportar issues en GitHub.',
		'cta_patreon' => 'Convertirse en supporter',
		'cta_github'  => 'Ver en GitHub',
		'foot'        => 'Manual correspondiente a Animatek NME %s. También está en el repositorio, en manual/.',
		'empty'       => 'El manual todavía no se ha generado.',
	];

	// Un icono por capítulo, en orden de lectura.
	$chapter_icons = [ 'open', 'canvas', 'patch', 'midi', 'window', 'notes', 'keyboard', 'help', 'code' ];

	$button_base      = 'inline-flex min-h-11 items-center justify-center rounded-full px-5 py-3 text-sm font-extrabold leading-none transition duration-200 hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2';
	$button_primary   = $button_base . ' bg-[#FF424D] text-white shadow-lg hover:bg-[#e63844] focus:ring-[#FF424D] focus:ring-offset-white';
	$button_secondary = $button_base . ' border border-slate-300 bg-white text-slate-900 shadow-sm hover:bg-slate-100 focus:ring-slate-400 focus:ring-offset-white';
	$button_lang      = 'inline-flex min-h-9 items-center justify-center gap-1.5 rounded-md border border-slate-200 bg-white px-3 py-1.5 text-xs font-bold leading-none text-slate-700 transition hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-primary/40';
	$pill_neutral     = 'inline-flex items-center rounded-md border border-slate-300 px-3 py-1.5 text-xs font-black uppercase tracking-widest text-slate-600';
	?>

	<style>
	/* Estados del índice. Valores directos de la paleta oscura del sitio:
	   dark.css remapea utilidades, no clases propias como estas. */
	#nme-manual-toc a .nme-toc-icon { background-color: #0f172a; color: #94a3b8; }
	#nme-manual-toc a:hover .nme-toc-icon { color: #e2e8f0; }
	#nme-manual-toc a:hover .nme-toc-title { color: #ffffff; }
	#nme-manual-toc a.is-current .nme-toc-icon { background-color: rgba( 244, 211, 94, 0.14 ); color: #F4D35E; }
	#nme-manual-toc a.is-current .nme-toc-title { color: #F4D35E; }
	#nme-manual-toc a:focus-visible { outline: 2px solid #2C7FFF; outline-offset: 3px; border-radius: 6px; }
	</style>

	<main id="primary" class="bg-slate-50 text-slate-900">

		<section class="relative overflow-hidden border-b border-slate-300 bg-slate-50">
			<div class="hero-grid pointer-events-none absolute inset-0 opacity-40" aria-hidden="true"></div>
			<div class="relative mx-auto max-w-7xl px-6 py-12 sm:px-10 lg:py-16">

				<div class="mb-8 flex flex-wrap items-center gap-3">
					<div class="animatek-nme-software-nav">
						<?php animatek_vcv_modules_nav( $is_en ? 'animatek-nme-eng' : 'animatek-nme', $is_en ? 'en' : 'es' ); ?>
					</div>
					<a href="<?php echo esc_url( $copy['back_url'] ); ?>" class="<?php echo esc_attr( $button_lang ); ?>">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
							<path d="M19 12H5"/><path d="m12 19-7-7 7-7"/>
						</svg>
						<?php echo esc_html( $copy['back_label'] ); ?>
					</a>
					<a href="<?php echo esc_url( $copy['lang_url'] ); ?>" class="<?php echo esc_attr( $button_lang ); ?>">
						<span><?php echo esc_html( $copy['lang_label'] ); ?></span>
						<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
							<circle cx="12" cy="12" r="9"/><path d="M3 12h18"/><path d="M12 3c2.5 3.5 2.5 14 0 18"/>
						</svg>
					</a>
				</div>

				<div class="flex flex-col gap-5">
					<div>
						<span class="<?php echo esc_attr( $pill_neutral ); ?>"><?php echo esc_html( $copy['badge'] ); ?></span>
					</div>
					<div class="space-y-2">
						<h1 class="text-5xl font-black leading-none tracking-tight text-slate-900 sm:text-6xl lg:text-7xl">
							<?php echo esc_html( $copy['title'] ); ?>
						</h1>
						<p class="text-xl font-bold text-[#F4D35E] sm:text-2xl"><?php echo esc_html( $copy['subtitle'] ); ?></p>
					</div>
					<p class="max-w-3xl text-lg leading-relaxed text-slate-600"><?php echo esc_html( $copy['lead'] ); ?></p>
				</div>

			</div>
		</section>

		<div class="mx-auto grid max-w-7xl items-start gap-10 px-6 py-12 sm:px-10 lg:grid-cols-[17.5rem_minmax(0,1fr)] lg:gap-16 lg:py-16">

			<aside class="lg:sticky lg:top-6 lg:self-start" aria-label="<?php echo esc_attr( $copy['toc'] ); ?>">
				<nav class="rounded-lg border border-slate-300 bg-white p-5 shadow-sm lg:max-h-[calc(100vh-3rem)] lg:overflow-y-auto">
					<h2 class="mb-5 flex items-center gap-3 text-lg font-black text-slate-900">
						<span class="inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-md bg-slate-100 text-[#F4D35E]">
							<?php echo animatek_nme_manual_icon( 'book', 'h-5 w-5' ); ?>
						</span>
						<?php echo esc_html( $copy['toc'] ); ?>
					</h2>

					<div class="flex flex-col gap-3" id="nme-manual-toc">
						<?php foreach ( $chapters as $index => $chapter ) : ?>
							<a href="#<?php echo esc_attr( $chapter['id'] ); ?>"
								class="grid grid-cols-[1.75rem_minmax(0,1fr)] items-center gap-3">
								<span class="nme-toc-icon inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-md bg-slate-100 text-slate-700 transition">
									<?php echo animatek_nme_manual_icon( $chapter_icons[ $index ] ?? 'book' ); ?>
								</span>
								<span class="nme-toc-title min-w-0 text-sm font-extrabold leading-snug text-slate-900 transition">
									<?php echo esc_html( $chapter['title'] ); ?>
								</span>
							</a>
						<?php endforeach; ?>
					</div>

					<p class="mt-6 border-t border-slate-200 pt-5 text-xs leading-relaxed text-slate-500">
						<?php echo esc_html( $copy['disclaimer'] ); ?>
					</p>
				</nav>
			</aside>

			<div class="flex max-w-3xl flex-col gap-14">
				<?php if ( empty( $chapters ) ) : ?>
					<p class="text-slate-600"><?php echo esc_html( $copy['empty'] ); ?></p>
				<?php endif; ?>

				<?php foreach ( $chapters as $chapter ) : ?>
					<section id="<?php echo esc_attr( $chapter['id'] ); ?>" class="nme-manual-chapter scroll-mt-6">
						<p class="font-mono text-sm font-bold tracking-wide text-[#F4D35E]">
							<?php echo esc_html( ( $is_en ? 'Chapter ' : 'Capítulo ' ) . $chapter['num'] ); ?>
						</p>
						<h2 class="mt-1 mb-5 text-3xl font-black leading-tight tracking-tight text-slate-900 sm:text-4xl">
							<?php echo esc_html( $chapter['title'] ); ?>
						</h2>
						<?php
						// Generated from the manual's markdown; the generator escapes
						// every value it interpolates, so this is intentionally raw.
						echo $chapter['html']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						?>
					</section>
				<?php endforeach; ?>
			</div>

		</div>

		<section class="border-t border-slate-300 bg-white">
			<div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-6 px-6 py-10 sm:px-10">
				<div>
					<h2 class="text-2xl font-black text-slate-900"><?php echo esc_html( $copy['cta_title'] ); ?></h2>
					<p class="mt-2 max-w-3xl text-base leading-relaxed text-slate-700"><?php echo esc_html( $copy['cta_body'] ); ?></p>
				</div>
				<div class="flex flex-wrap gap-3">
					<a href="<?php echo esc_url( $patreon_url ); ?>" target="_blank" rel="noopener noreferrer" class="<?php echo esc_attr( $button_primary ); ?>">
						<?php echo esc_html( $copy['cta_patreon'] ); ?>
					</a>
					<a href="<?php echo esc_url( $github_url ); ?>" target="_blank" rel="noopener noreferrer" class="<?php echo esc_attr( $button_secondary ); ?>">
						<?php echo esc_html( $copy['cta_github'] ); ?>
					</a>
				</div>
			</div>
		</section>

		<div class="mx-auto max-w-7xl px-6 pb-12 pt-6 sm:px-10">
			<p class="border-t border-slate-200 pt-6 text-xs leading-relaxed text-slate-500">
				<?php echo esc_html( sprintf( $copy['foot'], $version ) ); ?>
			</p>
		</div>
	</main>

	<script>
	( function () {
		var toc = document.getElementById( 'nme-manual-toc' );
		var sections = document.querySelectorAll( '.nme-manual-chapter' );

		if ( ! toc || ! sections.length || ! ( 'IntersectionObserver' in window ) ) {
			return;
		}

		var links = {};
		Array.prototype.forEach.call( toc.querySelectorAll( 'a' ), function ( a ) {
			links[ a.getAttribute( 'href' ).slice( 1 ) ] = a;
		} );

		var visible = {};

		function paint() {
			var current = '';
			Array.prototype.forEach.call( sections, function ( section ) {
				if ( ! current && visible[ section.id ] ) {
					current = section.id;
				}
			} );
			Object.keys( links ).forEach( function ( id ) {
				links[ id ].classList.toggle( 'is-current', id === current );
			} );
		}

		var observer = new IntersectionObserver( function ( entries ) {
			entries.forEach( function ( entry ) {
				visible[ entry.target.id ] = entry.isIntersecting;
			} );
			paint();
		}, { rootMargin: '0px 0px -70% 0px', threshold: 0 } );

		Array.prototype.forEach.call( sections, function ( section ) {
			observer.observe( section );
		} );
	}() );
	</script>
	<?php
}
