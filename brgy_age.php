<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE VOTING SYSTEM</title>
</head>
<body>

<style>
    body 
    {
        background-color: #7469B6;
    }

    .des 
    {
        text-decoration: none;
    }

    .time
    {
        margin-top: 200px;
    }

    .time h1
    {
        font-size: 40px;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }

    .time h4
    {
        font-size: 20px;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }

    .time p
    {
        color: white;
        font-size: 16px;
    }




</style>

<div class="time">
<center>
<h1>You are not eligible to vote due to your age! </h1>

<p>Press OK to go back to login page ...</p>

<!-- Use a form to submit the vote -->
<form action="login.php" method="GET">
    <button type="submit" style="font-family:'Times New Roman', Times, serif; font-size: 28px; border-radius: 20px; position: absolute; top: 340px; right: 420px;">
        <span class="des">OK</span>
    </button>
</form>
</center>
</div>

</body>
</html>
