<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Pages en PHP">
	<title>Cours de PHP</title>
</head>
<body>

	<?php

		//Commentaire sur une ligne
		/*
			Variables :
				Commence par un $
				logique et anglais
				camelCase
				auto déclarée et auto typée
				type: String, Int, Float, Boolean, Null
				Typage dynamique
		*/

		$firstName = "Yves";
		$lastname = "SKRZYPCZYK";
		$age = 36;
		$size = 1.96;
		$adult = true;
		$average = null;

		/*
		//1er instruction et concaténation 
		//<b>Bonjour</b> <u>Yves</u>
		echo '<b>Bonjour</b> <u>'.$firstName." ".$lastname.'</u>';

		$x = 5;
		//Bonjour Yves, dans 5 an(s) vous aurez 41 ans.
		echo "Bonjour ".$firstName.", dans ".$x." an(s) vous aurez ".($age+$x)." ans.";
		*/

		//opérateur arithmétiques
		// + - * / %

		//Incrémentation et décrémentation
		$cpt = 0;
		$cpt += 1;
		$cpt = $cpt + 1;
		$cpt++;
		++$cpt;

		/*
		$cpt = 0;
		echo $cpt; //0
		echo $cpt + 1; //1
		echo $cpt +=1; //1
		echo $cpt++; //1
		echo $cpt = $cpt +1; //3
		echo --$cpt; //2
		//echo --$cpt++; //Error
		*/


		//Conditions
		// if elseif else
		// switch
		// condition ternaire
		// null coalescent
		// || OR
		// && AND


		$age = 18;
		/*
		if($age <= 0 || $age > 100){
			echo "Menteur";
		}elseif($age > 18){
			echo "Majeur";
		}elseif($age == 18){
			echo "Tout juste majeur";
		}else{
			echo "Mineur";
		}	
		

		$role = "editeur";
		switch ($role) {
			case "admin":
				echo "Peut tout faire";
				break;
			case "editeur":
				echo "Peut éditer le contenu";
			default:
				echo "Peut visualiser le site";
				break;
		}
		*/

		//Condition ternaire
		//Si seulement un if et un else
		//Une seule et meme instruction dans les conditions
		/*
		$adult = true;

		if($adult){
			echo "Adulte";
		}else{
			echo "Enfant";
		}

		//Syntaxe : instruction (condition)?vrai:faux;
		echo ($adult)?"Adulte":"Enfant";
		


		//Null Coalescent
		$average = null;

		if($average != null){
			echo $average;
		}else{
			echo "Vous n'avez pas de note";
		}


		echo $average??"Vous n'avez pas de note";

		*/

		//BOUCLES
		//While -> On ne connait pas le nombre d'itération
		//Do while -> Au moins une itération  
		//For -> On connait le nombre d'itération
		//Foreach -> tableau

		/*
		$dice = rand(1,6);
		$cpt = 1;
		while ($dice != 6) {
			$dice = rand(1,6);
			$cpt++;
		}
		echo $cpt." tentative(s)";

		$cpt = 0;
		do{
			$dice = rand(1,6);
			$cpt++;
		}while($dice != 6);
		echo $cpt." tentative(s)";

		for($cpt=0 ; $cpt<10 ; ++$cpt){

		}
		*/

		//FONCTION
		//camelCase
		//Anglais
		//Cohérent
		//Unique
		//Nom réservé

		/*
		function isPrime($x){
			if($x > 1){	
				$limit =  sqrt($x);
				for($cpt=2; $cpt< $limit; $cpt++){
					if($x % $cpt == 0){
						return false;
					}
				}
			}else{
				return false;
			}
			return true;
		}


		// 2 3 5 7 11 13 ...

		//Afficher Vrai ou faux si un nombre est premier (5 pts)
		$x = 6;
		//echo (isPrime($x))?"Vrai":"Faux";

		//Afficher les nombres premiers entre 1 et 100 (10 pts)
		for($cpt = 2 ; $cpt < 100 ; $cpt++ ){
				if (isPrime($cpt)){
					//echo "<li>".$cpt;
				}
		}


		//Afficher les $x premiers nombres premiers (5 pts)
		$start = microtime(true);
		$x = 10000;
		$number = 2;
		while ($x > 0) {
				if (isPrime($number)){
					echo "<li>".$number;
					$x--;
				}
			$number++;
		}

		echo "<br>";
		echo (microtime(true)-$start). " secondes";
		*/


		/*
		function hello(){
			echo "Salut";
		}
		//hello();

		function helloYou($firstName="", $lastname=""){
			echo "Bonjour ".$firstName." ". $lastname;
		}

		helloYou("Yves", "SKRZYPCZYK");

		helloYou("Yves");

		helloYou();

		helloYou("", "SKRZYPCZYK");
		*/

		function cleanAndVerifyFirstname(&$word){

			//Ecrire la même chose sur une seule ligne
			$word = ucwords(strtolower(trim($word)));

			return strlen($word)>=2;
		}

		/*
		function cleanAndVerifyFirstname(){
			global $firstName;
			//Ecrire la même chose sur une seule ligne
			$firstName = ucwords(strtolower(trim($firstName)));

			return strlen($firstName)>=2;
		}
		*/



		$firstName = " jEAn PiERRE   ";
		
		if(cleanAndVerifyFirstname($firstName)){
			echo "Le prénom ".$firstName." est OK";
		}else{
			echo "Le prénom ".$firstName." est NOK";
		}


		/*
		$mavariable1 = "test1";
		//Partage le meme espace mémoire que mavariable1
		$mavariable2 = &$mavariable1;
		$mavariable1 = "test2";
		$mavariable2 = "toto";
		echo $mavariable1; //toto
		*/



	?>


</body>
</html>