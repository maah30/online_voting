<?php
include("session_check.php");
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
    $admin_ID = $_POST['admin_ID'];
    $username = $_POST['username'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $pass = $_POST['password'];
    $con_pass = $_POST['con_pass'];

    $query_check = "SELECT * FROM admin WHERE username = ? OR admin_ID = ?";
    $mng_check = mysqli_prepare($conn, $query_check);
    mysqli_stmt_bind_param($mng_check, "ss", $username, $admin_ID);
    mysqli_stmt_execute($mng_check);
    $result_check = mysqli_stmt_get_result($mng_check);

    if (mysqli_num_rows($result_check) > 0) 
    {
        echo "<script>alert('Username already exists!');</script>";
    } 
    else
     {
        $query_check_id = "SELECT * FROM admin WHERE admin_ID = ?";
        $mng_check_id = mysqli_prepare($conn, $query_check_id);
        mysqli_stmt_bind_param($mng_check_id, "s", $admin_ID);
        mysqli_stmt_execute($mng_check_id);
        $result_check_id = mysqli_stmt_get_result($mng_check_id);

        if (mysqli_num_rows($result_check_id) > 0) 
        {
            echo "<script>alert('Student ID already exists!');</script>";
        } 
        else 
        {
            if ($pass === $con_pass) 
            {
                $query_stud_info = "INSERT INTO admin (admin_ID, fname, lname, username, password) VALUES ( ?, ?, ?, ?, ?)";
                $mng_stud_info = mysqli_prepare($conn, $query_stud_info);

                if ($mng_stud_info) 
                {
                    mysqli_stmt_bind_param($mng_stud_info, "ssssi", $admin_ID, $firstname, $lastname, $username, $pass);
                    mysqli_stmt_execute($mng_stud_info);

                    if (mysqli_stmt_affected_rows($mng_stud_info) > 0) 
                    {
                    
                                header("location: db1.php");
                                exit();
                        }
                    }
                    mysqli_stmt_close($mng_stud_info);
                }
                else {
                    echo "<script> alert ('Passwords do not match');</script>";
                }
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

        <table border = 0 style="background-color: transparent; height: 130px; width: 435px; border-radius: 20px;">
        
        <tr><br><br>
        <td align= "center"><h1 style="font-family: 'Georgia Pro Black'; font-size: 22px; color: brown;"> INFORMATION FORM </h1></center></td>
        </tr>

        <tr>
        <td align= "left"><b><label style="font-family: 'Times new roman'; font-size: 18px; color: black; position: absolute; left: 430px;"> <br> Admin_ID : </b></label></td>
        <td align ="right"><input type="text" name="admin_ID" required style="height:40px; width: 250px; font-size: 20px; font-family: 'Times New Roman'; border-radius: 10px; background-color:antiquewhite; position: absolute; right: 450px;"></td>
        </tr>
        
        <tr>
        <td align= "left"><b><label style="font-family: 'Times new roman'; font-size: 18px; color: black; position: absolute; left: 430px;"> <br><br> Username : </b></label></td>
        <td align ="right"><br><br><br><input type="text" name="username" required style="height:40px; width: 250px; font-size: 20px; font-family: 'Times New Roman'; border-radius: 10px; background-color:antiquewhite; position: absolute; right: 450px;"></td>
        </tr>

        <tr>
        <td align= "left"><b><label style="font-family: 'Times new roman'; font-size: 18px; color: black; position: absolute; left: 430px;"> <br><br> Firstname : </b></label></td>
        <td align ="right"><br><br><br><input type="text" name="fname" required style="height:40px; width: 250px; font-size: 20px; font-family: 'Times New Roman'; border-radius: 10px; background-color:antiquewhite; position: absolute; right: 450px;"></td>
        </tr>

        <tr>
        <td align= "left"><b><label style="font-family: 'Times new roman'; font-size: 18px; color: black; position: absolute; left: 430px;"> <br><br> Lastname : </b></label></td>
        <td align ="right"><br><br><br><input type="text" name="lname" required style="height:40px; width: 250px; font-size: 20px; font-family: 'Times New Roman'; border-radius: 10px; background-color:antiquewhite; position: absolute; right: 450px;"></td>
        </tr>

        <tr>
        <td align= "left"><b><label style="font-family: 'Times new roman'; font-size: 18px; color: black; position: absolute; left: 430px;"> <br><br> Password : </b></label></td>
        <td align ="right"><br><br><br><input type="password" name="password" required style="height:40px; width: 250px; font-size: 20px; font-family: 'Times New Roman'; border-radius: 10px; background-color:antiquewhite; position: absolute; right: 450px;"></td>
        </tr>

        <tr>
        <td align= "left"><b><label style="font-family: 'Times new roman'; font-size: 18px; color: black; position: absolute; left: 360px;"> <br><br> Confirm Password : </b></label></td>
        <td align ="right"><br><br><br><input type="password" name="con_pass" required style="height:40px; width: 250px; font-size: 20px; font-family: 'Times New Roman'; border-radius: 10px; background-color:antiquewhite; position: absolute; right: 450px;"></td>
        </tr>


        <tr>
        <td align = "center"><br><br><br><button type="signup" style="width: 250px; height: 44px; background-color:brown; border-radius: 15px;"> <b><h2 style="font-family:'Cooper Black'; font-size: 16px; color: white ">  REGISTER <br> </h2></b></button></td>
        </tr>

        <tr>
        <td align= "center"><h3 style="font-family: 'times new roman'; font-size: 12px; color: white; position:absolute; right: 635px;"> <a style="font-family: 'times new roman'; color:black;" href="db1.php";>Go back?  </h3></center></td>
        </tr>

        </table>
        </center>
        </form>
        </div>

    </body>
</html>