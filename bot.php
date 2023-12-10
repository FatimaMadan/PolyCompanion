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
<style>
    :root {
        --primary: #06BBCC;
        --light: #F0FBFC;
        --dark: #181d38;
        --font-family: "Nunito", sans-serif;
    }

    .conversation-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: var(--light);
        padding: 0.5rem 1rem;
    }

    .header-user-info {
        display: flex;
        align-items: center;
    }

    .header-user-picture {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 1rem;
    }

    .header-user-name {
        margin: 0;
        font-size: 1.25rem;
        font-weight: bold;
        color: var(--dark);
    }

    .header-menu {
        display: flex;
        align-items: center;
    }

    .dropdown-toggle {
        background-color: transparent;
        border: none;
        color: var(--dark);
        font-size: 1.5rem;
        cursor: pointer;
        border-radius: 7px !important;
    }

    .dropdown-menu {
        min-width: 7rem;
        padding: 0.5rem 0;
        margin-top: 0.5rem; /* Add space between the dropdown menu and the tutorial button */
    }

    .btn-primary {
        margin-left: 1rem;
        background-color: var(--primary);
        color: var(--light);
        padding: 6px 12px;
        cursor: pointer;
        border-radius: 7px !important;
    }

    /* New CSS styles */
    .tutorial-button {
        margin-right: 1rem; /* Add margin to separate the tutorial button and dropdown */
        border-radius: 7px !important;
    }

    .dropdown-item:hover {
        background-color: var(--light);
    }


    .btn-primary:hover {
        background-color: var(--dark);
    }
</style>

<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Polybot</h1>
                <nav aria-label="breadcrumb">
                    <p class="breadcrumb-item text-white">Welcome to Polybot, your Polytechnic journey companion!<br>Ask away, and Polybot will provide quick and helpful answers to your course-related queries.</p>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<div class="container-fluid bg-light py-3 conversation-header">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="header-user-info">
            <img src="img/robot.jpg" alt="User Picture" class="header-user-picture">
            <h4 class="header-user-name">Your Name</h4>
        </div>
        <div class="header-menu">
            <button class="btn btn-primary tutorial-button">Tutorial</button>
            <div class="dropdown">
                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Reports</a>
                    <a class="dropdown-item" href="#">History</a>
                </div>
            </div>
        </div>
    </div>
</div>
    
<div class="container-xxl py-5">
    <div class="container">
        <div class="chat-container">
            <div class="bot-message">
                Hi there! I'm Polybot, your dearest friend in your college journey.
                <br>I'm here to assist you and provide answers to your questions. Feel free to ask at any time!
            </div>

            <div class="bot-message">
                How can I help you today?
                <div class="option-buttons">
                    <button class="option-button" onclick="sendMessage('faq')">I want to see the Most Frequently Asked Questions</button>
                    <button class="option-button" onclick="sendMessage('majors')">I have a question about a specific course</button>
                </div>
            </div>

            <div id="conversation-container"></div>
            <div id="response-container"></div>

        </div>
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
                updateConversation(response);
            } else {
                console.error('Request failed. Status:', xhr.status);
            }
        }
    };

    xhr.open('GET', 'botBackend.php?action=' + action + data, true);
    xhr.send();
}

function ContConvoCallBack(action, Id, callback) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = xhr.responseText;
                updateConversation(response);
                callback(); // Invoke the callback function after ContConvo completes
            } else {
                console.error('Request failed. Status:', xhr.status);
            }
        }
    };

    xhr.open('GET', 'botBackend.php?action=' + action + '&Id=' + Id, true);
    xhr.send();
}

function ContConvo(action, Id) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = xhr.responseText;
                updateConversation(response);
                callback(); // Invoke the callback function after ContConvo completes
            } else {
                console.error('Request failed. Status:', xhr.status);
            }
        }
    };

    xhr.open('GET', 'botBackend.php?action=' + action + '&Id=' + Id, true);
    xhr.send();
}

function showCourseCol(action, Id, column, callback) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = xhr.responseText;
                updateConversation(response);
                callback();
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
                updateConversation(response);
            } else {
                console.error('Request failed. Status:', xhr.status);
            }
        }
    };

    xhr.open('GET', 'botBackend.php?action=' + action + '&Id=' + Id + '&year=' + year + '&sem=' + sem, true);
    xhr.send();
}
</script>

<?php
include 'footer.php';
?>