<?php
		//Generated by ObjectGenerator::generate()
class Tile {
	protected $_id; /* int(20) unsigned */

	/* identifiant composite Carte */
	protected $_carte; /* bigint(20) unsigned */
	/* liste des objets Carte */
	protected $_oCarte; /* carte Object*/

	protected $_x; /* int(11) */
	protected $_y; /* int(11) */
	protected $_vision; /* enum('0','1') */

	/* identifiant composite Unite */
	protected $_unite; /* bigint(20) */
	/* liste des objets Unite */
	protected $_oUnite; /* unite Object*/


	/* identifiant composite Unite_joueur */
	protected $_unite_joueur; /* bigint(20) unsigned */
	/* liste des objets Unite_joueur */
	protected $_oUnite_joueur; /* unite_joueur Object*/


	/* identifiant composite Decor */
	protected $_decor; /* bigint(20) */
	/* liste des objets Decor */
	protected $_oDecor; /* decor Object*/


	/* identifiant composite Equipement */
	protected $_equipement; /* bigint(20) unsigned */
	/* liste des objets Equipement */
	protected $_oEquipement; /* equipement Object*/


	/* identifiant composite Equipement_joueur */
	protected $_equipement_joueur; /* bigint(20) unsigned */
	/* liste des objets Equipement_joueur */
	protected $_oEquipement_joueur; /* equipement_joueur Object*/

	protected $_etatCase; /* bigint(11) */
	protected $_bloque; /* tinyint(1) */

	/* identifiant composite Tile */
	protected $_tile; /* bigint(20) unsigned */
	/* liste des objets Tile */
	protected $_oTile; /* tile Object*/

	protected $_empty = true; // permet de savoir si l'objet est vide

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Tile11]*/	/*[/TAG-Tile11]*/


	public function __construct($id=0,$carte=0,$x=0,$y=0,$vision='',$unite=0,$unite_joueur=0,$decor=0,$equipement=0,$equipement_joueur=0,$etatCase=0,$bloque=0,$tile=0) {
		//Generated by ObjectGenerator::generateConstruct()
		$this->_id = $id;
		$this->_carte = $carte;
		$this->_x = $x;
		$this->_y = $y;
		$this->_vision = $vision;
		$this->_unite = $unite;
		$this->_unite_joueur = $unite_joueur;
		$this->_decor = $decor;
		$this->_equipement = $equipement;
		$this->_equipement_joueur = $equipement_joueur;
		$this->_etatCase = $etatCase;
		$this->_bloque = $bloque;
		$this->_tile = $tile;

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



	public function setVision($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setVision1]*/	/*[/TAG-setVision1]*/

		$this->_vision = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setVision2]*/	/*[/TAG-setVision2]*/

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



	public function setDecor($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDecor1]*/	/*[/TAG-setDecor1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_decor = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDecor2]*/	/*[/TAG-setDecor2]*/

	}

	protected function setDecorObject() {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDecorObject1]*/	/*[/TAG-setDecorObject1]*/

		if ($this->_decor > 0) {
			$this->_oDecor = FactoryDecor::getFromTableDecor($this->_decor);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setDecorObject2]*/	/*[/TAG-setDecorObject2]*/

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



	public function setEtatCase($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setEtatCase1]*/	/*[/TAG-setEtatCase1]*/

		$this->_etatCase = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setEtatCase2]*/	/*[/TAG-setEtatCase2]*/

	}



	public function setBloque($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBloque1]*/	/*[/TAG-setBloque1]*/

		$this->_bloque = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setBloque2]*/	/*[/TAG-setBloque2]*/

	}



	public function setTile($nouvelleValeur) {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTile1]*/	/*[/TAG-setTile1]*/

		/* La modification de l'identifiant DB est interdite SAUF SI l'objet est vide au depart */
		if ($this->getEmpty() === false) {
		return;
		}
		/* un identifiant est toujours un entier non nul */
		if (!intval($nouvelleValeur) || $nouvelleValeur < 0) {
			return false;
		}
		$this->_tile = $nouvelleValeur;

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTile2]*/	/*[/TAG-setTile2]*/

	}

	protected function setTileObject() {
		//Generated by ObjectGenerator::generateSet()

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTileObject1]*/	/*[/TAG-setTileObject1]*/

		if ($this->_tile > 0) {
			$this->_oTile = FactoryTile::getFromTableTile($this->_tile);
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-setTileObject2]*/	/*[/TAG-setTileObject2]*/

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
	/*[TAG-getCarteObject1]*/
		if (empty($this->_oCarte)) {
			$this->setCarteObject();
		}
	/*[/TAG-getCarteObject1]*/

		return $this->_oCarte;
	}



	public function getX() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_x;
	}



	public function getY() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_y;
	}



	public function getVision() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_vision;
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
	/*[TAG-getUniteObject1]*/
		if (empty($this->_oUnite)) {
			$this->setUniteObject();
		}
	/*[/TAG-getUniteObject1]*/

		return $this->_oUnite;
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
	/*[TAG-getUnite_joueurObject1]*/
		if (empty($this->_oUnite_joueur)) {
			$this->setUnite_joueurObject();
		}
	/*[/TAG-getUnite_joueurObject1]*/

			return $this->_oUnite_joueur;
	}



	public function getDecor() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_decor;
	}

	public function getDecorObject() {
		//Generated by ObjectGenerator::generateGet()
		if (empty($this->_oDecor)) {
			$this->setDecorObject();
		}
		if ((empty($this->_oDecor) || is_null($this->_oDecor)) && $this->_decor > 0) {
			$this->setDecorObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getDecorObject1]*/
		if (empty($this->_oDecor)) {
			$this->setDecorObject();
		}
	/*[/TAG-getDecorObject1]*/

		return $this->_oDecor;
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
	/*[TAG-getEquipementObject1]*/
		if (empty($this->_oEquipement)) {
			$this->setEquipementObject();
		}
	/*[/TAG-getEquipementObject1]*/

		return $this->_oEquipement;
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
	/*[TAG-getEquipement_joueurObject1]*/
		if (empty($this->_oEquipement_joueur)) {
			$this->setEquipement_joueurObject();
		}
	/*[/TAG-getEquipement_joueurObject1]*/

			return $this->_oEquipement_joueur;
	}



	public function getEtatCase() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_etatCase;
	}



	public function getBloque() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_bloque;
	}



	public function getTile() {
		//Generated by ObjectGenerator::generateGet()
		return $this->_tile;
	}

	public function getTileObject() {
		//Generated by ObjectGenerator::generateGet()
		if (empty($this->_oTile)) {
			$this->setTileObject();
		}
		if ((empty($this->_oTile) || is_null($this->_oTile))&& $this->_tile > 0) {
			$this->setTileObject();
		}

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getTileObject1]*/
		if (empty($this->_oTile)) {
			$this->setTileObject();
		}
	/*[/TAG-getTileObject1]*/

		return $this->_oTile;
	}



	public function __toString() {
		//Generated by ObjectGenerator::generateToString()
		$chaine = 'Objet '.get_class($this).':<br/>';
		$chaine .= 'Le champ id vaut '.$this->getId().'<br/>';
		$chaine .= 'Le champ carte vaut '.$this->getCarte().'<br/>';
		$chaine .= 'Le champ x vaut '.$this->getX().'<br/>';
		$chaine .= 'Le champ y vaut '.$this->getY().'<br/>';
		$chaine .= 'Le champ vision vaut '.$this->getVision().'<br/>';
		$chaine .= 'Le champ unite vaut '.$this->getUnite().'<br/>';
		$chaine .= 'Le champ unite_joueur vaut '.$this->getUnite_joueur().'<br/>';
		$chaine .= 'Le champ decor vaut '.$this->getDecor().'<br/>';
		$chaine .= 'Le champ equipement vaut '.$this->getEquipement().'<br/>';
		$chaine .= 'Le champ equipement_joueur vaut '.$this->getEquipement_joueur().'<br/>';
		$chaine .= 'Le champ etatCase vaut '.$this->getEtatCase().'<br/>';
		$chaine .= 'Le champ bloque vaut '.$this->getBloque().'<br/>';
		$chaine .= 'Le champ tile vaut '.$this->getTile().'<br/>';

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
			$requete = 'INSERT INTO tile (id,carte,x,y,vision,unite,unite_joueur,decor,equipement,equipement_joueur,etatCase,bloque,tile)';
			$requete .= ' VALUES ';
			$requete .= '(';
			$requete .= '\'\','; //valeur forcee pour l'insertion
			$requete .= $this->getCarte().',';
			$requete .= $this->getX().',';
			$requete .= $this->getY().',';
			$requete .= '\''.$this->getVision().'\',';
			$requete .= $this->getUnite().',';
			$requete .= $this->getUnite_joueur().',';
			$requete .= $this->getDecor().',';
			$requete .= $this->getEquipement().',';
			$requete .= $this->getEquipement_joueur().',';
			$requete .= $this->getEtatCase().',';
			$requete .= $this->getBloque().',';
			$requete .= $this->getTile().',';
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
			$requete = 'UPDATE tile SET ';
			$requete .= 'carte = '.$this->getCarte().',';
			$requete .= 'x = '.$this->getX().',';
			$requete .= 'y = '.$this->getY().',';
			$requete .= 'vision = \''.$this->getVision().'\',';
			$requete .= 'unite = '.$this->getUnite().',';
			$requete .= 'unite_joueur = '.$this->getUnite_joueur().',';
			$requete .= 'decor = '.$this->getDecor().',';
			$requete .= 'equipement = '.$this->getEquipement().',';
			$requete .= 'equipement_joueur = '.$this->getEquipement_joueur().',';
			$requete .= 'etatCase = '.$this->getEtatCase().',';
			$requete .= 'bloque = '.$this->getBloque().',';
			$requete .= 'tile = '.$this->getTile().',';
			$requete = substr($requete,0,strlen($requete)-1);
			$requete .= ' WHERE id = '.$this->getId();
			return $requete;
		}
	}

	public function delete() {
		//Generated by ObjectGenerator::generateDelete()
		if ($this->getId() == 0 || $this->getId() == null) {
			throw new Exception(get_class($this).": aucun identifiant donn&eacute; p�ur supprimer");
		} else {
			return 'DELETE FROM tile WHERE id = '.$this->getId();
		}
	}

	public function getParent() {
		//Generated by ObjectGenerator::generateGetParent()
		return ('parent::__construct($id,$carte,$x,$y,$vision,$unite,$unite_joueur,$decor,$equipement,$equipement_joueur,$etatCase,$bloque,$tile);');
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
		if ($object instanceof Tile) {
			if ($this->_id != $object->getId()) {
				$data['id'] = $object->getId();
			}
			if ($this->_carte != $object->getCarte()) {
				$data['carte'] = $object->getCarte();
			}
			if ($this->_x != $object->getX()) {
				$data['x'] = $object->getX();
			}
			if ($this->_y != $object->getY()) {
				$data['y'] = $object->getY();
			}
			if ($this->_vision != $object->getVision()) {
				$data['vision'] = $object->getVision();
			}
			if ($this->_unite != $object->getUnite()) {
				$data['unite'] = $object->getUnite();
			}
			if ($this->_unite_joueur != $object->getUnite_joueur()) {
				$data['unite_joueur'] = $object->getUnite_joueur();
			}
			if ($this->_decor != $object->getDecor()) {
				$data['decor'] = $object->getDecor();
			}
			if ($this->_equipement != $object->getEquipement()) {
				$data['equipement'] = $object->getEquipement();
			}
			if ($this->_equipement_joueur != $object->getEquipement_joueur()) {
				$data['equipement_joueur'] = $object->getEquipement_joueur();
			}
			if ($this->_etatCase != $object->getEtatCase()) {
				$data['etatCase'] = $object->getEtatCase();
			}
			if ($this->_bloque != $object->getBloque()) {
				$data['bloque'] = $object->getBloque();
			}
			if ($this->_tile != $object->getTile()) {
				$data['tile'] = $object->getTile();
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
		$smarty->assign('tile',$this);
		$smarty->assign('aListeMethodes',get_class_methods($this));
		$smarty->assign('urlVersMiniature',_URL_MINIATURES_.$this->getNom().'.jpg');
		/* Appel de l'affichage pour la classe en cour d'utilisation */
		$smarty->display(_TEMPLATES_BASE_.'classes/Tile.tpl');
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Tile21]*/
	
	/**
	 * Retourne une information concernant la case
	 * @return string
	 */
	public function donneInfoCase($editionCarte) {
		$chaine = "<ul>";
		if ($this->getBloque()) {
			$chaine .= "<li>Case bloqu&eacute;</li>";
		}
		if ($editionCarte === true) {
			// Dans tous les cas, on indique les coordonnees de la case en premiere ligne.
			$chaine .= "<li>Identifiant: ".intval($this->getId())."</li>";
			$chaine .= "<li>Coordonn&eacute;es: ".intval($this->getX())." / ".intval($this->getY())."</li>";
			if ($this->_unite > 0) {
				// il s'agit d'une case sur laquelle se trouve une unite autre que celle selectionnee
				$chaine .= "<li>Unit&eacute;:</li>";
				$chaine .= "<ul><li>".$this->getUniteObject()->getDescription()."</li></ul>";
			}
			if ($this->_unite_joueur > 0) {
			    // il s'agit d'une case sur laquelle se trouve une unite autre que celle selectionnee
			    $chaine .= "<li>Unit&eacute; joueur:</li>";
			    $chaine .= "<ul><li>".$this->getUnite_joueurObject()->getDescription()."</li></ul>";
			}
			if ($this->_decor > 0) {
				// nous avons un decor sur la case
				$chaine .= "<li>D&eacute;cor:</li>";
				$chaine .= "<ul><li>".$this->getDecorObject()->getDescription()."</li></ul>";
			} else if ($this->getEtatCase() == _CASE_DECOR_) {
				//Cas d'une case recouverte par un decor multi-case
				$chaine .= "<li>Occup&eacute;e par un d&eacute;cor multi-case</li>";
			}
			if ($this->_tile > 0 && $this->getEtatCase() == _CASE_LIEN_) {
				// nous avons un lien vers une autre case
				$chaine .= "<li>Case lien avec la case (ID".$this->getTileObject()->getId().")</li>";
				$chaine .= "<ul><li>Carte li&eacute;e:".$this->getTileObject()->getCarteObject()->getNom()."</li></ul>";
			}
		} else {
			$chaine = "<li>".$this->getX()."/".$this->getY()."</li>";
			if ($this->_unite > 0) {
				$chaine .= "<li>".$this->getUniteObject()->getNom()."</li>";
			}
			if ($this->_unite_joueur > 0) {
			    $chaine .= "<li>".$this->getUnite_joueurObject()->getNom()."</li>";
			}
			if ($this->_decor > 0) {
				// nous avons un decor sur la case
				$chaine .= "<li>".$this->getDecorObject()->getNom()."</li>";
			}
			if ($this->_tile > 0) {
				// nous avons un lien vers une autre case
				$chaine .= "<li>Passage...</li>";
			}
		}
		if ($this->_equipement > 0) {
			// il s'agit d'une case sur laquelle se trouve une unite autre que celle selectionnee
			$chaine .= "<li>&Eacute;quipement au sol: ".$this->getEquipementObject()->getNom()."</li>";
		}
		$chaine .= "</ul>";
		return $chaine;
	}
	
	/**
	 *Informe sur le status de la case (obstacle ou non)
	 * @return boolean
	 */
	public function estUnObstacle() {
		if (!empty($this->_oDecor) || !empty($this->_oUnite)) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Une case est plus proche de l'arrivee si sa distance avec elle diminue
	 * par rapport a la case de depart.
	 * @param daoCaseCarte $caseDepart
	 * @param daoCaseCarte $caseArrivee
	 * @return boolean
	 */
	//TRANSFERE DANS MANAGERTILE
	//public function plusProche($caseDepart,$caseArrivee) {
	//	/* Calcul distance case depart -> case arrivee */
	//	// 		$distanceAFaire = $caseDepart->distanceAvec($caseArrivee);
	//	// 		$distanceRestante = $this->distanceAvec($caseArrivee);
	//	if ($this->distanceAvec($caseArrivee) < $caseDepart->distanceAvec($caseArrivee)) {
	//		return true;
	//	} else {
	//		return false;
	//	}
	//}
	
	/**
	 *Methode retournant la distance euclidienne enre deux cases.
	 * @param daoCaseCarte $caseArrivee
	 * @return type
	 */
	//TRANSFERE DANS MANAGERTILE
	// 	public function distanceAvec($caseArrivee) {
	// 		return floor(sqrt((($caseArrivee->getX() - $this->getX()))*($caseArrivee->getX() - $this->getX()) + (($caseArrivee->getY() - $this->getY())*($caseArrivee->getY() - $this->getY()))));
	// 	}
	
	/**
	 * Permet de renseigner le tableau des cases adjacentes a la case donnee
	 * @param unknown $idCarte
	 * @param number $distance
	 */
	//TRANSFERE DANS MANAGERTILE
	// 	public function setCasesAdjacentes($idCarte,$distance=1) {
	// 		for($i = floor($this->getX() - $distance); $i <= floor($this->getX() + $distance); $i++) {
	// 			for ($j = floor($this->getY() - $distance); $j <= floor($this->getY() + $distance); $j++) {
	// 				$this->_aCasesAdjacentes[$i][$j] = FactoryCases::getCaseFromCoordonate(intval($idCarte),$i,$j);
	// 			}
	// 		}
	// 	}
	
	/**
	 * Retourne la liste des cases adjacentes a la lcase en cours
	 * @return multitype:
	 */
	public function getlisteCasesAdjacentes() {
		return $this->_aCasesAdjacentes;
	}
	
	
	/**
	 * Methode pour trouver le meilleur chemin de la case donnee vers la case d'arrivee
	 * @param Cases $caseArrivee la case cible du chemmin a trouver
	 * @param number $idCarte
	 * @param array $chemin liste des cases du chemin
	 * @throws Exception
	 */
	//TRANSFERE DANS MANAGERTILE
	// 	public function trouveCheminVers($caseArrivee,$idCarte=0,&$chemin) {
	// 		$listeCasesValides = array();
	// 		if ($idCarte == 0) {
	// 			throw new Exception("Erreur pour trouver un chemin il faut stipuler une carte.");
	// 		}
	// 		if ($this->getId() == $caseArrivee->getId()) {
	// 			return;
	// 		}
	// 		/* Chargement des cases adjacentes */
	// 		$this->setCasesAdjacentes($idCarte);
	// 		/* Parcours de la liste des cases adjacentes */
	// 		foreach ($this->getListeCasesAdjacentes() AS $x) {
	// 			foreach ($x AS $case) {
	// 				if (!$case->estUnObstacle()) {
	// 					if ($case->plusProche($this,$caseArrivee)) {
	// 						$listeCasesValides[] = $case;
	// 					}
	// 				}
	// 			}
	// 		}
	// 		/* Sauvegarde de la case choisie */
	// 		$chemin[] = $this->choisitCaseParmiValides($listeCasesValides,$caseArrivee);
	
	// 		/* et recherche du meilleur chemin � partir de la case choisie */
	// 		if ($chemin[(sizeof($chemin))-1]->getId() != $caseArrivee->getId()) {
	// 			$chemin[(sizeof($chemin))-1]->trouveCheminVers($caseArrivee,$idCarte,$chemin);
	// 		}
	// 	}
	
	/**
	 *
	 * @param unknown $listeCasesValides
	 * @param unknown $caseArrivee
	 * @return unknown
	 */
	//TRANSFERE DANS MANAGERTILE
	// 	private function choisitCaseParmiValides($listeCasesValides,$caseArrivee) {
	// 		$distance = 0;
	// 		if (sizeof($listeCasesValides) == 1) {
	// 			$caseChoisie = $listeCasesValides[0];
	// 		} else {
	// 			foreach ($listeCasesValides AS $case) {
	// 				if ($distance == 0) {
	// 					$distance = $case->distanceAvec($caseArrivee);
	// 					$caseChoisie = $case;
	// 				} else {
	// 					if ($distance > $case->distanceAvec($caseArrivee)) {
	// 						$distance = $case->distanceAvec($caseArrivee);
	// 						$caseChoisie = $case;
	// 					}
	// 				}
	// 			}
	// 		}
	// 		return $caseChoisie;
	// 	}
	
	
	public function getUniteSurCase() {
	    if ($this->getUnite() > 0) {
	        return $this->getUniteObject();
	    }
	    if ($this->getUnite_joueur() > 0) {
	        return $this->getUnite_joueurObject();
	    }
	}
	/*[/TAG-Tile21]*/

}
?>