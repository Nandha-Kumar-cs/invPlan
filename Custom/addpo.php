<?php
include 'config.php';
$line_data= ($_POST['line_data']);
$pono=$_POST['pono'];
$user_id=$_POST['user_id'];
$po_date_field=date('Y-m-d',strtotime($_POST['po_date_field']));
$po_rx_date=date('Y-m-d',strtotime($_POST['po_rx_date']));
$buyername=$_POST['buyername'];
$customer=$_POST['customer'];
$customer_loc=$_POST['customer_loc'];
$loc_code=$_POST['loc_code'];
$comment=$_POST['comment'];
$json = json_decode($line_data, true);

date_default_timezone_set('Asia/Calcutta'); 
if($_POST['type']=='add')
{
	$result1=mysqli_query($con,"SELECT max(`ackno`)  as ackno FROM `ip_po` WHERE 1");
	$row1 = mysqli_fetch_array($result1);
	$ackno=$row1['ackno']+1;
	for($idx=0;$idx<sizeof($json);$idx++)
	{	
		$shdate="";
		if($json[$idx]['mode']=="Sea")	$shdate=date('Y-m-d',strtotime("-45 days",strtotime($json[$idx]['com_date'])));
		else if($json[$idx]['mode']=="Air")	$shdate=date('Y-m-d',strtotime("-10 days",strtotime($json[$idx]['com_date'])));
		else $shdate=date('Y-m-d',strtotime("-60 days",strtotime($json[$idx]['com_date'])));
		mysqli_query($con,"	
		INSERT INTO `ip_po`( `pono`, `podate`, `porxdate`, `customer`, `customerloc`, `buyername`, `lineno`, `partid`, `quantity`, `unitprice`,
	  `currency`, `po_rx_date`, `locationcode`, `creationdate`, `comment`, `mode`, `magdyn_commited_date`,`Oldline`,`ackno`,`Shdate`,`user_id`) 
	  VALUES ('$pono','$po_date_field','$po_rx_date','$customer','$customer_loc','$buyername','".$json[$idx]['lineno']."',
	  '".$json[$idx]['partno']."','".$json[$idx]['qty']."','".$json[$idx]['unitprice']."','".$json[$idx]['currency']."',
	  '".date('Y-m-d',strtotime($json[$idx]['podate']))."',
	  '$loc_code','".date('Y-m-d h:i:s')."','$comment',
	  '".$json[$idx]['mode']."','".date('Y-m-d',strtotime($json[$idx]['com_date']))."',0,'$ackno','$shdate','$user_id')");  
		
	}
	echo $ackno;
}
else if($_POST['type']=='edit')
{
	$po_id=$_POST['po_id'];
	$result1= mysqli_query($con, "SELECT `id`, `pono`, `ackno`,`podate`, `porxdate`, `customer`, `customerloc`, `buyername`, 
	`lineno`, `partid`, `quantity`, `unitprice`, `currency`, `po_rx_date`, `locationcode`, `creationdate`, `Oldline`, `amndline`, 
	`comment`,  `mode`, `magdyn_commited_date`,`Shdate`,`user_id` FROM `ip_po` WHERE `pono`='$pono'");
	$ackno="";
$poidarr=array();	
	$idx=0;
	//echo date('Y-m-d h:i:s');
	while($row1 = mysqli_fetch_array($result1))
	{
		$ackno=$row1['ackno'];
		
			mysqli_query($con,"	
		INSERT INTO `ip_po_amnd`( `pono`, `podate`, `porxdate`, `customer`, `customerloc`, `buyername`, `lineno`,
		`partid`, `quantity`, `unitprice`,
	  `currency`, `po_rx_date`, `locationcode`, `creationdate`, `transaction_date`,`comment`, `mode`, `magdyn_commited_date`,`Oldline`,`amndline`,`ackno`,`po_id`,`user_id`) 
	  VALUES ('$row1[pono]','$row1[podate]','$row1[porxdate]','$row1[customer]','$row1[customerloc]','$row1[buyername]','$row1[lineno]',
	  '$row1[partid]','$row1[quantity]','$row1[unitprice]',
	  '$row1[currency]',
	  '$row1[po_rx_date]',
	  '$row1[locationcode]','$row1[creationdate]','".date('Y-m-d h:i:s')."','$row1[comment]',
	  '$row1[mode]','$row1[magdyn_commited_date]',1,0,'$row1[ackno]','$row1[id]','$row1[user_id]')");
	  $poidarr[$idx++]=$row1['id'];
	  
	}
	//echo  sizeof($json);
	for($idx=0;$idx<sizeof($json);$idx++)
		{
		$shdate="";
		if($json[$idx]['mode']=="Sea")	$shdate=date('Y-m-d',strtotime("-45 days",strtotime($json[$idx]['com_date'])));
		else if($json[$idx]['mode']=="Air")	$shdate=date('Y-m-d',strtotime("-10 days",strtotime($json[$idx]['com_date'])));
		else $shdate=date('Y-m-d',strtotime("-60 days",strtotime($json[$idx]['com_date'])));
		if($poidarr[$idx]!="")
			{
				mysqli_query($con,"	
					UPDATE `ip_po` SET `pono`='$pono',`podate`='$po_date_field',`porxdate`='$po_rx_date',`customer`='$customer',`customerloc`='$customer_loc',
					`buyername`='$buyername',`lineno`='".$json[$idx]['lineno']."',`partid`='".$json[$idx]['partno']."',
					`quantity`='".$json[$idx]['qty']."',`unitprice`='".$json[$idx]['unitprice']."',`currency`='".$json[$idx]['currency']."',
					`po_rx_date`='".date('Y-m-d',strtotime($json[$idx]['podate']))."',`locationcode`='$loc_code',`creationdate`='".date('Y-m-d h:i:s')."',`Oldline`='0',
					`comment`='$comment',`Shdate`='$shdate',`mode`='".$json[$idx]['mode']."',`user_id`='$user_id',`magdyn_commited_date`='".date('Y-m-d',strtotime($json[$idx]['com_date']))."' WHERE `id`='$poidarr[$idx]'");
			}
		else
			{
					mysqli_query($con,"INSERT INTO `ip_po`( `pono`, `podate`, `porxdate`, `customer`, `customerloc`, `buyername`, `lineno`, `partid`, `quantity`, `unitprice`,
					  `currency`, `po_rx_date`, `locationcode`, `creationdate`, `comment`, `mode`, `magdyn_commited_date`,`Oldline`,`ackno`,`Shdate`,`user_id`) 
					  VALUES ('$pono','$po_date_field','$po_rx_date','$customer','$customer_loc','$buyername','".$json[$idx]['lineno']."',
					  '".$json[$idx]['partno']."','".$json[$idx]['qty']."','".$json[$idx]['unitprice']."','".$json[$idx]['currency']."',
					  '".date('Y-m-d',strtotime($json[$idx]['podate']))."',
					  '$loc_code','".date('Y-m-d h:i:s')."','$comment',
					  '".$json[$idx]['mode']."','".date('Y-m-d',strtotime($json[$idx]['com_date']))."',0,'$ackno','$shdate','$user_id')");  
			}
		}
		echo $ackno;

}
else if($_POST['type']=='amnd')
{	

$poidarr=array();	
	$po_id=$_POST['po_id'];
	$result1= mysqli_query($con, "SELECT `id`, `pono`,`ackno`, `podate`, `porxdate`, `customer`, `customerloc`, `buyername`, 
	`lineno`, `partid`, `quantity`, `unitprice`, `currency`, `po_rx_date`, `locationcode`, `creationdate`, `Oldline`, `amndline`, 
	`comment`,  `mode`, `magdyn_commited_date`,`Shdate`,`user_id` FROM `ip_po` WHERE `pono`='$pono'");
	$idx=0;
	while($row1 = mysqli_fetch_array($result1))
	{
		 $poidarr[$idx++]=$row1['id'];
			mysqli_query($con,"	
		INSERT INTO `ip_po_amnd`( `pono`, `podate`, `porxdate`, `customer`, `customerloc`, `buyername`, `lineno`,
		`partid`, `quantity`, `unitprice`,
	  `currency`, `po_rx_date`, `locationcode`, `creationdate`,`transaction_date`, `comment`, `mode`, `magdyn_commited_date`,`Oldline`,`amndline`,`ackno`,`po_id`,`user_id`) 
	  VALUES ('$row1[pono]','$row1[podate]','$row1[porxdate]','$row1[customer]','$row1[customerloc]','$row1[buyername]','$row1[lineno]',
	  '$row1[partid]','$row1[quantity]','$row1[unitprice]',
	  '$row1[currency]',
	  '$row1[po_rx_date]',
	  '$row1[locationcode]','$row1[creationdate]','".date('Y-m-d h:i:s')."','$row1[comment]',
	  '$row1[mode]','$row1[magdyn_commited_date]',1,1,'$row1[ackno]','$row1[id]','$row1[user_id]')");
	}
	$result1=mysqli_query($con,"SELECT max(`ackno`)  as ackno FROM `ip_po` WHERE 1");
	$row1 = mysqli_fetch_array($result1);
	$ackno=$row1['ackno']+1;
	//echo json_encode($poidarr);
	for($idx=0;$idx<sizeof($json);$idx++)
		{
		$shdate="";
		if($json[$idx]['mode']=="Sea")	$shdate=date('Y-m-d',strtotime("-45 days",strtotime($json[$idx]['com_date'])));
		else if($json[$idx]['mode']=="Air")	$shdate=date('Y-m-d',strtotime("-10 days",strtotime($json[$idx]['com_date'])));
		else $shdate=date('Y-m-d',strtotime("-60 days",strtotime($json[$idx]['com_date'])));
		
		mysqli_query($con,"	
			UPDATE `ip_po` SET `pono`='$pono',`podate`='$po_date_field',`porxdate`='$po_rx_date',`customer`='$customer',`customerloc`='$customer_loc',
			`buyername`='$buyername',`lineno`='".$json[$idx]['lineno']."',`partid`='".$json[$idx]['partno']."',
			`quantity`='".$json[$idx]['qty']."',`unitprice`='".$json[$idx]['unitprice']."',`currency`='".$json[$idx]['currency']."',
			`po_rx_date`='".date('Y-m-d',strtotime($json[$idx]['podate']))."',`locationcode`='$loc_code',`creationdate`='".date('Y-m-d h:i:s')."',`Oldline`='0',
			`comment`='$comment',`mode`='".$json[$idx]['mode']."',`Shdate`='$shdate',`user_id`='$user_id',`magdyn_commited_date`='".date('Y-m-d',strtotime($json[$idx]['com_date']))."',`ackno`='$ackno' WHERE `id`='$poidarr[$idx]'");
		}
 echo $ackno;

}
mysqli_close($con);


?>