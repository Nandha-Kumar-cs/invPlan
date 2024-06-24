<input type="hidden" name="<?php echo $this->config->item('csrf_token_name'); ?>"
value="<?php echo $this->security->get_csrf_hash() ?>">
<head>

	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/scroller/2.0.0/js/dataTables.scroller.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.0/css/scroller.dataTables.min.css">
<style type="text/css" class="init">
		tfoot input {
			width: 100%;
			padding: 3px;
			box-sizing: border-box;
		}
</style>
<script type="text/javascript" class="init">

        $(document).ready(function() {
        $('#example tfoot th').each( function () {
                var title = $(this).text();
		if ((title=='Options')){$(this).html('');}else
                $(this).html( '<input type="text" placeholder="&#x1F50D; '+title+'" />' );
        } );
	$('#example').show();
        var table = $('#example').DataTable({				
			"dom": '<"top"i<"dt_title">>t<"bottom"><"clear">',
				
	        deferRender:    true,
        	scrollY:        $(window).height()-175,
	        scrollCollapse: true,
        	scroller:       true,
			"columnDefs": [
    			{ "width": "10%", "targets": [0,1] },
    			{ "width": "30%", "targets": [2,3] }

  			]
			
			});
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
	$("div.dt_title").html('<h3><b><center><u>Product List</u></center></b>  <div class="headerbar-item pull-right" style="margin-top:-4.5vh; margin-right:2vw;">  <a class="btn btn-sm btn-primary" href=<?php echo site_url("products/form"); ?>><i class="fa fa-plus"></i>New</a></div></h3>');	
        } );
		
</script>
</head>
<body>

    
<table  id="example" class="display responsive" style="display:none;width:100%;">
            <thead>
            <tr>
                <th>Family</th>
                <th>SKU</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Price</th>
                <th>Unit</th>
                <th>Tax_rate</th>
				<th>Model&nbsp;Id</th>
                <th>Options</th>
            </tr>
			

            <tbody>
			
			  <?php
                                $rowno=0;
								$rowidx=0;
                                include 'Custom/config.php';

                                $result = mysqli_query($con, "SELECT `product_id`, `product_sku`,`family_name`, LEFT(`product_name`,15) as prod_name, LEFT(`product_description`,15) as prod_desc, `product_price`, `purchase_price`, `provider_name`, `unit_name`,`product_tariff`,`tax_rate_name`,`inventory_model_id` FROM `ip_products` as product left join `ip_families` family ON family.family_id=product.family_id left join `ip_tax_rates` tax ON tax.tax_rate_id=product.tax_rate_id left join `ip_units` unit On unit.unit_id=product.unit_id");
                                while ($row = mysqli_fetch_array($result))
								{
									echo '<tr>';
									echo '<td>'.$row["family_name"].'</td>';
									echo '<td>'.$row["product_sku"].'</td>';
									echo '<td><a href="https://magdyn.in/inv3/inventory/inventory_edit.php?intInventoryModelId='.$row["inventory_model_id"].'">'.$row["prod_name"].'</a></td>';
									echo '<td>'.$row["prod_desc"].'</td>';
									echo '<td align="right">'.$row["product_price"].'</td>';
									echo '<td>'.$row["unit_name"].'</td>';
									echo '<td>'.$row["tax_rate_name"].'</td>';
									echo '<td><a href="https://magdyn.in/inv3/inventory/inventory_edit.php?intInventoryModelId='.$row["inventory_model_id"].'">'.$row["inventory_model_id"].'</a></td>';
									echo '<td>
									<div style="width:35%;">
									<div style="float: left; width: 25%;margin-top:0.7vh"> 
												<a href="products/form/'.$row["product_id"].'"  title="Edit">
													<i class="fa fa-edit fa-margin"></i> 
												</a>
									</div>
                                       ';?>
										<div style="float: right; width: 25%"> 		
										<form action='products/delete/<?php echo $row["product_id"]; ?>'
                                          method="POST">
                                        <?php _csrf_field(); ?>
                                        <button type="submit" class="dropdown-button"
                                                onclick="return confirm('<?php _trans('delete_record_warning'); ?>');">
                                           <a title="Delete" ><i class="fa fa-trash-o fa-margin"></i></a>
                                        </button>
                                    </form>
									</div>
									</div>
									<?php 
									echo '</td>';
									
									
									echo '</tr>';
									
									
								}
                      ?>
			
            </tbody>
<tfoot>

                <th>Family</th>
                <th>SKU</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Price</th>
                <th>Product Unit</th>
                <th>Tax_rate</th>
				<th>Model&nbsp;Id</th>
                <th>Options</th>
           
</tfoot>
        </table>

</body>