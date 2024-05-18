<!DOCTYPE html>
<html>
<head>
    <title>Trang Web PHP</title>
    <!-- Thêm Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* CSS để tùy chỉnh biểu tượng tin nhắn */
        #chat-icon {
            width: 50px;
            height: 50px;
            background-color: #007bff;
            color: #fff;
            border-radius: 50%;
            text-align: center;
            line-height: 50px;
            cursor: pointer;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000; /* Đảm bảo biểu tượng hiển thị trên top các phần khác */
        }

        /* CSS để tùy chỉnh khung chatbot */
        #chatbot-container {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 400px; /* Chiều rộng của khung chatbot */
            height: 500px; /* Chiều cao của khung chatbot */
            border: 1px solid #ccc;
            z-index: 1000; /* Đảm bảo hiển thị trên top */
        }

        #chatbot-iframe {
            width: 100%;
            height: 100%;
            border: none;
            margin: 0; /* Loại bỏ margin */
            padding: 0; /* Loại bỏ padding */
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <h1>Trang Web PHP</h1>

    <!-- Biểu tượng tin nhắn sử dụng Font Awesome -->
    <div id="chat-icon">
        <i class="fas fa-comment"></i>
    </div>

    <!-- Khung chatbot -->
    <div id="chatbot-container">
        <iframe id="chatbot-iframe" src="http://localhost:5000/" frameborder="0"></iframe>
    </div>

    <!-- JavaScript để hiển thị/ẩn khung chatbot khi bấm vào biểu tượng -->
    <script>
        const chatIcon = document.getElementById("chat-icon");
        const chatbotContainer = document.getElementById("chatbot-container");

        chatIcon.addEventListener("click", function() {
            if (chatbotContainer.style.display === "none" || chatbotContainer.style.display === "") {
                chatbotContainer.style.display = "block";
            } else {
                chatbotContainer.style.display = "none";
            }
        });
    </script>
</body>
</html>
