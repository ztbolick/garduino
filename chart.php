<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Garduino Line Graph</title>
		<link href="css/default.css" rel="stylesheet">
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
	.chart-container {
		padding: 50px 5px;
	}
	canvas {
		padding: 50px 5px;
	}
</style>
	<footer>
		<!-- javascript -->
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
		<script src="js/line-db.js"></script>
	</footer>
</html>