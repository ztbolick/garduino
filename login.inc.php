<?php
ob_start();
$uname = $_POST['username_current'];
$salt = 'iAmTooSaltyForMySalt';
$pword = $_POST['password_current'];
$pword = sha1($salt.$pword);

include_once $_SERVER['DOCUMENT_ROOT'].'/garduino/api/db_connect.php';

$db = new DB_CONNECT();
	// If user presses submit button
	if(isset($_POST['submit'])){
		if (empty($uname || empty($pword))) {
			exit(header("Location: login.php?login=error"));
		} else {
			echo $uname . '<br>';
			echo $pword . '<br>';
			$query = "SELECT * FROM `streetCred` WHERE `nobres` = '$uname' AND `contrasena` = '$pword'";
			// Fire sql query and store it in the ingres_result_seek(result, position)
			$result = mysqli_query($db->connect(), $query);
			if (mysqli_num_rows($result) > 0) {
				session_start();
				$_SESSION['username'] = $uname;
				$_SESSION['appid'] = sha1($salt.$uname);

				$query = "UPDATE `streetCred` SET `active` = 'yes' WHERE `nobres` = '$uname'";
				mysqli_query($db->connect(), $query);

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