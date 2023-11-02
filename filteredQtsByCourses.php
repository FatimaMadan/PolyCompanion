<?php

//NOT USED****************

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'Database.php';
include 'QuestionBank.php';

// Create a new instance of the Database class
$db = Database::getInstance();

// Retrieve the courseId from the query parameter
$courseId = $_GET['courseId'];

// Prepare the SQL query to fetch the filtered questions
$stmt = $db->dblink->prepare("SELECT * FROM Questions WHERE Course_CourseId = ?");
$stmt->bind_param('s', $courseId);

// Echo the SQL statement
echo $stmt->queryString;

// Execute the SQL query
$stmt->execute();

// Fetch the filtered questions as an associative array
$filteredQuestions = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// Return the filtered questions as JSON response
header('Content-Type: application/json');
echo json_encode($filteredQuestions);
?>