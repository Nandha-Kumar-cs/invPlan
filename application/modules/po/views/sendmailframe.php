  <!-- Close button -->

<!-- Feat Pagalaven -->


  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail</title>
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
    .svgmail{
	cursor: pointer;
    position: absolute;
    top: 13px;
    right: 18px;
	font-size: 20px;
}
.certtable{
    width: 407px;
     border-collapse: collapse;
    display: flex;
    flex-wrap: wrap;
    max-height: 100px;
    overflow-y: scroll;
    margin-left: 19px;
    margin-top: 5px;
    height: 80px;
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

$qty_ats = $fetch_data['ats_qty'] ;


?>



  <form method="POST">	
  <div id="headerbar">
        <h1 class="headerbar-title" style="    text-align: center;">Send Mail</h1>
   <div class="headerbar-item pull-right">
   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"  class='svgmail' height="1em" viewBox="0 0 384 512" onclick="parent.closetoggle()"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
<path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/>
</svg>
   </div>
        </div>

<table  align="left" style="width: 100%;margin-left:2%;display:flex;margin-bottom: 2%;">	
    

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
	    <td>
     
		 </td>
		
		</tr>		   
		 <tr>

		 <td class="details_screen">
	
		    Part Name  : <?php echo $partname  ?>
	    </td>
	    <td>
		
          
		</td>


		
		 
		
		
		</tr>		   
		 <tr>
		
		 <td class="details_screen">
    	PART NO  : <?php echo $partno  ?>
	    </td>
		
	    <td>
		
		 </td>
		
		</tr>		   
		 <tr>
					 <td class="details_screen">
		Ats Qty  : <?php echo $fetch_data['ats_qty'] ?>
	    </td>
	    <td>
      
		   </td>



		
		
		</tr>		
		</table>


     



</form>



</div>



</html>


<div  style="margin-top: 7%;">
    <?php
    echo form_open('po/sendmail/');
    ?>

    <form action="<?php echo site_url("po/sendmail/"); ?>" method="post" id="sendmailform" > 

    <?php

$fetch_data_filename = mysqli_query($conn, "SELECT * FROM `ats_data` WHERE `poid` = $poid AND `atsid` = $atsid");
$fetch_filenames = mysqli_fetch_assoc($fetch_data_filename);
$pdf_filename = $fetch_filenames['pdffilename'];
$excel_filename = $fetch_filenames['filepath'];
$scir = basename($pdf_filename);
$ats = $fetch_filenames['ats_filename'];


$parts = explode("_", $ats);
$first_part = explode("-", $parts[0]);
$result = $first_part[0] . "-" . $first_part[1] . "-ATS";

$scirfile = explode("-", $scir);
$scirmail = $scirfile[0] . "-" . $scirfile[1] . "-" . $scirfile[2];








?>

    <?php
   


            $fetch_email_query = mysqli_query($conn, "SELECT unit.unit_name , prd.subject,prd.body FROM `ip_products` as prd JOIN `ip_po` as po ON prd.product_id = po.partid JOIN `ip_units` as unit ON prd.unit_id = unit.unit_id WHERE po.id = '$poid'");
            $fetch_email = mysqli_fetch_assoc($fetch_email_query);
            $subject = $fetch_email['subject'];
            $body = htmlspecialchars($fetch_email['body']);
            $uom = $fetch_email['unit_name'];
            $replacedpartno = str_replace("Rev.", "", $partno);
            $padded_lineno = str_pad('L'.$lineno, 4, "!", STR_PAD_LEFT);
            $subject = str_replace(
                ['%partname%', '%partno%', '%pono%', '%lineno%', '%ats_qty%','%uom%'],
                [$partname, $replacedpartno, $ponodata, $padded_lineno, $fetch_data['ats_qty'],$uom],
                $subject
            );
            $body = str_replace(
                ['%partname%', '%partno%', '%pono%', '%lineno%', '%ats_qty%', '%scir%', '%scirmail%','%ats%','%atsmail%','%uom%'],
                [$partname, $replacedpartno, $pono, $padded_lineno, $fetch_data['ats_qty'], $scir,$scirmail, $ats,$result,$uom],
                $body
            );
            
            ?>

        <div style=" width: 100%; margin-left: 2%;">
          <input type="hidden" value="<?php echo $partname ?>" name="partname">
          <input type="hidden" value="<?php echo $replacedpartno ?>" name="partno">
          <input type="hidden" value="<?php echo $ponodata ?>" name="ponodate">
          <input type="hidden" value="<?php echo $padded_lineno ?>" name="lineno">
          <input type="hidden" value="<?php echo $qty_ats   ?>" name="qty">
          <input type="hidden" value="<?php echo $model_id ?>" name="model_id">
          
            <input type="text" name="subject" id="subject" style="width: 80%;"  placeholder="subject" value="<?php echo $subject ?>" oninput="textsubject()" tabindex="1">
            <textarea name="body" placeholder="body" id="body" style="width: 80%;" cols="60" rows="8" oninput="textbody()" tabindex="2"><?php echo  $body ?> </textarea>
                   

            <?php

$fetch_data_query = mysqli_query($conn, "SELECT * FROM `ats_data` WHERE `poid` = $poid AND `atsid` = $atsid");
$fetch_data = mysqli_fetch_assoc($fetch_data_query);
$pdffile = basename($fetch_data['pdffile_path']);
$pdffilename = $fetch_data['pdffilename'];
$excelfilename = basename($fetch_data['filepath']);
$atsfilename = $fetch_data['ats_filename'];
?>


<input type="hidden" name="atsid" value="<?php echo $atsid ?>">
            <div style="display: flex;">
            <div style="margin:2%">
            <h4>SCIR</h4>
        <a id="pdf" href="<?php echo $upload_url ?><?php echo $pdffile ?>" download=<?php echo $pdffilename ?> style="cursor: pointer;"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path fill="#e20303" d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z"/></svg><span id="pdfspan"><?php echo $pdffilename ?></span></a> 
          </div>

          <div style="margin:2%">
          <h4>Ats File</h4>
        <a id="xlsx" href="<?php echo $upload_url ?><?php echo $excelfilename ?>" download="<?= $atsfilename?>" style="cursor: pointer;">  <svg xmlns="http://www.w3.org/2000/svg" height="16" width="12" viewBox="0 0 384 512"><path fill="#59ff00" d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128z"/></svg><span id="xlsxspan"><?php echo $atsfilename ?></span></a> 
          </div>
            </div>
 

        <!-- <?php
        $fetch_certs = mysqli_query($conn, "SELECT cert_path ,cert_name FROM `po_certs` WHERE `poid` = $poid AND `atsid` = $atsid ");
        $sno = 1;

        while ($fetch_all_certs = mysqli_fetch_assoc($fetch_certs)) {
            $cert_path = $fetch_all_certs['cert_path'];
            $cert_name = $fetch_all_certs['cert_name'];
            $cert_last_name = basename($cert_path);


            $cert_url =  $upload_url  . $cert_last_name;
            ?>

                <td style="cursor: pointer;"><a href="<?php echo $cert_url; ?>" download="<?= $cert_name?>.pdf"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path fill="#e20303" d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z"/></svg><?php echo $cert_name; ?></a></td>
          
            <?php
            $sno++;
        }
        ?> -->
   
   
                    <?php
                    $fetch_data_query = mysqli_query($conn, "SELECT * FROM `ats_data` WHERE `poid` = $poid AND `atsid` = $atsid");
                    $fetch_data = mysqli_fetch_assoc($fetch_data_query);

                    $primaryid = $fetch_data['poid'];
                    $filePath = $fetch_data['filepath'];
                    $pdfFilePath = $fetch_data['pdffile_path'];

                    $lastIndex = strrpos($filePath, '/');
                    $fileName = substr($filePath, $lastIndex + 1);
                    ?>
                 
<div>

</div>

                            <input type="submit" id="hiddensub" style="display: none;">
                             <input type="hidden" name="primaryid" value="<?php echo $primaryid ?>">
                            <input type="button" id="mailsubbtn" value="send mail" style="bottom: 44px; position: absolute; right: 38px;width: 12%; height: 8%;" tabindex="3"/>
                            <svg xmlns="http://www.w3.org/2000/svg" style="bottom: 58px; position: absolute; right: 58px;" height="20" width="20" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M215.4 96H144 107.8 96v8.8V144v40.4 89L.2 202.5c1.6-18.1 10.9-34.9 25.7-45.8L48 140.3V96c0-26.5 21.5-48 48-48h76.6l49.9-36.9C232.2 3.9 243.9 0 256 0s23.8 3.9 33.5 11L339.4 48H416c26.5 0 48 21.5 48 48v44.3l22.1 16.4c14.8 10.9 24.1 27.7 25.7 45.8L416 273.4v-89V144 104.8 96H404.2 368 296.6 215.4zM0 448V242.1L217.6 403.3c11.1 8.2 24.6 12.7 38.4 12.7s27.3-4.4 38.4-12.7L512 242.1V448v0c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64v0zM176 160H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H176c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H176c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
    </form>



<script>
$('#mailsubbtn').click(function(event) {

    $('#mailsubbtn').prop('disabled', true);
    $('#hiddensub').click();
    
   
});
</script>



















            <h4>Certs</h4>
<div style="display: flex;">
            <div>
            <table border='2px' style="background: white; width: 45%; border-collapse: collapse; margin-top: 2%; ">

    <thead style="background-color: #f1f1f1;">
       
        <th style="padding: 10px;">Choose Files</th>
        <th style="padding: 10px;"> </th>
    </thead>

    <tbody id="astsupload">
 

	<form action="<?= site_url('po/upload_atscert_mail/' . $poid . '/' . $ats_date . '/' . $lineno . '/' . $qty . '/' . $partno . '/' . $temp_path . '/' . $revno . '/' . $pending_ats_qty . '/' . $pono . '/' . $part_no . '/' . $rev_no . '/' . $atsid . '/' . $qty_ats. '/' . $model_id)   ?>" method="post" enctype="multipart/form-data" id="atscertForm">

<input type="hidden" id="poid2" name="poid" value="<?php echo $poid ?>">
<td style="padding: 10px;"><input type="file" id="atscert" name="atscert[]" multiple></td>
<input type="hidden" id="atsid" name="atsid" value="<?php echo $atsid ?>">
<td style="padding: 10px;"><input type="submit" id="sub" value="Upload"></td>

<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
</form>





    </tbody>


</table>
</div>

<div class="certtable">

    <?php 
    $x = 0;
    foreach ($poCertsData as $certData) {
      

        echo '<p style="text-wrap: nowrap;">';
        $filename = basename($certData->cert_path);
      
        echo '<svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path fill="#e20303" d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z"/></svg>';
        echo '<span style="text-align:center;cursor:pointer; height: 35px;"><a href="'.$upload_url.''.$filename . '" download="' . $certData->cert_name . '.pdf">' . $certData->cert_name  . '</a></span>';
        echo '<h3 style="margin-top: -2px;  margin-left: 7px;"> <a  href="' . site_url("po/certdelmail/"  . $certData->po_certs_id ."/". $poid . "/" . $atsid ."/". $pending_ats_qty ."/". $part_no  ."/". $rev_no."/". $inv_qty."/". $model_id ) . '"><i class="fa-solid fa-delete-left" style="font-size: 20px;cursor:pointer"></i></a> </h3>';

        echo '</p>';
    }
    ?>


</div>
</div>


<script>

$(document).ready(function () {




        $('#atscertForm').submit(function () {
            // Check if any file is selected
            if ($('#atscert')[0].files.length === 0) {
                alert('Please select at least one file.');
                return false;
            }

            // Check each selected file's extension
            var validExtensions = ['pdf'];
            var invalidFiles = [];
            var files = $('#atscert')[0].files;

            for (var i = 0; i < files.length; i++) {
                var ext = files[i].name.split('.').pop().toLowerCase();
                if ($.inArray(ext, validExtensions) == -1) {
                    invalidFiles.push(files[i].name);
                }
            }

            // Display an alert if there are invalid files
            if (invalidFiles.length > 0) {
                alert('Invalid file(s): ' + invalidFiles.join(', ') + '. Please select only PDF files.');
                return false;
            }

            $('#sub').prop('disabled',true);
            return true; // Proceed with form submission
        });


    });


	$('#certname').focus();
</script>















    <?php
    echo form_close();
    ?>
</div>
<!-- Example CDN link, replace with the actual path -->


<script>

function textbody(){

    var ats_qty = $('#ats_qty').val();
        var pono = $('#pono').val();
        var temp_date = $('#temp_date').val();
        var partno = $('#partno').val();
        var inspectedby = $('#inspectedby').val();
        var partname = $('#partname').val();
        var approvedby = $('#approvedby').val();
        var pendingqty = $('#pendingqty').val();
        var lineno = $('#lineno').val();
      
 var sub = $('#body').val();
 var sub = sub.replace('%ats_qty%', ats_qty);
 var sub = sub.replace('%pono%', pono);
 var sub = sub.replace('%irdate%', temp_date);
 var sub = sub.replace('%partno%', partno);
 var sub = sub.replace('%inspectedby%', inspectedby);
 var sub = sub.replace('%partname%', partname);
 var sub = sub.replace('%approvedby%', approvedby);
 var sub = sub.replace('%pendingqty%', pendingqty);
 var sub = sub.replace('%lineno%',lineno);

 $('#body').val(sub);

}

    function textsubject(){
        var ats_qty = $('#ats_qty').val();
        var pono = $('#pono').val();
        var temp_date = $('#temp_date').val();
        var partno = $('#partno').val();
        var inspectedby = $('#inspectedby').val();
        var partname = $('#partname').val();
        var approvedby = $('#approvedby').val();
        var pendingqty = $('#pendingqty').val();
        var lineno = $('#lineno').val();
      
 var sub = $('#subject').val();
 var sub = sub.replace('%ats_qty%', ats_qty);
 var sub = sub.replace('%pono%', pono);
 var sub = sub.replace('%irdate%', temp_date);
 var sub = sub.replace('%partno%', partno);
 var sub = sub.replace('%inspectedby%', inspectedby);
 var sub = sub.replace('%partname%', partname);
 var sub = sub.replace('%approvedby%', approvedby);
 var sub = sub.replace('%pendingqty%', pendingqty);
 var sub = sub.replace('%lineno%',lineno);

 $('#subject').val(sub);

            
    }






	$('#subject').focus();
</script>