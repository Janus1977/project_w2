<?php
		//Generated by ManagerGenerator::generate()
class ManagerTemp_user {
	/** Instance de la classe (managerTemp_user) */
	private static $_instance = null;

	/** Connexion a la base de donnees (database) */
	private static $_oConnexion = null;

	/** Liste des objet de la classe (Temp_user) */
	private static $_aListeTemp_user = array();

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Temp_user11]*/	/*[/TAG-Temp_user11]*/


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
		return FactoryTemp_user::getFromTableTemp_user($value);
	}

	public function getByJoueurId($value) {
		//Generated by ManagerGenerator::generateGetByJoueurId()
		return FactoryTemp_user::getFromExtTableJoueur($value);
	}

	public function delete($object=array()) {
		//Generated by ManagerGenerator::generateDelete()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": La suppression se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Temp_user) {
			$oTemp_user = new Temp_user($object['id'],$object['pseudo'],$object['password'],$object['mail'],$object['checksum'],$object['date_creation'],$object['date_suppression']);
		} else {
			$oTemp_user = $object;
		}
		/* Appel de la methode delete de l'objet */
		/* Tout se passe dans une transaction ouverte plus haut */
			/* Execution de la requete */
		if (database::getInstance()->executeRequete($oTemp_user->delete())) {
			/* Requete OK */
			return true;
		} else {
			/* Requete NOK lancement d'une exception PDO */
			throw new PDOException('Erreur sur delete (Temp_user)');
		}
	}

	public function update($object=array()) {
		//Generated by ManagerGenerator::generateUpdate()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": la mise &agrave; jour se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Temp_user) {
			$oTemp_user = new Temp_user($object['id'],$object['pseudo'],$object['password'],$object['mail'],$object['checksum'],$object['date_creation'],$object['date_suppression']);
		} else {
			$oTemp_user = $object;
		}
		/* Maintenant on compare avec celle en session */
		if (!empty($_SESSION['temp_user']) && sizeof($_SESSION['temp_user']->compareTo($oTemp_user)) > 0) {
			$_SESSION['temp_user'] = $oTemp_user;
		}
		/* on update car les objets sont different */
		return database::getInstance()->executeRequete($oTemp_user->update());
	}

	public function save($object=array()) {
		//Generated by ManagerGenerator::generateSave()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": la sauvegarde se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Temp_user) {
			$oTemp_user = new Temp_user($object['id'],$object['pseudo'],$object['password'],$object['mail'],$object['checksum'],$object['date_creation'],$object['date_suppression']);
		} else {
			$oTemp_user = $object;
		}
		/* Appel de la methode update de l'objet */
		return database::getInstance()->executeRequete($oTemp_user->save());
	}

	public function findBy($champ,$data='') {
		//Generated by ManagerGenerator::generateFindBy()
		/* creation d'un objet de base de la classe */
		$object = new Temp_user();
		$resultat = array();
		for ($i = 0; $i < sizeof($this -> _aListeTemp_user); $i++) {
			$object = $this -> _aListeTemp_user[$i];
			if ($object -> {'_'.strtolower($champ)} == $data) {
				$resultat[] = $object;
			}
		}
		if (sizeof($resultat) > 0) {
			//existe
			return $resultat;
		} else {
			//n'existe pas
			return "Pas de Temp_user de ".strtolower($champ)." '".$data."'";
		}
	}

	public function getTemp_userVide() {
		//Generated by ManagerGenerator::generateGetObjetVide()
		return new Temp_user();
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Temp_user21]*/	/*[/TAG-Temp_user21]*/


}
?>