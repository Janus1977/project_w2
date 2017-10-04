<?php
	/**
	 * Fichier de configuration du module "inscription"
	 */
	/** Chemin vers le module des equipements */
	define('_MODULE_INSCRIPTION_',_DIR_MODULES_BASES_.'inscription/');
	define('_URL_MODULE_INSCRIPTION_',_URL_MODULES_BASES_.'inscription/');
	
	/** Chemin vers les includes du module des equipements */
	define('_INCLUDES_INSCRIPTION_',_MODULE_INSCRIPTION_.'includes/');
	define('_URL_INCLUDES_INSCRIPTION_',_URL_MODULE_INSCRIPTION_.'includes/');
	
	/** Chemin vers les includes du module des equipements */
	define('_IMGS_INSCRIPTION_',_DIR_IMGS_);
	define('_URL_IMGS_INSCRIPTION_',_URL_IMGS_);
	
	/** Chemin vers les templates du module des equipements */
	define('_TEMPLATES_INSCRIPTION_',_MODULE_INSCRIPTION_.'templates/');
	define('_URL_TEMPLATES_INSCRIPTION_',_URL_MODULE_INSCRIPTION_.'templates/');
	
	/** Chemin vers le JavaScript du module de la mini carte */
	define('_URL_JAVASCRIPT_INSCRIPTION_', _URL_MODULE_INSCRIPTION_.'javascript/');
	
	/************************/
	/* Chargement de SMARTY */
	/************************/
	require_once _SMARTY_LOAD_;
	

	/*****************************************/
	/* Chargement variables SMARTY du module */
	/*****************************************/
	$smarty->assign('URL_MODULE_INSCRIPTION',_URL_MODULE_INSCRIPTION_);
	$smarty->assign('URL_INCLUDES_INSCRIPTION',_URL_INCLUDES_INSCRIPTION_);
	$smarty->assign('URL_IMGS_INSCRIPTION',_URL_IMGS_INSCRIPTION_);
	$smarty->assign('URL_TEMPLATES_INSCRIPTION',_URL_TEMPLATES_INSCRIPTION_);
	$smarty->assign('URL_JAVASCRIPT_INSCRIPTION',_URL_JAVASCRIPT_INSCRIPTION_);
?>
