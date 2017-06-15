<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajout Annonce</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php  //-----------acces a la BD
		require("connection.php");
	?>
	<header>
		<div class="header_container">	
			<img src="logo.png" height="68" width="140" alt="logo">
			<h1><a href="accueil.php">le mauvais coin</a></h1>
			<span class="desc">Les pires propositions à trouver</span>
		</div>
	</header>

	<section class="ajout_annonce">
		<div class="container">
		<h2>Ajouter votre annonce:</h2>
			<div class="creation_form">
				<form action='newAnnonce.php' method='POST' class="ajout">
				<label for="titre">titre:</label><input type='text' name='titre' id='titre' placeholder = "Court et précis"></br>
				<label for="desc">description: </label><textarea rows="10" cols="50" id='desc' name='desc' placeholder="Décrivez votre annonce..."></textarea></br>
				<label for="prix">prix (&euro;):</label> <input type='number' min="0" name='prix' id='prix' placeholder = "de 0 à l`infini..."></br>
				<label for="email">email:</label> <input type='email' name='email' id='email' placeholder="Ex: john_doe@gmail.com"></br>
				<label for="tel">téléphone: </label><input type='number' name='tel' id='tel' min="0" step="1"></br>
				<label for="ville">ville:</label><select name="ville" id='ville' >
						<option value ="Aix-en-Provence">Aix-en-Provence</option> 
						<option value ="Carquefou">Carquefou</option> 
						<option value ="Cayenne">Cayenne</option> 
						<option value ="Chéméré">Chéméré</option> 
						<option value ="La roche sur Yon">La roche sur Yon</option> 
						<option value ="La Turballe">La Turballe</option> 
						<option value ="Nantes">Nantes</option> 
						<option value ="Paimbœuf">Paimbœuf</option> 
						<option value ="Piriac-sur-Mer">Piriac-sur-Mer</option> 
						<option value ="Pornic">Pornic</option> 
						<option value ="Saint-Julien-de-Concelles">Saint-Julien-de-Concelles</option> 
						<option value ="Saint-Nazaire">Saint-Nazaire</option> 
				</select></br>
				<label for="categorie">Sélectionnez la catégorie:</label> <select name="categorie" id='categorie' >
						<option value ="Animaux">Animaux</option> 
						<option value ="Informatique">Informatique</option> 
						<option value ="Ameublement">Ameublement</option> 
						<option value ="Immobilier">Immobilier</option> 
						<option value ="Jeux & jouets">Jeux & Jouets</option> 
						<option value ="Vêtements">Vêtements</option> 
						<option value ="Véhicules">Véhicules</option> 
						<option value ="Services">Services</option> 
						<option value ="Décoration">Décoration</option> 
						<option value ="Image & Son">Image & Son</option> 
						<option value ="Instruments de Musique">Instruments de Musique</option> 
					</select></br>
				<input type='submit' value='valider'>
				</form>
			</div>
		</div>
	</section>

	<!-- FOOTER -->
	<footer>
		<div class="container">
		<hr>
			<p>Développé par des étudiants de L1:Borisov Vadim et Abdoulahat Seck </p>
			<span>Nantes 2017</span>
		</div>
	</footer>
	
</body>
</html>
