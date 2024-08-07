<!-- Feat Pagalaven -->

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Duties</title>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

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
        .hidden-sidebar{
            overflow: hidden;
        }
        .ellipsis {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .ui-tooltip {
            max-width: 300px;
        }
</style>
</head>
<body>

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
            { "width": "14.28%", "targets": "_all" } // Set width for all columns equally
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
	$("div.dt_title").html('<h3 style="text-align:center"><b><u>Duties Slip List</u></b>  </h3>');	
        } );
		
</script>

<style>
    th{
        text-align: center;
    }
</style>
    
<table  style="width: 100%;display:none" id="example">
    <thead>
    <th>Dutie No</th>
        <th>Company Name</th>
        <th>Customer Name</th>
        <th>Reporting Adress</th>
        <th>Trip Date</th>
        <th>Booked By</th>
        <th >Option</th>
    </thead>
    <tbody>
      
    <?php foreach ($duties as $duty): ?>
        <tr style="text-align: center;">
        <td><?php echo htmlspecialchars($duty->duty_no); ?></td>
                <td><?php echo htmlspecialchars($duty->comp_name); ?></td>
                <td class="ellipsis" title="<?php echo htmlspecialchars($duty->salutination . ' ' . $duty->cust_name); ?>">
                    <?php echo strlen($duty->salutination . ' ' . $duty->cust_name) > 25 ? substr($duty->salutination . ' ' . $duty->cust_name, 0, 25) . '...' : $duty->salutination . ' ' . $duty->cust_name; ?>
                </td>
                <td class="ellipsis" title="<?php echo htmlspecialchars($duty->reporting_address); ?>">
                    <?php echo strlen($duty->reporting_address) > 25 ? substr($duty->reporting_address, 0, 25) . '...' : $duty->reporting_address; ?>
                </td>
                <td><?php echo htmlspecialchars($duty->trip_date); ?></td>
                <td><?php echo htmlspecialchars($duty->booked_by); ?></td>
<td>
    <a href="<?=site_url('duties/edit_duty/').$duty->id?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 20px;"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg></a>
     <a href="<?=site_url('duties/pdfgen/').$duty->id?>" target="_blank"> <svg xmlns="http://www.w3.org/2000/svg"  style="width: 20px;" viewBox="0 0 512 512"><path d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z"/></svg>
     <a href="<?=site_url('duties/delt_duty/').$duty->id?>"  onclick="return confirmDelete()"><svg xmlns="http://www.w3.org/2000/svg" style="width: 20px;" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></a>
</a></td>
</tr>
        <?php endforeach ?>
    </tbody>
    <tfoot>
    <th>Dutie No</th>
    <th>Company Name</th>
        <th>Customer Name</th>
        <th>Reporting Adress</th>
        <th>Trip Date</th>
        <th>Booked By</th>
        <th >Option</th>
    </tfoot>
</table>

<script>
    function confirmDelete() {
    return confirm('Are you sure you want to delete this record?');
}
</script>
</body>
</html>

