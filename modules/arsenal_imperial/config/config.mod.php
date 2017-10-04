<?php
	/**
	 * Fichier de configuration du module 'ARSENAL_IMPERIAL'
	 */
	
	/** Chemin vers le module 'ARSENAL_IMPERIAL' */
	define('_MODULE_ARSENAL_IMPERIAL_',_DIR_MODULES_BASES_.'arsenal_imperial/');
	/** URL vers le module 'ARSENAL_IMPERIAL' */
	define('_URL_MODULE_ARSENAL_IMPERIAL_',_URL_MODULES_BASES_.'arsenal_imperial/');
	
	/** Chemin vers les includes du module 'ARSENAL_IMPERIAL' */
	define('_INCLUDES_ARSENAL_IMPERIAL_',_MODULE_ARSENAL_IMPERIAL_.'includes/');
	/** URL vers les includes du module 'ARSENAL_IMPERIAL' */
	define('_URL_INCLUDES_ARSENAL_IMPERIAL_',_URL_MODULE_ARSENAL_IMPERIAL_.'includes/');
	
	/** Le repertoire des images du module 'ARSENAL_IMPERIAL' */
	define('_DIR_IMGS_ARSENAL_IMPERIAL_', _DIR_IMGS_.'equipement/');
	/** l'URL des images du module 'ARSENAL_IMPERIAL' */
	define('_URL_IMGS_ARSENAL_IMPERIAL_', _URL_IMGS_.'equipement/');
	
	/** Chemin vers les templates du module 'ARSENAL_IMPERIAL' */
	define('_TEMPLATES_ARSENAL_IMPERIAL_',_MODULE_ARSENAL_IMPERIAL_.'templates/');
	/** URL vers les templates du module 'ARSENAL_IMPERIAL' */
	define('_URL_TEMPLATES_ARSENAL_IMPERIAL_',_URL_MODULE_ARSENAL_IMPERIAL_.'templates/');
	
	/** URL vers le JavaScript du module 'ARSENAL_IMPERIAL' */
	define('_URL_JAVASCRIPT_ARSENAL_IMPERIAL_', _URL_MODULE_ARSENAL_IMPERIAL_.'javascript/');
	
	/************************/
	/* Chargement de SMARTY */
	/************************/
	require_once _SMARTY_LOAD_;
	

	/*****************************************/
	/* Chargement variables SMARTY du module */
	/*****************************************/
	$smarty->assign('URL_MODULE_ARSENAL_IMPERIAL',_URL_MODULE_ARSENAL_IMPERIAL_);
	$smarty->assign('URL_IMGS_ARSENAL_IMPERIAL',_URL_IMGS_ARSENAL_IMPERIAL_);
	$smarty->assign('URL_INCLUDES_ARSENAL_IMPERIAL',_URL_INCLUDES_ARSENAL_IMPERIAL_);
	$smarty->assign('URL_TEMPLATES_ARSENAL_IMPERIAL',_URL_TEMPLATES_ARSENAL_IMPERIAL_);
	$smarty->assign('URL_JAVASCRIPT_ARSENAL_IMPERIAL',_URL_JAVASCRIPT_ARSENAL_IMPERIAL_);
?>
