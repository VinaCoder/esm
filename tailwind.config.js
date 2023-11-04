/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
  ],
  theme: {
    extend: {
      fontFamily: {
        poppins: ['Poppins', 'san-serif']
      }
    },
  },
  plugins: [],
}
