<?php
/**
 * Fichier d'inclusion utilise par le script de mise a jour de la base de donnees
 * Plusieurs actions possible via l'inventaire
 * 	- ajouter un(des) equipement(s) => sans suppression dans la liste source
 *  - transferer un(des) equipement(s) => avec suppression dans la liste source
 */
	/*
	 * Structure $_POST:
	 * Array
	 * (
	 *    [table] => inventaire
	 *    [action] => clonage				//Type d'envoie
	 *    [idProprio] => 245				//identifiant proprio
	 *    [tableFrom] => equipement			//Table source
	 *    [tableTo] => equipement_joueur	//Table cible
	 *    [data] => 1,2,...,n				//Liste des identifiant a envoyer dans la table cible
	 * )
	 * 
	 */

	
	$aIdEquipementSource = explode(",",$_POST['data']);
	
	if (!strpos($_POST['tableFrom'], 'joueur')) {
		//partie gerant l'admin, inventaire source == equipement
		//Dans cette partie il s'agit de cloner l'objet vers sa destination
		//l'equipement est envoye vers quel inventaire ?
		if (!strpos($_POST['tableTo'], 'joueur')) {
			/////////////////////////////////////////////
			// INSERTION ADMIN VERS L'INVENTAIRE UNITE //
			/////////////////////////////////////////////
			//partie gerant inventaire admin => unite
			foreach ($aIdEquipementSource AS $IdEquipementSource) {
				//1) clonage de l'equipement
				$oEquipement = clone (ManagerEquipement::getInstance()->getById($IdEquipementSource));
				debug($oEquipement);
				//2) reaffectation à l'unite
				// /!\ Cette affectation est "fictive" car elle passe par l'inventaire /!\
// 				$oEquipement->setUnite(intval($_POST['idProprio']));
				
				//3) insertion dans la table equipement
				if (!ManagerEquipement::getInstance()->save($oEquipement)) {
					//OK fonctionne)
					//trace
					//alerte utilisateur
// 					alerte("Impossible d'ins&eacute;rer le nouvel &eacute;quipement '".$oEquipement->getNom()."', alertez l'administrateur du site.");
					//l'exception
					throw new Exception("Impossible d'ins&eacute;rer le nouvel &eacute;quipement '".$oEquipement->getNom()."', alertez l'administrateur du site.");
				}
				
				//4)insertion dans la table inventaire
				$oInventaire = ManagerInventaire::getInstance()->getInventaireVide();
				$oInventaire->setEquipement(database::getInstance()->getLastInsertID());
				$oInventaire->setUnite(intval($_POST['idProprio']));
				debug($oInventaire);
				if (!ManagerInventaire::getInstance()->save($oInventaire)) {
					//OK fonctionne)
					//trace
					//alerte utilisateur
// 					alerte("Impossible d'ins&eacute;rer le nouvel inventaire, alertez l'administrateur du site.");
					//l'exception
					throw new Exception("Impossible d'ins&eacute;rer le nouvel inventaire, alertez l'administrateur du site."); //ICI
				}
			}
		} else {
			//////////////////////////////////////////////
			// INSERTION ADMIN VERS L'INVENTAIRE JOUEUR //
			//////////////////////////////////////////////
			//partie gerant inventaire admin => joueur / unite_joueur
// 			require_once('equipement_joueur.inc.php');
			foreach ($aIdEquipementSource AS $IdEquipementSource) {
				//1) clonage de l'equipement
				$oEquipement = clone (ManagerEquipement::getInstance()->getById($IdEquipementSource));

				//2) reaffectation au joueur
				$oEquipement_joueur = ManagerEquipement_joueur::getInstance()->getEquipement_joueurVide();
				$oEquipement_joueur->encodeDecodeJSON($oEquipement->encodeDecodeJSON());
				$oEquipement_joueur->setMembre(intval($_POST['idProprio']));
				
				//3) insertion dans la table equipement
				if (!ManagerEquipement_joueur::getInstance()->save($oEquipement_joueur)) {
					//OK fonctionne)
					//trace
					//alerte utilisateur
// 					alerte("Impossible d'ins&eacute;rer le nouvel &eacute;quipement '".$oEquipement->getNom()."', alertez l'administrateur du site.");
					//l'exception
					throw new Exception("Impossible d'ins&eacute;rer le nouvel &eacute;quipement '".$oEquipement_joueur->getNom()."', alertez l'administrateur du site.");
				}
				
				//4)insertion dans la table inventaire
				$oInventaire = ManagerInventaire::getInstance()->getInventaireVide();
				$oInventaire->setEquipement_joueur(database::getInstance()->getLastInsertID());
				$oInventaire->setMembre(intval($_POST['idProprio']));
				
				if (!ManagerInventaire::getInstance()->save($oInventaire)) {
					//OK fonctionne)
					//trace
					//alerte utilisateur
// 					alerte("Impossible d'ins&eacute;rer le nouvel inventaire, alertez l'administrateur du site.");
					//l'exception
					throw new Exception("Impossible d'ins&eacute;rer le nouvel inventaire, alertez l'administrateur du site."); //ICI
				}
			}
		}
	} else {
		////////////////////////////////////////////////////////
		// INSERTION DU JOUEUR VERS L'INVENTAIRE UNITE JOUEUR //
		////////////////////////////////////////////////////////
		//partie gerant inventaire joueur vers autre
		//Dans cette partie il s'agit de renseigner seulement l'onventaire car
		//le champ UNITE dans la table concerne l'equipement PORTE
// 		require_once('equipement_joueur.inc.php');
		foreach ($aIdEquipementSource AS $IdEquipementSource) {
			//1) clonage de l'equipement
// 			$oEquipement_joueur = clone (ManagerEquipement_joueur::getInstance()->getById($IdEquipementSource));

			//2) reaffectation a l'unite
			// /!\ Cette affectation est "fictive" car elle passe par l'inventaire /!\
				
			//3) insertion dans la table equipement
// 			if (!ManagerEquipement_joueur::getInstance()->save($oEquipement_joueur)) {
// 				//OK fonctionne)
// 				//trace
// 				//alerte utilisateur
// // 				alerte("Impossible d'ins&eacute;rer le nouvel &eacute;quipement '".$oEquipement->getNom()."', alertez l'administrateur du site.");
// 				//l'exception
// 				throw new Exception("Impossible d'ins&eacute;rer le nouvel &eacute;quipement '".$oEquipement_joueur->getNom()."', alertez l'administrateur du site.");
// 			}
				
			//4)insertion dans la table inventaire
			$oInventaire = ManagerInventaire::getInstance()->getFromExtTableEquipement_joueur();
			$oInventaire->setEquipement_joueur(database::getInstance()->getLastInsertID());
			$oInventaire->setMembre(intval($_POST['idProprio']));
			debug($oInventaire);
			if (!ManagerInventaire::getInstance()->save($oInventaire)) {
				//OK fonctionne)
				//trace
				//alerte utilisateur
// 				alerte("Impossible d'ins&eacute;rer le nouvel inventaire, alertez l'administrateur du site.");
				//l'exception
				throw new Exception("Impossible d'ins&eacute;rer le nouvel inventaire, alertez l'administrateur du site."); //ICI
			}
		}
	}