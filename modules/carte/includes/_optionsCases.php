<?php
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
	require_once _DIR_BASE_ . 'lib/smarty/Smarty.class.php';
	
	/* FONCTIONS GENERIQUES */
	require_once _DIR_BASE_.'includes/fonctions.inc.php';
	
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	
	/* FONCTIONS SPECIFIQUES */
	require_once _DIR_BASE_.'modules/traitement_carte/includes/fonctions.inc.php';
	
	$_GET = protectionFormulaire($_GET);
	
	$smarty = new Smarty();
	$smarty->compile_dir = _SMARTY_COMPILE_;
	$smarty->assign('charset',_CHARSET_);
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	$smarty->assign('url_redir',_URL_BASE_);
	
	/* La liste des images pour les plateaux */
	$listeImagesPlateaux = array();
	listeImages(_DIR_IMGS_PLATEAUX_,$listeImagesPlateaux);
	$smarty->assign('listeSol',$listeImagesPlateaux);
	
	/* La liste des images pour les decors */
	$listeImagesDecor = array();
	listeImages(_DIR_IMGS_DECORS_,$listeImagesDecor);
	$smarty->assign('listeDecor',$listeImagesDecor);
	
	$oManagerCases = managerCasesCarte::getInstance();
	$oManagerCases->setConnexion($oPdo);
	$smarty->assign('case',$oManagerCases->getByID(intval($_GET['id'])));

	$smarty->display(_MODULES_BASES_.'carte/templates/optionsCases.tpl');
?>
