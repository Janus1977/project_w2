<?php
		//Generated by ObjectGenerator::generate()
class Armeecomposition {
	protected $_id; /* bigint(20) unsigned */

	/* identifiant composite Armee */
	protected $_armee; /* bigint(20) unsigned */
	/* liste des objets Armee */
	protected $_oArmee; /* armee Object*/


	/* identifiant composite Troupe */
	protected $_troupe; /* bigint(20) unsigned */
	/* liste des objets Troupe */
	protected $_oTroupe; /* troupe Object*/

	protected $_empty = true; // permet de savoir si l'objet est vide

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Armeecomposition11]*/	/*[/TAG-Armeecomposition11]*/


	public function __construct($id=0,$armee=0,$troupe=0) {
		//Generated by ObjectGenerator::generateConstruct()
		$this->_id = $id;
		$this->_armee = $armee;
		$this->_troupe = $troupe;

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



	public function setArmee($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setArmee1]*/	/*[/TAG-setArmee1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_armee = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setArmee2]*/	/*[/TAG-setArmee2]*/

	}

	protected function setArmeeObject() {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setArmeeObject1]*/	/*[/TAG-setArmeeObject1]*/

		if ($this->_armee > 0) {
			$this->_oArmee = FactoryArmee::getFromTableArmee($this->_armee);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setArmeeObject2]*/	/*[/TAG-setArmeeObject2]*/

	}



	public function setTroupe($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTroupe1]*/	/*[/TAG-setTroupe1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_troupe = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTroupe2]*/	/*[/TAG-setTroupe2]*/

	}

	protected function setTroupeObject() {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTroupeObject1]*/	/*[/TAG-setTroupeObject1]*/

		if ($this->_troupe > 0) {
			$this->_oTroupe = FactoryTroupe::getFromTableTroupe($this->_troupe);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTroupeObject2]*/	/*[/TAG-setTroupeObject2]*/

	}




	public function getId() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_id;
	}



	public function getArmee() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_armee;
	}

	public function getArmeeObject() {
		//Generated by ObjectGenerator::generateGet()
		if (empty($this->_oArmee)) {
			$this->setArmeeObject();
		}
		if ((empty($this->_oArmee) || is_null($this->_oArmee))&& $this->_armee > 0) {
			$this->setArmeeObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getArmeeObject1]*/	/*[/TAG-getArmeeObject1]*/

		return $this->_oArmee;
	}



	public function getTroupe() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_troupe;
	}

	public function getTroupeObject() {
		//Generated by ObjectGenerator::generateGet()
		if (empty($this->_oTroupe)) {
			$this->setTroupeObject();
		}
		if ((empty($this->_oTroupe) || is_null($this->_oTroupe))&& $this->_troupe > 0) {
			$this->setTroupeObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getTroupeObject1]*/	/*[/TAG-getTroupeObject1]*/

		return $this->_oTroupe;
	}



	public function __toString() {
		//Generated by ObjectGenerator::generateToString()
		$chaine = 'Objet '.get_class($this).':<br/>';
		$chaine .= 'Le champ id vaut '.$this->getId().'<br/>';
		$chaine .= 'Le champ armee vaut '.$this->getArmee().'<br/>';
		$chaine .= 'Le champ troupe vaut '.$this->getTroupe().'<br/>';

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
			$requete = 'INSERT INTO armeecomposition (id,armee,troupe)';
			$requete .= ' VALUES ';
			$requete .= '(';
			$requete .= '\'\','; //valeur forcee pour l'insertion
			$requete .= $this->getArmee().',';
			$requete .= $this->getTroupe().',';
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
			$requete = 'UPDATE armeecomposition SET ';
			$requete .= 'armee = '.$this->getArmee().',';
			$requete .= 'troupe = '.$this->getTroupe().',';
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
			return 'DELETE FROM armeecomposition WHERE id = '.$this->getId();
		}
	}

	public function getParent() {
		//Generated by ObjectGenerator::generateGetParent()
		return ('parent::__construct($id,$armee,$troupe);');
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
		if ($object instanceof Armeecomposition) {
			if ($this->_id != $object->getId()) {
				$data['id'] = $object->getId();
			}
			if ($this->_armee != $object->getArmee()) {
				$data['armee'] = $object->getArmee();
			}
			if ($this->_troupe != $object->getTroupe()) {
				$data['troupe'] = $object->getTroupe();
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
		$smarty->assign('armeecomposition',$this);
		$smarty->assign('aListeMethodes',get_class_methods($this));
		$smarty->assign('urlVersMiniature',_URL_MINIATURES_.$this->getNom().'.jpg');
		/* Appel de l'affichage pour la classe en cour d'utilisation */
		$smarty->display(_TEMPLATES_BASE_.'classes/Armeecomposition.tpl');
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Armeecomposition21]*/	/*[/TAG-Armeecomposition21]*/

}
?>