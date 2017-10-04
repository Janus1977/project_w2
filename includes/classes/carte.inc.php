<?php
/**
 * Fichier d'inclusion utilise par le script de mise a jour de la base de donnees
 */
	if ($_POST['action'] == 'insertion') {
		//////////////////////////////
		// INSERTION NOUVELLE CARTE //
		//////////////////////////////
		$oCarte = ManagerCarte::getInstance()->getCarteByName($_POST['nom']);
		if (!empty($oCarte)) {
			throw new Exception('Une carte de nom <i>'.$_POST['nom'].'</i> existe d&eacute;j&agrave;.');
		}
		/* Creation d'un objet vide Carte */
		$oCarte = ManagerCarte::getInstance()->getCarteVide();
			
		/* Renseignement de l'objet */
		$oCarte->setNom($_POST['nom']);
		$oCarte->setIddimension(intval($_POST['idDimension']));
		$oCarte->setEdition(1);
			
		/* Sauvegarde de l'objet Carte */
		if (!ManagerCarte::getInstance()->save($oCarte)) {
			//trace
			//alerte utilisateur
			alerte("Impossible d'ins&eacute;rer la nouvelle Carte, alertez l'administrateur du site.");
			//l'exception
			throw new Exception("Insertion Carte: Erreur Insertion Carte");
		}
			
		/* Gestion des cases */
		$_POST['table'] = 'case';
		// 					$oCarte = ManagerCarte::getInstance()->getCarteByName($_POST['nom']);
		$oDimension = ManagerDimension::getInstance()->getById($oCarte->getIddimension());
		for ($x=1; $x<=$oDimension->getLargeur(); $x++) {
			for ($y=1; $y<=$oDimension->getLongueur(); $y++) {
				/* Creation d'un objet vide Case */
				$oCase = ManagerTile::getInstance()->getCaseVide();
				/* Renseignement de l'objet */
				$oCase->setX($x);
				$oCase->setY($y);
				$oCase->setIdcarte($oCarte->getId());
				$oCase->setVision(1);
				$oCase->setIdunite(0);
				$oCase->setIdunitejoueur(0);
				$oCase->setIddecor(0);
				$oCase->setEtatCase(0);
				$oCase->setBloque(0);
					
				/* Affectation en base */
				if (!ManagerTile::getInstance()->save($oCase)) {
					//trace
					//alerte utilisateur
					alerte("Impossible de modifier la Case ID ".$oCase->getId().", alertez l'administrateur du site.");
					//l'exception
					throw new Exception("Insertion Carte: Erreur modification Case");
				}
			}
		}
		informe('Cr&eacute;ation de la carte et de ses cases r&eacute;ussie.');
	} else if ($_POST['action'] == 'modification') {
		//////////////////////////////
		// MODIFICATION D'UNE CARTE //
		//////////////////////////////
		$oCarte = ManagerCarte::getInstance()->getById(intval($_POST['idCarte']));
		$methode = 'set'.ucfirst($_POST['nomChamp']);
		$oCarte->$methode($_POST['valeurChamp']);
// 		$oCarte->setNom($_POST['nomCarte']);
// 		$oCarte->setApercu($_POST['appercuCarte']);
// 		$oCarte->setEdition($_POST['editionCarte']);
		if (!ManagerCarte::getInstance()->update($oCarte)) {
			//trace
			//alerte utilisateur
			alerte("Impossible de modifier la Carte ID ".$oCarte->getId().", alertez l'administrateur du site.");
			//l'exception
			throw new Exception("Modification Carte: Erreur modification Carte");
		}
	} else if ($_POST['action'] == 'suppression') {
		/////////////////////////////
		// SUPPRESSION D'UNE CARTE //
		/////////////////////////////
		/* les unites sur les cases doivent sortir */
		if (!ManagerUnite::getInstance()->setUnitsOutOfGameFromMapId(intval($_POST['id']))) {
			//trace
			//alerte utilisateur
			alerte("Impossible de modifier la Carte ID ".intval($_POST['id']).", alertez l'administrateur du site.");
			//l'exception
			throw new Exception("Suppression Carte: Erreur modification Unite");
		}
		if (!ManagerUnite_joueur::getInstance()->setUnitsOutOfGame(intval($_POST['id']))){
			//trace
			//alerte utilisateur
			alerte("Impossible de modifier la Carte ID ".intval($_POST['id']).", alertez l'administrateur du site.");
			//l'exception
			throw new Exception("Suppression Carte: Erreur modification Unite joueur");
		}
		/* les equipements sur les cases doivent sortir */
		if (ManagerEquipement::getInstance()->setEquipmentsOutOfGame(intval($_POST['id']))) {
			//trace
			//alerte utilisateur
			alerte("Impossible de modifier la Carte ID ".intval($_POST['id']).", alertez l'administrateur du site.");
			//l'exception
			throw new Exception("Suppression Carte: Erreur modification Equipement");
		}
		if (!ManagerEquipement_joueur::getInstance()->setEquipmentsOutOfGame(intval($_POST['id']))) {
			//trace
			//alerte utilisateur
			alerte("Impossible de modifier la Carte ID ".intval($_POST['id']).", alertez l'administrateur du site.");
			//l'exception
			throw new Exception("Suppression Carte: Erreur modification Equipement joueur");
		}
		/* Suppression des cases de la carte */
		if (!ManagerTile::getInstance()->deleteAllFromCarte(intval($_POST['id']))) {
			//trace
			//alerte utilisateur
			alerte("Impossible de modifier la Carte ID ".intval($_POST['id']).", alertez l'administrateur du site.");
			//l'exception
			throw new Exception("Suppression Carte: Erreur suppression Cases");
		}
		/* Suppression de la carte */
		if (!ManagerCarte::getInstance()->delete(ManagerCarte::getInstance()->getById(intval($_POST['id'])))) {
			//trace
			//alerte utilisateur
			alerte("Impossible de modifier la Carte ID ".intval($_POST['id']).", alertez l'administrateur du site.");
			//l'exception
			throw new Exception("Suppression Carte: Erreur suppression Carte");
		}
	}
?>