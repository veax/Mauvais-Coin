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
	
	<section class="annonces">
		<div class="container">
				<h2>Panel d`administration</h2>
		
				<?php     //-----------extraire l'information de BD
				$res = mysql_query("SELECT idAnnonce, titre, description, prix, dateAnnonce FROM Annonces ORDER BY dateAnnonce DESC");

				while ($ligne = mysql_fetch_array($res)){
					echo '<div class="annonce">';
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
					echo '<p class="date_admin">'.$ligne['dateAnnonce'].'</p>';
					/*echo '<span><a href="modifier.php?idAnnonce='.$ligne['idAnnonce'].'">modifier l`annonce </a></span></br>';*/
					echo '<span><a onclick="on()">supprimer l`annonce </a> </span>';
					echo '<div id="overlay" onclick="off()">Voulez-vous vraiment supprimer l`annonce?</br><div class="buttons"><a href = "supprimer.php?idAnnonce='.$ligne['idAnnonce'].'">Oui</a><a href="gerer_annonce.php">Annuler</a></div></div>';
					echo '<p class="clear"></p></div>';
				}

				 /*href="supprimer.php?idAnnonce='.$ligne['idAnnonce'].'"*/
			
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

	<script type="text/javascript">
		function on() {
	    document.getElementById("overlay").style.display = "block";
		}
		function off() {
	    document.getElementById("overlay").style.display = "none";
		}
</script>

</body>
</html>
