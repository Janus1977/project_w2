<?php
	/*
	 * AUTO-GENERATED FILE on 23/02/2017 14:20:58 BY FactoryGenerator.class.php
	 */

abstract class FactoryCarteplateaux {

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Carteplateaux11]*/	/*[/TAG-Carteplateaux11]*/


	public static function getFromTableCarteplateaux($id=-1) {
		//Generated by FactoryGenerator::generateGetAllFromTable()
		$listeObjet = array();
		// Lancement de la requete
		if (empty(self::$_requete)) {
			$requete = 'SELECT * FROM `carteplateaux`';
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
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table carteplateaux');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		
	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Carteplateaux2]*/	/*[/TAG-Carteplateaux2]*/

		/* Traitement des donnees */
		foreach ($datas AS $data) {
			/* objet par defaut */
			$listeObjet[] = new Carteplateaux($data['id'],$data['carte'],$data['plateau'],$data['x'],$data['y']);
		
	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getFromTableCarteplateaux1]*/	/*[/TAG-getFromTableCarteplateaux1]*/

		}
		if (!empty($listeObjet) && sizeof($listeObjet) == 1) {
			$listeObjet = $listeObjet[0];
		}
		return $listeObjet;
	}

	public static function getFromExtTableCarte($carte=0) {
		//Generated by FactoryGenerator::generateGetFromTableFromFK()
		$listeObjet = array();
		// Lancement de la requete
		$requete = 'SELECT * FROM `carteplateaux` ';
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
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table carteplateaux');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		// Traitement des donnees
		foreach ($datas AS $data) {
			$listeObjet[] = new Carteplateaux($data['id'],$data['carte'],$data['plateau'],$data['x'],$data['y']);
		}
		if (sizeof($listeObjet) == 1) {
			$listeObjet = $listeObjet[0];
		}
		return $listeObjet;
	}

	public static function getFromExtTablePlateau($plateau=0) {
		//Generated by FactoryGenerator::generateGetFromTableFromFK()
		$listeObjet = array();
		// Lancement de la requete
		$requete = 'SELECT * FROM `carteplateaux` ';
		if ($plateau == 0) {
			$requete .= 'WHERE plateau > 0 ORDER BY id ASC';
		} else {
			$requete .= 'WHERE plateau = :plateau ORDER BY id ASC';
			//Il faut que le parametre soit dans un array pour le BIND
			$plateau = array(':plateau' => $plateau);
		}
		database::getInstance() -> prepareRequete($requete);
		if (is_array($plateau) || $plateau > 0) {
			database::getInstance() -> bind($plateau);
		}
		if (! database::getInstance() -> executeRequete()) {
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table carteplateaux');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		// Traitement des donnees
		foreach ($datas AS $data) {
			$listeObjet[] = new Carteplateaux($data['id'],$data['carte'],$data['plateau'],$data['x'],$data['y']);
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
	/*[TAG-Carteplateaux21]*/


	public static function getCartePlateauxVide() {
		return new Carteplateaux();
	}
	
	/*[/TAG-Carteplateaux21]*/


}
?>