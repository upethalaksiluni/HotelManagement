/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx}",
    "./*.html",
    "./**/*.{html,js,php}"
  ],
  theme: {
    extend: {
      colors: {
        gold: '#b7791f',
        'gold-light': '#E5C76B',
        'gold-dark': '#975a16',
        navy: '#1a365d',
        'navy-light': '#2a4365',
        'navy-dark': '#111827'
      },
      fontFamily: {
        'serif': ['Playfair Display', 'serif'],
        'sans': ['Inter', 'sans-serif']
      }
    },
  },
  plugins: [],
}