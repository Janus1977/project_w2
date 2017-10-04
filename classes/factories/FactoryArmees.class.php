<?php
	/*
	 * AUTO-GENERATED FILE on 23/02/2017 14:20:58 BY FactoryGenerator.class.php
	 */

abstract class FactoryArmees {

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Armees11]*/	/*[/TAG-Armees11]*/


	public static function getFromTableArmees($id=-1) {
		//Generated by FactoryGenerator::generateGetAllFromTable()
		$listeObjet = array();
		// Lancement de la requete
		if (empty(self::$_requete)) {
			$requete = 'SELECT * FROM `armees`';
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
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table armees');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		
	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Armees2]*/	/*[/TAG-Armees2]*/

		/* Traitement des donnees */
		foreach ($datas AS $data) {
			/* objet par defaut */
			$listeObjet[] = new Armees($data['id'],$data['nom'],$data['description'],$data['idmembre'],$data['points'],$data['date_creation'],$data['date_modification']);
		
	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getFromTableArmees1]*/	/*[/TAG-getFromTableArmees1]*/

		}
		if (!empty($listeObjet) && sizeof($listeObjet) == 1) {
			$listeObjet = $listeObjet[0];
		}
		return $listeObjet;
	}

	public static function getFromExtTableIdmembre($idmembre=0) {
		//Generated by FactoryGenerator::generateGetFromTableFromFK()
		$listeObjet = array();
		// Lancement de la requete
		$requete = 'SELECT * FROM `armees` ';
		if ($idmembre == 0) {
			$requete .= 'WHERE idmembre > 0 ORDER BY id ASC';
		} else {
			$requete .= 'WHERE idmembre = :idmembre ORDER BY id ASC';
			//Il faut que le parametre soit dans un array pour le BIND
			$idmembre = array(':idmembre' => $idmembre);
		}
		database::getInstance() -> prepareRequete($requete);
		if (is_array($idmembre) || $idmembre > 0) {
			database::getInstance() -> bind($idmembre);
		}
		if (! database::getInstance() -> executeRequete()) {
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table armees');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		// Traitement des donnees
		foreach ($datas AS $data) {
			$listeObjet[] = new Armees($data['id'],$data['nom'],$data['description'],$data['idmembre'],$data['points'],$data['date_creation'],$data['date_modification']);
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
	/*[TAG-Armees21]*/	/*[/TAG-Armees21]*/


}
?>