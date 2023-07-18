/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{html,php,js}"],
  theme: {
    extend: {
      fontFamily: {
        'body': ['Noto Sans JP', 'sans-serif', 'Noto Sans Mono', 'monospace'],
      },
    },
  },
  plugins: [],
}