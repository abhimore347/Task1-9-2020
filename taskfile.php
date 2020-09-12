<?php 
require_once('config.php') ;
$select="SELECT * FROM state";
$query = mysqli_query($conn, $select);


$select1="SELECT * FROM maindata where status=1";
$query1 = mysqli_query($conn, $select1);

?>
<!DOCTYPE html>
<html>
<head>
	<title>task</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<body>
	
<form action="add_info.php" method="post" enctype="multipart/form-data">
	<label>State:</label>
	<select name="state" class="col-lg-2 m-3 p-2" id="state-list" onChange="getState(this.value);">
		<!-- <option value="selcat">Select</option> -->
		<option value="State">Select State</option>
		<?php 
		while($res=mysqli_fetch_assoc($query)){
		?>
		<option value="<?php echo$res['id'];  ?>"><?php echo $res['State']; ?></option>
	    <?php } ?>
	</select>

	<label>City:</label>
	<select name="city" id="city-list" class="col-lg-2 m-3 p-2 ">
		<option value="">Select City</option>
	</select>
	<br>

	<label>Ref. Amount:</label>
	<input type="text" class="col-lg-2 m-3 p-2 " name="refamount" id="amount">

	<label>Percentage:</label>
	<input type="number" class="col-lg-2 m-3 p-2" onkeyup="getValue()" name="percentage" id="percentage">

	<label>Value:</label>
	<input type="text" class="col-lg-2 m-3 p-2 " name="value" id="Value">

	<br>
	<button type="submit" class="btn btn-primary">Submit</button>

</form>



<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sr. No</th>
                      <th>State name</th>
                      <th>City Name</th>
                      <th>Ref amount</th>
                      <th>percentage</th>
                      <th>Value</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
$i=1;
while($result=mysqli_fetch_assoc($query1)){
  // echo "<pre>";
  // print_r($result);

 ?>
                    <tr>
                      <td><?php echo $i++ ?></td>
                      <td><?php echo$result['State']; ?></td>
                      <td><?php echo$result['city']; ?></td>
                      <td><?php echo$result['RefAmount']; ?></td>
                      <td><?php echo$result['Percentage']; ?></td>
                      <td><?php echo$result['value']; ?></td>
                      <td ><button class="btn btn-danger" onclick="cancle(<?php echo $result['id'];?>)" type="button">Cancle</button></td>
                    </tr>

                    <?php } ?>
                  </tbody>
                </table>




    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
function getState(val) {
$.ajax({
type: "POST",
url: "getcity.php",
data:'state_id='+val,
success: function(data){
$("#city-list").html(data);
}
});
}


function getValue(){
var amount = $("#amount").val();
var percentage = $("#percentage").val();
    var total = (percentage/100) * amount;
    $("#Value").val(total);

}

function cancle(val){
	alert("Are you sure want to cancle the entry")
$.ajax({
type: "POST",
url: "cancle.php",
data:'id='+val,
success: function(){
window.location.reload();
}
});

}

</script>


</body>
</html>