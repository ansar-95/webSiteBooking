<?php
	$cx = mysqli_connect("172.16.200.37","admin","@Xazerty1");
	if ($cx) {
		echo "<H1>MySQL: Ca Marche !</H1>" ;
		mysqli_close($cx);
	} else {echo "raté";}
?>


