
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./scrab.css?v=12">
    <script src="./scrab.js?v=10"></script>
</head>
<body>
    <!-- JQUERY STEP -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
<div class="wrapper">
    <form action="makepdf.php" method='post' id="form">
        <div id="wizard">
            <!-- SECTION 1 -->
            <h4></h4>
            <section>
            <label>Starting Serial No: </label>
                <div class="form-row"> <input type="text" class="form-control" placeholder="Inspection Report No" name="starting" id="starting" required> </div>
                <label>Ending Serial No: </label>
                <div class="form-row"> <input type="text" class="form-control" placeholder="Inspection Report No" name="ending" id="ending" required> </div>
                <label>Enter Test Reports For Material For Rotor:</label>
                <div class="form-row"> <textarea type="text" class="form-control" placeholder="Enter Test Reports For Material For Rotor" name="rotor" id="rotor" required> </textarea></div>
                <label>Enter Inspection Report No: </label>
                <div class="form-row"> <input type="text" class="form-control" placeholder="Inspection Report No" name="report" id="report" required> </div>
                
            </section> <!-- SECTION 2 -->
            
        <input type="submit" id="scrab" style="
        background-color: mediumpurple; 
        border: none; 
        color: black;
        width: 200px;
        height: 40px;
        margin-left: 195px;
        margin-top: 50px;
        " />
    </form>

</div>
</body>
</html>




<script>
  
   
// function saveuser(){



//     success=0;
//                    var unamee = $("#unamee").val();
//                    var uemmaill = $("#uemmaill").val();
//                    var upasss = $("#upasss").val();
//                    var cpasss =  $("#cpasss").val();
//                    var unumberr =  $("#unumberr").val();
//                    var documentt =  $("#documentt").val();
//                    var ucityy =  $("#ucityy").val();
//                    var udobb =  $("#udobb").val();
//                    if (unamee.length < 1) {  
//                     $("#wizard").steps('previous');
//                     $("#wizard").steps('previous');
                
//       $('#unamee').css("border","red solid 1px");
//       success=1;
//     }  else{
//         $('#unamee').css("border","black solid 1px");
//     }
//     if (uemmaill.length < 1) {  
//         $("#wizard").steps('previous');
//         $("#wizard").steps('previous');
                 
   
//    $('#uemmaill').css("border","red solid 1px");
//    success=1;
//  }  else{
//      $('#uemmaill').css("border","black solid 1px");
//  }
//  if (upasss.length < 1) {  
//     $("#wizard").steps('previous');
//         $("#wizard").steps('previous');
                 
   
//    $('#upasss').css("border","red solid 1px");
//    success=1;
//  }  else{
//      $('#upasss').css("border","black solid 1px");
//  }
//  if (cpasss.length < 1) {
//     $("#wizard").steps('previous');
//         $("#wizard").steps('previous');
                   
   
//    $('#cpasss').css("border","red solid 1px");
//    success=1;
//  }  else{
//      $('#cpasss').css("border","black solid 1px");
//  }
//  if (unumberr.length < 1) {  
   
//     $("#wizard").steps('previous');
//    $('#unumberr').css("border","red solid 1px");
//    success=1;
//  }  else{
//      $('#unumberr').css("border","black solid 1px");
//  }
//  if (documentt.length < 1) {  
//     $("#wizard").steps('previous');
//    $('#documentt').css("border","red solid 1px");
   
//    success=1;
//  }  else{
//      $('#documentt').css("border","black solid 1px");
//  }
//  if (ucityy.length < 1) {  
   
//    $('#ucityy').css("border","red solid 1px");
//    success=1;
//  }  else{
//      $('#ucityy').css("border","black solid 1px");
//  }
//  if (udobb.length < 1) {  
   
//    $('#udobb').css("border","red solid 1px");
//    success=1;
//  }  else{
//      $('#udobb').css("border","black solid 1px");
//  }

// if(success==0){


   

// var formData = new FormData(document.getElementById("form"));

 
   
//                     $.ajax({
//                     type: 'post',
//                     url: 'makepdf.php',
//                     processData: false,  
//                      contentType: false,
//                      data: formData,
//                     success: function(html){
// if(html=="successfully Registered"){

// alert('successfully Registered');
// location.href = "./login.php"

// }
    
//     }
 
                
                  
//                 });
//             }
        
//         }

</script>