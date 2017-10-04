<?php
	////////////////////////////////
	// GESTION DES CASES DE CARTE //
	////////////////////////////////
	/*
	 * Liste des valeurs possible du champ etatCase (cf config p-e a changer de fichier):
	 * 		- 0 => par defaut juste inseree => ROUGE
	 * 		- 1 => un plateau affecte => JAUNE
	 * 		- 2 => un plateau affecte et un decor affecte
	 * 		- 3 => un plateau affecte et une unite sur la case sans decor
	 * 		- 4 => un plateau affecte et une unite sur la case avec decor
	 * 		- 98 => lien entre case
	 * 		- 99 => bloquee
	 */
	if ($_POST['action'] == 'insertion') {
		//////////////////////////////////
		// INSERTION DES CASES DE CARTE //
		//////////////////////////////////
		/*
		 * Pour le moment l'insertion de case est couplee a une nouvelle carte
		*/
	} else if ($_POST['action'] == 'modification') {
		//////////////////////////////////
		// INSERTION DES CASES DE CARTE //
		//////////////////////////////////
		if ($_POST['type'] == 'case') {
			/* Cas d'une case isolee */
			/* Creation de l'objet a modifier */
			$oCase = ManagerTile::getInstance()->getById(intval($_POST['id']));
	
			if (isset($_POST['nomChamp']) && $_POST['nomChamp'] == 'etatCase') {
				//ICI C'EST L'OPTION SUPPRIME CASE LIANTE (en on la retire des liens possibles)
				if (isset($_POST['valeurChamp']) && $_POST['valeurChamp'] == 0) {
					/* Suppression d'un lien entre deux cases */
					/****************************************/
					/*    Affectation de nouvel etatCase    */
					/****************************************/
					if ($oCase->getIddecor() > 0) {
						if ($oCase->getUnite() > 0) {
							//Plateau + decor + unite
							$oCase->setEtatCase(4);
						} else {
							//Plateau + decor
							$oCase->setEtatCase(2);
						}
					} else {
						if ($oCase->getUnite() > 0) {
							//Plateau + unite
							$oCase->setEtatCase(3);
						} else {
							//Plateau uniquement
							$oCase->setEtatCase(1);
						}
					}
					$oCase->setTile(0);
					$oCase->setEtatCase(0);
				} else if (isset($_POST['valeurChamp']) && $_POST['valeurChamp'] == 98) {
					/* Creation d'une case de lien */
					$oCase->setEtatCase(98);
				}
			} else if (isset($_POST['nomChamp']) && $_POST['nomChamp'] == 'tile') {
				if (intval($_POST['valeurChamp']) == 0) {
					/****************************************/
					/* suppression de lien entre deux cases */
					/* les deux cases peuvent se lier a     */
					/* d'autres cases                       */
					/****************************************/
					$oCase->supprimeLienEntreCases();
	
					$oCaseLiee = ManagerTile::getInstance()->getById(intval($_POST['idCaseLiee']));
					$oCaseLiee->supprimeLienEntreCases();
				} else {
					/*************************************/
					/* creation de lien entre deux cases */
					/*************************************/
					/* Affectation de la liaison à la case source */
					$oCase->setIdtile(intval($_POST['valeurChamp']));
	
					/* meme chose pour la case cible */
					$oCaseLiee = ManagerTile::getInstance()->getById(intval($_POST['valeurChamp']));
					$oCaseLiee->setIdtile($oCase->getId());
				}
				/* Affectation en base */
				if (!ManagerTile::getInstance()->update($oCaseLiee)) {
					//trace
					//alerte utilisateur
					alerte("Impossible de modifier la case ID '".$oCaseLiee->getId()."', alertez l'administrateur du site.");
					//l'exception
					throw new Exception("Modification Case: Erreur modification Case");
				}
			} else if (isset($_POST['nomChamp']) && $_POST['nomChamp'] == 'decor') {
			
				if (intval($_POST['valeurChamp']) == 0) {
					/************************************/
					/* suppression du decor sur la case */
					/************************************/
					$oCase->setDecor(0);
				} else {
					/*******************************/
					/* Ajout de decor sur une case */
					/*******************************/
					//1) quelle taille de decor?
					$oDecor = ManagerDecor::getInstance()->getById(intval($_POST['valeurChamp']));
					if ($oDecor->getDimensionObject()->getLargeur() > 1 &&
						$oDecor->getDimensionObject()->getLongueur() > 1) {
						//decor multi case
						// 1) mettre l'identifiant du decor sur la case qui le porte
						$oCase->setDecor(intval($_POST['valeurChamp']));
						$oCase->setEtatCase(2);
						// 2) chercher les cases recouvertes par le decor et changer leur etatCase => $oCase->setEtatCase(2);
						$listeCaseCouvertes = ManagerTile::getInstance()->getCasesCarteFromRange($oCase->getCarte(),$oCase->getX(),($oCase->getX() + ($oCase->getDecorObject()->getDimensionObject()->getLargeur() - 1)),$oCase->getY(),($oCase->getY() + ($oCase->getDecorObject()->getDimensionObject()->getLongueur() - 1)));
						foreach ($listeCaseCouvertes AS $oCaseCouvertes) {
							//modification de l'etat de la case
							$oCaseCouvertes->setEtatCase(2);
							//Sauvegarde
							if (!ManagerTile::getInstance()->update($oCaseCouvertes)) {
								//trace
								//alerte utilisateur
								alerte("Impossible de modifier la case ID '".$oCaseCouvertes->getId()."', alertez l'administrateur du site.");
								//l'exception
								throw new Exception("Modification Case: Erreur modification Case");
							}
						}
					} else {
						//decor mono case
						// Affectation de la liaison à la case source
						$oCase->setDecor(intval($_POST['valeurChamp']));
						$oCase->setEtatCase(2);
					}

					/* Affectation en base */
					if (!ManagerTile::getInstance()->update($oCase)) {
						//trace
						//alerte utilisateur
						alerte("Impossible de modifier la case ID '".$oCase->getId()."', alertez l'administrateur du site.");
						//l'exception
						throw new Exception("Modification Case: Erreur modification Case");
					}
				}
			} else if (isset($_POST['nomChamp']) && $_POST['nomChamp'] == 'unite') {
			
				if (intval($_POST['valeurChamp']) == 0) {
					/**************************************/
					/* suppression de l'unite sur la case */
					/**************************************/
					$oCase->setUnite(0);
				} else {
					/*********************************/
					/* Ajout de l'unite sur une case */
					/*********************************/
					//1) quelle taille de decor?
					$oUnite = ManagerUnite::getInstance()->getById(intval($_POST['valeurChamp']));
					if ($oUnite->getDimensionObject()->getLargeur() > 1 &&
						$oUnite->getDimensionObject()->getLongueur() > 1) {
						//decor multi case
						// 1) mettre l'identifiant du decor sur la case qui le porte
						$oCase->setUnite(intval($_POST['valeurChamp']));
						switch (intval($oCase->getEtatCase())) {
							case 1 : {
								$oCase->setEtatCase(3);
								break;
							}
							case 2 : {
								$oCase->setEtatCase(4);
								break;
							}
						}
						// 2) chercher les cases recouvertes par le decor et changer leur etatCase => $oCase->setEtatCase(2);
						$listeCaseCouvertes = ManagerTile::getInstance()->getCasesCarteFromRange($oCase->getCarte(),$oCase->getX(),($oCase->getX() + ($oCase->getUniteObject()->getDimensionObject()->getLargeur() - 1)),$oCase->getY(),($oCase->getY() + ($oCase->getUniteObject()->getDimensionObject()->getLongueur() - 1)));
						foreach ($listeCaseCouvertes AS $oCaseCouvertes) {
							//modification de l'etat de la case
							switch (intval($oCase->getEtatCase())) {
								case 1 : {
									$oCase->setEtatCase(3);
									break;
								}
								case 2 : {
									$oCase->setEtatCase(4);
									break;
								}
							}
							//Sauvegarde
							if (!ManagerTile::getInstance()->update($oCaseCouvertes)) {
								//trace
								//alerte utilisateur
								alerte("Impossible de modifier la case ID '".$oCaseCouvertes->getId()."', alertez l'administrateur du site.");
								//l'exception
								throw new Exception("Modification Case: Erreur modification Case");
							}
						}
					} else {
						//decor mono case
						// Affectation de la liaison à la case source
						$oCase->setDecor(intval($_POST['valeurChamp']));
						switch (intval($oCase->getEtatCase())) {
							case 1 : {
								$oCase->setEtatCase(3);
								break;
							}
							case 2 : {
								$oCase->setEtatCase(4);
								break;
							}
						}
					}

					/* Affectation en base */
					if (!ManagerTile::getInstance()->update($oCase)) {
						//trace
						//alerte utilisateur
						alerte("Impossible de modifier la case ID '".$oCase->getId()."', alertez l'administrateur du site.");
						//l'exception
						throw new Exception("Modification Case: Erreur modification Case");
					}
				}
			} else {
				/* Modification du/des attributs */
				$methode = 'set'.ucfirst($_POST['nomChamp']);
				$oCase->$methode($_POST['valeurChamp']);
			}
				
			/* Affectation en base */
			if (!ManagerTile::getInstance()->update($oCase)) {
				//trace
				//alerte utilisateur
				alerte("Impossible de modifier la case ID '".$oCase->getId()."', alertez l'administrateur du site.");
				//l'exception
				throw new Exception("Modification Case: Erreur modification Case");
			}
		} else if ($_POST['type'] == 'zone') {
			/* Cas d'une liste de cases */
			$xDebut = intval($_POST['xCentre']) - intval($_POST['rayon']);
			$xFin = intval($_POST['xCentre']) + intval($_POST['rayon']);
			$yDebut = intval($_POST['yCentre']) - intval($_POST['rayon']);
			$yFin = intval($_POST['yCentre']) + intval($_POST['rayon']);
	
			/* Creation de la liste d'objets a modifier */
			$aListeObjects = ManagerTile::getInstance()->getCasesCarteFromRange(intval($_POST['idCarte']),$xDebut,$xFin,$yDebut,$yFin);
			if ($_POST['effet'] == 'bloque') {
				$valeur = 1;
			} else if ($_POST['effet'] == 'debloque') {
				$_POST['effet'] = 'bloque';
				$valeur = 0;
			}
			$methode = 'set'.ucfirst($_POST['effet']);
	
			foreach ($aListeObjects AS $oCase) {
				/* Modification du/des attributs */
				$oCase->$methode($valeur);
	
				/* Affectation en base */
				if (!ManagerTile::getInstance()->update($oCase)) {
					//trace
					//alerte utilisateur
					alerte("Impossible de modifier la case ID '".$oCase->getId()."', alertez l'administrateur du site.");
					//l'exception
					throw new Exception("Modification Case: Erreur modification Case");
				}
			}
		}
	} else if ($_POST['action'] == 'suppression') {
		///////////////////////////////////
		// SUPRESSION DES CASES DE CARTE //
		///////////////////////////////////
		/* les unites sur les cases doivent sortir */
		if (!ManagerUnite::getInstance()->setUnitsOutOfCase(intval($_POST['id']))) {
			//trace
			//alerte utilisateur
			alerte("Impossible de modifier Unite de la case, alertez l'administrateur du site.");
			//l'exception
			throw new Exception("Suppression Case Carte: Erreur modification Unite");
		}
		if (!ManagerUnite_joueur::getInstance()->setUnitsOutOfCase(intval($_POST['id']))) {
			//trace
			//alerte utilisateur
			alerte("Impossible de modifier Unite joueur de la case, alertez l'administrateur du site.");
			//l'exception
			throw new Exception("Suppression Case Carte: Erreur modification Unite joueur");
		}
		/* les equipements sur les cases doivent sortir */
		if (!ManagerEquipement::getInstance()->setEquipmentsOutOfCase(intval($_POST['id']))) {
			//trace
			//alerte utilisateur
			alerte("Impossible de modifier Equipement de la case, alertez l'administrateur du site.");
			//l'exception
			throw new Exception("Suppression Case Carte: Erreur modification Equipement");
		}
		if (!ManagerEquipement_joueur::getInstance()->setEquipmentsOutOfCase(intval($_POST['id']))) {
			//trace
			//alerte utilisateur
			alerte("Impossible de modifier Equipement joueur de la case, alertez l'administrateur du site.");
			//l'exception
			throw new Exception("Suppression Case Carte: Erreur modification Equipement joueur");
		}
		/* Suppression des cases de la carte */
		if (!ManagerTile::getInstance()->delete(ManagerTile::getInstance()->getById(intval($_POST['id'])))) {
			//trace
			//alerte utilisateur
			alerte("Impossible de supprimer la case, alertez l'administrateur du site.");
			//l'exception
			throw new Exception("Suppression Case Carte: Erreur modification Case");
		}
	}
?>