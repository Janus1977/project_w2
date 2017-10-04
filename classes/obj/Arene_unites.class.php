<?php
		//Generated by ObjectGenerator::generate()
class Arene_unites extends Arene {

	/* identifiant composite Membre */
	protected $_membre; /* bigint(20) unsigned */
	/* liste des objets Membre */
	protected $_oMembre; /* membre Object*/


	/* identifiant composite Type */
	protected $_type; /* bigint(20) unsigned */
	/* liste des objets Type */
	protected $_oType; /* type Object*/

	protected $_empty = true; // permet de savoir si l'objet est vide

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Arene_unites11]*/	/*[/TAG-Arene_unites11]*/


	public function __construct($id=0,$membre=0,$type=0,$nombre=0,$pos_x=0,$pos_y=0,$image='',$dir_vision='') {
		//Generated by ObjectGenerator::generateConstruct()
		parent::__construct($titre,$nb_joueur_min,$nb_joueur_max,$fantassins_min,$fantassins_max,$motorise_min,$motorise_max,$aerien_min,$aerien_max);
		$this->_id = $id;
		$this->_membre = $membre;
		$this->_type = $type;
		$this->_nombre = $nombre;
		$this->_pos_x = $pos_x;
		$this->_pos_y = $pos_y;
		$this->_image = $image;
		$this->_dir_vision = $dir_vision;

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



	public function setType($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setType1]*/	/*[/TAG-setType1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_type = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setType2]*/	/*[/TAG-setType2]*/

	}

	protected function setTypeObject() {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTypeObject1]*/	/*[/TAG-setTypeObject1]*/

		if ($this->_type > 0) {
			$this->_oType = FactoryType::getFromTableType($this->_type);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTypeObject2]*/	/*[/TAG-setTypeObject2]*/

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



	public function setPos_x($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setPos_x1]*/	/*[/TAG-setPos_x1]*/

		$this->_pos_x = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setPos_x2]*/	/*[/TAG-setPos_x2]*/

	}



	public function setPos_y($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setPos_y1]*/	/*[/TAG-setPos_y1]*/

		$this->_pos_y = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setPos_y2]*/	/*[/TAG-setPos_y2]*/

	}



	public function setImage($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setImage1]*/	/*[/TAG-setImage1]*/

		$this->_image = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setImage2]*/	/*[/TAG-setImage2]*/

	}



	public function setDir_vision($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDir_vision1]*/	/*[/TAG-setDir_vision1]*/

		$this->_dir_vision = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDir_vision2]*/	/*[/TAG-setDir_vision2]*/

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



	public function getType() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_type;
	}

	public function getTypeObject() {
		//Generated by ObjectGenerator::generateGet()
		if (empty($this->_oType)) {
			$this->setTypeObject();
		}
		if ((empty($this->_oType) || is_null($this->_oType))&& $this->_type > 0) {
			$this->setTypeObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getTypeObject1]*/	/*[/TAG-getTypeObject1]*/

		return $this->_oType;
	}



	public function getNombre() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_nombre;
	}



	public function getPos_x() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_pos_x;
	}



	public function getPos_y() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_pos_y;
	}



	public function getImage() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_image;
	}



	public function getDir_vision() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_dir_vision;
	}



	public function __toString() {
		//Generated by ObjectGenerator::generateToString()
		$chaine = 'Objet '.get_class($this).':<br/>';
		$chaine .= 'Le champ id vaut '.$this->getId().'<br/>';
		$chaine .= 'Le champ membre vaut '.$this->getMembre().'<br/>';
		$chaine .= 'Le champ type vaut '.$this->getType().'<br/>';
		$chaine .= 'Le champ nombre vaut '.$this->getNombre().'<br/>';
		$chaine .= 'Le champ pos_x vaut '.$this->getPos_x().'<br/>';
		$chaine .= 'Le champ pos_y vaut '.$this->getPos_y().'<br/>';
		$chaine .= 'Le champ image vaut '.$this->getImage().'<br/>';
		$chaine .= 'Le champ dir_vision vaut '.$this->getDir_vision().'<br/>';

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
			$requete = 'INSERT INTO arene_unites (id,membre,type,nombre,pos_x,pos_y,image,dir_vision)';
			$requete .= ' VALUES ';
			$requete .= '(';
			$requete .= '\'\','; //valeur forcee pour l'insertion
			$requete .= $this->getMembre().',';
			$requete .= $this->getType().',';
			$requete .= $this->getNombre().',';
			$requete .= $this->getPos_x().',';
			$requete .= $this->getPos_y().',';
			$requete .= '\''.$this->getImage().'\',';
			$requete .= '\''.$this->getDir_vision().'\',';
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
			$requete = 'UPDATE arene_unites SET ';
			$requete .= 'membre = '.$this->getMembre().',';
			$requete .= 'type = '.$this->getType().',';
			$requete .= 'nombre = '.$this->getNombre().',';
			$requete .= 'pos_x = '.$this->getPos_x().',';
			$requete .= 'pos_y = '.$this->getPos_y().',';
			$requete .= 'image = \''.$this->getImage().'\',';
			$requete .= 'dir_vision = \''.$this->getDir_vision().'\',';
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
			return 'DELETE FROM arene_unites WHERE id = '.$this->getId();
		}
	}

	public function getParent() {
		//Generated by ObjectGenerator::generateGetParent()
		return ('parent::__construct($id,$membre,$type,$nombre,$pos_x,$pos_y,$image,$dir_vision);');
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
		if ($object instanceof Arene_unites) {
			if ($this->_id != $object->getId()) {
				$data['id'] = $object->getId();
			}
			if ($this->_membre != $object->getMembre()) {
				$data['membre'] = $object->getMembre();
			}
			if ($this->_type != $object->getType()) {
				$data['type'] = $object->getType();
			}
			if ($this->_nombre != $object->getNombre()) {
				$data['nombre'] = $object->getNombre();
			}
			if ($this->_pos_x != $object->getPos_x()) {
				$data['pos_x'] = $object->getPos_x();
			}
			if ($this->_pos_y != $object->getPos_y()) {
				$data['pos_y'] = $object->getPos_y();
			}
			if ($this->_image != $object->getImage()) {
				$data['image'] = $object->getImage();
			}
			if ($this->_dir_vision != $object->getDir_vision()) {
				$data['dir_vision'] = $object->getDir_vision();
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
		$smarty->assign('arene_unites',$this);
		$smarty->assign('aListeMethodes',get_class_methods($this));
		$smarty->assign('urlVersMiniature',_URL_MINIATURES_.$this->getNom().'.jpg');
		/* Appel de l'affichage pour la classe en cour d'utilisation */
		$smarty->display(_TEMPLATES_BASE_.'classes/Arene_unites.tpl');
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Arene_unites21]*/	/*[/TAG-Arene_unites21]*/

}
?>