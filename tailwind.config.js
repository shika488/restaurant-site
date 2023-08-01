/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{php,js}"],
  theme: {
    extend: {
      transitionDuration: {
        '2000': '2000ms'
      },

      keyframes: {
        fadeIn: {
          'from': { 
            opacity: 0 ,
            transform: 'translateX(8rem)',
          },
          'to': {
            opacity: 0.8 ,
            transform: 'translateX(0)', 
          }
        }
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
        ]
      }
    },
  
  plugins: [],
  }
}