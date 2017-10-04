<?php
		//Generated by ManagerGenerator::generate()
class ManagerTile {
	/** Instance de la classe (managerTile) */
	private static $_instance = null;

	/** Connexion a la base de donnees (database) */
	private static $_oConnexion = null;

	/** Liste des objet de la classe (Tile) */
	private static $_aListeTile = array();

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Tile11]*/
	/** Liste des cases adjacente a une case donnee */
	protected $_alisteCasesAdjacentes = array();
	
	/*[/TAG-Tile11]*/


	protected function __construct() {
		//Generated by ManagerGenerator::generateConstruct()
	}

	public function __destruct() {
		//Generated by ManagerGenerator::generateDestruct()
		/* TODO ??*/
	}

	public static function getInstance() {
		//Generated by ManagerGenerator::generateGetInstance()
		if (is_null(self::$_instance)) {
			self::$_instance = new self;
		}
		return self::$_instance;
	}

	public function __clone() {
		//Generated by ManagerGenerator::generateClone()
		throw new Exception(get_class($this).": Le clonage n'est pas autoris&eacute;", E_USER_ERROR);
	}

	public function setConnexion() {
		//Generated by ManagerGenerator::generateSetConnexion()
		self::$_oConnexion = database::getInstance();/* pas besoin de parametrer, un manager arrive apres la conf */
	}

	public function __set($name,$value) {
		//Generated by ManagerGenerator::generateSet()
		throw new Exception(get_class($this).": Le set 'noname' n'est pas autoris&eacute;", E_USER_ERROR);
	}

	public function __get($name) {
		//Generated by ManagerGenerator::generateGet()
		throw new Exception(get_class($this).": Le get 'noname' n'est pas autoris&eacute;", E_USER_ERROR);
	}

	public function getById($value=-1) {
		//Generated by ManagerGenerator::generateGetById()
		return FactoryTile::getFromTableTile($value);
	}

	public function getByJoueurId($value) {
		//Generated by ManagerGenerator::generateGetByJoueurId()
		return FactoryTile::getFromExtTableJoueur($value);
	}

	public function getFromExtTableCarte($idcarte=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryTile::getFromExtTableCarte($idcarte);
	}

	public function deleteCompositeLinksFromCarte($idcarte) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM tile WHERE carte = '.$idcarte;
	}

	public function getFromExtTableUnite($idunite=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryTile::getFromExtTableUnite($idunite);
	}

	public function deleteCompositeLinksFromUnite($idunite) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM tile WHERE unite = '.$idunite;
	}

	public function getFromExtTableUnite_joueur($idunite_joueur=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryTile::getFromExtTableUnite_joueur($idunite_joueur);
	}

	public function deleteCompositeLinksFromUnite_joueur($idunite_joueur) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM tile WHERE unite_joueur = '.$idunite_joueur;
	}

	public function getFromExtTableDecor($iddecor=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryTile::getFromExtTableDecor($iddecor);
	}

	public function deleteCompositeLinksFromDecor($iddecor) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM tile WHERE decor = '.$iddecor;
	}

	public function getFromExtTableEquipement($idequipement=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryTile::getFromExtTableEquipement($idequipement);
	}

	public function deleteCompositeLinksFromEquipement($idequipement) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM tile WHERE equipement = '.$idequipement;
	}

	public function getFromExtTableEquipement_joueur($idequipement_joueur=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryTile::getFromExtTableEquipement_joueur($idequipement_joueur);
	}

	public function deleteCompositeLinksFromEquipement_joueur($idequipement_joueur) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM tile WHERE equipement_joueur = '.$idequipement_joueur;
	}

	public function getFromExtTableTile($idtile=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryTile::getFromExtTableTile($idtile);
	}

	public function deleteCompositeLinksFromTile($idtile) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM tile WHERE tile = '.$idtile;
	}

	public function delete($object=array()) {
		//Generated by ManagerGenerator::generateDelete()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": La suppression se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Tile) {
			$oTile = new Tile($object['id'],$object['carte'],$object['x'],$object['y'],$object['vision'],$object['unite'],$object['unite_joueur'],$object['decor'],$object['equipement'],$object['equipement_joueur'],$object['etatCase'],$object['bloque'],$object['tile']);
		} else {
			$oTile = $object;
		}
		/* Appel de la methode delete de l'objet */
		/* Tout se passe dans une transaction ouverte plus haut */
			/* Execution de la requete */
		if (database::getInstance()->executeRequete($oTile->delete())) {
			/* Requete OK */
			return true;
		} else {
			/* Requete NOK lancement d'une exception PDO */
			throw new PDOException('Erreur sur delete (Tile)');
		}
	}

	public function update($object=array()) {
		//Generated by ManagerGenerator::generateUpdate()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": la mise &agrave; jour se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Tile) {
			$oTile = new Tile($object['id'],$object['carte'],$object['x'],$object['y'],$object['vision'],$object['unite'],$object['unite_joueur'],$object['decor'],$object['equipement'],$object['equipement_joueur'],$object['etatCase'],$object['bloque'],$object['tile']);
		} else {
			$oTile = $object;
		}
		/* Maintenant on compare avec celle en session */
		if (!empty($_SESSION['tile']) && sizeof($_SESSION['tile']->compareTo($oTile)) > 0) {
			$_SESSION['tile'] = $oTile;
		}
		/* on update car les objets sont different */
		return database::getInstance()->executeRequete($oTile->update());
	}

	public function save($object=array()) {
		//Generated by ManagerGenerator::generateSave()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": la sauvegarde se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Tile) {
			$oTile = new Tile($object['id'],$object['carte'],$object['x'],$object['y'],$object['vision'],$object['unite'],$object['unite_joueur'],$object['decor'],$object['equipement'],$object['equipement_joueur'],$object['etatCase'],$object['bloque'],$object['tile']);
		} else {
			$oTile = $object;
		}
		/* Appel de la methode update de l'objet */
		return database::getInstance()->executeRequete($oTile->save());
	}

	public function findBy($champ,$data='') {
		//Generated by ManagerGenerator::generateFindBy()
		/* creation d'un objet de base de la classe */
		$object = new Tile();
		$resultat = array();
		for ($i = 0; $i < sizeof($this -> _aListeTile); $i++) {
			$object = $this -> _aListeTile[$i];
			if ($object -> {'_'.strtolower($champ)} == $data) {
				$resultat[] = $object;
			}
		}
		if (sizeof($resultat) > 0) {
			//existe
			return $resultat;
		} else {
			//n'existe pas
			return "Pas de Tile de ".strtolower($champ)." '".$data."'";
		}
	}

	public function getTileVide() {
		//Generated by ManagerGenerator::generateGetObjetVide()
		return new Tile();
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Tile21]*/
	
	/**
	 * Methode croisee avec le ManagerCarte car on peut appeler dans la maj de cases un plage de cases
	 * @param int $idcarte
	 * @param number $xDebut
	 * @param number $xFin
	 * @param number $yDebut
	 * @param number $yFin
	 * @return array <multitype:, multitype:Cases >
	 */
	public function getCasesCarteFromRange($idcarte,$xDebut=0,$xFin=0,$yDebut=0,$yFin=0) {
		if ($idcarte == 0) {
			alert("Erreur vous devez choisir une carte");
			return;
		}
		return FactoryTile::getCasesCarteFromRange($idcarte,$xDebut,$xFin,$yDebut,$yFin);
	}
	
	
	/**
	 * Retourne la liste des cases occup�es dans une zone donn�e
	 * @param int $idcarte
	 * @param number $xDebut
	 * @param number $xFin
	 * @param number $yDebut
	 * @param number $yFin
	 * @return void|multitype:Tile
	 */
	public function getBusyCasesCarteFromRange($idcarte,$xDebut=0,$xFin=0,$yDebut=0,$yFin=0) {
		if ($idcarte == 0) {
			alert("Erreur vous devez choisir une carte");
			return;
		}
		return FactoryTile::getBusyCasesCarteFromRange($idcarte,$xDebut,$xFin,$yDebut,$yFin);
	}
	
	/**
	 * Retourne un objet vide de type Tile
	 * @return Tile
	 */
	public function getCaseVide() {
		return FactoryTile::getCaseVide();
	}
	
	/**
	 * Retourne la liste des cases qui ont un lien avec une autre pour une
	 * carte donn�e
	 * @param int $idCarte
	 * @return void|multitype:Tile
	 */
	public function getListeCasesLienFromCarte($idCarte) {
		if ($idcarte == 0) {
			alert("Erreur vous devez choisir une carte");
			return;
		}
		return FactoryTile::getListeCasesLienFromCarte($idCarte);
	}
	
	/**
	 * Supprime TOUTES les case d'une carte donn�e
	 * @param int $idCarte
	 * @throws PDOException
	 * @return void|boolean
	 */
	public function deleteAllFromCarte($idCarte) {
		if ($idcarte == 0) {
			alert("Erreur vous devez choisir une carte");
			return;
		}
		$requete = "DELETE FROM tile WHERE idcarte = :idcarte";
		database::getInstance()->prepareRequete($requete);
		database::getInstance()->bind(array('idcarte' => $idCarte));
		return database::getInstance()->executeRequete();
		
		if (database::getInstance()->executeRequete($requete)) {
	
		} else {
			throw new PDOException('Erreur sur deleteAllFromCarte (Cases)');
		}
	}
	
	/**
	 * Retourne une case suivant ses coordonnees
	 * @param int $idCarte
	 * @param int $i
	 * @param int $j
	 * @return array <Ambigous, multitype:, Tile>
	 */
	public function getCaseFromCoordonate($idCarte,$i,$j) {
		if ($idCarte == 0) {
			alert("Erreur vous devez choisir une carte");
			return;
		}
		return FactoryTile::getCaseFromCoordonate($idCarte,$i,$j);
	}
	/**
	 * Retourne la distance Euclidienne entre deux cases
	 * @param object $caseDepart
	 * @param object $caseArrivee
	 * @return number
	 */
	public function distanceEntre($caseDepart,$caseArrivee) {
		if (!isset($caseDepart,$caseArrivee)) {
			alert("Erreur vous devez choisir deux cases");
			return;
		}
		return floor(sqrt((($caseArrivee->getX() - $caseDepart->getX()) * (($caseArrivee->getX() - $caseDepart->getX()))) + (($caseArrivee->getY() - $caseDepart->getY()) * ($caseArrivee->getY() - $caseDepart->getY()))));
	}
	
	/**
	 * Permet de renseigner le tableau des cases adjacentes a la case donnee
	 * @param object $oCase		objet Tile
	 * @param int $idCarte		id carte
	 * @param number $distance
	 */
	public function setCasesAdjacentes($oCase,$idCarte,$distance=1) {
		if (empty($oCase)) {
			alerte("Erreur vous devez choisir une case");
			return;
		}
		if ($idCarte == 0) {
			alerte("Erreur vous devez choisir une carte");
			return;
		}
		
		for($i = floor($oCase->getX() - $distance); $i <= floor($oCase->getX() + $distance); $i++) {
			for ($j = floor($oCase->getY() - $distance); $j <= floor($oCase->getY() + $distance); $j++) {
				if ($i > 0 && $j > 0) {
					$this->_alisteCasesAdjacentes[] = $this->getCaseFromCoordonate(intval($idCarte),$i,$j);
				}				
			}
		}
	}
	
	public function getCasesAdjacentes() {
		if (!empty($this->_alisteCasesAdjacentes)) {
			return $this->_alisteCasesAdjacentes;
		} else {
			return false;
		}
	}
	
	/**
	 * Methode pour trouver le meilleur chemin de la case donnee vers la case d'arrivee
	 * @param object $caseArrivee la case cible du chemmin a trouver
	 * @param number $idCarte
	 * @param array $chemin liste des cases du chemin
	 * @throws Exception
	 */
	public function trouveCheminVers($oCaseDepart,$oCaseArrivee,$idCarte=0,&$chemin) {
		if (empty($oCaseDepart)) {
			alerte("Erreur vous devez choisir une case");
			return;
		}if (empty($oCaseArrivee)) {
			alerte("Erreur vous devez choisir une case d'arriv&eacute;e");
			return;
		}
		if ($idCarte == 0) {
			throw new Exception("Erreur pour trouver un chemin il faut stipuler une carte.");
		}
		if ($oCaseDepart->getId() == $oCaseArrivee->getId()) {
			alerte("Erreur m&ecirc;me case de d&eacute;part et d'arriv&eacute;e.");
			return;
		}
		$listeCasesValides = array();
		/* Chargement des cases adjacentes */
		$this->setCasesAdjacentes($oCaseDepart,$idCarte);
		/* Parcours de la liste des cases adjacentes */
		foreach ($this->getCasesAdjacentes() AS $case) {
			if (!$case->estUnObstacle()) {
				if ($this->plusProche($case,$oCaseDepart,$oCaseArrivee)) {
					$listeCasesValides[] = $case;
				}
			}
		}
		
		
		if (empty($listeCasesValides)) {
			throw new Exception("Impossible de trouver des cases valides");
		}
		
		/* Sauvegarde de la case choisie */
		$chemin[] = $this->choisitCaseParmiValides($listeCasesValides,$oCaseArrivee);

		/* et recherche du meilleur chemin � partir de la case choisie */
		if ($chemin[(sizeof($chemin))-1]->getId() != $oCaseArrivee->getId()) {
			//$chemin[(sizeof($chemin))-1]->trouveCheminVers($oCaseArrivee,$idCarte,$chemin);
			$this->trouveCheminVers($chemin[(sizeof($chemin))-1],$oCaseArrivee,$idCarte,$chemin);
		}
	}
	
	
	/**
	 *
	 * @param array $listeCasesValides
	 * @param object $caseArrivee
	 * @return boolean
	 */
	private function choisitCaseParmiValides($listeCasesValides,$caseArrivee) {
		if (sizeof($listeCasesValides) == 0) {
			alerte("Erreur la liste des cases est vide.");
			return false;
		}
		if (empty($caseArrivee)) {
			alerte("Erreur la case d'arriv&eacute; est vide.");
			return false;
		}
		$distance = 0;
		if (sizeof($listeCasesValides) == 1) {
			$caseChoisie = $listeCasesValides[0];
		} else {
			foreach ($listeCasesValides AS $case) {
				if ($distance == 0) {
					$distance = $this->distanceEntre($case,$caseArrivee);
					$caseChoisie = $case;
				} else {
					if ($distance > $this->distanceEntre($case,$caseArrivee)) {
						$distance = $this->distanceEntre($case,$caseArrivee);
						$caseChoisie = $case;
					}
				}
			}
		}
		return $caseChoisie;
	}
	
	/**
	 * Une case est plus proche de l'arrivee si sa distance avec elle diminue
	 * par rapport a la case de depart.
	 * @param object $caseDepart
	 * @param object $caseArrivee
	 * @return boolean
	 */
	public function plusProche($case,$caseDepart,$caseArrivee) {
		/* Calcul distance case depart -> case arrivee */
		// 		$distanceAFaire = $caseDepart->distanceAvec($caseArrivee);
		// 		$distanceRestante = $this->distanceAvec($caseArrivee);
		if ($this->distanceEntre($case,$caseArrivee) < $this->distanceEntre($caseDepart,$caseArrivee)) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Retourne la liste des cases vide d'une carte donnee
	 * @param int $idCarte
	 * @throws Exception
	 */
	public function getFreeTiles($idCarte) {
		if (empty($idCarte)) {
			throw new Exception("Une Carte est n&eacute;cessaire pour chercher une case libre.");
		}
		return FactoryTile::getFreeTilesList($idCarte);
	}
	/*[/TAG-Tile21]*/


}
?>