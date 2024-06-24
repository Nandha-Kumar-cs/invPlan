<?php
include 'config.php';
$ats_no=$_POST['ats_no'];
$ats_id=$_POST['ats_id'];
$approve_notes=$_POST['approve_notes'];

if($ats_no!='' && $ats_id!=''){
	mysqli_query($con,"UPDATE `ip_ats` SET `ats_status` = 'Approved', `notes`='".$approve_notes."' WHERE `ip_ats`.`ats_no` ='".$ats_no."' AND `ip_ats`.`id`=".$ats_id);
	echo "1";
}
else{
	echo "0";
}
	
mysqli_close($con);


?>