<!DOCTYPE html>

<html>

<head>

<meta http-equiv="refresh" content="300" />

<link rel="stylesheet" 
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
crossorigin="anonymous">

     <link rel="stylesheet" 
href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
     <link rel="stylesheet" 
href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <script
src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script
src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
     <script
src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  
}

td, th {
  border: 1px solid #000000;
  text-align: left;
 
  
}

tr:nth-child(odd) {
  background-color: #dddddd;
}

body {

         padding-top: 1em;
		 font-size: 12px;

         }

@media (min-width: 576px) {

     .card-columns {

         column-count: 2;

     }

}

	.bs-example{
     	margin: 0px;
     }


@media (min-width: 768px) {

     .card-columns {

         column-count: 3;

     }

}



@media (min-width: 1200px) {

     .card-columns {

         column-count: 4;

     }

}



@media (min-width: 1600px) {

     .card-columns {

         column-count: 5;

     }

}

p1   {color: red;}

p2   {border: 2px solid blue;  border-radius: 5px; background-color: 
blue; color: white;}





</style>

</head>

<body>



<div class="bs-example">
     <ul class="nav nav-tabs">

<?php
	include 'config.php';
	$idx=1;
	$result = mysqli_query($con,"
SELECT `product_sku`,family.family_id,family.family_name FROM `ip_products` as product join `ip_families` as family ON family.family_id=product.family_id
join `ip_po` as po ON po.partid=product.product_id where family.family_name like 'Mechanical' group by family.family_id");
	 while($row = mysqli_fetch_array($result))
	 {
		  if($idx==1) echo '<li class="nav-item"><a href="#'.$row["family_name"].'" class="nav-link  active" 
data-toggle="tab">'.$row["family_name"].'</a></li>';
			else echo '<li class="nav-item"><a href="#'.$row["family_name"].'" 
class="nav-link" data-toggle="tab">'.$row["family_name"].'</a></li>';
			$idx++;
	 }

	mysqli_close($con);
?>
     </ul>
<div class="tab-content">

<?php

  include 'config.php';

	$idx=1;
	$result1 = mysqli_query($con,"
SELECT `product_sku`,family.family_id,family.family_name FROM `ip_products` as product join `ip_families` as family ON family.family_id=product.family_id
join `ip_po` as po ON po.partid=product.product_id where family.family_name like 'Mechanical' group by family.family_id");
	while($row1 = mysqli_fetch_array($result1))
	{

  if($idx==1) echo '<div class="tab-pane fade show active" 
id="'.$row1["family_name"].'">';
  else echo '<div class="tab-pane fade" id="'.$row1["family_name"].'">';
  $idx++;
        // include 'config.php';

         $result = mysqli_query($con,"SELECT ft.*,ft2.max_val,ft2.tot_pen_qty FROM (SELECT 
CASE WHEN ifnull(potable.quantity-sum(inv.qty),potable.quantity)>0 THEN
CASE WHEN DATEDIFF(potable.po_rx_date,DATE(NOW()))<10 THEN
datediff(potable.po_rx_date, NOW())
ELSE
datediff(potable.po_rx_date, NOW())
END
END AS val,
product.product_sku,product.product_name ,product.`inventory_model_id`,potable.po_rx_date,
ifnull(potable.quantity-sum(inv.qty),potable.quantity) AS pending_qty,(SELECT sum(qty) FROM ip_ats where po_id=potable.id)as qty,potable.quantity FROM `ip_po`  as potable
join `ip_products` product on potable.partid=product.product_id
LEFT JOIN ip_inv AS inv ON inv.po_id=potable.id
where product.family_id=1 GROUP BY concat(potable.pono,potable.lineno)
ORDER BY val ASC, `product`.`product_name` ASC) as ft LEFT JOIN(SELECT ft.*,MIN(val) as max_val,SUM(pending_qty) as tot_pen_qty FROM (SELECT CASE WHEN ifnull(potable.quantity-sum(inv.qty),potable.quantity)>0 THEN
CASE WHEN DATEDIFF(potable.po_rx_date,DATE(NOW()))<10 THEN
datediff(potable.po_rx_date, NOW())
ELSE
datediff(potable.po_rx_date, NOW())
END
END AS val,
product.product_sku,product.product_name ,product.`inventory_model_id`,potable.po_rx_date,
ifnull(potable.quantity-sum(inv.qty),potable.quantity) AS pending_qty
FROM `ip_po`  as potable
join `ip_products` product on potable.partid=product.product_id
LEFT JOIN ip_inv AS inv ON inv.po_id=potable.id
where product.family_id=1 GROUP BY 
concat(potable.pono,potable.lineno) ORDER BY val ASC, 
`product`.`product_name` ASC) as ft WHERE ft.pending_qty!=0  GROUP BY `ft`.`product_name`
ORDER BY `ft`.`product_name` ASC) ft2 on ft.`product_name`=ft2.`product_name` WHERE ft.pending_qty!=0  
ORDER BY `ft2`.`max_val` ASC
                     ");
 $pentries=mysqli_fetch_all($result, MYSQLI_ASSOC);

					 ?>

         
<table style="margin-bottom: 5px;">

<tr>	
<?php

$pre_sku='';
$val_data='';
$total_pen=0;
$ft=1;
$serial_no=0;
         foreach ($pentries as $row) 
         {


         	$result2 = mysqli_query($con,"SELECT potable.*,potable.quantity-(SELECT sum(qty) FROM ip_ats where po_id=potable.id)as pqty,(SELECT sum(qty) FROM ip_ats where po_id=potable.id)as qty,(SELECT SUM(qty) FROM `ip_inv` where po_id=potable.id) AS inv_qty FROM `ip_po`  as potable join `ip_products` product on potable.partid=product.product_id WHERE product.product_sku='".$row["product_sku"]."'");
         	$pentries2=mysqli_fetch_all($result2, MYSQLI_ASSOC);
         	$total_pen2=0;
         	foreach ($pentries2 as $row2) 
         	{
         		if($row2['quantity']>$row2['inv_qty'])
         		{
         			if($row2['pqty']==Null)
         				$total_pen2+=$row2['quantity'];
	         		else
	         			$total_pen2+=$row2['pqty'];
	         	}	
         	}

			$serial_no++;
			 $pending_quantity=($row["quantity"]-$row["qty"]);
			 $pro_result =  $row["product_name"].'('.$row["product_sku"].')['.$row["inventory_model_id"].']';
	$product_result = substr($pro_result, 0, 500);
	$len=strlen($pro_result);
			 if($ft==1){
					

if($len>=500)				 
{
			 ?>
			 <td style="width:50px; text-align:center;" rowspan="2"><b><?php echo $serial_no;?></b></td>
				 <td style="width:420px;" rowspan="2"><b><?php echo $product_result;?>...</b></td>
				 <td style="width:50px;text-align:center;" rowspan="2"><b><?php echo $total_pen2;?></b></td>
				 <td><b>Days</b></td>
			<?php 
			 }
			 else{ ?>
				 <td style="width:50px; text-align:center;" rowspan="2"><b><?php echo $serial_no;?></b></td>
				 <td style="width:420px;" rowspan="2"><b><?php echo $product_result;?></b></td>
				 	 <td style="width:50px;text-align:center;" rowspan="2"><b><?php echo $total_pen2;?></b></td>
			
				 <td><b>Days</b></td>
			 
		<?php	 } }

if($pre_sku!='' && $pre_sku!=$row["product_sku"])	{
	
//$total_pen=sum($val_data);
	
	echo '<tr><td style="border-top: 1px solid #ffffff;text-align:center;"><b>Qty</b></td>'.$val_data.'</tr>';
$val_data='';	
$total_pen=0;
?>
</tr>	
</table>
<table style="margin-bottom: 5px;">

<tr>
<?php
	if($len>=500)				 
{
			 ?>
			 <td style="width:50px; text-align:center;" rowspan="2"><b><?php echo $serial_no;?></b></td>
				 <td style="width:420px;" rowspan="2"><b><?php echo $product_result;?>...</b></td>
				 <td style="width:50px;text-align:center;" rowspan="2"><b><?php echo $total_pen2;?></b></td>
				 
				 <td><b>Days</b></td>
			<?php 
			 }
			 else{ ?>
				 <td style="width:50px; text-align:center;" rowspan="2"><b><?php echo $serial_no;?></b></td>
				 <td style="width:420px;" rowspan="2"><b><?php echo $product_result;?></b></td>
				  <td style="width:50px;text-align:center;" rowspan="2"><b><?php echo $total_pen2;?></b></td>
				
				 <td><b>Days</b></td>
			 
		<?php	 }	
	
	
}
$pre_sku=$row["product_sku"];
$val_data.='<td style="width:40px;text-align:center;">'.$pending_quantity.'</td>';
$total_pen+=$row["pending_qty"];
	
if((int)$row["val"]<0){	
	?>	 
	


    <td style="width:40px;text-align:center;"><b><p1><?php echo $row["val"];?></p1></b></td>
<?
}
else
{

?>	

	 
			 
		 <td style="width:40px;text-align:center;"><b><?php echo $row["val"];?></b></td>
 

            


    <?php   
}	

$ft=0;
	}
	echo '<tr><td style="border-top: 1px solid #ffffff;text-align:center;"><b>Qty</b></td>'.$val_data.'</tr>';
$val_data='';	
$total_pen=0;
	?>
</table>	
<?php
         echo '</div></div>';
	 }
mysqli_close($con);

?>



<!--<h2>Pending PO</h2>-->
</div>
</div>


</body>

</html>




