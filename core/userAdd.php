<?php

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
if( count($_POST)!=9 
	|| empty($_POST['gender'])
	|| empty($_POST['firstname']
	|| empty($_POST['lastname']
	|| empty($_POST['email']
	|| empty($_POST['pwd']
	|| empty($_POST['pwdConfirm']
	|| empty($_POST['country']
	|| empty($_POST['birthday']
	|| empty($_POST['cgu']
) ){
	die ("Tentative de HACK");
}



//Nettoyage des données
$gender = $_POST['gender'];
$firstName = cleanFirstname($_POST['firstname']);
$lastname = cleanLastname($_POST['lastname']);
$email = cleanEmail($_POST['email']);
$pwd = $_POST['pwd'];
$pwdConfirm = $_POST['pwdConfirm'];
$country = $_POST['country'];
$birthday = $_POST['birthday'];
$cgu = $_POST['cgu'];



$listOfErrors = [];

// --> Est-ce que le genre est cohérent
$listGenders = [0,1,2];
if( !in_array($gender, $listGenders) ){
	$listOfErrors[] = "Le genre n'existe pas";
}
// --> Nom plus de 2 caractères
if(strlen($lastName) < 2){
	$listOfErrors[] = "Le nom doit faire plus de 2 caractères";
}

// --> Prénom plus de 2 caractères
// --> Nom plus de 2 caractères
if(strlen($firstName) < 2){
	$listOfErrors[] = "Le prénom doit faire plus de 2 caractères";
}
// --> Format de l'email
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$listOfErrors[] = "L'email est incorrect";
}
// --> Unicité de l'email (plus tard)
// --> Complexité du pwd
if(strlen($pwd) < 8
 || !preg_match("#[a-z]#", $pwd)
 || !preg_match("#[A-Z]#", $pwd)
 || !preg_match("#[0-9]#", $pwd)){
	$listOfErrors[] = "Le mot de passe doit faire au min 8 caractères avec des minuscules, des majuscules et des chiffres";
}


// --> Meme mot de passe de confirmation
// --> Est-ce que le pays est cohérent
// --> Date de naissance entre 6ans et 99ans
// --> CGU ok


//Si OK
if(empty($listOfErrors)){
	//Insertion en BDD
	//Redirection sur la page de connexion
}else{
	//Si NOK
	//On stock les erreurs
	//Redirection sur la page d'inscription
}