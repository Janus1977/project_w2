<?php
	/**
	 * Fichier de configuration du module "test"
	 */
	
	/** Chemin vers le module de test */
	if (!defined('_MODULE_TEST_')) {
		define('_MODULE_TEST_',_DIR_MODULES_BASES_.'test/');
	}
	if (!defined('_URL_MODULE_TEST_')) {
		define('_URL_MODULE_TEST_',_URL_MODULES_BASES_.'test/');
	}
	
	/** Chemin vers les includes de test */
	define('_INCLUDES_TEST_',_MODULE_TEST_.'includes/');
	define('_URL_INCLUDES_TEST_',_URL_MODULE_TEST_.'includes/');
	
	/** Chemin vers les css de test */
	define('_CSS_TEST_',_MODULE_TEST_.'css/');
	define('_URL_CSS_TEST_',_URL_MODULE_TEST_.'css/');
	
	/** Chemin vers les templates de test */
	define('_TEMPLATES_TEST_',_MODULE_TEST_.'templates/');
	define('_URL_TEMPLATES_TEST_',_URL_MODULE_TEST_.'templates/');
	
	/** Chemin vers le JavaScript du module de test */
	define('_URL_JAVASCRIPT_TEST_', _URL_MODULE_TEST_.'javascript/');
	
	/************************/
	/* Chargement de SMARTY */
	/************************/
	require_once _SMARTY_LOAD_;
	

	/*****************************************/
	/* Chargement variables SMARTY du module */
	/*****************************************/
	$smarty->assign('URL_MODULE_TEST',_URL_MODULE_TEST_);
	$smarty->assign('URL_IMGS_TEST','');
	$smarty->assign('URL_INCLUDES_TEST',_URL_INCLUDES_TEST_);
	$smarty->assign('URL_CSS_TEST',_URL_CSS_TEST_);
	$smarty->assign('URL_TEMPLATES_TEST',_URL_TEMPLATES_TEST_);
	$smarty->assign('URL_JAVASCRIPT_TEST',_URL_JAVASCRIPT_TEST_);
?>
