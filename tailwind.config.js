import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                transparent: 'transparent',
                'sideBarLight': '#F8F9FA',
                'titleColorLight' : '#003366',
                'hoverLight' : '#E1E8ED',
                'activeLight' : '#0066CC',
                'textColorLight' : '#001F3F',
        
            },
            
        },
    },
        keyframes: {
            float: {
                '0%, 100%': { transform: 'translateY(0px)' },
                '50%': { transform: 'translateY(-15px)' },
            }
        },
        animation: {
            float: 'float 6s ease-in-out infinite',
        
        },
    plugins: [],
};
