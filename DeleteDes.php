<?php
ob_start();
include 'debugging.php';
include 'DescriptorBank.php';


$fid = $_GET['fid'];
$file = new DescriptorBank();
$file->initWithFid($fid);

if ($file->deleteFile()) {
         header("Location: AddCourse.php");
    exit(); 
    } else {
        echo "error";
    }
    