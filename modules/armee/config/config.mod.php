<?php
	/**
	 * Fichier de configuration du module 'ARMEE'
	 */
	
	/** Chemin vers le module 'ARMEE' */
	define('_MODULE_ARMEE_',_DIR_MODULES_BASES_.'armee/');
	/** URL vers le module 'ARMEE' */
	define('_URL_MODULE_ARMEE_',_URL_MODULES_BASES_.'armee/');
	
	/** Chemin vers les includes du module 'ARMEE' */
	define('_INCLUDES_ARMEE_',_MODULE_ARMEE_.'includes/');
	/** URL vers les includes du module 'ARMEE' */
	define('_URL_INCLUDES_ARMEE_',_URL_MODULE_ARMEE_.'includes/');
	
	/** Le repertoire des images du module 'ARMEE' */
	define('_DIR_IMGS_ARMEE_', _DIR_IMGS_.'armee/');
	/** l'URL des images du module 'ARMEE' */
	define('_URL_IMGS_ARMEE_', _URL_IMGS_.'armee/');
	
	/** Chemin vers les templates du module 'ARMEE' */
	define('_TEMPLATES_ARMEE_',_MODULE_ARMEE_.'templates/');
	/** URL vers les templates du module 'ARMEE' */
	define('_URL_TEMPLATES_ARMEE_',_URL_MODULE_ARMEE_.'templates/');
	
	/** URL vers le JavaScript du module 'ARMEE' */
	define('_URL_JAVASCRIPT_ARMEE_', _URL_MODULE_ARMEE_.'javascript/');
	
	/************************/
	/* Chargement de SMARTY */
	/************************/
	require_once _SMARTY_LOAD_;
	

	/*****************************************/
	/* Chargement variables SMARTY du module */
	/*****************************************/
	$smarty->assign('URL_MODULE_ARMEE',_URL_MODULE_ARMEE_);
	$smarty->assign('URL_IMGS_ARMEE',_URL_IMGS_ARMEE_);
	$smarty->assign('URL_INCLUDES_ARMEE',_URL_INCLUDES_ARMEE_);
	$smarty->assign('URL_TEMPLATES_ARMEE',_URL_TEMPLATES_ARMEE_);
	$smarty->assign('URL_JAVASCRIPT_ARMEE',_URL_JAVASCRIPT_ARMEE_);
?>
