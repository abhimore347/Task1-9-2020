<?php 
require_once('config.php') ;
$stateid=$_POST['state'];
$select="SELECT * FROM state where id=$stateid";
$query = mysqli_query($conn, $select);
$res=mysqli_fetch_assoc($query);
$state=$res['State'];
$city=$_POST['city'];
$refamount=$_POST['refamount'];
$percentage=$_POST['percentage'];
$value=$_POST['value'];
$UID=substr(md5(microtime()), 0, 6); 
$status=1;
// print_r($UID);

$insert="INSERT INTO maindata(State,city,RefAmount,Percentage,value,UID,status) value('$state','$city','$refamount','$percentage','$value','$UID','$status')";
print_r($insert);
mysqli_query($conn,$insert);
header('location:taskfile.php?success_msg=1');

 ?>