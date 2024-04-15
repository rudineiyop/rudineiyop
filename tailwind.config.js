/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./**/*.html'],
  theme: {
    container: {
      center: true,
      padding:'16px',
    },
    extend: {
      colors: {
        primary: '#f43f5e',
        secondary:'#9f1239',
        dark:'#4c0519',
      },
      screens: {
        '2xl': '1320px',
      },
      fontFamily: {
        bodybold: ['Montserrat']
      },
      animation: {
        blob: "blob 7s infinite",
      },
      keyframes: {
        blob: {
          "0%": {
            transform: "translate(0px, 0px) scale(1)",
          },
          "33%": {
            transform: "translate(30px, -50px) scale(1.1)",
          },
          "66%": {
            transform: "translate(-20px, 20px) scale(0.9)",
          },
          "100%": {
            transform: "tranlate(0px, 0px) scale(1)",
          },
        },
      },
    },
  },
  plugins: [require("daisyui")],
  daisyui : {
    themes : ["light", "night", "emerald"]
  },
}

