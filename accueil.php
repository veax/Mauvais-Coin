<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mauvais Coin</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<!-- HEADER -->
<header>
	<div class="header_container">	
		<img src="logo.png" height="68" width="140" alt="logo">
		<h1><a href="accueil.php">le mauvais coin</a></h1>
		<span class="desc">Les pires propositions à trouver</span>
	</div>
</header>
	
	<!-- connection de BD -->
	<?php
		require("connection.php");
	?>
	
	<!-- SECTION RECHERCHE -->
<section class="search_section">
	<div class="container"> 
		<div class="recherche">
			<form method='get' action='recherche_annonces.php' class="search">
				<input type='text' placeholder='Entrez le mot-clé..' name='mot_cle' class="search">
				<input type='submit' value=""></br>
				<hr>
				
					<div class="filters">
						<h4>Trier par:</h4>
						<div class="filter-item">
							<input type="radio" name="filter" value = "date"> date récente
						</div>
						<div class="filter-item">
							<input type="radio" name="filter" value = "alpha"> order alphabétique
						</div>
					</div>
					<div class = "strings">
						<a class="gerer_annonce" href = "gerer_annonce.php">gérer les annonces (administration)</a>
						<a href="annonces.php">ou afficher tous les annonces</a>
					</div>
					
					<div class="clear"></div>
	
			</form>
		</div>
	</div>
</section>

<!-- SECTION CREATION D`ANNONCE -->
<section class="create_annonce">
	<div class="container">
		<h2>Ajouter votre annonce:</h2>
		<a href="ajoutAnnonce.php" class="ajout_button">Ajouter</a>
	</div>
</section>	

<!-- SECTION RECHERCHE PAR REGIONS -->
<section class="regions">
	<div class="container">
		<h2>Les régions:</h2>
		<ul>
			<?php 
				$res = mysql_query("SELECT nomRegion FROM Regions");
				while ($ligne = mysql_fetch_array($res)){
					echo '<li><a href="regions.php?region='.$ligne['nomRegion'].'">'.$ligne['nomRegion'].'</a></li>';
				}
			?>	
		</ul>
	</div>
</section>	

<!-- SECTION RECHERCHE PAR LES CATEGORIES -->
<section class="categories">
	<div class="container">
	<h2>Les catégories:</h2>
	<ul>
		<?php 
			$res1 = mysql_query("SELECT nomCategorie FROM Categories");
			while ($ligne = mysql_fetch_array($res1)) {
				$ligne['nomCategorie'] = rawurlencode($ligne['nomCategorie']);
				$decod = rawurldecode($ligne['nomCategorie']);
				echo '<li><a href="categories.php?categorie='.$ligne['nomCategorie'].'">'.$decod.'</a></li>';

			}
		?>
	</ul>
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
	<?php mysql_close($link); ?>
</body>
</html>
