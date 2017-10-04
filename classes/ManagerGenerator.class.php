<?php

/**
 * generateur des classe Manager
 * /!\/!\/!\
 * ATTENTION un Manager est TOUJOURS un SINGLETON
 * /!\/!\/!\
 * 	Le manager est le responsable de:
 * 		- l'insertion dans la base de donnees,
 * 		- la suppression de donnees de la base
 */
class ManagerGenerator extends Generator {

 	public function __construct() {
 		parent::__construct();
 	}
 	
 	protected function generateAttributes() {
 		$chaine = "\t/** Instance de la classe (manager".ucFirst($this->getNomTableEnCoursDeTraitement()).") */\n";
        $chaine .= "\tprivate static \$_instance = null;\n\n";
		$chaine .= "\t/** Connexion a la base de donnees (database) */\n";
        $chaine .= "\tprivate static \$_oConnexion = null;\n\n";
		$chaine .= "\t/** Liste des objet de la classe (".ucFirst($this->getNomTableEnCoursDeTraitement()).") */\n";
        $chaine .= "\tprivate static \$_aListe".ucFirst($this->getNomTableEnCoursDeTraitement())." = array();\n";
        
        $chaine .= $this->addSpecificCodeTagFunction(ucfirst($this->getNomTableEnCoursDeTraitement()).'1');
        $this->initTagNumberFunction();
        
        return $chaine;
 	}
 	protected function generateGetInstance() {
        $chaine = "\tpublic static function getInstance() {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
        $chaine .= "\t\tif (is_null(self::\$_instance)) {\n";
        $chaine .= "\t\t\tself::\$_instance = new self;\n";
        $chaine .= "\t\t}\n";
        $chaine .= "\t\treturn self::\$_instance;\n";
        $chaine .= "\t}\n";
        return $chaine;
 	}
 	
 	protected function generateConstruct() {
 		$chaine = "\tprotected function __construct() {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
 		$chaine .= "\t}\n";
 		return $chaine;
 	}
 	
 	protected function generateDestruct() {
 		$chaine = "\tpublic function __destruct() {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
 		$chaine .= "\t\t// TODO ??\n";
 		$chaine .= "\t}\n";
 		return $chaine;
 	}
 	
 	protected function generateClone() {
 		$chaine = "\tpublic function __clone() {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
 		$chaine .= "\t\tthrow new Exception(get_class(\$this).\": Le clonage n'est pas autoris&eacute;\", E_USER_ERROR);\n";
 		$chaine .= "\t}\n";
 		return $chaine;
 	}
 	
 	protected function generateSetConnexion() {
        $chaine = "\tpublic function setConnexion() {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
        $chaine .= "\t\tself::\$_oConnexion = database::getInstance();// pas besoin de parametrer, un manager arrive apres la conf\n";
        $chaine .= "\t}\n";
 		return $chaine;
 	}
 	
 	protected function generateGet() {
 		$chaine = "\tpublic function __get(\$name) {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
 		$chaine .= "\t\tthrow new Exception(get_class(\$this).\": Le get 'noname' n'est pas autoris&eacute;\", E_USER_ERROR);\n";
 		$chaine .= "\t}\n";
 		return $chaine;
 	}
 	
 	protected function generateSet() {
 		$chaine = "\tpublic function __set(\$name,\$id) {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
 		$chaine .= "\t\tthrow new Exception(get_class(\$this).\": Le set 'noname' n'est pas autoris&eacute;\", E_USER_ERROR);\n";
 		$chaine .= "\t}\n";
 		return $chaine;
 	}
 	
 	protected function generateGetById() {
 		$chaine = "\tpublic function getById(\$id=-1) {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
		
		//20170405, CBA: memoire objet pour soulaver la base
		$chaine .= "\t\tif (\$id == -1) {\n";
		$chaine .= "\t\t\t//Toute les informations\n";
		$chaine .= "\t\t\treturn Factory".ucfirst($this->getNomTableEnCoursDeTraitement())."::getFromTable".ucfirst($this->getNomTableEnCoursDeTraitement())."(\$id);\n";
		$chaine .= "\t\t} else {\n";
		$chaine .= "\t\t\t//Verification si l'objet n'est pas en memoire\n";
		$chaine .= "\t\t\tif (\$id > 0 && !array_key_exists(\$id,self::\$_aListe".ucfirst($this->getNomTableEnCoursDeTraitement()).")) {\n";
		$chaine .= "\t\t\t\tself::\$_aListe".ucfirst($this->getNomTableEnCoursDeTraitement())."[\$id] = Factory".ucfirst($this->getNomTableEnCoursDeTraitement())."::getFromTable".ucfirst($this->getNomTableEnCoursDeTraitement())."(\$id);\n";
		$chaine .= "\t\t\t}\n";
		$chaine .= "\t\t}\n";
		$chaine .= "\t\treturn self::\$_aListe".ucfirst($this->getNomTableEnCoursDeTraitement())."[\$id];\n";
		
// 		$chaine .= "//Verification si l'objet n'est pas en memoire\n";
// 		$chaine .= "\t\tif (array_key_exists(\$id,self::\$_aListe".ucFirst($this->getNomTableEnCoursDeTraitement()).")) {\n";
// 		$chaine .= "\t\t\treturn self::\$_aListe".ucFirst($this->getNomTableEnCoursDeTraitement())."[\$id];\n";
// 		$chaine .= "\t\t} else {\n";
// 		$chaine .= "\t\t\treturn Factory".ucfirst($this->getNomTableEnCoursDeTraitement())."::getFromTable".ucfirst($this->getNomTableEnCoursDeTraitement())."(\$id);\n";
// 		$chaine .= "\t\t}\n";

 		$chaine .= "\t}\n";
 		return $chaine;
 	}
 	
 	
 	protected function generateGetByJoueurId() {
 		$chaine = "\tpublic function getByJoueurId(\$id) {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
 		$chaine .= "\t\treturn Factory".ucfirst($this->getNomTableEnCoursDeTraitement())."::getFromExtTableJoueur(\$id);\n";
 		$chaine .= "\t}\n";
 		return $chaine;
 	}
 	
 	protected function generateDelete() {
 		$chaine = "\tpublic function delete(\$object=array()) {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
 		$chaine .= "\t\t// Verification\n";
 		$chaine .= "\t\tif (empty(\$object)) {\n";
 		$chaine .= "\t\t\tthrow new Exception(get_class(\$this).\": La suppression se fait sur un objet.\", E_USER_ERROR);\n";
		$chaine .= "\t\t}\n";
		$chaine .= "\t\t// si ce n'est pas une instance de la classe, on la cree\n";
		$chaine .= "\t\tif (! \$object instanceof ".ucfirst($this->getNomTableEnCoursDeTraitement()).") {\n";
		$chaine .= "\t\t\t\$o".ucfirst($this->getNomTableEnCoursDeTraitement())." = new ".ucfirst($this->getNomTableEnCoursDeTraitement())."(";
		// Ici la liste des champs pris un par un
		$chaineBis = "";
		foreach ($this->getListeChampsEnCoursDeTraitement() AS $champ) {
			$chaineBis .= "\$object['".$champ['Field']."'],";
		}
		$chaine .= substr($chaineBis,0,strlen($chaineBis)-1);
		$chaine .= ");\n";
		$chaine .= "\t\t} else {\n";
		$chaine .= "\t\t\t\$o".ucfirst($this->getNomTableEnCoursDeTraitement())." = \$object;\n";
		$chaine .= "\t\t}\n";
		
		// il faut detruire les liens de composition avec les autres objets
// 		foreach ($this->_aListeChampsEnCoursDeTraitement AS $champ) {
// 			// si le champ commence par 'id' mais qu'il est plus long que 2 caracteres
// 			if ((substr($champ['Field'],0,2) == 'id' && strlen($champ['Field']) > 2)) {
// 				$chaine .= "\t\t// gestion de la suppression des liens de compositions\n";
// 				$chaine .= "\t\t\$oManager".ucfirst(substr($champ['Field'],2))." = Manager".ucfirst(substr($champ['Field'],2))."::getInstance();\n";
// 				$chaine .= "\t\t\$oManager".ucfirst(substr($champ['Field'],2))."->deleteCompositeLinks".ucfirst($this->_sNomTableEnCoursDeTraitement)."(\$o".ucfirst($this->_sNomTableEnCoursDeTraitement)."->getId());\n";
// 			}
// 		}
		$chaine .= "\t\t// Appel de la methode delete de l'objet\n";
		// Envoie de la requete et le traitement de son retour
		$chaine .= "\t\t// Tout se passe dans une transaction ouverte plus haut\n";
		$chaine .= "\t\t\t// Execution de la requete\n";
		$chaine .= "\t\tif (database::getInstance()->executeRequete(\$o".ucfirst($this->getNomTableEnCoursDeTraitement())."->delete())) {\n";
		$chaine .= "\t\t\t// Requete OK\n";
		//20170405, CBA: memoire objet pour soulaver la base
		$chaine .= "\t\t\tunset(self::\$_aListe".ucfirst($this->getNomTableEnCoursDeTraitement())."[\$o".ucfirst($this->getNomTableEnCoursDeTraitement())."->getId()]);\n";
		$chaine .= "\t\t\treturn true;\n";
		$chaine .= "\t\t} else {\n";
		$chaine .= "\t\t\t// Requete NOK lancement d'une exception PDO\n";
		$chaine .= "\t\t\tthrow new PDOException('Erreur sur delete (".ucfirst($this->getNomTableEnCoursDeTraitement()).")');\n";
		$chaine .= "\t\t}\n";
//		$chaine .= "\t\t\t// Execution de la requete\n";
//		$chaine .= "\t\treturn self::\$_oConnexion->executeRequete(\$o".ucfirst($this->_sNomTableEnCoursDeTraitement)."->delete());\n";
 		$chaine .= "\t}\n";
 		return $chaine;
 	}
 	
 	protected function generateUpdate() {
 		$chaine = "\tpublic function update(\$object=array()) {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
 		$chaine .= "\t\t// Verification\n";
 		$chaine .= "\t\tif (empty(\$object)) {\n";
 		$chaine .= "\t\t\tthrow new Exception(get_class(\$this).\": la mise &agrave; jour se fait sur un objet.\", E_USER_ERROR);\n";
		$chaine .= "\t\t}\n";
		$chaine .= "\t\t// si ce n'est pas une instance de la classe, on la cree\n";
		$chaine .= "\t\tif (! \$object instanceof ".ucfirst($this->getNomTableEnCoursDeTraitement()).") {\n";
		$chaine .= "\t\t\t\$o".ucfirst($this->getNomTableEnCoursDeTraitement())." = new ".ucfirst($this->getNomTableEnCoursDeTraitement())."(";
		// Ici la liste des champs pris un par un
		$chaineBis = "";
		foreach ($this->getListeChampsEnCoursDeTraitement() AS $champ) {
			$chaineBis .= "\$object['".$champ['Field']."'],";
		}
		$chaine .= substr($chaineBis,0,strlen($chaineBis)-1);
		$chaine .= ");\n";
		$chaine .= "\t\t} else {\n";
		$chaine .= "\t\t\t\$o".ucfirst($this->getNomTableEnCoursDeTraitement())." = \$object;\n";
		$chaine .= "\t\t}\n";
		$chaine .= "\t\t// Maintenant on compare avec celle en session\n";
		$chaine .= "\t\tif (!empty(\$_SESSION['".$this->getNomTableEnCoursDeTraitement()."']) && sizeof(\$_SESSION['".$this->getNomTableEnCoursDeTraitement()."']->compareTo(\$o".ucfirst($this->getNomTableEnCoursDeTraitement()).")) > 0) {\n";
		$chaine .= "\t\t\t\$_SESSION['".$this->getNomTableEnCoursDeTraitement()."'] = \$o".ucfirst($this->getNomTableEnCoursDeTraitement()).";\n";
 		$chaine .= "\t\t}\n";
		
 		$chaine .= "\t\tif (\$o".ucfirst($this->getNomTableEnCoursDeTraitement())."->getId() == 0) {\n";
 		$chaine .= "\t\t\t//Go TO SAVE\n";
 		$chaine .= "\t\t\tself::save(\$o".ucfirst($this->getNomTableEnCoursDeTraitement()).");\n";
 		$chaine .= "\t\t} else {\n";
 		$chaine .= "\t\t\t// on update car les objets sont different\n";
		
		//20170405, CBA: memoire objet pour soulager la base
		$chaine .= "\t\t\tif (database::getInstance()->executeRequete(\$o".ucfirst($this->getNomTableEnCoursDeTraitement())."->update()) === true) {\n";
		$chaine .= "\t\t\t\t//maj id dans la liste\n";
		$chaine .= "\t\t\t\tself::\$_aListe".ucfirst($this->getNomTableEnCoursDeTraitement())."[\$o".ucfirst($this->getNomTableEnCoursDeTraitement())."->getId()] = \$o".ucfirst($this->getNomTableEnCoursDeTraitement()).";\n";
		$chaine .= "\t\t\t\treturn true;\n";
		$chaine .= "\t\t\t} else {\n";
		$chaine .= "\t\t\t\treturn false;\n";
		$chaine .= "\t\t\t}\n";
		//$chaine .= "\t\treturn database::getInstance()->executeRequete(\$o".ucfirst($this->getNomTableEnCoursDeTraitement())."->update());\n";
 		$chaine .= "\t\t}\n";
		$chaine .= "\t}\n";
 		return $chaine;
 	}
 	
 	protected function generateSave() {
 		$chaine = "\tpublic function save(\$object=array()) {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
 		$chaine .= "\t\t// Verification\n";
 		$chaine .= "\t\tif (empty(\$object)) {\n";
 		$chaine .= "\t\t\tthrow new Exception(get_class(\$this).\": la sauvegarde se fait sur un objet.\", E_USER_ERROR);\n";
		$chaine .= "\t\t}\n";
		$chaine .= "\t\t// si ce n'est pas une instance de la classe, on la cree\n";
		$chaine .= "\t\tif (! \$object instanceof ".ucfirst($this->getNomTableEnCoursDeTraitement()).") {\n";
		$chaine .= "\t\t\t\$o".ucfirst($this->getNomTableEnCoursDeTraitement())." = new ".ucfirst($this->getNomTableEnCoursDeTraitement())."(";
		// Ici la liste des champs pris un par un
		$chaineBis = "";
		foreach ($this->getListeChampsEnCoursDeTraitement() AS $champ) {
			$chaineBis .= "\$object['".$champ['Field']."'],";
		}
		$chaine .= substr($chaineBis,0,strlen($chaineBis)-1);
		$chaine .= ");\n";
		$chaine .= "\t\t} else {\n";
		$chaine .= "\t\t\t\$o".ucfirst($this->getNomTableEnCoursDeTraitement())." = \$object;\n";
		$chaine .= "\t\t}\n";
		
		$chaine .= "\t\tif (\$o".ucfirst($this->getNomTableEnCoursDeTraitement())."->getId() > 0) {\n";
		$chaine .= "\t\t\t//Go TO UPDATE\n";
		$chaine .= "\t\t\tself::update(\$o".ucfirst($this->getNomTableEnCoursDeTraitement()).");\n";
		$chaine .= "\t\t} else {\n";
		$chaine .= "\t\t\t// Appel de la methode update de l'objet\n";
		// Envoie de la requete et le traitement de son retour
		
		//20170405, CBA: memoire objet pour soulager la base
		$chaine .= "\t\t\tif (database::getInstance()->executeRequete(\$o".ucfirst($this->getNomTableEnCoursDeTraitement())."->save()) === true) {\n";
		$chaine .= "\t\t\t\t//maj id dans la liste\n";
		$chaine .= "\t\t\t\tself::\$_aListe".ucfirst($this->getNomTableEnCoursDeTraitement())."[\$o".ucfirst($this->getNomTableEnCoursDeTraitement())."->getId()] = \$o".ucfirst($this->getNomTableEnCoursDeTraitement()).";\n";
		$chaine .= "\t\t\t\treturn true;\n";
		$chaine .= "\t\t\t} else {\n";
		$chaine .= "\t\t\t\treturn false;\n";
		$chaine .= "\t\t\t}\n";
		
		//$chaine .= "\t\treturn database::getInstance()->executeRequete(\$o".ucfirst($this->getNomTableEnCoursDeTraitement())."->save());\n";
		$chaine .= "\t\t}\n";
 		$chaine .= "\t}\n";
 		return $chaine;
 	}
 	
 	protected function generateFindBy() {
 		$chaine = "\tpublic function findBy(\$champ,\$data='') {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
 		$chaine .= "\t\t// creation d'un objet de base de la classe\n";
    	$chaine .= "\t\t\$object = new ".ucfirst($this->getNomTableEnCoursDeTraitement())."();\n";
    	$chaine .= "\t\t\$resultat = array();\n";
        $chaine .= "\t\tfor (\$i = 0; \$i < sizeof(\$this -> _aListe".ucFirst($this->getNomTableEnCoursDeTraitement())."); \$i++) {\n";
        $chaine .= "\t\t\t\$object = \$this -> _aListe".ucFirst($this->getNomTableEnCoursDeTraitement())."[\$i];\n";
        $chaine .= "\t\t\tif (\$object -> {'_'.strtolower(\$champ)} == \$data) {\n";
        $chaine .= "\t\t\t\t\$resultat[] = \$object;\n";
        $chaine .= "\t\t\t}\n";
        $chaine .= "\t\t}\n";
        $chaine .= "\t\tif (sizeof(\$resultat) > 0) {\n";
        $chaine .= "\t\t\t//existe\n";
        $chaine .= "\t\t\treturn \$resultat;\n";
        $chaine .= "\t\t} else {\n";
		$chaine .= "\t\t\t//n'existe pas\n";
		$chaine .= "\t\t\treturn \"Pas de ".ucfirst($this->getNomTableEnCoursDeTraitement())." de \".strtolower(\$champ).\" '\".\$data.\"'\";\n";
        $chaine .= "\t\t}\n";
 		$chaine .= "\t}\n";
 		return $chaine;
 	}
 	
 	protected function generateGetObjetVide() {
 		$chaine = "\tpublic function get".ucfirst($this->getNomTableEnCoursDeTraitement())."Vide() {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
 		$chaine .= "\t\treturn new ".ucfirst($this->getNomTableEnCoursDeTraitement())."();\n";
 		$chaine .= "\t}\n";
 		return $chaine;
 	}
 	
	/**
 	 * Generic function generate from all templates<br/>
 	 * Ex from idjoueur:<br/>
 	 * 	generateGetFrom('idjoueur')<br/>
 	 */
 	private function generateGetFromTableFromFK($tableNameFk) {
		$chaine = "\tpublic function getFromExtTable".ucfirst($tableNameFk)."(\$".strtolower($tableNameFk)."=-1) {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
		$chaine .= "\t\t//Verification en memoire\n";
		$chaine .= "\t\tforeach (self::\$_aListe".ucfirst($this->getNomTableEnCoursDeTraitement())." AS \$o".ucfirst($this->getNomTableEnCoursDeTraitement()).") {\n";
		$chaine .= "\t\t\tif (\$o".ucfirst($this->getNomTableEnCoursDeTraitement())."->get".ucfirst(strtolower($tableNameFk))."() == \$".strtolower($tableNameFk).") {\n";
		$chaine .= "\t\t\t\treturn \$o".ucfirst($this->getNomTableEnCoursDeTraitement()).";\n";
		$chaine .= "\t\t\t}\n";
		$chaine .= "\t\t}\n";
		$chaine .= "\t\t// Appel de la methode de la Fabrique\n";
		$chaine .= "\t\t\$o".ucfirst($this->getNomTableEnCoursDeTraitement())." = Factory".ucfirst($this->getNomTableEnCoursDeTraitement())."::getFromExtTable".ucfirst($tableNameFk)."(\$".strtolower($tableNameFk).");\n";
		$chaine .= "\t\t// Memorisation pour plus tard\n";
		$chaine .= "\t\tself::\$_aListe".ucfirst($this->getNomTableEnCoursDeTraitement())."[\$o".ucfirst($this->getNomTableEnCoursDeTraitement())."->getId()] = \$o".ucfirst($this->getNomTableEnCoursDeTraitement()).";\n";
		$chaine .= "\t\t// Renvoie de la donnee\n";
		$chaine .= "\t\treturn \$o".ucfirst($this->getNomTableEnCoursDeTraitement()).";\n";
		$chaine .= "\t}\n";
 		return $chaine;
 	}
 	
 	/*
 	 * Supprimer un lien composite revient à mettre à 0 le nom de la table cible (ie EQUIPEMENT*) dans la table source (ie UNITE)
 	 * et mettre à 0 le nom de la table mère dans la table cible
 	 */
 	public function generateDeleteCompositeLinks($tableNameFk) {
 		$chaine = "\tpublic function deleteCompositeLinksFrom".ucfirst($tableNameFk)."(\$id".strtolower($tableNameFk).") {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
		$chaine .= "\t\t//TODO\n";
//  		$chaine .= "\t\t\$requete = 'DELETE FROM ".$this->getNomTableEnCoursDeTraitement()." WHERE ".strtolower($tableNameFk)." = :".strtolower($tableNameFk)."';\n";
//  		$chaine .= "\t\tdatabase::getInstance() -> prepareRequete(\$requete);\n";
//  		$chaine .= "\t\tdatabase::getInstance() -> bind(\$id".strtolower($tableNameFk).");\n";
//  		$chaine .= "\t\tif (! database::getInstance() -> executeRequete()) {\n";
//  		$chaine .= "\t\t\tthrow new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de supprimer ID(\$id".strtolower($tableNameFk).") la table ".$this->getNomTableEnCoursDeTraitement()."');\n";
//  		$chaine .= "\t\t}\n";
 		$chaine .= "\t}\n";
 		return $chaine;
 	}
 	
	public function generate($tables,$listeChamps) {
 		if (!file_exists(_MANAGER_DIR_)) {
 			mkdir($this -> _sDocRoot."project_w2/"._MANAGER_DIR_);
 		}
 		
 		$this->setListeTables($_SESSION['tables']);
 		
 		foreach ($tables AS $table) {
 			$this->setClasseMere(null);
 			
 			// Init des attributs de travail
 			$this->setNomTableEnCoursDeTraitement($table);
//  			$this->_sNomTableEnCoursDeTraitement = $table;

 			$this->setListeChampsEnCoursDeTraitement($listeChamps[$table]);
//  			$this->_aListeChampsEnCoursDeTraitement = $listeChamps[$table];
 			
 			debug("Manager ".$this->getNomTableEnCoursDeTraitement(), true);
 			$cheminFichier = _MANAGER_DIR_."Manager".ucfirst($this->getNomTableEnCoursDeTraitement()).".class.php";
			$aMemo = array();
			$memo = "";
			$nomTag = 0;
			
			
			/*
			 * Si le fichier existe, on l'ouvre, et on cherche les parties
			 *  de code specifique pour ne pas les perdre
			 */
// 			if (file_exists($cheminFichier)) {
// 				$fichierALire = fopen($cheminFichier,"r");
// 				$memorisation = false;
// 				while ($tampon = fgets($fichierALire)) {
// 					$tamponTest = $tampon;
// 					if (preg_match('/\[TAG(?<digit>\d+)/',$tamponTest,$matches) == 1) {
// 						if (!empty($nomTag)) {
// 							// En cours de fichier => TAGx, il fau vider la memorisation anterieure
// 							$memo = "";
// 						}
// 						$nomTag = substr($matches[0],1,strlen($matches[0]));
// 						$memorisation = true;
// 					} else {
// 						if (strpos($tampon,'[/TAG') !== false) {
// 							$memorisation = false;
// 						}
// 						if ($memorisation === true) {
// 							// Memorisation du code specifique entre les deux TAG
// 							$memo .= $tampon;
// 						}
// 						if ($memorisation === false && strlen($memo) > 0) {
// 							// Sauvegarde du code specifique pour le re-injecter plus tard
// 							$this -> _aListOfSpecificCode[$nomTag] = $memo;
// 						}
// 					}
	
// 				}
// 				fclose($fichierALire);
// 			} // end if(file_exists($cheminFichier))
	
			if (file_exists($cheminFichier)) {
				$fichierALire = fopen($cheminFichier,"r");
				$memorisation = false;
				$memorisationFunction = false;
				$aMemo = array();
				$memo = "";
				$memoFunction = "";
				$nomTag = 0;
				$nomTagFunction = "";
			
				$this->_aListOfSpecificCode = array();
					
				//initialisation de functionName pour permerttre de catcher le premier TAG de la classe
				$functionName = '';
					
				//Boucle de lecture du fichier de Classe
				while ($tampon = fgets($fichierALire)) {
					$tamponTest = $tampon;
					// 					debug('avant pregmatch function name');
					if (preg_match('/function/',$tamponTest,$matches) == 1) {
						//Memoriation du nom de la fonction
						$functionName = substr(	$tamponTest,strpos($tamponTest,'function ')+strlen('function '),
								strpos(substr($tamponTest,strpos($tamponTest,'function ')+strlen('function ')),'('));
					}
			
						
					//basculement sur les noms de fonctions
					// recherche de la chaine [TAG_<functionName>
					if (isset($functionName)){
						// 						debug($functionName);
						// 						debug('recherche du TAG-FUNCTION:[TAG-'.$functionName);
						// 						debug(preg_match('/\[TAG-'.$functionName.'(?<digit>\d+)/',$tamponTest));
						//PARTIE MEMORISATION DES PARTIES "FONCTIONS"
						if ((preg_match('/\[TAG-'.$functionName.'(?<digit>\d+)/',$tamponTest,$matches) == 1) ||
						(preg_match('/\[TAG-'.ucfirst($this->getNomTableEnCoursDeTraitement()).'(?<digit>\d+)/',$tamponTest,$matches2) == 1)){
							//DEBUT MEMORISATION
							if (!empty($nomTagFunction)) {
								// En cours de fichier => TAGx, il fau vider la memorisation anterieure
								$memoFunction = "";
							}
							//debug($matches);debug($matches2);
							if (!empty($matches)) {
								$nomTagFunction = substr($matches[0],1,strlen($matches[0]));
							}
							if (!empty($matches2)) {
								$nomTagFunction = substr($matches2[0],1,strlen($matches2[0]));
							}
			
							$memorisationFunction = true;
								
							//A FAIRE
							// Traitement du cas du tag en ligne [TAGx]blablabla[/TAGx]
	//						if (strpos($tampon,'[/TAG') !== false) {
	//							$memorisation = false;
	//						}
								
							///////////////////////////////
							// On ne memorise pas le TAG //
							///////////////////////////////
	// 						if ($memorisationFunction === true) {
	// 							// Memorisation du code specifique entre les deux TAG
	// 							$memoFunction .= $tamponTest;
	// 						}
	// 						if ($memorisation === false && strlen($tamponTest) > 0) {
	// 							// Sauvegarde du code specifique pour le re-injecter plus tard
	// 							$this->_aListOfSpecificCode[$nomTagFunction] = $tamponTest;
	// 						}
						} else {
							//ARRET MEMORISATION pour ne pas memoriser le TAG
							if ((preg_match('/\[\/TAG-'.$functionName.'(?<digit>\d+)/',$tamponTest,$matchesBis) == 1) ||
							(preg_match('/\[\/TAG-'.ucfirst($this->getNomTableEnCoursDeTraitement()).'(?<digit>\d+)/',$tamponTest,$matchesBis2) == 1)) {
								$memorisationFunction = false;
							}
							if ($memorisationFunction === true) {
								// Memorisation du code specifique entre les deux TAG
								$memoFunction .= $tamponTest;
							}
// 							debug('matchesBis: ');debug($matchesBis);
// 							if (strpos($tamponTest,'[/TAG-') !== false) {
// 								$memorisationFunction = false;
// 							}
							if ($memorisationFunction === false && strlen($memoFunction) > 0) {
								// Sauvegarde du code specifique pour le re-injecter plus tard
								$this->_aListOfSpecificCode[$nomTagFunction] = $memoFunction;
							}
						}
					}
				}
			}
			
// 			debug($this->_aListOfSpecificCode);
			
			// Creation du fichier
			$fichierClasse = fopen($cheminFichier,"w");
			fwrite($fichierClasse,"<?php\n");
			fwrite($fichierClasse,$this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()"));
			
// 			fwrite($fichierClasse,"\t/*\n");
// 			fwrite($fichierClasse,"\t * AUTO-GENERATED FILE BY ManagerGenerator.class.php\n");
// 			fwrite($fichierClasse,"\t\n\n");
			
 			fwrite($fichierClasse,"class Manager".ucfirst($this->getNomTableEnCoursDeTraitement())." {\n");
			
			// Les atributs de la classe
			fwrite($fichierClasse,$this->generateAttributes());
			fwrite($fichierClasse,"\n");
			
			// Le constructeur de la classe
			fwrite($fichierClasse,$this->generateConstruct());
			fwrite($fichierClasse,"\n");
			
			// Le destructeur de la classe
			fwrite($fichierClasse,$this->generateDestruct());
			fwrite($fichierClasse,"\n");
			
			// Le singleon de la classe
			fwrite($fichierClasse,$this->generateGetInstance());
			fwrite($fichierClasse,"\n");
			
			// Le clonage de la classe
			fwrite($fichierClasse,$this->generateClone());
			fwrite($fichierClasse,"\n");
			
			/////
			// A VOIR
			/////
// 			if (!is_null($this->getClasseMere())) {
// 				// HERITAGE
// 				// Les setters
// 				foreach ($this->getAttributsFilleSup() AS $champ) {
// 					fwrite($fichierClasse,$this->generateSet($champ));
// 					fwrite($fichierClasse,"\n");
// 				}
// 				fwrite($fichierClasse,"\n");
// 				// Les getters
// 				foreach ($this->getAttributsFilleSup() AS $champ) {
// 					fwrite($fichierClasse,$this->generateGet($champ));
// 					fwrite($fichierClasse,"\n");
// 				}
// 				fwrite($fichierClasse,"\n");
// 			} else {
// 				// SANS HERITAGE
// 				// Les setters
// 				foreach ($listeChamps[$this->getNomTableEnCoursDeTraitement()] AS $champ) {
// 					fwrite($fichierClasse,$this->generateSet($champ['Field']));
// 					fwrite($fichierClasse,"\n");
// 				}
// 				fwrite($fichierClasse,"\n");
// 				// Les getters
// 				foreach ($listeChamps[$this->getNomTableEnCoursDeTraitement()] AS $champ) {
// 					fwrite($fichierClasse,$this->generateGet($champ['Field']));
// 					fwrite($fichierClasse,"\n");
// 				}
// 				fwrite($fichierClasse,"\n");
// 			}
			
			// Le setter de connexion de la classe
			fwrite($fichierClasse,$this->generateSetConnexion());
			fwrite($fichierClasse,"\n");
			
			// Les setter de la classe
			fwrite($fichierClasse,$this->generateSet());
			fwrite($fichierClasse,"\n");
			
			// Les getter de la classe
			fwrite($fichierClasse,$this->generateGet());
			fwrite($fichierClasse,"\n");
			
			// La methode GET by ID
			fwrite($fichierClasse,$this->generateGetById());
			fwrite($fichierClasse,"\n");
			
			/* 
			 * En fonction de la table traitee il faut generer un get specifique
			 * aux cles etrangeres
			 */
			foreach ($this->getListeChampsEnCoursDeTraitement() AS $champ) {
				//recherche du nom de table dans le nom de champ
				$nomTableDansNomChamp = false;
				foreach ($this->getListeTables() AS $table) {
					if ($nomTableDansNomChamp === true) {
						break;
					}
					$res = stristr($champ['Field'], $table);
					if (strlen($res) > 0) {
						$nomTableDansNomChamp = true;
					}
				}
				
// 				// si le champ commence par 'id' mais qu'il est plus long que 2 caracteres
				if ($nomTableDansNomChamp === true) {
					debug("Adoss&eacute; &agrave; un ".$champ['Field'], true);
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK($champ['Field']));
					fwrite($fichierClasse,"\n");
					fwrite($fichierClasse,$this -> generateDeleteCompositeLinks($champ['Field']));
					fwrite($fichierClasse,"\n");
				}
/*				
				if (in_array('idjoueur',$champ)) {
					debug("Adoss&eacute; &agrave; un joueur");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('joueur'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('idterrain',$champ)) {
					debug("Adoss&eacute; &agrave; un terrain");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('terrain'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('idtype',$champ)) {
					debug("Adoss&eacute; &agrave; un type");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('type'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('idarmee',$champ)) {
					debug("Adoss&eacute; &agrave; une armee");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('armee'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('idunite',$champ)) {
					debug("Adoss&eacute; &agrave; une unite");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('unite'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('idunitejoueur',$champ)) {
					debug("Adoss&eacute; &agrave; une unite joueur");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('unitejoueur'));				
					fwrite($fichierClasse,"\n");
				}
				if (in_array('idhero',$champ)) {
					debug("Adoss&eacute; &agrave; une unite hero");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('hero'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('idmembre',$champ)) {
					debug("Adoss&eacute; &agrave; un membre");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('membre'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('idcarte',$champ)) {
					debug("Adoss&eacute; &agrave; une carte");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('carte'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('idtaille',$champ)) {
					debug("Adoss&eacute; &agrave; une taille");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('taille'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('iddecor',$champ)) {
					debug("Adoss&eacute; &agrave; une decor");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('decor'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('idnews',$champ)) {
					debug("Adoss&eacute; &agrave; une news");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('news'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('idauteur',$champ)) {
					debug("Adoss&eacute; &agrave; un auteur");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('auteur'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('iduser',$champ)) {
					debug("Adoss&eacute; &agrave; un user");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('user'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('iddimension',$champ)) {
					debug("Adoss&eacute; &agrave; une dimension ");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('dimension'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('idcamp',$champ)) {
					debug("Adoss&eacute; &agrave; un camp");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('camp'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('idcase',$champ)) {
					debug("Adoss&eacute; &agrave; une case");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('case'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('iddroit',$champ)) {
					debug("Adoss&eacute; &agrave; un droit");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('droit'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('idcategorie',$champ)) {
					debug("Adoss&eacute; &agrave; une categorie");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('categorie'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('idbatiment',$champ)) {
					debug("Adoss&eacute; &agrave; un batiment");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('batiment'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('idequipement',$champ)) {
					debug("Adoss&eacute; &agrave; un equipement");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('equipement'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('idAlliance',$champ)) {
					debug("Adoss&eacute; &agrave; une alliance");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('alliance'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('idgroupe',$champ)) {
					debug("Adoss&eacute; &agrave; un groupe");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('groupe'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('iddesign',$champ)) {
					debug("Adoss&eacute; &agrave; un design");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('design'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('idprivilege',$champ)) {
					debug("Adoss&eacute; &agrave; un privilege");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('privilege'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('idtroupe',$champ)) {
					debug("Adoss&eacute; &agrave; une troupe");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('troupe'));
					fwrite($fichierClasse,"\n");
				}
				if (in_array('idplateau',$champ)) {
					debug("Adoss&eacute; &agrave; un plateau");
					fwrite($fichierClasse,$this -> generateGetFromTableFromFK('plateau'));
					fwrite($fichierClasse,"\n");
				}
*/				
			}
			
			
			// La methode DELETE
			fwrite($fichierClasse,$this->generateDelete());
			fwrite($fichierClasse,"\n");
			
			// La methode UPDATE
			fwrite($fichierClasse,$this->generateUpdate());
			fwrite($fichierClasse,"\n");
			
			// La methode SAVE
			fwrite($fichierClasse,$this->generateSave());
			fwrite($fichierClasse,"\n");
			
			// La methode FindBy
			fwrite($fichierClasse,$this->generateFindBy());
			fwrite($fichierClasse,"\n");
			
			
			// La methode FindBy
			fwrite($fichierClasse,$this->generateGetObjetVide());
			fwrite($fichierClasse,"\n");

			fwrite($fichierClasse,$this->addSpecificCodeTagFunction(ucfirst($this->getNomTableEnCoursDeTraitement()).'2'));
			$this->initTagNumberFunction();
			
			fwrite($fichierClasse,"\n");
			
			// Fin du fichier
			fwrite($fichierClasse,"}\n");
			fwrite($fichierClasse,"?>");
			fclose($fichierClasse);

			// Init du TAG Number
			$this->initTagNumber();
			debug("<hr>", true);
 		}
	}
}