<?php
    $active = "payment";
    include("includes/header.php");
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    Payment Details <small></small>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Room type</th>
                                        <th>Bed Type</th>
                                        <th>Check in</th>
										<th>Check out</th>
										<th>No of Room</th>
										<th>Meal Type</th>
										<th>Gr. Total</th>
										<th>Print</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM payment";
                                        $re = mysqli_query($con,$sql);

                                        while($row = mysqli_fetch_assoc($re)){
                                            $id = $row["id"];

                                            if($id % 2 == 1){
                                    ?>
                                    <tr class="gradeC">
                                        <td><?php echo $row["title"]." ".$row["fname"]." ".$row["lname"]; ?></td>
                                        <td><?php echo $row["troom"]; ?></td>
                                        <td><?php echo $row["tbed"]; ?></td>
                                        <td><?php echo $row["cin"]; ?></td>
                                        <td><?php echo $row["cout"]; ?></td>
                                        <td><?php echo $row["nroom"]; ?></td>
                                        <td><?php echo $row["meal"]; ?></td>
                                        <td><?php echo "Rp. ".$row["fintot"]; ?></td>
                                        <td><a href="print?pid=<?php echo $id; ?>"><button class="btn btn-primary"><i class="fa fa-print"></i> Print</button></a></td>
                                    </tr>
                                    <?php
                                        }
                                        else{
                                    ?>
                                    <tr class="gradeU">
                                    <td><?php echo $row["title"]." ".$row["fname"]." ".$row["lname"]; ?></td>
                                        <td><?php echo $row["troom"]; ?></td>
                                        <td><?php echo $row["tbed"]; ?></td>
                                        <td><?php echo $row["cin"]; ?></td>
                                        <td><?php echo $row["cout"]; ?></td>
                                        <td><?php echo $row["nroom"]; ?></td>
                                        <td><?php echo $row["meal"]; ?></td>
                                        <td><?php echo $row["fintot"]; ?></td>
                                        <td><a href="print?pid=<?php echo $id; ?>"><button class="btn btn-primary"><i class="fa fa-print"></i> Print</button></a></td>
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