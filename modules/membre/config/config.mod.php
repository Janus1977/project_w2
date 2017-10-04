<?php
	/**
	 * Fichier de configuration du module 'MEMBRE'
	 */
	
	/** Chemin vers le module 'MEMBRE' */
	define('_MODULE_MEMBRE_',_DIR_MODULES_BASES_.'membre/');
	/** URL vers le module 'MEMBRE' */
	define('_URL_MODULE_MEMBRE_',_URL_MODULES_BASES_.'membre/');
	
	/** Chemin vers les includes du module 'MEMBRE' */
	define('_INCLUDES_MEMBRE_',_MODULE_MEMBRE_.'includes/');
	/** URL vers les includes du module 'MEMBRE' */
	define('_URL_INCLUDES_MEMBRE_',_URL_MODULE_MEMBRE_.'includes/');
	
	/** Le repertoire des images du module 'MEMBRE' */
	define('_DIR_IMGS_MEMBRE_', _DIR_IMGS_.'membre/');
	/** l'URL des images du module 'MEMBRE' */
	define('_URL_IMGS_MEMBRE_', _URL_IMGS_.'membre/');
	
	/** Chemin vers les templates du module 'MEMBRE' */
	define('_TEMPLATES_MEMBRE_',_MODULE_MEMBRE_.'templates/');
	/** URL vers les templates du module 'MEMBRE' */
	define('_URL_TEMPLATES_MEMBRE_',_URL_MODULE_MEMBRE_.'templates/');
	
	/** URL vers le JavaScript du module 'MEMBRE' */
	define('_URL_JAVASCRIPT_MEMBRE_', _URL_MODULE_MEMBRE_.'javascript/');
	
	/************************/
	/* Chargement de SMARTY */
	/************************/
	require_once _SMARTY_LOAD_;
	

	/*****************************************/
	/* Chargement variables SMARTY du module */
	/*****************************************/
	$smarty->assign('URL_MODULE_MEMBRE',_URL_MODULE_MEMBRE_);
	$smarty->assign('URL_IMGS_MEMBRE',_URL_IMGS_MEMBRE_);
	$smarty->assign('URL_INCLUDES_MEMBRE',_URL_INCLUDES_MEMBRE_);
	$smarty->assign('URL_TEMPLATES_MEMBRE',_URL_TEMPLATES_MEMBRE_);
	$smarty->assign('URL_JAVASCRIPT_MEMBRE',_URL_JAVASCRIPT_MEMBRE_);
?>
