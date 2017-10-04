<?php
	/**
	 * Fichier de configuration du module 'OUTILS'
	 */
	
	/** Chemin vers le module 'OUTILS' */
	define('_MODULE_OUTILS_',_DIR_MODULES_BASES_.'outils/');
	/** URL vers le module 'OUTILS' */
	define('_URL_MODULE_OUTILS_',_URL_MODULES_BASES_.'outils/');
	
	/** Chemin vers les includes du module 'OUTILS' */
	define('_INCLUDES_OUTILS_',_MODULE_OUTILS_.'includes/');
	/** URL vers les includes du module 'OUTILS' */
	define('_URL_INCLUDES_OUTILS_',_URL_MODULE_OUTILS_.'includes/');
	
	/** Le repertoire des images du module 'OUTILS' */
	define('_DIR_IMGS_OUTILS_', _DIR_IMGS_.'equipement/');
	/** l'URL des images du module 'OUTILS' */
	define('_URL_IMGS_OUTILS_', _URL_IMGS_.'equipement/');
	
	/** Chemin vers les templates du module 'OUTILS' */
	define('_TEMPLATES_OUTILS_',_MODULE_OUTILS_.'templates/');
	/** URL vers les templates du module 'OUTILS' */
	define('_URL_TEMPLATES_OUTILS_',_URL_MODULE_OUTILS_.'templates/');
	
	/** URL vers le JavaScript du module 'OUTILS' */
	define('_URL_JAVASCRIPT_OUTILS_', _URL_MODULE_OUTILS_.'javascript/');
	
	/************************/
	/* Chargement de SMARTY */
	/************************/
	require_once _SMARTY_LOAD_;
	

	/*****************************************/
	/* Chargement variables SMARTY du module */
	/*****************************************/
	$smarty->assign('URL_MODULE_OUTILS',_URL_MODULE_OUTILS_);
	$smarty->assign('URL_IMGS_OUTILS',_URL_IMGS_OUTILS_);
	$smarty->assign('URL_INCLUDES_OUTILS',_URL_INCLUDES_OUTILS_);
	$smarty->assign('URL_TEMPLATES_OUTILS',_URL_TEMPLATES_OUTILS_);
	$smarty->assign('URL_JAVASCRIPT_OUTILS',_URL_JAVASCRIPT_OUTILS_);
?>
