<?php
/**
 * Datos del recorrido "¿Por dónde empiezo?" (/empezar/).
 *
 * Dos preguntas y una lista curada. No filtra el catálogo de YouTube: cada
 * respuesta devuelve una selección hecha a mano, que es lo que diferencia esto
 * de un buscador. Los 400 y pico vídeos del canal no caben en una decisión de
 * dos clics, y la mitad son directos de tres horas o tutoriales de VCV Rack 1.
 *
 * Para cambiar el recorrido se toca este archivo y nada más:
 *   - animatek_empezar_pasos()      preguntas y ramas
 *   - animatek_empezar_resultados() qué se enseña al final de cada rama
 *
 * Los cursos NO se escriben aquí: se nombran por su clave y los textos, precios
 * y URLs salen de animatek_cursos() (inc/animatek-cursos.php), que es el punto
 * único de verdad. Así un cambio de precio no deja esta página mintiendo.
 *
 * Los vídeos llevan el id de YouTube, el título y los minutos reales, sacados
 * del catálogo del canal (Animatek.net/datos/youtube-catalogo-*.json). A partir
 * de una hora se marcan como directo, porque no es lo mismo sentarse a ver un
 * tutorial de 20 minutos que abrir un directo de dos horas y media.
 *
 * @package Animatek
 */

defined( 'ABSPATH' ) || exit;

/**
 * Las preguntas y sus ramas.
 *
 * Cada opción lleva 'siguiente' (otra pregunta) o 'resultado' (el final).
 *
 * @return array<string,array<string,mixed>>
 */
function animatek_empezar_pasos(): array {
	return apply_filters( 'animatek_empezar_pasos', array(

		'inicio' => array(
			'paso'     => 1,
			'pregunta' => '¿En qué punto estás?',
			'opciones' => array(
				array(
					'num'       => '01',
					'texto'     => 'Empiezo de cero',
					'detalle'   => 'No he tocado un sintetizador en mi vida, o casi.',
					'siguiente' => 'cero',
				),
				array(
					'num'       => '02',
					'texto'     => 'Ya produzco, pero el modular se me escapa',
					'detalle'   => 'Manejo un DAW. Los cables y los voltajes, no.',
					'siguiente' => 'produzco',
				),
				array(
					'num'       => '03',
					'texto'     => 'Hago patches y no termino nada',
					'detalle'   => 'Suena, se mueve, y a la media hora lo cierro.',
					'siguiente' => 'atascado',
				),
				array(
					'num'       => '04',
					'texto'     => 'Vengo por algo concreto',
					'detalle'   => 'Sé lo que busco: un programa o una máquina.',
					'siguiente' => 'concreto',
				),
			),
		),

		'cero' => array(
			'paso'     => 2,
			'pregunta' => '¿Con qué empezamos?',
			'opciones' => array(
				array(
					'num'       => '01',
					'texto'     => 'Con VCV Rack, que es gratis',
					'detalle'   => 'Un modular entero en el ordenador, sin gastar un euro.',
					'resultado' => 'r_vcv_cero',
				),
				array(
					'num'       => '02',
					'texto'     => 'Con Bitwig, que es donde produzco',
					'detalle'   => 'El DAW primero, y el modular cuando toque.',
					'resultado' => 'r_bitwig_cero',
				),
				array(
					'num'       => '03',
					'texto'     => 'Quiero oír algo hoy mismo',
					'detalle'   => 'Lo más corto que haya, aunque luego vuelva a lo largo.',
					'resultado' => 'r_hoy',
				),
			),
		),

		'produzco' => array(
			'paso'     => 2,
			'pregunta' => '¿Qué es lo que se te atraganta?',
			'opciones' => array(
				array(
					'num'       => '01',
					'texto'     => 'Juntar el modular con el DAW',
					'detalle'   => 'Que suenen a la vez, en tiempo, y poder grabarlo.',
					'resultado' => 'r_hibrido',
				),
				array(
					'num'       => '02',
					'texto'     => 'Entender la señal',
					'detalle'   => 'CV, gate, LFO, sample and hold. Qué modula qué.',
					'resultado' => 'r_senal',
				),
				array(
					'num'       => '03',
					'texto'     => 'Secuenciar sin sonar a cuadrícula',
					'detalle'   => 'Que la secuencia respire en vez de repetirse ocho compases.',
					'resultado' => 'r_secuencia',
				),
			),
		),

		'atascado' => array(
			'paso'     => 2,
			'pregunta' => '¿Qué quieres que salga de ahí?',
			'opciones' => array(
				array(
					'num'       => '01',
					'texto'     => 'Techno que se sostenga',
					'detalle'   => 'Bombo, bajo y percusión que aguanten diez minutos.',
					'resultado' => 'r_techno',
				),
				array(
					'num'       => '02',
					'texto'     => 'Drones y ambient',
					'detalle'   => 'Algo lento que se pueda dejar sonando.',
					'resultado' => 'r_drones',
				),
				array(
					'num'       => '03',
					'texto'     => 'Que se toque solo',
					'detalle'   => 'Generativo: lo montas, lo sueltas y sigue.',
					'resultado' => 'r_generativo',
				),
			),
		),

		'concreto' => array(
			'paso'     => 2,
			'pregunta' => '¿Sobre qué?',
			'opciones' => array(
				array(
					'num'       => '01',
					'texto'     => 'VCV Rack',
					'detalle'   => 'El modular del ordenador, de arriba abajo.',
					'resultado' => 'r_vcv',
				),
				array(
					'num'       => '02',
					'texto'     => 'Bitwig y The Grid',
					'detalle'   => 'El DAW y su modular interno.',
					'resultado' => 'r_bitwig',
				),
				array(
					'num'       => '03',
					'texto'     => 'Hardware',
					'detalle'   => 'OXI One, Digitakt, Octatrack, modular de verdad.',
					'resultado' => 'r_hardware',
				),
				array(
					'num'       => '04',
					'texto'     => 'Nord Modular G1',
					'detalle'   => 'El sinte de 1998 y el editor que le he hecho.',
					'resultado' => 'r_nord',
				),
			),
		),

	) );
}

/**
 * Qué se enseña al final de cada rama.
 *
 * Campos:
 *   titulo / texto  Encabezado del resultado.
 *   enlaces         Páginas propias (url relativa a la home, titulo, texto).
 *   videos          id de YouTube, titulo y minutos.
 *   cursos          Claves de animatek_cursos(): vcv-rack · patch-lab · bitwig · uzz.
 *
 * @return array<string,array<string,mixed>>
 */
function animatek_empezar_resultados(): array {
	return apply_filters( 'animatek_empezar_resultados', array(

		'r_vcv_cero' => array(
			'titulo'  => 'Empieza por aquí',
			'texto'   => 'VCV Rack es gratis y es un modular completo: no hay excusa de presupuesto ni de sitio. El orden de abajo es el bueno — el tutorial largo primero, y la primera secuencia el mismo día, para no pasarte una semana leyendo antes de oír nada.',
			'enlaces' => array(
				array(
					'url'    => '/vcvrack-lab/',
					'titulo' => 'VCV Rack Lab',
					'texto'  => 'La guía escrita, entera y gratis. Para consultar mientras montas.',
				),
			),
			'videos'  => array(
				array( 'id' => '779Y8T-2WCM', 'titulo' => 'Tutorial completo de VCV Rack para principiantes (actualizado)', 'min' => 31 ),
				array( 'id' => 'MD2Cd_zOnn4', 'titulo' => 'Tu primera secuencia en VCV Rack, en minutos', 'min' => 21 ),
				array( 'id' => 'ifcdfJqeWVE', 'titulo' => 'Mi primer patch con módulos básicos (SEQ-3 y 8vert)', 'min' => 41 ),
				array( 'id' => 'VQBSR6qAL_k', 'titulo' => 'Crea un sintetizador con 3 osciladores', 'min' => 19 ),
				array( 'id' => 'xfAlAKKncOs', 'titulo' => '8 años de VCV Rack en 31 minutos: 40 lecciones', 'min' => 31 ),
			),
			'cursos'  => array( 'vcv-rack' ),
		),

		'r_bitwig_cero' => array(
			'titulo'  => 'Bitwig, de cero y en orden',
			'texto'   => 'Primero cómo está montado el programa, que es lo que hace que todo lo demás se entienda; después The Grid, que es el modular que ya llevas dentro sin saberlo.',
			'enlaces' => array(
				array(
					'url'    => '/bitwig-lab/',
					'titulo' => 'Bitwig Lab',
					'texto'  => 'La guía escrita del DAW, gratis.',
				),
			),
			'videos'  => array(
				array( 'id' => 'xSfPvuPBmA8', 'titulo' => '9 cosas que debes saber antes de empezar en Bitwig', 'min' => 16 ),
				array( 'id' => 'XZ1nNe1Pzog', 'titulo' => 'Cómo trabajar con pistas y eventos de audio', 'min' => 22 ),
				array( 'id' => 'AAmcTG-oqUo', 'titulo' => 'The Grid desde cero: tu primer synth en Bitwig', 'min' => 18 ),
				array( 'id' => 'AycelroMoEQ', 'titulo' => 'Cómo usar los macros paso a paso', 'min' => 18 ),
				array( 'id' => '8XCeSVdK7Wo', 'titulo' => 'Edición de audio en Bitwig 6: transitorios, cortes y probabilidad', 'min' => 27 ),
			),
			'cursos'  => array( 'bitwig' ),
		),

		'r_hoy' => array(
			'titulo'  => 'Que suene algo hoy',
			'texto'   => 'Cuatro vídeos cortos, ninguno pasa de veinte minutos. Con el primero ya tienes una secuencia sonando; con el último, cinco patches terminados que puedes abrir y romper. Lo largo sigue ahí para cuando quieras entender el porqué.',
			'videos'  => array(
				array( 'id' => 'MD2Cd_zOnn4', 'titulo' => 'Tu primera secuencia en VCV Rack, en minutos', 'min' => 21 ),
				array( 'id' => 'zWVctnRv61g', 'titulo' => 'Cómo grabar tus sonidos en VCV Rack', 'min' => 5 ),
				array( 'id' => 'Zaxu_b7xsfI', 'titulo' => 'Controla VCV Rack con tu controlador MIDI', 'min' => 11 ),
				array( 'id' => 'KffWMFIlEoE', 'titulo' => 'Cinco patches desde cero: techno, drones y generativos', 'min' => 9 ),
			),
			'cursos'  => array( 'uzz' ),
		),

		'r_hibrido' => array(
			'titulo'  => 'El modular y el DAW, a la vez',
			'texto'   => 'El problema nunca es el cable: es el reloj, la latencia y por dónde entra el audio. Empieza por el de quince minutos, que es el resumen; los directos son el mismo montaje hecho despacio y con los fallos dentro, que es donde se aprende.',
			'videos'  => array(
				array( 'id' => '71Y6vLvmHdM', 'titulo' => 'Synth modular híbrido: VCV Rack + Bitwig paso a paso', 'min' => 15 ),
				array( 'id' => '5DmMoFmm9ME', 'titulo' => 'Multipista en VCV Rack: VST y standalone', 'min' => 21 ),
				array( 'id' => 'tFrtnotI6AU', 'titulo' => 'VCV Rack Pro gratis en tu DAW con Cardinal', 'min' => 13 ),
				array( 'id' => 'yOS6dzdA61w', 'titulo' => 'VCV Rack y Bitwig: montamos un synth híbrido', 'min' => 140 ),
				array( 'id' => 'Xqoq0dfF8Gc', 'titulo' => 'Bitwig Connect + modular: tu primer patch híbrido', 'min' => 98 ),
			),
			'cursos'  => array( 'vcv-rack' ),
		),

		'r_senal' => array(
			'titulo'  => 'Qué modula qué',
			'texto'   => 'Un LFO y un sample and hold explican más del modular que cualquier lista de módulos. Cuando ves que el mismo voltaje sirve para una nota, para abrir un filtro o para disparar un bombo, deja de haber misterio.',
			'enlaces' => array(
				array(
					'url'    => '/glosario/',
					'titulo' => 'Glosario',
					'texto'  => 'Qué es un VCA, un gate o un trigger, en una frase y sin rodeos.',
				),
			),
			'videos'  => array(
				array( 'id' => 'Ihe6jy-1uPg', 'titulo' => 'Melodías generativas con LFOs y sample & hold', 'min' => 27 ),
				array( 'id' => '8q1Iu1_WLC4', 'titulo' => 'Sequential switches: variación y movimiento', 'min' => 27 ),
				array( 'id' => 'foCTfwMyZ8Q', 'titulo' => 'Turing Machine: aleatoriedad que se repite', 'min' => 12 ),
				array( 'id' => 'bBHR3Ouw1KA', 'titulo' => 'LFOs, sample & hold y drones generativos', 'min' => 138 ),
			),
			'cursos'  => array( 'vcv-rack' ),
		),

		'r_secuencia' => array(
			'titulo'  => 'Que la secuencia respire',
			'texto'   => 'Si suena a cuadrícula es porque lo es: dieciséis pasos que se repiten idénticos. La salida no es tocar más notas, es meter probabilidad, acumuladores y ratchets para que cada vuelta se parezca a la anterior sin ser la misma.',
			'videos'  => array(
				array( 'id' => 'TiSewAcHfPE', 'titulo' => 'RANDOM8: el secuenciador aleatorio', 'min' => 17 ),
				array( 'id' => 'hwiCLX_OGe0', 'titulo' => 'UZZ 2.5: probabilidad global, ratchets y modos generativos', 'min' => 118 ),
				array( 'id' => 'm8N1PhRXjD8', 'titulo' => 'UZZ: probabilidad y acumulador para secuencias vivas', 'min' => 104 ),
				array( 'id' => '4EMnuhY64rU', 'titulo' => 'Curso completo de UZZ para VCV Rack', 'min' => 83 ),
			),
			'cursos'  => array( 'uzz' ),
		),

		'r_techno' => array(
			'titulo'  => 'Techno que aguante',
			'texto'   => 'Un patch de techno no se cae por falta de módulos, se cae porque no hay nada que cambie con el tiempo. Estos son patches enteros, de principio a fin, con las decisiones a la vista.',
			'videos'  => array(
				array( 'id' => 'yVACHaB8uuo', 'titulo' => 'Percusiones techno con 4ms, paso a paso', 'min' => 22 ),
				array( 'id' => 'vsWu02p4ZLg', 'titulo' => 'Cómo hacer techno en VCV Rack desde cero (patch completo)', 'min' => 134 ),
				array( 'id' => 'RI-_q9rSFd8', 'titulo' => 'Techno generativo con un solo módulo: Trummor 2', 'min' => 71 ),
				array( 'id' => 'y7w5oQ3uRzw', 'titulo' => 'Patch techno desde cero con Poly Counter', 'min' => 99 ),
				array( 'id' => 'Ud1yhz1C7nI', 'titulo' => 'Patch techno con Trummor, Random8 y UZZ', 'min' => 140 ),
			),
			'cursos'  => array( 'patch-lab' ),
		),

		'r_drones' => array(
			'titulo'  => 'Drones y ambient',
			'texto'   => 'Lo lento perdona menos: sin percusión que tape, se oye todo. Empieza por el de diecinueve minutos y quédate con la idea de que el movimiento lo pone la modulación, no las notas.',
			'videos'  => array(
				array( 'id' => 'f-6wVfyZ6_c', 'titulo' => 'Crea un drone vivo con LFOs, patch desde cero', 'min' => 19 ),
				array( 'id' => '5DOogivIxvg', 'titulo' => 'Dark drone loop con XFMN01, delay y Grainer', 'min' => 9 ),
				array( 'id' => '2fiFjyIvOx8', 'titulo' => 'Cómo hacer ambient drone en VCV Rack', 'min' => 53 ),
				array( 'id' => 'Q4i1xyJCqvo', 'titulo' => 'Patch ambient desde cero con los módulos Van Ties', 'min' => 94 ),
				array( 'id' => 'n5D1XIT_VHg', 'titulo' => 'Drones con el Random de Nano', 'min' => 104 ),
			),
			'cursos'  => array( 'patch-lab' ),
		),

		'r_generativo' => array(
			'titulo'  => 'Que se toque solo',
			'texto'   => 'Generativo no es aleatorio: es aleatoriedad con reglas. El trabajo está en ponerle los límites, y por eso los directos largos enseñan más aquí que cualquier resumen.',
			'videos'  => array(
				array( 'id' => 'qXJ3TUT2Tsk', 'titulo' => 'Música generativa con un sinte básico en VCV Rack y Bitwig', 'min' => 117 ),
				array( 'id' => 'UYcT7-2EtRQ', 'titulo' => 'Patch generativo con Befaco, UZZ y LFOs', 'min' => 94 ),
				array( 'id' => 'PPpWWhGwYho', 'titulo' => 'Un drone vivo que se construye solo', 'min' => 374 ),
				array( 'id' => 'sU7Q4shIREE', 'titulo' => 'San Juan Drone: patching en directo, sin hablar', 'min' => 413 ),
			),
			'cursos'  => array( 'patch-lab' ),
		),

		'r_vcv' => array(
			'titulo'  => 'Todo lo de VCV Rack',
			'texto'   => 'El Lab es la guía escrita y es gratis. Los vídeos de abajo son los de andar por casa: lo que cambió en la última versión, cómo hacer polifonía y cómo evitar que se te atragante el ordenador.',
			'enlaces' => array(
				array(
					'url'    => '/vcvrack-lab/',
					'titulo' => 'VCV Rack Lab',
					'texto'  => 'La guía completa, gratis y para consultar.',
				),
				array(
					'url'    => '/software/',
					'titulo' => 'Mis módulos',
					'texto'  => 'UZZ, ATEK303, OXI CV y los demás, gratis para VCV Rack.',
				),
			),
			'videos'  => array(
				array( 'id' => 'xfAlAKKncOs', 'titulo' => '8 años de VCV Rack en 31 minutos: 40 lecciones', 'min' => 31 ),
				array( 'id' => 'pXodBOA72vw', 'titulo' => 'Todo lo nuevo en VCV Rack 2.6', 'min' => 8 ),
				array( 'id' => '3r26Bl8YaNY', 'titulo' => 'Cómo hacer un patch polifónico', 'min' => 12 ),
				array( 'id' => 'PTxZ0kbyn48', 'titulo' => 'Cómo optimizar VCV Rack', 'min' => 7 ),
			),
			'cursos'  => array( 'vcv-rack', 'patch-lab' ),
		),

		'r_bitwig' => array(
			'titulo'  => 'Bitwig y The Grid',
			'texto'   => 'The Grid es un modular dentro del DAW, y es la razón por la que en este canal Bitwig y VCV Rack se explican juntos. Los dos primeros son construcciones enteras; los otros, lo que trae la versión 6.',
			'enlaces' => array(
				array(
					'url'    => '/bitwig-lab/',
					'titulo' => 'Bitwig Lab',
					'texto'  => 'La guía escrita del DAW, gratis.',
				),
			),
			'videos'  => array(
				array( 'id' => 'AAmcTG-oqUo', 'titulo' => 'The Grid desde cero: tu primer synth en Bitwig', 'min' => 18 ),
				array( 'id' => 'Sh834de4pwM', 'titulo' => 'Construyo sonidos desde cero con The Grid', 'min' => 101 ),
				array( 'id' => 'qIxWl_UNJ88', 'titulo' => 'De cero a cuatro voces: tu propio PERfourMER MkII en The Grid', 'min' => 107 ),
				array( 'id' => 'dKn-fOinX94', 'titulo' => 'Bitwig Studio 6: todas las novedades', 'min' => 107 ),
			),
			'cursos'  => array( 'bitwig' ),
		),

		'r_hardware' => array(
			'titulo'  => 'Las máquinas',
			'texto'   => 'Lo que uso en el directo y por qué. El primero es el que más falta hace si acabas de comprar un OXI One; el último compara mi modular de verdad con el mismo patch en VCV Rack, que es la respuesta honesta a si merece la pena gastarse el dinero.',
			'enlaces' => array(
				array(
					'url'    => '/gear/',
					'titulo' => 'Mi equipo',
					'texto'  => 'Qué hay en la mesa y para qué sirve cada cosa.',
				),
			),
			'videos'  => array(
				array( 'id' => 'iLgKx9h0KN4', 'titulo' => 'OXI One: primeros pasos y flujo de trabajo', 'min' => 28 ),
				array( 'id' => 'rBA7wHo9c70', 'titulo' => 'Acid techno con OXI One y TB-3', 'min' => 19 ),
				array( 'id' => 'SOjZ55ZluDg', 'titulo' => 'Dark hybrid industrial: OXI, Octatrack, The Grid y Nord Modular', 'min' => 10 ),
				array( 'id' => 'mxs0eeBgv7w', 'titulo' => 'Digitakt: primer vistazo y funcionamiento', 'min' => 99 ),
				array( 'id' => 'NZMB3uo6MIE', 'titulo' => 'Mi modular real contra VCV Rack', 'min' => 92 ),
			),
		),

		'r_nord' => array(
			'titulo'  => 'Nord Modular G1',
			'texto'   => 'Un sintetizador de 1998 al que le he escrito un editor moderno, porque el original solo corre en Windows de hace veinte años. El editor es gratis y de código abierto.',
			'enlaces' => array(
				array(
					'url'    => '/animatek-nme/',
					'titulo' => 'Animatek NME',
					'texto'  => 'El editor para el Nord Modular G1. Gratis, Linux, macOS y Windows.',
				),
			),
			'videos'  => array(
				array( 'id' => 'dOHgxAOX_EQ', 'titulo' => 'Animatek NME: patches, snapshots y Claude en el Nord G1', 'min' => 22 ),
				array( 'id' => '-vr9iTZ5exc', 'titulo' => 'Nord Modular G1 + Bitwig The Grid: caos controlado', 'min' => 129 ),
				array( 'id' => 'SOjZ55ZluDg', 'titulo' => 'Dark hybrid industrial: OXI, Octatrack, The Grid y Nord Modular', 'min' => 10 ),
			),
		),

	) );
}

/**
 * "1 h 54" en vez de "114 min", que nadie divide de cabeza.
 */
function animatek_empezar_duracion( int $minutos ): string {
	if ( $minutos < 60 ) {
		return sprintf( '%d min', $minutos );
	}

	$horas = intdiv( $minutos, 60 );
	$resto = $minutos % 60;

	return 0 === $resto
		? sprintf( '%d h', $horas )
		: sprintf( '%d h %02d', $horas, $resto );
}
