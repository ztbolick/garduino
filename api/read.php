<?php

// Allow the script to be called cross site
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Origin: GET");
header("Content-Type: application/json; charset=UTF-8");
//Creating Array for JSON response
$response = array();
 
// Include data base connect class
include_once $_SERVER['DOCUMENT_ROOT'].'/garduino/api/db_connect.php';

// Get the table the user would like to read
$tableName = $_GET['table'];
// Get the users api token
$userToken = $_GET['appid'];

 // Connecting to database 
$db = new DB_CONNECT();
 
// Submit a query to the database
$tokenResult = mysqli_query($db->connect(), "SELECT 1 FROM tokens WHERE appid = '$userToken'") or die(mysqli_error());
// Convert the response into an assosiative array
$tokenResult = $tokenResult->fetch_assoc();

// If the token is in the database execute their query
if ($tokenResult[1] == 1) {
	// Fire SQL query to get all data from the table they've selected
	$result = mysqli_query($db->connect(), "SELECT * FROM $tableName") or die(mysqli_error());

	// Calls function to find out what table they want
	findTable($result, $tableName);
} else {
	// Token wasn't in the database so give them and error
	echo 'Invalid Application Token! Please check your token and try again.';
}

// Function to find out what table is being called
function findTable($result, $tableName) {
	// This could be a switch but whatever
	if ($tableName == 'weather') {
		arrayIfy($result, $tableName);
	} else if ($tableName == 'ecc') {
		arrayIfy($result, $tableName);
	} else if ($tableName == 'ph') {
		arrayIfy($result, $tableName);
	} else if ($tableName == 'pump') {
		arrayIfy($result, $tableName);
	} else if ($tableName == 'led') {
		arrayIfy($result, $tableName);
	} else if ($tableName == 'lumen') {
		arrayIfy($result, $tableName);
	} else {

		// If no table is found throw another error
		$response["success"] = 0;
		$response["message"] = "No data found! Check your table name and try again.";

		// JSON encode the response cause its the cool thing to do
		echo json_encode($response);
	}
}

// Function to push all the elements into an array
function arrayIfy($result, $tableName)
{
// make a table to put the table in
$tempTable = $tableName;
// check if the result has any information in it
if (mysqli_num_rows($result) > 0) {
	// Storing the returned array in response
	$response[$tempTable] = array();
		$tempTable = array();
	// While loop to store all the returned response in variable
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		// push all the elemens into table using a dynamic for each loop
		foreach ($row as $key => $value) {
			$tempTable[$key] = $row[$key];
		}
		// push the items into array
		array_push($response[$tableName], $tempTable);
	}
	// On success
	$response["success"] = 1;

	// Show JSON response
	echo json_encode($response);
	} else {
	// If no data is found in the response
	$response["success"] = 0;
	$response["message"] = "No data on weather found";

	// Show JSON response
	echo json_encode($response);
	}
}


?>