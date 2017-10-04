<?php
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
	require_once _DIR_BASE_.'includes/fonctions.inc.php';
	
	/* FONCTIONS SPECIFIQUES */
// 	require_once _DIR_BASE_.'modules/traitement_image/includes/fonctions.inc.php';
	require_once _INCLUDES_TRAITEMENT_IMAGE_.'fonctions.inc.php';
	
	
	require_once _SMARTY_LOAD_;
	$smarty->assign('charset',_CHARSET_);
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	$smarty->assign('TPL_BASE',_TEMPLATES_BASE_);
	$smarty->assign('MODULES_BASE',_MODULES_BASES_);
	
	$listeImages = array();
	listeImages(_DIR_IMGS_,$listeImages);
	$smarty->assign('listeImages',$listeImages);
	
// 	$smarty->display(_MODULES_BASES_.'traitement_image/templates/listeImagesATraiter.tpl');
	$smarty->display(_TEMPLATES_TRAITEMENT_IMAGE_.'listeImagesATraiter.tpl');
?>
