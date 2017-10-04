<?php
	/**
	 * Fichier de configuration du module "equipements"
	 */
	
	/** Chemin vers le module des equipements */
	define('_MODULE_EQUIPEMENT_',_DIR_MODULES_BASES_.'equipement/');
	define('_URL_MODULE_EQUIPEMENT_',_URL_MODULES_BASES_.'equipement/');
	
	/** Chemin vers les includes du module des equipements */
	define('_INCLUDES_EQUIPEMENT_',_MODULE_EQUIPEMENT_.'includes/');
	define('_URL_INCLUDES_EQUIPEMENT_',_URL_MODULE_EQUIPEMENT_.'includes/');
	
	/** Le repertoire des images d'equipement */
	define('_DIR_IMGS_EQUIPEMENT_', _DIR_IMGS_.'equipement/');
	/** l'URL des images d'equipement du jeu */
	define('_URL_IMGS_EQUIPEMENT_', _URL_IMGS_.'equipement/');
	
	/** Chemin vers les templates du module des equipements */
	define('_TEMPLATES_EQUIPEMENT_',_MODULE_EQUIPEMENT_.'templates/');
	define('_URL_TEMPLATES_EQUIPEMENT_',_URL_MODULE_EQUIPEMENT_.'templates/');
	
	/** Chemin vers le JavaScript du module de la mini carte */
	define('_URL_JAVASCRIPT_EQUIPEMENT_', _URL_MODULE_EQUIPEMENT_.'javascript/');
	
	/************************/
	/* Chargement de SMARTY */
	/************************/
	require_once _SMARTY_LOAD_;
	

	/*****************************************/
	/* Chargement variables SMARTY du module */
	/*****************************************/
	$smarty->assign('URL_MODULE_EQUIPEMENT',_URL_MODULE_EQUIPEMENT_);
	$smarty->assign('URL_IMGS_EQUIPEMENT',_URL_IMGS_EQUIPEMENT_);
	$smarty->assign('URL_INCLUDES_EQUIPEMENT',_URL_INCLUDES_EQUIPEMENT_);
	$smarty->assign('URL_TEMPLATES_EQUIPEMENT',_URL_TEMPLATES_EQUIPEMENT_);
	$smarty->assign('URL_JAVASCRIPT_EQUIPEMENT',_URL_JAVASCRIPT_EQUIPEMENT_);
?>
