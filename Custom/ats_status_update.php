<?php
include 'config.php';
$ats_no=$_POST['ats_no'];
$po_id=$_POST['po_id'];

if($ats_no!='' && $po_id!=''){
	mysqli_query($con,"UPDATE `ip_ats` SET `ats_status` = 'Approved' WHERE `ip_ats`.`ats_no` ='".$ats_no."' AND `ip_ats`.`po_id`=".$po_id);
	echo "1";
}
else{
	echo "0";
}
	
mysqli_close($con);


?>