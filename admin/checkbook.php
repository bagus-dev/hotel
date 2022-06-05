<?php
    include("includes/db.php");

    if(isset($_POST["booking"])){
        $booking = htmlentities(strip_tags(trim($_POST["booking"])));
        $booking = mysqli_real_escape_string($con,$booking);

        $sql = "SELECT * FROM roombook WHERE no_trx = '$booking' AND stat = 'Not Confirm'";
        $result = mysqli_query($con,$sql);

        if(mysqli_num_rows($result) == 1){
            echo "OK";
        }
        else{
            echo "<i class='fa fa-times'></i> No. Booking is not valid.";
        }
    }
?>