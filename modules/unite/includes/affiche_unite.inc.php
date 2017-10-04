<?php
	$path='../../config/config.php';
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
	require_once _INCLUDES_UNITE_.'fonctions.inc.php';
	
	/* Connexion Base de donnees */
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	
	/* LIBRAIRIE SMARTY */
	require_once _SMARTY_LOAD_;

	if (!empty($_POST['idUnite'])) {
		if (strpos($_POST['table'], 'joueur') > 0) {
			$oUnite = ManagerUnite_joueur::getInstance()->getById(intval($_POST['idUnite']));
		} else {
			$oUnite = ManagerUnite::getInstance()->getById(intval($_POST['idUnite']));
		}
	} else {
		if (strpos($_POST['table'], 'joueur') > 0) {
			$oUnite = ManagerUnite_joueur::getInstance()->getUniteJoueurVide();
		} else {
			$oUnite = ManagerUnite::getInstance()->getUniteVide();
		}
	}
	
	if (strlen($oUnite->getChemin()) == 0) {
		$oUnite->setChemin('aucune.gif');
	}
	list($width, $height) = getimagesize(_DIR_IMGS_UNITE_.$oUnite->getChemin());
	$smarty->assign('IMG',str_replace(_DIR_BASE_,_URL_BASE_,_DIR_IMGS_UNITE_.$oUnite->getChemin()));
	$smarty->assign('WIDTH',$width);
	$smarty->assign('HEIGHT',$height);
	$smarty->assign('TPL_BASE',_TEMPLATES_BASE_);
	$smarty->assign('URL_JAVASCRIPT_UNITE',_URL_JAVASCRIPT_UNITE_);
	$smarty->assign('URL_UNITE',_URL_MODULE_UNITE_);
	$smarty->assign('URL_INCLUDES_UNITE',_URL_INCLUDES_UNITE_);
	$smarty->assign('URL_IMGS_UNITE',_URL_IMGS_UNITE_);
	if (!empty($_POST['table']) && strpos($_POST['table'], 'joueur') > 0) {
		$smarty->assign('unite_joueur',$oUnite);
		$smarty->assign('listeMembre',ManagerMembre::getInstance()->getById());
		$smarty->assign('listeArmee',ManagerArmee::getInstance()->getById());
		$smarty->assign('listeCamp',ManagerCamp::getInstance()->getById());
// 		$oTile = $oUnite->getTileObject();
// 		ManagerTile::getInstance()->getFromExtTableUnite_joueur($oUnite->getId())->getId()
		$smarty->assign('listeTile',ManagerTile::getInstance()->getFromExtTableCarte($oUnite->getTileObject()->getCarte()));
		$smarty->display(_TEMPLATES_BASE_.'classes/Unite_joueur.tpl');
	} else {
		$smarty->assign('unite',$oUnite);
		$smarty->display(_TEMPLATES_BASE_.'classes/Unite.tpl');
	}
?>