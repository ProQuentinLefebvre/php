<?php
  $host = 'localhost';
  $dbname = 'DB location';
  $username = 'root';
  $password = '';
    
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
                <td><?php echo $_POST['Id']; ?></td>
                <td><?php echo $_POST['Nom'];; ?></td>
                <td><?php echo $_POST['Prenom']; ?></td>
                <td><?php echo $_POST['Email']; ?></td>
                <td><?php echo $_POST['Phone']; ?></td>
                <td><?php echo $_POST['Password']; ?></td>
                <td><?php echo $_POST['Adresse']; ?></td>
                <td><?php echo $_POST['Hote']; ?></td>
                <td><?php echo $_POST['DateCreation']; ?></td>
                <td><?php echo $_POST['DateModification']; ?></td>
            </table>
    </body>
</html>
