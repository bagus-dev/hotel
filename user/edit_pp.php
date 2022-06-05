<?php
    include("includes/header.php");

    if(!isset($_SESSION["user_id"])){
        echo "<script>window.open('http://localhost/tugas_hotel/','_self')</script>";
    }

    $message_error = "";

    if(isset($_POST["update"])){
        $picture = $_FILES["picture"]["tmp_name"];
        $valid_ext = array("jpg","jpeg","png");
        $ext = strtolower($_FILES["picture"]["name"]);
        $ext_explode = explode(".",$ext);
        $ext_end = end($ext_explode);

        if(!in_array($ext_end,$valid_ext)){
            $message_error = "The File Extension that being Uploaded are not allowed.";
        }

        if(in_array($ext_end,$valid_ext)){
            if($_FILES["picture"]["size"] > 512000){
                $message_error = "Size of the File that being Uploaded is larger than accepted.";
            }
        }

        if($_FILES["picture"]["size"] < 512000){
            $get_size = getimagesize($picture);

            if($get_size[0] > 1266 OR $get_size[1] > 1280){
                $pesan_error = "The dimension of the Picture is larger than allowed.";
            }
            if($get_size[0] < 500 OR $get_size[1] < 500){
                $pesan_error = "The dimension of the Picture is smaller than allowed.";
            }
        }

        $folder = "C:/xampp/htdocs/tugas_hotel/images/user";
        $file_name = $_FILES["picture"]["name"];
        $path_file = "$folder/$file_name";

        if(file_exists($path_file)){
            $message_error = "The same of the File Name is exists.";
        }

        if($message_error == ""){
            $photo = $_FILES["picture"]["name"];
            $tmp = $_FILES["picture"]["tmp_name"];
            $path = "C:/xampp/htdocs/tugas_hotel/images/user/".$photo;

            move_uploaded_file($tmp,$path);

            $find = "SELECT photo FROM user WHERE email = '$_SESSION[email]'";
            $go = mysqli_query($con,$find);
            $delete = mysqli_fetch_assoc($go);

            if($delete["photo"] !== ""){
                $file = "C:/xampp/htdocs/tugas_hotel/images/user/".$_SESSION["photo"];
                unlink($file);
            }

            $query = "UPDATE user SET photo = '$photo' WHERE email = '$_SESSION[email]'";
            $run = mysqli_query($con,$query);

            if($run){
                $message = "The Profile Picture has been changed successfully, please login again to see the changes.";
                $message = urlencode($message);

                session_unset();

                echo "<script>window.open('http://localhost/tugas_hotel?message=$message','_self')</script>";
            }
        }
    }
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
                            <li class="nav-item">
                                <a href="<?php echo 'http://localhost/tugas_hotel/user/profile?id='.$_SESSION['user_id']; ?>">Profile</a>
                            </li>
                            <li class="nav-item active">
                                <a href="javascript:" class="nav-link">Edit Profile</a>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col-sm-3 mt-3">
                                <ul class="nav-pills nav-stacked nav">
                                    <li>
                                        <a href="<?php echo 'http://localhost/tugas_hotel/user/edit_profile?id='.$_SESSION['user_id']; ?>"><i class="fa fa-user"></i> Basic Information</a>
                                    </li>
                                    <li class="active">
                                        <a href="javascript:"><i class="fa fa-image"></i> Profile Picture</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo 'http://localhost/tugas_hotel/user/edit_password?id='.$_SESSION['user_id']; ?>"><i class="fa fa-lock"></i> Change Password</a>
                                    </li>
                                    <li>
                                        <a href="javascript:" class="confirm"><i class="fa fa-sign-out"></i> Logout</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-9">
                                <h3 class="pb-3" style="margin-top:3rem">Current Picture:</h3>
                                <img src="../images/user/<?php echo $_SESSION['photo']; ?>" alt="<?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?>" width="320" height="420" style="border:1px solid blue">
                            
                                <br><br><br>

                                <?php
                                    if(isset($message_error)){
                                        if($message_error !== ""){
                                            echo "<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                            echo $message_error;
                                            echo "</div>";
                                        }
                                    }
                                ?>

                                <form name="pp-form" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label><strong>Choose New Picture</strong></label>
                                        <input type="file" name="picture" class="form-control" required>
                                        <small class="form-text text-muted"><i class="fa fa-exclamation-triangle"></i> The picture cannot larger than 1266x1280 px, and cannot smaller than 500x500 px, also the file cannot larger than 500KB.</small>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Update Profile Picutre" name="update" class="btn btn-primary">
                                    </div>
                                </form>
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