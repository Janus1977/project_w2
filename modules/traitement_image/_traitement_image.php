<?php
	/**
	 * Fichier point d'entree du module de traitement des images
	 */
	$path='../config/config.php';
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
	require_once _DIR_BASE_.'lib/smarty/Smarty.class.php';
	/* FONCTIONS GENERIQUES */
	require_once _DIR_BASE_.'includes/fonctions.inc.php';
	/* FONCTIONS SPECIFIQUES */
	require_once _DIR_BASE_.'modules/traitement_image/includes/fonctions.inc.php';
	
	
	$smarty = new Smarty();
	$smarty->compile_dir = _SMARTY_COMPILE_;
	$smarty->assign('charset',_CHARSET_);
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	$smarty->assign('TPL_BASE',_TEMPLATES_BASE_);
	$smarty->assign('MODULES_BASE',_MODULES_BASES_);
	
	$listeImages = array();
	listeImages(_DIR_IMGS_,$listeImages);
	$smarty->assign('listeImages',$listeImages);
	
	$listeRepertoireDestination = array();
	listeRepertoireDestination(_DIR_IMGS_,$listeRepertoireDestination);
	$smarty->assign('listeRepertoireDestination',$listeRepertoireDestination);
	
	$smarty->display(_DIR_BASE_.'modules/traitement_image/templates/traitement_image.tpl');
?>
