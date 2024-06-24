<?php
include 'config.php';
$atsno=$_POST['atsno'];

$sql=mysqli_query($con,"SELECT `ats_no` FROM `ip_ats` WHERE `ats_no`='$atsno'");
$row = mysqli_fetch_array($sql);

if($row['ats_no']==$atsno) echo '1';
else echo '0';

mysqli_close($con);


?>