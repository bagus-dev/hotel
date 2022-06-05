<?php
    $active = "roombook";
    include("includes/header.php");

    if(!isset($_SESSION["admin_id"])){
        echo "<script>window.open('http://localhost/tugas_hotel/admin','_self')</script>";
    }

    if(!isset($_GET["rid"])){
        echo "<script>window.open('http://localhost/tugas_hotel/admin/home','_self')</script>";
    }
    else{
        $curdate = date("Y/m/d");
        $no_trx = $_GET["rid"];

        $sql = "SELECT * FROM roombook WHERE no_trx = '$no_trx'";
        $re = mysqli_query($con,$sql);

        while($row = mysqli_fetch_assoc($re)){
            $cus_id = $row["cus_id"];
            $title = $row["Title"];
            $fname = $row["FName"];
            $lname = $row["LName"];
            $email = $row["Email"];
            $country = $row["Country"];
            $phone = $row["Phone"];
            $troom = $row["TRoom"];
            $bed = $row["Bed"];
            $nroom = $row["NRoom"];
            $many = $row["Many"];
            $meal = $row["Meal"];
            $cin = $row["cin"];
            $cout = $row["cout"];
            $stat = $row["stat"];
            $nodays = $row["nodays"];
            $price = $row["price"];
            $trf = $row["trf"];
        }
    }
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    Room Booking <small><?php echo $curdate; ?></small>
                </h1>
            </div>
            <div class="col-sm-8">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Booking Confirmation
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th width="200">DESCRIPTION</th>
                                    <th>INFORMATION</th>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <th><?php echo $title." ".$fname." ".$lname; ?></th>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <th><?php echo $email; ?></th>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <th><?php echo $country; ?></th>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <th><?php echo $phone; ?></th>
                                </tr>
                                <tr>
                                    <th>Type of The Room</th>
                                    <th><?php echo $troom; ?></th>
                                </tr>
                                <tr>
                                    <th>Room Number</th>
                                    <th><?php echo $nroom ; ?></th>
                                </tr>
                                <tr>
                                    <th>Many Customers to Stay</th>
                                    <th><?php echo $many; ?> Person(s)</th>
                                </tr>
                                <tr>
                                    <th>Meal Plan</th>
                                    <th><?php echo $meal; ?></th>
                                </tr>
                                <tr>
                                    <th>Bedding</th>
                                    <th><?php echo $bed; ?></th>
                                </tr>
                                <tr>
                                    <th>Check-Out Date</th>
                                    <th><?php echo $cout; ?></th>
                                </tr>
                                <tr>
                                    <th>Check-In Date</th>
                                    <th><?php echo $cin; ?></th>
                                </tr>
                                <tr>
                                    <th>No. of Days</th>
                                    <th><?php echo $nodays; ?></th>
                                </tr>
                                <tr>
                                    <th>Status Level</th>
                                    <th><?php echo $stat; ?></th>
                                </tr>
                                <tr>
                                    <th>Total Price</th>
                                    <th><?php echo "Rp. ".$price; ?></th>
                                </tr>
                                <tr>
                                    <th>Receipt of Transfer</th>
                                    <?php
                                        if($trf == ""){
                                    ?>
                                    <th>
                                        <a href="assets/images/transfer/clipart-tanda-tanya-2.jpg" class="example-image-link" data-lightbox="example-set" data-title="<?php echo $no_trx; ?> Transfer">
                                            <img src="assets/images/transfer/clipart-tanda-tanya-2.jpg" alt="Transfer" class="img-responsive" width="125" height="125">
                                        </a>
                                    </th>
                                    <?php
                                        }
                                        else{
                                    ?>
                                    <th>
                                        <a href="assets/images/transfer/<?php echo $trf; ?>" class="example-image-link" data-lightbox="example-set" data-title="<?php echo $no_trx; ?> Transfer">
                                            <img src="assets/images/transfer/<?php echo $trf; ?>" alt="Transfer" class="img-responsive" width="125" height="125">
                                        </a>
                                    </th>
                                    <?php
                                        }
                                    ?>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Select the Confirmation</label>
                                <select name="conf" class="form-control">
                                    <option value="0">Choose the Confirmation</option>
                                    <option value="Confirm">Confirm</option>
                                    <option value="Cancel">Cancel</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Update Status Level" name="co" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
                $rsql = "SELECT * FROM room";
                $rre = mysqli_query($con,$rsql);
                $r = 0;
                $sc = 0;
                $gh = 0;
                $dr = 0;

                while($rrow = mysqli_fetch_assoc($rre)){
                    $r = $r + 1;
                    $s = $rrow["type"];
                    $p = $rrow["place"];

                    if($s == "RR Sea View"){
                        $sc = $sc + 1;
                    }
                    if($s == "RR Sunrise View"){
                        $gh = $gh + 1;
                    }
                    if($s == "Deluxe Room"){
                        $dr = $dr + 1;
                    }
                }

                $csql = "SELECT * FROM payment";
                $cre = mysqli_query($con,$csql);

                $cr = 0;
                $csc = 0;
                $cgh = 0;
                $csr = 0;
                $cdr = 0;

                while($crow = mysqli_fetch_assoc($cre)){
                    $cr = $cr + 1;
                    $cs = $crow["troom"];

                    if($cs == "RR Sea View"){
                        $csc = $csc + 1;
                    }
                    if($cs == "RR Sunrise View"){
                        $cgh = $cgh + 1;
                    }
                    if($cs == "Deluxe Room"){
                        $cdr = $cdr + 1;
                    }
                }
            ?>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Available Room Details
                    </div>
                    <div class="panel-body">
                        <table width="200px">
                            <tr>
                                <td><b>RR Sea View</b></td>
                                <td>
                                    <button class="btn btn-primary btn-circle" type="button">
                                        <?php
                                            $f1 = $sc - $csc;
                                            if($f1 <= 0){
                                                $f1 = "NO";
                                                echo $f1;
                                            }
                                            else{
                                                echo $f1;
                                            }
                                        ?>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><b>RR Sunrise View</b></td>
                                <td>
                                    <button class="btn btn-primary btn-circle" type="button">
                                        <?php
                                            $f2 = $gh - $cgh;
                                            if($f2 <= 0){
                                                $f2 = "NO";
                                                echo $f2;
                                            }
                                            else{
                                                echo $f2;
                                            }
                                        ?>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Deluxe Room</b></td>
                                <td>
                                    <button class="btn btn-primary btn-circle" type="button">
                                        <?php
                                            $f4 = $dr - $cdr;
                                            if($f4 <= 0){
                                                $f4 = "NO";
                                                echo $f4;
                                            }
                                            else{
                                                echo $f4;
                                            }
                                        ?>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Total Rooms</b></td>
                                <td>
                                    <button class="btn btn-danger btn-circle" type="button">
                                        <?php
                                            $f5 = $r - $cr;
                                            if($f5 <= 0){
                                                $f5 = "NO";
                                                echo $f5;
                                            }
                                            else{
                                                echo $f5;
                                            }
                                        ?>
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="panel-footer">
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include("includes/footer.php");

    if(isset($_POST["co"])){
        $st = htmlentities(strip_tags(trim($_POST["conf"])));
        $st = mysqli_real_escape_string($con,$st);

        if($st == "Confirm"){
            $urb = "UPDATE roombook SET stat = '$st' WHERE no_trx = '$no_trx'";

            if($f1 == "NO"){
                echo "<script type='text/javascript'> alert('Sorry! Not Available Luxury Room ')</script>";
            }
            elseif($f2 == "NO"){
                echo "<script type='text/javascript'> alert('Sorry! Not Available Guest House')</script>";
            }
            elseif($f3 == "NO"){
                echo "<script type='text/javascript'> alert('Sorry! Not Available Single Room')</script>";
            }
            elseif($f4 == "NO"){
                echo "<script type='text/javascript'> alert('Sorry! Not Available Deluxe Room')</script>";
            }
            elseif(mysqli_query($con,$urb)){
                $psql = "INSERT INTO payment(no_trx,cus_id,title,fname,lname,troom,tbed,nroom,many,cin,cout,fintot,meal,noofdays) VALUES ('$no_trx','$cus_id','$title','$fname','$lname','$troom','$bed','$nroom','$many','$cin','$cout','$price','$meal','$nodays')";
            
                if(mysqli_query($con,$psql)){
                    $notfree = "Not Free";
                    $rpsql = "UPDATE room SET place = '$notfree', cusid = '$no_trx' WHERE no_room = '$nroom'";
                    
                    if(mysqli_query($con,$rpsql)){
                        echo "<script type='text/javascript'> alert('Booking Confirm.')</script>";
						echo "<script type='text/javascript'> window.location='roombook'</script>";
                    }
                }
            }
        }
        elseif($st == "Cancel"){
            if($trf !== ""){
                $file = "C:/xampp/htdocs/tugas_hotel/admin/assets/images/transfer/".$trf;
                unlink($file);
            }

            $urb = "DELETE FROM roombook WHERE no_trx = '$no_trx'";

            if(mysqli_query($con,$urb)){
                echo "<script>alert('Booking Canceled.')</script>";
                echo "<script>window.location='roombook'</script>";
            }
        }
    }
?>