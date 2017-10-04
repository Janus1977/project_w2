<?php

	/**
	 * Autoload de classes
	 * @param str $class_name nom de la classe
	 * @return bool
	 */
	function autoload($class_name) {
// 		$classe_seule = array('database','comparator');
		$repertoire = "";
		/* Recherche dans les classes objets */
// 		try {
		if (stristr($class_name,'exception')) {
			require_once _DIR_CLASS_EXCEPTION_.$class_name._CLASS_EXTENSION_;
		} else if (stristr($class_name,'Generator')) {
			require_once _DIR_BASE_CLASS_.$class_name._CLASS_EXTENSION_;
		} else if (stristr($class_name,'Manager')) {
			require_once _DIR_CLASS_MANAGER_.$class_name._CLASS_EXTENSION_;
		} else if (stristr($class_name,'Factory')) {
			require_once _DIR_CLASS_FACTORY_.$class_name._CLASS_EXTENSION_;
		} else if (stristr($class_name,'database')) {
			require_once _DIR_CLASS_DB_.$class_name._CLASS_EXTENSION_;
		} else if (stristr($class_name,'comparator')) {
			require_once _DIR_CLASS_COMPARATOR_.$class_name._CLASS_EXTENSION_;
		} else if (stristr($class_name,'Action')) {
			require_once _DIR_CLASS_ACTION_.$class_name._CLASS_EXTENSION_;
		} else if (stristr($class_name,'Validator')) {
			require_once _DIR_CLASS_VALIDATOR_.$class_name._CLASS_EXTENSION_;
		} else if (stristr($class_name,'Smarty')) {
			require_once _SMARTY_CLASS_;
		} else {
			//test sur racine des classes
			if($file = searchFile(_DIR_CLASS_.'obj/',$class_name._CLASS_EXTENSION_)) {
				require_once _DIR_CLASS_OBJ_.$class_name._CLASS_EXTENSION_;
			}
		}
// 		} catch (Exception $e) {
// 			//si fichier non trouve, la classe n'existe pas, on leve une exception
// 			debug($e -> getMessage().','.$e -> getCode());
// 			throw new Exception($e -> getMessage(),$e -> getCode());
// 			//On arrete l'application car une classe est manquante.
// 			//exit;
// 		}
		
// 		if (!in_array($class_name,$classe_seule)) {
//  			if (preg_match("/Generator$/",$class_name) == 1) {
//  				$repertoire = '';
//  			} else if (preg_match("/^Manager[a-zA-Z]/",$class_name) == 1) {
// 				$repertoire = 'managers';
// 			} else if (preg_match("/^Factory[a-zA-Z]/",$class_name) == 1) {
// 				$repertoire = 'factories';
// 			} else if (preg_match("/^exception[a-zA-Z]/",$class_name) == 1) {
// 				$repertoire = substr($class_name,0,9);
// 			} else if (preg_match("/[a-zA-Z]Validator$/",$class_name) == 1) {
// 				$repertoire = 'validator';
// 			} else {
// 				$repertoire = 'obj';
// 			}
// 			$repertoire = _DIR_CLASS_.$repertoire.'/';
// 		} else {
// 			$repertoire = _DIR_CLASS_;
// 		}
//         debug($repertoire.$class_name._CLASS_EXTENSION_);
// 		try {
// 			//test sur racine des classes
// 			if($file = searchFile($repertoire,$class_name._CLASS_EXTENSION_)) {
// 				include_once $file;
// 			}
// 		} catch (Exception $e) {
// 			//si fichier non trouve, la classe n'existe pas, on leve une exception
//             debug($e -> getMessage().','.$e -> getCode());
// 			throw new Exception($e -> getMessage(),$e -> getCode());
// 			//On arrï¿½te l'application car une classe est manquante.
// //			exit;			
// 		}
	}
	 
	/**
	 * Autoload de classes
	 * @param str $class_name nom de la classe
	 * @return bool
	 */
	function autoload_ajax($class_name) {
		$classe_seule = array('database','comparator');
		$repertoire = "";
		if (stristr($class_name,'exception')) {
			require_once _DIR_CLASS_.'exception/'.$class_name._CLASS_EXTENSION_;
		} else if (stristr($class_name,'Generator')) {
			require_once _DIR_CLASS_.$class_name._CLASS_EXTENSION_;
		} else if (stristr($class_name,'Manager')) {
			require_once _DIR_CLASS_.'managers/'.$class_name._CLASS_EXTENSION_;
		} else if (stristr($class_name,'Factory')) {
			require_once _DIR_CLASS_.'factories/'.$class_name._CLASS_EXTENSION_;
		} else if (stristr($class_name,'database')) {
			require_once _DIR_CLASS_.'database/'.$class_name._CLASS_EXTENSION_;
		} else if (stristr($class_name,'comparator')) {
			require_once _DIR_CLASS_.'comparator/'.$class_name._CLASS_EXTENSION_;
		} else {
			/* Recherche dans les classes objets */
			try {
				//test sur racine des classes
				if($file = searchFile(_DIR_CLASS_.'obj/',$class_name._CLASS_EXTENSION_)) {
					require_once $file;
				}
			} catch (Exception $e) {
				//si fichier non trouve, la classe n'existe pas, on leve une exception
				debug($e -> getMessage().','.$e -> getCode());
				throw new Exception($e -> getMessage(),$e -> getCode());
				//On arrï¿½te l'application car une classe est manquante.
				//			exit;
			}
		}
// 		if (!in_array($class_name,$classe_seule)) {
//  			if (preg_match("/Generator$/",$class_name) == 1) {
//  				$repertoire = '';
//  			} else if (preg_match("/^Manager[a-zA-Z]/",$class_name) == 1) {
// 				$repertoire = 'managers';
// 			} else if (preg_match("/^Factory[a-zA-Z]/",$class_name) == 1) {
// 				$repertoire = 'factories';
// 			} else if (preg_match("/^exception[a-zA-Z]/",$class_name) == 1) {
// 				$repertoire = substr($class_name,0,9);
// 			} else if (preg_match("/[a-zA-Z]Validator$/",$class_name) == 1) {
// 				$repertoire = 'validator';
// 			} else {
// 				$repertoire = 'obj';
// 			}			
// 			$repertoire = _DIR_CLASS_.$repertoire;
// 		} else {
// 			$repertoire = _DIR_CLASS_;
// 		}
		
// 		try {
// 			//test sur racine des classes
// 			if($file = searchFile($repertoire,$class_name._CLASS_EXTENSION_)) {
// 				include_once $file;
// 			}
// 		} catch (Exception $e) {
// 			//si fichier non trouvï¿½, la classe n'existe pas, on leve une exception
//             debug($e -> getMessage().','.$e -> getCode());
// //			throw new Exception($e -> getMessage(),$e -> getCode());
// 			//On arrï¿½te l'application car une classe est manquante.
// 			exit;			
// 		}
	}
	  
	/**
	* Fonction servant au debug de l'application
	* @param  $text le texte a afficher
	*/
// 	function debug ($text) {
// 		if (is_array($text) || is_object($text)) {
// 			echo '<pre>'.print_r($text,true).'</pre>'.PHP_EOL;
// 		} else {
// 			echo '<br/>'.$text.PHP_EOL;
// 		}
// 	}
	function debug ($text,$force=false) {
		if (defined('_DEBUG_') || $force) {
			if (is_array($text) || is_object($text)) {
				echo '<pre>'.print_r($text,true).'</pre>'.PHP_EOL;
			} else {
				echo '<br/>'.$text.PHP_EOL;
			}
		}
	}
	
	function informe($text) {
		echo '<span style="background-color:green; color:white;">'.traduitTimeStampDate().': '.$text.'</span><br/>'.PHP_EOL;
	}	
	
	function alerte($text) {
		echo '<br/><span style="background-color:red;">'.traduitTimeStampDate().': '.$text.'</span><br/>'.PHP_EOL;
	}
	
	function traduitTimeStampDate($timestamp=0) {
		date_default_timezone_set('Europe/Paris');
		if ($timestamp == 0) {
			return date("d-m-Y H:i:s");
		} else {
			return date("d-m-Y H:i:s",$timestamp);
		}
	}
	
	function traduitDureeHeureMinutesSecondes($duree=0) {
		date_default_timezone_set('Europe/Paris');
// 		if ($timestamp == 0) {
// 			return date("d-m-Y H:i:s");
// 		} else {
			return date("H:i:s",$duree);
// 		}
	}
	
	/**
	 * Recherche d'un fichier dans un dossier et son arborescence
	 * @param str $dir dossier a chercher
	 * @param str $filename nom du fichier a chercher
	 * @return str chemin complet du fichier ou bool false si introuvable
	 */
	function searchFile($dir,$filename) {
		//si pas de slash final on l'ajoute
		$last = $dir[strlen($dir)-1];
		if($last != '/' && $last != '\\') {
			$dir .= '/';
		}
		//chargement dossier
		if (is_dir($dir)) {
			$filelist = new DirectoryIterator($dir);
			//on boucle le contenu
			foreach($filelist as $file) {
				//si . ou .. on zappe
				if ($file->isDot()) {
					continue;
				}
				//si dir on explore
				if($file->isDir()) {
					//si on trouve on renvoi
					if($res = searchFile($dir.$file->getFilename(),$filename)) {
						return $res;
					//sinon on continue
					} else {
						continue;
					}
				} else {
					//si on a un fichier correspondant ï¿½ ce qu'on cherche, on le renvoi
					if($file->getFilename() == $filename) {
						return $dir.$file->getFilename();
					}				
				}
			}
		} else {
			return "<br/>Dossier ".$dir." inexistant";
		}
	}
	
	function dirToUrl($data) {
		return str_replace(_DIR_BASE_,_URL_BASE_,$data);
	}
	
	/**
	 * Fonction protectionFormulaire() qui protï¿½ge les formulaires du site.
	 * Un log des tentatives est mis en place.
	 */
	 function protectionFormulaire($data) {
		if (is_array($data)) {
			foreach ($data AS $cle => $valeur) {
				if (is_array($data[$cle])) {
					$data[$cle] = protectionFormulaire($data[$cle]);
				} else {
                    if (is_numeric($valeur)) {
                        //cast pour les nombres
                        $data[$cle] = intval($valeur);
                    } else {
                        //protection des chaines
                        $data[$cle] = htmlspecialchars($valeur);
                    }
				}
			}
		} else {
			if (is_numeric($valeur)) {
			//cast pour les nombres
				$data[$cle] = intval($valeur);
			} else {
			//protection des chaines
				$data[$cle] = htmlspecialchars($valeur);
			}
		}
		return $data;
	 }
	 
	 function creeStructureModule($nomModule) {
	 	mkdir(_MODULES_BASES_.$nomModule);
	 	creeFichier(_MODULES_BASES_.$nomModule, 'index.php',$nomModule);
	 	creeFichier(_MODULES_BASES_.$nomModule, $nomModule.'.php',$nomModule);
	 	
	 	mkdir(_MODULES_BASES_.$nomModule.'/config');
	 	creeFichier(_MODULES_BASES_.$nomModule.'/config', 'config.php',$nomModule);
	 	
	 	mkdir(_MODULES_BASES_.$nomModule.'/includes');
	 	creeFichier(_MODULES_BASES_.$nomModule.'/includes', 'fonctions.inc.php',$nomModule);

	 	mkdir(_MODULES_BASES_.$nomModule.'/javascript');
	 	creeFichier(_MODULES_BASES_.$nomModule.'/javascript', 'javascript.js',$nomModule);
	 	
	 	mkdir(_MODULES_BASES_.$nomModule.'/templates');
	 	creeFichier(_MODULES_BASES_.$nomModule.'/templates', $nomModule.'.tpl',$nomModule);
	 	
	 	mkdir(_MODULES_BASES_.$nomModule.'/templates_c');
	 }
	 
	 function delTree($dir) {
	 	$files = array_diff(scandir($dir), array('.','..'));
	 	foreach ($files as $file) {
	 		if (is_dir("$dir/$file")) {
	 			delTree("$dir/$file");
	 		} else {
	 			debug("$dir/$file");
// 	 			unlink("$dir/$file");
	 		} 
	 	}
	 	debug($dir);
// 	 	return rmdir($dir);
	 }
	 
	 /**
	  * Retourne la valeur a faire sur un de pour toucher au CaC
	  * @param unknown $forceArme
	  * @param unknown $enduranceUnite
	  */
	 function jetPourToucherCaC($ccA,$ccD) {
	 	$atableJetBlesser = array(
	 			1 =>	array(1=>4,2=>4,3=>5,4=>5,5=>5,6=>5,7=>5,8=>5,9=>5,10=>5),
	 			2 =>	array(1=>3,2=>4,3=>4,4=>4,5=>5,6=>5,7=>5,8=>5,9=>5,10=>5),
	 			3 =>	array(1=>3,2=>3,3=>4,4=>4,5=>4,6=>4,7=>5,8=>5,9=>5,10=>5),
	 			4 =>	array(1=>3,2=>3,3=>3,4=>4,5=>4,6=>4,7=>4,8=>4,9=>5,10=>5),
	 			5 =>	array(1=>3,2=>3,3=>3,4=>3,5=>4,6=>4,7=>4,8=>4,9=>4,10=>4),
	 			6 =>	array(1=>3,2=>3,3=>3,4=>3,5=>3,6=>4,7=>4,8=>4,9=>4,10=>4),
	 			7 =>	array(1=>3,2=>3,3=>3,4=>3,5=>3,6=>3,7=>4,8=>4,9=>4,10=>4),
	 			8 =>	array(1=>3,2=>3,3=>3,4=>3,5=>3,6=>3,7=>3,8=>4,9=>4,10=>4),
	 			9 =>	array(1=>3,2=>3,3=>3,4=>3,5=>3,6=>3,7=>3,8=>3,9=>4,10=>4),
	 			10 =>	array(1=>3,2=>3,3=>3,4=>3,5=>3,6=>3,7=>3,8=>3,9=>3,10=>4)
	 	);
	 	return $atableJetBlesser[$ccA][$ccD];
	 }
	 
	 /**
	  * Retourne la valeur a faire sur un de pour toucher sur un tir
	  * @param number $ctTireur
	  * @return number
	  */
	 function jetPourToucherTir($ctTireur) {
	 	return (7 - $ctTireur);
	 }
	 
	 /**
	  * Retourne la valeur a faire sur un de pour blesser apres avoir touche
	  * @param unknown $forceArme
	  * @param unknown $enduranceUnite
	  */
	 function jetPourBlesser($forceArme,$enduranceUnite) {
	 	$atableJetBlesser = array(
	 			1 =>	array(1=>4,2=>5,3=>6,4=>6,5=>-1,6=>-1,	7=>-1,	8=>-1,	9=>-1,	10=>-1),
	 			2 =>	array(1=>3,2=>4,3=>5,4=>6,5=>6,	6=>-1,	7=>-1,	8=>-1,	9=>-1,	10=>-1),
	 			3 =>	array(1=>2,2=>3,3=>4,4=>5,5=>6,	6=>6,	7=>-1,	8=>-1,	9=>-1,	10=>-1),
	 			4 =>	array(1=>2,2=>2,3=>3,4=>4,5=>5,	6=>6,	7=>6,	8=>-1,	9=>-1,	10=>-1),
	 			5 =>	array(1=>2,2=>2,3=>2,4=>3,5=>4,	6=>5,	7=>6,	8=>6,	9=>-1,	10=>-1),
	 			6 =>	array(1=>2,2=>2,3=>2,4=>2,5=>3,	6=>4,	7=>5,	8=>6,	9=>6,	10=>-1),
	 			7 =>	array(1=>2,2=>2,3=>2,4=>2,5=>2,	6=>3,	7=>4,	8=>5,	9=>6,	10=>-1),
	 			8 =>	array(1=>2,2=>2,3=>2,4=>2,5=>2,	6=>2,	7=>3,	8=>4,	9=>5,	10=>6),
	 			9 =>	array(1=>2,2=>2,3=>2,4=>2,5=>2,	6=>2,	7=>2,	8=>3,	9=>4,	10=>5),
	 			10 =>	array(1=>2,2=>2,3=>2,4=>2,5=>2,	6=>2,	7=>2,	8=>2,	9=>3,	10=>4)
	 	);
	 	return $atableJetBlesser[$forceArme][$enduranceUnite];
	 }
	 
	 /**
	  * Retourne un tableau [lance, maxPossible]
	  * @param array $listeOrdres
	  * @param string $array
	  * @return Ambigous <multitype:number multitype:number  Ambigous <number, NULL, string> , multitype:number NULL string mixed Ambigous <> >
	  */
	 function lanceDes2($aListeOrdres,$array=false) {
	 	/** le D de dispersion oriente le tir d'artillerie ou d'arme lourde à obus */
	 	$deOrientation = array('E','NE','N','NO','O','SO','S','SE','HIT');
	 
	 	/** Le D rouge du jeu de plateau Space Crusade */
	 	$deR = array(3,2,1,0,0,0);
	 
	 	/** Le D blanc du jeu de plateau Space Crusade */
	 	$deB = array(2,1,0,0,0,0);

	 	/** Le D de tir soutenu */
	 	$deTirsoutenu = array(1,2,-1,2,1,3); // -1 === enrayement de l'arme => un tour pour desenrayer
	 	
	 	/** le D 8 pour les degats sur un vehicule */
	 	$deHitvehicule = array();
	 	
	 	if (!$array) {
	 		$resultat = array(0,0);
	 	}
	 	
	 	if (!is_array($aListeOrdres)) {
	 		$listeOrdres[] = $aListeOrdres;
	 	} else {
	 		$listeOrdres = $aListeOrdres;
	 	}
	 	
	 	foreach ($listeOrdres AS $ordre) {
	 		// Recherche du signe + ou -
	 		if (strpos($ordre,'+') !== false) {
	 			// Addition d'un modificateur
	 			$aOrdres = explode('+',$ordre);
	 			$ajout = true;
	 		} else if (strpos($ordre,'-') !== false) {
	 			// Soustraction d'un modificateur
	 			$aOrdres = explode('-',$ordre);
	 			$ajout = false;
	 		} else {
	 			$aOrdres = array($ordre);
	 		}
	 		
	 		if (isset($aOrdres[1]) && strpos(strtolower($aOrdres[1]),'d') !== false) {
	 			// Si le modificateur est un lance de de, il faut le faire
	 			$aOrdres[1] = lanceDes2(array($aOrdres[1]));
	 		}
	 
	 		// A ce moment, nous avons un array:
	 		// 		aOrdres(0=>'XdY',1=>z)
	 		// Il faut alors savoir combien de dé et de quel type
	 		$aNombreType = explode('d',strtolower(trim($aOrdres[0])));
	 		//Le lance du(des) dé(s)
	 		$cpt = 0;
	 		$valeurLancer = array(0,0);
	 		
	 		//dans le DO/WHILE on calcule le jet du de et
	 		//le maximum atteignable stockes dans $valeurLancer
	 		do {
	 			if (is_numeric($aNombreType[1])) {
	 				$valeurLancer[0] += mt_rand(1,$aNombreType[1]);
	 				$valeurLancer[1] += $aNombreType[1];
	 			} else {
	 				if (shuffle(${'de'.ucfirst($aNombreType[1])})) {
	 					if (!in_array(ucfirst($aNombreType[1]), array('Hitvehicule','Orientation','Tirsoutenu'))) {
	 						$valeurLancer[0] +=  ${'de'.ucfirst($aNombreType[1])}[mt_rand(0,(sizeof(${'de'.ucfirst($aNombreType[1])}) - 1))];
	 						$valeurLancer[1] += max(${'de'.ucfirst($aNombreType[1])});
	 					} else {
	 						if ($cpt > 0) {
	 							$valeurLancer[0] .= ' | ';
	 						}
	 						if ($cpt == 0) {
	 							$valeurLancer[0] =  ${'de'.ucfirst($aNombreType[1])}[mt_rand(0,(sizeof(${'de'.ucfirst($aNombreType[1])}) - 1))];
	 						} else {
	 							$valeurLancer[0] .=  ${'de'.ucfirst($aNombreType[1])}[mt_rand(0,(sizeof(${'de'.ucfirst($aNombreType[1])}) - 1))];
	 						}
	 					}
	 				}
	 			}
	 			$cpt += 1;
	 		} while ($cpt < $aNombreType[0]);
	 		
	 		//Ajout du modificateur
	 		if (is_numeric($valeurLancer[0]) && isset($ajout) && $ajout === true) {
	 			$valeurLancer[0] += ((sizeof($aOrdres) == 2) ? intval($aOrdres[1]) : 0);
	 			$valeurLancer[1] += intval($aOrdres[1]);
	 		} else if (is_numeric($valeurLancer[0]) && isset($ajout) && $ajout === false) {
	 			$valeurLancer[0] -= ((sizeof($aOrdres) == 2) ? intval($aOrdres[1]) : 0);
	 			$valeurLancer[1] -= intval($aOrdres[1]);
	 		}
	 		
	 		//Protection valeurs négatives
	 		if (is_numeric($valeurLancer[0]) && $valeurLancer[0] < 0) {
	 			$valeurLancer[0] = 0;
	 			$valeurLancer[1] = 0;
	 		}
	 		
	 		//array correspond a un retour sous forme de tableau des differents lancer de des
	 		if ($array) {
	 			// Il faut retourner autant de valeur que de des lances
	 			$resultat[$ordre] = $valeurLancer[0];
	 		} else {
				if (in_array(ucfirst($aNombreType[1]), array('Orientation','Tirsoutenu'))) {
					//Concatenation des resultats des lancers non numeriques
				 	$resultat = '';
				 	$resultat .= $valeurLancer[0];
				} else {
				 	//somme des lancers numeriques et des maximum sur le tout
				 	$resultat[0] += $valeurLancer[0]; //le lancer
				 	$resultat[1] += $valeurLancer[1]; //le max possible
				}
	 		}
	 	} // FIN foreach listeordres
	 	
	 	//Type de sortie
	 	if (!$array) {	 		
	 		if (!in_array(ucfirst($aNombreType[1]), array('Orientation','Tirsoutenu'))) {
	 			$resultat = $resultat[0];
	 		}
	 	}
	 	return $resultat;
	 }
	
	function listeImages($repertoire,&$listeImages=null) {
		if (is_null($listeImages)) {
			$listeImages = array();
		}
		$listeExtensions = array('jpg','jpeg','gif','png');
		$ressource = opendir($repertoire) or die('Erreur de listage : le r&eacute;pertoire "'.$repertoire.'" n\'existe pas');
		while($element = readdir($ressource)) {
			/* Surtout ne pas supprimer le repertoire d'upload */
			if($element != '.' && $element != '..' && $element != 'miniature') {
				if (is_dir($repertoire.'/'.$element)) {
					listeImages($repertoire.'/'.$element,$listeImages);
				} else {
					/* Si c'est une image */
					$elements = explode(".",$element);
					if (in_array(strtolower($elements[1]),$listeExtensions)) {
						$listeImages[] = array('chemin' => $repertoire.$element, 'nom' => $element);
					}
				}
			}
		}	
		closedir($ressource);
		return $listeImages;
	}
	
	function nettoieTables() {
		$aListeRequetes = array(
				"UPDATE tile SET unite=0 WHERE unite NOT IN (SELECT id FROM unite)",
				"UPDATE tile SET unite_joueur=0 WHERE unite_joueur NOT IN (SELECT id FROM unite_joueur)",
				"UPDATE tile SET decor=0 WHERE decor NOT IN (SELECT id FROM decor)",
				"UPDATE tile SET equipement=0 WHERE equipement NOT IN (SELECT id FROM equipement)",
				"UPDATE tile SET equipement_joueur=0 WHERE equipement_joueur NOT IN (SELECT id FROM equipement_joueur)"
		);
		foreach ($aListeRequetes AS $requete) {
			debug($requete,true);
			if (!database::getInstance()->executeRequete($requete)) {
				echo ' => KO';
				debug("Erreur dans le lancement de la requ&ecirc;te:<br>".$requete);
			} else {
				echo ' => OK';
			}
		}
	}
?>

