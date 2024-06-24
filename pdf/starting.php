<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <head>
    <style>
     .inp{
      width:90%;
     }

    </style>
</head>

<body>

    <form action="" method='post' style='margin-top:3%;'>
    <input type="text" name="starting" placeholder="Starting Serial No" required>
    <input type="hidden" name='atsqty' value='15' readonly>
   
    <input type="submit">
    
</form>

<form action="" id='data' style='margin-top:3%;'>
<div>
<label for="pono">PO.NO:</label>
<input type="number"  id='pono' name='pono' value='<?php echo $pono ?>' readonly>


<label for="lno">Line NO:</label>
<input type="number"  name='lno' id='lno' value='<?php echo $line_no ?>' readonly>


<label for="pname">Part Name:</label>
<input type="number"  name='partname' id='pname' value='<?php echo $part_name ?>' readonly>


<label for="pno">Part NO:</label>
<input type="number"  id='pno' name='partno' value='<?php echo $part_no ?>' readonly>


<label for="atsqty">ATS Qty:</label>
<input type="number"  id='atsqty' name='atsqty' value='<?php echo $ats_qty ?>' readonly>
</div><br>


<div>
<label for="client">Client:</label>
<input type="number"  id='client' name='client' value='client' readonly>


<label for="treport">Test Report:</label>
<input  type='text'  id='treport' name='testreport' /> 


<label for="bno">Batch No:</label>
<input  type='number'  id='bno' name='batchno' min="1" max="1" />


<label for="inspdate">Inspection Date:</label>
<input  type='date'  id='inspdate' name='inspdate' />


<label for="vby">Verified By:</label>
<input  type='text'  id='vby' name='verified' />

</div><br>
<div >

<label for="hno">Heat No:</label>
<input  type='number'  id='hno' name='heatno' />
</div>



<table border='2' style='margin-top:3%;'>
<thead>
    <tr>
    <th>S.No</th>
   <th>OD<br>73.03 ± 0.05</th>
   <th>Total Thicknes<br>11.10 ± 0.05</th>

    <th>Blade Thickness<br>0.86 ± 0.05<br><div><div style='margin-left: -63%;'> Rdg1</div> <div  style='margin-left: 40%;margin-top:-5%;'>Rdg2</div></div></th>
    <th>Hub O.D<br> 30.96 ± 0.025<br><div style='margin-left: -63%;'> Min </div><div  style='margin-left: 40%;margin-top:-5%;'> Max</div> </th>
    <th>Bush Protrusion<br> 0.284 - 0.322</th>
    <th>Flatness<br>Max 0.05</th>
    <th>Bush Ht.<br>11.710 ± 0.013</th>
    <th>Bush I.D<br> 7.943</th>
    <th>Rotor Assy.Faceout<br>Max 0.025mm</th>

    </tr>
    </thead>

<?php
if(isset($_POST['starting'])){
    $starting = $_POST['starting'];
    $atsqty = $_POST['atsqty'];
    
    $ending=$starting+$atsqty;
    $sum = $ending - $starting;

    for($i=0;$i <= $sum; $i++){

        ?>

    <?php    
    echo "

    <tbody>
    <tr>
    <td><input class='inp' type='hidden' value='$starting' name='sno$i' /> $starting</td>
    <td><input class='inp' type='number'  name='od$i' id='od$i'  /> </td>
    <td><input class='inp' type='number' name='tick$i' id='tick$i'  /> </td>
    <td><input class='inp' type='number' style='width:35%' name='bladerdg1$i' id='bladerdg1$i' /> <input class='inp' type='number' ' style='width:35%;margin-left:15%;padding:2px' name='bladerdg2$i' id='bladerdg2$i' /> </td>
    <td><input class='inp' type='number' style='width:33%' name='hubmin$i' id='hubmin$i' /> <input class='inp' type='number' style='width:33%;margin-left:15%;padding:2px' name='hubmax$i' id='hubmax$i' /></td>
    <td><input class='inp' type='number' name='bushpro$i' id='bushpro$i' /> </td>
    <td><input class='inp' type='number' name='flat$i' id='flat$i' /> </td>
    <td><input class='inp' type='number' name='bushht$i' id='bushht$i' /> </td>
    <td><input class='inp' type='number' name='bushid$i' id='bushid$i' /> </td>
    <td><input class='inp' type='number' name='rotor$i' id='rotor$i' /> </td>
 
    
   
    </tr>
    </tbody>
  ";

  $starting++;
  
    }

}



?>
  </table>
  <input class='inp' type='hidden' name='xvalue' value=<?php echo $i ?> id='xvalue' />

  </form>
  <button onclick=sent()  style='margin-top: 2%; margin-left: 92%;'>Submit</button>

  <script>
    function sent(){


success=0;

      var xval = document.getElementById("xvalue").value;
alert(xval)



for(x=0; x <= xval; x++){

 var od = $('#od'+x+'').val(); 
 var tick = $('#tick'+x+'').val(); 
   var bladerdg1 = $('#bladerdg1'+x+'').val(); 
  
   var bladerdg2 = $('#bladerdg2'+x+'').val();  
   var hubmin = $('#hubmin'+x+'').val();  
   var hubmax = $('#hubmax'+x+'').val();  
    var bushpro = $('#bushpro'+x+'').val();  
   var flat = $('#flat'+x+'').val();  
   var bushht = $('#bushht'+x+'').val();  
   var bushid = $('#bushid'+x+'').val();  
   var rotor = $('#rotor'+x+'').val();  





 

 if (od.length < 1) {  
          $('#od'+x+'').css("border","3px solid red");
     success=1;
 }else{
    $('#od'+x+'').css("border","1.5px solid black");
 }
 if (tick.length < 1) {  
    $('#tick'+x+'').css("border","3px solid red");
     success=1;
 }else{
    $('#tick'+x+'').css("border","1.5px solid black");
 }
 if (bladerdg1.length < 1) {  
    $('#bladerdg1'+x+'').css("border","3px solid red");
     success=1;
 }else{
    $('#bladerdg1'+x+'').css("border","1.5px solid black");
 }
 if (bladerdg2.length < 1) {  
    $('#bladerdg2'+x+'').css("border","3px solid red");
     success=1;
 }else{
    $('#bladerdg2'+x+'').css("border","1.5px solid black");
 }
 if (hubmin.length < 1) {  
    $('#hubmin'+x+'').css("border","3px solid red");
     success=1;
 }else{
    $('#hubmin'+x+'').css("border","1.5px solid black");
 }
 if (hubmax.length < 1) {  
    $('#hubmax'+x+'').css("border","3px solid red");
     success=1;
 }else{
    $('#hubmax'+x+'').css("border","1.5px solid black");
 }
 if (bushpro.length < 1) {  
    $('#bushpro'+x+'').css("border","3px solid red"); 
     success=1;
 }else{
    $('#bushpro'+x+'').css("border","1.5px solid black");
 }
 if (flat.length < 1) {  
    $('#flat'+x+'').css("border","3px solid red");
     success=1;
 }else{
    $('#flat'+x+'').css("border","1.5px solid black");
 }
 if (bushht.length < 1) {  
    $('#bushht'+x+'').css("border","3px solid red"); 
     success=1;
 }else{
    $('#bushht'+x+'').css("border","1.5px solid black");
 }
 if (bushid.length < 1) {  
    $('#bushid'+x+'').css("border","3px solid red"); 
     success=1;
 }else{
    $('#bushid'+x+'').css("border","1.5px solid black");
 }
 if (rotor.length < 1) {  
    $('#rotor'+x+'').css("border","3px solid red");
     success=1;
 }else{
    $('#rotor'+x+'').css("border","1.5px solid black");
 }

 
   // if(od < 72.97){
   //  alert('Value Must be Greater are equal to 72.98');
   //  $('#od'+x+'').css("border","3px solid red");
   //  success=1;
   // }else{
   //  $('#od'+x+'').css("border","1.5px solid black");
   // }
   // if(od>73.09){
   //  alert('Value Must be less than are equal to 73.08');
   //  $('#od'+x+'').css("border","3px solid red");                                          
   //  success=1;
   // }else{
   //  $('#od'+x+'').css("border","1.5px solid black");
   // }
   // if(tick < 11.04){
   //  alert('Value Must be Greater than 72.98');
   //  $('#tick'+x+'').css("border","3px solid red");
   //  success=1;
   // }else{
   //  $('#tick'+x+'').css("border","1.5px solid black");
   // }
   // if(tick> 11.16){
   //  alert('Value Must be less than 73.08');
   //  $('#tick'+x+'').css("border","3px solid red");
   //  success=1;
   // }else{
   //  $('#tick'+x+'').css("border","1.5px solid black");
   // }
   // if(bladerdg1 < 72.98){
   //  alert('Value Must be Greater than 72.98');
   //  $('#bladerdg1'+x+'').css("border","3px solid red");
   //  success=1;
   // }else{
   //  $('#bladerdg1'+x+'').css("border","1.5px solid black");
   // }
   // if(bladerdg1>73.08){
   //  alert('Value Must be less than 73.08');
   //  $('#bladerdg1'+x+'').css("border","3px solid red");
   //  success=1;
   // }else{
   //  $('#bladerdg1'+x+'').css("border","1.5px solid black");
   // }
   // if(bladerdg2 < 72.98){
   //  alert('Value Must be Greater than 72.98');
   //  $('#bladerdg2'+x+'').css("border","3px solid red");
   //  success=1;
   // }else{
   //  $('#bladerdg2'+x+'').css("border","1.5px solid black");
   // }
   // if(bladerdg2>73.08){
   //  alert('Value Must be less than 73.08');
   //  $('#bladerdg2'+x+'').css("border","3px solid red");
   //  success=1;
   // }else{
   //  $('#bladerdg2'+x+'').css("border","1.5px solid black");
   // }
   // if(hubmin < 72.98){
   //  alert('Value Must be Greater than 72.98');
   //  $('#hubmin'+x+'').css("border","3px solid red");
   //  success=1;
   // }else{
   //  $('#hubmin'+x+'').css("border","1.5px solid black");
   // }
   // if(hubmin>73.08){
   //  alert('Value Must be less than 73.08');
   //  $('#hubmin'+x+'').css("border","3px solid red");
   //  success=1;
   // }else{
   //  $('#hubmin'+x+'').css("border","1.5px solid black");
   // }
   // if(hubmax < 72.98){
   //  alert('Value Must be Greater than 72.98');
   //  $('#hubmax'+x+'').css("border","3px solid red");
   //  success=1;
   // }else{
   //  $('#hubmax'+x+'').css("border","1.5px solid black");
   // }
   // if(hubmax >73.08){
   //  alert('Value Must be less than 73.08');
   //  $('#hubmax'+x+'').css("border","3px solid red");
   //  success=1;
   // }else{
   //  $('#hubmax'+x+'').css("border","1.5px solid black");
   // }
   // if(bushpro < 72.98){
   //  alert('Value Must be Greater than 72.98');
   //  $('#bushpro'+x+'').css("border","3px solid red");
   //  success=1;
   // }else{
   //  $('#bushpro'+x+'').css("border","1.5px solid black");
   // }
   // if(bushpro>73.08){
   //  alert('Value Must be less than 73.08');
   //  $('#bushpro'+x+'').css("border","3px solid red");
   //  success=1;
   // }else{
   //  $('#bushpro'+x+'').css("border","1.5px solid black");
   // }
   // if(flat < 72.98){
   //  alert('Value Must be Greater than 72.98');
   //  $('#flat'+x+'').css("border","3px solid red");
   //  success=1;
   // }else{
   //  $('#flat'+x+'').css("border","1.5px solid black");
   // }
   // if(flat>73.08){
   //  alert('Value Must be less than 73.08');
   //  $('#flat'+x+'').css("border","3px solid red");
   //  success=1;
   // }else{
   //  $('#flat'+x+'').css("border","1.5px solid black");
   // }
   // if(bushht < 72.98){
   //  alert('Value Must be Greater than 72.98');
   //  $('#bushht'+x+'').css("border","3px solid red");
   //  success=1;
   // }else{
   //  $('#bushht'+x+'').css("border","1.5px solid black");
   // }
   // if(bushht>73.08){
   //  alert('Value Must be less than 73.08');
   //  $('#bushht'+x+'').css("border","3px solid red");
   //  success=1;
   // }else{
   //  $('#bushht'+x+'').css("border","1.5px solid black");
   // }
   // if(bushid < 72.98){
   //  alert('Value Must be Greater than 72.98');
   //  $('#bushid'+x+'').css("border","3px solid red");
   //  success=1;
   // }else{
   //  $('#bushid'+x+'').css("border","1.5px solid black");
   // }
   // if(bushid>73.08){
   //  alert('Value Must be less than 73.08');
   //  $('#bushid'+x+'').css("border","3px solid red");
   //  success=1;
   // }else{
   //  $('#bushid'+x+'').css("border","1.5px solid black");
   // }
   // if(rotor < 72.98){
   //  alert('Value Must be Greater than 72.98');
   //  $('#rotor'+x+'').css("border","3px solid red");
   //  success=1;
   // }else{
   //  $('#rotor'+x+'').css("border","1.5px solid black");
   // }
   // if(rotor>73.08){
   //  alert('Value Must be less than 73.08');
   //  $('#rotor'+x+'').css("border","3px solid red");
   //  success=1;
   // }else{
   //  $('#rotor'+x+'').css("border","1.5px solid black");
   // }

     
}
if(success==0){





  console.log( $('#data').serialize());
                    $.ajax({
                  
  
                    type: 'post',
                    url: 'pdf.php',
                    data: $('#data').serialize(),
                    success: function(html){

    alert(html);


                    }})
                  }else{


                  }
                  }
                
  </script>
</body>
</html>