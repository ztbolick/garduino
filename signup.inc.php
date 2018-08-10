<?php
ob_start();
$salt = 'iAmTooSaltyForMySalt';
$uname = $_POST['username_new'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$signupdate = date("Y-m-d h:i:sa");
$pword = $_POST['password_new'];
$pword= sha1($salt.$pword);
$appid = sha1($salt.$uname);
include_once $_SERVER['DOCUMENT_ROOT'].'/garduino/api/db_connect.php';

$db = new DB_CONNECT();
	// If user presses submit button protects page from people trying to get at it
	if(isset($_POST['submit'])){
		if (empty($uname || empty($pword))) {
			exit(header("Location: signup.php?signup=error"));
		} else {
			// Fire sql query to check if the username already exists
			$unameResult = mysqli_query($db->connect(), 
									"SELECT 1 FROM streetCred WHERE email = '$email' OR nobres = '$uname'") or die(mysqli_error());
			$unameResult = $unameResult->fetch_assoc();

			// if there's a user with that name throw error
			if ($unameResult[1] == 1) {
				// redirect with an error if the name exists
				header("Location: signup.php?signup=error");
				die();
			} else {
				// No user exists so make them
				// Make the insert
				// id	nobres	email	phone	signupdate	lastlogin	active	appid	contrasena
				$userInsert = mysqli_query($db->connect(), 
					"INSERT INTO streetCred (nobres, email, phone, signupdate, appid, contrasena) 
					VALUES ('$uname','$email','$phone','$signupdate', '$appid', '$pword')")	
				    or die(mysqli_error());
				if ($userInsert) {
					exit(header("Location: signup.php?signup=sucess"));
				}				
			}
		}
	} else {
		// redirect if theres no post information
		exit(header("Location: signup.php?signup=error"));
	}
?>