<?php
session_start();
require "../conf.inc.php";
require "functions.php";


//Récupérer les données de l'internaute
//Variable super globale
// -> Variable créée et alimentée par le serveur
// -> Commence toujours $_ et en majuscule
// -> contient un tableau 

/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/

/*

Array
(
    [gender] => 0
    [firstname] => Yves
    [lastname] => Skrzypczyk
    [email] => y.skrzypczyk@gmail.com
    [pwd] => Test1234
    [pwdConfirm] => Test1234
    [country] => fr
    [birthday] => 1986-11-29
    [cgu] => on
)

*/

//Vérification des données

// Vérifier que les champs obligatoires existent et non sont pas vides
// FAILLE XSS
if( count($_POST)!=10 
	|| !isset($_POST['gender'])
	|| empty($_POST['firstname'])
	|| empty($_POST['lastname'])
	|| empty($_POST['email'])
	|| empty($_POST['pwd'])
	|| empty($_POST['pwdConfirm'])
	|| empty($_POST['country'])
	|| empty($_POST['birthday'])
	|| empty($_POST['cgu']) 
	|| empty($_POST['captcha']) 
){
	die ("Tentative de HACK");
}



//Nettoyage des données
$gender = $_POST['gender'];
$firstname = cleanFirstname($_POST['firstname']);
$lastname = cleanLastname($_POST['lastname']);
$email = cleanEmail($_POST['email']);
$pwd = $_POST['pwd'];
$pwdConfirm = $_POST['pwdConfirm'];
$country = $_POST['country'];
$birthday = $_POST['birthday'];
$cgu = $_POST['cgu'];
$captcha = $_POST['captcha'];



$listOfErrors = [];

// --> Est-ce que le genre est cohérent
$listGenders = [0,1,2];
if( !in_array($gender, $listGenders) ){
	$listOfErrors[] = "Le genre n'existe pas";
}
// --> Nom plus de 2 caractères
if(strlen($lastname) < 2){
	$listOfErrors[] = "Le nom doit faire plus de 2 caractères";
}

// --> Prénom plus de 2 caractères
// --> Nom plus de 2 caractères
if(strlen($firstname) < 2){
	$listOfErrors[] = "Le prénom doit faire plus de 2 caractères";
}
// --> Format de l'email
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$listOfErrors[] = "L'email est incorrect";
}else{
	// --> Unicité de l'email (plus tard)
	$connection = connectDB();
	$queryPrepared = $connection->prepare("SELECT * FROM ".DB_PREFIX."user WHERE email=:email");
	$queryPrepared->execute([ "email" => $email ]);

	$results = $queryPrepared->fetch();

	if(!empty($results)){
		$listOfErrors[] = "L'email est déjà utilisé";
	}

}


// --> Complexité du pwd
if(strlen($pwd) < 8
 || !preg_match("#[a-z]#", $pwd)
 || !preg_match("#[A-Z]#", $pwd)
 || !preg_match("#[0-9]#", $pwd)){
	$listOfErrors[] = "Le mot de passe doit faire au min 8 caractères avec des minuscules, des majuscules et des chiffres";
}


// --> Meme mot de passe de confirmation
if( $pwd != $pwdConfirm){
	$listOfErrors[] = "La confirmation du mot de passe ne correspond pas";
}

// --> Est-ce que le pays est cohérent
$listCountries = ["fr", "pl", "al", "be"];
if( !in_array($country, $listCountries) ){
	$listOfErrors[] = "Le pays n'existe pas";
}


// --> Date de naissance entre 6ans et 99ans

//$birthday = "1986-11-29";

$birthdayExploded = explode("-", $birthday);
//Vérification de la date
if (!checkdate($birthdayExploded[1],$birthdayExploded[2],$birthdayExploded[0])){
	$listOfErrors[] = "Date de naissance incorrecte";
}else{
	//Vérification de l'age
	$todaySecond = time();
	$birthdaySecond = strtotime($birthday);
	$ageSecond = $todaySecond - $birthdaySecond;
	$age = $ageSecond/60/60/24/365.25;
	if( $age <= 6 || $age >= 99 ){
		$listOfErrors[] = "Vous n'avez pas l'âge requis (entre 6 et 99 ans)";
	}
}



if($captcha != $_SESSION['captcha']){
	$listOfErrors[] = "Le captcha ne correspond pas";
}


//Si OK
if(empty($listOfErrors)){
	//Insertion en BDD
	$queryPrepared = $connection->prepare("INSERT INTO ".DB_PREFIX."user
											(gender, firstname, lastname, email, pwd, birthday, country)
											VALUES 
											(:gender, :firstname, :lastname, :email, :pwd, :birthday, :country)");

	$queryPrepared->execute([
								"gender"=>$gender,
								"firstname"=>$firstname,
								"lastname"=>$lastname,
								"email"=>$email,
								"pwd"=>password_hash($pwd, PASSWORD_DEFAULT),
								"birthday"=>$birthday,
								"country"=>$country
							]);


	//Redirection sur la page de connexion
	header('location: ../login.php');

}else{

	//Si NOK
	//On stock les erreurs et la data
	$_SESSION['listOfErrors'] = $listOfErrors;
	unset($_POST["pwd"]);
	unset($_POST["pwdConfirm"]);
	$_SESSION['data'] = $_POST;
	//Redirection sur la page d'inscription
	header('location: ../register.php');
}