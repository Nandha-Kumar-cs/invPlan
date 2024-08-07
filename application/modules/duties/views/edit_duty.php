<!-- Feat Pagalaven -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Duty Slip</title>
    <style>
        input{
    width: 95%;
    margin: 8px;
    border: 2px solid gainsboro;
    height: 26px;
    border-radius: 5px;
        }
        label{
            margin: 8px;
        }
        .submit{
        
            height: 35px;
    width: 100px;
    color: white;
    background-color: #5cb85c;
    cursor: pointer;
        }
        .flexable{
            display: flex;
        }
        .flexable-width{
            width: 48%;
        }
        .disabled{
            color: gray;
    background: gainsboro;
        }

        input:focus {
    border-color: #007bff; /* Change this to your desired hover color */
}
   
    </style>
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>
<body>
<script>
        // Function to display an alert message
        function showAlert(message) {
            alert(message);
        }
</script>

 
<?php if ($this->session->flashdata('alert')): ?>
        <script>
            // Display the alert message
            showAlert('<?= $this->session->flashdata('alert') ?>');
        </script>
    <?php endif; ?>

<form  name="dutyForm"  action="<?= site_url('duties/edit_save_duty/'.$duties->id) ?>" method="post" onsubmit="validateForm(event)">
<div>
    <h1>Edit Duty slip</h1>

    <div class="flexable">
    <div class="flexable-width" style="width:33%;margin-top: 0.5%;">
        <label for="">Company Name</label>
        <div>
            <select name="comp_name" id="comp_name" tabindex="1" required>
                <option style="text-align: center;" value="">---</option>
                <?php foreach ($clients as $client): ?>
                    <option value="<?=$client->client_name?>" <?php if ($client->client_name == $duties->comp_name) echo 'selected'; ?>>
                        <?=$client->client_name?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
    </div>

    <div class="flexable-width" style="width: 8%; margin: auto; margin-left: 8px;">
        <label for="" style="margin-left: 0;">Salutation</label>
        <div>
            <select name="salutination" id="salutination" tabindex="2">
                <option value="" <?php if ($duties->salutination == '') echo 'selected'; ?>>None</option>
                <option value="Mr." <?php if ($duties->salutination == 'Mr.') echo 'selected'; ?>>Mr.</option>
                <option value="Mrs." <?php if ($duties->salutination == 'Mrs.') echo 'selected'; ?>>Mrs.</option>
                <option value="Ms." <?php if ($duties->salutination == 'Ms.') echo 'selected'; ?>>Ms.</option>
            </select>
        </div>
    </div>

    <div class="flexable-width" style="width:33%">
        <label for="">Customer Name</label>
        <div>
            <input type="text" name="cust_name" id="cust_name" tabindex="2" value="<?=$duties->cust_name?>">
        </div>
    </div>

    <div style="width:29%">
        <label for="">Trip Date</label>
        <div>
            <input type="date" name="trip_date" id="trip_date" tabindex="3" value="<?=$duties->trip_date?>">
        </div>
    </div>
</div>

<div class="flexable">
    <div class="flexable-width">
        <label for="">Reporting Address</label>
        <div>
            <input type="text" name="report_address" id="report_address" tabindex="4" value="<?=$duties->reporting_address?>">
        </div>
    </div>

    <div class="flexable-width">
        <label for="">Booked By</label>
        <div>
            <input type="text" name="booked_by" id="booked_by" tabindex="5" value="<?=$duties->booked_by?>">
        </div>
    </div>
</div>

<div class="flexable">
    <div class="flexable-width">
        <label for="">Vehicle No.</label>
        <div>
            <input type="text" name="vehicle_no" id="vehicle_no" tabindex="6" value="<?=$duties->vehicle_no?>">
        </div>
    </div>

    <div class="flexable-width">
        <label for="">Vehicle Type</label>
        <div>
            <input type="text" name="vehicle_type" id="vehicle_type" tabindex="7" value="<?=$duties->vehicle_type?>">
        </div>
    </div>
</div>

<div class="flexable">
    <div class="flexable-width">
        <label for="">Driver Name</label>
        <div>
            <input type="text" name="driver_name" id="driver_name" tabindex="8" value="<?=$duties->driver_name?>">
        </div>
    </div>

    <div class="flexable-width">
        <label for="">Mobile Number</label>
        <div>
            <input type="text" name="mobile_no" id="mobile_no" tabindex="9" value="<?=$duties->mobile_number?>">
        </div>
    </div>
</div>

<div class="flexable">
    <div class="flexable-width">
        <label for="">Starting KM</label>
        <div>
            <input type="number" name="staring_km" id="staring_km" oninput="startkm()" tabindex="10" value="<?=$duties->starting_km?>">
        </div>
    </div>

    <div class="flexable-width">
        <label for="">Closing KM</label>
        <div>
            <input type="number" name="closing_km" id="closing_km" oninput="closingkm()" tabindex="11" value="<?=$duties->closing_km?>">
        </div>
    </div>
</div>

<div class="flexable">
    <div class="flexable-width">
        <label for="">Starting Time</label>
        <div>
            <input type="time" name="staring_time" id="staring_time" oninput="startingtime()" tabindex="12" value="<?=$duties->starting_time?>">
        </div>
    </div>

    <div class="flexable-width">
        <label for="">Closing Time</label>
        <div>
            <input type="time" name="closing_time" id="closing_time" oninput="closingtime()" tabindex="13" value="<?=$duties->closing_time?>">
        </div>
    </div>
</div>

<div class="flexable">
    <div class="flexable-width">
        <label for="">Total KM</label>
        <div>
            <input type="number" name="total_km" id="total_km" readonly class="disabled" value="<?=$duties->total_km?>">
        </div>
    </div>

    <div class="flexable-width">
        <label for="">Total Time</label>
        <div>
            <input type="time" name="total_time" id="total_time" readonly class="disabled" value="<?=$duties->total_time?>">
        </div>
    </div>
</div>

</div>






    <div style="text-align: right;right: 51px; position: absolute;">
       <input type="submit" class="submit" value="Save Edit" tabindex="14" >
    </div>
  
<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

</div>
</form>

<style>
    .select2-selection{
        height: 27px;
    margin-top: 2px;
    text-align: center;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 28px;
    margin-top: -7px;
}
.select2-container--default .select2-search--dropdown .select2-search__field {
    border: 1px solid #aaa;
    width: 90%;
}
.select2-results{
    text-align: center;
}

.select2-selection:focus{
    border-color: #007bff; 
}
</style>
<script>
document.addEventListener("DOMContentLoaded", function() {
  // Get current date in yyyy-mm-dd format
  var currentDate = new Date().toISOString().split('T')[0];

  // Set default value of date input to current date
  document.getElementById('trip_date').value = currentDate;

  // Set min attribute of date input to current date
  document.getElementById('trip_date').setAttribute('min', currentDate);
});



  $('#comp_name').select2({
    tags:true,
  });

  $('#salutination').select2({
    tags:true,
  })



  $(document).on('select2:open', () => {
    document.querySelector('.select2-container--default .select2-search--dropdown .select2-search__field').focus();
  });

    document.getElementById('comp_name').focus();


    function validateForm(event) {
            // Prevent the form from submitting by default
            event.preventDefault();

          var comp_name =  $('#comp_name').val();
           var sal =  $('#salutination').val()
            if(comp_name =! '' && sal == ''){
                
                alert('Salutination cannot be empty');
                return false;
            }else{

                document.forms["dutyForm"].submit();
                return true;
            }


           
    }

    function startkm() {
        var endingkm = parseFloat(document.getElementById('closing_km').value);
        var startkm = parseFloat(document.getElementById('staring_km').value);
        if(endingkm == '' || startkm >= endingkm){
          
        }else{
 var totalkm = endingkm - startkm;
 document.getElementById('total_km').value = totalkm;

        }
    
    }

    function closingkm(){
        var endingkm =parseFloat( document.getElementById('closing_km').value);
        var startkm = parseFloat(document.getElementById('staring_km').value);
        if(startkm == '' ||startkm >= endingkm){
          
        }else{
 var totalkm = endingkm - startkm;
 document.getElementById('total_km').value = totalkm;

        }

    }
  function startingtime() {
            calculateTimeDifference();
        }

        function closingtime() {
            calculateTimeDifference();
        }

        function calculateTimeDifference() {
        
            var startingTimeInput = document.getElementById("staring_time");
            var closingTimeInput = document.getElementById("closing_time");
            var totalTimeInput = document.getElementById("total_time");

            if(startingTimeInput == ''){

            }else if(closingTimeInput==''){

            }else{

            var startingTime = startingTimeInput.valueAsDate;
            var closingTime = closingTimeInput.valueAsDate;

            // Calculate the time difference in milliseconds
            var timeDifference = closingTime - startingTime;

            // Convert the time difference to hours and minutes
            var hours = Math.floor(timeDifference / (60 * 60 * 1000));
            var minutes = Math.floor((timeDifference % (60 * 60 * 1000)) / (60 * 1000));

            totalTimeInput.value = hours.toString().padStart(2, '0') + ":" + minutes.toString().padStart(2, '0');
            
        }
    }

</script>
</body>
</html>