<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="/static/Style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

  <div id="chat-container">
  <h3>Chat với HappyTour</h3>
    <div id="chatbox">
      <!-- Tin nhắn mẫu của chatbot -->
      <div class="message bot-message initial-message">
        Hi bạn! HappyTour có thể giúp gì cho bạn?
      </div>
    </div>
    <div id="userInput">
      <input id="textInput" type="text" name="msg" placeholder="Nhập tin nhắn...">
      <button id="buttonInput" type="button">Gửi</button>
    </div>
  </div>
  <script>
    function addMessage(messageText, messageClass) {
      var chatbox = document.getElementById("chatbox");
      var messageDiv = document.createElement("div");
      messageDiv.className = "message " + messageClass;
      messageDiv.innerText = messageText;
      chatbox.appendChild(messageDiv);
      chatbox.scrollTop = chatbox.scrollHeight;
    }

    function getBotResponse() {
      var rawText = $("#textInput").val();
      addMessage(rawText, "user-message");
      $("#textInput").val("");
      $.get("/get", { msg: rawText }).done(function (data) {
        addMessage(data, "bot-message");
      });
    }

    $("#textInput").keypress(function (e) {
      if (e.which == 13) {
        getBotResponse();
      }
    });

    $("#buttonInput").click(function () {
      getBotResponse();
    });
  </script>
</body>
</html>
