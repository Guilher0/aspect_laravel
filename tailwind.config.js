// tailwind.config.js
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
// 1. Importe o plugin que acabamos de instalar
import aspectRatio from '@tailwindcss/aspect-ratio';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    darkMode: ['selector', '[class="theme-dark"]'],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primaryBg: 'hsl(var(--primaryBg) / <alpha-value>)',
                primaryText: 'hsl(var(--primaryText) / <alpha-value>)',
                primaryTextNeutral: 'hsl(var(--primaryTextNeutral) / <alpha-value>)',
                primaryTextHover: 'hsl(var(--primaryTextHover) / <alpha-value>)',
                onPrimaryBg: 'hsl(var(--onPrimaryBg) / <alpha-value>)',
                onPrimaryText: 'hsl(var(--onPrimaryText) / <alpha-value>)',
                neutralBg: 'hsl(var(--neutralBg) / <alpha-value>)',
                neutralText: 'hsl(var(--neutralText) / <alpha-value>)',
                onNeutralBg: 'hsl(var(--onNeutralBg) / <alpha-value>)',
                onNeutralText: 'hsl(var(--onNeutralText) / <alpha-value>)',
                ringColor: 'hsl(var(--ringColor) / <alpha-value>)',
                onRingColor: 'hsl(var(--onRingColor) / <alpha-value>)',
                // 2. Cor que estava faltando adicionada
                primaryActive: 'hsl(var(--primaryActive) / <alpha-value>)',
                primary: {
                    DEFAULT: 'hsl(var(--primary) / <alpha-value>)',
                    50: 'hsl(var(--color-primary-50) / <alpha-value>)',
                    100: 'hsl(var(--color-primary-100) / <alpha-value>)',
                    200: 'hsl(var(--color-primary-200) / <alpha-value>)',
                    300: 'hsl(var(--color-primary-300) / <alpha-value>)',
                    400: 'hsl(var(--color-primary-400) / <alpha-value>)',
                    500: 'hsl(var(--color-primary-500) / <alpha-value>)',
                    600: 'hsl(var(--color-primary-600) / <alpha-value>)',
                    700: 'hsl(var(--color-primary-700) / <alpha-value>)',
                    800: 'hsl(var(--color-primary-800) / <alpha-value>)',
                    900: 'hsl(var(--color-primary-900) / <alpha-value>)',
                    950: 'hsl(var(--color-primary-950) / <alpha-value>)',
                },
            },
            keyframes: {
                slideDownAndFade: {
                    from: { opacity: '0', transform: 'translateY(-2px)' },
                    to: { opacity: '1', transform: 'translateY(0)' },
                },
                slideLeftAndFade: {
                    from: { opacity: '0', transform: 'translateX(2px)' },
                    to: { opacity: '1', transform: 'translateX(0)' },
                },
                slideUpAndFade: {
                    from: { opacity: '0', transform: 'translateY(2px)' },
                    to: { opacity: '1', transform: 'translateY(0)' },
                },
                slideRightAndFade: {
                    from: { opacity: '0', transform: 'translateX(-2px)' },
                    to: { opacity: '1', transform: 'translateX(0)' },
                },
            },
            animation: {
                slideDownAndFade: 'slideDownAndFade 400ms cubic-bezier(0.16, 1, 0.3, 1)',
                slideLeftAndFade: 'slideLeftAndFade 400ms cubic-bezier(0.16, 1, 0.3, 1)',
                slideUpAndFade: 'slideUpAndFade 400ms cubic-bezier(0.16, 1, 0.3, 1)',
                slideRightAndFade: 'slideRightAndFade 400ms cubic-bezier(0.16, 1, 0.3, 1)',
            },
        },
    },

    plugins: [
        forms,
        // 3. Plugin adicionado ao array
        aspectRatio,
    ],
};
