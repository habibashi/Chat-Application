import axios from "axios";
import "./bootstrap";

// const form = $("#chat-form");
// const inputMessage = $("#chat-input");
// $("#chat-form").submit(function (event) {
//     event.preventDefault();
//     const userInput = inputMessage.value;
//     console.log(userInput);
// });
const form = document.getElementById("chat-form");
const inputMessage = document.getElementById("chat-input");
const listMesssage = document.querySelector(".middle-section");
form.addEventListener("submit", (event) => {
    event.preventDefault();
    const userInput = inputMessage.value;
    console.log(userInput);
    axios.post("/chat-message", {
        message: userInput,
    });
});

const channel = Echo.channel("public.playground.1");
// console.log("s");
channel
    .subscribed(() => console.log("subscribedd!"))
    .listen(".playground", (event) => {
        console.log(event);
        const message = event.message;
        const li = document.createElement("li");
        li.textContent = message;
        listMesssage.append(li);
    });
