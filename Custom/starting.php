<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <style>
     .inp{
      width:90%;
     }

    </style>
</head>
<body>

    <form action="" method='post' style='margin-top:3%;'>
    <input type="number" name="starting" placeholder="Starting Serial No"  value='<?php echo $_GET['starting_serial_no'] ?>' min='1' required>
    <input type="hidden" id='atsqty' name='atsqty' value='<?php echo $_GET['ats_qty'] ?>' required>
   
    <input type="submit">
    
</form>

<form action="ending.php" method='post' id='data1' style='margin-top:3%;' readonly>
<div>
<label for="pono">PoNo:</label>
<input type="number"  id='pono' name='pono' value='<?php echo $_GET['po_no'] ?>' readonly>


&nbsp;&nbsp;<label for="lno">Line NO:</label>
<input type="number"  name='lno' id='lno' value='<?php echo $_GET['line_no']; ?>' readonly>


&nbsp;&nbsp;<label for="pname">Part Name:</label>
<input type="text"  name='partname' id='pname' value='<?php echo $_GET['product_name'] ?>' readonly></br></br>


<label for="pno">Part NO:</label>
<input type="text"  id='pno' name='partno' value='<?php echo $_GET['product_sku']; ?>' readonly>


&nbsp;&nbsp;<label for="atsqty">ATS Qty:</label>
<input type="number"  id='atsqty' name='atsqty' value='<?php echo $_GET['ats_qty']; ?>' readonly>


&nbsp;&nbsp;<label for="client">Client:</label>
<input type="text"  id='client' name='client' value='<?php echo $_GET['client']; ?>' readonly>


</br></br>
<label for="treport">Test Report:</label>
<input  type='text'  id='treport' name='testreport' />


<label for="bno">Batch No:</label>
<input  type='number'  id='bno' name='batchno' />


<label for="inspdate">Inspection Date:</label>
<input  type='date'  id='inspdate' name='inspdate' />


</br></br>
<label for="vby">Verified By:</label>
<input  type='text'  id='vby' name='verified' />


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

    for($i=1;$i <= $sum; $i++){

        ?>

    <?php    
    echo "
                                                                                                                                                                                                                                                                    
    <tbody>
    <tr>
    <td><input class='inp' type='hidden' value='$starting' name='sno$i' /> $starting</td>
    <td><input class='inp' type='number'  name='od$i' id='od$i'/> </td>
    <td><input class='inp' type='number' name='tick$i' id='tick$i'  /> </td>
    <td><input class='inp' type='number' style='width:35%' name='bladerdg1$i' id='bladerdg1$i' /> <input class='inp' type='number' ' style='width:35%;margin-left:15%;padding:2px' name='bladerdg2$i' id='bladerdg2$i' /> </td>
    <td><input class='inp' type='number' style='width:33%' name='hubmin$i' id='hubmin$i' /> <input class='inp' type='number' style='width:33%;margin-left:15%;padding:2px' name='hubmax$i' id='hubmax$i' /></td>
    <td><input class='inp' type='number' name='bushpro$i' id='bushpro$i' /> </td>
    <td><input class='inp' type='number' name='flat$i' id='flat$i' /> </td>
    <td><input class='inp' type='number' name='bushht$i' id='bushht$i' /> </td>
    <td><input class='inp' type='number' name='bushid$i' id='bushid$i' /> </td>
    <td><input class='inp' type='number' name='rotor$i' id='rotor$i' /> </td>
 
    <input class='inp' type='hidden' name='fixture$i' id='fixture$i' value='OK' />
    <input class='inp' type='hidden' name='see_notes_1$i' id='see_notes_1$i' value='0,0016' />
    <input class='inp' type='hidden' name='fixture2$i' id='fixture2$i' value='<0.0018' />
    <input class='inp' type='hidden' name='fixture3$i' id='fixture3$i' value='OK' />
    <input class='inp' type='hidden' name='fixture4$i' id='fixture4$i'  value='<0.002' />
    <input class='inp' type='hidden' name='fixture5$i' id='fixture5$i' value='< 0.002 ' /> 
   
    </tr>
    </tbody>
  ";

  $starting++;
  
    }

}

?>
  </table>
  <input class='inp' type='hidden' name='xvalue' value=<?php echo $i ?> id='xvalue' />
  <input type='submit' value='submit' style='margin-top: 2%; margin-left: 92%;'/>

  </form>

  <!-- <script>




    function sent(){ -->

<!-- 
// success=0;

//       var xval = document.getElementById("xvalue").value;
// alert(xval)



// for(x=0; x <= xval; x++){

//  var od = $('#od'+x+'').val(); 
//  var tick = $('#tick'+x+'').val(); 
//    var bladerdg1 = $('#bladerdg1'+x+'').val(); 
  
//    var bladerdg2 = $('#bladerdg2'+x+'').val();  
//    var hubmin = $('#hubmin'+x+'').val();  
//    var hubmax = $('#hubmax'+x+'').val();  
//     var bushpro = $('#bushpro'+x+'').val();  
//    var flat = $('#flat'+x+'').val();  
//    var bushht = $('#bushht'+x+'').val();  
//    var bushid = $('#bushid'+x+'').val();  
//    var rotor = $('#rotor'+x+'').val();  


 

 

//  if (od.length < 1) {  
//           $('#od'+x+'').css("border","3px solid red");
//      success=1;
//  }else{
//     $('#od'+x+'').css("border","1.5px solid black");
//  }
//  if (tick.length < 1) {  
//     $('#tick'+x+'').css("border","3px solid red");
//      success=1;
//  }else{
//     $('#tick'+x+'').css("border","1.5px solid black");
//  }
//  if (bladerdg1.length < 1) {  
//     $('#bladerdg1'+x+'').css("border","3px solid red");
//      success=1;
//  }else{
//     $('#bladerdg1'+x+'').css("border","1.5px solid black");
//  }
//  if (bladerdg2.length < 1) {  
//     $('#bladerdg2'+x+'').css("border","3px solid red");
//      success=1;
//  }else{
//     $('#bladerdg2'+x+'').css("border","1.5px solid black");
//  }
//  if (hubmin.length < 1) {  
//     $('#hubmin'+x+'').css("border","3px solid red");
//      success=1;
//  }else{
//     $('#hubmin'+x+'').css("border","1.5px solid black");
//  }
//  if (hubmax.length < 1) {  
//     $('#hubmax'+x+'').css("border","3px solid red");
//      success=1;
//  }else{
//     $('#hubmax'+x+'').css("border","1.5px solid black");
//  }
//  if (bushpro.length < 1) {  
//     $('#bushpro'+x+'').css("border","3px solid red"); 
//      success=1;
//  }else{
//     $('#bushpro'+x+'').css("border","1.5px solid black");
//  }
//  if (flat.length < 1) {  
//     $('#flat'+x+'').css("border","3px solid red");
//      success=1;
//  }else{
//     $('#flat'+x+'').css("border","1.5px solid black");
//  }
//  if (bushht.length < 1) {  
//     $('#bushht'+x+'').css("border","3px solid red"); 
//      success=1;
//  }else{
//     $('#bushht'+x+'').css("border","1.5px solid black");
//  }
//  if (bushid.length < 1) {  
//     $('#bushid'+x+'').css("border","3px solid red"); 
//      success=1;
//  }else{
//     $('#bushid'+x+'').css("border","1.5px solid black");
//  }
//  if (rotor.length < 1) {  
//     $('#rotor'+x+'').css("border","3px solid red");
//      success=1;
//  }else{
//     $('#rotor'+x+'').css("border","1.5px solid black");
//  }

//  if(od < 72.98){
//    $('#od'+x+'').css("border","3px solid red");
 
//      success=1;
// }
// if(od > 73.08){
//    $('#od'+x+'').css("border","3px solid red");
  
//      success=1;
// }
// if(tick < 11.05){
//    $('#tick'+x+'').css("border","3px solid red");
   
//      success=1;
// }
// if(tick > 11.15){
//    $('#tick'+x+'').css("border","3px solid red");
   
//      success=1;
// }

// if(bladerdg1 < 0.81){
//    $('#bladerdg1'+x+'').css("border","3px solid red");
   
//      success=1;
// }

// if(bladerdg1 < 0.11){
//    $('#bladerdg1'+x+'').css("border","3px solid red");
   
//      success=1;
// }

// if(bladerdg2 < 0.81){
//    $('#bladerdg2'+x+'').css("border","3px solid red");
   
//      success=1;
// }

// if(bladerdg2 < 0.11){
//    $('#bladerdg2'+x+'').css("border","3px solid red");
   
//      success=1;
// }
// if(hubmin < 30.935){
//    $('#hubmin'+x+'').css("border","3px solid red");
   
//      success=1;
// }

// if(hubmin < 30.985){
//    $('#hubmin'+x+'').css("border","3px solid red");
   
//      success=1;
// }

// if(hubmax < 30.935){
//    $('#hubmax'+x+'').css("border","3px solid red");
   
//      success=1;
// }

// if(hubmax < 30.985){
//    $('#hubmax'+x+'').css("border","3px solid red");
   
//      success=1;
// }

 

// }
// if(success==0){

// data2 = encodeURIComponent($('#data').serialize())



//   console.log( $('#data').serialize());
//                     $.ajax({
                  
  
//                     type: 'post',
//                     url: 'pdf.php',
//                     data: $('#data').serialize(),
//                     success: function(html){

//     alert(html);
//     window.open('ending.php?'+data2+'');

//                     }})

//                   }






                  // }else{


                  // }
                  // }
                 -->
  <!-- </script> -->
</body>
</html>






