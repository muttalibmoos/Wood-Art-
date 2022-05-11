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
        <title>WoodArt_Home_Page</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/carousel/">

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
        <link href="Home.css" rel="stylesheet">
    </head>

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
                            <form action="sign_in.php" method="POST">

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

            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/outdoor.jpg" alt="outdoor" width="350" height="400">
                        <div class="container">
                            <div class="carousel-caption text-left">
                                <h1>Unique and Hand Crafted.</h1>
                                <p> Contact one of our designers and make dream furniture a reality</p>
                                <button class="btn btn-lg btn-primary" type="submit" placeholder="Sign up" aria-label="Sign in" onclick="window.location = 'Sign up.html';"> Sign up </button>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/coffeetable.jpg" alt="coffee" width="350" height="400">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Diversity.</h1>
                                <p>With hundreds of products to choose from there is a varity too choose from that can suite any design layout.</p>
                                <p><a class="btn btn-lg btn-primary" href="Products.html" role="button">View Products</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/example.jpg" alt="Forest" width="350" height="400">
                        <div class="container">
                            <div class="carousel-caption text-right">
                                <h1>Proven</h1>
                                <p>Take a look at our past projects, be careful it might insire you more than you think.</p>
                                <p><a class="btn btn-lg btn-primary" href="Projects.html" role="button">Browse gallery</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>




            <div class="container marketing">

                <!-- Three columns of text below the carousel -->
                <div class="row">
                    <div class="col-lg-4">
                        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="images/avatar.png" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
                        <h2>Juneid Moos</h2>
                        <p>Lead designer and owner of the company with over 20 years experience and has worked on projects all over the world</p>
                        <p>Email: juneid.moos@gmail.com</p>
                        <p>phone number: 072 250 2752</p>
                    </div>
                    <!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="images/avatar.png" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
                        <h2>Muttalib Moos</h2>
                        <p>Head of 3D redering and design team. He is able to design your dream furniture as a 3D model, giving your a visually represenataion of how the final product is going to look</p>
                        <p>Email: muttalibmoos@gmail.com</p>
                        <p>phone number: 076 592 9070</p>
                    </div>
                    <!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="images/avatar.png" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
                        <h2>John Doe</h2>
                        <p>Head of sales. with an enquiries about projects and custom furniture, contact John and you'll be sorted in no time at all.</p>
                        <p>Email: john.doe@gmail.com</p>
                        <p>phone number: 021 706 5453</p>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
                <!-- /.row -->


                <!-- START THE FEATURETTES -->

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
                    </div>
                    <div class="col-md-5">
                        <img src="images/Bathroom-Vanity-Ideas-5.jpg" alt="coffee" width="450" height="550">
                        <rect width="100%" height="100%" fill="#eee" />
                        <x x="50%" y="50%" fill="#aaa" dy=".3em"></x>
                        </img>

                    </div>
                </div>

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7 order-md-2">
                        <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
                    </div>
                    <div class="col-md-5">
                        <img src="images/texture.jpg" alt="" width="450" height="350">
                        <rect width="100%" height="100%" fill="#eee" />
                        <x x="50%" y="50%" fill="#aaa" dy=".3em"></x>
                        </img>

                    </div>
                </div>

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                    </div>
                    <img src="images/spacesaving.jpg" alt="" width="450" height="350">
                    <rect width="100%" height="100%" fill="#eee" />
                    <x x="50%" y="50%" fill="#aaa" dy=".3em"></x>
                    </img>
                </div>

                <hr class="featurette-divider">

                <!-- /END THE FEATURETTES -->

            </div>
            <!-- /.container -->


            <!-- FOOTER -->
            <footer class="container">
                <p class="float-right"><a href="#">Back to top</a></p>
                <p>&copy; 2018-2020 WoodArt &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
            </footer>
        </main>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script>
            window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')
        </script>
        <script src="assets/dist/js/bootstrap.bundle.js"></script>
    </body>

    </html>