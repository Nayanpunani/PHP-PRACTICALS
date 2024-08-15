<?php 
include "db.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){

	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$number = $_POST['number'];
	$email = $_POST['email'];
	$pass = $_POST['Password'];
	$sql = "INSERT INTO `reg`(`fname`, `lname`, `email`, `mobileno`, `pass`) VALUES ('$fname','$lname','$email','$number','$pass')";
	$result=mysqli_query($db, $sql);
	
	if($result==1){
		echo "Register Success";
	}
	else{
		echo "Some Problem Please Register Again";
	}

}

?>