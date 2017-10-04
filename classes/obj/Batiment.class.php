<?php
		//Generated by ObjectGenerator::generate()
class Batiment {

	/* identifiant composite BatimentId */
	protected $_batimentId; /* bigint(20) unsigned */
	/* liste des objets BatimentId */
	protected $_oBatimentId; /* batimentId Object*/


	/* identifiant composite BatimentNom */
	protected $_batimentNom; /* varchar(50) */
	/* liste des objets BatimentNom */
	protected $_oBatimentNom; /* batimentNom Object*/


	/* identifiant composite BatimentDesc */
	protected $_batimentDesc; /* text */
	/* liste des objets BatimentDesc */
	protected $_oBatimentDesc; /* batimentDesc Object*/


	/* identifiant composite BatimentVie */
	protected $_batimentVie; /* smallint(5) */
	/* liste des objets BatimentVie */
	protected $_oBatimentVie; /* batimentVie Object*/


	/* identifiant composite BatimentDefense */
	protected $_batimentDefense; /* smallint(5) */
	/* liste des objets BatimentDefense */
	protected $_oBatimentDefense; /* batimentDefense Object*/


	/* identifiant composite BatimentBouclier */
	protected $_batimentBouclier; /* smallint(6) */
	/* liste des objets BatimentBouclier */
	protected $_oBatimentBouclier; /* batimentBouclier Object*/

	protected $_production; /* int(3) unsigned */
	protected $_empty = true; // permet de savoir si l'objet est vide

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Batiment11]*/	/*[/TAG-Batiment11]*/


	public function __construct($batimentId=0,$batimentNom='',$batimentDesc='',$batimentVie=0,$batimentDefense=0,$batimentBouclier=0,$production=0) {
		//Generated by ObjectGenerator::generateConstruct()
		$this->_batimentId = $batimentId;
		$this->_batimentNom = $batimentNom;
		$this->_batimentDesc = $batimentDesc;
		$this->_batimentVie = $batimentVie;
		$this->_batimentDefense = $batimentDefense;
		$this->_batimentBouclier = $batimentBouclier;
		$this->_production = $production;

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


	public function setBatimentId($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentId1]*/	/*[/TAG-setBatimentId1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_batimentId = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentId2]*/	/*[/TAG-setBatimentId2]*/

	}

	protected function setBatimentIdObject() {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentIdObject1]*/	/*[/TAG-setBatimentIdObject1]*/

		if ($this->_batimentId > 0) {
			$this->_oBatimentId = FactoryBatiment::getFromTableBatiment($this->_batimentId);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentIdObject2]*/	/*[/TAG-setBatimentIdObject2]*/

	}



	public function setBatimentNom($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentNom1]*/	/*[/TAG-setBatimentNom1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_batimentNom = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentNom2]*/	/*[/TAG-setBatimentNom2]*/

	}

	protected function setBatimentNomObject() {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentNomObject1]*/	/*[/TAG-setBatimentNomObject1]*/

		if ($this->_batimentNom > 0) {
			$this->_oBatimentNom = FactoryBatiment::getFromTableBatiment($this->_batimentNom);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentNomObject2]*/	/*[/TAG-setBatimentNomObject2]*/

	}



	public function setBatimentDesc($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentDesc1]*/	/*[/TAG-setBatimentDesc1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_batimentDesc = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentDesc2]*/	/*[/TAG-setBatimentDesc2]*/

	}

	protected function setBatimentDescObject() {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentDescObject1]*/	/*[/TAG-setBatimentDescObject1]*/

		if ($this->_batimentDesc > 0) {
			$this->_oBatimentDesc = FactoryBatiment::getFromTableBatiment($this->_batimentDesc);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentDescObject2]*/	/*[/TAG-setBatimentDescObject2]*/

	}



	public function setBatimentVie($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentVie1]*/	/*[/TAG-setBatimentVie1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_batimentVie = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentVie2]*/	/*[/TAG-setBatimentVie2]*/

	}

	protected function setBatimentVieObject() {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentVieObject1]*/	/*[/TAG-setBatimentVieObject1]*/

		if ($this->_batimentVie > 0) {
			$this->_oBatimentVie = FactoryBatiment::getFromTableBatiment($this->_batimentVie);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentVieObject2]*/	/*[/TAG-setBatimentVieObject2]*/

	}



	public function setBatimentDefense($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentDefense1]*/	/*[/TAG-setBatimentDefense1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_batimentDefense = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentDefense2]*/	/*[/TAG-setBatimentDefense2]*/

	}

	protected function setBatimentDefenseObject() {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentDefenseObject1]*/	/*[/TAG-setBatimentDefenseObject1]*/

		if ($this->_batimentDefense > 0) {
			$this->_oBatimentDefense = FactoryBatiment::getFromTableBatiment($this->_batimentDefense);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentDefenseObject2]*/	/*[/TAG-setBatimentDefenseObject2]*/

	}



	public function setBatimentBouclier($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentBouclier1]*/	/*[/TAG-setBatimentBouclier1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_batimentBouclier = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentBouclier2]*/	/*[/TAG-setBatimentBouclier2]*/

	}

	protected function setBatimentBouclierObject() {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentBouclierObject1]*/	/*[/TAG-setBatimentBouclierObject1]*/

		if ($this->_batimentBouclier > 0) {
			$this->_oBatimentBouclier = FactoryBatiment::getFromTableBatiment($this->_batimentBouclier);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBatimentBouclierObject2]*/	/*[/TAG-setBatimentBouclierObject2]*/

	}



	public function setProduction($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setProduction1]*/	/*[/TAG-setProduction1]*/

		$this->_production = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setProduction2]*/	/*[/TAG-setProduction2]*/

	}




	public function getBatimentId() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_batimentId;
	}

	public function getBatimentIdObject() {
		//Generated by ObjectGenerator::generateGet()
		if (empty($this->_oBatimentId)) {
			$this->setBatimentIdObject();
		}
		if ((empty($this->_oBatimentId) || is_null($this->_oBatimentId))&& $this->_batimentId > 0) {
			$this->setBatimentIdObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getBatimentIdObject1]*/	/*[/TAG-getBatimentIdObject1]*/

		return $this->_oBatimentId;
	}



	public function getBatimentNom() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_batimentNom;
	}

	public function getBatimentNomObject() {
		//Generated by ObjectGenerator::generateGet()
		if (empty($this->_oBatimentNom)) {
			$this->setBatimentNomObject();
		}
		if ((empty($this->_oBatimentNom) || is_null($this->_oBatimentNom))&& $this->_batimentNom > 0) {
			$this->setBatimentNomObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getBatimentNomObject1]*/	/*[/TAG-getBatimentNomObject1]*/

		return $this->_oBatimentNom;
	}



	public function getBatimentDesc() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_batimentDesc;
	}

	public function getBatimentDescObject() {
		//Generated by ObjectGenerator::generateGet()
		if (empty($this->_oBatimentDesc)) {
			$this->setBatimentDescObject();
		}
		if ((empty($this->_oBatimentDesc) || is_null($this->_oBatimentDesc))&& $this->_batimentDesc > 0) {
			$this->setBatimentDescObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getBatimentDescObject1]*/	/*[/TAG-getBatimentDescObject1]*/

		return $this->_oBatimentDesc;
	}



	public function getBatimentVie() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_batimentVie;
	}

	public function getBatimentVieObject() {
		//Generated by ObjectGenerator::generateGet()
		if (empty($this->_oBatimentVie)) {
			$this->setBatimentVieObject();
		}
		if ((empty($this->_oBatimentVie) || is_null($this->_oBatimentVie))&& $this->_batimentVie > 0) {
			$this->setBatimentVieObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getBatimentVieObject1]*/	/*[/TAG-getBatimentVieObject1]*/

		return $this->_oBatimentVie;
	}



	public function getBatimentDefense() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_batimentDefense;
	}

	public function getBatimentDefenseObject() {
		//Generated by ObjectGenerator::generateGet()
		if (empty($this->_oBatimentDefense)) {
			$this->setBatimentDefenseObject();
		}
		if ((empty($this->_oBatimentDefense) || is_null($this->_oBatimentDefense))&& $this->_batimentDefense > 0) {
			$this->setBatimentDefenseObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getBatimentDefenseObject1]*/	/*[/TAG-getBatimentDefenseObject1]*/

		return $this->_oBatimentDefense;
	}



	public function getBatimentBouclier() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_batimentBouclier;
	}

	public function getBatimentBouclierObject() {
		//Generated by ObjectGenerator::generateGet()
		if (empty($this->_oBatimentBouclier)) {
			$this->setBatimentBouclierObject();
		}
		if ((empty($this->_oBatimentBouclier) || is_null($this->_oBatimentBouclier))&& $this->_batimentBouclier > 0) {
			$this->setBatimentBouclierObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getBatimentBouclierObject1]*/	/*[/TAG-getBatimentBouclierObject1]*/

		return $this->_oBatimentBouclier;
	}



	public function getProduction() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_production;
	}



	public function __toString() {
		//Generated by ObjectGenerator::generateToString()
		$chaine = 'Objet '.get_class($this).':<br/>';
		$chaine .= 'Le champ batimentId vaut '.$this->getBatimentId().'<br/>';
		$chaine .= 'Le champ batimentNom vaut '.$this->getBatimentNom().'<br/>';
		$chaine .= 'Le champ batimentDesc vaut '.$this->getBatimentDesc().'<br/>';
		$chaine .= 'Le champ batimentVie vaut '.$this->getBatimentVie().'<br/>';
		$chaine .= 'Le champ batimentDefense vaut '.$this->getBatimentDefense().'<br/>';
		$chaine .= 'Le champ batimentBouclier vaut '.$this->getBatimentBouclier().'<br/>';
		$chaine .= 'Le champ production vaut '.$this->getProduction().'<br/>';

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
			$requete = 'INSERT INTO batiment (batimentId,batimentNom,batimentDesc,batimentVie,batimentDefense,batimentBouclier,production)';
			$requete .= ' VALUES ';
			$requete .= '(';
			$requete .= $this->getBatimentId().',';
			$requete .= '\''.$this->getBatimentNom().'\',';
			$requete .= '\''.$this->getBatimentDesc().'\',';
			$requete .= $this->getBatimentVie().',';
			$requete .= $this->getBatimentDefense().',';
			$requete .= $this->getBatimentBouclier().',';
			$requete .= $this->getProduction().',';
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
			$requete = 'UPDATE batiment SET ';
			$requete .= 'batimentId = '.$this->getBatimentId().',';
			$requete .= 'batimentNom = \''.$this->getBatimentNom().'\',';
			$requete .= 'batimentDesc = \''.$this->getBatimentDesc().'\',';
			$requete .= 'batimentVie = '.$this->getBatimentVie().',';
			$requete .= 'batimentDefense = '.$this->getBatimentDefense().',';
			$requete .= 'batimentBouclier = '.$this->getBatimentBouclier().',';
			$requete .= 'production = '.$this->getProduction().',';
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
			return 'DELETE FROM batiment WHERE id = '.$this->getId();
		}
	}

	public function getParent() {
		//Generated by ObjectGenerator::generateGetParent()
		return ('parent::__construct($batimentId,$batimentNom,$batimentDesc,$batimentVie,$batimentDefense,$batimentBouclier,$production);');
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
		if ($object instanceof Batiment) {
			if ($this->_batimentId != $object->getBatimentId()) {
				$data['batimentId'] = $object->getBatimentId();
			}
			if ($this->_batimentNom != $object->getBatimentNom()) {
				$data['batimentNom'] = $object->getBatimentNom();
			}
			if ($this->_batimentDesc != $object->getBatimentDesc()) {
				$data['batimentDesc'] = $object->getBatimentDesc();
			}
			if ($this->_batimentVie != $object->getBatimentVie()) {
				$data['batimentVie'] = $object->getBatimentVie();
			}
			if ($this->_batimentDefense != $object->getBatimentDefense()) {
				$data['batimentDefense'] = $object->getBatimentDefense();
			}
			if ($this->_batimentBouclier != $object->getBatimentBouclier()) {
				$data['batimentBouclier'] = $object->getBatimentBouclier();
			}
			if ($this->_production != $object->getProduction()) {
				$data['production'] = $object->getProduction();
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
		$smarty->assign('batiment',$this);
		$smarty->assign('aListeMethodes',get_class_methods($this));
		$smarty->assign('urlVersMiniature',_URL_MINIATURES_.$this->getNom().'.jpg');
		/* Appel de l'affichage pour la classe en cour d'utilisation */
		$smarty->display(_TEMPLATES_BASE_.'classes/Batiment.tpl');
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Batiment21]*/	/*[/TAG-Batiment21]*/

}
?>