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
            background-image: url(1.jpg);
            background-repeat: no-repeat;
            background-position: right;
            background-position: 480px;
            background-size: 730px;
            image-resolution:unset;
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

        .option h4
        {
            color: beige;
            font-size: 30px;
            margin-top: 45px;
            margin-left: 15px;
            font-family: 'Courier New', Courier, monospace;
        }

        .option :hover
        {
            color:khaki;
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
            top: 1150px;
            width: 750px;
        }
        
        .sign
        {
            text-decoration: none;
            color: white;
            font-size: 14px;
        }
        </style>

         <div class="option">
            <ul class="auto_list">
                   <h4><i class="bi bi-envelope-paper"> BARANGAY ELECTION </i></h4>

                    <div class="home">
                    <a onclick="showDashboard()" id="db_btn" class="slct" href="#"> HOME  | </a>
                    </div>

                    <div class="guide">
                    <a onclick="showDashboard()" id="db_btn" class="slct" href="guide.php"> GUIDELINES | </a>
                    </div>

                    <div class="about">
                    <a onclick="showDashboard()" id="db_btn" class="slct" href="about.php"> ABOUT | </a>
                    </div>
            </ul>   
            </div>

            <div class="desc">
            <table>
            <td style="position: absolute;  left: 60px; top: 230px;" >
            <center>
            <h3> ONLINE VOTING SYSTEM </h3>
            <h4> Online voting system are software platforms used to <br> securely conduct votes and elections. 
                 As a digital platform, <br> they eliminate the need to cast your votes using <br>  paper or having to gather in person. 
            </h4>

            <button style="font-family:'Times New Roman', Times, serif; font-size: 28px; border-radius: 20px;"><a class="des" href="login.php"> Vote NOW </a></button>
            </center>
            </td>
            </table>
            </div>

            <div class="register">
            <table>
            <img src="3.jpg" alt="">
            <td style="position: absolute;  right: 80px; top: 700px;" >
            
            <center>
            <h3> REGISTRATION </h3>
            <h4> This process typically involves providing personal <br> information such as name, address, date of birth, and <br> sometimes identification numbers
            </h4>

            <button style="font-size: 25px; border-radius: 20px;"><a class="rgstr" href="signup_new.php"> Register NOW </a></button>
            </center>
            </td>   
            </table>
            </div>

            <div class="admin">
            <table>
            <img src="8.jpg" alt="">
            
            <div class="login"> 
        <form method="POST">
        <br><br><br><br>
        <table border = 0 style="background-color: transparent; height: 100px; width: 250px; position:absolute; left: 170px; top: 1150px; border-radius: 20px;">
        
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

        <tr>
        <td align= "center"><br><br><br><br><br><br><br><br><br><br><h3 style="font-family: 'times new roman'; font-size: 12px; color: black; position:absolute; left: 195px; top: 1380px;"> <br> Don't have an account? <a class="sign" href="add_admin2.php"> signup heree </h3></center></td>
        </tr>
        </div>
        </form>  

            </table>
            </div>
              
        </div>
        
    </body>

</html>