let mix = require("laravel-mix");
// import { mix } from "laravel-mix";

mix.js("resources/js/app.js", "public/js")
    // .css("resources/css/helper.css", "public/css/helper.css")
    // .css("resources/css/ws.css", "public/css")
    .postCss("resources/css/app.css", "public/css", [
        //
    ]);

mix.options({
    hmrOptions: {
        host: "localhost",
        port: 8080,
    },
});
