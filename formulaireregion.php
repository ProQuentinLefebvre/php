<?php

$valid = false;

$nom = "";

include("connect.php");

$action = "";
if (isset($_REQUEST["action"]) && trim($_REQUEST["action"]) != "") {  //trim enleve les blanc
    $action = trim($_REQUEST["action"]);
}
$id = "";
if (isset($_REQUEST["id"]) && trim($_REQUEST["id"]) != "") {
    $id = trim($_REQUEST["id"]);
}
$method = $_SERVER["REQUEST_METHOD"];
var_dump($method, $action, $id);

if ($method == "GET") {
    switch ($action) {
        case 'create':
            break;
        case 'update':
        case 'delete':
            if ($id != "") {
                $sql = "SELECT * FROM Regions where Id=$id";
                try {
                    $stmt = $db->query($sql);

                    if ($stmt == false) {
                        die("Erreur");
                    }
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $nom = $row["Nom"];
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
            break;
        default: //read
            $action = "read";
            break;
    }
} else {
    //POST
    if (!empty($_POST["send"])) {
        $valid = true;
    }

    if ($valid) {
        $nom = $_POST["Nom"];

        if (isset($_POST["Nom"])) {
            $nom = $_POST["Nom"];
        }
        switch ($action) {
            case 'create':
                //INSERT
                $insert = "INSERT INTO Regions(Nom) VALUES (:Nom)";
                try {
                    $query = $db->prepare($insert);
                    $ret = $query->execute([
                        ':Nom' => $nom
                    ]);
                } catch (Exception $th) {
                    echo $th;
                }
                break;
            case 'update':
                //UPDATE
                $update = "UPDATE Regions SET Nom=:Nom WHERE Id=:id";
                try {
                    $query = $db->prepare($update);
                    $ret = $query->execute([
                        ':id' => $id,
                        ':Nom' => $nom
                    ]);
                } catch (PDOException $th) {
                    echo $th;
                }
                break;
            case 'delete':
                //DELETE
                $delete = "DELETE FROM Regions WHERE Id=:id";
                try{
                    $query = $db->prepare($delete);
                    $ret = $query->execute([
                        ':id' => $id,
                    ]);
                } catch (PDOException $th){
                    echo $th;
                }
                break;
            default: //read
                $action = "read";
                break;
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="formulaire.css">
    <title>Airbnb - Table Regions</title>
</head>
<header>
    <div class="nav">
        <ul>
            <li><a href="home.php">Accueil</a></li>
            <li><a href="Region.php">Table Regions</a></li>
        </ul>
    </div>
</header>

<body>
    <h1>Ajouter une Region</h1>
    <form method="POST" action="">
        <input type="hidden" name="action" value="<?= $action ?>">
        <label for="Region">Dans quelle région souhaitez vous louer ?</label><br />
       <select name="Nom" id="Nom">
           <option value="<?=$id=2?>">Alsace-Lorraine</option>
           <option value="<?=$id=3?>">Aquitaine</option>
           <option value="<?=$id=4?>">Auvergne-Rhones-Alpes</option>
           <option value="<?=$id=5?>">Bourgogne-Franche-Comté</option>
           <option value="<?=$id=6?>">Bretagne</option>
           <option value="<?=$id=7?>">Centre-Val de Loire</option>
           <option value="<?=$id=8?>">Champagne-Ardenne</option>
           <option value="<?=$id=9?>">Corse</option>
           <option value="<?=$id=10?>">Hauts-De-France</option>  
           <option value="<?=$id=11?>">Ile-De-France</option>  
           <option value="<?=$id=12?>">Normandie</option>  
           <option value="<?=$id=13?>">Nouvelle-Aquitaine</option>
           <option value="<?=$id=14?>">Occitanie</option>
           <option value="<?=$id=15?>">Outre-Mer</option>
           <option value="<?=$id=16?>">Pays de la Loire</option>
           <option value="<?=$id=17?>">Provences-Alpes-Côte d'Azur</option>
       </select>
        <input type="submit" name="send" value="Envoyer">
    </form>
</body>

</html>