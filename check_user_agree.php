<?php
include 'debugging.php';
include 'header.php';
include 'Users.php';

    
$action = $_GET['action'] ?? '';
$uid = $_GET['uid'] ?? '';

if ($action == 'confirm') {
    // Update the user's agreement in the database for the specified user ID ($uid)
    // Example: You can use appropriate SQL statements or ORM methods to update the agreement status
    Users::updateUserAgree($uid, 1);
} elseif ($action == 'notConfirm') {
    // Update the user's agreement in the database for the specified user ID ($uid)
    // Example: You can use appropriate SQL statements or ORM methods to update the agreement status
    Users::updateUserAgree($uid, 0);
}
?>
