/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors:{
        "Accent": "#EDF0F5",
        "Primary":"#FFF9EF",
        "Secondary":"#FFF9EF",
        "Background":"#091F5B",
      }
    },
    fontFamily:{
      Comfortaa: ["Comfortaa, sans-serif"]
    },
    container:{
      center:true,
      padding:"1rem",
      screens:{
        lg:"1124px",
        xl:"1124px",
        "2xl": "1124px",
      }
    },
  },
  plugins: [],
}