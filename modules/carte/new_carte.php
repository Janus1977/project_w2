<?php
	/**
	 * Fichier point d'entree du module de la carte
	 * 	=> traitement de la carte, pas de la liste des cartes
	 */
	$pathToConfig='config/config.php';
	$i=0;
	while (!file_exists($pathToConfig)) {
		if($i>10) {
			echo 'Impossible de trouver les fichiers de configuration global,<br/>remplacement par celui du module';
			$pathToConfig='config/config.php';
			break;
		}
		 
		$pathToConfig='../'.$pathToConfig;
		$i++;
	}


	require_once $pathToConfig;
	
	//PARTIE POUR LES TESTS
	if (empty($_SESSION['user'])) {
		$_SESSION['user'] = ManagerMembre::getInstance()->getById(12);
	}
	
	if (isset($_SESSION['user'])) {
		//***********************************//
		//si l'utilisateur est connecte => OK
		//***********************************//
		/* FONCTIONS GENERIQUES */
		require_once _DIR_INCLUDES_BASE_.'fonctions.inc.php';
		
		spl_autoload_register('autoload');
		require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
		
		/* FONCTIONS SPECIFIQUES */
		require_once _INCLUDES_CARTE_.'fonctions.inc.php';
		
		require_once _SMARTY_LOAD_;
		
		//protection donnees user
		$_GET = protectionFormulaire($_GET);
		$_POST = protectionFormulaire($_POST);	

		// A REFLECHIR MAIS CETTE PARTIE POURRAIT ÊTRE PASSE DANS 
		//MANAGERCARTE::AFFICHECARTE()
// 		if (!isset($_SESSION[''])) {
		    
// 		}
// 		debug($_POST,true);
// 		if (empty($_POST['idCarte'])) {
// 		    //Affichage des choix de carte
// 		} else {
// 		    //Affichage de la carte demandee
// 		    ManagerCarte::getInstance()->afficheCarte(intval($_POST['idCarte']));
// 		}
		
// 		exit;
		
		//PARAMETRES SMARTY COMMUNS
		$actionJavascriptSupplementaire = "";
		$smarty->assign('actionJavascriptSupplementaire',$actionJavascriptSupplementaire);
		// transfert a Smarty des etats occupation d'une case
		$smarty->assign('charset',_CHARSET_);
		
		$smarty->assign('VIDE',_CASE_VIDE_);
		$smarty->assign('PLATEAU',_CASE_PLATEAU_);
		$smarty->assign('DECOR',_CASE_DECOR_); 			// == plateau + decor
		$smarty->assign('UNITE',_CASE_UNITE_); 			// == plateau + unite
		$smarty->assign('DECOR_UNITE',_CASE_DECOR_UNITE_);	// == plateau + unite + decor
		$smarty->assign('LIEN',_CASE_LIEN_);			// == case lien entre les cartes
		
		$listeEtatCase = array(
				99 => "Passage",
				98 => "Bloqu&eacute;e"
		);
		
		$smarty->assign('DIR_BASE',_DIR_BASE_);
		$smarty->assign('URL_BASE',_URL_BASE_);
		$smarty->assign('URL_MODULES',_URL_MODULES_BASES_);
		$smarty->assign('URL_IMGS',_URL_IMGS_);
		$smarty->assign('URL_IMGS_MINI_CARTES',_URL_IMGS_MINI_CARTES_);
		
		/* Le random pour forcer au rechargement de l'image */
		$smarty->assign('random',time());
		
		//Initialisation du mode EDITION a faux par defaut
		$smarty->assign('EDITION_CARTE',false);
		
		if (isset($_POST['source']) && $_POST['source'] == 'traitement_carte') {
			//Affichage seulement pour le module traitement_carte
			try {
				if (!empty($_POST['id'])) {
					// Creation objet carte
					$oCarte = ManagerCarte::getInstance()->getById(intval($_POST['id']));
					
					$smarty->assign('cheminImageFond',str_replace(_DIR_IMGS_CARTE_,_URL_IMGS_CARTE_,searchFile(_DIR_IMGS_CARTE_,$oCarte->getNom().'.jpg')));
						
					// Creation image de fond a la volee
					ManagerCarte::getInstance()->creePlateauCarte(searchFile(_DIR_IMGS_CARTE_,$oCarte->getNom().'.jpg'),(_TAILLE_CASE_X_ * $oCarte->getNb_cases_x()),(_TAILLE_CASE_Y_ * $oCarte->getNb_cases_y()),ManagerCarteplateaux::getInstance()->getFromExtTableCarte($oCarte->getId()));
						
					// la mini-carte
					ManagerCarte::getInstance()->creeMiniCarte($oCarte->getNom());
						
					// On verifie que l'image existe
					$cheminVersMiniCarte = searchFile(_DIR_IMGS_MINI_CARTES_,$oCarte->getNom().'.jpg');
					if (strlen(trim($cheminVersMiniCarte)) == 0) {
						// Pas de mini carte malgre une carte
						$smarty->assign('dataMiniCarte',false);
						$smarty->assign('cheminImageMiniCarte',_URL_IMGS_CARTE_.'blanc.png');
					} else {
						$smarty->assign('dataMiniCarte',true);
						$smarty->assign('cheminImageMiniCarte',str_replace(_DIR_IMGS_MINI_CARTES_,_URL_IMGS_MINI_CARTES_,$cheminVersMiniCarte));
					}
						
					// Le random pour forcer au rechargement de l'image
					$smarty->assign('random',time());
						
					// 3) chargement des cases de la carte
					// Chargement des cases de la carte
					$smarty->assign('aCasesCarte',ManagerTile::getInstance()->getFromExtTableCarte($oCarte->getId()));
						
						
						
					//Variables utilisees dans l'affichage d'une case
					$smarty->assign('xDebut',1);
					$smarty->assign('xFin',$oCarte->getNb_cases_x());
					$smarty->assign('yDebut',1);
					$smarty->assign('yFin',$oCarte->getNb_cases_y());
						
					$smarty->assign('TAILLE_CASE_X',_TAILLE_CASE_X_);
					$smarty->assign('TAILLE_CASE_Y',_TAILLE_CASE_Y_);
					
					$smarty->assign('EDITION_CARTE',true);
					$_SESSION['EDITION_CARTE'] = true;
// 					$smarty->assign('EDITION_CARTE',false);
// 					$_SESSION['EDITION_CARTE'] = false;
					
					if (!defined('_EDITION_CARTE_')) {
						define(_EDITION_CARTE_,true);
					}
					$smarty->assign('oCarte',$oCarte);
				}
			} catch (Exception $e) {
				debug($e);
				debug('Erreur:<br/>'.$e->getMessage());
			}

			$smarty->assign('TEMPLATE_DECORS',_TEMPLATES_DECOR_);
			$smarty->assign('URL_IMGS_DECORS',_URL_IMGS_DECORS_);
			
			
			$smarty->assign('TEMPLATES_UNITE',_TEMPLATES_UNITE_.'unite.tpl');
			$smarty->assign('URL_IMGS_UNITE',_URL_IMGS_UNITE_);
			
			$smarty->display(_TEMPLATES_CARTE_.'carte.tpl');

		} else {
			if (intval($_SESSION['user']->getStaff()) == 1) {
				//Membre du Staff
				//Liste de toutes les cartes => arrivee du module d'admin
				$smarty->assign('listeCartes',ManagerCarte::getInstance()->getbyId());
				$smarty->display(_TEMPLATES_CARTE_.'carte_admin.tpl');
			} else {
				//Membre durant le jeu
				//Carte en cours de jeu ?
				if (empty($_SESSION['partieEnCours']) || $_SESSION['partieEnCours'] == 0) {
					/*****************************************************/
					/* Aucune partie en cours donc on propose les cartes */
					/*****************************************************/
					if (isset($listeImagesMiniCarte)) {
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
			}
		}

		//BREAK le reste en bas n'est pas interprété
		exit;

		
		//*************************//
		// Qui est l'utilisateur ? //
		//*************************//
		if (intval($_SESSION['user']->getStaff()) == 1) {
			//**********************//
			// Utilisateur du staff //
			//**********************//
			if (isset($listeImagesMiniCarte)) {
				$smarty->assign('listeImagesMiniCarte',$listeImagesMiniCarte);
			}
		} else {
			//Utilisateur joueur
			if (empty($_SESSION['partieEnCours']) || $_SESSION['partieEnCours'] == 0) {
				//*****************************************************//
				//* Aucune partie en cours donc on propose les cartes *//
				//*****************************************************//
				if (isset($listeImagesMiniCarte)) {
					$smarty->assign('listeImagesMiniCarte',$listeImagesMiniCarte);
				} else {
					//**********************************//
					//* Aucune carte disponible au jeu *//
					//* Gere a l'affichage de la page  *//
					//**********************************//
				}
			} else {
				/*************************************************************/
				/* on va afficher les bouton "continuer" / "nouvelle partie" */
				/* Cette partie est geree a l'affichage, la partie en cours  */
				/* est l'identifiant de cette partie renvoyee par le bouton  */
				/*************************************************************/
			}
		}
		
		
		//*****************************//
		// Traitement des donnees POST //
		//*****************************//
		if (!empty($_POST)) {
			try {
				if (!empty($_POST['id'])) {
					//Le flag AFFICHAGE est positionne par le premier choix du menu JOUEUR "continuer/nouvelle partie"
					//A FAIRE sur la partie carte/template/carte.tpl + javascript
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
					
						
					/*
					 * Chargement de la carte selectionnee par l'utilisateur
					*/
					
					$oCarte = ManagerCarte::getInstance()->getById(intval($_POST['id']));
					debug($oCarte);
					// Image de fond a remplacer par l'image de la carte selectionnee
					//a voir si on peut optimiser

					$smarty->assign('cheminImageFond',str_replace(_DIR_IMGS_CARTES_,_URL_IMGS_CARTES_,searchFile(_DIR_IMGS_CARTES_,$oCarte->getNom().'.jpg')));
					
					/* Creation image de fond a la volee */
					ManagerCarte::getInstance()->creePlateauCarte(searchFile(_DIR_IMGS_CARTES_,$oCarte->getNom().'.jpg'),(_TAILLE_CASE_X_ * $oCarte->getNb_cases_x()),(_TAILLE_CASE_Y_ * $oCarte->getNb_cases_y()),ManagerCarteplateaux::getInstance()->getFromExtTableCarte($oCarte->getId()));
					
					/* la mini-carte */
					ManagerCarte::getInstance()->creeMiniCarte($oCarte->getNom());
					
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
				}
			} catch (Exception $e) {
				debug('Erreur:<br/>'.$e->getMessage());
				debug($e->getCode());
			}
		} // FIN empty $_POST
		
		//affichage du template
		$smarty->display(_TEMPLATES_CARTE_.'carte.tpl');
	} else {
		//sinon redirige vers 404
		require_once('index.php');
	}
?>