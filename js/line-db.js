
$(document).ready(function() {
	"use strict";
	$.ajax({
		url : "http://zacattack.000webhostapp.com/garduino/api/read.php?table=weather",
		type : "GET",
		success : function(data){
			var weatherData = {
			ID : [],
			temp : [],
			hum : []
			};

			$.each(data.weather, function(i, item) {
				weatherData.ID.push(item.id);
				weatherData.temp.push(item.temp);
				weatherData.hum.push(item.hum);
			});

			//get canvas
			var weatherCtx = $("#weather-chartcanvas");
			// graph elements
			weatherData = {
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
			var weatherOptions = {
				title : {
					display : true,
					position : "top",
					text : "Weather Information",
					fontSize : 18,
					fontColor : "#111"
				},
				legend : {
					display : true,
					position : "bottom"
				}
			};
			// create chart
			var weatherChart = new Chart( weatherCtx, {
				type : "line",
				data : weatherData,
				options : weatherOptions
			} );
		},
		error : function(data) {
			console.log(data);
		}
	});

	$.('#ECC').click(function() {
		alert('yey');
	}):

});
