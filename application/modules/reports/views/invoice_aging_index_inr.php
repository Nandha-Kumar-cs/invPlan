<div id="headerbar">
    <h1 class="headerbar-title"><?php _trans('invoice_outstanding'); ?></h1>
</div>
                
<input type="hidden" name="<?php echo $this->config->item('csrf_token_name'); ?>"
value="<?php echo $this->security->get_csrf_hash() ?>">
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
<table id="customers"  >
	<thead>
            <tr>
                <th>Name</th>
                <th>1-60 days</th>
                <th>60-90 days</th>
                <th>>90 days</th>
                <th>Currency</th>
                <th>INR</th>
            </tr>
        </thead>
        <tbody>
	<?php
	include './Custom/config.php';
	$arr=array();
	$con = new mysqli("localhost", "$db_host", "$db_password", "$db_username"); 
	if (mysqli_connect_errno())
      	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
      	}
	$result = mysqli_query($con,"SELECT 
									clients.client_name as Name,
									sum(CASE WHEN invoice_date_created <= DATE_SUB(NOW(),INTERVAL 1 SECOND) AND invoice_date_created >= DATE_SUB(NOW(), INTERVAL 61 DAY) then amt.invoice_balance  ELSE 0 END) AS '1-60 days',
									sum(CASE WHEN invoice_date_created <= DATE_SUB(NOW(),INTERVAL 61 DAY) AND invoice_date_created >= DATE_SUB(NOW(), INTERVAL 91 DAY) then amt.invoice_balance  ELSE 0 END) AS '60-90 days',
									sum(CASE WHEN invoice_date_created <= DATE_SUB(NOW(), INTERVAL 91 DAY) then amt.invoice_balance  ELSE 0 END) AS '>91 days',
									val.custom_values_value AS Currency,
									sum(val.xfactor*amt.invoice_balance) as INR
									FROM `ip_invoices` as inv 
									JOIN ip_invoice_amounts as amt on inv.invoice_id=amt.invoice_id
									JOIN ip_clients as clients on inv.client_id=clients.client_id
									JOIN ip_invoice_custom as custom on inv.invoice_id=custom.invoice_id
									LEFT JOIN ip_custom_values as val on custom.invoice_custom_fieldvalue=val.custom_values_id
									WHERE amt.invoice_balance>0 AND custom.invoice_custom_fieldid=51
									GROUP BY clients.client_id");
   	$i=0;
   	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
      	{
     	$i+=$row['INR'];
	?>
		<tr>
			<td><?php echo $row['Name']?></td>
			<td align="right"><?php echo number_format($row['1-60 days'],2)?></td>
			<td align="right"><?php echo number_format($row['60-90 days'],2)?></td>
			<td align="right"><?php echo number_format($row['>91 days'],2)?></td>
			<td><?php echo $row['Currency']?></td>
			<td align="right"><?php echo number_format($row['INR'],2)?></td>
		</tr>	

	<?php
		}
	mysqli_close($con); 
	?>
	   <tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td align="right"><b><?php echo number_format($i,2)?></b></td>
		</tr>
	</tbody>
</table>