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
                                    <li>
                                        <a href="<?php echo 'http://localhost/tugas_hotel/user/edit_pp?id='.$_SESSION['user_id']; ?>"><i class="fa fa-image"></i> Profile Picture</a>
                                    </li>
                                    <li class="active">
                                        <a href="javascript:"><i class="fa fa-lock"></i> Change Password</a>
                                    </li>
                                    <li>
                                        <a href="javascript:" class="confirm"><i class="fa fa-sign-out"></i> Logout</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-9">
                                <h3 class="pb-3" style="margin-top:3rem">Change Password:</h3>
                                
                                <form name="password-form" method="post" id="password-form" onsubmit="return checkall()">
                                    <div class="form-group" style="position:relative">
                                        <label>Current Password</label>
                                        <input type="password" name="password" id="password" placeholder="Current Password" class="form-control" onkeyup="checkpass();" required><i class="fa fa-eye" id="buttonPass"></i><span id="passwordSpan"></span></div>
                                    <div class="form-group" style="position:relative">
                                        <label>New Password</label>
                                        <input type="password" name="new_password" id="new_password" placeholder="New Password" class="form-control" onkeyup="checknew();" required><i class="fa fa-eye" id="passNew"></i><span id="new_passwordSpan"></span></div>
                                    <div class="form-group" style="position:relative">
                                        <label>Confirm New Password</label>
                                        <input type="password" name="confirm" id="confirm" placeholder="Confirm New Password" class="form-control" onkeyup="checkconfirm();" required><i class="fa fa-eye" id="rePass"></i><span id="confirmSpan"></span></div>
                                    <div class="form-group">
                                        <input type="submit" value="Update Password" name="update" class="btn btn-primary">
                                    </div>
                                </form>
                                <?php
                                    if(isset($_POST["update"])){
                                        $password = htmlentities(strip_tags(trim($_POST["password"])));
                                        $new_password = htmlentities(strip_tags(trim($_POST["new_password"])));
                                        $confirm = htmlentities(strip_tags(trim($_POST["confirm"])));

                                        $password = mysqli_real_escape_string($con,$password);
                                        $new_password = mysqli_real_escape_string($con,$new_password);
                                        $confirm = mysqli_real_escape_string($con,$confirm);

                                        $sha1_password = sha1($new_password);

                                        $sql_update = "UPDATE user SET password = '$sha1_password'";
                                        $query = mysqli_query($con,$sql_update);

                                        if($query){
                                            $message = "Update Password for Account Name '".$_SESSION["fname"]." ".$_SESSION["lname"]."' has been successfully.";
                                            $message = urlencode($message);

                                            session_unset();

                                            echo "<script>window.open('http://localhost/tugas_hotel?message=$message','_self')</script>";
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
        var passwordNode = document.getElementById("password");
        var tombolPassNode = document.getElementById("buttonPass");
        var passwordBaruNode = document.getElementById("new_password");
        var passBaruNode = document.getElementById("passNew");
        var passwordUlangNode = document.getElementById("confirm");
        var passUlangNode = document.getElementById("rePass");

        function proses(){
            if(tombolPassNode.className == "fa fa-eye"){
                passwordNode.type="text";
                tombolPassNode.className=tombolPassNode.className.replace(/\bfa fa-eye\b/g, "");
                var name = "fa fa-eye-slash";
                var arr = tombolPassNode.className.split("");
                if(arr.indexOf(name) == -1){
                    tombolPassNode.className += "" + name;
                }
            }
            else{
                passwordNode.type="password";
                tombolPassNode.className=tombolPassNode.className.replace(/\bfa fa-eye-slash\b/g, "");
                var name = "fa fa-eye";
                var arr = tombolPassNode.className.split("");
                if(arr.indexOf(name) == -1){
                    tombolPassNode.className += "" + name;
                }
            }
        }

        function prosesBaru(){
            if(passBaruNode.className == "fa fa-eye"){
                passwordBaruNode.type="text";
                passBaruNode.className=passBaruNode.className.replace(/\bfa fa-eye\b/g, "");
                var name = "fa fa-eye-slash";
                var arr = passBaruNode.className.split("");
                if(arr.indexOf(name) == -1){
                    passBaruNode.className += "" + name;
                }
            }
            else{
                passwordBaruNode.type="password";
                passBaruNode.className=passBaruNode.className.replace(/\bfa fa-eye-slash\b/g, "");
                var name = "fa fa-eye";
                var arr = passBaruNode.className.split("");
                if(arr.indexOf(name) == -1){
                    passBaruNode.className += "" + name;
                }
            }
        }

            function prosesUlang(){
                if(passUlangNode.className == "fa fa-eye"){
                    passwordUlangNode.type="text";
                    passUlangNode.className=passUlangNode.className.replace(/\bfa fa-eye\b/g, "");
                    var name = "fa fa-eye-slash";
                    var arr = passUlangNode.className.split("");
                    if(arr.indexOf(name) == -1){
                        passUlangNode.className += "" + name;
                    }
                }
                else{
                    passwordUlangNode.type="password";
                    passUlangNode.className=passUlangNode.className.replace(/\bfa fa-eye-slash\b/g, "");
                    var name = "fa fa-eye";
                    var arr = passUlangNode.className.split("");
                    if(arr.indexOf(name) == -1){
                        passUlangNode.className += "" + name;
                    }
                }
            }

        tombolPassNode.addEventListener("click",proses);
        passBaruNode.addEventListener("click",prosesBaru);
        passUlangNode.addEventListener("click",prosesUlang);
    </script>
    <script>
        var form = document.getElementById("password-form");
        var newPassText = document.getElementById("new_password");
        var newPassSpan = document.getElementById("new_passwordSpan");
        var confirmText = document.getElementById("confirm");
        var confirmSpan = document.getElementById("confirmSpan");

        function validateForm(e){
            var password = document.forms["password-form"]["password"].value;
            var newPass = document.forms["password-form"]["new_password"].value;
            var confirm = document.forms["password-form"]["confirm"].value;

            if(password == newPass){
                var newPassError = "Please don't type the same New Password as Current Password.";
                newPassSpan.innerHTML = newPassError;
                newPassText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else if(newPass !== confirm){
                newPassError = "New Password and Confirm New Password doesn't match.";
                newPassSpan.innerHTML = newPassError;
                newPassText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else if(newPassSpan.innerHTML !== ""){
                newPassText.style.border = "2px solid red";
            }
            else{
                newPassText.style.border = "2px solid green";
            }

            if(confirm !== newPass){
                var confirmError = "Confirm New Password and New Password doesn't match.";
                confirmSpan.innerHTML = confirmError;
                confirmText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 270
                }, 500);
            }
            else if(confirmSpan.innerHTML !== ""){
                confirmText.style.border = "2px solid red";
            }
            else{
                confirmText.style.border = "2px solid green";
            }
        }

        function hapus(e){
            e.target.style.border = "";
            e.target.parentElement.lastChild.innerHTML = "";
        }

        form.addEventListener("submit",validateForm);
        newPassText.addEventListener("keypress",hapus);
        confirmText.addEventListener("keypress",hapus);
    </script>
<?php
    include("includes/footer.php");
?>