<?php
include "db.php"; 


if($_SERVER["REQUEST_METHOD"]=="POST"){

	$name = $_POST['name'];
	$cid = $_POST['pcat'];
	$price = $_POST['price'];
	$desc = $_POST['desc'];
	$img = $_FILES['file']['name'];
	$pdid = $_POST['pdid'];
	$peid = $_POST['peid'];


	if($peid<>"undefined"){
	
		if (is_array($_FILES)) {
        $sourcePath = $_FILES['file']['tmp_name'];
        $targetPath = "images/" . $_FILES['file']['name'];

        if (move_uploaded_file($sourcePath, $targetPath)) {
          	$sql = "UPDATE `product` SET `name`='$name',`price`='$price',`desc`='$desc',`img`='$img',`cid`='$cid' WHERE pid=$peid";
			$result=mysqli_query($db, $sql);

			if($result==1){
				echo "Product Updated";
			}
			else{
				echo "Some Problem Please Try Again";
			}
        }
       	else{
       		echo "Some Problem Please Try Again";
       	}
     }
	}
	if($pdid<>"undefined"){
	
		$sql = "DELETE FROM `product` WHERE pid = $pdid";
			$result=mysqli_query($db, $sql);

			if($result==1){
				echo "Deleted";
			}
			else{
				echo "Some Problem Please Try Again";
			}
	}
	elseif($peid=="undefined" and $pdid == "undefined"){
		if (is_array($_FILES)) {
	        $sourcePath = $_FILES['file']['tmp_name'];
	        $targetPath = "images/" . $_FILES['file']['name'];

	        if (move_uploaded_file($sourcePath, $targetPath)) {
	          	$sql = "INSERT INTO `product`(`name`, `price`, `desc`, `cid`, `img`) VALUES ('$name','$price','$desc','$cid','$img')";
				$result=mysqli_query($db, $sql);

				if($result==1){
					echo "Product Added";
				}
				else{
					echo "Some Problem Please Try Again";
				}
	        }
	       	else{
	       		echo "Some Problem Please Try Again";
	       	}
     	} 
	}
	
}
?>
