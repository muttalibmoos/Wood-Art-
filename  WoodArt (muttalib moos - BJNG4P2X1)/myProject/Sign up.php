
<?php

require_once "config.php";
require_once "session.php";

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']))
{
$firstName = trim($_POST['firstName']);
$lastName = trim($_POST['lastName']);
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
            $insertQuery = $db->prepare("INSERT INTO users (firstName,LastName, phoneNumbr, email, password) VALUES (?,?,?);");
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

?>

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            WoodArt_Sign_up_Page
        </title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/">

        <!-- Bootstrap core CSS -->
        <link href="assets/dist/css/bootstrap.css" rel="stylesheet">

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
            
            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
        <!-- Custom styles for this template -->
        <link href="Sign_in.css" rel="stylesheet">
    </head>

    <body>

        <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <a class="navbar-brand" href="#">WoodArt</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="Home.php">Home<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Products.php">Products<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Projects.php">Projects<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Consultation.php">Consultation<span class="sr-only">(current)</span></a>
                        </li>

                    </ul>
                </div>
                <div>
                    <ul class="mt-3">
                        <li class="cart">
                            <a href="cart.html" class="btn btn-primary ml-2 my-2 my-sm-0" role="button" type="submit">
                                <ion-icon name="basket"></ion-icon>Cart(<span>0</span>)
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>




        <form class="form-signin">
            <form action="sign_up.php" method="POST">
                <div class="text-center mb-4">
                    <img class="mb-4" src="images/woodlogo.jpg" alt="Avatar" width="350" height="250">
                    <h1 class="h3 mb-3 font-weight-normal">WoodArt Sign up</h1>
                </div>

                <div class="form-label-group">
                    <input type="name" id="firstName" name="firstName" class="form-control" placeholder="First Name" required>
                    <label for="First Name">First Name</label>
                </div>

                <div class="form-label-group">
                    <input type="name" id="lastName" name="lasttName" class="form-control" placeholder="Last Name" required>
                    <label for="Last Name">Last Name</label>
                </div>

                <div class="form-label-group">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
                    <label for="email">Email address</label>
                </div>

                <div class="form-label-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>

                <div class="checkbox mb-3">
                    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
                </div>
                <button class="btn btn-lg btn-secondary btn-block" type="submit" value="submit">Sign up</button>
                <footer class="container">
                    <p class="float-right"><a href="#">Back to top</a></p>
                    <p>&copy; 2018-2020 WoodArt &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
                </footer>
            </form>
        </form>
        </form>
    </body>

    </html>