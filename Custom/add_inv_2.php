<?php
include 'config.php';
$id=$_POST['id'];
$inv_no=$_POST['inv_no'];
$partno=$_POST['partno'];
$qty=$_POST['qty'];
$ats_no=$_POST['ats_no'];
$ats_id=$_POST['ats_id'];
$model_id=$_POST['inventory_model_id'];
$ship_notes=$_POST['ship_notes'];

mysqli_query($con,"INSERT INTO `ip_inv`( `po_id`, `qty`, `inv_id`) VALUES ('$id','$qty','$inv_no')");

mysqli_query($con,"UPDATE `ip_ats` SET `ats_status` = 'Shipped', `notes`='".$ship_notes."' WHERE `ip_ats`.`ats_no` ='".$ats_no."' AND `ip_ats`.`id`=".$ats_id);

mysqli_close($con);
echo "Product Shipped.";
$op=file_get_contents("https://magdyn.in/inv3/Custom/ats_shipment_2.php?inventory_model_id=".$model_id."&Qty=".$qty."&ats_no=".$ats_no."&inv_no=".$inv_no);
echo $op;


?>