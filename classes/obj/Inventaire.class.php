<?php
		//Generated by ObjectGenerator::generate()
class Inventaire {
	protected $_id; /* bigint(20) unsigned */

	/* identifiant composite Membre */
	protected $_membre; /* bigint(20) unsigned */
	/* liste des objets Membre */
	protected $_oMembre; /* membre Object*/


	/* identifiant composite Unite */
	protected $_unite; /* bigint(20) unsigned */
	/* liste des objets Unite */
	protected $_oUnite; /* unite Object*/


	/* identifiant composite Equipement */
	protected $_equipement; /* bigint(20) unsigned */
	/* liste des objets Equipement */
	protected $_oEquipement; /* equipement Object*/


	/* identifiant composite Unite_joueur */
	protected $_unite_joueur; /* bigint(20) unsigned */
	/* liste des objets Unite_joueur */
	protected $_oUnite_joueur; /* unite_joueur Object*/


	/* identifiant composite Equipement_joueur */
	protected $_equipement_joueur; /* bigint(20) */
	/* liste des objets Equipement_joueur */
	protected $_oEquipement_joueur; /* equipement_joueur Object*/

	protected $_empty = true; // permet de savoir si l'objet est vide

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Inventaire11]*/	/*[/TAG-Inventaire11]*/


	public function __construct($id=0,$membre=0,$unite=0,$equipement=0,$unite_joueur=0,$equipement_joueur=0) {
		//Generated by ObjectGenerator::generateConstruct()
		$this->_id = $id;
		$this->_membre = $membre;
		$this->_unite = $unite;
		$this->_equipement = $equipement;
		$this->_unite_joueur = $unite_joueur;
		$this->_equipement_joueur = $equipement_joueur;

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



	public function setEquipement($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setEquipement1]*/	/*[/TAG-setEquipement1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_equipement = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setEquipement2]*/	/*[/TAG-setEquipement2]*/

	}

	protected function setEquipementObject() {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setEquipementObject1]*/	/*[/TAG-setEquipementObject1]*/

		if ($this->_equipement > 0) {
			$this->_oEquipement = FactoryEquipement::getFromTableEquipement($this->_equipement);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setEquipementObject2]*/	/*[/TAG-setEquipementObject2]*/

	}



	public function setUnite_joueur($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setUnite_joueur1]*/	/*[/TAG-setUnite_joueur1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_unite_joueur = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setUnite_joueur2]*/	/*[/TAG-setUnite_joueur2]*/

	}

	protected function setUnite_joueurObject() {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setUnite_joueurObject1]*/	/*[/TAG-setUnite_joueurObject1]*/

		if ($this->_unite_joueur > 0) {
			$this->_oUnite_joueur = FactoryUnite_joueur::getFromTableUnite_joueur($this->_unite_joueur);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setUnite_joueurObject2]*/	/*[/TAG-setUnite_joueurObject2]*/

	}



	public function setEquipement_joueur($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setEquipement_joueur1]*/	/*[/TAG-setEquipement_joueur1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_equipement_joueur = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setEquipement_joueur2]*/	/*[/TAG-setEquipement_joueur2]*/

	}

	protected function setEquipement_joueurObject() {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setEquipement_joueurObject1]*/	/*[/TAG-setEquipement_joueurObject1]*/

		if ($this->_equipement_joueur > 0) {
			$this->_oEquipement_joueur = FactoryEquipement_joueur::getFromTableEquipement_joueur($this->_equipement_joueur);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setEquipement_joueurObject2]*/	/*[/TAG-setEquipement_joueurObject2]*/

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



	public function getEquipement() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_equipement;
	}

	public function getEquipementObject() {
		//Generated by ObjectGenerator::generateGet()
		if (empty($this->_oEquipement)) {
			$this->setEquipementObject();
		}
		if ((empty($this->_oEquipement) || is_null($this->_oEquipement))&& $this->_equipement > 0) {
			$this->setEquipementObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getEquipementObject1]*/	/*[/TAG-getEquipementObject1]*/

		return $this->_oEquipement;
	}



	public function getUnite_joueur() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_unite_joueur;
	}

	public function getUnite_joueurObject() {
		//Generated by ObjectGenerator::generateGet()
		if (empty($this->_oUnite_joueur)) {
			$this->setUnite_joueurObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getUnite_joueurObject1]*/	/*[/TAG-getUnite_joueurObject1]*/

			return $this->_oUnite_joueur;
	}



	public function getEquipement_joueur() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_equipement_joueur;
	}

	public function getEquipement_joueurObject() {
		//Generated by ObjectGenerator::generateGet()
		if (empty($this->_oEquipement_joueur)) {
			$this->setEquipement_joueurObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getEquipement_joueurObject1]*/	/*[/TAG-getEquipement_joueurObject1]*/

			return $this->_oEquipement_joueur;
	}



	public function __toString() {
		//Generated by ObjectGenerator::generateToString()
		$chaine = 'Objet '.get_class($this).':<br/>';
		$chaine .= 'Le champ id vaut '.$this->getId().'<br/>';
		$chaine .= 'Le champ membre vaut '.$this->getMembre().'<br/>';
		$chaine .= 'Le champ unite vaut '.$this->getUnite().'<br/>';
		$chaine .= 'Le champ equipement vaut '.$this->getEquipement().'<br/>';
		$chaine .= 'Le champ unite_joueur vaut '.$this->getUnite_joueur().'<br/>';
		$chaine .= 'Le champ equipement_joueur vaut '.$this->getEquipement_joueur().'<br/>';

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
			$requete = 'INSERT INTO inventaire (id,membre,unite,equipement,unite_joueur,equipement_joueur)';
			$requete .= ' VALUES ';
			$requete .= '(';
			$requete .= '\'\','; //valeur forcee pour l'insertion
			$requete .= $this->getMembre().',';
			$requete .= $this->getUnite().',';
			$requete .= $this->getEquipement().',';
			$requete .= $this->getUnite_joueur().',';
			$requete .= $this->getEquipement_joueur().',';
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
			$requete = 'UPDATE inventaire SET ';
			$requete .= 'membre = '.$this->getMembre().',';
			$requete .= 'unite = '.$this->getUnite().',';
			$requete .= 'equipement = '.$this->getEquipement().',';
			$requete .= 'unite_joueur = '.$this->getUnite_joueur().',';
			$requete .= 'equipement_joueur = '.$this->getEquipement_joueur().',';
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
			return 'DELETE FROM inventaire WHERE id = '.$this->getId();
		}
	}

	public function getParent() {
		//Generated by ObjectGenerator::generateGetParent()
		return ('parent::__construct($id,$membre,$unite,$equipement,$unite_joueur,$equipement_joueur);');
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
		if ($object instanceof Inventaire) {
			if ($this->_id != $object->getId()) {
				$data['id'] = $object->getId();
			}
			if ($this->_membre != $object->getMembre()) {
				$data['membre'] = $object->getMembre();
			}
			if ($this->_unite != $object->getUnite()) {
				$data['unite'] = $object->getUnite();
			}
			if ($this->_equipement != $object->getEquipement()) {
				$data['equipement'] = $object->getEquipement();
			}
			if ($this->_unite_joueur != $object->getUnite_joueur()) {
				$data['unite_joueur'] = $object->getUnite_joueur();
			}
			if ($this->_equipement_joueur != $object->getEquipement_joueur()) {
				$data['equipement_joueur'] = $object->getEquipement_joueur();
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
		$smarty->assign('inventaire',$this);
		$smarty->assign('aListeMethodes',get_class_methods($this));
		$smarty->assign('urlVersMiniature',_URL_MINIATURES_.$this->getNom().'.jpg');
		/* Appel de l'affichage pour la classe en cour d'utilisation */
		$smarty->display(_TEMPLATES_BASE_.'classes/Inventaire.tpl');
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Inventaire21]*/	/*[/TAG-Inventaire21]*/

}
?>