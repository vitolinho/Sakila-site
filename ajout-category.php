<?php

if($_SERVER["REQUEST_METHOD"]=="POST") {
    $name = filter_input(INPUT_POST, "name");

    if($name) {
        $engine="mysql";
        $host="localhost";
        $port=3306;
        $dbName="sakila";
        $username="root";
        $password="root";

        $pdo = new PDO("$engine:host=$host:$port;dbname=$dbName",$username,$password);

        $statement = $pdo->prepare("INSERT INTO category (name) VALUE (:name)");

        $statement->execute([
            ":name"=>$name
        ]);
        
        http_response_code(302);
        header('Location: category.php');
        exit();
    } 
} else{
    echo "On est en GET";
}?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une catégorie</title>
</head>
<body>
    <h1>Ajouter une catégorie</h1>
    <form method="POST">
    <label for="name">Catégorie à ajouter</label>
    <input type="text" id="name" name="name">


    <input type="submit" value="Ajouter la catégorie"/>
    </form>

</body>
</html>
