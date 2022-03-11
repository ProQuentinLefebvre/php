<?php
$id=$nom=$prenom=$email=$phone=$tel=$mdp=$adresse=$hote=$dc=$dm="";
$idErr=$nomErr=$prenomErr=$emailErr=$telErr=$mdpErr=$adresseErr=$hoteErr=$dcErr=$dmErr="";
$eff="";
$ajout="";
if($_SERVER["REQUEST_METHOD"] =="POST"){ //POST//GET
    //VAR_DUMP($_POST);
    
    if (isset($_POST['Id']) && !empty($_POST['Id']))
        $id = $_POST['Id'];
    else
        $idErr="Veuillez rentré votre Id ";

    if (isset($_POST['Nom']) && !empty($_POST['Nom']))
        $nom = $_POST['Nom'];
    else
        $nomErr="Veuillez rentré votre Nom";

    if (isset($_POST['Prenom']) && !empty($_POST['Prenom']))
        $prenom = $_POST['Prenom'];
    else
        $prenomErr="Veuillez rentré votre Prénom";

    if (isset($_POST['Email']) && !empty($_POST['Email']))
        $email = $_POST['Email'];
    else
        $emailErr="Veuillez rentré votre Nom";

    if (isset($_POST['Phone']) && !empty($_POST['Phone']))
        $tel = $_POST['Phone'];
    else
        $telErr="Veuillez rentré votre Numéro";

    if (isset($_POST['Passwords']) && !empty($_POST['Passwords']))
        $mdp = $_POST['Passwords'];
    else
        $mdpErr="Veuillez rentré votre mot de passe";

    if (isset($_POST['Adresse']) && !empty($_POST['Adresse']))
        $adresse = $_POST['Adresse'];
    else
        $adresseErr="Veuillez rentré votre Adresse";

    if (isset($_POST['DateCreation']) && !empty($_POST['DateCreation']))
        $dc = $_POST['DateCreation'];
    else
        $dcErr="Veuillez rentré la date de création";

    if (isset($_POST['DateModification']) && !empty($_POST['DateModification']))
        $dm = $_POST['DateModification'];
    else
        $dmErr="Veuillez rentré la date de modification";

    $btn= $_POST['btnsubmit'];
    if($btn=="Effacer"){
        $eff= "DELETE FROM Client WHERE Client_id=:id";

    }
    if($btn=="Modifer"){
        
    }
    $Ajout  = 'INSERT INTO Client(Id, Nom, Prenom, Email, Phone, Passwords, Adresse, DateCreation, DateModification) 
        VALUES (:Id, :Nom, :Prenom, :Email, :Phone, :Passwords, :Adresse, :DateCreation, :DateModification)';

    $paramètre = [
        "Id" => $Id,
        ":Nom" =>  $Nom,
        ":Prenom" => $Prenom,
        ":Email" => $Email,
        ":Phone" => $Phone,
        ":Passwords" => $Passwords,
        ";Adresse" => $Adresse,
        ":DateCreation" => $DateCreation,
        "DateModification" => $DateModifcation

    ];
    db_connection();
				$bRet = db_execute($ajout, $paramètre);	
				db_close();

    $update = "UPDATE 'Client' SET   Nom=:Nom, Prenom=:Prenom, Email=:Email, Phone=:Phone, 
    Passwords=:Passwords, Adresse=:Adresse, DateCreation=:DateCreation, DateModification=:DateModification WHERE Id=:Id ";
    
    $updateparamètre = [
        "Id" => $Id,
        ":Nom" =>  $Nom,
        ":Prenom" => $Prenom,
        ":Email" => $Email,
        ":Phone" => $Phone,
        ":Passwords" => $Passwords,
        ";Adresse" => $Adresse,
        ":DateCreation" => $DateCreation,
        "DateModification" => $DateModifcation

    ];
    db_connection();
    $bRet = db_execute($update, $updateparamètre);	
    db_close();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css.css">
        <title>Formulaire Client</title>
    </head>
<body>
<form novalidate action="formulaire.php" method="post">
    <br>
    <p>
   Formulaire pour la table Client :
   <label for="Id">Id :</label>
    <input type="int" name="Id" id="Id" required value="<?=$id?>"><?=$idErr?>
    <br>
    <label for="Nom">Nom :</label>
    <input type="text" name="Nom" id="Nom" placeholder="Ex: Tac" size="20" maxlength="15" required value="<?=$nom?>"><?=$nomErr?>
    <br>
    <label for="Prenom">Prénom :</label>
    <input type="text" name="Prenom" id="Prenom" placeholder="Ex : Paul" size="20" maxlength="15" required value="<?=$prenom?>"><?=$prenomErr?>
    <br>
    <label for="Email">Email :</label>
    <input type="email" name="Email" id="Email" placeholder="Ex : Paul@paulo.com" size="20" required value="<?=$email?>"><?=$emailErr?>
    <br>
    <label for="Phone">Numéro de Téléphone :</label>
    <input type="tel" name="Phone" id="Phone" placeholder="Ex : 01.02.03.04.05" size="20" maxlength="14" required value="<?=$tel?>"><?=$telErr?>
    <br>
    <label for="Password">Mot de passe :</label>
    <input type="password" name="Passwords" id="Passwords" placeholder="password" size="20" required value="<?=$mdp?>"><?=$mdpErr?>
    <br>
    <label for="Adresse">Adresse postal :</label>
    <input type="text" name="Adresse" id="Adresse" placeholder="Adresse" size="20" required value="<?=$adresse?>"><?=$adresseErr?>
    <br>
    <label for="Hote">Hote :</label>
    <input type="checkbox" name="Hote" checked>
    <br>
    <label for="DateCreation">Date de Création :</label>
    <input type="date" name="DateCreation" id="DateCreation" placeholder="jj/mm/aaaa heure:minutes" size="20" required value="<?=$dc?>"><?=$dcErr?>
    <br>
    <label for="DateModification">Date de Modification :</label>
    <input type="date" name="DateModification" id="DateModification" placeholder="jj/mm/aaaa heure:minutes" size="20" required value="<?=$dm?>"><?=$dmErr?>
    <br>
    <input type="submit" name="btnsubmit" value="Effacer" />
    <input type="submit" name="btnsubmit" value="Modifier" />
    <input type="submit" name="btnsubmit" value="Créer" />

    </p>
</form>
</body>
</html>