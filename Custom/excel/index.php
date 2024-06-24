






<?php



   


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the data sent from JavaScript

    include('../../vendor/autoload.php'); // Include Composer's autoloader

$mpdf = new \Mpdf\Mpdf(); // Create an mPDF object


$temp = $_POST['temp_path'];

$content = file_get_contents($temp.'?' . http_build_query($_POST));

ob_start();
include($temp);

$html = ob_get_clean();

$mpdf->WriteHTML($html);

// Output the PDF to the browser with appropriate headers for download
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="output.pdf"');
echo $mpdf->Output(); 


// exit;


}
?>








