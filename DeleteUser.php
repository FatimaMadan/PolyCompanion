<?php

ob_start();
include 'debugging.php';
// Check if the FAQ ID is provided in the AJAX request
if (isset($_POST['uid'])) {
    $userId = $_POST['uid'];

    // Perform the deletion operation here
    $newUser = new Users();
    $newUser->initWithUid($userId);

    if ($newUser->deleteuser()) {
        // Send a response back to the AJAX request
        echo "success"; }
        else {
        // Send an error response back to the AJAX request
        echo "error"; }}
        else {
    // Send an error response back to the AJAX request
    echo "error";
}
?>