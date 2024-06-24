<?php
include 'config.php';
//$id=$_POST['id'];
//$inv_no=$_POST['inv_no'];
//$partno=$_POST['partno'];
$qty=$_POST['qty'];
$ats_no=$_POST['ats_no'];
$po_id=$_POST['po_id'];
$model_id=$_POST['inventory_model_id'];

mysqli_query($con,"DELETE FROM `ip_ats` WHERE `ip_ats`.`ats_no` ='".$ats_no."' AND `ip_ats`.`po_id`=".$po_id);

mysqli_close($con);


?>