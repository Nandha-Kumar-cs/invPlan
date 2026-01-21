<!-- <link rel="stylesheet"
		href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
		crossorigin="anonymous"> -->

<style>
	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;

	}

	td,
	th {
		border: 1px solid #000000;
		text-align: left;


	}

	tr:nth-child(odd) {
		background-color: #dddddd;
	}

	#bbody {

		padding-top: 2em;
		font-size: 12px;

	}

	@media (min-width: 576px) {

		.card-columns {

			column-count: 2;

		}

	}

	.bs-example {
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

	p1 {
		color: red;
	}

	p2 {
		border: 2px solid blue;
		border-radius: 5px;
		background-color: blue;
		color: white;
	}

	#bbody {
		height: calc(100vh - 60px);
		/* overflow: hidden; */
		padding-top: 2em;
		font-size: 12px;
	}

	.tab-content {
		height: calc(100vh - 20vh);
		overflow-y: auto;
		overflow-x: auto;
		scroll-behavior: smooth;
	}

</style>

</head>

<div id="bbody">

	<div style="margin-left:10px; margin-bottom:10px;">
		Search : <input type="text" id="filterInput" placeholder="filter">
	</div>

	<div class="bs-example">
		<ul class="nav nav-tabs">

			<?php
			include './config.php';
			$idx = 1;
			$result = mysqli_query($conn, "
SELECT `product_sku`,family.family_id,family.family_name FROM `ip_products` as product join `ip_families` as family ON family.family_id=product.family_id
join `ip_po` as po ON po.partid=product.product_id where family.family_name like 'Mechanical' group by family.family_id");
			while ($row = mysqli_fetch_array($result)) {
				if ($idx == 1) echo '<li class="nav-item"><a href="#' . $row["family_name"] . '" class="nav-link  active" 
data-toggle="tab">' . $row["family_name"] . '</a></li>';
				else echo '<li class="nav-item"><a href="#' . $row["family_name"] . '" 
class="nav-link" data-toggle="tab">' . $row["family_name"] . '</a></li>';
				$idx++;
			}

			mysqli_close($conn);
			?>
		</ul>
		<div class="tab-content">

			<?php

			include './config.php';

			$idx = 1;
			$result1 = mysqli_query($conn, "
SELECT `product_sku`,family.family_id,family.family_name FROM `ip_products` as product join `ip_families` as family ON family.family_id=product.family_id
join `ip_po` as po ON po.partid=product.product_id where family.family_name like 'Mechanical' group by family.family_id");
			while ($row1 = mysqli_fetch_array($result1)) {

				if ($idx == 1) echo '<div class="tab-pane fade show active" 
id="' . $row1["family_name"] . '">';
				else echo '<div class="tab-pane fade" id="' . $row1["family_name"] . '">';
				$idx++;
				// include 'config.php';

				$result = mysqli_query($conn, "SELECT ft.*,ft2.max_val,ft2.tot_pen_qty FROM (SELECT 
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
				$pentries = mysqli_fetch_all($result, MYSQLI_ASSOC);

			?>


				<table style="margin-bottom: 5px;">

					<tr>
						<?php

						$pre_sku = '';
						$val_data = '';
						$total_pen = 0;
						$ft = 1;
						$serial_no = 0;
						foreach ($pentries as $row) {


							$result2 = mysqli_query($conn, "SELECT potable.*,potable.quantity-(SELECT sum(qty) FROM ip_ats where po_id=potable.id)as pqty,(SELECT sum(qty) FROM ip_ats where po_id=potable.id)as qty,(SELECT SUM(qty) FROM `ip_inv` where po_id=potable.id) AS inv_qty FROM `ip_po`  as potable join `ip_products` product on potable.partid=product.product_id WHERE product.product_sku='" . $row["product_sku"] . "'");
							$pentries2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
							$total_pen2 = 0;
							foreach ($pentries2 as $row2) {
								if ($row2['quantity'] > $row2['inv_qty']) {
									if ($row2['pqty'] == Null)
										$total_pen2 += $row2['quantity'];
									else
										$total_pen2 += $row2['pqty'];
								}
							}

							$serial_no++;
							$pending_quantity = ($row["quantity"] - $row["qty"]);
							$pro_result =  $row["product_name"] . '(' . $row["product_sku"] . ')[' . $row["inventory_model_id"] . ']';
							$product_result = substr($pro_result, 0, 500);
							$len = strlen($pro_result);
							if ($ft == 1) {


								if ($len >= 500) {
						?>
									<td style="width:50px; text-align:center;" rowspan="2"><b><?php echo $serial_no; ?></b></td>
									<td style="width:420px;" rowspan="2"><b><?php echo $product_result; ?>...</b></td>
									<td style="width:50px;text-align:center;" rowspan="2"><b><?php echo $total_pen2; ?></b></td>
									<td><b>Days</b></td>
								<?php
								} else { ?>
									<td style="width:50px; text-align:center;" rowspan="2"><b><?php echo $serial_no; ?></b></td>
									<td style="width:420px;" rowspan="2"><b><?php echo $product_result; ?></b></td>
									<td style="width:50px;text-align:center;" rowspan="2"><b><?php echo $total_pen2; ?></b></td>

									<td><b>Days</b></td>

								<?php	 }
							}

							if ($pre_sku != '' && $pre_sku != $row["product_sku"]) {

								//$total_pen=sum($val_data);

								echo '<tr><td style="border-top: 1px solid #ffffff;text-align:center;"><b>Qty</b></td>' . $val_data . '</tr>';
								$val_data = '';
								$total_pen = 0;
								?>
					</tr>
				</table>
				<table style="margin-bottom: 5px;">

					<tr>
						<?php
								if ($len >= 500) {
						?>
							<td style="width:50px; text-align:center;" rowspan="2"><b><?php echo $serial_no; ?></b></td>
							<td style="width:420px;" rowspan="2"><b><?php echo $product_result; ?>...</b></td>
							<td style="width:50px;text-align:center;" rowspan="2"><b><?php echo $total_pen2; ?></b></td>

							<td><b>Days</b></td>
						<?php
								} else { ?>
							<td style="width:50px; text-align:center;" rowspan="2"><b><?php echo $serial_no; ?></b></td>
							<td style="width:420px;" rowspan="2"><b><?php echo $product_result; ?></b></td>
							<td style="width:50px;text-align:center;" rowspan="2"><b><?php echo $total_pen2; ?></b></td>

							<td><b>Days</b></td>

						<?php	 }
							}
							$pre_sku = $row["product_sku"];
							$val_data .= '<td style="width:40px;text-align:center;">' . $pending_quantity . '</td>';
							$total_pen += $row["pending_qty"];

							if ((int)$row["val"] < 0) {
						?>



						<td style="width:40px;text-align:center;"><b>
								<p1><?php echo $row["val"]; ?></p1>
							</b></td>
					<?
							} else {

					?>
						<td style="width:40px;text-align:center;"><b><?php echo $row["val"]; ?></b></td>

				<?php
							}

							$ft = 0;
						}
						echo '<tr><td style="border-top: 1px solid #ffffff;text-align:center;"><b>Qty</b></td>' . $val_data . '</tr>';
						$val_data = '';
						$total_pen = 0;
				?>
				</table>
			<?php
				echo '</div></div>';
			}
			mysqli_close($conn);

			?>


			<!--<h2>Pending PO</h2>-->
		</div>
	</div>

	<script>
		$(document).ready(function() {
			$('.nav-tabs a:first').tab('show');
			$('#filterInput').on('keyup', function() {
				let value = $(this).val().toLowerCase().trim();
				let firstMatchTab = null;

				$('.tab-pane').each(function() {
					let pane = $(this);
					let visibleCount = 0;

					// Loop through all tables inside this pane
					pane.find('table').each(function() {
						let table = $(this);
						let tableVisible = false;

						table.find('tr').each(function() {
							let row = $(this);
							let text = row.text().toLowerCase();

							// Skip header and "Qty" rows from matching
							if (row.find('th').length) return;
							if (text.includes('qty')) return;

							if (text.indexOf(value) > -1 || value === '') {
								// Show both the row and its "Qty" partner
								row.show();
								row.next('tr').show();
								tableVisible = true;
								visibleCount++;
							} else {
								row.hide();
								row.next('tr').hide();
							}
						});

						// Hide entire table if no visible rows remain
						if (!tableVisible && value !== '') {
							table.hide();
						} else {
							table.show();
						}
					});

					// Show or hide the whole tab pane
					if (visibleCount === 0 && value !== '') {
						pane.hide();
					} else {
						pane.show();
						if (!firstMatchTab && visibleCount > 0) {
							firstMatchTab = pane.attr('id');
						}
					}
				});

				// Handle active tab switching
				if (value === '') {
					let firstTab = $('.nav-tabs .nav-link').first();
					$('.nav-tabs .nav-link').removeClass('active');
					$('.tab-pane').removeClass('show active');
					firstTab.addClass('active');
					$('#' + firstTab.attr('href').substring(1)).addClass('show active');
				} else if (firstMatchTab) {
					$('.nav-tabs .nav-link').removeClass('active');
					$('.tab-pane').removeClass('show active');
					$('.nav-tabs .nav-link[href="#' + firstMatchTab + '"]').addClass('active');
					$('#' + firstMatchTab).addClass('show active');
				}
			});
		});
	</script>
</div>