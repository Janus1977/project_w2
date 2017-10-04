<?php
	/**
	 * Script d'affichage d'une image appele par la partie traitement image
	 * dans un premier temps, seul l'affichage est realise.
	 * Puis lorsque les deux affichages seront bons, il faudra mettre en place
	 * les differentes actions sur l'image source vers l'image cible.
	 */
	 
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
	$smarty->assign('CHARSET',_CHARSET_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('TPL_BASE',_TEMPLATES_BASE_);

	$_GET = protectionFormulaire($_GET);

//	$cheminVersImage = $_GET['cheminImage'];
	$nomImage = basename($_GET['cheminImage']);
    list($width, $height) = getimagesize($_GET['cheminImage']);
    
    $smarty->assign('WIDTH',$width);
    $smarty->assign('HEIGHT',$height);
    
	$smarty->assign('random',time());
    
    /* 1) qui est la cible du script ? */
    if (empty($_GET['action'])) {
    	/* Pas de modification, c'est l'image initiale */
//    	$cheminVersImage = searchFile(_IMGS_,$_POST['nomImage']);
//	    list($width, $height) = getimagesize($cheminVersImage);
//	    $smarty->assign('WIDTH',$width);
//	    $smarty->assign('HEIGHT',$height);
	    
	    //chemin en dur pour test
	    $smarty->assign('IMG',str_replace(_DIR_IMGS_,_URL_IMGS_,$_GET['cheminImage']));
	    list($width, $height) = getimagesize($_GET['cheminImage']);
	    $smarty->assign('WIDTH',$width);
	    $smarty->assign('HEIGHT',$height);
	    $smarty->assign('CASE_WIDTH',($width / _TAILLE_CASE_X_));
	    $smarty->assign('CASE_HEIGHT',($height / _TAILLE_CASE_Y_));
		$smarty->assign('MODIFIE',false);
		$smarty->display(_MODULES_BASES_.'traitement_image/templates/affichage.tpl');
		
    } else {
	    if (!empty($_GET['action'])) {
	    	if (!intval($_GET['action'])) {
	    		/* ce n'est pas une rotation d'image */
	    		if (trim($_GET['action']) == 'miniature_add') {
	    			/* Creation de la miniature de l'image */
	    			$cheminVersMiniature = creeMiniature($_GET['cheminImage'],_LARGEUR_MINIATURE_,_HAUTEUR_MINIATURE_);
	    			echo '<br>Miniature cr&eacute;&eacute;e:<br/>'.$cheminVersMiniature;
	    		} else if(trim($_GET['action']) == 'miniature_del') {
	    			/* Suppression de la miniature de l'image */
	    			if (supprimeMiniature(_MINIATURES_.$nomImage)) {
	    				echo '<br>Miniature supprim&eacute;e';
	    			} else {
	    				echo '<br>&Eacute;chec dans la suppression de la miniature';
	    			}
	    		} else {
	    			echo '<br>Option non impl&eacute;ment&eacute;e';
	    		}
	    		$smarty->assign('IMG',str_replace(_DIR_IMGS_,_URL_IMGS_,$_GET['cheminImage']));
	    	} else {
	    		$cheminVersNouvelleImage = rotate(str_replace( _URL_IMGS_, _DIR_BASE_ ,$_GET['cheminImage']),intval($_GET['action']));
	    		list($width, $height) = getimagesize(str_replace(_URL_BASE_,_DIR_BASE_,$cheminVersNouvelleImage));
			    $smarty->assign('WIDTH',$width);
			    $smarty->assign('HEIGHT',$height);
			    $smarty->assign('CASE_WIDTH',($width / _TAILLE_CASE_X_));
			    $smarty->assign('CASE_HEIGHT',($height / _TAILLE_CASE_Y_));
			    $smarty->assign('MODIFIE',true);
	    		$smarty->assign('IMG',$cheminVersNouvelleImage);	    		
	    	}
	    }
	    $smarty->display(_TEMPLATES_BASE_.'affiche_image.tpl');
    }
?>