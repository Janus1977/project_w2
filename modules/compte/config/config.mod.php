<?php
	/**
	 * Fichier de configuration du module "compte"
	 */
	
	//Pour etre independant, un module doit pouvoir creer son propre chemin de base
	//dans ce cas, nous somems forcement en local
	if (!defined('_DIR_BASE_')) {
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
			$docRoot = $_SERVER['DOCUMENT_ROOT'];
		} else {
			$docRoot = $_SERVER['DOCUMENT_ROOT'].'/';
		}
		define('_DIR_BASE_',$docRoot);
		define('_URL_BASE_', 'http://localhost/');
	}

	if (!defined('_DIR_MODULES_BASES_')) {
		define('_DIR_MODULES_BASES_',_DIR_BASE_.'modules/');
		define('_URL_MODULES_BASES_', _URL_BASE_.'modules/');
	}

	if (!defined('_DIR_IMGS_')) {
		define('_DIR_IMGS_',_DIR_BASE_.'images/');
		define('_URL_IMGS_', _URL_BASE_.'images/');
	}

	/** repertoire du module des compte */
	define('_MODULE_COMPTE_',_DIR_MODULES_BASES_.'compte/');
	/** url vers le module des compte */
	define('_URL_MODULE_COMPTE_',_URL_MODULES_BASES_.'compte/');
	
	/** repertoire des avatars des comptes */
	define('_DIR_IMGS_COMPTE_',_DIR_IMGS_.'comptes/');
	/** url vers les avatars des comptes */
	define('_URL_IMGS_COMPTE_',_URL_IMGS_.'comptes/');
	
	/** repertoire des includes du module des compte */
	define('_INCLUDES_COMPTE_',_MODULE_COMPTE_.'includes/');
	/** url vers les includes du module des compte */
	define('_URL_INCLUDES_COMPTE_',_URL_MODULE_COMPTE_.'includes/');
	
	/** repertoire des templates du module des compte */
	define('_TEMPLATES_COMPTE_',_MODULE_COMPTE_.'templates/');
	/** url vers les templates du module des compte */
	define('_URL_TEMPLATES_COMPTE_',_URL_MODULE_COMPTE_.'templates/');

	/** url vers le JavaScript du module de la mini carte */
	define('_URL_JAVASCRIPT_COMPTE_', _URL_MODULE_COMPTE_.'javascript/');

	/************************/
	/* Chargement de SMARTY */
	/************************/
	require_once _SMARTY_LOAD_;
	

	/*****************************************/
	/* Chargement variables SMARTY du module */
	/*****************************************/
	$smarty->assign('URL_MODULE_COMPTE',_URL_MODULE_COMPTE_);
	$smarty->assign('URL_IMGS_COMPTE',_URL_IMGS_COMPTE_);
	$smarty->assign('URL_INCLUDES_COMPTE',_URL_INCLUDES_COMPTE_);
	$smarty->assign('URL_TEMPLATES_COMPTE',_URL_TEMPLATES_COMPTE_);
	$smarty->assign('URL_JAVASCRIPT_COMPTE',_URL_JAVASCRIPT_COMPTE_);
?>
