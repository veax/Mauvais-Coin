<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Premiere page</title>
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

	<section class="annonces">
		<div class="container">
			<h2><?php echo $_GET["categorie"] ; ?></h2>
	
			<?php //-----------extraire l'information de BD
			$res = mysql_query("SELECT titre, description, prix, dateAnnonce, nomVille, nomCategorie FROM Annonces NATURAL JOIN Categories NATURAL JOIN Utilisateurs NATURAL JOIN Villes NATURAL JOIN Regions WHERE nomCategorie = '".$_GET["categorie"]."'");
		
			while ($ligne = mysql_fetch_array($res)){
				echo '<div class="annonce">';
				echo '<p class="ville">'.$ligne['nomVille'].'</p>';
				echo '<a href="annonce_detail.php?annonce='.$ligne['titre'].'" class="titre">'.$ligne['titre'].'</a>';
				if (($ligne['prix'] != NULL) AND($ligne['prix'] != '0')){
						echo '<span>'.$ligne['prix'].' &#8364;</span>';
					}
					elseif ($ligne['prix'] == NULL){
						echo "<span>pas de prix indiqué</span>";
					}
					elseif ($ligne['prix'] == '0'){
						echo "<span>gratuit</span>";
					}
				echo '<p class="clear"></p>';
				echo '<p>'.$ligne['description'].'</p>';
				echo '<p class="date">'.$ligne['dateAnnonce'].'</p></div>';
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

