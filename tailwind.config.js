/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['index.html'],
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
      }
    },
  },
  plugins: [],
}

