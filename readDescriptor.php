<?php
include 'debugging.php';
$fid = $_GET['fid'];
$file = new DescriptorBank();
$file->initWithFid($fid);

require_once 'vendor/autoload.php'; // Make sure to include the autoloader for mPDF

if (file_exists($file->getFileLocation())) {
    $content = file_get_contents($file->getFileLocation());

    // Use mPDF to extract text from the PDF
    $mpdf = new \Mpdf\Mpdf(); // Use the correct namespace for mPDF
    $mpdf->writeHTML($content);
    $text = $mpdf->Output('', 'S');

    // Output the extracted text to the browser
    echo $text;
} else {
    echo '<p class="error">Oh dear. The file does not exist.</p>';
}
?>
