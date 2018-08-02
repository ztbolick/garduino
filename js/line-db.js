
var colorSet = {
	mainA : '#05668D',
	mainAlight : '#76ABC0',
	mainAdark : '#03384D',
	mainB : '#028090',
	mainBlight : '#A3D0D6',
	mainBdark : '#025E69',
	secondA : '#00A896',
	secondAlight : '#A2DFD8', 
	secondAdark : '#007B6E', 
	secondB : '#02C39A', 
	secondBlight : '#A3E9DA', 
	secondBdark : '#028E71', 
	accent : '#F75C03', 
	accentLight : '#FCC3A3', 
	accentDark : '#B44303',
}
Array.prototype.last = function() {return this[this.length-1];}

$(document).ready(function() {
	"use strict";
<<<<<<< HEAD

	$.ajax({
		url : "http://zacattack.000webhostapp.com/garduino/api/read.php?table=weather&appid=test",
		type : "GET",
		success : function(data){
			Chart.defaults.global.hover.mode = 'nearest';
=======
	$.ajax({
		url : "http://zacattack.000webhostapp.com/garduino/api/read.php?table=weather",
		type : "GET",
		success : function(data){

			// console.log(data);
>>>>>>> ae5458457f4c510cd391299ca91813f7afa6fae0

			let weatherData = {
			ID : [],
			temp : [],
			hum : []
			};
<<<<<<< HEAD
=======
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
>>>>>>> ae5458457f4c510cd391299ca91813f7afa6fae0

			$.each(data[Object.keys(data)[0]], function(i, item) {
				weatherData.ID.push(item.id);
				weatherData.temp.push(item.temp);
				weatherData.hum.push(item.hum);
			});
<<<<<<< HEAD

			setCurrentReading(weatherData.temp.last());

			//get canvas
			let weatherCtx = $("#weatherChartCanvas");
=======

			//get canvas
			let weatherCtx = $("#weather-chartcanvas");
>>>>>>> ae5458457f4c510cd391299ca91813f7afa6fae0
			// graph elements
			weatherData = {
				labels : weatherData.ID,
				datasets : [
					{
						label : "Tempurature",
						data : weatherData.temp,
						backgroundColor : colorSet.mainA,
						borderColor : colorSet.mainAlight,
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					{
						label : "Humidity",
						data : weatherData.hum,
						backgroundColor : colorSet.secondA,
						borderColor : colorSet.secondAlight,
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
					fontSize : 30,
					fontColor : "#111"
				},
				legend : {
					display : true,
					position : "bottom",
					labels : {
						fontSize : 15,
						padding : 20,
					},
					labels : {
						fontSize : 15,
						padding : 20,
					}
				},scales : {
			        yAxes: [{
			            display: true,
			            ticks: {
			                suggestedMax: 120, 
			            }
			        }]
			    }
			};
			// create chart
			let weatherChart = new Chart( weatherCtx, {
				type : "line",
				data : weatherData,
				options : weatherOptions
<<<<<<< HEAD
			});
=======
			} );
>>>>>>> ae5458457f4c510cd391299ca91813f7afa6fae0
		},
		error : function(data) {
			console.log(data);
		}
	});
<<<<<<< HEAD






















	$('nav ul li a').on('click', function() {
		$('nav ul li a').removeClass('active');
		$(this).addClass('active');
		

		var chartName = $(this).prop('id');
		chartName+= 'ChartCanvas';

		$.each($('canvas'), function(i, item) {
			

			if ($(this).prop('id') == chartName) {
				$(this).slideDown();
			} else {
				$(this).slideUp();
			}
		});

		if (chartName == 'eccChartCanvas') {
			eccSelected();
		} else if (chartName == 'phChartCanvas') {
			phSelected();
		} else if (chartName == 'lumenChartCanvas') {
			lumenSelected();
		}
	});

});




















function eccSelected() {
	$.ajax({
		url : "http://zacattack.000webhostapp.com/garduino/api/read.php?table=ecc&appid=test",
		type : "GET",
		success : function(data){
			let eccData = {
			ID : [],
			eccCurrent : [],
			eccTarget : [],
			eccDifference : []
			};

			$.each(data.ecc, function(i, item) {
				eccData.ID.push(item.id);
				eccData.eccCurrent.push(item.eccCurrent);
				eccData.eccTarget.push(item.eccTarget);
				eccData.eccDifference.push(item.eccCurrent-item.eccTarget);
			});

			setCurrentReading(eccData.eccCurrent.last());

			//get canvas
			let eccCtx = $("#eccChartCanvas");
			// graph elements
			eccData = {
				labels : eccData.ID,
				datasets : [{
						label : "Target ECC",
						data : eccData.eccTarget,
						backgroundColor : colorSet.mainA,
						borderColor : colorSet.mainAlight,
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					{
						label : "Current ECC",
						data : eccData.eccCurrent,
						backgroundColor : colorSet.secondA,
						borderColor : colorSet.secondAlight,
						fill : false,
						lineTension : 0,
						pointRadius : 5,
					},
					{
						label : 'Difference',
						data : eccData.eccDifference,
						backgroundColor : colorSet.accent,
						borderColor : colorSet.accentLight,
						fill : false,
						lineTension : 0,
						pointRadius : 5,
					}
				]
			};
			// set options for graph table
			let eccOptions = {
				title : {
					display : true,
					position : "top",
					text : "ECC Information",
					fontSize : 30,
					fontColor : "#111"
				},
				legend : {
					display : true,
					position : "bottom",
					labels : {
						fontSize : 15,
						padding : 20,
					}
				}
			};
			// create chart
			let eccChart = new Chart( eccCtx, {
				type : "line",
				data : eccData,
				options : eccOptions
			});
		},
		error : function(data) {
			console.log(data);
		}
	});
}

function phSelected() {
	$.ajax({
		url : "http://zacattack.000webhostapp.com/garduino/api/read.php?table=ph&appid=test",
		type : "GET",
		success : function(data){
			let phData = {
			ID : [],
			phCurrent : [],
			phTarget : [],
			phDifference : []
			};

			$.each(data.ph, function(i, item) {
				phData.ID.push(item.id);
				phData.phCurrent.push(item.phCurrent);
				phData.phTarget.push(item.phTarget);
				phData.phDifference.push(item.phCurrent-item.phTarget);

			});
			setCurrentReading(phData.phCurrent.last());

			//get canvas
			let phCtx = $("#phChartCanvas");
			// graph elements
			phData = {
				labels : phData.ID,
				datasets : [
					{
						label : "Current pH",
						data : phData.phCurrent,
						backgroundColor : colorSet.mainA,
						borderColor : colorSet.mainAlight,
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					{
						label : "Target pH",
						data : phData.phTarget,
						backgroundColor : colorSet.secondA,
						borderColor : colorSet.secondAlight,
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					{
						label : 'Difference',
						data : phData.phDifference,
						backgroundColor : colorSet.accent,
						borderColor : colorSet.accentLight,
						fill : false,
						lineTension : 0,
						pointRadius : 5,
					}
				]
			};
			// set options for graph table
			let phOptions = {
				title : {
					display : true,
					position : "top",
					text : "pH Information",
					fontSize : 30,
					fontColor : "#111"
				},
				legend : {
					display : true,
					position : "bottom",
					labels : {
						fontSize : 15,
						padding : 20,
					}
				}
			};
			// create chart
			let phChart = new Chart( phCtx, {
				type : "line",
				data : phData,
				options : phOptions
			});
		},
		error : function(data) {
			console.log(data);
		}
	});
}

function lumenSelected() {
	$.ajax({
		url : "http://zacattack.000webhostapp.com/garduino/api/read.php?table=lumen&appid=test",
		type : "GET",
		success : function(data){
			let lumenData = {
			ID : [],
			lumenCurrent : [],
			lumenTarget : [],
			lumenDifference : []
			};

			$.each(data.lumen, function(i, item) {
				lumenData.ID.push(item.id);
				lumenData.lumenCurrent.push(item.lumenCurrent);
				lumenData.lumenTarget.push(item.lumenTarget);
				lumenData.lumenDifference.push(item.lumenTarget- item.lumenCurrent);
			});
			setCurrentReading(lumenData.lumenCurrent.last());


			//get canvas
			let lumenCtx = $("#lumenChartCanvas");
			// graph elements
			lumenData = {
				labels : lumenData.ID,
				datasets : [
					{
						label : "Current lumen",
						data : lumenData.lumenCurrent,
						backgroundColor : colorSet.mainA,
						borderColor : colorSet.mainAlight,
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					{
						label : "Target lumen",
						data : lumenData.lumenTarget,
						backgroundColor : colorSet.secondA,
						borderColor : colorSet.secondAlight,
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					{
						label : 'Difference',
						data : lumenData.lumenDifference,
						backgroundColor : colorSet.accent,
						borderColor : colorSet.accentLight,
						fill : false,
						lineTension : 0,
						pointRadius : 5,
					}
				]
			};
			// set options for graph table
			let lumenOptions = {
				title : {
					display : true,
					position : "top",
					text : "Lumen Information",
					fontSize : 30,
					fontColor : "#111"
				},
				legend : {
					display : true,
					position : "bottom",
					labels : {
						fontSize : 15,
						padding : 20,
					}
				},
				scales : {
			        yAxes: [{
			            display: true,
			            ticks: {
			                suggestedMax: 800, 
			                suggestedMin: 200, 
			            }
			        }]
			    }
			};
			// create chart
			let lumenChart = new Chart( lumenCtx, {
				type : "line",
				data : lumenData,
				options : lumenOptions
			});
		},
		error : function(data) {
			console.log(data);
		}
	});
}

function setCurrentReading(value) {
	$('#currentReading').html(value)
}









=======
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



















>>>>>>> ae5458457f4c510cd391299ca91813f7afa6fae0










