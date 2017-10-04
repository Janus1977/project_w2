<?php
	/**
	 * Script de suppression dans la table carte_plateaux
	 */
	/*
	 * SUPPRESSION D'UN PLATEAU AFFECTE A UNE CARTE EN EDITION
	 */
	 
	 /* 1) Recuperation des information pour modifier les cases affectees */
	 $requete = "SELECT * FROM carte_plateaux WHERE id = ".$_GET['id'];
	if ($oPdo->executeRequete($requete)) {
		$data = $oPdo->getTableauResultat();
		$idCarte = $data[0]['idcarte'];
		$xDebut = $data[0]['x'];
		$xFin = $xDebut + $data[0]['nb_cases_x'];
		$yDebut = $data[0]['y'];
		$yFin = $yDebut + $data[0]['nb_cases_y'];
	 	
		/* 2) Modification des cases affectees */
		$requete = "UPDATE cases SET etatCase = 0 ";
		$requete .= "WHERE idcarte = ".$idCarte." AND x >= ".$xDebut." AND x < ".$xFin." AND y >= ".$yDebut." AND y < ".$yFin;
		$oPdo->startTransaction();
	 	if ($oPdo->executeRequete($requete)) {
	 		/* 3) Suppression du plateau de la base */
	 		$requete = "DELETE FROM carte_plateaux WHERE id = ".$_GET['id'];
	 		if ($oPdo->executeRequete($requete)) {
	 			$oPdo->commitTransaction();
	 			informe('<br>Suppression des informations de la table <i>carte_plateaux</i> pour <i>ID'.$_GET['id'].'</i> OK');
	 		} else {
				$oPdo->rollbackTransaction();
				alerte('<br>Erreur suppression des informations de la table <i>carte_plateaux</i> pour <i>ID'.$_GET['id'].'</i>');
	 		} 
	 	} else {
			$oPdo->rollbackTransaction();
			alerte('<br>Erreur modification des informations de la table <i>cases</i> pour <i>ID'.$_GET['id'].'</i>');
		}
	} else {
		$oPdo->rollbackTransaction();
		alerte('<br>Erreur s&eacute;lection des informations de la table <i>carte_plateaux</i> pour <i>ID'.$_GET['id'].'</i>');
	}
?>
