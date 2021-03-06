<?php
		//Generated by ObjectGenerator::generate()
class Arene {
	protected $_titre; /* varchar(50) */

	/* identifiant composite Nb_joueur_min */
	protected $_nb_joueur_min; /* smallint(1) unsigned */
	/* liste des objets Nb_joueur_min */
	protected $_oNb_joueur_min; /* nb_joueur_min Object*/


	/* identifiant composite Nb_joueur_max */
	protected $_nb_joueur_max; /* smallint(3) unsigned */
	/* liste des objets Nb_joueur_max */
	protected $_oNb_joueur_max; /* nb_joueur_max Object*/


	/* identifiant composite Fantassins_min */
	protected $_fantassins_min; /* smallint(4) unsigned */
	/* liste des objets Fantassins_min */
	protected $_oFantassins_min; /* fantassins_min Object*/


	/* identifiant composite Fantassins_max */
	protected $_fantassins_max; /* smallint(5) unsigned */
	/* liste des objets Fantassins_max */
	protected $_oFantassins_max; /* fantassins_max Object*/

	protected $_motorise_min; /* smallint(4) unsigned */
	protected $_motorise_max; /* smallint(5) unsigned */
	protected $_aerien_min; /* smallint(3) unsigned */
	protected $_aerien_max; /* smallint(4) unsigned */
	protected $_empty = true; // permet de savoir si l'objet est vide

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Arene11]*/	/*[/TAG-Arene11]*/


	public function __construct($titre='',$nb_joueur_min=0,$nb_joueur_max=0,$fantassins_min=0,$fantassins_max=0,$motorise_min=0,$motorise_max=0,$aerien_min=0,$aerien_max=0) {
		//Generated by ObjectGenerator::generateConstruct()
		$this->_titre = $titre;
		$this->_nb_joueur_min = $nb_joueur_min;
		$this->_nb_joueur_max = $nb_joueur_max;
		$this->_fantassins_min = $fantassins_min;
		$this->_fantassins_max = $fantassins_max;
		$this->_motorise_min = $motorise_min;
		$this->_motorise_max = $motorise_max;
		$this->_aerien_min = $aerien_min;
		$this->_aerien_max = $aerien_max;

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


	public function setTitre($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTitre1]*/	/*[/TAG-setTitre1]*/

		$this->_titre = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTitre2]*/	/*[/TAG-setTitre2]*/

	}



	public function setNb_joueur_min($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setNb_joueur_min1]*/	/*[/TAG-setNb_joueur_min1]*/

		$this->_nb_joueur_min = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setNb_joueur_min2]*/	/*[/TAG-setNb_joueur_min2]*/

	}



	public function setNb_joueur_max($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setNb_joueur_max1]*/	/*[/TAG-setNb_joueur_max1]*/

		$this->_nb_joueur_max = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setNb_joueur_max2]*/	/*[/TAG-setNb_joueur_max2]*/

	}



	public function setFantassins_min($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setFantassins_min1]*/	/*[/TAG-setFantassins_min1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_fantassins_min = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setFantassins_min2]*/	/*[/TAG-setFantassins_min2]*/

	}

	protected function setFantassins_minObject() {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setFantassins_minObject1]*/	/*[/TAG-setFantassins_minObject1]*/

		if ($this->_fantassins_min > 0) {
			$this->_oFantassins_min = FactoryFantassins::getFromTableFantassins($this->_fantassins_min);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setFantassins_minObject2]*/	/*[/TAG-setFantassins_minObject2]*/

	}



	public function setFantassins_max($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setFantassins_max1]*/	/*[/TAG-setFantassins_max1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_fantassins_max = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setFantassins_max2]*/	/*[/TAG-setFantassins_max2]*/

	}

	protected function setFantassins_maxObject() {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setFantassins_maxObject1]*/	/*[/TAG-setFantassins_maxObject1]*/

		if ($this->_fantassins_max > 0) {
			$this->_oFantassins_max = FactoryFantassins::getFromTableFantassins($this->_fantassins_max);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setFantassins_maxObject2]*/	/*[/TAG-setFantassins_maxObject2]*/

	}



	public function setMotorise_min($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setMotorise_min1]*/	/*[/TAG-setMotorise_min1]*/

		$this->_motorise_min = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setMotorise_min2]*/	/*[/TAG-setMotorise_min2]*/

	}



	public function setMotorise_max($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setMotorise_max1]*/	/*[/TAG-setMotorise_max1]*/

		$this->_motorise_max = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setMotorise_max2]*/	/*[/TAG-setMotorise_max2]*/

	}



	public function setAerien_min($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setAerien_min1]*/	/*[/TAG-setAerien_min1]*/

		$this->_aerien_min = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setAerien_min2]*/	/*[/TAG-setAerien_min2]*/

	}



	public function setAerien_max($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setAerien_max1]*/	/*[/TAG-setAerien_max1]*/

		$this->_aerien_max = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setAerien_max2]*/	/*[/TAG-setAerien_max2]*/

	}




	public function getTitre() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_titre;
	}



	public function getNb_joueur_min() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_nb_joueur_min;
	}



	public function getNb_joueur_max() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_nb_joueur_max;
	}



	public function getFantassins_min() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_fantassins_min;
	}

	public function getFantassins_minObject() {
		//Generated by ObjectGenerator::generateGet()
		if (empty($this->_oFantassins_min)) {
			$this->setFantassins_minObject();
		}
		if ((empty($this->_oFantassins_min) || is_null($this->_oFantassins_min))&& $this->_fantassins_min > 0) {
			$this->setFantassins_minObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getFantassins_minObject1]*/	/*[/TAG-getFantassins_minObject1]*/

		return $this->_oFantassins_min;
	}



	public function getFantassins_max() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_fantassins_max;
	}

	public function getFantassins_maxObject() {
		//Generated by ObjectGenerator::generateGet()
		if (empty($this->_oFantassins_max)) {
			$this->setFantassins_maxObject();
		}
		if ((empty($this->_oFantassins_max) || is_null($this->_oFantassins_max))&& $this->_fantassins_max > 0) {
			$this->setFantassins_maxObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getFantassins_maxObject1]*/	/*[/TAG-getFantassins_maxObject1]*/

		return $this->_oFantassins_max;
	}



	public function getMotorise_min() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_motorise_min;
	}



	public function getMotorise_max() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_motorise_max;
	}



	public function getAerien_min() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_aerien_min;
	}



	public function getAerien_max() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_aerien_max;
	}



	public function __toString() {
		//Generated by ObjectGenerator::generateToString()
		$chaine = 'Objet '.get_class($this).':<br/>';
		$chaine .= 'Le champ titre vaut '.$this->getTitre().'<br/>';
		$chaine .= 'Le champ nb_joueur_min vaut '.$this->getNb_joueur_min().'<br/>';
		$chaine .= 'Le champ nb_joueur_max vaut '.$this->getNb_joueur_max().'<br/>';
		$chaine .= 'Le champ fantassins_min vaut '.$this->getFantassins_min().'<br/>';
		$chaine .= 'Le champ fantassins_max vaut '.$this->getFantassins_max().'<br/>';
		$chaine .= 'Le champ motorise_min vaut '.$this->getMotorise_min().'<br/>';
		$chaine .= 'Le champ motorise_max vaut '.$this->getMotorise_max().'<br/>';
		$chaine .= 'Le champ aerien_min vaut '.$this->getAerien_min().'<br/>';
		$chaine .= 'Le champ aerien_max vaut '.$this->getAerien_max().'<br/>';

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
			$requete = 'INSERT INTO arene (titre,nb_joueur_min,nb_joueur_max,fantassins_min,fantassins_max,motorise_min,motorise_max,aerien_min,aerien_max)';
			$requete .= ' VALUES ';
			$requete .= '(';
			$requete .= '\''.$this->getTitre().'\',';
			$requete .= $this->getNb_joueur_min().',';
			$requete .= $this->getNb_joueur_max().',';
			$requete .= $this->getFantassins_min().',';
			$requete .= $this->getFantassins_max().',';
			$requete .= $this->getMotorise_min().',';
			$requete .= $this->getMotorise_max().',';
			$requete .= $this->getAerien_min().',';
			$requete .= $this->getAerien_max().',';
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
			$requete = 'UPDATE arene SET ';
			$requete .= 'titre = \''.$this->getTitre().'\',';
			$requete .= 'nb_joueur_min = '.$this->getNb_joueur_min().',';
			$requete .= 'nb_joueur_max = '.$this->getNb_joueur_max().',';
			$requete .= 'fantassins_min = '.$this->getFantassins_min().',';
			$requete .= 'fantassins_max = '.$this->getFantassins_max().',';
			$requete .= 'motorise_min = '.$this->getMotorise_min().',';
			$requete .= 'motorise_max = '.$this->getMotorise_max().',';
			$requete .= 'aerien_min = '.$this->getAerien_min().',';
			$requete .= 'aerien_max = '.$this->getAerien_max().',';
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
			return 'DELETE FROM arene WHERE id = '.$this->getId();
		}
	}

	public function getParent() {
		//Generated by ObjectGenerator::generateGetParent()
		return ('parent::__construct($titre,$nb_joueur_min,$nb_joueur_max,$fantassins_min,$fantassins_max,$motorise_min,$motorise_max,$aerien_min,$aerien_max);');
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
		if ($object instanceof Arene) {
			if ($this->_titre != $object->getTitre()) {
				$data['titre'] = $object->getTitre();
			}
			if ($this->_nb_joueur_min != $object->getNb_joueur_min()) {
				$data['nb_joueur_min'] = $object->getNb_joueur_min();
			}
			if ($this->_nb_joueur_max != $object->getNb_joueur_max()) {
				$data['nb_joueur_max'] = $object->getNb_joueur_max();
			}
			if ($this->_fantassins_min != $object->getFantassins_min()) {
				$data['fantassins_min'] = $object->getFantassins_min();
			}
			if ($this->_fantassins_max != $object->getFantassins_max()) {
				$data['fantassins_max'] = $object->getFantassins_max();
			}
			if ($this->_motorise_min != $object->getMotorise_min()) {
				$data['motorise_min'] = $object->getMotorise_min();
			}
			if ($this->_motorise_max != $object->getMotorise_max()) {
				$data['motorise_max'] = $object->getMotorise_max();
			}
			if ($this->_aerien_min != $object->getAerien_min()) {
				$data['aerien_min'] = $object->getAerien_min();
			}
			if ($this->_aerien_max != $object->getAerien_max()) {
				$data['aerien_max'] = $object->getAerien_max();
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
		$smarty->assign('arene',$this);
		$smarty->assign('aListeMethodes',get_class_methods($this));
		$smarty->assign('urlVersMiniature',_URL_MINIATURES_.$this->getNom().'.jpg');
		/* Appel de l'affichage pour la classe en cour d'utilisation */
		$smarty->display(_TEMPLATES_BASE_.'classes/Arene.tpl');
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Arene21]*/	/*[/TAG-Arene21]*/

}
?>