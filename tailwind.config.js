const { colors } = require('tailwindcss/defaultTheme');

module.exports = {
    purge: {
        enabled: false
    },

    theme: {
        screens: {
          sm: '640px',
          md: '768px',
          lg: '1024px',
          xl: '1280px',
        },

    colors: {
      primary: 'var(--color-primary)',
      black: colors.black,
      white: colors.white,
      gray: colors.gray,
      blue: colors.blue,
      green: colors.green,
      red: colors.red,
    },

    extend: {
        colors: {
            crimson: {
                '100': '#e60000',
                '200': '#cc0000',
                '300': '#b30000',
                '400': '#990000',
                '500': '#800000',
                '600': '#660000',
                '700': '#4d0000',
            },

            green: {
                '500': '#008000',
                '600': '#006600',
                '700': '#004c00'
            },

            smoke: {
                '100': 'rgba(0, 0, 0, .1)',
                '200': 'rgba(0, 0, 0, .2)',
                '300': 'rgba(0, 0, 0, .3)',
                '400': 'rgba(0, 0, 0, .4)',
                '500': 'rgba(0, 0, 0, .5)',
                '600': 'rgba(0, 0, 0, .6)',
                '700': 'rgba(0, 0, 0, .7)',
                '800': 'rgba(0, 0, 0, .8)',
                '900': 'rgba(0, 0, 0, .9)',
            }
        },

        height: {
            '28': '7rem',
            '36': '9rem',
        },

        width: {
            '1/7': '14.2857143%',
            '2/7': '28.5714286%',
            '3/7': '42.8571429%',
            '4/7': '57.1428571%',
            '5/7': '71.4285714%',
            '6/7': '85.7142857%',
        }

    },

    maxWidth: {
      '50': '50%',
      '75': '75%',
      '80': '80%',
    }

  },
  variants: {
    appearance: ['responsive', 'hover'],
    backgroundColor: ['responsive', 'hover', 'focus', 'active']
  },
  plugins: []
}
