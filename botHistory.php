<?php

include 'debugging.php';
include 'botBank.php';
// Include the necessary files and setup database connection onclick="ContConvo(\'showAnswer\',' . $result[$i]->MajorId . ')">'

if (isset($_GET['messageHistory'])) {
    $mess = $_GET['messageHistory'];
    $user_id = $_GET['uid'];
    BotBank::insertHistory($user_id, $mess);
    
} else {
    echo 'something is wrong';
}