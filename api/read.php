<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
//Creating Array for JSON response
$response = array();
 
// Include data base connect class
$filepath = realpath (dirname(__FILE__));
require_once($filepath."/db_connect.php");

$tableName = $_GET['table'];
<<<<<<< HEAD
$userToken = $_GET['appid'];
=======
>>>>>>> ae5458457f4c510cd391299ca91813f7afa6fae0

 // Connecting to database 
$db = new DB_CONNECT();
 
<<<<<<< HEAD
$tokenResult = mysqli_query($db->connect(), "SELECT 1 FROM tokens WHERE appid = '$userToken'") or die(mysqli_error());
$tokenResult = $tokenResult->fetch_assoc();

if ($tokenResult[1] == 1) {
	// Fire SQL query to get all data from weather
	$result = mysqli_query($db->connect(), "SELECT * FROM $tableName") or die(mysqli_error());

	findTable($result, $tableName);
} else {
	echo 'Invalid Application Token! Please check your token and try again.';
}
=======
 // Fire SQL query to get all data from weather
$result = mysqli_query($db->connect(), "SELECT * FROM $tableName") or die(mysqli_error());


findTable($result, $tableName);
>>>>>>> ae5458457f4c510cd391299ca91813f7afa6fae0

function findTable($result, $tableName) {
	if ($tableName == 'weather') {
		arrayIfy($result, $tableName);
	} else if ($tableName == 'weather') {
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
	    // If no data is found
	    $response["success"] = 0;
	    $response["message"] = "No data found";
	 
	    // Show JSON response
	    echo json_encode($response);
	}
}

function arrayIfy($result, $tableName)
{
		$tempTable = $tableName;
		if (mysqli_num_rows($result) > 0) {
	    // Storing the returned array in response
	    $response[$tempTable] = array();
	 	$tempTable = array();
	    // While loop to store all the returned response in variable
	    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	        foreach ($row as $key => $value) {
	        	$tempTable[$key] = $row[$key];
	        }
	        array_push($response[$tableName], $tempTable);
	    }
	    // On success
	    $response["success"] = 1;
	 
	    // Show JSON response
	    echo json_encode($response);
		} else {
	    // If no data is found
	    $response["success"] = 0;
	    $response["message"] = "No data on weather found";
	 
	    // Show JSON response
	    echo json_encode($response);
		}
}


?>