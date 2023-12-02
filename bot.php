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
</script><!-- comment -->

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
            Hi there! I'm Polybot. How can I help you today?
            <div class="option-buttons">
                <button class="option-button" onclick="sendMessage('faq')">I want to see the Most Frequently Asked Questions</button>
                <button class="option-button" onclick="sendMessage('majors')">I have a question about a specific course</button>
            </div>
        </div>

        <div id="conversation-container"></div>
        <div id="response-container"></div>
        
        
    </div>
</div>

<script>
    
    var conversation = '';

    function updateConversation(message) {
        conversation += '<div>' + message + '</div>';
        document.getElementById('response-container').innerHTML = conversation;
    }
    
    function sendMessage(action, data = '') {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = xhr.responseText;
                document.getElementById('response-container').innerHTML = response;
                
                updateConversation('<div class="bot-message">' + response + '</div>');
            } else {
                console.error('Request failed. Status:', xhr.status);
            }
        }
    };

    xhr.open('GET', 'botBackend.php?action=' + action + data, true);
    xhr.send();
}

function ContConvo(action, Id) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = xhr.responseText;
                document.getElementById('response-container').innerHTML = response;
                updateConversation('<div class="bot-message">' + response + '</div>');
            } else {
                console.error('Request failed. Status:', xhr.status);
            }
        }
    };

    xhr.open('GET', 'botBackend.php?action=' + action + '&Id=' + Id, true);
    xhr.send();
}

function showCourseCol(action, Id, column){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = xhr.responseText;
                document.getElementById('response-container').innerHTML = response;
                updateConversation('<div class="bot-message">' + response + '</div>');
            } else {
                console.error('Request failed. Status:', xhr.status);
            }
        }
    };

    xhr.open('GET', 'botBackend.php?action=' + action + '&Id=' + Id + '&column=' + column, true);
    xhr.send();
}

function showCoursesOnSem(action, Id, year, sem) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = xhr.responseText;
                document.getElementById('response-container').innerHTML = response;
                updateConversation('<div class="bot-message">' + response + '</div>');
            } else {
                console.error('Request failed. Status:', xhr.status);
            }
        }
    };

    xhr.open('GET', 'botBackend.php?action=' + action + '&Id=' + Id + '&year=' + year + '&sem=' + sem, true);
    xhr.send();
}
//function showAnswer(quesId) {
//  var xhr = new XMLHttpRequest();
//  xhr.onreadystatechange = function() {
//    if (xhr.readyState === XMLHttpRequest.DONE) {
//      if (xhr.status === 200) {
//        var response = xhr.responseText;
//        document.getElementById('response-container').innerHTML = response;
//        updateConversation('<div class="bot-message">' + response + '</div>');
//      } else {
//        console.error('Request failed. Status:', xhr.status);
//      }
//    }
//  };
//
//  xhr.open('GET', 'botBackend.php?action=showAnswer&quesId=' + quesId, true);
//  xhr.send();
//}


</script>

<?php
include 'footer.php';
?>