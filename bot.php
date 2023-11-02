<?php

include 'header.php'

?><!DOCTYPE html>
<html lang="en">

    <head>
         <!-- JavaScript code -->
    <script>
        // Get the current page URL
        var url = window.location.href;

        // Check each menu item's URL against the current page URL
        var menuItems = document.querySelectorAll('.nav-item.nav-link');
        menuItems.forEach(function(item) {
            if (item.href === url) {
                item.classList.add('active'); // Add the 'active' class to the matching menu item
            }
        });
    </script>
    </head>
    
    
<body>
 
<div class="blue-div">
    <div class="robot-container">
        <i class="fas fa-robot robot-icon"></i>
        <div class="robot-info" id="robot-info">
            <h3>About the Chatbot</h3>
            <div class="center-justify">
                <p>This bottt is here to assist you and provide answers to your questions. Feel free to ask anything!</p>
            </div>
        </div>
    </div>
</div>


<div class="white-div">
    <div class="chat-container">
        
        <div class="bot-message">
            Hi there! I'm the chatbot. How can I help?
            <div class="option-buttons">
                <button class="option-button" onclick="sendMessage('Option 1')">Option 1</button>
                <button class="option-button" onclick="sendMessage('Option 2')">Option 2</button>
                <button class="option-button" onclick="sendMessage('Option 3')">Option 3</button>
            </div>
        </div>
    </div>
</div>

<script>
    function sendMessage(option) {
        // Display user message
        var userMessage = document.createElement('div');
        userMessage.className = 'user-message';
        userMessage.textContent = option;
        document.querySelector('.chat-container').appendChild(userMessage);

        // Display bot response
        var botMessage = document.createElement('div');
        botMessage.className = 'bot-message';
        botMessage.textContent = 'You selected: ' + option;
        document.querySelector('.chat-container').appendChild(botMessage);
    }
</script>






















    <!-- Footer Start -->
    <?php
    include 'footer.php';
    ?>
</body>

</html>