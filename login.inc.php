<?php
ob_start();
$uname = $_POST['username_current'];
$pword = $_POST['password_current'];
include_once $_SERVER['DOCUMENT_ROOT'].'/garduino/api/db_connect.php';

$db = new DB_CONNECT();
	// If user presses submit button
	if(isset($_POST['submit'])){
		if (empty($uname || empty($pword))) {
			exit(header("Location: login.php?login=error"));
		} else {
			// Fire sql query and store it in the results
			$unameResult = mysqli_query($db->connect(), "SELECT 1 FROM streetCred WHERE email = '$uname'") or die(mysqli_error());
			$unameResult = $unameResult->fetch_assoc();

			$pwordResult = mysqli_query($db->connect(), "SELECT 1 FROM tokens WHERE contrasena = '$pword'") or die(mysqli_error());
			$pwordResult = $pwordResult->fetch_assoc();
			// if the sql query shows email and password let them in
			// this might not check if its the password for the specific username
			if ($unameResult[1] == 1 && $pwordResult[1] == 1 ) {
				header("Location: http://zacattack.000webhostapp.com/garduino/chart.php");
				die();
			} else {
				exit(header("Location: login.php?login=error"));
			}
		}
	} else {
		exit(header("Location: login.php"));
	}
?>