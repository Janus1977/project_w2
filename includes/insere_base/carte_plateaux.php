<?php
	/**
	 * Script d'insertion dans la table carte_plateaux
	 */
	/*
	 * INSERTION D'UN NOUVEAU PLATEAU DE JEU A LA CARTE
	 */
	/* 1) Recherche du chemin de l'image pour connaitre ses dimensions (en cases) */
	$cheminImage = searchFile(_DIR_IMGS_PLATEAUX_,$_GET['nomImage']);
	list($largeur_px,$hauteur_px) = getimagesize($cheminImage);
	$largeurCasesPlateau = floor($largeur_px / _TAILLE_CASE_X_);
	$hauteurCasesPlateau = floor($hauteur_px / _TAILLE_CASE_Y_);
	
	/* 2) recherche de la carte pour connaitre ses dimensions */
	$requete = "SELECT * FROM carte_edit WHERE id = ".intval($_GET['idcarte']);
	if (!$oPdo->executeRequete($requete)) {
		/* ERREUR */
		alerte('Erreur MAJ <i>plateaux_carte</i> sur la requete:<br/>'.$requete);
	} else {
		/* La carte */
		$data = $oPdo->getTableauResultat();
		$idCarte = $data[0]['id'];
		$nomCarte = $data[0]['nom'];
		$nbCasesX = $data[0]['nb_cases_x'];
		$nbCasesY = $data[0]['nb_cases_y'];
		if ($largeurCasesPlateau > $nbCasesX || $hauteurCasesPlateau > $nbCasesY) {
			/* Le plateau depasse le plateau de jeu */
			alerte('Erreur: le plateau est plus grand que l\'aire de jeu.');
		} else {
			/* recherche de la case */
			$oManagerCase = managerCasesCarte::getInstance();
			$oManagerCase->setConnexion(database::getInstance());
			$oCase = managerCasesCarte::getInstance()->getByID(intval($_GET['idcase']));

			if (($largeurCasesPlateau + $oCase->getX()) > $nbCasesX) {
				/* le plateau depasse en X*/
				alerte('Erreur: le plateau est plus grand que l\'aire de jeu en abscisse (X).');
			} else {
				if (($hauteurCasesPlateau + $oCase->getY()) > $nbCasesY) {
					/* le plateau depasse en Y*/
					alerte('Erreur: le plateau est plus grand que l\'aire de jeu en ordonn&eacute;es (Y).');
				} else {
					/* Recherche d'une eventuelle colision avec la case selectionnee */
					$requete = "SELECT COUNT(*) AS nb_plateau_sur_case FROM carte_plateaux WHERE id = ".intval($_GET['idcase']);
					if (!$oPdo->executeRequete($requete)) {
						alerte('Erreur recherche <i>carte_plateaux</i> sur la requete:<br/>'.$requete);
					} else {
						$data = $oPdo->getTableauResultat();

						if ($data[0]['nb_plateau_sur_case'] == 1) {
							/* deja occupee (devrait pas car desactivee mais securite) */
							alerte('Erreur case d&eacute;j&agrave; occup&eacute;e');
						} else {
							/* Recherche de collision avec la totalite du plateau ajoute */
							$xDebut = $oCase->getX();
							$xFin = $oCase->getX() + $largeurCasesPlateau;
							$yDebut = $oCase->getY();
							$yFin = $oCase->getY() + $hauteurCasesPlateau;
							
							$requete = "SELECT COUNT(*) nb_cases_collision FROM carte_plateaux ";
							$requete .= "WHERE idcarte = ".$idCarte." AND x >= ".$xDebut." AND x < ".$xFin." AND y >= ".$yDebut." AND y < ".$yFin;
							if (!$oPdo->executeRequete($requete)) {												
								alerte('Erreur recherche <i>carte_plateaux</i> sur la requete:<br/>'.$requete);
							} else {
								$data = $oPdo->getTableauResultat();
								if ($data[0]['nb_cases_collision'] > 0) {
									alerte('Erreur case(s) d&eacute;j&agrave; occup&eacute;e(s) par d\'autres plateaux de jeu');
								} else {
									/* Le plateau */
									$datas = explode(".",$_GET['nomImage']);
									
									/* Ajout du plateau a la case de la carte */
									$requete = "INSERT INTO carte_plateaux(idcarte,nom,x,y,nb_cases_x,nb_cases_y)";
									$requete .= " VALUES ";
									$requete .= "(".intval($_GET['idcarte']).",'".$datas[0]."',".$oCase->getX().",".$oCase->getY().",".$largeurCasesPlateau.",".$hauteurCasesPlateau.")";

									$oPdo->startTransaction();
									if ($oPdo->executeRequete($requete)) {
										/* Ensuite on renseigne l'etat de la / des case(s) concernees par le plateau */
										
										/* Comme le triplet id,x,y est unique... */
										$requete = "UPDATE cases SET etatCase = 1 ";
										
										/* Calcul de la surface */
										/* la valeur de xDebut = xCase clique */
										$xDebut = $oCase->getX();
										
										/* la valeur de xFin = xCase clique + largeurPlateauEnCase */
										$xFin = $oCase->getX() + $largeurCasesPlateau;
										
										/* la valeur de yDebut = yCase clique */
										$yDebut = $oCase->getY();

										/* la valeur de xFin = xCase clique + hauteurPlateauEnCase */
										$yFin = $oCase->getY() + $hauteurCasesPlateau;
										
										$requete .= "WHERE idcarte = ".$idCarte." AND x >= ".$xDebut." AND x < ".$xFin." AND y >= ".$yDebut." AND y < ".$yFin;
										
										if ($oPdo->executeRequete($requete)) {
											$oPdo->commitTransaction();
											informe('Ajout du plateau OK');	
										} else {
											$oPdo->rollbackTransaction();
											alerte('Erreur dans MAJ des cases');
										}						
									} else {
										$oPdo->rollbackTransaction();
										alerte('Erreur dans insertion du plateau dans la carte');
									}
								}
							}
						}
					}
				}
			}
		}
	}
?>
