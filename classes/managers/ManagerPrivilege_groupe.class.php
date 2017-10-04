<?php
		//Generated by ManagerGenerator::generate()
class ManagerPrivilege_groupe {
	/** Instance de la classe (managerPrivilege_groupe) */
	private static $_instance = null;

	/** Connexion a la base de donnees (database) */
	private static $_oConnexion = null;

	/** Liste des objet de la classe (Privilege_groupe) */
	private static $_aListePrivilege_groupe = array();

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Privilege_groupe11]*/	/*[/TAG-Privilege_groupe11]*/


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
		return FactoryPrivilege_groupe::getFromTablePrivilege_groupe($value);
	}

	public function getByJoueurId($value) {
		//Generated by ManagerGenerator::generateGetByJoueurId()
		return FactoryPrivilege_groupe::getFromExtTableJoueur($value);
	}

	public function getFromExtTablePrivilege($idprivilege=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryPrivilege_groupe::getFromExtTablePrivilege($idprivilege);
	}

	public function deleteCompositeLinksFromPrivilege($idprivilege) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM privilege_groupe WHERE privilege = '.$idprivilege;
	}

	public function getFromExtTableGroupe($idgroupe=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryPrivilege_groupe::getFromExtTableGroupe($idgroupe);
	}

	public function deleteCompositeLinksFromGroupe($idgroupe) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM privilege_groupe WHERE groupe = '.$idgroupe;
	}

	public function delete($object=array()) {
		//Generated by ManagerGenerator::generateDelete()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": La suppression se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Privilege_groupe) {
			$oPrivilege_groupe = new Privilege_groupe($object['privilege'],$object['groupe']);
		} else {
			$oPrivilege_groupe = $object;
		}
		/* Appel de la methode delete de l'objet */
		/* Tout se passe dans une transaction ouverte plus haut */
			/* Execution de la requete */
		if (database::getInstance()->executeRequete($oPrivilege_groupe->delete())) {
			/* Requete OK */
			return true;
		} else {
			/* Requete NOK lancement d'une exception PDO */
			throw new PDOException('Erreur sur delete (Privilege_groupe)');
		}
	}

	public function update($object=array()) {
		//Generated by ManagerGenerator::generateUpdate()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": la mise &agrave; jour se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Privilege_groupe) {
			$oPrivilege_groupe = new Privilege_groupe($object['privilege'],$object['groupe']);
		} else {
			$oPrivilege_groupe = $object;
		}
		/* Maintenant on compare avec celle en session */
		if (!empty($_SESSION['privilege_groupe']) && sizeof($_SESSION['privilege_groupe']->compareTo($oPrivilege_groupe)) > 0) {
			$_SESSION['privilege_groupe'] = $oPrivilege_groupe;
		}
		/* on update car les objets sont different */
		return database::getInstance()->executeRequete($oPrivilege_groupe->update());
	}

	public function save($object=array()) {
		//Generated by ManagerGenerator::generateSave()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": la sauvegarde se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Privilege_groupe) {
			$oPrivilege_groupe = new Privilege_groupe($object['privilege'],$object['groupe']);
		} else {
			$oPrivilege_groupe = $object;
		}
		/* Appel de la methode update de l'objet */
		return database::getInstance()->executeRequete($oPrivilege_groupe->save());
	}

	public function findBy($champ,$data='') {
		//Generated by ManagerGenerator::generateFindBy()
		/* creation d'un objet de base de la classe */
		$object = new Privilege_groupe();
		$resultat = array();
		for ($i = 0; $i < sizeof($this -> _aListePrivilege_groupe); $i++) {
			$object = $this -> _aListePrivilege_groupe[$i];
			if ($object -> {'_'.strtolower($champ)} == $data) {
				$resultat[] = $object;
			}
		}
		if (sizeof($resultat) > 0) {
			//existe
			return $resultat;
		} else {
			//n'existe pas
			return "Pas de Privilege_groupe de ".strtolower($champ)." '".$data."'";
		}
	}

	public function getPrivilege_groupeVide() {
		//Generated by ManagerGenerator::generateGetObjetVide()
		return new Privilege_groupe();
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Privilege_groupe21]*/	/*[/TAG-Privilege_groupe21]*/


}
?>