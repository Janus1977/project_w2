<?php
    /**
     * Fichier de paramatrage des chemins de l'application
     */
     
     /* Serveur dev local */
	define('_DIR_BASE_',$_SERVER['DOCUMENT_ROOT']. 'project_w/');
	define('_URL_BASE_', 'http://localhost/project_w/');
	
	/* Le charset */
	define('_CHARSET_', 'ISO-8859-15');
	
	
	define('_SMARTY_TEMPLATES_',_DIR_BASE_.'templates');
	define('_SMARTY_COMPILE_', _DIR_BASE_.'templates_c');
	define('_SMARTY_CACHE_', _DIR_BASE_.'cache');
	
	define('TEMPLATE', 'template/');
	define('IMG_EQU', 'images/equipements/');
	
	/* le repertoire des images */
	define('_IMGS_', 'images/');
	
	/* Le repertoire des images issues du jeu plateau */
	define('_IMGS_JEU_PLATEAU_', _DIR_BASE_.'images/plateau/');
?>
