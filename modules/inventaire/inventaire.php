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
	require_once _INCLUDES_INVENTAIRE_.'fonctions.inc.php';
	
	/* Connexion Base de donnees */
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	
	/* LIBRAIRIE SMARTY */
	require_once _SMARTY_LOAD_;
	
	//Chargement des listes
	$smarty->assign('listeMembres',ManagerMembre::getInstance()->getById());
	$smarty->assign('listeUnites',ManagerUnite::getInstance()->getById());
	$smarty->assign('listeUnitesJoueurs',ManagerUnite_joueur::getInstance()->getById());
	
	if ($_SESSION['user']->getStaff() == 1) {
		//La liste de tous les equipements pour l'administrateur
		$smarty->assign('listeEquipementGauche',ManagerEquipement::getInstance()->getById());
		$smarty->assign('listeEquipementGauche',ManagerInventaire::getInstance()->getFromExtTableEquipement());
		$smarty->assign('inventaireFrom','equipement');
	} else {
		//la liste des equipements du joueur
		$smarty->assign('listeEquipementGauche',ManagerEquipement_joueur::getInstance()->getFromExtTableMembre($_SESSION['user']->getId()));
		$smarty->assign('inventaireFrom','equipement_joueur');
	}
	
	//Les listes de droite sont chargees via AJAX
	
	$smarty->display(_TEMPLATES_INVENTAIRE_.'inventaire.tpl');
?>