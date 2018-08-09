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
		<li class="logInOut"><a href="login.php">Log In</a></li>
		<li class="signup"><a href="signup.php" id="signup">Sign Up</a></li>
	</ul>
</nav>
<body>
	<div class="wrapper">
		<h1 class="text">Garduino</h1>
		<div class="row">
			<div class="col-sm-3">
				<h2>Lorem ipsum proident in velit.</h2>
				<p>In consequat dolore cillum occaecat sed sunt nulla consectetur qui pariatur adipisicing tempor ad dolore reprehenderit adipisicing culpa et dolor nulla ex quis deserunt adipisicing ea ut anim voluptate aute velit deserunt dolor id laboris deserunt proident pariatur laboris laborum officia commodo deserunt sed dolor cillum dolor ea eu irure nulla in quis dolor ut consectetur velit laboris velit adipisicing sunt adipisicing dolore dolore nulla ut minim deserunt ex eu nostrud quis.</p>
			</div>
			<div class="col-sm-6">
				<h2>Lorem ipsum proident in velit.</h2>
				<p>In consequat dolore cillum occaecat sed sunt nulla consectetur qui pariatur adipisicing tempor ad dolore reprehenderit adipisicing culpa et dolor nulla ex quis deserunt adipisicing ea ut anim voluptate aute velit deserunt dolor id laboris deserunt proident pariatur laboris laborum officia commodo deserunt sed dolor cillum dolor ea eu irure nulla in quis dolor ut consectetur velit laboris velit adipisicing sunt adipisicing dolore dolore nulla ut minim deserunt ex eu nostrud quis labore occaecat eu anim duis ullamco eu irure esse eiusmod exercitation est mollit nisi dolor excepteur enim in sunt aliquip id laboris labore ea occaecat consectetur enim duis dolore id in exercitation qui officia duis est consectetur dolore occaecat magna sit cupidatat aliqua deserunt incididunt ex consectetur reprehenderit et eiusmod aliquip officia cillum mollit tempor ut incididunt velit fugiat deserunt fugiat et reprehenderit ut pariatur elit incididunt ex excepteur aliquip commodo duis dolore sit velit elit aute voluptate ut esse non eiusmod excepteur aliqua nostrud mollit ut mollit magna amet sunt ut id dolor non in est ex duis pariatur ut ut adipisicing reprehenderit ad laborum proident do dolore voluptate aute ut.</p>
			</div>
			<div class="col-sm-3">
				<h2>Lorem ipsum proident in velit.</h2>
				<p>In consequat dolore cillum occaecat sed sunt nulla consectetur qui pariatur adipisicing tempor ad dolore reprehenderit adipisicing culpa et dolor nulla ex quis deserunt adipisicing ea ut anim voluptate aute velit deserunt dolor id laboris deserunt proident pariatur laboris laborum officia commodo deserunt sed dolor cillum dolor ea eu irure nulla in quis dolor ut consectetur velit laboris velit adipisicing sunt adipisicing dolore dolore nulla ut minim deserunt ex eu nostrud quis.</p>
			</div>
		</div>
	</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/garduino/sections/footer.php'?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/garduino/sections/scripts.php'?>
</body>
<style>
@import url('https://fonts.googleapis.com/css?family=Alfa+Slab+One&text=Garduino');
h2 {
	font-size: calc(12px + 2.5vw);
}
/*https://stackoverflow.com/questions/23984629/how-to-set-min-font-size-in-css*/
p {
	font-size: calc(12px + .7vw);
}
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