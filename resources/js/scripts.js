// Lógica para o Menu Mobile
function initializeMobileMenu() {
    const openMenuButton = document.getElementById('open-mobile-menu');
    const closeMenuButton = document.getElementById('close-mobile-menu');
    const slideOverMenu = document.getElementById('slide-over-menu');
    const slideOverOverlay = document.getElementById('slide-over-overlay');

    const toggleMenu = () => {
        if (slideOverMenu) {
            slideOverMenu.classList.toggle('hidden');
        }
    };

    if (openMenuButton) openMenuButton.addEventListener('click', toggleMenu);
    if (closeMenuButton) closeMenuButton.addEventListener('click', toggleMenu);
    if (slideOverOverlay) slideOverOverlay.addEventListener('click', toggleMenu);
}

// Lógica para o Botão de Voltar ao Topo
function initializeButtonToTop() {
    const buttonToTop = document.getElementById('button-to-top');
    if (!buttonToTop) return;

    window.addEventListener('scroll', () => {
        if (window.scrollY > 200) {
            buttonToTop.classList.remove('hidden');
            setTimeout(() => buttonToTop.style.opacity = '1', 10);
        } else {
            buttonToTop.style.opacity = '0';
            setTimeout(() => buttonToTop.classList.add('hidden'), 300); // Espera a transição terminar
        }
    });

    buttonToTop.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth',
        });
    });
}

// Lógica para o Tema (Dark/Light)
function initializeThemeSwitcher() {
    const themeToggleButton = document.getElementById('theme-toggle-button');
    if (!themeToggleButton) return;

    const sunIconSVG = `<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1.5em" width="1.5em" xmlns="http://www.w3.org/2000/svg"><path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"></path></svg>`;
    const moonIconSVG = `<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1.5em" width="1.5em" xmlns="http://www.w3.org/2000/svg"><path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.021 3.278 7.277 7.318 7.277a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z"></path></svg>`;

    const getSystemTheme = () => window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';

    const applyTheme = (theme) => {
        document.documentElement.className = ''; // Limpa classes do <html>
        document.documentElement.classList.add(`theme-${theme}`);
        themeToggleButton.innerHTML = theme === 'dark' ? sunIconSVG : moonIconSVG;
    };

    let currentTheme = localStorage.getItem('theme-mode') || getSystemTheme();
    applyTheme(currentTheme);

    themeToggleButton.addEventListener('click', () => {
        const newTheme = document.documentElement.classList.contains('theme-dark') ? 'light' : 'dark';
        localStorage.setItem('theme-mode', newTheme);
        applyTheme(newTheme);
    });
}

// Inicializa todos os scripts quando o DOM estiver pronto.
document.addEventListener('DOMContentLoaded', () => {
    initializeMobileMenu();
    initializeButtonToTop();
    initializeThemeSwitcher();
});
