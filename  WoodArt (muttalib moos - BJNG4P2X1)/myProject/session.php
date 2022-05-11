<?php
// starting the session 

session_start();
// if the user happens to be signed in theyll be redirected to the home pages 
if(isset($_SESSION["userid"]) && $_SESSION["userid"] === true)
{
    header("location: Home.php");
    exit;
}

?>