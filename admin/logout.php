<?php
    session_start();
    session_unset();
    echo "<script>window.open('http://localhost/tugas_hotel/admin','_self')</script>";
?>