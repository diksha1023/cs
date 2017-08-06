<?php

	require('db.php');

	if(isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['hash']) && !empty($_GET['hash'])){
		$id = trim($_GET['id']);
		$id = strip_tags($id);
		$id = htmlspecialchars($id);

		$hash = trim($_GET['hash']);
		$hash = strip_tags($hash);
		$hash = htmlspecialchars($hash);		
		$query = "SELECT uniqueid, hash, verify FROM `users-test` WHERE uniqueid='".$id."' AND hash='".$hash."' AND verify='0'";
		$result = mysqli_query($con,$query);
		$rowcount=mysqli_num_rows($result);
		echo $rowcount;
		if($rowcount){
				// We have a match, activate the account
				mysqli_query($con,"UPDATE `users-test` SET verify='1' WHERE uniqueid='".$id."' AND hash='".$hash."' AND verify='0'") or die(mysql_error());
				echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
		}		
	}
	else {
		echo "Error";
	}
	
	mysqli_close($con);

?>