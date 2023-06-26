<?php 
// per dire quali pagine sono autorizzate
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

// per far capire a js che si tratterà di un file json
header('Content-Type: application/json');

$data = $_POST;
$index = $data['index'];

$tasksStr = file_get_contents("data.json");
$tasks = json_decode($tasksStr, true);

$tasks[$index]["check"] = !$tasks[$index]["check"];

$tasksStr = json_encode($tasks);

file_put_contents("data.json", $tasksStr);
echo $tasksStr;
// echo json_encode($_POST);
