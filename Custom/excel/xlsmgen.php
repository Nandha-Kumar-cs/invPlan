<?php
include('../../config.php');
$poid = $_GET['pid'];
$atsid = $_GET['atsid'];

$uniqueFilename = uniqid() . '.xlsm';


mysqli_query($conn,'UPDATE `ats_data` SET `accept_file`="'.$uniqueFilename.'" WHERE `poid`="'.$poid.'" and `atsid`="'.$atsid.'"');
// Set the path to the file
$file = './ATS.xlsm';

// Set headers for the download
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="' . $uniqueFilename . '"');

// Output file contents
readfile($file);


?>