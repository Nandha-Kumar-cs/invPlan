<?php
require_once('vendor/autoload.php'); // Include Composer's autoloader

$mpdf = new \Mpdf\Mpdf(); // Create an mPDF object

// Load the HTML content from your "convert.html" file
$html = file_get_contents('convert.php');

$mpdf->WriteHTML($html);

// Output the PDF to the browser with appropriate headers for download
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="output.pdf"');
$mpdf->Output();
exit;
?>
