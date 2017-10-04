<?php
	//Maintenant c'est new_carte
	require_once('new_carte.php');exit;
	
	/**
	 * Fichier point d'entree du module de la carte
	 */
	$path='config/config.php';
	$i=0;
	while (!file_exists($path)) {
	    if($i>10) {
	        echo 'Impossible de trouver les fichiers de configuration global,<br/>remplacement par celui du module';
	        $path='config/config.php';
	        break;
	    }
	    
	    $path='../'.$path;
	    $i++;
	}
	
	require_once $path;
	
	/* Edtion est passe a faux car nous sommes dans le jeu */
	/*
	 * Appel par le menu ==>
	 * Appel par le traitement ==> GET / POST
	 */
	if (isset($_POST['acces']) && $_POST['acces'] == 'menu') {
		$_SESSION['editionCarte'] = 0;
	}
	
	if (!defined('_EDITION_CARTE_')) {
		define('_EDITION_CARTE_',true);
	}
	
	/* FONCTIONS GENERIQUES */
	require_once _DIR_INCLUDES_BASE_.'fonctions.inc.php';
	
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
		
	/* FONCTIONS SPECIFIQUES */
	require_once _INCLUDES_CARTE_.'fonctions.inc.php';
	
	require_once _SMARTY_LOAD_;
	$smarty->assign('charset',_CHARSET_);
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	$smarty->assign('URL_MODULES',_URL_MODULES_BASES_);
	$smarty->assign('URL_IMGS_MINI_CARTES',_URL_IMGS_MINI_CARTES_);
	
	
// 	if (!empty($_SESSION['editionCarte']) && $_SESSION['editionCarte']) {
		
// 	}
	
	
	/* Gestionnaire de carte */
	$_GET = protectionFormulaire($_GET);
	
	/* Acces carte du menu */
	$_POST = protectionFormulaire($_POST);
	
	
	
	
	
	
	if (empty($_SESSION['partieEnCours']) || $_SESSION['partieEnCours'] == 0) {
		/*****************************************************/
		/* Aucune partie en cours donc on propose les cartes */
		/*****************************************************/
		//1) les cartes disponibles en base
		$listeCartesDisponibles = ManagerCarte::getInstance()->getCartesDisponibles();
		if (sizeof($listeCartesDisponibles) > 0) {
			$listeFichiersRepImagesMiniCarte = new DirectoryIterator(_DIR_IMGS_MINI_CARTES_);
			$listeImagesMiniCarte = array();
			foreach ($listeFichiersRepImagesMiniCarte AS $file) {
				//si . ou .. on zappe
				if ($file->isDot() || $file->isDir()) {
					continue;
				}
				foreach ($listeCartesDisponibles AS $carte) {
					if ($carte->getNom().'.jpg' == $file->getFilename()) {
						$chaine = '<center><img src="'._URL_IMGS_MINI_CARTES_.$file->getFilename().'" width="200" height="200"/>';
						$chaine .= '<br/>'.$file->getFilename();
						$chaine .= '<br/><input type="button" value="Jouer"></center>';
						$listeImagesMiniCarte[] = $chaine;
					}
				}
			}
			$smarty->assign('listeImagesMiniCarte',$listeImagesMiniCarte);
		} else {
			/**********************************/
			/* Aucune carte disponible au jeu */
			/* Gere a l'affichage de la page  */
			/**********************************/
		}
	} else {
		/*************************************************************/
		/* on va afficher les bouton "continuer" / "nouvelle partie" */
		/* Cette partie est geree a l'affichage, la partie en cours  */
		/* est l'identifiant de cette partie renvoyee par le bouton  */
		/*************************************************************/
	}
	
	if (!empty($_POST)) {
		try {
			/* si un affichage de carte a ete demande */
			if (!empty($_POST['affichage']) && $_POST['affichage'] == 1) {
				/* Creation objet carte */
				$oCarte = ManagerCarte::getInstance()->getById(intval($_POST['id']));
			} else {
				/* Affichage de la liste des vignettes des mini-cartes */
				$listeFichiersRepImagesMiniCarte = new DirectoryIterator(_DIR_IMGS_MINI_CARTES_);
				$listeImagesMiniCarte = array();
				foreach ($listeFichiersRepImagesMiniCarte AS $file) {
					//si . ou .. on zappe
					if ($file->isDot() || $file->isDir()) {
						continue;
					}
					if ($file->getExtension() == 'jpg') {
						$listeImagesMiniCarte[] = $file->getFilename();
					}
				}
			}			
		} catch (Exception $e) {
			debug('Erreur:<br/>'.$e->getMessage());
			debug($e->getCode());
		}
	}
	
	if (!empty($_GET)) {
		/* 
		 * les actions sur la carte selectionnee
		 */
//		if (!empty($_GET['action']) && $_GET['action'] == 'plateau') {
//			/* Ajout d'une image plateau (sol) */
//			debug($_GET);
//			
//			
//		}
		
		try  {		
			/* 
			 * Chargement de la carte selectionnee par l'utilisateur
			 */
			
			$oCarte = ManagerCarte::getInstance()->getById(intval($_GET['id']));
	
			/* Image de fond a remplacer par l'image de la carte selectionnee */
			//a voir si on peut optimiser
			$smarty->assign('cheminImageFond',str_replace(_DIR_IMGS_CARTES_,_URL_IMGS_CARTES_,searchFile(_DIR_IMGS_CARTES_,$oCarte->getNom().'.jpg')));
	
			/* Creation image de fond a la volee */
			ManagerCarte::getInstance()->creePlateauCarte(searchFile(_DIR_IMGS_CARTES_,$oCarte->getNom().'.jpg'),(_TAILLE_CASE_X_ * $oCarte->getNb_cases_x()),(_TAILLE_CASE_Y_ * $oCarte->getNb_cases_y()),ManagerCarteplateaux::getInstance()->getFromExtTableCarte($oCarte->getId()));
	
			/* la mini-carte */
			ManagerCarte::getInstance()->creeMiniCarte($oCarte->getNom());
			
			
			//TO BE FOLLOW...

// 			/* 1) chargement des parametres*/
// 			$requete = "SELECT * FROM carte_edit WHERE id = ".intval($_GET['id']);
// 			$oPdo->executeRequete($requete);
// 			$data = $oPdo -> getTableauResultat();
// 			foreach ($data AS $carte) {
// 				$idCarte = $carte['id'];
// 				$nomCarte = $carte['nom'];
// 				$nb_cases_x = $carte['nb_cases_x'];
// 				$nb_cases_y = $carte['nb_cases_y'];
// 			}
			
// 			/* PARTIE CARTE */
// 			$smarty->assign('dataCarte',true);
// 			$smarty->assign('idCarte',$idCarte);
// 			$smarty->assign('nomCarte',$nomCarte);
// 			$smarty->assign('nb_cases_x',$nb_cases_x);
// 			$smarty->assign('nb_cases_y',$nb_cases_y);
// 			$smarty->assign('largeurCarte',(_TAILLE_CASE_X_ * $nb_cases_x + _TAILLE_CASE_X_));
// 			$smarty->assign('hauteurCarte',(_TAILLE_CASE_Y_ * $nb_cases_y + _TAILLE_CASE_Y_));
			
//			/* Image de fond a remplacer par l'image de la carte selectionnee */
// 			$cheminVersCarte = searchFile(_DIR_IMGS_CARTES_,$nomCarte.'.jpg');
// //			if (strlen(trim($cheminVersCarte)) == 0) {
// //				$smarty->assign('cheminImageFond',_URL_IMGS_CARTES_.'blanc.png');
// //			} else {
// 				$smarty->assign('cheminImageFond',str_replace(_DIR_IMGS_CARTES_,_URL_IMGS_CARTES_,$cheminVersCarte));
// //			}

// 			/* creation de l'image de fond de la carte a la volee */
// 			$requete = "SELECT * FROM carte_plateaux WHERE idcarte = ".$idCarte;			
// 			$oPdo->executeRequete($requete);
// 			$data = $oPdo -> getTableauResultat();
// 			$cheminVersImageFondCarte = searchFile(_DIR_IMGS_CARTES_,$nomCarte.'.jpg');
// 			if (strlen(trim($cheminVersImageFondCarte)) == 0) {
// 				$cheminVersImageFond = _DIR_IMGS_CARTES_.$nomCarte.'.jpg';
// 			} else {
// 				$cheminVersImageFond = $cheminVersImageFondCarte;
// 			}
// 			creePlateauCarte($cheminVersImageFond,(_TAILLE_CASE_X_ * $nb_cases_x),(_TAILLE_CASE_Y_ * $nb_cases_y),$data);
			
// 			/* PARTIE MINI CARTE */
// 			/* Creation de la mini carte */
// 			require_once(_MODULES_BASES_.'mini_carte/includes/fonctions.inc.php');
// 			creeMiniCarte($carte['nom']);
			
			/* On verifie que l'image existe */
			$cheminVersMiniCarte = searchFile(_DIR_IMGS_MINI_CARTES_,$oCarte->getNom().'.jpg');
			if (strlen(trim($cheminVersMiniCarte)) == 0) {
				/* Pas de mini carte malgre une carte */
				$smarty->assign('dataMiniCarte',false);
				$smarty->assign('cheminImageMiniCarte',_URL_IMGS_CARTES_.'blanc.png');
			} else {
				$smarty->assign('dataMiniCarte',true);
				$smarty->assign('cheminImageMiniCarte',str_replace(_DIR_IMGS_MINI_CARTES_,_URL_IMGS_MINI_CARTES_,$cheminVersMiniCarte));
			}
			
			/* Le random pour forcer au rechargement de l'image */
			$smarty->assign('random',time());
			
			/* 3) chargement des cases de la carte */
// 			$oManagerCases = managerCasesCarte::getInstance();
// 			$oManagerCases->setConnexion($oPdo);
// 			$smarty->assign('aCasesCarte',$oManagerCases->getCarte(intval($_GET['id'])));
			/* Chargement des cases de la carte*/
			$smarty->assign('aCasesCarte',ManagerTile::getInstance()->getFromExtTableCarte($oCarte->getId()));
			


			/*
			 * Variables utilisees dans l'affichage d'une case
			*/
			$smarty->assign('xDebut',1);
			$smarty->assign('xFin',$oCarte->getNb_cases_x());
			$smarty->assign('yDebut',1);
			$smarty->assign('yFin',$oCarte->getNb_cases_y());
			
			$smarty->assign('TAILLE_CASE_X',_TAILLE_CASE_X_);
			$smarty->assign('TAILLE_CASE_Y',_TAILLE_CASE_Y_);
			$smarty->assign('EDITION_CARTE',_EDITION_CARTE_);
			
			$smarty->assign('oCarte',$oCarte);
		} catch (Exception $e) {
			debug('Erreur:<br/>'.$e->getMessage());
			debug($e->getCode());
		}
	} else {
		/* Ici la partie par defaut, rien n'est selectionne */
		
		/* PARTIE CARTE */
		$smarty->assign('data',false);
		$smarty->assign('x',$_GET['x']);
		$smarty->assign('y',$_GET['y']);
		$smarty->assign('largeurCarte',1);
		$smarty->assign('hauteurCarte',1);
		$smarty->assign('cheminImageFond',_URL_IMGS_CARTES_.'blanc.png');
		
		/* PARTIE MINI CARTE */
		$smarty->assign('dataMiniCarte',true);
		$smarty->assign('cheminImageMiniCarte',_URL_IMGS_CARTES_.'blanc.png');
	}
	
	/*
	 * La partie JS du mouseOver du DIV de la case
	 */
	$actionJavascriptSupplementaire = "";
	if (!_EDITION_CARTE_) {
	    switch($typeDAction) {
	        case _DEPLACEMENT_: {
	            if (!empty($caseDeLUniteSelectionnee)) {
	                echo ' caseAccessible(this,'.$caseDeLUniteSelectionnee->getX().','.$caseDeLUniteSelectionnee->getY().','.$this->getX().','.$this->getY().',\'_DEPLACEMENT_\');';
	            }
	            break;
	        }
	        case _ATTAQUE_: {
	            if (!empty($caseDeLUniteSelectionnee)) {
	                echo ' caseAccessible(this,'.$caseDeLUniteSelectionnee->getX().','.$caseDeLUniteSelectionnee->getY().','.$this->getX().','.$this->getY().',\'_ATTAQUE_\');';
	            }
	            break;
	        }
	        case _CHARGE_: {
	            if (!empty($caseDeLUniteSelectionnee)) {
	                echo ' caseAccessible(this,'.$caseDeLUniteSelectionnee->getX().','.$caseDeLUniteSelectionnee->getY().','.$this->getX().','.$this->getY().',\'_CHARGE_\');';
	            }
	            break;
	        }
	    }
	}
	$smarty->assign('actionJavascriptSupplementaire',$actionJavascriptSupplementaire);
	
	// transfert a Smarty des etats occupation d'une case
	$smarty->assign('VIDE',_CASE_VIDE_);
	$smarty->assign('PLATEAU',_CASE_PLATEAU_);
	$smarty->assign('DECOR',_CASE_DECOR_); 		// == plateau + decor
	$smarty->assign('LIEN',_CASE_LIEN_);		//case lien entre les cartes
	$smarty->assign('URL_IMGS',_URL_IMGS_);
	
//	/* gestion de la transparence */
//	if (!empty($caseDeLUniteSelectionnee) && !empty($uniteSelectionnee)) {
//	    if (($typeDAction == _DEPLACEMENT_ && ($this->distanceAvec($caseDeLUniteSelectionnee) <= $uniteSelectionnee->getMouvement())) ||
//	        ($typeDAction == _ATTAQUE_ && ($this->distanceAvec($caseDeLUniteSelectionnee) <= $uniteSelectionnee->getArmeActive()->getLpMax())) ||
//	        ($typeDAction == _CHARGE_)) {
//	        $transparence = 'opacity:0.25;'.PHP_EOL;
//	        $transparence .= '-moz-opacity:0.25;'.PHP_EOL;
//	        $transparence .= '-khtml-opacity:0.25;'.PHP_EOL;
//	        $transparence .= 'filter:alpha(opacity=25);'.PHP_EOL;
//	    } else {
//	     $transparence = '';
//	    }
//	} else {
     $transparence = '';
//    }
	
	$smarty->assign('transparence',$transparence);
	$smarty->assign('typeAction',$_GET['action']);
	debug("TOTO");
	debug(_URL_TEMPLATES_DECOR_);
	$smarty->assign('URL_TEMPLATES_DECORS',_URL_TEMPLATES_DECOR_);
	$smarty->assign('URL_IMGS_DECORS',_URL_IMGS_DECORS_);
	
	$smarty->display(_TEMPLATES_CARTE_.'carte.tpl');
?>