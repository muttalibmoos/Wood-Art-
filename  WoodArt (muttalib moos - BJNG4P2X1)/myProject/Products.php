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
    <title>WoodArt_Products_Page</title>

    <script src="store.js"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

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
        <span style="font-size: 20px;color:#FFFFFF">Due to the Covid-19 Lockdown, we are limited to following products,
        <p>please understand as we are doing our duty to keep our staff and customers safe during this pandemic</p>
        </span></marquee>
</div>

<nav class="navbar navbar-expand-md navbar-dark  bg-dark">
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
                            <button class="btn btn-lg btn-primary btn-block" type="submit" placeholder="Sign up" aria-label="Sign in" onclick="window.location = 'Sign up.phpl';"> Sign up </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</nav>

<body>


    <main role="main">
        <section class="container content-section">
            <h2 class="section-header">Tables and Desks</h2>
            <div class="shop-items">
                <div class="shop-item">
                    <span class="shop-item-title">Coffee table</span>
                    <img class="shop-item-image" src="images/coffeetable.jpg">
                    <div class="shop-item-details">
                        <span class="shop-item-price">R2199.99</span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title">Room desk</span>
                    <img class="shop-item-image" src="images/spacesaving.jpg">
                    <div class="shop-item-details">
                        <span class="shop-item-price">R1449.99</span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title">Dinning table</span>
                    <img class="shop-item-image" src="images/dinning.jpg">
                    <div class="shop-item-details">
                        <span class="shop-item-price">R8999.99</span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title">Outdoor table</span>
                    <img class="shop-item-image" src="images/lunch.jpg">
                    <div class="shop-item-details">
                        <span class="shop-item-price">R1999.99</span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="container content-section">
            <h2 class="section-header">Chairs</h2>
            <div class="shop-items">
                <div class="shop-item">
                    <span class="shop-item-title">Modern wood chair </span>
                    <img class="shop-item-image" src="images/chair.jpg">
                    <div class="shop-item-details">
                        <span class="shop-item-price">R449.99</span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title">Wooden garden chair</span>
                    <img class="shop-item-image" src="images/garden.jpg">
                    <div class="shop-item-details">
                        <span class="shop-item-price">R799.99</span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="container content-section">
            <h2 class="section-header">CART</h2>
            <div class="cart-row">
                <span class="cart-item cart-header cart-column">ITEM</span>
                <span class="cart-price cart-header cart-column">PRICE</span>
                <span class="cart-quantity cart-header cart-column">QUANTITY</span>
            </div>
            <div class="cart-items">
            </div>
            <div class="cart-total">
                <strong class="cart-total-title">Total</strong>
                <span class="cart-total-price">R0</span>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" placeholder="checkout" aria-label="checkout" onclick="window.location = 'checkout.html';"> checkout </button>
        </section>
    </main>

    <footer class="text-muted">
        <div class="container">
            <class class="float-right">
                <a href="#">Back to top</a>
                <p>&copy; 2018-2020 WoodArt &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
            </class>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="assets/dist/js/bootstrap.bundle.js"></script>
</body>

</html>