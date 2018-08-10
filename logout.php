<?php
ob_start();
include_once $_SERVER['DOCUMENT_ROOT'].'/garduino/api/db_connect.php';


if(isset($_SESSION['username'])) {
	$uname = $_SESSION['username']
	$db = new DB_CONNECT();
	$query = "UPDATE `streetCred` SET `active` = 'no' WHERE `nobres` = '$uname'";
	mysqli_query($db->connect(), $query);
	logOut();
} else {
	exit(header("Location: home.php"));
}


function logOut() {
	echo '<!DOCTYPE html>
<html>
<!-- Head -->
	<head>
		<title>Sign Up</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="arduino, garden, hydroponic, api, PHP, jQuery"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php include $_SERVER['DOCUMENT_ROOT'].'/garduino/sections/scripts.php'?>
		<nav>
			<ul>
				<li><a href="http://zacattack.000webhostapp.com/garduino/">Home</a></li>
				<li><a href="https://github.com/ztbolick/garduino">Garduino Git</a></li>
				<li><a href="https://github.com/ztbolick/garduino/blob/master/README.md">Docs</a></li>
				<li><a href="https://github.com/ztbolick/garduino/wiki">Faq</a></li>
				<li><a href="http://codingwithzac.com/">Creator</a></li>
				<li><a href="#">Contact</a</li>
				<li class="logInOut"><a href="login.php">Log In</a></li>
				<li class="signup"><a href="signup.php" class="active">Sign Up</a></li>
			</ul>
		</nav>
	</head>
	<body>
		<div class="container">
			<h3 class="text-center">Logged Out</h3>
			<br><br><span><div class="alert-success" role="alert">Log Out Sucessful!</div></span>
		</div>
	</body>
	<footer class="footer-distributed">
			<div class="footer-left">
				<h3>Garduino</h3>
				<p class="footer-links">
					<a href="http://zacattack.000webhostapp.com/garduino/">Home</a>
					·
					<a href="https://github.com/ztbolick/garduino">Garduino Git</a>
					·
					<a href="https://github.com/ztbolick/garduino/blob/master/README.md">Docs</a>
					·
					<a href="https://github.com/ztbolick/garduino/wiki">Faq</a>
					·
					<a href="http://codingwithzac.com/">Creator</a>
					·
					<a href="#">Contact</a>
				</p>
				<p class="footer-company-name">Garduino &copy; 2018</p>
				<div class="footer-icons">
					<a href="https://cscmesa.slack.com/"><i class="fa fa-slack"></i></a>
					<a href="https://www.youtube.com/channel/UCE-EssmkNQkWWZiIBR0D7sw"><i class="fa fa-youtube"></i></a>
					<a href="https://www.linkedin.com/in/zacbolick/"><i class="fa fa-linkedin"></i></a>
					<a href="https://github.com/ztbolick"><i class="fa fa-github"></i></a>
				</div>
			</div>
			<div class="footer-right">
				<p>Contact Us</p>
				<form action="#" method="post">
					<input type="text" name="email" placeholder="Email" />
					<textarea name="message" placeholder="Message"></textarea>
					<button type="email" name="email">Send</button>
				</form>
			</div>
		</footer>
<style>
@media (max-width: 967px) {
		.footer-distributed{
		bottom: auto;
	}
}
</style>
</html>';
}

?>