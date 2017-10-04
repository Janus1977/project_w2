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
	require_once _INCLUDES_EQUIPEMENT_.'fonctions.inc.php';
	
	/* Connexion Base de donnees */
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	
	/* LIBRAIRIE SMARTY */
	require_once _SMARTY_LOAD_;
	debug($_POST['idEquipement']);
	if (!empty($_POST)) {
		if (strpos($_POST['table'], 'joueur') > 0) {
			$oEquipement = ManagerEquipement_joueur::getInstance()->getById(intval($_POST['idEquipement']));
		} else {
			$oEquipement = ManagerEquipement::getInstance()->getById(intval($_POST['idEquipement']));
		}
	} else {
		$oEquipement = ManagerEquipement::getInstance()->getEquipementVide();
	}
		debug($oEquipement);
	if (strlen($oEquipement->getChemin()) == 0) {
		$oEquipement->setChemin('aucune.gif');
	}
	list($width, $height) = getimagesize(_DIR_IMGS_EQUIPEMENT_.$oEquipement->getChemin());
	$smarty->assign('IMG',str_replace(_DIR_BASE_,_URL_BASE_,_DIR_IMGS_EQUIPEMENT_.$oEquipement->getChemin()));
	$smarty->assign('WIDTH',$width);
	$smarty->assign('HEIGHT',$height);
	$smarty->assign('TPL_BASE',_TEMPLATES_BASE_);
	$smarty->assign('URL_JAVASCRIPT_EQUIPEMENT',_URL_JAVASCRIPT_EQUIPEMENT_);
	$smarty->assign('URL_EQUIPEMENT',_URL_MODULE_EQUIPEMENT_);
	$smarty->assign('URL_INCLUDES_EQUIPEMENT',_URL_INCLUDES_EQUIPEMENT_);
	$smarty->assign('URL_IMGS_EQUIPEMENT',_URL_IMGS_EQUIPEMENT_);
	$smarty->assign('equipement',$oEquipement);
	$smarty->display(_TEMPLATES_BASE_.'classes/Equipement.tpl');
?>