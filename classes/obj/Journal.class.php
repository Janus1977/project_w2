<?php
		//Generated by ObjectGenerator::generate()
class Journal {
	protected $_id; /* bigint(20) unsigned */

	/* identifiant composite Idmembre1 */
	protected $_idmembre1; /* bigint(20) unsigned */
	/* liste des objets Idmembre1 */
	protected $_oIdmembre1; /* idmembre1 Object*/

	protected $_action; /* text */

	/* identifiant composite Idmembre2 */
	protected $_idmembre2; /* bigint(20) unsigned */
	/* liste des objets Idmembre2 */
	protected $_oIdmembre2; /* idmembre2 Object*/

	protected $_date_heure; /* datetime */
	protected $_empty = true; // permet de savoir si l'objet est vide

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Journal11]*/	/*[/TAG-Journal11]*/


	public function __construct($id=0,$idmembre1=0,$action='',$idmembre2=0,$date_heure='') {
		//Generated by ObjectGenerator::generateConstruct()
		$this->_id = $id;
		$this->_idmembre1 = $idmembre1;
		$this->_action = $action;
		$this->_idmembre2 = $idmembre2;
		$this->_date_heure = $date_heure;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-__construct1]*/	/*[/TAG-__construct1]*/


	}


	public function __clone() {
		//Generated by ObjectGenerator::generateClone()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-__clone1]*/	/*[/TAG-__clone1]*/

		//Sur le clonage d'un objet on supprime l'identifiant
		$this->_description .= ' / Clone '.__CLASS__.' ID '.$this->_id;
		$this->_id = 0;
	}


	public function setId($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setId1]*/	/*[/TAG-setId1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if (!$this->getEmpty()) {
		return;
		}
		$this->_id = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setId2]*/	/*[/TAG-setId2]*/

	}



	public function setIdmembre1($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setIdmembre11]*/	/*[/TAG-setIdmembre11]*/

		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_idmembre1 = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setIdmembre12]*/	/*[/TAG-setIdmembre12]*/

	}



	public function setAction($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setAction1]*/	/*[/TAG-setAction1]*/

		$this->_action = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setAction2]*/	/*[/TAG-setAction2]*/

	}



	public function setIdmembre2($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setIdmembre21]*/	/*[/TAG-setIdmembre21]*/

		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_idmembre2 = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setIdmembre22]*/	/*[/TAG-setIdmembre22]*/

	}



	public function setDate_heure($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDate_heure1]*/	/*[/TAG-setDate_heure1]*/

		$this->_date_heure = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDate_heure2]*/	/*[/TAG-setDate_heure2]*/

	}




	public function getId() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_id;
	}



	public function getIdmembre1() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_idmembre1;
	}



	public function getAction() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_action;
	}



	public function getIdmembre2() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_idmembre2;
	}



	public function getDate_heure() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_date_heure;
	}



	public function __toString() {
		//Generated by ObjectGenerator::generateToString()
		$chaine = 'Objet '.get_class($this).':<br/>';
		$chaine .= 'Le champ id vaut '.$this->getId().'<br/>';
		if (!empty($this->_idmembre1)) {
			$chaine .= '<br/>Membre1 associ&eacute;: '.$this->_idmembre1.'<br/>';
		} else {
			$chaine .= 'Pas de Membre1 associ&eacute;<br/>';
		}
		$chaine .= 'Le champ action vaut '.$this->getAction().'<br/>';
		if (!empty($this->_idmembre2)) {
			$chaine .= '<br/>Membre2 associ&eacute;: '.$this->_idmembre2.'<br/>';
		} else {
			$chaine .= 'Pas de Membre2 associ&eacute;<br/>';
		}
		$chaine .= 'Le champ date_heure vaut '.$this->getDate_heure().'<br/>';

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-__toString1]*/	/*[/TAG-__toString1]*/

		return $chaine;
	}

	public function save() {
		//Generated by ObjectGenerator::generateSave()
		if ($this->getId() > 0) {
			/* un identifiant superieur a 0 implique un ancien objet => UPDATE */
			$this->update();
		} else {
			$requete = 'INSERT INTO journal (id,idmembre1,action,idmembre2,date_heure)';
			$requete .= ' VALUES ';
			$requete .= '(';
			$requete .= '\'\','; //valeur forcee pour l'insertion
			$requete .= '\'\','; //valeur forcee pour l'insertion
			$requete .= '\''.$this->getAction().'\',';
			$requete .= '\'\','; //valeur forcee pour l'insertion
			$laDate = $this->getDate_heure();
			if (strlen($laDate) > 0) {
				$requete .= '\''.$laDate.'\',';
			} else {
				$requete .= 'NOW(),';
			}
			$requete = substr($requete,0,strlen($requete)-1);
			$requete .= ')';
			return $requete;
		}
	}

	public function update() {
		//Generated by ObjectGenerator::generateUpdate()
		if ($this->getId() == 0 || $this->getId() == null) {
			/* un identifiant 0 ou null implique un nouvel objet => INSERT */
			$this->save();
		} else {
			$requete = 'UPDATE journal SET ';
			$requete .= 'idmembre1 = '.$this->getIdmembre1().',';
			$requete .= 'action = \''.$this->getAction().'\',';
			$requete .= 'idmembre2 = '.$this->getIdmembre2().',';
			$laDate = $this->getDate_heure();
			if (strlen($laDate) > 0) {
				$requete .= 'date_heure = \''.$laDate.'\',';
			} else {
				$requete .= 'date_heure = NOW(),';
			}
			$requete = substr($requete,0,strlen($requete)-1);
			$requete .= ' WHERE id = '.$this->getId();
			return $requete;
		}
	}

	public function delete() {
		//Generated by ObjectGenerator::generateDelete()
		if ($this->getId() == 0 || $this->getId() == null) {
			/* ERREUR A FAIRE SORTIR */
			/* TODO */
		} else {
			return 'DELETE FROM journal WHERE id = '.$this->getId();
		}
	}

	public function getParent() {
		//Generated by ObjectGenerator::generateGetParent()
		return ('parent::__construct($id,$idmembre1,$action,$idmembre2,$date_heure);');
	}

	public function getAttributes() {
		//Generated by ObjectGenerator::generateGetAttributes()
		$result = array();
		$result2 = array();
		$reflection = new ReflectionClass($this);
		$result = $reflection->getdefaultProperties();
		$result = array_keys($result);
		foreach ($result AS $data) {
			$result2[] = substr($data,1);
		}
		return $result2;
	}

	public function compareTo($object) {
		//Generated by ObjectGenerator::generateCompareTo()
		$data = array();
		if ($object instanceof Journal) {
			if ($this->_id != $object->getId()) {
				$data['id'] = $object->getId();
			}
			if ($this->_idmembre1 != $object->getIdmembre1()) {
				$data['idmembre1'] = $object->getIdmembre1();
			}
			if ($this->_action != $object->getAction()) {
				$data['action'] = $object->getAction();
			}
			if ($this->_idmembre2 != $object->getIdmembre2()) {
				$data['idmembre2'] = $object->getIdmembre2();
			}
			if ($this->_date_heure != $object->getDate_heure()) {
				$data['date_heure'] = $object->getDate_heure();
			}
		}
		return $data;
	}

	public function encodeDecodeJSON($json_str='') {
		//Generated by ObjectGenerator::generateEncodeDecodeJSON()
		if ($json_str == '') {
			// Objet standard a remplir
			$json= new stdClass();
			foreach ($this as $key => $value) {
				if (substr($key,0,1) == '_') {
					$key = substr($key,1);
					//on evite de faire sortir les objet fonctionnels
					if (strtolower(substr($key,0,1)) != 'o') {
						$json->$key = $value;
					}
				}
				$json->$key = $value;
			}
			return json_encode($json);
		} else {
			/* decodage et hydratation des datas JSON */
			$json = json_decode($json_str, 1);
			foreach ($json as $key => $value) {
				$method = 'set'.ucfirst($key);
				//Si la methode existe alors on l'utilise
				if (method_exists($this, $method)) {
					$this->$method($value);
				}
			}
		}
	}

	public function getClass() {
		//Generated by ObjectGenerator::generateGetClass()
		return get_class($this);
	}

	public function getEmpty() {
		//Generated by ObjectGenerator::generateIsEmpty()
		return $this->_empty;
	}

	public function affiche() {
		//Generated by ObjectGenerator::generateAffiche()
		/* Chargement de Smarty */
		require_once(_SMARTY_LOAD_);
		$smarty->assign('journal',$this);
		$smarty->assign('aListeMethodes',get_class_methods($this));
		$smarty->assign('urlVersMiniature',_URL_MINIATURES_.$this->getNom().'.jpg');
		/* Appel de l'affichage pour la classe en cour d'utilisation */
		$smarty->display(_TEMPLATES_BASE_.'classes/Journal.tpl');
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Journal21]*/	/*[/TAG-Journal21]*/

}
?>