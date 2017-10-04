<?php
	/**
	 * Script de modification dans la table cases
	 */
	if (!empty($_GET['type'])) {
		if ($_GET['type'] == 'case') {
			$nomChamp = $_GET['effet'];
			$valeurChamp = $_GET['valeur'];
			$condition = "WHERE id = ".$_GET['id'];			
		} else if ($_GET['type'] == 'zone'){	
			if ($_GET['effet'] == 'bloque') {
				$nomChamp = 'bloque';
				$valeurChamp = 1;
			} else if ($_GET['effet'] == 'debloque') {
				$nomChamp = 'bloque';
				$valeurChamp = 0;
			}
			/* Calcul de la taille de la zone d'effet */
			
			/* 1) on cree une zone rectangulaire */
			$xDebut = $_GET['xCentre'] - $_GET['rayon'];
			$xFin = $_GET['xCentre'] + $_GET['rayon'];
			$yDebut = $_GET['yCentre'] - $_GET['rayon'];
			$yFin = $_GET['yCentre'] + $_GET['rayon'];
			
			$condition = "WHERE x >= ".$xDebut." AND x <= ".$xFin;
			$condition .= " AND y >= ".$yDebut." AND y <= ".$yFin;
		}
		
		/* Lancement de la requete */
		$requete = "UPDATE cases SET ".$nomChamp." = ".$valeurChamp.' '.$condition;
		$oPdo->startTransaction();
		if ($oPdo->executeRequete($requete)) {
			$oPdo->commitTransaction();
			informe('Modification de la table <i>cases</i>, champ '.$nomChamp.'('.$valeurChamp.') OK.');
		} else {
			$oPdo->rollbackTransaction();
			alerte('<br>Erreur dans la modification de la table <i>cases</i>, champ '.$nomChamp.'('.$valeurChamp.').');
		}
	}
?>
