<?php
	///////////////////////////////////
	// GESTION DES PLATEAUX DE CARTE //
	///////////////////////////////////
	if ($_POST['action'] == 'insertion') {
		////////////////////////////////////////
		// INSERTION DES PLATEAUX D'UNE CARTE //
		////////////////////////////////////////
		$oPlateau = ManagerPlateau::getInstance()->getById(intval($_POST['idPlateau']));
		$oCarte = ManagerCarte::getInstance()->getById(intval($_POST['idCarte']));
		$oCaseInit = ManagerTile::getInstance()->getById(intval($_POST['idCase']));
		if ($oPlateau->getNb_cases_x() > $oCarte->getNb_cases_x()) {
			alerte('Erreur: le plateau est plus grand que l\'aire de jeu en abscisse (X).');
		} else {
			if ($oPlateau->getNb_cases_y() > $oCarte->getNb_cases_y()) {
				alerte('Erreur: le plateau est plus grand que l\'aire de jeu en ordonn&eacute;es (Y).');
			} else {
				/* Bonnes dimensions */
				/* Comme on clique la case "haut-gauche" du plateau,
				 * il faut voir si bous n'avons pas de colision ailleurs
				*/
				$aCases = ManagerTile::getInstance()
				->getCasesCarteFromRange($oCarte->getId(),
						$oCaseInit->getX(),
						($oCaseInit->getX() + $oPlateau->getNb_cases_x()),
						$oCaseInit->getY(),
						($oCaseInit->getY() + $oPlateau->getNb_cases_y()));
				$collision = false;
				foreach ($aCases AS $oCase) {
					if ($oCase->getEtatCase() > 0) {
						alerte('Erreur: le plateau est en collision avec un autre.');
						$collision = true;
						break;
					}
				}
					
				/* si une collision a ete detectee => sortie */
				if ($collision === true) {
					alerte('Collision d&eacute;tect&eacute;e, sortie sans placer le plateau.');
				} else {
					/* Objet vide CartePlateau a renseigner */
					$oCartePlateau = ManagerCarteplateaux::getInstance()->getCartePlateauVide();
					$oCartePlateau->setIdcarte($oCarte->getId());
					$oCartePlateau->setIdplateau($oPlateau->getId());
					$oCartePlateau->setX($oCaseInit->getX());
					$oCartePlateau->setY($oCaseInit->getY());
	
					/* Sauvegarde nouvelle entree CartePlateau*/
					if (!ManagerCarteplateaux::getInstance()->save($oCartePlateau)) {
						//trace
						//alerte utilisateur
						alerte("Impossible de modifier cartePlateau ID '".$oCartePlateau->getId()."', alertez l'administrateur du site.");
						//l'exception
						throw new Exception("Insertion Plateau Carte: Erreur modification CartePlateau");
					}
	
					/* Modification de la liste des cases impliquees */
					foreach ($aCases AS $oCase) {
						$oCase->setEtatCase(1);
						if (!ManagerTile::getInstance()->update($oCase)) {
							//trace
							//alerte utilisateur
							alerte("Impossible de modifier la case ID '".$oCase->getId()."', alertez l'administrateur du site.");
							//l'exception
							throw new Exception("Insertion Plateau Carte: Erreur modification Case");
						}
					}
				}
			}
		}
	} else if ($_POST['action'] == 'modification') {
		///////////////////////////////////////////
		// MODIFICATION DES PLATEAUX D'UNE CARTE //
		///////////////////////////////////////////
		$oCartePlateau = ManagerCarteplateaux::getInstance()->getById(intval($_POST['idCartePlateau']));
		$oCartePlateau->setIdcarte(intval($_POSt['idCarte']));
		$oCartePlateau->setIdplateau(intval($_POSt['idPlateau']));
		$oCartePlateau->setX(intval($_POST['x']));
		$oCartePlateau->setY(intval($_POST['y']));
		if (!ManagerCarteplateaux::getInstance()->update($oCartePlateau)) {
			//trace
			//alerte utilisateur
			alerte("Impossible de modifier cartePlateau ID '".$oCartePlateau->getId()."', alertez l'administrateur du site.");
			//l'exception
			throw new Exception("Modification Plateau Carte: Erreur modification CartePlateau");
		}
	} else if ($_POST['action'] == 'suppression') {
		/////////////////////////////////////////
		// SUPRESSION DES PLATEAUX D'UNE CARTE //
		/////////////////////////////////////////
		$oCartePlateau = ManagerCarteplateaux::getInstance()->getById(intval($_POST['idCartePlateau']));
		//1) maj des cases occupees par le plateau
		$aCases = ManagerTile::getInstance()
		->getCasesCarteFromRange($oCartePlateau->getIdcarte(),
				$oCartePlateau->getX(),
				intval($oCartePlateau->getX() + $oCartePlateau->getPlateau()->getNb_cases_x()),
				$oCartePlateau->getY(),
				intval($oCartePlateau->getY() + $oCartePlateau->getPlateau()->getNb_cases_y()));
		foreach ($aCases AS $oCase) {
			/* modification des attributs */
			$oCase->setEtatCase(0);
	
			/* Mise a jour en base */
			if(!ManagerTile::getInstance()->update($oCase)) {
				//trace
				//alerte utilisateur
				alerte("Impossible de modifier la case ID '".$oCase->getId()."', alertez l'administrateur du site.");
				//l'exception
				throw new Exception("Suppression Plateau Carte: Erreur modification Case");
			}
		}
		$aCases = array();
			
		/* Suppression du lien plateau <=> Carte */
		if (! ManagerCarteplateaux::getInstance()->delete($oCartePlateau)) {
			//trace
			//alerte utilisateur
			alerte("Impossible de supprimer le plateau de la carte '".$oCartePlateau->getPlateau()."', alertez l'administrateur du site.");
			//l'exception
			throw new Exception("Suppression Plateau Carte: Erreur suppression Carte Plateau");
		} else {
	
		}
	}
?>