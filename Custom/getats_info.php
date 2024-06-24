<?php
include 'config.php';
$pono=$_POST['po_id'];
$ats_value=$_POST['ats_value'];
$type=$_GET['type'];
$arr= array();
$data        = array();
	
	$result= mysqli_query($con, "SELECT `ats_id`, `pono`,`po_id`, `podate`, `porxdate`, `customer`, `customerloc`, `buyername`, `lineno`, `product_sku`,`product_name`, 
	`quantity`, `locationcode`, `creationdate`, `Oldline`, `comment`, `mode`,ats_value,ats_status
	FROM `ip_ats_item_table` as po join `ip_products` prod on prod.product_id=po.partid WHERE `ats_value`='$ats_value'");
		while($row = mysqli_fetch_array($result))
		{
			$dat['atsno']=$row['ats_value'];
			$dat['poid']=$row['po_id'];
			$dat['pono']=$row['pono'];
			$dat['podate']=date("d-M-Y",strtotime($row['podate']));
			$dat['porxdate']=date("d-M-Y",strtotime($row['porxdate']));
			$dat['customer']=$row['customer'];
			$dat['customerloc']=$row['customerloc'];
			$dat['buyername']=$row['buyername'];
			$dat['lineno']=$row['lineno'];
			$dat['product_sku']=$row['product_sku']."-".$row['product_name'];
			$dat['quantity']=$row['quantity'];
			$dat['locationcode']=$row['locationcode'];
			$dat['comment']=$row['comment'];
			$dat['ats_status']=$row['ats_status'];
			$dat['mode']=$row['mode'];
			
			array_push($arr, $dat);			
		}    
		echo json_encode($arr);
mysqli_close($con);


?>