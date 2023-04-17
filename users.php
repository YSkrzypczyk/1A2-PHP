<?php session_start();?>
<?php require "conf.inc.php";?>
<?php require "core/functions.php";?>
<?php include "template/header.php";?>
<?php  redirectIfNotConnected(); ?>


<h1>Les utilisateurs</h1>

<?php

	$connection = connectDB();
	$results = $connection->query("SELECT * FROM ".DB_PREFIX."user");
	$results = $results->fetchAll()
?>


<table class="table">
	<thead>
		<tr>
			<th>Id</th>
			<th>Prénom</th>
			<th>Nom</th>
			<th>Email</th>
			<th>Pays</th>
			<th>Date de naissance</th>
			<th>Genre</th>
			<th>Status</th>
			<th>Ajouté</th>
			<th>Modifié</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php

		foreach ($results as $user) {
			echo "<tr>";
			echo "<td>".$user["id"]."</td>";
			echo "<td>".$user["firstname"]."</td>";
			echo "<td>".$user["lastname"]."</td>";
			echo "<td>".$user["email"]."</td>";
			echo "<td>".$user["country"]."</td>";
			echo "<td>".$user["birthday"]."</td>";
			echo "<td>".$user["gender"]."</td>";
			echo "<td>".$user["status"]."</td>";
			echo "<td>".$user["date_inserted"]."</td>";
			echo "<td>".$user["date_updated"]."</td>";
			echo "<td>
			<a href='core/userDel.php?id=".$user["id"]."' class='btn btn-danger'>
			Suppression
			</a>
			</td>";
			echo "</tr>";
		}

		?>
		
	</tbody>
</table>



<?php include "template/footer.php";?>