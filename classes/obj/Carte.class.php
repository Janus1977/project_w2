<?php
		//Generated by ObjectGenerator::generate() on 13/06/2017 12:53:19
class Carte {
	protected $_id; /* bigint(20) */
	protected $_nom; /* varchar(50) */

	/* identifiant composite Dimension */
	protected $_dimension; /* bigint(20) unsigned */
	/* liste des objets Dimension */
	protected $_oDimension; /* dimension Object*/

	protected $_apercu; /* varchar(50) */
	protected $_edition; /* tinyint(1) */
	protected $_empty = true; // permet de savoir si l'objet est vide

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Carte11]*/	/*[/TAG-Carte11]*/


	public function __construct($id=0,$nom='',$dimension=0,$apercu='',$edition=0) {
		//Generated by ObjectGenerator::generateConstruct() on 13/06/2017 12:53:19
		$this->_id = $id;
		$this->_nom = $nom;
		$this->_dimension = $dimension;
		$this->_apercu = $apercu;
		$this->_edition = $edition;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-__construct1]*/	/*[/TAG-__construct1]*/


	}


	public function __clone() {
		//Generated by ObjectGenerator::generateClone() on 13/06/2017 12:53:19

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
		//Generated by ObjectGenerator::generateSet() on 13/06/2017 12:53:19

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
		//Generated by ObjectGenerator::generateSet() on 13/06/2017 12:53:19

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



	public function setDimension($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet() on 13/06/2017 12:53:19

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDimension1]*/	/*[/TAG-setDimension1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_dimension = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDimension2]*/	/*[/TAG-setDimension2]*/

	}

	protected function setDimensionObject() {
		//Generated by ObjectGenerator::generateSet() on 13/06/2017 12:53:19

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDimensionObject1]*/	/*[/TAG-setDimensionObject1]*/

		if ($this->_dimension > 0) {
			$this->_oDimension = FactoryDimension::getFromTableDimension($this->_dimension);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDimensionObject2]*/	/*[/TAG-setDimensionObject2]*/

	}



	public function setApercu($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet() on 13/06/2017 12:53:19

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setApercu1]*/	/*[/TAG-setApercu1]*/

		$this->_apercu = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setApercu2]*/	/*[/TAG-setApercu2]*/

	}



	public function setEdition($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet() on 13/06/2017 12:53:19

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setEdition1]*/	/*[/TAG-setEdition1]*/

		$this->_edition = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setEdition2]*/	/*[/TAG-setEdition2]*/

	}




	public function getId() {
		//Generated by ObjectGenerator::generateGet() on 13/06/2017 12:53:19
		return $this->_id;
	}



	public function getNom() {
		//Generated by ObjectGenerator::generateGet() on 13/06/2017 12:53:19
		return $this->_nom;
	}



	public function getDimension() {
		//Generated by ObjectGenerator::generateGet() on 13/06/2017 12:53:19
		return $this->_dimension;
	}

	public function getDimensionObject() {
		//Generated by ObjectGenerator::generateGet() on 13/06/2017 12:53:19
		if (empty($this->_oDimension)) {
			$this->setDimensionObject();
		}
		if ((empty($this->_oDimension) || is_null($this->_oDimension))&& $this->_dimension > 0) {
			$this->setDimensionObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getDimensionObject1]*/
		if (is_null($this->_oDimension)) {
			$this->setDimensionObject();
		}
	/*[/TAG-getDimensionObject1]*/

		return $this->_oDimension;
	}



	public function getApercu() {
		//Generated by ObjectGenerator::generateGet() on 13/06/2017 12:53:19
		return $this->_apercu;
	}



	public function getEdition() {
		//Generated by ObjectGenerator::generateGet() on 13/06/2017 12:53:19
		return $this->_edition;
	}



	public function __toString() {
		//Generated by ObjectGenerator::generateToString() on 13/06/2017 12:53:19
		$chaine = 'Objet '.get_class($this).':<br/>';
		$chaine .= 'Le champ id vaut '.$this->getId().'<br/>';
		$chaine .= 'Le champ nom vaut '.$this->getNom().'<br/>';
		$chaine .= 'Le champ dimension vaut '.$this->getDimension().'<br/>';
		$chaine .= 'Le champ apercu vaut '.$this->getApercu().'<br/>';
		$chaine .= 'Le champ edition vaut '.$this->getEdition().'<br/>';

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-__toString1]*/	/*[/TAG-__toString1]*/

		return $chaine;
	}

	public function save() {
		//Generated by ObjectGenerator::generateSave() on 13/06/2017 12:53:19
		if ($this->getId() > 0) {
			/* un identifiant superieur a 0 implique un ancien objet => UPDATE */
			$this->update();
		} else {
			$requete = 'INSERT INTO carte (id,nom,dimension,apercu,edition)';
			$requete .= ' VALUES ';
			$requete .= '(';
			$requete .= '\'\','; //valeur forcee pour l'insertion
			$requete .= '\''.$this->getNom().'\',';
			$requete .= $this->getDimension().',';
			$requete .= '\''.$this->getApercu().'\',';
			$requete .= $this->getEdition().',';
			$requete = substr($requete,0,strlen($requete)-1);
			$requete .= ')';
			return $requete;
		}
	}

	public function update() {
		//Generated by ObjectGenerator::generateUpdate() on 13/06/2017 12:53:19
		if ($this->getId() == 0 || $this->getId() == null) {
			/* un identifiant 0 ou null implique un nouvel objet => INSERT */
			$this->save();
		} else {
			$requete = 'UPDATE carte SET ';
			$requete .= 'nom = \''.$this->getNom().'\',';
			$requete .= 'dimension = '.$this->getDimension().',';
			$requete .= 'apercu = \''.$this->getApercu().'\',';
			$requete .= 'edition = '.$this->getEdition().',';
			$requete = substr($requete,0,strlen($requete)-1);
			$requete .= ' WHERE id = '.$this->getId();
			return $requete;
		}
	}

	public function delete() {
		//Generated by ObjectGenerator::generateDelete() on 13/06/2017 12:53:19
		if ($this->getId() == 0 || $this->getId() == null) {
			/* ERREUR A FAIRE SORTIR */
			/* TODO */
		} else {
			return 'DELETE FROM carte WHERE id = '.$this->getId();
		}
	}

	public function getParent() {
		//Generated by ObjectGenerator::generateGetParent() on 13/06/2017 12:53:19
		return ('parent::__construct($id,$nom,$dimension,$apercu,$edition);');
	}

	public function getAttributes() {
		//Generated by ObjectGenerator::generateGetAttributes() on 13/06/2017 12:53:19
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
		//Generated by ObjectGenerator::generateCompareTo() on 13/06/2017 12:53:19
		$data = array();
		if ($object instanceof Carte) {
			if ($this->_id != $object->getId()) {
				$data['id'] = $object->getId();
			}
			if ($this->_nom != $object->getNom()) {
				$data['nom'] = $object->getNom();
			}
			if ($this->_dimension != $object->getDimension()) {
				$data['dimension'] = $object->getDimension();
			}
			if ($this->_apercu != $object->getApercu()) {
				$data['apercu'] = $object->getApercu();
			}
			if ($this->_edition != $object->getEdition()) {
				$data['edition'] = $object->getEdition();
			}
		}
		return $data;
	}

	public function encodeDecodeJSON($json_str='') {
		//Generated by ObjectGenerator::generateEncodeDecodeJSON() on 13/06/2017 12:53:19
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
		//Generated by ObjectGenerator::generateGetClass() on 13/06/2017 12:53:19
		return get_class($this);
	}

	public function getEmpty() {
		//Generated by ObjectGenerator::generateIsEmpty() on 13/06/2017 12:53:19
		return $this->_empty;
	}

	public function affiche() {
		//Generated by ObjectGenerator::generateAffiche() on 13/06/2017 12:53:19
		/* Chargement de Smarty */
		require_once(_SMARTY_LOAD_);
		$smarty->assign('carte',$this);
		$smarty->assign('aListeMethodes',get_class_methods($this));
		$smarty->assign('urlVersMiniature',_URL_MINIATURES_.$this->getNom().'.jpg');
		/* Appel de l'affichage pour la classe en cour d'utilisation */
		$smarty->display(_TEMPLATES_BASE_.'classes/Carte.tpl');
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Carte21]*/
	public function getNb_cases_x() {
		return $this->getDimensionObject()->getLargeur();
	}
	
	public function getNb_cases_y() {
		return $this->getDimensionObject()->getLongueur();
	}
	
	public function setListeCasesCarte($listeCasesCarte) {
		$this->_aListeCasesCarte = $listeCasesCarte;
	}
	
	public function setListePlateauxCarte($listePlateauxCarte) {
		$this->_aListePlateauxCarte = $listePlateauxCarte;
	}
	
	/**
	 * Methode retournant la liste des cases de la carte
	 * @return $this->_aListeCasesCarte des objets Cases de la Carte
	 */
	public function getListeCasesCarte() {
		return $this->_aListeCasesCarte;
	}
	
	/**
	 * Methode retournant la liste des plateaux de la carte
	 * @return $this->_aListePlateauxCarte des objets Plateau de la Carte
	 */
	public function getListePlateauxCarte() {
		return $this->_aListePlateauxCarte;
	}
	
	
	/*[/TAG-Carte21]*/

}
?>