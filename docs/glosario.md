# Glosario de Animatek — estado y plan

Documento de traspaso, escrito el **2026-09-04**. Recoge dónde se quedó el trabajo del
glosario para poder retomarlo en frío.

## Qué hay montado y funcionando

El glosario dejó de vivir en un array PHP del tema y pasó a ser una base de datos.

| Pieza | Dónde | Estado |
|---|---|---|
| Plugin `animatek-glosario` (CPT + campos + REST) | `github.com/animatek/animatek-glosario` | Publicado, v1.0.1 |
| Índice `/glosario/` | `page-glosario.php` del tema | Diseño del tema, datos del plugin |
| Ficha `/glosario/<slug>/` | `single-glosario.php` del tema | Publicada, v5.4.4 |
| Términos en producción | animatek.net | 135 (85 conceptos + 50 módulos) |

El índice sigue pintándolo el tema. Lo único que cambió ahí son tres líneas:

```php
$terms = function_exists( 'agl_terminos' ) ? agl_terminos() : $glosario['terms'];
```

Con el plugin activo los términos salen de la base de datos; sin él, del array de
`inc/glosario-data.php` de siempre. **El diseño es del tema, los datos del plugin.**

## Herramientas del pipeline

Viven en `Creacion de Contenido animatek/comandos/`. **Las tres últimas están sin
commitear a propósito**, porque el trabajo se dejó a medias.

| Script | Qué hace | Estado |
|---|---|---|
| `glosario_desde_diccionario.py` | Convierte `modulos usados.md` en fichas | Commiteado |
| `glosario_subir.py` | Sube términos por REST con la app password | Commiteado |
| `glosario_vcv_info.py` | Saca de la VCV Library: captura, autor, manual, web, código, licencia, versión y etiquetas | **Sin commitear** |
| `glosario_menciones.py` | Busca dónde se explica cada término en los directos archivados y devuelve el enlace al segundo exacto | **Sin commitear** |

Ambos nuevos están probados y funcionando.

## La idea que da valor al glosario

**"Dónde lo explico".** `glosario_menciones.py` recorre los directos archivados en
`/mnt/ARCHIVOS/Videos`, busca el término en la transcripción y devuelve el momento y la
frase. De ahí salen enlaces como `https://youtu.be/lSi5ZV65Zcg?t=5629` con su cita:

> *"aquí estamos haciendo cositas con el PolyChances de este que está…"*

**84 de 136 términos** ya tienen menciones, **544 en total**, y sube con cada directo.
Esto no lo puede copiar nadie: no es una definición de manual, es dónde lo explicas tú.

Dos detalles que costó descubrir y no hay que perder:

- **Manda el SRT corregido** (`04 - Publicación/Subtítulos/audio_subtitulos_corregidos.srt`),
  no el crudo. Buscando "PolyChances" el corregido da 8 aciertos y el crudo ninguno,
  porque Whisper escribe otra cosa. El paso de corrección del pipeline gana así un
  segundo uso.
- **Palabra completa obligatoria.** Sin `\b`, "ONA" aparecía dentro de *persona* y
  *funciona*, y "CAP" dentro de *capaz*: 128 y 96 menciones inventadas.

## Ya hecho del plan (2026-09-04)

- **Clic en un término lleva a su ficha.** La tarjeta del índice era un `<button>` que
  abría un modal; ahora es un `<a href>` al permalink que ya devolvía `agl_terminos()`.
  El modal se ha ido entero: `template-parts/glosario-modal.php` borrado, y con él sus
  estilos de modo claro y unas 60 líneas de JS. Si el plugin se desactiva no hay ficha a
  la que ir, así que la tarjeta se pinta como `<div>` y no enlaza: el índice queda como
  una lista con buscador, degradado pero no roto.
- **El Lab, captando desde el propio glosario.** Empezó siendo un bloque al final del
  índice, pero ahí abajo quedaba a 135 tarjetas de scroll. Acabó en
  `template-parts/glosario-lab-form.php`: una columna a la izquierda del listado,
  `sticky` desde `lg`, con el formulario de Brevo del Lab metido dentro. Además, un
  enlace discreto en el hero bajo el subtítulo.

  Lo que hace que esto valga la pena: **guarda la misma clave que el locker del Lab**
  (`vcv_lab_unlocked`), y `localStorage` es por dominio. Quien deja el email en el
  glosario entra en la misma lista de Brevo y llega a `/vcvrack-lab/` con la guía ya
  abierta, sin volver a pedirle nada. En cuanto se apunta, el bloque desaparece y el
  listado ocupa el ancho completo; al volver otro día tampoco lo ve.

  La URL del formulario y la clave dejan de estar sueltas en la plantilla: ahora salen de
  `animatek_vcv_lab_form_action()` y `animatek_vcv_lab_storage_key()` en `functions.php`,
  que es lo que garantiza que el glosario y el Lab apunten a la misma lista.

  **La trampa que costó una vuelta:** el botón de envío tiene que llevar dentro el SVG
  del loader, aunque no se vea nunca. Al enviar, el script de Brevo hace
  `boton.querySelector("svg").removeClass("sib-hide-loader-icon")` sin comprobar si
  existe, así que sin ese SVG el clic revienta con un TypeError **antes** de crear el
  `XMLHttpRequest`: el formulario no hace absolutamente nada y no avisa de nada.

  No reutiliza `brevo-locker.php` a propósito: aquel es una puerta que tapa un
  `#locked-content` y sin él se rompe (guarda la clave, pero peta en
  `lockedContent.scrollIntoView()` y no esconde nada). El bloque del glosario tiene su
  propio JS, mucho más corto. La caja de Brevo viene blanca y con 540px clavados en el
  HTML, así que se desmonta con la misma receta de `!important` que ya usaba
  `page-curso-bitwig-studio.php`.

### Los cuatro tipos, hechos (2026-09-04)

Plugin **v1.2.0**. `agl_tipo` ya distingue los cuatro:

| Tipo | Qué muestra |
|---|---|
| `concepto` | Definición + dónde lo explico |
| `modulo` | Captura deducida de la library, marca, autor, manual, web, etiquetas |
| `marca` | Su enlace + **sus módulos que están en el glosario**, con miniatura |
| `software` | Imagen destacada, web oficial o enlace de afiliado, documentación |

- **La imagen, por dos vías.** Los módulos la deducen del enlace a la library. Software y
  marcas usan la **imagen destacada** de siempre (el CPT ganó `thumbnail`), porque ahí no
  hay nada que deducir. Si hay destacada, manda ella; es la manera de arreglar a mano el
  módulo cuya captura no carga.
- **`agl_afiliado`.** Cuando está relleno sustituye a la web oficial en vez de sumarse:
  son el mismo destino, y tener los dos sería mandar tráfico a la versión que no paga.
  Sale con `rel="sponsored nofollow noopener"`.
- **La etiqueta del enlace oficial** ya no dice siempre "VCV Library": mira el host y pone
  "Ficha oficial" cuando apunta a otro sitio, que es el caso de todo el software.
- `agl_modulos_de_marca()` empareja por el campo `agl_marca`, que es texto libre. Hoy 36
  términos lo tienen relleno.

### Lo que queda

**Reclasificar.** 16 entradas tienen enlace de marca o de web y siguen siendo `modulo`:
Bogaudio, Vult, Befaco, ALM, NANO Modules, JW-Modules, Submit, Squinky Labs, VCV Drums,
VCV Rack, VCV Rack Pro, Bitwig Studio… Cambiarles el tipo es lo que arregla de una vez las
tres marcas mal emparejadas de la deuda conocida.

**Contenido de software.** Se puede automatizar traerlo (`og:image`, `og:description`,
`og:site_name` de cada web oficial), pero la descripción sale en inglés y de folleto, la
`og:image` suele ser una tarjeta social y no una captura del producto, y el enlace de
afiliado es manual por definición. Son ~15 entradas: una tarde, no un proyecto.

### Lo demás

- Mostrar **las 3 menciones más recientes** y un "ver todas" si hay más. Hoy no se puede:
  `agl_videos` guarda una URL por línea y no tiene ni la cita ni la fecha, así que hace
  falta cambiar el formato del meta en el plugin y volver a subir con
  `glosario_menciones.py`. La ficha las pinta hoy como una lista de URLs pelada.

### La ficha de módulo, hecha (2026-09-04)

Plugin **v1.1.0** y `single-glosario.php`. Tres campos nuevos, solo los que no se pueden
deducir: `agl_autor`, `agl_manual`, `agl_web`. Fuera la versión (caduca a la semana),
y fuera licencia, etiquetas y código.

**La captura no es un campo.** `agl_captura()` la deduce del enlace que ya había:

```
https://library.vcvrack.com/Fundamental/8vert
     → https://library.vcvrack.com/screenshots/400/Fundamental/8vert.webp
```

De las 34 entradas con enlace a la library, **21 tienen forma `Marca/Modulo`** y 19 de
esas dan captura. Las 2 que fallan son enlaces muertos (`Fundamental/FM-OP`, el que ya
estaba apuntado, y `Nevertrustrobots/Wabot`): la imagen se quita sola con `onerror` y la
ficha sigue entera. Las otras 13 son páginas de marca o búsquedas (`/?brand=Vult`,
`/squinkylabs-plug1`) y no tienen captura porque no son módulos — **la forma de la URL
distingue sola marca de módulo**, sin esperar al tipo `marca`.

Se sirve el **webp**, no el png: 128 KB frente a 243 KB con el mismo detalle. Va enlazada
desde la library, no copiada; si algún día quiere blindarse, se bajan a la mediateca desde
el pipeline.

Además: **`agl_etiquetas`** (una por línea) para las de la library — `Attenuator`,
`Polyphonic` — que se pintan como pills apagadas detrás de la categoría y la marca:
informan, no clasifican.

**El diseño pasó a dos columnas.** La captura a la izquierda (hasta 460px de alto) y a
la derecha título, pills, descripción y ficha técnica. Antes la imagen era un sello de
224px y el texto empezaba media pantalla más abajo.

**Las miniaturas de "Dónde lo explico" no necesitan nada.** `agl_video()` saca del propio
enlace el id, la miniatura (`i.ytimg.com/vi/<id>/mqdefault.jpg`) y el segundo, y pinta
"Lo explico en el 1:33:49" con el minuto sobre la miniatura. Entiende `youtu.be/…?t=5629`,
`youtube.com/watch?v=…`, `/embed/`, `/shorts/`, `/live/` y los tiempos en formato `1h33m49s`.
El título del vídeo sí necesitaría la API, y por eso no se pide: la promesa es el momento,
no el título.

**Lo que falta para que esto se llene:** `glosario_vcv_info.py` ya saca autor, manual, web
y etiquetas de la página de la library, pero tiene que empujarlos por REST a los campos
nuevos; y `glosario_menciones.py` tiene que subir las 544 menciones a `agl_videos`. Hasta
entonces la ficha solo enseña la captura.

## Decisiones pendientes del usuario

1. ¿Añadir **UZZ-X**, **MULTI** y **ONE**? Están publicados en la library y no están en el
   glosario.
2. ¿Separar **BLANK 3** y **BLANK ACID**? Hoy son una sola entrada y en la library son dos
   módulos con ficha e imagen propias.

## Deuda conocida

- **Unas 50 definiciones vienen del diccionario de corrección de Whisper**, que está escrito
  para arreglar la transcripción, no para leerse. El caso claro es **ADDR-SEQ**, cuya
  "definición" publicada es literalmente una URL. Ningún script arregla esto: hacen falta
  frases escritas por Javi, o que el pipeline las redacte el día que ese módulo salga en un
  directo.
- Tres entradas son **marcas** y el enriquecedor las emparejó con un módulo al azar:
  `Bogaudio → LGSW`, `JW-Modules → Crawl`, `Submit → Impact`. Se arregla al implementar el
  tipo `marca`.
- **FM-OP** tiene URL de la library que ya no responde.
- **Clock Divider** está en las dos fuentes (concepto del tema y módulo del diccionario):
  gana la última importación.

## Cómo se publica ahora

Sin FTP. El tema y el plugin se actualizan con **Git Updater**:

```
commit → push → gh release create vX.Y.Z → el workflow adjunta el zip
       → WordPress avisa de la actualización → botón Actualizar
```

Después de cada actualización hay que **purgar Cloudflare**: cachea el HTML y no se entera
de nada de lo que pasa dentro de WordPress. LiteSpeed sí se purga solo. El CSS y el JS
nunca hace falta purgarlos: Vite les pone un hash en el nombre.
