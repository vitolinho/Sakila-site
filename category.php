<?php

$engine="mysql";
$host="localhost";
$port=3306;
$dbName="sakila";
$username="root";
$password="root";

$pdo = new PDO("$engine:host=$host:$port;dbname=$dbName",$username,$password);

// étape1
$statement = $pdo->prepare("SELECT * FROM category");
// étape2
$statement->execute();
// étape3
$categorys = $statement->fetchAll(PDO::FETCH_ASSOC);
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>category</title>
</head>
<body>
    <h1>Catégories</h1>
    <table border="1px">
    <thead>
        <tr>
            <th>Identifiant</th>
            <th>Nom</th>
            <th>Dernière mise à jour</th>
            <th>Suppresion ?</th> 
        </tr>
    </thead>
    <tbody>
        <?php foreach($categorys as $category ):?>
            <tr>
                <td><?= $category["category_id"]?></td>
                <td><a href="voir-category.php?id=<?= $category["category_id"]?>" target="_blank"><?= $category["name"]?>
                    </a>
                </td>
                <td><?= $category["last_update"]?></td>
                <td>
                    <a href="supprimer-category.php?id=<?=$category["category_id"]?>">
                    Supprimer
                    </a>  
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
    <a href="ajout-category.php" target="_blank">Ajouter une catégorie</a>
</body>
</html>