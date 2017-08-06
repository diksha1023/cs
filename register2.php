<?php
require('db.php');
if(isset($_POST['submit'])){
	$name = trim($_POST['name']);
	$name = strip_tags($name);
	$name = htmlspecialchars($name);

	$email = trim($_POST['emailid']);
	$email = strip_tags($email);
	$email = htmlspecialchars($email);

	$password = trim($_POST['pass']);
	$password = strip_tags($password);
	$password = htmlspecialchars($password);

	$password_conf = trim($_POST['pass_conf']);
	$password_conf = strip_tags($password_conf);
	$password_conf = htmlspecialchars($password_conf);

	$error = false;

	if(empty($name)){
		$error = true;
		$nameError =  "Please Enter your name";
	}
	else if (strlen($name) < 3 || strlen($name) > 20){
   		$error = true;
   		$nameError = "Name must have atleast 3 and atmost 20 chars.";
 	} 
 	else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
  		 $error = true;
  		 $nameError = "Name must contain alphabets and space.";
 	}


	if(empty($email)){
		$error = true;
		$error_msg =  "Please Enter the email address";
	}
	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$error = true;
		$error_msg = "Please enter a valid email";
	}

	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);	

	if($password != $password_conf){
		$error = true;
		$error_msg = "Please enter correct confirmation password";
	}

	elseif(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
		$error = true;
		$error_msg = "Password should be minimum 8 characters with one number and one capital letter";	
	}

	if($error){
		echo $error_msg;
	}	
	else {
		$random = substr(md5(rand()), 0, 7);
		$hash = md5(rand(0,1000));
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		$pass = hash('sha256',$password);
		$query = "INSERT into `users-test` (name,email,password,uniqueid,hash) VALUES ('$name','$email','$pass','$random','$hash')";
		$result = mysqli_query($con,$query);
		if($result){
			echo "Registered successfully";
		}

		
		require('mail.php');
		
	}

}

?>