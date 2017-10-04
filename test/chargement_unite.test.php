<?php
/*
 * Classe de test pour le chargement des unites
 *
 *	Test1: chargement d'une unite, la variable NE DOIT PAS etre vide
 *	Test2: chargement de l'unite 18, on verifiera son id avec la methode getId()
 */
	debug("Chargement d'une unit&eacute; ID 18",true);
	$oUnite = FactoryUnite::getFromTableUnite(18);
	if (empty($oUnite)) {
		/* erreur */
		debug('Erreur l\'unit&eacute; est vide revoir: la methode de chargement',true);
		exit;
	} else {
		debug('Chargement Unit&eacute ID 18 ==> OK',true);
	}
	if ($oUnite->getId() != 18) {
		/* erreur */
		debug('Erreur mauvaise unit&eacute; charg&eacute;e ('.$oUnite->getId().' au lieu de 18): revoir la methode de chargement',true);
		exit;
	} else {
		debug('ID de l\'unite: '.$oUnite->getId(),true);
		debug($oUnite,true);
	}
?>
