<?php

//ancienne syntaxe
$array = array("banane","cerise","fraise");

//bonne syntaxe
$array = ["banane","cerise","fraise"];

//Accès à la donnée
//echo $array[0];

//Ajout d'une valeur Tomate
$array[]="Tomate";

//Afficher le tableau
echo "<pre>";
print_r($array);
var_dump($array);
echo "</pre>";



$student = [
	"lastname"=>"Michel", 
	5=>91,
	"firstname"=>"Pierre", 
	"average"=>12
];
//Afficher Prénom Nom a une moyenne de Note
//echo $student["firstname"]." ".$student["lastname"]." a une moyenne de ".$student["average"];


$student[] = 20;

echo "<pre>";
//print_r($student);
echo "</pre>";


//DIMENSION
$class = [ 
			0=>["Lucas", 14],
			1=>[0=>"Eméric", 1=>12],
			2=>["Toto", 2] 
		]; // 2D

echo $class[1][1];

$class = [ 
			0=>[0=>"Lucas", 1=>14],
			1=>[
					0=>[0=>"Eméric",1=>"Thomas"], 
					1=>12
				],
			2=>["Toto", 2] 
		]; // 3D


echo "<pre>";
//print_r($class);
echo "</pre>";

//Afficher Thomas
//echo $class[1][0][1];
//Afficher l'age de Lucas 14
//echo $class[0][1];


$array = [
			0=>[
				[],
				1=>[
					0=>[
						[],
						1=>[
							0=>[
								[],
								1=>[0=>"Toto"]
							]
						]
					]
				],
				[]
			]
		]; //7D

//echo $array[0][1][0][1][0][1][0]; //7D


//FOREACH

	$fruits = ["banane", "cerise", "fraise"];

	foreach ($fruits as $fruit) {
		//echo "<li>".$fruit;
	}

	foreach ($fruits as $key=>$fruit) {
		//echo "<li>".$key."=>".$fruit;
	}

$class = [
			["firstname"=>"Reda","CC1"=>15,"CC2"=>6, "partiel"=>10],
			["firstname"=>"Julien","CC1"=>14,"CC2"=>14, "partiel"=>12],
			["firstname"=>"Célian","CC1"=>14,"CC2"=>14, "partiel"=>4],
			["firstname"=>"Mike","CC1"=>12,"CC2"=>9, "partiel"=>13]
];

?>


<table border="1px">
	<thead>
		<tr>
			<th>Prénom</th>
			<th>Moyenne</th>
		</tr>
	</thead>
	<tbody>


		<?php

			$averageMax = 0;
			$averageMin = 20;
			$studentMax = null;
			$studentMin = null;

			foreach($class as $key=>$student){

				$average = ($student["CC1"]+$student["CC2"]+$student["partiel"])/3 ;

				if($average >= $averageMax){
					$averageMax=$average;
					$studentMax = $key;
				}

				if($average <= $averageMin){
					$averageMin=$average;
					$studentMin = $key;
					
				}

		?>

		<tr>
			<td><?php echo $student["firstname"] ?></td>
			<td><?php echo round($average, 2)?></td>
		</tr>


		<?php
			}
		?>
		

	</tbody>
</table>

Premier de la classe c'est <?php echo $class[$studentMax]["firstname"] ?> et le dernier c'est <?php echo $class[$studentMin]["firstname"] ?>