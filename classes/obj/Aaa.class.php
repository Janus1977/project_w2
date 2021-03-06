<?php
		//Generated by ObjectGenerator::generate()
class Aaa {
	protected $_tpe; /* tinyint(1) */
	protected $_sme; /* smallint(2) */
	protected $_mme; /* mediumint(3) */
	protected $_e; /* int(4) */
	protected $_bge; /* bigint(5) */
	protected $_dec; /* decimal(3,2) */
	protected $_flt; /* float(3,2) */
	protected $_dbl; /* double(3,2) */
	protected $_bool; /* tinyint(1) */
	protected $_eumer; /* enum('0','1') */
	protected $_empty = true; // permet de savoir si l'objet est vide

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Aaa11]*/	/*[/TAG-Aaa11]*/


	public function __construct($tpe=0,$sme=0,$mme=0,$e=0,$bge=0,$dec='',$flt='',$dbl='',$bool=0,$eumer='') {
		//Generated by ObjectGenerator::generateConstruct()
		$this->_tpe = $tpe;
		$this->_sme = $sme;
		$this->_mme = $mme;
		$this->_e = $e;
		$this->_bge = $bge;
		$this->_dec = $dec;
		$this->_flt = $flt;
		$this->_dbl = $dbl;
		$this->_bool = $bool;
		$this->_eumer = $eumer;

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


	public function setTpe($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTpe1]*/	/*[/TAG-setTpe1]*/

		$this->_tpe = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTpe2]*/	/*[/TAG-setTpe2]*/

	}



	public function setSme($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setSme1]*/	/*[/TAG-setSme1]*/

		$this->_sme = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setSme2]*/	/*[/TAG-setSme2]*/

	}



	public function setMme($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setMme1]*/	/*[/TAG-setMme1]*/

		$this->_mme = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setMme2]*/	/*[/TAG-setMme2]*/

	}



	public function setE($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setE1]*/	/*[/TAG-setE1]*/

		$this->_e = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setE2]*/	/*[/TAG-setE2]*/

	}



	public function setBge($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBge1]*/	/*[/TAG-setBge1]*/

		$this->_bge = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBge2]*/	/*[/TAG-setBge2]*/

	}



	public function setDec($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDec1]*/	/*[/TAG-setDec1]*/

		$this->_dec = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDec2]*/	/*[/TAG-setDec2]*/

	}



	public function setFlt($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setFlt1]*/	/*[/TAG-setFlt1]*/

		$this->_flt = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setFlt2]*/	/*[/TAG-setFlt2]*/

	}



	public function setDbl($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDbl1]*/	/*[/TAG-setDbl1]*/

		$this->_dbl = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDbl2]*/	/*[/TAG-setDbl2]*/

	}



	public function setBool($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBool1]*/	/*[/TAG-setBool1]*/

		$this->_bool = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBool2]*/	/*[/TAG-setBool2]*/

	}



	public function setEumer($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setEumer1]*/	/*[/TAG-setEumer1]*/

		$this->_eumer = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setEumer2]*/	/*[/TAG-setEumer2]*/

	}




	public function getTpe() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_tpe;
	}



	public function getSme() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_sme;
	}



	public function getMme() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_mme;
	}



	public function getE() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_e;
	}



	public function getBge() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_bge;
	}



	public function getDec() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_dec;
	}



	public function getFlt() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_flt;
	}



	public function getDbl() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_dbl;
	}



	public function getBool() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_bool;
	}



	public function getEumer() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_eumer;
	}



	public function __toString() {
		//Generated by ObjectGenerator::generateToString()
		$chaine = 'Objet '.get_class($this).':<br/>';
		$chaine .= 'Le champ tpe vaut '.$this->getTpe().'<br/>';
		$chaine .= 'Le champ sme vaut '.$this->getSme().'<br/>';
		$chaine .= 'Le champ mme vaut '.$this->getMme().'<br/>';
		$chaine .= 'Le champ e vaut '.$this->getE().'<br/>';
		$chaine .= 'Le champ bge vaut '.$this->getBge().'<br/>';
		$chaine .= 'Le champ dec vaut '.$this->getDec().'<br/>';
		$chaine .= 'Le champ flt vaut '.$this->getFlt().'<br/>';
		$chaine .= 'Le champ dbl vaut '.$this->getDbl().'<br/>';
		$chaine .= 'Le champ bool vaut '.$this->getBool().'<br/>';
		$chaine .= 'Le champ eumer vaut '.$this->getEumer().'<br/>';

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
			$requete = 'INSERT INTO aaa (tpe,sme,mme,e,bge,dec,flt,dbl,bool,eumer)';
			$requete .= ' VALUES ';
			$requete .= '(';
			$requete .= $this->getTpe().',';
			$requete .= $this->getSme().',';
			$requete .= $this->getMme().',';
			$requete .= $this->getE().',';
			$requete .= $this->getBge().',';
			$requete .= $this->getDec().',';
			$requete .= $this->getFlt().',';
			$requete .= $this->getDbl().',';
			$requete .= $this->getBool().',';
			$requete .= '\''.$this->getEumer().'\',';
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
			$requete = 'UPDATE aaa SET ';
			$requete .= 'tpe = '.$this->getTpe().',';
			$requete .= 'sme = '.$this->getSme().',';
			$requete .= 'mme = '.$this->getMme().',';
			$requete .= 'e = '.$this->getE().',';
			$requete .= 'bge = '.$this->getBge().',';
			$requete .= 'dec = '.$this->getDec().',';
			$requete .= 'flt = '.$this->getFlt().',';
			$requete .= 'dbl = '.$this->getDbl().',';
			$requete .= 'bool = '.$this->getBool().',';
			$requete .= 'eumer = \''.$this->getEumer().'\',';
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
			return 'DELETE FROM aaa WHERE id = '.$this->getId();
		}
	}

	public function getParent() {
		//Generated by ObjectGenerator::generateGetParent()
		return ('parent::__construct($tpe,$sme,$mme,$e,$bge,$dec,$flt,$dbl,$bool,$eumer);');
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
		if ($object instanceof Aaa) {
			if ($this->_tpe != $object->getTpe()) {
				$data['tpe'] = $object->getTpe();
			}
			if ($this->_sme != $object->getSme()) {
				$data['sme'] = $object->getSme();
			}
			if ($this->_mme != $object->getMme()) {
				$data['mme'] = $object->getMme();
			}
			if ($this->_e != $object->getE()) {
				$data['e'] = $object->getE();
			}
			if ($this->_bge != $object->getBge()) {
				$data['bge'] = $object->getBge();
			}
			if ($this->_dec != $object->getDec()) {
				$data['dec'] = $object->getDec();
			}
			if ($this->_flt != $object->getFlt()) {
				$data['flt'] = $object->getFlt();
			}
			if ($this->_dbl != $object->getDbl()) {
				$data['dbl'] = $object->getDbl();
			}
			if ($this->_bool != $object->getBool()) {
				$data['bool'] = $object->getBool();
			}
			if ($this->_eumer != $object->getEumer()) {
				$data['eumer'] = $object->getEumer();
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
		$smarty->assign('aaa',$this);
		$smarty->assign('aListeMethodes',get_class_methods($this));
		$smarty->assign('urlVersMiniature',_URL_MINIATURES_.$this->getNom().'.jpg');
		/* Appel de l'affichage pour la classe en cour d'utilisation */
		$smarty->display(_TEMPLATES_BASE_.'classes/Aaa.tpl');
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Aaa21]*/
	public function toto() {
		$test = "pour voir si cela reste";
	}
	/*[/TAG-Aaa21]*/

}
?>