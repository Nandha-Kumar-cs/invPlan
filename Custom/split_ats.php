<?php
include 'config.php';
$total_ats=$_POST['total_ats'];
$split_ats=$_POST['split_ats'];
$ats_no=$_POST['ats_no'];
$ats_id=$_POST['ats_id'];
$split_notes=$_POST['split_notes'];

if($ats_no!='' && $ats_id!=''){
	mysqli_query($con,"UPDATE `ip_ats` SET `qty` = ".$split_ats." WHERE `ip_ats`.`ats_no` ='".$ats_no."' AND `ip_ats`.`id`=".$ats_id);

	$result = mysqli_query($con, "SELECT * FROM `ip_ats` WHERE `ip_ats`.`ats_no` ='".$ats_no."' AND `ip_ats`.`id`=".$ats_id);

	$row = mysqli_fetch_assoc($result);
		//echo $row['po_id'].'-'.$row['ats_date'];
		//echo "<br/>";
	
	$rem_qty=$total_ats-$split_ats;
	//echo "INSERT INTO `ip_ats`( `po_id`, `qty`, `ats_no`,`notes`,`ats_date`,`ats_status`) VALUES ('".$row['po_id']."','$rem_qty','$ats_no','$split_notes','".$row['ats_date']."','".$row['ats_status']."'";
	mysqli_query($con,"INSERT INTO `ip_ats`( `po_id`, `qty`, `ats_no`,`notes`,`ats_date`,`ats_status`) VALUES ('".$row['po_id']."','$rem_qty','$ats_no','".$row['notes']."','".$row['ats_date']."','".$row['ats_status']."')");


	echo "1";
}
else{
	echo "0";
}
	
mysqli_close($con);


?>