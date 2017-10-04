<?php
	/**
	 * Fichier point d'entree du module de traitement des images
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
	require_once _DIR_BASE_.'lib/smarty/Smarty.class.php';
	/* FONCTIONS GENERIQUES */
	require_once _DIR_BASE_.'includes/fonctions.inc.php';
	/* FONCTIONS SPECIFIQUES */
	require_once _DIR_BASE_.'modules/traitement_image/includes/fonctions.inc.php';
	
	if (!empty($_POST)) {
		debug($_POST,true);
	} else {
		debug("POST VIDE",true);
	}
	$smarty = new Smarty();
	$smarty->compile_dir = _SMARTY_COMPILE_;
	$smarty->assign('charset',_CHARSET_);
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	$smarty->assign('TPL_BASE',_TEMPLATES_BASE_);
	
	$listeMiniatures = array();
 	listeMiniatures(_DIR_MINIATURES_,$listeMiniatures);
	for ($i = 0; $i < sizeof($listeMiniatures); $i++) {
// 		debug($listeMiniatures[$i],true);
		$listeMiniatures[$i]['chemin'] = dirToUrl($listeMiniatures[$i]['chemin']);
	}
	$smarty->assign('listeMiniatures',$listeMiniatures);
	$smarty->assign('_URL_TEST_FILE_',$docRoot."test/test_d_n_d.php");
	
	$smarty->display(_DIR_BASE_.'test/test_d_n_d.tpl');
?>