<?php

if(isset($_POST['submit'])) 
{
 $name = $_POST['name'];
 $subject = $_POST['subject'];
 $sender = $_POST['sender'];
 $message = $_POST['message'];

$reciever = "muttalibmoos@gmail.com";
$headers = "From: ".$sender;
$text = "you have recieved an emial form ".$name. ".\n\n".$message;

 mail($reciever, $subject, $text, $headers);
 header("location: index.php?mailsend?");

}
?>