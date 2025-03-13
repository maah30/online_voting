<?php
require 'connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
 {
    $voterId = $_POST['Voters_ID'];


    $stmt = $pdo->prepare('SELECT voters_ID, has_voted FROM users WHERE voters_ID = :voter_id');
    $stmt->execute(['voter_id' => $voterId]);
    $user = $stmt->fetch();

    if ($user) {
        if ($user['has_voted'] == 1) 
        {
            http_response_code(403); 
            echo '<p style="position: absolute; top: 315px; right: 240px; font-family: georgia pro black; font-size: 15px; color: maroon;"> You have already voted </p>';
        } else 
        {

            $_SESSION['user_id'] = $user['voters_ID'];
            http_response_code(200);
            echo 'Login successful. Session data: ' . print_r($_SESSION, true);

            $stmt = $pdo->prepare('UPDATE users SET has_voted = 1 WHERE voters_ID = :voter_id');
            $stmt->execute(['voter_id' => $voterId]);

            header("location: slct.php");
            exit();
        }
    } else 
    {
       
        http_response_code(401);
        echo '<p style="position: absolute; top: 315px; right: 270px; font-family: georgia pro black; font-size: 15px; color: maroon;"> Invalid Voter ID </p>';
    }
}
?>


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
            background-color: #7469B6;
        }

        .login img
        {
            position: absolute;
            left: 140px;
            top: 90px;
            background-size: 100px ;
            width: 750px;
        }


        
        </style>

        <div class="login"> 
        <form method="POST">
        <br><br><br><br>
        <table border = 0 style="background-color: transparent; height: 250px; width: 270; position:absolute; right: 200px; border-radius: 10px; top: 150px;">
        
        <tr>
        <td align= "center"><h1 style="font-family: 'forte';  font-size: 38px; color: khaki; "> <br> VOTE WISELY!</h1></center></td>
        </tr>
            <img src="5.jpg" alt="">

        <tr>
        <br><br><br>
        <td align ="center"><input type="Voters_ID" name="Voters_ID" required placeholder=" Enter Voter ID " style="height:40px; width: 200px; height: 50px; font-size: 20px; font-family: 'Times New Roman'; border-radius: 10px; background-color: #FBF3D5; position: absolute; top:128px; right: 35px; "></td>
        </tr>

        <tr>
        <td align = "center"><br><button type="login" name="submit" style="width: 130px; height: 40px; background-color: #7469B6; border-radius: 15px;"> <b><h2 style="font-family:'Cooper Black'; font-size: 18px; color: white;margin-top: 10px;"> LOGIN <br> </h2></b></button></td>
        </tr>
        </table>

        <tr>
        <td align= "center"><br><br><br><br><br><br><br><br><br><br><h3 style="font-family: 'times new roman'; font-size: 14px; color: black; position:absolute; right: 270px; top: 360px;"> <br> Admin login, <a class="here" href="admin_login.php" style="text-decoration: none; color: beige; font-size:18px;"> heree! </h3></center></td>
        </tr>
        </div>
        </form>  
        
    </body>
</html>