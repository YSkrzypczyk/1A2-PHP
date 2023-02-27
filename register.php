<?php require "core/functions.php";?>
<?php include "template/header.php";?>

	<div class="row">
		<div class="col-12">
			<h1>S'inscrire</h1>
		</div>
	</div>

	<form action="core/userAdd.php" method="POST">
		<div class="row mt-4">

			<div class="col-lg-12">
				<input type="radio" class="form-check-input" value="0" checked="checked" name="gender" id="genderM">
				<label for="genderM" class="form-label"> M.</label> 
				
				<input type="radio" class="form-check-input" value="1" name="gender" id="genderMme">
				<label for="genderMme" class="form-label"> Mme. </label>

				<input type="radio" class="form-check-input" value="2" name="gender" id="genderO">
				<label for="genderO" class="form-label"> Autre</label>
			</div>

		</div>

		<div class="row mt-3">
			<div class="col-lg-3">
				<input type="text" class="form-control" name="firstname" placeholder="Votre prénom" required="required">
			</div>

			<div class="col-lg-3">
				<input type="text" class="form-control" name="lastname" placeholder="Votre nom" required="required">
			</div>
			<div class="col-lg-6">
				<input type="email" class="form-control" name="email" placeholder="Votre email" required="required">
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
					<option value="fr">France</option>
					<option value="pl">Pologne</option>
					<option value="al">Algérie</option>
					<option value="be">Belgique</option>
				</select>
			</div>
			<div class="col-lg-6">
				<input type="date" class="form-control" name="birthday" required="required">
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
