<?php
    session_start();
    include("connect.php");
 
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $voter_ID = $_POST['Voters_ID'];

        if(!empty($voter_ID)) 
        {
            $query = "SELECT Voters_ID FROM users WHERE Voters_ID= ?";
            $mng = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($mng, "s", $voter_ID);
            mysqli_stmt_execute($mng);
            $result = mysqli_stmt_get_result($mng);

            if($result && mysqli_num_rows($result) > 0) 
            {
                    header("location: voting.php");
                    exit();
                 
            } else
             {
                echo "<script>alert(' Invalid Valid ID! please enter the correct ID. ');</script>";
            }
        }
         else 
         {
            echo "<script>alert('No information found!');</script>";
        }
    }

?>