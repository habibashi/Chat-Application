import _ from "lodash";
window._ = _;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from "axios";
window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from "laravel-echo";

import Pusher from "pusher-js";
window.Pusher = Pusher;

window.Echo = new Echo({
    // broadcaster: "pusher",
    // // key: "livepost_key",
    // wsHost: window.location.hostname,
    // wsPort: 6001,
    // forceTLS: false,
    // disableStats: true,
    // // broadcaster: "pusher",
    // key: import.meta.env.VITE_PUSHER_APP_KEY,
    // cluster: "mt1",
    // // forceTLS: true,
    // // wsPort: 6001,
    // // encrypted: false,
    // // enabledTransports: ["ws", "wss"],
    // // wsHost: window.location.hostname,
    // window.Echo = new Echo({
    broadcaster: "pusher",
    key: "livepost_key",
    cluster: "${mt1}",
    wsHost: window.location.hostname,
    wsPort: 6001,
    forceTLS: false,
    encrypted: false,
    enabledTransports: ["ws", "wss"],
});

// });
// window.Echo = new Echo({
//     broadcaster: "pusher",
//     key: "livepost_key",
//     cluster: "$mt1" ?? "mt1",
//     wsHost: window.location.hostname,
//     wsPort: 6001,
//     forceTLS: false,
//     encrypted: false,
//     enabledTransports: ["ws", "wss"],
// });
