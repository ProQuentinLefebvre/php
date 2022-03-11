<?php
  $host = 'localhost';
  $dbname = 'DB location';
  $username = 'root';
  $password = 'password';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les utilisateurs
  $sql = "SELECT * FROM Client";

   
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($sql);
   
   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="location.css">
        <title>Location</title>
    </head>
    <body>
        <table>
            <caption>Table Client</caption>
            <thead>
            <tr>
                <th>Client</th>
                <th>Id</th> 
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th>Adresse</th>
                <th>Hote</th>
                <th>DateCreation</th>
                <th>DateModification</th>
            </tr>
            </thead>
                <td><a href="formulaire.php" title="formulaire pour la table Client" target="_blank">lien</a></td>
                <td><?=$id?></td>
                <td><?php $Nom = $_POST['Nom'];?></td>
                <td><?php $Prenom = $_POST['Prenom']; ?></td>
                <td><?php $Email = $_POST['Email']; ?></td>
                <td><?php $Phone = $_POST['Phone'];?></td>
                <td><?php $Passwords = $_POST['Passwords']; ?></td>
                <td><?php $Adresse = $_POST['Adresse']; ?></td>
                <td><?php $Hote = $_POST['Hote']; ?></td>
                <td><?php $DateCreation = $_POST['DateCreation']; ?></td>
                <td><?php $DateModification = $_POST['DateModification'] ?></td>
            </table>
    </body>
</html>