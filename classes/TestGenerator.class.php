<?php
/*
 * Ce generateur va creer les fichiers de test pour chaque classe associees a une table
 */

class TestGenerator extends Generator {
	
	/** L'extension des fichiers */
	private $_extension = ".test.php";
	
	public function __construct() {
		parent::__construct();
	}
	
	public function generate($tables,$listeChamps) {
 		if (!file_exists(_TEST_DIR_)) {
 			mkdir($this -> getDocRoot()."test/");
 		}
 		
 		foreach ($tables AS $table) {
 			// Init des attributs de travail
 			$this->setNomTableEnCoursDeTraitement($table);
 			$this->setListeChampsEnCoursDeTraitement($listeChamps[$table]);
 			
 			debug("Fichier test pour ".$this->getNomTableEnCoursDeTraitement());
 			$cheminFichier = _TEST_DIR_.ucfirst($this->getNomTableEnCoursDeTraitement()).$this->_extension;
 			$aMemo = array();
 			$memo = "";
 			$nomTag = 0;
 			
 			//liste des methodes MANAGER a tester
 			$sManagerName = 'Manager'.ucfirst($table);
 			foreach (get_class_methods($sManagerName) AS $classMethod) {
 				debug($classMethod);
 			}
 		}
		
	} // end of generate() Method
	
} // end of TestGenerator Class