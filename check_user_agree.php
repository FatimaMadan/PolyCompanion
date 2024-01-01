<?php
// check_user_agree.php
include 'debugging.php';
include 'Users.php';

$action = $_GET['action'];
$uid = $_GET['uid'];

// Perform the necessary logic to fetch the user's agreement status from the database
$userAgree = Users::getUserAgree($_SESSION['uid']);

echo $userAgree;


if ($action === 'confirm') {
    // Update the user's agreement in the database for the specified user ID ($uid)
    // Example: You can use appropriate SQL statements or ORM methods to update the agreement status
    echo $uid;
    echo $action;
    Users::updateUserAgree($uid, 1);

}
?>
