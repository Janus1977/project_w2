<?php
	require_once('includes/fonctions.inc.php');
	
	//lancer 1D4 + 1D6 + 1D6-2
	echo '<br>Lancer de 1D4 + 1D6 + 1D6-2: ';
	echo lanceDes2(array('1D4','1D6','1D6-2'));
	
	//lancer D6
	echo '<br>Lancer de 1D6: ';
	echo lanceDes2(array('1D6'));
	
	//lancer 2D6
	echo '<br>Lancer de 2D6: ';
	echo lanceDes2(array('2D6'));
	
	//lancer 2D6-1
	echo '<br>Lancer de 2D6-1: ';
	echo lanceDes2(array('2D6-1'));
	
	//lancer 2D6+4
	echo '<br>Lancer de 3D6+4: ';
	echo lanceDes2(array('3D6+4'));
	
	//lancer 1DB
	echo '<br>Lancer de 1DB: ';
	echo lanceDes2(array('1DB'));
	
	//lancer 2DB + 1DR
	echo '<br>Lancer de 2DB + 1DR: ';
	echo lanceDes2(array('2DB','1DR'));
	
	//lancer 1D de dispersion
	echo '<br>Lancer de 1D de dispersion: ';
	echo lanceDes2(array('1Dorientation'));
	
	//lancer 1D de tir soutenu
	echo '<br>Lancer de 1D de tir soutenu: ';
	echo lanceDes2(array('1Dtirsoutenu'));
	
	//lancer 2D de tir soutenu
	echo '<br>Lancer de 2D de tir soutenu: ';
	echo lanceDes2(array('2Dtirsoutenu'));
	
	//lancer 3D de tir soutenu
	echo '<br>Lancer de 3D de tir soutenu: ';
	echo lanceDes2(array('3Dtirsoutenu'));
	
	//lancer 3D de tir soutenu
	echo '<br>Lancer de D66: ';
	echo lanceDes2(array('D66'));
?>