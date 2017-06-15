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
  //-----------extraire l'information de BD
		$res = mysql_query("DELETE FROM Annonces WHERE idAnnonce = '".$_GET["idAnnonce"]."'");
			
		if (!$res){
			die('Requete impossible: '.mysql_error());
		}
		else{?>
			<script type="text/javascript">location.href = 'gerer_annonce.php';</script>
		<?php }
		mysql_close($link);

		?>


</body>
</html>
