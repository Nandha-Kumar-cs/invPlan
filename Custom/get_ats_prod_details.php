<?php
include 'config.php';
$id=$_POST['partno'];

$result= mysqli_query($con, "SELECT * FROM `ip_products` WHERE `product_sku`='$id'");
$row = mysqli_fetch_array($result);

if($row['product_price']=="")
{
	echo 0;
}
else
{
	echo $row['product_price'];
}



mysqli_close($con);


?>