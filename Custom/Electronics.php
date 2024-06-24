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

body {

         padding-top: 1em;

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
join `ip_po` as po ON po.partid=product.product_id where family.family_name like 'Electronics' group by family.family_id");
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
join `ip_po` as po ON po.partid=product.product_id where family.family_name like 'Electronics' group by family.family_id");
	while($row1 = mysqli_fetch_array($result1))
	{

  if($idx==1) echo '<div class="tab-pane fade show active" 
id="'.$row1["family_name"].'">';
  else echo '<div class="tab-pane fade" id="'.$row1["family_name"].'">';
  $idx++;
        // include 'config.php';

         $result = mysqli_query($con,"SELECT GROUP_CONCAT(val ORDER BY po_rx_date SEPARATOR '<br>') AS items,product_sku,LEFT(product_name,20) AS product_name, SUM(pending_qty) AS total_pending FROM

                                         (SELECT

                                         CASE WHEN ifnull(potable.quantity-sum(inv.qty),potable.quantity)>0 THEN

                                                 CASE WHEN DATEDIFF(potable.po_rx_date,DATE(NOW()))<10 THEN

                                                         
CONCAT('<p1>',DATE_FORMAT(potable.po_rx_date,'%d-%b-%y'),' - ',potable.PoNo,' - ',RIGHT(potable.lineno,3),' - ',left(potable.customerloc,3),' 
(',ifnull(potable.quantity-sum(inv.qty),potable.quantity),')','</p1>')

                                                 ELSE

                                                         
CONCAT(DATE_FORMAT(potable.po_rx_date,'%d-%b-%y'),' - ',potable.PoNo,' - ',RIGHT(potable.lineno,3),' - ',left(potable.customerloc,3),' 
(',ifnull(potable.quantity-sum(inv.qty),potable.quantity),')')

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
`product`.`product_name` ASC) AS tmptable

                                 WHERE val IS NOT NULL

                                 GROUP BY product_name

                                 ORDER BY COUNT(val) DESC

                     ");

         echo '<div class="container-fluid"><div class="card-columns">';

         while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))

         {

                 echo '<div class="card">';

                 echo '<div class="card-header">';

                 echo $row["product_name"].'('.$row["product_sku"].')'.' 
- <p2>'.$row["total_pending"].'</p2>';

                 echo '</div>';

                 echo '<div class="card-body">';

                 echo '<p class="card-text">';

                 echo $row["items"];

                 echo '</p></div></div>';

         }

         echo '</div></div></div>';
	 }
mysqli_close($con);

?>



<!--<h2>Pending PO</h2>-->
</div>
</div>


</body>

</html>




