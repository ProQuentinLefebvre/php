<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css.css">
        <title>Formulaire Client</title>
    </head>
<body>
<form action="location.php" method="post">
    <br>
    <p>
   Formulaire pour la table Client :
   <label for="Id">Id :</label>
    <input type="int" name="Id" id="Id" required>
    <br>
    <label for="Nom">Nom :</label>
    <input type="text" name="Nom" id="Nom" placeholder="Ex: Toto" size="20" maxlength="15" required>
    <br>
    <label for="Prenom">Prénom :</label>
    <input type="text" name="Prenom" id="Prenom" placeholder="Ex : Titi" size="20" maxlength="15" required>
    <br>
    <label for="Email">Email :</label>
    <input type="email" name="Email" id="Email" placeholder="Ex : titi@toto.com" size="20" required>
    <br>
    <label for="Phone">Numéro de Téléphone :</label>
    <input type="tel" name="Phone" id="Phone" placeholder="Ex : 01.02.03.04.05" size="20" maxlength="14" required>
    <br>
    <label for="Password">Mot de passe :</label>
    <input type="password" name="Passwords" id="Passwords" placeholder="password" size="20" required>
    <br>
    <label for="Adresse">Adresse postal :</label>
    <input type="text" name="Adresse" id="Adresse" placeholder="Adresse" size="20">
    <br>
    <label for="Hote">Hote :</label>
    <input type="checkbox" name="Hote" checked>
    <br>
    <label for="DateCreation">Date de Création :</label>
    <input type="date" name="DateCreation" id="DateCreation" placeholder="jj/mm/aaaa heure:minutes" size="20" required>
    <br>
    <label for="DateModification">Date de Modification :</label>
    <input type="date" name="DateModification" id="DateModification" placeholder="jj/mm/aaaa heure:minutes" size="20" required>
    <br>
    <input type="submit" value="Envoyer" />
    </p>
</form>
</body>
</html>
