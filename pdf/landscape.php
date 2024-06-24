<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pdf generator</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<style>
    #form1{
        margin-left: 78px;
    }
</style>
<body>
    
 <script>





$(document).ready(function() {
	var max_fields      = 10; //maximum input boxes allowed
	var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
	var add_button      = $(".add_field_button"); //Add button ID
	
	var x = 1; //initlal text box count

$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < 50){ //max input box allowed
			x++; //text box increment
			$('#xvalue').val(x);
		





      var str = '<div style="margin-top:2%;" class="row">';
      str+='<button class="remove_field">X</button> <div class="col-md-2"><label for="">Insp method</label><br>'+x+'<input type="number" name="ins'+x+'" required></div><div class="col-md-2"><label for="">Vernier</label><br><input type="number"  name="ver'+x+'" required></div>'

str+='<div class="col-md-2"><label for="">Marposs Dial Bore Guage</label><br><input type="number" name="mar'+x+'" required></div><div class="col-md-2"><label for="">Height Guage</label><br><input type="number" name="hei'+x+'" required></div>'
str+='<div class="col-md-2"><label for="">Height Guage</label><br><input type="number" name="heig'+x+'" required></div><div class="col-md-2"><label for="">Vernier</label><br><input type="number" name="vern'+x+'" required></div><div class="col-md-2"><label for="">Dial + Mandrel</label><br><input type="number" name="dai'+x+'" required></div><hr>'

   $(wrapper).append(str);
		
	
	}

	});
	


	$(wrapper).on("click",".remove_field", function(e){ 
	
		e.preventDefault(); $(this).parent('div').remove();
    x--;
    $('#xvalue').val(x);
	
	})


    $(document).ready(function(){
        $("button").click(function(){
          $("div").contents().filter("+")
        });
      });
      
      
});

</script>


<div style="margin-top:8%;" id="form1">
  
        <form action="inspect.php" method='post' class=" input_fields_wrap row">
        <div class="col-md-2">
            <label for="">Insp method</label><br>
        <input type="number" name='ins1' required>
        </div>
        <div class="col-md-2">
     
        <label for="">Vernier</label><br>
        <input type="number" name='ver1' required>
        </div>
        <div class="col-md-2">
    
       <label for="">Marposs Dial Bore Guage</label><br>
        <input type="number" name='mar1' required>
        </div>
        <div class="col-md-2">
        <label for="">Height Guage</label><br>
        <input type="number" name='hei1' required></div>
       <div class="col-md-2">
        <label for="">Height Guage</label><br>
        <input type="number" name='heig1' required></div>
        <div class="col-md-2">
        <label for="">Vernier</label><br>
        <input type="number" name='vern1' required> </div>
       <div class="col-md-2"><br>
        <label for="">Dial + Mandrel</label><br>
        <input type="number" name='dai1' required></div>

        <div style="margin-top:1%;">
        <button class="add_field_button" >Add</button>
     <input type="submit" class="btn btn-danger">
        </div>
        <input type="hidden"  id="xvalue" name="xvalue" value="1">
        </form>
       
      
    </div>
 
</body>

</html>