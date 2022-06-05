<?php
    include("includes/db.php");
    
    $type = htmlentities(strip_tags(trim($_POST["type"])));
    $bed_id = htmlentities(strip_tags(trim($_POST["bed_id"]))); 

    $sql_nroom = "SELECT no_room FROM room WHERE type = '$type' AND bedding = '$bed_id' AND place = 'Free'";
    $query = mysqli_query($con,$sql_nroom);

    if($query){
        echo "<option>Choose Your Room Number</option>";
        while($row = mysqli_fetch_array($query)){
?>
        <option value="<?php echo $row['no_room']; ?>"><?php echo $row["no_room"]; ?></option>
<?php
        }
    }
    else{
        die("Query Error: ".mysqli_errno($con)." - ".mysqli_error($con));
    }
?>