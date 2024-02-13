import defaultTheme from 'tailwindcss/defaultTheme';
import typography from '@tailwindcss/typography';
import aspectRatio from '@tailwindcss/aspect-ratio';
import forms from '@tailwindcss/forms';
import preset from './vendor/filament/support/tailwind.config.preset'

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    presets: [preset],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './vendor/wire-elements/modal/src/ModalComponent.php',
        './vendor/usernotnull/tall-toasts/config/**/*.php',
        './vendor/usernotnull/tall-toasts/resources/views/**/*.blade.php',
        './resources/**/*.blade.php',
        './resources/*.blade.php',
        './resources/**/*.vue',
        './resources/**/*.js',
        './content/**/*.md'
    ],
    theme: {
        fontFamily: {
            sans: ['Varela Round', ...defaultTheme.fontFamily.sans],
        },
        screens: {
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1280px'
        },
        container: {
            center: true,
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
                lg: '3rem',
                xl: '0rem'
            },
        },
        extend: {
            colors: {
                primary: '#666666',
                secondary: '#00A36C',
                tertiary: '#F0F8FF',
                light: '#ffffff',
                dark: '#00A36C',
                gray: {
                    100: '#f5f5f5',
                    200: '#eeeeee',
                    300: '#e0e0e0',
                    400: '#bdbdbd',
                    500: '#9e9e9e',
                    600: '#757575',
                    700: '#616161',
                    800: '#424242',
                    900: '#212121',
                },
            },
            listStyleType: {
                square: 'square',
            },
            animation: {
                'spin-slow': 'spin 10s linear infinite',
            }
        },
    },

    plugins: [typography, aspectRatio, forms],
};
