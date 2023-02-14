const express = require("express");
// const cors = require("cors");
const app = express();
// app.use(cors());

// app.use(express.static(__dirname + "/resources"));
const server = require("http").createServer(app);
const io = require("socket.io")(server);

// const io = socketio(server);

io.on("connection", (socket) => {
    console.log("connection");

    socket.on("sendChatToServer", (message) => {
        console.log(message);
    });

    socket.on("disconnect", (socket) => {
        console.log("disconnect");
    });
});

const port = 3000;
app.listen(port, () => console.log(`Server is running on port ${port}`));
