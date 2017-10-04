<?php
	/*
	 * AUTO-GENERATED FILE on 23/02/2017 14:20:58 BY FactoryGenerator.class.php
	 */

abstract class FactoryDecor_utilise {

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Decor_utilise11]*/	/*[/TAG-Decor_utilise11]*/


	public static function getFromTableDecor_utilise($id=-1) {
		//Generated by FactoryGenerator::generateGetAllFromTable()
		$listeObjet = array();
		// Lancement de la requete
		if (empty(self::$_requete)) {
			$requete = 'SELECT * FROM `decor_utilise`';
		} else {
			$requete = self::$_requete;
		}
		if (!is_array($id)) {
			if ($id > -1) {
				$requete .= ' WHERE id = :id';
				//Il faut que le parametre soit dans un array pour le BIND
				$id = array(':id' => $id);
			} else {
				/* Tous les objets ==> il faut les ordonner */
				$requete .= ' ORDER BY id ASC';
			}
		} else {
			$requete .= ' WHERE id IN ('.implode(",",$id).') ORDER BY id ASC';
		}
		database::getInstance() -> prepareRequete($requete);
		if (is_array($id) || $id > -1) {
			database::getInstance() -> bind($id);
		}
		if (! database::getInstance() -> executeRequete()) {
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table decor_utilise');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		
	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Decor_utilise2]*/	/*[/TAG-Decor_utilise2]*/

		/* Traitement des donnees */
		foreach ($datas AS $data) {
			/* objet par defaut */
			$listeObjet[] = new Decor_utilise($data['id'],$data['nom'],$data['description'],$data['chemin'],$data['modificateur_vision'],$data['date_creation'],$data['date_modification'],$data['dimension'],$data['camp'],$data['carte'],$data['tile'],$data['coordonnees']);
		
	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getFromTableDecor_utilise1]*/	/*[/TAG-getFromTableDecor_utilise1]*/

		}
		if (!empty($listeObjet) && sizeof($listeObjet) == 1) {
			$listeObjet = $listeObjet[0];
		}
		return $listeObjet;
	}

	public static function getFromExtTableDimension($dimension=0) {
		//Generated by FactoryGenerator::generateGetFromTableFromFK()
		$listeObjet = array();
		// Lancement de la requete
		$requete = 'SELECT * FROM `decor_utilise` ';
		if ($dimension == 0) {
			$requete .= 'WHERE dimension > 0 ORDER BY id ASC';
		} else {
			$requete .= 'WHERE dimension = :dimension ORDER BY id ASC';
			//Il faut que le parametre soit dans un array pour le BIND
			$dimension = array(':dimension' => $dimension);
		}
		database::getInstance() -> prepareRequete($requete);
		if (is_array($dimension) || $dimension > 0) {
			database::getInstance() -> bind($dimension);
		}
		if (! database::getInstance() -> executeRequete()) {
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table decor_utilise');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		// Traitement des donnees
		foreach ($datas AS $data) {
			$listeObjet[] = new Decor_utilise($data['id'],$data['nom'],$data['description'],$data['chemin'],$data['modificateur_vision'],$data['date_creation'],$data['date_modification'],$data['dimension'],$data['camp'],$data['carte'],$data['tile'],$data['coordonnees']);
		}
		if (sizeof($listeObjet) == 1) {
			$listeObjet = $listeObjet[0];
		}
		return $listeObjet;
	}

	public static function getFromExtTableCamp($camp=0) {
		//Generated by FactoryGenerator::generateGetFromTableFromFK()
		$listeObjet = array();
		// Lancement de la requete
		$requete = 'SELECT * FROM `decor_utilise` ';
		if ($camp == 0) {
			$requete .= 'WHERE camp > 0 ORDER BY id ASC';
		} else {
			$requete .= 'WHERE camp = :camp ORDER BY id ASC';
			//Il faut que le parametre soit dans un array pour le BIND
			$camp = array(':camp' => $camp);
		}
		database::getInstance() -> prepareRequete($requete);
		if (is_array($camp) || $camp > 0) {
			database::getInstance() -> bind($camp);
		}
		if (! database::getInstance() -> executeRequete()) {
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table decor_utilise');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		// Traitement des donnees
		foreach ($datas AS $data) {
			$listeObjet[] = new Decor_utilise($data['id'],$data['nom'],$data['description'],$data['chemin'],$data['modificateur_vision'],$data['date_creation'],$data['date_modification'],$data['dimension'],$data['camp'],$data['carte'],$data['tile'],$data['coordonnees']);
		}
		if (sizeof($listeObjet) == 1) {
			$listeObjet = $listeObjet[0];
		}
		return $listeObjet;
	}

	public static function getFromExtTableCarte($carte=0) {
		//Generated by FactoryGenerator::generateGetFromTableFromFK()
		$listeObjet = array();
		// Lancement de la requete
		$requete = 'SELECT * FROM `decor_utilise` ';
		if ($carte == 0) {
			$requete .= 'WHERE carte > 0 ORDER BY id ASC';
		} else {
			$requete .= 'WHERE carte = :carte ORDER BY id ASC';
			//Il faut que le parametre soit dans un array pour le BIND
			$carte = array(':carte' => $carte);
		}
		database::getInstance() -> prepareRequete($requete);
		if (is_array($carte) || $carte > 0) {
			database::getInstance() -> bind($carte);
		}
		if (! database::getInstance() -> executeRequete()) {
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table decor_utilise');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		// Traitement des donnees
		foreach ($datas AS $data) {
			$listeObjet[] = new Decor_utilise($data['id'],$data['nom'],$data['description'],$data['chemin'],$data['modificateur_vision'],$data['date_creation'],$data['date_modification'],$data['dimension'],$data['camp'],$data['carte'],$data['tile'],$data['coordonnees']);
		}
		if (sizeof($listeObjet) == 1) {
			$listeObjet = $listeObjet[0];
		}
		return $listeObjet;
	}

	public static function getFromExtTableTile($tile=0) {
		//Generated by FactoryGenerator::generateGetFromTableFromFK()
		$listeObjet = array();
		// Lancement de la requete
		$requete = 'SELECT * FROM `decor_utilise` ';
		if ($tile == 0) {
			$requete .= 'WHERE tile > 0 ORDER BY id ASC';
		} else {
			$requete .= 'WHERE tile = :tile ORDER BY id ASC';
			//Il faut que le parametre soit dans un array pour le BIND
			$tile = array(':tile' => $tile);
		}
		database::getInstance() -> prepareRequete($requete);
		if (is_array($tile) || $tile > 0) {
			database::getInstance() -> bind($tile);
		}
		if (! database::getInstance() -> executeRequete()) {
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table decor_utilise');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		// Traitement des donnees
		foreach ($datas AS $data) {
			$listeObjet[] = new Decor_utilise($data['id'],$data['nom'],$data['description'],$data['chemin'],$data['modificateur_vision'],$data['date_creation'],$data['date_modification'],$data['dimension'],$data['camp'],$data['carte'],$data['tile'],$data['coordonnees']);
		}
		if (sizeof($listeObjet) == 1) {
			$listeObjet = $listeObjet[0];
		}
		return $listeObjet;
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Decor_utilise21]*/	/*[/TAG-Decor_utilise21]*/


}
?>