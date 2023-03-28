<?php

function helloWorld(){
	echo "Hello World";
}


function cleanFirstname($firstName){
	return ucwords(strtolower(trim($firstName)));
}

function cleanLastname($lastName){
	return strtoupper(trim($lastName));
}

function cleanEmail($email){
	return strtolower(trim($email));
}


function connectDB(){

	try{
		$connection = new PDO("mysql:host=localhost;dbname=projet_web_1a2;port=3306", "root", "");
	}catch(Exception $e){
		die("Erreur SQL ".$e->getMessage());
	}
	return $connection;
}