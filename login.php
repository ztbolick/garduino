<?php
error_reporting(0);

$error = '<div class="alert-danger" role="alert">Invalid Login! Please check your Username and Password and try again!</div>';
?>
<!DOCTYPE html>
<html>
	<!-- Head -->
	<head>
		<title>Log In</title>
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
				<li class="logInOut"><a href="login.php" class="active">Log In</a></li>
				<li class="signup"><a href="signup.php" id="signup">Sign Up</a></li>
			</ul>
		</nav>
	</head>
	<!-- Body -->
	<body>
		<div class="container">
			<h3>Login</h3>

			<form action="login.inc.php" method="post" accept-charset="UTF-8">
				<div class="form-group">
					<span id="error"><?php if ($_GET['login'] == 'error') {
						echo $error;
					} ?></span>
					<label for="username">Username:</label><br>
					<input type="username" name="username_current" maxlength="250" id="username_current" required="required" autofocus="autofocus" autocomplete="current-username"/><br>
					<label for="password_current">Password:</label><br>
					<input type="password" name="password_current" maxlength="30" id="password_current" required="required" autofocus="autofocus" autocomplete="current-password"/><br>
				<input type="hidden" name="username" value="mike.jones" autocomplete="username" readonly="readonly" />
				<input type="hidden" name="password" value="af5e1as1fe8" autocomplete="password" readonly="readonly" />
				<button type="submit" name="submit" class="btn btn-default">Login</button><br>
				</div>
			</form>
		</div>
	</body>
	<!-- Footer -->
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
		<br>
		<br>
		<br>
		<br>
	</footer>
	<style>
	.footer-distributed{
		position: absolute;
		bottom: 0px;
	}
	@media (max-width: 967px) {
			.footer-distributed{
			bottom: auto;
		}
	}
	</style>
</html>