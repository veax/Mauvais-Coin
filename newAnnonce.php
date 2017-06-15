<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Premiere page</title>
	<link rel="stylesheet" href="style.css?t=<?php echo time()?>">
</head>
<body>
	<header>
		<div class="header_container">	
			<img src="logo.png" height="68" width="140" alt="logo">
			<h1><a href="accueil.php">le mauvais coin</a></h1>
			<span class="desc">Les pires propositions à trouver</span>
		</div>
	</header>

	<section class="new_annonce">
		<div class="container">
			<?php 
			if( !empty($_POST['titre'])&&($_POST['prix'])&&($_POST['email'])&&($_POST['ville'])&&($_POST['categorie'])) {  //simple verification
				require("connection.php");   //connection a la bd

				$titre = $_POST['titre'];
					if (!empty ($_POST['desc'])){
						$desc = $_POST['desc'];
					}
					else{
						$desc = NULL;               //affecte null si le champ est vide
					}
				$prix = (string)$_POST['prix'];
				$email = (string)$_POST['email'];
					if (!empty ($_POST['tel'])){
						$tel = $_POST['tel'];
					}
					else{
						$tel = NULL;
					}
				$ville = $_POST['ville'];
				$cat = $_POST['categorie'];

				$categorie =  mysql_query('SELECT idCategorie FROM Categories WHERE nomCategorie ="'.$cat.'"');
				while ($ligne = mysql_fetch_array($categorie)){
					$cat = $ligne['idCategorie'];     //on associe une idCategorie a un nomCategorie insere par l`utilisateur
				}

				$city = mysql_query('SELECT codePostal FROM Villes WHERE nomVille ="'.$ville.'"');
				while ($ligne = mysql_fetch_array($city)){
					$ville = $ligne['codePostal'];    //on associe une codePostal a un nomVille insere par l`utilisateur
				}

				date_default_timezone_set('Europe/Paris');
				$date = date('Y-m-j');              // la date d`annonce
				//echo $titre.$desc.$prix.$email.$tel.$ville.$date.$cat;

				$res = mysql_query("INSERT INTO Annonces (titre, description, prix, dateAnnonce, idCategorie, email) VALUES ('$titre', '$desc', '$prix', '$date', '$cat', '$email')");
				if (!$res){
					die('Requete invalide : '.mysql_error($link));
				}
				else{
					echo "<h2>Votre annonce '".$titre."' a été enregistré</h2>";
				}

				$res2 = mysql_query("SELECT email FROM Utilisateurs");
				$primary = true;
				while ($ligne = mysql_fetch_array($res2)){
					if ($ligne['email'] == $email){
						$primary = false;
						break;
					}
				}

				if ($primary == true){
					$res3 = mysql_query("INSERT INTO Utilisateurs VALUES ('$email', '$tel', '$ville')");
					if (!$res3){
						die('Requete invalide : '.mysql_error($link));
					}
				}

				echo '<h3>Maintenant vous pouvez:  <a href = "accueil.php">rechercher ce qui vous interesse</a> <a href = "ajoutAnnonce.php">enregistrez une autre annonce</a><a href = "gerer_annonce.php">gérer les annonces (administration)</a></h3>';
				

				
				
				mysql_close($link);
			}
			else{
				echo '<h2>Vérifiez que vous avez bien indiqué le titre, le prix, la catégorie de votre annonce, ainsi que vos coordonnées: email et une ville. Retournez à <a href = "ajoutAnnonce.php"> la forme</a></h2>';
			}?>
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
