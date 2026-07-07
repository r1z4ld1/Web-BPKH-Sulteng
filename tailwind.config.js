import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    screens: {
      ...defaultTheme.screens,
      'nav': '1000px', // breakpoint khusus navbar, lebih rendah & aman dari xl
    },
    extend: {
      colors: {
  primary: {
    DEFAULT: '#2F5D45',
    dark: '#1F3327',
    light: '#3E7358',
  },
  secondary: '#6E9B76',
  highlight: '#8B5E34',
  action: {
    DEFAULT: '#C89B3C',
    dark: '#AD8330',
  },
  canvas: '#F5F3EC',   // sebelumnya 'base', diganti agar tidak bentrok dengan text-base bawaan Tailwind
  contrast: '#16241C',
},
      fontFamily: {
        serif: ['Fraunces', 'serif'],       // judul/heading
        sans: ['Inter', 'sans-serif'],      // teks isi
        mono: ['"IBM Plex Mono"', 'monospace'], // data ukur, statistik
      },
      transitionTimingFunction: {
        smooth: 'cubic-bezier(0.4, 0, 0.2, 1)',
      },
      borderRadius: {
        xl2: '1rem',
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
