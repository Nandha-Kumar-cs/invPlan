<?php
include 'config.php';
$id=$_POST['partno'];
$currency = $_POST['currency'];

$result= mysqli_query($con, "SELECT `$currency` FROM `ip_products` WHERE `product_id`='$id'");
$row = mysqli_fetch_array($result);

// echo $currency;
if($row[$currency]=="")
	echo 0;
else echo $row[$currency];




mysqli_close($con);


?>