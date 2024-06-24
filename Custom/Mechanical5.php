<?php

include 'config.php';
$idx=1;
$result1 = mysqli_query($con,"
SELECT `product_sku`,family.family_id,family.family_name FROM `ip_products` as product join `ip_families` as family ON family.family_id=product.family_id
join `ip_po` as po ON po.partid=product.product_id where family.family_name like 'Mechanical' group by family.family_id");
	while($row1 = mysqli_fetch_array($result1))
	{
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
		ORDER BY `ft2`.`max_val` ASC");
		
		$pentries=mysqli_fetch_all($result, MYSQLI_ASSOC);
		$pre_sku='';
		$val_data='';
		$total_pen=0;
		$ft=1;
		$serial_no=0;
		$final_val='';
	
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
			$pro_result=$row["product_name"].'('.$row["product_sku"].')['.$row["inventory_model_id"].']';
			$product_result = substr($pro_result, 0, 500);
			$len=strlen($pro_result);
	
			if($ft==1)
			{
					

				if($len>=500)				 
				{
					
					if($row["inventory_model_id"]!=0)
					{
					$model_id=$row["inventory_model_id"];
					$final_val.= $model_id.":".$total_pen2.";";
					}
				}
				else
				{
					if($row["inventory_model_id"]!=0)
					{
					$model_id=$row["inventory_model_id"];
					$final_val.= $model_id.":".$total_pen2.";";
					}		
				} 
			}

			if($pre_sku!='' && $pre_sku!=$row["product_sku"])	
			{
				
				$val_data='';	
				$total_pen=0;
				if($len>=500)				 
				{
					if($row["inventory_model_id"]!=0)
					{
					$model_id=$row["inventory_model_id"];
					$final_val.= $model_id.":".$total_pen2.";";
					}	
				}
				else
				{ 
					if($row["inventory_model_id"]!=0)
					{
					$model_id=$row["inventory_model_id"];
					$final_val.= $model_id.":".$total_pen2.";";
					}
				 }	
				
				
			}
			$pre_sku=$row["product_sku"];
			$total_pen+=$row["pending_qty"];	
			$ft=0;
		}
	
		echo $final_val;
		$val_data='';
		$total_pen=0;
	}
mysqli_close($con);

?>



