<?php
		//Generated by ObjectGenerator::generate() on 12/05/2017 15:42:37
class Partie {
	protected $_id; /* bigint(20) unsigned */
	protected $_nom; /* varchar(20) */

	/* identifiant composite Carte */
	protected $_carte; /* bigint(20) unsigned */
	/* liste des objets Carte */
	protected $_oCarte; /* carte Object*/

	protected $_date_creation; /* datetime */
	protected $_date_fin; /* datetime */
	protected $_ia; /* tinyint(1) unsigned */
	protected $_empty = true; // permet de savoir si l'objet est vide

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Partie11]*/	/*[/TAG-Partie11]*/


	public function __construct($id=0,$nom='',$carte=0,$date_creation='',$date_fin='',$ia=0) {
		//Generated by ObjectGenerator::generateConstruct() on 12/05/2017 15:42:37
		$this->_id = $id;
		$this->_nom = $nom;
		$this->_carte = $carte;
		$this->_date_creation = $date_creation;
		$this->_date_fin = $date_fin;
		$this->_ia = $ia;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-__construct1]*/	/*[/TAG-__construct1]*/


	}


	public function __clone() {
		//Generated by ObjectGenerator::generateClone() on 12/05/2017 15:42:37

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
		//Generated by ObjectGenerator::generateSet() on 12/05/2017 15:42:37

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



	public function setNom($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet() on 12/05/2017 15:42:37

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setNom1]*/	/*[/TAG-setNom1]*/

		$this->_nom = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setNom2]*/	/*[/TAG-setNom2]*/

	}



	public function setCarte($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet() on 12/05/2017 15:42:37

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setCarte1]*/	/*[/TAG-setCarte1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_carte = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setCarte2]*/	/*[/TAG-setCarte2]*/

	}

	protected function setCarteObject() {
		//Generated by ObjectGenerator::generateSet() on 12/05/2017 15:42:37

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setCarteObject1]*/	/*[/TAG-setCarteObject1]*/

		if ($this->_carte > 0) {
			$this->_oCarte = FactoryCarte::getFromTableCarte($this->_carte);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setCarteObject2]*/	/*[/TAG-setCarteObject2]*/

	}



	public function setDate_creation($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet() on 12/05/2017 15:42:37

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDate_creation1]*/	/*[/TAG-setDate_creation1]*/

		$this->_date_creation = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDate_creation2]*/	/*[/TAG-setDate_creation2]*/

	}



	public function setDate_fin($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet() on 12/05/2017 15:42:37

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDate_fin1]*/	/*[/TAG-setDate_fin1]*/

		$this->_date_fin = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDate_fin2]*/	/*[/TAG-setDate_fin2]*/

	}



	public function setIa($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet() on 12/05/2017 15:42:37

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setIa1]*/	/*[/TAG-setIa1]*/

		$this->_ia = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setIa2]*/	/*[/TAG-setIa2]*/

	}




	public function getId() {
		//Generated by ObjectGenerator::generateGet() on 12/05/2017 15:42:37
		return $this->_id;
	}



	public function getNom() {
		//Generated by ObjectGenerator::generateGet() on 12/05/2017 15:42:37
		return $this->_nom;
	}



	public function getCarte() {
		//Generated by ObjectGenerator::generateGet() on 12/05/2017 15:42:37
		return $this->_carte;
	}

	public function getCarteObject() {
		//Generated by ObjectGenerator::generateGet() on 12/05/2017 15:42:37
		if (empty($this->_oCarte)) {
			$this->setCarteObject();
		}
		if ((empty($this->_oCarte) || is_null($this->_oCarte))&& $this->_carte > 0) {
			$this->setCarteObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getCarteObject1]*/	/*[/TAG-getCarteObject1]*/

		return $this->_oCarte;
	}



	public function getDate_creation() {
		//Generated by ObjectGenerator::generateGet() on 12/05/2017 15:42:37
		return $this->_date_creation;
	}



	public function getDate_fin() {
		//Generated by ObjectGenerator::generateGet() on 12/05/2017 15:42:37
		return $this->_date_fin;
	}



	public function getIa() {
		//Generated by ObjectGenerator::generateGet() on 12/05/2017 15:42:37
		return $this->_ia;
	}



	public function __toString() {
		//Generated by ObjectGenerator::generateToString() on 12/05/2017 15:42:37
		$chaine = 'Objet '.get_class($this).':<br/>';
		$chaine .= 'Le champ id vaut '.$this->getId().'<br/>';
		$chaine .= 'Le champ nom vaut '.$this->getNom().'<br/>';
		$chaine .= 'Le champ carte vaut '.$this->getCarte().'<br/>';
		$chaine .= 'Le champ date_creation vaut '.$this->getDate_creation().'<br/>';
		$chaine .= 'Le champ date_fin vaut '.$this->getDate_fin().'<br/>';
		$chaine .= 'Le champ ia vaut '.$this->getIa().'<br/>';

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-__toString1]*/	/*[/TAG-__toString1]*/

		return $chaine;
	}

	public function save() {
		//Generated by ObjectGenerator::generateSave() on 12/05/2017 15:42:37
		if ($this->getId() > 0) {
			/* un identifiant superieur a 0 implique un ancien objet => UPDATE */
			$this->update();
		} else {
			$requete = 'INSERT INTO partie (id,nom,carte,date_creation,date_fin,ia)';
			$requete .= ' VALUES ';
			$requete .= '(';
			$requete .= '\'\','; //valeur forcee pour l'insertion
			$requete .= '\''.$this->getNom().'\',';
			$requete .= $this->getCarte().',';
			$laDate = $this->getDate_creation();
			if (strlen($laDate) > 0) {
				$requete .= '\''.$laDate.'\',';
			} else {
				$requete .= 'NOW(),';
			}
			$laDate = $this->getDate_fin();
			if (strlen($laDate) > 0) {
				$requete .= '\''.$laDate.'\',';
			} else {
				$requete .= 'NOW(),';
			}
			$requete .= $this->getIa().',';
			$requete = substr($requete,0,strlen($requete)-1);
			$requete .= ')';
			return $requete;
		}
	}

	public function update() {
		//Generated by ObjectGenerator::generateUpdate() on 12/05/2017 15:42:37
		if ($this->getId() == 0 || $this->getId() == null) {
			/* un identifiant 0 ou null implique un nouvel objet => INSERT */
			$this->save();
		} else {
			$requete = 'UPDATE partie SET ';
			$requete .= 'nom = \''.$this->getNom().'\',';
			$requete .= 'carte = '.$this->getCarte().',';
			$laDate = $this->getDate_creation();
			if (strlen($laDate) > 0) {
				$requete .= 'date_creation = \''.$laDate.'\',';
			} else {
				$requete .= 'date_creation = NOW(),';
			}
			$laDate = $this->getDate_fin();
			if (strlen($laDate) > 0) {
				$requete .= 'date_fin = \''.$laDate.'\',';
			} else {
				$requete .= 'date_fin = NOW(),';
			}
			$requete .= 'ia = '.$this->getIa().',';
			$requete = substr($requete,0,strlen($requete)-1);
			$requete .= ' WHERE id = '.$this->getId();
			return $requete;
		}
	}

	public function delete() {
		//Generated by ObjectGenerator::generateDelete() on 12/05/2017 15:42:37
		if ($this->getId() == 0 || $this->getId() == null) {
			/* ERREUR A FAIRE SORTIR */
			/* TODO */
		} else {
			return 'DELETE FROM partie WHERE id = '.$this->getId();
		}
	}

	public function getParent() {
		//Generated by ObjectGenerator::generateGetParent() on 12/05/2017 15:42:37
		return ('parent::__construct($id,$nom,$carte,$date_creation,$date_fin,$ia);');
	}

	public function getAttributes() {
		//Generated by ObjectGenerator::generateGetAttributes() on 12/05/2017 15:42:37
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
		//Generated by ObjectGenerator::generateCompareTo() on 12/05/2017 15:42:37
		$data = array();
		if ($object instanceof Partie) {
			if ($this->_id != $object->getId()) {
				$data['id'] = $object->getId();
			}
			if ($this->_nom != $object->getNom()) {
				$data['nom'] = $object->getNom();
			}
			if ($this->_carte != $object->getCarte()) {
				$data['carte'] = $object->getCarte();
			}
			if ($this->_date_creation != $object->getDate_creation()) {
				$data['date_creation'] = $object->getDate_creation();
			}
			if ($this->_date_fin != $object->getDate_fin()) {
				$data['date_fin'] = $object->getDate_fin();
			}
			if ($this->_ia != $object->getIa()) {
				$data['ia'] = $object->getIa();
			}
		}
		return $data;
	}

	public function encodeDecodeJSON($json_str='') {
		//Generated by ObjectGenerator::generateEncodeDecodeJSON() on 12/05/2017 15:42:37
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
		//Generated by ObjectGenerator::generateGetClass() on 12/05/2017 15:42:37
		return get_class($this);
	}

	public function getEmpty() {
		//Generated by ObjectGenerator::generateIsEmpty() on 12/05/2017 15:42:37
		return $this->_empty;
	}

	public function affiche() {
		//Generated by ObjectGenerator::generateAffiche() on 12/05/2017 15:42:37
		/* Chargement de Smarty */
		require_once(_SMARTY_LOAD_);
		$smarty->assign('partie',$this);
		$smarty->assign('aListeMethodes',get_class_methods($this));
		$smarty->assign('urlVersMiniature',_URL_MINIATURES_.$this->getNom().'.jpg');
		/* Appel de l'affichage pour la classe en cour d'utilisation */
		$smarty->display(_TEMPLATES_BASE_.'classes/Partie.tpl');
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Partie21]*/	/*[/TAG-Partie21]*/

}
?>