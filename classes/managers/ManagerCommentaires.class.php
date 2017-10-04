<?php
		//Generated by ManagerGenerator::generate()
class ManagerCommentaires {
	/** Instance de la classe (managerCommentaires) */
	private static $_instance = null;

	/** Connexion a la base de donnees (database) */
	private static $_oConnexion = null;

	/** Liste des objet de la classe (Commentaires) */
	private static $_aListeCommentaires = array();

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Commentaires11]*/	/*[/TAG-Commentaires11]*/


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
		return FactoryCommentaires::getFromTableCommentaires($value);
	}

	public function getByJoueurId($value) {
		//Generated by ManagerGenerator::generateGetByJoueurId()
		return FactoryCommentaires::getFromExtTableJoueur($value);
	}

	public function getFromExtTableNews($idnews=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryCommentaires::getFromExtTableNews($idnews);
	}

	public function deleteCompositeLinksFromNews($idnews) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM commentaires WHERE news = '.$idnews;
	}

	public function getFromExtTableMembre($idmembre=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK()
		/* Appel de la methode de la Fabrique */
		return FactoryCommentaires::getFromExtTableMembre($idmembre);
	}

	public function deleteCompositeLinksFromMembre($idmembre) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks()
		$requete = 'DELETE FROM commentaires WHERE membre = '.$idmembre;
	}

	public function delete($object=array()) {
		//Generated by ManagerGenerator::generateDelete()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": La suppression se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Commentaires) {
			$oCommentaires = new Commentaires($object['id'],$object['news'],$object['membre'],$object['contenu'],$object['publication'],$object['modification'],$object['valide']);
		} else {
			$oCommentaires = $object;
		}
		/* Appel de la methode delete de l'objet */
		/* Tout se passe dans une transaction ouverte plus haut */
			/* Execution de la requete */
		if (database::getInstance()->executeRequete($oCommentaires->delete())) {
			/* Requete OK */
			return true;
		} else {
			/* Requete NOK lancement d'une exception PDO */
			throw new PDOException('Erreur sur delete (Commentaires)');
		}
	}

	public function update($object=array()) {
		//Generated by ManagerGenerator::generateUpdate()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": la mise &agrave; jour se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Commentaires) {
			$oCommentaires = new Commentaires($object['id'],$object['news'],$object['membre'],$object['contenu'],$object['publication'],$object['modification'],$object['valide']);
		} else {
			$oCommentaires = $object;
		}
		/* Maintenant on compare avec celle en session */
		if (!empty($_SESSION['commentaires']) && sizeof($_SESSION['commentaires']->compareTo($oCommentaires)) > 0) {
			$_SESSION['commentaires'] = $oCommentaires;
		}
		/* on update car les objets sont different */
		return database::getInstance()->executeRequete($oCommentaires->update());
	}

	public function save($object=array()) {
		//Generated by ManagerGenerator::generateSave()
		/* Verification */
		if (empty($object)) {
			throw new Exception(get_class($this).": la sauvegarde se fait sur un objet.", E_USER_ERROR);
		}
		/* si ce n'est pas une instance de la classe, on la cree */
		if (! $object instanceof Commentaires) {
			$oCommentaires = new Commentaires($object['id'],$object['news'],$object['membre'],$object['contenu'],$object['publication'],$object['modification'],$object['valide']);
		} else {
			$oCommentaires = $object;
		}
		/* Appel de la methode update de l'objet */
		return database::getInstance()->executeRequete($oCommentaires->save());
	}

	public function findBy($champ,$data='') {
		//Generated by ManagerGenerator::generateFindBy()
		/* creation d'un objet de base de la classe */
		$object = new Commentaires();
		$resultat = array();
		for ($i = 0; $i < sizeof($this -> _aListeCommentaires); $i++) {
			$object = $this -> _aListeCommentaires[$i];
			if ($object -> {'_'.strtolower($champ)} == $data) {
				$resultat[] = $object;
			}
		}
		if (sizeof($resultat) > 0) {
			//existe
			return $resultat;
		} else {
			//n'existe pas
			return "Pas de Commentaires de ".strtolower($champ)." '".$data."'";
		}
	}

	public function getCommentairesVide() {
		//Generated by ManagerGenerator::generateGetObjetVide()
		return new Commentaires();
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Commentaires21]*/	/*[/TAG-Commentaires21]*/


}
?>