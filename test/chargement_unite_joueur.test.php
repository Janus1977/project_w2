<?php
/*
 * Classe de test pour le chargement des unites
 *
 *	Test1: chargement d'une unite, la variable NE DOIT PAS etre vide
 *	Test2: chargement de l'unite 33, on verifiera son id avec la methode getId()
 */
	debug("Chargement d'une unit&eacute; de joueur ID 33",true);
	$oUniteJoueur = FactoryUnite_joueur::getFromTableUnite_joueur(33);
	if (empty($oUniteJoueur)) {
 		/* erreur */
 		debug('Erreur l\'unit&eacute; de joueur est vide revoir: la methode de chargement',true);
 		exit;
	} else {
 		debug('Chargement Unit&eacute de joueur ID 33 ==> OK',true);
	}
	if ($oUniteJoueur->getId() != 33) {
 		/* erreur */
 		debug('Erreur mauvaise unit&eacute; charg&eacute;e ('.$oUniteJoueur->getId().' au lieu de 33): revoir la methode de chargement',true);
 		exit;
	} else {
 		debug('ID de l\'unite: '.$oUniteJoueur->getId(),true);
 		debug($oUniteJoueur,true);
	}
?>
