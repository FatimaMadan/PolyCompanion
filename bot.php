<?php
ob_start();
include 'debugging.php';
include 'header.php';


        
//if (empty($_SESSION['uid'])) {
//    // User is not logged in, redirect to login page
//    echo $_SESSION['username'];
//    header("Location: Login.php");
//    exit();
//}
//?><!DOCTYPE html>

<link href="css/botDesign.css" rel="stylesheet"><!-- comment -->

<div class="blue-div">
    <div class="robot-container">
        <i class="fas fa-robot robot-icon"></i>
        <div class="robot-info" id="robot-info">
            <h3 style="color: white;">About the Chatbot</h3>
            <div class="center-justify">
                <p>This bottt is here to assist you and provide answers to your questions. Feel free to ask anything!</p>
            </div>
        </div>
    </div>
</div>


<div class="white-div">
    <div class="chat-container">
        
        <div class="bot-message">
            Hi there! I'm the chatbot. Please choose one of the courses
            <div class="option-buttons">
                
                <?php
                $AllMajors = MajorBank::getAllMaj();
                        if (!empty($AllMajors)) {
                            for ($i = 0; $i < count($AllMajors); $i++) {
                                echo '<button class="option-button" onclick="sendMessage(\'' . $AllMajors[$i]->MajorId . '\')">'.$AllMajors[$i]->MajorName.'</button>';
                                
                             }
                        } else {
                            echo '<button class="option-button"> OPPPs </button>';
                        }
                ?>
<!--                <button class="option-button" onclick="sendMessage('Option 2')">Show Most Frequently Asked Questions</button>
                <button class="option-button" onclick="sendMessage('Option 3')">Show Majors</button>-->
            </div>
        </div>
    </div>
</div>

<script>
    function sendMessage(majorId){
        alert(majorId);
           // Call the function in the course page and pass the selected course as a parameter
        <?php
                $AllCol = CourseBank::getAllColumns();
                        if (!empty($AllCol)) {
                            for ($i = 0; $i < count($AllCol); $i++) {
                                echo '<button class="option-button">'.$AllCol[$i].'</button>';
                                
                             }
                        } else {
                            echo '<button class="option-button"> OPPPs </button>';
                        }
                ?>
    }
</script>


<?php
include './footer.php';
?>