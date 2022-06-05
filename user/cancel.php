<?php
    session_start();
    include("includes/db.php");

    if(isset($_GET["trx"])){
        $no_trx = htmlentities(strip_tags(trim($_GET["trx"])));
        $no_trx = mysqli_real_escape_string($con,$no_trx);

        $query_delete = "DELETE FROM roombook WHERE no_trx = '$no_trx'";
        $result = mysqli_query($con,$query_delete);

        if($result){
            echo "<script>alert('Your Booking Application Has Been Deleted.','_self')</script>";
            echo "<script>window.open('http://localhost/tugas_hotel/user/profile?id=$_SESSION[user_id]','_self')</script>";
        }
    }
?>