<?php
	$pathToConfig='../config/config.php';
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
	require_once _INCLUDES_ARMEE_.'fonctions.inc.php';
	
	/* Connexion Base de donnees */
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	
	/////////////////
	// A COMPLETER //
	/////////////////
	$smarty->assign('module','armee');
	if (!empty($_POST['id']) && intval($_POST['id']) > 0) {
		//Donnees sur l'armee
		debug(ManagerArmee::getInstance()->getById(intval($_POST['id'])));
		$smarty->assign('oArmee',ManagerArmee::getInstance()->getById(intval($_POST['id'])));
		//composition de l'armee
		debug(ManagerArmeecomposition::getInstance()->getFromExtTableArmee(intval($_POST['id'])));
		$smarty->assign('oArmeeComposition',ManagerArmeecomposition::getInstance()->getFromExtTableArmee(intval($_POST['id'])));
	}
	
	$smarty->display(_TEMPLATES_ARMEE_.'affiche_details.tpl');
?>