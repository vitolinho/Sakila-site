<?php

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$engine="mysql";
$host="localhost";
$port=3306;
$dbName="sakila";
$username="root";
$password="root";

$pdo = new PDO("$engine:host=$host:$port;dbname=$dbName",$username,$password);

$statement = $pdo->prepare("SELECT * FROM category WHERE category_id = :id");

$statement->execute([
    ":id" => $id
]);

$category = $statement->fetch(PDO::FETCH_ASSOC);
?> 

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>voir la catégorie</title>
</head>
<body>
    <h1><?= $category["name"] ?></h1>
    <em>Dernière mise à jour : <?= $category["last_update"] ?></em>
</body>
</html>