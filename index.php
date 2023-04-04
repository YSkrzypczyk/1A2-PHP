<?php 
session_start();
require "core/functions.php";
?>
<?php include "template/header.php";?>

	<h1>Welcome</h1>

	<?php 

	helloWorld();

	if (isConnected()) {
		echo "Vous êtes connecté";
	}
	
	?>


<?php include "template/footer.php";?>
