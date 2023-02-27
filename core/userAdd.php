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

//Nettoyage des données
$gender = $_POST['gender'];
$firstName = cleanFirstname($_POST['firstname']);


//Vérification des données

// Vérifier que les champs obligatoires existent et non sont pas vides

// --> Est-ce que le genre est cohérent
// --> Nom plus de 2 caractères
// --> Prénom plus de 2 caractères
// --> Format de l'email
// --> Unicité de l'email (plus tard)
// --> Complexité du pwd
// --> Meme mot de passe de confirmation
// --> Est-ce que le pays est cohérent
// --> Date de naissance entre 6ans et 99ans
// --> CGU ok


//Si OK
//Insertion en BDD
//Redirection sur la page de connexion

//Si NOK
//On stock les erreurs
//Redirection sur la page d'inscription
