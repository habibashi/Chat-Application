// const express = require("express");
// // const http = require("http");
// const cors = require("cors");
// const app = express();
// app.use((req, res, next) => {
//     res.setHeader("Access-Control-Allow-Origin", "http://127.0.0.1:8000");
//     res.setHeader("Access-Control-Allow-Methods", "GET", "POST");
//     res.setHeader(
//         "Access-Control-Allow-Headers",
//         "X-Requested-With,content-type"
//     );
//     res.setHeader("Access-Control-Allow-Credentials", true);
//     next();
// });
// const server = app.listen(3000, () => console.log("listing on 3000"));
// // app.use(express.static(__dirname + "/public"));
// // const server = require("http").createServer(app);
// const io = require("socket.io")(server);
// io.listen(3001);

// const io = socketio(server);

const express = require("express");
const cors = require("cors");
const http = require("http");
const app = express();
const server = http.createServer(app);
const io = require("socket.io")(server);

app.use(
    cors({
        origin: "http://127.0.0.1:8000", // Replace with the URL of your Laravel app
        methods: ["GET", "POST"],
    })
);

app.get("/", (req, res) => {
    res.send("Hello World!");
});

io.on("connection", (socket) => {
    console.log("connection");

    socket.on("sendChatToServer", (message) => {
        console.log(message);
    });

    socket.on("disconnect", (socket) => {
        console.log("disconnect");
    });
});

const port = 3001;
server.listen(port, () => console.log(`Server is running on port ${port}`));
