<?php
    session_start();
    include("includes/db.php");

    if(isset($_SESSION["user_id"])){
        echo "<script>window.open('http://localhost/tugas_hotel','_self')</script>";
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
                                <li class="menu__item"><a href="http://localhost/tugas_hotel" class="menu__link scroll">Home</a></li>
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
                <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="color:#000">0%</div>
            </div>
            <div class="row text-left">
            <form action = "" name="register-form" id="register-form" method="post" onsubmit="return checkall();">
                <div class="form-row">
                    <div class="form-group col-6">
                        <label>First Name</label>
                        <input type="text" name="fname" placeholder="First Name" id="fname" class="form-control" required><span id="fnameSpan"></span></div>
                    <div class="form-group col-6">
                        <label>Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" id="lname" class="form-control" required><span id="lnameSpan"></span></div>
                </div>
                <div class="form-group">
                    <label>Gender</label><br>
                    <input type="radio" name="gender" value="M" checked>Male &emsp;
                    <input type="radio" name="gender" value="F">Female
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label>Email Address</label>
                        <input type="email" name="email" placeholder="Email Address" id="email" class="form-control" onkeyup="checkemail();" required><span id="emailSpan"></span></div>
                    <div class="form-group col-6">
                        <label>Phone Number</label>
                        <input type="number" name="phone" id="phone" placeholder="Phone Number" class="form-control" onkeyup="checkphone();" required><span id="phoneSpan"></span></div>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" rows="3" id="address" class="form-control" placeholder="Address" required></textarea><span id="addressSpan"></span></div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label>Password</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
                            <span class="input-group-addon">
                                <i class="fa fa-eye" id="buttonPass"></i>
                            </span><span id="passwordSpan"></span></div></div>
                    <div class="form-group col-6">
                        <label>Confirm Password</label>
                        <div class="input-group">
                            <input type="password" name="confirm" id="confirm" placeholder="Confirm Password" class="form-control" required>
                            <span class="input-group-addon">
                                <i class="fa fa-eye" id="buttonConfirm"></i>
                            </span><span id="confirmSpan"></span></div></div>
                </div>
                <div class="form-group">
                    <small class="form-text text-danger"> Note* : Please prepare a <b>Photo</b> to be used as a <b>Profile Photo</b> before continuing.</small>
                    <br><br>
                    <input type="submit" value="Submit and Continue" name="register" class="btn btn-primary">
                </div>
            </form>
            <?php
                if(isset($_POST["register"])){
                    $fname = htmlentities(strip_tags(trim($_POST["fname"])));
                    $lname = htmlentities(strip_tags(trim($_POST["lname"])));
                    $gender = htmlentities(strip_tags(trim($_POST["gender"])));
                    $email = htmlentities(strip_tags(trim($_POST["email"])));
                    $phone = htmlentities(strip_tags(trim($_POST["phone"])));
                    $address = htmlentities(strip_tags(trim($_POST["address"])));
                    $password = htmlentities(strip_tags(trim($_POST["password"])));

                    $fname = mysqli_real_escape_string($con,$fname);
                    $lname = mysqli_real_escape_string($con,$lname);
                    $gender = mysqli_real_escape_string($con,$gender);
                    $email = mysqli_real_escape_string($con,$email);
                    $phone = mysqli_real_escape_string($con,$phone);
                    $address = mysqli_real_escape_string($con,$address);
                    $password = mysqli_real_escape_string($con,$password);

                    $sha1_password = sha1($password);

                    $sql_insert = "INSERT INTO user(fname,lname,gender,email,phone,address,password) VALUES ('$fname','$lname','$gender','$email','$phone','$address','$sha1_password')";
                    $query = mysqli_query($con,$sql_insert);

                    if($query){
                        $sql_session = "SELECT * FROM user WHERE email = '$email'";
                        $query_session = mysqli_query($con,$sql_session);
                        
                        $row = mysqli_fetch_assoc($query_session);

                        $_SESSION["user_id"] = $row["cus_id"];
                        $_SESSION["fname"] = $row["fname"];
                        $_SESSION["lname"] = $row["lname"];
                        $_SESSION["gender"] = $row["gender"];
                        $_SESSION["email"] = $row["email"];
                        $_SESSION["phone"] = $row["phone"];
                        $_SESSION["password"] = $row["password"];
                        $_SESSION["photo"] = $row["photo"];

                        if($_SESSION["gender"] == "M" AND $_SESSION["photo"] == ""){
                            $_SESSION["photo"] = "unknown.jpg";
                        }
                        elseif($_SESSION["gender"] == "F" AND $_SESSION["photo"] == ""){
                            $_SESSION["photo"] = "unknown_p.png";
                        }

                        echo "<script>window.open('user_photo','_self')</script>";
                    }
                }
            ?>
        </div>
        </div>
    </div>
    <div class="copy">
        <p>&copy; 2017 REGAL RAYA. All Rights Reserved | Design By <a href="index">REGAL RAYA</a></p>
    </div>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/morris.min.js"></script>
    <script>
        function checkemail(){
            var email = document.getElementById("email").value;
            var emailText = document.getElementById("email");
            var emailSpan = document.getElementById("emailSpan");

            if(email.trim() !== ""){
                $.ajax({
                    type: "POST",
                    url: "checkdata",
                    data: "user_email="+email,
                    success: function (response){
                        $("#emailSpan").html(response);
                        if(response=="<i class='fa fa-check'></i> Email Address can be used." && (/.+@.+\..+/.test(email.trim()))){
                            emailSpan.innerHTML = "";
                            emailText.style.border = "2px solid green";
                            return true;
                        }
                        else if(response=="<i class='fa fa-check'></i> Email Address can be used." && !(/.+@.+\..+/.test(email.trim()))){
                            emailText.style.border = "2px solid red";
                            emailSpan.innerHTML = "<i class='fa fa-times'></i> Email Address Format is not appropriate.";
                            return false;
                        }
                        else{
                            emailText.style.border = "2px solid red";
                            return false;
                        }
                    }
                });
            }
            else{
                $("#emailSpan").html("");
                return false;
            }
        }

        function checkphone(){
            var phone = document.getElementById("phone").value;
            var phoneText = document.getElementById("phone");
            var phoneSpan = document.getElementById("phoneSpan");

            if(phone.trim() !== ""){
                $.ajax({
                    type: "POST",
                    url: "checkdata",
                    data: "user_phone="+phone,
                    success: function (response){
                        $("#phoneSpan").html(response);
                        if(response=="<i class='fa fa-check'></i> Phone Number can be used."){
                            phoneSpan.innerHTML = "";
                            phoneText.style.border = "2px solid green";
                            return true;
                        }
                        else{
                            phoneText.style.border = "2px solid red";
                            return false;
                        }
                    }
                });
            }
            else{
                $("#phoneSpan").html("");
                return false;
            }
        }

        function checkall(){
            var emailhtml = document.getElementById("emailSpan").innerHTML;
            var phonehtml = document.getElementById("phoneSpan").innerHTML;

            if((emailhtml && phonehtml) == ""){
                return true;
            }
            else{
                return false;
            }
        }
    </script>
    <script>
        var passwordNode = document.getElementById("password");
        var tombolPassNode = document.getElementById("buttonPass");
        var passwordUlangNode = document.getElementById("confirm");
        var passUlangNode = document.getElementById("buttonConfirm");

        function proses(){
            if(tombolPassNode.className == "fa fa-eye"){
                passwordNode.type="text";
                tombolPassNode.className = tombolPassNode.className.replace(/\bfa fa-eye\b/g, "");
                var name = "fa fa-eye-slash";
                var arr = tombolPassNode.className.split("");
                if(arr.indexOf(name) == -1){
                    tombolPassNode.className += "" + name;
                }
            }
            else{
                passwordNode.type="password";
                tombolPassNode.className = tombolPassNode.className.replace(/\bfa fa-eye-slash\b/g, "");
                var name = "fa fa-eye";
                var arr = tombolPassNode.className.split("");
                if(arr.indexOf(name) == -1){
                    tombolPassNode.className += "" + name;
                }
            }
        }

        function prosesUlang(){
        if(passUlangNode.className == "fa fa-eye"){
            passwordUlangNode.type = "text";
            passUlangNode.className = passUlangNode.className.replace(/\bfa fa-eye\b/g, "");
            var name = "fa fa-eye-slash";
            var arr = passUlangNode.className.split("");
            if(arr.indexOf(name) == -1){
                passUlangNode.className += "" + name;
            }
        }
        else{
            passwordUlangNode.type = "password";
            passUlangNode.className = passUlangNode.className.replace(/\bfa fa-eye-slash\b/g, "");
            var name = "fa fa-eye";
            var arr = passUlangNode.className.split("");
            if(arr.indexOf(name) == -1){
                passUlangNode.className += "" + name;
            }
        }
    }

        tombolPassNode.addEventListener("click",proses);
        passUlangNode.addEventListener("click",prosesUlang);
    </script>
    <script>
        var form = document.getElementById("register-form");
        var fnameText = document.getElementById("fname");
        var fnameSpan = document.getElementById("fnameSpan");
        var lnameText = document.getElementById("lname");
        var lnameSpan = document.getElementById("lnameSpan");
        var emailText = document.getElementById("email");
        var emailSpan = document.getElementById("emailSpan");
        var phoneText = document.getElementById("phone");
        var phoneSpan = document.getElementById("phoneSpan");
        var addressText = document.getElementById("address");
        var addressSpan = document.getElementById("addressSpan");
        var passwordText = document.getElementById("password");
        var passwordSpan = document.getElementById("passwordSpan");
        var confirmText = document.getElementById("confirm");
        var confirmSpan = document.getElementById("confirmSpan");

        function validateForm(e){
            var fname = document.forms["register-form"]["fname"].value;

            if(fname.trim() == ""){
                fnameError = "Please type your First Name.";
                fnameSpan.innerHTML = fnameError;
                fnameText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else if(fname.trim().length < 3){
                fnameError = "First Name minimum length is 3 characters.";
                fnameSpan.innerHTML = fnameError;
                fnameText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else{
                fnameText.style.border = "2px solid green";
            }

            var lname = document.forms["register-form"]["lname"].value;

            if(lname.trim() == ""){
                lnameError = "Please type your Last Name.";
                lnameSpan.innerHTML = lnameError;
                lnameText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else if(lname.trim().length < 3){
                lnameError = "Last Name minimum length is 3 characters.";
                lnameSpan.innerHTML = lnameError;
                lnameText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else{
                lnameText.style.border = "2px solid green";
            }

            var email = document.forms["register-form"]["email"].value;

            if(email.trim() == ""){
                var emailError = "Please type your Email Address.";
                emailSpan.innerHTML = emailError;
                emailText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else if(email.trim().length < 5){
                emailError = "Email Address minimum length is 5 characters.";
                emailSpan.innerHTML = emailError;
                emailText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else if(emailSpan.innerHTML !== ""){
                emailText.style.border = "2px solid red";
            }
            else{
                emailText.style.border = "2px solid green";
            }

            var phone = document.forms["register-form"]["phone"].value;

            if(phone.trim() == ""){
                var phoneError = "Please type your Phone Number.";
                phoneSpan.innerHTML = phoneError;
                phoneText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else if(phone.trim().length < 11){
                phoneError = "Phone Number minimum value is 11 numbers.";
                phoneSpan.innerHTML = phoneError;
                phoneText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else if(phone.trim().length > 13){
                phoneError = "Phone Number maximum value is 13 numbers.";
                phoneSpan.innerHTML = phoneError;
                phoneText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else if(phoneSpan.innerHTML !== ""){
                phoneText.style.border = "2px solid red";
            }
            else{
                phoneText.style.border = "2px solid green";
            }

            var address = document.forms["register-form"]["address"].value;

            if(address.trim() == ""){
                var addressError = "Please type your Address.";
                addressSpan.innerHTML = addressError;
                addressText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else if(address.trim().length < 5){
                addressError = "Address minimum length is 5 characters.";
                addressSpan.innerHTML = addressError;
                addressText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else{
                addressText.style.border = "2px solid green";
            }

            var password = document.forms["register-form"]["password"].value;
            var confirm = document.forms["register-form"]["confirm"].value;

            if(password.trim() == ""){
                var passwordError = "Please type your Password.";
                passwordSpan.innerHTML = passwordError;
                passwordText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else if(password.trim().length < 5){
                passwordError = "Password minimum length is 5 characters.";
                passwordSpan.innerHTML = passwordError;
                passwordText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else if(password !== confirm){
                passwordError = "Password must be match with Confirm Password.";
                passwordSpan.innerHTML = passwordError;
                passwordText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else{
                passwordText.style.border = "2px solid green";
            }

            if(confirm.trim() == ""){
                var confirmError = "Please type your Confirm Password.";
                confirmSpan.innerHTML = confirmError;
                confirmText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else if(confirm.trim().length < 5){
                confirmError = "Confirm Password minimum length is 5 characters.";
                confirmSpan.innerHTML = confirmError;
                confirmText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else if(confirm !== password){
                confirmError = "Confirm Password must be match with Password.";
                confirmSpan.innerHTML = confirmError;
                confirmText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else{
                confirmText.style.border = "2px solid green";
            }
        }
        function hapus(e){
            e.target.style.border = "";
            e.target.parentElement.lastChild.innerHTML = "";
        }

        form.addEventListener("submit",validateForm);
        fnameText.addEventListener("keypress",hapus);
        lnameText.addEventListener("keypress",hapus);
        emailText.addEventListener("keypress",hapus);
        phoneText.addEventListener("keypress",hapus);
        addressText.addEventListener("keypress",hapus);
        passwordText.addEventListener("keypress",hapus);
        confirmText.addEventListener("keypress",hapus);
    </script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.metisMenu.js"></script>
    <script src="js/custom-scripts.js"></script>
    <script src="js/id.js"></script>
</body>
</html>