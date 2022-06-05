<?php
    session_start();
    include("db.php");

    if(!isset($_SESSION["admin_id"])){
        echo "<script>window.open('http://localhost/tugas_hotel/admin','_self')</script>";
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGAL RAYA - Admin Area</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/morris-0.4.3.min.css">
    <link rel="stylesheet" href="assets/css/custom-styles.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="http://localhost/tugas_hotel/admin/home" class="navbar-brand">ADMIN</a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="http://localhost/tugas_hotel/admin/home" <?php if($active == "home"){ ?> class="active-menu" <?php } ?>><i class="fa fa-dashboard"></i> Status</a>
                    </li>
                    <li>
                        <a href="messages" <?php if($active == "messages"){ ?> class="active-menu" <?php } ?>><i class="fa fa-desktop"></i> News Letters</a>
                    </li>
                    <li>
                        <a href="roombook" <?php if($active == "roombook"){ ?> class="active-menu" <?php } ?>><i class="fa fa-bar-chart-o"></i> Room Booking</a>
                    </li>
                    <li>
                        <a href="payment" <?php if($active == "payment"){ ?> class="active-menu" <?php } ?>><i class="fa fa-qrcode"></i> Payment</a>
                    </li>
                    <li>
                        <a href="profit" <?php if($active == "profit"){ ?> class="active-menu" <?php } ?>><i class="fa fa-qrcode"></i> Profit</a>
                    </li>
                    <li>
                        <a href="room"><i class="fa fa-home"></i> Room Settings</a>
                    </li>
                    <li>
                        <a href="logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </nav>