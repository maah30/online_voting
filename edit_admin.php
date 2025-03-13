<?php
if(isset($_GET['id']))
 {
    include("session_check.php");
    include("connect.php");

    $admin_ID = $_GET['id'];


    $query_log= "SELECT * FROM admin WHERE admin_ID = ?";
    $mng_log = mysqli_prepare($conn, $query_log);
    mysqli_stmt_bind_param($mng_log, "i", $admin_ID);
    mysqli_stmt_execute($mng_log);
    $result_log = mysqli_stmt_get_result($mng_log);
    
    if(mysqli_num_rows($result_log) == 1)
    {
        $row_log = mysqli_fetch_assoc($result_log);
        $firstname = $row_log['fname'];
        $lastname = $row_log['lname'];
        $username = $row_log ['username'];
    } 
    else 
    {
        header("Location: db1.php?id=".$admin_ID);
        exit();
       
    }

 } 
 else 
 {
    header("Location: db1.php");
    exit();
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ONLINE VOTING SYSTEM</title>
    
<style>            
        body 
        {
            background-color: #7469B6;
        }

        .container 
        {
            width: 30%;
            height: 330px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 8px;
 
        }

        h1 
        {
            text-align: center;
            font-family: Georgia Pro Black;
            font-size: 25px;
        }

        form 
        {
            margin-top: 20px;
        }

        label 
        {
            display: inline-block;
            width: 100px; 
            margin-bottom: 5px;
            font-family: 'times new roman';
            font-size: 19px;
        }

        input[type="text"], input[type="email"] 
        {
            width: calc(95% - 110px); 
            padding: 8px;
            margin-bottom: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            vertical-align: middle; 
            font-family: 'calibri';
            font-size: 18px;
        }

        input[type="submit"] 
        {
            background-color: black;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            position: absolute;
            right: 40px;
        }

        input[type="submit"]:hover 
        {
            background-color: skyblue;
        }

        .tbl_contain 
        {
            width: 100%;
            display: flex;
            justify-content: center; 
            margin-top: 60px; 
        }
        
</style>
</head>

<body>
<div class="tbl_contain">
    <div class="container">
        <h1>Edit User Information</h1>
        <br>
        <form action="update_admin.php" method="post">
            <input type="hidden" name="admin_ID" value="<?php echo $admin_ID; ?>">
            <label for="fname"> Firstname:</label>
            <input type="text" id="firstname" name="fname" value="<?php echo $firstname; ?>" required><br><br>
            <label for="lname">Lastname:</label>
            <input type="text" id="lastname" name="lname" value="<?php echo $lastname; ?>" required><br><br>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $username; ?>" required><br><br>
             

            <p style="position: absolute; right: 100px; margin-top: 2px; font-size:20px;"><input type="submit" value="Update">
            <p style="position: absolute; right: 10px; margin-top: 1px; font-size:20px;"><a href="db1.php "><input type="submit" value="BACK"></a></p>  
            
              
        </form>
    </div>
</div>

</body>
</html>
