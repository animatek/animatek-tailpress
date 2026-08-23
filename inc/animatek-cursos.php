<?php
/**
 * Catálogo de cursos — punto único de verdad del tema.
 *
 * Antes esto estaba escrito tres veces: el array $cursos de page-academia.php,
 * el catálogo de block-siguiente-paso.php y las tarjetas a mano de
 * block-explora.php. El 2026-08-23 eso dejó a la Academia anunciando 45 €
 * mientras el checkout cobraba 19 €.
 *
 * A partir de aquí, para cambiar un precio o un texto se toca este archivo.
 *
 * OJO: el precio de aquí es el que se ENSEÑA. Quien COBRA es SureCart, y
 * TutorLMS tiene además su propio campo de precio. Los tres tienen que decir lo
 * mismo y no se sincronizan solos.
 *
 * @package Animatek
 */

defined( 'ABSPATH' ) || exit;

/**
 * Todos los cursos, en el orden en que se muestran.
 *
 * Campos:
 *   titulo / subtitulo   Nombre y frase corta.
 *   gancho               Frase de una línea para las tarjetas compactas.
 *   imagen / alt         Portada cuadrada (1600x1600).
 *   texto                Descripción larga (Academia).
 *   texto_corto          Descripción para bloques compactos (Labs).
 *   badge / badge_cls    Etiqueta sobre la portada.
 *   etiqueta / et_cls    Etiqueta de la escalera ("Empieza aquí"…).
 *   meta                 Hasta 3 datos: lecciones, duración, nivel.
 *   precio               Número en euros, o null si es gratis.
 *   precio_antes         Precio normal cuando hay oferta. Al caducar pasa a ser
 *                        el precio que se muestra: la subida es automática.
 *   oferta_texto         Nombre de la oferta ("Precio fundador").
 *   oferta_hasta         Último día, 'Y-m-d'. Vacío = sin oferta.
 *   destacado            true para resaltarlo con borde de color.
 *   url / cta            Destino y texto del botón.
 *   en_academia          false para no listarlo en /academia/.
 *
 * @return array<string,array<string,mixed>> Catálogo indexado por clave.
 */
function animatek_cursos(): array {
	static $cursos = null;

	if ( null !== $cursos ) {
		return $cursos;
	}

	$cursos = array(

		'patch-lab' => array(
			'titulo'       => 'Patch Lab 01',
			'subtitulo'    => '5 patches completos de VCV Rack, de cero a sonando',
			'gancho'       => 'Cinco patches terminados',
			'imagen'       => 'https://animatek.net/wp-content/uploads/2026/08/04-patch-lab-01-portada-1600.webp',
			'alt'          => 'Patch Lab 01, curso de VCV Rack de Animatek',
			'texto'        => 'Cinco patches construidos delante de ti, cable a cable: una plantilla base de techno, un track completo, dos sistemas autogenerativos y un drone armónico. Incluye los archivos .vcv para abrirlos, romperlos y hacerlos tuyos.',
			'texto_corto'  => 'Ya sabes lo que hace un VCA y aun así no terminas nada. Aquí se montan cinco patches enteros delante de ti —techno, dos generativos y un drone— con los archivos .vcv y dos plantillas para que los abras y los rompas.',
			'badge'        => 'Nuevo',
			'badge_cls'    => 'bg-primary text-white shadow',
			'etiqueta'     => 'El siguiente paso',
			'et_cls'       => 'bg-primary text-white',
			'meta'         => array( '6 lecciones', '2h 07 de vídeo', 'Intermedio' ),
			// 19 € es el precio, no una oferta: sin precio_antes ni fecha, así no
			// sale tachado ni con cuenta atrás. Cuadra con SureCart.
			'precio'       => 19,
			'destacado'    => true,
			'url'          => 'https://animatek.net/patch-lab-01/',
			'cta'          => 'Ver el curso',
		),

		'vcv-rack'  => array(
			'titulo'      => 'Curso VCV Rack',
			'subtitulo'   => 'Síntesis modular desde cero, con los módulos esenciales',
			'gancho'      => 'Los fundamentos',
			'imagen'      => 'https://animatek.net/wp-content/uploads/2025/04/Curso_Cuadrada.webp',
			'alt'         => 'Curso VCV Rack desde cero',
			'texto'       => 'Fundamentos reales de síntesis con VCV Rack 2 usando solo los módulos esenciales. Construyes una voz sustractiva desde cero y entiendes voltajes, osciladores, filtros, VCA, envolventes, modulación, secuenciación y control por voltaje.',
			'texto_corto' => 'Qué hace cada módulo y por qué. Osciladores, filtros, VCA, envolventes y control por voltaje, construyendo una voz completa paso a paso. Si el Lab te ha dejado con ganas pero con dudas, empieza aquí.',
			'badge'       => 'Más vendido',
			'badge_cls'   => 'bg-amber-400 text-amber-950 shadow',
			'etiqueta'    => 'Empieza aquí',
			'et_cls'      => 'bg-amber-400 text-amber-950',
			'meta'        => array( '34 lecciones', 'Principiante', 'A tu ritmo' ),
			'precio'      => 29,
			'url'         => 'https://animatek.net/cursos/vcv-rack-desde-cero/',
			'cta'         => 'Empezar el curso',
		),

		'bitwig'    => array(
			'titulo'      => 'Bitwig desde CERO',
			'subtitulo'   => 'El DAW completo, por un Certified Trainer',
			'gancho'      => 'El DAW, de cero y bien hecho',
			'imagen'      => 'https://animatek.net/wp-content/uploads/2025/08/portada_bitwig_6_beta.webp',
			'alt'         => 'Curso Bitwig desde CERO de Animatek',
			'texto'       => 'Pistas, clips, dispositivos y el flujo de trabajo oficial de Bitwig Studio, enseñado por un Bitwig Certified Trainer. El curso se está creando en público y se publica por bloques.',
			'texto_corto' => 'Pistas, clips, dispositivos y el flujo de trabajo oficial de Bitwig, por un Certified Trainer. Está en producción y se publica por bloques: si entras ahora, entras como alumno fundador y recibes las lecciones según salen.',
			'badge'       => 'Early Access',
			'badge_cls'   => 'bg-purple-500 text-white shadow',
			'etiqueta'    => 'Empieza aquí',
			'et_cls'      => 'bg-amber-400 text-amber-950',
			'meta'        => array( 'En producción', 'Principiante', 'Por bloques' ),
			'precio'      => 29,
			'url'         => 'https://animatek.net/curso-bitwig-studio/',
			'cta'         => 'Ver la página del curso',

			// --- solo para el bloque de Early Access de la Academia ---
			// Va aparte de los tres cursos terminados para que nadie lo compre
			// creyendo que está completo. La ficha es la que cobra; la landing es
			// la que explica en qué estado está.
			'early'       => true,
			'url_compra'  => 'https://animatek.net/cursos/bitwig-desde-cero/',
			'cta_compra'  => 'Entrar como fundador',
			'fases'       => array(
				array( '29 €', 'Ahora, mientras se produce' ),
				array( '39 €', 'Semana de lanzamiento' ),
				array( '50 €', 'Precio final' ),
			),

			// Fuera de la rejilla de cursos terminados: tiene su propia sección.
			'en_academia' => false,
		),

		'uzz'       => array(
			'titulo'      => 'Curso UZZ',
			'subtitulo'   => 'El secuenciador por pasos para improvisar',
			'gancho'      => 'Gratis, 16 lecciones',
			'imagen'      => 'https://animatek.net/wp-content/uploads/2025/11/UZZ_Curso.webp',
			'alt'         => 'Curso UZZ gratis',
			'texto'       => 'Curso gratuito para dominar UZZ, el secuenciador por pasos diseñado para improvisar y crear patrones complejos con rapidez. Aprendes todas sus funciones, salidas y posibilidades dentro de Bitwig, Ableton y VCV Rack.',
			'texto_corto' => 'UZZ es un secuenciador por pasos que hice yo, y no existe otra formación sobre él en ningún sitio. Funciona en Bitwig, en Ableton y en VCV Rack. El curso es gratuito y no pide tarjeta.',
			'badge'       => 'Gratis',
			'badge_cls'   => 'bg-green-400 text-green-950 shadow',
			'etiqueta'    => 'Gratis',
			'et_cls'      => 'bg-green-500 text-white',
			'meta'        => array( '16 lecciones', 'Principiante', 'Sin tarjeta' ),
			'precio'      => null,
			'url'         => 'https://animatek.net/cursos/curso-uzz/',
			'cta'         => 'Empezar gratis',
		),

	);

	/**
	 * Permite ajustar el catálogo sin tocar este archivo.
	 *
	 * @param array $cursos Catálogo completo.
	 */
	return apply_filters( 'animatek_cursos', $cursos );
}

/**
 * Devuelve unos cursos concretos, en el orden pedido.
 *
 * @param string[] $claves Claves del catálogo.
 *
 * @return array<int,array<string,mixed>>
 */
function animatek_cursos_por_clave( array $claves ): array {
	$catalogo = animatek_cursos();
	$salida   = array();

	foreach ( $claves as $clave ) {
		if ( isset( $catalogo[ $clave ] ) ) {
			$salida[] = $catalogo[ $clave ];
		}
	}

	return $salida;
}

/**
 * Los cursos que se listan en /academia/.
 *
 * @return array<int,array<string,mixed>>
 */
function animatek_cursos_academia(): array {
	return array_values(
		array_filter(
			animatek_cursos(),
			static function ( array $curso ): bool {
				return false !== ( $curso['en_academia'] ?? true );
			}
		)
	);
}

/**
 * Resuelve precio y oferta de un curso según la fecha de hoy.
 *
 * Cuando la oferta caduca, el precio pasa solo a 'precio_antes'. Así una subida
 * programada no depende de que nadie se acuerde de tocar nada.
 *
 * @param array $curso Entrada del catálogo.
 *
 * @return array{gratis:bool,importe:string,antes:string,oferta:string,hasta:string,vigente:bool}
 */
function animatek_curso_precio( array $curso ): array {
	$precio  = $curso['precio'] ?? null;
	$antes   = $curso['precio_antes'] ?? null;
	$hasta   = $curso['oferta_hasta'] ?? '';
	$vigente = $hasta && $antes && current_time( 'timestamp' ) <= strtotime( $hasta . ' 23:59:59' );

	if ( ! $vigente && $antes ) {
		$precio = $antes;
	}

	return array(
		'gratis'  => null === $precio,
		'importe' => null === $precio ? 'Gratis' : $precio . '€',
		'antes'   => $vigente ? $antes . '€' : '',
		'oferta'  => $vigente ? ( $curso['oferta_texto'] ?? 'Oferta' ) : '',
		'hasta'   => $vigente ? date_i18n( 'j F', strtotime( $hasta ) ) : '',
		'vigente' => $vigente,
	);
}
