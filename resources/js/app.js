const initPrimaryMenuToggle = () => {
    const mainNavigation = document.getElementById('primary-navigation')
    const mainNavigationToggle = document.getElementById('primary-menu-toggle')

    if (!mainNavigation || !mainNavigationToggle || mainNavigationToggle.dataset.menuBound === 'true') {
        return
    }

    mainNavigationToggle.dataset.menuBound = 'true'

    const desktopMediaQuery = window.matchMedia('(min-width: 782px)')

    const applyState = (isOpen) => {
        if (isOpen) {
            mainNavigation.classList.remove('hidden')
            mainNavigation.style.display = 'flex'
            mainNavigation.style.flexDirection = 'column'
            mainNavigationToggle.setAttribute('aria-expanded', 'true')
        } else {
            mainNavigation.classList.add('hidden')
            mainNavigation.style.display = 'none'
            mainNavigationToggle.setAttribute('aria-expanded', 'false')
        }
    }

    const syncStateWithDesktop = () => {
        if (desktopMediaQuery.matches) {
            mainNavigation.classList.remove('hidden')
            mainNavigation.style.display = ''
            mainNavigation.style.flexDirection = ''
            mainNavigationToggle.setAttribute('aria-expanded', 'true')
            return
        }

        applyState(!mainNavigation.classList.contains('hidden'))
    }

    const toggleMenu = (event) => {
        event.preventDefault()
        const isHidden = mainNavigation.classList.contains('hidden')
        applyState(isHidden)
    }

    mainNavigationToggle.setAttribute('aria-expanded', 'false')
    mainNavigationToggle.setAttribute('aria-controls', 'primary-navigation')

    mainNavigationToggle.addEventListener('click', toggleMenu)
    desktopMediaQuery.addEventListener('change', syncStateWithDesktop)
    syncStateWithDesktop()
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initPrimaryMenuToggle, { once: true })
} else {
    initPrimaryMenuToggle()
}

