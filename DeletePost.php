<?php
ob_start();
include 'debugging.php';
include 'FaqBank.php';

if (!isset($_SESSION['uid'])) {
  // User is not logged in, return an error response
  echo json_encode(['success' => false, 'error' => 'User not logged in.']);
  exit();
}


// Establish a database connection
$conn = mysqli_connect("localhost", "u202003059", "u202003059", "db202003059");

// Get the post ID and action from the AJAX request
$questionId = $_POST['questionId'];
 $query1 = "Delete FROM Answers WHERE Questions_QuestionId = $questionId";
  $result = mysqli_query($conn, $query1);
  $query3 = "Delete FROM SavedPosts WHERE Questions_QuestionId = $questionId";
  $result = mysqli_query($conn, $query3);
  $query4 = "Delete FROM Flag WHERE QuestionId = $questionId";
  $result = mysqli_query($conn, $query4);
   $query2 = "Delete FROM Questions WHERE QuestionId = $questionId";
  $result = mysqli_query($conn, $query2);
 
        echo json_encode(['success' => true]);
        
        mysqli_close($conn);
?>