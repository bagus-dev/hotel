<?php
    $active = "home";
    include("includes/header.php");
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    Status <small>Room Booking</small>
                </h1>
            </div>
        </div>
        <?php
            $sql = "SELECT * FROM roombook";
            $re = mysqli_query($con,$sql);
            $c = 0;

            while($row = mysqli_fetch_assoc($re)){
                $new = $row["stat"];
                $cin = $row["cin"];
                $no_trx = $row["no_trx"];
                if($new == "Not Confirm"){
                    $c = $c + 1;
                }
            }
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#collapseTwo" data-toggle="collapse" data-parent="#accordion">
                                            <button class="btn btn-default" type="button">
                                                New Room Bookings <span class="badge"><?php echo $c; ?></span>
                                            </button>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse in" style="height: auto">
                                    <div class="panel-body">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>No. Book.</th>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Country</th>
                                                                <th>Room</th>
                                                                <th>Bedding</th>
                                                                <th>Meal</th>
                                                                <th>Check-In</th>
                                                                <th>Check-Out</th>
                                                                <th>Status</th>
                                                                <th>More</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $tsql = "SELECT * FROM roombook";
                                                                $tre = mysqli_query($con,$tsql);
                                                                
                                                                while($trow = mysqli_fetch_assoc($tre)){
                                                                    $co = $trow["stat"];
                                                                    if($co == "Not Confirm"){
                                                            ?>
                                                            <tr>
                                                                <th><?php echo $trow["no_trx"]; ?></th>
                                                                <th><?php echo $trow["Title"]." ".$trow["FName"]." ".$trow["LName"]; ?></th>
                                                                <th><?php echo $trow["Email"]; ?></th>
                                                                <th><?php echo $trow["Country"] ; ?></th>
                                                                <th><?php echo $trow["TRoom"]; ?></th>
                                                                <th><?php echo $trow["Bed"]; ?></th>
                                                                <th><?php echo $trow["Meal"]; ?></th>
                                                                <th><?php echo $trow["cin"]; ?></th>
                                                                <th><?php echo $trow["cout"]; ?></th>
                                                                <th><?php echo $trow["stat"]; ?></th>
                                                                <th><a href="roombook?rid=<?php echo $trow['no_trx']; ?>" class="btn btn-primary">Action</a></th>
                                                            </tr>
                                                            <?php }} ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                $rsql = "SELECT * FROM roombook";
                                $rre = mysqli_query($con,$rsql);
                                $r = 0;

                                while($row = mysqli_fetch_assoc($rre)){
                                    $br = $row["stat"];
                                    if($br == "Confirm"){
                                        $r = $r + 1;
                                    }
                                }
                            ?>
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#collapseOne" class="collapsed" data-toggle="collapse" data-parent="#accordion">
                                            <button class="btn btn-primary" type="button">
                                                Booked Rooms <span class="badge"><?php echo $r; ?></span>
                                            </button>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" style="height: 0px">
                                    <div class="panel-body">
                                        <?php
                                            $msql = "SELECT * FROM roombook";
                                            $mre = mysqli_query($con,$msql);

                                            while($mrow = mysqli_fetch_assoc($mre)){
                                                $br = $mrow["stat"];
                                                if($br == "Confirm"){
                                                    $fid = $mrow["no_trx"];
                                        ?>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="panel panel-primary text-center no-border bg-color-blue">
                                                <div class="panel-body">
                                                    <i class="fa fa-users fa-5x"></i>
                                                    <h3><?php echo $mrow["FName"]; ?></h3>
                                                </div>
                                                <div class="panel-footer back-footer-blue">
                                                    <a href="show?sid=<?php echo $fid; ?>">
                                                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                                            Show
                                                        </button>
                                                    </a>
                                                    <?php echo $mrow["TRoom"]; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }} ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                                $fsql = "SELECT * FROM contact";
                                $fre = mysqli_query($con,$fsql);
                                $f = 0;

                                while($row = mysqli_fetch_assoc($fre)){
                                    $f = $f + 1;
                                }
                            ?>
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#collapseThree" class="collapsed" data-toggle="collapse" data-parent="#accordion">
                                            <button class="btn btn-primary" type="button">
                                                Followers <span class="badge"><?php echo $f; ?></span>
                                            </button>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Full Name</th>
                                                            <th>Email</th>
                                                            <th>Follow Start</th>
                                                            <th>Permission Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $csql = "SELECT * FROM contact";
                                                            $cre = mysqli_query($con,$csql);

                                                            while($crow = mysqli_fetch_assoc($cre)){
                                                        ?>
                                                        <tr>
                                                            <th><?php echo $crow["id"]; ?></th>
                                                            <td><?php echo $crow["fullname"]; ?></td>
                                                            <td><?php echo $crow["email"]; ?></td>
                                                            <td><?php echo $crow["cdate"]; ?></td>
                                                            <td><?php echo $crow["approval"]; ?></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <a href="messages.php" class="btn btn-primary">More Action</a>
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
    </div>
</div>
<?php
    include("includes/footer.php");
?>