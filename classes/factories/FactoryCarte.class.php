<?php
	/*
	 * AUTO-GENERATED FILE on 13/06/2017 12:53:19 BY FactoryGenerator.class.php
	 */

abstract class FactoryCarte {

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Carte11]*/	/*[/TAG-Carte11]*/


	public static function getFromTableCarte($id=-1) {
		//Generated by FactoryGenerator::generateGetAllFromTable() on 13/06/2017 12:53:19
		$listeObjet = array();
		// Lancement de la requete
		if (empty(self::$_requete)) {
			$requete = 'SELECT * FROM `carte`';
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
		debug($requete,true);
		if (! database::getInstance() -> executeRequete()) {
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table carte');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		
	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Carte2]*/	/*[/TAG-Carte2]*/

		/* Traitement des donnees */
		foreach ($datas AS $data) {
			/* objet par defaut */
			$listeObjet[] = new Carte($data['id'],$data['nom'],$data['dimension'],$data['apercu'],$data['edition']);
		
	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getFromTableCarte1]*/	/*[/TAG-getFromTableCarte1]*/

		}
		if (!empty($listeObjet) && sizeof($listeObjet) == 1) {
			$listeObjet = $listeObjet[0];
		}
		return $listeObjet;
	}

	public static function getFromExtTableDimension($dimension=0) {
		//Generated by FactoryGenerator::generateGetFromTableFromFK() on 13/06/2017 12:53:19
		$listeObjet = array();
		// Lancement de la requete
		$requete = 'SELECT * FROM `carte` ';
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
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table carte');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		// Traitement des donnees
		foreach ($datas AS $data) {
			$listeObjet[] = new Carte($data['id'],$data['nom'],$data['dimension'],$data['apercu'],$data['edition']);
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
	/*[TAG-Carte21]*/
	
	public static function getCarteByName($name) {
		$listeObjet = array();
		/* Lancement de la requete */
		$requete = 'SELECT * FROM carte WHERE nom = \''.$name.'\' ORDER BY id ASC';
		if (! database::getInstance() -> executeRequete($requete)) {
			throw new Exception('Impossible de lire la table carte');
		}
		/* Recuperation des donnees */
		$datas = database::getInstance() -> getTableauResultat();
		/* Traitement des donnees */
		foreach ($datas AS $data) {
			$listeObjet = new Carte($data['id'],$data['nom'],$data['dimension'],$data['apercu'],$data['edition']);
		}
		return $listeObjet;
	}
	
	
	public static function getCartesEnEdition() {
		$listeObjet = array();
		/* Lancement de la requete */
		$requete = 'SELECT * FROM carte WHERE edition = 1 ORDER BY id ASC';
		if (! database::getInstance() -> executeRequete($requete)) {
			throw new Exception('Impossible de lire la table carte');
		}
		/* Recuperation des donnees */
		$datas = database::getInstance() -> getTableauResultat();
		/* Traitement des donnees */
		foreach ($datas AS $data) {
			$listeObjet[] = new Carte($data['id'],$data['nom'],$data['dimension'],$data['apercu'],$data['edition']);
		}
		return $listeObjet;
	}
	
	public static function getCarteEnEdition($idCarte) {
		$listeObjet = array();
		/* Lancement de la requete */
		$requete = 'SELECT * FROM carte WHERE id = '.$idCarte;
		if (! database::getInstance() -> executeRequete($requete)) {
			throw new Exception('Impossible de lire la table carte');
		}
		/* Recuperation des donnees */
		$datas = database::getInstance() -> getTableauResultat();
		/* Traitement des donnees */
		foreach ($datas AS $data) {
			$listeObjet = new Carte($data['id'],$data['nom'],$data['dimension'],$data['apercu'],$data['edition']);
		}
		return $listeObjet;
	}
	
	public static function getCartesDisponibles() {
		$listeObjet = array();
		/* Lancement de la requete */
		$requete = 'SELECT * FROM carte WHERE edition = 0 ';
		if (! database::getInstance() -> executeRequete($requete)) {
			throw new Exception('Impossible de lire la table carte');
		}
		/* Recuperation des donnees */
		$datas = database::getInstance() -> getTableauResultat();
		/* Traitement des donnees */
		foreach ($datas AS $data) {
			$listeObjet[] = new Carte($data['id'],$data['nom'],$data['dimension'],$data['apercu'],$data['edition']);
		}
		return $listeObjet;
	}
	
	public static function getCarteVide() {
		return new Carte();
	}
	
	/*[/TAG-Carte21]*/


}
?>