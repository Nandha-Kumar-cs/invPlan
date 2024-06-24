<link rel="stylesheet" type="text/css" href="../../Custom/css/jquery.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.0/css/scroller.dataTables.min.css">

 

<script type="text/javascript" language="javascript" src="../../Custom/jq/jquery.dataTables.min.js"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/scroller/2.0.0/js/dataTables.scroller.min.js"></script>

<style type="text/css" class="init">
td.details-control {
	cursor: pointer;
}

tr.shown td.details-control {
	cursor: pointer;
}

input[type=checkbox] {
	visibility: hidden;
	position: relative;
}

div2 {
	position: relative;
	display: inline-block;
}

.deleteMeetingClose {
	font-size: 1.5em;
	cursor: pointer;
	position: absolute;
	right: 10px;
	top: 5px;
}

div1 {
	visibility: hidden;
	width: auto;
	background-color: #FFFFFF;
	color: black;
	text-align: center;
	border-radius: 3px;
	padding: 5px 5px;
	position: absolute;
	z-index: 1;
	top: -5px;
	right: 110%;
	border-style: solid;
}

div1::after {
	content: "";
	position: absolute;
	top: 15%;
	left: 100%;
	margin-top: -5px;
	border-width: 5px;
	border-style: solid;
	border-color: transparent transparent transparent black;
}

</style>

<script type="text/javascript" class="init">

        $(document).ready(function() {

       var dbstate=JSON.parse( localStorage.getItem( 'DataTables_example_/inv/index.php/po/list_po' ) );
				console.log(dbstate);
                 		var col_idx=0;
				if(dbstate!=null){
				        $('#example tfoot th').each( function (){

			                var title = $(this).text();
					var search_text=(dbstate['columns'][col_idx++]['search']['search']);
		                if ((title=='Qty')||(title=='Pending')){}else

			                $(this).html( '<input style="width: 100%;padding: 3px;box-sizing: border-box;" type="text" value="'+search_text+'" placeholder="&#x1F50D; '+title+'" />' );
				 } );}  

        $('#example').show();

        var table = $('#example').DataTable({                          

        "dom": '<"top"if<"dt_title">>t<"clear">',

                deferRender:    true,

                scrollY:        $(window).height()-180,

                scrollCollapse: false,

                scroller:       true,

        "footerCallback": function ( row, data, start, end, display )

                        {

                                var api = this.api(), data;

                                var intVal = function ( i ) {

                                        return typeof i === 'string' ?

                                                i.replace(/[\$,]/g, '')*1 :

                                                typeof i === 'number' ?

                                                        i : 0;

            };

            QtyTotal = api

                .column( 5, { filter: 'applied'} )

                .data()

                .reduce( function (a, b) {

                    return intVal(a) + intVal(b);

                }, 0 );

                         PendingTotal = api

                        .column( 6, { filter: 'applied'} )

                        .data()

                        .reduce( function (a, b) {

                                return intVal(a) + intVal(b);

                        }, 0 );

                         PendingValue = api

                        .column( 9, { filter: 'applied'} )

                        .data()

                        .reduce( function (a, b) {

                                return intVal(a) + intVal(b);

                        }, 0 );

 

                        $( api.column( 5 ).footer() ).html(QtyTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

                         $( api.column( 6 ).footer() ).html(PendingTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

                        $( api.column( 8 ).footer() ).html(PendingValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

 

        },    

                                                        "columnDefs": [

                                                                                        { "width": "6%", "targets": [0,1,2] },

                                                                                        { "width": "20%", "targets": [3] },

                                                                                        { "width": "10%", "targets": [4] },

                                                                                        { "width": "6%", "targets": [5,6],className: 'dt-body-right' },

                                                                                        { "width": "10%", "targets": [7] },

                                                                                        { "targets": [9], "visible":false }

                                                        ],

                                                        "order": [[ 6, "desc" ]],
														stateSave: true,

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

        $("div.dt_title").html('<h3><b><center><u>Purchase Order List</u></center></b></h3>');  

        } );

       

</script>

<table id="example"  class="display" style="width:100%;display:none;">
	<thead>
		<tr>
			<th>Po Date</th>
			<th>Ack No</th>
			<th>Po No(Line No)</th>
			<th>Part Name (Client)</th>
			<th>Part No (Invoice No)</th>
			<th>Qty</th>
			<th>Pending</th>                                                   
			<th>Ex Fac Dt</th>
			<th>Actions</th>
			<th>Pending Value</th>
		</tr>
	</thead>

	<tbody>

    <?php
		$rowno=0;
		$rowidx=0;
		$rowidx1=0;
		include 'Custom/config.php';
		$result = mysqli_query($con, "SELECT  potable.id,potable.PoNo,potable.ackno,user.user_name,potable.customer,potable.mode,
		(SELECT sum(qty) FROM ip_ats where po_id=potable.id)as qty,potable.`podate`, potable.lineno, LEFT(product.product_sku,20) as product_sku,LEFT(product.product_name,40) AS product_name,
		product.inventory_model_id, potable.`quantity`,ifnull(potable.quantity-sum(inv.qty),potable.quantity) AS pending_qty,ifnull(potable.quantity-sum(inv.qty),potable.quantity)*potable.unitprice*(CASE WHEN potable.currency='USD' THEN 70 WHEN potable.currency='EUR' THEN 80 ELSE 1 END) AS pending_value, potable.po_rx_date,GROUP_CONCAT(CONCAT('<a href=','\'https://eybus.xyz/inv/index.php/invoices/view/',invoice.invoice_id,'\' target=\'_blank\'>',invoice.invoice_number,'</a>')) AS inv_link FROM `ip_po`  as potable join `ip_products` product on potable.partid=product.product_id LEFT JOIN ip_inv AS inv ON inv.po_id=potable.id LEFT JOIN ip_users AS user ON user.user_id=potable.user_id LEFT JOIN ip_invoices as invoice ON inv.inv_id=invoice.invoice_id GROUP BY CONCAT(potable.pono,potable.lineno)");

        while ($row = mysqli_fetch_array($result))
			{

                echo '<tr>';
				echo '<td>'.$row["podate"].'</td>';
				echo '<td>'.$row["ackno"].'<br>'.$row["user_name"].'</td>';
				echo '<td>'.$row["PoNo"].'<br>('.$row["lineno"].')</td>';
				echo '<td>'.$row["product_name"].'<br>('.$row["customer"].')</td>';
				echo '<td>'.$row["product_sku"];
			if($row["inv_link"]<>'')
				{
				echo ' <br>('.$row["inv_link"].')</td>';
				}
			else
				{
				echo '</td>';
				}
				echo '<td>'.$row["quantity"].'</td>';
				echo '<td>'.$row["pending_qty"].'</td>';
				echo '<td>'.$row["po_rx_date"].'<br>('.$row["mode"].')</td>';
				echo '<td>';
			if (($row["pending_qty"])>0)
				{
				echo '<a href="add_po?po_id='.$row["PoNo"].'&action=edit" ><img title="Edit" src="../../Custom/images/edit.svg" style="width:1vw;height:3vh;cursor: pointer;" onclick=PoList('.$rowno.',"Edit") ></img></a>
				<a href="add_po?po_id='.$row["PoNo"].'&action=amnd"><img title="Amnd" src="../../Custom/images/po_amnd.svg" style="width:2vw;height:4vh;cursor: pointer;" onclick=PoList('.$rowno.',"Edit") ></img></a>';
				}
				if($row["qty"]!="")     $pending_ats_qty=$row["quantity"]-$row["qty"];
				else $pending_ats_qty=$row["quantity"]; 
								
			if($row["pending_qty"]>0)
				{
				echo '<div2>

																													 <img title="ATS-Ship" src="../../Custom/images/ats.svg" style="width:2vw;height:3vh;cursor: pointer;border: 1px;" onclick=open_ats_modal("'.$pending_ats_qty.'","'.$row["id"].'","'.$rowidx.'") ></img>

                                                                                                     <div1 id="ats_tip_'.$rowidx.'" >

                                                                                                     <span class="deleteMeetingClose" onclick=document.getElementById("ats_tip_'.$rowidx.'").style.visibility="hidden"; ><B>&times;</B></span>

                                                                                                        <table>
	
    <tr>
		<th>ATS Qty</th>
		<th>ATS No</th>
		<th>Notes</th>
		<th>ATS Date</th>
		<th style="width: 160px;"></th>
	</tr>

    <tr>
		<td><input style="width: 60px;" id="ats_qty_'.$rowidx.'" min="0" type="number"></td>
		<td><input style="width: 60px;" id="ats_no_'.$rowidx.'" min="0"  type="text"></td>
		<td style="width: 160px;"><input id="ats_notes_'.$rowidx.'"  type="text"></td>
		<td style="width: 160px;"><input id="ats_date_'.$rowidx.'"  type="date"></td>
		<td><img title="Save" src="../../Custom/images/save.svg" style="width:3vw;height:3vh;cursor: pointer;border: 1px;" onclick=ats_uniq_check("'.$row["id"].'","'.$rowidx.'","'.$row["inventory_model_id"].'") > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</img></td>
	</tr>

                                                                                                        </table>';
$applied="'Applied'";
$result9 = mysqli_query($con, "SELECT count(*) as row_count FROM `ip_ats` WHERE `po_id` =".$row["id"]." AND ats_status=".$applied);
$row9 = mysqli_fetch_array($result9);
$applied_count=$row9["row_count"];

$approved="'Approved'";
$result10 = mysqli_query($con, "SELECT count(*) as row_count FROM `ip_ats` WHERE `po_id` =".$row["id"]." AND ats_status=".$approved);
$row10 = mysqli_fetch_array($result10);
$approved_count=$row10["row_count"];

$shipped="'Shipped'";
$result11 = mysqli_query($con, "SELECT count(*) as row_count FROM `ip_ats` WHERE `po_id` =".$row["id"]." AND ats_status=".$shipped);
$row11 = mysqli_fetch_array($result11);
$shipped_count=$row11["row_count"];

if($applied_count >0){
echo '<h3 style="font-size: 17px;background-color: #FFFFFF;padding: 5px;text-align: left;"> 
ATS Pending List
</h3>';
																										
echo '<table>
																									
	<tr>
		
		<th>ATS No</th>
		<th>Notes</th>
		<th>ATS Qty</th>
		<th style="width: 100px;"></th>
		<th>Action</th>
	</tr>';
	$result6 = mysqli_query($con, "SELECT * FROM `ip_ats` WHERE `po_id` =".$row["id"]);
while($row6 = mysqli_fetch_array($result6))
{
		if($row6["ats_status"]=="Applied"){	
			echo '<tr>
			
				<td><input style="width: 60px;" id="" type="text" value="'.$row6["ats_id"].'" readonly></td>
				<td><input id="" type="text" value="'.$row6["notes"].'" readonly></td>
				<td><input style="width: 60px;" id="" type="number" value="'.$row6["qty"].'" readonly></td>
				<td style="width: 100px;"></td>
				<td>
					<button onclick=approved("'.$row6["ats_no"].'","'.$row["id"].'"); style="background-color: #4CAF50;color: white;border-radius: 2px; border:0px" type="button" title="Approve"><i class="fa fa-check" aria-hidden="true"></i></button>
					<button onclick=reject("'.$row6["ats_no"].'","'.$row["id"].'","'.$row6["qty"].'","'.$row["inventory_model_id"].'"); style="background-color: #B94A48;color: white;border-radius: 2px; border:0px" type="button" title="Reject"><i class="fa fa-times" aria-hidden="true"></i></button>
					<a href="../../Custom/ats/ats.php?ats_id='.$row6["id"].'"><img title="ats" src="../../Custom/images/po_amnd.svg" style="width:2vw;height:4vh;cursor: pointer;"></img></a>
				</td>
				
			</tr>';
		}
}
echo '
</table>';
}

if($approved_count >0){

	
echo '<h3 style="font-size: 17px;background-color: #FFFFFF;padding: 5px;text-align: left;"> 
ATS Approved List
</h3>';
																										
echo '<table>
																									
	<tr>
		
		<th>ATS No</th>
		<th>Notes</th>
		<th>ATS Qty</th>
		<th>Inv No</th>
		<th>Action</th>
	</tr>';
	
	$result7 = mysqli_query($con, "SELECT * FROM `ip_ats` WHERE `po_id` =".$row["id"]);
while($row7 = mysqli_fetch_array($result7))
{
		if($row7["ats_status"]=="Approved"){	
			echo '<tr>
			
				<td><input style="width: 60px;" id="" type="text" value="'.$row7["ats_no"].'" readonly></td>
				<td><input id="" type="text" value="'.$row7["notes"].'" readonly></td>
				<td><input style="width: 60px;" id="quantity" type="number" value="'.$row7["qty"].'" readonly></td>
				<td><input style="width: 100px;" id="inv_no_'.$rowidx1.'" type="text" list="invnolist1_'.$rowidx1.'"><datalist  style="height:26px;font-size:20px;" id="invnolist1_'.$rowidx1.'" >';
			$sql3 =mysqli_query($con,"SELECT `invoice_id`,`invoice_number`,`invoice_date_due`,`invoice_date_created` FROM `ip_invoices`");
			while ($row13 = mysqli_fetch_array($sql3))
				{
					$time=strtotime($row13["invoice_date_created"]);
					$month=date("m",$time);
					$year=date("Y",$time);
					$fin_yr="";
					if($month<04) $fin_yr=($year-1)."-".$year;
					else $fin_yr=$year."-".($year+1);
					echo "<option data-value='".$row13['invoice_id']."' value='".$row13['invoice_number']." (".$fin_yr.")'>";
				}
				echo    '</datalist>
				</td>
				<td>
					<button onclick=shipped("'.$row7["ats_no"].'","'.$row["id"].'","'.$rowidx1.'","'.$row7["qty"].'","'.$row["inventory_model_id"].'","'.$row["ackno"].'"); style="background-color: #f78c00;color: white;border-radius: 2px; border:0px" type="button" title="Ship"><i class="fa fa-truck" aria-hidden="true"></i></button>
					<a href="../../Custom/ats/ats.php?ats_id='.$row7["id"].'"><img title="ats" src="../../Custom/images/po_amnd.svg" style="width:2vw;height:4vh;cursor: pointer;"></img></a>
				</td>
				
			</tr>';
		}
	$rowidx1++;
}

echo '
</table>';
}

if($shipped_count >0){

echo '<h3 style="font-size: 17px;background-color: #FFFFFF;padding: 5px;text-align: left;"> 
ATS Shipped List
</h3>';
																										
echo '<table>
																									
	<tr>
		
		<th>ATS No</th>
		<th>Notes</th>
		<th>ATS Qty</th>
		<th style="width: 160px;"></th>
	</tr>';
	$result8 = mysqli_query($con, "SELECT * FROM `ip_ats` WHERE `po_id` =".$row["id"]);
while($row8 = mysqli_fetch_array($result8))
{
		if($row8["ats_status"]=="Shipped"){	
			echo '<tr>
			
				<td><input style="width: 60px;" id="" type="text" value="'.$row8["ats_no"].'" readonly></td>
				<td><input id="" type="text" value="'.$row8["notes"].'" readonly></td>
				<td><input style="width: 60px;" id="" type="number" value="'.$row8["qty"].'" readonly></td>

				<td style="width: 160px;"><a href="../../Custom/ats/ats.php?ats_id='.$row6["id"].'"><img title="ats" src="../../Custom/images/po_amnd.svg" style="width:2vw;height:4vh;cursor: pointer;"></img></a></td>
				
			</tr>';
		}
}
echo '
</table>';
}
echo '</div1>
</div2>';
 }
/* if (($row["quantity"]-$row["qty"])>0)
 {
	 $pending_inv_qty=($row["quantity"]-$row["qty"]);
	 echo '<div2>
	 <img title="Ship" src="../../Custom/images/shipped.svg" style="width:2vw;height:3vh;cursor: pointer;" onclick=open_inv_modal("'.$pending_inv_qty.'","'.$row["id"].'","'.$rowidx.'") ></img>

<div1 id="tip_'.$rowidx.'" >
	<span class="deleteMeetingClose" onclick=document.getElementById("tip_'.$rowidx.'").style.visibility="hidden"; ><B>&times;</B></span>
	<table>
		<tr>
			<th>Inv Qty</th>
			<th>Inv No</th>
			<th></th>
		</tr>
		<tr>
			<td><input id="inv_qty_'.$rowidx.'"  min="0"  type="number"></td>
			<td><input id="inv_no_'.$rowidx.'" type="text" list="invnolist_'.$rowidx.'"><datalist  style="height:26px;font-size:20px;" id="invnolist_'.$rowidx.'" >';
			$sql2 =mysqli_query($con,"SELECT `invoice_id`,`invoice_number`,`invoice_date_due`,`invoice_date_created` FROM `ip_invoices`");
			while ($row2 = mysqli_fetch_array($sql2))
				{
					$time=strtotime($row2["invoice_date_created"]);
					$month=date("m",$time);
					$year=date("Y",$time);
					$fin_yr="";
					if($month<04) $fin_yr=($year-1)."-".$year;
					else $fin_yr=$year."-".($year+1);
					echo "<option data-value='".$row2['invoice_id']."' value='".$row2['invoice_number']." (".$fin_yr.")'>";
				}
				echo    '</datalist>
				</td>
				<td>
					<img title="Save" src="../../Custom/images/save.svg" style="width:3vw;height:3vh;cursor: pointer;" onclick=save_inv("'.$row["id"].'","'.$rowidx.'") >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</img>
				</td>
			</tr>
		</table>      
		</div1>
		</div2>';
																									 }*/

                                                                     

                                                                echo '</td>';

                                                                echo '<td>'.$row["pending_value"].'</td>';

                                                                $rowno++;                              

                                                                $rowidx++;

                                                }

                                                mysqli_close($con);

                                ?>

    </tbody>

	<tfoot>
		<tr>
			<th>Po Date</th>
			<th>Ack No</th>
			<th>Po No</th>
			<th>Part Name</th>
			<th>Part No</th>
			<th>Qty</th>
			<th>Pending</th>
			<th>Ex Fac Date</th>
			<th>Actions</th>
			<th>Pending Value</th>
		</tr>
	</tfoot>
</table>

<script>

function approved(ats_no,po_id){
	
	
	var postdata="ats_no="+ats_no+"&po_id="+po_id;
					$.ajax({
						url : "../../Custom/ats_status_update.php",
						type: "POST",
						data :postdata,
						success: function(data,status,xhr)
						{
							if(data=="1"){
							alert("ATS Approved Successfully...");
							location.reload();
							}
							else{
							alert("ATS Not Approved...");	
							}
						}	
	
	//window.location.href='../../Custom/ats_status_update.php?ats_no='+ats_no+'&po_id='+po_id+'&ats_status=Approved';
});
}
function shipped(ats_no,po_id,rowno,qty,model_id,ackno){
			
			var shownVal=document.getElementById("inv_no_"+rowno).value;
			var inv_no="";
			try

                {
					inv_no=document.querySelector("#invnolist1_"+rowno+" option[value='"+shownVal+"']").dataset.value;
					//alert(qty);

                }
			catch(e){}
			
			if(inv_no!="")
			{
				if((parseInt(qty)<=0)) alert("Invalid Invoice Quantity...");
				
				else
				{
					var postdata="id="+po_id+"&inv_no="+inv_no+"&qty="+qty+"&ats_no="+ats_no+"&po_id="+po_id+"&inventory_model_id="+model_id;
					$.ajax({
						url : "../../Custom/add_inv.php",
						type: "POST",
						data :postdata,
						success: function(data,status,xhr)
						{
							//document.getElementById("tip_"+rowno).style.visibility="hidden";
							alert("Invoice Added Successfully...");
							
							
				if(model_id!=0){

					window.location.href="https://magdyn.in/inv3/Custom/ats_shipment.php?inventory_model_id="+model_id+"&Qty="+qty+"&ats_no="+ats_no+"&ackno="+ackno+"&inv_no="+inv_no;
				//window.location.href='../../Custom/ats_status_update.php?ats_no='+ats_no+'&po_id='+po_id+'&inventory_model_id='+model_id+'&qty='+qty+'&inv_no='+inv_no+'&ackno='+ackno+'&ats_status=Shipped';
				
				alert("ATS Shipped Successfully...");
				}else{
				alert("Inventory Product Not Found......");
				location.reload();
				}
						}

                                                                });

                                }
								
				

            }

                else alert("Pls Enter Invoice No...");
				
	
}

function reject(ats_no,po_id,qty,model_id){
	
	var postdata="qty="+qty+"&ats_no="+ats_no+"&po_id="+po_id+"&inventory_model_id="+model_id;
					$.ajax({
						url : "../../Custom/reject_ats.php",
						type: "POST",
						data :postdata,
						success: function(data,status,xhr)
						{
							//document.getElementById("tip_"+rowno).style.visibility="hidden";
							alert("ATS Rejected Successfully...");
							
							
				if(model_id!=0){

					window.location.href="https://magdyn.in/inv3/Custom/ats_reject.php?inventory_model_id="+model_id+"&Qty="+qty+"&ats_no="+ats_no;
				//window.location.href='../../Custom/ats_status_update.php?ats_no='+ats_no+'&po_id='+po_id+'&inventory_model_id='+model_id+'&qty='+qty+'&inv_no='+inv_no+'&ackno='+ackno+'&ats_status=Shipped';
				//alert("ATS Rejected Successfully...");
				}else{
				alert("Inventory Product Not Found......");
				location.reload();
				}
						}
						});
}

/*function remove(ats_no,po_id){
	alert("ATS Deleted Successfully...");
	window.location.href='../../Custom/ats_status_update.php?ats_no='+ats_no+'&po_id='+po_id+'&ats_status=Delete';
}*/

function ats_uniq_check(poid,rowno,model_id)

        {

                        var atsno=document.getElementById("ats_no_"+rowno).value;

                        $.ajax({

                                                url : "../../Custom/check_ats.php",

                                                type: "POST",

                                                data :"atsno="+atsno,

                                                success: function(data,status,xhr)

                                                                {

                                                                        if(data==1)

                                                                        {

                                                                                        alert("Duplicate ATS No...");

                                                                                        document.getElementById("ats_no_"+rowno).value="";

                                                                        }

                                                                        else

                                                                        {

                                                                                        save_ats(poid,rowno,model_id);

                                                                        }

                                                                }

                                        });

        }

var opened_popup="";

/*function open_inv_modal(qty,id,rowno)

{              

                var x = document.getElementById("tip_"+rowno);

                          if (window.getComputedStyle(x).visibility == "visible")

                          {                   

                                        opened_popup="";

                                        document.getElementById("tip_"+rowno).style.visibility="hidden";

                          }

                          else

                          {       

                                        if(opened_popup!="") document.getElementById(opened_popup).style.visibility="hidden";

                                        opened_popup="tip_"+rowno;

                                        inv_po_id=id;         

                                        document.getElementById("inv_no_"+rowno).value="";

                                        document.getElementById("inv_qty_"+rowno).value=qty;                  

                                        document.getElementById("tip_"+rowno).style.visibility="visible";

                                        document.getElementById("inv_qty_"+rowno).max=qty;

                                        max_inv_qty=qty;

                          }

        }*/

var ats_po_id="";

var inv_po_id="";

var max_ats_qty=0;

var max_inv_qty=0;

function open_ats_modal(qty,id,rowno)

        {

                 var x = document.getElementById("ats_tip_"+rowno);

 

                  if (window.getComputedStyle(x).visibility == "visible")

                  {                   

                                opened_popup="";

                                document.getElementById("ats_tip_"+rowno).style.visibility="hidden";

                  }

                  else

                  {

                                if(opened_popup!="") document.getElementById(opened_popup).style.visibility="hidden";

                                opened_popup="ats_tip_"+rowno;

                                ats_po_id=id;    

                                document.getElementById("ats_no_"+rowno).value="";

                                document.getElementById("ats_qty_"+rowno).value=qty;                  

                                document.getElementById("ats_tip_"+rowno).style.visibility="visible";

                                document.getElementById("ats_qty_"+rowno).max=qty;

                                max_ats_qty=qty;

                  }

        }

function save_inv(poid,rowno)

        {
			var qty=document.getElementById("inv_qty_"+rowno).value;
			var shownVal=document.getElementById("inv_no_"+rowno).value;
			var inv_no="";
			try

                {
					inv_no=document.querySelector("#invnolist_"+rowno+" option[value='"+shownVal+"']").dataset.value;

                }
			catch(e){}
			
			if(inv_no!="")
			{
				if((parseInt(qty)>parseInt(max_inv_qty)) || (parseInt(qty)<=0)) alert("Invalid Invoice Quantity...");
				
				else
				{
					var postdata="id="+poid+"&inv_no="+inv_no+"&qty="+qty;
					$.ajax({
						url : "../../Custom/add_inv.php",
						type: "POST",
						data :postdata,
						success: function(data,status,xhr)
						{
							document.getElementById("tip_"+rowno).style.visibility="hidden";
							alert("Invoice Added Successfully...");
                            location.reload();

                                                                                        }

                                                                });

                     }

                }

                else alert("Pls Enter Invoice No...");

        }

function save_ats(poid,rowno,model_id)

        {
			var qty=document.getElementById("ats_qty_"+rowno).value;
			var ats_no=document.getElementById("ats_no_"+rowno).value;
			var ats_notes=document.getElementById("ats_notes_"+rowno).value;
			var ats_date=document.getElementById("ats_date_"+rowno).value;

			if(ats_no!="")
			{
				if((parseInt(qty)>parseInt(max_ats_qty)) || (parseInt(qty)<=0)) alert("Invalid ATS Quantity...");

                else
				{ 
					var postdata="id="+poid+"&ats_no="+ats_no+"&qty="+qty+"&ats_notes="+ats_notes+"&model_id="+model_id+"&ats_date="+ats_date;
					console.log(postdata);
					$.ajax({
						url : "../../Custom/add_ats.php",
						type: "POST",
						data :postdata,
						success: function(data,status,xhr)
						{
							if(data=="Ok"){
							document.getElementById("ats_tip_"+rowno).style.visibility="hidden";
							alert("ATS Added Successfully...");
							//location.reload();
							if(model_id!=0)
							{
								window.location.href='https://magdyn.in/inv3/Custom/ats_applied.php?inventory_model_id='+model_id+'&Qty='+qty+'&ats_no='+ats_no;
							}
							else
							{
								alert("Inventory Product Not Found...");
								location.reload();
							}
							
							}
							else{
								alert(data);
							}
						}
							
							});
				

                }
		
				
			}

                else alert("Pls Enter ATS No...");
				
		

        }

</script>

 

