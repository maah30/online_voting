<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') 
{
    date_default_timezone_set('Asia/Manila');
    $timestamp = date('Y-m-d H:i:s');

    header("Location: success_vote.php?timestamp=$timestamp");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ONLINE VOTING SYSTEM </title>
</head>
<body>
    <h1>Vote Submitted</h1>
    <p>Thank you for your vote.</p>
</body>
</html>
