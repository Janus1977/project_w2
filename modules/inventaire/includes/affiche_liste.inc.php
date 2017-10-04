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
	if (!empty($_POST)) {
		if ($_POST['champ'] == 'membre') {
			$liste = ManagerInventaire::getInstance()->getFromMembreId(intval($_POST['id']));
			$smarty->assign('listeEquipementDroite',ManagerInventaire::getInstance()->getFromMembreId(intval($_POST['id'])));
		} else if ($_POST['champ'] == 'unite') {
			
		} else if ($_POST['champ'] == 'unite_joueur') {
			
		}
	}
	
	$smarty->display(_TEMPLATES_INVENTAIRE_.'liste.tpl');
?>