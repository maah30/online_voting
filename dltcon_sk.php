<?php
session_start();
include("connect.php");


if(isset($_SESSION['username'])) 
{
    if(isset($_GET['id']))
    {
        $cand_ID = $_GET['id'];

        $dlt_query_info = "DELETE FROM candidates WHERE cand_ID = ?";
        $dlt_mng_info = mysqli_prepare($conn, $dlt_query_info);

        if(!$dlt_mng_info) 
        {
            $error_message = "Error: " . mysqli_error($conn);
            error_log($error_message); 
            echo "Error deleting record. Please try again later."; 
            exit(); 
        }

        mysqli_stmt_bind_param($dlt_mng_info, "i", $cand_ID);
        mysqli_stmt_execute($dlt_mng_info);

    

        if(mysqli_stmt_affected_rows($dlt_mng_info) > 0) 
        {
            header("Location: sk_cand.php");
            exit();     
        }
         else 
        {
            header("Location: error.php");
            exit();
        }

    } 
    else 
    {
        header("Location: error.php");
        exit(); 
    }
} 
else 
{
    header("Location: login.php");
    exit(); 
}
?>