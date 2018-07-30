<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Garduino Line Graph</title>
	<link href="css/default.css" rel="stylesheet">
	<ul>
		<li><a class="active" href="Weather">Home</a></li>
		<li><a id="ECC">ECC</a></li>
		<li><a href="#PH">PH</a></li>
		<li><a href="#Lumens">Lumens</a></li>
		<li><a href="#Systems">Systems</a></li>
	</ul>
</head>
<body>
	<div class="chart-container">
		<canvas id="weather-chartcanvas"></canvas>
		<canvas id="ph-chartcanvas"></canvas>
		<canvas id="ecc-chartcanvas"></canvas>
		<canvas id="lumen-chartcanvas"></canvas>
		<canvas id="pump-chartcanvas"></canvas>
	</div>
</body>
<style type="text/css">
body {
	margin: 0px;
	padding: 0px;
	border: 0px;
	background-color: #eaeaea;
}
.chart-container {
	padding: 50px 5px;
}
canvas {
	padding: 50px 5px;
}
ul {
list-style-type: none;
margin: 0;
padding: 0;
overflow: hidden;
background-color: #333;
position: -webkit-sticky; /* Safari */
position: sticky;
top: 0;
}
li {
float: left;
}
li a {
display: block;
color: white;
text-align: center;
padding: 14px 16px;
text-decoration: none;
}
li a:hover {
background-color: #111;
}
.active {
background-color: #4CAF50;
}
</style>
<footer>
	<!-- javascript -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
	<script src="js/line-db.js"></script>
</footer>
</html>