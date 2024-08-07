
<style>
	option{
		text-align: center;
	}
	.disabled {
    background-color: #f2f2f2;
    border: 1px solid #e0d2d2;
    color: #9f9595;
}
	a {
	all:unset;
    }
	input:focus{
		border: 1px solid;
	}
	select:focus{
		border: 1px solid;
	}
	button:focus{
			border: 5px solid;
	}
</style>

<!-- Feat Pagalaven -->




<?php if($fetch_data != '' && $atsid != 0){?>
<?php
   echo form_open('po/ats_data/'.$poid. "/" . $atsid);

   ?>




<?php


$partname = $fetch_data['partname'];
 $partno = $fetch_data['partno'];
 $pedingqty =  $fetch_data['pendingqty'];
//  $notes = $fetch_data['notes'];

 $fetch_notes = mysqli_query($conn,"SELECT `notes` From `ip_ats` WHERE `po_id`= '$poid'  AND `id`='$atsid'");
 $fetch_assoc_notes = mysqli_fetch_assoc($fetch_notes);
 $notes = $fetch_assoc_notes['notes'];
//  echo json_encode($row['uploaded'] )
?>

 <form action="<?php echo site_url("po/ats_data/" . $poid . "/" . $atsid); ?>" method="POST">

  <div id="headerbar">
        <h1 class="headerbar-title">Edit Supply Certificate  And Inspection Report</h1>
   <div class="headerbar-item pull-right">
    <div class="btn-group btn-group-sm">
    
     
         
            <a href="#">
            <button  class="btn btn-success" type="submit" tabindex="6" >
            <i class="fa fa-check"></i> Save 
            </button>
			</a>
			<a href=" <?php echo site_url("po/list_ats") ?>" style="text-decoration: none;">
            <button  class="btn btn-danger" tabindex="7" type="button" >
                <i class="fa fa-times"></i>  Cancel
            </button>
			</a>
      
    </div>
   </div>
        </div>

<table  align="left" style="width: 100%;">	
    

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
        Qty to Apply for ATS  :
	    </td>
	    <td>
        <input type="number"  name="ats_qty" id="ats_qty" value="<?php echo $fetch_data['ats_qty'] ?>" min='1' max='<?php echo $invqty ?>' style="width:19vw"  oninput="valchange()"  tabindex="1" autocomplete="off" readonly>
		 </td>
		 <td></td>

		 <td class="details_screen">
		PO No  :
	    </td>
	    <td>
		
            <input type="number" value="<?php echo $pono ?>" name="pono"   id="pono" style="width:19vw"  readonly  class="disabled" autocomplete="off">	
		</td>


		
		 
		
		
		</tr>		   
		 <tr>
		
		 <td class="details_screen">
        IR Date  :
	    </td>
		
	    <td>
			 <input type="date" name="temp_date" id="temp_date" value="<?php echo $fetch_data['temp_date'] ?>"  max="<?php echo date('Y-m-d'); ?>"  style="width:19vw" required  tabindex="2" autocomplete="off">
		 </td>
		 <td></td>
		 <td class="details_screen">
		Part No  :
	    </td>
	    <td>
        <input type="text" name="partno" value="<?php echo $partno  ?>"  style="width:19vw"  readonly class="disabled" autocomplete="off">
		   </td>



		
		
		</tr>		
		<tr>

		<td class="details_screen">
        Inspected By  :
	    </td>
	    <td>		
	
       
<select name="inspectedby" id="inspectedby" tabindex="3" style="width: 19vw;">
    <option value="">---</option>
    <option value="Karthik" <?php echo ($fetch_data['inspectedby'] == 'Karthik') ? 'selected' : ''; ?>>Karthik</option>
    <option value="Vignesh" <?php echo ($fetch_data['inspectedby'] == 'Vignesh') ? 'selected' : ''; ?>>Vignesh</option>
	<option value="Dhruva"  <?php echo ($fetch_data['inspectedby'] == 'Dhruva') ? 'selected' : ''; ?>>Dhruva</option>
	<option value="RSK"  <?php echo ($fetch_data['inspectedby'] == 'RSK') ? 'selected' : ''; ?>>RSK</option>
	<option value="Raj"  <?php echo ($fetch_data['inspectedby'] == 'Raj') ? 'selected' : ''; ?>>Raj</option>
	<option value="Thiruvalluvan"  <?php echo ($fetch_data['inspectedby'] == 'Thiruvalluvan') ? 'selected' : ''; ?>>Thiruvalluvan</option>
</select>

		</td>








		
		 <td></td>
		<td class="details_screen">
		Part Name  :
	    </td>
	    <td>
        <input type="text" name="partname" value="<?php echo $partname  ?>" style="width:19vw"  readonly class="disabled" autocomplete="off">
		 </td>
		</tr>
		<tr>


		<td class="details_screen">
		Approved By  :
	    </td>
	    <td>
       
		       
<select name="approvedby" id="approvedby" tabindex="4" style="width: 19vw;">
    <option value="">---</option>
    <option value="Dhruva" <?php echo ($fetch_data['approvedby'] == 'Dhruva') ? 'selected' : ''; ?>>Dhruva</option>
    <option value="RSK" <?php echo ($fetch_data['approvedby'] == 'RSK') ? 'selected' : ''; ?>>RSK</option>
</select>
		</td>






	
		 <td></td>  		  
		<td class="details_screen">
		Pending Qty  :
	    </td>
	    <td>
 		 <input type="hidden" id="qty"  value="<?php echo  $pedingqty?>"   >
           <input type="number" id="pendingqty" name="pendingqty" value="<?php echo  $pedingqty?>" style="width:19vw"  readonly  class="disabled" autocomplete="off">
		   </td>
		</tr>	
		<tr>
		<td class="details_screen">
		Notes  :
	    </td>
	    <td>
       
<input type="text" id="notes" name="notes" style="width: 19vw;" value="<?php echo  $notes?>" autocomplete="off" tabindex="5">
		</td>
		</tr>	
		</table>


     



        <?php
    echo form_close();

    ?>


</form>

<script>
function valchange(){
	var maxatsqty =<?php echo $invqty ?>;
  
var  totalpending = $('#qty').val()



var ats_qty = $('#ats_qty').val();


    if(ats_qty == 0){
    	$('#ats_qty').val('');
    	return;
    	}
    
    if(ats_qty < 0){
    	$('#ats_qty').val('');
    	return;
    	}


	if(ats_qty > maxatsqty){
        alert('Qty to Apply for ATS More than availabe qty Availabe Qty is :'+ maxatsqty);
        $('#ats_qty').val('');
        return;
        }

    var  totalpending = $('#qty').val()
    
    
    var finalpenqty = totalpending - ats_qty ;
    $('#pendingqty').val(finalpenqty);
    
    }
    $(document).ready(function() {
        $('#temp_date').focus();
    });
    

</script>

</div>


<?php } else {  
    
    
    $fetchdata = $conn->prepare("SELECT *
    FROM `ip_po` AS po
    JOIN `ip_products` ON po.partid = `ip_products`.product_id
    WHERE po.id = ?");
$fetchdata->bind_param('i', $poid);
$fetchdata->execute();
$result = $fetchdata->get_result();
$row = $result->fetch_assoc();

    ?>

    <?php
   echo form_open('po/ats_data/'.$poid. "/" . '0');

  


 

   ?>




<form action="<?php echo site_url("po/ats_data/" . $poid . "/" . '0'); ?>" method="POST">

  <div id="headerbar">
        <h1 class="headerbar-title">Enter ATS Data</h1>
   <div class="headerbar-item pull-right">
    <div class="btn-group btn-group-sm">
    
     
         
            <a href="#">
            <button  class="btn btn-success" type="submit" tabindex="6" >
            <i class="fa fa-check"></i> Save 
            </button>
			</a>
            <a href=" <?php echo site_url("po/list_ats") ?>" style="text-decoration: none;">
            <button  class="btn btn-danger" tabindex="7" type="button">
                <i class="fa fa-times"></i>  Cancel
            </button>
			</a>
    </div>
   </div>
        </div>

<table  align="left" style="width: 100%;">	
    

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
        Qty to Apply for ATS  :
	    </td>
	    <td>
      
		<input type="number" name="ats_qty" id="ats_qty" style="width:19vw" oninput="valchange()" min='1' tabindex="1" autocomplete="off" required>

		 </td>
		 <td></td>

		 <td class="details_screen">
		PO No  :
	    </td>
	    <td>
	
			<input type="number" value="<?php echo $row['pono'] ?>" name="pono"  style="width:19vw"  readonly class="disabled" autocomplete="off">	
		</td>


		
		 
		
		
		</tr>		   
		 <tr>
		
		 <td class="details_screen">
        IR Date  :
	    </td>
		
	    <td>
		<input type="date" name="temp_date" id="temp_date" style="width:19vw" max="<?php echo date('Y-m-d'); ?>" required  tabindex="2" autocomplete="off">
		 </td>
		 <td></td>
		 <td class="details_screen">
		Part No  :
	    </td>
	    <td>
			<?php
			$product_sku = $row['product_sku'];

			// Replace spaces with hyphens
			$product_sku = str_replace(' ', '-', $product_sku);
			
			// Now $product_sku contains the modified string
		

			?>
		<input type="text" name="partno" value="<?php 	echo $product_sku;  ?>"  style="width:19vw"  readonly  class="disabled" autocomplete="off">
		   </td>



		
		
		</tr>		
		<tr>

		<td class="details_screen">
        Inspected By  :
	    </td>
	    <td>		

		<select name="inspectedby" id="inspectedby" tabindex="3" style="width: 19vw;" required>
    <option value="">---</option>
    <option value="Vignesh">Vignesh</option>
	<option value="Dhruva">Dhruva</option>
	<option value="RSK">RSK</option>
	<option value="Raj">Raj</option>
	<option value="Thiruvalluvan">Thiruvalluvan</option>
</select>


		</td>








		
		 <td></td>
		<td class="details_screen">
		Part Name  :
	    </td>
	    <td>
		<input type="text" name="partname" value="<?php echo $row['product_name']  ?>" style="width:19vw"  readonly class="disabled" autocomplete="off">
		 </td>
		</tr>
		<tr>


		<td class="details_screen">
		Approved By  :
	    </td>
	    <td>
       
		    
		       
<select name="approvedby" id="approvedby" tabindex="4" style="width: 19vw;" required>
    <option value="">---</option>
    <option value="Dhruva" <?php echo ($fetch_data['approvedby'] == 'Dhruva') ? 'selected' : ''; ?>>Dhruva</option>
    <option value="RSK" <?php echo ($fetch_data['approvedby'] == 'RSK') ? 'selected' : ''; ?>>RSK</option>
</select>
		</td>






	
		 <td></td>  		  
		<td class="details_screen">
		Pending Qty  :
	    </td>

	    <td>
		   <input type="hidden" id="qty"  value="<?php echo  $pedingqty?>"   >
           <input type="number" id="pendingqty" name="pendingqty" style="width:19vw"  value="<?php echo  $pedingqty?>"  readonly class="disabled" autocomplete="off">
		   </td>



		   
		</tr>		

		<tr>
		<td class="details_screen">
		Notes  :
	    </td>
	    <td>
       
<input type="text" id="notes" name="notes" style="width: 19vw;" autocomplete="off" tabindex="5">
		</td>
		</tr>
		</table>


     



        <?php
    echo form_close();

    ?>


</form>






<script>
function valchange(){
  
    var maxatsqty =<?php echo $invqty ?>;
  
    var ats_qty = $('#ats_qty').val();

	if(ats_qty == 0 ){
		$('#ats_qty').val('');
	return;
}

if(ats_qty < 0){
	$('#ats_qty').val('');
	return;
	}

    if(ats_qty > maxatsqty){
        alert('Qty to Apply for ATS More than availabe qty Availabe Qty is :'+ maxatsqty);
        $('#ats_qty').val('');
        return;
    }

var  totalpending = $('#qty').val()


var finalpenqty = totalpending - ats_qty ;
$('#pendingqty').val(finalpenqty);



}
$(document).ready(function() {
    $('#ats_qty').focus();
});
</script>

</div>


    <?php } ?>



    

  

