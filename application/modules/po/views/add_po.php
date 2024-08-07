<!-- Feat Pagalaven -->

<?php include 'Custom/config.php';
							$partnoarray=array();
							$idx=0;
							$sql =mysqli_query($con,"SELECT `product_id`, `product_sku` as partno, CONCAT(`product_sku`,'-',`product_name`) as product_name,`family_name` FROM `ip_products`as product left join `ip_families` as family on family.family_id=product.family_id "); while ($row = mysqli_fetch_array($sql)) {  
							$val =($row['product_name']); 
							if (strpos($row['family_name'], 'Inactive') !== false){} 
							else
								$partnoarray[$idx][0]=$row['product_id'];
							$partnoarray[$idx++][1]=$row['product_name'];; 
							}  mysqli_close($con); ?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">  
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
<link rel="stylesheet" type="text/css" href="../../Custom/css/tab-screen.css" >		
<link rel="stylesheet" type="text/css" href="../../Custom/css/jquery.plugins.css" title="default" media="screen">
  
 <style>   
/*Set the row height to the viewport*/
.row-height{
  height: 90vh;
} 

/*Remove the scrollbar from Chrome, Safari, Edge and IE*/
::-webkit-scrollbar {
    width: 12px;
} 

::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    border-radius: 10px;
} 

::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);
}

#watermark {
  height: 50px;
  width: auto;
  position: relative;
  overflow: hidden;
}
#watermark p {
  position: absolute;
  top: 0;
  left: 0;
  color: #000;
  font-size: 18px;
  pointer-events: none;
}
 </style>
 
 <script type="text/javascript">
	
var edit_amnd_flag=false;	
var po_id="";
var type="";
	function selectItem(li) {
		if (li.extra)
	        document.getElementById("js_total").innerHTML= " " + li.extra[0] + " "
	}
	
	// for autocomplete in papyment page
	function formatItem(row) {
		return row[0] + "<br><i>" + row[1] + "</i>";
	}
	
	//delete line item in new invoice page
	function delete_row(row_number)
	{
	//	$('#row'+row_number).hide(); 
		$('#row'+row_number).remove(); 
	}
	
	//dlete line item in EDIT page
	function delete_line_item(row_number)
	{
		$('#row'+row_number).hide(); 
		$('#quantity'+row_number).removeAttr('value');
		$('#delete'+row_number).attr('value','yes');
	}
	 
	function siLog(level,message)
	{
		log_level = "log." + level + "('" + message + "')";
		
		if(window.log)
		{
			eval(log_level);
		}
	}
</script>
	
<script type="text/javascript">

var row_count=1;
function addRow() 
{
	row_count++;
	var tableID='itemtable';
	var table = document.getElementById(tableID);

	var rowCount = table.rows.length;
	var row = table.insertRow(rowCount);

	var cell1 = row.insertCell(0);
	var cell2 = row.insertCell(1);
	var cell3 = row.insertCell(2);
	var cell4 = row.insertCell(3);
	var cell5 = row.insertCell(4);
	var cell6 = row.insertCell(5);
	var cell7 = row.insertCell(6);
	var cell8 = row.insertCell(7);
	var cell9 = row.insertCell(8);
	
	cell1.innerHTML =('<td><a  class="trash_link" id="trash_link'+(rowCount)+'"  onclick="del_row('+(rowCount)+')" >	<img id="trash_image'+(rowCount)+'" style="cursor:pointer" src="../../Custom/images/common/delete_item.png" height="16px" width="16px" title="Delete Row" alt="">							</a></td>');
	cell2.innerHTML =('<td><INPUT type="text" style="width:5vw" name="lineno'+(rowCount)+'"  required  maxlength="10" minlength="1" id="lineno'+(rowCount)+'" size="5" ></td>');
	
	cell3.innerHTML =('<td><input  style="width:25vw" id="partno'+(rowCount)+'" required   list="partno_list_'+(rowCount)+'" onchange="partno_onchange('+(rowCount)+')">	<datalist style="height:26px;width:150px;font-size:20px;" contenteditable="true" id="partno_list_'+(rowCount)+'"  >"</datalist></td>');			
	cell4.innerHTML =('<td><select id="currency'+(rowCount)+'" name="currency'+(rowCount)+'"  onchange="currency_onchange('+(rowCount)+')"> required>	<option value=""></option>	<option value="INR">INR</option><option value="USD">USD</option><option value="EUR">EUR</option></select></td>');
	cell5.innerHTML =('<td><INPUT type="text" style="width:5vw" name="unitprice'+(rowCount)+'" required  maxlength="10" minlength="1" id="unitprice'+(rowCount)+'" size="5" ></td>');
	cell6.innerHTML =('<td><INPUT type="text" style="width:4vw" name="qty'+(rowCount)+'" required pattern="[0-9]*" maxlength="10" minlength="1" id="qty'+(rowCount)+'" size="5" >			</td>');
	
	
	cell7.innerHTML =('<td><INPUT type="text" size="10" style="width:8vw" readonly placeholder="DD-MMM-YYYY" required name="podate'+(rowCount)+'" id="podate'+(rowCount)+'"  >	</td>');					
	cell8.innerHTML =('<td><INPUT type="text"  size="10" style="width:8vw" readonly placeholder="DD-MMM-YYYY" required name="com_date'+(rowCount)+'" id="com_date'+(rowCount)+'"  ></td>');				
	cell9.innerHTML =('<td><select id="mode'+(rowCount)+'" name="mode'+(rowCount)+'" required>	<option value=""></option><option value="Sea">Sea</option><option value="Air">Air</option><option value="Road">Road</option></select></td>');								
				
	for(var idx=0;idx<partno_arr_list.length;idx++)
	{
		var opt = document.createElement("OPTION");
		opt.setAttribute("value", partno_arr_list[idx][1]);
		opt.setAttribute("data-value", partno_arr_list[idx][0]);
		document.getElementById("partno_list_"+(rowCount)).appendChild(opt);		
	}
	$( "#com_date"+rowCount).datepicker({ dateFormat: 'dd-M-yy' });
	$( "#podate"+rowCount).datepicker({ dateFormat: 'dd-M-yy' });				
}


$(document).ready(function(){

	$( "#po_date_field" ).datepicker({ dateFormat: 'dd-M-yy' });
	$( "#po_rx_date" ).datepicker({ dateFormat: 'dd-M-yy' });
	$( "#com_date1" ).datepicker({ dateFormat: 'dd-M-yy' });
	$( "#podate1" ).datepicker({ dateFormat: 'dd-M-yy' });
	
	$("#Container").after(
	'<div id="confirm_delete_line_item" style="display: hidden;" title="Delete this line item?">' +
		'<div style="padding-right: 2em;">If you choose "Delete" the line item will be removed on Save.</div>' +
	'</div>'
	);
	
      	$("#confirm_delete_line_item").dialog({
			autoOpen: false,
			bgiframe: true,
			resizable: false,
			modal: true,
			width:300,
			height:170,
			overlay: {
				backgroundColor: '#000',
				opacity: 0.5
			},
			buttons: {
				Delete: function() {
					var delete_function = $("#confirm_delete_line_item").data('delete_function');
					(delete_function)();
					$(this).dialog('close');
				},
				Cancel: function() {
					$(this).dialog('close');
				}
			}
		});
	if($.datePicker){
		$.datePicker.setDateFormat('ymd','-');
		$('input.date-picker').datePicker({startDate:'01/01/1970'});
		$('input#date2').datePicker({endDate:'01/01/1970'});
	}
	if($(".showdownloads")){
		$(".showdownloads").click(function(){
				var offset = $(this).offset();
				$(this)
					.next(".downloads")
						.css("top", offset.top + "px")
						.css("left", offset.left + "px")
						.css("position", "absolute")
						.css("background-color", "#F1F1F1")
						.css("padding", "5px")
						.css("border", "solid 1px #CCC")
						.hover(function(){}, function(){$(this).hide()})
						.show();
				return false;
			})
	}
	

}); 

function save_po()
	{
		document.getElementById("save_button").disabled = true;
		var line_data = [];
		var array_idx=0;
		var user_id=<?php echo $this->session->userdata('user_id'); ?>;
		for(var idx=1;idx<=row_count;idx++)
		{
			try
			{
				var temp={};
				temp['lineno']=document.getElementById("lineno"+idx).value;				
				var shownVal=document.getElementById("partno"+idx).value;				
				temp['partno']=document.querySelector("#partno_list_"+idx+" option[value='"+shownVal+"']").dataset.value;				
				temp['qty']=document.getElementById("qty"+idx).value;				
				temp['unitprice']=document.getElementById("unitprice"+idx).value;
				temp['currency']=document.getElementById("currency"+idx).value;
				temp['podate']=document.getElementById("podate"+idx).value;
				temp['com_date']=document.getElementById("com_date"+idx).value;
				temp['mode']=document.getElementById("mode"+idx).value;				
				line_data.push(temp);
			}
			catch(e){}
		}
		var pono=document.getElementById("pono").value;
		var po_date_field=document.getElementById("po_date_field").value;
		var po_rx_date=document.getElementById("po_rx_date").value;
		var buyername=document.getElementById("buyername").value;
		var customer=document.getElementById("customer").value;
		var customer_loc=document.getElementById("customer_loc").value;
		var loc_code=document.getElementById("loc_code").value;
		var comment=document.getElementById("comment").value;
		var temp="";
		if(edit_amnd_flag==true) temp="&type="+type+"&po_id="+po_id;
		else temp="&type=add";
		
		var postdata=temp+"&pono="+pono+"&user_id="+user_id+"&po_date_field="+po_date_field+"&po_rx_date="+po_rx_date+"&buyername="+buyername+"&customer="+customer+"&customer_loc="+customer_loc+"&loc_code="+loc_code+"&comment="+comment+"&line_data="+JSON.stringify(line_data);
		
		$.ajax({
				url : "../../Custom/addpo.php",
				type: "POST",
				data :postdata,
				success: function(data,status,xhr)
					{	
					if(type=="edit") alert("Po Updated Successfully... Ack No is ( "+data+" )");
							else if(type=="amnd") alert("Po Amended Successfully... Ack No is ( "+data+" )");
								else  alert("Po Added Successfully... Ack No is ( "+data+" )");
						location.replace("list_po");
					}
			});
		
	}

function del_row(rowno)
	{
		document.getElementById("itemtable").deleteRow(rowno);	
	}
function partno_onchange(row_no)
	{
		var currency = document.getElementById("currency"+row_no).value;
		if(currency != ''){

			if(currency=='INR'){
				currency = 'product_price';
			}else if(currency=='EUR'){
				currency = 'EURO';
			}

		var shownVal=document.getElementById("partno"+row_no).value;
		var partno=document.querySelector("#partno_list_"+row_no+" option[value='"+shownVal+"']").dataset.value;
	
		$.ajax({
				url : "../../Custom/get_unit_price.php",
				type: "POST",
				data :"&partno="+partno+"&currency="+currency,
				success: function(data,status,xhr)
					{
					 document.getElementById("unitprice"+row_no).value=data;	
					}
			});
	}

}


function currency_onchange(row_no){
		var shownVal=document.getElementById("partno"+row_no).value;
		if(shownVal != ''){
	

		var currency = document.getElementById("currency"+row_no).value;
		var partno=document.querySelector("#partno_list_"+row_no+" option[value='"+shownVal+"']").dataset.value;
		if(currency=='INR'){
				currency = 'product_price';
			}else if(currency=='EUR'){
				currency = 'EURO';
			}
		
		$.ajax({
				url : "../../Custom/get_unit_price.php",
				type: "POST",
				data :"&partno="+partno+"&currency="+currency,
				success: function(data,status,xhr)
					{
					 document.getElementById("unitprice"+row_no).value=data;	
					}
			});
	}

}



</script>

<br>
<div class = "container-fluid">      
   <div class = "col-md-9">	
	<div class="panel panel-default">	
		  <div class="panel-heading" id="header">Add PO</div>
				  <div class="panel-body" style="height:75vh; overflow: auto;">				  
				  <form  onsubmit="return save_po()">  
<table>
<tr>
<td>        
		<table  align="left">		
<tr>
		<td >			   
	    </td>
	    <td>
		  &nbsp;&nbsp;&nbsp;
		 </td>
		<td>
			   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    </td>
		</tr>
		<tr>
		<td class="details_screen">
			   PO NO
	    </td>
		
	    <td>
		   <input  type="text" id="pono" style="width:19vw" required  maxlength="25" minlength="3"  name="pono"  />
		 </td>
		 
		 <td></td>
		<td class="details_screen">
			   Customer
	    </td>
	    <td>
		   <select type="text" id="customer"  style="width:19vw"  name="customer" required >
		   <?php include 'Custom/config.php'; $sql =mysqli_query($con,"SELECT `client_name` FROM `ip_clients`"); echo "<option>  </option>"; while ($row = mysqli_fetch_array($sql)) {  echo "<option>" . $row['client_name'] ."</option>"; }  mysqli_close($con); ?>  </select> 
		 </td>
		</tr>		   
		 <tr>
		
		<td class="details_screen">
			   PO Date 
	    </td>
	    <td>		
		<input type="text" id="po_date_field" style="width:19vw" readonly placeholder="DD-MMM-YYYY" required>
		</td>
		 <td></td>
		<td class="details_screen">
			   Customer Location
	    </td>
	    <td>
		   <input type="text" id="customer_loc"  style="width:19vw" name="customer_loc" list="CustomerLoclist" required> 
		   <datalist  style="height:26px;width:150px;font-size:20px;" id="CustomerLoclist" ><?php include 'Custom/config.php'; $sql =mysqli_query($con,"SELECT DISTINCT `customerloc` FROM `ip_po`"); echo "<option>  </option>"; while ($row = mysqli_fetch_array($sql)) {  echo "<option>" . $row['customerloc'] ."</option>"; }  mysqli_close($con); ?>  </datalist> 
		</td>
		</tr>		
		<tr>
		<td class="details_screen">
			   PO Rx Date
	    </td>
	    <td>
			<input type="text" id="po_rx_date" style="width:19vw" readonly placeholder="DD-MMM-YYYY" required>			
		</td>
		 <td></td>
		<td class="details_screen">
			   Location Code
	    </td>
	    <td>
		   <input type="text" id="loc_code"  style="width:19vw" name="loc_code" list="LocationCodelist" required  maxlength="10" minlength="3" pattern="[0-9]*" id = "LocationCode">
		   <datalist  style="height:26px;width:150px;font-size:20px;" id="LocationCodelist" ><?php include 'Custom/config.php'; $sql =mysqli_query($con,"SELECT DISTINCT `locationcode` FROM `ip_po`"); echo "<option>  </option>"; while ($row = mysqli_fetch_array($sql)) {  echo "<option>" . $row['locationcode'] ."</option>"; }  mysqli_close($con); ?>  </datalist> 
		 </td>
		</tr>
		<tr>
		<td class="details_screen">
			   Buyer Name
	    </td>
	    <td>
		   <input type="text" id="buyername"  style="width:19vw"  name="buyername"  list="BuyerNamelist" required >
		   <datalist  style="height:26px;width:150px;font-size:20px;" id="BuyerNamelist" ><?php include 'Custom/config.php'; $sql =mysqli_query($con,"SELECT `custom_values_value`  FROM `ip_custom_values` WHERE `custom_values_field` = 6"); echo "<option>  </option>"; while ($row = mysqli_fetch_array($sql)) {  echo "<option>" . $row['custom_values_value'] ."</option>"; }  mysqli_close($con); ?>  </datalist> 
		   </td>
		 <td></td>  		  
		<td class="details_screen">
			   Comment
	    </td>
	    <td>
		   <input type="text" id="comment"  style="width:19vw" name="comment" required>
		   </td>
		</tr>		
		</table>
        </td></tr>
		<tr><td>&nbsp;&nbsp;</td></tr>
       <tr><td>
<table id="myTable" align="left">
	<tbody><tr>
		<td colspan="3">
		<table id="itemtable">
			<tbody id="itemtable-tbody">
			<tr>
				<td class="details_screen"></td>
				<td class="details_screen">Line No</td>
				<td class="details_screen">Part No</td>
				<td class="details_screen">Currency</td>
				<td class="details_screen">Unit Price</td>	
				<td class="details_screen">Qty  </td>
							
				
				<td class="details_screen">Dly Dt <br>as in PO&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td class="details_screen">Dly Dt <br> Magdyn commit</td>
				<td class="details_screen">&nbsp;&nbsp;Ship Mode</td>
			</tr>
			</tbody>	        		 
				<tbody class="line_item" id="row0">
					<tr>
						<td>
						</td>
						<td>							
							<INPUT type="text" style="width:5vw" name="lineno1" id="lineno1" size="5" required pattern="[0-9]*"  maxlength="10" minlength="1">
							</td>
						<td>							
							<INPUT type="text" style="width:25vw" name="partno1" id="partno1" list="partno_list_1" onchange="partno_onchange(1)" required>
							<datalist   id="partno_list_1" >
							  </datalist>
						</td>
						<script>
						 var partno_arr_list = ((<?php echo json_encode($partnoarray); ?>));
						  for(var idx=0;idx<partno_arr_list.length;idx++)
							{
								
								var opt = document.createElement("OPTION");
								opt.setAttribute("value", partno_arr_list[idx][1]);
								opt.setAttribute("data-value", partno_arr_list[idx][0]);
								document.getElementById("partno_list_1").appendChild(opt);
								
							}
						</script>
						<td>				                				                
							<select id="currency1" name="currency1" onchange="currency_onchange(1)">
							<option value=""></option>
							<option value="INR">INR</option>
							<option value="USD">USD</option>
							<option value="EUR">EUR</option>
							</select>
						</td>

						<td>			
							<INPUT type="text" style="width:5vw" name="unitprice1" id="unitprice1" size="5" required  maxlength="10" minlength="1">
						</td>	
						<td>			
							<INPUT type="text" style="width:4vw" name="qty1" id="qty1" size="5" required  pattern="[0-9]*" maxlength="10" minlength="1">
						</td>
							
						                    		 
						
						<td wrap="nowrap">
							<input type="text" id="podate1" style="width:8vw" readonly placeholder="DD-MMM-YYYY" required>
							
						</td>	
						<td>
							<input type="text" id="com_date1" style="width:8vw" readonly placeholder="DD-MMM-YYYY" required>							
						</td>	
						<td>								                				                
							<select id="mode1" name="mode1" required>
							<option value=""></option>
							<option value="Sea">Sea</option>
							<option value="Air">Air</option>
							<option value="Road">Road</option>
							</select>
						</td>						
					</tr>
				</tbody>
	        		</table>
		</td>
	</tr>
	<tr>
		<td>
			
 <table class="buttons"  align="left">
				<tbody><tr>
					<td>
						<a   id="addrow" class="" onclick="addRow()">
							<img src="../../Custom/images/add.png"   alt="">
							Add new row
						</a>
				
					</td>
				</tr>
		 </tbody></table>		 
		</td>
	</tr>
	<tr>
	<td>
			<table class="buttons" align="center">
				<tbody>
					<tr>
						<td>
							<button type="submit" class="invoice_save positive" id="save_button" value="Save">
									<img class="button_img" src="../../Custom/images/common/tick.png" alt="">Save
							</button>								
						</td>
						<td>
							<input type="hidden" id="max_items" name="max_items" value="5">
							<input type="hidden" name="type" value="2">								
								<a href="list_po" class="negative">
									<img src="../../Custom/images/common/cross.png" alt="">Cancel
								</a>					
						</td>
					</tr>
				</tbody>
		</table>
	</td>
	</tr>

</tbody>

</table>
</table>
</form>
				  
</div>
</div>
</div>
			
	<div class = "col-md-3 ">
		<div class="panel panel-default">
			  <div class="panel-heading">History</div>
				<div class="panel-body" id="history" style="height:75vh; overflow: auto;">
						<div id="watermark" style="margin-top:40%;margin-left:15%;"> 
							<p>No History To Show </p>
						</div>		   
				</div>
		</div>
	</div>
</div>
<script>
	
  
  
try{
po_id='<?php  echo $_GET["po_id"]; ?>';
type='<?php  echo $_GET["action"]; ?>';
}
catch(e){}

if(po_id!="")
{
	
	if(type=="amnd")	{
		document.getElementById("addrow").style.display="none";
		document.getElementById("header").innerHTML="Amnd PO";
	}
	else document.getElementById("header").innerHTML="Edit PO";
	$.ajax({
				url : "../../Custom/getpo_info.php?type="+type,
				type: "POST",
				data :"po_id="+po_id,
				success: function(data,status,xhr)
					{
						edit_amnd_flag=true;
						var obj = JSON.parse(data);
						document.getElementById("pono").value=obj[0].pono;
						document.getElementById("pono").readOnly =true;
						document.getElementById("customer").value=obj[0].customer;
						document.getElementById("po_date_field").value=obj[0].podate;
						document.getElementById("po_rx_date").value=obj[0].porxdate;
						document.getElementById("buyername").value=obj[0].buyername;
						document.getElementById("customer_loc").value=obj[0].customerloc;
						document.getElementById("loc_code").value=obj[0].locationcode;
						document.getElementById("comment").value=obj[0].comment;
						document.getElementById("history").innerHTML="";
						for(var idx=0;idx<obj.length;idx++)
						{
						if(idx!=0)addRow();
							document.getElementById("lineno"+(idx+1)).value=obj[idx].lineno;
							document.getElementById("partno"+(idx+1)).value=obj[idx].product_sku;
							document.getElementById("qty"+(idx+1)).value=obj[idx].quantity;
							document.getElementById("unitprice"+(idx+1)).value=obj[idx].unitprice;
							document.getElementById("currency"+(idx+1)).value=obj[idx].currency;
							document.getElementById("podate"+(idx+1)).value=obj[idx].po_rx_date;
							document.getElementById("com_date"+(idx+1)).value=obj[idx].magdyn_commited_date;
							document.getElementById("mode"+(idx+1)).value=obj[idx].mode;
							if(obj[idx].history!="")
							{								
								document.getElementById("history").innerHTML=document.getElementById("history").innerHTML+obj[idx].history;
							}
						}
						if(document.getElementById("history").innerHTML=="")
							document.getElementById("history").innerHTML='<div id="watermark" style="margin-top:40%;margin-left:15%;"><p>No History To Show </p></div>';
						
						if(document.getElementById("customer").value=="")
								{
									var select = document.getElementById("customer");
									var option = document.createElement('option');
									option.text = option.value = obj[0].customer;
									select.add(option, 1);
									document.getElementById("customer").value=obj[0].customer;
								}
					}
			});
}
</script>