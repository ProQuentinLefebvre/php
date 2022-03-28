<?php
//$db=null;
try {
    $db = new PDO(
        'mysql:host=mysql-qlefebvre.alwaysdata.net;dbname=qlefebvre_location;charset=utf8',
        'qlefebvre_loca',
        'TheVulpix12',
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    //echo $e;
    die('Erreur : ' . $e->getMessage());
}
?>