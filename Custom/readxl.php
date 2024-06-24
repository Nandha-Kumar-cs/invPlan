<?php
// echo 'working';
require '../vendor/autoload.php'; // Load Composer autoload

// use PhpOffice\PhpSpreadsheet\IOFactory;
// use PHPMailer\PHPMailer\PHPMailer;
include('../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/IOFactory.php');
// IOFactory
// $libraries = get_included_files();
// echo json_encode($libraries);

// // Load the Excel file

$inputFileName = './excel.xlsm'; // Update with your file name
// echo file_exists($inputFileName);
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);



// // Get the first worksheet
// $sheet = $spreadsheet->getActiveSheet();

// // Get the value of cell F4
// $cellValue = $sheet->getCell('F4')->getValue();

// // Output the value


// $UNIX_DATE = ($cellValue - 25569) * 86400;
// $xlsmdate =  gmdate("Y-m-d", $UNIX_DATE);
// $currentDate = date('Y-m-d');
// // echo $currentDate;
// if($xlsmdate != $currentDate) {

// echo 'False';
// }else{
//     echo 'True';
// }
// echo "Value of cell F4: " . $cellValue;
?>