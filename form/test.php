<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="test.php" method="post">
      <input type="checkbox" name="fruits[]" value="apple">
      <input type="checkbox" name="fruits[]" value="orange">
      <input type="submit" name="" value="submit">
    </form>
    <?php
     $fruit = $_POST["fruits"];
     echo $fruit[1];
     ?>
  </body>
</html>
