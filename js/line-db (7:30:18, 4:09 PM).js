
$(document).ready(function() {
	"use strict";
	/**
	 * call the read_all.php file to fetch the result from db table.
	 */

	$.ajax({
		url : "http://zacattack.000webhostapp.com/garduino/api/read_all.php",
		type : "GET",
		success : function(data){
			/*
			 *	Weather Chart
			 *
			 */

			// create arrays which will be used to graph
			var weatherData = {
				ID : [],
				temp : [],
				hum : []
			};
			var phData = {
				ID : [],
				phCurrent : [],
				phTarget : []
			};
			var eccData = {
				ID : [],
				eccCurrent : [],
				eccTarget : []
			};
			// loop through each element and push into individual arrays
			$.each(data.weather, function(i, item) {
				weatherData.ID.push(item.id);
				weatherData.temp.push(item.temp);
				weatherData.hum.push(item.hum);
			});
			$.each(data.weather, function(i, item) {
				phData.ID.push(item.id);
				phData.phCurrent.push(item.temp);
				phData.phTarget.push(item.hum);
			});
			$.each(data.weather, function(i, item) {
				eccData.ID.push(item.id);
				eccData.eccCurrent.push(item.temp);
				eccData.eccTarget.push(item.hum);
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


			/*
			 *	PH Chart
			 *
			 */
			//get canvas
			var phCtx = $("#ph-chartcanvas");
			// graph elements
			phData = {
				labels : phData.ID,
				datasets : [
					{
						label : "Current PH",
						data : phData.phCurrent,
						backgroundColor : "red",
						borderColor : "lightred",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					{
						label : "Target PH",
						data : phData.phTarget,
						backgroundColor : "blue",
						borderColor : "lightblue",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					}
				]
			};
			// set options for graph table
			var phOptions = {
				title : {
					display : true,
					position : "top",
					text : "PH Information",
					fontSize : 18,
					fontColor : "#111"
				},
				legend : {
					display : true,
					position : "bottom"
				}
			};

			var phChart = new Chart( phCtx, {
				type : "line",
				data : phData,
				options : phOptions
			} );


			/*
			 *	ECC Chart
			 *
			 */
			//get canvas
			var eccCtx = $("#ecc-chartcanvas");
			// graph ecc elements
			eccData = {
				labels : eccData.ID,
				datasets : [
					{
						label : "Current ECC",
						data : eccData.eccCurrent,
						backgroundColor : "red",
						borderColor : "lightred",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					{
						label : "Target ECC",
						data : eccData.eccTarget,
						backgroundColor : "blue",
						borderColor : "lightblue",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					}
				]
			};
			// set options for graph table
			var eccOptions = {
				title : {
					display : true,
					position : "top",
					text : "ECC Information",
					fontSize : 18,
					fontColor : "#111"
				},
				legend : {
					display : true,
					position : "bottom"
				}
			};

			var eccChart = new Chart( eccCtx, {
				type : "line",
				data : eccData,
				options : eccOptions
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
	// $.get("http://zacattack.000webhostapp.com/garduino/api/read_all.php", function(things){
	// 	console.log(things);
	// });



});
