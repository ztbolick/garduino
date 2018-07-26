<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//Creating Array for JSON response
$response = array();


// $queryString = "INSERT INTO weather(temp,hum) VALUES('$temp','$hum')";
 
// Check if we got the field from the user
if (isset($_GET['temp']) && isset($_GET['hum'])) {
 
    $temp = $_GET['temp'];
    $hum = $_GET['hum'];

    // Include data base connect class
    $filepath = realpath (dirname(__FILE__));
    require_once($filepath."/db_connect.php");
    require_once($filepath.'/query.php');

    // Creating DB connect object 
    $db = new DB_CONNECT();
    // Creating SQLStringify object
    $query = new SQLStringify();

    // Fire SQL query to insert data in weather
    $result = mysqli_query($db->connect(), $query->__call('query', 'temp', 'hum', $temp, $hum));
 
    // Check for succesfull execution of query
    if ($result) {
        // successfully inserted 
        $response["success"] = 1;
        $response["message"] = "Weather successfully updated!";
 
        // Show JSON response
        echo json_encode($response);
    } else {
        // Failed to insert data in database
        $response["success"] = 0;
        $response["message"] = "Something has gone horrible wrong...";
 
        // Show JSON response
        echo json_encode($response);
    }
} else {
    // If required parameter is missing
    $response["success"] = 0;
    $response["message"] = "Missing parameter(s). Check the request";
 
    // Show JSON response
    echo json_encode($response);
}
?>