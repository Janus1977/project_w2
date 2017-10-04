<?php
	//DEBUT MODE STANDALONE - DEV
	if (!defined('_DIR_BASE_')) {
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
			$docRoot = $_SERVER['DOCUMENT_ROOT'];
		} else {
			$docRoot = $_SERVER['DOCUMENT_ROOT'].'/';
		}
		define('_DIR_BASE_',$docRoot.'project_w2/');
		define('_URL_BASE_', 'http://localhost/project_w2/');

		/** le repertoire 'include' basique */
     	define('_DIR_INCLUDES_BASE_',_DIR_BASE_. 'includes/');
	}
	
	if (!defined('_SMARTY_BASE_')) {
		/** Les parametres Smarty */
		define('_SMARTY_BASE_',_DIR_BASE_.'lib/smarty/');
		define('_SMARTY_CLASS_',_SMARTY_BASE_.'Smarty.class.php');
		define('_SMARTY_TEMPLATES_',_DIR_BASE_.'templates');
		define('_SMARTY_COMPILE_', _DIR_BASE_.'templates_c');
		define('_SMARTY_CACHE_', _DIR_BASE_.'cache');
		define('_SMARTY_LOAD_',_DIR_INCLUDES_BASE_.'smarty.inc.php');
	}
	
	if (!defined('_DIR_IMGS_')) {
		/** le repertoire des images */
		define('_DIR_IMGS_', _DIR_BASE_.'images/');
		/** l'URL des images */
		define('_URL_IMGS_', _URL_BASE_.'images/');
	}
	
	if (!defined('_MODULES_BASES_')) {
		/** Le repertoire des differents modules */
		define('_MODULES_BASES_', _DIR_BASE_.'modules/');
		/** l'URL des differents modules du jeu */
		define('_URL_MODULES_BASES_', _URL_BASE_.'modules/');
	}
	//FIN MODE STANDALONE - DEV
?>