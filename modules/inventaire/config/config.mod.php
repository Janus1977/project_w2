<?php
	/**
	 * Fichier de configuration du module 'INVENTAIRE'
	 */
	
	/** Chemin vers le module 'INVENTAIRE' */
	define('_MODULE_INVENTAIRE_',_DIR_MODULES_BASES_.'inventaire/');
	/** URL vers le module 'INVENTAIRE' */
	define('_URL_MODULE_INVENTAIRE_',_URL_MODULES_BASES_.'inventaire/');
	
	/** Chemin vers les includes du module 'INVENTAIRE' */
	define('_INCLUDES_INVENTAIRE_',_MODULE_INVENTAIRE_.'includes/');
	/** URL vers les includes du module 'INVENTAIRE' */
	define('_URL_INCLUDES_INVENTAIRE_',_URL_MODULE_INVENTAIRE_.'includes/');
	
	/** Le repertoire des images du module 'INVENTAIRE' */
	define('_DIR_IMGS_INVENTAIRE_', _DIR_IMGS_.'equipement/');
	/** l'URL des images du module 'INVENTAIRE' */
	define('_URL_IMGS_INVENTAIRE_', _URL_IMGS_.'equipement/');
	
	/** Chemin vers les templates du module 'INVENTAIRE' */
	define('_TEMPLATES_INVENTAIRE_',_MODULE_INVENTAIRE_.'templates/');
	/** URL vers les templates du module 'INVENTAIRE' */
	define('_URL_TEMPLATES_INVENTAIRE_',_URL_MODULE_INVENTAIRE_.'templates/');
	
	/** URL vers le JavaScript du module 'INVENTAIRE' */
	define('_URL_JAVASCRIPT_INVENTAIRE_', _URL_MODULE_INVENTAIRE_.'javascript/');
	
	/************************/
	/* Chargement de SMARTY */
	/************************/
	require_once _SMARTY_LOAD_;
	

	/*****************************************/
	/* Chargement variables SMARTY du module */
	/*****************************************/
	$smarty->assign('URL_MODULE_INVENTAIRE',_URL_MODULE_INVENTAIRE_);
	$smarty->assign('URL_IMGS_INVENTAIRE',_URL_IMGS_INVENTAIRE_);
	$smarty->assign('URL_INCLUDES_INVENTAIRE',_URL_INCLUDES_INVENTAIRE_);
	$smarty->assign('URL_TEMPLATES_INVENTAIRE',_URL_TEMPLATES_INVENTAIRE_);
	$smarty->assign('URL_JAVASCRIPT_INVENTAIRE',_URL_JAVASCRIPT_INVENTAIRE_);
?>
