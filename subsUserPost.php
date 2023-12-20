<?php
ob_start();
include 'debugging.php';
include 'CourseBank.php';

// Check if the user is logged in
if (!isset($_SESSION['uid'])) {
  // User is not logged in, return an error response
  echo json_encode(['success' => false, 'error' => 'User not logged in.']);
  exit();
}

// Establish a database connection
$conn = mysqli_connect("localhost", "u202003059", "u202003059", "db202003059");

// Get the post ID and action from the AJAX request
$courseId = $_POST['courseId'];
$userId = $_SESSION['uid'];

  $query1 = "SELECT User_UserId FROM Subscriptions WHERE Course_CourseId = $courseId";
  $result = mysqli_query($conn, $query1);

if ($result) {
    $existingUserIds = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $existingUserIds[] = $row['User_UserId'];
    }

    if (in_array($userId, $existingUserIds)) {
        //The logged-in userId already exists in Subscriptions for the given Course_CourseId
    } else {
        //The logged-in userId is not present in Subscriptions for the given $courseId
        $query2 = "INSERT into Subscriptions (SubsId, User_UserId, Course_CourseId) Values (Null, $userId, $courseId)";
        // Execute the update query
        $result = mysqli_query($conn, $query2);
        // Return a success response
        echo json_encode(['success' => true]);
    }
}else {
        //The logged-in userId is not present in Subscriptions for the given Course_CourseId
        $query = "INSERT into Subscriptions (SubsId, User_UserId, Course_CourseId) Values (Null, $userId, $courseId)";
        // Execute the update query
        $result = mysqli_query($conn, $query);
        // Return a success response
        echo json_encode(['success' => true]);
}

//
//if ($action === 'unsubs') {
//     $query1 = "SELECT User_UserId FROM Subscriptions WHERE Course_CourseId = $courseId";
//  $result = mysqli_query($conn, $query1);
//
//if ($result) {
//    $existingUserIds = array();
//    while ($row = mysqli_fetch_assoc($result)) {
//        $existingUserIds[] = $row['User_UserId'];
//    }
//
//    if (in_array($userId, $existingUserIds)) {
//        //The logged-in userId exists in Subscriptions for the given Course_CourseId
//        $query2 = "Delete From Subscriptions where Course_CourseId= $courseId and User_UserId = $userId";
//        //Execute the delete query
//        $result = mysqli_query($conn, $query2);
//        //Return a success response
//        echo json_encode(['success' => true]);
//    } else {
//         //The logged-in userId is not present in Subscriptions for the given Course_CourseId
//      echo json_encode(['success' => false, 'error' => 'Additional error message']);
//      
//    }
//}else {
//        //The logged-in userId is not present in Subscriptions for the given Course_CourseId
//        //show a dialog that okay it will be shown to fewer people
//       echo json_encode(['success' => false, 'error' => 'Additional  message']);
//}
//}


// Close the database connection
mysqli_close($conn);
?>