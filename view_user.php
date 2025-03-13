<?php
include("session_check.php");
include("connect.php");

if(isset($_GET['id'])) 
{
    $voters_ID = $_GET['id'];

    $query_info = "SELECT * FROM users WHERE voters_ID = ?";
    $mng_info = mysqli_prepare($conn, $query_info);
    mysqli_stmt_bind_param($mng_info, "i", $voters_ID);
    mysqli_stmt_execute($mng_info);
    $result_info = mysqli_stmt_get_result($mng_info);

    if(mysqli_num_rows($result_info) > 0) 
    {
        $row_info = mysqli_fetch_assoc($result_info);
        $age = $row_info['age'];
        $email = $row_info['email'];
        $address = $row_info['address'];
    } 
    else 
    {
        echo "Student not found.";
        exit();
    }
} 
else 
{
    echo "ID not provided.";
    exit();
}
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> ONLINE VOTING SYSTEM </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body 
        {
            background-color: #7469B6;
            font-family: Arial, sans-serif;
            margin-top: 120px;
        }

        .container 
        {
            height: 350px;
            width: 35%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;

        }
        
        h1 
        {
            text-align: center;
            font-family: 'Georgia Pro Black';
            font-size: 30px;
        }
        
        table 
        {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th, td 
        {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            font-size: 18px;
            color: white;
        }
        
        th 
        {
            font-family: 'Times new roman';
            font-size: 25px;
            color: black;
        }
        
        .tbl_contain 
        {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 60px; 
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
            right: 450px;
        }
    </style>
</head>
<body>
    <div class="tbl_contain">
    <div class="container">
        <br>
        <h1> OTHER INFORMATION </h1>
        <table>

            <tr>
                <th>Age : </th>
                <td><?php echo  $age; ?></td>
            </tr>

            <tr>
                <th>Email : </th>
                <td><?php echo  $email; ?></td>
            </tr>

            <tr>
                <th> Address : </th>
                <td><?php echo  $address; ?></td>
            </tr>


        </table>
        <br><br><br>
        <p style="position: absolute; right: 590px; margin-top: 10px; font-size:20px;"><a href="edit_old.php?id=<?php echo $voters_ID; ?>"><i class='bi bi-pen' style="color: white;"></i></a></p>
        <p style="position: absolute; right: 550px; margin-top: 10px; font-size:20px;" ><a href="dlt_old.php?id=<?php echo $voters_ID; ?>"><i class='bi bi-trash3' style="color: white;"></i></a></p>
        <a href="old_voters.php"><input type="submit" value="BACK"></a>

    </div>
    </div>
</body>
</html>