import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});

let mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    // .css("resources/css/helper.css", "public/css/helper.css")
    // .css("resources/css/ws.css", "public/css")
    .postCss("resources/css/app.css", "public/css", [
        //
    ]);

mix.options({
    hmrOptions: {
        host: "localhost",
        port: 5173,
    },
});
