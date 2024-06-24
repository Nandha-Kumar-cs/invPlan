<?php
include 'config.php';
//$id=$_POST['id'];
//$inv_no=$_POST['inv_no'];
//$partno=$_POST['partno'];
$qty=$_POST['qty'];
$ats_no=$_POST['ats_no'];
$ats_id=$_POST['ats_id'];
$model_id=$_POST['inventory_model_id'];

mysqli_query($con,"DELETE FROM `ip_ats` WHERE `ip_ats`.`ats_no` ='".$ats_no."' AND `ip_ats`.`id`=".$ats_id);

mysqli_close($con);

$op=file_get_contents("https://magdyn.in/inv3/Custom/ats_reject_2.php?inventory_model_id=".$model_id."&Qty=".$qty."&ats_no=".$ats_no);

echo $op; 
?>