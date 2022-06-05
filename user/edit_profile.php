<?php
    include("includes/header.php");

    if(!isset($_SESSION["user_id"])){
        echo "<script>window.open('http://localhost/tugas_hotel/','_self')</script>";
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
                <?php
                    if(isset($_GET["pesan"])){
                ?>
                    <div class='alert alert-success alert-dismissible'>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $_GET["pesan"]; ?>
                    </div>
                <?php } ?>
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
                                    <li class="active">
                                        <a href="javascript:"><i class="fa fa-user"></i> Basic Information</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo 'http://localhost/tugas_hotel/user/edit_pp?id='.$_SESSION['user_id']; ?>"><i class="fa fa-image"></i> Profile Picture</a>
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
                                <h4 style="margin-top:5rem">Personal Information:</h4>
                                <hr style="margin-top:3px">

                                <form name="edit-form" id="edit-form" method="post" class="mt-3" onsubmit="return checkall();">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="fname" id="fname" value="<?php echo $_SESSION['fname']; ?>" placeholder="First Name" class="form-control" required><span id="fnameSpan"></span></div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="lname" id="lname" value="<?php echo $_SESSION['lname']; ?>" placeholder="Last Name" class="form-control" required><span id="lnameSpan"></span></div>
                                    <div class="form-group">
                                        <label>Gender</label><br>
                                        <input type="radio" name="gender" value="M" <?php if($_SESSION["gender"] == "M"){echo 'checked'; } ?> disabled>Male &emsp;
                                        <input type="radio" name="gender" value="F" <?php if($_SESSION["gender"] == "F"){echo 'checked'; } ?> disabled>Female
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" id="address" rows="3" class="form-control" placeholder="Address" required><?php echo $_SESSION["address"]; ?></textarea><span id="addressSpan"></span></div>
                                    <h4 style="margin-top:4rem">Contact Detail:</h4>
                                    <hr style="margin-top:3px">
                                    <div class="form-group">
                                        <label><i class="fa fa-phone"></i> Phone Number</label>
                                        <input type="number" name="phone" id="phone" value="<?php echo $_SESSION['phone']; ?>" placeholder="Phone Number" class="form-control" onkeyup="checkphone();" required><span id="phoneSpan"></span></div>
                                    <div class="form-group">
                                        <label><i class="fa fa-envelope"></i> Email Address</label>
                                        <input type="text" value="<?php echo $_SESSION['email']; ?>" class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="update" value="Update Basic Information" class="btn btn-primary">
                                    </div>
                                </form>
                                <?php
                                    if(isset($_POST["update"])){
                                        $fname = htmlentities(strip_tags(trim($_POST["fname"])));
                                        $lname = htmlentities(strip_tags(trim($_POST["lname"])));
                                        $address = htmlentities(strip_tags(trim($_POST["address"])));
                                        $phone = htmlentities(strip_tags(trim($_POST["phone"])));

                                        $fname = mysqli_real_escape_string($con,$fname);
                                        $lname = mysqli_real_escape_string($con,$lname);
                                        $address = mysqli_real_escape_string($con,$address);
                                        $phone = mysqli_real_escape_string($con,$phone);

                                        $sql_update = "UPDATE user SET ";
                                        $sql_update .= "fname = '$fname',lname = '$lname',address = '$address',phone = '$phone'";

                                        $run = mysqli_query($con,$sql_update);

                                        if($run){
                                            $pesan = "Update Account for name <b>".$_SESSION["fname"]." ".$_SESSION["lname"]."</b> has been successfully.";
                                            $pesan = urlencode($pesan);
                                            echo "<script>window.open('http://localhost/tugas_hotel/user/edit_profile?id=$_SESSION[user_id]&pesan=$pesan','_self')</script>";
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var form = document.getElementById("edit-form");
        var fnameText = document.getElementById("fname");
        var fnameSpan = document.getElementById("fnameSpan");
        var lnameText = document.getElementById("lname");
        var lnameSpan = document.getElementById("lnameSpan");
        var addressText = document.getElementById("address");
        var addressSpan = document.getElementById("addressSpan");
        var phoneText = document.getElementById("phone");
        var phoneSpan = document.getElementById("phoneSpan");

        function validateForm(e){
            var fname = document.forms["edit-form"]["fname"].value;

            if(fname.trim() == ""){
                fnameError = "Please type your First Name.";
                fnameSpan.innerHTML = fnameError;
                fnameText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else if(fname.trim().length < 3){
                fnameError = "First Name minimum length is 3 characters.";
                fnameSpan.innerHTML = fnameError;
                fnameText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else{
                fnameText.style.border = "2px solid green";
            }

            var lname = document.forms["edit-form"]["lname"].value;

            if(lname.trim() == ""){
                lnameError = "Please type your Last Name.";
                lnameSpan.innerHTML = lnameError;
                lnameText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else if(lname.trim().length < 3){
                lnameError = "Last Name minimum length is 3 characters.";
                lnameSpan.innerHTML = lnameError;
                lnameText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else{
                lnameText.style.border = "2px solid green";
            }

            var address = document.forms["edit-form"]["address"].value;

            if(address.trim() == ""){
                var addressError = "Please type your Address.";
                addressSpan.innerHTML = addressError;
                addressText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else if(address.trim().length < 5){
                addressError = "Address minimum length is 5 characters.";
                addressSpan.innerHTML = addressError;
                addressText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else{
                addressText.style.border = "2px solid green";
            }

            var phone = document.forms["edit-form"]["phone"].value;

            if(phone.trim() == ""){
                var phoneError = "Please type your Phone Number.";
                phoneSpan.innerHTML = phoneError;
                phoneText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else if(phone.trim().length < 11){
                phoneError = "Phone Number minimum value is 11 numbers.";
                phoneSpan.innerHTML = phoneError;
                phoneText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else if(phone.trim().length > 13){
                phoneError = "Phone Number maximum value is 13 numbers.";
                phoneSpan.innerHTML = phoneError;
                phoneText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else if(phoneSpan.innerHTML !== ""){
                phoneText.style.border = "2px solid red";
            }
            else{
                phoneText.style.border = "2px solid green";
            }
        }

        function hapus(e){
            e.target.style.border = "";
            e.target.parentElement.lastChild.innerHTML = "";
        }

        form.addEventListener("submit",validateForm);
        fnameText.addEventListener("keypress",hapus);
        lnameText.addEventListener("keypress",hapus);
        addressText.addEventListener("keypress",hapus);
        phoneText.addEventListener("keypress",hapus);
    </script>
<?php
    include("includes/footer.php");
?>