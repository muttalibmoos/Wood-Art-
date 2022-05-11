<?php

require_once "config.php";
require_once "session.php";

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']))
{
$firstName = trim($_POST['firstName']);
$lastName = trim($_POST['lastName']);
$phoneNumber = trim($_POST['phoneNumber']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$password_hash = password_hash($password,PASSWORD_BCRYPT);

if($query = $db->prepare("SELECT * FROM users WHERE email = ?"))
{
    $error = '';

    $query->bind_parm('s',$email);
    $query->execute();

    $query->store_result();
        if ($query->num_rows > 0)
        {
$error .='<p classs="error"> the email address has been used already</p> ';
        }
        else 
        {
            if(Strlen($password) <6)
            {
                $error .='<p classs="error"> the password must have atleast 6 characters</p> ';
            }
        }

        if (empty($error))
        {
            $insertQuery = $db->prepare("INSERT INTO register (firstName,LastName, phoneNumbr, email, password) VALUES (?,?,?);");
            $insertQuery->bind_parm("sss", firstName, $email, $password_hash);
            $result = $insertQuery->execute();
            if($result)
            {
                $error .='<p classs="> registartion successful </p> ';
            }
            else
            {
                $error .='<p classs="error"> something went wrong </p> ';
            }
        }
    }  
    $query->close();
    $insertQuery->close();
    mysqli_close($db);   
}

if(!empty($firstName) || !empty($lastName) || !empty($phoneNumber) || !empty($email) || !empty($password))
{
    $host = "localhost";
    $dbUsername = "root";
    $dbPassowrd = "";
    $dbName = "WoodArt";

    // to create the connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if(mysqli_connect_error())
    {
        die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
    }
    else 
    {
        $SELECT = "SELECT email From register Where email = ? Limit 1";
        $INSERT = "INSERT Into register (firstName, lastName, phoneNumber, email, password) values(?,?,?,?,?)";

        // preparing the statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_parm("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum==0)
        {
            $stmt->close();

            $stmt = $conn->prepare(INSERT);
            $stmt->bind_param("ssssii", $firstName, $lastName, $phoneNumber, $email, $password);
            $stmt->execute();

            echo "your details have been saved successfully";
        }
        else
        {
            echo " someone has already registered with these details";
        }
        $stmt->close();
        $conn->close();
    }
}
else
{
 echo "All fields are required";
 die();
}

?>


