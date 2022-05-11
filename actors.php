<?php

$engine = "mysql";

$host = "localhost";

$port = 3306;

$dbName = "sakila";

$username = "root";

$password = "root";

$pdo = new PDO("$engine:host=$host:$port;dbname=$dbName",$username,$password);

$statement = $pdo->prepare("SELECT * FROM actor");

$statement->execute();

$actors = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Acteurs/Actrices</title>
</head>
<body>
    <h1>Acteurs/Actrices</h1>
    <table border="1px">
        <thead>
            <tr>
                <th>id acteur</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>dernière mise à jour</th>
                <th>Suppession?</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($actors as $actor): ?>
                <tr>
                    <td><?=$actor["actor_id"]?></td>
                    <td>
                        <a
                            href="voir-actors.php?id=<?= $actor["actor_id"]?>" target="_blank">
                            <?= $actor["first_name"]?> 
                        </a>
                    </td>
                    <td><?= $actor["last_name"]?></td>
                    <td><?= $actor["last_update"]?></td>
                    <td>
                        <a href="supprimer-actors.php?id=<?=$actor["actor_id"]?>">
                        Supprimer
                        </a>
                    </td>
            
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <a href="ajout-actors.php" target="_blank">Ajouter un(e) acteur(trice)</a>
</body>
</html>