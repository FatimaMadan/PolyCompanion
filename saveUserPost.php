<?php
ob_start();
include 'debugging.php';
include 'QuestionBank.php';
// Check if the user is logged in
if (!isset($_SESSION['uid'])) {
  // User is not logged in, return an error response
  echo json_encode(['success' => false, 'error' => 'User not logged in.']);
  exit();
}

// Establish a database connection
$conn = mysqli_connect("localhost", "u202003059", "u202003059", "db202003059");

// Get the post ID and action from the AJAX request
$questionId = $_POST['questionId'];
$action = $_POST['action'];
$userId = $_SESSION['uid'];

if ($action === 'save'){
  $query1 = "SELECT User_UserId FROM SavedPosts WHERE Questions_QuestionId = $questionId";
  $result = mysqli_query($conn, $query1);

if ($result) {
    $existingUserIds = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $existingUserIds[] = $row['User_UserId'];
    }

    if (in_array($userId, $existingUserIds)) {
        //The logged-in userId already exists in SavedPosts for the given questionId
    } else {
        //The logged-in userId is not present in LikesTest for the given questionId
        $query2 = "INSERT into SavedPosts (SavedPostId, User_UserId, Questions_QuestionId) Values (Null, $userId, $questionId)";
        // Execute the update query
        $result = mysqli_query($conn, $query2);
        // Return a success response
        echo json_encode(['success' => true]);
    }
}else {
        //The logged-in userId is not present in LikesTest for the given questionId
        $query = "INSERT into SavedPosts (SavedPostId, User_UserId, Questions_QuestionId) Values (Null, $userId, $questionId)";
        // Execute the update query
        $result = mysqli_query($conn, $query);
        // Return a success response
        echo json_encode(['success' => true]);
}
}

if ($action === 'unsave') {
     $query1 = "SELECT User_UserId FROM SavedPosts WHERE Questions_QuestionId = $questionId";
  $result = mysqli_query($conn, $query1);

if ($result) {
    $existingUserIds = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $existingUserIds[] = $row['User_UserId'];
    }

    if (in_array($userId, $existingUserIds)) {
        //The logged-in userId exists in SavedPosts for the given questionId
        $query2 = "Delete From SavedPosts where Questions_QuestionId= $questionId and User_UserId = $userId";
        //Execute the delete query
        $result = mysqli_query($conn, $query2);
        //Return a success response
        echo json_encode(['success' => true]);
    } else {
         //The logged-in userId is not present in SavedPosts for the given questionId
      echo json_encode(['success' => false, 'error' => 'Additional error message']);
      
    }
}else {
        //The logged-in userId is not present in SavedPosts for the given questionId
        //show a dialog that okay it will be shown to fewer people
       echo json_encode(['success' => false, 'error' => 'Additional  message']);
}
}


// Close the database connection
mysqli_close($conn);
?>