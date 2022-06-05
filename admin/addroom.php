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
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
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
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
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
                        <a href="room"><i class="fa fa-dashboard"></i>Room Status</a>
                    </li>
					<li>
                        <a class="active-menu" href="addroom"><i class="fa fa-plus-circle"></i>Add Room</a>
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
                           NEW ROOM <small></small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <div class="row">
                
                <div class="col-md-5 col-sm-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            ADD NEW ROOM
                        </div>
                        <div class="panel-body">
						<form name="form" method="post" onsubmit="return checkall();">
                            <div class="form-group">
                                            <label>Type Of Room</label>
                                            <select name="troom"  class="form-control" required>
                                                <option value="Luxury Room">LUXURY ROOM</option>
                                                <option value="Deluxe Room">DELUXE ROOM</option>
												<option value="Guest House">GUEST HOUSE</option>
												<option value="Single Room">SINGLE ROOM</option>
                                            </select>
                              </div>
							  
								<div class="form-group">
                                            <label>Bedding Type</label>
                                            <select name="bed" class="form-control" required>
                                                <option value="Single">Single</option>
                                                <option value="Double">Double</option>
												<option value="Triple">Triple</option>
                                                <option value="Quad">Quad</option>
                                                                                             
                                            </select>
                                            
                               </div>
                               <div class="form-group">
                                    <label>Room No.</label>
                                    <input type="number" name="roomno" id="roomno" placeholder="Room Number" onkeyup="checkroom();" class="form-control" required><span id="roomnoSpan"></span></div>
							 <input type="submit" name="add" value="Add New" class="btn btn-primary"> 
							</form>
							<?php
							 if(isset($_POST['add']))
							 {
										$room = $_POST['troom'];
										$bed = $_POST['bed'];
                                        $place = 'Free';
                                        $room_no = $_POST["roomno"];

										$sql ="INSERT INTO `room`( `type`, `bedding`,`place`,`no_room`) VALUES ('$room','$bed','$place','$room_no')" ;
										if(mysqli_query($con,$sql))
										{
                                         echo '<script>alert("New Room Added") </script>' ;
                                         echo "<script>window.open('http://localhost/tugas_hotel/admin/addroom','_self')</script>";
										}else {
											echo '<script>alert("Sorry ! Check The System") </script>' ;
										}
							}
							
							?>
                        </div>
                        
                    </div>
                </div>
                
                  
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            ROOMS INFORMATION
                        </div>
                        <div class="panel-body">
								<!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <?php
						$sql = "select * from room";
						$re = mysqli_query($con,$sql)
						?>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Room No.</th>
                                            <th>Room Type</th>
											<th>Bedding</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									
									<?php
										while($row= mysqli_fetch_array($re))
										{
												$id = $row['id_room'];
											if($id % 2 == 0) 
											{
												echo "<tr class=odd gradeX>
													<td>".$row['no_room']."</td>
													<td>".$row['type']."</td>
												   <th>".$row['bedding']."</th>
												</tr>";
											}
											else
											{
												echo"<tr class=even gradeC>
													<td>".$row['no_room']."</td>
													<td>".$row['type']."</td>
												   <th>".$row['bedding']."</th>
												</tr>";
											
											}
										}
									?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                    
                       
                            
							  
							 
							 
							  
							  
							   
                       </div>
                        
                    </div>
                </div>
                
               
            </div>
                    
            
				
					</div>
			 <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <script>
        function checkroom(){
            var roomno = document.getElementById("roomno").value;
            var roomnoText = document.getElementById("roomno");
            var roomnoSpan = document.getElementById("roomnoSpan");

            if(roomno.trim() !== ""){
                $.ajax({
                    type: "POST",
                    url: "checkroom",
                    data: "roomno="+roomno,
                    success: function(response){
                        $("#roomnoSpan").html(response);
                        if(response=="OK"){
                            roomnoSpan.innerHTML = "";
                            roomnoText.style.border = "2px solid green";
                            return true;
                        }
                        else{
                            roomnoText.style.border = "2px solid red";
                            return false;
                        }
                    }
                });
            }
            else{
                $("#roomnoSpan").html("");
                return false;
            }
        }

        function checkall(){
            var roomnohtml = document.getElementById("roomnoSpan").innerHTML;

            if(roomnohtml == ""){
                return true;
            }
            else{
                return false;
            }
        }
    </script>
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
</body>
</html>