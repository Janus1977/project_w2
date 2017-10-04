<?php
	/**
	 * Fichier de configuration du module 'DECOR'
	 */
	
	/** Chemin vers le module 'DECOR' */
	define('_MODULE_DECOR_',_DIR_MODULES_BASES_.'decor/');
	/** URL vers le module 'DECOR' */
	define('_URL_MODULE_DECOR_',_URL_MODULES_BASES_.'decor/');
	
	/** Chemin vers les includes du module 'DECOR' */
	define('_INCLUDES_DECOR_',_MODULE_DECOR_.'includes/');
	/** URL vers les includes du module 'DECOR' */
	define('_URL_INCLUDES_DECOR_',_URL_MODULE_DECOR_.'includes/');
	
	/** Le repertoire des images du module 'DECOR' */
	define('_DIR_IMGS_DECOR_', _DIR_IMGS_.'decor/');
	/** l'URL des images du module 'DECOR' */
	define('_URL_IMGS_DECOR_', _URL_IMGS_.'decor/');
	
	/** Chemin vers les templates du module 'DECOR' */
	define('_TEMPLATES_DECOR_',_MODULE_DECOR_.'templates/decor.tpl');
	/** URL vers les templates du module 'DECOR' */
	define('_URL_TEMPLATES_DECOR_',_URL_MODULE_DECOR_.'templates/decor.tpl');
	
	/** URL vers le JavaScript du module 'DECOR' */
	define('_URL_JAVASCRIPT_DECOR_', _URL_MODULE_DECOR_.'javascript/');
	
	/************************/
	/* Chargement de SMARTY */
	/************************/
	require_once _SMARTY_LOAD_;
	

	/*****************************************/
	/* Chargement variables SMARTY du module */
	/*****************************************/
	$smarty->assign('URL_MODULE_DECOR',_URL_MODULE_DECOR_);
	$smarty->assign('URL_IMGS_DECOR',_URL_IMGS_DECOR_);
	$smarty->assign('URL_INCLUDES_DECOR',_URL_INCLUDES_DECOR_);
	$smarty->assign('URL_TEMPLATES_DECOR',_URL_TEMPLATES_DECOR_);
	$smarty->assign('URL_JAVASCRIPT_DECOR',_URL_JAVASCRIPT_DECOR_);
?>
