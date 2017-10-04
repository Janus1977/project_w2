<?php
try {
	$path=$_SERVER['DOCUMENT_ROOT'].'project_w2/config/config.php';
//	$i=0;
//	while (!file_exists($path)) {
//	    if($i>10) {
//	        echo 'Impossible de trouver les fichiers de configuration';
//	        exit;
//	    }
//	    
//	    $path='../'.$path;
//	    $i++;
//	}
	
	require_once $path;
	
	/* FONCTIONS GENERIQUES */
	require_once _DIR_INCLUDES_BASE_.'fonctions.inc.php';
	
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	
	/* FONCTIONS SPECIFIQUES */
	require_once _INCLUDES_TRAITEMENT_CARTE_.'fonctions.inc.php';
	
	$_POST = protectionFormulaire($_POST);
	
	require_once _SMARTY_LOAD_;
	$smarty->assign('charset',_CHARSET_);
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	$smarty->assign('url_redir',_URL_BASE_);
	
	$smarty->assign('VIDE',_CASE_VIDE_);
	$smarty->assign('PLATEAU',_CASE_PLATEAU_);
	$smarty->assign('DECOR',_CASE_DECOR_); 			// == plateau + decor
	$smarty->assign('UNITE',_CASE_UNITE_); 			// == plateau + unite
	$smarty->assign('DECOR_UNITE',_CASE_DECOR_UNITE_);	// == plateau + unite + decor
	$smarty->assign('LIEN',_CASE_LIEN_);			// == case lien entre les cartes
		
	$smarty->assign('TEMPLATES_TRAITEMENT_CARTE',_TEMPLATES_TRAITEMENT_CARTE_);
	
	/* La liste des images pour les plateaux */
// 	$listeImagesPlateaux = array();
// 	listeImages(_DIR_IMGS_PLATEAUX_,$listeImagesPlateaux);
	$smarty->assign('listePlateaux',ManagerPlateau::getInstance()->getById());
	
	/* La liste des images pour les decors */
	$listeImagesDecor = array();
	
	//temporaire car doit etre gere par BD
	listeImages(_DIR_IMGS_DECORS_,$listeImagesDecor);
	$smarty->assign('listeDecor',$listeImagesDecor);
	$smarty->assign('listeDecor',ManagerDecor::getInstance()->getById());
	
	$smarty->assign('listeUnite',ManagerUNite::getInstance()->getById());
	
	/* toutes les cartes du jeu pour le lien eventuel entre elles */
	$smarty->assign('listeCartes',ManagerCarte::getInstance()->getById());
	
	/* la case pour les options */
	$oCase = ManagerTile::getInstance()->getByID(intval($_POST['id']));
	
	$smarty->assign('EDITION_CARTE',$_SESSION['EDITION_CARTE']);
	
	$smarty->assign('case',$oCase);
	/* la case liee */
	 if ($oCase->getTile() > 0) {
	 	$smarty->assign('caseLiee',ManagerTile::getInstance()->getById($oCase->getTileObject()->getId()));
	 }	

	$smarty->display(_TEMPLATES_CARTE_.'optionsCases.tpl');
}catch (Exception $e) {
	debug($e->getMessage());
}
?>
