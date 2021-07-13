const colors = require('tailwindcss/colors')

module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
        colors: {
            deepblue : "#A8D1E7",
            lightblue : "#F0F8FD",
            themegreen : "#7ACCBE",
            themered : "#F76D6D",
            darkblue : "#24315E",
            themeyellow: "#F7E9A0"
        }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
