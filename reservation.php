<?php
    session_start();
    include("includes/db.php");

    if(!isset($_SESSION["user_id"])){
        echo "<script>window.open('http://localhost/tugas_hotel/','_self')</script>";
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESERVATION SUNRISE HOTEL</title>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <link href="css/custom-styles.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="http://localhost/tugas_hotel"><i class="fa fa-home"></i> Homepage</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            RESERVATION <small></small>
                        </h1>
                    </div>
                </div>
                <?php
                    $query_res = "SELECT * FROM roombook WHERE cus_id = '$_SESSION[user_id]' AND stat = 'Not Confirm'";
                    $result = mysqli_query($con,$query_res);

                    if(mysqli_num_rows($result) == 0){
                ?>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                PERSONAL INFORMATION
                            </div>
                            <div class="panel-body">
                                <form name="form" id="form" method="post">
                                    <input type="hidden" name="fname" value="<?php echo $_SESSION['fname']; ?>">
                                    <input type="hidden" name="totprice" id="totprice">
                                    <input type="hidden" name="lname" value="<?php echo $_SESSION['lname']; ?>">
                                    <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
                                    <input type="hidden" name="phone" value="<?php echo $_SESSION['phone']; ?>">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <select name="title" id="title" class="form-control" required>
                                            <option value="0">Pick your title</option>
                                            <option value="Dr.">Dr.</option>
                                            <option value="Miss.">Miss.</option>
                                            <option value="Mr.">Mr.</option>
                                            <option value="Mrs.">Mrs.</option>
                                            <option value="Prof.">Prof.</option>
                                            <option value="Rev .">Rev .</option>
                                            <option value="Rev . Fr">Rev . Fr .</option>
                                        </select><span id="titleSpan"></span></div>
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" value="<?php echo $_SESSION['fname']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" value="<?php echo $_SESSION['lname']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" value="<?php echo $_SESSION['email']; ?>" disabled>
                                    </div>
                                    <?php
                                        $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
                                    ?>
                                    <div class="form-group">
                                        <label>Country</label>
                                        <br>
                                        <select name="country" id="country" class="selectpicker form-control" data-live-search="true" required>
                                            <option value="0">Choose Your Country</option>
                                            <?php
                                                foreach($countries as $key => $value){
                                                    echo "<option value='".$value."'>".$value."</option>";
                                                }
                                            ?>
                                        </select><span id="countrySpan"></span></div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="number" class="form-control" value="<?php echo $_SESSION['phone']; ?>" disabled>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    RESERVATION INFORMATION
                                </div>
                                <div class="panel-body">
                                    <div class="form-group" style="position:relative">
                                        <label>Check-In</label>
                                        <input type="text" name="cin" id="datepicker" class="form-control" placeholder="Check-In Date" required><span id="cinSpan"></span></div>
                                    <div class="form-group" style="position:relative">
                                        <label>Check-Out</label>
                                        <input type="text" name="cout" id="datepicker2" class="form-control" placeholder="Check-Out Date" required><span id="coutSpan"></span></div>
                                    <div class="form-group">
                                        <label>Type Of Room</label>
                                        <select name="troom" id="troom" class="form-control" required>
                                            <option value="0">Choose Your Type Room</option>
                                            <option value="RR Sea View">RR SEA VIEW</option>
                                            <option value="RR Sunrise View">RR SUNRISE VIEW</option>
                                            <option value="Deluxe Room">DELUXE ROOM</option>
                                        </select><span id="troomSpan"></span></div>
                                    <div class="form-group">
                                        <label>Bedding Type</label>
                                        <select name="bed" id="bed" class="form-control" required>
                                            <option value="0">Choose Bed Type</option>
                                        </select><span id="bedSpan"></span></div>
                                    <div class="form-group">
                                        <label>No. Of Room</label>
                                        <select name="nroom" id="nroom" class="form-control" required>
                                            <option value="0">Choose Your Room Number</option></select><span id="nroomSpan"></span></div>
                                    <div class="form-group">
                                        <label>Many Customers To Stay</label>
                                        <input type="number" name="many" id="many" class="form-control" placeholder="Many Customers To Stay" required><span id="manySpan"></span></div>
                                    <div class="form-group">
                                        <label>Meal Plan</label>
                                        <select name="meal" id="meal" class="form-control" required>
                                            <option value="0">Choose Your Meal Plan</option>
                                            <option value="Breakfast">Breakfast</option>
                                        </select><span id="mealSpan"></span></div>
                                    <div class="form-group">
                                        <span id="total"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="well">
                                <h4>HUMAN VERIFICATION</h4>
                                <p>Type Below This Code <?php $Random_code = rand(); echo $Random_code; ?></p><br>
                                <p>Enter the random code<br></p>
                                <input type="text" name="code1" title="random_code">
                                <input type="hidden" name="code" value="<?php echo $Random_code; ?>">
                                <input type="submit" value="Submit" name="submit" class="btn btn-md btn-primary">
                                <?php
                                    if(isset($_POST["submit"])){
                                        $title = htmlentities(strip_tags(trim($_POST["title"])));
                                        $fname = htmlentities(strip_tags(trim($_POST["fname"])));
                                        $lname = htmlentities(strip_tags(trim($_POST["lname"])));
                                        $email = htmlentities(strip_tags(trim($_POST["email"])));
                                        $country = htmlentities(strip_tags(trim($_POST["country"])));
                                        $phone = htmlentities(strip_tags(trim($_POST["phone"])));
                                        $troom = htmlentities(strip_tags(trim($_POST["troom"])));
                                        $bed = htmlentities(strip_tags(trim($_POST["bed"])));
                                        $nroom = htmlentities(strip_tags(trim($_POST["nroom"])));
                                        $many = htmlentities(strip_tags(trim($_POST["many"])));
                                        $meal = htmlentities(strip_tags(trim($_POST["meal"])));
                                        $cin = htmlentities(strip_tags(trim($_POST["cin"])));
                                        $cout = htmlentities(strip_tags(trim($_POST["cout"])));
                                        $price = htmlentities(strip_tags(trim($_POST["totprice"])));
                                        $code1 = htmlentities(strip_tags(trim($_POST["code1"])));
                                        $code = $_POST["code"];

                                        $pesan_error = "";

                                        $tgl_sekarang = date_create(date("Y-m-d"));
                                        $cin_cek = date("Y-m-d",strtotime($cin));
                                        $tgl_baru = date_create($cin_cek);

                                        $diff = date_diff($tgl_sekarang,$tgl_baru);

                                        if($diff->format("%R%a") < 0){
                                            $pesan_error = "Check-In Date Must Valid.";

                                            echo "<script>alert('$pesan_error')</script>";
                                            echo "<script>window.open('reservation','_self')</script>";
                                        }
                                        else{
                                            $tgl_cin = date_create(date("Y-m-d",strtotime($cin)));
                                            $cout_cek = date("Y-m-d",strtotime($cout));
                                            $tgl_baru = date_create($cout_cek);

                                            $diff = date_diff($tgl_cin,$tgl_baru);

                                            if($diff->format("%R%a") <= 0){
                                                $pesan_error = "Check-Out Date Must Valid.";

                                                echo "<script>alert('$pesan_error')</script>";
                                                echo "<script>window.open('reservation','_self')</script>";
                                            }
                                        }

                                        if($pesan_error == "" AND $code1 !== $code){
                                            echo "<script>alert('The Random Code Is Not Match.')</script>";
                                        }
                                        elseif($pesan_error == ""){
                                                $title = mysqli_real_escape_string($con,$title);
                                                $fname = mysqli_real_escape_string($con,$fname);
                                                $lname = mysqli_real_escape_string($con,$lname);
                                                $email = mysqli_real_escape_string($con,$email);
                                                $country = mysqli_real_escape_string($con,$country);
                                                $phone = mysqli_real_escape_string($con,$phone);
                                                $troom = mysqli_real_escape_string($con,$troom);
                                                $bed = mysqli_real_escape_string($con,$bed);
                                                $nroom = mysqli_real_escape_string($con,$nroom);
                                                $many = mysqli_real_escape_string($con,$many);
                                                $meal = mysqli_real_escape_string($con,$meal);
                                                $cin = mysqli_real_escape_string($con,$cin);
                                                $cout = mysqli_real_escape_string($con,$cout);
                                                $new = "Not Confirm";
                                                $price = mysqli_real_escape_string($con,$price);

                                                $cin = date("Y-m-d",strtotime($cin));
                                                $cout = date("Y-m-d",strtotime($cout));

                                                $sql_id = "SELECT no_trx FROM roombook ORDER BY no_trx DESC LIMIT 1";
                                                $query_id = mysqli_query($con,$sql_id);

                                                $row_id = mysqli_fetch_assoc($query_id);
                                                $substr1 = substr($row_id["no_trx"],-1) + 1;

                                                if(mysqli_num_rows($query_id) == 0){
                                                    $no_trx = "00001";
                                                }
                                                elseif($substr1 <= 9 AND $substr1 > 1){
                                                    $no_trx = substr($row_id["no_trx"],0,4)."".$substr1;
                                                }
                                                elseif(mysqli_num_rows($query_id) >= 1 AND $substr1 == 1){
                                                    $substr2 = substr($row_id["no_trx"],-2) + 1;
                                                    $no_trx = substr($row_id["no_trx"],0,3)."".$substr2;
                                                }

                                                $newUser = "INSERT INTO `roombook`(`no_trx`,`cus_id`,`Title`,`FName`,`LName`,`Email`,`Country`,`Phone`,`TRoom`,`Bed`,`NRoom`,`Many`,`Meal`,`cin`,`cout`,`stat`,`nodays`,`price`) VALUES ('$no_trx','$_SESSION[user_id]','$title','$fname','$lname','$email','$country','$phone','$troom','$bed','$nroom','$many','$meal','$cin','$cout','$new',datediff('$cout','$cin'),'$price')";
                                                
                                                if(mysqli_query($con,$newUser)){
                                                    echo "<script>alert('Your Booking Application Has Been Sent')</script>";
                                                    echo "<script>window.open('http://localhost/tugas_hotel/user/profile?id=$_SESSION[user_id]','_self')</script>";
                                                }
                                                else{
                                                    die("Query Error: ".mysqli_errno($con)." - ".mysqli_error($con));
                                                }
                                        }
                                    }
                                ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                    elseif(mysqli_num_rows($result) >= 1){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Reservation Information
                            </div>
                            <div class="panel-body text-center">
                                <h1>We're Sorry...</h1>
                                <br>
                                <br>
                                <p>
                                    That you can't book anymore room, because you're already have one.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="js/jquery-331.min.js"></script>
    <script>
        var totalNode = document.getElementById("total");
        var troomNode = document.getElementById("troom");
        var bedNode = document.getElementById("bed");
        var mealNode = document.getElementById("meal");

        var troom_price = 0;
        var bed_price = 0;
        var meal_price = 0;
        var day_price = 0;

        function total(e){
            troomSelect = document.forms["form"]["troom"].value;

            if(troomSelect == "RR Sea View"){
                troom_price = 3000000;
            }
            else if(troomSelect == "RR Sunrise View"){
                troom_price = 2750000;
            }
            else if(troomSelect == "Deluxe Room"){
                troom_price = 1500000;
            }

            cin = document.forms["form"]["cin"].value;
            cout = document.forms["form"]["cout"].value;

            var datein = new Date(cin);
            var dateout = new Date(cout);
            var datediff = Math.floor((Date.UTC(dateout.getFullYear(), dateout.getMonth(), dateout.getDate()) - Date.UTC(datein.getFullYear(), datein.getMonth(), datein.getDate()) ) /(1000 * 60 * 60 * 24));

            price = troom_price + bed_price + meal_price;

            if(datediff == 0){
                day_price = 0;
            }
            else if(datediff == 1){
                day_price = 0;
            }
            else if(datediff >= 2){
                day_price = troom_price * datediff;
            }
            
            if(day_price == 0){
                total_price = troom_price;
            }
            else if(day_price > 0){
                total_price = day_price;
            }

            totalNode.innerHTML = "<div class='alert alert-success'>Rp. " + total_price + "</div>";
            document.getElementById("totprice").value = total_price;
        }

        mealNode.addEventListener("change",total);
    </script>
    <script>
        $(document).ready(function (){
            $("#troom").change(function (){
                var troom_id = $(this).val();

                $.ajax({
                    type: "POST",
                    url: "bedding",
                    data: "troom_id="+troom_id,
                    success: function(response){
                        $("#bed").html(response);
                    }
                });
            })
        });
    </script>
    <script>
        $(document).ready(function (){
            $("#bed").change(function (){
                var bed_id = $(this).val();
                var type = document.forms["form"]["troom"].value;

                $.ajax({
                    type: "POST",
                    url: "nroom",
                    data: {"bed_id": bed_id,"type": type},
                    success: function(response){
                        $("#nroom").html(response);
                    }
                });
            })
        });
    </script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    <script src="js/jquery.metisMenu.js"></script>
    <script src="js/custom-scripts.js"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
    <script src="js/id.js"></script>
    <script>
        var form = document.getElementById("form");
        var titleSelect = document.getElementById("title");
        var titleSpan = document.getElementById("titleSpan");
        var countrySelect = document.getElementById("country");
        var countrySpan = document.getElementById("countrySpan");
        var troomSelect = document.getElementById("troom");
        var troomSpan = document.getElementById("troomSpan");
        var bedSelect = document.getElementById("bed");
        var bedSpan = document.getElementById("bedSpan");
        var nroomSelect = document.getElementById("nroom");
        var nroomSpan = document.getElementById("nroomSpan");
        var mealSelect = document.getElementById("meal");
        var mealSpan = document.getElementById("mealSpan");
        var manyText = document.getElementById("many");
        var manySpan = document.getElementById("manySpan");

        function validateForm(e){
            var title = document.forms["form"]["title"].value;

            if(title == "0"){
                var titleError = "Please pick your title.";
                titleSpan.innerHTML = titleError;
                titleSelect.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 0
                }, 500);
            }
            else{
                titleSelect.style.border = "2px solid green";
            }

            var country = document.forms["form"]["country"].value;

            if(country == "0"){
                var countryError = "Please choose your Country.";
                countrySpan.innerHTML = countryError;
                countrySelect.style.border = "2px solid red";
                countrySpan.style.color = "red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 0
                }, 500);
            }
            else{
                countrySelect.style.border = "2px solid green";
            }

            var troom = document.forms["form"]["troom"].value;

            if(troom == "0"){
                var troomError = "Please choose your Type Of Room.";
                troomSpan.innerHTML = troomError;
                troomSelect.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 0
                }, 500);
            }
            else{
                troomSelect.style.border = "2px solid green";
            }

            var bed = document.forms["form"]["bed"].value;

            if(bed == "0"){
                var bedError = "Please choose your Bedding Type.";
                bedSpan.innerHTML = bedError;
                bedSelect.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 0
                }, 500);
            }
            else{
                bedSelect.style.border = "2px solid green";
            }
            
            var nroom = document.forms["form"]["nroom"].value;

            if(nroom == "0"){
                var nroomError = "Please choose your Room Number.";
                nroomSpan.innerHTML = nroomError;
                nroomSelect.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 0
                }, 500);
            }
            else{
                nroomSelect.style.border = "2px solid green";
            }

            var meal = document.forms["form"]["meal"].value;

            if(meal == "0"){
                var mealError = "Please choose your Meal Plan.";
                mealSpan.innerHTML = mealError;
                mealSelect.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 0
                }, 500);
            }
            else{
                mealSelect.style.border = "2px solid green";
            }

            var many = document.forms["form"]["many"].value;
            var bed = document.forms["form"]["bed"].value;

            if(many.trim() == ""){
                var manyError = "Please type your Customers to Stay.";
                manySpan.innerHTML = manyError;
                manyText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 0
                }, 500);
            }
            else if(many == 0){
                var manyError = "This cannot be 0.";
                manySpan.innerHTML = manyError;
                manyText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 0
                }, 500);
            }
            else if(bed == "Single" && many > 2){
                var manyError = "Your Bed Type is "+bed+" and the maximum Customers to Stay is 2.";
                manySpan.innerHTML = manyError;
                manyText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 0
                }, 500);
            }
            else if(bed == "Double" && many > 4){
                var manyError = "Your Bed Type is "+bed+" and the maximum Customers to Stay is 4.";
                manySpan.innerHTML = manyError;
                manyText.style.border = "2px solid red";

                e.preventDefault();

                $("body,html").animate({
                    scrollTop: 0
                }, 500);
            }
        }

        function hapus(e){
            e.target.style.border = "";
            e.target.parentElement.lastChild.innerHTML = "";
        }

        form.addEventListener("submit",validateForm);
        titleSelect.addEventListener("change",hapus);
        countrySelect.addEventListener("change",hapus);
        troomSelect.addEventListener("change",hapus);
        bedSelect.addEventListener("change",hapus);
        nroomSelect.addEventListener("change",hapus);
        mealSelect.addEventListener("change",hapus);
        manyText.addEventListener("keypress",hapus);
    </script>
    <script>
        $(function (){
            $("#datepicker").datetimepicker({
                format: "YYYY/MM/DD",
                locale: "id",
                showClear: true,
                showTodayButton: true
            });
        });
    </script>
    <script>
        $(function (){
            $("#datepicker2").datetimepicker({
                format: "YYYY/MM/DD",
                locale: "id",
                showClear: true,
                showTodayButton: true
            });
        });
    </script>
</body>
</html>