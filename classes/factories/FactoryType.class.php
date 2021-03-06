<?php
	/*
	 * AUTO-GENERATED FILE on 23/02/2017 14:20:59 BY FactoryGenerator.class.php
	 */

abstract class FactoryType {

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Type11]*/	/*[/TAG-Type11]*/


	public static function getFromTableType($id=-1) {
		//Generated by FactoryGenerator::generateGetAllFromTable()
		$listeObjet = array();
		// Lancement de la requete
		if (empty(self::$_requete)) {
			$requete = 'SELECT * FROM `type`';
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
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table type');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		
	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Type2]*/	/*[/TAG-Type2]*/

		/* Traitement des donnees */
		foreach ($datas AS $data) {
			/* objet par defaut */
			$listeObjet[] = new Type($data['id'],$data['nom'],$data['description']);
		
	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getFromTableType1]*/	/*[/TAG-getFromTableType1]*/

		}
		if (!empty($listeObjet) && sizeof($listeObjet) == 1) {
			$listeObjet = $listeObjet[0];
		}
		return $listeObjet;
	}


	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Type21]*/
	
	public static function getFromTableTypeByName($typeName='') {
		$listeObjet = array();
		/* Lancement de la requete */
		if (empty(self::$_requete)) {
			$requete = 'SELECT * FROM type WHERE nom = \''.$typeName.'\'';
		} else {
			$requete = self::$_requete.' WHERE nom = \''.$typeName.'\'';
		}
		if (! database::getInstance() -> executeRequete($requete)) {
			throw new Exception('Impossible de lire la table type');
		}
		/* Recuperation des donnees */
		$datas = database::getInstance() -> getTableauResultat();
		/* Traitement des donnees */
		foreach ($datas AS $data) {
			/* objet par defaut */
			$listeObjet[] = new Type($data['id'],$data['nom'],$data['description']);
		}
		if (!empty($listeObjet) && !empty($typeName)) {
			$listeObjet = $listeObjet[0];
		}
		return $listeObjet;
	}
	
	/*[/TAG-Type21]*/


}
?>