<?php

session_start();

require('db.php');

$email = trim($_POST['username']);
$email = strip_tags($email);
$email = htmlspecialchars($email);

$password = trim($_POST['pass']);
$password = strip_tags($password);
$password = htmlspecialchars($password);

if(empty($email)){
	$error = true;
	echo "Please Enter the email address";
}
elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
	$error = true;
	echo "Please enter a valid email";
}
else {
	$query = "SELECT password,verify from `users-test` WHERE email='".$email."'";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_row($result);
	mysqli_close($con);
	if( hash('sha256',$password) == $row[0]){
		echo "Success";
		$_SESSION['u']=$_POST['username'];
		$_SESSION['p']=md5($password);
		exit; 
	}
	else {
		echo "Password is wrong";
	}
}	

?>