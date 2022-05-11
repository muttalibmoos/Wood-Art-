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

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>WoodArt_Projects_Page</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/album/">

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
        <link href="Projects.css" rel="stylesheet">
    </head>

    <div align="center">
        <marquee behavior="alternate" bgcolor="#bb3434" direction="left" height:="" loop="7" scrollamount="1" scrolldelay="2" width="100%">
            <span style="font-size: 20px;color:#FFFFFF">Due to the Covid-19 Lockdown, we were unable to take photogrphs of the most recent projects,
        <p>please understand as we are doing our duty to keep our staff and customers safe during this pandemic</p>
        </span></marquee>
    </div>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
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

            <div>
                <button class="btn btn-primary ml-2 my-2 my-sm-0" data-toggle="modal" data-target="#loginmodal" type="submit">Sign in</button>
            </div>

            <div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="loginmodaltitle">Sign in Here</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                        </div>
                        <div class="modal-body">
                            <form action="/login" method="POST">

                                <div class="form-label-group">
                                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                                    <label for="inputEmail">Email address</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                    <label for="inputPassword">Password</label>
                                </div>

                                <div class="checkbox mb-3">
                                    <label>
                          <input type="checkbox" value="remember-me"> Remember me
                        </label>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                                <p> don't have an account ? </p>
                                <button class="btn btn-lg btn-primary btn-block" type="submit" placeholder="Sign up" aria-label="Sign in" onclick="window.location = 'Sign up.php';"> Sign up </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button class="btn btn-lg btn-primary btn-block" type="submit" placeholder="cart" aria-label="cart" onclick="window.location = 'Products.html';"> Cart </button>

            </div>

        </div>
    </nav>

    <body>


        <main role="main">

            <section class="jumbotron text-center">
                <div class="container">
                    <h1>Some of the most recent Porjects completed </h1>
                    <p class="lead text-muted">.</p>
                </div>
            </section>

            <div class=img src="background.jpg">
                <div class="container">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" focusable="false" role="img" aria-label="Placeholder: COMING SOON "><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">COMING SOON</text></svg>
                                <div class="card-body">
                                    <p class="card-text">House Drake</p>
                                    <p> The most recent project complted before the official lockdown due to Covid-19</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        </div>
                                        <small class="text-muted">1 MARCH 2020</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" focusable="false" role="img" aria-label="Placeholder: COMING SOON "><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">COMING SOON</text></svg>
                                <div class="card-body">
                                    <p class="card-text">House karreim</p>
                                    <p> This one of the longest project that took over a year to complete</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        </div>
                                        <small class="text-muted">13 JAN 2020</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" focusable="false" role="img" aria-label="Placeholder: COMING SOON"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">COMING SOON</text></svg>
                                <div class="card-body">
                                    <p class="card-text">House Jackson</p>
                                    <p> This house was designed from the ground up by our...</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        </div>
                                        <small class="text-muted">22 NOV 2019</small>
                                    </div>
                                </div>
                            </div>
                        </div>


        </main>

        <footer class="text-muted">
            <div class="container">
                <p class="float-right">
                    <a href="#">Back to top</a>
                    <p>&copy; 2018-2020 WoodArt &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
                </p>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script>
            window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')
        </script>
        <script src="assets/dist/js/bootstrap.bundle.js"></script>
    </body>

    </html>