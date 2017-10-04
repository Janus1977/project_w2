<?php
	/**
	 * Script permettant d'afficher les cartes de jeu en edition
	 */
	 
	$path='../../config/config.php';
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
	require_once _INCLUDES_TRAITEMENT_CARTE_.'fonctions.inc.php';
	
	require_once _SMARTY_LOAD_;
	$smarty->assign('charset',_CHARSET_);
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	
	$_POST = protectionFormulaire($_POST);

	$smarty->assign('listeCartesEnEdition',ManagerCarte::getInstance()->getCartesEnEdition());

	$smarty->display(_TEMPLATES_TRAITEMENT_CARTE_.'liste_cartes_jeu.tpl');
?>
