<?php
    $active = "messages";
    include("includes/header.php");
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    News Letters <small> panel</small>
                </h1>
            </div>
        </div>
        <?php
            $mail = "SELECT * FROM contact";
            $rew = mysqli_query($con,$mail);
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h3>Send The News Letters to Followers</h3>
                    <?php
                        while($rows = mysqli_fetch_assoc($rew)){
                            $app = $rows["approval"];
                            if($app == "Allowed"){

                            }
                        }
                    ?>
                    <p></p>
                    <p>
                        <div class="panel-body">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Send New News Letters
                            </button>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Compose News Letter</h4>
                                        </div>
                                        <form action="" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" name="title" placeholder="Enter Title" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Subject</label>
                                                    <input type="text" name="subject" placeholder="Enter Subject" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>News</label>
                                                    <textarea name="news" rows="5" class="form-control" id="comment"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                                                <input type="submit" value="Send" name="log" class="btn btn-primary">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            if(isset($_POST["log"])){
                                $log = "INSERT INTO newsletterlog(title,subject,news) VALUES ('$_POST[title]','$_POST[subject]','$_POST[news]')";

                                if(mysqli_query($con,$log)){
                                    echo "<script>alert('New News Letter Has Been Added.')</script>";
                                    echo "<script>window.open('messages','_self')</script>";
                                }
                                else{
                                    die("Query Error: ".mysqli_errno($con)." - ".mysqli_error($con));
                                }
                            }
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <?php
            $sql = "SELECT * FROM contact";
            $re = mysqli_query($con,$sql);
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Date</th>
										<th>Status</th>
										<th>Approval</th>
										<th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while($row = mysqli_fetch_assoc($re)){
                                            $id = $row["id"];

                                            if($id % 2 == 1){
                                    ?>
                                    <tr class="gradeC">
                                        <td><?php echo $row["fullname"]; ?></td>
                                        <td><?php echo $row["phoneno"]; ?></td>
                                        <td><?php echo $row["email"]; ?></td>
                                        <td><?php echo $row["cdate"]; ?></td>
                                        <td><?php echo $row["approval"]; ?></td>
                                        <td><a href="newsletter?eid=<?php echo $id; ?>"><button class="btn btn-primary"><i class="fa fa-edit"></i> Permission</button></a></td>
                                        <td><a href="newsletterdel?eid=<?php echo $id; ?>"><button class="btn btn-danger"><i class="fa fa-edit"></i> Delete</button></a></td>
                                    </tr>
                                    <?php
                                        }
                                        else{
                                    ?>
                                    <tr class="gradeU">
                                    <td><?php echo $row["fullname"]; ?></td>
                                        <td><?php echo $row["phoneno"]; ?></td>
                                        <td><?php echo $row["email"]; ?></td>
                                        <td><?php echo $row["cdate"]; ?></td>
                                        <td><?php echo $row["approval"]; ?></td>
                                        <td><a href="newsletter?eid=<?php echo $id; ?>"><button class="btn btn-primary"><i class="fa fa-edit"></i> Permission</button></a></td>
                                        <td><a href="newsletterdel?eid=<?php echo $id; ?>"><button class="btn btn-danger"><i class="fa fa-edit"></i> Delete</button></a></td>
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
</div>
<?php
    include("includes/footer.php");
?>