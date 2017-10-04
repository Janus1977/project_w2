<?php
	$path=$_SERVER['DOCUMENT_ROOT'].'project_w2/config/config.php';
	require_once $path;
	
	/* FONCTIONS GENERIQUES */
	require_once _DIR_BASE_.'includes/fonctions.inc.php';
	
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	
	/* FONCTIONS SPECIFIQUES */
	require_once _INCLUDES_CARTE_.'fonctions.inc.php';
	
	$_POST = protectionFormulaire($_POST);
	
	require_once _SMARTY_LOAD_;
	$smarty->assign('charset',_CHARSET_);
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	$smarty->assign('url_redir',_URL_BASE_);
	
	/* La liste des cases definie comme liables de la carte donnee*/
	
	$oCase = ManagerTile::getInstance()->getById(intval($_POST['idCase']));
	$smarty->assign('case',$oCase);
	if ($oCase->getIdtile() > 0) {
		$smarty->assign('caseLiee',ManagerTile::getInstance()->getFromExtTableTile($oCase->getIdtile()));
	}
	$smarty->assign('listeCartes',ManagerCarte::getInstance()->getById());
	$smarty->assign('listeCasesLienCarte',ManagerTile::getInstance()->getListeCasesLienFromCarte(intval($_POST['idCarte'])));
	
	$smarty->display(_TEMPLATES_TRAITEMENT_CARTE_.'listes_creation_liens.tpl');
?>