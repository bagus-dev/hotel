<?php
    session_start();
    include("includes/db.php");

    if(!isset($_SESSION["user_id"])){
        echo "<script>window.open('http://localhost/tugas_hotel','_self')</script>";
    }

    if(isset($_POST["upload"])){
        $picture = $_FILES["user_photo"]["tmp_name"];
        $valid_ext = array("jpg","jpeg","png");
        $ext = strtolower($_FILES["user_photo"]["name"]);
        $ext_explode = explode(".",$ext);
        $ext_end = end($ext_explode);

        $message_error = "";

        if(!in_array($ext_end,$valid_ext)){
            $message_error = "The File Extension that being Uploaded are not allowed.";
        }
        if(in_array($ext_end,$valid_ext)){
            if($_FILES["user_photo"]["size"] > 512000){
                $message_error = "Size of the File that being Uploaded is larger than accepted.";
            }
        }

        if($_FILES["user_photo"]["size"] < 512000){
            $get_size = getimagesize($picture);

            if($get_size[0] > 1266 OR $get_size[1] > 1280){
                $message_error = "The dimension of the Picture is larger than allowed.";
            }
            if($get_size[0] < 500 OR $get_size[1] < 500){
                $message_error = "The dimension of the Picture is smaller than allowed.";
            }
        }

        $folder = "user";
        $file_name = $_FILES["user_photo"]["name"];
        $path_file = "images/$folder/$file_name";

        if(file_exists($path_file)){
            $message_error = "The same of the File Name is exists.";
        }

        if($message_error == ""){
            $photo = $_FILES["user_photo"]["name"];
            $tmp = $_FILES["user_photo"]["tmp_name"];
            $path = "C:/xampp/htdocs/tugas_hotel/images/user/".$photo;

            move_uploaded_file($tmp,$path);

            $query = "UPDATE user SET photo = '$photo' WHERE email = '$_SESSION[email]'";
            $run = mysqli_query($con,$query);

            if($run){
                echo "<script>alert('The Account Name $_SESSION[fname]"." "."$_SESSION[lname] Has Been Created Successfully, please login to see your Account.')</script>";
                session_unset();
                echo "<script>window.open('http://localhost/tugas_hotel','_self')</script>";
            }
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
                    <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">INFO@REGAL RAYA.COM</a></li>
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
                        <h1><a href="index" class="navbar-brand">REGAL <span>RAYA</span><p class="logo_w3l_agile_caption">Your Dreamy Resort</p></a></h1>
                    </div>
                    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                        <nav class="menu menu--iris">
                            <ul class="nav navbar-nav menu__list">
                                <li class="menu__item"><a href="http://localhost/tugas_hotel/" class="menu__link scroll">Home</a></li>
                                <li class="menu__item menu__item--current"><a href="register" class="menu__link">Register</a></li>
                            </ul>
                        </nav>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <section id="register-header" class="header-image text-white d-none d-md-block">
        <div class="header-overlay">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1 class="display-1">Register an Account</h1>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta harum aperiam in facilis dicta.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="py-5 text-center">
        <div class="container">
            <div class="row mb-5">
                <div class="col">
                    <h1 class="pb-3">Register an Account</h1>
                    <hr class="w-25">
                </div>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">50%</div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="title-text">Current Photo Profile:</h3>
                    <img src="<?php echo 'images/user/'.$_SESSION['photo']; ?>" alt="<?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?>" class="mt-3 img-responsive w-30" style="border:1px solid black">
                
                    <br><br><br>

                    <?php
                        if(isset($message_error)){
                            if($message_error !== ""){
                                echo "<div class='alert alert-danger'>$message_error</div>";
                            }
                        }
                    ?>

                    <form name = "upload-form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label><strong>Choose New Photo</strong></label>
                            <input type="file" name="user_photo" class="form-control" accept="image/*" required>
                            <small class="form-text text-muted"><i class="fa fa-exclamation-triangle"></i> The picture cannot larger than 1266x1280 px, and cannot smaller than 500x500 px, also the file cannot larger than 500KB.</small>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Upload Picture" name="upload" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="copy">
        <p>&copy; 2017 REGAL RAYA. All Rights Reserved | Design By <a href="index">REGAL RAYA</a></p>
    </div>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.metisMenu.js"></script>
    <script src="js/custom-scripts.js"></script>
    <script src="js/id.js"></script>
</body>
</html>