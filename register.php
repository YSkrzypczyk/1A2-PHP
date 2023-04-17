<?php session_start();
require "conf.inc.php";
?>
<?php require "core/functions.php";?>
<?php include "template/header.php";?>

	<div class="row">
		<div class="col-12">
			<h1>S'inscrire</h1>
		</div>
	</div>


<?php if(isset($_SESSION['listOfErrors'])) {?>
	<div class="row">
		<div class="col-12">
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  
			  <?php

			  foreach ($_SESSION['listOfErrors'] as $error)
			  {
			  	echo "<li>".$error."</li>";
			  }
			  unset($_SESSION['listOfErrors']);
			  ?>



			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		</div>
	</div>
<?php } ?> 


	<form action="core/userAdd.php" method="POST">
		<div class="row mt-4">

			<div class="col-lg-12">
				<input type="radio" class="form-check-input" value="0"  <?= ( !empty($_SESSION["data"]) && $_SESSION["data"]["gender"]==0)?"checked":""; ?> name="gender" id="genderM">
				<label for="genderM" class="form-label"> M.</label> 
				
				<input type="radio" class="form-check-input" value="1"
				<?= ( !empty($_SESSION["data"]) && $_SESSION["data"]["gender"]==1)?"checked":""; ?> name="gender" id="genderMme">
				<label for="genderMme" class="form-label"> Mme. </label>

				<input type="radio" class="form-check-input" value="2"
				<?= ( !empty($_SESSION["data"]) && $_SESSION["data"]["gender"]==2)?"checked":""; ?> name="gender" id="genderO">
				<label for="genderO" class="form-label"> Autre</label>
			</div>

		</div>
		<div class="row mt-3">
			<div class="col-lg-3">
				<input type="text" class="form-control" name="firstname" placeholder="Votre prénom" required="required" 
				value="<?= ( !empty($_SESSION["data"]))?$_SESSION["data"]["firstname"]:""; ?>">
			</div>

			<div class="col-lg-3">
				<input type="text" class="form-control" name="lastname" placeholder="Votre nom" required="required"
				value="<?= ( !empty($_SESSION["data"]))?$_SESSION["data"]["lastname"]:""; ?>">
			</div>
			<div class="col-lg-6">
				<input type="email" class="form-control" name="email" placeholder="Votre email" required="required"
				value="<?= ( !empty($_SESSION["data"]))?$_SESSION["data"]["email"]:""; ?>">
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-lg-6">
				<input type="password" class="form-control" name="pwd" placeholder="Votre mot de passe" required="required">
			</div>
			<div class="col-lg-6">
				<input type="password" class="form-control" name="pwdConfirm" placeholder="Confirmation" required="required">
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-lg-6">
				<select name="country"  class="form-select">
					<option value="fr" <?= ( !empty($_SESSION["data"]) && $_SESSION["data"]["country"]=="fr")?"selected":""; ?>>France</option>
					<option value="pl" <?= ( !empty($_SESSION["data"]) && $_SESSION["data"]["country"]=="pl")?"selected":""; ?>>Pologne</option>
					<option value="al" <?= ( !empty($_SESSION["data"]) && $_SESSION["data"]["country"]=="al")?"selected":""; ?>>Algérie</option>
					<option value="be" <?= ( !empty($_SESSION["data"]) && $_SESSION["data"]["country"]=="be")?"selected":""; ?>>Belgique</option>
				</select>
			</div>
			<div class="col-lg-6">
				<input type="date" class="form-control" name="birthday" required="required"
				value="<?= ( !empty($_SESSION["data"]))?$_SESSION["data"]["birthday"]:""; ?>">
			</div>

		</div>
		<div class="row mt-3">
			<div class="col-12">
				<img src="captcha.php" width="200px;">
				<input type="text" class="form-control" name="captcha" required="required" placeholder="Captcha">
				
			</div>

		</div>


		<div class="row mt-3">
			<div class="col-12">
				<input type="checkbox" class="form-check-input" id="cgu" name="cgu" required="required">
				<label for="cgu" class="form-label">J'accepte les CGUs</label>
			</div>

		</div>
		<div class="row mt-4">
			<div class="col-12">
				<input type="submit" value="S'inscrire" class="btn btn-primary">
			</div>

		</div>

	</form>

<?php include "template/footer.php";?>
