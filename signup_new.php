<?php
session_start();
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
  
    $voter_ID = $_POST['voter_ID']; 
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $age = $_POST['age'];
    $gmail = $_POST['email'];
    $address = $_POST['address'];

  
    if (isset($_FILES['profile_picture'])) 
    {
        $profilePicture = $_FILES['profile_picture']['tmp_name']; 
        $profilePictureName = $_FILES['profile_picture']['name']; 

      
        if (!empty($profilePicture)) 
        {
          
            $profilePictureContent = file_get_contents($profilePicture);

            
            $profilePictureContent = mysqli_real_escape_string($conn, $profilePictureContent);
        } 
        else
         {
           
            $profilePictureContent = "";
        }
    }
     else
      {

        $profilePictureContent = "";
    }

    
    $query_check_id = "SELECT * FROM register WHERE voter_ID = ?";
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
       
        $query_stud_info = "INSERT INTO register (voter_ID, firstname, lastname, age, email, address, profile_picture) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $mng_stud_info = mysqli_prepare($conn, $query_stud_info);

        if ($mng_stud_info) 
        {
            
            mysqli_stmt_bind_param($mng_stud_info, "sssssss", $voter_ID, $fname, $lname, $age, $gmail, $address, $profilePictureContent);
            mysqli_stmt_execute($mng_stud_info);

         
            if (mysqli_stmt_affected_rows($mng_stud_info) > 0) 
            {
                header("location: signup_done.php");
                exit();
            }
        }
        mysqli_stmt_close($mng_stud_info);
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
        <form method="POST" enctype="multipart/form-data">
        <center>

        <table border = 0 style="background-color: transparent; height: 130px; width: 435px; border-radius: 20px;">
        
        <tr><br>
        <td align= "center"><h1 style="font-family: 'Georgia Pro Black'; font-size: 22px; color: brown;"> REGISTER FORM </h1></center></td>
        </tr>

        <tr>
        <td align= "left"><b><label style="font-family: 'Times new roman'; font-size: 18px; color: black; position: absolute; left: 400px;"> <br> Voter's_ID : </b></label></td>
        <td align ="right"><input type="text" name="voter_ID" required style="height:40px; width: 250px; font-size: 20px; font-family: 'Times New Roman'; border-radius: 10px; background-color:antiquewhite; position: absolute; right: 450px;"></td>
        </tr>

        <tr>
        <td align= "left"><b><label style="font-family: 'Times new roman'; font-size: 18px; color: black; position: absolute; left: 400px;"> <br><br> Firstname : </b></label></td>
        <td align ="right"><br><br><br><input type="text" name="firstname" required style="height:40px; width: 250px; font-size: 20px; font-family: 'Times New Roman'; border-radius: 10px; background-color:antiquewhite; position: absolute; right: 450px;"></td>
        </tr>

        <tr>
        <td align= "left"><b><label style="font-family: 'Times new roman'; font-size: 18px; color: black; position: absolute; left: 400px;"> <br><br> Lastname : </b></label></td>
        <td align ="right"><br><br><br><input type="text" name="lastname" required style="height:40px; width: 250px; font-size: 20px; font-family: 'Times New Roman'; border-radius: 10px; background-color:antiquewhite; position: absolute; right: 450px;"></td>
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
        <td align="left"><b><label style="font-family: 'Times new roman'; font-size: 18px; color: black; position: absolute; left: 400px;"> <br><br> Upload Picture: </b></label></td>
        <td align="right"><br><br><br><input type="file" name="profile_picture" style="position: absolute; right: 430px; top: 465px;"></td>
        </tr>


        <tr>
        <td align = "center"><br><br><br><button type="signup" style="width: 250px; height: 44px; background-color:brown; border-radius: 15px;"> <b><h2 style="font-family:'Cooper Black'; font-size: 16px; color: white ">  REGISTER <br> </h2></b></button></td>
        </tr>


        <tr>
        <td align= "center"><br><br><br><br><br><br><br><br><br><br><h3 style="font-family: 'times new roman'; font-size: 12px; color: black; position:absolute; right: 575px; top: 540px;"> <br> Go back? <a href="home.php"> here </h3></center></td>
        </tr>

        </table>
        </center>
        </form>
        </div>

        

    </body>
</html>