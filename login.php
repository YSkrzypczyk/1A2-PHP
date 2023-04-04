<?php
	session_start();
 	require "core/functions.php";
 ?>
<?php include "template/header.php";?>

	<div class="row">
		<div class="col-12">
			<h1>Se connecter</h1>
		</div>
	</div>

	<?php


		//On va vérifier que l'on a quelque chose dans $_POST
		//Ce qui signifie que le formulaire a été validé
		if( !empty($_POST['email']) &&  !empty($_POST['pwd']) ){

			$email = cleanEmail($_POST["email"]);
			$pwd = $_POST["pwd"];

			//Récupérer en bdd le mot de passe hashé pour l'email
			//provenant du formulaire
			$connect = connectDB();
			$queryPrepared = $connect->prepare("SELECT pwd FROM esgi_user WHERE email=:email");
			$queryPrepared->execute(["email"=>$email]);
			$results = $queryPrepared->fetch();

			if(!empty($results) && password_verify($pwd, $results["pwd"]) ){
				$_SESSION['email'] = $email;
				$_SESSION['login'] = true;
				header("Location: index.php");
			}else{
				echo "Identifiants incorrects";
			}
		}

	?>

	<div class="row">
		<div class="col-12">
			<form method="POST">
				<input type="email" name="email" placeholder="Votre email" required="required">
				<input type="password" name="pwd" required="required">
				<button>Se connecter</button>
			</form>
		</div>
	</div>




<?php
/*
Consigne du TP
	- Créer un formulaire HTML permettant de se connecter
	- Les données du formulaire devront être envoyées au fichier login.php
	- Vérification des données saisies
	- Affichages des erreurs dans une div alert (Bootstrap)
	- Dans le cas ou les données sont OK, créer une variable de SESSION contenant :
	----> email = y.skrz......
	----> login = true
	- redirection sur la page index.php
*/
?>



	
<?php include "template/footer.php";?>
