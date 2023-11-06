<?php
include 'header.php';
$id = $_GET['aid'];

//get article details
$course = new Course();
$course->initWithId($id);


?>
