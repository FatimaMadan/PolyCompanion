<?php
ob_start();
include 'debugging.php';
include 'Files.php';


$fid = $_GET['fid'];
$file = new Files();
$file->initWithFid($fid);

if ($file->deleteFile()) {
         header("Location: AddAnswer.php");
    exit(); 
    } else {
        echo "error";
    }
    