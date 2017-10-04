<?php
	//Fichier test affichage carte
	//require_once ('../config/config.cfg.php');
	
    /***********************/
    /* Parametrage du test */
    /***********************/
    define('_HAUTEUR_',10);
    define('_LARGEUR_',10);
    
    $_SESSION['user'] = ManagerMembre::getInstance()->getById(28);
    $_SESSION['EDITION_CARTE'] = true;

	//Chargement de la carte 35
	$_SESSION['carte'] = ManagerCarte::getInstance()->getById(35);
	
	if (!empty($_SESSION['carte']) && $_SESSION['carte'] instanceof Carte) {
		debug("Creation carte OK",true);
		//chargement des cases de la carte
		$_SESSION['carte']->setListeCasesCarte(ManagerCarte::getInstance()->getCasesCarteFromRange($_SESSION['carte']->getId()));
		debug("Nombre case de la carte: ".sizeof($_SESSION['carte']->getListeCasesCarte()),true);
		
		try {
			//3 cas a tester:
		    // - Cas EDITION/Admin
			// - Cas Jeu/Joueur
			//EDITION
			echo '<br>[MODE EDITION / ADMIN]';
			$_SESSION['EDITION_CARTE'] = true;
			ManagerCarte::getInstance()->afficheCarte(35);
			echo '[/MODE EDITION / ADMIN]<br>';
			
			echo '<br>[MODE JEU / JOUEUR]';
			$_SESSION['EDITION_CARTE'] = false;
			ManagerCarte::getInstance()->afficheCarte(35);
			echo '[/MODE JEU / JOUEUR]<br>';
		} catch (Exception $e) {
			debug("Erreur: ".$e->getMessage());
		}
	}