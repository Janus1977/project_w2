<?php
		//Generated by ManagerGenerator::generate() on 12/05/2017 15:42:37
class ManagerPartie {
	/** Instance de la classe (managerPartie) */
	private static $_instance = null;

	/** Connexion a la base de donnees (database) */
	private static $_oConnexion = null;

	/** Liste des objet de la classe (Partie) */
	private static $_aListePartie = array();

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Partie11]*/	/*[/TAG-Partie11]*/


	protected function __construct() {
		//Generated by ManagerGenerator::generateConstruct() on 12/05/2017 15:42:37
	}

	public function __destruct() {
		//Generated by ManagerGenerator::generateDestruct() on 12/05/2017 15:42:37
		// TODO ??
	}

	public static function getInstance() {
		//Generated by ManagerGenerator::generateGetInstance() on 12/05/2017 15:42:37
		if (is_null(self::$_instance)) {
			self::$_instance = new self;
		}
		return self::$_instance;
	}

	public function __clone() {
		//Generated by ManagerGenerator::generateClone() on 12/05/2017 15:42:37
		throw new Exception(get_class($this).": Le clonage n'est pas autoris&eacute;", E_USER_ERROR);
	}

	public function setConnexion() {
		//Generated by ManagerGenerator::generateSetConnexion() on 12/05/2017 15:42:37
		self::$_oConnexion = database::getInstance();// pas besoin de parametrer, un manager arrive apres la conf
	}

	public function __set($name,$id) {
		//Generated by ManagerGenerator::generateSet() on 12/05/2017 15:42:37
		throw new Exception(get_class($this).": Le set 'noname' n'est pas autoris&eacute;", E_USER_ERROR);
	}

	public function __get($name) {
		//Generated by ManagerGenerator::generateGet() on 12/05/2017 15:42:37
		throw new Exception(get_class($this).": Le get 'noname' n'est pas autoris&eacute;", E_USER_ERROR);
	}

	public function getById($id=-1) {
		//Generated by ManagerGenerator::generateGetById() on 12/05/2017 15:42:37
		if ($id == -1) {
			//Toute les informations
			return FactoryPartie::getFromTablePartie($id);
		} else {
			//Verification si l'objet n'est pas en memoire
			if ($id > 0 && !array_key_exists($id,self::$_aListePartie)) {
				self::$_aListePartie[$id] = FactoryPartie::getFromTablePartie($id);
			}
		}
		return self::$_aListePartie[$id];
	}

	public function getFromExtTableCarte($carte=-1) {
		//Generated by ManagerGenerator::generateGetFromTableFromFK() on 12/05/2017 15:42:37
		//Verification en memoire
		foreach (self::$_aListePartie AS $oPartie) {
			if ($oPartie->getCarte() == $carte) {
				return $oPartie;
			}
		}
		// Appel de la methode de la Fabrique
		$oPartie = FactoryPartie::getFromExtTableCarte($carte);
		// Memorisation pour plus tard
		self::$_aListePartie[$oPartie->getId()] = $oPartie;
		// Renvoie de la donnee
		return $oPartie;
	}

	public function deleteCompositeLinksFromCarte($idcarte) {
		//Generated by ManagerGenerator::generateDeleteCompositeLinks() on 12/05/2017 15:42:37
		//TODO
	}

	public function delete($object=array()) {
		//Generated by ManagerGenerator::generateDelete() on 12/05/2017 15:42:37
		// Verification
		if (empty($object)) {
			throw new Exception(get_class($this).": La suppression se fait sur un objet.", E_USER_ERROR);
		}
		// si ce n'est pas une instance de la classe, on la cree
		if (! $object instanceof Partie) {
			$oPartie = new Partie($object['id'],$object['nom'],$object['carte'],$object['date_creation'],$object['date_fin'],$object['ia']);
		} else {
			$oPartie = $object;
		}
		// Appel de la methode delete de l'objet
		// Tout se passe dans une transaction ouverte plus haut
			// Execution de la requete
		if (database::getInstance()->executeRequete($oPartie->delete())) {
			// Requete OK
			unset(self::$_aListePartie[$oPartie->getId()]);
			return true;
		} else {
			// Requete NOK lancement d'une exception PDO
			throw new PDOException('Erreur sur delete (Partie)');
		}
	}

	public function update($object=array()) {
		//Generated by ManagerGenerator::generateUpdate() on 12/05/2017 15:42:37
		// Verification
		if (empty($object)) {
			throw new Exception(get_class($this).": la mise &agrave; jour se fait sur un objet.", E_USER_ERROR);
		}
		// si ce n'est pas une instance de la classe, on la cree
		if (! $object instanceof Partie) {
			$oPartie = new Partie($object['id'],$object['nom'],$object['carte'],$object['date_creation'],$object['date_fin'],$object['ia']);
		} else {
			$oPartie = $object;
		}
		// Maintenant on compare avec celle en session
		if (!empty($_SESSION['partie']) && sizeof($_SESSION['partie']->compareTo($oPartie)) > 0) {
			$_SESSION['partie'] = $oPartie;
		}
		if ($oPartie->getId() == 0) {
			//Go TO SAVE
			self::save($oPartie);
		} else {
			// on update car les objets sont different
			if (database::getInstance()->executeRequete($oPartie->update()) === true) {
				//maj id dans la liste
				self::$_aListePartie[$oPartie->getId()] = $oPartie;
				return true;
			} else {
				return false;
			}
		}
	}

	public function save($object=array()) {
		//Generated by ManagerGenerator::generateSave() on 12/05/2017 15:42:37
		// Verification
		if (empty($object)) {
			throw new Exception(get_class($this).": la sauvegarde se fait sur un objet.", E_USER_ERROR);
		}
		// si ce n'est pas une instance de la classe, on la cree
		if (! $object instanceof Partie) {
			$oPartie = new Partie($object['id'],$object['nom'],$object['carte'],$object['date_creation'],$object['date_fin'],$object['ia']);
		} else {
			$oPartie = $object;
		}
		if ($oPartie->getId() > 0) {
			//Go TO UPDATE
			self::update($oPartie);
		} else {
			// Appel de la methode update de l'objet
			if (database::getInstance()->executeRequete($oPartie->save()) === true) {
				//maj id dans la liste
				self::$_aListePartie[$oPartie->getId()] = $oPartie;
				return true;
			} else {
				return false;
			}
		}
	}

	public function findBy($champ,$data='') {
		//Generated by ManagerGenerator::generateFindBy() on 12/05/2017 15:42:37
		// creation d'un objet de base de la classe
		$object = new Partie();
		$resultat = array();
		for ($i = 0; $i < sizeof($this -> _aListePartie); $i++) {
			$object = $this -> _aListePartie[$i];
			if ($object -> {'_'.strtolower($champ)} == $data) {
				$resultat[] = $object;
			}
		}
		if (sizeof($resultat) > 0) {
			//existe
			return $resultat;
		} else {
			//n'existe pas
			return "Pas de Partie de ".strtolower($champ)." '".$data."'";
		}
	}

	public function getPartieVide() {
		//Generated by ManagerGenerator::generateGetObjetVide() on 12/05/2017 15:42:37
		return new Partie();
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Partie21]*/	/*[/TAG-Partie21]*/


}
?>