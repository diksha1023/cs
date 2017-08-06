<?php

	require('db.php');

	if(isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['hash']) && !empty($_GET['hash'])){
		$id = trim($_GET['id']);
		$id = strip_tags($id);
		$id = htmlspecialchars($id);

		$hash = trim($_GET['hash']);
		$hash = strip_tags($hash);
		$hash = htmlspecialchars($hash);		

		$query = "SELECT uniqueid, hash, verify FROM users WHERE uniqueid='".$id."' AND hash='".$hash."' AND verify='false'";
		$result = mysqli_query($con,$query);
		if($result){
			$rowcount=mysqli_num_rows($result);
			echo $rowcount;
		}		
	}
	else {
		echo "Error";
	}

?>