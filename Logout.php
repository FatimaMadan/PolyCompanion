<?php
include 'debugging.php';
include 'Users.php';

$lgnObject = new Users();
$lgnObject->logout();

header('Location: index.php');
?>

