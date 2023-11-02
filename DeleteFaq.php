<?php
ob_start();
include 'debugging.php';
include 'FaqBank.php';
// Check if the FAQ ID is provided in the AJAX request
if (isset($_POST['faqId'])) {
    $faqId = $_POST['faqId'];

    // Perform the deletion operation here
    $newFaq = new FaqBank();
    $newFaq->initWithFid($faqId);

    if ($newFaq->deleteFaq()) {
        // Send a response back to the AJAX request
        echo "success";
        
    } else {
        // Send an error response back to the AJAX request
        echo "error";
    }
} else {
    // Send an error response back to the AJAX request
    echo "error";
}
?>