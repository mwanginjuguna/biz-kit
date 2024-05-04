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
                serif: ['Poppins', ...defaultTheme.fontFamily.serif],
            },
            screens: {
                lg: '1050px',
                xl: '1500px'
            },
        },
    },

    plugins: [forms],
    darkMode: "class"
};
