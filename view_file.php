<?php

include 'debugging.php';
$fid = $_GET['fid'];
$file = new Files();
$file->initWithFid($fid);

if (file_exists($file->getFileLocation())) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/force-download');
    header('Content-Disposition: attachment; filename="' . basename($file->getFileName()) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');

    // Read the file content
    $content = file_get_contents($file->getFileLocation());

    // Remove leading whitespace, including empty lines
    $content = ltrim($content);

    // Output the modified content to the browser
    echo $content;
    exit;
} else {
    echo '<p class="error">Oh dear. The file does not exist.</p>';
}