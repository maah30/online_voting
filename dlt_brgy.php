<?php
session_start();
include("connect.php");


    if(isset($_GET['id'])) {
        $cand_ID = $_GET['id'];

        echo "<script>
                var confirmDelete = confirm('Are you sure you want to delete this user record?');
                if(confirmDelete)
                {
                    window.location.href = 'dltcon_brgy.php?id=$cand_ID';
                } 
                else 
                {
                    window.location.href = 'db.php';
                }
              </script>";
        exit(); 
    } 
    else 
    {
        header("Location: error.php");
        exit();
    }

?>