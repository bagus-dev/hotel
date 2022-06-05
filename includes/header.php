<?php
    include("db.php");

    if(isset($_GET["message"])){
        if($_GET["message"] !== ""){
            echo "<script>alert('$_GET[message]')</script>";
            echo "<script>window.open('http://localhost/tugas_hotel/','_self')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Resort Inn Responsive , Smartphone Compatible web template , Samsung, LG, Sony Ericsson, Motorola web design" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/font-awesome.css" rel="stylesheet"> 
    <link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
    <link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
    <link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <title>REGAL RAYA HOTEL</title>
</head>
<body>
    <div class="banner-top">
        <div class="social-bnr-agileits">
            <ul class="social-icons3">
                <li><a href="https://www.facebook.com/" class="fa fa-facebook icon-border facebook"></a></li>
                <li><a href="https://www.twitter.com/" class="fa fa-twitter icon-border twitter"></a></li>
                <li><a href="https://plus.google.com/u/0/" class="fa fa-google-plus icon-border googleplus"></a></li>
            </ul>
        </div>
        <div class="contact-bnr-w3-agile">
            <ul>
                <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@regalraya.com">INFO@REGALRAYA.COM</a></li>
                <li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:02542224455">(0254)222-44-55</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="w3_navigation">
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="navbar-header navbar-left">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1><a href="http://localhost/tugas_hotel/" class="navbar-brand">REGAL <span>RAYA</span><p class="logo_w3l_agile_caption">Your Dreamy Resort</p></a></h1>
                </div>
                <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                    <nav class="menu menu--iris">
                        <ul class="nav navbar-nav menu__list">
                            <li class="menu__item menu__item--current"><a href="http://localhost/tugas_hotel/" class="menu__link">Home</a></li>
                            <li class="menu__item"><a href="#about" class="menu__link scroll">About</a></li>
                            <li class="menu__item"><a href="#team" class="menu__link scroll">Team</a></li>
                            <li class="menu__item"><a href="#gallery" class="menu__link scroll">Gallery</a></li>
                            <li class="menu__item"><a href="#rooms" class="menu__link scroll">Rooms</a></li>
                            <li class="menu__item"><a href="#contact" class="menu__link scroll">Contact Us</a></li>
                            <li class="dropdown menu__item">
                                <?php if(!isset($_SESSION["user_id"])){ ?>
                                <a href="#" class="menu__link scroll dropdown-toggle" data-toggle="dropdown">
                                    <b><i class="fa fa-user"></i> Login</b>
                                    <span class="caret"></span>
                                </a>
                                <ul id="login-dp" class="dropdown-menu">
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form name="login-form" method="post">
                                                    <div class="form-group">
                                                        <input type="email" name="email" placeholder="Email Address" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" name="password" placeholder="Password" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" name="login" class="btn btn-primary btn-block"><i class="fa fa-sign-in"></i> Login</button>
                                                    </div>
                                                </form>
                                                <?php
                                                    if(isset($_POST["login"])){
                                                        $email = htmlentities(strip_tags(trim($_POST["email"])));
                                                        $password = htmlentities(strip_tags(trim($_POST["password"])));

                                                        $email = mysqli_real_escape_string($con,$email);
                                                        $password = mysqli_real_escape_string($con,$password);

                                                        $sha1_password = sha1($password);

                                                        $sql_cari = "SELECT * FROM user WHERE email = '$email' and password = '$sha1_password'";
                                                        $query_cari = mysqli_query($con,$sql_cari);

                                                        if(mysqli_num_rows($query_cari) == 1){
                                                            $session_array = mysqli_fetch_assoc($query_cari);

                                                            $_SESSION["user_id"] = $session_array["cus_id"];
                                                            $_SESSION["fname"] = $session_array["fname"];
                                                            $_SESSION["lname"] = $session_array["lname"];
                                                            $_SESSION["gender"] = $session_array["gender"];
                                                            $_SESSION["email"] = $session_array["email"];
                                                            $_SESSION["phone"] = $session_array["phone"];
                                                            $_SESSION["address"] = $session_array["address"];
                                                            $_SESSION["password"] = $session_array["password"];
                                                            if($session_array["photo"] !== ""){
                                                                $_SESSION["photo"] = $session_array["photo"];
                                                            }
                                                            elseif($session_array["photo"] == "" AND $session_array ["gender"] == "M"){
                                                                $_SESSION["photo"] = "unknown.jpg";
                                                            }
                                                            elseif($session_array["photo"] == "" AND $session_array["gender"] == "F"){
                                                                $_SESSION["photo"] = "unknown_p.png";
                                                            }

                                                            echo "<script>window.open('http://localhost/tugas_hotel/user/profile?id=$_SESSION[user_id]','_self')</script>";
                                                        }
                                                        else{
                                                            $message = "Your Email Address or Password does not match.";
                                                            $message = urlencode($message);

                                                            echo "<script>window.open('http://localhost/tugas_hotel?message=$message','_self')</script>";
                                                        }
                                                    }
                                                ?>
                                            </div>
                                            <div class="bottom text-center">
                                                <a href="register"><b>Register an Account</b></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <?php 
                                    }
                                    elseif(isset($_SESSION["user_id"])){
                                ?>
                                <a href="#" class="menu__link scroll dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-user"></i> Profile</b>
                                    <span class="caret"></span>
                                </a>
                                <ul id="login-dp" class="dropdown-menu">
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul class="nav navbar-nav side-nav">
                                                    <li>
                                                        <center>
                                                            <img src="<?php echo 'images/user/'.$_SESSION['photo']; ?>" alt="<?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?>" class="img-fluid rounded-circle w-49 mt-4 mb-3" id="foto_p">
                                                        </center>
                                                    </li>
                                                    <li>
                                                        <hr class="custom">
                                                    </li>
                                                    <li>
                                                        <br>
                                                        <a href="<?php echo 'user/profile?id='.$_SESSION['user_id']; ?>">
                                                            <i class="fa fa-user"></i>
                                                            See Profile <br><br>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="bottom text-center">
                                                <a href="javascript:" class="confirm"><i class="fa fa-sign-out"></i><b>Logout</b></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <?php } ?>
                            </li>
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>
    </div>