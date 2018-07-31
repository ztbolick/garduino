
$(document).ready(function() {
	"use strict";
	$.ajax({
		url : "http://zacattack.000webhostapp.com/garduino/api/read.php?table=weather",
		type : "GET",
		success : function(data){

			// console.log(data);

			let weatherData = {
			ID : [],
			temp : [],
			hum : []
			};
			let parsedData = [];

			for (let things in data) {
				for (let theArrays in data[things]) {
					for (let vals in data[things][theArrays]) {
						// console.log(vals + ' is ' + data[things][theArrays][vals]);
						if (parsedData.length == 0) {
							// push catagory name if none exist in parsed data yet
							parsedData.push(vals);
						} else {
							// loop through parsed data to see if a catagory has been added
							for (var i = 0; i < parsedData.length; i++) {
								let j = 0;
								console.log('vals: ' + vals);
								console.log('parsedData: ' + parsedData[i]);
								console.log(parsedData.length);
								if (vals == parsedData[i]) {
									j++;
								}
								console.log(j);
							}
						}
						// parsedData.vals.push(data[things][theArrays][vals]);
					}
				}
			}
			console.log(parsedData);

			$.each(data[Object.keys(data)[0]], function(i, item) {
				weatherData.ID.push(item.id);
				weatherData.temp.push(item.temp);
				weatherData.hum.push(item.hum);
			});

			//get canvas
			let weatherCtx = $("#weather-chartcanvas");
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
			let weatherOptions = {
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
			let weatherChart = new Chart( weatherCtx, {
				type : "line",
				data : weatherData,
				options : weatherOptions
			} );
		},
		error : function(data) {
			console.log(data);
		}
	});
	$('ul li a').on('click', function() {
		$('ul li a').removeClass('active');
		let element = $(this);
		element.addClass('active');
		let chartName = element.text().toLowerCase();
		$.ajax({
			url : "http://zacattack.000webhostapp.com/garduino/api/read.php?table=" + chartName,
			type : "GET",
			success : function(data){
				let weatherData = {
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
				let weatherCtx = $("#weather-chartcanvas");
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
				let weatherOptions = {
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
				let weatherChart = new Chart( weatherCtx, {
					type : "line",
					data : weatherData,
					options : weatherOptions
				} );
			},
			error : function(data) {
				console.log(data);
			}
		});
	});
});





























