<?php
	/**
	 * Fichier de configuration du module "unite"
	 */
	
// 	require_once '../config/config.php';
	
	/** Chemin vers le module des unites */
	define('_MODULE_UNITE_',_DIR_MODULES_BASES_.'unite/');
	define('_URL_MODULE_UNITE_',_URL_MODULES_BASES_.'unite/');
	
	/** Chemin vers les includes du module des unites */
	define('_INCLUDES_UNITE_',_MODULE_UNITE_.'includes/');
	define('_URL_INCLUDES_UNITE_',_URL_MODULE_UNITE_.'includes/');
	
	debug(_INCLUDES_UNITE_);
	/** Le repertoire des images des unites */
	define('_DIR_IMGS_UNITE_', _DIR_IMGS_.'unites/');
	/** l'URL des images d'equipement du jeu */
	define('_URL_IMGS_UNITE_', _URL_IMGS_.'unites/');
	
	/** Chemin vers les templates du module des unites */
	define('_TEMPLATES_UNITE_',_MODULE_UNITE_.'templates/');
	define('_URL_TEMPLATES_UNITE_',_URL_MODULE_UNITE_.'templates/');
	
	/** Chemin vers le JavaScript du module des unites */
	define('_URL_JAVASCRIPT_UNITE_', _URL_MODULE_UNITE_.'javascript/');
	
	/************************/
	/* Chargement de SMARTY */
	/************************/
	require_once _SMARTY_LOAD_;
	

	/*****************************************/
	/* Chargement variables SMARTY du module */
	/*****************************************/
	$smarty->assign('URL_MODULE_UNITE',_URL_MODULE_UNITE_);
	$smarty->assign('URL_IMGS_UNITE',_URL_IMGS_UNITE_);
	$smarty->assign('URL_INCLUDES_UNITE',_URL_INCLUDES_UNITE_);
	$smarty->assign('URL_TEMPLATES_UNITE',_URL_TEMPLATES_UNITE_);
	$smarty->assign('URL_JAVASCRIPT_UNITE',_URL_JAVASCRIPT_UNITE_);
?>