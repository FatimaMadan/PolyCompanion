<?php

include 'debugging.php';
// Include the necessary files and setup database connection


// Assuming you have a function called retrieveMajors() in your other class
$result = MajorBank::getAllMaj();

// Return the majors as JSON
echo json_encode($result);
?>