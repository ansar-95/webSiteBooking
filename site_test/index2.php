<?php
	$cx = mysql_connect("172.16.11.10","admin","azerty");
	if ($cx)
	 {
		echo "<h1>MySQL: Ca Marche!</h1>" ;
		$bdd = mysql_select_db("mysql",$cx);
		if ($bdd)
		{
			$requete="select user, host,password from mysql.user;";
			$resultat=mysql_query($requete);
			echo "<h1>Compte:Hôte:MotdePasse</h1></br>";
			while($tab=mysql_fetch_array($resultat))
			{
				echo $tab[0].":".$tab[1].":".$tab[2]."</br>";
			}
		}
		mysql_close($cx);
	}
	else
	{
		echo "MySQL ca marche pas";
	}
	echo "<h1>PHP: Ca marche!</h1>" ;
	phpinfo();
?>
