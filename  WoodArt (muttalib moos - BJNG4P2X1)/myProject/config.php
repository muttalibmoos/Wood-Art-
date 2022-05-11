<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "WoodArt"; 

/* Attempt to connect to MySQL database */
$db = mysqli_connect($dbServername, $dbUsername, $dbPassword,$dbName );
 
// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>