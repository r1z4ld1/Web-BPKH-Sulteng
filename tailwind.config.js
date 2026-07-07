import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: '#2F5D45',   // Hijau Tajuk Hutan — header, footer, elemen struktural
          dark: '#1F3327',      // varian lebih gelap untuk hover state
          light: '#3E7358',     // varian lebih terang untuk hover state di dark bg
        },
        secondary: '#6E9B76',   // Hijau Lumut — aksen, ikon, garis pemisah
        highlight: '#8B5E34',   // Cokelat Tanah — penanda kategori (dipakai langka)
        action: {
          DEFAULT: '#C89B3C',   // Emas Senja — CTA, link aktif
          dark: '#AD8330',      // hover state tombol CTA
        },
        base: '#F5F3EC',        // Krem Hangat — latar belakang utama
        contrast: '#16241C',    // Hijau Tinta Gelap — section kontras tinggi
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
