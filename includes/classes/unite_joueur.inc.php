<?php
/**
 * Fichier d'inclusion utilise par le script de mise a jour de la base de donnees
 */
	if ($_POST['action'] == 'insertion' || $_POST['action'] == 'clonage') {
		/////////////////////////////////////
		// INSERTION NOUVELLE UNITE_JOUEUR //
		/////////////////////////////////////
		if ($_POST['action'] == 'insertion') {
			//on supprime les elements inutiles de $_POST
			unset($_POST['action']);
			//encodage pour envoie vers l'objet afin de remplir ce dernier
 			$oUniteJoueur = ManagerUnite_joueur::getInstance()->getUniteJoueurVide();
 			$oUniteJoueur->encodeDecodeJSON(json_encode($_POST));
		} else if ($_POST['action'] == 'clonage') {
			$oUniteJoueur = clone (ManagerUnite_joueur::getInstance()->getById(intval($_POST['id'])));
		}
		/* Sauvegarde de l'objet Unite */
		if (!ManagerUnite_joueur::getInstance()->save($oUniteJoueur)) {
			//trace
			//alerte utilisateur
			//alerte("Impossible d'ins&eacute;rer la nouvelle Unite, alertez l'administrateur du site.");
			//l'exception trapee par le retour AJAX pour affichage
			throw new Exception(basename(__FILE__).": Erreur, impossible d'ins&eacute;rer la nouvelle Unit&eacute; de joueur");
		}
		echo true;
// 		echo database::getInstance()->getLastInsertID();
	} else if ($_POST['action'] == 'modification') {
		/////////////////////////////////////
		// MODIFICATION D'UNE UNITE_JOUEUR //
		/////////////////////////////////////
		unset($_POST['action']);
 		$oUniteJoueur = ManagerUnite_joueur::getInstance()->getUniteJoueurVide();
 		$oUniteJoueur->encodeDecodeJSON(json_encode($_POST));
		/* mise a jour de l'objet Unite_joueur */
		if (!ManagerUnite_joueur::getInstance()->update($oUniteJoueur)) {
			//trace
			//alerte utilisateur
				//alerte("Impossible de modifier l'Unite, alertez l'administrateur du site.");
				//l'exception trapee par le retour AJAX pour affichage
				throw new PDOException(basename(__FILE__).": Erreur,impossible de modifier l'unit&eacute; de joueur (ID ".$oUniteJoueur->getId()." IDJOUEUR ".$oUniteJoueur->getMembre().")");
		}
		echo $oUniteJoueur->getId();
	} else if ($_POST['action'] == 'suppression') {
		////////////////////////////////////
		// SUPPRESSION D'UNE UNITE_JOUEUR //
		////////////////////////////////////
		//on fait un echo du resultat de la methode true/false
		if (!ManagerUnite_joueur::getInstance()->delete(ManagerUnite_joueur::getInstance()->getById(intval($_POST['id'])))) {
			throw new PDOException(basename(__FILE__).": Erreur sur suppression unit&eacute; de joueur (ID ".intval($_POST['id']).")");
		}
		echo true;
	}
?>