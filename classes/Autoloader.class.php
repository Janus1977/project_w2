<?php 
	class Autoloader {
	    /**
	    * Cette variable va nous servir pour le singleton
	    */
	    private static $_instance;
	 
	    public static function getInstance() {
	        if (self::$_instance == NULL) {
	            self::$_instance = new self();
	        }
	 
	        return self::$_instance;
	    }
	         
	    /*
	     * Constructeur privé permettant l'appel de l'autoload 
	     * pour les répertoires des librairies, des objets de définition, 
	     * des données et métiers de l'application. 
	     */
	    private function __construct() {
	        // Définition des répertoires sources applicatifs, rép. courant
	        $repertoire = realpath(dirname(__FILE__));
	        // Définition des répertoires sources applicatifs, pages dans le private_html du site
	        $repertoirePrivateLib = realpath(dirname(__FILE__).'../class');
	        // Définition des répertoires sources applicatifs, pages 'racines' du site
	        $repertoireLib = realpath(dirname(__FILE__).'../../private_html/class');
	        // Définition des répertoires sources applicatifs, pages appelées via ajax
	        $repertoireAjaxLib = realpath(dirname(__FILE__).'../../../private_html/class');
	        // Ajout de ces répertoires à l'include path
	        set_include_path(get_include_path().PATH_SEPARATOR.$repertoire.PATH_SEPARATOR.$repertoirePrivateLib.PATH_SEPARATOR.$repertoireLib.PATH_SEPARATOR.$repertoireAjaxLib);
	        // Appel de la fonction d'autoload
	        spl_autoload_register(array($this,'autoload'));
	    }
	     
	    /*
	     *  Fonction d'autoload d'une classe.
	     *  Attention : le nom du fichier contenant la classe doit être du type nom.class.php en minuscule !
	     */
	    public function autoload($className) {
	        spl_autoload($className, '.class.php');
	    }
	}
?>