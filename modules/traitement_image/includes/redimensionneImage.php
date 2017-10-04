<?php
	$path='config/config.php';
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
	require_once _DIR_BASE_.'lib/smarty/Smarty.class.php';
	/* FONCTIONS GENERIQUES */
	require_once _DIR_BASE_.'includes/fonctions.inc.php';
	/* FONCTIONS SPECIFIQUES */
	require_once _DIR_BASE_.'modules/traitement_image/includes/fonctions.inc.php';
	
	
	$smarty = new Smarty();
	$smarty->compile_dir = _SMARTY_COMPILE_;
	$smarty->assign('charset',_CHARSET_);
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	$smarty->assign('TPL_BASE',_TPL_BASE_);
	
	$_GET = protectionFormulaire($_GET);
	
	if (empty($_GET['repertoireDestination'])) {
		debug("vous devez choisir un r&eacute;pertoire de destination.");
	} else {
		$cheminVersImageSource = searchFile(_DIR_IMGS_BRUTES_,$_GET['imageSource']);
				
		/* Les anciennes dimensions en pixels */
		list($largeur_px,$hauteur_px) = getimagesize($cheminVersImageSource);
		
		/* Traitement de la largeur */
		$largeur_cases = $largeur_px / _TAILLE_CASE_X_;
		$partieDecimale = (int) str_replace('.','',$largeur_cases - (int) $largeur_cases);
		if ($partieDecimale > 500) {
			$largeur_cases = ceil($largeur_cases);
		} else {
			$largeur_cases = floor($largeur_cases);
		}
		
		/* Traitement de la hauteur */
		$hauteur_cases = $hauteur_px / _TAILLE_CASE_Y_;
		$partieDecimale = (int) str_replace('.','',$hauteur_cases - (int) $hauteur_cases);
		if ($partieDecimale > 500) {
			$hauteur_cases = ceil($hauteur_cases);
		} else {
			$hauteur_cases = floor($hauteur_cases);
		}
		
		redimensionne($cheminVersImageSource,($largeur_cases * _TAILLE_CASE_X_),($hauteur_cases * _TAILLE_CASE_Y_));
		
		$cheminVersImageRedimensionnee = _DIR_IMGS_.$_GET['repertoireDestination'].'/'.$_GET['imageSource'];
		/* Deplacement de l'image vers sa destination */
		if (copy($cheminVersImageSource,$cheminVersImageRedimensionnee)) {
			debug("copie effectu&eacute;e dans le r&eacute;pertoire destination");
		} else {
			unset($cheminVersImageSource);
			debug("Erreur copie effectu&eacute;e dans le r&eacute;pertoire destination");
		}		
		
	    $smarty->assign('WIDTH',($largeur_cases * _TAILLE_CASE_X_));
	    $smarty->assign('HEIGHT',($hauteur_cases * _TAILLE_CASE_Y_));
	    $smarty->assign('MODIFIE',false);
		$smarty->assign('IMG',str_replace(_DIR_IMGS_,_URL_IMGS_,$cheminVersImageRedimensionnee));
		$smarty->display(_TPL_BASE_.'affiche_image.tpl');
	}
?>
