import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
         "./node_modules/flowbite/**/*.js"
    ],
  theme: {
    screens: {
      largeScreen: { min: "1282", max: "1450" },
      lab: { min: "1200px", max: "1281" },
      tab: { min: "992px", max: "1199px" },
      md: { min: "992px" },
      mintab: { min: "768px", max: "991px" },
      mob: { max: "767px" },
    },
    container: {
      center: true,
      padding: {
        DEFAULT: "1rem",
      },
    },
    extend: {
      colors: {
        primary: "#0caba8",
      },
      fontFamily: {
        poppins: ["Poppins", "sans-serif"], // Add Poppins as a custom font
      },
    },
  },


    plugins: [forms,  require('flowbite/plugin')],
};
