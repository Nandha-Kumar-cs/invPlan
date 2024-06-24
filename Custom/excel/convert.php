
<?php

$poid = $_POST['poid'];
$ats_date = $_POST['ats_date'];
$lineno = $_POST['lineno'];
$padded_lineno = str_pad($lineno, 4, "!", STR_PAD_LEFT);
$qty = $_POST['qty'];
$productname = $_POST['productname'];
$newproductname = str_replace(['+', '-'], [' ', ''], $productname);
$part_no = $_POST['part_no'];
$rev_no = $_POST['rev_no'];
$atsid = $_POST['atsid'];

include('../../config.php');


$fetch_data = mysqli_query($conn,"SELECT `ats_no` FROM `ip_ats` where id= '$atsid' and  po_id = '$poid'");
$fetch_atsno = mysqli_Fetch_assoc($fetch_data);

$scirno = $fetch_atsno['ats_no'];
$substring_scirno = substr($scirno, 7).'-SCIR';

$query = "SELECT `client_adress`
FROM ip_clients
WHERE client_name = (
    SELECT customer
    FROM ip_po
    WHERE id = '$poid'
    LIMIT 1
);";

$result_outer = mysqli_query($conn, $query);

$row_outer = mysqli_fetch_assoc($result_outer);

// Retrieve the client details
$client_address = $row_outer['client_adress'];

  
$client_address_array = explode('/', $client_address);
  
  

$dateParts = explode("-", $ats_date);

$firstpart= $dateParts[0];
$middlePart = $dateParts[1];
$lastpart = $dateParts[2];

$monthNames = array(
'01' => 'Jan',
'02' => 'Feb',
'03' => 'Mar',
'04' => 'Apr',
'05' => 'May',
'06' => 'Jun',
'07' => 'Jul',
'08' => 'Aug',
'09' => 'Sep',
'10' => 'Oct',
'11' => 'Nov',
'12' => 'Dec'
);
$year = $firstpart % 100;

// Get the month name
$month = $monthNames[$dateParts[1]];
$date = $lastpart.'-'.$month.'-'.$year;
$nogapdate = $lastpart.$middlePart.$year;

?>










<div style="margin-top: 10%;">
    <h1 style="margin-top:63.6pt; margin-left:145.1pt; text-align:justify; line-height:10.6pt">
        
        <span style="font-size:9.5pt; margin-top:50%;text-decoration:underline">CERTIFICATE OF CONFORMANCE</span>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<img src="./images/magdyn.png" alt="" style="margin-left: 5%;border: none;">
    </h1>
    <div style="background-color: lightgray;height: 20px;width: 100%;border: 1px solid black;">
        
            <b>Ref : MDPL/TFMC/<?php echo  $substring_scirno ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Dated :<?php echo $date ?></b>
        
    </div>

    
    <div>
      <b>  <span>To,</span> </b><br>
      <div style="margin-left:6%">
      <?php
$count = count($client_address_array);
foreach ($client_address_array as $key => $part) {
    echo '<b style="margin-left: 20px;">'. $part.'</b>';
    if ($key !== $count - 1) {
        echo "<br>";
    }
}
      ?>
    </div>
    
    <p>
        This is to certify that the following parts have been made to your drawing specification and  as per you purchase orders mentioned below.
    </p>
    <p style="margin-top:11.55pt; text-align:justify; line-height:1.1pt">
        <span style="font-family:Arial; font-size:1pt; -aw-import:spaces">&#xa0;</span>
    </p>
    <table style="border: 0.75pt solid #000000; border-collapse: collapse;">
    <tr style="height: 10pt;">
        <td style="border: 0.75pt solid #000000; padding: 0 5.32pt; text-align:center; background-color: lightgray;width: 10%;"><b>PO No</b></td>
        <td style="width: 10%; border: 0.75pt solid #000000; padding: 0 3.28pt; text-align: center; background-color: lightgray;"><b>Po line</b></td>
        <td style="width: 15%; border: 0.75pt solid #000000; padding: 0; text-align: center; background-color: lightgray;"><b>Supply Qty.</b></td>
        <td style="border: 0.75pt solid #000000; text-align: center; background-color: lightgray;"><b>Part Name</b></td>
        <td style="border: 0.75pt solid #000000; padding: 0; text-align: center; background-color: lightgray;"><b>Part No</b></td>
        <td style="border: 0.75pt solid #000000; padding: 0 14.18pt 0 24.42pt; text-align: center; background-color: lightgray;"><b>Rev.No</b></td>
    </tr>

    <tr style="height: 15pt;">
        <td style="border: 0.75pt solid #000000; padding: 0 10.62pt 0 10.88pt; text-align: center;"><?php echo $poid ?></td>
        <td style="border: 0.75pt solid #000000; padding: 0 15.28pt 0 12.08pt; text-align: center;"><?php echo $padded_lineno ?></td>
        <td style="border: 0.75pt solid #000000; padding: 0 15.62pt 0 14.48pt; text-align: center;"><?php echo  $qty ?></td>
        <td style="width: 45%; border: 0.75pt solid #000000;text-align: center;"><?php echo $productname  ?></td>
        <td style="border: 0.75pt solid #000000; padding: 0 5.18pt 0 10.38pt; text-align: center;"><?php echo $part_no  ?></td>
        <td style="border: 0.75pt solid #000000; padding: 0 14.18pt 0 22.18pt; text-align: center;"><?php echo  $rev_no  ?></td>
    </tr>
</table>

    

    <table style="border: 0.75pt solid #000000; border-collapse: collapse;margin-top: 2%;width: 100%;">
        <tr style="height:12.05pt; -aw-height-rule:exactly">
            <td colspan="3"  style="background-color: lightgray;text-align: center;">
                
                    <b >Compliance on Material of  Construction</b>
                
            </td>
        </tr>
        <tr style="height:12pt; -aw-height-rule:exactly">
            <td  style="text-align: center; border: 0.75pt solid #000000;">
                
                    <i>Item</i>
                
            </td>
            <td   style="text-align: center; border: 0.75pt solid #000000;">
                
                    <i>Specification</i>
                
            </td>
            <td  style="text-align: center; border: 0.75pt solid #000000;">
                
                    <i>Material of Construction</i>
                
            </td>
        </tr>
        <tr style="height:11.95pt; -aw-height-rule:exactly">
            <td  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                
                    Top Ring
                
            </td>
            <td  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                
                    304 STAINLESS STEEL 0.74 mm Thick
                
            </td>
            <td  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                
                    304 STAINLESS STEEL 0.8 mm Thick
                
            </td>
        </tr>
        <tr style="height:12pt; -aw-height-rule:exactly">
            <td  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                
                    Bottom Flange
                
            </td>
            <td  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                
                    304 STAINLESS STEEL 0.74 mm Thick
                
            </td>
            <td  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                
                    304 STAINLESS STEEL 0.8 mm Thick
                
            </td>
        </tr>
        <tr style="height:12pt; -aw-height-rule:exactly">
            <td  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                
                    #40 Mesh
                
            </td>
            <td  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                
                    304 STAINLESS STEEL MESH 40 Ø 0.010” 
                    
                    3
                
            </td>
            <td  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                
                    04 STAINLESS STEEL MESH 40 Ø 0.010” 
                
            </td>
        </tr>
    </table>






    
    <table style="border: 0.75pt solid #000000; border-collapse: collapse;margin-top: 2%;">
            <tr style="height:11.1pt; -aw-height-rule:exactly">
            <td colspan="4" style="text-align:center;font-size:14px; border: 0.75pt solid #000000;background-color: lightgray;">
            <b>Compliance Note on Test Procedure</b>
            </td>
        </tr>
        <tr style="height:11.05pt; -aw-height-rule:exactly">
            <td colspan="2" style="text-align:center;font-size:14px; border: 0.75pt solid #000000;">
                <i>Specification</i>
            </td>
            <td colspan="2"  style="text-align:center;font-size:14px; border: 0.75pt solid #000000;">
                <i>Compliance Statement</i>
            </td>
        </tr>
        <tr >
            <td colspan="2" style="text-align:center;font-size:6px; border: 0.75pt solid #000000">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <p> <b>NOTE: 1.</b> FOR 0.030" [0.76] FLATNESS SPEC. 100% INSPECTION REQUIRED FROM MANUFACTURING FACILITY WITH CERTIFICATE OF CONFORMANCE</p> <p style="margin-left: 5%;">FOR EACH SHIPMENT.</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
            <td  colspan="2" style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <p>  Flatness Spec : 100% inspection has been carried out as per test procedure mentioned in drawing </p>
               <p style="text-align: center;"> 514892040-R7, with 0.030”
                    feeler gage. </p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
            </td>
        </tr>
        <tr  style="height: 50px;">
            <td colspan="4"  style="text-align:center;font-size:14px; border: 0.75pt solid #000000;background-color: lightgray;">
				
            <p  style="font-size: 5px;visibility:hidden" >df</p>
               <b style="font-size: 12px;">Inspection Report</b>
               <p  style="font-size: 5px;visibility:hidden">df</p>
               
				
				             
            </td>
        </tr>
        <tr style="height:11.05pt; -aw-height-rule:exactly">
            <td   style="text-align:center;font-size:10px; border: 0.75pt solid #000000;width: 15%;">
                Sl. No
            
            </td>
            <td   style="text-align:center;font-size:10px; border: 0.75pt solid #000000;width:35%;">
                Characteristic Inspected:
            </td>
            <td colspan="2" style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                Result
            </td>
        </tr>
        <tr style="height:11pt; -aw-height-rule:exactly">
            <td  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                1
            </td>
            <td style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                Height 8.655” ± 0.060”
            </td>
            <td  colspan="2"  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                100% Parts Pass – Measured and in the range of 8.60” – 8.71”
            </td>
        </tr>
        <tr style="height:11.05pt; -aw-height-rule:exactly">
            <td rowspan="2"  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                2
            </td>
            <td rowspan="2"  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                Flatness 0.030”
            </td>
            <td colspan="2"  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                100% Parts Checked with 0.030” feeler Gauge and
            </td>
            
        </tr>
        <tr style="height:11.05pt; -aw-height-rule:exactly">
            <td colspan="2"  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                Feeler Gauge does not enter
            </td>
        </tr>
        <tr style="height:11.05pt; -aw-height-rule:exactly">
            <td  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                3
            </td>
            <td  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                Top Ring Ø6.00” ± 0.03
            </td>
            <td colspan="2"  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                10% Parts tested , Pass – Min 5.97” – Max 6.03”
            </td>
        </tr>
        <tr style="height:11.05pt; -aw-height-rule:exactly">
            <td  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
            4
            </td>
            <td  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                Top Ring Ø4.855”  ± 0.010
                </p>
            </td>
            <td  colspan="2"  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                10% Parts tested , Pass – Min 4.85” – Max 4.86”
            </td>
        </tr>
        <tr style="height:11.05pt; -aw-height-rule:exactly">
            <td  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                5
            </td>
            <td  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                Bottom Ø4.855”  ± 0.010”
                
            </td>
            <td colspan="2"  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                10% Parts tested , Pass – Min 4.85” – Max 4.86”
            </td>
        </tr>
        <tr style="height:11.05pt; -aw-height-rule:exactly">
            <td  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                
                    6
                
            </td>
            <td  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                
                    Ø 2.50” ± 0.03
                
            </td>
            <td colspan="2"  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                
                    10% Parts tested , Pass – FORMED PROFILE
                
            </td>
        </tr>
        <tr style="height:11.05pt; -aw-height-rule:exactly">
            <td rowspan="2" style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                
                    7
                
            </td>
            <td rowspan="2"  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                
                    Ø 0.265”
                    <span style="font-size:6.5pt; -aw-import:spaces">&#xa0; 
                    ± 0.01”
                
            </td>
            <td  colspan="2"  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                
                    10% Parts tested , Pass – Min 0.256” – Max .274”
                
            </td>
        </tr>
        <tr style="height:11.05pt; -aw-height-rule:exactly">
            <td colspan="2"  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                
                    PUNCHED HOLE
                
            </td>
        </tr>
        <tr style="height:11.05pt; -aw-height-rule:exactly">
            <td rowspan="2"  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                
                    8
                
            </td>
            <td rowspan="2" style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                
                    0.030” Feeler clearance On 
                
                <p style="margin-top:1.15pt; margin-left:29.5pt; text-align:justify; line-height:7.15pt">
                    Flange
                
            </td>
            <td colspan="2"  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                
                    100% Parts Checked with 0.030” feeler Gauge and 
                
            </td>
        </tr>
        <tr style="height:11.05pt; -aw-height-rule:exactly">
            <td colspan="2"  style="text-align:center;font-size:10px; border: 0.75pt solid #000000;">
                
                    Feeler Gauge does not enter
                
            </td>
        </tr>
    </table>




    <table style="width: 100%;margin-top:1%;margin-bottom:2%">
  <tr>
    <td style="width: 50%;">
    <p>For MAGNETO DYNAMICS PVT. LTD., </p>
        <img src="./images/sign.png" alt="" style="margin:3% 0px;">
        <p style="margin-top:2%"> [R.SURESH KUMAR ]-Director</p>
    </td>
    <td style="width: 50%;">
    <img src="./images/ceel.png" alt=""  style="margin:3% 0px;margin-left:-19%">
    </td>
  </tr>
</table>

<hr style="color: black;margin-top: -1%;">
<div style="margin-top: -4%;">
    <p style="text-align: center; ">
        <span style="font-size:8.5pt; color:#ff0000">Regd. Office : Plot No. 7,8 &amp; 9, Venkateswara Nagar Main Road, Perungudi, Chennai 600 096 , India.</span><br>  <span style="font-size:8.5pt; color:#ff0000"> GSTN: 33AAACM4623Q1ZB. Email : rsk@magdyn.com Phone No. +91-9962096002 </span></p>

  

 </div>


