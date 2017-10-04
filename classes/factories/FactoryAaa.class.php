<?php
	/*
	 * AUTO-GENERATED FILE on 23/02/2017 14:20:57 BY FactoryGenerator.class.php
	 */

abstract class FactoryAaa {

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Aaa11]*/	/*[/TAG-Aaa11]*/


	public static function getFromTableAaa($id=-1) {
		//Generated by FactoryGenerator::generateGetAllFromTable()
		$listeObjet = array();
		// Lancement de la requete
		if (empty(self::$_requete)) {
			$requete = 'SELECT * FROM `aaa`';
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
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table aaa');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		
	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Aaa2]*/	/*[/TAG-Aaa2]*/

		/* Traitement des donnees */
		foreach ($datas AS $data) {
			/* objet par defaut */
			$listeObjet[] = new Aaa($data['tpe'],$data['sme'],$data['mme'],$data['e'],$data['bge'],$data['dec'],$data['flt'],$data['dbl'],$data['bool'],$data['eumer']);
		
	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getFromTableAaa1]*/	/*[/TAG-getFromTableAaa1]*/

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
	/*[TAG-Aaa21]*/	/*[/TAG-Aaa21]*/


}
?>