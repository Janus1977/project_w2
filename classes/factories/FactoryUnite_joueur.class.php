<?php
	/*
	 * AUTO-GENERATED FILE on 06/06/2017 11:24:56 BY FactoryGenerator.class.php
	 */

abstract class FactoryUnite_joueur {

	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Unite_joueur11]*/	/*[/TAG-Unite_joueur11]*/


	public static function getFromTableUnite_joueur($id=-1) {
		//Generated by FactoryGenerator::generateGetAllFromTable() on 06/06/2017 11:24:56
		$listeObjet = array();
		// Lancement de la requete
		if (empty(self::$_requete)) {
			$requete = 'SELECT * FROM `unite_joueur`';
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
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table unite_joueur');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		
	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-Unite_joueur2]*/	/*[/TAG-Unite_joueur2]*/

		/* Traitement des donnees */
		foreach ($datas AS $data) {
			/* objet par defaut */
			$listeObjet[] = new Unite_joueur($data['id'],$data['membre'],$data['nom'],$data['description'],$data['def_av'],$data['def_ar'],$data['def_g'],$data['def_d'],$data['mouvement'],$data['experience'],$data['equipementarmegauche'],$data['equipementarmedroite'],$data['equipementarmure'],$data['equipementcoiffe'],$data['equipementetendart'],$data['toucher'],$data['initiative'],$data['sauvegarde'],$data['endurance'],$data['cac'],$data['fo'],$data['attaque'],$data['intell'],$data['ty'],$data['capacite'],$data['pilote'],$data['co_pilote'],$data['cout'],$data['date_creation'],$data['tile'],$data['camp'],$data['chemin'],$data['dimension'],$data['aattaquecetour'],$data['sestdeplacecetour'],$data['achargecetour'],$data['pdv'],$data['ingame']);
		
	/*
	 * Entre ces deux balises vous pourrez mettre votre code specifique a la classe.
	 * Il sera preserve lors de la reconstruction automatique.
	 */
	/*[TAG-getFromTableUnite_joueur1]*/	/*[/TAG-getFromTableUnite_joueur1]*/

		}
		if (!empty($listeObjet) && sizeof($listeObjet) == 1) {
			$listeObjet = $listeObjet[0];
		}
		return $listeObjet;
	}

	public static function getFromExtTableMembre($membre=0) {
		//Generated by FactoryGenerator::generateGetFromTableFromFK() on 06/06/2017 11:24:56
		$listeObjet = array();
		// Lancement de la requete
		$requete = 'SELECT * FROM `unite_joueur` ';
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
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table unite_joueur');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		// Traitement des donnees
		foreach ($datas AS $data) {
			$listeObjet[] = new Unite_joueur($data['id'],$data['membre'],$data['nom'],$data['description'],$data['def_av'],$data['def_ar'],$data['def_g'],$data['def_d'],$data['mouvement'],$data['experience'],$data['equipementarmegauche'],$data['equipementarmedroite'],$data['equipementarmure'],$data['equipementcoiffe'],$data['equipementetendart'],$data['toucher'],$data['initiative'],$data['sauvegarde'],$data['endurance'],$data['cac'],$data['fo'],$data['attaque'],$data['intell'],$data['ty'],$data['capacite'],$data['pilote'],$data['co_pilote'],$data['cout'],$data['date_creation'],$data['tile'],$data['camp'],$data['chemin'],$data['dimension'],$data['aattaquecetour'],$data['sestdeplacecetour'],$data['achargecetour'],$data['pdv'],$data['ingame']);
		}
		if (sizeof($listeObjet) == 1) {
			$listeObjet = $listeObjet[0];
		}
		return $listeObjet;
	}

	public static function getFromExtTableEquipementarmegauche($equipementarmegauche=0) {
		//Generated by FactoryGenerator::generateGetFromTableFromFK() on 06/06/2017 11:24:56
		$listeObjet = array();
		// Lancement de la requete
		$requete = 'SELECT * FROM `unite_joueur` ';
		if ($equipementarmegauche == 0) {
			$requete .= 'WHERE equipementarmegauche > 0 ORDER BY id ASC';
		} else {
			$requete .= 'WHERE equipementarmegauche = :equipementarmegauche ORDER BY id ASC';
			//Il faut que le parametre soit dans un array pour le BIND
			$equipementarmegauche = array(':equipementarmegauche' => $equipementarmegauche);
		}
		database::getInstance() -> prepareRequete($requete);
		if (is_array($equipementarmegauche) || $equipementarmegauche > 0) {
			database::getInstance() -> bind($equipementarmegauche);
		}
		if (! database::getInstance() -> executeRequete()) {
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table unite_joueur');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		// Traitement des donnees
		foreach ($datas AS $data) {
			$listeObjet[] = new Unite_joueur($data['id'],$data['membre'],$data['nom'],$data['description'],$data['def_av'],$data['def_ar'],$data['def_g'],$data['def_d'],$data['mouvement'],$data['experience'],$data['equipementarmegauche'],$data['equipementarmedroite'],$data['equipementarmure'],$data['equipementcoiffe'],$data['equipementetendart'],$data['toucher'],$data['initiative'],$data['sauvegarde'],$data['endurance'],$data['cac'],$data['fo'],$data['attaque'],$data['intell'],$data['ty'],$data['capacite'],$data['pilote'],$data['co_pilote'],$data['cout'],$data['date_creation'],$data['tile'],$data['camp'],$data['chemin'],$data['dimension'],$data['aattaquecetour'],$data['sestdeplacecetour'],$data['achargecetour'],$data['pdv'],$data['ingame']);
		}
		if (sizeof($listeObjet) == 1) {
			$listeObjet = $listeObjet[0];
		}
		return $listeObjet;
	}

	public static function getFromExtTableEquipementarmedroite($equipementarmedroite=0) {
		//Generated by FactoryGenerator::generateGetFromTableFromFK() on 06/06/2017 11:24:56
		$listeObjet = array();
		// Lancement de la requete
		$requete = 'SELECT * FROM `unite_joueur` ';
		if ($equipementarmedroite == 0) {
			$requete .= 'WHERE equipementarmedroite > 0 ORDER BY id ASC';
		} else {
			$requete .= 'WHERE equipementarmedroite = :equipementarmedroite ORDER BY id ASC';
			//Il faut que le parametre soit dans un array pour le BIND
			$equipementarmedroite = array(':equipementarmedroite' => $equipementarmedroite);
		}
		database::getInstance() -> prepareRequete($requete);
		if (is_array($equipementarmedroite) || $equipementarmedroite > 0) {
			database::getInstance() -> bind($equipementarmedroite);
		}
		if (! database::getInstance() -> executeRequete()) {
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table unite_joueur');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		// Traitement des donnees
		foreach ($datas AS $data) {
			$listeObjet[] = new Unite_joueur($data['id'],$data['membre'],$data['nom'],$data['description'],$data['def_av'],$data['def_ar'],$data['def_g'],$data['def_d'],$data['mouvement'],$data['experience'],$data['equipementarmegauche'],$data['equipementarmedroite'],$data['equipementarmure'],$data['equipementcoiffe'],$data['equipementetendart'],$data['toucher'],$data['initiative'],$data['sauvegarde'],$data['endurance'],$data['cac'],$data['fo'],$data['attaque'],$data['intell'],$data['ty'],$data['capacite'],$data['pilote'],$data['co_pilote'],$data['cout'],$data['date_creation'],$data['tile'],$data['camp'],$data['chemin'],$data['dimension'],$data['aattaquecetour'],$data['sestdeplacecetour'],$data['achargecetour'],$data['pdv'],$data['ingame']);
		}
		if (sizeof($listeObjet) == 1) {
			$listeObjet = $listeObjet[0];
		}
		return $listeObjet;
	}

	public static function getFromExtTableEquipementarmure($equipementarmure=0) {
		//Generated by FactoryGenerator::generateGetFromTableFromFK() on 06/06/2017 11:24:56
		$listeObjet = array();
		// Lancement de la requete
		$requete = 'SELECT * FROM `unite_joueur` ';
		if ($equipementarmure == 0) {
			$requete .= 'WHERE equipementarmure > 0 ORDER BY id ASC';
		} else {
			$requete .= 'WHERE equipementarmure = :equipementarmure ORDER BY id ASC';
			//Il faut que le parametre soit dans un array pour le BIND
			$equipementarmure = array(':equipementarmure' => $equipementarmure);
		}
		database::getInstance() -> prepareRequete($requete);
		if (is_array($equipementarmure) || $equipementarmure > 0) {
			database::getInstance() -> bind($equipementarmure);
		}
		if (! database::getInstance() -> executeRequete()) {
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table unite_joueur');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		// Traitement des donnees
		foreach ($datas AS $data) {
			$listeObjet[] = new Unite_joueur($data['id'],$data['membre'],$data['nom'],$data['description'],$data['def_av'],$data['def_ar'],$data['def_g'],$data['def_d'],$data['mouvement'],$data['experience'],$data['equipementarmegauche'],$data['equipementarmedroite'],$data['equipementarmure'],$data['equipementcoiffe'],$data['equipementetendart'],$data['toucher'],$data['initiative'],$data['sauvegarde'],$data['endurance'],$data['cac'],$data['fo'],$data['attaque'],$data['intell'],$data['ty'],$data['capacite'],$data['pilote'],$data['co_pilote'],$data['cout'],$data['date_creation'],$data['tile'],$data['camp'],$data['chemin'],$data['dimension'],$data['aattaquecetour'],$data['sestdeplacecetour'],$data['achargecetour'],$data['pdv'],$data['ingame']);
		}
		if (sizeof($listeObjet) == 1) {
			$listeObjet = $listeObjet[0];
		}
		return $listeObjet;
	}

	public static function getFromExtTableEquipementcoiffe($equipementcoiffe=0) {
		//Generated by FactoryGenerator::generateGetFromTableFromFK() on 06/06/2017 11:24:56
		$listeObjet = array();
		// Lancement de la requete
		$requete = 'SELECT * FROM `unite_joueur` ';
		if ($equipementcoiffe == 0) {
			$requete .= 'WHERE equipementcoiffe > 0 ORDER BY id ASC';
		} else {
			$requete .= 'WHERE equipementcoiffe = :equipementcoiffe ORDER BY id ASC';
			//Il faut que le parametre soit dans un array pour le BIND
			$equipementcoiffe = array(':equipementcoiffe' => $equipementcoiffe);
		}
		database::getInstance() -> prepareRequete($requete);
		if (is_array($equipementcoiffe) || $equipementcoiffe > 0) {
			database::getInstance() -> bind($equipementcoiffe);
		}
		if (! database::getInstance() -> executeRequete()) {
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table unite_joueur');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		// Traitement des donnees
		foreach ($datas AS $data) {
			$listeObjet[] = new Unite_joueur($data['id'],$data['membre'],$data['nom'],$data['description'],$data['def_av'],$data['def_ar'],$data['def_g'],$data['def_d'],$data['mouvement'],$data['experience'],$data['equipementarmegauche'],$data['equipementarmedroite'],$data['equipementarmure'],$data['equipementcoiffe'],$data['equipementetendart'],$data['toucher'],$data['initiative'],$data['sauvegarde'],$data['endurance'],$data['cac'],$data['fo'],$data['attaque'],$data['intell'],$data['ty'],$data['capacite'],$data['pilote'],$data['co_pilote'],$data['cout'],$data['date_creation'],$data['tile'],$data['camp'],$data['chemin'],$data['dimension'],$data['aattaquecetour'],$data['sestdeplacecetour'],$data['achargecetour'],$data['pdv'],$data['ingame']);
		}
		if (sizeof($listeObjet) == 1) {
			$listeObjet = $listeObjet[0];
		}
		return $listeObjet;
	}

	public static function getFromExtTableEquipementetendart($equipementetendart=0) {
		//Generated by FactoryGenerator::generateGetFromTableFromFK() on 06/06/2017 11:24:56
		$listeObjet = array();
		// Lancement de la requete
		$requete = 'SELECT * FROM `unite_joueur` ';
		if ($equipementetendart == 0) {
			$requete .= 'WHERE equipementetendart > 0 ORDER BY id ASC';
		} else {
			$requete .= 'WHERE equipementetendart = :equipementetendart ORDER BY id ASC';
			//Il faut que le parametre soit dans un array pour le BIND
			$equipementetendart = array(':equipementetendart' => $equipementetendart);
		}
		database::getInstance() -> prepareRequete($requete);
		if (is_array($equipementetendart) || $equipementetendart > 0) {
			database::getInstance() -> bind($equipementetendart);
		}
		if (! database::getInstance() -> executeRequete()) {
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table unite_joueur');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		// Traitement des donnees
		foreach ($datas AS $data) {
			$listeObjet[] = new Unite_joueur($data['id'],$data['membre'],$data['nom'],$data['description'],$data['def_av'],$data['def_ar'],$data['def_g'],$data['def_d'],$data['mouvement'],$data['experience'],$data['equipementarmegauche'],$data['equipementarmedroite'],$data['equipementarmure'],$data['equipementcoiffe'],$data['equipementetendart'],$data['toucher'],$data['initiative'],$data['sauvegarde'],$data['endurance'],$data['cac'],$data['fo'],$data['attaque'],$data['intell'],$data['ty'],$data['capacite'],$data['pilote'],$data['co_pilote'],$data['cout'],$data['date_creation'],$data['tile'],$data['camp'],$data['chemin'],$data['dimension'],$data['aattaquecetour'],$data['sestdeplacecetour'],$data['achargecetour'],$data['pdv'],$data['ingame']);
		}
		if (sizeof($listeObjet) == 1) {
			$listeObjet = $listeObjet[0];
		}
		return $listeObjet;
	}

	public static function getFromExtTableTile($tile=0) {
		//Generated by FactoryGenerator::generateGetFromTableFromFK() on 06/06/2017 11:24:56
		$listeObjet = array();
		// Lancement de la requete
		$requete = 'SELECT * FROM `unite_joueur` ';
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
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table unite_joueur');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		// Traitement des donnees
		foreach ($datas AS $data) {
			$listeObjet[] = new Unite_joueur($data['id'],$data['membre'],$data['nom'],$data['description'],$data['def_av'],$data['def_ar'],$data['def_g'],$data['def_d'],$data['mouvement'],$data['experience'],$data['equipementarmegauche'],$data['equipementarmedroite'],$data['equipementarmure'],$data['equipementcoiffe'],$data['equipementetendart'],$data['toucher'],$data['initiative'],$data['sauvegarde'],$data['endurance'],$data['cac'],$data['fo'],$data['attaque'],$data['intell'],$data['ty'],$data['capacite'],$data['pilote'],$data['co_pilote'],$data['cout'],$data['date_creation'],$data['tile'],$data['camp'],$data['chemin'],$data['dimension'],$data['aattaquecetour'],$data['sestdeplacecetour'],$data['achargecetour'],$data['pdv'],$data['ingame']);
		}
		if (sizeof($listeObjet) == 1) {
			$listeObjet = $listeObjet[0];
		}
		return $listeObjet;
	}

	public static function getFromExtTableCamp($camp=0) {
		//Generated by FactoryGenerator::generateGetFromTableFromFK() on 06/06/2017 11:24:56
		$listeObjet = array();
		// Lancement de la requete
		$requete = 'SELECT * FROM `unite_joueur` ';
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
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table unite_joueur');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		// Traitement des donnees
		foreach ($datas AS $data) {
			$listeObjet[] = new Unite_joueur($data['id'],$data['membre'],$data['nom'],$data['description'],$data['def_av'],$data['def_ar'],$data['def_g'],$data['def_d'],$data['mouvement'],$data['experience'],$data['equipementarmegauche'],$data['equipementarmedroite'],$data['equipementarmure'],$data['equipementcoiffe'],$data['equipementetendart'],$data['toucher'],$data['initiative'],$data['sauvegarde'],$data['endurance'],$data['cac'],$data['fo'],$data['attaque'],$data['intell'],$data['ty'],$data['capacite'],$data['pilote'],$data['co_pilote'],$data['cout'],$data['date_creation'],$data['tile'],$data['camp'],$data['chemin'],$data['dimension'],$data['aattaquecetour'],$data['sestdeplacecetour'],$data['achargecetour'],$data['pdv'],$data['ingame']);
		}
		if (sizeof($listeObjet) == 1) {
			$listeObjet = $listeObjet[0];
		}
		return $listeObjet;
	}

	public static function getFromExtTableDimension($dimension=0) {
		//Generated by FactoryGenerator::generateGetFromTableFromFK() on 06/06/2017 11:24:56
		$listeObjet = array();
		// Lancement de la requete
		$requete = 'SELECT * FROM `unite_joueur` ';
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
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table unite_joueur');
		}
		// Recuperation des donnees
		$datas = database::getInstance() -> getTableauResultat();
		// Traitement des donnees
		foreach ($datas AS $data) {
			$listeObjet[] = new Unite_joueur($data['id'],$data['membre'],$data['nom'],$data['description'],$data['def_av'],$data['def_ar'],$data['def_g'],$data['def_d'],$data['mouvement'],$data['experience'],$data['equipementarmegauche'],$data['equipementarmedroite'],$data['equipementarmure'],$data['equipementcoiffe'],$data['equipementetendart'],$data['toucher'],$data['initiative'],$data['sauvegarde'],$data['endurance'],$data['cac'],$data['fo'],$data['attaque'],$data['intell'],$data['ty'],$data['capacite'],$data['pilote'],$data['co_pilote'],$data['cout'],$data['date_creation'],$data['tile'],$data['camp'],$data['chemin'],$data['dimension'],$data['aattaquecetour'],$data['sestdeplacecetour'],$data['achargecetour'],$data['pdv'],$data['ingame']);
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
	/*[TAG-Unite_joueur21]*/
	
	public static function getListeUnitesParJoueur() {
		$listeObjet = array();
		$requete = "SELECT m.pseudo,uj.id,uj.nom ";
		$requete .= "FROM unite_joueur uj LEFT JOIN membre m ";
		$requete .= "ON m.id = uj.membre";
		if (database::getInstance()->executeRequete($requete)) {
			$data = database::getInstance()->getTableauResultat();
			foreach ($data AS $data) {
				$listeObjet[$data['pseudo']][] = array('id' => $data['id'],'nom' => $data['nom']);
			}
			return $listeObjet;
		} else {
			throw new Exception(__CLASS__.'::'.__FUNCTION__.'(): Impossible de lire la table membre / unite_joueur');
		}
	}
	/*[/TAG-Unite_joueur21]*/


}
?>