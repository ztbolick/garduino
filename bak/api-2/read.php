<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include './dbconfig.php';
$response = array();

$dsn = 'mysql:host=' . DB_SERVER . ';dbname=' . DB_DATABASE;
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

$table = 'weather';

$stmt = $pdo->prepare('SELECT * FROM ?');
$stmt->bindParam(1, $table, PDO::PARAM_STR);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
var_dump($posts);
echo "</pre>";

	// while ($row = $staement->fetch(PDO::FETCH_ASSOC)) {
	// 	$response["weather"] = array();
	// 	$weather = array();
	// 	$weather["id"] = $row["id"];
	// 	$weather["temp"] = $row["temp"];
 //        $weather["hum"] = $row["hum"];

 //        array_push($response["weather"], $weather);
 //     }

	// $response["success"] = 1;
 
 //    // Show JSON response
 //    echo json_encode($response);

	
?>