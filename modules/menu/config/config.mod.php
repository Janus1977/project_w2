<?php
	/**
	 * Fichier de configuration du module 'MENU'
	 */
	
	/** Chemin vers le module 'MENU' */
	define('_MODULE_MENU_',_DIR_MODULES_BASES_.'menu/');
	/** URL vers le module 'MENU' */
	define('_URL_MODULE_MENU_',_URL_MODULES_BASES_.'menu/');
	
	/** Chemin vers les includes du module 'MENU' */
	define('_INCLUDES_MENU_',_MODULE_MENU_.'includes/');
	/** URL vers les includes du module 'MENU' */
	define('_URL_INCLUDES_MENU_',_URL_MODULE_MENU_.'includes/');
	
	/** Le repertoire des images du module 'MENU' */
	define('_DIR_IMGS_MENU_', _DIR_IMGS_.'equipement/');
	/** l'URL des images du module 'MENU' */
	define('_URL_IMGS_MENU_', _URL_IMGS_.'equipement/');
	
	/** Chemin vers les templates du module 'MENU' */
	define('_TEMPLATES_MENU_',_MODULE_MENU_.'templates/');
	/** URL vers les templates du module 'MENU' */
	define('_URL_TEMPLATES_MENU_',_URL_MODULE_MENU_.'templates/');
	
	/** URL vers le JavaScript du module 'MENU' */
	define('_URL_JAVASCRIPT_MENU_', _URL_MODULE_MENU_.'javascript/');
	
	/************************/
	/* Chargement de SMARTY */
	/************************/
	require_once _SMARTY_LOAD_;
	

	/*****************************************/
	/* Chargement variables SMARTY du module */
	/*****************************************/
	$smarty->assign('URL_MODULE_MENU',_URL_MODULE_MENU_);
	$smarty->assign('URL_IMGS_MENU',_URL_IMGS_MENU_);
	$smarty->assign('URL_INCLUDES_MENU',_URL_INCLUDES_MENU_);
	$smarty->assign('URL_TEMPLATES_MENU',_URL_TEMPLATES_MENU_);
	$smarty->assign('URL_JAVASCRIPT_MENU',_URL_JAVASCRIPT_MENU_);
?>
