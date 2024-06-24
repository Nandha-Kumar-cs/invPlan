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
</head>
<body>
    <div class="container mt-5">
        <form action="makepdf.php" method='post'>
           <label for="staringno">Starting Serial No</label>
           <input type="number" placeholder="Enter Starting Serial No" name="startingno" class='mb-4' required><br>
           <label for="endingno">Ending Serial No</label>
           <input type="number" placeholder="Enter Ending Serial No" name="endingno" class='mb-4' required><br>
           <label for="">Test Reports for Material for Rotor</label>
           <textarea name="rotor" id="" cols="30" rows="10" placeholder="Test Reports for Material for Rotor" required></textarea><br>
           <label for=""> Inspection.Report No.</label>
           <input type="text" name="reportno" placeholder="Enter Inspection Report No" class='mt-4' required><br>
           <input type="submit" class="btn btn-danger">
        </form>
    </div>
</body>
</html>