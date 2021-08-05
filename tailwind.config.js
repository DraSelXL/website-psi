const colors = require('tailwindcss/colors')

module.exports = {
    purge: [],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                deepblue: "#A8D1E7",
                lightblue: "#F0F8FD",
                themegreen: "#7ACCBE",
                themered: "#F76D6D",
                darkblue: {
                    DEFAULT: '#24315E',
                    '50': '#92A1D5',
                    '100': '#8091CE',
                    '200': '#5B72C0',
                    '300': '#4057A8',
                    '400': '#324483',
                    '500': '#24315E',
                    '600': '#161E39',
                    '700': '#080B14',
                    '800': '#000000',
                    '900': '#000000'
                },
                themeyellow: "#F7E9A0",
                gradyellow: "#A57E2F",
                gradyellowto: "#FFE771",
                gradyellowmid: "#D89D3D"
            }
        },
    },
    variants: {
        scrollbar: ['rounded']
    },
    plugins: [require('tailwind-scrollbar')],
}
