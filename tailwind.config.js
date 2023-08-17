/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{php,js}"],
  theme: {
    extend: {
      transitionDuration: {
        '2000': '2000ms'
      },

      keyframes: {
        fadeLeft: {
          'from': { 
            opacity: 0,
            transform: 'translateX(8rem)',
          },
          'to': {
            opacity: 1,
            transform: 'translateX(0)',
          }
        },

        fadeRight: {
          'from': { 
            opacity: 0,
            transform: 'translateX(0)',
          },
          'to': {
            opacity: 1,
            transform: 'translateX(1rem)',
          }
        },

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

        fadeIn: {
          'from': {
            opacity: 0,
          },
          'to': {
            opacity: 1,
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
        ],
        symbols: [
          'Material Symbols Rounded',
        ]
      }
    },
  
  plugins: [],
  }
}