function sendMessage() {
    let input = document.getElementById("message");
    let msg = input.value.trim();
    if (msg === "") return;

    let chatBody = document.getElementById("chatBody");

    // show user message
    let userDiv = document.createElement("div");
    userDiv.className = "user";
    userDiv.innerText = msg;
    chatBody.appendChild(userDiv);

    input.value = "";

    fetch("chat.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "message=" + encodeURIComponent(msg)
    })
    .then(res => res.text())
    .then(reply => {
        let botDiv = document.createElement("div");
        botDiv.className = "bot";
        botDiv.innerText = reply;
        chatBody.appendChild(botDiv);
        chatBody.scrollTop = chatBody.scrollHeight;
    });
}
