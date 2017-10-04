<?php
/**
 * Fichier d'inclusion utilise par le script de mise a jour de la base de donnees
 */
	if ($_POST['action'] == 'insertion' || $_POST['action'] == 'clonage') {
		//////////////////////////////
		// INSERTION NOUVELLE UNITE //
		//////////////////////////////
		if ($_POST['action'] == 'insertion') {
			//on supprime les elements inutiles de $_POST
			unset($_POST['action']);
			//encodage pour envoie vers l'objet afin de remplir ce dernier
 			$oUnite = ManagerUnite::getInstance()->getUniteVide();
 			$oUnite->encodeDecodeJSON(json_encode($_POST));
		} else if ($_POST['action'] == 'clonage') {
			$oUnite = clone (ManagerUnite::getInstance()->getById(intval($_POST['id'])));
		}
		/* Sauvegarde de l'objet Unite */
		if (!ManagerUnite::getInstance()->save($oUnite)) {
			//trace
			//alerte utilisateur
			//alerte("Impossible d'ins&eacute;rer la nouvelle Unite, alertez l'administrateur du site.");
			//l'exception trapee par le retour AJAX pour affichage
			throw new Exception(basename(__FILE__).": Erreur, impossible d'ins&eacute;rer la nouvelle Unit&eacute;");
		}
		//on renvoie l'ID attribue
		echo true;
// 		echo database::getInstance()->getLastInsertID();
	} else if ($_POST['action'] == 'modification') {
			unset($_POST['action']);
 			$oUnite = ManagerUnite::getInstance()->getById(intval($_POST['id']));
 			$oUnite->encodeDecodeJSON(json_encode($_POST));
			/* Sauvegarde de l'objet Unite */
			if (!ManagerUnite::getInstance()->update($oUnite)) {
				//trace
				//alerte utilisateur
				//alerte("Impossible de modifier l'Unite, alertez l'administrateur du site.");
				//l'exception trapee par le retour AJAX pour affichage
				throw new PDOException(basename(__FILE__).": Erreur,impossible de modifier l'unit&eacute; (ID ".intval($_POST['id']).")");
			}
			echo $oUnite->getId();
	} else if ($_POST['action'] == 'suppression') {
		/////////////////////////////
		// SUPPRESSION D'UNE UNITE //
		/////////////////////////////
		//on fait un echo du resultat de la methode true/false
		 if (!ManagerUnite::getInstance()->delete(ManagerUnite::getInstance()->getById(intval($_POST['id'])))) {
		 	throw new PDOException(basename(__FILE__).": Erreur sur suppression unit&eacute; (ID ".$oUnite->getId().")");
		 }
		 echo true;
	}
?>