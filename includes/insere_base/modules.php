<?php
	/**
	 * Script gerant les insertions dans la table modules
	 */
	$requete = "INSERT INTO modules(nom,actif) VALUES ('".$_GET['valeurChamp']."',0)";
	$oPdo->startTransaction();
	if ($oPdo->executeRequete($requete)) {
		$oPdo->commitTransaction();
		informe('Insertion de la table <i>modules</i>, champ '.$nomChamp.'('.$valeurChamp.') OK.');
	} else {
		$oPdo->rollbackTransaction();
		alerte('<br>Erreur dans l\'Insertion de la table <i>modules</i>, champ '.$nomChamp.'('.$valeurChamp.').');
	}
?>
