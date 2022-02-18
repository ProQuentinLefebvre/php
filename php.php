<?php
  $host = 'mysql-qlefebvre.alwaysdata.net';
  $dbname = 'qlefebvre_location';
  $username = 'qlefebvre_loca';
  $password = 'TheVulpix12';
    
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
 <title> Table Client </title>
</head>
<body>
 <table>
 <caption> Table Client </caption>
   <thead>
     <tr>
       <th>ID</th>
       <th>Nom</th>
       <th>Prenom</th>
       <th>Email</th>
       <th>Phone</th>
       <th>Adresse</th>
       <th>Hote</th>
       <th>DateCreation</th>
       <th>DateModification</th>

     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['Id']); ?></td>
       <td><?php echo htmlspecialchars($row['Nom']); ?></td>
       <td><?php echo htmlspecialchars($row['Prenom']); ?></td>
       <td><?php echo htmlspecialchars($row['Email']); ?></td>
       <td><?php echo htmlspecialchars($row['Phone']); ?></td>
       <td><?php echo htmlspecialchars($row['Adresse']); ?></td>
       <td><?php echo htmlspecialchars($row['Hote']); ?></td>
       <td><?php echo htmlspecialchars($row['DateCreation']); ?></td>
       <td><?php echo htmlspecialchars($row['DateModification']); ?></td>

     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>
</body>
</html>
