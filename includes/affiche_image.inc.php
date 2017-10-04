<?php
	/*
	 * Script permettant de faire une "preview" sur une image
	 */

	$pathToConfig='config/config.php';
	$i=0;
	while (!file_exists($pathToConfig)) {
	    if($i>10) {
	        echo 'Impossible de trouver les fichiers de configuration';
	        exit;
	    }
	    
	    $pathToConfig='../'.$pathToConfig;
	    $i++;
	}
	
	require_once $pathToConfig;

	/* FONCTIONS GENERIQUES */
	require_once _DIR_BASE_.'includes/fonctions.inc.php';
	require_once _INCLUDES_TRAITEMENT_CARTE_.'fonctions.inc.php';


	require_once _SMARTY_LOAD_;
	$smarty->assign('charset',_CHARSET_);
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	
	
	if (!empty($_POST)) {
		/* Creation d'une miniature */
		if (!empty($_POST['action']) && $_POST['action'] == 'creerMiniature') {
			$cheminVersMiniature = creeMiniature(str_replace(_URL_BASE_, _DIR_BASE_ , $_POST['src']),_LARGEUR_MINIATURE_,_HAUTEUR_MINIATURE_);
		} else {
			$cheminVersMiniature = str_replace(_URL_BASE_, _DIR_BASE_ , $_POST['src']);
		}
		if (!empty($cheminVersMiniature) && is_file($cheminVersMiniature)) {
			$smarty->assign('IMG',str_replace(_DIR_BASE_ , _URL_BASE_, $cheminVersMiniature));
			/*Recuperation des donnees de l'image reelle */
			// 1)remplacer DIR_MINIATURE par DIR_PLATEAUX
			$cheminVersImagePlateau = str_replace(_DIR_MINIATURES_,_DIR_IMGS_PLATEAUX_,$cheminVersMiniature); 
		    list($width_r, $height_r) = getimagesize($cheminVersImagePlateau);
		    list($width, $height) = getimagesize($cheminVersMiniature);
		    $smarty->assign('WIDTH',$width);
		    $smarty->assign('HEIGHT',$height);
		    $smarty->assign('CASE_WIDTH',($width_r / _TAILLE_CASE_X_));
		    $smarty->assign('CASE_HEIGHT',($height_r / _TAILLE_CASE_Y_));
		    $smarty->assign('random',time());
			$smarty->assign('pasDeMiniature',false);
		} else {
			$smarty->assign('nomImage',basename($cheminVersMiniature));
			/* il faut donner le chemin vers le decor ou le sol selectionne */
			if ($_POST['type'] == 'plateau') {
				/* recherche de sol */
				$smarty->assign('cheminVersImage',str_replace(_DIR_MINIATURES_, _URL_IMGS_PLATEAUX_ , $cheminVersMiniature));
			} else {
				/* recherche de decor */
				$smarty->assign('cheminVersImage',str_replace(_DIR_MINIATURES_, _URL_IMGS_DECORS_ , $cheminVersMiniature));
			}
			$smarty->assign('pasDeMiniature',true);
		}
	}
	$smarty->display(_TEMPLATES_BASE_.'affiche_image.tpl');
?>
