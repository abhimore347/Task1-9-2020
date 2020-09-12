<?php 
require_once('config.php') ;
print_r($_POST);
$id=$_POST['id'];
$update="UPDATE maindata set status=0 where id=$id";
mysqli_query($conn, $update);
    


	

 ?>