<?php 
    $db_username="u225552550_inv";
    $db_host="u225552550_inv";
    $db_password="Inv@12345";
    $con=new mysqli("localhost", "$db_host", "$db_password", "$db_username"); 
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

?>