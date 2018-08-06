<?php
$uname = $_POST['username'];
$pword = $_POST['password'];
$error = '<div class="alert-danger" role="alert">Invalid Login! Please check your Username and Password and try again!</div>';
ob_start();

include_once $_SERVER['DOCUMENT_ROOT'].'/garduino/api/db_connect.php';
$db = new DB_CONNECT();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="arduino, garden, hydroponic, api, PHP, jQuery"/>
		<title>Garduino Line Graph</title>
		<link href="css/default.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Tangerine&text=Garduino" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<nav>
			<ul>
				<li><a id="home" class="active">Home</a></li>
			</ul>
		</nav>
		<meta http-equiv='content-type' content='text/html;charset=utf-8' />
		<title>Login</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h3 class="text-center">Login</h3>
			<?php
				if(isset($_POST['submit'])){
					$unameResult = mysqli_query($db->connect(), "SELECT 1 FROM streetCred WHERE email = '$uname'") or die(mysqli_error());
					$unameResult = $unameResult->fetch_assoc();
					$pwordResult = mysqli_query($db->connect(), "SELECT 1 FROM tokens WHERE contrasena = '$pword'") or die(mysqli_error());
					$pwordResult = $pwordResult->fetch_assoc();

					if ($unameResult[1] == 1 && $pwordResult[1] == 1 ) {
						header("Location: http://zacattack.000webhostapp.com/garduino/chart.php");
						die();
					} else {
						echo $error;
					}
				}
			?>
			<form action="" method="post">
				<div class="form-group">
					<span id="error"></span>
					<label for="username">Username:</label>
					<input type="text" class="form-control" id="username" name="username" required>
				</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" id="pwd" name="password" required>
				</div>
				<button type="submit" name="submit" class="btn btn-default">Login</button>
			</form>
		</div>
	</body>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/garduino/sections/footer.php'?>
	<style>
		footer {
			bottom: 0;
		}
	</style>
</html>