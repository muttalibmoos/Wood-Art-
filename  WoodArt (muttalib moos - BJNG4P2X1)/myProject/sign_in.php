<?php

require_once "config.php";
require_once "session.php";
$error = '';
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']))
{
$email = trim($_POST['email']);
$password = trim($_POST['password']);

if($query = $db->prepare("SELECT * FROM users WHERE email = ?"))
    {
        if(empty($email))
            {
                $error .='<p classs="error"> please enter your email </p> ';
            }

        if(empty($erorr))
            {
                if($query = $db->prepare("SELECT * FROM users WHERE email = ?"))
                    {
                        $query->bind_parm('s', $email);
                        $query->execute();
                        $row = $query->fetch();
                        if($row)
                            {
                                if(password_verify($password,$row['passowrd']))
                                    {
                                        $_SESSION["userid"] = $row['id'];
                                        $_SESSION["user"] = $row;
                                        header("location: Home.php");
                                        exit;
                                    }
                                        else
                                        {
                                            $error .='<p classs="error"> the word was incorrect !</p> ';
                                        }
                            }
                            else
                                {
                                    $error .='<p classs="error"> this email has not been registered /p> ';
                                }  
                    }

                    $query->close();
            }

            mysqli_close($db);
    }

?>    
































<?php

session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: Home.html");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $username_err = "Please enter email";
    } else{
        $username = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, email, password FROM register WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["emial"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: Home.html");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 