<?php
	/**
	 * Script permettant d'afficher les plateaux contenus dans une carte de jeu en edition
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
//	require_once _DIR_BASE_.'lib/smarty/Smarty.class.php';
	
	/* FONCTIONS GENERIQUES */
	require_once _DIR_INCLUDES_BASE_.'fonctions.inc.php';
	
	/* Connexion Base de donnees */
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	
	/* FONCTIONS SPECIFIQUES */
//	require_once _DIR_BASE_.'modules/traitement_carte/includes/fonctions.inc.php';
	require_once _INCLUDES_TRAITEMENT_CARTE_.'fonctions.inc.php';
	
//	$smarty = new Smarty();
//	$smarty->compile_dir = _SMARTY_COMPILE_;

	require_once _SMARTY_LOAD_;
	$smarty->assign('charset',_CHARSET_);
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	
	$_POST = protectionFormulaire($_POST);
	
//	$requete = "SELECT * FROM carte_plateaux WHERE idcarte = ".$_GET['id'];
	/* Ici on recupere la liste des plateaux deja affectes a la carte */
	$listePlateauxCarte = ManagerCarteplateaux::getInstance()->getFromExtTableCarte(intval($_POST['id']));

//	if (!$oPdo->executeRequete($requete)) {
//		debug("ERREUR sur la requete<br/>".$requete);
//	} else {
//		$data = $oPdo->getTableauResultat();
// 		$listePlateauxCarte = array();
// 		foreach ($data AS $cartePlateau) {
// 			$listePlateauxCarte[] = $cartePlateau;
// 		}
//	}
	
	$smarty->assign('listePlateauxCarte',$listePlateauxCarte);
//	$smarty->display(_MODULES_BASES_.'traitement_carte/templates/supprime_plateau_jeu.tpl');
	$smarty->display(_TEMPLATES_TRAITEMENT_CARTE_.'supprime_plateau_jeu.tpl');
?>
