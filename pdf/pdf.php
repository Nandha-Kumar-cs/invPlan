<?php
include('config.php');
if(isset($_POST['od1'])){
$xval=$_POST['xvalue'];

for($x=0;$x<=$xval;$x++){ 



                             $sql="INSERT INTO `pdf`(`pono`, `lineno`, `partname`, `partno`, `atsqty`, `client`, `sno`, `od`, `totalthicknes`, `bladerdg1`, `bladerdg2`, `hubmin`, `hubmax`, `flatnes`, `bushht`, `bushid`, `rotorassy`, `testreport`, `batchno`, `inspectiondate`, `verifiedby`, `heatno`, `pdf_id`,`bushpro`) VALUES ('".$_POST['pono']."', '".$_POST['lno']."', '".$_POST['partname']."', '".$_POST['partno']."', '".$_POST['atsqty']."', '".$_POST['client']."', '".$_POST['sno'.$x]."', '".$_POST['od'.$x]."', '".$_POST['tick'.$x]."', '".$_POST['bladerdg1'.$x]."', '".$_POST['bladerdg2'.$x]."', '".$_POST['hubmin'.$x]."', '".$_POST['hubmax'.$x]."', '".$_POST['flat'.$x]."', '".$_POST['bushht'.$x]."', '".$_POST['bushid'.$x]."', '".$_POST['rotor'.$x]."', '".$_POST['testreport']."', '".$_POST['batchno']."', '".$_POST['inspdate']."', '".$_POST['verified']."', '".$_POST['heatno']."', 'NULL', '".$_POST['bushpro'.$x]."')";
                                                                                                                                                                                                                                                                                                                                                                   
   $run=mysqli_query($conn,$sql);
if($run){
   echo "successful ";
}else{
   echo "failed";
}
}
}
?>