<?php
		//Generated by ObjectGenerator::generate()
class Temp_user extends Temp {
	protected $_empty = true; // permet de savoir si l'objet est vide

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Temp_user11]*/	/*[/TAG-Temp_user11]*/


	public function __construct($id=0,$pseudo='',$password='',$mail='',$checksum='',$date_creation=0,$date_suppression=0) {
		//Generated by ObjectGenerator::generateConstruct()
		parent::__construct($id,$pseudo,$password,$email,$adresse_ip,$date_inscription,$date_suppression,$checksum);
		$this->_mail = $mail;
		$this->_date_creation = $date_creation;

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


	public function setMail($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setMail1]*/	/*[/TAG-setMail1]*/

		$this->_mail = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setMail2]*/	/*[/TAG-setMail2]*/

	}



	public function setDate_creation($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDate_creation1]*/	/*[/TAG-setDate_creation1]*/

		$this->_date_creation = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDate_creation2]*/	/*[/TAG-setDate_creation2]*/

	}




	public function getMail() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_mail;
	}



	public function getDate_creation() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_date_creation;
	}



	public function __toString() {
		//Generated by ObjectGenerator::generateToString()
		$chaine = 'Objet '.get_class($this).':<br/>';
		$chaine .= 'Le champ id vaut '.$this->getId().'<br/>';
		$chaine .= 'Le champ pseudo vaut '.$this->getPseudo().'<br/>';
		$chaine .= 'Le champ password vaut '.$this->getPassword().'<br/>';
		$chaine .= 'Le champ mail vaut '.$this->getMail().'<br/>';
		$chaine .= 'Le champ checksum vaut '.$this->getChecksum().'<br/>';
		$chaine .= 'Le champ date_creation vaut '.$this->getDate_creation().'<br/>';
		$chaine .= 'Le champ date_suppression vaut '.$this->getDate_suppression().'<br/>';

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
			$requete = 'INSERT INTO temp_user (id,pseudo,password,mail,checksum,date_creation,date_suppression)';
			$requete .= ' VALUES ';
			$requete .= '(';
			$requete .= '\'\','; //valeur forcee pour l'insertion
			$requete .= '\''.$this->getPseudo().'\',';
			$requete .= '\''.$this->getPassword().'\',';
			$requete .= '\''.$this->getMail().'\',';
			$requete .= '\''.$this->getChecksum().'\',';
			$requete .= $this->getDate_creation().',';
			$requete .= $this->getDate_suppression().',';
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
			$requete = 'UPDATE temp_user SET ';
			$requete .= 'pseudo = \''.$this->getPseudo().'\',';
			$requete .= 'password = \''.$this->getPassword().'\',';
			$requete .= 'mail = \''.$this->getMail().'\',';
			$requete .= 'checksum = \''.$this->getChecksum().'\',';
			$requete .= 'date_creation = '.$this->getDate_creation().',';
			$requete .= 'date_suppression = '.$this->getDate_suppression().',';
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
			return 'DELETE FROM temp_user WHERE id = '.$this->getId();
		}
	}

	public function getParent() {
		//Generated by ObjectGenerator::generateGetParent()
		return ('parent::__construct($id,$pseudo,$password,$mail,$checksum,$date_creation,$date_suppression);');
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
		if ($object instanceof Temp_user) {
			if ($this->_id != $object->getId()) {
				$data['id'] = $object->getId();
			}
			if ($this->_pseudo != $object->getPseudo()) {
				$data['pseudo'] = $object->getPseudo();
			}
			if ($this->_password != $object->getPassword()) {
				$data['password'] = $object->getPassword();
			}
			if ($this->_mail != $object->getMail()) {
				$data['mail'] = $object->getMail();
			}
			if ($this->_checksum != $object->getChecksum()) {
				$data['checksum'] = $object->getChecksum();
			}
			if ($this->_date_creation != $object->getDate_creation()) {
				$data['date_creation'] = $object->getDate_creation();
			}
			if ($this->_date_suppression != $object->getDate_suppression()) {
				$data['date_suppression'] = $object->getDate_suppression();
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
		$smarty->assign('temp_user',$this);
		$smarty->assign('aListeMethodes',get_class_methods($this));
		$smarty->assign('urlVersMiniature',_URL_MINIATURES_.$this->getNom().'.jpg');
		/* Appel de l'affichage pour la classe en cour d'utilisation */
		$smarty->display(_TEMPLATES_BASE_.'classes/Temp_user.tpl');
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Temp_user21]*/	/*[/TAG-Temp_user21]*/

}
?>