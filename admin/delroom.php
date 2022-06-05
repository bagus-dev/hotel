<?php
    include("includes/db.php");

    if(isset($_GET["noroom"])){
        $noroom = $_GET["noroom"];

        $sql = "DELETE FROM room WHERE no_room = '$noroom'";
        $re = mysqli_query($con,$sql);

        if($re){
            echo "<script>alert('The Room Has Been Deleted.')</script>";
            echo "<script>window.open('roomdel','_self')</script>";
        }
    }
    else{
        echo "<script>window.open('roomdel','_self')</script>";
    }
?>