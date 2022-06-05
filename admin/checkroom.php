<?php
    include("includes/db.php");

    if(isset($_POST["roomno"])){
        $roomno = htmlentities(strip_tags(trim($_POST["roomno"])));
        $roomno = mysqli_real_escape_string($con,$roomno);

        $cek = "SELECT * FROM room WHERE no_room = '$roomno'";
        $exe = mysqli_query($con,$cek);

        if(mysqli_num_rows($exe) >= 1){
            echo "<i class='fa fa-times'></i> The same Room Number is exist.";
        }
        else{
            echo "OK";
        }
    }
    exit();
?>