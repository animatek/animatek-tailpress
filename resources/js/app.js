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
