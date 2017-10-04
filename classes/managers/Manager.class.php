<?php
class Manager {
	/** Instance de la classe (managerAaa) */
	private static $_instance = null;
	
	/** Connexion a la base de donnees (database) */
	private static $_oConnexion = null;
	
	/** Liste des objet de la classe (Aaa) */
	private static $_aListeAaa = array();
	
	protected function __construct() {
	}
	
	public function __destruct() {
	}
	
	public static function getInstance() {
		if (is_null(self::$_instance)) {
			self::$_instance = new self;
		}
		return self::$_instance;
	}
	
	public function __clone() {
		throw new Exception(get_class($this).": Le clonage n'est pas autoris&eacute;", E_USER_ERROR);
	}
	
	public function setConnexion() {
		self::$_oConnexion = database::getInstance();
	}

	public function __set($name,$value) {
		throw new Exception(get_class($this).": Le set 'noname' n'est pas autoris&eacute;", E_USER_ERROR);
	}

	public function __get($name) {
		throw new Exception(get_class($this).": Le get 'noname' n'est pas autoris&eacute;", E_USER_ERROR);
	}
	
}