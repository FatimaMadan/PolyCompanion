<?php
ob_start();
include 'contact.php';

// Check if the user is logged in
if (!isset($_SESSION['uid'])) {
  // User is not logged in, return an error response
  echo json_encode(['success' => false, 'error' => 'User not logged in.']);
  exit();
}

// Establish a database connection
$conn = mysqli_connect("localhost", "u202003059", "u202003059", "db202003059");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "send complains";
    // Retrieve the form data
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Insert the data into the "Complains" table
    $sql = "INSERT INTO Complain (ComplainId, username, Subject, Message) VALUES (NULL, '$name', '$subject', '$message')";
    
    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Success message or redirection
        echo "Complain submitted successfully!";
        //  redirect to a thank you page or display a success message here
    } else {
        // Error message
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>