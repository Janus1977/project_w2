<?php
		//Generated by ObjectGenerator::generate()
class Fifo {
	protected $_id; /* int(11) unsigned */

	/* identifiant composite Membre */
	protected $_membre; /* int(11) unsigned */
	/* liste des objets Membre */
	protected $_oMembre; /* membre Object*/

	protected $_dateheure; /* datetime */
	protected $_nombre; /* int(10) unsigned */

	/* identifiant composite Unite */
	protected $_unite; /* int(11) unsigned */
	/* liste des objets Unite */
	protected $_oUnite; /* unite Object*/


	/* identifiant composite Batiment */
	protected $_batiment; /* int(11) unsigned */
	/* liste des objets Batiment */
	protected $_oBatiment; /* batiment Object*/

	protected $_empty = true; // permet de savoir si l'objet est vide

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Fifo11]*/	/*[/TAG-Fifo11]*/


	public function __construct($id=0,$membre=0,$dateheure='',$nombre=0,$unite=0,$batiment=0) {
		//Generated by ObjectGenerator::generateConstruct()
		$this->_id = $id;
		$this->_membre = $membre;
		$this->_dateheure = $dateheure;
		$this->_nombre = $nombre;
		$this->_unite = $unite;
		$this->_batiment = $batiment;

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



	public function setMembre($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setMembre1]*/	/*[/TAG-setMembre1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_membre = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setMembre2]*/	/*[/TAG-setMembre2]*/

	}

	protected function setMembreObject() {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setMembreObject1]*/	/*[/TAG-setMembreObject1]*/

		if ($this->_membre > 0) {
			$this->_oMembre = FactoryMembre::getFromTableMembre($this->_membre);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setMembreObject2]*/	/*[/TAG-setMembreObject2]*/

	}



	public function setDateheure($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDateheure1]*/	/*[/TAG-setDateheure1]*/

		$this->_dateheure = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDateheure2]*/	/*[/TAG-setDateheure2]*/

	}



	public function setNombre($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setNombre1]*/	/*[/TAG-setNombre1]*/

		$this->_nombre = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setNombre2]*/	/*[/TAG-setNombre2]*/

	}



	public function setUnite($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setUnite1]*/	/*[/TAG-setUnite1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_unite = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setUnite2]*/	/*[/TAG-setUnite2]*/

	}

	protected function setUniteObject() {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setUniteObject1]*/	/*[/TAG-setUniteObject1]*/

		if ($this->_unite > 0) {
			$this->_oUnite = FactoryUnite::getFromTableUnite($this->_unite);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setUniteObject2]*/	/*[/TAG-setUniteObject2]*/

	}



	public function setBatiment($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatiment1]*/	/*[/TAG-setBatiment1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_batiment = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatiment2]*/	/*[/TAG-setBatiment2]*/

	}

	protected function setBatimentObject() {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentObject1]*/	/*[/TAG-setBatimentObject1]*/

		if ($this->_batiment > 0) {
			$this->_oBatiment = FactoryBatiment::getFromTableBatiment($this->_batiment);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentObject2]*/	/*[/TAG-setBatimentObject2]*/

	}




	public function getId() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_id;
	}



	public function getMembre() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_membre;
	}

	public function getMembreObject() {
		//Generated by ObjectGenerator::generateGet()
		if (empty($this->_oMembre)) {
			$this->setMembreObject();
		}
		if ((empty($this->_oMembre) || is_null($this->_oMembre))&& $this->_membre > 0) {
			$this->setMembreObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getMembreObject1]*/	/*[/TAG-getMembreObject1]*/

		return $this->_oMembre;
	}



	public function getDateheure() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_dateheure;
	}



	public function getNombre() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_nombre;
	}



	public function getUnite() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_unite;
	}

	public function getUniteObject() {
		//Generated by ObjectGenerator::generateGet()
		if (empty($this->_oUnite)) {
			$this->setUniteObject();
		}
		if ((empty($this->_oUnite) || is_null($this->_oUnite))&& $this->_unite > 0) {
			$this->setUniteObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getUniteObject1]*/	/*[/TAG-getUniteObject1]*/

		return $this->_oUnite;
	}



	public function getBatiment() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_batiment;
	}

	public function getBatimentObject() {
		//Generated by ObjectGenerator::generateGet()
		if (empty($this->_oBatiment)) {
			$this->setBatimentObject();
		}
		if ((empty($this->_oBatiment) || is_null($this->_oBatiment))&& $this->_batiment > 0) {
			$this->setBatimentObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getBatimentObject1]*/	/*[/TAG-getBatimentObject1]*/

		return $this->_oBatiment;
	}



	public function __toString() {
		//Generated by ObjectGenerator::generateToString()
		$chaine = 'Objet '.get_class($this).':<br/>';
		$chaine .= 'Le champ id vaut '.$this->getId().'<br/>';
		$chaine .= 'Le champ membre vaut '.$this->getMembre().'<br/>';
		$chaine .= 'Le champ dateheure vaut '.$this->getDateheure().'<br/>';
		$chaine .= 'Le champ nombre vaut '.$this->getNombre().'<br/>';
		$chaine .= 'Le champ unite vaut '.$this->getUnite().'<br/>';
		$chaine .= 'Le champ batiment vaut '.$this->getBatiment().'<br/>';

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
			$requete = 'INSERT INTO fifo (id,membre,dateheure,nombre,unite,batiment)';
			$requete .= ' VALUES ';
			$requete .= '(';
			$requete .= '\'\','; //valeur forcee pour l'insertion
			$requete .= $this->getMembre().',';
			$laDate = $this->getDateheure();
			if (strlen($laDate) > 0) {
				$requete .= '\''.$laDate.'\',';
			} else {
				$requete .= 'NOW(),';
			}
			$requete .= $this->getNombre().',';
			$requete .= $this->getUnite().',';
			$requete .= $this->getBatiment().',';
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
			$requete = 'UPDATE fifo SET ';
			$requete .= 'membre = '.$this->getMembre().',';
			$laDate = $this->getDateheure();
			if (strlen($laDate) > 0) {
				$requete .= 'dateheure = \''.$laDate.'\',';
			} else {
				$requete .= 'dateheure = NOW(),';
			}
			$requete .= 'nombre = '.$this->getNombre().',';
			$requete .= 'unite = '.$this->getUnite().',';
			$requete .= 'batiment = '.$this->getBatiment().',';
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
			return 'DELETE FROM fifo WHERE id = '.$this->getId();
		}
	}

	public function getParent() {
		//Generated by ObjectGenerator::generateGetParent()
		return ('parent::__construct($id,$membre,$dateheure,$nombre,$unite,$batiment);');
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
		if ($object instanceof Fifo) {
			if ($this->_id != $object->getId()) {
				$data['id'] = $object->getId();
			}
			if ($this->_membre != $object->getMembre()) {
				$data['membre'] = $object->getMembre();
			}
			if ($this->_dateheure != $object->getDateheure()) {
				$data['dateheure'] = $object->getDateheure();
			}
			if ($this->_nombre != $object->getNombre()) {
				$data['nombre'] = $object->getNombre();
			}
			if ($this->_unite != $object->getUnite()) {
				$data['unite'] = $object->getUnite();
			}
			if ($this->_batiment != $object->getBatiment()) {
				$data['batiment'] = $object->getBatiment();
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
		$smarty->assign('fifo',$this);
		$smarty->assign('aListeMethodes',get_class_methods($this));
		$smarty->assign('urlVersMiniature',_URL_MINIATURES_.$this->getNom().'.jpg');
		/* Appel de l'affichage pour la classe en cour d'utilisation */
		$smarty->display(_TEMPLATES_BASE_.'classes/Fifo.tpl');
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Fifo21]*/	/*[/TAG-Fifo21]*/

}
?>