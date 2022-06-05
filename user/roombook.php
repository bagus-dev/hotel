<?php
    include("includes/header.php");

    if(!isset($_SESSION["user_id"])){
        echo "<script>window.open('http://localhost/tugas_hotel','_self')</script>";
    }

    if(!isset($_GET["rid"])){
        echo "<script>window.open('http://localhost/tugas_hotel/user/profile?id=','_self')</script>";
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

    if(isset($_POST["upload"])){
        $picture = $_FILES["transfer"]["tmp_name"];
        $valid_ext = array("jpg","jpeg","png");
        $ext = strtolower($_FILES["transfer"]["name"]);
        $ext_explode = explode(".",$ext);
        $ext_end = end($ext_explode);

        $message_error = "";

        if(!in_array($ext_end,$valid_ext)){
            $message_error = "The File Extension that being Uploaded are not allowed.";
        }
        if(in_array($ext_end,$valid_ext)){
            if($_FILES["transfer"]["size"] > 512000){
                $message_error = "Size of the File that being Uploaded is larger than accepted.";
            }
        }

        $folder = "transfer";
        $file_name = $_FILES["transfer"]["name"];
        $path_file = "C:/xampp/htdocs/tugas_hotel/admin/assets/images/$folder/$file_name";

        if(file_exists($path_file)){
            $message_error = "The same of the File Name is exists.";
        }

        if($message_error == ""){
            $photo = $_FILES["transfer"]["name"];
            $tmp = $_FILES["transfer"]["tmp_name"];
            $path = "C:/xampp/htdocs/tugas_hotel/admin/assets/images/transfer/".$photo;

            move_uploaded_file($tmp,$path);

            $query = "UPDATE roombook SET trf = '$photo' WHERE no_trx = '$_GET[rid]'";
            $run = mysqli_query($con,$query);

            if($run){
                echo "<script>alert('The Receipt of Transfer Has Been Uploaded.')</script>";
                echo "<script>window.open('roombook?rid=$_GET[rid]','_self')</script>";
            }
        }
    }
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    Room Booking Details
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
                                    <th>DESCRIPTION</th>
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
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <?php
                    if($trf == ""){
                        if(isset($message_error)){
                            if($message_error !== ""){
                                echo "<div class='alert alert-danger'>$message_error</div>";
                            }
                        }
                    ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Upload Your Receipt of Transfer</label>
                        <input type="file" name="transfer" class="form-control" accept="image/*" required>
                        <small class="form-text text-muted"><i class="fa fa-exclamation-triangle"></i> The file cannot larger than 500KB.</small>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Upload" name="upload" class="btn btn-lg btn-success">
                    </div>
                </form>
                <?php
                    }
                    else{
                ?>
                <h3>Receipt of Transfer</h3><br>
                <a href="../admin/assets/images/transfer/<?php echo $trf; ?>" class="example-image-link" data-lightbox="example-set" data-title="<?php echo $_GET['rid'];?> Transfer">
                    <img src="../admin/assets/images/transfer/<?php echo $trf; ?>" alt="Transfer" class="img-responsive w-50">
                </a>
                <?php } ?>
                <br>
                <hr style="border:1px solid grey">
                <a href="http://localhost/tugas_hotel/user/profile?id=<?php echo $_SESSION['user_id']; ?>" class="btn btn-lg btn-warning">Back to Profile</a>
            </div>
        </div>
    </div>
</div>
<?php
    include("includes/footer.php");
?>