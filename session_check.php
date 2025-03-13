<?php
session_start();

define('SESSION_TIMEOUT', 1800); 


if (isset($_SESSION['last_activity'])) 
{
   
    $duration = time() - $_SESSION['last_activity'];

    if ($duration > SESSION_TIMEOUT) 
    {
        session_unset();
        session_destroy();
        header("Location: home.php");
        exit();
    }
}


$_SESSION['last_activity'] = time();

if (!isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}
?>
