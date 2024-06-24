<?php  
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


    <ul style="border: 2px solid">
    <li style="margin-left: 39%;"><a class="active" href="#home" style="color:black;">INSPECTION REPORT</a>
   <a class="active" href="#home" style="color:black;margin-left:4%;">REPORT - A(Rotor Asy.)</a></li>
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
          <td style="widtha:12.5%;text-align: center;" rowspan="4" colspan="1" >Item No.</td>
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
       <td colspan="8" style="font-size:11px;text-align: center;"><p ><u>Note: Dimensions are measured in mm,Converted values in Inches are recorded below. Where Special fixtures are used for conformance check OK or NOK is stated. Sampling Plan: 100%<u></p></td> </tr>';
     
for ($x = 1; $x <= 19; $x++) {
     $html.='  <tr>
            <td>'.$x.'</td>
        <td style="widtha:12.5%;">'.$_POST['ins'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['ver'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['mar'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['hei'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['heig'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['vern'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['dai'.$x].'</td></tr>
        <tr>';
      }
   $html.='     </table>
    <table style="width:100%;margin-top:1%;"> 
   <tr>
   
   <td style="text-align:left;border: 2px solid white">Inspected By:Karthick</td>
   <td style="text-align:right;border: 2px solid white">Verified By: RSK</td>
   </tr>
    </table>
 
</body>
</html>';
    

$nxtpg  = '
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


    <ul style="border: 2px solid">
    <li style="margin-left: 39%;"><a class="active" href="#home" style="color:black;">INSPECTION REPORT</a>
   <a class="active" href="#home" style="color:black;margin-left:4%;">REPORT - A(Rotor Asy.)</a></li>
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
          <td style="widtha:12.5%;text-align: center;" rowspan="4" colspan="1" >Item No.</td>
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
       <td colspan="8" style="font-size:11px;text-align: center;"><p ><u>Note: Dimensions are measured in mm,Converted values in Inches are recorded below. Where Special fixtures are used for conformance check OK or NOK is stated. Sampling Plan: 100%<u></p></td> </tr>';
     
for ($x = 19; $x <= 36; $x++) {
     $nxtpg.='  <tr>
            <td>'.$x.'</td>
        <td style="widtha:12.5%;">'.$_POST['ins'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['ver'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['mar'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['hei'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['heig'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['vern'.$x].'</td>
        <td style="widtha:12.5%;">'.$_POST['dai'.$x].'</td></tr>
        <tr>';
      }
   $nxtpg.='     </table>
    <table style="width:100%;margin-top:1%;"> 
   <tr  >
   
   <td style="text-align:left;border: 2px solid white">Inspected By:Karthick</td>
   <td style="text-align:right;border: 2px solid white">Verified By: RSK</td>
   </tr>
    </table>
 
</body>
</html>';
    
    

$mpdf->WriteHTML($html);
$mpdf->WriteHTML('<pagebreak type="NEXT-ODD" pagenumstyle="1" />');

    
$mpdf->WriteHTML($nxtpg);


$mpdf->Output();

?>






