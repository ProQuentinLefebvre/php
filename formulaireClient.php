<?php
include("connect.php");
$valid = false;
$hote = 0;

$nom = $prenom = $email = $tel = $mdp = $adresse = $hote = $dc = $dm = "";

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
                $sql = "SELECT * FROM Client where Id=$id";
                try {
                    $stmt = $db->query($sql);

                    if ($stmt == false) {
                        die("Erreur");
                    }
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $nom = $row["Nom"];
                    $prenom = $row["Prenom"];
                    $email = $row["Email"];
                    $tel = $row['Phone'];
                    $mdp = $row['Passwords'];
                    $adresse = $row['Adresse'];
                    $hote = $row['Hote'];
                    $dc = $row['DateCreation'];
                    $dm = $row['DateModification'];
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
        $prenom = $_POST["Prenom"];
        $email = $_POST["Email"];
        $tel = $_POST["Phone"];
        $mdp = $_POST["Passwords"];
        $adresse = $_POST["Adresse"];
        $hote = $_POST["Hote"];
        $dc = $_POST["DateCreation"];
        $dm = $_POST["DateModification"];

        if (isset($_POST["Nom"])) {
            $nom = $_POST["Nom"];
        }
        if (isset($_POST["Prenom"])) {
            $prenom = $_POST["Prenom"];
        }
        if (isset($_POST["Email"])) {
            $email = $_POST["Email"];
        }
        if (isset($_POST["Phone"])) {
            $tel = $_POST["Phone"];
        }
        if (isset($_POST["Passwords"])) {
            $mdp = $_POST["Passwords"];
        }
        if (isset($_POST["Adresse"])) {
            $adresse = trim($_POST["Adresse"]);
        }
        if (isset($_POST["Hote"])) {
            $hote = $_POST["Hote"];
            if ($hote == "on")
                $hote = 1;
            else $hote = 0;
        }
        if (isset($_POST["DateCreation"])) {
            $dc = $_POST["DateCreation"];
        }
        if (isset($_POST["DateModification"])) {
            $dm = $_POST["DateModification"];
        }
        switch ($action) {
            case 'create':
                //INSERT
                $insert = "INSERT INTO Client( Nom, Prenom, Email, Phone, Passwords, Adresse, Hote, DateCreation, DateModification) 
                VALUES ( :Nom, :Prenom, :Email, :Phone, :Passwords, :Adresse, :Hote, :DateCreation, :DateModification)";
                try {
                    $query = $db->prepare($insert);
                    $ret = $query->execute([
                        ':Nom' => $nom,
                        ':Prenom' => $prenom,
                        ':Email' => $email,
                        ':Phone' => $tel,
                        ':Passwords' => $mdp,
                        ':Adresse' => $adresse==""?null:$adresse,
                        ':Hote' => $hote,
                        ':DateCreation' => $dc,
                        ':DateModification' => $dm
                    ]);
                } catch (Exception $th) {
                    echo $th;
                }
                break;
            case 'update':
                //UPDATE
                $update = "UPDATE Client SET Nom=:Nom, Prenom =:Prenom, Email=:Email, Phone=:Phone,
                     Passwords=:Passwords, Adresse=:Adresse, Hote=:Hote, DateModification=:DateModification WHERE Id=:id";
                try {
                    $query = $db->prepare($update);
                    $ret = $query->execute([
                        ':id' => $id,
                        ':Nom' => $nom,
                        ':Prenom' => $prenom,
                        ':Email' => $email,
                        ':Phone' => $tel,
                        ':Passwords' => $mdp,
                        ':Adresse' => $adresse,
                        ':Hote' => $hote,
                        ':DateModification' => $dm,
                    ]);
                } catch (PDOException $th) {
                    echo $th;
                }
                break;
            case 'delete':
                //DELETE
                $delete = "DELETE FROM Client WHERE Id=:id";
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
    <title>Location - Table Client</title>
</head>
<header>
    <div class="nav">
        <ul>
            <li><a href="home.php">Accueil</a></li>
            <li><a href="Client.php">Table Client</a></li>
            
        </ul>
    </div>
</header>

<body>
    <h1>Ajouter un Client</h1>
    <form method="POST" action="">
        <input type="hidden" name="action" value="<?= $action ?>">


        <label for="Nom">Nom</label>
        <input type="text" name="Nom" id="Nom" placeholder="Ex: Toto" size="20" maxlength="15" value="<?= $nom ?>">
        <br>
        <label for="Prenom">Prénom</label>
        <input type="text" name="Prenom" id="Prenom" placeholder="Ex : Titi" size="20" maxlength="15" value="<?= $prenom ?>">
        <br>
        <label for="Email">Email</label>
        <input type="email" name="Email" id="Email" placeholder="Ex : titi@toto.com" size="20" value="<?= $email ?>">
        <br>
        <label for="Phone">N°Téléphone</label>
        <input type="tel" name="Phone" id="Phone" placeholder="Ex : 01.02.03.04.05" size="20" maxlength="10" value="<?= $tel ?>">
        <br>
        <label for="Passwords">Mot de passe</label>
        <input type="password" name="Passwords" id="Passwords" placeholder="password" size="20" value="<?= $mdp ?>">
        <br>
        <label for="Adresse">Adresse</label>
        <input type="text" name="Adresse" id="Adresse" placeholder="Adresse" size="20" value="<?= $adresse ?>">
        <br>
        <label for="Hote">Hote</label>
        <input type="checkbox" name="Hote" checked value="<?= $hote ?>">
        <br>
        <label for="DateCreation">Date de Création</label>
        <input type="date" name="DateCreation" id="DateCreation" placeholder="jj/mm/aaaa heure:minutes" size="20" value="<?= $dc ?>">
        <br>
        <label for="DateModification">Date de Modification</label>
        <input type="date" name="DateModification" id="DateModification" placeholder="jj/mm/aaaa heure:minutes" size="20" value="<?= $dm ?>">
        <br>
        <input type="submit" name="send" value="Envoyer">
    </form>
</body>

</html>