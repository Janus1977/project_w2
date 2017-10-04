<?php
	/**
	 * Script de suppression dans la table carte_edit
	 */
	/*
	 * SUPPRESSION D'UNE CARTE EN EDITION
	 */
	$requete = "SELECT nom FROM carte_edit WHERE id = ".$_GET['id'];
	if ($oPdo->executeRequete($requete)) {
		$data = $oPdo->getTableauResultat();
		$nomCarte = $data[0]['nom'];
		
		$requete = "DELETE FROM ";
		$requete .= "carte_edit";
		$requete .= " WHERE id = ".$_GET['id'];
		$oPdo->startTransaction();
		if ($oPdo->executeRequete($requete)) {
			/* 
			 * Il faut aussi supprimer les cases associees ainsi que les plateaux associes
			 */
			/* Les cases */
			$requete = "DELETE FROM cases WHERE idcarte = ".$_GET['id'];
			if ($oPdo->executeRequete($requete)) {
				informe('<br>Suppression des cases de la carte <i>ID'.$_GET['id'].'</i> r&eacute;ussie.');
				/* Les plateaux */
				$requete = "DELETE FROM carte_plateaux WHERE idcarte = ".$_GET['id'];
				if ($oPdo->executeRequete($requete)) {
					informe('<br>Suppression des plateaux de la carte <i>ID'.$_GET['id'].'</i> r&eacute;ussie.');
					/* l'image de fond */
					if (!unlink(_DIR_IMGS_CARTES_.$nomCarte.'.jpg')) {
						//on ne fait rien, juste pour eviter l'affreux '@'
					} else {
						informe('<br>Suppression du plateau de jeu de la carte <i>ID'.$_GET['id'].'</i> r&eacute;ussie.');
						$oPdo->commitTransaction();
					}
				}
			} else {
				$oPdo->rollbackTransaction();
				alerte('<br>Erreur dans la Modification de la table <i>carte_edit</i>.');
			}
		} else {
			$oPdo->rollbackTransaction();
			alerte('<br>Erreur dans la Modification de la table <i>carte_edit</i>.');
		}
	} else {
		alerte('<br>Erreur aucune carte avec l\'identifiant <i>carte_edit</i>.');						
	}
?>
