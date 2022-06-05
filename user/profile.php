<?php
    include("includes/header.php");
?>
<section id="profile-header" class="header-image text-white d-none d-md-block">
        <div class="header-overlay">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1 class="display-1">User Page</h1>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta harum aperiam in facilis dicta.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="py-5 text-center">
        <div class="container">
            <div class="row mb-5">
                <div class="col">
                    <h1 class="pb-3">User Page</h1>
                    <hr class="w-25">
                </div>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <div class="container">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item active">
                                <a href="javascript:" class="nav-link">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo 'http://localhost/tugas_hotel/user/edit_profile?id='.$_SESSION['user_id']; ?>">Edit Profile</a>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col-md-3">
                                <a href="<?php echo '../images/user/'.$_SESSION['photo']; ?>" class="example-image-link" data-lightbox="example-set" data-title="<?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?>">
                                    <img src="<?php echo 'http://localhost/tugas_hotel/images/user/'.$_SESSION['photo']; ?>" alt="<?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?>" class="img-fluid mt-3" style="border:1px solid blue">
                                </a>
                            </div>
                            <div class="col-md-9">
                                <br>
                                <h2 class="pb-3"><?php echo $_SESSION["fname"]." ".$_SESSION["lname"]; ?></h2>
                                <label>Email Address</label>
                                <p>
                                    <?php echo "<i class='fa fa-envelope'></i> ".$_SESSION["email"]; ?>
                                </p>
                                <br>
                                <label>Address</label>
                                <p>
                                    <?php echo "<i class='fa fa-home'></i> ".$_SESSION["address"]; ?>
                                </p>
                                <br>
                                <label>Phone Number</label>
                                <p>
                                    <?php echo "<i class='fa fa-phone'></i> ".$_SESSION["phone"]; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h1 class="panel-title">Transaction Data</h1>
                    </div>
                    <div class="panel-body">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#collapseTwo" data-toggle="collapse" data-parent="#accordion">
                                            <button class="btn btn-default" type="button">
                                                <?php
                                                    $find = "SELECT * FROM roombook WHERE cus_id = '$_SESSION[user_id]' AND stat = 'Not Confirm'";
                                                    $go = mysqli_query($con,$find);
                                                ?>
                                                New Room Bookings <span class="badge"><?php echo mysqli_num_rows($go); ?></span>
                                            </button>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse in" style="height: auto">
                                    <div class="panel-body">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>No. Book.</th>
                                                                <th>Name</th>
                                                                <th>Price</th>
                                                                <th>Country</th>
                                                                <th>Room</th>
                                                                <th>Bedding</th>
                                                                <th>Meal</th>
                                                                <th>Check-In</th>
                                                                <th>Check-Out</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $tsql = "SELECT * FROM roombook WHERE cus_id ='$_SESSION[user_id]' AND stat = 'Not Confirm'";
                                                                $tre = mysqli_query($con,$tsql);
                                                                while($trow = mysqli_fetch_assoc($tre)){
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $trow["no_trx"]; ?></td>
                                                                <td><?php echo $trow["Title"]." ".$trow["FName"]." ".$trow["LName"]; ?></td>
                                                                <td><?php echo "Rp. ".$trow["price"]; ?></td>
                                                                <td><?php echo $trow["Country"]; ?></td>
                                                                <td><?php echo $trow["TRoom"]; ?></td>
                                                                <td><?php echo $trow["Bed"]; ?></td>
                                                                <td><?php echo $trow["Meal"]; ?></td>
                                                                <td><?php echo $trow["cin"]; ?></td>
                                                                <td><?php echo $trow["cout"]; ?></td>
                                                                <?php
                                                                    if($trow["stat"] == "Not Confirm"){
                                                                ?>
                                                                <td><a href="http://localhost/tugas_hotel/user/cancel?trx=<?php echo $trow['no_trx']; ?>" class="btn btn-warning"><i class="fa fa-times"></i> Cancel Booking</a></td>
                                                                <td><a href="roombook?rid=<?php echo $trow['no_trx']; ?>" class="btn btn-primary"><i class="fa fa-book"></i> See Details</a></td>
                                                                <?php } ?>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#collapseOne" data-toggle="collapse" data-parent="#accordion" class="collapsed">
                                            <button class="btn btn-primary" type="button">
                                                <?php
                                                    $rsql = "SELECT * FROM roombook WHERE cus_id = '$_SESSION[user_id]' AND stat = 'Confirm'";
                                                    $rre = mysqli_query($con,$rsql);

                                                    $row = mysqli_fetch_assoc($rre);
                                                    $cus_id = $row["cus_id"];
                                                    $no_trx = $row["no_trx"];
                                                    $price = $row["price"];

                                                    $rrsql = "SELECT * FROM payment WHERE no_trx = '$no_trx' AND cus_id = '$cus_id' AND payment = '$price'";
                                                    $rrre = mysqli_query($con,$rrsql);
                                                ?>
                                                Booked Rooms <span class="badge"><?php echo mysqli_num_rows($rrre); ?></span>
                                            </button>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" style="height: 0px">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                                    <table class="table table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Invoice #</th>
                                                                <th>No. Booking</th>
                                                                <th>Date In</th>
                                                                <th>Date Out</th>
                                                                <th>Type Room</th>
                                                                <th>Bedding</th>
                                                                <th>Meal</th>
                                                                <th>No. of Days</th>
                                                                <th>Total Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                while($mrow = mysqli_fetch_assoc($rrre)){
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $mrow["id"]; ?></td>
                                                                <td><?php echo $mrow["no_trx"]; ?></td>
                                                                <td><?php echo $mrow["cin"]; ?></td>
                                                                <td><?php echo $mrow["cout"]; ?></td>
                                                                <td><?php echo $mrow["troom"]; ?></td>
                                                                <td><?php echo $mrow["tbed"]; ?></td>
                                                                <td><?php echo $mrow["meal"]; ?></td>
                                                                <td><?php echo $mrow["noofdays"]; ?></td>
                                                                <td><?php echo $mrow["payment"]; ?></td>
                                                                <?php } ?>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include("includes/footer.php");
?>