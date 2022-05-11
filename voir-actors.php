<?php

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$engine = "mysql";
$host = "localhost";
$port = 3306;
$dbName = "sakila";
$username = "root";
$password = "root";

$pdo = new PDO("$engine:host=$host:$port;dbname=$dbName",$username,$password);

$statement = $pdo->prepare("SELECT * FROM actor WHERE actor_id = :id");

$statement->execute([
    ":id" => $id
]);

$statement->setFetchMode(PDO::FETCH_ASSOC);
$actor = $statement->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Voir acteurs</title>
</head>
<body>
    <h1><?=$actor["last_name"]?></h1>
    <h2><?=$actor["first_name"]?></h2>
    <em>Dernière mise à jour : <?= $actor["last_update"] ?></em>
</body>
</html>