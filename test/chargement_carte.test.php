<?php
	/*
	 * Test de chargement de la carte
	 */

	//Chargement de la carte 1
	$oCarte = ManagerCarte::getInstance()->getById(1);
	if (!empty($oCarte) && $oCarte instanceof Carte) {
		debug("Creation carte OK",true);
		//chargement des cases de la carte
		$oCarte->setListeCasesCarte(ManagerCarte::getInstance()->getCasesCarteFromRange($oCarte->getId()));
		debug("Nombre case de la carte: ".sizeof($oCarte->getListeCasesCarte()),true);
	} else {
		debug('pas de carte ID1',true);
	}
?>