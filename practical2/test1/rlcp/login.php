<?php 
include "db.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){

	$email = $_POST['email'];
	$pass = $_POST['Password'];

	if($email=="admin@123"){
		if($pass=="admin"){
			session_start();
			$_SESSION['admin']=$email;
			echo "Admin Login Success";

		}
		else{
			echo "Please Check Password";
		}
	}
	else{
		$sqlii = "SELECT * FROM reg WHERE email = '$email' AND pass = '$pass'"; 
		$resulte=mysqli_query($db, $sqlii);
		 	
		
		if(mysqli_num_rows($resulte)==1){
			session_start();
			$_SESSION['email']=$email;
			echo "Login Success";

		}
		else{
			echo "Please Insert Right Data";
		}
	}
}

?>