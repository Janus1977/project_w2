<?php
	/**
	 * Script de modification dans la table carte_edit
	 */
	/*
	 * AJOUT DES CASES A UNE CARTES EXISTANTE
	 */
	
	$nbCaseXCarte = 0;
	$nbCaseYCarte = 0;
	$xDebut = 1;
	$yDebut = 1;
	
	/* 1) recuperons les parametres AVANT de les modifier */
	$requete = "SELECT * FROM carte_edit WHERE id = ".$_GET['id'];

	if (!$oPdo->executeRequete($requete)) {
		/* ERREUR */
		alerte('Erreur sur la requete:<br/>'.$requete);
	} else {
		$data = $oPdo->getTableauResultat();
		$idCarte = $data[0]['id'];
		$nomCarte = $data[0]['nom'];
		$xFin = $data[0]['nb_cases_x'];
		$yFin = $data[0]['nb_cases_y'];
		
		/* 2)MODIFIONS le parametre de la carte */
		$requete = "UPDATE ";
		$requete .= "carte_edit";
		$requete .= " SET ";
		$requete .= $_GET['nomChamp'].' = '.$_GET['valeurChamp'];
		$requete .= " WHERE id = ".$_GET['id'];
		$oPdo->startTransaction();
		if ($oPdo->executeRequete($requete)) {
			/* creation des cases */
			$requete = "INSERT INTO cases (idcarte,x,y)";
			$requete .= " VALUES ";
			
			/* calcul des coordonnees de depart de creation des cases */
			if ($_GET['nomChamp'] == 'nb_cases_x') {
				/* La valeur du xDebut est la valeur de la taille de la carte + 1*/
				$xDebut = ($xFin == 0) ? 1 : ($xFin + 1);
				$xFin = intval($_GET['valeurChamp']);
			}

			if ($_GET['nomChamp'] == 'nb_cases_y') {
				$yDebut = ($yFin == 0) ? 1 : ($yFin + 1);
				$yFin = intval($_GET['valeurChamp']);
			}
			
			/* inclusion des fonctions specifiques a la carte */
			require_once(_MODULES_BASES_.'traitement_carte/includes/fonctions.inc.php');
			
			/* AJOUT EFFECTIF DES CASES A LA CARTE */
			ajouteCaseCarte($requete,$idCarte,$xDebut,$xFin,$yDebut,$yFin);
			
			/* inclusion des fonctions specifiques a la carte */
			require_once(_MODULES_BASES_.'traitement_image/includes/fonctions.inc.php');
			
			/* REDIMENSIONNEMENT DE LA SURFACE DE JEU */
			$oManagerCarte = ManagerCarte::getInstance();
			$oManagerCarte->redimensionnePlateauDeJeu(searchFile(_DIR_IMGS_CARTES_,$nomCarte.'.jpg'),($xFin * _TAILLE_CASE_X_),($yFin * _TAILLE_CASE_Y_));
			
			if ($oPdo->executeRequete($requete)) {
				$oPdo->commitTransaction();
				informe('<br>Modification de la table <i>carte_edit</i> r&eacute;ussie.');
			} else {
				$oPdo->rollbackTransaction();
				alerte('<br>Erreur dans la Modification de la table <i>carte_edit</i>.');
			}
		} else {
			$oPdo->rollbackTransaction();
			alerte('<br>Erreur dans la Modification de la table <i>carte_edit</i>.');
		}
	}
?>
