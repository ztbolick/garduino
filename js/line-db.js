/*
 * Garduino an integrated dashboard for arduino gardens
 * Copyright (C) 2018 Zac Bolick
 *
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation, either version 3 of the License, or (at your option)
 * any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of  MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for
 * more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * this program.  If not, see <http://www.gnu.org/licenses/>.
 */

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
};

var currentReadings = [];

Array.prototype.last = function() {
	return this[this.length-1];
};

Array.prototype.insert = function ( index, item ) {
    this.splice( index, 0, item );
};

$(document).ready(function() {
	"use strict";

	// Preforms AJAX call for each of the charts
	chartInit();	

	// Assigns a click event listener to each nav element
	$('nav ul li a').on('click', function() {
		$('nav ul li a').removeClass('active');
		$(this).addClass('active');
		
		// Use the id of the element that was clicked to make a string
		// containing the graph canvas to be targeted
		var chartName = $(this).prop('id');
		chartName+= 'ChartCanvas';

		// loop through all chart elements looking for the id
		$.each($('canvas'), function(i, item) {
			// if we find the chart show it
			if ($(this).prop('id') == chartName) {
				$(this).slideDown('1000');
			} // if we it's not the one we want hide it
			else {
				$(this).slideUp('1000');
			}
		});

		// set the current reading for whatever chart we're on
		if (chartName == 'weatherChartCanvas') {
			setCurrentReading(' Temp: ' + currentReadings[0]);
		} else if (chartName == 'eccChartCanvas') {
			setCurrentReading(' ECC: ' + currentReadings[1]);
		} else if (chartName == 'phChartCanvas') {
			setCurrentReading(' pH: ' + currentReadings[2]);
		} else if (chartName == 'lumenChartCanvas') {
			setCurrentReading(' Lumens: ' + currentReadings[3]);
		}
	});
});










/*
 * Ajax Chart Fuctions
 *
 * Each of these fucntions fires an ajax call to the read API
 * and returns the JSON data it does not take an arguments
 */

function chartInit() {
	weatherSelected();
	eccSelected();
	phSelected();
	lumenSelected();
}


function weatherSelected() {
	$.ajax({
		url : "http://zacattack.000webhostapp.com/garduino/api/read.php?table=weather&appid=test",
		type : "GET",
		success : function(data){
			Chart.defaults.global.hover.mode = 'nearest';

			let weatherData = {
			ID : [],
			temp : [],
			hum : []
			};

			$.each(data[Object.keys(data)[0]], function(i, item) {
				weatherData.ID.push(item.id);
				weatherData.temp.push(item.temp);
				weatherData.hum.push(item.hum);
			});

			currentReadings.insert(0, weatherData.temp.last());

			//get canvas
			let weatherCtx = $("#weatherChartCanvas");
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
				type : "bar",
				data : weatherData,
				options : weatherOptions
			});
		},
		error : function(data) {
			console.log(data);
		}
	});	
}

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

			currentReadings.insert(1, eccData.eccCurrent.last());

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
			currentReadings.insert(2, phData.phCurrent.last());

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
			currentReadings.insert(3, lumenData.lumenCurrent.last());


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