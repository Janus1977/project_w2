<?php
	/**
	 * Fichier point d'entree du module admin
	 */
	$path='config/config.php';
	$i=0;
	while (!file_exists($path)) {
	    if($i>10) {
	        echo 'Impossible de trouver les fichiers de configuration global,';
			echo '<br/>remplacement par celui du module';
	        $path='config/config.php';
	        break;
	    }
	    
	    $path='../'.$path;
	    $i++;
	}
	
	/*TEST*/
	$_SESSION['admin']['auth'] = true;
	/*/TEST*/
	
// 	if (empty($_SESSION['admin']) || $_SESSION['admin']['auth'] === false) {
// 		/* affichage du formulaire de connexion au panneau admin */
// 		$page = 'connexion_admin';
// 	} else {
// 		/* redirection vers la page demandee */
// 		$page = 'admin';
// 	}
	
	require_once $path;
	require_once _DIR_BASE_.'lib/smarty/Smarty.class.php';
	
	/* FONCTIONS GENERIQUES */
	require_once _DIR_INCLUDES_BASE_.'fonctions.inc.php';
	
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
		
	/* FONCTIONS SPECIFIQUES */
	require_once _INCLUDES_TEST_.'fonctions.inc.php';
	
	$smarty = new Smarty();
	$smarty->compile_dir = _SMARTY_COMPILE_;
	$smarty->assign('charset',_CHARSET_);
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	$smarty->assign('URL_MODULES',_URL_MODULES_BASES_);
	
	/* affichage */
//	$smarty->display(_MODULES_BASES_.'admin/templates/'.$page.'.tpl');

	//module a tester
	$smarty->assign('listeModuleTestables',ManagerModule::getInstance()->getModulesDev());
	
	
	$smarty->display(_TEMPLATES_TEST_.'test.tpl');
?>