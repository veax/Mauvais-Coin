<?php
		require("identifiants.php");

		$link = mysql_connect($sql_host, $sql_user, $sql_password)
			or die("Impossible de se connecter");

		mysql_select_db($sql_database, $link)
			or die("Impossible de choisir la BD ");

		mysql_set_charset("UTF8");
?>
