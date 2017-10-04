<?php
	/**
	 * Script permettant d'afficher les unites du jeu
	 */
	
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
	
	/* Connexion Base de donnees */
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	
	/* FONCTIONS SPECIFIQUES */
	require_once _INCLUDES_UNITE_.'fonctions.inc.php';
	
	require_once _SMARTY_LOAD_;
	$smarty->assign('charset',_CHARSET_);
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	
	$_POST = protectionFormulaire($_POST);

	//la liste des unites du jeu
	$smarty->assign('listeUnites',ManagerUnite::getInstance()->getById());
	
	$smarty->display(_TEMPLATES_UNITE_.'liste_unites.tpl');
?>