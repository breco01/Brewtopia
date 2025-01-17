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
                red: {
                    50: '#FFEBEB',
                    100: '#FFB3B3',
                    200: '#FF6666',
                    300: '#FF4D4D', // Default red for non-admin
                    400: '#FF3333',
                    500: '#FF1A1A',
                    600: '#E60000',
                    700: '#B30000',
                    800: '#800000',
                    900: '#660000',
                },
                green: {
                    50: '#E8F5E9',
                    100: '#C8E6C9',
                    200: '#81C784',
                    300: '#66BB6A', // Default green for admin
                    400: '#4CAF50',
                    500: '#388E3C',
                    600: '#2C6F2F',
                    700: '#1B5E20',
                    800: '#135A2B',
                    900: '#0D3B14',
                },
            },
        },
    },

    plugins: [forms],
};
