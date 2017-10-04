<?php
	/**
	 * Script d'insertion dans la table carte_edit
	 */
	/*
	 * INSERTION D'UNE NOUVELLE CARTE ET DE SES CASES BASIQUES
	 */
	/* 1) La carte existe-t-elle deja ? */
	$requete = "SELECT * FROM carte_edit WHERE nom = '".$_GET['nom']."'";
	if (!$oPdo->executeRequete($requete)) {
		/* ERREUR */
		alerte('Erreur sur la requete:<br/>'.$requete);
	} else {
		/* PAS D'ERREUR */
		$data = $oPdo->getTableauResultat();						
		if (sizeof($data) > 0) {
			alerte('Erreur la carte existe d&eacute;j&agrave;.');				
		} else {
			$nbCaseXCarte = 0;
			$nbCaseYCarte = 0;
			
			/* creation de la carte */				
			$requete = "INSERT INTO ";
			$requete .= "carte_edit(nom,nb_cases_x,nb_cases_y)";
			$requete .= " VALUES ";
			$requete .= "('".$_GET['nom']."',".$_GET['nb_cases_x'].",".$_GET['nb_cases_y'].")";							
								
			/* Ouverture d'une transaction pour COMMIT/ROLLBACK */
			$oPdo->startTransaction();
			if ($oPdo->executeRequete($requete)) {
				$idCarte = $oPdo->getLastInsertID();
				
				/* creation des cases */
				$requete = "INSERT INTO cases (idcarte,x,y)";
				$requete .= " VALUES ";
				
				/* calcul des coordonnees de depart de creation des cases */
				$xDebut = 1;
				$yDebut = 1;
				/* inclusion des fonctions specifiques a la carte */
				require_once(_MODULES_BASES_.'traitement_carte/includes/fonctions.inc.php');
				
				ajouteCaseCarte($requete,$idCarte,$xDebut,$_GET['nb_cases_x'],$yDebut,$_GET['nb_cases_y']);

				if ($oPdo->executeRequete($requete)) {
					$oPdo->commitTransaction();
														
					/* Creation du plateau de la carte */
					creePlateauCarte($_GET['nom'],intval($_GET['nb_cases_x'] * _TAILLE_CASE_X_),intval($_GET['nb_cases_y'] * _TAILLE_CASE_Y_));

					informe('Cr&eacute;ation de la carte et de ses cases r&eacute;ussie.');
				} else {
					$oPdo->rollbackTransaction();
					alerte('Erreur dans la cr&eacute;ation des cases de la carte (cases).');
				}
			} else {
				$oPdo->rollbackTransaction();
				alerte('Erreur dans la requ&egrave;te:<br/>'.$requete);
			}
		}
	}
?>
