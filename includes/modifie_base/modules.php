<?php
	/**
	 * Script de modification de la table MODULES
	 */
	$requete = "UPDATE modules SET ".$nomChamp." = ".$valeurChamp." WHERE id = ".$_GET['id'];
	$oPdo->startTransaction();
	if ($oPdo->executeRequete($requete)) {
		$oPdo->commitTransaction();
		informe('Modification de la table <i>modules</i>, champ '.$nomChamp.'('.$valeurChamp.') OK.');
	} else {
		$oPdo->rollbackTransaction();
		alerte('<br>Erreur dans la modification de la table <i>modules</i>, champ '.$nomChamp.'('.$valeurChamp.').');
	}
?>
