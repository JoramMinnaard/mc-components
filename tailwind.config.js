/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        container: {
            center: true,
            padding: "1rem",
        },
        extend: {
            colors: {
                mc: {
                    blue: {
                        100: "#d0e7f6",
                        200: "#a1cfee",
                        300: "#72b7e5",
                        400: "#439fdd",
                        500: "#1487d4",
                        600: "#106caa",
                        700: "#0c517f",
                        800: "#083655",
                        900: "#041b2a",
                    },
                },
                custom: {
                    footercontent: "#999999",
                    navandfooter: "#373737",
                },
            },
            fontFamily: {
                nunito: ["nunito", "Helvetica", "Arial", "sans-serif"],
                verdana: ["Verdana", "Geneva", "Tahoma", "sans-serif"],
            },
        },
    },
    plugins: [require("tailwindcss"), require("autoprefixer")],
};
