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

         $result = mysqli_query($con,"SELECT ft.* FROM (SELECT

                                         CASE WHEN ifnull(potable.quantity-sum(inv.qty),potable.quantity)>0 THEN

                                                 CASE WHEN DATEDIFF(potable.po_rx_date,DATE(NOW()))<10 THEN

                                                         
datediff(potable.po_rx_date, NOW())

                                                 ELSE

                                                         
datediff(potable.po_rx_date, NOW())

                                                 END

                                         END AS val,

                                         
product.product_sku,product.product_name ,potable.po_rx_date,

                                         
ifnull(potable.quantity-sum(inv.qty),potable.quantity) AS pending_qty

                                         FROM `ip_po`  as potable

                                         join `ip_products` product on potable.partid=product.product_id

                                         LEFT JOIN ip_inv AS inv ON inv.po_id=potable.id


                                         where 
product.family_id=".$row1['family_id']."

                                         GROUP BY 
concat(potable.pono,potable.lineno)

                                         ORDER BY val ASC, 
`product`.`product_name` ASC) as ft WHERE ft.pending_qty!=0  
ORDER BY `ft`.`product_name` ASC

                     ");


					 ?>

         
<table>

<tr>	
<?php

$unorder = mysqli_fetch_all($result,MYSQLI_ASSOC);

//echo json_encode ($row).'<br>';
$order=array();

//$arr_val1=array();


while(count($unorder)!=0)
{
	$max=0;
$idx=0;
for($x=0; $x < count($unorder); $x++){
	//echo $unorder[$x].'<br>';
    //echo $x.'<br>';
	
if($max > $unorder[$x]['val']){
	$max=$unorder[$x]['val'];
	//echo $max.'max<br>';
	$idx=$x;
	

}

}
//echo $max.'max value<br>';
array_push($order,$unorder[$idx]);
$pro_name=$unorder[$idx]['product_name'];
unset($unorder[$idx]);


for($i = 0; $i < count($unorder); $i++){
	
	if($unorder[$i]['product_name']==$pro_name){
		
		array_push($order,$unorder[$i]);
		unset($unorder[$i]);
	
	}
	
	
}
//echo json_encode($unorder).'<BR>';
echo json_encode($order).'<BR>';
}





/*$pre_sku='';
$val_data='';
$total_pen=0;
$ft=1;
         while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))

         {
			 $pro_result =  $row["product_name"].'('.$row["product_sku"].')';
	$product_result = substr($pro_result, 0, 500);
	$len=strlen($pro_result);
			 if($ft==1){
					

if($len>=500)				 
{
			 ?>
				 <td style="width:420px;border-bottom: 1px solid #ffffff;" rowspan="2"><b><?php echo $product_result;?>...</b></td>
				 <td><b>Days</b></td>
			<?php 
			 }
			 else{ ?>
				 
				 <td style="width:420px;border-bottom: 1px solid #ffffff;" rowspan="2"><b><?php echo $product_result;?></b></td>
				 <td><b>Days</b></td>
			 
		<?php	 } }

if($pre_sku!='' && $pre_sku!=$row["product_sku"])	{
	
//$total_pen=sum($val_data);
	
	echo '<tr><td style="border-top: 1px solid #ffffff;"><b>Qty</b></td>'.$val_data.'</tr>';
$val_data='';	
$total_pen=0;
?>
</tr>	
</table>

<table>

<tr>
<?php
	if($len>=500)				 
{
			 ?>
				 <td style="width:420px;border-bottom: 1px solid #ffffff;" rowspan="2"><b><?php echo $product_result;?>...</b></td>
				 <td><b>Days</b></td>
			<?php 
			 }
			 else{ ?>
				 
				 <td style="width:420px;border-bottom: 1px solid #ffffff;" rowspan="2"><b><?php echo $product_result;?></b></td>
				 <td><b>Days</b></td>
			 
		<?php	 }	
	
	
}
$pre_sku=$row["product_sku"];
$val_data.='<td>'.$row["pending_qty"].'</td>';
$total_pen+=$row["pending_qty"];
	?>	 
	


    <td style="width:40px;"><b><?php echo $row["val"];?></b></td>
	

	 
			 
		
 

            


    <?php    

$ft=0;
	}
	echo '<tr><td style="border-top: 1px solid #ffffff;"><b>Qty</b></td>'.$val_data.'</tr>';
$val_data='';	
$total_pen=0;*/
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




