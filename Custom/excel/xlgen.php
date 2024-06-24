<?php


include('../../config.php');

$poid = $_GET['pid'];
$atsid = $_GET['atsid'];
$lineno = $_GET['lineno'];
$padded_lineno =  str_pad($lineno, 4, "0", STR_PAD_LEFT);

$fetch_email_query = mysqli_query($conn, "SELECT unit.unit_name,prd.product_name FROM `ip_products` as prd JOIN `ip_po` as po ON prd.product_id = po.partid JOIN `ip_units` as unit ON prd.unit_id = unit.unit_id WHERE po.id =  '$poid'  ");
$fetch_email = mysqli_fetch_assoc($fetch_email_query);
$uom = $fetch_email['unit_name'];
$product_name = $fetch_email['product_name'];


$select_query = 'select parameter ,ats_filename from `ats_data` where poid = "'.$poid.'" and atsid = "'.$atsid.'"  ';
$run_query= mysqli_query($conn,$select_query);
$fetch_query= mysqli_fetch_assoc($run_query);
// echo $fetch_query;



// Check if the query returned any result
if ($fetch_query) {
    // Decode the JSON parameter
    $parameter = json_decode($fetch_query['parameter'], true);
    $productname = $parameter['partname'];
    $part_no = $parameter['partno'];
    $qty = $parameter['ats_qty'];
    // Prepare data for CSV
    $data = array(
        array('Parameter', 'Value'),
    );



    $string = $parameter['partno'];
    $parts = explode("-", $string);
    $partno = $parts[0];



    $string2 =  $parameter['partno'];
  
    $pattern = "/Rev.(\d+)/"; // Pattern to match "Rev." followed by digits
preg_match($pattern, $string2, $matches);
$revision = $matches[1];

    $data[] = array('TechnipFMC Purchase Order',$parameter['pono']);
    $data[] = array('PO line',  $padded_lineno) ;
    $data[] = array('Submission quantity',$parameter['ats_qty'] .' '. $uom  );
    $data[] = array('TechnipFMC Part Number',$partno);
    $data[] = array('TechnipFMC Part Number rev',$revision);
    $data[] = array('Production date / Lifting certificate date',$parameter['temp_date']);
    $data[] = array('TechnipFMC  Part Description',$product_name);
    $data[] = array('Current Date',date('d-m-Y'));
 
    // Create CSV file
    $file = fopen('data.csv', 'w');

    foreach ($data as $row) {
        fputcsv($file, $row);
    }

    fclose($file);
    $cuurent_date = date('Y-m-d');
    $updatedate = 'UPDATE `ats_data`  SET `ats_date`="'.$cuurent_date.'"   where poid = "'.$poid.'" and atsid = "'.$atsid.'"  ';
    $runupdatedate = mysqli_query($conn,$updatedate);

$file2='./data.csv';
$file1 = './ATS.xlsm';

$scirquery = "SELECT ats_no FROM ip_ats WHERE id = '$atsid' AND po_id = '$poid' " ;
$run_atsquery = mysqli_query($conn,$scirquery);
$fetch_scir = mysqli_fetch_array($run_atsquery);

$scirno = $fetch_scir["ats_no"];



$atsfilename = substr($scirno, 7) . '-ATS_'. $productname.'_'.$part_no.'-L'.$padded_lineno.' '.$qty.''.$uom  ;
    // $zip = new ZipArchive();
    // $zipName = $atsfilename .'.zip';
    // if ($zip->open($zipName, ZipArchive::CREATE) === TRUE) {
    //     // Add files to the zip archive
    //     $zip->addFile($file2, basename($file2));
    //     $zip->addFile($file1, basename($file1));
    //     $zip->close();
    
    //     // Set headers for zip file
    //     header('Content-Type: application/zip');
    //     header('Content-Disposition: attachment; filename="' . $zipName . '"');
    //     header('Content-Length: ' . filesize($zipName));
    
    //     // Output zip file
    //     readfile($zipName);
    
    //     // Delete the zip file
    //     unlink($zipName);
    // }



//     // Set headers for download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="data.csv"');

    // Output file contents
    readfile('data.csv');


//     $file = './ATS.xlsm';

// // Set headers
// header('Content-Type: application/octet-stream');
// header('Content-Disposition: attachment; filename="' . basename($file) . '"');
// header('Content-Length: ' . filesize($file));

// Output file content
readfile($file);

} else {
    echo "No data found for the given poid.";
}

// Close the database connection
mysqli_close($conn);



?>
