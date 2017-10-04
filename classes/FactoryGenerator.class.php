<?php
/**
 * FACTORY GENERATOR
 * A factory is able to give pool of the same class or inherited class
 */
 class FactoryGenerator extends Generator {
 	
 	public function __construct() {
 		parent::__construct();
 	}
 	
// 	private function generateAccess() {
// 		$chaine = "\tpublic static function access(\$className,\$methodName)\n";
// 		$chaine .= "\t\tif (\$className instanceof ".ucfirst($this->_sNomTableEnCoursDeTraitement).") {\n";
// 		$chaine .= "\t\t\treturn self::\$methodName()\n";
// 		$chaine .= "\t\t} else {\n";
// 		$chaine .= "\t\t}\n";
//		$chaine .= "\t}\n";
// 		return $chaine; 		
// 	}
 	
 	/**
 	 * Return list of all entries from the named table
 	 */
 	private function generateGetAllFromTable() {
 		//20/10/2016, passage sur -1 car 0 est la valeur par defaut si rien n'est affecte a l'equipement
		$chaine = "\tpublic static function getFromTable".ucfirst($this->getNomTableEnCoursDeTraitement())."(\$id=-1) {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
		$chaine .= "\t\t\$listeObjet = array();\n";
		
		$chaine .= "\t\t// Lancement de la requete\n";
		$chaine .= "\t\tif (empty(self::\$_requete)) {\n";
		$chaine .= "\t\t\t\$requete = 'SELECT * FROM `".$this->getNomTableEnCoursDeTraitement()."`';\n";
		$chaine .= "\t\t} else {\n";
		$chaine .= "\t\t\t\$requete = self::\$_requete;\n";
		$chaine .= "\t\t}\n";
		$chaine .= "\t\tif (!is_array(\$id)) {\n";
		
		//20/10/2016, passage sur -1 car 0 est la valeur par defaut si rien n'est affecte a l'equipement
		$chaine .= "\t\t\tif (\$id > -1) {\n";
		
		//08/04/2016, passage avec BINDVALUE
		//$chaine .= "\t\t\t\t\$requete .= ' WHERE id = '.\$id;\n";
		$chaine .= "\t\t\t\t\$requete .= ' WHERE id = :id';\n";
		
		$chaine .= "\t\t\t\t//Il faut que le parametre soit dans un array pour le BIND\n";
		$chaine .= "\t\t\t\t\$id = array(':id' => \$id);\n";
		$chaine .= "\t\t\t} else {\n";
		$chaine .= "\t\t\t\t/* Tous les objets ==> il faut les ordonner */\n";
		$chaine .= "\t\t\t\t\$requete .= ' ORDER BY id ASC';\n";
		$chaine .= "\t\t\t}\n";
		$chaine .= "\t\t} else {\n";
		$chaine .= "\t\t\t\$requete .= ' WHERE id IN ('.implode(\",\",\$id).') ORDER BY id ASC';\n";
		$chaine .= "\t\t}\n";
		
		//08/04/2016, passage avec BINDVALUE
		$chaine .= "\t\tdatabase::getInstance() -> prepareRequete(\$requete);\n";
		//20/10/2016, passage sur -1 car 0 est la valeur par defaut si rien n'est affecte a l'equipement
		$chaine .= "\t\tif (is_array(\$id) || \$id > -1) {\n";
		$chaine .= "\t\t\tdatabase::getInstance() -> bind(\$id);\n";
		$chaine .= "\t\t}\n";
		
		//08/04/2016, passage avec BINDVALUE
// 		$chaine .= "\t\tif (! database::getInstance() -> executeRequete(\$requete)) {\n";
		$chaine .= "\t\tif (! database::getInstance() -> executeRequete()) {\n";
		$chaine .= "\t\t\tthrow new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table ".$this->getNomTableEnCoursDeTraitement()."');\n";
		$chaine .= "\t\t}\n";
		
		$chaine .= "\t\t// Recuperation des donnees\n";
		$chaine .= "\t\t\$datas = database::getInstance() -> getTableauResultat();\n";
		
// 		$chaine .= "\t\t".$this->addSpecificCodeTag()."\n";
		
		$chaine .= "\t\t".$this->addSpecificCodeTagFunction(ucfirst($this->getNomTableEnCoursDeTraitement()));
		$this->initTagNumberFunction();
		
		$chaine .= "\t\t/* Traitement des donnees */\n";
		$chaine .= "\t\tforeach (\$datas AS \$data) {\n";
		$chaine .= "\t\t\t/* objet par defaut */\n";
		$chaine .= "\t\t\t\$listeObjet[] = new ".ucfirst($this->getNomTableEnCoursDeTraitement())."(";
		
		/* Liste des champs de la table */
		foreach ($this->getListeChampsEnCoursDeTraitement() AS $champ) {
			/* les champs par defaut presents dansla table */
			$chaine .= "\$data['".$champ['Field']."'],";			
		}
		$chaine = substr($chaine,0,strlen($chaine)-1);
		$chaine .= ");\n";
// 		$chaine .= "\t\t".$this->addSpecificCodeTag()."\n";

		$chaine .= "\t\t".$this->addSpecificCodeTagFunction('getFromTable'.ucfirst($this->getNomTableEnCoursDeTraitement()));
		$this->initTagNumberFunction();
		
		$chaine .= "\t\t}\n";
// 		$chaine .= "\t\tif (!empty(\$listeObjet) && !is_array(\$id)) {\n";
		$chaine .= "\t\tif (!empty(\$listeObjet) && sizeof(\$listeObjet) == 1) {\n";
		$chaine .= "\t\t\t\$listeObjet = \$listeObjet[0];\n";
		$chaine .= "\t\t}\n";
		$chaine .= "\t\treturn \$listeObjet;\n";
		$chaine .= "\t}\n";
 		return $chaine;
 	}
 	
 	/**
 	 * Return one element from the named table identified by its player's id
 	 */
 	private function generateGetFromTableFromPlayer() {
		$chaine = "\tpublic static function getFromTableFromPlayer(\$idjoueur) {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
		$chaine .= "\t\t\$listeObjet = array();\n";
		
		$chaine .= "\t\t// Lancement de la requete\n";
		$chaine .= "\t\t\$requete = 'SELECT * FROM `".$this->getNomTableEnCoursDeTraitement()."` WHERE joueur = :idjoueur ORDER BY id ASC';\n";
		
		//08/04/2016, passage avec BINDVALUE
		$chaine .= "\t\tdatabase::getInstance() -> prepareRequete(\$requete);\n";
		$chaine .= "\t\tdatabase::getInstance() -> bind(array (\$idjoueur));\n";
		
		$chaine .= "\t\tif (! database::getInstance() -> executeRequete()) {\n";
		$chaine .= "\t\t\tthrow new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table ".$this->getNomTableEnCoursDeTraitement()."');\n";
		$chaine .= "\t\t}\n";
		
		$chaine .= "\t\t// Recuperation des donnees\n";
		$chaine .= "\t\t\$datas = database::getInstance() -> getTableauResultat();\n";
		
		$chaine .= "\t\t/* Traitement des donnees */\n";
		$chaine .= "\t\tforeach (\$datas AS \$data) {\n";
		$chaine .= "\t\t\t\$listeObjet[] = new ".ucfirst($this->getNomTableEnCoursDeTraitement())."(";
		
		/* Liste des champs de la table */
		foreach ($this->getListeChampsEnCoursDeTraitement() AS $champ) {
			$chaine .= "\$data['".$champ['Field']."'],";			
		}
		$chaine = substr($chaine,0,strlen($chaine)-1);
		$chaine .= ");\n";
		$chaine .= "\t\t}\n";
		
		$chaine .= "\t\treturn \$listeObjet;\n";
		$chaine .= "\t}\n";
 		return $chaine;
 	}
 	
 	
 	/**
 	 * Generic function generate from all templates
 	 * Ex from idjoueur:
 	 * 	generateGetFrom('idjoueur')
 	 */
 	private function generateGetFromTableFromFK($tableNameFk) {
 		debug(__CLASS__."::".__FUNCTION__."(".$tableNameFk.")");
		$chaine = "\tpublic static function getFromExtTable".ucfirst($tableNameFk)."(\$".strtolower($tableNameFk)."=0) {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
		$chaine .= "\t\t\$listeObjet = array();\n";
		
		$chaine .= "\t\t// Lancement de la requete\n";
		$chaine .= "\t\t\$requete = 'SELECT * FROM `".$this->getNomTableEnCoursDeTraitement()."` ';\n";
		
		$chaine .= "\t\tif (\$".strtolower($tableNameFk)." == 0) {\n";
		$chaine .= "\t\t\t\$requete .= 'WHERE ".strtolower($tableNameFk)." > 0 ORDER BY id ASC';\n";
		$chaine .= "\t\t} else {\n";
		$chaine .= "\t\t\t\$requete .= 'WHERE ".strtolower($tableNameFk)." = :".strtolower($tableNameFk)." ORDER BY id ASC';\n";
		
		$chaine .= "\t\t\t//Il faut que le parametre soit dans un array pour le BIND\n";
		$chaine .= "\t\t\t\$".strtolower($tableNameFk)." = array(':".strtolower($tableNameFk)."' => \$".strtolower($tableNameFk).");\n";
		
		$chaine .= "\t\t}\n";
		
		//08/04/2016, passage avec BINDVALUE
		$chaine .= "\t\tdatabase::getInstance() -> prepareRequete(\$requete);\n";
		$chaine .= "\t\tif (is_array(\$".strtolower($tableNameFk).") || \$".strtolower($tableNameFk)." > 0) {\n";
		$chaine .= "\t\t\tdatabase::getInstance() -> bind(\$".strtolower($tableNameFk).");\n";
		$chaine .= "\t\t}\n";
				
		$chaine .= "\t\tif (! database::getInstance() -> executeRequete()) {\n";
		$chaine .= "\t\t\tthrow new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table ".$this->getNomTableEnCoursDeTraitement()."');\n";
		$chaine .= "\t\t}\n";
		
		$chaine .= "\t\t// Recuperation des donnees\n";
		$chaine .= "\t\t\$datas = database::getInstance() -> getTableauResultat();\n";
		
		$chaine .= "\t\t// Traitement des donnees\n";
		$chaine .= "\t\tforeach (\$datas AS \$data) {\n";
		$chaine .= "\t\t\t\$listeObjet[] = new ".ucfirst($this->getNomTableEnCoursDeTraitement())."(";
		
		/* Liste des champs de la table */
		foreach ($this->getListeChampsEnCoursDeTraitement() AS $champ) {
			$chaine .= "\$data['".$champ['Field']."'],";			
		}
		$chaine = substr($chaine,0,strlen($chaine)-1);
		$chaine .= ");\n";
		$chaine .= "\t\t}\n";
		
		$chaine .= "\t\tif (sizeof(\$listeObjet) == 1) {\n";
		$chaine .= "\t\t\t\$listeObjet = \$listeObjet[0];\n";
		$chaine .= "\t\t}\n";
		
		$chaine .= "\t\treturn \$listeObjet;\n";
		$chaine .= "\t}\n";
 		return $chaine;
 	}
 	
 	private function generateGetEmptyObjectFromTable($tableName) {
		$chaine = "\tpublic static function getEmptyObjectFromTable".ucfirst($tableName)."(\$id=0) {\n";
		$chaine .= $this->getGeneratedBy(__CLASS__."::".__FUNCTION__."()");
		$chaine .= "\t\t\$listeObjet = array();\n";
		
		$chaine .= "\t\t/* Traitement des donnees */\n";
		
		$chaine .= "\t\t\$listeObjet[] = new ".ucfirst($this->getNomTableEnCoursDeTraitement())."(";
		/* Liste des champs de la table */
		foreach ($this->getListeChampsEnCoursDeTraitement() AS $champ) {
			$chaine .= "'',";			
		}
		$chaine = substr($chaine,0,strlen($chaine)-1);
		$chaine .= ");\n";
		
		$chaine .= "\t\treturn \$listeObjet;\n";
		$chaine .= "\t}\n";
 		return $chaine;
 	}
 	
 	public function generate($tables,$listeChamps) {
 		if (!file_exists(_FACTORY_DIR_)) {
 			mkdir($this -> _sDocRoot."project_w2/"._FACTORY_DIR_);
 		}
 		
 		$this->setListeTables($_SESSION['tables']);
 		
 		foreach ($tables AS $table) {
 			/* Init des attributs de travail */
 			
 			$this->setNomTableEnCoursDeTraitement($table);
//  			$this->_sNomTableEnCoursDeTraitement = $table;
 			$this->setListeChampsEnCoursDeTraitement($listeChamps[$this->getNomTableEnCoursDeTraitement()]);
//  			$this->_aListeChampsEnCoursDeTraitement = $listeChamps[$table];
 			
 			debug("Factory ".$this->getNomTableEnCoursDeTraitement(), true);

 			$cheminFichier = _FACTORY_DIR_."Factory".ucfirst($this->getNomTableEnCoursDeTraitement()).".class.php";
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
// 							/* En cours de fichier => TAGx, il fau vider la memorisation anterieure */
// 							$memo = "";
// 						}
// 						$nomTag = substr($matches[0],1,strlen($matches[0]));
// 						$memorisation = true;
// 					} else {
// 						if (strpos($tampon,'[/TAG') !== false) {
// 							$memorisation = false;
// 						}
// 						if ($memorisation === true) {
// 							/* Memorisation du code specifique entre les deux TAG */
// 							$memo .= $tampon;
// 						}
// 						if ($memorisation === false && strlen($memo) > 0) {
// 							/* Sauvegarde du code specifique pour le re-injecter plus tard */
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
								/* En cours de fichier => TAGx, il fau vider la memorisation anterieure */
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
								/* Sauvegarde du code specifique pour le re-injecter plus tard */
								$this->_aListOfSpecificCode[$nomTagFunction] = $memoFunction;
							}
						}
					}
				}
			}
// 			debug($this->_aListOfSpecificCode);

			/* Creation du fichier */
			$fichierClasse = fopen($cheminFichier,"w");
			fwrite($fichierClasse,"<?php\n");
			
			fwrite($fichierClasse,"\t/*\n");
			fwrite($fichierClasse,"\t * AUTO-GENERATED FILE on ".date("d/m/Y H:i:s")." BY FactoryGenerator.class.php\n");
			fwrite($fichierClasse,"\t */\n\n");
			
			fwrite($fichierClasse,"abstract class Factory".ucfirst($this->getNomTableEnCoursDeTraitement())." {\n");
			
			/* une place pour un code specifique sur les attributs */
			fwrite($fichierClasse,$this->addSpecificCodeTagFunction(ucfirst($this->getNomTableEnCoursDeTraitement()).'1'));
// 			fwrite($fichierClasse,$this->addSpecificCodeTag());
			fwrite($fichierClasse,"\n");
			
			/* GETALL */
			fwrite($fichierClasse,$this->generateGetAllFromTable());
			fwrite($fichierClasse,"\n");

//			/* GET BY ID */
//			fwrite($fichierClasse,$this -> generateGetFromTable(true));
//			fwrite($fichierClasse,"\n");
			
			/* GET BY xxx */
			/* si un champ IDxxx est detecte, il faut alors creer la methode associees de la factory */
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
							
// 				/* si le champ commence par 'id' mais qu'il est plus long que 2 caracteres */
// 				if ((substr($champ['Field'],0,2) == 'id' && strlen($champ['Field']) > 2)) {
				if ($nomTableDansNomChamp === true) {
					debug("Adoss&eacute; &agrave; ".$champ['Field'], true);
					fwrite($fichierClasse,$this->generateGetFromTableFromFK($champ['Field']));
					fwrite($fichierClasse,"\n");
// 					/* CAs particulier pour UNiteJoueur*/
// 					if ($champ['Field'] == 'unitejoueur') {
// 						fwrite($fichierClasse,$this -> generateGetEmptyObjectFromTable('unitejoueur'));
// 						fwrite($fichierClasse,"\n");
// 					}
				}
/*				if (in_array('idjoueur',$champ)) {
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
					fwrite($fichierClasse,$this -> generateGetEmptyObjectFromTable('unitejoueur'));					
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
*/
			}

			/* Ajout des balises de code specifique */
//			$chaine = $this->addSpecificCodeTag();
// 			fwrite($fichierClasse,$this->addSpecificCodeTag());
			
			fwrite($fichierClasse,$this->addSpecificCodeTagFunction(ucfirst($this->getNomTableEnCoursDeTraitement()).'2'));
			$this->initTagNumberFunction();
			
			fwrite($fichierClasse,"\n");
			
			/* Fin du fichier */
			fwrite($fichierClasse,"}\n");
			fwrite($fichierClasse,"?>");
			fclose($fichierClasse);

			/* Init du TAG Number */
			$this->initTagNumber();
			
			/* Init du tableau de code specifique pour la classe en cours */
			$this->_aListOfSpecificCode = array();
			
			debug("<hr>", true);
 		} // end foreach($tables)
 	}
 }
?>