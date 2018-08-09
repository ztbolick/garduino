<?php

// Allow the script to be called cross site
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//Creating Array for JSON response
$response = array();
 


// // Check if we got the field from the user
// if (isset($_GET['temp']) && isset($_GET['hum'])) {
 
//     $temp = $_GET['temp'];
//     $hum = $_GET['hum'];
 
//     // Include data base connect class
//     $filepath = realpath (dirname(__FILE__));
// 	require_once($filepath."/db_connect.php");

 
//     // Connecting to database 
//     $db = new DB_CONNECT();
 
//     // Fire SQL query to insert data in weather
//     $result = mysqli_query($db->connect(), "INSERT INTO weather(temp,hum) VALUES('$temp','$hum')");
 
//     // Check for succesfull execution of query
//     if ($result) {
//         // successfully inserted 
//         $response["success"] = 1;
//         $response["message"] = "Weather successfully updated!";
 
//         // Show JSON response
//         echo json_encode($response);
//     } else {
//         // Failed to insert data in database
//         $response["success"] = 0;
//         $response["message"] = "Something has gone horrible wrong...";
 
//         // Show JSON response
//         echo json_encode($response);
//     }
// } else {
//     // If required parameter is missing
//     $response["success"] = 0;
//     $response["message"] = "Missing parameter(s). Check the request";
 
//     // Show JSON response
//     echo json_encode($response);
// }








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
 













































?>