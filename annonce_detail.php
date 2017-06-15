<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Recherche des annonces</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php      //-----------acces a la BD
		require("connection.php");
?>	
	<header>
		<div class="header_container">	
			<img src="logo.png" height="68" width="140" alt="logo">
			<h1><a href="accueil.php">le mauvais coin</a></h1>
			<span class="desc">Les pires propositions à trouver</span>
		</div>
	</header>

	<section class="annonce_detail">
		<div class="container">
			<?php //-----------extraire l'information de BD
			$res = mysql_query("SELECT titre, description, prix, dateAnnonce, email, nomVille, nomRegion, nomCategorie, telephone FROM Annonces NATURAL JOIN Categories NATURAL JOIN Utilisateurs NATURAL JOIN Villes NATURAL JOIN Regions WHERE titre = '".$_GET["annonce"]."'");
		
			while ($ligne = mysql_fetch_array($res)){
				
				echo '<div class="annonce_detail">';
				echo '<h2>'.$_GET["annonce"].'</h2>';
					
					echo '<div class="left_block">';
					if ($ligne['nomCategorie'] == NULL){
						echo "<p class='categorie_detail'>Categorie: non indiqué</p>";
					}
					else {
						echo '<p class="categorie_detail">Categorie: '.$ligne['nomCategorie'].'</p>';
					}
					echo '<p class="description_detail">Description:</br>'.$ligne['description'].'</p>';
					echo '<p class="email_detail">Email:</br>'.$ligne['email'].'</p>';
					echo '</div>';

					echo '<div class="right_block">';
					if (($ligne['prix'] != NULL) AND($ligne['prix'] != '0')){
							echo '<span class="prix_detail">Prix: '.$ligne['prix'].' &#8364;</span>';
						}
					elseif ($ligne['prix'] == NULL){
							echo "<span class='prix_detail'>pour le prix contactez le vendeur </span>";
						}
					elseif ($ligne['prix'] == '0'){
							echo "<span class='prix_detail'>Prix: gratuit</span>";
					}
					echo '<p class="date_detail">Date: '.$ligne['dateAnnonce'].'</p>';
					echo '<p class="ville_detail">Ville: '.$ligne['nomVille'].'</p>';
					echo '<p class="region_detail">Region: '.$ligne['nomRegion'].'</p>';
					if ($ligne['telephone'] != NULL){
						echo '<p class="tel_detail">Telephone:'.$ligne['telephone'].'</p>';
					}
					else{
						echo '<p class="tel_detail">Telephone: non indiqué</p>';
					}

					echo '</div></div>';
					/*echo '<p class="clear"></p>';*/
			}
		
		mysql_close($link);
	?>
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
