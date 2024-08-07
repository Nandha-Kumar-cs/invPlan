<?php
echo "Test";

$mysqlUserName      = "root";
    $mysqlPassword      = "";
    $mysqlHostName      = "localhost";
	$DbName				= "invplane";
	$con = new mysqli($mysqlHostName, $mysqlUserName, $mysqlPassword, $DbName); 
	if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }

 		 $result = mysqli_query($con,"INSERT INTO `po` (`po`, `Customer`, `Customer Contact`, `Address`, `Shipping Courier`, `Shipment Type`, `Notes`, `po_type`, `Product`, `Quantity`, `due_date`, `po_ref_no`, `price`, `GST`, `UOM`, `po_create_date`) VALUES (NULL, 'Nikita Containers', 'Nikita Containers Nikita Containers', 'Nikita Containers', 'By Hand', 'Consumables', 'TestTest', '1', '252711_11-R00A -Tag Adapter-4\"FLANGE Outside Thread (Magdyn : 41)', '1', '2021-09-15', '40', '0', '0', 'Nos', '2021-09-18')");
//echo $result;

/*$spart=json_decode($_POST['sparts']);

//$rpart= (json_decode($_POST['rparts']));

//include '../config.php';

             $arr=array();

                $result = mysqli_query($con,"
				SELECT *,cm.short_description as compname,a.short_description as faddress FROM `contact` co LEFT JOIN company cm ON co.company_id=cm.company_id LEFT JOIN address a on co.company_id=a.company_id WHERE a.short_description LIKE '%".$_POST['Address']."%' and cm.short_description='".$_POST['Customer']."' and CONCAT( co.`first_name`,' ', co.`last_name`) LIKE '%".$_POST['CustomerLoc']."%'
				");
				
               

         $crow = mysqli_fetch_array($result,MYSQLI_ASSOC);


          $result = mysqli_query($con,"SELECT * FROM `admin_setting` WHERE `setting_id` = 25");
               

         $ackrow = mysqli_fetch_array($result,MYSQLI_ASSOC);
         $Nextack=$ackrow['value']+1;
         echo $Nextack;
         $result = mysqli_query($con,"UPDATE `admin_setting` SET `value` = '".$Nextack."' WHERE `admin_setting`.`setting_id` = 25;");
          
          $result = mysqli_query($con,"SELECT * FROM `admin_setting` WHERE `setting_id` = 26");
               

         $porow = mysqli_fetch_array($result,MYSQLI_ASSOC);
         $Nextpo=$porow['value']+1;
         echo $Nextpo;
         $result = mysqli_query($con,"UPDATE `admin_setting` SET `value` = '".$Nextpo."' WHERE `admin_setting`.`setting_id` = 26;");
          
      //echo json_encode($crow);

      $result = mysqli_query($con,"
				SELECT * FROM `courier` WHERE short_description='".$_POST['Courier']."'
				");

               

       
         $cor_row = mysqli_fetch_array($result,MYSQLI_ASSOC);

//echo $spart[0];
foreach ($spart as $values) {
$val2= json_decode(json_encode($values),true);
//$total_price=$val2['price']*$val2['qty'];
//$total_gst = ($val2['gst'] / 100) * $total_price;

if(($val2['qty']!='')&&($val2['qty']!=0))	 
 {


 	
 		 $result = mysqli_query($con,"INSERT INTO `po`( `Customer`, `Customer Contact`, `Address`, `Shipping Courier`, `Shipment Type`, `Notes`, `po_type`, `Product`, `Quantity`,`po_create_date`, `due_date`, `po_ref_no`, `price`, `GST`, `UOM`) VALUES ('".$_POST['Customer']."','".$_POST['CustomerLoc']."','".$_POST['Address']."','".$_POST['Courier']."','".$_POST['ShipmentType']."','".$_POST['Notes']."',1,'".$val2['productname']."','".$val2['qty']."',NOW(),'".$val2['shdate']."','".$Nextpo."','','','".$val2['uom']."')");
 		 
  $result = mysqli_query($con,"
        SELECT MAX(`shipment_number`) as maxval FROM `shipment` WHERE 1
        ");

               

       
         $maxval = mysqli_fetch_array($result,MYSQLI_ASSOC);
         $maxval['maxval']=$maxval['maxval']+1;



          


//transaction insert

          $result = mysqli_query($con,"
        INSERT INTO `transaction`(`entity_qtype_id`, `transaction_type_id`, `note`, `created_by`, `creation_date`, `modified_by`, `modified_date`) VALUES (2,6,'".$_POST['Notes']."',3,NOW(),NULL,NULL)

        ");
           $tid = mysqli_insert_id($con);
          // echo $tid;



//echo $_POST['PoTxDate'];
date_default_timezone_set('Asia/Kolkata');
$curdate= date('Y-m-d');
$result="";
 
if($curdate>=$val2['shdate'])
{
	
  $result = mysqli_query($con,"
        INSERT INTO `shipment`( `shipment_number`, `transaction_id`, `from_company_id`, `from_contact_id`, `from_address_id`, `to_company_id`, `to_contact_id`, `to_address_id`, `courier_id`, `tracking_number`, `ship_date`, `shipped_flag`, `created_by`, `creation_date`, `modified_by`, `modified_date`) VALUES (".$maxval['maxval'].",".$tid.",3,1,1,'".$crow['company_id']."','".$crow['contact_id']."','".$crow['address_id']."','".$cor_row['courier_id']."',' ','".$val2['shdate']."',1,3,NOW(),NULL,NULL)

        ");
}
else
{
   $result = mysqli_query($con,"
        INSERT INTO `shipment`( `shipment_number`, `transaction_id`, `from_company_id`, `from_contact_id`, `from_address_id`, `to_company_id`, `to_contact_id`, `to_address_id`, `courier_id`, `tracking_number`, `ship_date`, `shipped_flag`, `created_by`, `creation_date`, `modified_by`, `modified_date`) VALUES (".$maxval['maxval'].",".$tid.",3,1,1,'".$crow['company_id']."','".$crow['contact_id']."','".$crow['address_id']."','".$cor_row['courier_id']."',' ','".$val2['shdate']."',0,3,NOW(),NULL,NULL)

        ");
}

$sid = mysqli_insert_id($con);
         //  echo $sid;

$result = mysqli_query($con,"
        INSERT INTO `shipment_custom_field_helper`(`shipment_id`, `cfv_2`, `cfv_9`, `cfv_10`, `cfv_11`, `cfv_13`) VALUES (".$sid.",'-','".$Nextpo."','".$_POST['ShipmentType']."','-','".$Nextack."')

        ");

$pname=explode(':', $val2['productname']);

               
//echo $val2['productname'];
$result = mysqli_query($con,"SELECT *,CONCAT(im.`inventory_model_code`,' ',im.`short_description`,' (',l.short_description,' : ',il.quantity,')') as options FROM inventory_location il LEFT JOIN `inventory_model` im on im.inventory_model_id=il.inventory_model_id LEFT JOIN `location` l on il.location_id=l.location_id WHERE CONCAT(im.`inventory_model_code`,'-',trim(im.`short_description`),' (',l.short_description,' : ',il.quantity,')') LIKE '%".$pname[0]."%'	");


$p_row = mysqli_fetch_array($result,MYSQLI_ASSOC);

if($curdate>=$val2['shdate'])
{
$result = mysqli_query($con,"

	INSERT INTO `inventory_transaction`( `inventory_location_id`, `transaction_id`, `quantity`, `source_location_id`, `destination_location_id`, `created_by`, `creation_date`, `modified_by`, `modified_date`) VALUES (".$p_row['inventory_location_id'].",".$tid.",".$val2['qty'].",".$p_row['location_id'].",2,3,NOW(),NULL,NULL)
				");

$result = mysqli_query($con,"
        SELECT * FROM `inventory_location` WHERE inventory_model_id=".$p_row['inventory_model_id']." AND location_id=".$p_row['location_id']."
        ");



               
    $lid=0;
       $rowcount=mysqli_num_rows($result);
       if($rowcount>0)
       {
         $maxval = mysqli_fetch_array($result,MYSQLI_ASSOC);
         $fqty=$maxval['quantity']-$val2['qty'];
         if($curdate>=$val2['shdate'])
        {
         $result = mysqli_query($con,"
        UPDATE `inventory_location` SET `quantity`=".$fqty." WHERE  inventory_model_id=".$p_row['inventory_model_id']." AND location_id=".$p_row['location_id']."
        ");
       }

      
         $lid=$maxval['inventory_location_id'];
       }
       else
       {
        //
       

       }





}
else
{
  $result = mysqli_query($con,"

  INSERT INTO `inventory_transaction`( `inventory_location_id`, `transaction_id`, `quantity`, `source_location_id`, `destination_location_id`, `created_by`, `creation_date`, `modified_by`, `modified_date`) VALUES (".$p_row['inventory_location_id'].",".$tid.",".$val2['qty'].",".$p_row['location_id'].",NULL,3,NOW(),NULL,NULL)
        ");

$result = mysqli_query($con,"
        SELECT * FROM `inventory_location` WHERE inventory_model_id=".$p_row['inventory_model_id']." AND location_id=".$p_row['location_id']."
        ");


    
    $lid=0;
       $rowcount=mysqli_num_rows($result);
       if($rowcount>0)
       {
         $maxval = mysqli_fetch_array($result,MYSQLI_ASSOC);
         $fqty=$maxval['quantity']-$val2['qty'];
         if($curdate>=$val2['shdate'])
        {
         $result = mysqli_query($con,"
        UPDATE `inventory_location` SET `quantity`=".$fqty." WHERE  inventory_model_id=".$p_row['inventory_model_id']." AND location_id=".$p_row['location_id']."
        ");
       }

         $lid=$maxval['inventory_location_id'];
       }
       else
       {
        
       }
}
}
}*/

?>