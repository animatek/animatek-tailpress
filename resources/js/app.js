/**
 * Menú móvil.
 *
 * Abre y cierra el overlay a pantalla completa (#mobile-nav), que es una lista
 * aparte y no el <ul> de escritorio encogido. Se cierra con los gestos que la
 * gente espera (Escape, pulsar un enlace) y bloquea el scroll del fondo
 * mientras está abierto.
 *
 * A partir de 960 px (breakpoint lg del tema) el nav del header es estático y nada de esto aplica: el
 * media query devuelve el control al CSS.
 */
const initPrimaryMenuToggle = () => {
    const mobileNav = document.getElementById('mobile-nav')
    const toggle = document.getElementById('primary-menu-toggle')

    if (!mobileNav || !toggle || toggle.dataset.menuBound === 'true') {
        return
    }

    toggle.dataset.menuBound = 'true'

    const desktopMediaQuery = window.matchMedia('(min-width: 960px)')

    const isOpen = () => mobileNav.classList.contains('is-open')

    // Dónde empieza la lista. El hueco no se puede fijar en el CSS: el header
    // mide 72 px, pero con la barra de administración de WordPress encima (32 px,
    // fija) empieza más abajo, y el primer ítem quedaba cortado. Se mide al abrir,
    // que además da el valor bueno si la página está desplazada.
    const topGap = () => {
        const header = document.querySelector('#page > header')
        const adminBar = document.getElementById('wpadminbar')
        const bottom = Math.max(
            header ? header.getBoundingClientRect().bottom : 0,
            adminBar ? adminBar.getBoundingClientRect().bottom : 0
        )

        return `${Math.round(bottom) + 24}px`
    }

    const setState = (open) => {
        mobileNav.style.paddingTop = open ? topGap() : ''
        mobileNav.classList.toggle('is-open', open)
        mobileNav.setAttribute('aria-hidden', open ? 'false' : 'true')
        document.documentElement.classList.toggle('menu-open', open)
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false')
        toggle.setAttribute('aria-label', open ? 'Cerrar menú' : 'Abrir menú')
        // El overlay es fixed: sin esto el fondo sigue haciendo scroll detrás.
        document.body.style.overflow = open ? 'hidden' : ''
    }

    // El foco se queda en la hamburguesa a propósito: el overlay va justo
    // después en el DOM, así que el siguiente tabulador ya entra en el menú.
    const close = ({ restoreFocus = false } = {}) => {
        setState(false)
        if (restoreFocus) {
            toggle.focus()
        }
    }

    toggle.addEventListener('click', (event) => {
        event.preventDefault()
        setState(!isOpen())
    })

    // Escape, para quien navegue con teclado.
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && isOpen()) {
            close({ restoreFocus: true })
        }
    })

    // Al pulsar un enlace. Importa sobre todo con los que van a un ancla de la
    // misma página, donde no hay recarga que cierre el menú por su cuenta.
    mobileNav.addEventListener('click', (event) => {
        if (event.target.closest('a') && isOpen()) {
            close()
        }
    })

    // Girar el móvil o ensanchar la ventana hasta escritorio con el menú
    // abierto dejaba el scroll bloqueado y el overlay tapando la página.
    desktopMediaQuery.addEventListener('change', (event) => {
        if (event.matches && isOpen()) {
            close()
        }
    })

    setState(false)
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initPrimaryMenuToggle, { once: true })
} else {
    initPrimaryMenuToggle()
}

/**
 * Enrutador "¿Por dónde empiezo?".
 *
 * Vive en /empezar/ y dentro de los Labs, así que puede haber más de uno en la
 * página y cada uno lleva su propio estado. Los paneles ya vienen pintados en el
 * HTML: aquí solo se enseña uno y se esconden los demás. Sin JS la página sigue
 * siendo legible (y rastreable), que es por lo que no se renderiza desde
 * JavaScript.
 *
 * Los vídeos se abren aquí dentro. Mandar a YouTube a quien acaba de decirte qué
 * necesita es regalar la visita, y desde el Lab además es sacarlo de la guía que
 * acaba de desbloquear.
 */
const initEnrutador = (raiz) => {
    if (raiz.dataset.enrutadorBound === 'true') {
        return
    }

    raiz.dataset.enrutadorBound = 'true'

    const paneles = new Map()
    raiz.querySelectorAll('[data-panel]').forEach((panel) => paneles.set(panel.dataset.panel, panel))

    const escribeHash = raiz.dataset.hash === '1'
    const historia = []

    const mostrar = (nombre, { apilar = true } = {}) => {
        const destino = paneles.get(nombre)

        if (!destino) {
            return
        }

        const actual = [...paneles.values()].find((panel) => !panel.hidden)

        if (actual && apilar && actual !== destino) {
            historia.push(actual.dataset.panel)
        }

        paneles.forEach((panel) => {
            panel.hidden = panel !== destino
        })

        if (escribeHash) {
            // replaceState y no hash directo: el hash llenaría el historial de
            // pasos intermedios y el botón de atrás dejaría de salir de la página.
            history.replaceState(null, '', nombre.startsWith('res-') ? `#${nombre}` : location.pathname)
        }

        const arriba = raiz.getBoundingClientRect().top + window.scrollY - 24
        window.scrollTo({ top: arriba, behavior: 'smooth' })
    }

    const reproducir = (boton) => {
        const id = boton.dataset.video

        if (!/^[\w-]{6,20}$/.test(id || '')) {
            return
        }

        const fila = boton.closest('li')
        const cuerpo = boton.querySelector('.empezar-video__cuerpo')
        const marco = document.createElement('div')

        marco.className = 'empezar-video__player'
        // nocookie: el vídeo no deja rastro hasta que se pulsa play de verdad.
        marco.innerHTML = `<iframe src="https://www.youtube-nocookie.com/embed/${id}?autoplay=1&rel=0" title="${boton.textContent.trim().replace(/"/g, '')}" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`

        fila.textContent = ''
        fila.append(marco)

        if (cuerpo) {
            fila.append(cuerpo)
        }

        fila.classList.add('empezar-video--abierto')
    }

    raiz.addEventListener('click', (event) => {
        const video = event.target.closest('[data-video]')

        if (video) {
            reproducir(video)
            return
        }

        const opcion = event.target.closest('[data-ir]')

        if (opcion) {
            mostrar(opcion.dataset.ir)
            return
        }

        if (event.target.closest('[data-reiniciar]')) {
            historia.length = 0
            mostrar('paso-inicio', { apilar: false })
            return
        }

        if (event.target.closest('[data-volver]')) {
            mostrar(historia.pop() || 'paso-inicio', { apilar: false })
        }
    })

    // Entrar directamente a un resultado enlazado desde fuera. También con el
    // hash ya en la página: cambiar de #res-a a #res-b no recarga nada, así que
    // sin esto un segundo enlace en la misma descripción de YouTube no hacía
    // nada al pulsarlo.
    const abrirDesdeHash = () => {
        const nombre = location.hash.slice(1)

        if (!nombre || !paneles.has(nombre)) {
            return
        }

        paneles.forEach((panel) => {
            panel.hidden = panel.dataset.panel !== nombre
        })
    }

    window.addEventListener('hashchange', abrirDesdeHash)
    abrirDesdeHash()
}

const initEnrutadores = () => {
    document.querySelectorAll('[data-enrutador]').forEach(initEnrutador)
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initEnrutadores, { once: true })
} else {
    initEnrutadores()
}
