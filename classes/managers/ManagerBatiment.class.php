<?php
		//Generated by ManagerGenerator::generate()
class ManagerBatiment {
	/** Instance de la classe (managerBatiment) */
	private static $_instance = null;

	/** Connexion a la base de donnees (database) */
	private static $_oConnexion = null;

	/** Liste des objet de la classe (Batiment) */
	private static $_aListeBatiment = array();

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Batiment11]*/	/*[/TAG-Batiment11]*/


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
		return FactoryBatiment::getFromTableBatiment($value);
	}

	public function getByJoueurId($value) {
		//Generated by ManagerGenerator::generateGetByJoueurId()
		return FactoryBatiment::getFromExtTableJoueur($value);
	}

	public function getFromExtTableBatimentId($idbatimentid=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryBatiment::getFromExtTableBatimentId($idbatimentid);
	}

	public function deleteCompositeLinksFromBatimentId($idbatimentid) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM batiment WHERE batimentid = '.$idbatimentid;
	}

	public function getFromExtTableBatimentNom($idbatimentnom=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryBatiment::getFromExtTableBatimentNom($idbatimentnom);
	}

	public function deleteCompositeLinksFromBatimentNom($idbatimentnom) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM batiment WHERE batimentnom = '.$idbatimentnom;
	}

	public function getFromExtTableBatimentDesc($idbatimentdesc=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryBatiment::getFromExtTableBatimentDesc($idbatimentdesc);
	}

	public function deleteCompositeLinksFromBatimentDesc($idbatimentdesc) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM batiment WHERE batimentdesc = '.$idbatimentdesc;
	}

	public function getFromExtTableBatimentVie($idbatimentvie=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryBatiment::getFromExtTableBatimentVie($idbatimentvie);
	}

	public function deleteCompositeLinksFromBatimentVie($idbatimentvie) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM batiment WHERE batimentvie = '.$idbatimentvie;
	}

	public function getFromExtTableBatimentDefense($idbatimentdefense=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryBatiment::getFromExtTableBatimentDefense($idbatimentdefense);
	}

	public function deleteCompositeLinksFromBatimentDefense($idbatimentdefense) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM batiment WHERE batimentdefense = '.$idbatimentdefense;
	}

	public function getFromExtTableBatimentBouclier($idbatimentbouclier=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryBatiment::getFromExtTableBatimentBouclier($idbatimentbouclier);
	}

	public function deleteCompositeLinksFromBatimentBouclier($idbatimentbouclier) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM batiment WHERE batimentbouclier = '.$idbatimentbouclier;
	}

	public function delete($object=array()) {
		//Generated by ManagerGenerator::generateDelete()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": La suppression se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Batiment) {
			$oBatiment = new Batiment($object['batimentId'],$object['batimentNom'],$object['batimentDesc'],$object['batimentVie'],$object['batimentDefense'],$object['batimentBouclier'],$object['production']);
		} else {
			$oBatiment = $object;
		}
		/* Appel de la methode delete de l'objet */
		/* Tout se passe dans une transaction ouverte plus haut */
			/* Execution de la requete */
		if (database::getInstance()->executeRequete($oBatiment->delete())) {
			/* Requete OK */
			return true;
		} else {
			/* Requete NOK lancement d'une exception PDO */
			throw new PDOException('Erreur sur delete (Batiment)');
		}
	}

	public function update($object=array()) {
		//Generated by ManagerGenerator::generateUpdate()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": la mise &agrave; jour se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Batiment) {
			$oBatiment = new Batiment($object['batimentId'],$object['batimentNom'],$object['batimentDesc'],$object['batimentVie'],$object['batimentDefense'],$object['batimentBouclier'],$object['production']);
		} else {
			$oBatiment = $object;
		}
		/* Maintenant on compare avec celle en session */
		if (!empty($_SESSION['batiment']) && sizeof($_SESSION['batiment']->compareTo($oBatiment)) > 0) {
			$_SESSION['batiment'] = $oBatiment;
		}
		/* on update car les objets sont different */
		return database::getInstance()->executeRequete($oBatiment->update());
	}

	public function save($object=array()) {
		//Generated by ManagerGenerator::generateSave()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": la sauvegarde se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Batiment) {
			$oBatiment = new Batiment($object['batimentId'],$object['batimentNom'],$object['batimentDesc'],$object['batimentVie'],$object['batimentDefense'],$object['batimentBouclier'],$object['production']);
		} else {
			$oBatiment = $object;
		}
		/* Appel de la methode update de l'objet */
		return database::getInstance()->executeRequete($oBatiment->save());
	}

	public function findBy($champ,$data='') {
		//Generated by ManagerGenerator::generateFindBy()
		/* creation d'un objet de base de la classe */
		$object = new Batiment();
		$resultat = array();
		for ($i = 0; $i < sizeof($this -> _aListeBatiment); $i++) {
			$object = $this -> _aListeBatiment[$i];
			if ($object -> {'_'.strtolower($champ)} == $data) {
				$resultat[] = $object;
			}
		}
		if (sizeof($resultat) > 0) {
			//existe
			return $resultat;
		} else {
			//n'existe pas
			return "Pas de Batiment de ".strtolower($champ)." '".$data."'";
		}
	}

	public function getBatimentVide() {
		//Generated by ManagerGenerator::generateGetObjetVide()
		return new Batiment();
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Batiment21]*/	/*[/TAG-Batiment21]*/


}
?>