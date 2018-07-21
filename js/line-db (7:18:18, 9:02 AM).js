$(document).ready(function() {

	/**
	 * call the data.php file to fetch the result from db table.
	 */
	$.ajax({
		url : "http://zacattack.000webhostapp.com/garduino/api/read_all.php",
		type : "GET",
		success : function(data){
			var weatherData = {
				ID : [],
				temp : [],
				hum : []
			};

			for (var i = 0; i < data.weather.length; i++) {
				if (data.weather[i]['id']) {
					weatherData.ID.push(data.weather[i]['id']);
					weatherData.temp.push(data.weather[i]['temp']);
					weatherData.hum.push(data.weather[i]['hum']);
				}
			}

			//get canvas
			var ctx = $("#line-chartcanvas");

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

});