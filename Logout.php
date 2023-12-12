<?php
include 'debugging.php';
include 'Users.php';

$lgnObject = new Users();
$lgnObject->enterLogout($_SESSION['username']);
$lgnObject->logout();

header('Location: index.php');
?>

