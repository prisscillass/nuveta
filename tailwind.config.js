// flowbite
import flowbite from 'flowbite/plugin'

import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './node_modules/flowbite/**/*.js',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: "#F7F4F3",
                'primary-2': "#5B2333",
                'black-alternative': "#272626"
            },
            screens : {
                content : '1100px',
                tiny: { max: '379px'},
                xs: '480px', 
            }
        },
    },
    plugins: [flowbite],
};
