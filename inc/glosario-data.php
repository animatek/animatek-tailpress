<?php
/**
 * Datos del glosario: categorías, términos, iconos y mapeos.
 *
 * Consumido por page-glosario.php.
 */

$categories = [
    'vcvrack' => ['label' => 'VCV Rack', 'bg' => 'bg-blue-500/15', 'text' => 'text-blue-400', 'border' => 'border-blue-500/25'],
    'bitwig' => ['label' => 'Bitwig', 'bg' => 'bg-orange-500/15', 'text' => 'text-orange-400', 'border' => 'border-orange-500/25'],
    'sintesis' => ['label' => 'Síntesis', 'bg' => 'bg-emerald-500/15', 'text' => 'text-emerald-400', 'border' => 'border-emerald-500/25'],
    'mezcla' => ['label' => 'Mezcla', 'bg' => 'bg-purple-500/15', 'text' => 'text-purple-400', 'border' => 'border-purple-500/25'],
    'audio' => ['label' => 'Audio General', 'bg' => 'bg-slate-500/15', 'text' => 'text-slate-400', 'border' => 'border-slate-500/25'],
];

$terms = [
    // ── Fundamentos de Voltaje y Señal ──
    [
        'term' => '1V/Oct (Voltio por Octava)',
        'slug' => '1v-oct',
        'category' => 'vcvrack',
        'definition' => 'El estándar más común para controlar la afinación en sintetizadores modulares. Un incremento de 1 voltio resulta en un aumento de tono de exactamente una octava. Es la base de la comunicación de pitch entre módulos como secuenciadores, teclados y osciladores.',
    ],
    [
        'term' => 'CV (Control Voltage)',
        'slug' => 'cv',
        'category' => 'vcvrack',
        'definition' => 'El lenguaje de los sintetizadores modulares. Se refiere a usar niveles de voltaje analógico para controlar parámetros de un módulo (como la altura de nota de un oscilador o la frecuencia de corte de un filtro). En VCV Rack, el estándar es 1V/octava para pitch, 0–10V para señales unipolares (gates, envolventes) y ±5V para señales bipolares (LFOs, audio). Permite conectar cualquier fuente a cualquier destino, creando patches expresivos y dinámicos.',
    ],
    [
        'term' => 'Gate (Compuerta)',
        'slug' => 'gate',
        'category' => 'vcvrack',
        'definition' => 'Señal binaria (encendido/apagado) que indica cuándo empieza y termina un evento, generalmente una nota. Se mantiene en nivel "alto" mientras se presiona una tecla y vuelve a 0V al soltarla. Es la señal que le dice a la envolvente cuándo activarse.',
    ],
    [
        'term' => 'Trigger (Disparo)',
        'slug' => 'trigger',
        'category' => 'vcvrack',
        'definition' => 'Similar al Gate, pero es un impulso momentáneo muy breve. Se usa para iniciar eventos percusivos o reiniciar envolventes, sin importar cuánto tiempo se mantenga la tecla. Ideal para disparar samples, resets y módulos rítmicos.',
    ],
    [
        'term' => 'Clock (Reloj)',
        'slug' => 'clock',
        'category' => 'vcvrack',
        'definition' => 'Señal de pulso constante utilizada para sincronizar secuenciadores, arpegiadores y otros módulos rítmicos. Se mide usualmente en BPM o PPQN (pulsos por negra). Es el "metrónomo" del sistema modular, dictando cuándo avanza cada paso.',
    ],
    [
        'term' => 'Modulación Bipolar/Unipolar',
        'slug' => 'modulacion-bipolar-unipolar',
        'category' => 'vcvrack',
        'definition' => 'Las señales unipolares se mueven solo en rango positivo (ej: 0V a 10V), usadas para envolventes o VCA. Las bipolares oscilan entre positivo y negativo (ej: −5V a +5V), usadas para audio o LFOs. Usar una de cada en VCAs opuestos crea modulación cruzada, una técnica potente para dar movimiento a los patches.',
    ],
    // ── Generación de Sonido ──
    [
        'term' => 'VCO (Voltage Controlled Oscillator)',
        'slug' => 'vco',
        'category' => 'vcvrack',
        'definition' => 'El módulo principal de generación de sonido en un sintetizador modular. Produce formas de onda (senoidal, sierra, cuadrada, triangular) que oscilan a una frecuencia determinada por el voltaje de entrada, siguiendo el estándar 1V/octava. Acepta CV para pitch (desde un secuenciador o teclado), FM (modulación de frecuencia) y sync.',
    ],
    [
        'term' => 'Oscillator (Oscilador)',
        'slug' => 'oscillator',
        'category' => 'sintesis',
        'definition' => 'Fuente generadora de señal periódica que constituye la base de la síntesis. Produce formas de onda como seno, diente de sierra, cuadrada y triángulo, cada una con un contenido armónico distinto. El oscilador determina el pitch fundamental y el carácter tímbrico inicial del sonido antes de ser procesado por filtros y amplificadores.',
    ],
    [
        'term' => 'Operator (Operador FM)',
        'slug' => 'operator',
        'category' => 'sintesis',
        'definition' => 'En síntesis FM (como el DX7), un "operador" es la combinación de un oscilador con su propio generador de envolvente y amplificador. Puede actuar como portador (carrier — sonido audible) o modulador (modifica la frecuencia del portador para generar armónicos complejos).',
    ],
    [
        'term' => 'Wavetable',
        'slug' => 'wavetable',
        'category' => 'sintesis',
        'definition' => 'Técnica de síntesis donde el oscilador no usa una forma de onda estática, sino que se desplaza a través de una tabla de múltiples formas de onda digitales, permitiendo cambios tímbricos complejos en tiempo real. Cada posición de la tabla tiene un timbre distinto, generando transiciones fluidas entre texturas. Popularizada por el PPG Wave y presente en sintetizadores como Serum, Vital y los osciladores de Bitwig.',
    ],
    [
        'term' => 'Síntesis Granular',
        'slug' => 'sintesis-granular',
        'category' => 'sintesis',
        'definition' => 'Técnica que divide el sonido en pequeños fragmentos llamados "granos" (de 1 a 100 ms) para reordenarlos y procesarlos. Permite crear nubes sonoras, texturas, time-stretching extremo y transformaciones tímbricas imposibles con otros métodos de síntesis.',
    ],
    [
        'term' => 'Síntesis Estocástica',
        'slug' => 'sintesis-estocastica',
        'category' => 'sintesis',
        'definition' => 'Tipo de síntesis que introduce elementos aleatorios o impredecibles en la generación de formas de onda. El oscilador no repite exactamente el mismo ciclo, lo que produce timbres con movimiento inherente.',
    ],
    [
        'term' => 'Síntesis Aditiva',
        'slug' => 'sintesis-aditiva',
        'category' => 'sintesis',
        'definition' => 'Método de síntesis que construye timbres sumando ondas senoidales individuales (parciales). Cada parcial tiene su propia frecuencia y amplitud. Es el opuesto conceptual de la síntesis sustractiva.',
    ],
    [
        'term' => 'Parciales',
        'slug' => 'parciales',
        'category' => 'sintesis',
        'definition' => 'Cada una de las ondas senoidales individuales que componen un timbre en síntesis aditiva. La primera parcial es la fundamental; las siguientes son armónicos que definen el carácter del sonido.',
    ],
    [
        'term' => 'Vocoder',
        'slug' => 'vocoder',
        'category' => 'sintesis',
        'definition' => 'Dispositivo que analiza las bandas de frecuencia de una señal moduladora (generalmente voz) y las aplica a una señal portadora (sintetizador), haciendo que el instrumento "hable". Divide el espectro en múltiples bandas con filtros y seguidores de envolvente.',
    ],
    // ── Modificación del Sonido ──
    [
        'term' => 'Filter (Filtro)',
        'slug' => 'filter',
        'category' => 'sintesis',
        'definition' => 'Módulo que atenúa frecuencias de una señal según un punto de corte (cutoff) y una pendiente (slope). Tipos principales: paso bajo (LP — deja pasar graves), paso alto (HP — deja pasar agudos), paso banda (BP — deja pasar solo un rango central) y rechazo de banda (Notch). El parámetro de resonancia (Q) enfatiza las frecuencias cercanas al cutoff.',
    ],
    [
        'term' => 'VCF (Voltage Controlled Filter)',
        'slug' => 'vcf',
        'category' => 'vcvrack',
        'definition' => 'Filtro cuya frecuencia de corte se controla por voltaje. Define el timbre del sonido mediante el corte (cutoff) y la resonancia. Permite abrir y cerrar el filtro de forma dinámica mediante envolventes, LFOs u otras fuentes CV. Tipos: paso bajo (LP), paso alto (HP), paso banda (BP). Diseños clásicos: Moog ladder (24 dB LP), Steiner-Parker, SEM y filtros multimodo.',
    ],
    [
        'term' => 'Resonance (Q)',
        'slug' => 'resonance',
        'category' => 'sintesis',
        'definition' => 'Un bucle de retroalimentación en el filtro que enfatiza las frecuencias cercanas al punto de corte (cutoff), creando un sonido nasal o de "silbido". A valores altos, el filtro entra en auto-oscilación, generando una onda senoidal propia.',
    ],
    [
        'term' => 'LPG (Low Pass Gate)',
        'slug' => 'lpg',
        'category' => 'vcvrack',
        'definition' => 'Módulo que actúa simultáneamente como filtro paso bajo y amplificador (VCA). Al cerrarse, el sonido se vuelve más oscuro y silencioso a la vez, imitando el comportamiento acústico natural de objetos golpeados. Típico del estilo "Buchla" o West Coast, produce sonidos orgánicos y percusivos.',
    ],
    [
        'term' => 'Wavefolder',
        'slug' => 'wavefolder',
        'category' => 'sintesis',
        'definition' => 'Un tipo de distorsión que, en lugar de recortar la onda cuando alcanza el límite (clipping), la "pliega" hacia adentro, añadiendo armónicos complejos y ricos. Es un elemento central de la síntesis West Coast y permite obtener timbres brillantes a partir de ondas simples como la senoidal.',
    ],
    [
        'term' => 'Slew Limiter',
        'slug' => 'slew-limiter',
        'category' => 'vcvrack',
        'definition' => 'Módulo que suaviza los cambios bruscos de voltaje, limitando la velocidad de subida y/o bajada de una señal. Aplicado al pitch crea portamento (deslizamiento entre notas). Aplicado a gates genera envolventes simples de tipo AR. También se llama Lag Generator.',
    ],
    // ── Modulación y Dinámica ──
    [
        'term' => 'VCA (Voltage Controlled Amplifier)',
        'slug' => 'vca',
        'category' => 'vcvrack',
        'definition' => 'Amplificador cuya ganancia se controla mediante voltaje. Controla el volumen o la amplitud de una señal (sea audio o CV). En una voz de sintetizador, el VCA es la última etapa antes de la salida: recibe la señal del filtro y una envolvente ADSR como CV, dando forma al volumen de cada nota. Es esencial para articular las notas y que no suenen eternamente.',
    ],
    [
        'term' => 'ADSR',
        'slug' => 'adsr',
        'category' => 'sintesis',
        'definition' => 'Generador de envolvente con cuatro fases que define cómo evoluciona un sonido en el tiempo: Attack (ataque — tiempo de subida), Decay (decaimiento — caída inicial), Sustain (sostenimiento — nivel mantenido mientras se presiona la nota) y Release (liberación — tiempo de caída al soltar). Es el tipo de envolvente más común en síntesis y se usa para modular amplitud, filtro, pitch y otros parámetros.',
    ],
    [
        'term' => 'LFO (Low Frequency Oscillator)',
        'slug' => 'lfo',
        'category' => 'vcvrack',
        'definition' => 'Oscilador que funciona a frecuencias muy bajas (sub-audio, típicamente 0.01–20 Hz). No se usa para generar notas, sino para modular cíclicamente otros parámetros, creando vibrato (modulando pitch), trémolo (modulando amplitud), wah-wah (modulando filtro) y otros movimientos. Formas de onda comunes: seno, triángulo, diente de sierra, cuadrada y aleatoria.',
    ],
    [
        'term' => 'Sample & Hold (S&H)',
        'slug' => 'sample-hold',
        'category' => 'vcvrack',
        'definition' => 'Circuito que "toma una muestra" del voltaje de entrada cada vez que recibe un trigger y la "mantiene" estática hasta el siguiente disparo. Se usa comúnmente con ruido como entrada para generar notas aleatorias (el clásico sonido de "ordenador pensando").',
    ],
    [
        'term' => 'Glide (Portamento)',
        'slug' => 'glide',
        'category' => 'sintesis',
        'definition' => 'Transición suave entre notas en lugar de salto directo. Se aplica al pitch para que las notas "resbalen" de una a otra, creando un efecto expresivo muy utilizado en líneas de bajo y leads.',
    ],
    // ── Utilidades y Conceptos Digitales ──
    [
        'term' => 'Attenuverter (Atenuvertidor)',
        'slug' => 'attenuverter',
        'category' => 'vcvrack',
        'definition' => 'Control que permite atenuar (reducir) una señal y también invertirla (volverla negativa). Es crucial para controlar la profundidad y dirección de una modulación. En posición central la señal es cero, girado a la derecha la amplifica en positivo, a la izquierda la invierte.',
    ],
    [
        'term' => 'Quantizer (Cuantizador)',
        'slug' => 'quantizer',
        'category' => 'vcvrack',
        'definition' => 'Módulo que redondea (cuantiza) voltajes CV a las notas exactas de una escala musical seleccionada (por ejemplo, Re menor), asegurando que siempre se esté afinado. Esencial cuando se usan fuentes de CV continuas (como LFOs o S&H) para generar melodías. Permite improvisar con cualquier fuente CV y que el resultado siempre suene dentro de la escala deseada.',
    ],
    [
        'term' => 'Aliasing',
        'slug' => 'aliasing',
        'category' => 'audio',
        'definition' => 'Distorsión digital no deseada que ocurre cuando se generan frecuencias superiores a la mitad de la frecuencia de muestreo (Límite de Nyquist), resultando en frecuencias "fantasma" inarmónicas. Los osciladores digitales de calidad usan oversampling o algoritmos anti-aliasing para evitarlo.',
    ],
    [
        'term' => 'AC/DC Coupled',
        'slug' => 'ac-dc-coupled',
        'category' => 'audio',
        'definition' => 'DC Coupled permite el paso de voltajes estáticos o muy lentos (necesario para CV y pitch en interfaces de audio modulares). AC Coupled filtra las frecuencias muy bajas (componente DC), usado típicamente solo para señales de audio. Una interfaz DC Coupled es requisito para usar el ordenador como fuente de CV.',
    ],
    // ── Síntesis FM ──
    [
        'term' => 'Carrier (Portadora FM)',
        'slug' => 'carrier',
        'category' => 'sintesis',
        'definition' => 'En síntesis FM, el oscilador (operador) cuya salida escuchamos directamente. Su frecuencia determina la nota fundamental, mientras que su timbre es moldeado por los moduladores conectados a él según el algoritmo seleccionado.',
    ],
    [
        'term' => 'Modulator (Modulador FM)',
        'slug' => 'modulator-fm',
        'category' => 'sintesis',
        'definition' => 'En síntesis FM, el oscilador (operador) que altera la frecuencia de la portadora, cambiando su timbre pero no necesariamente su afinación percibida. La relación de frecuencias entre modulador y portadora (ratio) determina si los armónicos resultantes son musicales o inarmónicos.',
    ],
    [
        'term' => 'Algorithm (Algoritmo FM)',
        'slug' => 'algorithm',
        'category' => 'sintesis',
        'definition' => 'La configuración o "mapa" de cómo se conectan los operadores entre sí en síntesis FM (quién modula a quién). El DX7 tiene 32 algoritmos predefinidos, cada uno con diferentes topologías de conexión que producen familias tímbricas distintas.',
    ],
    [
        'term' => 'Feedback (Retroalimentación)',
        'slug' => 'feedback',
        'category' => 'sintesis',
        'definition' => 'En síntesis FM, cuando la salida de un operador se conecta a su propia entrada, generando contenido armónico adicional. A valores bajos produce ondas tipo sierra; a valores altos genera ruido. Es un recurso clave para enriquecer timbres sin añadir más operadores.',
    ],
    // ── Señales Polifónicas y Modulación FM ──
    [
        'term' => 'Señal Polifónica',
        'slug' => 'senal-polifonica',
        'category' => 'vcvrack',
        'definition' => 'Cable especial en VCV Rack 2 que transmite hasta 16 señales CV o de audio independientes en una sola conexión física. Permite controlar sintetizadores polifónicos completos con un único cable: pitch, gate, velocity y modulaciones de todas las voces a la vez. Se distingue visualmente por un cable más grueso.',
    ],
    [
        'term' => 'FM (Síntesis por Modulación de Frecuencia)',
        'slug' => 'fm-sintesis',
        'category' => 'sintesis',
        'definition' => 'Técnica de síntesis en la que un oscilador (modulador) altera la frecuencia de otro oscilador (portadora) a velocidad de audio, generando armónicos laterales complejos. La relación de frecuencias entre ambos (ratio) determina si el resultado es armónico o inarmónico. A mayor profundidad de modulación (índice), más ricos y brillantes son los armónicos. Popularizada por el Yamaha DX7 (1983) y presente en The Grid de Bitwig y módulos de VCV Rack.',
    ],
    // ── Mezcla ──
    [
        'term' => 'Compressor',
        'slug' => 'compressor',
        'category' => 'mezcla',
        'definition' => 'Procesador de dinámica que reduce el rango dinámico de una señal. Cuando la señal supera el umbral (threshold), el compresor atenúa la ganancia según el ratio configurado. Parámetros clave: threshold, ratio, attack, release y makeup gain. Se usa para controlar picos, dar pegada, cohesión y presencia a instrumentos y mezclas.',
    ],
    [
        'term' => 'EQ (Ecualizador)',
        'slug' => 'eq',
        'category' => 'mezcla',
        'definition' => 'Procesador que permite ajustar la ganancia de bandas de frecuencia específicas. Los tipos principales son: EQ paramétrico (frecuencia, ganancia y Q ajustables por banda), EQ gráfico (bandas fijas) y filtros shelving (alta/baja). Se usa para limpiar frecuencias problemáticas, dar forma tonal y crear espacio en la mezcla.',
    ],
    [
        'term' => 'Reverb (Reverberación)',
        'slug' => 'reverb',
        'category' => 'mezcla',
        'definition' => 'Efecto que simula las reflexiones del sonido en un espacio acústico. Parámetros habituales: pre-delay (retardo inicial), decay/tiempo de reverberación, tamaño de sala, damping (absorción de agudos) y mezcla wet/dry. Se usa para dar profundidad, dimensión y cohesión a los elementos de una mezcla.',
    ],
    [
        'term' => 'Send/Return (Envío/Retorno)',
        'slug' => 'send-return',
        'category' => 'mezcla',
        'definition' => 'Sistema de efectos auxiliares en un mixer o DAW. El "Send" (envío) toma una copia de la señal de la pista y la manda a un bus de efectos (reverb, delay...). El "Return" (retorno) devuelve la señal procesada al mixer, donde se mezcla con la señal seca original. A diferencia de un insert (en serie), el Send/Return es paralelo: la señal original no se interrumpe, permitiendo compartir un mismo efecto entre múltiples pistas.',
    ],
    // ── Audio General ──
    [
        'term' => 'Bit Depth',
        'slug' => 'bit-depth',
        'category' => 'audio',
        'definition' => 'Resolución en bits de cada muestra de audio digital. Determina el rango dinámico disponible: 16 bits ofrecen ~96 dB y 24 bits ~144 dB. A mayor profundidad de bits, menor es el ruido de cuantización y mayor la fidelidad de la señal capturada.',
    ],
    [
        'term' => 'DAW',
        'slug' => 'daw',
        'category' => 'audio',
        'definition' => 'Digital Audio Workstation — software completo para grabar, editar, mezclar y masterizar audio y MIDI. Ejemplos: Bitwig Studio, Ableton Live, Logic Pro, Reaper. Una DAW integra grabación multipista, instrumentos virtuales, efectos, automatización y herramientas de edición en un solo entorno.',
    ],
    [
        'term' => 'Buffer de Audio',
        'slug' => 'buffer-audio',
        'category' => 'audio',
        'definition' => 'Tamaño del bloque de muestras que procesa la tarjeta de audio en cada ciclo, medido en samples (ej: 64, 128, 256, 512). Determina la latencia del sistema: un buffer menor reduce la latencia (más fluido para tocar en directo) pero exige más CPU; un buffer mayor alivia la carga de CPU pero aumenta el retardo perceptible. Valores típicos de producción: 256–512 samples. Para tocar en directo: 64–128 samples si el sistema lo soporta.',
    ],
    [
        'term' => 'Sample Rate',
        'slug' => 'sample-rate',
        'category' => 'audio',
        'definition' => 'Número de muestras por segundo que se capturan al digitalizar audio, medido en Hz. El estándar de CD es 44.100 Hz (44,1 kHz) y el de producción profesional 48 kHz o 96 kHz. Según el teorema de Nyquist, la frecuencia máxima reproducible es la mitad del sample rate.',
    ],
    // ── Bitwig ──
    [
        'term' => 'Arranger Timeline',
        'slug' => 'arranger-timeline',
        'category' => 'bitwig',
        'definition' => 'Secuenciador lineal de Bitwig que opera a través de una línea de tiempo musical estándar. Se utiliza para el montaje de la estructura de una canción y la producción final, permitiendo trabajar en formato horizontal con clips, automatización y arreglos.',
    ],
    [
        'term' => 'Bounce (Volcar)',
        'slug' => 'bounce',
        'category' => 'bitwig',
        'definition' => 'Función para renderizar o imprimir audio. Puede crear una nueva pista con el audio procesado o, mediante Bounce in Place, reemplazar el clip seleccionado por uno de audio dentro de la misma pista (o convirtiéndola en pista híbrida).',
    ],
    [
        'term' => 'Clip Launcher',
        'slug' => 'clip-launcher',
        'category' => 'bitwig',
        'definition' => 'Secuenciador no lineal que permite acumular ideas musicales, improvisar y disparar clips libremente o en sincronía. Funciona con un formato vertical de ranuras y escenas. Los clips de audio y MIDI se organizan en una rejilla de escenas y pistas, permitiendo combinar loops y construir arreglos de forma flexible antes de pasarlos al Arranger Timeline.',
    ],
    [
        'term' => 'Comping',
        'slug' => 'comping',
        'category' => 'bitwig',
        'definition' => 'Flujo de trabajo para grabación de audio que permite grabar múltiples tomas (takes) en bucle y luego seleccionar y combinar las mejores partes para crear una toma compuesta perfecta.',
    ],
    [
        'term' => 'Contenedores (Containers)',
        'slug' => 'containers',
        'category' => 'bitwig',
        'definition' => 'Dispositivos utilitarios cuya función principal es alojar otros dispositivos. Ejemplos: Drum Machine (caja de ritmos), Instrument Layer (capa de instrumentos) o FX Layer. Permiten crear cadenas de efectos paralelas y configuraciones complejas de instrumentos.',
    ],
    [
        'term' => 'Dashboard',
        'slug' => 'dashboard',
        'category' => 'bitwig',
        'definition' => 'Ventana central o "centro de mando" que aparece al iniciar Bitwig. Desde aquí se gestionan los proyectos, la configuración de audio/controladores, los paquetes de sonido y la ayuda.',
    ],
    [
        'term' => 'Inspector',
        'slug' => 'inspector',
        'category' => 'bitwig',
        'definition' => 'Panel lateral (accesible con la tecla "I") que muestra y permite editar todos los parámetros y propiedades del elemento seleccionado actualmente (clip, pista, nota, dispositivo, etc.).',
    ],
    [
        'term' => 'Moduladores (Modulators)',
        'slug' => 'modulators',
        'category' => 'bitwig',
        'definition' => 'Sistema de modulación unificado de Bitwig con más de 40 módulos (LFOs, envolventes, seguidores, steps, expresiones) que pueden cargarse en cualquier dispositivo (nativo o plugin VST/CLAP) para controlar sus parámetros automáticamente. Se arrastran directamente sobre los knobs, haciendo que los sonidos cobren vida y movimiento sin necesidad de automatización manual.',
    ],
    [
        'term' => 'MSEG (Multi-Segment Envelope Generator)',
        'slug' => 'mseg',
        'category' => 'bitwig',
        'definition' => 'Generador de envolventes multisegmento que permite dibujar formas de curva personalizadas para modulación y automatización. En Bitwig, se implementa a través de dispositivos como Curves o el módulo Segments.',
    ],
    [
        'term' => 'Note FX',
        'slug' => 'note-fx',
        'category' => 'bitwig',
        'definition' => 'Procesadores MIDI exclusivos de Bitwig que transforman las notas antes de llegar al instrumento. Incluyen arpeggiadores, aleatorizadores de velocidad, transposición condicional, humanización y generadores de acordes. Se encadenan en serie dentro de la cadena de dispositivos para crear patrones complejos a partir de entrada simple.',
    ],
    [
        'term' => 'Operadores (Operators)',
        'slug' => 'operators-bitwig',
        'category' => 'bitwig',
        'definition' => 'Funciones que permiten animar secuencias de notas o audio añadiendo lógica y probabilidad. Incluyen modos como Chance (probabilidad), Repeats (repeticiones), Occurrence (ocurrencia) y Recurrence, aportando variación y vida a los patrones.',
    ],
    [
        'term' => 'Pista Híbrida (Hybrid Track)',
        'slug' => 'hybrid-track',
        'category' => 'bitwig',
        'definition' => 'Tipo de pista que permite contener y reproducir tanto clips de audio como clips de notas (MIDI) simultáneamente en la misma pista, simplificando el flujo de trabajo.',
    ],
    [
        'term' => 'Pista de Grupo (Group Track)',
        'slug' => 'group-track',
        'category' => 'bitwig',
        'definition' => 'Carpeta que une varias pistas componentes para facilitar la mezcla y edición conjunta. En el Arranger, muestra "meta clips" que resumen el contenido de las pistas internas.',
    ],
    [
        'term' => 'Polymer',
        'slug' => 'polymer',
        'category' => 'bitwig',
        'definition' => 'Sintetizador híbrido modular de Bitwig que permite intercambiar módulos de oscilador, filtro y envolvente (basados en The Grid) directamente en una interfaz de dispositivo compacta, combinando la flexibilidad modular con la facilidad de un synth tradicional.',
    ],
    [
        'term' => 'Sandboxing',
        'slug' => 'sandboxing',
        'category' => 'bitwig',
        'definition' => 'Característica de Bitwig que aísla los plugins del motor de audio principal. Si un plugin falla ("crashea"), no cierra el programa ni detiene el audio; el plugin simplemente deja de sonar y puede recargarse sin perder la sesión.',
    ],
    [
        'term' => 'The Grid',
        'slug' => 'the-grid',
        'category' => 'bitwig',
        'definition' => 'Entorno de diseño de sonido modular nativo de Bitwig. Permite construir sintetizadores (Poly Grid), efectos de audio (FX Grid) o procesadores de notas (Note Grid) conectando módulos libremente en un lienzo visual. Combina la flexibilidad de un sistema modular con la integración total en el DAW, incluyendo moduladores, presets y polifonía automática.',
    ],
    [
        'term' => 'Poly Grid',
        'slug' => 'poly-grid',
        'category' => 'bitwig',
        'definition' => 'Dispositivo de The Grid para construir instrumentos. Puede recibir MIDI y enviar audio. En él puedes construir sintetizadores simples o sistemas completos autogenerativos.',
    ],
    [
        'term' => 'Note Grid',
        'slug' => 'note-grid',
        'category' => 'bitwig',
        'definition' => 'Entorno de The Grid para procesar o generar notas MIDI. Por defecto viene con MIDI In y MIDI Out. En él puedes construir procesadores de notas, arpegiadores y otras herramientas MIDI.',
    ],
    [
        'term' => 'FX Grid',
        'slug' => 'fx-grid',
        'category' => 'bitwig',
        'definition' => 'Entorno de The Grid para crear efectos de audio. Por defecto viene con una entrada y una salida de audio. En él puedes crear delays, reverbs y otros procesadores.',
    ],
    [
        'term' => 'Gate In',
        'slug' => 'gate-in',
        'category' => 'bitwig',
        'definition' => 'Objeto de The Grid por el que entran las señales de puerta de las notas cuando están activadas. La señal gate indica cuándo una nota está activa.',
    ],
    [
        'term' => 'Pitch In',
        'slug' => 'pitch-in',
        'category' => 'bitwig',
        'definition' => 'Objeto de The Grid por el que entra el tono de las notas cuando están activadas. La señal pitch controla la afinación.',
    ],
    [
        'term' => 'Low Pass Gate',
        'slug' => 'low-pass-gate',
        'category' => 'sintesis',
        'definition' => 'Comportamiento donde filtro y dinámica se abren y cierran juntos. Normalmente una envolvente abre el cutoff del filtro, tratando el sonido de forma distinta a una envolvente normal sobre un VCA y dando un resultado más parecido a un instrumento real. Históricamente se asocia a los instrumentos Buchla 200.',
    ],
    [
        'term' => 'Voice Stacking',
        'slug' => 'voice-stacking',
        'category' => 'bitwig',
        'definition' => 'Función que permite apilar múltiples voces para cada nota tocada, variando parámetros (como paneo o afinación) por cada voz individual para crear sonidos ricos, anchos y complejos sin necesidad de duplicar pistas.',
    ],
    // ── VCV Rack específicos ──
    [
        'term' => 'Crossfade X/I',
        'slug' => 'crossfade-xi',
        'category' => 'vcvrack',
        'definition' => 'En el módulo MAR, el control que mezcla entre dos ejes de entrada. Permite transicionar suavemente entre dos grupos de fuentes de sonido (en este patch, osciladores normales vs subosciladores).',
    ],
    [
        'term' => 'Patch Cable',
        'slug' => 'patch-cable',
        'category' => 'vcvrack',
        'definition' => 'Conexión virtual que une la salida de un módulo con la entrada de otro en VCV Rack. Equivale a los cables físicos de un sintetizador modular. En VCV Rack los cables tienen colores aleatorios (personalizables) y permiten múltiples conexiones desde una misma salida. La filosofía modular se basa en esta libertad de conexión.',
    ],
    [
        'term' => 'PPQN (Pulses Per Quarter Note)',
        'slug' => 'ppqn',
        'category' => 'vcvrack',
        'definition' => 'Resolución del reloj en un secuenciador. A mayor PPQN, mayor precisión temporal. Se usa PPQN 24 como estándar para estabilidad con módulos de reloj como Clocked.',
    ],
    [
        'term' => 'Sequencer (Secuenciador)',
        'slug' => 'sequencer',
        'category' => 'vcvrack',
        'definition' => 'Módulo que genera una secuencia programada de valores CV y gates en el tiempo, controlado por un reloj externo. Cada paso envía un voltaje (nota/pitch) y un gate (on/off). Los secuenciadores por pasos son la base de la composición en entornos modulares y permiten crear patrones rítmicos y melódicos de forma visual e intuitiva.',
    ],
    // ── Modulación General ──
    [
        'term' => 'Modulación',
        'slug' => 'modulacion',
        'category' => 'sintesis',
        'definition' => 'Proceso de usar una señal de control (LFO, envolvente, secuenciador, etc.) para modificar dinámicamente un parámetro de un módulo o instrumento: filtro, pitch, volumen, paneo, etc. Es el principio fundamental que transforma sonidos estáticos en texturas vivas y expresivas.',
    ],
    // ── Módulos Específicos VCV Rack ──
    [
        'term' => 'Clocked (Impromptu Modular)',
        'slug' => 'clocked',
        'category' => 'vcvrack',
        'definition' => 'Reloj maestro de Impromptu Modular para VCV Rack con múltiples salidas de reloj subdivididas y multiplicadas. Permite sincronizar todo el patch desde una fuente central a distintas velocidades (÷2, ÷4, ×2, ×3…), con control de BPM, swing y reset. Referencia estándar de temporización en patches modulares complejos.',
    ],
    [
        'term' => 'Note Seq (Impromptu Modular)',
        'slug' => 'note-seq',
        'category' => 'vcvrack',
        'definition' => 'Secuenciador de notas de Impromptu Modular con cuantizador de escala integrado y función de aleatorización programable. Permite programar melodías paso a paso eligiendo nota, octava y gate para cada paso, con la opción de introducir variación aleatoria controlada directamente desde el módulo.',
    ],
    [
        'term' => 'Bernoulli Gate',
        'slug' => 'bernoulli-gate',
        'category' => 'vcvrack',
        'definition' => 'Módulo probabilístico que recibe un gate de entrada y decide aleatoriamente si lo envía a la salida A o a la salida B según un porcentaje configurable. Con un 70% en A, cada gate tiene un 70% de probabilidad de salir por A y un 30% por B. Es una herramienta esencial para introducir variación orgánica en ritmos y melodías sin que el resultado sea completamente predecible.',
    ],
    [
        'term' => 'Patch Autogenerativo',
        'slug' => 'patch-autogenerativo',
        'category' => 'vcvrack',
        'definition' => 'Sistema de patch en VCV Rack que evoluciona musicalmente de forma autónoma sin intervención del usuario, combinando aleatoriedad controlada (S&H, Bernoulli Gate, valores random) con bucles de retroalimentación de CV. El resultado es música generativa que nunca se repite exactamente pero mantiene coherencia gracias a la cuantización y las restricciones de escala.',
    ],
    [
        'term' => 'Música Generativa',
        'slug' => 'musica-generativa',
        'category' => 'vcvrack',
        'definition' => 'Música creada parcial o totalmente mediante sistemas aleatorios o algorítmicos, sin intervención humana constante. En VCV Rack se logra combinando módulos como S&H, Bernoulli Gate, secuenciadores probabilísticos y retroalimentación de CV para que el patch evolucione de forma autónoma y nunca se repita exactamente.',
    ],
    [
        'term' => 'NoteSeqFu',
        'slug' => 'noteseqfu',
        'category' => 'vcvrack',
        'definition' => 'Módulo de VCV Rack de BogAudio que ofrece 4 timelines independientes, cada una generando notas basadas en probabilidad y divisiones de clock distintas. Permite crear patrones melódicos generativos complejos donde cada voz evoluciona con su propio ritmo y grado de aleatoriedad.',
    ],
    [
        'term' => 'Timeline (NoteSeqFu)',
        'slug' => 'timeline-noteseqfu',
        'category' => 'vcvrack',
        'definition' => 'Cada una de las 4 líneas de tiempo independientes dentro del módulo NoteSeqFu. Tiene su propia velocidad de reproducción (división de clock), modo de reproducción y salidas V/Oct + Gate independientes, permitiendo que cada voz siga su propia lógica generativa.',
    ],
    [
        'term' => 'Clock Divider',
        'slug' => 'clock-divider',
        'category' => 'vcvrack',
        'definition' => 'Módulo que toma un clock maestro y genera señales de reloj subdivididas: si entra 1/4 de nota, pueden salir simultáneamente 1/8, 1/16, 1/32 o cualquier subdivisión configurada. Permite sincronizar varios módulos a distintas velocidades rítmicas desde una única fuente de reloj.',
    ],
    [
        'term' => 'Polirritmia',
        'slug' => 'poliritmia',
        'category' => 'vcvrack',
        'definition' => 'Superposición simultánea de dos o más patrones rítmicos con diferentes longitudes de ciclo. Por ejemplo, un patrón de 3 pasos contra uno de 4 pasos crea un ciclo completo de 12 pasos antes de repetirse. Los patrones se sincronizan y desincronizan periódicamente, creando tensión y resolución rítmica. En VCV Rack se consigue fácilmente asignando diferentes longitudes de paso a varios secuenciadores sincronizados al mismo reloj.',
    ],
    // ── Mezcla / Hardware ──
    [
        'term' => 'Bus Force (Arturia)',
        'slug' => 'bus-force',
        'category' => 'mezcla',
        'definition' => 'Procesador de bus de Arturia que combina en un solo dispositivo compresión de bus, saturación analógica y EQ de masterización. Diseñado para imprimir carácter y cohesión al bus de mezcla, aportando la pegada y el calor típicos del hardware analógico. Ideal como última etapa antes de la salida del master.',
    ],
    // ── Linux / Plugins ──
    [
        'term' => 'Yabridge',
        'slug' => 'yabridge',
        'category' => 'audio',
        'definition' => 'Software de código abierto que permite ejecutar plugins VST2 y VST3 de Windows en Linux mediante Wine. Traduce las llamadas de los plugins a través de una capa de compatibilidad, ofreciendo una solución estable para usar instrumentos y efectos diseñados para Windows en un entorno Linux nativo.',
    ],
    [
        'term' => 'LV2 / CLAP',
        'slug' => 'lv2-clap',
        'category' => 'audio',
        'definition' => 'Formatos de plugin nativos y de código abierto para sistemas Linux (y otras plataformas). LV2 es el sucesor de LADSPA y ofrece soporte para MIDI, interfaces gráficas y extensibilidad. CLAP (CLever Audio Plugin) es un formato más moderno con mejor soporte para polifonía MPE, modulación por nota y comunicación bidireccional plugin-host. Ambos son más estables y eficientes que ejecutar plugins de Windows con Wine.',
    ],
    // ── Bitwig / Edición ──
    [
        'term' => 'Spray',
        'slug' => 'spray',
        'category' => 'bitwig',
        'definition' => 'Herramienta de dibujo de notas introducida en Bitwig 6. Permite pintar notas rápidamente en el piano roll con un gesto de ratón continuo, ajustando la velocidad de cada nota sobre la marcha según la posición vertical del cursor. Ideal para crear patrones expresivos de forma rápida e intuitiva.',
    ],
    // ── Audio / Tiempo ──
    [
        'term' => 'Warping',
        'slug' => 'warping',
        'category' => 'audio',
        'definition' => 'Proceso de ajustar el tempo de un archivo de audio para que encaje con el BPM del proyecto sin cambiar su tono (pitch). Se basa en algoritmos de time-stretching que reposicionan marcadores temporales (warp markers) dentro del clip. Permite mezclar samples de distintos BPM o cuantizar grabaciones desincronizadas al grid del DAW.',
    ],
];

// Sort terms alphabetically
usort($terms, function ($a, $b) {
    return strcasecmp($a['term'], $b['term']);
});

// Group terms by first letter
$grouped = [];
foreach ($terms as $t) {
    $letter = strtoupper(mb_substr($t['term'], 0, 1));
    $grouped[$letter][] = $t;
}
ksort($grouped);

$alphabet = range('A', 'Z');

// SVG icon library (inner content only — wrapped in <svg> in template)
$icons = [
    'sine' => '<path d="M2 12c2-6 5-6 7 0s5 6 7 0 5-6 7 0"/>',
    'saw' => '<path d="M3 16l5-8v8l5-8v8l4-8"/>',
    'square' => '<path d="M3 15V9h4v6h5V9h4v6h4V9"/>',
    'envelope' => '<path d="M2 18l4-12 4 6h6l4 6"/>',
    'filter' => '<path d="M3 8h7l10 10"/><circle cx="10" cy="8" r="1.5" fill="currentColor"/>',
    'knob' => '<circle cx="12" cy="12" r="7"/><path d="M12 5v3"/><circle cx="12" cy="12" r="1.5" fill="currentColor"/>',
    'cable' => '<circle cx="6" cy="6" r="3"/><circle cx="18" cy="18" r="3"/><path d="M8.5 8.5c2 1 1 6 7 7"/>',
    'steps' => '<path d="M4 16V14h3v2H4zm5 0V10h3v6H9zm5 0V7h3v9h-3zm5 0v-4h3v4h-3z" fill="currentColor"/>',
    'faders' => '<path d="M7 4v16m10-16v16"/><rect x="5" y="8" width="4" height="3" rx=".5" fill="currentColor"/><rect x="15" y="13" width="4" height="3" rx=".5" fill="currentColor"/>',
    'reverb' => '<path d="M7 8a5 5 0 0 1 0 8"/><path d="M10 5.5a9 9 0 0 1 0 13"/><path d="M13 3.5a12 12 0 0 1 0 17"/>',
    'speaker' => '<path d="M6 9h3l5-4v14l-5-4H6V9z"/><path d="M16 9.5a3.5 3.5 0 0 1 0 5"/><path d="M18.5 7a7 7 0 0 1 0 10"/>',
    'grid' => '<rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/>',
    'fm' => '<circle cx="12" cy="12" r="3"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="9"/>',
    'grain' => '<circle cx="5" cy="8" r="1.5" fill="currentColor"/><circle cx="10" cy="5" r="1" fill="currentColor"/><circle cx="16" cy="9" r="1.5" fill="currentColor"/><circle cx="8" cy="14" r="1" fill="currentColor"/><circle cx="14" cy="17" r="1.5" fill="currentColor"/><circle cx="19" cy="13" r="1" fill="currentColor"/><circle cx="19" cy="6" r=".75" fill="currentColor"/><circle cx="5" cy="18" r=".75" fill="currentColor"/>',
    'fold' => '<path d="M2 12l3.5-6 3.5 6-3.5 6m5-12l3.5-6L18 12l-3.5 6"/>',
    'smooth' => '<path d="M3 16h3c4 0 4-8 8-8h7"/>',
    'scale' => '<path d="M4 18V6m0 3h14m-14 4h14m-14 4h14"/><circle cx="8" cy="13" r="1.5" fill="currentColor"/><circle cx="14" cy="9" r="1.5" fill="currentColor"/><circle cx="11" cy="17" r="1.5" fill="currentColor"/>',
    'mic' => '<rect x="9" y="2" width="6" height="10" rx="3"/><path d="M5 10a7 7 0 0 0 14 0"/><path d="M12 17v4m-3 0h6"/>',
    'harmonics' => '<path d="M5 18V12m4 6V8m4 10V10m4 8V6m4 12v-4" stroke-width="2.5" stroke-linecap="round"/>',
    'play' => '<path d="M7 4v16l12-8z"/>',
    'timeline' => '<path d="M3 7h18M3 12h12M3 17h15"/><circle cx="21" cy="12" r="1.5" fill="currentColor"/>',
    'render' => '<path d="M12 3v10m0 0l-4-4m4 4l4-4"/><path d="M4 17v2a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-2"/>',
    'loop' => '<path d="M17 2l3 3-3 3"/><path d="M7 22l-3-3 3-3"/><path d="M20 5H10a5 5 0 0 0-5 5"/><path d="M4 19h10a5 5 0 0 0 5-5"/>',
    'layers' => '<path d="M12 4L2 9l10 5 10-5z"/><path d="M2 14l10 5 10-5"/>',
    'home' => '<path d="M3 10l9-7 9 7v9a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1z"/><path d="M9 21v-8h6v8"/>',
    'inspect' => '<circle cx="10" cy="10" r="6"/><path d="M21 21l-4.5-4.5"/><path d="M10 7v6m-3-3h6"/>',
    'curve' => '<path d="M3 18c2-4 4-12 9-8s4 6 9-4"/><circle cx="3" cy="18" r="1.5" fill="currentColor"/><circle cx="21" cy="6" r="1.5" fill="currentColor"/>',
    'dice' => '<rect x="4" y="4" width="16" height="16" rx="2"/><circle cx="8.5" cy="8.5" r="1.5" fill="currentColor"/><circle cx="12" cy="12" r="1.5" fill="currentColor"/><circle cx="15.5" cy="15.5" r="1.5" fill="currentColor"/>',
    'note' => '<circle cx="7" cy="17" r="3"/><path d="M10 17V5l9-2"/><circle cx="16" cy="15" r="3"/><path d="M19 15V3"/>',
    'split' => '<path d="M12 3v18M3 12h18"/><rect x="4" y="5" width="6" height="5" rx="1" opacity=".35" fill="currentColor"/><rect x="14" y="14" width="6" height="5" rx="1" opacity=".35" fill="currentColor"/>',
    'folder' => '<path d="M3 7a1 1 0 0 1 1-1h5l2 2h8a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7z"/>',
    'synth' => '<rect x="2" y="12" width="3" height="8" rx=".5"/><rect x="5.5" y="12" width="3" height="8" rx=".5"/><rect x="9" y="12" width="3" height="8" rx=".5"/><rect x="12.5" y="12" width="3" height="8" rx=".5"/><rect x="16" y="12" width="3" height="8" rx=".5"/><rect x="3.5" y="5" width="2" height="8" rx=".5" fill="currentColor"/><rect x="7" y="5" width="2" height="8" rx=".5" fill="currentColor"/><rect x="14" y="5" width="2" height="8" rx=".5" fill="currentColor"/>',
    'shield' => '<path d="M12 3l8 4v5c0 5.5-3.84 10.74-8 12-4.16-1.26-8-6.5-8-12V7l8-4z"/>',
    'crossfade' => '<path d="M4 18L20 6M4 6l16 12"/>',
    'clock' => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/>',
    'plug' => '<path d="M8 3v4m8-4v4"/><rect x="6" y="7" width="12" height="4" rx="1"/><path d="M10 11v3a2 2 0 0 0 4 0v-3"/><path d="M12 16v4"/>',
    'alias' => '<path d="M2 16l3-5 2 4 3-7 2 5 3-8 2 6 3-5"/>',
    'bipolar' => '<path d="M12 3v18M3 12h18"/><path d="M8 7l4-4 4 4"/><path d="M8 17l4 4 4-4"/>',
    'lpg' => '<path d="M3 8h7l10 10"/><path d="M3 16l7-7"/>',
    'random' => '<path d="M3 14h3V10h3v6h3V8h3v8h3V11h3" stroke-width="2" stroke-linecap="round"/>',
    'poly' => '<path d="M3 12h3m12 0h3M12 3v3m0 12v3"/><circle cx="12" cy="12" r="4"/><circle cx="12" cy="12" r="7" stroke-dasharray="3 2"/>',
    'send' => '<path d="M3 8h10m0 0l-4-4m4 4l-4 4"/><path d="M21 16H11m0 0l4-4m-4 4l4 4"/>',
];

// Map term slug → icon key
$icon_map = [
    '1v-oct' => 'cable', 'cv' => 'cable',
    'gate' => 'square', 'trigger' => 'square',
    'clock' => 'clock', 'ppqn' => 'clock',
    'modulacion-bipolar-unipolar' => 'bipolar',
    'vco' => 'sine', 'oscillator' => 'sine',
    'operator' => 'fm', 'carrier' => 'fm',
    'modulator-fm' => 'fm', 'algorithm' => 'fm',
    'feedback' => 'fm',
    'wavetable' => 'saw', 'sintesis-granular' => 'grain',
    'sintesis-estocastica' => 'alias',
    'sintesis-aditiva' => 'harmonics',
    'parciales' => 'harmonics',
    'vocoder' => 'mic',
    'filter' => 'filter', 'vcf' => 'filter',
    'resonance' => 'knob', 'attenuverter' => 'knob',
    'lpg' => 'lpg', 'wavefolder' => 'fold',
    'slew-limiter' => 'smooth', 'glide' => 'smooth',
    'vca' => 'envelope', 'adsr' => 'envelope',
    'lfo' => 'sine', 'sample-hold' => 'random',
    'quantizer' => 'scale', 'aliasing' => 'alias',
    'ac-dc-coupled' => 'plug',
    'compressor' => 'faders', 'eq' => 'faders',
    'reverb' => 'reverb',
    'bit-depth' => 'speaker', 'daw' => 'speaker',
    'sample-rate' => 'speaker',
    'arranger-timeline' => 'timeline',
    'bounce' => 'render', 'clip-launcher' => 'play',
    'comping' => 'loop',
    'containers' => 'layers', 'voice-stacking' => 'layers',
    'dashboard' => 'home', 'inspector' => 'inspect',
    'modulators' => 'curve', 'mseg' => 'curve',
    'note-fx' => 'note', 'operators-bitwig' => 'dice',
    'hybrid-track' => 'split', 'group-track' => 'folder',
    'polymer' => 'synth', 'sandboxing' => 'shield',
    'the-grid' => 'grid',
    'poly-grid' => 'synth', 'note-grid' => 'note',
    'fx-grid' => 'reverb', 'gate-in' => 'square',
    'pitch-in' => 'scale', 'low-pass-gate' => 'lpg',
    'crossfade-xi' => 'crossfade', 'patch-cable' => 'cable',
    'sequencer' => 'steps',
    'senal-polifonica' => 'poly',
    'fm-sintesis' => 'fm',
    'send-return' => 'send',
    'buffer-audio' => 'speaker',
    'clocked' => 'clock',
    'note-seq' => 'steps',
    'bernoulli-gate' => 'dice',
    'patch-autogenerativo' => 'random',
    'poliritmia' => 'steps',
    'bus-force' => 'faders',
    'modulacion' => 'curve',
    'musica-generativa' => 'random',
    'noteseqfu' => 'steps',
    'timeline-noteseqfu' => 'timeline',
    'clock-divider' => 'clock',
    'yabridge' => 'plug',
    'lv2-clap' => 'plug',
    'spray' => 'note',
    'warping' => 'smooth',
];

// Category fallback icons
$cat_icons = [
    'vcvrack' => 'cable', 'bitwig' => 'grid', 'sintesis' => 'sine',
    'mezcla' => 'faders', 'audio' => 'speaker',
];

return [
    'categories' => $categories,
    'terms'      => $terms,
    'icons'      => $icons,
    'icon_map'   => $icon_map,
    'cat_icons'  => $cat_icons,
];
