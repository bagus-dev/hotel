<?php
    include("includes/db.php");

    $eid = $_GET["eid"];
    $approval = "Allowed";
    $napproval = "Not Allowed";

    $view = "SELECT * FROM contact WHERE id = '$eid'";
    $re = mysqli_query($con,$view);

    while($row = mysqli_fetch_assoc($re)){
        $id = $row["approval"];
    }

    if($id == "Not Allowed"){
        $sql = "UPDATE contact SET approval = '$approval' WHERE id = '$eid'";

        if(mysqli_query($con,$sql)){
            echo "<script>alert('Approval Changed to Allowed.')</script>";
            echo "<script>window.open('messages','_self')</script>";
        }
    }
    else{
        $sql = "UPDATE contact SET approval = '$napproval' WHERE id = '$eid'";

        if(mysqli_query($con,$sql)){
            echo "<script>alert('Approval Changed to Not Allowed.')</script>";
            echo "<script>window.open('messages','_self')</script>";
        }
    }
?>