<input type="hidden" name="<?php echo $this->config->item('csrf_token_name'); ?>"
value="<?php echo $this->security->get_csrf_hash() ?>">

<head>
	<style type="text/css" class="init">
		tfoot input {
			width: 100%;
			padding: 3px;
			box-sizing: border-box;
		}
		
	.dataTables_info {
    padding-right: 0.733em;
}	

.dt-button{ 
	margin-top:-40px;
}
		
	</style>
	<style>
		p1   {border: 2px solid blue;  border-radius: 5px; background-color: blue; color: white;}
		p2   {border: 2px solid red;  border-radius: 5px; background-color: red; color: white;}
		p3   {border: 2px solid red;  border-radius: 5px; background-color: red; color: white;}
		p4   {border: 2px solid green;  border-radius: 5px; background-color: green; color: white;}


	</style>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/scroller/2.0.0/js/dataTables.scroller.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.0/css/scroller.dataTables.min.css">
	
	
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

	
	<script type="text/javascript" class="init">
	
		$(document).ready(function() {
		// Setup - add a text input to each footer cell
		$('#example tfoot th').each( function () {
			var title = $(this).text();
			if ((title=='Total')||(title=='Balance')){}else
			$(this).html( '<input type="text" placeholder="&#x1F50D; '+title+'" />' );
		} );
		$('#example').show();
		// DataTable
		var table = $('#example').DataTable({
		"dom": '<"top"if<"dt_title">>Bt<"bottom"><"clear">',
		buttons: [
            {
            extend: 'copy',
            text: 'Copy',
            className: 'btn btn-default',
            exportOptions: {
			    //columns: ':not(:last-child)',
                columns: [0,1,2,3,4,5,6,7,8],
            }
            },
            {
            extend: 'csv',
            text: 'Export CSV',
            className: 'btn btn-default',
            exportOptions: {
                //columns: ':not(:last-child)',
				columns: [0,1,2,3,4,5,6,7,8],
            }
            },
            {
            extend: 'excel',
            text: 'Export Excel',
            className: 'btn btn-default',
            exportOptions: {
                //columns: ':not(:last-child)',
				columns: [0,1,2,3,4,5,6,7,8],
            }
            }
        ],
	        deferRender:    true,
        	scrollY:        $(window).height()-190,
	        scrollCollapse: false,
        	scroller:       true,
		"footerCallback": function ( row, data, start, end, display ) {
	            var api = this.api(), data;
 
        	    // converting to interger to find total
	            var intVal = function ( i ) {
        	        return typeof i === 'string' ?
                	    i.replace(/[\$,]/g, '')*1 :
	                    typeof i === 'number' ?
        	                i : 0;
	            };
 
            // computing column Total of the complete result 
            var INRTotal = api
                .column( 9,{ filter: 'applied'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
	    var INRBalance = api
                .column( 10,{ filter: 'applied'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
				
            // Update footer by showing the total with the reference of the column index 
            $( api.column( 6 ).footer() ).html('Rs.'+INRTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            $( api.column( 7 ).footer() ).html('Rs.'+INRBalance.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
       			 }, 			
			"columnDefs": [
    			{ "width": "9%", "targets": [0,1,2] },
    			{ "width": "15%", "targets": [3,4] },
    			{ "targets": [9,10], "visible":false }

  			],
			"order": [[ 2, "desc" ],[ 1, "desc" ]],

			});

		// Apply the search
		table.columns().every( function () {
			var that = this;

			$( 'input', this.footer() ).on( 'keyup change', function () {
				if ( that.search() !== this.value ) {
					that
					.search( this.value )
					.draw();
				}
			} );
		} );
		$("div.dt_title").html('<h3><b><center><u>Invoice Report</u></center></b></h3>');
		} );
	</script>
</head>
<body style="font-size:12px">

	<table id="example" class="display responsive" style="width:100%; display:none;">
	<thead>
		<tr>
			<th>FY</th>
            <th>Inv No</th>
            <th>Inv Date</th>
            <th>Customer Name</th>
            <th>Item</th>
			<th>Mode</th>
            <th>Total</th>
            <th>Balance</th>
            <th>Due?</th>
            <th>INRTotal?</th>
            <th>INRBalance</th>

		</tr>
    </thead>
    <tbody>
		<?php

		include './Custom/config.php';
		$arr=array();
		$result2= mysqli_query($con,"SELECT * FROM `ip_custom_values` WHERE `custom_values_field` = 9");
		$row2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);
		//echo json_encode($row2);
		$result = mysqli_query($con,"SELECT payment.payment_date,
									CASE WHEN MONTH(inv.invoice_date_created)>=4 
										THEN concat(YEAR(inv.invoice_date_created), '-',YEAR(inv.invoice_date_created)+1) 
										ELSE concat(YEAR(inv.invoice_date_created)-1,'-', YEAR(inv.invoice_date_created)) END 
									AS FY,
									inv.invoice_number as 'Inv No', inv.invoice_date_created as 'Inv Date', clients.client_name as Name,
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
									CASE WHEN amt.invoice_balance>0 AND invoice_date_created <= DATE_SUB(NOW(),INTERVAL 1 SECOND) AND invoice_date_created >= DATE_SUB(NOW(), INTERVAL 61 DAY)
										THEN CONCAT('<p1>DUE-', LPAD(DATEDIFF(NOW(),invoice_date_created),2,'0'),'</p1>')
										ELSE CASE WHEN amt.invoice_balance>0 AND invoice_date_created <= DATE_SUB(NOW(),INTERVAL 61 DAY) AND invoice_date_created >= DATE_SUB(NOW(), INTERVAL 91 DAY)
											 THEN '<p2>DUE_60</p2>'
											 ELSE CASE WHEN amt.invoice_balance>0 AND invoice_date_created <= DATE_SUB(NOW(), INTERVAL 91 DAY)
												  THEN '<p3>DUE_90</p3>'
												  ELSE CONCAT('<p4> PAID(', payment.payment_date,')</p4>')
												  END 
											 END
										END
										AS Outstanding,custom2.invoice_custom_fieldvalue AS mode_of_ship
									FROM `ip_invoices` as inv 
									JOIN ip_invoice_amounts as amt on inv.invoice_id=amt.invoice_id
									JOIN ip_clients as clients on inv.client_id=clients.client_id
									JOIN ip_invoice_custom as custom on inv.invoice_id=custom.invoice_id
                                    JOIN ip_invoice_custom as custom2 on inv.invoice_id=custom2.invoice_id AND custom2.invoice_custom_fieldid=9
									JOIN ip_invoice_items as items on inv.invoice_id=items.invoice_id
									left JOIN ip_custom_values as val on custom.invoice_custom_fieldvalue=val.custom_values_id
                                    LEFT JOIN ip_payments as payment on payment.invoice_id=inv.invoice_id
									WHERE custom.invoice_custom_fieldid=51 or custom.invoice_custom_fieldid=5
									GROUP BY inv.invoice_id");
    	$i=0;
    	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
      	{
		?>
			<tr>
				<td><?php echo $row['FY']?></td>
                <td align="center"><a href="../invoices/view/<?php echo $row['ID']?>" target="_blank"><?php echo $row['Inv No']?></a></td>
                <td align="center"><?php echo $row['Inv Date']?></td>
                <td align="left"><a href="../clients/view/<?php echo $row['CID']?>" target="_blank"><?php echo $row['Name']?></a><br>(<?php echo $row['PONO']?>)</td>
                <td><?php echo $row['Item Name']?></td>
				<td><?php
$mode_ship='';
foreach($row2 as $row3) {
	if($row3['custom_values_id']==$row['mode_of_ship']){
 $mode_ship= $row3['custom_values_value'];
	}
}
if($mode_ship==''){
	echo $row['mode_of_ship'];
}else{
	echo $mode_ship;
}
				?></td>
                <td align="right"><?php echo $row['Currency'].number_format($row['Total'],0)?></td>
                <td align="right"><?php echo $row['Currency'].number_format($row['Balance'],0)?></td>
                <td align="center"><?php echo $row['Outstanding']?></td>
                <td align="right"><?php echo number_format($row['INRTotal'],0)?></td>
                <td align="right"><?php echo number_format($row['INRBalance'],0)?></td>

			</tr>	
		<?php
		}
		mysqli_close($con); 
		?>
		</tbody>
		<tfoot>
			<tr>
				<th>FY</th>
				<th>Inv No</th>
				<th>Inv Date</th>
				<th>Customer Name</th>
				<th>Item</th>
				<th>Mode</th>
				<th>Total</th>
				<th>Balance</th>
				<th>Due?</th>
			        <th>INRTotal?</th>
			        <th>INRBalance</th>

			</tr>
        </tfoot>
	</table>
</body>