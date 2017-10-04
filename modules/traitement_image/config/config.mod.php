<?php
	/**
	 * Fichier de configuration du module "traitement_image"
	 */
	 
	/** Chemin vers le module de traitement d'image */
	define('_MODULE_TRAITEMENT_IMAGE_',_DIR_MODULES_BASES_.'traitement_image/');
	define('_URL_MODULE_TRAITEMENT_IMAGE_',_URL_MODULES_BASES_.'traitement_image/');
	
	/** Chemin vers les includes de traitement d'image */
	define('_INCLUDES_TRAITEMENT_IMAGE_',_MODULE_TRAITEMENT_IMAGE_.'includes/');
	define('_URL_INCLUDES_TRAITEMENT_IMAGE_',_URL_MODULE_TRAITEMENT_IMAGE_.'includes/');
	
	/** Chemin vers les templates de traitement d'image */
	define('_TEMPLATES_TRAITEMENT_IMAGE_',_MODULE_TRAITEMENT_IMAGE_.'templates/');
	define('_URL_TEMPLATES_TRAITEMENT_IMAGE_',_URL_MODULE_TRAITEMENT_IMAGE_.'templates/');
	
	/** Chemin vers image temporaire de traitement d'image */
	if (!defined('_IMGS_TEMP_')) {
		define('_IMGS_TEMP_', _MODULE_TRAITEMENT_IMAGE_.'images_temporaires/');
	}
	if (!defined('_URL_IMGS_TEMP_')) {
		define('_URL_IMGS_TEMP_', _URL_MODULE_TRAITEMENT_IMAGE_.'images_temporaires/');
	}	
	
	/** Chemin vers le JavaScript de traitement d'image */
	define('_URL_JAVASCRIPT_TRAITEMENT_IMAGE_', _URL_MODULE_TRAITEMENT_IMAGE_.'javascript/');
	/************************/
	/* Chargement de SMARTY */
	/************************/
	require_once _SMARTY_LOAD_;
	

	/*****************************************/
	/* Chargement variables SMARTY du module */
	/*****************************************/
	$smarty->assign('URL_MODULE_TRAITEMENT_IMAGE',_URL_MODULE_TRAITEMENT_IMAGE_);
	$smarty->assign('URL_INCLUDES_TRAITEMENT_IMAGE',_URL_INCLUDES_TRAITEMENT_IMAGE_);
	$smarty->assign('URL_IMGS_TRAITEMENT_IMAGE',_URL_IMGS_TEMP_);
	$smarty->assign('URL_TEMPLATES_TRAITEMENT_IMAGE',_URL_TEMPLATES_TRAITEMENT_IMAGE_);
	$smarty->assign('URL_JAVASCRIPT_TRAITEMENT_IMAGE',_URL_JAVASCRIPT_TRAITEMENT_IMAGE_);
?>
