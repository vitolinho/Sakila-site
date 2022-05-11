<?php
$engine = "mysql";
$host = "localhost";
$port = 3306;
$dbName = "sakila";
$username = "root";
$password = "root";

$pdo = new PDO("$engine:host=$host:$port;dbname=$dbName",$username,$password);

// TEST
// echo "We're IN !";

$statement = $pdo->prepare("SELECT * FROM film");

$statement->execute();

$films = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Films</title>
</head>
    <body>
        <table border="1px">
            <thead>
                <tr>
                    <th>Id film</th>
                    <th>Titre</th>
                    <th>Date de sortie</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($films as $film): ?>
                <tr>
                    <td><?=$film["film_id"]?></td>
                    <td>
                        <a
                            href="voir-films.php?id=<?= $film["film_id"]?>" target="_blank">
                            <?= $film["title"]?> 
                        </a>
                    </td>
                    <td><?= $film["release_year"]?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </body>
</html>