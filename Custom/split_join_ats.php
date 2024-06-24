<?php
include 'config.php';
$total_ats=$_POST['total_ats'];
$result=$_POST['qty'];
$ats_no=$_POST['ats_no'];
$ats_id=$_POST['ats_id'];
$split_notes=$_POST['split_notes'];

$po_id = $_POST['po_id'];

$query="SELECT SUM(qty) AS quantity FROM `ip_ats` WHERE  `ats_no`='$ats_no'";

$run=mysqli_query($con,$query);
$fetch=mysqli_fetch_assoc($run);
$qty=$fetch['quantity'];

$update="UPDATE `ip_ats` SET `qty` = '$qty' WHERE `ats_no` ='$ats_no'";
$update_run=mysqli_query($con,$update);

$select_query="SELECT * FROM `ip_ats` WHERE `ats_no`='$ats_no'";
$select_run=mysqli_query($con,$select_query);
$select_fetch=mysqli_fetch_assoc($select_run);


echo "upper ".$select_fetch['id'];



while($select_fetch=mysqli_fetch_assoc($select_run)){



$delete_query="DELETE FROM `ip_ats` WHERE `id`=".$select_fetch['id'];
$delete_run=mysqli_query($con,$delete_query);





}

?>












// if($ats_no != $result){
// 	mysqli_query($con,"UPDATE `ip_ats` SET `qty` = ".$result." WHERE `ats_no` ="$ats_no" AND `id`="$ats_id");

// 	mysqli_query($con, SELECT  * FROM `ip_ats` ;



// 	echo "1";
// }
// else{
// 	echo "0";
// }

// mysqli_query()

// mysqli_close($con);


// ?>


// DELETE FROM user WHERE id NOT IN (SELECT * FROM (SELECT MIN(id)FROM user GROUP BY name) temp);


// SELECT TOP 1 *
// FROM test
// GROUP BY your_column
// HAVING COUNT(*)>1