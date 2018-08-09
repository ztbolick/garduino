<?php
ob_start();
$uname = $_POST['username_new'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$pword = $_POST['password_new'];
include_once $_SERVER['DOCUMENT_ROOT'].'/garduino/api/db_connect.php';

$db = new DB_CONNECT();
	// If user presses submit button protects page from people trying to get at it
	if(isset($_POST['submit'])){
		if (empty($uname || empty($pword))) {
			exit(header("Location: login.php?login=error"));
		} else {
			// Fire sql query to check if the username already exists
			$unameResult = mysqli_query($db->connect(), "SELECT 1 FROM streetCred WHERE email = '$uname'") or die(mysqli_error());
			$unameResult = $unameResult->fetch_assoc();

			// if there's no user with that name let them sign up
			if ($unameResult[1] == 1) {
				// redirect with an error if the name exists
				header("Location: signup.php?signup=error");
				die();
			} else {
				// Make them a api key for their queries
				$appid = sha1($uname);
				// Make the insert
				$userQuery = mysqli_query($db->connect(), "INSERT INTO streetCred (nobres, email, phone) VALUES ('$uname', '$email', $phone)") or die(mysqli_error());
				$passwordQuery = mysqli_query($db->connect(), "INSERT INTO tokens (appid, contrasena) VALUES ('$appid', '$pword')") or die(mysqli_error());
				if ($userQuery && $passwordQuery) {
					exit(header("Location: signup.php?signup=sucess"));
				}				
			}
		}
	} else {
		// redirect if theres no post information
		exit(header("Location: signup.php"));
	}
?>