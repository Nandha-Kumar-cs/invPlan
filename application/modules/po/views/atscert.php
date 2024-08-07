  <!-- Close button -->


<!-- Feat Pagalaven -->

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    #atsdataframe{
        background: white;
    width: 100%;
    border-collapse: collapse;
    margin-left: 25%;
    margin-top: 2%;
    }
   #detailtable{
    width: 45%;
    border-collapse: collapse;
    margin-left: 25%;
    margin-bottom: 1%;
    margin-top: 2%;

    }
    .svg{
	cursor: pointer;
    position: absolute;
    right: 45px;
    top: 18px;
	font-size: 20px;

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



  <form method="POST">	
  <div id="headerbar">
        <h1 class="headerbar-title" style="    text-align: center;">Upload CERTS/ATS XLSM</h1>
   <div class="headerbar-item pull-right">
   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class='svg' height="1em" onclick="parent.hideupcerts();"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
<path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/>
</svg>
   </div>
        </div>

<table  align="left" id="detailtable">	
    

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
       PONO :  <?php echo $ponodata ?> 
	    </td>
	 
		
		</tr>		   
		 <tr>

		 <td class="details_screen">
	
		    Part Name  : <?php echo $partname  ?>
	    </td>
	    
		</tr>		   
		 <tr>
		
		 <td class="details_screen">
    	PART NO  : <?php echo $partno  ?>
	    </td>
		
		</tr>		   
		 <tr>
					 <td class="details_screen">
		Ats Qty  : <?php echo $fetch_data['ats_qty'] ?>
	    </td>
		</tr>		
		</table>

</form>

</div>

<div>	
  <table border='2px' style="background: white; width: 45%; border-collapse: collapse; margin-left: 25%; margin-top: 5%;">

    <thead style="background-color: #f1f1f1;">
        <th style="padding: 10px;">File Type</th>
        <th style="padding: 10px;">Choose Files</th>
        <th style="padding: 10px;"> </th>
    </thead>

    <tbody id="astsupload">
     <form action="<?= site_url('po/upload_atscert/' . $poid . '/' . $ats_date . '/' . $lineno . '/' . $qty . '/' . $partno . '/' . $temp_path . '/' . $revno . '/' . $pending_ats_qty . '/' . $pono . '/' . $part_no . '/' . $rev_no . '/' . $atsid . '/' .$fetch_data['ats_qty']) ?>" method="post" enctype="multipart/form-data" id="atscertForm">
        <td id="poid" style="padding: 10px;">Certificates</td>
         <input type="hidden" id="poid2" name="poid" value="<?php echo $poid ?>">
        <td style="padding: 10px;"><input type="file" id="atscert" name="atscert[]" multiple accept='.pdf'></td>
         <input type="hidden" id="atsid" name="atsid" value="<?php echo $atsid ?>">
        <td style="padding: 10px;"><input type="submit" id="sub" value="Upload"></td>
       
         <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
     </form>

    </tbody>


  </table>

  <table style="background: white; width: 45%; border-collapse: collapse; margin-left: 25%; margin-top: 1.5%;">
    <?php 
    $x = 0;
    foreach ($poCertsData as $certData) {
        $x++;
   
        echo '<tr>';
        $filename = basename($certData->cert_path);
        echo '<td style="text-align:center;cursor:pointer; height: 35px;padding:10px;text-wrap: nowrap;"> ' . $x . '</td>'; // Adjust the height as needed
        
        echo '<td style="text-align:center;cursor:pointer; height: 35px;padding:10px;text-wrap: nowrap;"><a href="' .$upload_url.'' . $filename . '" download="' . $certData->cert_name . '.pdf">' . $certData->cert_name  . '</a> 
     
        </td>';

        // echo json_encode($certData);
        echo '<td> <a  href="' . site_url("po/certdel/"  . $certData->po_certs_id ."/". $poid . "/" . $atsid ."/". $pending_ats_qty ."/". $part_no  ."/". $rev_no ) . '"><i class="fa-solid fa-delete-left" style="font-size: 20px;cursor:pointer"></i></a>  </td>';

        echo '</tr>';
    }
    ?>

  </table>

</div>

<?php 
if($atsdownloaded == '1'){
?>
   <div id="atsdata" class="popup-container">
   <iframe id="atsdataframe" src="<?php echo site_url('po/atsfile/') . $poid . '/' . $ats_date . '/' . $lineno . '/' . $qty . '/' . $partno . '/' . $temp_path . '/' . $rev_no . '/' . $pending_ats_qty . '/' . $pono . '/' . $part_no . '/' . $rev_no . '/' . $atsid; ?>"  frameborder="0"></iframe>
   </div>
<?php 
}else{
?>

    <div id="detailtable">
    <a href="<?php echo site_url("po/certdownloadcsv/" . $poid . "/" . $atsid ."/". $pending_ats_qty ."/". $part_no  ."/". $rev_no )?>"> <button>Download ATS.csv File</button></a>


    </div>

    <?php
}


?>
<script>

$(document).ready(function () {



        $('#atscertForm').submit(function () {
           
            
            if ($('#atscert')[0].files.length === 0) {
                alert('Please select at least one file.');
                return false;
            }

            
            var validExtensions = ['pdf'];
            var invalidFiles = [];
            var files = $('#atscert')[0].files;

            for (var i = 0; i < files.length; i++) {
                var ext = files[i].name.split('.').pop().toLowerCase();
                if ($.inArray(ext, validExtensions) == -1) {
                    invalidFiles.push(files[i].name);
                }
            }

            
            if (invalidFiles.length > 0) {
                alert('Invalid file(s): ' + invalidFiles.join(', ') + '. Please select only PDF files.');
                return false;
            }
            var submitButton = document.getElementById('sub');
            submitButton.disabled = true;
            return true; 
           
        });
    });


	$('#certname').focus();
</script>


