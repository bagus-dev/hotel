<?php
    session_start();
    session_unset();
    echo "<script>alert('You've Logged Out Successfully.')</script>";
    echo "<script>window.open('http://localhost/tugas_hotel','_self')</script>";
?>