<?php
include('config.php');
if(isset($_POST['od1'])){
$xval=$_POST['xvalue'];

for($x=1;$x<=$xval;$x++){ 

   $sql= "INSERT INTO `pdf`( `od`, `totalthickness`, `bladethickness`,`bladethickness2`, `hubod`, `hubod2`, `bushprotrusion`, `flatness`, `bushht`, `bushid`, `rotorassay`,`sno`,`date`) VALUES ('".$_POST['od'.$x]."','".$_POST['tick'.$x]."','".$_POST['blade'.$x]."','".$_POST['bladee'.$x]."','".$_POST['hub'.$x]."','".$_POST['hubb'.$x]."','".$_POST['pro'.$x]."','".$_POST['flat'.$x]."','".$_POST['ht'.$x]."','".$_POST['id'.$x]."','".$_POST['face'.$x]."','".$_POST['sno'.$x]."',NOW())";
$run=mysqli_query($conn,$sql);
if($run){
   echo "successful ";
}else{
   echo "failed";
}
}
}
?>