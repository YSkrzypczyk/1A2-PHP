<?php
session_start();
header("Content-type: image/png");

$image = imagecreate(400, 200);


$listOfCharacters = "abcdefghijklmnopqrstuvwxyz0123456789";
$captcha = str_shuffle($listOfCharacters);
$captcha = substr($captcha, 0, rand(6, 8));
$_SESSION['captcha'] = $captcha;


$back = imagecolorallocate($image, rand(150,255), rand(150,255), rand(150,255));


//imagestring($image , 5, 50, 120, $captcha, $black);

$listOfFonts = glob("fonts/*.ttf");
$x = 20;

for($i=0; $i < strlen($captcha); $i++){

	$listOfColors[] = imagecolorallocate($image, rand(0,100), rand(0,100), rand(0,100));
	
	imagettftext(
		$image, 
		rand(30, 35), 
		rand(-30, 30), 
		$x, 
		rand(80, 120), 
		$listOfColors[$i], 
		$listOfFonts[array_rand($listOfFonts)], 
		$captcha[$i]);

	$x += rand(35,50);
}



$form = rand(5,8);

for($i=0; $i < $form ; $i++){


	$randForm = rand(0,2);


	switch ($randForm) {
		case 0:
			imageellipse($image, rand(0, 400), rand(0,200), rand(0, 400), rand(0,200), $listOfColors[array_rand($listOfColors)]);
			break;
		case 1:
			imagerectangle($image, rand(0, 400), rand(0,200), rand(0, 400), rand(0,200), $listOfColors[array_rand($listOfColors)]);
			break;
		default:
			imageline($image, rand(0, 400), rand(0,200), rand(0, 400), rand(0,200), $listOfColors[array_rand($listOfColors)]);
			break;
	}

	


}




imagepng($image);