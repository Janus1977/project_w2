<?php
	$path='config/config.php';
	$i=0;
	while (!file_exists($path)) {
	    if($i>10) {
	        echo 'Impossible de trouver les fichiers de configuration global,<br/>remplacement par celui du module';
	        $path='config/config.php';
	        break;
	    }
	    
	    $path='../'.$path;
	    $i++;
	}
	require_once $path;	
	
	/* FONCTIONS GENERIQUES */
	require_once _DIR_INCLUDES_BASE_.'fonctions.inc.php';
	
	/* FONCTIONS SPECIFIQUES */
	require_once _INCLUDES_OUTILS_.'fonctions.inc.php';
	
	/* Connexion Base de donnees */
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	
	/////////////////
	// A COMPLETER //
	/////////////////
	
	//la liste des cartes du jeu
	$smarty->assign('listeCartes',ManagerCarte::getInstance()->getCartesDisponibles());
	
	//la liste des unites du jeu
	$smarty->assign('listeUnites',ManagerUnite::getInstance()->getById());
	
	//la liste des unites sur des cases
	$smarty->assign('listeUnitesSurCase',ManagerUnite::getInstance()->getUnitOnTileList());
	
	//la liste des equipement du jeu
	$smarty->assign('listeEquipements',ManagerEquipement::getInstance()->getById());
	
	//la liste des equipement deja sur des cases
	$smarty->assign('listeEquipementsSurCase',ManagerEquipement::getInstance()->getFromExtTableTile());
	
	
	$smarty->assign('TPL_OUTILS',_TEMPLATES_OUTILS_);
	$smarty->assign('TPL_UNITE',_TEMPLATES_UNITE_);
	
	$smarty->display(_TEMPLATES_OUTILS_.'outils.tpl');
?>