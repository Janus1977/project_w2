<?php
		//Generated by ManagerGenerator::generate()
class ManagerArene_classement {
	/** Instance de la classe (managerArene_classement) */
	private static $_instance = null;

	/** Connexion a la base de donnees (database) */
	private static $_oConnexion = null;

	/** Liste des objet de la classe (Arene_classement) */
	private static $_aListeArene_classement = array();

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Arene_classement11]*/	/*[/TAG-Arene_classement11]*/


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
		return FactoryArene_classement::getFromTableArene_classement($value);
	}

	public function getByJoueurId($value) {
		//Generated by ManagerGenerator::generateGetByJoueurId()
		return FactoryArene_classement::getFromExtTableJoueur($value);
	}

	public function getFromExtTableMembre($idmembre=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryArene_classement::getFromExtTableMembre($idmembre);
	}

	public function deleteCompositeLinksFromMembre($idmembre) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM arene_classement WHERE membre = '.$idmembre;
	}

	public function delete($object=array()) {
		//Generated by ManagerGenerator::generateDelete()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": La suppression se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Arene_classement) {
			$oArene_classement = new Arene_classement($object['id'],$object['membre'],$object['points'],$object['place_precedente']);
		} else {
			$oArene_classement = $object;
		}
		/* Appel de la methode delete de l'objet */
		/* Tout se passe dans une transaction ouverte plus haut */
			/* Execution de la requete */
		if (database::getInstance()->executeRequete($oArene_classement->delete())) {
			/* Requete OK */
			return true;
		} else {
			/* Requete NOK lancement d'une exception PDO */
			throw new PDOException('Erreur sur delete (Arene_classement)');
		}
	}

	public function update($object=array()) {
		//Generated by ManagerGenerator::generateUpdate()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": la mise &agrave; jour se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Arene_classement) {
			$oArene_classement = new Arene_classement($object['id'],$object['membre'],$object['points'],$object['place_precedente']);
		} else {
			$oArene_classement = $object;
		}
		/* Maintenant on compare avec celle en session */
		if (!empty($_SESSION['arene_classement']) && sizeof($_SESSION['arene_classement']->compareTo($oArene_classement)) > 0) {
			$_SESSION['arene_classement'] = $oArene_classement;
		}
		/* on update car les objets sont different */
		return database::getInstance()->executeRequete($oArene_classement->update());
	}

	public function save($object=array()) {
		//Generated by ManagerGenerator::generateSave()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": la sauvegarde se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Arene_classement) {
			$oArene_classement = new Arene_classement($object['id'],$object['membre'],$object['points'],$object['place_precedente']);
		} else {
			$oArene_classement = $object;
		}
		/* Appel de la methode update de l'objet */
		return database::getInstance()->executeRequete($oArene_classement->save());
	}

	public function findBy($champ,$data='') {
		//Generated by ManagerGenerator::generateFindBy()
		/* creation d'un objet de base de la classe */
		$object = new Arene_classement();
		$resultat = array();
		for ($i = 0; $i < sizeof($this -> _aListeArene_classement); $i++) {
			$object = $this -> _aListeArene_classement[$i];
			if ($object -> {'_'.strtolower($champ)} == $data) {
				$resultat[] = $object;
			}
		}
		if (sizeof($resultat) > 0) {
			//existe
			return $resultat;
		} else {
			//n'existe pas
			return "Pas de Arene_classement de ".strtolower($champ)." '".$data."'";
		}
	}

	public function getArene_classementVide() {
		//Generated by ManagerGenerator::generateGetObjetVide()
		return new Arene_classement();
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Arene_classement21]*/	/*[/TAG-Arene_classement21]*/


}
?>