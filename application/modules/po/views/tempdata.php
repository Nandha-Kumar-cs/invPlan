<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TempData</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">  
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
<link rel="stylesheet" type="text/css" href="/inv/Custom/css/tab-screen.css" >		

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




<?php 
include('./config.php');
$fetchdata = $conn->prepare('SELECT `parameter`,`uploaded` FROM `ats_data` WHERE poid = ? and atsid = ?');

// Assuming $poid and $atsid are your parameters
$fetchdata->bind_param('ii', $poid, $atsid);
$fetchdata->execute();
$result = $fetchdata->get_result();
$row = $result->fetch_assoc();
$fetch_data = json_decode($row['parameter'], true);
$uploaded = $row['uploaded'];


$fetch_path = mysqli_query($conn, "SELECT formtemplate FROM `ip_products` as product join `ip_po` as po ON po.partid=product.product_id WHERE po.id = $poid");
$fetch_path_data = mysqli_fetch_assoc($fetch_path);
$page_path = $fetch_path_data['formtemplate'];

?>
<?php

include($page_path)


?>

</html>
