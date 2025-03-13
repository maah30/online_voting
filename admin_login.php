<?php
    session_start();
    include("connect.php");
 
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $username = $_POST['username'];
        $pass = $_POST['password'];

        if(!empty($username) && !empty($pass) && !is_numeric($username)) 
        {
            $query = "SELECT username, password FROM admin WHERE username = ? AND password = ?";
            $mng = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($mng, "ss", $username, $pass);
            mysqli_stmt_execute($mng);
            $result = mysqli_stmt_get_result($mng);

            if($result && mysqli_num_rows($result) > 0) 
            {
                    $_SESSION['username'] = $username;
                    header("location: db.php");
                    exit();
                 
            } else
             {
                echo "<script>alert('Wrong username or password');</script>";
            }
        }
         else 
         {
            echo "<script>alert('No information found!');</script>";
        }
    }

?>


<html lang="en">
    <head>
        <title>
        ONLINE VOTING SYSTEM
        </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        
    </head>

    <body>
    <style>
        
        body 
        {
            background-color: #7469B6;
         
        }

        .option a
        {
            color: black;
            font-size: 32px;
        }

        .home 
        {
            font-family: Monotype Corsiva;
            color: black;
            font-size: 20px;
            position: absolute;
            right: 440px;
            top: 35px;
        }

        .about
        {
            font-family: Monotype Corsiva;
            color: black;
            font-size: 25px;
            position: absolute;
            right: 60px;
            top: 35px;
        }

        .guide
        {
            font-family: Monotype Corsiva;
            color: black;
            font-size: 30px;
            position: absolute;
            right: 205px;
            top: 35px;
        }

     
      

        .slct 
        {
            text-decoration: none;
        }

        .des
        {
            text-decoration: none;
        }

        .rgstr
        {
            text-decoration: none;
        }

        .desc h3 
        {
            color: black;
            font-size: 30px;
        }

        .desc h4 
        {
            color: white;
            font-size: 18px;
            font-family: calibri;
        }

        .desc button :hover
        {
            color: black;
        }

        .register button :hover
        {
            color: black;
        }

        .register h3 
        {
            color: black;
            font-size: 35px;
        }

        .register h4 
        {
            color: white;
            font-size: 20px;
            font-family: calibri;
        }

        .register img
        {
            position: absolute;
            left: 100px;
            top: 600px;
        }

        .admin img
        {
            position: absolute;
            left: 450px;
            top: 80px;
            width: 750px;
        }
        
        .sign
        {
            text-decoration: none;
            color: white;
            font-size: 10px;
        }

        </style>

         <div class="option">
            <div class="admin">
            <table>
            <img src="8.jpg" alt="">
            
            <div class="login"> 
        <form method="POST">
        <br><br><br><br>
        <table border = 0 style="background-color: transparent; height: 100px; width: 250px; position:absolute; left: 180px; top: 150px; border-radius: 20px;">
        
        <tr>
        <td align= "center"><h1 style="font-family: 'forte'; font-size: 30px; color: khaki;"> <br> ADMIN LOGIN </h1></center></td>
        </tr>
        
        <tr>
        <br><br><br>
        <td align ="center"><input type="text" name="username" required placeholder=" Enter username" style="height:40px; width: 200px; font-size: 20px; font-family: 'Times New Roman'; border-radius: 10px; background-color: antiquewhite;"></td>
        </tr>

        <tr>
        <br><br><br>
        <td align ="center"><input type="password" name="password" required placeholder=" Enter password" style="height:40px; width: 200px; font-size: 20px; font-family: 'Times New Roman'; border-radius: 10px; background-color:antiquewhite; "></td>
        </tr>

        <tr>
        <td align = "center"><br><button type="login" name="submit" style="width: 130px; height: 30px; background-color:rgb(221, 80, 80); border-radius: 30px;"> <b><h2 style="font-family:'Cooper Black'; font-size: 10px; "> LOGIN <br> </h2></b></button></td>
        </tr>
        </table>

        </form>  

            </table>
            </div>
              
        </div>
        
    </body>
</html>