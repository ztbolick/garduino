<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to Garduino</title>
</head>
<nav>
	<ul>
		<li><a href="http://zacattack.000webhostapp.com/garduino/" class="active">Home</a></li>
		<li><a href="https://github.com/ztbolick/garduino">Garduino Git</a></li>
		<li><a href="https://github.com/ztbolick/garduino/blob/master/README.md">Docs</a></li>
		<li><a href="https://github.com/ztbolick/garduino/wiki">Faq</a></li>
		<li><a href="http://codingwithzac.com/">Creator</a></li>
		<li><a href="#">Contact</a</li>
		<li class="logInOut"><a href="logout.php">Log Out</a></li>
		<li class="signup"><a href="chart.php">My Garduino</a></li>
	</ul>
</nav>
<body>
	<div class="wrapper">
		<?php
		echo var_dump($_SESSION);
		if(isset($_SESSION['username'])) {
			echo $_SESSION['username'] . '<br>';
		} else {
			echo 'none';
		}
		if(isset($_SESSION['appid'])) {
			echo $_SESSION['appid'] . '<br>';
		} else {
			echo 'none';
		}
		?>
		<h1 class="text">Garduino</h1>
		<div class="row">
			<div class="col-sm-9">
				<form action="post">
				<h2>My Account</h2>
				<span><div class="alert-warning" role="alert" id="emailError">Invalid email</div></span>
				<p>Email: </p>
				<input type="text" id="email">
				<br>
				<button>Update</button>
				<p>Phone: </p>
				<input type="text" id="phone">
				<br>
				<button>Update</button>
				<span><div class="alert-warning" role="alert" id="passwordError">Passwords Don't mach!</div></span>
				<p>Password: </p>
				<input type="text" id="password" name="pword">
				<p>Confirm: </p><input type="text" id="password_repeate" name="pword">
				<br>
				<button>Update</button>
				</form>
			</div>
		</div>
	</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/garduino/sections/footer.php'?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/garduino/sections/scripts.php'?>
</body>
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
<style>
@import url('https://fonts.googleapis.com/css?family=Alfa+Slab+One&text=Garduino');
/*https://css-tricks.com/css-techniques-and-effects-for-knockout-text/*/
.text{
font: bolder 18vw 'Alfa Slab One';
text-align: center;
margin: 0;
background: url("http://zacattack.000webhostapp.com/garduino/images/knockout-image.jpg") center;
background-size: contain;
margin: auto;
width: 91vw;
background-clip: text;
-webkit-background-clip:text;
color: transparent;
}
</style>
</html>