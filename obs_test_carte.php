<?php
	//nom du projet
	$aFolders = explode('\\', realpath(dirname(__FILE__)));
	define('_PROJET_',$aFolders[sizeof($aFolders) - 1]);

	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
		$docRoot = $_SERVER['DOCUMENT_ROOT'];
	} else {
		$docRoot = $_SERVER['DOCUMENT_ROOT'].'/';
	}
	$path=$docRoot._PROJET_.'/config/config.php';
	
	require_once $path;
	
	/* FONCTIONS SPECIFIQUES */
	require_once _INCLUDES_CARTE_.'fonctions.inc.php';
	
	define('_HAUTEUR_',10);
	define('_LARGEUR_',10);
	
	$_SESSION['user'] = ManagerMembre::getInstance()->getById(28);
	$_SESSION['EDITION_CARTE'] = false;
	echo '<center>Affichage de la carte ID35</center>';
 	ManagerCarte::getInstance()->afficheCarte(35);
	unset($_SESSION['user']);
	session_destroy();
	
	