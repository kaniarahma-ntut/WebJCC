import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                "broken-white": "#FDFDFD",
                "cream-dark": "#F2EBE1",
                "merah-jcc": "#D62828",
                charcoal: "#2D2D2D",
                secondary: "#5f5e5a",
                "surface-container-highest": "#fbdbd8",
            },
            borderRadius: {
                DEFAULT: "0.25rem",
                lg: "0.5rem",
                xl: "0.75rem",
                "2xl": "1.5rem",
                "3xl": "24px",
                "4xl": "32px",
                full: "9999px",
            },
            spacing: {
                "section-padding": "160px",
                "margin-mobile": "24px",
                "margin-desktop": "80px",
                gutter: "32px",
                "container-max": "1440px",
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                headline: ["Montserrat", "sans-serif"],
                body: ["Hanken Grotesk", "sans-serif"],
            },
        },
    },

    plugins: [forms],
};