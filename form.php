<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trip Report Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.8.0/css/pikaday.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      
      background-color: #f4f4f4;
      font-size: 18px;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px; 
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 16px;
      box-sizing: border-box;
    }

    button {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <form id="tripForm">
    <label for="companyName">Company Name:</label>
    <input type="text" id="companyName" name="companyName" >

    <label for="customerName">Customer Name:</label>
    <input type="text" id="customerName" name="customerName" >

    <label for="reportingAddress">Reporting Address:</label>
    <input type="text" id="reportingAddress" name="reportingAddress" >

   <label for="tripDate">Trip Date:</label>
    <input type="text" id="tripDate" name="tripDate" allowonly="number" pattern="\d{2}-\d{2}-\d{4}" >

    <label for="bookedBy">Booked By:</label>
    <input type="text" id="bookedBy" name="bookedBy" >

    <button type="submit">Submit</button>
  </form>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.8.0/pikaday.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var picker = new Pikaday({
        field: document.getElementById('tripDate'),
        format: 'DD-MM-YYYY',
        yearRange: [1900, moment().year()],
        showYearDropdown: true,
        autoClose: true,
        
      });       
    });
     function validateDateInput(input) {
      input.value = input.value.replace(/[^0-9-]/g, ''); 
    }
  </script>

</body>
</html>


















