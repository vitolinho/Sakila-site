<?php

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if($id) {
    $engine="mysql";
    $host="localhost";
    $port=3306;
    $dbName="sakila";
    $username="root";
    $password="root";

    $pdo= new PDO("$engine:host=$host:$port;dbname=$dbName",$username,$password);

    $statement = $pdo->prepare("DELETE FROM actor WHERE actor_id = :id");

    $statement->execute([
        ':id'=>$id
    ]);
}

http_response_code(302);
header('Location: actors.php');
exit();