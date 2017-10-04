<?php
	/**
	 * Fichier de configuration du module "carte"
	 */

	/** Chemin vers le module de la mini carte */
	if (!defined('_MODULE_MINI_CARTE_')) {
		define('_MODULE_MINI_CARTE_',_MODULES_BASES_.'mini_carte/');
		define('_URL_MODULE_MINI_CARTE_',_URL_MODULES_BASES_.'mini_carte/');

// 		if (!defined('_DIR_IMGS_MINI_CARTES_')) {
			/** Le repertoire des mini cartes du jeu */
			define('_DIR_IMGS_MINI_CARTES_',_DIR_IMGS_.'mini_cartes/');
			/** l'URL des mini cartes du jeu */
			define('_URL_IMGS_MINI_CARTES_',_URL_IMGS_.'mini_cartes/');
// 		}
		
// 		if (!defined('_INCLUDES_MINI_CARTE_')) {
			/** Chemin vers les includes du module de la mini carte */
			define('_INCLUDES_MINI_CARTE_',_MODULE_MINI_CARTE_.'includes/');
			define('_URL_INCLUDES_MINI_CARTE_',_URL_MODULE_MINI_CARTE_.'includes/');
// 		}
		
// 		if (!defined('_TEMPLATES_MINI_CARTE_')) {
			/** Chemin vers les templates du module de la mini carte */
			define('_TEMPLATES_MINI_CARTE_',_MODULE_MINI_CARTE_.'templates/');
			define('_URL_TEMPLATES_MINI_CARTE_',_URL_MODULE_MINI_CARTE_.'templates/');
// 		}
		
// 		if (!defined('_URL_JAVASCRIPT_MINI_CARTE_')) {
			/** Chemin vers le JavaScript du module de la mini carte */
			define('_URL_JAVASCRIPT_MINI_CARTE_', _URL_MODULE_MINI_CARTE_.'javascript/');
// 		}

		/************************/
		/* Chargement de SMARTY */
		/************************/
		require_once _SMARTY_LOAD_;
		
		
		/*****************************************/
		/* Chargement variables SMARTY du module */
		/*****************************************/
		$smarty->assign('URL_MODULE_MINI_CARTE',_URL_MODULE_MINI_CARTE_);
		$smarty->assign('URL_IMGS_MINI_CARTE',_URL_IMGS_MINI_CARTES_);
		$smarty->assign('URL_INCLUDES_MINI_CARTE',_URL_INCLUDES_MINI_CARTE_);
		$smarty->assign('URL_TEMPLATES_MINI_CARTE',_URL_TEMPLATES_MINI_CARTE_);
		$smarty->assign('URL_JAVASCRIPT_MINI_CARTE',_URL_JAVASCRIPT_MINI_CARTE_);
	}
?>
