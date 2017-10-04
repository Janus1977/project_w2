<?php
/**
 *  OBJECT FROM DB GENERATOR
 */
 class ObjectGenerator extends Generator {
	   /*
	 	* MONTE DANS LA CLASSE MERE
	 	*/
//  	protected $_attributFilleSupp;
//  	protected $_classeMere;
 	
 	public function __construct() {
 		parent::__construct();
 		//20151015: modification init à null
 		$this->_attributFilleSupp = null;
 		$this->_classeMere = null;
 	}
 	
 	/*
 	 * ATTENTION CELA NE FONCTIONNE PAS SI LA TABLE HERITE => A CORRIGER
 	 * MONTE DANS LA CLASSE MERE
 	 */
 	/**
 	 * Methode privee de verification de l'heritage
 	 * @param unknown $tables
 	 * @return boolean
 	 */
//  	private function isInheritance($tables) {
//  		$tmp = explode("_",$this->getNomTableEnCoursDeTraitement());
//  		if (sizeof($tmp) == 2) {
// 			foreach ($tables AS $table) {
// 				/* recherche de la table mere */
// 				$value = strpos($this->getNomTableEnCoursDeTraitement(),$table);
// 				if ($value !== false && $value == 0 &&
// 					$this->getNomTableEnCoursDeTraitement() != $table) {
// 					$uTable = ucfirst($table);
// 				} else {
// 					//Cas des generation unitaire
// 					$uTable = ucfirst($tmp[0]);
// 				}

// 				$this->_classeMere = new $uTable;
// 				/* On affiche l'heritage */
// 				$chaine = "\t/*HERITAGE AVEC ".$uTable." */\n";
// 				/* recherche du ou des attributs supplementaires */
// 				$attributsMere = $this->_classeMere->getAttributes();
// 				$attributsFille = array();
// 				foreach ($this->_aListeChampsEnCoursDeTraitement AS $champ) {
// 					$attributsFille[] = $champ['Field'];
// 				}

// 				/* Memorisation des attributs supplementaires */
// 				$this->_attributFilleSupp = array_diff($attributsFille,$attributsMere);
// 			}

// 			return true;
//  		}

//  		return false;
//  	}
 	
 	/**
 	 * generateur des attributs de la classe
 	 * @return string
 	 */
//  	protected function generateAttributs($tables,$listeChamps) {
	protected function generateAttributs() {
		$heritage = array();
		$chaine = "";
		/*
		 * 1) gestion d'un heritage possible => recherche id<nomTable>
		 * ex: table actuelle == Unitejoueur => table Unite
		 */
		//20151015: pas besoin, on est deja passe la ==> voir si les attributs sont pleins
// 		if ($this->isInheritance($tables)) {
		if (!is_null($this->getClasseMere()) && !is_null($this->getAttributsFilleSup())) {
			/* HERITAGE: on se contente d'ajouter les attributs supplementaires */
			foreach ($this->getAttributsFilleSup() AS $attribut) {
				//recherche du nom de table dans le nom de l'attribut supplementaire
				$nomTableDansNomChamp = false;
				foreach ($this->getListeTables() AS $table) {
					if ($nomTableDansNomChamp === true) {
						break;
					}
					$res = stristr($attribut, $table);
					if (strlen($res) > 0) {
						$nomTableDansNomChamp = true;
					}
				}
			
				if ($nomTableDansNomChamp === true) {
					//recherche des informations completes
					foreach ($this->getListeChampsEnCoursDeTraitement() AS $champ) {
						if (strtolower($champ['Field']) == strtolower($attribut)) {
							//ici nous avons trouve un champ de cle etrangere
							$chaine .= "\n\t/* identifiant composite ".ucfirst($champ['Field'])." */\n";
							$chaine .= "\tprotected \$_".$champ['Field']."; /* ".$champ['Type']." */\n";
							$chaine .= "\t/* liste des objets ".ucfirst($champ['Field'])." */\n";
							$chaine .= "\tprotected \$_o".ucfirst($attribut)."; /* ".$champ['Field']." Object*/\n\n";
						}
					}
				}
			}
			
		} else {
			/* PAS HERITAGE */
			foreach ($this->getListeChampsEnCoursDeTraitement() AS $champ) {
				/* 
				 * 2) gestion de la compiosition Ex: A est composé de B,C...
				 * 		=> creation des liste d'objets en _oObjet
				 * 
				 *  cette distinction reviens des id* differents de l'heritage
				 *  20160220, CBA, changement de strategie idarmegauche il allait chercher l'information dans
				 *  une table ArmeGauche.
				 *  Donc maintenant => equipementarmegauche (ex) il faut donc chercher un nom de table
				 *  dans le nom du champ
				 */
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
				
				if ($nomTableDansNomChamp === true) {
					//ici nous avons trouve un champ de cle etrangere
					$chaine .= "\n\t/* identifiant composite ".ucfirst($champ['Field'])." */\n";
					$chaine .= "\tprotected \$_".$champ['Field']."; /* ".$champ['Type']." */\n";
					$chaine .= "\t/* liste des objets ".ucfirst($champ['Field'])." */\n";
					$chaine .= "\tprotected \$_o".ucfirst($champ['Field'])."; /* ".$champ['Field']." Object*/\n\n";
				} else {
					//ici nous sommes dans le cas "classique"
					$chaine .= "\tprotected \$_".$champ['Field']."; /* ".$champ['Type']." */\n";
				}
				
// 				if (substr($champ['Field'],0,2) != 'id' || $champ['Field'] == 'id') {
// 					$chaine .= "\tprotected \$_".$champ['Field']."; /* ".$champ['Type']." */\n";
// 				} else {
					
// 					<ICI>
// 					/* 
// 					 * 2) gestion de la compiosition Ex: A est composé de B,C...
// 					 * 		=> creation des liste d'objets en _oObjet
// 					 * 
// 					 *  cette distinction reviens des id* differents de l'heritage
// 					 *  20160220, CBA, changement de strategie idarmegauche il allait chercher l'information dans
// 					 *  une table ArmeGauche.
// 					 *  Donc maintenant => equipementarmegauche (ex) il faut donc chercher un nom de table
// 					 *  dans le nom du champ
// 					 */
// 					$chaine .= "\n\t/* identifiant composite ".ucfirst($champ['Field'])." */\n";
// 					$chaine .= "\tprotected \$_".$champ['Field']."; /* ".$champ['Type']." */\n";
// 					//Changmement ici
// // 					$chaine .= "\t/* liste des objets ".ucfirst(substr($champ['Field'],2))." */\n";
// // 					$chaine .= "\tprotected \$_o".ucfirst(substr($champ['Field'],2))."; /* ".$champ['Type']." */\n\n";
// 					$chaine .= "\t/* liste des objets ".ucfirst($champ['Field'])." */\n";
// 					$chaine .= "\tprotected \$_o".ucfirst($champ['Field'])."; /* ".$champ['Type']." */\n\n";
// 				}
	
			}
		}
		
		$chaine .= "\tprotected \$_empty = true; // permet de savoir si l'objet est vide\n";
		
// 		$chaine .= $this->addSpecificCodeTag();

		$chaine .= $this->addSpecificCodeTagFunction(ucfirst($this->getNomTableEnCoursDeTraitement()).'1');
		$this->initTagNumberFunction();
		
		return $chaine;
	}
	
	
	/**
	 * Gemerateur du constructeur
	 * @return string
	 */
// 	protected function generateConstruct($tables,$listeChamps) {
	protected function generateConstruct() {
		$heritage = array();
		// Declaration du constructeur
		$chaine = "\tpublic function __construct(";
		foreach ($this->getListeChampsEnCoursDeTraitement() AS $champ) {
			if (!stristr($champ['Type'], 'int')) {
				$chaine .= "\$".$champ['Field']."='',"; // du texte
			} else {
				$chaine .= "\$".$champ['Field']."=0,"; // un nombre
			}
		}
		// on supprime la virgule superflue
		$chaine = substr($chaine,0,-1);
		$chaine .= ") {\n";

		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
		
		// corps du constructeur
		//1) gestion d'un heritage possible => recherche id<nomTable>
		//ex: table actuelle == Unitejoueur => table Unite
//		$tmp = explode("_",$this->_sTableEnCoursDeTraitement);

		//20151015: pas besoin, on est deja passe la ==> voir si les attributs sont pleins
// 		if ($this->isInheritance($tables)) {
		if (!is_null($this->getClasseMere()) && !is_null($this->getAttributsFilleSup())) {
			// HERITAGE					
			// insertion du constructeur parent <ICI>
			$chaine .= "\t\t".$this->getClasseMere()->getParent()."\n";
			foreach ($this->getAttributsFilleSup() AS $attribut) {
				$chaine .= "\t\t\$this->_".$attribut." = \$".$attribut.";\n";
			}
		} else {
			// PAS D'HERITAGE
			//1) affectation des parametres par defaut
			foreach ($this->getListeChampsEnCoursDeTraitement() AS $champ) {
				if (substr($champ['Field'],0,2) == 'id' && strlen($champ['Field']) > 2) {
					$chaine .= "\t\t\$this->_".$champ['Field']." = \$".$champ['Field'].";\n";
					
					/*
					 * A cause d'une fatal error je supprime la creation automatique des
					 * objets lies. Il sera fait dans le get.
					 */
// 					$chaine .= "\t\tif (\$".$champ['Field']." > 0) {\n";
// 					$chaine .= "\t\t\t/* appel de la Factory".ucfirst(substr($champ['Field'],2))." */\n";
// 					$chaine .= "\t\t\t\$this->_o".ucfirst(substr($champ['Field'],2))." = Factory".ucfirst(substr($champ['Field'],2))."::getFromTable".ucfirst(substr($champ['Field'],2))."(\$".$champ['Field'].");\n";
// 					$chaine .= "\t\t}\n";

// 					if (substr($champ['Field'],2) == 'unite') {
// 						$chaine .= "\t\t/* si il n'y a pas d'unite, on cherche les unites du joueur */\n";
// 						$chaine .= "\t\tif (empty(\$this->_o".ucfirst(substr($champ['Field'],2)).")) {\n";
// 						$chaine .= "\t\t\t/* appel de la Factory".ucfirst(substr($champ['Field'],2))."_joueur */\n";
// //						$chaine .= "\t\t\t\$this->_o".ucfirst(substr($champ['Field'],2))." = Factory".ucfirst(substr($champ['Field'],2))."_joueur::getFromTable".ucfirst(substr($champ['Field'],2))."_joueur(\$".$champ['Field'].");\n";
// 						$chaine .= "\t\t\t\$this->_".$champ['Field']." = Factory".ucfirst(substr($champ['Field'],2))."_joueur::getFromTable".ucfirst(substr($champ['Field'],2))."_joueur(\$".$champ['Field'].");\n";
// 						$chaine .= "\t\t}\n";
// 					}
				} else {
					$chaine .= "\t\t\$this->_".$champ['Field']." = \$".$champ['Field'].";\n";
				}
			}
		}
		
// 		$chaine .= "\t\t/* Si l'identifiant est rempli alors c'est un objet provenant de la base */\n";
// 		$chaine .= "\t\tif (method_exists('getId',\$this) && \$this->getId() > 0) {\n";
// 		$chaine .= "\t\t\t\$this->_empty = false;\n";
// 		$chaine .= "\t\t}\n";
		
		//ajout des balises code specifique
// 		$chaine .= $this->addSpecificCodeTag();

		$chaine .= $this->addSpecificCodeTagFunction('__construct');
		$this->initTagNumberFunction();
		
		/* declaration de fin du constructeur */
		$chaine .= "\n\t}\n\n";
		return $chaine;
	}
	
	/**
	 * Générateur des méthodes clone
	 * @return string
	 */
	protected function generateClone() {
		$chaine = "\tpublic function __clone() {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
		$chaine .= $this->addSpecificCodeTagFunction('__clone');
		$this->initTagNumberFunction();
		$chaine .= "\t\t//Sur le clonage d'un objet on supprime l'identifiant\n";
		$chaine .= "\t\t\$this->_description .= ' / Clone '.__CLASS__.' ID '.\$this->_id;\n";
		$chaine .= "\t\t\$this->_id = 0;\n";
		$chaine .= "\t}\n";
		return $chaine;
	}
	
	/**
	 * Generateur des methodes SET
	 * @param unknown $champ
	 * @return string
	 */
	protected function generateSet($champ) {
		$chaine = "\n";
		$_table = "";
		
		//Recherche des clé étrangères dans la liste des champs de la table en cours de traitement
		//la fonction in_array ne fonctionne pas car comme on peut avoir la même classe répétée
		//plusieurs fois, le nom du champ est différent (mais commence avec le nom de la table)
		foreach ($this->getListeTables() AS $table) {
			$pos = stripos($champ, $table);
			$res = stristr($champ, $table);
			if ($pos == 0 && $res ==! FALSE) {
				$_table = $table;
				debug("Adoss&eacute; &agrave; un ".$champ, true);
				//debug("la table '".$table."' est dans la liste des champs de la table '".$this->getNomTableEnCoursDeTraitement()."'",true);
			}
		}
		
		if (strlen($_table) > 0) {
			//Cas d'un nom de table contenu dans un nom de champ au debut
			// modificateur de l'identifiant
			$chaine .= "\tpublic function set".ucfirst($champ)."(\$nouvelleValeur) {\n";
			$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
			//ajout des balises code specifique
			// 		$chaine .= $this->addSpecificCodeTag();
				
			$chaine .= $this->addSpecificCodeTagFunction('set'.ucfirst($champ));
				
			//ne fonctionne plus car modification des noms de champs: id<NomTable> => <NomTable>
// 			if (substr($champ,0,2) == 'id' && strlen($champ) == 2) {
				$chaine .= "\t\t/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */\n";
				$chaine .= "\t\tif (\$this->getEmpty() === false) {\n";
				$chaine .= "\t\treturn;\n";
				// 			$chaine .= "\t\t} else {\n";
				// 			$chaine .= "\t\treturn;\n";
				$chaine .= "\t\t}\n";
// 			}
			
// 			if (substr($champ,0,2) == 'id' && strlen($champ) > 2) {
				$chaine .= "\t\t/* un identifiant est toujours un entier non nul */\n";
				$chaine .= "\t\tif (!intval(\$nouvelleValeur) || \$nouvelleValeur < 0) {\n";
				$chaine .= "\t\t\treturn false;\n";
				$chaine .= "\t\t}\n";
// 			}
			
		  //20171003,cba: mise en commentaire code inutile
// 			if (strpos($champ['Type'],'int') !== false && substr($champ,0,2) != 'id') {
		  if (substr($champ,0,2) != 'id') {
				$chaine .= "\t\t/* la valeur est un entier <=> troncage des reels */\n";
				$chaine .= "\t\t\$this->_".$champ." = floor(\$nouvelleValeur);\n";
			} else {
				$chaine .= "\t\t\$this->_".$champ." = \$nouvelleValeur;\n";
			}
			
			//ajout des balises code specifique
			// 		$chaine .= $this->addSpecificCodeTag();
				
			$chaine .= $this->addSpecificCodeTagFunction('set'.ucfirst($champ));
			$this->initTagNumberFunction();
			
			$chaine .= "\t}\n\n";
			
			////////////////////////////////////////////
			// modificateur de l'objet _o<ClasseMere> //
			////////////////////////////////////////////
			$chaine .= "\tprotected function set".ucfirst($champ)."Object() {\n";
			$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
			
			$chaine .= $this->addSpecificCodeTagFunction('set'.ucfirst($champ).'Object');
			
			//ex: equipementArmeGauche => _oEquipementarmegauche
			//Chargement de l'objet avec l'appel de la FACTORY
			$chaine .= "\t\tif (\$this->_".$champ." > 0) {\n";
			if (strpos($champ, 'joueur') > 0) {			
				$chaine .= "\t\t\t\$this->_o".ucfirst($champ)." = Factory".ucfirst(substr($champ,0,(strpos($champ, 'joueur'))))."joueur::getFromTable".ucfirst(substr($champ,0,(strpos($champ, 'joueur'))))."joueur(\$this->_".$champ.");\n";
			} else {
				$chaine .= "\t\t\t\$this->_o".ucfirst($champ)." = Factory".ucfirst($_table)."::getFromTable".ucfirst($_table)."(\$this->_".$champ.");\n";
			}
			$chaine .= "\t\t}\n";
			
			$chaine .= $this->addSpecificCodeTagFunction('set'.ucfirst($champ).'Object');
			$this->initTagNumberFunction();
			
			$chaine .= "\t}\n\n";
		} else {
			//Cas des attributs "classiques"
			$chaine .= "\tpublic function set".ucfirst($champ)."(\$nouvelleValeur) {\n";
			$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
			//ajout des balises code specifique
			// 		$chaine .= $this->addSpecificCodeTag();
			
			$chaine .= $this->addSpecificCodeTagFunction('set'.ucfirst($champ));
			
			if (substr($champ,0,2) == 'id' && strlen($champ) == 2) {
				$chaine .= "\t\t/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */\n";
				$chaine .= "\t\tif (!\$this->getEmpty()) {\n";
				$chaine .= "\t\treturn;\n";
				// 			$chaine .= "\t\t} else {\n";
				// 			$chaine .= "\t\treturn;\n";
				$chaine .= "\t\t}\n";
			}
				
			if (substr($champ,0,2) == 'id' && strlen($champ) > 2) {
				$chaine .= "\t\t/* un identifiant est toujours un entier non nul */\n";
				$chaine .= "\t\tif (!intval(\$nouvelleValeur) || \$nouvelleValeur < 0) {\n";
				$chaine .= "\t\t\treturn false;\n";
				$chaine .= "\t\t}\n";
			}
			
			
			//20171003,cba: mise en commentaire code inutile
			// suppression 1er parametre: strpos($champ['Type'],'int') !== false 
			if (substr($champ,0,2) != 'id') {
// 				$chaine .= "\t\t/* la valeur est un entier <=> troncage des reels */\n";
// 				$chaine .= "\t\t\$this->_".$champ." = floor(\$nouvelleValeur);\n";
// 			} else {
				$chaine .= "\t\t\$this->_".$champ." = \$nouvelleValeur;\n";
			}
				
			//ajout des balises code specifique
			// 		$chaine .= $this->addSpecificCodeTag();
			
			$chaine .= $this->addSpecificCodeTagFunction('set'.ucfirst($champ));
			$this->initTagNumberFunction();
				
			$chaine .= "\t}\n\n";
		}

		return $chaine;
	}
	
	/**
	 * Generateur des methodes GET
	 * @param unknown $champ
	 * @return string
	 */
	protected function generateGet($champ) {
		$chaine = "\n";
		$_table = "";
		
		//recherche du nom de table dans le nom de champ (au debut)
		foreach ($this->getListeTables() AS $table) {
			$pos = stripos($champ, $table);
			$res = stristr($champ, $table);
			if ($pos == 0 && $res ==! FALSE) {
				$_table = $table;
			}
		}
		
		//Cas d'un nom de table contenu dans un nom de champ au debut
		if (strlen($_table) > 0) {		
				// accesseur de l'identifiant
				$chaine .= "\tpublic function get".ucfirst($champ)."() {\n";
				$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
// 				//ajout des balises code specifique
// 				$chaine .= $this->addSpecificCodeTag();
				$chaine .= "\t\treturn \$this->_".$champ.";\n";
				$chaine .= "\t}\n\n";
				
				////////////////////////////////////////////
				// modificateur de l'objet _o<ClasseMere> //
				////////////////////////////////////////////
				//ex: equipementArmeGauche => _oEquipemetarmegauche
				$chaine .= "\tpublic function get".ucfirst($champ)."Object() {\n";
				$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
				
// 				if ($champ == 'unite' || $champ == 'unitejoueur') {
// 					$chaine .= "\t\tif (\$this->getUnite() == 0 && \$this->getIdunitejoueur() == 0) {\n";
// 					$chaine .= "\t\t\treturn;\n";
// 					$chaine .= "\t\t}\n";
// 					if ($champ == 'unite') {
// 						$chaine .= "\t\tif (\$this->getUnite() == 0) {\n";
// 						$chaine .= "\t\t\treturn \$this->getUnitejoueur();\n";
// 					}
// 					if ($champ == 'unitejoueur') {
// 						$chaine .= "\t\tif (\$this->getUnitejoueur() == 0) {\n";
// 						$chaine .= "\t\t\treturn \$this->getUnite();\n";
// 					}
// 					$chaine .= "\t\t}\n";
// 				} else {
					//Si l'objet n'est pas instancé, il faut le créer
					$chaine .= "\t\tif (empty(\$this->_o".ucfirst($champ).")) {\n";
					$chaine .= "\t\t\t\$this->set".ucfirst($champ)."Object();\n";
					$chaine .= "\t\t}\n";
// 				}
				
				if (strpos($champ, 'joueur') > 0) {
					//ajout des balises code specifique
// 					$chaine .= $this->addSpecificCodeTag();
					
					$chaine .= $this->addSpecificCodeTagFunction('get'.ucfirst($champ).'Object');
					$this->initTagNumberFunction();
				
					//la ligne ci-dessous ne concerne que le set
// 					$chaine .= "\t\t\treturn Factory".ucfirst(substr($champ,0,(strpos($champ, 'joueur'))))."_joueur::getFromTable".ucfirst(substr($champ,0,(strpos($champ, 'joueur'))))."_joueur(\$this->_".$champ.");\n";
					$chaine .= "\t\t\treturn \$this->_o".ucfirst($champ).";\n";
				} else {
					//ajout des balises code specifique
// 					$chaine .= $this->addSpecificCodeTag();

					$chaine .= "\t\tif ((empty(\$this->_o".ucfirst($champ).") || is_null(\$this->_o".ucfirst($champ)."))&& \$this->_".$champ." > 0) {\n";
					$chaine .= "\t\t\t\$this->set".ucfirst($champ)."Object();\n";
					$chaine .= "\t\t}\n";
					
					$chaine .= $this->addSpecificCodeTagFunction('get'.ucfirst($champ).'Object');
					$this->initTagNumberFunction();
					
					//la ligne ci-dessous ne concerne que le set
// 					$chaine .= "\t\treturn Factory".ucfirst($_table)."::getFromTable".ucfirst($_table)."(\$this->_".$champ.");\n";
					$chaine .= "\t\treturn \$this->_o".ucfirst($champ).";\n";
				}
				$chaine .= "\t}\n\n";
			} else {
				//Cas des attributs "classiques"
				$chaine .= "\tpublic function get".ucfirst($champ)."() {\n";
				$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
// 				$chaine .= "\t\tif (stristr($champ, 'date') && strlen($champ) == 0) {\n";
//				$chaine .= "\t\t\treturn 'NOW()';\n";
//				$chaine .= "\t\t} else {\n";
// 				//ajout des balises code specifique
// 				$chaine .= $this->addSpecificCodeTag();
				$chaine .= "\t\treturn \$this->_".$champ.";\n";
				$chaine .= "\t}\n\n";
			}
		
// 		if (substr($champ,0,2) == 'id' && strlen($champ) > 2) {
// 			/* accesseur de l'identifiant */
// 			$chaine = "\tpublic function get".ucfirst($champ)."() {\n";
// 			$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
// // 			//ajout des balises code specifique
// // 			$chaine .= $this->addSpecificCodeTag();
// 			$chaine .= "\t\treturn \$this->_".$champ.";\n";
// 			$chaine .= "\t}\n";
// 			/* accesseur de l'objet _o<ClasseMere> */
// 			$chaine .= "\tpublic function get".ucfirst(substr($champ,2))."() {\n";
// 			$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
// // 			$chaine .= "\t\tif (empty(\$this->_o".ucfirst(substr($champ,2)).")) {\n";
// // 			$chaine .= "\t\t\treturn \$this->_o".ucfirst(substr($champ,2)).";\n";
// debug(substr($champ,2));
// debug(strpos(substr($champ,2), 'unite'));
// 			if (strpos(substr($champ,2), 'unite') == 0 && substr($champ,2) == 'unite') {
// // debug("TUTU");
// 				$chaine .= "\t\tif (\$this->getIdunite() == 0 && \$this->getIdunitejoueur() == 0) {\n";
// 				$chaine .= "\t\t\treturn;\n";
// 				$chaine .= "\t\t}\n";
// 				$chaine .= "\t\tif (\$this->getIdunite() == 0) {\n";
// 				$chaine .= "\t\t\treturn \$this->getUnitejoueur();\n";
// 				$chaine .= "\t\t}\n";
// 			}
// 			if (strpos(substr($champ,2), 'unite') == 0 && substr($champ,2) == 'unitejoueur') {
// 				$chaine .= "\t\tif (\$this->getIdunite() == 0 && \$this->getIdunitejoueur() == 0) {\n";
// 				$chaine .= "\t\t\treturn;\n";
// 				$chaine .= "\t\t}\n";
// 				$chaine .= "\t\tif (\$this->getIdunitejoueur() == 0) {\n";
// 				$chaine .= "\t\t\treturn \$this->getUnite();\n";
// 				$chaine .= "\t\t}\n";
// 			}
// 			if (strpos($champ, 'joueur') > 0) {
// 				//ajout des balises code specifique
// // 				$chaine .= $this->addSpecificCodeTag();

// 				$chaine .= $this->addSpecificCodeTagFunction('get'.ucfirst($champ));
// 				$this->initTagNumberFunction();
				
// 				$chaine .= "\t\t\treturn Factory".ucfirst(substr($champ,2,(strpos($champ, 'joueur')-2)))."_joueur::getFromTable".ucfirst(substr($champ,2,(strpos($champ, 'joueur')-2)))."_joueur(\$this->_".$champ.");\n";
// 			} else {
// 				//ajout des balises code specifique
// // 				$chaine .= $this->addSpecificCodeTag();

// 				$chaine .= $this->addSpecificCodeTagFunction('get'.ucfirst($champ));
// 				$this->initTagNumberFunction();
				
// 				$chaine .= "\t\treturn Factory".ucfirst(substr($champ,2))."::getFromTable".ucfirst(substr($champ,2))."(\$this->_".$champ.");\n";
// 			}			
// 			$chaine .= "\t\t}\n";
// 		} else {
// 			$chaine = "\tpublic function get".ucfirst($champ)."() {\n";
// 			$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
// // 			$chaine .= "\t\tif (stristr($champ, 'date') && strlen($champ) == 0) {\n";
// // 			$chaine .= "\t\t\treturn 'NOW()';\n";
// // 			$chaine .= "\t\t} else {\n";
// // 			//ajout des balises code specifique
// // 			$chaine .= $this->addSpecificCodeTag();
// 			$chaine .= "\t\t\treturn \$this->_".$champ.";\n";
// // 			$chaine .= "\t\t}\n";
// 		}
// 		$chaine .= "\t}\n";
		return $chaine;
	}
	
	/**
	 * Generateur de la methode SAVE
	 * @param unknown $table
	 * @param unknown $listeChamps
	 * @return string
	 */
// 	protected function generateSave($table,$listeChamps) {
	protected function generateSave() {
		$chaine = "\tpublic function save() {\n";

		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
		
//		$chaine .= "\t\tdebug(\$this->getAttributes());exit;\n";
		
		$chaine .= "\t\tif (\$this->getId() > 0) {\n";
		$chaine .= "\t\t\t/* un identifiant superieur a 0 implique un ancien objet => UPDATE */\n";
		$chaine .= "\t\t\t\$this->update();\n";
		$chaine .= "\t\t} else {\n";
		$chaine .= "\t\t\t\$requete = 'INSERT INTO ".$this->getNomTableEnCoursDeTraitement()." (";
		foreach ($this->getListeChampsEnCoursDeTraitement() AS $champ) {
			$chaine .= $champ['Field'].",";
		}
		$chaine = substr($chaine, 0,strlen($chaine)-1);
		$chaine .= ")';\n";
		$chaine .= "\t\t\t\$requete .= ' VALUES ';\n";
		$chaine .= "\t\t\t\$requete .= '(';\n";
	
		// Parcours de la liste des champs pour les noms des champs
		// il faut obtenir: (\''.$this->getNomChamp().'\','')
		foreach ($this->getListeChampsEnCoursDeTraitement() AS $champ) {
			if (strpos($champ['Type'],'int') !== false || strpos($champ['Type'],'decimal') !== false ||
				strpos($champ['Type'],'float') !== false || strpos($champ['Type'],'double') !== false) {
				/* l'identifiant est particulier il faut le traiter a part */
				//20160421, CBA: sur un INSERT on ne pet pas l'identifiant car il est en AI.
				if (substr($champ['Field'],0,2) == 'id') {
// 					$chaine .= "\t\t\tif (\$this->get".ucfirst($champ['Field'])."() == '') {\n";
					$chaine .= "\t\t\t\$requete .= '\'\','; //valeur forcee pour l'insertion\n";
// 					$chaine .= "\t\t\t} else {\n";
// 					$chaine .= "\t\t\t\t\$requete .= \$this->get".ucfirst($champ['Field'])."().',';\n";
// 					$chaine .= "\t\t\t}\n";
				} else {
					$chaine .= "\t\t\t\$requete .= \$this->get".ucfirst($champ['Field'])."().',';\n";
				}		
			} else {
				//chaines
				if (strpos($champ['Field'], 'date') !== false) {
					$chaine .= "\t\t\t\$laDate = \$this->get".ucfirst($champ['Field'])."();\n";
					$chaine .= "\t\t\tif (strlen(\$laDate) > 0) {\n";
					$chaine .= "\t\t\t\t\$requete .= '\''.\$laDate.'\',';\n";
					$chaine .= "\t\t\t} else {\n";
					$chaine .= "\t\t\t\t\$requete .= 'NOW(),';\n";
					$chaine .= "\t\t\t}\n";
				} else {
					$chaine .= "\t\t\t\$requete .= '\''.\$this->get".ucfirst($champ['Field'])."().'\',';\n";
				}
			}
		}
		
		// on supprime la virgule superflue
// 		$chaine = substr($chaine,0,-1);
		$chaine .= "\t\t\t\$requete = substr(\$requete,0,strlen(\$requete)-1);\n";
		$chaine .= "\t\t\t\$requete .= ')';\n";
		$chaine .= "\t\t\treturn \$requete;\n";
		$chaine .= "\t\t}\n";
		$chaine .= "\t}\n";
		return $chaine;
	}
	
	
	/**
	 * Generateur de la methode UPDATE
	 * @param unknown $table
	 * @param unknown $listeChamps
	 * @return string
	 */
// 	protected function generateUpdate($table,$listeChamps) {
	protected function generateUpdate() {
		$chaine = "\tpublic function update() {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
		$chaine .= "\t\tif (\$this->getId() == 0 || \$this->getId() == null) {\n";
		$chaine .= "\t\t\t/* un identifiant 0 ou null implique un nouvel objet => INSERT */\n";
		$chaine .= "\t\t\t\$this->save();\n";
		$chaine .= "\t\t} else {\n";
		$chaine .= "\t\t\t\$requete = 'UPDATE ".$this->getNomTableEnCoursDeTraitement()." SET ';\n";
		// Parcours de la liste des champs pour les noms des champs
		foreach ($this->getListeChampsEnCoursDeTraitement() AS $champ) {
			if ($champ['Field'] != 'id') {
				if (strpos($champ['Type'],'int') !== false || strpos($champ['Type'],'decimal') !== false ||
					strpos($champ['Type'],'float') !== false || strpos($champ['Type'],'double') !== false) {
					$chaine .= "\t\t\t\$requete .= '".$champ['Field']." = '.\$this->get".ucfirst($champ['Field'])."().',';\n";
				} else if (strpos($champ['Field'], 'date') !== false) {
					$chaine .= "\t\t\t\$laDate = \$this->get".ucfirst($champ['Field'])."();\n";
					$chaine .= "\t\t\tif (strlen(\$laDate) > 0) {\n";
					$chaine .= "\t\t\t\t\$requete .= '".$champ['Field']." = \''.\$laDate.'\',';\n";
					$chaine .= "\t\t\t} else {\n";
					$chaine .= "\t\t\t\t\$requete .= '".$champ['Field']." = NOW(),';\n";
					$chaine .= "\t\t\t}\n";
				} else {
					//chaines
					$chaine .= "\t\t\t\$requete .= '".$champ['Field']." = \''.\$this->get".ucfirst($champ['Field'])."().'\',';\n";
				}				
			}				
		}
		// on supprime la virgule superflue
		$chaine .= "\t\t\t\$requete = substr(\$requete,0,strlen(\$requete)-1);\n";
		$chaine .= "\t\t\t\$requete .= ' WHERE id = '.\$this->getId();\n";
		$chaine .= "\t\t\treturn \$requete;\n";
		$chaine .= "\t\t}\n";
		$chaine .= "\t}\n";
		return $chaine;
	}
	
	/**
	 * Generateur de la methode DELETE
	 * @param unknown $table
	 * @return string
	 */
// 	protected function generateDelete($table) {
	protected function generateDelete() {
		$chaine = "\tpublic function delete() {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
		$chaine .= "\t\tif (\$this->getId() == 0 || \$this->getId() == null) {\n";
		$chaine .= "\t\t\tthrow new Exception(get_class(\$this).\": aucun identifiant donn&eacute; pour supprimer\");\n";
		$chaine .= "\t\t} else {\n";
		$chaine .= "\t\t\treturn 'DELETE FROM ".$this->getNomTableEnCoursDeTraitement()." WHERE id = '.\$this->getId();\n";
		$chaine .= "\t\t}\n";
		$chaine .= "\t}\n";
		return $chaine;
	}
	
	
	/**
	 * Generateur de la methode COMPARE
	 * @return string
	 */
	protected function generateCompareTo() {
		$chaine = "\tpublic function compareTo(\$object) {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
		$chaine .= "\t\t\$data = array();\n";
		$chaine .= "\t\tif (\$object instanceof ".ucfirst($this->getNomTableEnCoursDeTraitement()).") {\n";
		
		foreach ($this->getListeChampsEnCoursDeTraitement() AS $champ) {
	        $chaine .= "\t\t\tif (\$this->_".$champ['Field']." != \$object->get".ucfirst($champ['Field'])."()) {\n";
	        $chaine .= "\t\t\t\t\$data['".$champ['Field']."'] = \$object->get".ucfirst($champ['Field'])."();\n";
	        $chaine .= "\t\t\t}\n";
		}
		$chaine .= "\t\t}\n";
		$chaine .= "\t\treturn \$data;\n";
		$chaine .= "\t}\n";
		return $chaine;
	}
	
	/**
	 * Generateur de la methode GET PARENT
	 * @param unknown $listeChamps
	 * @return string
	 */
// 	protected function generateGetParent($listeChamps) {
	protected function generateGetParent() {
		$chaine = "\tpublic function getParent() {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
		$chaine .= "\t\treturn ('parent::__construct(";
		foreach ($this->getListeChampsEnCoursDeTraitement() AS $champ) {
			$chaine .= "\$".$champ['Field'].",";
		}
		/* on supprime la virgule superflue */
		$chaine = substr($chaine,0,-1);
		$chaine .= ");');\n";
		$chaine .= "\t}\n";
		return $chaine;
	}
	
	/**
	 * generateur de la methode GET ATTRIBUTE
	 * @return string
	 */
	protected function generateGetAttributes() {
		$chaine = "\tpublic function getAttributes() {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
	    $chaine .= "\t\t\$result = array();\n";
	    $chaine .= "\t\t\$result2 = array();\n";
	    $chaine .= "\t\t\$reflection = new ReflectionClass(\$this);\n";
	    $chaine .= "\t\t\$result = \$reflection->getdefaultProperties();\n";
	    $chaine .= "\t\t\$result = array_keys(\$result);\n";
	    $chaine .= "\t\tforeach (\$result AS \$data) {\n";
	    $chaine .= "\t\t\t\$result2[] = substr(\$data,1);\n";
	    $chaine .= "\t\t}\n";
	    
	    $chaine .= "\t\treturn \$result2;\n";
		$chaine .= "\t}\n";
		return $chaine;
	}
	
	/**
	 * Generateur de la methode TOSTRING
	 * @return string
	 */
	protected function generateToString() {
		$chaine = "\tpublic function __toString() {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
		$chaine .= "\t\t\$chaine = 'Objet '.get_class(\$this).':<br/>';\n";
//		$chaine .= "\t\treturn \$this->_".$nomChamp.";\n";
		/* ici je vais creer le template basique pour l'affichage via echo par exemple */
		foreach ($this->getListeChampsEnCoursDeTraitement() AS $champ) {
			if (substr($champ['Field'],0,2) == 'id' && strlen($champ['Field']) > 2) {
				$chaine .= "\t\tif (!empty(\$this->_".$champ['Field'].")) {\n";
//				$chaine .= "debug(\$this->_o".ucfirst(substr($champ['Field'],2)).");\n";
				$chaine .= "\t\t\t\$chaine .= '<br/>".ucfirst(substr($champ['Field'],2))." associ&eacute;: '.\$this->_".$champ['Field'].".'<br/>';\n";
				$chaine .= "\t\t} else {\n";
				$chaine .= "\t\t\t\$chaine .= 'Pas de ".ucfirst(substr($champ['Field'],2))." associ&eacute;<br/>';\n";
				$chaine .= "\t\t}\n";
			} else {
				$chaine .= "\t\t\$chaine .= 'Le champ ".$champ['Field']." vaut '.\$this->get".ucfirst($champ['Field'])."().'<br/>';\n";
			}
		}
		
// 		$chaine .= $this->addSpecificCodeTag();
		
		$chaine .= $this->addSpecificCodeTagFunction('__toString');
		$this->initTagNumberFunction();
		
		$chaine .= "\t\treturn \$chaine;\n";
		$chaine .= "\t}\n";
		return $chaine;
	}
	
	/**
	 * genrateur de la methode AFFICHE
	 * @return string
	 */
	protected function generateAffiche() {
		$chaine = "\tpublic function affiche() {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
		$chaine .= "\t\t/* Chargement de Smarty */\n";
		$chaine .= "\t\trequire_once(_SMARTY_LOAD_);\n";
		$chaine .= "\t\t\$smarty->assign('".$this->getNomTableEnCoursDeTraitement()."',\$this);\n";
		$chaine .= "\t\t\$smarty->assign('aListeMethodes',get_class_methods(\$this));\n";
		$chaine .= "\t\t\$smarty->assign('urlVersMiniature',_URL_MINIATURES_.\$this->getNom().'.jpg');\n";
		$chaine .= "\t\t/* Appel de l'affichage pour la classe en cour d'utilisation */\n";
		$chaine .= "\t\t\$smarty->display(_TEMPLATES_BASE_.'classes/".ucfirst($this->getNomTableEnCoursDeTraitement()).".tpl');\n";
		$chaine .= "\t}\n";
		return $chaine;
	}
	
//	protected function generateClassTemplate() {
//		if (!file_exists(_TEMPLATES_BASE_.'classes/')) {
//			/* Creation du repertoire */
//			mkdir(_TEMPLATES_BASE_.'classes/');
//		}
//		if (!file_exists(_TEMPLATES_BASE_.'classes/'.$this->_sTableEnCoursDeTraitement.'.tpl')) {
//			/* Creation du template de la classe */
//			$template = fopen();
//		}
//	}
	
	/**
	 * generateur de la methode ENCODE DECODE JSON
	 * @return string
	 */
	protected function generateEncodeDecodeJSON() {
		$chaine = "\tpublic function encodeDecodeJSON(\$json_str='') {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
		$chaine .= "\t\tif (\$json_str == '') {\n";
		$chaine .= "\t\t\t// Objet standard a remplir\n";
	    $chaine .= "\t\t\t\$json= new stdClass();\n";
	    $chaine .= "\t\t\tforeach (\$this as \$key => \$value) {\n";
	    $chaine .= "\t\t\t\tif (substr(\$key,0,1) == '_') {\n";
	    $chaine .= "\t\t\t\t\t\$key = substr(\$key,1);\n";
	    $chaine .= "\t\t\t\t\t//on evite de faire sortir les objet fonctionnels\n";
	    $chaine .= "\t\t\t\t\tif (strtolower(substr(\$key,0,1)) != 'o') {\n";
	    $chaine .= "\t\t\t\t\t\t\$json->\$key = \$value;\n";
	    $chaine .= "\t\t\t\t\t}\n";
	    $chaine .= "\t\t\t\t}\n";
	    $chaine .= "\t\t\t\t\$json->\$key = \$value;\n";
	    $chaine .= "\t\t\t}\n";
	    $chaine .= "\t\t\treturn json_encode(\$json);\n";
		$chaine .= "\t\t} else {\n";
		$chaine .= "\t\t\t/* decodage et hydratation des datas JSON */\n";
	    $chaine .= "\t\t\t\$json = json_decode(\$json_str, 1);\n";
	    $chaine .= "\t\t\tforeach (\$json as \$key => \$value) {\n";
	    $chaine .= "\t\t\t\t\$method = 'set'.ucfirst(\$key);\n";
	    $chaine .= "\t\t\t\t//Si la methode existe alors on l'utilise\n";
	    $chaine .= "\t\t\t\tif (method_exists(\$this, \$method)) {\n";
	    $chaine .= "\t\t\t\t\t\$this->\$method(\$value);\n";
	    $chaine .= "\t\t\t\t}\n";
	    $chaine .= "\t\t\t}\n";
		$chaine .= "\t\t}\n";
		$chaine .= "\t}\n";
		return $chaine;
	}
	
	/**
	 * generateur de la methode GET CLASS
	 * @return string
	 */
	protected function generateGetClass() {
		$chaine = "\tpublic function getClass() {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
		$chaine .= "\t\treturn get_class(\$this);\n";
		$chaine .= "\t}\n";
		return $chaine;
	}
	
	/**
	 * generateur de la methode IS EMPTY
	 * @return string
	 */
	protected function generateIsEmpty() {
		$chaine = "\tpublic function getEmpty() {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
		$chaine .= "\t\treturn \$this->_empty;\n";
		$chaine .= "\t}\n";
		return $chaine;
	}
	
	/**
	 * Methode de generation du fichier de classe
	 * @param unknown $tables
	 * @param unknown $listeChamps
	 */
	public function generate($tables,$listeChamps) {
//			debug($tables);debug($listeChamps);exit;
		//Memorisation des tables pour les champ de cle etrangeres
		//on charge les tables car l'option "1 table" a ete cochée
		$this->setListeTables($_SESSION['tables']);
		
		foreach ($tables AS $table) {
			$this->setClasseMere(null);
			/* La table */
			$this->setNomTableEnCoursDeTraitement($table);
			/* Les champs des tables */
			$this->setListeChampsEnCoursDeTraitement($listeChamps[$this->getNomTableEnCoursDeTraitement()]);
			
			debug("Classe ".ucfirst($this->getNomTableEnCoursDeTraitement()),true);
			$cheminFichier = _OBJ_DIR_.ucfirst($this->getNomTableEnCoursDeTraitement()).".class.php";
			$aMemo = array();
			$memo = "";
			$memoFunction = "";
			$nomTag = 0;
			$nomTagFunction = "";
			
			/*
			 * Si le fichier existe, on l'ouvre, et on cherche les parties
			 *  de code specifique pour ne pas les perdre
			 */
			if (file_exists($cheminFichier)) {
				$fichierALire = fopen($cheminFichier,"r");
				$memorisation = false;
				$memorisationFunction = false;
				
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
						//PARTIE MEMORISATION DES PARTIES "FONCTIONS"
						if ((preg_match('/\[TAG-'.$functionName.'(?<digit>\d+)/',$tamponTest,$matches) == 1) ||
							(preg_match('/\[TAG-'.ucfirst($this->getNomTableEnCoursDeTraitement()).'(?<digit>\d+)/',$tamponTest,$matches2) == 1)){
							//DEBUT MEMORISATION
							if (!empty($nomTagFunction)) {
								/* En cours de fichier => TAGx, il fau vider la memorisation anterieure */
								$memoFunction = "";
							}
// 							debug($matches);debug($matches2);
							if (!empty($matches)) {
								//TAG-totox
								$nomTagFunction = substr($matches[0],1,strlen($matches[0]));
							}
// 							debug($nomTagFunction);
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
							if ($memorisationFunction === false && strlen($memoFunction) > 0) {
								/* Sauvegarde du code specifique pour le re-injecter plus tard */
								$this->_aListOfSpecificCode[$nomTagFunction] = $memoFunction;
							}
						}
					}
				}
				fclose($fichierALire);
			} // fin recuperation du code specifique
			
			debug($this->_aListOfSpecificCode,true);
			
			
			// Creation du fichier
			$fichierClasse = fopen($cheminFichier,"w");
			fwrite($fichierClasse,"<?php\n");
			fwrite($fichierClasse,$this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()"));
			// Gestion de l'heritage
			if ($this->isInheritance($tables)) {
				fwrite($fichierClasse,"class ".ucfirst($this->getNomTableEnCoursDeTraitement())." extends ".$this->getClasseMere()->getClass()." {\n");
			} else {
				fwrite($fichierClasse,"class ".ucfirst($this->getNomTableEnCoursDeTraitement())." {\n");
			}
				
			// les attributs
			fwrite($fichierClasse,$this->generateAttributs());
			
			fwrite($fichierClasse,"\n");
			
			// Le constructeur
			fwrite($fichierClasse,$this->generateConstruct());
						
			fwrite($fichierClasse,"\n");

			// La methode clone
			fwrite($fichierClasse,$this->generateClone());
			
			fwrite($fichierClasse,"\n");

			if (!is_null($this->getClasseMere())) {
				// HERITAGE
				// Les setters
				foreach ($this->getAttributsFilleSup() AS $champ) {
					fwrite($fichierClasse,$this->generateSet($champ));
					fwrite($fichierClasse,"\n");		
				}
				fwrite($fichierClasse,"\n");
				// Les getters
				foreach ($this->getAttributsFilleSup() AS $champ) {
					fwrite($fichierClasse,$this->generateGet($champ));
					fwrite($fichierClasse,"\n");		
				}
				fwrite($fichierClasse,"\n");				
			} else {
				// SANS HERITAGE
				// Les setters
				foreach ($listeChamps[$this->getNomTableEnCoursDeTraitement()] AS $champ) {
					fwrite($fichierClasse,$this->generateSet($champ['Field']));
					fwrite($fichierClasse,"\n");		
				}
				fwrite($fichierClasse,"\n");
				// Les getters
				foreach ($listeChamps[$this->getNomTableEnCoursDeTraitement()] AS $champ) {
					fwrite($fichierClasse,$this->generateGet($champ['Field']));
					fwrite($fichierClasse,"\n");		
				}
				fwrite($fichierClasse,"\n");
			}			

			
			fwrite($fichierClasse,$this->generateToString());
			fwrite($fichierClasse,"\n");
			
			fwrite($fichierClasse,$this->generateSave());
			fwrite($fichierClasse,"\n");
			
			fwrite($fichierClasse,$this->generateUpdate());
			fwrite($fichierClasse,"\n");
			
			fwrite($fichierClasse,$this->generateDelete());
			fwrite($fichierClasse,"\n");
			
			fwrite($fichierClasse,$this->generateGetParent());
			fwrite($fichierClasse,"\n");
			
			fwrite($fichierClasse,$this->generateGetAttributes());
			fwrite($fichierClasse,"\n");
			
			fwrite($fichierClasse,$this->generateCompareTo());
			fwrite($fichierClasse,"\n");
			
			fwrite($fichierClasse,$this->generateEncodeDecodeJSON());
			fwrite($fichierClasse,"\n");
			
			fwrite($fichierClasse,$this->generateGetClass());
			fwrite($fichierClasse,"\n");
			
			fwrite($fichierClasse,$this->generateIsEmpty());
			fwrite($fichierClasse,"\n");
			
			fwrite($fichierClasse,$this->generateAffiche());
			fwrite($fichierClasse,"\n");
			
//			if ($this->_sTableEnCoursDeTraitement == 'troupes') {
//				fwrite($fichierClasse,$this->generateAttitude());
//				fwrite($fichierClasse,"\n");
//			}
			

			fwrite($fichierClasse,$this->addSpecificCodeTagFunction(ucfirst($this->getNomTableEnCoursDeTraitement()).'2'));
			$this->initTagNumberFunction();
			
			fwrite($fichierClasse,"}\n");
			
			fwrite($fichierClasse,"?>");
			fclose($fichierClasse);

			// re-ouverture pour les compositions
			//traduction des relations 1-N
			$fichierClasse = fopen($cheminFichier,"a");
			
			fclose($fichierClasse);
			
			// Init du TAG Number
			//l'init doit se faire dans chaque fonction generate*
			$this->initTagNumber();
			
			debug("<hr>",true);
//			exit;
		}
	}
 }
?>