<?php
	$path='config/config.php';
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
	
	/* FONCTIONS SPECIFIQUES */
	require_once _MODULES_BASES_.'includes/fonctions.inc.php';
	
	/* Connexion Base de donnees */
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	
	//L'acces a la partie staff (et sa deconnexion se font sur la page d'index
	if (array_key_exists('staffSession',$_POST) && !empty($_SESSION['user']) && $_SESSION['user']->getStaff() == 1) {
		$_SESSION['staffSession'] = intval($_POST['staffSession']);
	}
?>