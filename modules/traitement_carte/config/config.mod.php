<?php
	/**
	 * Fichier de configuration du module "carte"
	 */

	
	/** Chemin vers le module de traitement de la carte */
	define('_MODULE_TRAITEMENT_CARTE_',_DIR_MODULES_BASES_.'traitement_carte/');
	define('_URL_MODULE_TRAITEMENT_CARTE_',_URL_MODULES_BASES_.'traitement_carte/');
	
	/** Chemin vers les includes du module de traitement de la carte */
	define('_INCLUDES_TRAITEMENT_CARTE_',_MODULE_TRAITEMENT_CARTE_.'includes/');
	define('_URL_INCLUDES_TRAITEMENT_CARTE_',_URL_MODULE_TRAITEMENT_CARTE_.'includes/');
	
	/** Chemin vers les templates du module de traitement de la carte */
	define('_TEMPLATES_TRAITEMENT_CARTE_',_MODULE_TRAITEMENT_CARTE_.'templates/');
	/** URL vers les templates du module de traitement de la carte */
	define('_URL_TEMPLATES_TRAITEMENT_CARTE_',_URL_MODULE_TRAITEMENT_CARTE_.'templates/');
	
	/** Chemin vers le JavaScript du module de traitement de la carte */
	define('_URL_JAVASCRIPT_TRAITEMENT_CARTE_', _URL_MODULE_TRAITEMENT_CARTE_.'javascript/');
	
	/** Attention ce module est lie au module carte, donc il faut aller chercher le config de la carte */
	if (!defined('_MODULE_CARTE_')) {
		define('_MODULE_CARTE_',_DIR_MODULES_BASES_.'carte/');
	}
	if (file_exists(_MODULE_CARTE_.'config/config.mod.php')) {
		require_once _MODULE_CARTE_.'config/config.mod.php';
	} else {
		echo '<br/><b>Configuration module <i>traitement_carte</i></b>:&nbsp;';
	    echo 'Impossible de trouver les fichiers de configuration du module de la carte, activez ce module';
	}
	
	
	/** Attention ce module est lie au module mini carte, donc il faut aller chercher le config de la mini carte */
	if (!defined('_MODULE_MINI_CARTE_')) {
		if (file_exists(_DIR_MODULES_BASES_.'mini_carte/config/config.mod.php')) {
			require_once _DIR_MODULES_BASES_.'mini_carte/config/config.mod.php';
		} else {
			echo '<br/><b>Configuration module <i>traitement_carte</i></b>:&nbsp;';
			echo 'Impossible de trouver les fichiers de configuration du module de la mini carte, activez ce module';
		}
	}
	

	
	/************************/
	/* Chargement de SMARTY */
	/************************/
	require_once _SMARTY_LOAD_;
	

	/*****************************************/
	/* Chargement variables SMARTY du module */
	/*****************************************/
	$smarty->assign('URL_MODULE_TRAITEMENT_CARTE',_URL_MODULE_TRAITEMENT_CARTE_);
	$smarty->assign('URL_IMGS_TRAITEMENT_CARTE',_URL_IMGS_CARTE_);
	$smarty->assign('URL_INCLUDES_TRAITEMENT_CARTE',_URL_INCLUDES_TRAITEMENT_CARTE_);
	$smarty->assign('URL_TEMPLATES_TRAITEMENT_CARTE',_URL_TEMPLATES_TRAITEMENT_CARTE_);
	$smarty->assign('URL_JAVASCRIPT_TRAITEMENT_CARTE',_URL_JAVASCRIPT_TRAITEMENT_CARTE_);
?>
