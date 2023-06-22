<?php 
// per dire quali pagine sono autorizzate
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Headers: X-Requested-With");

    // per far capire a js che si tratterà di un file json
    header('Content-Type: application/json');

    $task = ['spesa','bucato','lavoro'];

    // trasformare gli array php in oggetti json
    echo json_encode($task);

    // La funzione json_decode() traduce una stringa da formato json in una variabile PHP.
?>