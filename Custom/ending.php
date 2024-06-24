<?php  
// first is import MPDF 
if(isset($_POST['pono'])){


// $startingno = $_POST['startingno'];
// $endingno = $_POST['endingno'];
// $rotor = $_POST['rotor'];
// $reportno = $_POST['reportno'];

$xvalue= $_POST['xvalue'];



require_once   './vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();


// book mark of pdf 

$mpdf->Bookmark('Start of the document');


//then let start us html for generate report 
// we need to use a variable for store the html 
//here is our report 














// first is import MPDF 




require_once   './vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();


// book mark of pdf 

$mpdf->Bookmark('Start of the document');
  


// Define a default Landscape page size/format by name
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);

// Define a default page size/format by array - page will be 190mm wide x 236mm height
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [190, 236]]);

// Define a default page using all default values except "L" for Landscape orientation
$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);

//then let start us html for generate report 
// we need to use a variable for store the html 
//here is our report 
$second = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexx.css">
    <title>Document</title>
</head>
 <style>
     body{
        font-size:12px;
     }
     table,tr,td{
         border:1px solid;
     }
 </style>
<body>


  <ul style="border: 2px solid; margin-top:-50px;"height="40">

    <img src="../pdf/images/magdyn4.jpg" alt="MagDyn" href="https://www.magdyn.com/" id="logo" width="200" height="27" style="margin-top:4px; margin-left:4px;">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="active" style="color:black;">INSPECTION REPORT</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="active" style="color:black;"> REPORT - A(Rotor Asy.)
    </ul>
    <table style="width:100%;margin-top:1%; margin-top:-60px">
        <tr>
            <td colspan="5" style="text-align: center;" >PRODUCT: EDM ROTOR - 4" T.M. EDM ASSY W/BEARING</td>
            <td colspan="3"  style="text-align: center;" >Drawing No.: 544163101 R-006</td>
        </tr>
         
  
      <tr>
            <td colspan="2"  style="text-align: center;" >Inspn No.: 140123-1IR</td>
            <td colspan="3"  style="text-align: center;"  >P.O No./Date: 4500711727 - Line 10</td>
            <td colspan="3"  style="text-align: center;" >Batch No.: 100</td>
        </tr>
         
           <tr>
           <td colspan="2"  style="text-align: center;"  >Inspn.Date.: 140123-1IR</td>
            <td colspan="3" ></td>
            <td colspan="3"  style="text-align: center;"  >Lot Size: 25 Nos</td>
        </tr>
        <tr>
        <td colspan="8"  style="font-size:11px; text-align: center;"><p>Inspected Parameters</p></td> </tr>
      
           <tr>
          <td style="widtha:12.5%;text-align: center;" rowspan="4" colspan="1">Item No.</td>
          <td style="widtha:12.5%;text-align: center;">Buble Ref.</td>
          <td style="widtha:12.5%;text-align: center;">1.</td>
          <td style="widtha:12.5%;text-align: center;">2.</td>
          <td style="widtha:12.5%;text-align: center;">3.</td>
          <td style="widtha:12.5%;text-align: center;">4.</td>
          <td style="widtha:12.5%;text-align: center;">5.</td>
          <td style="widtha:12.5%;text-align: center;">6.</td>
        </tr>
        <tr>
         
          <td style="widtha:12.5%;text-align: center;">Rotor</td>
          <td style="widtha:12.5%;text-align: center;">Rotor OD</td>
          <td style="widtha:12.5%;text-align: center;">Bearing Bore</td>
          <td style="widtha:12.5%;text-align: center;">Bearing Protrusion</td>
          <td style="widtha:12.5%;text-align: center;">Bearing Length</td>
          <td style="widtha:12.5%;text-align: center;">Thickness</td>
          <td style="widtha:12.5%;text-align: center;">Face Out</td>
        </tr>
        <tr>
         
          <td style="widtha:12.5%;text-align: center;">Serial Number</td>
          <td style="widtha:12.5%;text-align: center;">(3.780"-3.784")</td>
          <td style="widtha:12.5%;text-align: center;">(0.313")</td>
          <td style="widtha:12.5%;text-align: center;">0.0112"-0.0127"</td>
          <td style="widtha:12.5%;text-align: center;">0.4605"-0.4615"</td>
          <td style="widtha:12.5%;text-align: center;">(0.437")</td>
          <td style="widtha:12.5%;text-align: center;"><0010"</td>
        </tr>
        <tr>
         
          <td style="widtha:12.5%;text-align: center;">Insp Method</td>
          <td style="widtha:12.5%;text-align: center;">Vernier</td>
          <td style="widtha:12.5%;text-align: center;">Marposs Dial Bore Guage</td>
          <td style="widtha:12.5%;text-align: center;">Height Guage</td>
          <td style="widtha:12.5%;text-align: center;">Height Guage</td>
          <td style="widtha:12.5%;text-align: center;">Vernier</td>
          <td style="widtha:12.5%;text-align: center;">Dial + Mandrel</td>
        </tr>
     <tr>
       <td colspan="8" style="font-size:11px;text-align: center;"><p >Note: Dimensions are measured in mm,Converted values in Inches are recorded below. Where Special fixtures are used for conformance check OK or NOK is stated. Sampling Plan: 100%</p></td> </tr>';
     
for ($x = 1; $x <= 16; $x++) {
     $second.='  <tr>
     <td>'.$x.'</td>
     <td style="width:8.3%;">'.$_POST['sno'.$x].'</td>
     <td style="width:8.3%;">'.$_POST['od'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['bushid'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['bushpro'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['bushht'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['tick'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['rotor'.$x].'</td></tr>
        <tr>';
      }
   $second.='     </table>
    <table style="width:100%;margin-top:1%;"> 
   <tr>
   
   <td style="text-align:left;border: 2px solid white">Inspected By:Karthick</td>
   <td style="text-align:right;border: 2px solid white">Verified By: RSK</td>
   </tr>
    </table>
 
</body>
</html>';




$secondone = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexx.css">
    <title>Document</title>
</head>
<body>

    <ul style="border: 2px solid;"height="40">

     <img src="../pdf/images/magdyn4.jpg" alt="MagDyn" href="https://www.magdyn.com/" id="logo" width="200" height="27" style="margin-top:4px; margin-left:4px;">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="active" style="color:black;">INSPECTION REPORT</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="active" style="color:black;"> REPORT - A(Rotor Asy.)
    </ul>

    <table style="width:100%;margin-top:1%;">
        <tr>
            <td colspan="5" style="text-align: center;" >PRODUCT: EDM ROTOR - 4" T.M. EDM ASSY W/BEARING</td>
            <td colspan="3"  style="text-align: center;" >Drawing No.: 544163101 R-006</td>
        </tr>
         
  
      <tr>
            <td colspan="2"  style="text-align: center;" >Inspn No.: 140123-1IR</td>
            <td colspan="3"  style="text-align: center;"  >P.O No./Date: 4500711727 - Line 10</td>
            <td colspan="3"  style="text-align: center;" >Batch No.: 100</td>
        </tr>
         
           <tr>
           <td colspan="2"  style="text-align: center;"  >Inspn.Date.: 140123-1IR</td>
            <td colspan="3" ></td>
            <td colspan="3"  style="text-align: center;"  >Lot Size: 25 Nos</td>
        </tr>
        <tr>
        <td colspan="8"  style="font-size:11px; text-align: center;"><p>Inspected Parameters</p></td> </tr>
      
           <tr>
          <td style="widtha:12.5%;text-align: center;" rowspan="4" colspan="1">Item No.</td>
          <td style="widtha:12.5%;text-align: center;">Buble Ref.</td>
          <td style="widtha:12.5%;text-align: center;">1.</td>
          <td style="widtha:12.5%;text-align: center;">2.</td>
          <td style="widtha:12.5%;text-align: center;">3.</td>
          <td style="widtha:12.5%;text-align: center;">4.</td>
          <td style="widtha:12.5%;text-align: center;">5.</td>
          <td style="widtha:12.5%;text-align: center;">6.</td>
        </tr>
        <tr>
         
          <td style="widtha:12.5%;text-align: center;">Rotor</td>
          <td style="widtha:12.5%;text-align: center;">Rotor OD</td>
          <td style="widtha:12.5%;text-align: center;">Bearing Bore</td>
          <td style="widtha:12.5%;text-align: center;">Bearing Protrusion</td>
          <td style="widtha:12.5%;text-align: center;">Bearing Length</td>
          <td style="widtha:12.5%;text-align: center;">Thickness</td>
          <td style="widtha:12.5%;text-align: center;">Face Out</td>
        </tr>
        <tr>
         
          <td style="widtha:12.5%;text-align: center;">Serial Number</td>
          <td style="widtha:12.5%;text-align: center;">(3.780"-3.784")</td>
          <td style="widtha:12.5%;text-align: center;">(0.313")</td>
          <td style="widtha:12.5%;text-align: center;">0.0112"-0.0127"</td>
          <td style="widtha:12.5%;text-align: center;">0.4605"-0.4615"</td>
          <td style="widtha:12.5%;text-align: center;">(0.437")</td>
          <td style="widtha:12.5%;text-align: center;"><0010"</td>
        </tr>
        <tr>
         
          <td style="widtha:12.5%;text-align: center;">Insp Method</td>
          <td style="widtha:12.5%;text-align: center;">Vernier</td>
          <td style="widtha:12.5%;text-align: center;">Marposs Dial Bore Guage</td>
          <td style="widtha:12.5%;text-align: center;">Height Guage</td>
          <td style="widtha:12.5%;text-align: center;">Height Guage</td>
          <td style="widtha:12.5%;text-align: center;">Vernier</td>
          <td style="widtha:12.5%;text-align: center;">Dial + Mandrel</td>
        </tr>
     <tr>
       <td colspan="8" style="font-size:11px;text-align: center;"><p >Note: Dimensions are measured in mm,Converted values in Inches are recorded below. Where Special fixtures are used for conformance check OK or NOK is stated. Sampling Plan: 100%</p></td> </tr>';
     
for ($x = 17; $x <= 32; $x++) {
     $secondone.='<tr>
     <td>'.$x.'</td>
     <td style="width:8.3%;">'.$_POST['sno'.$x].'</td>
     <td style="width:8.3%;">'.$_POST['od'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['bushid'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['bushpro'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['bushht'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['tick'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['rotor'.$x].'</td></tr>
        <tr>';
      }
   $secondone.='     </table>
    <table style="width:100%;margin-top:1%;"> 
   <tr>
   
   <td style="text-align:left;border: 2px solid white">Inspected By:Karthick</td>
   <td style="text-align:right;border: 2px solid white">Verified By: RSK</td>
   </tr>
    </table>
 
</body>
</html>';
$secondtwo = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexx.css">
    <title>Document</title>
</head>
<body>

    <ul style="border: 2px solid;"height="40">

        <img src="../pdf/images/magdyn4.jpg" alt="MagDyn" href="https://www.magdyn.com/" id="logo" width="200" height="27" style="margin-top:4px; margin-left:4px;">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="active" style="color:black;">INSPECTION REPORT</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="active" style="color:black;"> REPORT - A(Rotor Asy.)
    </ul>

    <table style="width:100%;margin-top:1%;">
        <tr>
            <td colspan="5" style="text-align: center;" >PRODUCT: EDM ROTOR - 4" T.M. EDM ASSY W/BEARING</td>
            <td colspan="3"  style="text-align: center;" >Drawing No.: 544163101 R-006</td>
        </tr>
         
  
      <tr>
            <td colspan="2"  style="text-align: center;" >Inspn No.: 140123-1IR</td>
            <td colspan="3"  style="text-align: center;"  >P.O No./Date: 4500711727 - Line 10</td>
            <td colspan="3"  style="text-align: center;" >Batch No.: 100</td>
        </tr>
         
           <tr>
           <td colspan="2"  style="text-align: center;"  >Inspn.Date.: 140123-1IR</td>
            <td colspan="3" ></td>
            <td colspan="3"  style="text-align: center;"  >Lot Size: 25 Nos</td>
        </tr>
        <tr>
        <td colspan="8"  style="font-size:11px; text-align: center;"><p>Inspected Parameters</p></td> </tr>
      
           <tr>
          <td style="widtha:12.5%;text-align: center;" rowspan="4" colspan="1">Item No.</td>
          <td style="widtha:12.5%;text-align: center;">Buble Ref.</td>
          <td style="widtha:12.5%;text-align: center;">1.</td>
          <td style="widtha:12.5%;text-align: center;">2.</td>
          <td style="widtha:12.5%;text-align: center;">3.</td>
          <td style="widtha:12.5%;text-align: center;">4.</td>
          <td style="widtha:12.5%;text-align: center;">5.</td>
          <td style="widtha:12.5%;text-align: center;">6.</td>
        </tr>
        <tr>
         
          <td style="widtha:12.5%;text-align: center;">Rotor</td>
          <td style="widtha:12.5%;text-align: center;">Rotor OD</td>
          <td style="widtha:12.5%;text-align: center;">Bearing Bore</td>
          <td style="widtha:12.5%;text-align: center;">Bearing Protrusion</td>
          <td style="widtha:12.5%;text-align: center;">Bearing Length</td>
          <td style="widtha:12.5%;text-align: center;">Thickness</td>
          <td style="widtha:12.5%;text-align: center;">Face Out</td>
        </tr>
        <tr>
         
          <td style="widtha:12.5%;text-align: center;">Serial Number</td>
          <td style="widtha:12.5%;text-align: center;">(3.780"-3.784")</td>
          <td style="widtha:12.5%;text-align: center;">(0.313")</td>
          <td style="widtha:12.5%;text-align: center;">0.0112"-0.0127"</td>
          <td style="widtha:12.5%;text-align: center;">0.4605"-0.4615"</td>
          <td style="widtha:12.5%;text-align: center;">(0.437")</td>
          <td style="widtha:12.5%;text-align: center;"><0010"</td>
        </tr>
        <tr>
         
          <td style="widtha:12.5%;text-align: center;">Insp Method</td>
          <td style="widtha:12.5%;text-align: center;">Vernier</td>
          <td style="widtha:12.5%;text-align: center;">Marposs Dial Bore Guage</td>
          <td style="widtha:12.5%;text-align: center;">Height Guage</td>
          <td style="widtha:12.5%;text-align: center;">Height Guage</td>
          <td style="widtha:12.5%;text-align: center;">Vernier</td>
          <td style="widtha:12.5%;text-align: center;">Dial + Mandrel</td>
        </tr>
     <tr>
       <td colspan="8" style="font-size:11px;text-align: center;"><p >Note: Dimensions are measured in mm,Converted values in Inches are recorded below. Where Special fixtures are used for conformance check OK or NOK is stated. Sampling Plan: 100%</p></td> </tr>';
     
for ($x = 33; $x <= 48; $x++) {
     $secondtwo.='  <tr>
     <td>'.$x.'</td>
     <td style="width:8.3%;">'.$_POST['sno'.$x].'</td>
     <td style="width:8.3%;">'.$_POST['od'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['bushid'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['bushpro'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['bushht'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['tick'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['rotor'.$x].'</td></tr>
        <tr>';
      }
   $secondtwo.='     </table>
    <table style="width:100%;margin-top:1%;"> 
   <tr>
   
   <td style="text-align:left;border: 2px solid white">Inspected By:Karthick</td>
   <td style="text-align:right;border: 2px solid white">Verified By: RSK</td>
   </tr>
    </table>
 
</body>
</html>';
$secondthree = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexx.css">
    <title>Document</title>
</head>
<body>

    <ul style="border: 2px solid;"height="40">

     <img src="../pdf/images/magdyn4.jpg" alt="MagDyn" href="https://www.magdyn.com/" id="logo" width="200" height="27" style="margin-top:4px; margin-left:4px;">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="active" style="color:black;">INSPECTION REPORT</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="active" style="color:black;"> REPORT - A(Rotor Asy.)
    </ul>

    <table style="width:100%;margin-top:1%;">
        <tr>
            <td colspan="5" style="text-align: center;" >PRODUCT: EDM ROTOR - 4" T.M. EDM ASSY W/BEARING</td>
            <td colspan="3"  style="text-align: center;" >Drawing No.: 544163101 R-006</td>
        </tr>
         
  
      <tr>
            <td colspan="2"  style="text-align: center;" >Inspn No.: 140123-1IR</td>
            <td colspan="3"  style="text-align: center;"  >P.O No./Date: 4500711727 - Line 10</td>
            <td colspan="3"  style="text-align: center;" >Batch No.: 100</td>
        </tr>
         
           <tr>
           <td colspan="2"  style="text-align: center;"  >Inspn.Date.: 140123-1IR</td>
            <td colspan="3" ></td>
            <td colspan="3"  style="text-align: center;"  >Lot Size: 25 Nos</td>
        </tr>
        <tr>
        <td colspan="8"  style="font-size:11px; text-align: center;"><p>Inspected Parameters</p></td> </tr>
      
           <tr>
          <td style="widtha:12.5%;text-align: center;" rowspan="4" colspan="1">Item No.</td>
          <td style="widtha:12.5%;text-align: center;">Buble Ref.</td>
          <td style="widtha:12.5%;text-align: center;">1.</td>
          <td style="widtha:12.5%;text-align: center;">2.</td>
          <td style="widtha:12.5%;text-align: center;">3.</td>
          <td style="widtha:12.5%;text-align: center;">4.</td>
          <td style="widtha:12.5%;text-align: center;">5.</td>
          <td style="widtha:12.5%;text-align: center;">6.</td>
        </tr>
        <tr>
         
          <td style="widtha:12.5%;text-align: center;">Rotor</td>
          <td style="widtha:12.5%;text-align: center;">Rotor OD</td>
          <td style="widtha:12.5%;text-align: center;">Bearing Bore</td>
          <td style="widtha:12.5%;text-align: center;">Bearing Protrusion</td>
          <td style="widtha:12.5%;text-align: center;">Bearing Length</td>
          <td style="widtha:12.5%;text-align: center;">Thickness</td>
          <td style="widtha:12.5%;text-align: center;">Face Out</td>
        </tr>
        <tr>
         
          <td style="widtha:12.5%;text-align: center;">Serial Number</td>
          <td style="widtha:12.5%;text-align: center;">(3.780"-3.784")</td>
          <td style="widtha:12.5%;text-align: center;">(0.313")</td>
          <td style="widtha:12.5%;text-align: center;">0.0112"-0.0127"</td>
          <td style="widtha:12.5%;text-align: center;">0.4605"-0.4615"</td>
          <td style="widtha:12.5%;text-align: center;">(0.437")</td>
          <td style="widtha:12.5%;text-align: center;"><0010"</td>
        </tr>
        <tr>
         
          <td style="widtha:12.5%;text-align: center;">Insp Method</td>
          <td style="widtha:12.5%;text-align: center;">Vernier</td>
          <td style="widtha:12.5%;text-align: center;">Marposs Dial Bore Guage</td>
          <td style="widtha:12.5%;text-align: center;">Height Guage</td>
          <td style="widtha:12.5%;text-align: center;">Height Guage</td>
          <td style="widtha:12.5%;text-align: center;">Vernier</td>
          <td style="widtha:12.5%;text-align: center;">Dial + Mandrel</td>
        </tr>
     <tr>
       <td colspan="8" style="font-size:11px;text-align: center;"><p >Note: Dimensions are measured in mm,Converted values in Inches are recorded below. Where Special fixtures are used for conformance check OK or NOK is stated. Sampling Plan: 100%</p></td> </tr>';
     
for ($x = 49; $x <= 64; $x++) {
     $secondthree.='  <tr>
     <td>'.$x.'</td>
     <td style="width:8.3%;">'.$_POST['sno'.$x].'</td>
     <td style="width:8.3%;">'.$_POST['od'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['bushid'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['bushpro'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['bushht'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['tick'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['rotor'.$x].'</td></tr>
        <tr>';
      }
   $secondthree.='     </table>
    <table style="width:100%;margin-top:1%;"> 
   <tr>
   
   <td style="text-align:left;border: 2px solid white">Inspected By:Karthick</td>
   <td style="text-align:right;border: 2px solid white">Verified By: RSK</td>
   </tr>
    </table>
 
</body>
</html>';
$secondfour = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexx.css">
    <title>Document</title>
</head>
<body>

    <ul style="border: 2px solid;"height="40">

    <img src="../pdf/images/magdyn4.jpg" alt="MagDyn" href="https://www.magdyn.com/" id="logo" width="200" height="27" style="margin-top:4px; margin-left:4px;">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="active" style="color:black;">INSPECTION REPORT</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="active" style="color:black;"> REPORT - A(Rotor Asy.)
    </ul>
    <table style="width:100%;margin-top:1%;">
        <tr>
            <td colspan="5" style="text-align: center;" >PRODUCT: EDM ROTOR - 4" T.M. EDM ASSY W/BEARING</td>
            <td colspan="3"  style="text-align: center;" >Drawing No.: 544163101 R-006</td>
        </tr>
         
  
      <tr>
            <td colspan="2"  style="text-align: center;" >Inspn No.: 140123-1IR</td>
            <td colspan="3"  style="text-align: center;"  >P.O No./Date: 4500711727 - Line 10</td>
            <td colspan="3"  style="text-align: center;" >Batch No.: 100</td>
        </tr>
         
           <tr>
           <td colspan="2"  style="text-align: center;"  >Inspn.Date.: 140123-1IR</td>
            <td colspan="3" ></td>
            <td colspan="3"  style="text-align: center;"  >Lot Size: 25 Nos</td>
        </tr>
        <tr>
        <td colspan="8"  style="font-size:11px; text-align: center;"><p>Inspected Parameters</p></td> </tr>
      
           <tr>
          <td style="widtha:12.5%;text-align: center;" rowspan="4" colspan="1">Item No.</td>
          <td style="widtha:12.5%;text-align: center;">Buble Ref.</td>
          <td style="widtha:12.5%;text-align: center;">1.</td>
          <td style="widtha:12.5%;text-align: center;">2.</td>
          <td style="widtha:12.5%;text-align: center;">3.</td>
          <td style="widtha:12.5%;text-align: center;">4.</td>
          <td style="widtha:12.5%;text-align: center;">5.</td>
          <td style="widtha:12.5%;text-align: center;">6.</td>
        </tr>
        <tr>
         
          <td style="widtha:12.5%;text-align: center;">Rotor</td>
          <td style="widtha:12.5%;text-align: center;">Rotor OD</td>
          <td style="widtha:12.5%;text-align: center;">Bearing Bore</td>
          <td style="widtha:12.5%;text-align: center;">Bearing Protrusion</td>
          <td style="widtha:12.5%;text-align: center;">Bearing Length</td>
          <td style="widtha:12.5%;text-align: center;">Thickness</td>
          <td style="widtha:12.5%;text-align: center;">Face Out</td>
        </tr>
        <tr>
         
          <td style="widtha:12.5%;text-align: center;">Serial Number</td>
          <td style="widtha:12.5%;text-align: center;">(3.780"-3.784")</td>
          <td style="widtha:12.5%;text-align: center;">(0.313")</td>
          <td style="widtha:12.5%;text-align: center;">0.0112"-0.0127"</td>
          <td style="widtha:12.5%;text-align: center;">0.4605"-0.4615"</td>
          <td style="widtha:12.5%;text-align: center;">(0.437")</td>
          <td style="widtha:12.5%;text-align: center;"><0010"</td>
        </tr>
        <tr>
         
          <td style="widtha:12.5%;text-align: center;">Insp Method</td>
          <td style="widtha:12.5%;text-align: center;">Vernier</td>
          <td style="widtha:12.5%;text-align: center;">Marposs Dial Bore Guage</td>
          <td style="widtha:12.5%;text-align: center;">Height Guage</td>
          <td style="widtha:12.5%;text-align: center;">Height Guage</td>
          <td style="widtha:12.5%;text-align: center;">Vernier</td>
          <td style="widtha:12.5%;text-align: center;">Dial + Mandrel</td>
        </tr>
     <tr>
       <td colspan="8" style="font-size:11px;text-align: center;"><p >Note: Dimensions are measured in mm,Converted values in Inches are recorded below. Where Special fixtures are used for conformance check OK or NOK is stated. Sampling Plan: 100%</p></td> </tr>';
     
for ($x = 65; $x <= 80; $x++) {
     $secondfour.='  <tr>
     <td>'.$x.'</td>
     <td style="width:8.3%;">'.$_POST['sno'.$x].'</td>
     <td style="width:8.3%;">'.$_POST['od'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['bushid'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['bushpro'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['bushht'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['tick'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['rotor'.$x].'</td></tr>
        <tr>';
      }
   $secondfour.='     </table>
    <table style="width:100%;margin-top:1%;"> 
   <tr>
   
   <td style="text-align:left;border: 2px solid white">Inspected By:Karthick</td>
   <td style="text-align:right;border: 2px solid white">Verified By: RSK</td>
   </tr>
    </table>
 
</body>
</html>';

$html  = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexx.css">
    <title>Document</title>
</head>
<body>

    <ul style="border: 2px solid;"height="40">

     <img src="../pdf/images/magdyn4.jpg" alt="MagDyn" href="https://www.magdyn.com/" id="logo" width="200" height="27" style="margin-top:4px; margin-left:4px;">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="active" style="color:black;">INSPECTION REPORT</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="active" style="color:black;"> REPORT -B(Rotor)
    </ul>

    <table style="width:100%;margin-top:1%;">
        <tr>
            <td colspan="7" style="text-align: center;" >PRODUCT: EDM ROTOR - 4" T.M. EDM ASSY W/BEARING</td>
            <td colspan="7"  style="text-align: center;" >Drawing No.: 544164204 R-004</td>
        </tr>
         
  
      <tr>
            <td colspan="4"  style="text-align: center;" >Inspn No.: 140123-1IR</td>
            <td colspan="6"  style="text-align: center;"  >P.O No./Date: 4500711727 - Line 10</td>
            <td colspan="4"  style="text-align: center;" >Batch No.: 100</td>
        </tr>
         
           <tr>
           <td colspan="4"  style="text-align: center;"  >Inspn.Date.: 140123-1IR</td>
            <td colspan="6" ></td>
            <td colspan="4"  style="text-align: center;"  >Lot Size: 25 Nos</td>
        </tr>
        <tr>
        <td colspan="14"  style="font-size:11px; text-align: center;"><p>Inspected Parameters</p></td> </tr>
      

        <tr>
        <td style="width:8.3%;text-align: center;" rowspan="3" colspan="1" >Item #</td>
          <td style="width:8.3%;text-align: center;">Rotor SI.NO.</td>
          <td style="width:8.3%;text-align: center;">30°12x</td>
          <td style="width:8.3%;text-align: center;">Flatness<br>0.002 Bore</td>
          <td style="width:8.3%;text-align: center;"></td>
          <td style="width:8.3%;text-align: center;">Angle 36°</td>
          <td style="width:8.3%;text-align: center;"></td>
          <td style="width:8.3%;text-align: center;">Hub dia <br> 1.499-1.501</td>
          <td style="width:8.3%;text-align: center;"></td>
          <td style="width:8.3%;text-align: center;">OD <br>3.780-3.784</td>
          <td style="width:8.3%;text-align: center;"></td>
          <td style="width:8.3%;text-align: center;">Blade Thick <br>0.032 - 0.036</td>

        </tr>
                   <tr>
         
          <td style="width:8.3%;text-align: center;">Buble Ref.</td>
          <td style="width:8.3%;text-align: center;">1.</td>
          <td style="width:8.3%;text-align: center;">2.</td>
          <td style="width:8.3%;text-align: center;">3.</td>
        
          <td style="width:8.3%;text-align: center;">15.</td>
          <td style="width:8.3%;text-align: center;">6&7</td>
    
          <td style="width:8.3%;text-align: center;">8.</td>
          <td style="width:8.3%;text-align: center;">9.</td>
          <td style="width:8.3%;text-align: center;">10.</td>
          <td style="width:8.3%;text-align: center;">11.</td>
          <td style="width:8.3%;text-align: center;">12.</td>

        </tr>
        <tr>
         
        <td style="width:8.3%;text-align: center;">Insp Method</td>
        <td style="width:8.3%;text-align: center;">Fixture</td>
        <td colspan="2" style="width:8.3%;text-align: center;">See Notes 1</td>
        
        <td style="width:8.3%;text-align: center;">Fixture</td>
        <td style="width:8.3%;text-align: center;">See Notes 2</td>
        <td style="width:8.3%;text-align: center;">Vernier (min-max)</td>
        <td style="width:8.3%;text-align: center;">Fixture</td>
        <td style="width:8.3%;text-align: center;">Vernier</td>
        <td style="width:8.3%;text-align: center;">Fixture</td>
        <td style="width:8.3%;text-align: center;">Vernier</td>

      </tr>
      
     <tr>
       <td colspan="14" style="font-size:11px;text-align: center;"><p >Note: Dimensions are measured in mm,Converted values in Inches are recorded below. Where Special fixtures are used for conformance check OK or NOK is stated. Sampling Plan: 100%</p></td> </tr>';
     
       for ($x = 1; $x <= 16; $x++) {
     $html.='  <tr>
            <td>'.$x.'</td>
        <td style="width:8.3%;">'.$_POST['sno'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['see_notes_1'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture2'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture3'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['rotor'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['hubmin'.$x].'-'.$_POST['hubmax'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture4'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['od'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture5'.$x].'</td></tr>
        <td style="width:8.5%;">'.$_POST['bladerdg1'.$x].'-'.$_POST['bladerdg2'.$x].'</td>
       
        <tr>';
      }
   $html.='     </table>
    <table style="width:100%;margin-top:1%;font-size:12px"> 
   <tr>
   
   <td style="text-align:left;border: 2px solid white">Notes:1.Parallelism checked using a dial Gauge on the surface plate(For reference Bubble-3)<br>
   2.Perpendicularity checked using a Dial Gauge and mandrel suits to ID.5005 & found within limits (For reference Bubble-7)<br>
   3.Blade Angle checked through Angle gauge(For Bubble-15)</td>
   <td style="text-align:right;border: 2px solid white">Inspected By: Karthick<br>Verified By: RSK</td>
   </tr>
    </table>
 
</body>
</html>';
   
   
$htmlone  = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexx.css">
    <title>Document</title>
</head>
<body>

    <ul style="border: 2px solid;"height="40">

      <img src="../pdf/images/magdyn4.jpg" alt="MagDyn" href="https://www.magdyn.com/" id="logo" width="200" height="27" style="margin-top:4px; margin-left:4px;">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="active" style="color:black;">INSPECTION REPORT</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="active" style="color:black;"> REPORT - B(Rotor)
    </ul>

    <table style="width:100%;margin-top:1%;">
        <tr>
            <td colspan="7" style="text-align: center;" >PRODUCT: EDM ROTOR - 4" T.M. EDM ASSY W/BEARING</td>
            <td colspan="7"  style="text-align: center;" >Drawing No.: 544164204 R-004</td>
        </tr>
         
  
      <tr>
            <td colspan="4"  style="text-align: center;" >Inspn No.: 140123-1IR</td>
            <td colspan="6"  style="text-align: center;"  >P.O No./Date: 4500711727 - Line 10</td>
            <td colspan="4"  style="text-align: center;" >Batch No.: 100</td>
        </tr>
         
           <tr>
           <td colspan="4"  style="text-align: center;"  >Inspn.Date.: 140123-1IR</td>
            <td colspan="6" ></td>
            <td colspan="4"  style="text-align: center;"  >Lot Size: 25 Nos</td>
        </tr>
        <tr>
        <td colspan="14"  style="font-size:11px; text-align: center;"><p>Inspected Parameters</p></td> </tr>
      

        <tr>
        <td style="width:8.3%;text-align: center;" rowspan="3" colspan="1" >Item #</td>
          <td style="width:8.3%;text-align: center;">Rotor SI.NO.</td>
          <td style="width:8.3%;text-align: center;">30°12x</td>
          <td style="width:8.3%;text-align: center;">Flatness<br>0.002 Bore</td>
          <td style="width:8.3%;text-align: center;"></td>
          <td style="width:8.3%;text-align: center;">Angle 36°</td>
          <td style="width:8.3%;text-align: center;"></td>
          <td style="width:8.3%;text-align: center;">Hub dia <br> 1.499-1.501</td>
          <td style="width:8.3%;text-align: center;"></td>
          <td style="width:8.3%;text-align: center;">OD <br>3.780-3.784</td>
          <td style="width:8.3%;text-align: center;"></td>
          <td style="width:8.3%;text-align: center;">Blade Thick <br>0.032 - 0.036</td>

        </tr>
                   <tr>
         
          <td style="width:8.3%;text-align: center;">Buble Ref.</td>
          <td style="width:8.3%;text-align: center;">1.</td>
          <td style="width:8.3%;text-align: center;">2.</td>
          <td style="width:8.3%;text-align: center;">3.</td>
        
          <td style="width:8.3%;text-align: center;">15.</td>
          <td style="width:8.3%;text-align: center;">6&7</td>
    
          <td style="width:8.3%;text-align: center;">8.</td>
          <td style="width:8.3%;text-align: center;">9.</td>
          <td style="width:8.3%;text-align: center;">10.</td>
          <td style="width:8.3%;text-align: center;">11.</td>
          <td style="width:8.3%;text-align: center;">12.</td>

        </tr>
        <tr>
         
        <td style="width:8.3%;text-align: center;">Insp Method</td>
        <td style="width:8.3%;text-align: center;">Fixture</td>
        <td colspan="2" style="width:8.3%;text-align: center;">See Notes 1</td>
        
        <td style="width:8.3%;text-align: center;">Fixture</td>
        <td style="width:8.3%;text-align: center;">See Notes 2</td>
        <td style="width:8.3%;text-align: center;">Vernier (min-max)</td>
        <td style="width:8.3%;text-align: center;">Fixture</td>
        <td style="width:8.3%;text-align: center;">Vernier</td>
        <td style="width:8.3%;text-align: center;">Fixture</td>
        <td style="width:8.3%;text-align: center;">Vernier</td>

      </tr>
      
     <tr>
       <td colspan="14" style="font-size:11px;text-align: center;"><p >Note: Dimensions are measured in mm,Converted values in Inches are recorded below. Where Special fixtures are used for conformance check OK or NOK is stated. Sampling Plan: 100%</p></td> </tr>';
     
       for ($x = 17; $x <= 32; $x++) {
     $htmlone.='  <tr>
            <td>'.$x.'</td>
        <td style="width:8.3%;">'.$_POST['sno'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['see_notes_1'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture2'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture3'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['rotor'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['hubmin'.$x].'-'.$_POST['hubmax'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture4'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['od'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture5'.$x].'</td></tr>
        <td style="width:8.5%;">'.$_POST['bladerdg1'.$x].'-'.$_POST['bladerdg2'.$x].'</td>
       
        <tr>';
      }
   $htmlone.='     </table>
    <table style="width:100%;margin-top:1%;font-size:12px"> 
   <tr>
   
   <td style="text-align:left;border: 2px solid white">Notes:1.Parallelism checked using a dial Gauge on the surface plate(For reference Bubble-3)<br>
   2.Perpendicularity checked using a Dial Gauge and mandrel suits to ID.5005 & found within limits (For reference Bubble-7)<br>
   3.Blade Angle checked through Angle gauge(For Bubble-15)</td>
   <td style="text-align:right;border: 2px solid white">Inspected By: Karthick<br>Verified By: RSK</td>
   </tr>
    </table>
 
</body>
</html>';


$htmltwo  = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexx.css">
    <title>Document</title>
</head>
<body>

    <ul style="border: 2px solid;"height="40">

     <img src="../pdf/images/magdyn4.jpg" alt="MagDyn" href="https://www.magdyn.com/" id="logo" width="200" height="27" style="margin-top:4px; margin-left:4px;">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="active" style="color:black;">INSPECTION REPORT</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="active" style="color:black;"> REPORT - B(Rotor)
    </ul>

    <table style="width:100%;margin-top:1%;">
        <tr>
            <td colspan="7" style="text-align: center;" >PRODUCT: EDM ROTOR - 4" T.M. EDM ASSY W/BEARING</td>
            <td colspan="7"  style="text-align: center;" >Drawing No.: 544164204 R-004</td>
        </tr>
         
  
      <tr>
            <td colspan="4"  style="text-align: center;" >Inspn No.: 140123-1IR</td>
            <td colspan="6"  style="text-align: center;"  >P.O No./Date: 4500711727 - Line 10</td>
            <td colspan="4"  style="text-align: center;" >Batch No.: 100</td>
        </tr>
         
           <tr>
           <td colspan="4"  style="text-align: center;"  >Inspn.Date.: 140123-1IR</td>
            <td colspan="6" ></td>
            <td colspan="4"  style="text-align: center;"  >Lot Size: 25 Nos</td>
        </tr>
        <tr>
        <td colspan="14"  style="font-size:11px; text-align: center;"><p>Inspected Parameters</p></td> </tr>
      

        <tr>
        <td style="width:8.3%;text-align: center;" rowspan="3" colspan="1" >Item #</td>
          <td style="width:8.3%;text-align: center;">Rotor SI.NO.</td>
          <td style="width:8.3%;text-align: center;">30°12x</td>
          <td style="width:8.3%;text-align: center;">Flatness<br>0.002 Bore</td>
          <td style="width:8.3%;text-align: center;"></td>
          <td style="width:8.3%;text-align: center;">Angle 36°</td>
          <td style="width:8.3%;text-align: center;"></td>
          <td style="width:8.3%;text-align: center;">Hub dia <br> 1.499-1.501</td>
          <td style="width:8.3%;text-align: center;"></td>
          <td style="width:8.3%;text-align: center;">OD <br>3.780-3.784</td>
          <td style="width:8.3%;text-align: center;"></td>
          <td style="width:8.3%;text-align: center;">Blade Thick <br>0.032 - 0.036</td>

        </tr>
                   <tr>
         
          <td style="width:8.3%;text-align: center;">Buble Ref.</td>
          <td style="width:8.3%;text-align: center;">1.</td>
          <td style="width:8.3%;text-align: center;">2.</td>
          <td style="width:8.3%;text-align: center;">3.</td>
        
          <td style="width:8.3%;text-align: center;">15.</td>
          <td style="width:8.3%;text-align: center;">6&7</td>
    
          <td style="width:8.3%;text-align: center;">8.</td>
          <td style="width:8.3%;text-align: center;">9.</td>
          <td style="width:8.3%;text-align: center;">10.</td>
          <td style="width:8.3%;text-align: center;">11.</td>
          <td style="width:8.3%;text-align: center;">12.</td>

        </tr>
        <tr>
         
        <td style="width:8.3%;text-align: center;">Insp Method</td>
        <td style="width:8.3%;text-align: center;">Fixture</td>
        <td colspan="2" style="width:8.3%;text-align: center;">See Notes 1</td>
        
        <td style="width:8.3%;text-align: center;">Fixture</td>
        <td style="width:8.3%;text-align: center;">See Notes 2</td>
        <td style="width:8.3%;text-align: center;">Vernier (min-max)</td>
        <td style="width:8.3%;text-align: center;">Fixture</td>
        <td style="width:8.3%;text-align: center;">Vernier</td>
        <td style="width:8.3%;text-align: center;">Fixture</td>
        <td style="width:8.3%;text-align: center;">Vernier</td>

      </tr>
      
     <tr>
       <td colspan="14" style="font-size:11px;text-align: center;"><p >Note: Dimensions are measured in mm,Converted values in Inches are recorded below. Where Special fixtures are used for conformance check OK or NOK is stated. Sampling Plan: 100%</p></td> </tr>';
     
for ($x = 33; $x <= 48; $x++) {
     $htmltwo.='  <tr>
            <td>'.$x.'</td>
        <td style="width:8.3%;">'.$_POST['sno'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['see_notes_1'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture2'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture3'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['rotor'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['hubmin'.$x].'-'.$_POST['hubmax'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture4'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['od'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture5'.$x].'</td></tr>
        <td style="width:8.5%;">'.$_POST['bladerdg1'.$x].'-'.$_POST['bladerdg2'.$x].'</td>
       
        <tr>';
      }
   $htmltwo.='     </table>
    <table style="width:100%;margin-top:1%;font-size:12px"> 
   <tr>
   
   <td style="text-align:left;border: 2px solid white">Notes:1.Parallelism checked using a dial Gauge on the surface plate(For reference Bubble-3)<br>
   2.Perpendicularity checked using a Dial Gauge and mandrel suits to ID.5005 & found within limits (For reference Bubble-7)<br>
   3.Blade Angle checked through Angle gauge(For Bubble-15)</td>
   <td style="text-align:right;border: 2px solid white">Inspected By: Karthick<br>Verified By: RSK</td>
   </tr>
    </table>
 
</body>
</html>';
   
$htmlthree  = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexx.css">
    <title>Document</title>
</head>
<body>

    <ul style="border: 2px solid;"height="40">

       <img src="../pdf/images/magdyn4.jpg" alt="MagDyn" href="https://www.magdyn.com/" id="logo" width="200" height="27" style="margin-top:4px; margin-left:4px;">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="active" style="color:black;">INSPECTION REPORT</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="active" style="color:black;"> REPORT - B(Rotor)
    </ul>

    <table style="width:100%;margin-top:1%;">
        <tr>
            <td colspan="7" style="text-align: center;" >PRODUCT: EDM ROTOR - 4" T.M. EDM ASSY W/BEARING</td>
            <td colspan="7"  style="text-align: center;" >Drawing No.: 544164204 R-004</td>
        </tr>
         
  
      <tr>
            <td colspan="4"  style="text-align: center;" >Inspn No.: 140123-1IR</td>
            <td colspan="6"  style="text-align: center;"  >P.O No./Date: 4500711727 - Line 10</td>
            <td colspan="4"  style="text-align: center;" >Batch No.: 100</td>
        </tr>
         
           <tr>
           <td colspan="4"  style="text-align: center;"  >Inspn.Date.: 140123-1IR</td>
            <td colspan="6" ></td>
            <td colspan="4"  style="text-align: center;"  >Lot Size: 25 Nos</td>
        </tr>
        <tr>
        <td colspan="14"  style="font-size:11px; text-align: center;"><p>Inspected Parameters</p></td> </tr>
      

        <tr>
        <td style="width:8.3%;text-align: center;" rowspan="3" colspan="1" >Item #</td>
          <td style="width:8.3%;text-align: center;">Rotor SI.NO.</td>
          <td style="width:8.3%;text-align: center;">30°12x</td>
          <td style="width:8.3%;text-align: center;">Flatness<br>0.002 Bore</td>
          <td style="width:8.3%;text-align: center;"></td>
          <td style="width:8.3%;text-align: center;">Angle 36°</td>
          <td style="width:8.3%;text-align: center;"></td>
          <td style="width:8.3%;text-align: center;">Hub dia <br> 1.499-1.501</td>
          <td style="width:8.3%;text-align: center;"></td>
          <td style="width:8.3%;text-align: center;">OD <br>3.780-3.784</td>
          <td style="width:8.3%;text-align: center;"></td>
          <td style="width:8.3%;text-align: center;">Blade Thick <br>0.032 - 0.036</td>

        </tr>
                   <tr>
         
          <td style="width:8.3%;text-align: center;">Buble Ref.</td>
          <td style="width:8.3%;text-align: center;">1.</td>
          <td style="width:8.3%;text-align: center;">2.</td>
          <td style="width:8.3%;text-align: center;">3.</td>
        
          <td style="width:8.3%;text-align: center;">15.</td>
          <td style="width:8.3%;text-align: center;">6&7</td>
    
          <td style="width:8.3%;text-align: center;">8.</td>
          <td style="width:8.3%;text-align: center;">9.</td>
          <td style="width:8.3%;text-align: center;">10.</td>
          <td style="width:8.3%;text-align: center;">11.</td>
          <td style="width:8.3%;text-align: center;">12.</td>

        </tr>
        <tr>
         
        <td style="width:8.3%;text-align: center;">Insp Method</td>
        <td style="width:8.3%;text-align: center;">Fixture</td>
        <td colspan="2" style="width:8.3%;text-align: center;">See Notes 1</td>
        
        <td style="width:8.3%;text-align: center;">Fixture</td>
        <td style="width:8.3%;text-align: center;">See Notes 2</td>
        <td style="width:8.3%;text-align: center;">Vernier (min-max)</td>
        <td style="width:8.3%;text-align: center;">Fixture</td>
        <td style="width:8.3%;text-align: center;">Vernier</td>
        <td style="width:8.3%;text-align: center;">Fixture</td>
        <td style="width:8.3%;text-align: center;">Vernier</td>

      </tr>
      
     <tr>
       <td colspan="14" style="font-size:11px;text-align: center;"><p >Note: Dimensions are measured in mm,Converted values in Inches are recorded below. Where Special fixtures are used for conformance check OK or NOK is stated. Sampling Plan: 100%</p></td> </tr>';
     
for ($x = 49; $x <= 64; $x++) {
     $htmlthree.='  <tr>
        <td>'.$x.'</td>
        <td style="width:8.3%;">'.$_POST['sno'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['see_notes_1'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture2'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture3'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['rotor'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['hubmin'.$x].'-'.$_POST['hubmax'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture4'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['od'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture5'.$x].'</td></tr>
        <td style="width:8.5%;">'.$_POST['bladerdg1'.$x].'-'.$_POST['bladerdg2'.$x].'</td>
       
        <tr>';
      }
   $htmlthree.='     </table>
    <table style="width:100%;margin-top:1%;font-size:12px"> 
   <tr>
   
   <td style="text-align:left;border: 2px solid white">Notes:1.Parallelism checked using a dial Gauge on the surface plate(For reference Bubble-3)<br>
   2.Perpendicularity checked using a Dial Gauge and mandrel suits to ID.5005 & found within limits (For reference Bubble-7)<br>
   3.Blade Angle checked through Angle gauge(For Bubble-15)</td>
   <td style="text-align:right;border: 2px solid white">Inspected By: Karthick<br>Verified By: RSK</td>
   </tr>
    </table>
 
</body>
</html>';
   
$htmlfour  = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexx.css">
    <title>Document</title>
</head>
<body>

    <ul style="border: 2px solid;"height="40">

       <img src="../pdf/images/magdyn4.jpg" alt="MagDyn" href="https://www.magdyn.com/" id="logo" width="200" height="27" style="margin-top:4px; margin-left:4px;">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="active" style="color:black;">INSPECTION REPORT</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="active" style="color:black;"> REPORT - B(Rotor)
    </ul>

    <table style="width:100%;margin-top:1%;">
        <tr>
            <td colspan="7" style="text-align: center;" >PRODUCT: EDM ROTOR - 4" T.M. EDM ASSY W/BEARING</td>
            <td colspan="7"  style="text-align: center;" >Drawing No.: 544164204 R-004</td>
        </tr>
         
  
      <tr>
            <td colspan="4"  style="text-align: center;" >Inspn No.: 140123-1IR</td>
            <td colspan="6"  style="text-align: center;"  >P.O No./Date: 4500711727 - Line 10</td>
            <td colspan="4"  style="text-align: center;" >Batch No.: 100</td>
        </tr>
         
           <tr>
           <td colspan="4"  style="text-align: center;"  >Inspn.Date.: 140123-1IR</td>
            <td colspan="6" ></td>
            <td colspan="4"  style="text-align: center;"  >Lot Size: 25 Nos</td>
        </tr>
        <tr>
        <td colspan="14"  style="font-size:11px; text-align: center;"><p>Inspected Parameters</p></td> </tr>
      

        <tr>
        <td style="width:8.3%;text-align: center;" rowspan="3" colspan="1" >Item #</td>
          <td style="width:8.3%;text-align: center;">Rotor SI.NO.</td>
          <td style="width:8.3%;text-align: center;">30°12x</td>
          <td style="width:8.3%;text-align: center;">Flatness<br>0.002 Bore</td>
          <td style="width:8.3%;text-align: center;"></td>
          <td style="width:8.3%;text-align: center;">Angle 36°</td>
          <td style="width:8.3%;text-align: center;"></td>
          <td style="width:8.3%;text-align: center;">Hub dia <br> 1.499-1.501</td>
          <td style="width:8.3%;text-align: center;"></td>
          <td style="width:8.3%;text-align: center;">OD <br>3.780-3.784</td>
          <td style="width:8.3%;text-align: center;"></td>
          <td style="width:8.3%;text-align: center;">Blade Thick <br>0.032 - 0.036</td>

        </tr>
                   <tr>
         
          <td style="width:8.3%;text-align: center;">Buble Ref.</td>
          <td style="width:8.3%;text-align: center;">1.</td>
          <td style="width:8.3%;text-align: center;">2.</td>
          <td style="width:8.3%;text-align: center;">3.</td>
        
          <td style="width:8.3%;text-align: center;">15.</td>
          <td style="width:8.3%;text-align: center;">6&7</td>
    
          <td style="width:8.3%;text-align: center;">8.</td>
          <td style="width:8.3%;text-align: center;">9.</td>
          <td style="width:8.3%;text-align: center;">10.</td>
          <td style="width:8.3%;text-align: center;">11.</td>
          <td style="width:8.3%;text-align: center;">12.</td>

        </tr>
        <tr>
         
        <td style="width:8.3%;text-align: center;">Insp Method</td>
        <td style="width:8.3%;text-align: center;">Fixture</td>
        <td colspan="2" style="width:8.3%;text-align: center;">See Notes 1</td>
        
        <td style="width:8.3%;text-align: center;">Fixture</td>
        <td style="width:8.3%;text-align: center;">See Notes 2</td>
        <td style="width:8.3%;text-align: center;">Vernier (min-max)</td>
        <td style="width:8.3%;text-align: center;">Fixture</td>
        <td style="width:8.3%;text-align: center;">Vernier</td>
        <td style="width:8.3%;text-align: center;">Fixture</td>
        <td style="width:8.3%;text-align: center;">Vernier</td>

      </tr>
      
     <tr>
       <td colspan="14" style="font-size:11px;text-align: center;"><p >Note: Dimensions are measured in mm,Converted values in Inches are recorded below. Where Special fixtures are used for conformance check OK or NOK is stated. Sampling Plan: 100%</p></td> </tr>';
     
for ($x = 65; $x <= 80; $x++) {
     $htmlfour.='  <tr>
        <td>'.$x.'</td>
        <td style="width:8.3%;">'.$_POST['sno'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['see_notes_1'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture2'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture3'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['rotor'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['hubmin'.$x].'-'.$_POST['hubmax'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture4'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['od'.$x].'</td>
        <td style="width:8.3%;">'.$_POST['fixture5'.$x].'</td></tr>
        <td style="width:8.5%;">'.$_POST['bladerdg1'.$x].'-'.$_POST['bladerdg2'.$x].'</td>
       
        <tr>';
      }
   $htmlfour.='     </table>
    <table style="width:100%;margin-top:1%;font-size:12px"> 
   <tr>
   
   <td style="text-align:left;border: 2px solid white">Notes:1.Parallelism checked using a dial Gauge on the surface plate(For reference Bubble-3)<br>
   2.Perpendicularity checked using a Dial Gauge and mandrel suits to ID.5005 & found within limits (For reference Bubble-7)<br>
   3.Blade Angle checked through Angle gauge(For Bubble-15)</td>
   <td style="text-align:right;border: 2px solid white">Inspected By: Karthick<br>Verified By: RSK</td>
   </tr>
    </table>
 
</body>
</html>';
   

    
    
    $mpdf->WriteHTML($second);
    $mpdf->WriteHTML('<pagebreak type="NEXT-ODD" pagenumstyle="1" />');

    $mpdf->WriteHTML($secondone);
    $mpdf->WriteHTML('<pagebreak type="NEXT-ODD" pagenumstyle="1" />');

    $mpdf->WriteHTML($secondtwo);
    $mpdf->WriteHTML('<pagebreak type="NEXT-ODD" pagenumstyle="1" />');

    $mpdf->WriteHTML($secondthree);
    $mpdf->WriteHTML('<pagebreak type="NEXT-ODD" pagenumstyle="1" />');

    $mpdf->WriteHTML($secondfour);
    $mpdf->WriteHTML('<pagebreak type="NEXT-ODD" pagenumstyle="1" />');


$mpdf->WriteHTML($html);
$mpdf->WriteHTML('<pagebreak type="NEXT-ODD" pagenumstyle="1" />');

$mpdf->WriteHTML($htmlone);
$mpdf->WriteHTML('<pagebreak type="NEXT-ODD" pagenumstyle="1" />');

$mpdf->WriteHTML($htmltwo);
$mpdf->WriteHTML('<pagebreak type="NEXT-ODD" pagenumstyle="1" />');

$mpdf->WriteHTML($htmlthree);
$mpdf->WriteHTML('<pagebreak type="NEXT-ODD" pagenumstyle="1" />');

$mpdf->WriteHTML($htmlfour);

 

// $mpdf->WriteHTML('<pagebreak type="NEXT-ODD" pagenumstyle="1" />');
   
// $mpdf->WriteHTML($nxtpg);
// $mpdf->WriteHTML('<pagebreak type="NEXT-ODD" pagenumstyle="1" />');

// $mpdf->WriteHTML($third);

$mpdf->Output();}

?>

      




