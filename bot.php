<?php
ob_start();
include 'debugging.php';
include 'header.php';

// if (empty($_SESSION['uid'])) {
//     // User is not logged in, redirect to login page
//     echo $_SESSION['username'];
//     header("Location: Login.php");
//     exit();
// }
?>

<div class="blue-div">
    <div class="robot-container">
        <i class="fas fa-robot robot-icon"></i>
        <div class="robot-info" id="robot-info">
            <h3 style="color: white;">About the Chatbot</h3>
            <div class="center-justify">
                <p>This bot is here to assist you and provide answers to your questions. Feel free to ask anything!</p>
            </div>
        </div>
    </div>
</div>


<div class="white-div">
    <div class="chat-container">

        <div class="bot-message">
            Hi there! I'm the chatbot. Please choose one of the options below
            <div class="option-buttons">
                <button class="option-button" onclick="sendMessage('faq')">Show Most Frequently Asked Questions</button>
                <button class="option-button" onclick="sendMessage('majors')">Show Majors</button>
            </div>
        </div>

        <div id="response-container"></div>
        
    </div>
</div>

<script>
    function sendMessage(action) {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = xhr.responseText;
        document.getElementById('response-container').innerHTML = response;
      } else {
        console.error('Request failed. Status:', xhr.status);
      }
    }
  };

  xhr.open('GET', 'botBackend.php?action=' + action, true);
  xhr.send();
}
</script>

<?php
include 'footer.php';
?>