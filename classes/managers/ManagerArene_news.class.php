<?php
		//Generated by ManagerGenerator::generate()
class ManagerArene_news {
	/** Instance de la classe (managerArene_news) */
	private static $_instance = null;

	/** Connexion a la base de donnees (database) */
	private static $_oConnexion = null;

	/** Liste des objet de la classe (Arene_news) */
	private static $_aListeArene_news = array();

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Arene_news11]*/	/*[/TAG-Arene_news11]*/


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
		return FactoryArene_news::getFromTableArene_news($value);
	}

	public function getByJoueurId($value) {
		//Generated by ManagerGenerator::generateGetByJoueurId()
		return FactoryArene_news::getFromExtTableJoueur($value);
	}

	public function getFromExtTableMembre($idmembre=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryArene_news::getFromExtTableMembre($idmembre);
	}

	public function deleteCompositeLinksFromMembre($idmembre) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM arene_news WHERE membre = '.$idmembre;
	}

	public function delete($object=array()) {
		//Generated by ManagerGenerator::generateDelete()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": La suppression se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Arene_news) {
			$oArene_news = new Arene_news($object['id'],$object['membre'],$object['titre'],$object['contenu'],$object['dateheure']);
		} else {
			$oArene_news = $object;
		}
		/* Appel de la methode delete de l'objet */
		/* Tout se passe dans une transaction ouverte plus haut */
			/* Execution de la requete */
		if (database::getInstance()->executeRequete($oArene_news->delete())) {
			/* Requete OK */
			return true;
		} else {
			/* Requete NOK lancement d'une exception PDO */
			throw new PDOException('Erreur sur delete (Arene_news)');
		}
	}

	public function update($object=array()) {
		//Generated by ManagerGenerator::generateUpdate()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": la mise &agrave; jour se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Arene_news) {
			$oArene_news = new Arene_news($object['id'],$object['membre'],$object['titre'],$object['contenu'],$object['dateheure']);
		} else {
			$oArene_news = $object;
		}
		/* Maintenant on compare avec celle en session */
		if (!empty($_SESSION['arene_news']) && sizeof($_SESSION['arene_news']->compareTo($oArene_news)) > 0) {
			$_SESSION['arene_news'] = $oArene_news;
		}
		/* on update car les objets sont different */
		return database::getInstance()->executeRequete($oArene_news->update());
	}

	public function save($object=array()) {
		//Generated by ManagerGenerator::generateSave()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": la sauvegarde se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Arene_news) {
			$oArene_news = new Arene_news($object['id'],$object['membre'],$object['titre'],$object['contenu'],$object['dateheure']);
		} else {
			$oArene_news = $object;
		}
		/* Appel de la methode update de l'objet */
		return database::getInstance()->executeRequete($oArene_news->save());
	}

	public function findBy($champ,$data='') {
		//Generated by ManagerGenerator::generateFindBy()
		/* creation d'un objet de base de la classe */
		$object = new Arene_news();
		$resultat = array();
		for ($i = 0; $i < sizeof($this -> _aListeArene_news); $i++) {
			$object = $this -> _aListeArene_news[$i];
			if ($object -> {'_'.strtolower($champ)} == $data) {
				$resultat[] = $object;
			}
		}
		if (sizeof($resultat) > 0) {
			//existe
			return $resultat;
		} else {
			//n'existe pas
			return "Pas de Arene_news de ".strtolower($champ)." '".$data."'";
		}
	}

	public function getArene_newsVide() {
		//Generated by ManagerGenerator::generateGetObjetVide()
		return new Arene_news();
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Arene_news21]*/	/*[/TAG-Arene_news21]*/


}
?>