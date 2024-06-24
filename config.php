<?php 
    $db_username="root";
    $db="localhost";
    $db_password="Inv@12345";
    $conn=new mysqli("localhost", "$db_username", "$db_password", "$db"); 
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

?>