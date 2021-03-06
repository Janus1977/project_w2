<?php
		//Generated by ObjectGenerator::generate()
class Technologie {

	/* identifiant composite TechnologieId */
	protected $_technologieId; /* bigint(20) unsigned */
	/* liste des objets TechnologieId */
	protected $_oTechnologieId; /* technologieId Object*/


	/* identifiant composite TechnologieNom */
	protected $_technologieNom; /* varchar(50) */
	/* liste des objets TechnologieNom */
	protected $_oTechnologieNom; /* technologieNom Object*/


	/* identifiant composite TechnologieDesc */
	protected $_technologieDesc; /* text */
	/* liste des objets TechnologieDesc */
	protected $_oTechnologieDesc; /* technologieDesc Object*/

	protected $_empty = true; // permet de savoir si l'objet est vide

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Technologie11]*/	/*[/TAG-Technologie11]*/


	public function __construct($technologieId=0,$technologieNom='',$technologieDesc='') {
		//Generated by ObjectGenerator::generateConstruct()
		$this->_technologieId = $technologieId;
		$this->_technologieNom = $technologieNom;
		$this->_technologieDesc = $technologieDesc;

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


	public function setTechnologieId($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTechnologieId1]*/	/*[/TAG-setTechnologieId1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_technologieId = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTechnologieId2]*/	/*[/TAG-setTechnologieId2]*/

	}

	protected function setTechnologieIdObject() {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTechnologieIdObject1]*/	/*[/TAG-setTechnologieIdObject1]*/

		if ($this->_technologieId > 0) {
			$this->_oTechnologieId = FactoryTechnologie::getFromTableTechnologie($this->_technologieId);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTechnologieIdObject2]*/	/*[/TAG-setTechnologieIdObject2]*/

	}



	public function setTechnologieNom($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTechnologieNom1]*/	/*[/TAG-setTechnologieNom1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_technologieNom = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTechnologieNom2]*/	/*[/TAG-setTechnologieNom2]*/

	}

	protected function setTechnologieNomObject() {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTechnologieNomObject1]*/	/*[/TAG-setTechnologieNomObject1]*/

		if ($this->_technologieNom > 0) {
			$this->_oTechnologieNom = FactoryTechnologie::getFromTableTechnologie($this->_technologieNom);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTechnologieNomObject2]*/	/*[/TAG-setTechnologieNomObject2]*/

	}



	public function setTechnologieDesc($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTechnologieDesc1]*/	/*[/TAG-setTechnologieDesc1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_technologieDesc = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTechnologieDesc2]*/	/*[/TAG-setTechnologieDesc2]*/

	}

	protected function setTechnologieDescObject() {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTechnologieDescObject1]*/	/*[/TAG-setTechnologieDescObject1]*/

		if ($this->_technologieDesc > 0) {
			$this->_oTechnologieDesc = FactoryTechnologie::getFromTableTechnologie($this->_technologieDesc);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTechnologieDescObject2]*/	/*[/TAG-setTechnologieDescObject2]*/

	}




	public function getTechnologieId() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_technologieId;
	}

	public function getTechnologieIdObject() {
		//Generated by ObjectGenerator::generateGet()
		if (empty($this->_oTechnologieId)) {
			$this->setTechnologieIdObject();
		}
		if ((empty($this->_oTechnologieId) || is_null($this->_oTechnologieId))&& $this->_technologieId > 0) {
			$this->setTechnologieIdObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getTechnologieIdObject1]*/	/*[/TAG-getTechnologieIdObject1]*/

		return $this->_oTechnologieId;
	}



	public function getTechnologieNom() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_technologieNom;
	}

	public function getTechnologieNomObject() {
		//Generated by ObjectGenerator::generateGet()
		if (empty($this->_oTechnologieNom)) {
			$this->setTechnologieNomObject();
		}
		if ((empty($this->_oTechnologieNom) || is_null($this->_oTechnologieNom))&& $this->_technologieNom > 0) {
			$this->setTechnologieNomObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getTechnologieNomObject1]*/	/*[/TAG-getTechnologieNomObject1]*/

		return $this->_oTechnologieNom;
	}



	public function getTechnologieDesc() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_technologieDesc;
	}

	public function getTechnologieDescObject() {
		//Generated by ObjectGenerator::generateGet()
		if (empty($this->_oTechnologieDesc)) {
			$this->setTechnologieDescObject();
		}
		if ((empty($this->_oTechnologieDesc) || is_null($this->_oTechnologieDesc))&& $this->_technologieDesc > 0) {
			$this->setTechnologieDescObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getTechnologieDescObject1]*/	/*[/TAG-getTechnologieDescObject1]*/

		return $this->_oTechnologieDesc;
	}



	public function __toString() {
		//Generated by ObjectGenerator::generateToString()
		$chaine = 'Objet '.get_class($this).':<br/>';
		$chaine .= 'Le champ technologieId vaut '.$this->getTechnologieId().'<br/>';
		$chaine .= 'Le champ technologieNom vaut '.$this->getTechnologieNom().'<br/>';
		$chaine .= 'Le champ technologieDesc vaut '.$this->getTechnologieDesc().'<br/>';

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
			$requete = 'INSERT INTO technologie (technologieId,technologieNom,technologieDesc)';
			$requete .= ' VALUES ';
			$requete .= '(';
			$requete .= $this->getTechnologieId().',';
			$requete .= '\''.$this->getTechnologieNom().'\',';
			$requete .= '\''.$this->getTechnologieDesc().'\',';
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
			$requete = 'UPDATE technologie SET ';
			$requete .= 'technologieId = '.$this->getTechnologieId().',';
			$requete .= 'technologieNom = \''.$this->getTechnologieNom().'\',';
			$requete .= 'technologieDesc = \''.$this->getTechnologieDesc().'\',';
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
			return 'DELETE FROM technologie WHERE id = '.$this->getId();
		}
	}

	public function getParent() {
		//Generated by ObjectGenerator::generateGetParent()
		return ('parent::__construct($technologieId,$technologieNom,$technologieDesc);');
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
		if ($object instanceof Technologie) {
			if ($this->_technologieId != $object->getTechnologieId()) {
				$data['technologieId'] = $object->getTechnologieId();
			}
			if ($this->_technologieNom != $object->getTechnologieNom()) {
				$data['technologieNom'] = $object->getTechnologieNom();
			}
			if ($this->_technologieDesc != $object->getTechnologieDesc()) {
				$data['technologieDesc'] = $object->getTechnologieDesc();
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
		$smarty->assign('technologie',$this);
		$smarty->assign('aListeMethodes',get_class_methods($this));
		$smarty->assign('urlVersMiniature',_URL_MINIATURES_.$this->getNom().'.jpg');
		/* Appel de l'affichage pour la classe en cour d'utilisation */
		$smarty->display(_TEMPLATES_BASE_.'classes/Technologie.tpl');
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Technologie21]*/	/*[/TAG-Technologie21]*/

}
?>