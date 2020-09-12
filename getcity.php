<?php
require_once("config.php");
if(!empty($_POST["state_id"])){
$query =mysqli_query($conn,"SELECT * FROM city WHERE state_id = '" . $_POST["state_id"] . "'");
?>
<option value="">Select City</option>
<?php
while($row=mysqli_fetch_array($query))
	// print_r($row['City']);
{
?>
<option value="<?php echo $row["City"]; ?>"><?php echo $row["City"]; ?></option>
<?php
}
}
?>