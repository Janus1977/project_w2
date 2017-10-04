<?php
	$path='../../config/config.php';
	$i=0;
	while (!file_exists($path)) {
	    if($i>10) {
	        echo 'Impossible de trouver les fichiers de configuration';
	        exit;
	    }
	    
	    $path='../'.$path;
	    $i++;
	}
	
	require_once $path;
	
	/* FONCTIONS GENERIQUES */
	require_once _DIR_BASE_.'includes/fonctions.inc.php';
	
	/* FONCTIONS SPECIFIQUES */
// 	require_once _DIR_BASE_.'modules/traitement_image/includes/fonctions.inc.php';
	require_once _INCLUDES_TRAITEMENT_IMAGE_.'fonctions.inc.php';
	
	
	require_once _SMARTY_LOAD_;
	$smarty->assign('charset',_CHARSET_);
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	$smarty->assign('TPL_BASE',_TEMPLATES_BASE_);
	
	$_GET = protectionFormulaire($_GET);
	
// 	debug($_GET);
	
	if (empty($_GET['repertoireDestination'])) {
		debug("vous devez choisir un r&eacute;pertoire de destination.");
	} else {
//		$cheminVersImageSource = searchFile(_DIR_IMGS_BRUTES_,$_GET['imageSource']);
		$cheminVersImageSource = $_GET['imageSource'];
		
		/* Les anciennes dimensions en pixels */
		list($largeur_px,$hauteur_px) = getimagesize($cheminVersImageSource);
		
		/* Traitement de la largeur */
		if ($largeur_px > _TAILLE_CASE_X_) {
			$largeur_cases = $largeur_px / _TAILLE_CASE_X_;
// 			debug($largeur_cases);
			$partieDecimale = (int) str_replace('.','',$largeur_cases - (int) $largeur_cases);
// 			debug($partieDecimale);
			if ($partieDecimale > 500) {
				$largeur_cases = ceil($largeur_cases);
			} else {
				$largeur_cases = floor($largeur_cases);
			}
		} else {
			$largeur_cases = floor($largeur_cases) + 1;
		}

		
		/* Traitement de la hauteur */
		if ($hauteur_px > _TAILLE_CASE_Y_) {
			$hauteur_cases = $hauteur_px / _TAILLE_CASE_Y_;
// 			debug($hauteur_cases);
			$partieDecimale = (int) str_replace('.','',$hauteur_cases - (int) $hauteur_cases);
// 			debug($partieDecimale);
			if ($partieDecimale > 500) {
				$hauteur_cases = ceil($hauteur_cases);
			} else {
				$hauteur_cases = floor($hauteur_cases);
			}
		} else {
			$hauteur_cases = floor($hauteur_cases) + 1;
		}
		
// 		debug($cheminVersImageSource);
// 		debug(($largeur_cases * _TAILLE_CASE_X_));
// 		debug(($hauteur_cases * _TAILLE_CASE_Y_));
		
		redimensionne($cheminVersImageSource,($largeur_cases * _TAILLE_CASE_X_),($hauteur_cases * _TAILLE_CASE_Y_));
		
		$cheminVersImageRedimensionnee = str_replace(_DIR_IMGS_DECORS_,_DIR_IMGS_.$_GET['repertoireDestination'].'/',$cheminVersImageSource);
// 		debug($cheminVersImageSource);
// 		debug($cheminVersImageRedimensionnee);
		/* Deplacement de l'image vers sa destination */
		if (copy($cheminVersImageSource,$cheminVersImageRedimensionnee)) {
// 			debug("copie effectu&eacute;e dans le r&eacute;pertoire destination");
			unlink($cheminVersImageSource);
		} else {
			unset($cheminVersImageSource);
// 			debug("Erreur copie effectu&eacute;e dans le r&eacute;pertoire destination");
		}		
		
		$smarty->assign('random',time());
	    $smarty->assign('WIDTH',$largeur_cases);
	    $smarty->assign('HEIGHT',$hauteur_cases);
	    $smarty->assign('CASE_WIDTH',($largeur_cases * _TAILLE_CASE_X_));
	    $smarty->assign('CASE_HEIGHT',($hauteur_cases * _TAILLE_CASE_Y_));
	    $smarty->assign('MODIFIE',false);
		$smarty->assign('IMG',str_replace(_DIR_IMGS_,_URL_IMGS_,$cheminVersImageRedimensionnee));
		$smarty->display(_TEMPLATES_BASE_.'affiche_image.tpl');
	}
?>