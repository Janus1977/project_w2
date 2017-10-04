<?php
	/*
	 * Passage des action en fonction pour l'integration dans la partie INVENTAIRE
	* qui les appellera
	*/
	function insere($data) {
		$oEquipement = ManagerEquipement::getInstance()->getEquipementVide();
		$oEquipement->encodeDecodeJSON($data);
		if (!ManagerEquipement::getInstance()->save($oEquipement)) {
			//OK fonctionne)
			//trace
			//alerte utilisateur
			alerte("Impossible d'ins&eacute;rer le nouvel &eacute;quipement '".$oEquipement->getNom()."', alertez l'administrateur du site.");
			//l'exception
			throw new Exception("Erreur insertion equipement");
		}
		echo true;
	}
	
	function modifie($data) {
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
		echo true;
	}
	
	function clonage($id) {
		$oEquipement = clone (ManagerEquipement::getInstance()->getById($id));
		if (!ManagerEquipement::getInstance()->save($oEquipement)) {
			//OK fonctionne)
			//trace
			//alerte utilisateur
			alerte("Impossible d'ins&eacute;rer le nouvel &eacute;quipement '".$oEquipement->getNom()."', alertez l'administrateur du site.");
			//l'exception
			throw new Exception("Erreur insertion equipement");
		}
		echo true;
	}
	
	function demonte() {
		
	}
	
	function repare($data) {
		//1) quel type d'equipement (joueur ou non-joueur) ?
		$oEquipement = ManagerEquipement::getInstance()->getById(intval($data['idObjet']));
		if ($data['instant'] === true) {
			$oEquipement->setDate_fin_reparation(traduitTimeStampDate(time()-1));
			//reparation de l'objet
			$oEquipement->setUsure(100);
		} else {
			$oEquipement->setDate_fin_reparation(calculeTempsReparation($oEquipement));
		}
		if (!ManagerEquipement::getInstance()->update($oEquipement)) {
			//OK fonctionne
			//trace
			//alerte utilisateur
			alerte("Impossible de r&eacute;parer l'&eacute;quipement ID ".$oEquipement->getId().", alertez l'administrateur du site.");
			//l'exception
			throw new Exception("Erreur modification equipement");
		}
	}
	
	function supprime($data) {
		//on fait un echo du resultat de la methode true/false
		if (!ManagerEquipement::getInstance()->delete(ManagerEquipement::getInstance()->getById(intval($data['id'])))) {
			throw new PDOException(basename(__FILE__).": Erreur sur suppression equipement (ID ".intval($data['id']).")");
		}
		echo true;
	}
	
	if ($_POST['action'] == 'insertion') {
		/////////////////////////////////////////
		// INSERTION D'UN EQUIPEMENT GENERIQUE //
		/////////////////////////////////////////
		$data = json_decode(html_entity_decode($_POST['data']),true);
		unset($data['formSubmitButton']);
		insere(json_encode($data));
	} else if ($_POST['action'] == 'clonage') {
		///////////////////////////////////////
		// CLONAGE D'UN EQUIPEMENT GENERIQUE //
		///////////////////////////////////////
		clonage(intval($_POST['id']));
	}  else if ($_POST['action'] == 'modification') {		 
		////////////////////////////////////////////
		// MODIFICATION D'UN EQUIPEMENT GENERIQUE //
		////////////////////////////////////////////
		$data = json_decode(html_entity_decode($_POST['data']),true);
		unset($data['formSubmitButton']);
		modifie(json_encode($data));
	} else if ($_POST['action'] == 'reparation') {
		//////////////////////////////////////////
		// REPARATION D'UN EQUIPEMENT GENERIQUE //
		//////////////////////////////////////////
		repare($_POST);
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
		supprime($_POST);
	}
?>