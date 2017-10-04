<?php
	$path='../../config/config.php';
	$i=0;
	while (!file_exists($path)) {
		if($i>10) {
			echo 'Impossible de trouver les fichiers de configuration';
			exit;
		}
		 
		$path='../'.$path;
		$i++;
	}
	require_once $path;
	
	/* FONCTIONS GENERIQUES */
	require_once _DIR_INCLUDES_BASE_.'fonctions.inc.php';
	
	/* Connexion Base de donnees */
	//	spl_autoload_register('autoload');
	//	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	
	/* FONCTIONS SPECIFIQUES */
	debug($_POST);
	