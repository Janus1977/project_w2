<?php
		//Generated by ManagerGenerator::generate()
class ManagerOldcarte {
	/** Instance de la classe (managerOldcarte) */
	private static $_instance = null;

	/** Connexion a la base de donnees (database) */
	private static $_oConnexion = null;

	/** Liste des objet de la classe (Oldcarte) */
	private static $_aListeOldcarte = array();

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Oldcarte11]*/	/*[/TAG-Oldcarte11]*/


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
		return FactoryOldcarte::getFromTableOldcarte($value);
	}

	public function getByJoueurId($value) {
		//Generated by ManagerGenerator::generateGetByJoueurId()
		return FactoryOldcarte::getFromExtTableJoueur($value);
	}

	public function getFromExtTableId_carte($idid_carte=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryOldcarte::getFromExtTableId_carte($idid_carte);
	}

	public function deleteCompositeLinksFromId_carte($idid_carte) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM oldcarte WHERE id_carte = '.$idid_carte;
	}

	public function getFromExtTableTerrain($idterrain=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryOldcarte::getFromExtTableTerrain($idterrain);
	}

	public function deleteCompositeLinksFromTerrain($idterrain) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM oldcarte WHERE terrain = '.$idterrain;
	}

	public function delete($object=array()) {
		//Generated by ManagerGenerator::generateDelete()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": La suppression se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Oldcarte) {
			$oOldcarte = new Oldcarte($object['id_carte'],$object['x'],$object['y'],$object['vision'],$object['terrain']);
		} else {
			$oOldcarte = $object;
		}
		/* Appel de la methode delete de l'objet */
		/* Tout se passe dans une transaction ouverte plus haut */
			/* Execution de la requete */
		if (database::getInstance()->executeRequete($oOldcarte->delete())) {
			/* Requete OK */
			return true;
		} else {
			/* Requete NOK lancement d'une exception PDO */
			throw new PDOException('Erreur sur delete (Oldcarte)');
		}
	}

	public function update($object=array()) {
		//Generated by ManagerGenerator::generateUpdate()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": la mise &agrave; jour se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Oldcarte) {
			$oOldcarte = new Oldcarte($object['id_carte'],$object['x'],$object['y'],$object['vision'],$object['terrain']);
		} else {
			$oOldcarte = $object;
		}
		/* Maintenant on compare avec celle en session */
		if (!empty($_SESSION['oldcarte']) && sizeof($_SESSION['oldcarte']->compareTo($oOldcarte)) > 0) {
			$_SESSION['oldcarte'] = $oOldcarte;
		}
		/* on update car les objets sont different */
		return database::getInstance()->executeRequete($oOldcarte->update());
	}

	public function save($object=array()) {
		//Generated by ManagerGenerator::generateSave()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": la sauvegarde se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Oldcarte) {
			$oOldcarte = new Oldcarte($object['id_carte'],$object['x'],$object['y'],$object['vision'],$object['terrain']);
		} else {
			$oOldcarte = $object;
		}
		/* Appel de la methode update de l'objet */
		return database::getInstance()->executeRequete($oOldcarte->save());
	}

	public function findBy($champ,$data='') {
		//Generated by ManagerGenerator::generateFindBy()
		/* creation d'un objet de base de la classe */
		$object = new Oldcarte();
		$resultat = array();
		for ($i = 0; $i < sizeof($this -> _aListeOldcarte); $i++) {
			$object = $this -> _aListeOldcarte[$i];
			if ($object -> {'_'.strtolower($champ)} == $data) {
				$resultat[] = $object;
			}
		}
		if (sizeof($resultat) > 0) {
			//existe
			return $resultat;
		} else {
			//n'existe pas
			return "Pas de Oldcarte de ".strtolower($champ)." '".$data."'";
		}
	}

	public function getOldcarteVide() {
		//Generated by ManagerGenerator::generateGetObjetVide()
		return new Oldcarte();
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Oldcarte21]*/	/*[/TAG-Oldcarte21]*/


}
?>