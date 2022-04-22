<?php
require_once "inc/fn/header_default.php"; //Inclusion de code/function/...
require_once "inc/fn/functions.php";
$id = $nom = $adm = "";
if(session_status()!=PHP_SESSION_ACTIVE)
	session_start();	
//var_dump($_SESSION);
if ((!isset($_SESSION["id"])) || empty($_SESSION["id"])) {
    redirect("login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>gestion session</title>
</head>
<body>
	<a href="index.php">GOTO Index</a><br><br>
	<a href="logout.php">GOTO Logout</a><br><br>
	<?php
if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $nom = $_SESSION["nom"];
    $adm = $_SESSION["adm"];
}
?>
	<h1>Vous etes connecté: (<?=$id?>) <?=$nom?></h1>
	<?php
if ($adm == 1) {
    echo "<h1>Vous etes admin: " . $nom . "</h1>";
} else {
    echo "<h1>Vous etes user: " . $nom . "</h1>";
}
?>
</body>
</html>