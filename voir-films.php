<?php

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$engine = "mysql";
$host = "localhost";
$port = 3306;
$dbName = "sakila";
$username = "root";
$password = "root";

$pdo = new PDO("$engine:host=$host:$port;dbname=$dbName",$username,$password);

$statement = $pdo->prepare("SELECT * FROM film WHERE film_id = :id");

$statement->execute([
    ":id" => $id
]);

$statement->setFetchMode(PDO::FETCH_ASSOC);
$film = $statement->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Voir films</title>
</head>
<body>
    <h1><?=$film["title"]?></h1>
    <p><?=$film["release_year"]?></p>
</body>
</html>