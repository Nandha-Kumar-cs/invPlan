<link rel="stylesheet" type="text/css" href="../../Custom/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.0/css/scroller.dataTables.min.css">
<script type="text/javascript" language="javascript" src="../../Custom/jq/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/scroller/2.0.0/js/dataTables.scroller.min.js"></script>

<style type="text/css" class="init">
td.details-control
{
	cursor: pointer;
}

tr.shown td.details-control
{
	cursor: pointer;
}

input[type=checkbox]
{
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
	top: 7%;
	left: 100%;
	margin-top: -5px;
	border-width: 12px;
	border-style: solid;
	border-color: transparent transparent transparent black;
}
td.details-control{cursor:pointer}tr.shown td.details-control{cursor:pointer}input[type=checkbox]{visibility:hidden;position:relative}div2{position:relative;display:inline-block}.deleteMeetingClose{font-size:1.5em;cursor:pointer;position:absolute;right:10px;top:5px}div1{visibility:hidden;width:auto;background-color:#fff;color:#000;text-align:center;border-radius:3px;padding:5px 5px;position:absolute;z-index:1;top:-5px;right:110%;border-style:solid}div1::after{content:"";position:absolute;top:7%;left:100%;margin-top:-5px;border-width:12px;border-style:solid;border-color:transparent transparent transparent #000}.popup{background-color:#fff;border:1px solid #ccc;padding:60px}iframe{width:1500%;height:1000%;border:none}.dropdown{position:relative;display:inline-block}.dropbtn{background-color:transparent;border:none;cursor:pointer;padding:0}.dropdown-content{display:none;position:absolute;background-color:#f9f9f9;min-width:160px;box-shadow:0 8px 16px 0 rgba(0,0,0,.2);z-index:1}.dropdown-content a{color:#000;padding:12px 16px;text-decoration:none;display:block}.dropdown-content a:hover{background-color:#f1f1f1}.dropdown:hover .dropdown-content{display:block}.dropdown:hover .dropbtn{background-color:#ddd}
.dropbtn{
width: 300%;
}
.dropdown-content{
	margin-left: -930% !important;
}


</style>
<script type="text/javascript" class="init">
    $(document).ready(function() {
        $("#example tfoot th").each(function() {
            var t = $(this).text();
            $(this).html('<input class="search" style="width: 100%;padding: 3px;box-sizing: border-box;" type="text" placeholder="&#x1F50D; ' + t + '" />')
        }), $("#example").show(), $("#example").DataTable({
            dom: '<"top"if<"dt_title">>t<"clear">',
            deferRender: !0,
            scrollY: $(window).height() - 195,
            scrollCollapse: !1,
            scroller: !0,
            columnDefs: [{
                width: "10%",
                targets: [0]
            }, {
                width: "10%",
                targets: [1]
            }, {
                width: "20%",
                targets: [2]
            }, {
                width: "10%",
                targets: [3]
            }, {
                width: "10%",
                targets: [4]
            }, {
                width: "4%",
                targets: [5]
            }, {
                width: "4%",
                targets: [6]
            }, {
                width: "7%",
                targets: [7]
            }, {
                width: "10%",
                targets: [8]
            }, {
                width: "10%",
                targets: [9]
            }, {
                width: "10%",
                targets: [10]
            }],
            order: [
                [9, "desc"],
                [7, "desc"],
                [1, "desc"]
            ]
        }).columns().every(function() {
            var t = this;
            $(".search", this.footer()).on("keyup change", function() {
                t.search() !== this.value && t.search(this.value).draw()
            })
        }), $("div.dt_title").html("<h3><b><center><u>ATS List</u></center></b></h3>")
    })
</script>
<div id="hidden_area">
<table id="example"  class="display" style="width:100%;display:none;">
	<thead>
		<tr>
			<th>PoNo</th>
			<th>Delivery Date</th>
			<th>Part Name</th>
			<th>Part No</th>
			<th>Line No</th>
			<th>ATS No</th>
			<th>Qty PO(INV)</th>
			<th>Progress</th>
			<th>Notes</th>
			<th>Status</th>
			<th>Option</th>
		</tr>
	</thead>
	<tbody>
	<?php
	 include 'Custom/config.php';
	 $rowidx=0;
	 $rowidx1=0;
	 $rowidx2=0;
	 $rowidx3=0;
	 $value=file_get_contents("https://inventory.magdyn.in/Custom/product_model_id_qty.php");
	 //print_r (explode(";",$value));
     $exp_value=explode(";",$value);
	 foreach ($exp_value as $k) { 
		$act_value=explode(":",$k);
		
	 }
	 $query = mysqli_query($con,"SELECT ip_po.pono, ip_clients.client_name , ip_po.customer FROM ip_clients RIGHT JOIN ip_po ON ip_clients.client_name = ip_po.customer ORDER BY ip_po.pono");
	 
	 $result = mysqli_query($con, "SELECT 
	 potable.id,
	 potable.PoNo,
	 CASE WHEN ats.poid IS NOT NULL THEN 1 ELSE 0 END AS PoNoExistsInNewTable,
	 ats.poid,
	 ats.uploaded AS checkupload,
	 ats.parameter,
	 potable.magdyn_commited_date,
	 potable.ackno,
	 ipats.ats_status,
	 ipats.id AS ipatsid,
	 user.user_name,
	 potable.customer,
	 potable.mode,
	 product.temp_path,
	 product.formtemplate,
	 COALESCE(ats_qty.qty, 0) as qty,
	 potable.podate,
	 potable.lineno,
	 LEFT(product.product_sku, 20) as product_sku,
	 LEFT(product.product_name, 40) AS product_name,
	 product.inventory_model_id,
	 potable.quantity,
	 COALESCE(potable.quantity - COALESCE(inv.qty, 0), potable.quantity) AS pending_qty,
	 COALESCE(potable.quantity - COALESCE(inv.qty, 0), potable.quantity) * potable.unitprice *
	 (CASE WHEN potable.currency = 'USD' THEN 70 WHEN potable.currency = 'EUR' THEN 80 ELSE 1 END) AS pending_value,
	 potable.po_rx_date,
	 GROUP_CONCAT(CONCAT('<a href=\'https://magdyn.com/inv/index.php/invoices/view/', invoice.invoice_id, '\' target=\'_blank\'>', invoice.invoice_number, '</a>')) AS inv_link
 FROM 
	 ip_po AS potable
 JOIN 
	 ip_products AS product ON potable.partid = product.product_id
 LEFT JOIN 
	 (SELECT po_id, SUM(qty) as qty FROM ip_ats GROUP BY po_id) as ats_qty ON ats_qty.po_id = potable.id
 LEFT JOIN 
	 ip_inv AS inv ON inv.po_id = potable.id
 LEFT JOIN 
	 ip_users AS user ON user.user_id = potable.user_id
 LEFT JOIN 
	 ip_invoices AS invoice ON inv.inv_id = invoice.invoice_id
 LEFT JOIN 
	 ats_data AS ats ON potable.id = ats.poid
 LEFT JOIN
     ip_ats as ipats ON  potable.id = ipats.po_id	 

	 WHERE 
	 product.inventory_model_id != 0 
 GROUP BY 
	 potable.PoNo, potable.lineno;
 ");

/*$result = mysqli_query($con, "SELECT  			potable.id,potable.PoNo,potable.magdyn_commited_date,potable.ackno,user.user_name,potable.customer,potable.mode,
(SELECT sum(qty) FROM ip_ats where po_id=potable.id)as qty,potable.`podate`, potable.lineno, LEFT(product.product_sku,20) as product_sku,LEFT(product.product_name,40) AS product_name,
product.inventory_model_id, potable.`quantity`,ifnull(potable.quantity-sum(inv.qty),potable.quantity) AS pending_qty,ifnull(potable.quantity-sum(inv.qty),potable.quantity)*potable.unitprice*(CASE WHEN potable.currency='USD' THEN 70 WHEN potable.currency='EUR' THEN 80 ELSE 1 END) AS pending_value, potable.po_rx_date,GROUP_CONCAT(CONCAT('<a href=','\'https://magdyn.com/inv/index.php/invoices/view/',invoice.invoice_id,'\' target=\'_blank\'>',invoice.invoice_number,'</a>')) AS inv_link FROM `ip_po`  as potable join `ip_products` product on potable.partid=product.product_id LEFT JOIN ip_inv AS inv ON inv.po_id=potable.id LEFT JOIN ip_users AS user ON user.user_id=potable.user_id LEFT JOIN ip_invoices as invoice ON inv.inv_id=invoice.invoice_id WHERE product.inventory_model_id!=0  GROUP BY CONCAT(potable.pono,potable.lineno)");
*/

 $x= 0;
        while ($row = mysqli_fetch_array($result))
			{
				if($row["qty"]!="")     $pending_ats_qty=$row["quantity"]-$row["qty"];
				else $pending_ats_qty=$row["quantity"]; 
				$value_check=0;
				$inv_qty='';
				foreach ($exp_value as $k) { 
					$act_value=explode(":",$k);
					if($act_value[0]==$row["inventory_model_id"]){
						
						$value_check=1;
						$inv_qty=$act_value[1];
						
					}
					
				 }
				
				 if($pending_ats_qty>0 && $inv_qty!=''  ){
				 $progress=(float)((float)$inv_qty/(float)$pending_ats_qty)*100;
				 $progress=round($progress, 2);
				 if($progress>100) $progress=100;
				 $x++;
?>			<tr>
				<td><?php echo $row["PoNo"];?> - <?php echo $row["lineno"];?></td>
				<td><?php echo $row["magdyn_commited_date"];?></td>
				<td><?php echo $row["product_name"];?></td>
				<td><?php echo $row["product_sku"];?></td>
				<td><?php echo $row["lineno"];?></td>
				<td></td>
				<td><?php echo $pending_ats_qty."(".$inv_qty.")";?></td>
				<td><?php echo $progress.'%';?></td>
				<td></td>
				<td>1. Enter ATS Data</td>
				<td><?php
			
			$text = $row['product_name'];
		
			$data2 = str_replace('"', ' ', $text);
			$product_name = str_replace('"', ' ', $text);

			$poid = $row["id"];
			$data2 = urlencode($text);

			$text2 = $row['product_sku'];


			$text8 = $row['product_sku'];

			// Replace spaces with hyphens
			$product_sku = str_replace(' ', '-', $text8);
			

			$data3 = urlencode($text2);

			$text3 = $row['customer'];

			$data4 = urlencode($text3);

			$pono = $row["PoNo"];

			$lineno = $row["lineno"];

			$qty = $pending_ats_qty;
			$urlEncodedProductName = urlencode( $row['product_name']);
			
	 ?> <?php
																												$parameter = $row["parameter"] ;
																												$data = json_decode($parameter, true);
																											 if($row['formtemplate'] != NULL){

																													 
																													 echo '<div> 
																													 <a href="' . site_url("po/tempdata/" . $row["id"] . "/" . $row["PoNo"] ."/". $pending_ats_qty . "/" . $inv_qty ."/". 0) . '">
																															 <img title="Input_ATS_data" src="../../Custom/images/ats.svg" style="width:2vw;height:3vh;cursor: pointer;border: 1px;" >
																														 </a>
																													 </div>';


																												
																												}else{
																												?> <?php echo'	<div2> 
																												 <img title="ATS-Ship" src="../../Custom/images/ats.svg" style="width:2vw;height:3vh;cursor: pointer;border: 1px;" onclick=open_ats_modal1("'.$pending_ats_qty.'","'.$row["id"].'","'.$rowidx2.'") ></img>
																												  <div1 id="ats_tip_1'.$rowidx2.'" >

                                                                                                     <span class="deleteMeetingClose" onclick=document.getElementById("ats_tip_1'.$rowidx2.'").style.visibility="hidden"; ><B>&times;</B></span>';

echo '<h3 style="font-size: 13px;background-color: #FFFFFF;padding: 5px;text-align: left;"> 
ATS Apply<BR><BR>'; echo $row["PoNo"].','.$row["product_name"];
echo'</h3>                                                                                                        <table>
	
    <tr>
		<th>ATS Qty</th>
		<th>ATS No</th>
		<th>Notes</th>
		<th style="width: 160px;"></th>
	</tr>

    <tr>
		<td><input style="width: 60px;" id="ats_qty_'.$rowidx2.'" min="0" type="number"></td>
		<td><input style="width: 60px;" id="ats_no_'.$rowidx2.'" min="0"  type="text"></td>
		<td style="width: 160px;"><input id="ats_notes_'.$rowidx2.'"  type="text"></td>
		<td><img id="apply_btn_'.$rowidx2.'" title="Save" src="../../Custom/images/save.svg" style="width:3vw;height:3vh;cursor: pointer;border: 1px;" onclick=ats_uniq_check("'.$row["id"].'","'.$rowidx2.'","'.$row["inventory_model_id"].'") > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</img></td>
	</tr>

                                                                                                        </table>';
				
				?></td>				
			</tr>
<?php		
			}}
			$rowidx2++;
			}



		
				   $result3 = mysqli_query($con, "SELECT atstab.id,
				   potab.id as poid,
		        	potab.PoNo,
				   atstab.qty,
				   atstab.notes,
				   atstab.ats_no,
				   potab.lineno,
				   atstab.ats_status,
				   CASE WHEN ats.poid IS NOT NULL THEN 1 ELSE 0 END AS PoNoExistsInNewTable,
       			   ats.poid,
       			   ats.uploaded AS checkupload,
       			   ats.parameter,
				   atstab.po_id,
				   atstab.id AS ipatsid,
				   potab.pono,
				   potab.magdyn_commited_date,
				   product.inventory_model_id,
				   potab.customer,
        			potab.mode,
        			product.temp_path,
        			product.formtemplate,
        			COALESCE(ats_qty.qty, 0) as atssqty,
        			potab.podate,
        			potab.lineno,
				   LEFT(product.product_sku,20) as product_sku,
				   LEFT(product.product_name,40) AS product_name,
				   product.inventory_model_id,
			       potab.quantity
				 
				    FROM `ip_ats` atstab
					
				    LEFT JOIN 
					ip_po potab ON atstab.po_id=potab.id
					LEFT JOIN 
			        (SELECT po_id, SUM(qty) as qty FROM ip_ats GROUP BY po_id) as ats_qty ON ats_qty.po_id = potab.id
				
					LEFT JOIN 
		        	ats_data AS ats ON potab.id = ats.poid and atstab.id =ats.atsid
					LEFT join 
					ip_products product on potab.partid=product.product_id 
					
				WHERE atstab.ats_status = 'To Apply' AND atstab.ats_status IS NOT NULL;");
				   while ($row3 = mysqli_fetch_array($result3))
				   {


					if($row3["atssqty"]!="")     $pending_ats_qty=$row3["quantity"]-$row3["atssqty"];
					else $pending_ats_qty=$row3["quantity"]; 
					$value_check=0;
					$inv_qty='';
					foreach ($exp_value as $k) { 
						$act_value=explode(":",$k);
						if($act_value[0]==$row3["inventory_model_id"]){
							
							$value_check=1;
							$inv_qty=$act_value[1];
							
						}
						
					 }
					
					 if($pending_ats_qty>0 && $inv_qty!=''  ){
					 $progress=(float)((float)$inv_qty/(float)$pending_ats_qty)*100;
					 $progress=round($progress, 2);
					 if($progress>100) $progress=100;
					 $x++;


					 $text = $row3['product_name'];
			   
					 $data2 = str_replace('"', ' ', $text);
					 $product_name = str_replace('"', ' ', $text);
		 
					 $poid = $row3["id"];
					 $data2 = urlencode($text);
		 
					 $text2 = $row3['product_sku'];
		 
		 
					 $text8 = $row3['product_sku'];
		 
					 // Replace spaces with hyphens
					 $product_sku = str_replace(' ', '-', $text8);
					 
		 
					 $data3 = urlencode($text2);
		 
					 $text3 = $row3['customer'];
		 
					 $data4 = urlencode($text3);
		 
					 $pono = $row3["PoNo"];
		 
					 $lineno = $row3["lineno"];
		 
					 $qty = $pending_ats_qty;
					 $urlEncodedProductName = urlencode( $row3['product_name']);




					       if($row3["ats_status"]=="Applied")
						   $ats_stat= "4. To Approve";
						   if($row3["ats_status"]=="To Apply" && $row3["PoNoExistsInNewTable"] == 1 && $row3['checkupload'] != '1' && $row3['checkupload'] != '2')
						   $ats_stat= "2. Upload CERTS/ATS XLSM";
						   if($row3["ats_status"]=="To Apply" && $row3["PoNoExistsInNewTable"] == 1 && $row3['checkupload'] == '1' )
						   $ats_stat= "3. Send Email";
					       if($row3["ats_status"]=="Approved")
						   $ats_stat= "5. To Ship";
					   
			   ?>
				   <tr>
					   <td><?php echo $row3["pono"];?> - <?php echo $row3["lineno"];?></td>
					   <td><?php echo $row3["magdyn_commited_date"];?></td>
					   <td><?php echo $row3["product_name"];?></td>
					   <td><?php echo $product_sku;?></td>
					   <td><?php echo $row3["lineno"];?></td>
					   <td><?php echo $row3["ats_no"];?></td>
					   <td><?php echo $row3["qty"];?></td>
					   <td><?php echo '100%';?></td>
						   
					   <td><?php echo $row3["notes"];?></td>
					   <td><?php echo $ats_stat;?></td>
					   <td><?php
					 
					 $parameter = $row3["parameter"] ;
					 $data = json_decode($parameter, true);
					 if ($row3["PoNoExistsInNewTable"] == 1 && $row3['checkupload'] != '1' && $row3['checkupload'] != '2'  ) {
						echo '  
						<div >
						 <div class="dropdown" >
						<button class="dropbtn">
						<svg xmlns="http://www.w3.org/2000/svg" height="16" width="10" viewBox="0 0 320 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>
						</button>
						<div class="dropdown-content" style="margin-left:-726%;height:24vh;">
							<a href="' . site_url("po/tempdata/" . $row3["poid"] . "/" . $row3["PoNo"] ."/". $pending_ats_qty . "/" . $inv_qty ."/".  $row3["ipatsid"]) . '">
								<img title="Edit_ATS_data" src="../../Custom/images/ats.svg" style="width:2vw;height:3vh;cursor: pointer;border: 1px;    margin-left: -3%;" > Edit_ATS_data
							 </a>
					   
					   
						   <a onclick="save_pdf( 1 ,\'' . $row3["poid"] . '\',  \'' .$data["temp_date"]. '\'  ,    \'' . $row3["lineno"] . '\',  \'' . $data["ats_qty"] . '\', \'' . $product_name . '\', \'' . $product_sku . '\', \'' . $row3["temp_path"] . '\', \'' . $row3["ipatsid"] . '\', \'' . $row3["PoNo"] . '\')"  style="cursor: pointer;">
							 <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512" ><path d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z"/><title>View_SCIR</title></svg>    View_SCIR
							   </a>
					   
					   
							 <a onclick="genxl(\'' . $row3["poid"] . '\',\'' . $row3["ipatsid"] . '\' ,    \'' . $row3["lineno"] . '\')" style="cursor: pointer;">																											
							 <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"  ><path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/><title>Dowload_ATS.csv</title></svg>    Dowload_ATS.csv
							 </a>
					   
							 <a onclick="atscertup(\'' . $row3["poid"] . '\',  \'' .$data["temp_date"]. '\'  ,    \'' . $row3["lineno"] . '\',  \'' . $data["ats_qty"] . '\', \'' . $product_sku . '\', \'' . $row3["temp_path"] . '\',\'' . $pending_ats_qty. '\',\'' . $row3["PoNo"]. '\',\'' . $row3["ipatsid"]. '\' )"   style="cursor: pointer;font-size: 12px;" >
							 <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"  ><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#384966}</style><path d="M288 109.3V352c0 17.7-14.3 32-32 32s-32-14.3-32-32V109.3l-73.4 73.4c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l128-128c12.5-12.5 32.8-12.5 45.3 0l128 128c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L288 109.3zM64 352H192c0 35.3 28.7 64 64 64s64-28.7 64-64H448c35.3 0 64 28.7 64 64v32c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V416c0-35.3 28.7-64 64-64zM432 456a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/><title>Upload Certs/ATS XLSM </title></svg>    Upload CERTS/ATS XLSM
							 </a>
					   
					   
					   
						   
					   
						</div>
					   </div>
					   </div>';
					   
																																	   }else if($row3["PoNoExistsInNewTable"] == 1 && $row3['checkupload'] == '1'){
					   
					   
					   echo '<svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512" onclick="toggleTable(\'' . $row3["poid"] . '\',  \'' .$data["temp_date"]. '\'  ,    \'' . $row3["lineno"] . '\',  \'' . $data["ats_qty"] . '\', \'' . $product_sku . '\', \'' . $row3["temp_path"] . '\',\'' . $pending_ats_qty. '\',\'' . $row3["PoNo"]. '\',\'' . $row3["ipatsid"]. '\' ,\''.$inv_qty.'\',\''.$row3['inventory_model_id'].'\')" style="width:2vw;height:3vh;cursor: pointer;border: 1px;"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/><title>Send_ATS_Email</title></svg>';
																																	   
																															   
																																	   }else if( $row3['checkupload'] == '2' ){
																																		   echo '';
																																	   }else if($row3['formtemplate'] != NULL){
					   
																																			
																																			echo '<div> 
																																			<a href="' . site_url("po/tempdata/" . $row3["poid"] . "/" . $row3["PoNo"] ."/". $pending_ats_qty . "/" . $inv_qty ."/".  $row3["ipatsid"]) . '">
																																					<img title="Input_ATS_data" src="../../Custom/images/ats.svg" style="width:2vw;height:3vh;cursor: pointer;border: 1px;" >
																																				</a>
																																			</div>';
					   
					   
																																	   
																																	   }else{
																																	   ?> <?php echo'	<div2> 
																																		<img title="ATS-Ship" src="../../Custom/images/ats.svg" style="width:2vw;height:3vh;cursor: pointer;border: 1px;" onclick=open_ats_modal1("'.$pending_ats_qty.'","'.$row3["poid"].'","'.$rowidx2.'") ></img>
																																		 <div1 id="ats_tip_1'.$rowidx2.'" >
					   
																															<span class="deleteMeetingClose" onclick=document.getElementById("ats_tip_1'.$rowidx2.'").style.visibility="hidden"; ><B>&times;</B></span>';
					   
					   echo '<h3 style="font-size: 13px;background-color: #FFFFFF;padding: 5px;text-align: left;"> 
					   ATS Apply<BR><BR>'; echo $row["PoNo"].','.$row["product_name"];
					   echo'</h3>                                                                                                        <table>
						   
						   <tr>
							   <th>ATS Qty</th>
							   <th>ATS No</th>
							   <th>Notes</th>
							   <th style="width: 160px;"></th>
						   </tr>
					   
						   <tr>
							   <td><input style="width: 60px;" id="ats_qty_'.$rowidx2.'" min="0" type="number"></td>
							   <td><input style="width: 60px;" id="ats_no_'.$rowidx2.'" min="0"  type="text"></td>
							   <td style="width: 160px;"><input id="ats_notes_'.$rowidx2.'"  type="text"></td>
							   <td><img id="apply_btn_'.$rowidx2.'" title="Save" src="../../Custom/images/save.svg" style="width:3vw;height:3vh;cursor: pointer;border: 1px;" onclick=ats_uniq_check("'.$row3["poid"].'","'.$rowidx2.'","'.$row["inventory_model_id"].'") > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</img></td>
						   </tr>
					   
																															   </table>';
									   
									   ?></td>				
								   </tr>
					   <?php		
								   }}
			$rowidx++;
			}
					   ?></td>


















































<?php




	 
			$result = mysqli_query($con, "SELECT atstab.id,atstab.qty,atstab.notes,atstab.ats_no,potab.lineno,atstab.ats_status,atstab.po_id,potab.pono,potab.magdyn_commited_date,product.inventory_model_id,LEFT(product.product_sku,20) as product_sku,LEFT(product.product_name,40) AS product_name FROM `ip_ats` atstab LEFT JOIN ip_po potab ON atstab.po_id=potab.id LEFT join `ip_products` product on potab.partid=product.product_id WHERE atstab.ats_status!='Shipped' and  atstab.ats_status!='To Apply' ");
		while ($row = mysqli_fetch_array($result))
		{
			if($row["ats_status"]=="Applied")
				$ats_stat= "4. To Approve";
			if($row["ats_status"]=="Approved")
				$ats_stat= "5. To Ship";
			
	?>
		<tr>
			<td><?php echo $row["pono"];?> - <?php echo $row["lineno"];?></td>
			<td><?php echo $row["magdyn_commited_date"];?></td>
			<td><?php echo $row["product_name"];?></td>
			<td><?php echo $product_sku;?></td>
			<td><?php echo $row["lineno"];?></td>
			<td><?php echo $row["ats_no"];?></td>
			<td><?php echo $row["qty"];?></td>
			<td><?php echo '100%';?></td>
				
			<td><?php echo $row["notes"];?></td>
			<td><?php echo $ats_stat;?></td>
			<td><?php
			echo '<div2>';
			if($row["ats_status"]=="Applied")
				echo '<i class="fa fa-check fa-lg" onclick=open_ats_modal("'.$row["id"].'","'.$rowidx.'")  aria-hidden="true"></i>';
			
			if($row["ats_status"]=="Approved")
				echo '<i class="fa fa-truck fa-lg" onclick=open_ats_modal("'.$row["id"].'","'.$rowidx.'")  aria-hidden="true"></i>';
			
			echo '<div1 id="ats_tip_'.$rowidx.'" >

                                                                                                     <span class="deleteMeetingClose" onclick=document.getElementById("ats_tip_'.$rowidx.'").style.visibility="hidden"; ><B>&times;</B></span>';
$applied="'Applied'";
$result9 = mysqli_query($con, "SELECT count(*) as row_count FROM `ip_ats` WHERE `id` =".$row["id"]." AND ats_status=".$applied);
$row9 = mysqli_fetch_array($result9);
$applied_count=$row9["row_count"];

$approved="'Approved'";
$result10 = mysqli_query($con, "SELECT count(*) as row_count FROM `ip_ats` WHERE `id` =".$row["id"]." AND ats_status=".$approved);
$row10 = mysqli_fetch_array($result10);
$approved_count=$row10["row_count"];

/*$shipped="'Shipped'";
$result11 = mysqli_query($con, "SELECT count(*) as row_count FROM `ip_ats` WHERE `id` =".$row["id"]." AND ats_status=".$shipped);
$row11 = mysqli_fetch_array($result11);
$shipped_count=$row11["row_count"];*/

if($applied_count >0){
echo '<h3 style="font-size: 13px;background-color: #FFFFFF;padding: 5px;text-align: left;"> 
ATS: Client Approval Pending<BR><BR>'; echo $row["pono"].','.$row["product_name"]  .'<a href="' . site_url("po/mailstatus/" . $row["id"] . "/" . $row["po_id"] ) . '"> <button >Resend Email</button> </a>';
echo'</h3> 
<table>
																									
	<tr>
		<th>ATS Qty</th>
		<th>ATS No</th>
		<th>Notes</th>
		<th style="width: 100px;"></th>
		<th>Action</th>
	</tr>';
	$result6 = mysqli_query($con, "SELECT * FROM `ip_ats` WHERE `id` =".$row["id"]);
while($row6 = mysqli_fetch_array($result6))
{
		if($row6["ats_status"]=="Applied"){	
			echo '<tr>
				<td><input style="width: 60px;" id="" type="number" value="'.$row6["qty"].'" readonly></td>
				<td><input style="width: 60px;" id="" type="text" value="'.$row6["ats_no"].'" readonly></td>
				<td><input id="approve_notes_'.$rowidx3.'" type="text" value="'.$row6["notes"].'"></td>
				<td style="width: 100px;"></td>
				<td>
					<button id="approve_btn_'.$rowidx3.'" onclick=approved("'.$row6["ats_no"].'","'.$row["id"].'","'.$rowidx3.'"); style="background-color: #4CAF50;color: white;border-radius: 2px; border:0px" type="button" title="Approve"><i class="fa fa-check" aria-hidden="true"></i></button>
					<button id="reject_btn_'.$rowidx3.'" onclick=reject("'.$row6["ats_no"].'","'.$row["id"].'","'.$row6["qty"].'","'.$row["inventory_model_id"].'","'.$rowidx3.'"); style="background-color: #B94A48;color: white;border-radius: 2px; border:0px" type="button" title="Reject"><i class="fa fa-times" aria-hidden="true"></i></button>
				</td>
				
			</tr>';
		}
	$rowidx3++;
}
echo '
</table>';
}

if($approved_count >0){

	
echo '<h3 style="font-size: 13px;background-color: #FFFFFF;padding: 5px;text-align: left;"> 
ATS Approved List<BR><BR>'; echo $row["pono"].','.$row["product_name"];
echo '</h3>
																										
<table>
																									
	<tr>
		<th>ATS Qty</th>
		<th>ATS No</th>
		<th>Notes</th>
		<th>Inv No</th>
		<th>Action</th>
	</tr>';
	
	$result7 = mysqli_query($con, "SELECT * FROM `ip_ats` WHERE `id` =".$row["id"]);
while($row7 = mysqli_fetch_array($result7))
{
		if($row7["ats_status"]=="Approved"){	
			echo '<tr>
		
				<td><input style="width: 60px;" id="quantity" type="number" value="'.$row7["qty"].'" readonly></td>
				<td><input style="width: 60px;" id="" type="text" value="'.$row7["ats_no"].'" readonly></td>
				<td><input id="ship_notes_'.$rowidx1.'" type="text" value="'.$row7["notes"].'"></td>
				
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
					<button id="ship_btn_'.$rowidx1.'" onclick=shipped("'.$row7["ats_no"].'","'.$row["po_id"].'","'.$row["id"].'","'.$rowidx1.'","'.$row7["qty"].'","'.$row["inventory_model_id"].'"); style="background-color: #f78c00;color: white;border-radius: 2px; border:0px" type="button" title="Ship"><i class="fa fa-truck" aria-hidden="true"></i></button>
				</td>
				
			</tr>';
		}
	$rowidx1++;
}

echo '
</table>';
}

/*if($shipped_count >0){

echo '<h3 style="font-size: 17px;background-color: #FFFFFF;padding: 5px;text-align: left;"> 
ATS Shipped List
</h3>';
																										
echo '<table>
																									
	<tr>
		<th>ATS Qty</th>
		<th>ATS No</th>
		<th>Notes</th>
		<th style="width: 160px;"></th>
	</tr>';
	$result8 = mysqli_query($con, "SELECT * FROM `ip_ats` WHERE `id` =".$row["id"]);
while($row8 = mysqli_fetch_array($result8))
{
		if($row8["ats_status"]=="Shipped"){	
			echo '<tr>
				
				<td><input style="width: 60px;" id="" type="number" value="'.$row8["qty"].'" readonly></td>
				<td><input style="width: 60px;" id="" type="text" value="'.$row8["ats_no"].'" readonly></td>
				<td><input id="" type="text" value="'.$row8["notes"].'" readonly></td>
				<td style="width: 160px;"></td>
				
			</tr>';
		}
}
echo '
</table>';
}*/
echo '</div1>
</div2>';

		
echo '<div2>';
			//if($row["ats_status"]=="Applied")
				echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bars" onclick=open_ats_split_modal("'.$row["id"].'","'.$rowidx.'")  aria-hidden="true"></i>';
			
			
			
			echo '<div1 id="ats_tip_split'.$rowidx.'" >
                                                                                                     <span class="deleteMeetingClose" onclick=document.getElementById("ats_tip_split'.$rowidx.'").style.visibility="hidden"; ><B>&times;</B></span>';
$applied="'Applied'";
$result9 = mysqli_query($con, "SELECT count(*) as row_count FROM `ip_ats` WHERE `id` =".$row["id"]." AND ats_status=".$applied);
$row9 = mysqli_fetch_array($result9);
$applied_count=$row9["row_count"];
$approved="'Approved'";
$result10 = mysqli_query($con, "SELECT count(*) as row_count FROM `ip_ats` WHERE `id` =".$row["id"]." AND ats_status=".$approved);
$row10 = mysqli_fetch_array($result10);
$approved_count=$row10["row_count"];
/*$shipped="'Shipped'";
$result11 = mysqli_query($con, "SELECT count(*) as row_count FROM `ip_ats` WHERE `id` =".$row["id"]." AND ats_status=".$shipped);
$row11 = mysqli_fetch_array($result11);
$shipped_count=$row11["row_count"];*/
//if($applied_count >0)
{
echo '<h3 style="font-size: 13px;background-color: #FFFFFF;padding: 5px;text-align: left;"> 
ATS Spliting List<BR><BR>'; echo $row["pono"].','.$row["product_name"];
echo'</h3>
<table>
																									
	<tr>
		<th>ATS Qty</th>
		<th>Split Qty 1</th>
		<th>Split Qty 2</th>
		<th>ATS No</th>
		<th>Action</th>
	</tr>';
// 	$result6 = mysqli_query($con, "SELECT * FROM `ip_ats` WHERE `id` =".$row["id"]);
// while($row6 = mysqli_fetch_array($result6))
{
		// if($row6["ats_status"]=="Applied"){	
			echo '<tr>
				<td><input style="width: 60px;" id="total_ats'.$rowidx3.'" type="text" value="'.$row["qty"].'" readonly></td>
				<td><input min="1" max="'.$row["qty"].'" style="width: 60px;" id="split_ats1'.$rowidx3.'" type="number" value="'.$row["qty"].'" onfocusout="myFunction('.$row["qty"].','.$rowidx3.')"></td>
				<td><input style="width: 60px;" id="split_ats2'.$rowidx3.'" type="text" value="0" readonly></td>
				<td><input id="split_notes_'.$rowidx3.'" type="text" value="'.$row["ats_no"].'" readonly></td>
				<td style="width: 100px;"></td>
				<td>
					<button id="split_btn_'.$rowidx3.'" onclick=split("'.$row["ats_no"].'","'.$row["id"].'","'.$rowidx3.'"); style="background-color: #4CAF50;color: white;border-radius: 2px; border:0px" type="button" title="Split"><i class="fa fa-check" aria-hidden="true"></i></button>
				</td>
				
			</tr>';
		// }
	$rowidx3++;
}
echo '
</table>';
}
echo '</div1>
</div2>';
echo '<div2>';
			//if($row["ats_status"]=="Applied")
				echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-link" onclick=split_join("'.$row["ats_no"].'","'.$row["id"].'","'.$rowidx3.'");  aria-hidden="true"></i>';
			
			
			
			echo '<div1 id="ats_tip_split_join'.$rowidx.'" >
                                                                                                     <span class="deleteMeetingClose" onclick=document.getElementById("ats_tip_split_join'.$rowidx.'").style.visibility="hidden"; ><B>&times;</B></span>';
$applied="'Applied'";
$result9 = mysqli_query($con, "SELECT count(*) as row_count FROM `ip_ats` WHERE `id` =".$row["id"]." AND ats_status=".$applied);
$row9 = mysqli_fetch_array($result9);
$applied_count=$row9["row_count"];
$approved="'Approved'";
$result10 = mysqli_query($con, "SELECT count(*) as row_count FROM `ip_ats` WHERE `id` =".$row["id"]." AND ats_status=".$approved);
$row10 = mysqli_fetch_array($result10);
$approved_count=$row10["row_count"];
/*$shipped="'Shipped'";
$result11 = mysqli_query($con, "SELECT count(*) as row_count FROM `ip_ats` WHERE `id` =".$row["id"]." AND ats_status=".$shipped);
$row11 = mysqli_fetch_array($result11);
$shipped_count=$row11["row_count"];*/
//if($applied_count >0)
{
echo '<h3 style="font-size: 13px;background-color: #FFFFFF;padding: 5px;text-align: left;"> 
ATS Split Join List<BR><BR>'; echo $row["pono"].','.$row["product_name"];
echo'</h3>
<table>
																									
	<tr>
		<th>ATS Qty</th>
		<th>Split  Qty</th>
		<th>Split  Qty</th>
		<th>ATS No</th>
		<th>Action</th>
	</tr>';
// 	$result6 = mysqli_query($con, "SELECT * FROM `ip_ats` WHERE `id` =".$row["id"]);
// while($row6 = mysqli_fetch_array($result6))
{
		// if($row6["ats_status"]=="Applied"){	
			echo '<tr>
				<td><input style="width: 60px;" id="total_ats'.$rowidx3.'" type="number" value="'.$row["qty"].'" readonly></td>
				<td><input min="1" max="'.$row["qty"].'" style="width: 60px;" id="split_join_ats'.$rowidx3.'" type="number" value="'.$row["qty"].'"></td>
				<td><input min="1" max="'.$row["qty"].'" style="width: 60px;" id="split_join_ats'.$rowidx3.'" type="number" value="'.$row["qty"].'"></td>
				<td><input id="split_join_notes_'.$rowidx3.'" type="text" value="'.$row["ats_no"].'" readonly></td>
				<td style="width: 100px;"></td>
				<td>
					<button id="split_join_btn_'.$rowidx3.'" onclick=split_join("'.$row["ats_no"].'","'.$row["id"].'","'.$rowidx3.'"); style="background-color: #4CAF50;color: white;border-radius: 2px; border:0px" type="button" title="Join"><i class="fa fa-check" aria-hidden="true"></i></button>
				</td>
				
			</tr>';
		// }
	$rowidx3++;
}
echo '
</table>';
}
echo '</div1>
</div2>';


 $rowidx++;
 }
			?></td>
		</tr>
	<?php
	
		
		 mysqli_close($con);
		?>
	</tbody>

    <tfoot>
		<tr>
			<th>PoNo</th>
			<th>Delivery Date</th>
			<th>Part Name</th>
			<th>Part No</th>
			<th>Line No</th>
			<th>ATS No</th>
			<th>Qty PO(INV)</th>
			<th>Progress</th>
			<th>Notes</th>
			<th>Status</th>
			<th>Option</th>
		</tr>
	</tfoot>
</table>
</div>


<div id="sendmail" class="popup-container" style="display: none; align-items: center; justify-content: center;     height: 689px;width:100%; text-align: center; background-color: #fff; border: 1px solid #ccc; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); padding: 20px; background: gainsboro; position: relative;">
<iframe id="sendmailframe"  style="    height: 85vh; width: 100%;;" src="" frameborder="0"></iframe>
</div>



<div id="atscert" class="popup-container" style="display: none; align-items: center; justify-content: center;     height: 689px;width:100%; text-align: center; background-color: #fff; border: 1px solid #ccc; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); padding: 20px; background: gainsboro; position: relative;">
<iframe id="atscertframe"  style=" width: 100%;    height: 74vh;;" src="" frameborder="0"></iframe>
</div>


<script>

   function toggleTable(poid,ats_date,lineno,qty,partno,temp_path,pending_ats_qty,pono,atsid,inv_qty,model_id) {
		var part = partno.split('-');
        
        var part_no = part[0];
        var rev_no = part[1];
            $('#hidden_area').css('display', 'none ');
            
            $('#sendmail').css('display','flex');

			$('#sendmailframe').attr('src', '<?php echo site_url("po/sendmailframe/") ?>' + poid +'/'+ats_date+'/'+lineno+'/'+qty+'/'+partno+'/'+temp_path+'/'+rev_no+'/'+pending_ats_qty+'/'+pono+'/'+part_no+'/'+rev_no+'/'+atsid+'/'+inv_qty +'/'+model_id);

   }
   function closetoggle(){
		$('#sendmail').css('display', 'none'); 
    	$('#hidden_area').css('display', 'block ');
    
	}
   

	function hideupcerts(){
		$('#tab').css('display', 'none'); 
    	$('#hidden_area').css('display', 'block ');
    	
    	$('#atscert').css('display', 'none'); 
	}
var opened_popup="";


	function myFunction(split,rowno) {
    document.getElementById("split_ats2"+rowno).value=split-event.target.value;
}
 
 
 
function open_ats_modal(id,rowno)
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
			document.getElementById("ats_tip_"+rowno).style.visibility="visible";
		}

}


		
function open_ats_split_modal(id,rowno)
{
	var x = document.getElementById("ats_tip_split"+rowno);
	if (window.getComputedStyle(x).visibility == "visible")
		{
			opened_popup="";
			document.getElementById("ats_tip_split"+rowno).style.visibility="hidden";
		}
	else
		{
			if(opened_popup!="") document.getElementById(opened_popup).style.visibility="hidden";
			opened_popup="ats_tip_split"+rowno;
			ats_po_id=id;
			document.getElementById("ats_tip_split"+rowno).style.visibility="visible";
		}
}
function open_ats_split_join_modal(id,rowno)
{
	var x = document.getElementById("ats_tip_split_join"+rowno);
	if (window.getComputedStyle(x).visibility == "visible")
		{
			opened_popup="";
			document.getElementById("ats_tip_split_join"+rowno).style.visibility="hidden";
		}
	else
		{
			if(opened_popup!="") document.getElementById(opened_popup).style.visibility="hidden";
			opened_popup="ats_tip_split_join"+rowno;
			ats_po_id=id;
			document.getElementById("ats_tip_split_join"+rowno).style.visibility="visible";
		}
}


function split(ats_no,ats_id,rowno){
	
	var split_btn = document.getElementById('split_btn_'+rowno);
	split_btn.disabled = true;
	
	
	
	var split_notes=document.getElementById("split_notes_"+rowno).value;
	var total_ats=document.getElementById("total_ats"+rowno).value;
				console.log(total_ats);
	var split_ats1=document.getElementById("split_ats1"+rowno).value;
				console.log(split_ats1);
	 if (total_ats != split_ats1) {
  	 	var postdata="&total_ats="+total_ats+"&split_ats="+split_ats1+"&ats_no="+ats_no+"&ats_id="+ats_id+"&split_notes="+split_notes;
					$.ajax({
						url : "../../Custom/split_ats.php",
						type: "POST",
						data :postdata,
						success: function(data,status,xhr)
					{	if(data){
						// alert(data);
						alert("ATS Splitted Successfully...")
						location.reload();
						} else {
							alert("ATS Not Splitted...");
					}		}
					
	
	//window.location.href='../../Custom/ats_status_update.php?ats_no='+ats_no+'&po_id='+po_id+'&ats_status=Approved';
});
}
}
function split_join(ats_no,ats_id,rowno){
	
	var split_join_btn = document.getElementById('split_join_btn_'+rowno);
	split_join_btn.disabled = true;
	
	
	
	var split_join_notes=document.getElementById("split_join_notes_"+rowno).value;
	var total_ats=document.getElementById("total_ats"+rowno).value;
				console.log(total_ats);
	var split_join_ats=document.getElementById("split_join_ats"+rowno).value;
				console.log(split_join_ats);
	 if (total_ats == split_join_ats) {
  	 	var postdata="&total_ats="+total_ats+"&split_join_ats="+split_join_ats+"&ats_no="+ats_no+"&ats_id="+ats_id+"&split_join_notes="+split_join_notes;
					$.ajax({
						url : "../../Custom/split_join_ats.php",
						type: "POST",
						data :postdata,
						success: function(data,status,xhr)
					{	if(data){
						// alert(data);
						 alert("ATS Joined Successfully...")
						 location.reload();
						} else {
							alert("ATS Not Joined...");
					}		}
					
	
	//window.location.href='../../Custom/ats_status_update.php?ats_no='+ats_no+'&po_id='+po_id+'&ats_status=Approved';
});
}
}


function approved(ats_no,ats_id,rowno){
	
	var approve_btn = document.getElementById('approve_btn_'+rowno);
	approve_btn.disabled = true;
	
	
	
	var approve_notes=document.getElementById("approve_notes_"+rowno).value;
	var postdata="ats_no="+ats_no+"&ats_id="+ats_id+"&approve_notes="+approve_notes;
					$.ajax({
						url : "../../Custom/ats_status_update_2.php",
						type: "POST",
						data :postdata,
						success: function(data,status,xhr)
						{
							//alert(data);
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

function shipped(ats_no,po_id,ats_id,rowno,qty,model_id){
	
			var ship_btn = document.getElementById('ship_btn_'+rowno);
			ship_btn.disabled = true;
	
			var ship_notes=document.getElementById("ship_notes_"+rowno).value;
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
				if((parseInt(qty)<=0)){

				 alert("Invalid Invoice Quantity...") ;
				 ship_btn.disabled = false;

				}
				
				else
				{
					var postdata="id="+po_id+"&inv_no="+inv_no+"&qty="+qty+"&ats_no="+ats_no+"&ats_id="+ats_id+"&inventory_model_id="+model_id+"&ship_notes="+ship_notes;
					$.ajax({
						url : "../../Custom/add_inv_2.php",
						type: "POST",
						data :postdata,
						success: function(data,status,xhr)
						{
							//document.getElementById("tip_"+rowno).style.visibility="hidden";
							alert(data);
							location.reload();
								
				

            			}
            		});
				}
			}

                else {
					alert("Pls Enter Invoice No...");
					ship_btn.disabled = false;
				}
				
	
}

function reject(ats_no,ats_id,qty,model_id,rowno){
	
	var reject_btn = document.getElementById('reject_btn_'+rowno);
	reject_btn.disabled = true;
	
	var postdata="qty="+qty+"&ats_no="+ats_no+"&ats_id="+ats_id+"&inventory_model_id="+model_id;
					$.ajax({
						url : "../../Custom/reject_ats_2.php",
						type: "POST",
						data :postdata,
						success: function(data,status,xhr)
						{
							//document.getElementById("tip_"+rowno).style.visibility="hidden";
				
							alert(data);
							location.reload();
				
						}
						});
}
var apply_img=0;
function ats_uniq_check(poid,rowno,model_id)
	{
		
		if(apply_img==0){
			//alert(apply_img);
		apply_img=1;
		var apply_btn = document.getElementById('apply_btn_'+rowno);
		apply_btn.disabled = true;
		
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

    }
	function save_pdf(checkajax,poid,ats_date,lineno,qty,productname,partno,temp_path,atsid,pono){
            
            
            if(checkajax=='1'){
            
            
            
            var part = partno.split('-');
            
            var part_no = part[0];
            var rev_no = part[1];
            var form = document.createElement('form');
            form.method = 'post';
            form.action = '../../Custom/excel/index.php'; 
            
            
            var createInput = function(name, value) {
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = name;
            input.value = value;
            return input;
            };
            
            form.appendChild(createInput('poid', poid));
            form.appendChild(createInput('ats_date', ats_date));
            form.appendChild(createInput('lineno', lineno));
            form.appendChild(createInput('qty', qty));
            form.appendChild(createInput('productname', productname));
            form.appendChild(createInput('part_no', part_no));
            form.appendChild(createInput('rev_no', rev_no));
            form.appendChild(createInput('temp_path', temp_path));
			form.appendChild(createInput('atsid', atsid));
			form.appendChild(createInput('PONO', pono));
            
		

            form.target = '_blank';
            document.body.appendChild(form);

            form.submit();
            }else if(checkajax=='0'){
            
            
            var part = partno.split('-');
            var part_no = part[0];
            var rev_no = part[1];
            
            $.ajax({
            type: 'POST',
            url: '../../Custom/excel/savepdf.php',
            data: {
            pono: poid,
            ats_date: ats_date,
            lineno: lineno,
            qty: qty,
            productname: productname,
            part_no: part_no,
            rev_no: rev_no,
            temp_path: temp_path,
			atsid:atsid
            },
            success: function(response) {
            
            console.log('Success:', response);
            },
            error: function(error) {
            
            console.error('Error:', error);
            }
            });
            
            
            
            
            }
            
            }
            
            
            function genxl(pid,atsid,lineno){
			window.location.href = '../../Custom/excel/xlgen.php?pid='+pid+'&atsid='+atsid+'&lineno='+lineno;

              setTimeout(function() {
                  window.location.href ='../../Custom/excel/xlsmgen.php?pid='+pid+'&atsid='+atsid+'&lineno='+lineno;
              }, 2000);
			// downloadats()
            }

		
function save_ats(poid,rowno,model_id)

        {
			
			var qty=document.getElementById("ats_qty_"+rowno).value;
			var ats_no=document.getElementById("ats_no_"+rowno).value;
			var ats_notes=document.getElementById("ats_notes_"+rowno).value;
			if(ats_no!="")
			{
				
				if((parseInt(qty)>parseInt(max_ats_qty)) || (parseInt(qty)<=0)) alert("Invalid ATS Quantity...");

                else
				{ 
					var postdata="id="+poid+"&ats_no="+ats_no+"&qty="+qty+"&ats_notes="+ats_notes+"&model_id="+model_id;
					$.ajax({
						url : "../../Custom/add_ats_2.php",
						type: "POST",
						data :postdata,
						success: function(data,status,xhr)
						{
							alert(data);
							location.reload();
							
							
							}
							});
				

                }
		
				
			}

                else alert("Pls Enter ATS No...");
				
		

        }
		function atscertup(poid,ats_date,lineno,qty,partno,temp_path,pending_ats_qty,pono,atsid){
			var part = partno.split('-');
        
        var part_no = part[0];
        var rev_no = part[1];
            $('#hidden_area').css('display', 'none ');
            
            $('#atscert').css('display','flex');

			$('#atscertframe').attr('src', '<?php echo site_url("po/atscert/") ?>' + poid +'/'+ats_date+'/'+lineno+'/'+qty+'/'+partno+'/'+temp_path+'/'+rev_no+'/'+pending_ats_qty+'/'+pono+'/'+part_no+'/'+rev_no+'/'+atsid);
		}

            
            
      
function open_ats_modal1(qty,id,rowno)

        {
			var x = document.getElementById("ats_tip_1"+rowno);
			if (window.getComputedStyle(x).visibility == "visible")
			{   
				opened_popup="";
				document.getElementById("ats_tip_1"+rowno).style.visibility="hidden";
			}
			else
			{
				if(opened_popup!="") document.getElementById(opened_popup).style.visibility="hidden";
				opened_popup="ats_tip_1"+rowno;
				ats_po_id=id;
				document.getElementById("ats_no_"+rowno).value="";
				document.getElementById("ats_qty_"+rowno).value=qty;
				document.getElementById("ats_tip_1"+rowno).style.visibility="visible";
				document.getElementById("ats_qty_"+rowno).max=qty;
				max_ats_qty=qty;

            }

        }

</script>

 