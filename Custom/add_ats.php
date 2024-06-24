<?php
include 'config.php';
$id=$_POST['id'];
$ats_no=$_POST['ats_no'];
$partno=$_POST['partno'];
$qty=$_POST['qty'];
$ats_notes=$_POST['ats_notes'];
$ats_date=$_POST['ats_date'];
$model_id=$_POST['model_id'];

// $quantity = file_get_contents('https://magdyn.in/inv3/Custom/get_pro_qty.php?inventory_model_id='.$model_id);
//echo $quantity;
$quantity = 100;
if($model_id!=0){
if($quantity >= $qty){
mysqli_query($con,"INSERT INTO `ip_ats`( `po_id`, `qty`, `ats_no`,`notes`,`ats_date`) VALUES ('$id','$qty','$ats_no','$ats_notes','$ats_date')");
echo "INSERT INTO `ip_ats`( `po_id`, `qty`, `ats_no`,`notes`,`ats_date`) VALUES ('$id','$qty','$ats_no','$ats_notes','$ats_date')";
echo "Ok";
} else{
	echo "Product Quantity Not Enough";
}
}
else{
mysqli_query($con,"INSERT INTO `ip_ats`( `po_id`, `qty`, `ats_no`,`notes`,`ats_date`) VALUES ('$id','$qty','$ats_no','$ats_notes','$ats_date')");
echo "Ok";	
	
}

mysqli_close($con);


?>