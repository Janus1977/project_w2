<?php
	/**
	 * Fichier de configuration du module "carte"
	 */
	/** Chemin vers le module de la carte */
	if (!defined('_MODULE_CARTE_')) {
		define('_MODULE_CARTE_',_DIR_MODULES_BASES_.'carte/');
	}
	define('_URL_MODULE_CARTE_',_URL_MODULES_BASES_.'carte/');
	
	/** Le repertoire des cartes du jeu */
	define('_DIR_IMGS_CARTE_',_DIR_IMGS_.'cartes/');
	/** l'URL des cartes du jeu */
	define('_URL_IMGS_CARTE_',_URL_IMGS_.'cartes/');
	
	/** Chemin vers les includes de la carte */
	define('_INCLUDES_CARTE_',_MODULE_CARTE_.'includes/');
	define('_URL_INCLUDES_CARTE_',_URL_MODULE_CARTE_.'includes/');
	
	/** repertoire des templates de la carte */
	define('_TEMPLATES_CARTE_',_MODULE_CARTE_.'templates/');
	/** url vers les templates de la carte */
	define('_URL_TEMPLATES_CARTE_',_URL_MODULE_CARTE_.'templates/');
	
	/** Chemin vers le JavaScript du module de la carte */
	define('_URL_JAVASCRIPT_CARTE_', _URL_MODULE_CARTE_.'javascript/');
	
	/************************/
	/* Chargement de SMARTY */
	/************************/
	require_once _SMARTY_LOAD_;
	

	/*****************************************/
	/* Chargement variables SMARTY du module */
	/*****************************************/
	$smarty->assign('URL_MODULE_CARTE',_URL_MODULE_CARTE_);
	$smarty->assign('URL_INCLUDES_CARTE',_URL_INCLUDES_CARTE_);
	$smarty->assign('URL_IMGS_CARTE',_URL_IMGS_CARTE_);
	$smarty->assign('URL_TEMPLATES_CARTE',_URL_TEMPLATES_CARTE_);
	$smarty->assign('URL_JAVASCRIPT_CARTE',_URL_JAVASCRIPT_CARTE_);
?>
