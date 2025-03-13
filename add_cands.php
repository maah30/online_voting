<?php
include("session_check.php");
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
    $cand_ID = $_POST['cand_ID'];
    $name = $_POST['cand_name'];
    $position = $_POST['position'];

    $query_check = "SELECT * FROM candidates WHERE cand_ID = ?";
    $mng_check = mysqli_prepare($conn, $query_check);
    mysqli_stmt_bind_param($mng_check, "s", $admin_ID);
    mysqli_stmt_execute($mng_check);
    $result_check = mysqli_stmt_get_result($mng_check);

    if (mysqli_num_rows($result_check) > 0) 
    {
        echo "<script>alert('Username already exists!');</script>";
    } 
    else
     {
        $query_check_id = "SELECT * FROM candidates WHERE cand_ID = ?";
        $mng_check_id = mysqli_prepare($conn, $query_check_id);
        mysqli_stmt_bind_param($mng_check_id, "s", $cand_ID);
        mysqli_stmt_execute($mng_check_id);
        $result_check_id = mysqli_stmt_get_result($mng_check_id);

        if (mysqli_num_rows($result_check_id) > 0) 
        {
            echo "<script>alert('Admin ID already exists!');</script>";
        } 
        else 
        {
                $query_stud_info = "INSERT INTO candidates (cand_ID, cand_name, position) VALUES ( ?, ?, ?)";
                $mng_stud_info = mysqli_prepare($conn, $query_stud_info);

                if ($mng_stud_info) 
                {
                    mysqli_stmt_bind_param($mng_stud_info, "sss", $cand_ID, $name, $position);
                    mysqli_stmt_execute($mng_stud_info);

                    if (mysqli_stmt_affected_rows($mng_stud_info) > 0) 
                    {
                    
                                header("location: sk_cand.php");
                                exit();
                        }
                    }
                    mysqli_stmt_close($mng_stud_info);
                
            } 
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
        ONLINE VOTING SYSTEM
        </title>
        
    </head>

    <body>
    <style>
        
        body 
        {
            background-image: url(sign_bg.jpg);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
        </style>

      <div class="signup">
        <form method="POST">
        <center>

        <table border = 0 style="background-color: transparent; height: 130px; width: 435px; border-radius: 20px; margin-top: 80px;">
        
        <tr><br><br>
        <td align= "center"><h1 style="font-family: 'Georgia Pro Black'; font-size: 22px; color: brown;"> INFORMATION FORM </h1></center></td>
        </tr>

        <tr>
        <td align= "left"><b><label style="font-family: 'Times new roman'; font-size: 18px; color: black; position: absolute; left: 400px;"> <br> Candidate_ID : </b></label></td>
        <td align ="right"><input type="text" name="cand_ID" required style="height:40px; width: 250px; font-size: 20px; font-family: 'Times New Roman'; border-radius: 10px; background-color:antiquewhite; position: absolute; right: 450px;"></td>
        </tr>
        
        <tr>
        <td align= "left"><b><label style="font-family: 'Times new roman'; font-size: 18px; color: black; position: absolute; left: 380px;"> <br><br> Candidate_name : </b></label></td>
        <td align ="right"><br><br><br><input type="text" name="cand_name" required style="height:40px; width: 250px; font-size: 20px; font-family: 'Times New Roman'; border-radius: 10px; background-color:antiquewhite; position: absolute; right: 450px;"></td>
        </tr>

        <tr>
        <td align= "left"><b><label style="font-family: 'Times new roman'; font-size: 18px; color: black; position: absolute; left: 380px;"> <br><br> Position : </b></label></td>
        <td align ="right"><br><br><br><input type="text" name="position" required style="height:40px; width: 250px; font-size: 20px; font-family: 'Times New Roman'; border-radius: 10px; background-color:antiquewhite; position: absolute; right: 450px;"></td>
        </tr>

        <tr>
        <td align = "center"><br><br><br><button type="signup" style="width: 250px; height: 44px; background-color:brown; border-radius: 15px;"> <b><h2 style="font-family:'Cooper Black'; font-size: 16px; color: white ">  REGISTER <br> </h2></b></button></td>
        </tr>

        <tr>
        <td align= "center"><h3 style="font-family: 'times new roman'; font-size: 12px; color: white; position:absolute; right: 635px;"> <a style="font-family: 'times new roman'; color:black;" href="sk_cand.php";>Go back?  </h3></center></td>
        </tr>

        </table>
        </center>
        </form>
        </div>

    </body>
</html>