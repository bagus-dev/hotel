<?php
    include("includes/db.php");

    if(isset($_POST["user_email"])){
        $emailId = htmlentities(strip_tags(trim($_POST["user_email"])));
        $emailId = mysqli_real_escape_string($con,$emailId);

        $checkdata = "SELECT email FROM user WHERE email = '$emailId'";
        $query = mysqli_query($con,$checkdata);

        if(mysqli_num_rows($query) > 0){
            echo "<i class='fa fa-times'></i> Email Already Exists.";
        }
        else{
            echo "<i class='fa fa-check'></i> Email Address can be used.";
        }
        exit();
    }

    if(isset($_POST["user_phone"])){
        $phoneId = htmlentities(strip_tags(trim($_POST["user_phone"])));
        $phoneId = mysqli_real_escape_string($con,$phoneId);

        $checkdata = "SELECT phone FROM user WHERE phone = '$phoneId'";
        $query = mysqli_query($con,$checkdata);

        $length = strlen($phoneId);

        if(mysqli_num_rows($query) > 0){
            echo "<i class='fa fa-times'></i> Phone Number Already Exists.";
        }
        elseif(mysqli_num_rows($query) == 0 AND $length < 11){
            echo "<i class='fa fa-times'></i> Phone Number must be larger than 10 numbers.";
        }
        elseif(mysqli_num_rows($query) == 0 AND $length > 13){
            echo "<i class='fa fa-times'></i> Phone Number must be smaller than 13 numbers.";
        }
        else{
            echo "<i class='fa fa-check'></i> Phone Number can be used.";
        }
        exit();
    }
?>