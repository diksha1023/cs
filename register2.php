<?php


require('db.php');

$fname = trim($_POST['fname']);
$fname = strip_tags($fname);
$fname = htmlspecialchars($fname);

$lname = trim($_POST['lname']);
$lname = strip_tags($lname);
$lname = htmlspecialchars($lname);

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

if(empty($fname)){
	$error = true;
	$error_msg =  "Please Enter your name";
}
else if (strlen($fname) < 3 || strlen($fname) > 20){
		$error = true;
		$error_msg = "First Name must have atleast 3 and atmost 20 chars.";
	} 
else if (!preg_match("/^[a-zA-Z ]+$/",$fname)) {
	 $error = true;
	 $error_msg = "Last Name must contain alphabets and space.";
}

if(empty($lname)){
	$error = true;
	$error_msg =  "Please Enter your name";
}
else if (strlen($lname) < 3 || strlen($lname) > 20){
		$error = true;
		$error_msg = "Name must have atleast 3 and atmost 20 chars.";
	} 
else if (!preg_match("/^[a-zA-Z ]+$/",$lname)) {
	 $error = true;
	 $error_msg = "Name must contain alphabets and space.";
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
	$query = "INSERT into `users-test` (fname,lname,email,password,uniqueid,hash) VALUES ('$fname','$lname','$email','$pass','$random','$hash')";
	$result = mysqli_query($con,$query);
	if($result){
		echo "Registered successfully";
	}

	
	//require('mail.php');
	
}



?>