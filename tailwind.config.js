import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                yellow: {
                    50: '#FFF9C4',
                    100: '#FFEB3B',
                    200: '#FFDD00',
                    300: '#FFB800',
                    400: '#FF9E00',
                    500: '#FF8C00',
                    600: '#FF6F00',
                    700: '#FF5722',
                    800: '#FF3D00',
                    900: '#FF2C00',
                },
                gray: {
                    900: '#1a1a1a',
                    800: '#2e2e2e',
                    700: '#474747',
                    600: '#6c6c6c',
                    400: '#a3a3a3',
                    300: '#c9c9c9',
                    200: '#e0e0e0',
                    100: '#f0f0f0',
                    50: '#fafafa',
                },
            },
        },
    },

    plugins: [forms],
};
