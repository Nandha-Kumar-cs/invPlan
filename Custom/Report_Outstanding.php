<?php

$message='<html>
<style>
	table {
		border-collapse: collapse;
		width: 70%;
	}
	th, td {
		padding: 3px;
	}
	tr:nth-child(even){background-color: #f2f2f2}
	th {
		background-color: #4CAF50;
		color: white;
	}
</style>

<head>
</head>
<body>
	<table id="example" class="display responsive" style=" ">
	<thead>
		<tr>
            <th>Inv No</th>
            <th>Inv Date</th>
            <th>Customer Name</th>
            <th>Item</th>
            <th>Total</th>
            <th>Balance</th>
            <th>Days Due?</th>


		</tr>
    </thead>
    <tbody>';

		include 'config.php';
		$arr=array();
		$result = mysqli_query($con,"SELECT 
									inv.invoice_number as 'Inv No', Date_Format(inv.invoice_date_created,'%d-%b-%Y') as 'Inv Date', clients.client_name as Name,
									GROUP_CONCAT( DISTINCT( CASE WHEN custom.invoice_custom_fieldid = 51
										THEN val.custom_values_value
										END)) AS Currency,
									max( ( CASE WHEN custom.invoice_custom_fieldid = 51
										THEN val.xfactor*amt.invoice_total
										END)) AS INRTotal,
									max( ( CASE WHEN custom.invoice_custom_fieldid = 51
										THEN val.xfactor*amt.invoice_balance
										END)) AS INRBalance,
									GROUP_CONCAT( DISTINCT( CASE WHEN custom.invoice_custom_fieldid = 5
										THEN custom.invoice_custom_fieldvalue
										END)) AS PONO,
									amt.invoice_total AS Total, amt.invoice_balance AS Balance, 
									GROUP_CONCAT(DISTINCT CONCAT(LEFT(items.item_name,30),'(',FORMAT(items.item_quantity,0),')') SEPARATOR '<br>') as 'Item Name',
									inv.invoice_id AS 'ID', clients.client_id AS 'CID',
									CASE WHEN amt.invoice_balance>0 
										THEN  DATEDIFF(NOW(),invoice_date_created)
										END
										AS Outstanding
									FROM `ip_invoices` as inv 
									JOIN ip_invoice_amounts as amt on inv.invoice_id=amt.invoice_id
									JOIN ip_clients as clients on inv.client_id=clients.client_id
									JOIN ip_invoice_custom as custom on inv.invoice_id=custom.invoice_id
									JOIN ip_invoice_items as items on inv.invoice_id=items.invoice_id
									left JOIN ip_custom_values as val on custom.invoice_custom_fieldvalue=val.custom_values_id
									WHERE (custom.invoice_custom_fieldid=51 or custom.invoice_custom_fieldid=5) AND amt.invoice_balance>0 AND DATEDIFF(NOW(),invoice_date_created)>50
									GROUP BY inv.invoice_id");
    	$i=0;
    	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
      	{
		
		$message.='	<tr>
                <td align="center">'.$row['Inv No'].'</td>
                <td align="center">'.$row['Inv Date'].'</td>
                <td align="left">'.$row['Name'].'('.$row['PONO'].')</td>
                <td>'.$row['Item Name'].'</td>
                <td align="right">'.$row['Currency'].number_format($row['Total'],0).'</td>
                <td align="right">'.$row['Currency'].number_format($row['Balance'],0).'</td>
                <td align="center">'. $row['Outstanding'].'</td>
			</tr>	';

		}
		mysqli_close($con); 

		$message.='</tbody>
	</table>
</body>
</html>';

$to = "dhruva@magdyn.com,rg@magdyn.com,accounts@magdyn.com";
$subject = "Pending Invoices";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: info@magdyn.com";

mail($to,$subject,$message,$headers);
?>
