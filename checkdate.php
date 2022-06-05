<?php
    include("includes/db.php");

    if(isset($_POST["cin"])){
        $tgl_sekarang = date_create(date("Y-m-d"));
        $cin = date("Y-m-d",strtotime($_POST["cin"]));
        $tgl_baru = date_create($cin);

        $diff = date_diff($tgl_sekarang,$tgl_baru);

        if($diff->format("%R%a") < 0){
            echo "<i class='fa fa-times'></i> Check-In Date Must Valid.";
        }
        else{
            echo "OK";
        }
    }
?>