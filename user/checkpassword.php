<?php
    session_start();
    include("includes/db.php");

    if(isset($_POST["user_password"])){
        $user_password = htmlentities(strip_tags(trim($_POST["user_password"])));
        $user_password = mysqli_real_escape_string($con,$user_password);

        $sha1_password = sha1($user_password);

        $checkpassword = "SELECT password FROM user WHERE email = '$_SESSION[email]' AND password = '$sha1_password'";
        $runpassword = mysqli_query($con,$checkpassword);

        $passlen = strlen($user_password);

        if(mysqli_num_rows($runpassword) >= 1){
            echo "OK";
        }
        elseif($passlen < 5){
            echo "<i class='fa fa-times'></i> Current Password minimum value is 5 characters.";
        }
        elseif(mysqli_num_rows($runpassword) == 0){
            echo "<i class='fa fa-times'></i> The Current Password doesn't match.";
        }
        exit();
    }

    if(isset($_POST["new_password"])){
        if($_POST["new_password"] !== ""){
            $new_password = htmlentities(strip_tags(trim($_POST["new_password"])));
            $new_password = mysqli_real_escape_string($con,$new_password);

            $newlen = strlen($new_password);

            if($newlen < 5){
                echo "<i class='fa fa-times'></i> New Password minimum value is 5 characters.";
            }
            else{
                echo "OK";
            }
        }
    }

    if(isset($_POST["confirm"])){
        if($_POST["confirm"] !== ""){
            $confirm = htmlentities(strip_tags(trim($_POST["confirm"])));
            $confirm = mysqli_real_escape_string($con,$confirm);

            $confirmlen = strlen($confirm);

            if($confirmlen < 5){
                echo "<i class='fa fa-times'></i> Confirm New Password minimum value is 5 characters.";
            }
            else{
                echo "OK";
            }
        }
    }
?>