<?php
include 'config.php';
$line_data= ($_POST['line_data']);
$ats_value=$_POST['ats_value'];
if(isset($_POST['pono'])){
	$pono=$_POST['pono'];
}
else{
	$pono=0;
}


$user_id=$_POST['user_id'];
$po_date_field=date('Y-m-d',strtotime($_POST['po_date_field']));
$po_rx_date=date('Y-m-d',strtotime($_POST['po_rx_date']));
$buyername=$_POST['buyername'];
$customer=$_POST['customer'];
$customer_loc=$_POST['customer_loc'];
$loc_code=$_POST['loc_code'];
$comment=$_POST['comment'];
$ats_status=$_POST['ats_status'];
echo $ats_status;
$json = json_decode($line_data, true);

	$result3=mysqli_query($con,"SELECT * FROM `ip_settings`  WHERE `setting_id` = 264");
	$row3 = mysqli_fetch_array($result3);
	$atsvalue=$row3['setting_value'];
	$atsvalue_update=$row3['setting_value']+1;
	$atsvalue1=$atsvalue;


date_default_timezone_set('Asia/Calcutta'); 
if($_POST['type']=='add')
{
	$result1=mysqli_query($con,"SELECT max(`ackno`)  as ackno FROM `ip_po` WHERE 1");
	$row1 = mysqli_fetch_array($result1);
	$ackno=$row1['ackno']+1;
	for($idx=0;$idx<sizeof($json);$idx++)
	{
		
		mysqli_query($con,"	
		INSERT INTO `ip_ats_item_table`( `pono`,`po_id`, `podate`, `porxdate`, `customer`, `customerloc`, `buyername`, `lineno`, `partid`, `quantity`, `locationcode`, `creationdate`, `comment`, `mode`,`Oldline`,`user_id`,`ats_value`,`ats_status`) 
	  VALUES ('$pono','".$json[$idx]['poid']."','$po_date_field','$po_rx_date','$customer','$customer_loc','$buyername','".$json[$idx]['lineno']."',
	  '".$json[$idx]['partno']."','".$json[$idx]['qty']."','$loc_code', '".date('Y-m-d h:i:s')."','$comment','".$json[$idx]['mode']."',0,'$user_id','".$atsvalue."','".$ats_status."')");
	  
	  //mysqli_query($con,"INSERT INTO `ip_ats` (`id`, `po_id`, `qty`, `ats_no`, `notes`) VALUES ('', '".$json[$idx]['poid']."', '".$json[$idx]['qty']."', '".$atsvalue."', '$comment');");
	  
	  
	}
	
	mysqli_query($con,"UPDATE `ip_settings` SET `setting_value` = '".$atsvalue_update."' WHERE `ip_settings`.`setting_id` = 264");
}
else if($_POST['type']=='edit')
{
	$po_id=$_POST['po_id'];
	$result1= mysqli_query($con, "SELECT `ats_id`, `pono`,`po_id`,`podate`, `porxdate`, `customer`, `customerloc`, `buyername`,`lineno`, `partid`, `quantity`, `locationcode`, `creationdate`, `Oldline`,`comment`,`mode`,`user_id`,`ats_value`,`ats_status` FROM `ip_ats_item_table` WHERE `ats_value`='$ats_value'");
$poidarr=array();

	$idx=0;
	
	while($row1 = mysqli_fetch_array($result1))
	{
	   $poidarr[$idx++]=$row1['ats_id'];
	   
	   if($row1['ats_value']==$ats_value){
	   $atsvalue1=$row1['ats_value'];
	   }
	   else{
		   $atsvalue1=$atsvalue;
	   }
	  
	}
	for($idx=0;$idx<sizeof($json);$idx++)
		{
		if($poidarr[$idx]!="")
			{
			
				mysqli_query($con,"UPDATE `ip_ats_item_table` SET `pono`='$pono',`po_id`='".$json[$idx]['poid']."',`podate`='$po_date_field',`porxdate`='$po_rx_date',`customer`='$customer',`ats_status`='$ats_status',`customerloc`='$customer_loc',`buyername`='$buyername',`lineno`='".$json[$idx]['lineno']."',`partid`='".$json[$idx]['partno']."',`quantity`='".$json[$idx]['qty']."',
				`locationcode`='$loc_code',`creationdate`='".date('Y-m-d h:i:s')."',`Oldline`='0',`ats_value`='$ats_value',`comment`='$comment',`mode`='".$json[$idx]['mode']."',`user_id`='$user_id' WHERE `ats_id`='$poidarr[$idx]'");
				
				echo "UPDATE `ip_ats_item_table` SET `pono`='$pono',`po_id`='".$json[$idx]['poid']."',`podate`='$po_date_field',`porxdate`='$po_rx_date',`customer`='$customer',`ats_status`='$ats_status',`customerloc`='$customer_loc',`buyername`='$buyername',`lineno`='".$json[$idx]['lineno']."',`partid`='".$json[$idx]['partno']."',`quantity`='".$json[$idx]['qty']."',
				`locationcode`='$loc_code',`creationdate`='".date('Y-m-d h:i:s')."',`Oldline`='0',`ats_value`='$ats_value',`comment`='$comment',`mode`='".$json[$idx]['mode']."',`user_id`='$user_id' WHERE `ats_id`='$poidarr[$idx]'";
				
				if($ats_status=="Approved")
				{
					echo $ats_status;
					$result5= mysqli_query($con, "SELECT * FROM `ip_ats` WHERE po_id=".$json[$idx]['poid']." AND ats_no='$ats_value'");
					$row5 = mysqli_num_rows($result5);
					
					echo $row5;
					if($row5 > 0)
					{
						mysqli_query($con,"UPDATE `ip_ats` SET `notes` = '$comment',`qty` = '".$json[$idx]['qty']."' WHERE `ip_ats`.`ats_no` =".$atsvalue1." AND `ip_ats`.`po_id` =".$json[$idx]['poid']." ;");
						
						//echo "UPDATE `ip_ats` SET `notes` = '$comment',`qty` = '".$json[$idx]['qty']."' WHERE `ip_ats`.`ats_no` =".$atsvalue1." AND `ip_ats`.`po_id` =".$json[$idx]['poid']." ;";
					}
					else{
						mysqli_query($con,"INSERT INTO `ip_ats` (`id`, `po_id`, `qty`, `ats_no`, `notes`) VALUES ('', '".$json[$idx]['poid']."', '".$json[$idx]['qty']."', '".$atsvalue1."', '$comment');");
					}
				}
				else
				{
					mysqli_query($con,"DELETE FROM `ip_ats` WHERE `ip_ats`.`ats_no` =".$atsvalue1." AND `ip_ats`.`po_id` =".$json[$idx]['poid']." ;");
					
					//echo "DELETE FROM `ip_ats` WHERE `ip_ats`.`ats_no` =".$atsvalue1." AND `ip_ats`.`po_id` =".$json[$idx]['poid']." ;";
				}
				
				//mysqli_query($con,"UPDATE `ip_ats` SET `notes` = '$comment',`qty` = '".$json[$idx]['qty']."' WHERE `ip_ats`.`ats_no` =".$atsvalue1." AND `ip_ats`.`po_id` =".$json[$idx]['poid']." ;");
				
			$atsvalue_update=$atsvalue;	

			
			}
		else
			{
				
					mysqli_query($con,"INSERT INTO `ip_ats_item_table`( `pono`,`po_id`,`podate`, `porxdate`, `customer`, `customerloc`, `buyername`, `lineno`, `partid`, `quantity`, `locationcode`,`creationdate`, `comment`,`mode`,`Oldline`,`user_id`,`ats_value`,`ats_status`) 
					  VALUES ('$pono','".$json[$idx]['poid']."','$po_date_field','$po_rx_date','$customer','$customer_loc','$buyername','".$json[$idx]['lineno']."',
					  '".$json[$idx]['partno']."','".$json[$idx]['qty']."',
					  '$loc_code','".date('Y-m-d h:i:s')."','$comment',
					  '".$json[$idx]['mode']."',0,'$user_id','".$atsvalue1."','".$ats_status."')"); 
					  
					//mysqli_query($con,"INSERT INTO `ip_ats` (`id`, `po_id`, `qty`, `ats_no`, `notes`) VALUES ('', '".$json[$idx]['poid']."', '".$json[$idx]['qty']."', '".$atsvalue1."', '$comment');");
	  
					  
			}
		}
		
		mysqli_query($con,"UPDATE `ip_settings` SET `setting_value` = '".$atsvalue_update."' WHERE `ip_settings`.`setting_id` = 264");  
		
}

mysqli_close($con);


?>