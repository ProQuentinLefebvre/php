<?php
//$db=null;
try {
    $db = new PDO(
        'mysql:host=localhost;dbname=Location;charset=utf8',
        'root',
        'root',
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    //echo $e;
    die('Erreur : ' . $e->getMessage());
}
?>