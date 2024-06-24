<?php
include 'config.php';
$id=$_POST['id'];
$inv_no=$_POST['inv_no'];
$partno=$_POST['partno'];
$qty=$_POST['qty'];
$ats_no=$_POST['ats_no'];
$po_id=$_POST['po_id'];
$model_id=$_POST['inventory_model_id'];

mysqli_query($con,"INSERT INTO `ip_inv`( `po_id`, `qty`, `inv_id`) VALUES ('$id','$qty','$inv_no')");

mysqli_query($con,"UPDATE `ip_ats` SET `ats_status` = 'Shipped' WHERE `ip_ats`.`ats_no` ='".$ats_no."' AND `ip_ats`.`po_id`=".$po_id);

mysqli_close($con);


?>