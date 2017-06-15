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
			<?php if( !empty($_GET['mot_cle'])) {
				$mot_cle = $_GET['mot_cle'];?>
				<h2>Mot-clé: <?php echo $mot_cle; ?></h2>
		
				<?php     //-----------extraire l'information de BD
				$res = mysql_query("SELECT titre, description, prix, dateAnnonce FROM Annonces WHERE titre LIKE '%".$mot_cle."%'");
				if( !empty($_GET['filter'])) {
					if ($_GET['filter']=="date") {
							$res = mysql_query("SELECT titre, description, prix, dateAnnonce FROM Annonces WHERE titre LIKE '%".$mot_cle."%' ORDER BY dateAnnonce DESC");
					}
					else if ($_GET['filter']=="alpha"){
							$res = mysql_query("SELECT titre, description, prix, dateAnnonce FROM Annonces WHERE titre LIKE '%".$mot_cle."%' ORDER BY titre ASC");
					}
				}
						
				

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
					echo '<p class="date">'.$ligne['dateAnnonce'].'</p></div>';

					
				}

				$nb_de_lignes = mysql_num_rows($res);
				if ($nb_de_lignes == 0){
					echo '<h2>Pas de titre correspondant</h2>';
				}
			
				mysql_close($link);
			}
			else{
				echo "Entrez le mot-clé "; 
			}
			?>
		<a href = 'accueil.php'> dans la forme</a>
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
