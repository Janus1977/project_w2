<?php
		//Generated by ObjectGenerator::generate()
class Solscarteedit {
	protected $_id; /* bigint(11) unsigned */

	/* identifiant composite Carte */
	protected $_carte; /* bigint(11) unsigned */
	/* liste des objets Carte */
	protected $_oCarte; /* carte Object*/


	/* identifiant composite Sol */
	protected $_sol; /* bigint(11) unsigned */
	/* liste des objets Sol */
	protected $_oSol; /* sol Object*/

	protected $_x; /* bigint(11) unsigned */
	protected $_y; /* bigint(11) unsigned */
	protected $_empty = true; // permet de savoir si l'objet est vide

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Solscarteedit11]*/	/*[/TAG-Solscarteedit11]*/


	public function __construct($id=0,$carte=0,$sol=0,$x=0,$y=0) {
		//Generated by ObjectGenerator::generateConstruct()
		$this->_id = $id;
		$this->_carte = $carte;
		$this->_sol = $sol;
		$this->_x = $x;
		$this->_y = $y;

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



	public function setCarte($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

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
		//Generated by ObjectGenerator::generateSet()

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



	public function setSol($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setSol1]*/	/*[/TAG-setSol1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_sol = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setSol2]*/	/*[/TAG-setSol2]*/

	}

	protected function setSolObject() {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setSolObject1]*/	/*[/TAG-setSolObject1]*/

		if ($this->_sol > 0) {
			$this->_oSol = FactorySol::getFromTableSol($this->_sol);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setSolObject2]*/	/*[/TAG-setSolObject2]*/

	}



	public function setX($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setX1]*/	/*[/TAG-setX1]*/

		$this->_x = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setX2]*/	/*[/TAG-setX2]*/

	}



	public function setY($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setY1]*/	/*[/TAG-setY1]*/

		$this->_y = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setY2]*/	/*[/TAG-setY2]*/

	}




	public function getId() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_id;
	}



	public function getCarte() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_carte;
	}

	public function getCarteObject() {
		//Generated by ObjectGenerator::generateGet()
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



	public function getSol() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_sol;
	}

	public function getSolObject() {
		//Generated by ObjectGenerator::generateGet()
		if (empty($this->_oSol)) {
			$this->setSolObject();
		}
		if ((empty($this->_oSol) || is_null($this->_oSol))&& $this->_sol > 0) {
			$this->setSolObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getSolObject1]*/	/*[/TAG-getSolObject1]*/

		return $this->_oSol;
	}



	public function getX() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_x;
	}



	public function getY() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_y;
	}



	public function __toString() {
		//Generated by ObjectGenerator::generateToString()
		$chaine = 'Objet '.get_class($this).':<br/>';
		$chaine .= 'Le champ id vaut '.$this->getId().'<br/>';
		$chaine .= 'Le champ carte vaut '.$this->getCarte().'<br/>';
		$chaine .= 'Le champ sol vaut '.$this->getSol().'<br/>';
		$chaine .= 'Le champ x vaut '.$this->getX().'<br/>';
		$chaine .= 'Le champ y vaut '.$this->getY().'<br/>';

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
			$requete = 'INSERT INTO solscarteedit (id,carte,sol,x,y)';
			$requete .= ' VALUES ';
			$requete .= '(';
			$requete .= '\'\','; //valeur forcee pour l'insertion
			$requete .= $this->getCarte().',';
			$requete .= $this->getSol().',';
			$requete .= $this->getX().',';
			$requete .= $this->getY().',';
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
			$requete = 'UPDATE solscarteedit SET ';
			$requete .= 'carte = '.$this->getCarte().',';
			$requete .= 'sol = '.$this->getSol().',';
			$requete .= 'x = '.$this->getX().',';
			$requete .= 'y = '.$this->getY().',';
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
			return 'DELETE FROM solscarteedit WHERE id = '.$this->getId();
		}
	}

	public function getParent() {
		//Generated by ObjectGenerator::generateGetParent()
		return ('parent::__construct($id,$carte,$sol,$x,$y);');
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
		if ($object instanceof Solscarteedit) {
			if ($this->_id != $object->getId()) {
				$data['id'] = $object->getId();
			}
			if ($this->_carte != $object->getCarte()) {
				$data['carte'] = $object->getCarte();
			}
			if ($this->_sol != $object->getSol()) {
				$data['sol'] = $object->getSol();
			}
			if ($this->_x != $object->getX()) {
				$data['x'] = $object->getX();
			}
			if ($this->_y != $object->getY()) {
				$data['y'] = $object->getY();
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
		$smarty->assign('solscarteedit',$this);
		$smarty->assign('aListeMethodes',get_class_methods($this));
		$smarty->assign('urlVersMiniature',_URL_MINIATURES_.$this->getNom().'.jpg');
		/* Appel de l'affichage pour la classe en cour d'utilisation */
		$smarty->display(_TEMPLATES_BASE_.'classes/Solscarteedit.tpl');
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Solscarteedit21]*/	/*[/TAG-Solscarteedit21]*/

}
?>