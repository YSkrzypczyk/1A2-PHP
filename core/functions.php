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