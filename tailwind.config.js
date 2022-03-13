const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    purge: [
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                bg: "#E5E5E5",
                faint: "#C4C4C4",
                primary: "#6BA8E8",
                hover: "#087ff7",
                hoverg: "#20d2df",
            },
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
                qs: ["Quicksand"],
                lt: ["Lato"],
            },
            borderRadius: {
                cardA: '20px',
            },
        },
    },

    variants: {
        extend: {
            opacity: ["disabled"],
            backgroundColor: ["responsive", "hover", "focus", "active"],
            fontSize: ["responsive", "hover"],
            fontFamily: ["responsive", "hover"],
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
