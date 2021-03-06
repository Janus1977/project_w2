<?php
		//Generated by ManagerGenerator::generate() on 13/06/2017 12:53:20
class ManagerCarte {
	/** Instance de la classe (managerCarte) */
	private static $_instance = null;

	/** Connexion a la base de donnees (database) */
	private static $_oConnexion = null;

	/** Liste des objet de la classe (Carte) */
	private static $_aListeCarte = array();

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Carte11]*/	/*[/TAG-Carte11]*/


	protected function __construct() {
		//Generated by ManagerGenerator::generateConstruct() on 13/06/2017 12:53:20
	}

	public function __destruct() {
		//Generated by ManagerGenerator::generateDestruct() on 13/06/2017 12:53:20
		// TODO ??
	}

	public static function getInstance() {
		//Generated by ManagerGenerator::generateGetInstance() on 13/06/2017 12:53:20
		if (is_null(self::$_instance)) {
			self::$_instance = new self;
		}
		return self::$_instance;
	}

	public function __clone() {
		//Generated by ManagerGenerator::generateClone() on 13/06/2017 12:53:20
		throw new Exception(get_class($this).": Le clonage n'est pas autoris&eacute;", E_USER_ERROR);
	}

	public function setConnexion() {
		//Generated by ManagerGenerator::generateSetConnexion() on 13/06/2017 12:53:20
		self::$_oConnexion = database::getInstance();// pas besoin de parametrer, un manager arrive apres la conf
	}

	public function __set($name,$id) {
		//Generated by ManagerGenerator::generateSet() on 13/06/2017 12:53:20
		throw new Exception(get_class($this).": Le set 'noname' n'est pas autoris&eacute;", E_USER_ERROR);
	}

	public function __get($name) {
		//Generated by ManagerGenerator::generateGet() on 13/06/2017 12:53:20
		throw new Exception(get_class($this).": Le get 'noname' n'est pas autoris&eacute;", E_USER_ERROR);
	}

	public function getById($id=-1) {
		//Generated by ManagerGenerator::generateGetById() on 13/06/2017 12:53:20
		if ($id == -1) {
			//Toute les informations
			return FactoryCarte::getFromTableCarte($id);
		} else {
			//Verification si l'objet n'est pas en memoire
			if ($id > 0 && !array_key_exists($id,self::$_aListeCarte)) {
				self::$_aListeCarte[$id] = FactoryCarte::getFromTableCarte($id);
			}
		}
		return self::$_aListeCarte[$id];
	}

	public function getFromExtTableDimension($dimension=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK() on 13/06/2017 12:53:20
		//Verification en memoire
		foreach (self::$_aListeCarte AS $oCarte) {
			if ($oCarte->getDimension() == $dimension) {
				return $oCarte;
			}
		}
		// Appel de la methode de la Fabrique
		$oCarte = FactoryCarte::getFromExtTableDimension($dimension);
		// Memorisation pour plus tard
		self::$_aListeCarte[$oCarte->getId()] = $oCarte;
		// Renvoie de la donnee
		return $oCarte;
	}

	public function deleteCompositeLinksFromDimension($iddimension) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks() on 13/06/2017 12:53:20
		//TODO
	}

	public function delete($object=array()) {
		//Generated by ManagerGenerator::generateDelete() on 13/06/2017 12:53:20
		// Verification
		if (empty($object)) {
			throw new Exception(get_class($this).": La suppression se fait sur un objet.", E_USER_ERROR);
		}
		// si ce n'est pas une instance de la classe, on la cree
		if (! $object instanceof Carte) {
			$oCarte = new Carte($object['id'],$object['nom'],$object['dimension'],$object['apercu'],$object['edition']);
		} else {
			$oCarte = $object;
		}
		// Appel de la methode delete de l'objet
		// Tout se passe dans une transaction ouverte plus haut
			// Execution de la requete
		if (database::getInstance()->executeRequete($oCarte->delete())) {
			// Requete OK
			unset(self::$_aListeCarte[$oCarte->getId()]);
			return true;
		} else {
			// Requete NOK lancement d'une exception PDO
			throw new PDOException('Erreur sur delete (Carte)');
		}
	}

	public function update($object=array()) {
		//Generated by ManagerGenerator::generateUpdate() on 13/06/2017 12:53:20
		// Verification
		if (empty($object)) {
			throw new Exception(get_class($this).": la mise &agrave; jour se fait sur un objet.", E_USER_ERROR);
		}
		// si ce n'est pas une instance de la classe, on la cree
		if (! $object instanceof Carte) {
			$oCarte = new Carte($object['id'],$object['nom'],$object['dimension'],$object['apercu'],$object['edition']);
		} else {
			$oCarte = $object;
		}
		// Maintenant on compare avec celle en session
		if (!empty($_SESSION['carte']) && sizeof($_SESSION['carte']->compareTo($oCarte)) > 0) {
			$_SESSION['carte'] = $oCarte;
		}
		if ($oCarte->getId() == 0) {
			//Go TO SAVE
			self::save($oCarte);
		} else {
			// on update car les objets sont different
			if (database::getInstance()->executeRequete($oCarte->update()) === true) {
				//maj id dans la liste
				self::$_aListeCarte[$oCarte->getId()] = $oCarte;
				return true;
			} else {
				return false;
			}
		}
	}

	public function save($object=array()) {
		//Generated by ManagerGenerator::generateSave() on 13/06/2017 12:53:20
		// Verification
		if (empty($object)) {
			throw new Exception(get_class($this).": la sauvegarde se fait sur un objet.", E_USER_ERROR);
		}
		// si ce n'est pas une instance de la classe, on la cree
		if (! $object instanceof Carte) {
			$oCarte = new Carte($object['id'],$object['nom'],$object['dimension'],$object['apercu'],$object['edition']);
		} else {
			$oCarte = $object;
		}
		if ($oCarte->getId() > 0) {
			//Go TO UPDATE
			self::update($oCarte);
		} else {
			// Appel de la methode update de l'objet
			if (database::getInstance()->executeRequete($oCarte->save()) === true) {
				//maj id dans la liste
				self::$_aListeCarte[$oCarte->getId()] = $oCarte;
				return true;
			} else {
				return false;
			}
		}
	}

	public function findBy($champ,$data='') {
		//Generated by ManagerGenerator::generateFindBy() on 13/06/2017 12:53:20
		// creation d'un objet de base de la classe
		$object = new Carte();
		$resultat = array();
		for ($i = 0; $i < sizeof($this -> _aListeCarte); $i++) {
			$object = $this -> _aListeCarte[$i];
			if ($object -> {'_'.strtolower($champ)} == $data) {
				$resultat[] = $object;
			}
		}
		if (sizeof($resultat) > 0) {
			//existe
			return $resultat;
		} else {
			//n'existe pas
			return "Pas de Carte de ".strtolower($champ)." '".$data."'";
		}
	}

	public function getCarteVide() {
		//Generated by ManagerGenerator::generateGetObjetVide() on 13/06/2017 12:53:20
		return new Carte();
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Carte21]*/
	
		/**
		 * Permet de recuperer une carte par son nom (unique)
		 * @param String $name le nom recherche dans la table carte
		 * @return Carte l'objet carte trouv� ou null
		 */
		public function getCarteByName($name) {
			return FactoryCarte::getCarteByName($name);
		}
	
		public function getCartesDisponibles() {
			return FactoryCarte::getCartesDisponibles();
		}
	
	    /**
         *  Methode pour recuperer une zone deffinie par les 4 points en parametres
         * @param int $idcarte		l'identifiant de la carte
         * @param int $xDebut		coordonnee X debut de la plage
         * @param int $xFin			coordonnee X fin de la plage
         * @param int $yDebut		coordonnee Y de la plage
         * @param int $yFin			coordonnee Y de la plage
         * @return array 				la liste des cases de la carte
         */
        public function getCasesCarteFromRange($idcarte,$xDebut=0,$xFin=0,$yDebut=0,$yFin=0) {
			return ManagerTile::getInstance()->getCasesCarteFromRange($idcarte,$xDebut,$xFin,$yDebut,$yFin);
		}
	
		/**
		 * Methode retournant la liste des cartes en edition
		 * @return array liste des cartes en edition
		 */
		public function getCartesEnEdition() {
			return FactoryCarte::getCartesEnEdition();
		}
	
		/**
		 * Methode retournant la carte en edition choisie
		 * @param idcarte l'identifiant de la carte choisie
		 * @return array carte en edition choisie
		 */
		public function getCarteEnEdition($idCarte) {
			return FactoryCarte::getCarteEnEdition($idCarte);
		}
		
		/**
		 * Fonction permettant de creer un plateau de jeu pour la carte donnee.
		 * Cette image de depart est blanche, vide quoi ;-p
		 * @param string 	cheminVersPlateauCarte		le nom de la carte => du plateau de jeu avec l'extension
		 * @param int 		largeur						la largeur en pixels si la carte n'existe pas
		 * @param int 		hauteur						la hauteur en pixels si la carte n'existe pas
		 * @param array 	plateauxCarte 				la liste des objets "Plateau"
		 */
		public function creePlateauCarte($cheminVersPlateauCarte,$largeur,$hauteur, $plateauxCarte) {
			$debugFile = fopen(_DIR_BASE_.'debugFile.txt','w');
			fwrite($debugFile,"cheminVersPlateauCarte = ".$cheminVersPlateauCarte."\n");
			fwrite($debugFile,"largeur = ".$largeur."\n");
			fwrite($debugFile,"hauteur = ".$hauteur."\n");
			fwrite($debugFile,"plateauxCarte = ".$plateauxCarte."\n");
		 	/* 1) creation image vide */
		 	/* Suppression */
		 	if (@unlink($cheminVersPlateauCarte)) {
		 		//rien faire
		 	}
		 	
			/* Creation */
		 	$imageVide = ImageCreateTrueColor($largeur, $hauteur)	or die ("Erreur pour cr&eacute;er l'image");
		 	ImageColorAllocate ($imageVide, 255, 0, 0);
		 	imagejpeg($imageVide, $cheminVersPlateauCarte);
	
			/* 2) creation de l'image definitive */
		 	/* Dimension de l'image */
		 	list($largeurImageDestination,$hauteurImageDestination) = getimagesize($cheminVersPlateauCarte);
		 	
		 	
		 	/* L'image vide pour la nouvelle destination */
		 	$im = ImageCreateTrueColor($largeurImageDestination, $hauteurImageDestination)	or die ("Erreur pour cr&eacute;er l'image");
		 	
		 	/* lecture de l'image destination */
	        $destination = imagecreatefromjpeg($cheminVersPlateauCarte);
	        
		 	/* La couleur de fond*/
		 	ImageColorAllocate ($im, 0, 0, 0);
		 	
		 	/* Placement des elements du plateau */
		 	if (is_array($plateauxCarte)) {
		 		foreach ($plateauxCarte AS $plateauCarte) {
		 			$imgPlateau = searchFile(_DIR_IMGS_PLATEAUX_,$plateauCarte->getPlateauObject()->getNom().'.jpg');
		 			fwrite($debugFile,"imagePlateau = ".$imgPlateau."\n");
		 			list($largeurImageSource,$hauteurImageSource) = getimagesize($imgPlateau);
		 			$source = imagecreatefromjpeg($imgPlateau);
		 			imagecopymerge(	$destination,								//image de sdestination
						 			$source,									//image source (a integrer dans la destination)
						 			(($plateauCarte->getX() - 1) * _TAILLE_CASE_X_),	//X coin sup gauche
						 			(($plateauCarte->getY() - 1) * _TAILLE_CASE_Y_),	//Y coin sup gauche
						 			0,											//X depart dans la source
						 			0,											//Y depart dans la source
						 			$largeurImageSource,						//largeur de la source
						 			$hauteurImageSource,						//hauteur de la source
						 			100);										// taux <=> transparence
		 		}
		 	} else {
		 		$imgPlateau = searchFile(_DIR_IMGS_PLATEAUX_,$plateauxCarte->getPlateauObject()->getNom().'.jpg');
		 		fwrite($debugFile,"imagePlateau = ".$imgPlateau."\n");
		 		list($largeurImageSource,$hauteurImageSource) = getimagesize($imgPlateau);
		 		$source = imagecreatefromjpeg($imgPlateau);
		 		imagecopymerge(	$destination,								//image de sdestination
						 		$source,									//image source (a integrer dans la destination)
						 		(($plateauxCarte->getX() - 1) * _TAILLE_CASE_X_),	//X coin sup gauche
						 		(($plateauxCarte->getY() - 1) * _TAILLE_CASE_Y_),	//Y coin sup gauche
						 		0,											//X depart dans la source
						 		0,											//Y depart dans la source
						 		$largeurImageSource,						//largeur de la source
						 		$hauteurImageSource,						//hauteur de la source
						 		100);										// taux <=> transparence
		 	}


		 	fclose($debugFile);
		 	/* L'enregistrement */ 
		 	imagejpeg($destination, $cheminVersPlateauCarte);
		}	

		/**
		  * Fonction permettant de creer un plateau de jeu vide pour la carte donnee.
		  * @param string	nomCarte	le nom de la carte => du plateau de jeu
		  * @param int		largeur		la largeur en pixels
		  * @param int		hauteur		la hauteur en pixels
		  */
		 public function creePlateauCarteVide($nomCarte,$largeur,$hauteur) {	 	
		 	/* L'image */
		 	$im = ImageCreateTrueColor($largeur, $hauteur)	or die ("Erreur pour cr&eacute;er l'image");
		 	
		 	/* La couleur de fond*/
		 	ImageColorAllocate ($im, 255, 0, 0);
		 	
		 	/* L'enregistrement */ 
		 	imagejpeg($im, _DIR_IMGS_CARTES_.$nomCarte.'.jpg');
		 }
		 
		 /**
		  * Fonction qui permettra de modifier une image de plateau de jeu (+/-)
		  * appelee lors de la modification de la taille de la carte.
		  * @param string	cheminVersImagePlateauAModifier
		  * @param int		nouvelleLargeur	nouvelle largeur en pixels
		  * @param int		nouvelleHauteur	nouvelle hauteur en pixels
		  */
		 public function redimensionnePlateauDeJeu($cheminVersImagePlateauAModifier,$nouvelleLargeur,$nouvelleHauteur) {
		 	/* Dimensions actuelles */
		 	list($largeurImageSource,$hauteurImageSource) = getimagesize($cheminVersImagePlateauAModifier);
		 	
		 	/* Divers tests */
		 	if ((($largeurImageSource < $nouvelleLargeur) && ($hauteurImageSource < $nouvelleHauteur)) ||
		 		($largeurImageSource < $nouvelleLargeur) ||
		 		($hauteurImageSource < $nouvelleHauteur)){
		 		debug("/!\\ Futures dimensions plus petites au celles actuelle /!\\");
		 	}
		 	/* L'image vide de destination */
		 	$destination = ImageCreateTrueColor($nouvelleLargeur, $nouvelleHauteur)	or die ("Erreur pour cr&eacute;er l'image");
		 	
		 	/* La couleur de fond*/
		 	ImageColorAllocate ($destination, 0, 0, 0);
		 	
		 	/* lecture de l'image a redimensionner */
	        $source = imagecreatefromjpeg($cheminVersImagePlateauAModifier);
	        
	 		imagecopymerge(	$destination,				//image de destination
	 						$source,					//image source (a integrer dans la destination)
	 						0,							//X coin sup gauche 
	 						0,							//Y coin sup gauche
	 						0,							//X depart dans la source
	 						0,							//Y depart dans la source
	 						$largeurImageSource,		//largeur de la source
	 						$hauteurImageSource,		//hauteur de la source
	 						100);						// taux <=> transparence
	        
		 	/* L'enregistrement */ 
		 	imagejpeg($destination, $cheminVersImagePlateauAModifier);
		 }
		 
		/**
		 * Methode de creation de la mini-carte a partir de l'image de la carte initiale
		 */
		public function creeMiniCarte($nomCarte) {
			/* le chemin vers la carte */
			$cheminVersPlateauCarte = _DIR_IMGS_CARTE_.$nomCarte.'.jpg';
			
			/* Les dimensions initiales en pixel */
			list($largeurPlateauJeu,$hauteurPlateauJeu) = getimagesize($cheminVersPlateauCarte);
			
			/* Calcul des dimensions finales, 1 case 40x40px <=> 4x4px */
			$largeurMiniCarte = $largeurPlateauJeu / 10;
			$hauteurMiniCarte = $hauteurPlateauJeu / 10;
			
			/* Image mini carte*/
			$image = ImageCreateTrueColor ($largeurMiniCarte, $hauteurMiniCarte) or die ("Erreur pour cr&eacute;er l'image mini carte");
			
			/* lecture image source */
			$source = ImageCreateFromJpeg($cheminVersPlateauCarte);
			
			/* Creation effective mini carte */
			ImageCopyResampled($image, $source, 0, 0, 0, 0, $largeurMiniCarte, $hauteurMiniCarte, $largeurPlateauJeu, $hauteurPlateauJeu);
			
			// sauvegarde du r�sultat
		    ImageJpeg($image, _DIR_IMGS_MINI_CARTES_.$nomCarte.'.jpg');
		    
		    /* on renvoie le chemin de la mini carte */
		    return _DIR_IMGS_MINI_CARTES_.$nomCarte.'.jpg';
		}
		
		/** A REVOIR */
		public function afficheCarte($idCarte) {
		    if (is_null($idCarte) || empty($idCarte) || $idCarte == 0) {
		        throw new Exception("Aucune carte choisie.");
		    }
		    
		    //il faut charger la carte et lui demander de s'afficher
		    if (sizeof(self::$_aListeCarte) == 0 || empty(self::$_aListeCarte[$idCarte])) {
		        debug("Chargement de la carte en memoire", true);
		        self::$_aListeCarte[$idCarte] = FactoryCarte::getFromTableCarte($idCarte);
		    } else {
		        debug("Carte deja en memoire", true);
		    }
		    
		    
		    self::$_aListeCarte[$idCarte]->setListeCasesCarte(ManagerTile::getInstance()->getFromExtTableCarte($idCarte));
		    
			
			//puis on affiche les cases
			// Chargement de Smarty
			require(_SMARTY_LOAD_);
			
			//PARAMETRES SMARTY COMMUNS
			$actionJavascriptSupplementaire = "";
			$smarty->assign('actionJavascriptSupplementaire',$actionJavascriptSupplementaire);
			
			// transfert a Smarty des etats occupation d'une case
			$smarty->assign('charset',_CHARSET_);
				
			$smarty->assign('VIDE',_CASE_VIDE_);
			$smarty->assign('PLATEAU',_CASE_PLATEAU_);
			$smarty->assign('DECOR',_CASE_DECOR_); 				// == plateau + decor
			$smarty->assign('UNITE',_CASE_UNITE_); 				// == plateau + unite
			$smarty->assign('DECOR_UNITE',_CASE_DECOR_UNITE_);	// == plateau + unite + decor
			$smarty->assign('LIEN',_CASE_LIEN_);				// == case lien entre les cartes
				
			$listeEtatCase = array(
					99 => "Passage",
					98 => "Bloqu&eacute;e"
			);
				
			$smarty->assign('DIR_BASE',_DIR_BASE_);
			$smarty->assign('URL_BASE',_URL_BASE_);
			$smarty->assign('URL_MODULES',_URL_MODULES_BASES_);
			$smarty->assign('URL_IMGS',_URL_IMGS_);
			$smarty->assign('URL_IMGS_MINI_CARTES',_URL_IMGS_MINI_CARTES_);
				
			/* Le random pour forcer au rechargement de l'image */
			$smarty->assign('random',time());
				
			//Initialisation du mode EDITION a faux par defaut
			 $smarty->assign('EDITION_CARTE',(empty($_SESSION['EDITION_CARTE'])) ? false : $_SESSION['EDITION_CARTE']);
			
// 			if (isset($aData['source']) &&
// 				(in_array($aData['source'], array('traitement_carte','test')))) {
				//Affichage seulement pour le module traitement_carte
				try {
				    $smarty->assign('cheminImageFond',str_replace(_DIR_IMGS_CARTE_,_URL_IMGS_CARTE_,searchFile(_DIR_IMGS_CARTE_,self::$_aListeCarte[$idCarte]->getNom().'.jpg')));
						
					// Creation image de fond a la volee
					ManagerCarte::getInstance()->creePlateauCarte(searchFile(_DIR_IMGS_CARTE_,self::$_aListeCarte[$idCarte]->getNom().'.jpg'),(_TAILLE_CASE_X_ * self::$_aListeCarte[$idCarte]->getNb_cases_x()),(_TAILLE_CASE_Y_ * self::$_aListeCarte[$idCarte]->getNb_cases_y()),ManagerCarteplateaux::getInstance()->getFromExtTableCarte(self::$_aListeCarte[$idCarte]->getId()));
						
					// la mini-carte
					ManagerCarte::getInstance()->creeMiniCarte(self::$_aListeCarte[$idCarte]->getNom());
						
					// On verifie que l'image existe
					$cheminVersMiniCarte = searchFile(_DIR_IMGS_MINI_CARTES_,self::$_aListeCarte[$idCarte]->getNom().'.jpg');
					if (strlen(trim($cheminVersMiniCarte)) == 0) {
						// Pas de mini carte malgre une carte
						$smarty->assign('dataMiniCarte',false);
						$smarty->assign('cheminImageMiniCarte',_URL_IMGS_CARTE_.'blanc.png');
					} else {
						$smarty->assign('dataMiniCarte',true);
						$smarty->assign('cheminImageMiniCarte',str_replace(_DIR_IMGS_MINI_CARTES_,_URL_IMGS_MINI_CARTES_,$cheminVersMiniCarte));
					}
						
					// Le random pour forcer au rechargement de l'image
					$smarty->assign('random',time());
						
					// 3) chargement des cases de la carte
					// Chargement des cases de la carte
					$smarty->assign('aCasesCarte',self::$_aListeCarte[$idCarte]->getListeCasesCarte());
						
						
						
					//Variables utilisees dans l'affichage d'une case
					$smarty->assign('xDebut',1);
					$smarty->assign('xFin',self::$_aListeCarte[$idCarte]->getNb_cases_x());
					$smarty->assign('yDebut',1);
					$smarty->assign('yFin',self::$_aListeCarte[$idCarte]->getNb_cases_y());
						
					$smarty->assign('TAILLE_CASE_X',_TAILLE_CASE_X_);
					$smarty->assign('TAILLE_CASE_Y',_TAILLE_CASE_Y_);
						
					$smarty->assign('oCarte',self::$_aListeCarte[$idCarte]);
				} catch (Exception $e) {
					debug($e);
					debug('Erreur:<br/>'.$e->getMessage());
				}
				
				//Affectation des templates des autres modules:
				//DECORS
				$smarty->assign('TEMPLATE_DECORS',_TEMPLATES_DECOR_);
				$smarty->assign('URL_IMGS_DECORS',_URL_IMGS_DECORS_);
					
				//UNITES
				$smarty->assign('TEMPLATES_UNITE',_TEMPLATES_UNITE_.'unite.tpl');
				$smarty->assign('URL_IMGS_UNITE',_URL_IMGS_UNITE_);
					
				
					
// 			} else {
                //Cette partie est a deplacer, cettemethode ne s'occupe que de l'affichage d'une
                //carte, pas des options, cela doit se faire ailleurs.
// 				if (isset($_SESSION['user']) && intval($_SESSION['user']->getStaff()) == 1) {
// 					//Membre du Staff
// 					//Liste de toutes les cartes => arrivee du module d'admin
// 					$smarty->assign('listeCartes',ManagerCarte::getInstance()->getbyId());
// 					$smarty->display(_TEMPLATES_CARTE_.'carte_admin.tpl');
// 				} else {
// 					//Membre durant le jeu
// 					//Carte en cours de jeu ?
// 					if (empty($_SESSION['partieEnCours']) || $_SESSION['partieEnCours'] == 0) {
// 						/*****************************************************/
// 						/* Aucune partie en cours donc on propose les cartes */
// 						/*****************************************************/
// 						if (isset($listeImagesMiniCarte)) {
// 							$smarty->assign('listeImagesMiniCarte',$listeImagesMiniCarte);
// 						} else {
// 							/**********************************/
// 							/* Aucune carte disponible au jeu */
// 							/* Gere a l'affichage de la page  */
// 							/**********************************/
// 						}
// 					} else {
// 						/*************************************************************/
// 						/* on va afficher les bouton "continuer" / "nouvelle partie" */
// 						/* Cette partie est geree a l'affichage, la partie en cours  */
// 						/* est l'identifiant de cette partie renvoyee par le bouton  */
// 						/*************************************************************/
// 					}
// 				}
// 			}
			
			//Maintenant on lance l'affichage
			$smarty->display(_TEMPLATES_CARTE_.'carte.tpl');
		}
		
		/**
		 * M�thode permettant de r�cup�rer l'identifiant d'une carte � partir de l'identifiant du membre
		 * @param integer $idMembre
		 */
		public function getByMembreId($idMembre) {
			$requete = "SELECT p.carte";
			$requete .= " FROM partie_joueur pj LEFT JOIN membre m ON pj.membre = m.id,";
			$requete .= " partie_joueur pj2 LEFT JOIN partie p ON pj2.partie = p.id";
			$requete .= " WHERE pj.membre = :idMembre";
			database::getInstance()->prepareRequete($requete);
			database::getInstance()->bind(array('idMembre' => $idMembre));
			if (!database::getInstance()->executeRequete()) {
				echo 'ERREUR';
			} else {
				$data = database::getInstance()->getTableauResultat();
				return $data[0];
			}
		}
	/*[/TAG-Carte21]*/


}
?>