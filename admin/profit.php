<?php
    $active = "profit";
    include("includes/header.php");
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    Profit Details <small></small>
                </h1>
            </div>
        </div>
        <div class="row">
            <?php
                $query = "SELECT * FROM payment";
                $result = mysqli_query($con,$query);
                $chart_data = "";
                $tot = 0;

                while($row = mysqli_fetch_assoc($result)){
                    $chart_data .= "{ date:'".$row["cin"]."', profit:".$row["fintot"] *10/100 ."}, ";
                    $tot = $tot + $row["fintot"] * 10 / 100;
                }
                $chart_data = substr($chart_data,0,-2);
            ?>
            <?php
                if(mysqli_num_rows($result) >= 1){
            ?>
            <div id="chart"></div>
            <?php } ?>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Check in</th>
										<th>Check out</th>
                                        <th>Room Rent</th>
										<th>Bed Rent</th>
										<th>Meals </th>
										<th>Gr.Total</th>
										<th>Profit</th>
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
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo $row["title"]." ".$row["fname"]." ".$row["lname"]; ?></td>
                                        <td><?php echo $row["cin"]; ?></td>
                                        <td><?php echo $row["cout"]; ?></td>
                                        <td><?php echo $row["troom"]; ?></td>
                                        <td><?php echo $row["tbed"]; ?></td>
                                        <td><?php echo $row["meal"]; ?></td>
                                        <td><?php echo $row["fintot"]; ?></td>
                                        <td><?php echo $row["fintot"]*10/100; ?></td>
                                    </tr>
                                    <?php
                                        }
                                        else{
                                    ?>
                                    <tr class="gradeU">
                                    <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo $row["title"]." ".$row["fname"]." ".$row["lname"]; ?></td>
                                        <td><?php echo $row["cin"]; ?></td>
                                        <td><?php echo $row["cout"]; ?></td>
                                        <td><?php echo $row["troom"]; ?></td>
                                        <td><?php echo $row["tbed"]; ?></td>
                                        <td><?php echo $row["meal"]; ?></td>
                                        <td><?php echo $row["fintot"]; ?></td>
                                        <td><?php echo $row["fintot"]*10/100; ?></td>
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