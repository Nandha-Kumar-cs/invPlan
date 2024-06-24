<?php  
// first is import MPDF 



$startingno = $_POST['startingno'];
$endingno = $_POST['endingno'];
$rotor = $_POST['rotor'];
$reportno = $_POST['reportno'];





require_once   './vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();


// book mark of pdf 

$mpdf->Bookmark('Start of the document');


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
        <title>MPDF</title>

        <!-- file css for style on report  -->
        <link rel="stylesheet" href="./index.css">
    </head>
    <body>
    <h3 style="margin-left:25%;margin-bottom:5px;"><u>CERTIFICATE OF CONFORMANCE<u></h3>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <img src="../pdf/images/mag-dyn.png" alt="magdyn" width="90" height="90" href="https://www.magdyn.com/" style="margin-top=20px;">
    <ul>
    <li><a class="active" href="#home" style="color:black;">Ref:MDPL/TFMC/140123-1-SCIR/2023</a></li>
    </ul>
    <ul style="margin-left: 84%;margin-top: -3%;">
    <li><a class="active" href="#home" style="color:black;">Dated:14-Jan-23</a></li>
    </ul>
    <ul style="margin-left: 55%;margin-top: 3%;">
    <li><a class="active" href="#home" style="color:black;">TFMC Vendor Code: 137695</a></li>
    </ul>


    <h3 style="margin-top:7%;">To,</h3>
    <div style="margin-left:6%;margin-bottom:0%;font-family: cursive;">
    <h4 style="margin-top:-2%;">FMC Technologies Inc --Erie</h4>
    <h4 style="margin-top:-4%;">1648 McClelland Avenue</h4>
    <h4><u>ERIE PA 16510-USA</u> </h4>
    </div>

    <p>This is to certify that the following parts have been made to your drawing & specification and as per you purchase orders mentioned below.</p>
    <table margin-top:5%;>
    <thead>
        <tr style=" background-color: rgb(174, 174, 174);">
            <td class="bold_text"  colspan="3">
               Item Description
            </td>
            <td  class="bold_text">
                Rotor Assy.No.
            </td>
            <td  class="bold_text">
            Rotor Part No.
            </td>
          
        </tr>
    </thead>
    <tbody>
        <tr>
            <td rowspan="2" colspan="3">
               EDM ROTOR - 4"T.M EDM ASSY W/BEARING 
            </td>
            <td>
              544163101 
            </td>
            <td>
              544164204
            </td>
            
        </tr>
        <tr>
            <td  >
                R-006
            </td>
            <td  >
            R-004
            </td>
           
            
        </tr>
        <thead>
        <tr style=" background-color: rgb(174, 174, 174);">
            <th class="bold_text">
              PO Number
            </th>
            <th class="bold_text">
               PO line
            </th>
            <th class="bold_text">
           Supply Qty 
            </th>
            <th class="bold_text">
          Starting Serial No
            </th>
            <th class="bold_text">
           Ending Serial No
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
            45007111727
            </td>
            <td>
          10
            </td>
            <td>
            25Nos
            </td>
            <td>
            '.$startingno.'
            </td>
            <td>
            '.$endingno.' 
            </td>
            
        </tr>
    
    
    </tbody>
    </tbody>
</table>
<table style="margin-top:4%;">
<thead>
<tr style=" background-color: rgb(174, 174, 174);">
<th colspan="12">Reports Attached </th>
</tr>
<tr style=" background-color: rgb(174, 174, 174);">
<th >Test Reports for Material for Rotor</th>
<th >Inspection.Report No.</th>
</tr>
</thead> 
<tbody>
<tr>
<td>'.$rotor.'</td>
<td>'.$reportno.' </td>
</tr>
</tbody>
</table>

<h3>For MAGNETO DYNAMICS PVT.LTD.,</h3>
 <img src="../pdf/images/stamp.jpg" alt="MagDyn" href="https://www.magdyn.com/" id="logo" width="100" height="100" style="margin-top:4px; margin-left:260px;">
<h4>[R. SURESH KUMAR] - Director </h4>
<hr>
<lable>Regd. Office : 7,8 & 9, Venkateswara Nagar Main Road, Perungudi, Chennai-600 096, India.</lable><br>
<lable>GSTN : 33AAACM4623Q1ZB. Email : rsk@magdyn.com, Phone No : +91-9962096002</lable>
    </body>
    </html>
';

$mpdf->WriteHTML($html);

$mpdf->Output();


?>
