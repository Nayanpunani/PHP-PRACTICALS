
<?php 
include "db.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){



	$cat = $_POST['cat'];
	$dec = $_POST['descs'];

	if(isset($_POST['id'])){
		$id = $_POST['id'];

		$sql = "UPDATE `category` SET `cat`='$cat',`desc`='$dec' WHERE cid = $id";
		$result=mysqli_query($db, $sql);

		if($result==1){
		echo "Category Updated";
		}
		else{
			echo "Some Problem Please Try Again";
		}

	}
	
	else if(isset($_POST['did'])){
		
		$did = $_POST['did'];

		$sqll = "DELETE FROM `product` WHERE cid = $did";
		$resultt=mysqli_query($db, $sqll);
		if($resultt==1){
			$sql = "DELETE FROM `category` WHERE cid = $did";
			$result=mysqli_query($db, $sql);

			if($result==1){
				echo "Deleted";
			}
			else{
				echo "Some Problem Please Try Again";
			}
		}
		else{
			echo "Some Problem Please Try Again";
		}
	}
	else{
		$sql = "INSERT INTO `category`(`cat`, `desc`) VALUES ('$cat','$dec')";
		$result=mysqli_query($db, $sql);

		if($result==1){
		echo "Category Added";
		}
		else{
			echo "Some Problem Please Try Again";
		}
	}
	

}

?> 