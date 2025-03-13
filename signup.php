<?php
session_start();
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
    
    $voter_ID = $_POST['voters_ID']; // Corrected variable name
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gmail = $_POST['email'];
    $address = $_POST['address'];

    $query_check_id = "SELECT * FROM users WHERE voters_ID = ?";
    $mng_check_id = mysqli_prepare($conn, $query_check_id);
    mysqli_stmt_bind_param($mng_check_id, "s", $voter_ID);
    mysqli_stmt_execute($mng_check_id);
    $result_check_id = mysqli_stmt_get_result($mng_check_id);

    if (mysqli_num_rows($result_check_id) > 0) 
    {
        echo "<script>alert('Student ID already exists!');</script>";
    } 
    else 
    {
        $query_stud_info = "INSERT INTO users (voters_ID, fname, lname, age, email, address) VALUES (?, ?, ?, ?, ?, ?)";
        $mng_stud_info = mysqli_prepare($conn, $query_stud_info);

        if ($mng_stud_info) 
        {
            mysqli_stmt_bind_param($mng_stud_info, "ssssss", $voter_ID, $fname, $lname, $age, $gmail, $address);
            mysqli_stmt_execute($mng_stud_info);

            if (mysqli_stmt_affected_rows($mng_stud_info) > 0) 
            {
                header("location: welcome_stud.php"); // Corrected filename
                exit();
            }
        }
        mysqli_stmt_close($mng_stud_info);
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>
            STUDENT INFORMATION SYSTEM
        </title>
        
    </head>

    <body>
    <style> 
        
        body 
        {
            background-color: #7469B6;
        }
    </style>

      <div class="signup">
        <form method="POST">
        <center>

        <table border = 0 style="background-color: transparent; height: 130px; width: 435px; border-radius: 20px;">
        
        <tr><br>
        <td align= "center"><h1 style="font-family: 'Georgia Pro Black'; font-size: 22px; color: brown;"> REGISTER FORM </h1></center></td>
        </tr>

        <tr>
        <td align= "left"><b><label style="font-family: 'Times new roman'; font-size: 18px; color: black; position: absolute; left: 400px;"> <br> Voter's_ID : </b></label></td>
        <td align ="right"><input type="text" name="voters_ID" required style="height:40px; width: 250px; font-size: 20px; font-family: 'Times New Roman'; border-radius: 10px; background-color:antiquewhite; position: absolute; right: 450px;"></td>
        </tr>

        <tr>
        <td align= "left"><b><label style="font-family: 'Times new roman'; font-size: 18px; color: black; position: absolute; left: 400px;"> <br><br> Firstname : </b></label></td>
        <td align ="right"><br><br><br><input type="text" name="fname" required style="height:40px; width: 250px; font-size: 20px; font-family: 'Times New Roman'; border-radius: 10px; background-color:antiquewhite; position: absolute; right: 450px;"></td>
        </tr>

        <tr>
        <td align= "left"><b><label style="font-family: 'Times new roman'; font-size: 18px; color: black; position: absolute; left: 400px;"> <br><br> Lastname : </b></label></td>
        <td align ="right"><br><br><br><input type="text" name="lname" required style="height:40px; width: 250px; font-size: 20px; font-family: 'Times New Roman'; border-radius: 10px; background-color:antiquewhite; position: absolute; right: 450px;"></td>
        </tr>

        <tr>
        <td align= "left"><b><label style="font-family: 'Times new roman'; font-size: 18px; color: black; position: absolute; left: 400px;"> <br><br>Age : </b></label></td>
        <td align ="right"><br><br><br><input type="text" name="age" required style="height:40px; width: 250px; font-size: 20px; font-family: 'Times New Roman'; border-radius: 10px; background-color:antiquewhite; position: absolute; right: 450px;"></td>
        </tr>

        <tr>
        <td align= "left"><b><label style="font-family: 'Times new roman'; font-size: 18px; color: black; position: absolute; left: 400px;"> <br><br> Email : </b></label></td>
        <td align ="right"><br><br><br><input type="email" name="email" required style="height:40px; width: 250px; font-size: 20px; font-family: 'Times New Roman'; border-radius: 10px; background-color:antiquewhite; position: absolute; right: 450px;"></td>
        </tr>

        
        <tr>
        <td align= "left"><b><label style="font-family: 'Times new roman'; font-size: 18px; color: black; position: absolute; left: 400px;"> <br><br> Address : </b></label></td>
        <td align ="right"><br><br><br><input type="text" name="address" required style ="height:40px; width: 250px; font-size: 20px; font-family: 'Times New Roman'; border-radius: 10px; background-color:antiquewhite; position: absolute; right: 450px" ></td>
        </tr>

        <tr>
        <td align = "center"><br><br><br><button type="signup" style="width: 250px; height: 44px; background-color:brown; border-radius: 15px;"> <b><h2 style="font-family:'Cooper Black'; font-size: 16px; color: white ">  REGISTER <br> </h2></b></button></td>
        </tr>


        <tr>
        <td align= "center"><br><br><br><br><br><br><br><br><br><br><h3 style="font-family: 'times new roman'; font-size: 12px; color: rgb(62, 42, 80); position:absolute; right: 575px; top: 480px;"> <br> Go back? <a href="login.php"> here </h3></center></td>
        </tr>

        </table>
        </center>
        </form>
        </div>

    </body>
</html>