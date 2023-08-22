/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{php,js}"],
  theme: {
    extend: {
      transitionDuration: {
        '2000': '2000ms'
      },

      keyframes: {
        fadeUp: {
          'from': {
            opacity: 0,
            transform: 'translateY(40px)',
          },
          'to': {
            opacity: 1,
            transform: 'translateY(0)',
          }
        },
        bounceRight: {
          '0%': {
            transform: 'translateX(0)',
          },
          '50%': {
            transform: 'translateX(25%)',
          },
          '100%': {
            transform: 'translateX(0)',
          },
        },
      },

      fontFamily: {
        title: [
          'Poiret One',
          'cursive'
        ],
        body: [
          'Open Sans',
          'Zen Kaku Gothic New',
          'sans-serif'
        ],
        headline: [
          'Allura',
          'cursive'
        ],
        symbols: [
          'Material Symbols Rounded',
        ]
      }
    },
  
  plugins: [],
  }
}