<?php
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
	
	/* FONCTIONS SPECIFIQUES */
	require_once _DIR_MODULES_BASES_.'includes/fonctions.inc.php';
	
	/* Connexion Base de donnees */
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	

	
	require_once _SMARTY_LOAD_;
	$smarty->assign('charset',_CHARSET_);
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	$smarty->assign('url_redir',_URL_BASE_);
	$smarty->assign('URL_MODULES_BASES',_URL_MODULES_BASES_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	

	$alisteModules = array();
	foreach (ManagerModule::getInstance()->getById() AS $module) {
		if ($_SESSION['staffSession'] == 0 && $module->getActif() == 2) {
			$alisteModules[] = $module;
		}
		if ($_SESSION['staffSession'] == 1) {
			$alisteModules[] = $module;
		}
	}
	$smarty->assign('listeModules',$alisteModules);
	
	$smarty->display(_DIR_MODULES_BASES_.'templates/modules.tpl');
?>
