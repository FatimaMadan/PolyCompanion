<?php

include 'debugging.php';
include 'CourseBank.php';

    if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['cid'])) {
        $action = $_GET['action'];
        $course_id = $_GET['cid'];
        CourseBank::deleteCourse($course_id);
    }
