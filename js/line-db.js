$(document).ready(function() {

	/**
	 * call the read_all.php file to fetch the result from db table.
	 */
	$.ajax({
		url : "http://zacattack.000webhostapp.com/garduino/api/read_all.php",
		type : "GET",
		success : function(data){

			// create arrays which will be used to graph
			var weatherData = {
				ID : [],
				temp : [],
				hum : []
			};

			// loop through each element and push into individual arrays
			$.each(data.weather, function(i, item) {
				weatherData.ID.push(item.id);
				weatherData.temp.push(item.temp);
				weatherData.hum.push(item.hum);
			});

			//get canvas
			var ctx = $("#line-chartcanvas");

			// graph elements
			var data = {
				labels : weatherData.ID,
				datasets : [
					{
						label : "Tempurature",
						data : weatherData.temp,
						backgroundColor : "red",
						borderColor : "lightred",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					{
						label : "Humidity",
						data : weatherData.hum,
						backgroundColor : "blue",
						borderColor : "lightblue",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					}
				]
			};

			// set options for graph table
			var options = {
				title : {
					display : true,
					position : "top",
					text : "Atmospheric Information",
					fontSize : 18,
					fontColor : "#111"
				},
				legend : {
					display : true,
					position : "bottom"
				}
			};

			// create chart
			var chart = new Chart( ctx, {
				type : "line",
				data : data,
				options : options
			} );

		},
		error : function(data) {
			console.log(data);
		}
	});

	// var http = new XMLHttpRequest();

	// http.onreadystatechange = function () {
	// 	if (http.readystate == 4 && http.status == 200) {

	// 	}
	// }

	// http.open("GET", "http://zacattack.000webhostapp.com/garduino/api/read_all.php", true);
	// http.send();


	$.get("http://zacattack.000webhostapp.com/garduino/api/read_all.php", function(things){
		console.log(things);
	});





















});