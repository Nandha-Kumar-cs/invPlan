<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('../../vendor/autoload.php');
    include('../../config.php');
    $mpdf = new \Mpdf\Mpdf(); 

  
    $temp = $_POST['temp_path'];
    $poid = $_POST['poid'];
    $atsid = $_POST['atsid'];

    

    $content = file_get_contents($temp . '?' . http_build_query($_POST));

    ob_start();
    include($temp);

    $html = ob_get_clean();

    $mpdf->WriteHTML($html);

   
    $fetch_data = mysqli_query($conn,"SELECT `ats_no` FROM `ip_ats` where id= '$atsid' and  po_id = '$poid'");
    $fetch_atsno = mysqli_Fetch_assoc($fetch_data);
    
    $scirno = $fetch_atsno['ats_no'];
    $substring_scirno = substr($scirno, 7);


    
    $fetch_email_query = mysqli_query($conn, "SELECT unit.unit_name FROM `ip_products` as prd JOIN `ip_po` as po ON prd.product_id = po.partid JOIN `ip_units` as unit ON prd.unit_id = unit.unit_id WHERE po.id =  '$_POST[poid]'  ");
    $fetch_email = mysqli_fetch_assoc($fetch_email_query);
  
    $uom = $fetch_email['unit_name'];
    $uniqueFilename = $substring_scirno. '-SCIR-'. $_POST['productname'].'_'.$_POST['part_no'].'-L'.$_POST['padded_lineno'].' '.$_POST['qty'].''.$uom ;


$filePath = '../../uploads/' . uniqid();

$mpdf->Output($filePath, \Mpdf\Output\Destination::FILE);

// Respond to the client with the filename or any other relevant information
$run ="UPDATE `ats_data` SET `pdffile_path`='$filePath',`pdffilename`='$uniqueFilename',`uploaded`='1' WHERE `poid`='$poid' and `atsid`= '$atsid'";
$update_path= mysqli_query($conn,"$run");
if($update_path){
echo json_encode(['filename' => $filePath]);
// echo $run;
}else{
    $run;
}

} else {
    // Handle other cases or provide an error response
    echo json_encode(['error' => 'Invalid request method']);
}
