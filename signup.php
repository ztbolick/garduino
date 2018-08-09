<!DOCTYPE html>
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
		<?php 
		if (isset($_GET['signup'])) {
			if ($_GET['signup'] == 'error') {
				echo '<br><br><br><br><span><div class="alert-danger" role="alert">An Error Occured Please Try again</div></span>';
			} else if ($_GET['signup'] == 'sucess') {
				echo '<br><br><br><br><span><div class="alert-success" role="alert">Sign Up Suncessful</div></span>';
			}
		} else {
			echo '<div class="container">
			<h3 class="text-center">Sign Up</h3>
			<form action="signup.inc.php" method="post">
				<img href="images/Happy-Hippy.jpg" target="_blank" class="side-img" src="images/thumbnail.php?pic=Happy-Hippy.jpg&ht=400&wd=400">
				<div class="form-group">
					<label for="username">Username:</label>
					<input type="text" class="form-control" id="username" name="username_new" required>
					<span><div class="alert-warning" role="alert" id="emailError">Invalid email</div></span>
					<label for="email">Email:</label>
					<input type="text" class="form-control" id="email" name="email" required>
					<label for="email">Phone:</label>
					<input type="text" class="form-control" id="phone" name="phone" required>
					<span><div class="alert-warning" role="alert" id="passwordError">Passwords Don\'t mach!</div></span>
					<label for="password">Password:</label>
					<input type="password" class="form-control" id="password" name="password_new" required>
					<label for="password">Verify:</label>
					<input type="password" class="form-control" id="password_repeate" name="password_repeate" required>
					<button type="submit" name="submit" class="btn btn-default">Login</button>
				</div>
			</form>
		</div>
	</body>
			';
		}
		?>
	<script type="text/javascript">
			$(document).ready(function() {
				$('#passwordError').hide();
				$('#emailError').hide();
				$('#password_repeate').on ('blur', function () {
					let pword = $('#password').val();
					let pwrod2 = $(this).val();
					if (pword !== pwrod2) {
						$('#passwordError').show();
					} else {
						$('#passwordError').hide();
					}
				});
				$('#email').on ('blur', function() {
					let email = $('#email').val();
					if( email.search("@") == -1){
					  $('#emailError').show();
					} else {
						$('#emailError').hide();
					}
				});
			});
			</script>
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