<?php
	/**
	 * Fichier de configuration du module "admin"
	 */
	
	/** Chemin vers le module d'admin */
	if (!defined('_MODULE_ADMIN_')) {
		define('_MODULE_ADMIN_',_DIR_MODULES_BASES_.'admin/');
	}
	define('_URL_MODULE_ADMIN_',_URL_MODULES_BASES_.'admin/');
	
	/** Chemin vers les includes d'admin */
	define('_INCLUDES_ADMIN_',_MODULE_ADMIN_.'includes/');
	define('_URL_INCLUDES_ADMIN_',_URL_MODULE_ADMIN_.'includes/');
	
	/** Chemin vers les css d'admin */
	define('_CSS_ADMIN_',_MODULE_ADMIN_.'css/');
	define('_URL_CSS_ADMIN_',_URL_MODULE_ADMIN_.'css/');
	
	/** Chemin vers les templates d'admin */
	define('_TEMPLATES_ADMIN_',_MODULE_ADMIN_.'templates/');
	define('_URL_TEMPLATES_ADMIN_',_URL_MODULE_ADMIN_.'templates/');
	
	/** Chemin vers le JavaScript du module d'admin */
	define('_URL_JAVASCRIPT_ADMIN_', _URL_MODULE_ADMIN_.'javascript/');
	
	/************************/
	/* Chargement de SMARTY */
	/************************/
	require_once _SMARTY_LOAD_;
	

	/*****************************************/
	/* Chargement variables SMARTY du module */
	/*****************************************/
	$smarty->assign('URL_MODULE_ADMIN',_URL_MODULE_ADMIN_);
	$smarty->assign('URL_IMGS_ADMIN','');
	$smarty->assign('URL_INCLUDES_ADMIN',_URL_INCLUDES_ADMIN_);
	$smarty->assign('URL_CSS_ADMIN',_URL_CSS_ADMIN_);
	$smarty->assign('URL_TEMPLATES_ADMIN',_URL_TEMPLATES_ADMIN_);
	$smarty->assign('URL_JAVASCRIPT_ADMIN',_URL_JAVASCRIPT_ADMIN_);
?>
