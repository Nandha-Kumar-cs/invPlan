  <!-- Close button -->



  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TempData</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">  
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
<link rel="stylesheet" type="text/css" href="/inv/Custom/css/tab-screen.css" >	
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>	

<link rel="stylesheet" type="text/css" href="/inv/Custom/css/jquery.plugins.css" title="default" media="screen">
    <style>

   
        input {
           height: 25px;
        }
        td.details_screen {
    border-bottom: 1px dashed #d3d3d3;
    line-height: 32px;
}
       
    </style>
</head>
<body>



    <div class="form-body">



    <style>
	option{
		text-align: center;
	}
	.disabled{
		color: #ccc;
    background-color: #f2f2f2;
    border: 1px solid #ccc;
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
		border: 4px solid black;
	}
    nav{
        display: none;
    }
</style>


<?php 
include('./config.php');
$fetchdata = $conn->prepare('SELECT parameter FROM `ats_data` WHERE poid = ? and atsid = ?');

// Assuming $poid and $atsid are your parameters
$fetchdata->bind_param('ii', $poid, $atsid);
$fetchdata->execute();
$result = $fetchdata->get_result();
$row = $result->fetch_assoc();
$fetch_data = json_decode($row['parameter'], true);



 
$partname = $fetch_data['partname'];
//  $partno = $fetch_data['partno'];
 $pedingqty =  $fetch_data['pendingqty'];

 $ponodata = $fetch_data['pono'];
 $productname = $fetch_data['partname'];




?>






  <table border='2px' style="width: 45%;">
<!-- 
<thead >
    <th colspan='3' style=""><p id="atsupproductname" style="justify-content: center;display:flex"></p></th>
  
</thead> -->
    <thead style="background-color: #f1f1f1;">
	<th style="padding: 10px; text-wrap: nowrap;">File Type</th>
        <th style="padding: 10px;">Choose File</th>
        <th style="padding: 10px;"></th>
    </thead>

    <tbody id="astsupload" style="background: white;">
 

    <form action="<?= site_url('po/upload_file_ajax') ?>" method="post" enctype="multipart/form-data"  onsubmit="return validateFileExtension()">
	<td style="text-align:center">ATS XLSM</td>

<input type="hidden" id="poid2" name="poid" value="<?php echo $poid ?>">
<td style="padding: 10px;"><input type="file" id="atsfile" name="atsfile" accept=".xlsm"></td>
<input type="hidden" id="atsid" name="atsid" value="<?php echo $atsid ?>">
<input type="hidden" id="ats_date"  name="ats_date" value="<?php echo $ats_date ?>">
<input type="hidden" id="lineno" name="lineno" value="<?php echo $lineno ?>">
<input type="hidden" id="qty"  name="qty" value="<?php echo $qty ?>">
<input type="hidden" id="productname" name="productname" value="<?php echo $productname ?>">
<input type="hidden" id="partno"  name="partno" value="<?php echo $partno ?>">
<input type="hidden" id="temp_path" name="temp_path" value="<?php echo $temp_path ?>">
<input type="hidden" id="part_no" name="part_no" value="<?php echo $part_no ?>">
<input type="hidden" id="rev_no" name="rev_no" value="<?php echo $rev_no ?>">
<input type="hidden" id="pending_ats_qty" name="pending_ats_qty" value="<?php echo $pending_ats_qty ?>">
<input type="hidden" id="pono" name="pono" value="<?php echo $pono ?>">

<td style="padding: 10px;"><input type="submit" id="subats" value="Upload"></td>
<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
</form>


    </tbody>


</table>
</div>


<script>
  function validateFileExtension() {
        var fileInput = document.getElementById('atsfile');
        var filePath = fileInput.value;
        var allowedExtension = /(\.xlsm)$/i; // You can modify this to include other extensions

        if (!allowedExtension.exec(filePath)) {
            alert('Invalid file type. Please upload a file with the ".xlsm" extension.');
            return false;
        }

        // If the file has a valid extension, proceed to submit the form using AJAX
        var poid = '<?php echo $poid ?>';
        var ats_date = '<?php echo $ats_date ?>';
        var lineno = '<?php echo $lineno ?>';
        var qty = '<?php echo $qty ?>';
        var productname = '<?php echo $productname ?>';
        var partno = '<?php echo $partno ?>';
        var temp_path = '<?php echo $temp_path ?>';
        var part_no = '<?php echo $part_no ?>';
        var rev_no = '<?php echo $rev_no ?>';
        var atsid = '<?php echo $atsid ?>'

      $('#subats').prop('disabled',true);
        return true; // Prevent the form from submitting in the traditional way
    }



   
	$('#atsfilename').focus();
</script> 