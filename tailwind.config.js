import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'spring': {
                    '50': '#effef7',
                    '100': '#d9ffef',
                    '200': '#b5fde0',
                    '300': '#7bfac9',
                    '400': '#24eb9e',
                    '500': '#11d68b',
                    '600': '#08b170',
                    '700': '#0a8b5a',
                    '800': '#0e6d4a',
                    '900': '#0e593f',
                    '950': '#013221'
                },
                'success': "#14A44D",
                'success-800': "#118C42",
                'danger': '#D42A46',
                'danger-800':'#8D1C2F',
                'info':'#C48A17',
                'info-800':'#A37313'
            },
        },
    },

    plugins: [forms],
};
