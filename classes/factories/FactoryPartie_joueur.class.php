<?php
	/*
	 * AUTO-GENERATED FILE on 12/05/2017 15:43:03 BY FactoryGenerator.class.php
	 */

abstract class FactoryPartie_joueur {

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Partie_joueur11]*/	/*[/TAG-Partie_joueur11]*/


	public static function getFromTablePartie_joueur($id=-1) {
		//Generated by FactoryGenerator::generateGetAllFromTable() on 12/05/2017 15:43:03
		$listeObjet = array();
		// Lancement de la requete
		if (empty(self::$_requete)) {
			$requete = 'SELECT * FROM `partie_joueur`';
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
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table partie_joueur');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		
	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Partie_joueur2]*/	/*[/TAG-Partie_joueur2]*/

		/* Traitement des donnees */
		foreach ($datas AS $data) {
			/* objet par defaut */
			$listeObjet[] = new Partie_joueur($data['id'],$data['partie'],$data['membre'],$data['ia']);
		
	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getFromTablePartie_joueur1]*/	/*[/TAG-getFromTablePartie_joueur1]*/

		}
		if (!empty($listeObjet) && sizeof($listeObjet) == 1) {
			$listeObjet = $listeObjet[0];
		}
		return $listeObjet;
	}

	public static function getFromExtTablePartie($partie=0) {
		//Generated by FactoryGenerator::generateGetFromTableFromFK() on 12/05/2017 15:43:03
		$listeObjet = array();
		// Lancement de la requete
		$requete = 'SELECT * FROM `partie_joueur` ';
		if ($partie == 0) {
			$requete .= 'WHERE partie > 0 ORDER BY id ASC';
		} else {
			$requete .= 'WHERE partie = :partie ORDER BY id ASC';
			//Il faut que le parametre soit dans un array pour le BIND
			$partie = array(':partie' => $partie);
		}
		database::getInstance() -> prepareRequete($requete);
		if (is_array($partie) || $partie > 0) {
			database::getInstance() -> bind($partie);
		}
		if (! database::getInstance() -> executeRequete()) {
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table partie_joueur');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		// Traitement des donnees
		foreach ($datas AS $data) {
			$listeObjet[] = new Partie_joueur($data['id'],$data['partie'],$data['membre'],$data['ia']);
		}
		if (sizeof($listeObjet) == 1) {
			$listeObjet = $listeObjet[0];
		}
		return $listeObjet;
	}

	public static function getFromExtTableMembre($membre=0) {
		//Generated by FactoryGenerator::generateGetFromTableFromFK() on 12/05/2017 15:43:03
		$listeObjet = array();
		// Lancement de la requete
		$requete = 'SELECT * FROM `partie_joueur` ';
		if ($membre == 0) {
			$requete .= 'WHERE membre > 0 ORDER BY id ASC';
		} else {
			$requete .= 'WHERE membre = :membre ORDER BY id ASC';
			//Il faut que le parametre soit dans un array pour le BIND
			$membre = array(':membre' => $membre);
		}
		database::getInstance() -> prepareRequete($requete);
		if (is_array($membre) || $membre > 0) {
			database::getInstance() -> bind($membre);
		}
		if (! database::getInstance() -> executeRequete()) {
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table partie_joueur');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		// Traitement des donnees
		foreach ($datas AS $data) {
			$listeObjet[] = new Partie_joueur($data['id'],$data['partie'],$data['membre'],$data['ia']);
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
	/*[TAG-Partie_joueur21]*/	/*[/TAG-Partie_joueur21]*/


}
?>