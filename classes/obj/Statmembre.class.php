<?php
		//Generated by ObjectGenerator::generate()
class Statmembre {
	protected $_id; /* int(11) unsigned */

	/* identifiant composite Membre */
	protected $_membre; /* int(11) unsigned */
	/* liste des objets Membre */
	protected $_oMembre; /* membre Object*/


	/* identifiant composite Hero */
	protected $_hero; /* int(11) */
	/* liste des objets Hero */
	protected $_oHero; /* hero Object*/

	protected $_tues; /* smallint(5) unsigned */
	protected $_morts; /* smallint(5) unsigned */
	protected $_victoires; /* smallint(5) unsigned */
	protected $_defaites; /* smallint(5) unsigned */
	protected $_empty = true; // permet de savoir si l'objet est vide

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Statmembre11]*/	/*[/TAG-Statmembre11]*/


	public function __construct($id=0,$membre=0,$hero=0,$tues=0,$morts=0,$victoires=0,$defaites=0) {
		//Generated by ObjectGenerator::generateConstruct()
		$this->_id = $id;
		$this->_membre = $membre;
		$this->_hero = $hero;
		$this->_tues = $tues;
		$this->_morts = $morts;
		$this->_victoires = $victoires;
		$this->_defaites = $defaites;

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



	public function setHero($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setHero1]*/	/*[/TAG-setHero1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_hero = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setHero2]*/	/*[/TAG-setHero2]*/

	}

	protected function setHeroObject() {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setHeroObject1]*/	/*[/TAG-setHeroObject1]*/

		if ($this->_hero > 0) {
			$this->_oHero = FactoryHero::getFromTableHero($this->_hero);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setHeroObject2]*/	/*[/TAG-setHeroObject2]*/

	}



	public function setTues($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTues1]*/	/*[/TAG-setTues1]*/

		$this->_tues = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTues2]*/	/*[/TAG-setTues2]*/

	}



	public function setMorts($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setMorts1]*/	/*[/TAG-setMorts1]*/

		$this->_morts = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setMorts2]*/	/*[/TAG-setMorts2]*/

	}



	public function setVictoires($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setVictoires1]*/	/*[/TAG-setVictoires1]*/

		$this->_victoires = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setVictoires2]*/	/*[/TAG-setVictoires2]*/

	}



	public function setDefaites($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDefaites1]*/	/*[/TAG-setDefaites1]*/

		$this->_defaites = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDefaites2]*/	/*[/TAG-setDefaites2]*/

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



	public function getHero() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_hero;
	}

	public function getHeroObject() {
		//Generated by ObjectGenerator::generateGet()
		if (empty($this->_oHero)) {
			$this->setHeroObject();
		}
		if ((empty($this->_oHero) || is_null($this->_oHero))&& $this->_hero > 0) {
			$this->setHeroObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getHeroObject1]*/	/*[/TAG-getHeroObject1]*/

		return $this->_oHero;
	}



	public function getTues() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_tues;
	}



	public function getMorts() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_morts;
	}



	public function getVictoires() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_victoires;
	}



	public function getDefaites() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_defaites;
	}



	public function __toString() {
		//Generated by ObjectGenerator::generateToString()
		$chaine = 'Objet '.get_class($this).':<br/>';
		$chaine .= 'Le champ id vaut '.$this->getId().'<br/>';
		$chaine .= 'Le champ membre vaut '.$this->getMembre().'<br/>';
		$chaine .= 'Le champ hero vaut '.$this->getHero().'<br/>';
		$chaine .= 'Le champ tues vaut '.$this->getTues().'<br/>';
		$chaine .= 'Le champ morts vaut '.$this->getMorts().'<br/>';
		$chaine .= 'Le champ victoires vaut '.$this->getVictoires().'<br/>';
		$chaine .= 'Le champ defaites vaut '.$this->getDefaites().'<br/>';

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
			$requete = 'INSERT INTO statmembre (id,membre,hero,tues,morts,victoires,defaites)';
			$requete .= ' VALUES ';
			$requete .= '(';
			$requete .= '\'\','; //valeur forcee pour l'insertion
			$requete .= $this->getMembre().',';
			$requete .= $this->getHero().',';
			$requete .= $this->getTues().',';
			$requete .= $this->getMorts().',';
			$requete .= $this->getVictoires().',';
			$requete .= $this->getDefaites().',';
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
			$requete = 'UPDATE statmembre SET ';
			$requete .= 'membre = '.$this->getMembre().',';
			$requete .= 'hero = '.$this->getHero().',';
			$requete .= 'tues = '.$this->getTues().',';
			$requete .= 'morts = '.$this->getMorts().',';
			$requete .= 'victoires = '.$this->getVictoires().',';
			$requete .= 'defaites = '.$this->getDefaites().',';
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
			return 'DELETE FROM statmembre WHERE id = '.$this->getId();
		}
	}

	public function getParent() {
		//Generated by ObjectGenerator::generateGetParent()
		return ('parent::__construct($id,$membre,$hero,$tues,$morts,$victoires,$defaites);');
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
		if ($object instanceof Statmembre) {
			if ($this->_id != $object->getId()) {
				$data['id'] = $object->getId();
			}
			if ($this->_membre != $object->getMembre()) {
				$data['membre'] = $object->getMembre();
			}
			if ($this->_hero != $object->getHero()) {
				$data['hero'] = $object->getHero();
			}
			if ($this->_tues != $object->getTues()) {
				$data['tues'] = $object->getTues();
			}
			if ($this->_morts != $object->getMorts()) {
				$data['morts'] = $object->getMorts();
			}
			if ($this->_victoires != $object->getVictoires()) {
				$data['victoires'] = $object->getVictoires();
			}
			if ($this->_defaites != $object->getDefaites()) {
				$data['defaites'] = $object->getDefaites();
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
		$smarty->assign('statmembre',$this);
		$smarty->assign('aListeMethodes',get_class_methods($this));
		$smarty->assign('urlVersMiniature',_URL_MINIATURES_.$this->getNom().'.jpg');
		/* Appel de l'affichage pour la classe en cour d'utilisation */
		$smarty->display(_TEMPLATES_BASE_.'classes/Statmembre.tpl');
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Statmembre21]*/	/*[/TAG-Statmembre21]*/

}
?>