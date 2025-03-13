<?php

   $conn = mysqli_connect("localhost", "root", "", "gfive") or die(mysqli_error($conn));

   
   try 
   {
      
       $pdo = new PDO("mysql:host=localhost;dbname=gfive", "root", "");
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } 
   catch(PDOException $e) 
   {
       die("Connection failed: " . $e->getMessage());
   }

   
?>
