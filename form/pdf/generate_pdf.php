<?php
require_once '../../vendor/autoload.php';
function  generate_pdf($html = '') {
	$html = file_get_contents('https://eybus.xyz/inv/form/BasketOuterAssy/');
	$stylesheet = file_get_contents('style.css');


$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($html);
$mpdf->AddPage('L');
$mpdf->WriteHTML($html);

$mpdf->Output();
}
generate_pdf();
?>
