<?php
ob_start();
include 'debugging.php';
include 'AnswerBank.php';
// Check if the user is logged in
if (!isset($_SESSION['uid'])) {
  // User is not logged in, return an error response
  echo json_encode(['success' => false, 'error' => 'User not logged in.']);
  exit();
}

// Establish a database connection
$conn = mysqli_connect("localhost", "u202003059", "u202003059", "db202003059");

// Get the post ID and action from the AJAX request
  $answerId = $_POST['answerId'];
$action = $_POST['action'];
$userId = $_SESSION['uid'];
// Update the likes or dislikes based on the action
if ($action === 'like') {
  $query1 = "SELECT UserId FROM LikesTest WHERE AnsId = $answerId";
  $result = mysqli_query($conn, $query1);

if ($result) {
    $existingUserIds = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $existingUserIds[] = $row['UserId'];
    }

    if (in_array($userId, $existingUserIds)) {
        //The logged-in userId already exists in LikesTest for the given answerId
    } else {
        //The logged-in userId is not present in LikesTest for the given answerId
         $query = "UPDATE Answers SET Likes = Likes + 1 WHERE AnsId = $answerId";
        // Execute the update query
        $result = mysqli_query($conn, $query);
        $query2 = "INSERT into LikesTest (LikesId, AnsId, UserId) Values (Null, $answerId, $userId)";
        // Execute the update query
        $result = mysqli_query($conn, $query2);
        // Return a success response
        echo json_encode(['success' => true]);
    }
}else {
      $query = "UPDATE Answers SET Likes = Likes + 0 WHERE AnsId = $answerId";
        // Execute the update query
        $result = mysqli_query($conn, $query);
        $query2 = "INSERT into LikesTest (LikesId, AnsId, UserId) Values (Null, $answerId, $userId)";
        // Execute the insert query
        $result = mysqli_query($conn, $query2);
        // Return a success response
        echo json_encode(['success' => true]);
}
}

if ($action === 'dislike') {
     $query1 = "SELECT UserId FROM LikesTest WHERE AnsId = $answerId";
  $result = mysqli_query($conn, $query1);

if ($result) {
    $existingUserIds = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $existingUserIds[] = $row['UserId'];
    }

    if (in_array($userId, $existingUserIds)) {
        //The logged-in userId already exists in LikesTest for the given answerId
        $query = "UPDATE Answers SET Likes = Likes - 1 WHERE AnsId = $answerId";
        // Execute the update query
        $result = mysqli_query($conn, $query);
        $query2 = "Delete From LikesTest where AnsId= $answerId and UserId = $userId";
        // Execute the delete query
        $result = mysqli_query($conn, $query2);
        // Return a success response
        echo json_encode(['success' => true]);
    } else {
        //The logged-in userId is not present in LikesTest for the given answerId
        //show a dialog that okay it will be shown to fewer people
        echo json_encode(['success' => false]);
        
    }
}else {
        //The logged-in userId is not present in LikesTest for the given answerId
        //show a dialog that okay it will be shown to fewer people
        echo json_encode(['success' => false]);
}
}


// Close the database connection
mysqli_close($conn);
?>