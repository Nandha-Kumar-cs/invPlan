






<?php


// include('./dutybill.php');
   




    include('./vendor/autoload.php'); // Include Composer's autoloader

$mpdf = new \Mpdf\Mpdf();  // Create an mPDF object




// $content = file_get_contents('./dutybill.php?sno='.$duties_id);

ob_start();
include('./application/modules/duties/views/dutybill.php');
// echo $content;

$html = ob_get_clean();

$mpdf->WriteHTML($html);

// Output the PDF to the browser with appropriate headers for download
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; ');
echo $mpdf->Output('DUTY_SLIP_'.$duties->id .'.pdf', 'I'); 



?>








