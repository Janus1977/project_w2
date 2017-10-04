<?php
		//Generated by ManagerGenerator::generate()
class ManagerTechnologie {
	/** Instance de la classe (managerTechnologie) */
	private static $_instance = null;

	/** Connexion a la base de donnees (database) */
	private static $_oConnexion = null;

	/** Liste des objet de la classe (Technologie) */
	private static $_aListeTechnologie = array();

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Technologie11]*/	/*[/TAG-Technologie11]*/


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
		return FactoryTechnologie::getFromTableTechnologie($value);
	}

	public function getByJoueurId($value) {
		//Generated by ManagerGenerator::generateGetByJoueurId()
		return FactoryTechnologie::getFromExtTableJoueur($value);
	}

	public function getFromExtTableTechnologieId($idtechnologieid=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryTechnologie::getFromExtTableTechnologieId($idtechnologieid);
	}

	public function deleteCompositeLinksFromTechnologieId($idtechnologieid) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM technologie WHERE technologieid = '.$idtechnologieid;
	}

	public function getFromExtTableTechnologieNom($idtechnologienom=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryTechnologie::getFromExtTableTechnologieNom($idtechnologienom);
	}

	public function deleteCompositeLinksFromTechnologieNom($idtechnologienom) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM technologie WHERE technologienom = '.$idtechnologienom;
	}

	public function getFromExtTableTechnologieDesc($idtechnologiedesc=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryTechnologie::getFromExtTableTechnologieDesc($idtechnologiedesc);
	}

	public function deleteCompositeLinksFromTechnologieDesc($idtechnologiedesc) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM technologie WHERE technologiedesc = '.$idtechnologiedesc;
	}

	public function delete($object=array()) {
		//Generated by ManagerGenerator::generateDelete()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": La suppression se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Technologie) {
			$oTechnologie = new Technologie($object['technologieId'],$object['technologieNom'],$object['technologieDesc']);
		} else {
			$oTechnologie = $object;
		}
		/* Appel de la methode delete de l'objet */
		/* Tout se passe dans une transaction ouverte plus haut */
			/* Execution de la requete */
		if (database::getInstance()->executeRequete($oTechnologie->delete())) {
			/* Requete OK */
			return true;
		} else {
			/* Requete NOK lancement d'une exception PDO */
			throw new PDOException('Erreur sur delete (Technologie)');
		}
	}

	public function update($object=array()) {
		//Generated by ManagerGenerator::generateUpdate()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": la mise &agrave; jour se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Technologie) {
			$oTechnologie = new Technologie($object['technologieId'],$object['technologieNom'],$object['technologieDesc']);
		} else {
			$oTechnologie = $object;
		}
		/* Maintenant on compare avec celle en session */
		if (!empty($_SESSION['technologie']) && sizeof($_SESSION['technologie']->compareTo($oTechnologie)) > 0) {
			$_SESSION['technologie'] = $oTechnologie;
		}
		/* on update car les objets sont different */
		return database::getInstance()->executeRequete($oTechnologie->update());
	}

	public function save($object=array()) {
		//Generated by ManagerGenerator::generateSave()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": la sauvegarde se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Technologie) {
			$oTechnologie = new Technologie($object['technologieId'],$object['technologieNom'],$object['technologieDesc']);
		} else {
			$oTechnologie = $object;
		}
		/* Appel de la methode update de l'objet */
		return database::getInstance()->executeRequete($oTechnologie->save());
	}

	public function findBy($champ,$data='') {
		//Generated by ManagerGenerator::generateFindBy()
		/* creation d'un objet de base de la classe */
		$object = new Technologie();
		$resultat = array();
		for ($i = 0; $i < sizeof($this -> _aListeTechnologie); $i++) {
			$object = $this -> _aListeTechnologie[$i];
			if ($object -> {'_'.strtolower($champ)} == $data) {
				$resultat[] = $object;
			}
		}
		if (sizeof($resultat) > 0) {
			//existe
			return $resultat;
		} else {
			//n'existe pas
			return "Pas de Technologie de ".strtolower($champ)." '".$data."'";
		}
	}

	public function getTechnologieVide() {
		//Generated by ManagerGenerator::generateGetObjetVide()
		return new Technologie();
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Technologie21]*/	/*[/TAG-Technologie21]*/


}
?>