
<?php
require 'connect.php';

if(isset($_FILES['file'])){
    $file = $uniqueName.".".$extension;
    //$file = 5f586bf96dcd38.73540086.jpg
    move_uploaded_file($tmpName, './upload/'.$file);
    $req = $db->prepare('INSERT INTO Photo (Chemin) VALUES (?)');
    $req->execute([$file]);
    echo "Image enregistrée";
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="home.css">
        <title>Location</title>
    </head>
    <header>
        <div id="header">
            <img src="chambre2.png" width="100%" height="150px"></img>
        </div>
        <div class="navbar">
            <ul>
                <li><a href="home.php">Accueil</a></li>
                <li><a href="login.php">Client</a></li>
                <li><a href="region.php">Regions</a></li>    
                <li><a href="ObjetRegion.php">Regions Objet</a></li>             
            </ul>
         </div>
    </header>
        
    <body>
        <form action="home.php" method="POST" enctype="multipart/form-data">
            <label for="file">Fichier</label>
            <input type="file" name="file">
            <button type="submit">Enregistrer</button>
        </form>
        <?php 
        $req = $db->query('SELECT Chemin FROM Photo');
        while($data = $req->fetch()){
            echo "<img src='./upload/".$data['Chemin']."' width='300px' ><br>";
        }
    ?>
    </body>
</html>