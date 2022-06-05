<?php
    include("includes/db.php");
    
    $troom_id = htmlentities(strip_tags(trim($_POST["troom_id"])));

    $sql_bedding = "SELECT bedding FROM room WHERE type = '$troom_id' AND place = 'Free'";
    $query = mysqli_query($con,$sql_bedding);

    if($query){
        echo "<option>Choose Bed Type</option>";
        $row = mysqli_fetch_array($query);
?>
        <option value="<?php echo $row['bedding']; ?>"><?php echo $row["bedding"]; ?></option>
<?php
    }
    else{
        die("Query Error: ".mysqli_errno($con)." - ".mysqli_error($con));
    }
?>