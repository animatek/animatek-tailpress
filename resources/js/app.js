/**
 * Menú principal en móvil.
 *
 * Abre y cierra el desplegable con transición, se cierra con los gestos que la
 * gente espera (tocar fuera, Escape, pulsar un enlace) y bloquea el scroll del
 * fondo mientras está abierto.
 *
 * En escritorio (>= 782 px) el nav es estático y nada de esto aplica: el media
 * query devuelve el control al CSS.
 */
const initPrimaryMenuToggle = () => {
    const mainNavigation = document.getElementById('primary-navigation')
    const mainNavigationToggle = document.getElementById('primary-menu-toggle')

    if (!mainNavigation || !mainNavigationToggle || mainNavigationToggle.dataset.menuBound === 'true') {
        return
    }

    mainNavigationToggle.dataset.menuBound = 'true'

    const desktopMediaQuery = window.matchMedia('(min-width: 782px)')
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)')

    // Tiene que coincidir con la transición de #primary-navigation en app.css.
    const TRANSITION_MS = 220

    let closeTimer = null

    const isOpen = () => mainNavigation.classList.contains('is-open')

    const lockScroll = (lock) => {
        document.body.style.overflow = lock ? 'hidden' : ''
    }

    const open = () => {
        window.clearTimeout(closeTimer)
        mainNavigation.classList.remove('hidden')
        mainNavigation.style.display = 'flex'
        mainNavigation.style.flexDirection = 'column'
        // Fuerza un reflow para que la transición arranque desde el estado
        // cerrado en vez de saltarse el fotograma inicial.
        void mainNavigation.offsetHeight
        mainNavigation.classList.add('is-open')
        mainNavigationToggle.setAttribute('aria-expanded', 'true')
        lockScroll(true)
    }

    const close = () => {
        window.clearTimeout(closeTimer)
        mainNavigation.classList.remove('is-open')
        mainNavigationToggle.setAttribute('aria-expanded', 'false')
        lockScroll(false)

        const hide = () => {
            // Si se ha vuelto a abrir mientras se cerraba, no lo escondas.
            if (isOpen()) {
                return
            }
            mainNavigation.classList.add('hidden')
            mainNavigation.style.display = 'none'
        }

        if (reducedMotion.matches) {
            hide()
        } else {
            closeTimer = window.setTimeout(hide, TRANSITION_MS)
        }
    }

    const syncStateWithDesktop = () => {
        window.clearTimeout(closeTimer)

        if (desktopMediaQuery.matches) {
            // En escritorio manda el CSS: ni clases de estado ni scroll bloqueado.
            mainNavigation.classList.remove('hidden', 'is-open')
            mainNavigation.style.display = ''
            mainNavigation.style.flexDirection = ''
            mainNavigationToggle.setAttribute('aria-expanded', 'true')
            lockScroll(false)
            return
        }

        mainNavigation.classList.remove('is-open')
        mainNavigation.classList.add('hidden')
        mainNavigation.style.display = 'none'
        mainNavigationToggle.setAttribute('aria-expanded', 'false')
        lockScroll(false)
    }

    mainNavigationToggle.addEventListener('click', (event) => {
        event.preventDefault()
        event.stopPropagation()
        isOpen() ? close() : open()
    })

    // Tocar fuera: es lo primero que prueba cualquiera en un móvil.
    document.addEventListener('click', (event) => {
        if (!isOpen() || desktopMediaQuery.matches) {
            return
        }
        if (!mainNavigation.contains(event.target) && !mainNavigationToggle.contains(event.target)) {
            close()
        }
    })

    // Escape, para quien navegue con teclado.
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && isOpen()) {
            close()
            mainNavigationToggle.focus()
        }
    })

    // Al pulsar un enlace. Importa sobre todo con los que van a un ancla de la
    // misma página, donde no hay recarga que cierre el menú por su cuenta.
    mainNavigation.addEventListener('click', (event) => {
        if (event.target.closest('a') && isOpen()) {
            close()
        }
    })

    mainNavigationToggle.setAttribute('aria-controls', 'primary-navigation')

    desktopMediaQuery.addEventListener('change', syncStateWithDesktop)
    syncStateWithDesktop()
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initPrimaryMenuToggle, { once: true })
} else {
    initPrimaryMenuToggle()
}
