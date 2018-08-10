<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include $_SERVER['DOCUMENT_ROOT'].'/garduino/sections/header.php'?>
		<?php include $_SERVER['DOCUMENT_ROOT'].'/garduino/sections/scripts.php'?>
	</head>
	<body>
		<div class="chart-container">
			<div class="current">
				<h3>Current
				<span id="currentReading"></span>
				</h3>
			</div>
<!-- 			<span>
		<?php if (isset($_SESSION['username'])) { echo var_dump($_SESSION);}?>
			</span> -->
			<canvas id="weatherChartCanvas"></canvas>
			<canvas id="eccChartCanvas" style="display: none;"></canvas>
			<canvas id="phChartCanvas" style="display: none;"></canvas>
			<canvas id="lumenChartCanvas" style="display: none;"></canvas>
			<!-- 		<canvas id="pumpChartCanvas" style="display: none;"></canvas> -->
		</div>
	</body>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/garduino/sections/footer.php'?>
	<script src="js/jsjqfinal.js"></script>
</html>>