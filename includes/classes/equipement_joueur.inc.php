<?php
	/*
	 * Passage des action en fonction pour l'integration dans la partie INVENTAIRE
	* qui les appellera
	*/
	function insere() {
		
	}
	
	function modifie() {
		
	}
	
	function clonage() {
		
	}
	
	function demonte() {
		
	}
	
	function repare() {
		
	}
	
	function supprime() {
		
	}
	if ($_POST['action'] == 'insertion') {
		/////////////////////////////////////////
		// INSERTION D'UN EQUIPEMENT DE JOUEUR //
		/////////////////////////////////////////
		$data = json_decode(html_entity_decode($_POST['data']),true);
		unset($data['formSubmitButton']);
		$data = json_encode($data);
		$oEquipement = ManagerEquipement_joueur::getInstance()->getEquipementVide();
		$oEquipement->encodeDecodeJSON($data);
		if (!ManagerEquipement::getInstance()->save($oEquipement)) {
			//OK fonctionne)
			//trace
			//alerte utilisateur
			alerte("Impossible d'ins&eacute;rer le nouvel &eacute;quipement '".$oEquipement->getNom()."', alertez l'administrateur du site.");
			//l'exception
			throw new Exception("Erreur insertion equipement");
		}
	} else if ($_POST['action'] == 'modification') {
		////////////////////////////////////////////
		// MODIFICATION D'UN EQUIPEMENT DE JOUEUR //
		////////////////////////////////////////////
		$data = json_decode(html_entity_decode($_POST['data']),true);
		unset($data['formSubmitButton']);
		$data = json_encode($data);
		$oEquipement = ManagerEquipement::getInstance()->getEquipementVide();
		$oEquipement->encodeDecodeJSON($data);
		if (!ManagerEquipement::getInstance()->update($oEquipement)) {
			//OK fonctionne
			//trace
			//alerte utilisateur
			alerte("Impossible de modifier l'&eacute;quipement ID ".$oEquipement->getId().", alertez l'administrateur du site.");
			//l'exception
			throw new Exception("Erreur modification equipement");
		}
	} else if ($_POST['action'] == 'reparation') {
		//////////////////////////////////////////
		// REPARATION D'UN EQUIPEMENT DE JOUEUR //
		//////////////////////////////////////////
		//1) quel type d'equipement (joueur ou non-joueur) ?
		if ($_POST['idJoueur'] > 0) {
			$oEquipement = ManagerEquipement_joueur::getInstance()->getById(intval($_POST['idObjet']));
		} else {
			$oEquipement = ManagerEquipement::getInstance()->getById(intval($_POST['idObjet']));
		}
		if ($_POST['instant'] === true) {
			$oEquipement->setDate_fin_reparation(traduitTimeStampDate(time()-1));
			//reparation de l'objet
			$oEquipement->setUsure(100);
		} else {
			$oEquipement->setDate_fin_reparation(calculeTempsReparation($oEquipement));
		}
		if ($_POST['idJoueur'] > 0) {
			if (!ManagerEquipement_joueur::getInstance()->update($oEquipement)) {
				//OK fonctionne
				//trace
				//alerte utilisateur
				alerte("Impossible de r&eacute;parer l'&eacute;quipement de joueur ID ".$oEquipement->getId().", alertez l'administrateur du site.");
				//l'exception
				throw new Exception("Erreur modification equipement joueur");
			}
		} else {
			if (!ManagerEquipement::getInstance()->update($oEquipement)) {
				//OK fonctionne
				//trace
				//alerte utilisateur
				alerte("Impossible de r&eacute;parer l'&eacute;quipement ID ".$oEquipement->getId().", alertez l'administrateur du site.");
				//l'exception
				throw new Exception("Erreur modification equipement");
			}
		}
	} else if ($_POST['action'] == 'demontage') {
		/////////////////////////////////////////
		// DEMONTAGE D'UN EQUIPEMENT GENERIQUE //
		/////////////////////////////////////////
		
		//il faut generer une matrice objet => objet(s) recupere(s)
		$resultatLancerDes = lanceDes2(array('1D6'));
		debug($resultatLancerDes);
		if ($resultatLancerDes >= 5) {
			//3 pieces
			informe("L'&eacute;quipement vous a fourni 3 pi&egrave;ces de rechange.");
		} else if ($resultatLancerDes >= 3 && $resultatLancerDes < 5) {
			//2 pieces
			informe("L'&eacute;quipement vous a fourni 2 pi&egrave;ces de rechange.");
		} else if ($resultatLancerDes >= 1 && $resultatLancerDes < 3) {
			//pas de demontage ce coup ci
			alerte("Pas de chance cette fois, l'&eacute;quipement fourni ne se d&eacute;monte pas.");
		}
		
	} else if ($_POST['action'] == 'suppression') {
			
	}
?>