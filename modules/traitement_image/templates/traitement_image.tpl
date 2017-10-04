<?php
	/**
	 * Script centralisant les mise a jour / insertion / suppression dans la base de donnees
	 * appeles par AJAX
	 */
	
	/* Pas la peine de travailler pour rien ;-) */
	if (!empty($_POST)) {
		$path='config/config.php';
		$i=0;
		while (!file_exists($path)) {
		    if($i>10) {
//		        echo 'Impossible de trouver les fichiers de configuration';
		        alerte('Impossible de trouver les fichiers de configuration');
		        exit;
		    }
		    
		    $path='../'.$path;
		    $i++;
		}
		
		require_once $path;
		require_once _DIR_INCLUDES_BASE_.'fonctions.inc.php';		
		spl_autoload_register('autoload');
		require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
		
		$_POST = protectionFormulaire($_POST);
		
		/* Aiguillage */
		try {
			
			/* debut de la transaction */
			database::getInstance()->startTransaction();
			
			/* intanciation du manager qu'il faut */
			if ($_POST['table'] == 'armee') {
				////////////////////////
				// GESTION DES ARMEES //
				////////////////////////
				$oManagerArmees = ManagerArmees::getInstance();
			} else if ($_POST['table'] == 'carte') {
				////////////////////////
				// GESTION DES CARTES //
				////////////////////////
				if ($_POST['action'] == 'insertion') {
//////////////////////////////
// INSERTION NOUVELLE CARTE //
//////////////////////////////
					$oCarte = ManagerCarte::getInstance()->getCarteByName($_POST['nom']);
					if (!empty($oCarte)) {
						throw new Exception('Une carte de nom <i>'.$_POST['nom'].'</i> existe d&eacute;j&agrave;.');
					}
					/* Creation d'un objet vide Carte */
					$oCarte = ManagerCarte::getInstance()->getCarteVide();
					
					/* Renseignement de l'objet */
					$oCarte->setNom($_POST['nom']);
					$oCarte->setIddimension(intval($_POST['idDimension']));
					$oCarte->setEdition(1);
					
					/* Sauvegarde de l'objet Carte */
					$oManagerCartes->save($oCarte);
					
					/* Gestion des cases */
					$_POST['table'] = 'case';
// 					$oCarte = ManagerCarte::getInstance()->getCarteByName($_POST['nom']);
					$oDimension = ManagerDimension::getInstance()->getById($oCarte->getIddimension());
					for ($x=1; $x<=$oDimension->getLargeur(); $x++) {
						for ($y=1; $y<=$oDimension->getLongueur(); $y++) {
							/* Creation d'un objet vide Case */
							$oCase = ManagerCases::getInstance()->getCaseVide();
							/* Renseignement de l'objet */
							$oCase->setX($x);
							$oCase->setY($y);
							$oCase->setIdcarte($oCarte->getId());
							$oCase->setVision(1);
							$oCase->setIdunite(0);
							$oCase->setIdunitejoueur(0);
							$oCase->setIddecor(0);
							$oCase->setEtatCase(0);
							$oCase->setBloque(0);
							
							/* Affectation en base */
							ManagerCases::getInstance()->save($oCase);
						}
					}
					informe('Cr&eacute;ation de la carte et de ses cases r&eacute;ussie.');
				} else if ($_POST['action'] == 'modification') {
//////////////////////////////
// MODIFICATION D'UNE CARTE //
//////////////////////////////
					$oCarte = ManagerCarte::getInstance()->getById(intval($_POST['idCarte']));
					$oCarte->setNom($_POST['nomCarte']);
					$oCarte->setApercu($_POST['appercuCarte']);
					$oCarte->setEdition($_POST['editionCarte']);
					ManagerCarte::getInstance()->update($oCarte);
				} else if ($_POST['action'] == 'suppression') {
/////////////////////////////
// SUPPRESSION D'UNE CARTE //
/////////////////////////////
					/* les unites sur les cases doivent sortir */
					ManagerUnite::getInstance()->setUnitsOutOfGame(intval($_POST['id']));
					ManagerUnite_joueur::getInstance()->setUnitsOutOfGame(intval($_POST['id']));
					/* les equipements sur les cases doivent sortir */
					ManagerEquipement::getInstance()->setUnitsOutOfGame(intval($_POST['id']));
					ManagerEquipement_joueur::getInstance()->setUnitsOutOfGame(intval($_POST['id']));
					/* Suppression des cases de la carte */
					ManagerCases::getInstance()->deleteAllFromCarte(intval($_POST['id']));
					/* Suppression de la carte */
					ManagerCarte::getInstance()->delete(ManagerCarte::getInstance()->getById(intval($_POST['id'])));
				}
			} else if ($_POST['table'] == 'cases') {
////////////////////////////////
// GESTION DES CASES DE CARTE //
////////////////////////////////
// 				$oManagerCases = ManagerCases::getInstance();
				if ($_POST['action'] == 'inse