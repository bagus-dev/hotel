<?php
    session_start();
    if(isset($_SESSION["admin_id"])){
        echo "<script>window.open('http://localhost/tugas_hotel/admin/home','_self')</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGAL RAYA - Admin Area</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="clouds">
        <div class="cloud x1"></div>
        <div class="cloud x2"></div>
        <div class="cloud x3"></div>
        <div class="cloud x4"></div>
        <div class="cloud x5"></div>
    </div>

    <div class="container">
        <div id="login">
            <form action="" method="post">
                <fieldset class="clearfix">
                    <p><span class="fontawesome-user"></span><input type="text" name="user" value="Username" onBlur="if(this.value == '') this.value = 'Username'" onFocus="if(this.value == 'Username') this.value = ''" required></p>
                    <p><span class="fontawesome-lock"></span><input type="password" name="pass" value="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required></p>
                    <p><input type="submit" value="Login" name="sub"></p>
                </fieldset>
            </form>
        </div>
    </div>

    <div class="bottom">
        <h3>
            <a href="http://localhost/tugas_hotel">REGAL RAYA HOMEPAGE</a>
        </h3>
    </div>
</body>
</html>
<?php
    include("includes/db.php");

    if(isset($_POST["sub"])){
        $user = htmlentities(strip_tags(trim($_POST["user"])));
        $pass = htmlentities(strip_tags(trim($_POST["pass"])));

        $user = mysqli_real_escape_string($con,$user);
        $pass = mysqli_real_escape_string($con,$pass);

        $sql = "SELECT * FROM login WHERE usname = '$user' AND pass = '$pass'";
        $result = mysqli_query($con,$sql);

        if(mysqli_num_rows($result) >= 1){
            $row = mysqli_fetch_assoc($result);

            $_SESSION["admin_id"] = $row["id"];
            $_SESSION["usname"] = $row["usname"];

            echo "<script>window.open('http://localhost/tugas_hotel/admin/home','_self')</script>";
        }
        else{
            echo "<script>alert('Your login Username and Password is invalid.')</script>";
        }
    }
?>