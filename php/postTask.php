<?php 
// per dire quali pagine sono autorizzate
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Headers: X-Requested-With");

    // per far capire a js che si tratterà di un file json
    header('Content-Type: application/json');

    // mi prendo l'oggetto nuova task da app.vue
    $data = $_POST;
    $data["check"] = false;

    // prendo da data.json l'array di oggetti
    $tasksStr = file_get_contents("data.json");
    // lo trasformo in un array leggibile da php 
    $tasks = json_decode($tasksStr);

    // prendo l'array e ci pusho dentro l'oggetto nuova task preso da APP.vue tramite il $_POST
    $tasks[] = $data;

    // ritrasfonrmo i dati in json
    $tasksStr = json_encode($tasks);

    // rimando l'array a data.json
    file_put_contents("data.json", $tasksStr);

    // rispondo alla chiamata axios con il nuovo array con dentro l'oggetto newtask
    echo $tasksStr;