<?php
    session_start();

    if(!isset($_SESSION["admin_id"])){
        echo "<script>window.open('http://localhost/tugas_hotel/admin','_self')</script>";
    }

    include("includes/db.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGAL RAYA - Admin Area</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap.css">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">MAIN MENU </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
			
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
					
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                    <a href="http://localhost/tugas_hotel/admin/home"><i class="fa fa-dashboard"></i> Status</a>
                    </li>
                    <li>
                        <a class="active-menu" href="room"><i class="fa fa-dashboard"></i>Room Status</a>
                    </li>
					<li>
                        <a  href="addroom"><i class="fa fa-plus-circle"></i>Add Room</a>
                    </li>
                    <li>
                        <a   href="roomdel"><i class="fa fa-pencil-square-o"></i> Delete Room</a>
                    </li>
					

                    
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
       
        <div id="page-wrapper" >
            <div id="page-inner">
			    <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           Edit Room <small> Status</small>
                        </h1>
                    </div>
                </div>
                <?php
                    $sql = "SELECT * FROM room WHERE no_room = '$_GET[noroom]'";
                    $re = mysqli_query($con,$sql);
                    $row = mysqli_fetch_assoc($re);
                ?>
                <div class="row">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Room Details
                        </div>
                        <div class="panel-body">
                            <form action="" method="post" onsubmit="return checkall();">
                                <div class="form-group">
                                    <label>Room Number</label>
                                    <input type="text" value="<?php echo $row['no_room']; ?>" class="form-control" disabled>
                                    <input type="hidden" name="no_room" value="<?php echo $row['no_room']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Room Type</label>
                                    <input type="text" value="<?php echo $row['type']; ?>" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Bed Type</label>
                                    <input type="text" value="<?php echo $row['bedding']; ?>" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Room Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="Free" <?php if($row["place"] == "Free"){echo "selected"; } ?>>Free</option>
                                        <option value="Not Free" <?php if($row["place"] == "Not Free"){echo "selected"; } ?>>Not Free</option>
                                    </select>
                                    <span id="statusSpan"></span>
                                </div>
                                <?php
                                    if($row["place"] == "Free"){
                                ?>
                                <div class="form-group">
                                    <label>No. Booking</label>
                                    <input type="number" name="booking" id="booking" placeholder="No. Booking" onkeyup="checkbooking();" class="form-control" required>
                                    <span id="bookingSpan"></span>
                                </div>
                                <?php
                                    }
                                    else{ 
                                ?>
                                <div class="form-group">
                                    <label>No. Booking</label>
                                    <input type="number" value="<?php echo $row['cusid']; ?>" class="form-control" disabled>
                                    <input type="hidden" name="booking" value="<?php echo $row['cusid']; ?>">
                                </div>
                                <?php } ?>
                                <div class="form-group">
                                    <input type="submit" value="Update Status" name="update" class="btn btn-primary">
                                </div>
                            </form>
                            <?php
                                if(isset($_POST["update"])){
                                    $no_room = $_POST["no_room"];
                                    $place = $_POST["status"];
                                    $no_trx = htmlentities(strip_tags(trim($_POST["booking"])));

                                    $message_error = "";

                                    if($place == $row["place"]){
                                        $message_error = "The Room Status must be changed.";
                                    }

                                    if($message_error !== ""){
                                        echo "<script>alert('$message_error')</script>";
                                        echo "<script>window.open('edit_room?noroom=$_GET[noroom]','_self')</script>";
                                    }
                                    elseif($message_error == "" AND $place == "Not Free"){
                                        $sql_update = "UPDATE room SET place = 'Not Free', cusid = '$no_trx' WHERE no_room = '$no_room'";
                                        
                                        if(mysqli_query($con,$sql_update)){
                                            $urb = "UPDATE roombook SET stat = 'Confirm' WHERE no_trx = '$no_trx'";

                                            if(mysqli_query($con,$urb)){
                                                $sql_roombook = "SELECT * FROM roombook WHERE no_trx = '$no_trx'";
                                                $go = mysqli_query($con,$sql_roombook);
                                                $roombook = mysqli_fetch_assoc($go);

                                                $sql_insert = "INSERT INTO payment(no_trx,cus_id,title,fname,lname,troom,tbed,nroom,many,cin,cout,fintot,meal,noofdays) VALUES ('$no_trx','$roombook[cus_id]','$roombook[Title]','$roombook[FName]','$roombook[LName]','$roombook[TRoom]','$roombook[Bed]','$roombook[NRoom]','$roombook[Many]','$roombook[cin]','$roombook[cout]','$roombook[price]','$roombook[Meal]','$roombook[nodays]')";
                                                
                                                if(mysqli_query($con,$sql_insert)){
                                                    echo "<script>alert('The Room Status Has Been Changed.')</script>";
                                                    echo "<script>window.open('edit_room?noroom=$_GET[noroom]','_self')</script>";
                                                }
                                            }
                                        }
                                    }
                                    elseif($message_error == "" AND $place == "Free"){
                                        $sql_update = "UPDATE room SET place = 'Free', cusid = NULL WHERE no_room = '$no_room'";
                                        
                                        if(mysqli_query($con,$sql_update)){
                                            $delete = "SELECT * FROM roombook WHERE stat = 'Confirm' AND no_trx = '$no_trx'";
                                            $exe = mysqli_query($con,$delete);
                                            $file = mysqli_fetch_assoc($exe);

                                            $picture = "C:/xampp/htdocs/tugas_hotel/admin/assets/images/transfer/".$file["trf"];
                                            unlink($picture);
                                            
                                            $urb = "DELETE FROM roombook WHERE stat = 'Confirm' AND no_trx = '$no_trx'";

                                            if(mysqli_query($con,$urb)){
                                                echo "<script>alert('The Room Status Has Been Changed.')</script>";
                                                echo "<script>window.open('edit_room?noroom=$_GET[noroom]','_self')</script>";
                                            }
                                        }
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function checkbooking(){
            var booking = document.getElementById("booking").value;
            var bookingText = document.getElementById("booking");
            var bookingSpan = document.getElementById("bookingSpan");

            if(booking.trim() !== ""){
                $.ajax({
                    type: "POST",
                    url: "checkbook",
                    data: "booking="+booking,
                    success: function(response){
                        $("#bookingSpan").html(response);
                        if(response=="OK"){
                            bookingSpan.innerHTML = "";
                            bookingText.style.border = "2px solid green";
                            return true;
                        }
                        else{
                            bookingText.style.border = "2px solid red";
                            return false;
                        }
                    }
                });
            }
            else{
                $("#bookingSpan").html("");
                return false;
            }
        }

        function checkall(){
            var booking = document.getElementById("bookingSpan").innerHTML;

            if(booking == ""){
                return true;
            }
            else{
                return false;
            }
        }
    </script>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
</body>
</html>