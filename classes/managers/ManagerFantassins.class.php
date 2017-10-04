<?php
		//Generated by ManagerGenerator::generate()
class ManagerFantassins {
	/** Instance de la classe (managerFantassins) */
	private static $_instance = null;

	/** Connexion a la base de donnees (database) */
	private static $_oConnexion = null;

	/** Liste des objet de la classe (Fantassins) */
	private static $_aListeFantassins = array();

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Fantassins11]*/	/*[/TAG-Fantassins11]*/


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
		return FactoryFantassins::getFromTableFantassins($value);
	}

	public function getByJoueurId($value) {
		//Generated by ManagerGenerator::generateGetByJoueurId()
		return FactoryFantassins::getFromExtTableJoueur($value);
	}

	public function getFromExtTableFantassinType($idfantassintype=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryFantassins::getFromExtTableFantassinType($idfantassintype);
	}

	public function deleteCompositeLinksFromFantassinType($idfantassintype) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM fantassins WHERE fantassintype = '.$idfantassintype;
	}

	public function delete($object=array()) {
		//Generated by ManagerGenerator::generateDelete()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": La suppression se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Fantassins) {
			$oFantassins = new Fantassins($object['fantassinId'],$object['fantassinNom'],$object['fantassinDesc'],$object['fantassinType'],$object['fantassinVie'],$object['fantassinAttaque'],$object['fantassinDefense'],$object['fantassinMouvement']);
		} else {
			$oFantassins = $object;
		}
		/* Appel de la methode delete de l'objet */
		/* Tout se passe dans une transaction ouverte plus haut */
			/* Execution de la requete */
		if (database::getInstance()->executeRequete($oFantassins->delete())) {
			/* Requete OK */
			return true;
		} else {
			/* Requete NOK lancement d'une exception PDO */
			throw new PDOException('Erreur sur delete (Fantassins)');
		}
	}

	public function update($object=array()) {
		//Generated by ManagerGenerator::generateUpdate()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": la mise &agrave; jour se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Fantassins) {
			$oFantassins = new Fantassins($object['fantassinId'],$object['fantassinNom'],$object['fantassinDesc'],$object['fantassinType'],$object['fantassinVie'],$object['fantassinAttaque'],$object['fantassinDefense'],$object['fantassinMouvement']);
		} else {
			$oFantassins = $object;
		}
		/* Maintenant on compare avec celle en session */
		if (!empty($_SESSION['fantassins']) && sizeof($_SESSION['fantassins']->compareTo($oFantassins)) > 0) {
			$_SESSION['fantassins'] = $oFantassins;
		}
		/* on update car les objets sont different */
		return database::getInstance()->executeRequete($oFantassins->update());
	}

	public function save($object=array()) {
		//Generated by ManagerGenerator::generateSave()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": la sauvegarde se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Fantassins) {
			$oFantassins = new Fantassins($object['fantassinId'],$object['fantassinNom'],$object['fantassinDesc'],$object['fantassinType'],$object['fantassinVie'],$object['fantassinAttaque'],$object['fantassinDefense'],$object['fantassinMouvement']);
		} else {
			$oFantassins = $object;
		}
		/* Appel de la methode update de l'objet */
		return database::getInstance()->executeRequete($oFantassins->save());
	}

	public function findBy($champ,$data='') {
		//Generated by ManagerGenerator::generateFindBy()
		/* creation d'un objet de base de la classe */
		$object = new Fantassins();
		$resultat = array();
		for ($i = 0; $i < sizeof($this -> _aListeFantassins); $i++) {
			$object = $this -> _aListeFantassins[$i];
			if ($object -> {'_'.strtolower($champ)} == $data) {
				$resultat[] = $object;
			}
		}
		if (sizeof($resultat) > 0) {
			//existe
			return $resultat;
		} else {
			//n'existe pas
			return "Pas de Fantassins de ".strtolower($champ)." '".$data."'";
		}
	}

	public function getFantassinsVide() {
		//Generated by ManagerGenerator::generateGetObjetVide()
		return new Fantassins();
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Fantassins21]*/	/*[/TAG-Fantassins21]*/


}
?>