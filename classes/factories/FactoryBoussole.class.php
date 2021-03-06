<?php
	/*
	 * AUTO-GENERATED FILE on 23/02/2017 14:20:58 BY FactoryGenerator.class.php
	 */

abstract class FactoryBoussole {

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Boussole11]*/	/*[/TAG-Boussole11]*/


	public static function getFromTableBoussole($id=-1) {
		//Generated by FactoryGenerator::generateGetAllFromTable()
		$listeObjet = array();
		// Lancement de la requete
		if (empty(self::$_requete)) {
			$requete = 'SELECT * FROM `boussole`';
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
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table boussole');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		
	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Boussole2]*/	/*[/TAG-Boussole2]*/

		/* Traitement des donnees */
		foreach ($datas AS $data) {
			/* objet par defaut */
			$listeObjet[] = new Boussole($data['id'],$data['orientation']);
		
	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getFromTableBoussole1]*/	/*[/TAG-getFromTableBoussole1]*/

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
	/*[TAG-Boussole21]*/	/*[/TAG-Boussole21]*/


}
?>