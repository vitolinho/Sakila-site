<?php

if($_SERVER["REQUEST_METHOD"]=="POST") {
    $first_name = filter_input(INPUT_POST, "first_name");
    $last_name = filter_input(INPUT_POST, "last_name");

    if($first_name && $last_name){
        $engine = "mysql";
        $host = "localhost";
        $port = 3306;
        $dbName = "sakila";
        $username = "root";
        $password = "root";

        $pdo = new PDO("$engine:host=$host:$port;dbname=$dbName",$username,$password);

        $statement = $pdo->prepare("INSERT INTO actor (first_name, last_name) VALUES (:first_name, :last_name)");
        
        $statement->execute([
            ":first_name" => $first_name,
            ":last_name" => $last_name
        ]);

        http_response_code(302);
        header('Location: actors.php');
        exit();
    }
} else{
    echo "On est en GET";
}
?> <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un acteur</title>
</head>
<body>
    <h1>Ajouter un acteur</h1>
    <form method="POST">
    <label for="first_name">Prénom à ajouter : </label>
    <input type="text" id="first_name" name="first_name">

    <label>Nom à ajouter : </label>
    <input type="text" id="last_name" name="last_name"/>

    <input type="submit" value="Ajouter l'acteur(trice)"/>
    </form>

</body>
</html>
