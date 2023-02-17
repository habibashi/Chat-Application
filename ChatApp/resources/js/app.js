import axios from "axios";
import "./bootstrap";

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
    inputMessage.value = "";
});

const channel = Echo.channel("public.playground.1");
channel
    .subscribed(() => console.log("subscribedd!"))
    .listen(".playground", (event) => {
        console.log(event);
        const message = event.message;

        const li = document.createElement("li");
        li.classList.add("left-chat");

        // create the span element and add the name
        const span = document.createElement("span");
        span.textContent = event.user.name;
        span.classList.add("name-span");
        li.appendChild(span);

        // create the p element and add the chat message
        const p = document.createElement("p");
        p.classList.add("chat-message-left");
        p.textContent = message;
        li.appendChild(p);

        listMesssage.append(li);
    });
