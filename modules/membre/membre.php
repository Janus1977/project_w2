<?php
	$pathToConfig='config/config.php';
	$i=0;
	while (!file_exists($pathToConfig)) {
	    if($i>10) {
	        echo 'Impossible de trouver les fichiers de configuration global,<br/>remplacement par celui du module';
	        $pathToConfig='config/config.php';
	        break;
	    }
	    
	    $pathToConfig='../'.$pathToConfig;
	    $i++;
	}
	require_once $pathToConfig;	
	
	/* FONCTIONS GENERIQUES */
	require_once _DIR_INCLUDES_BASE_.'fonctions.inc.php';
	
	/* FONCTIONS SPECIFIQUES */
	require_once _INCLUDES_MEMBRE_.'fonctions.inc.php';
	
	/* Connexion Base de donnees */
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	
	/////////////////
	// A COMPLETER //
	/////////////////
	
	$smarty->display(_TEMPLATES_MEMBRE_.'membre.tpl');
?>