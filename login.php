<?php
/*require_once "inc/fn/header_default.php";	//Inclusion de code/function/...
require_once "inc/fn/functions.php";*/
$email=$password="";
$rows=null;
$method=$_SERVER["REQUEST_METHOD"];
if($method=="POST"){
	if(read_HttpPOST("send")!=""){
		$email = read_HttpPOST("email");
		$password = read_HttpPOST("password");
dump($email, $password);
		if(!empty($email) && !empty($password)){
			require_once "db_pdo.php";
			//SELECT
			$query = "SELECT `Id`, `Nom`, `Prenom`, `Email`, `bool`, `Password`, `IsAdmin` 
					FROM `pjtexemple` where Email=:e and Password=:p";
			$queryparams = [
				":e" => $email,
				":p" => $password,
			];
			db_connection();
			$rows = db_select($query, $queryparams);
			if(count($rows)==1){
				if(session_status()!=PHP_SESSION_ACTIVE)
					session_start();
				$_SESSION["id"]=$rows[0]["Id"];
				$_SESSION["nom"]=$rows[0]["Nom"];
				$_SESSION["adm"]=$rows[0]["IsAdmin"];
				redirect("sessionDB.php");
			}
			db_close();
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>
<body>
	<fieldset>
		<legend>Form Login</legend>
		admin:adm@adm.fr/password<br>
		user:usr@usr.fr/password<br>
		<form action="loginDB.php" method="post">
			<label for="email">Email</label><br>
			<input type="text" name="email" id="email" value="<?=$email?>" autofocus><br>
			<label for="password">Password</label><br>
			<input type="text" name="password" id="password"><br>
			<input type="submit" name="send" value="Envoyer">
		</form>
		<?php
		if($method=="POST"){
			echo "No user found or bad password, try again";
		}
		?>
	</fieldset>
</body>
</html>
login.php
Affichage de login.php en cours...