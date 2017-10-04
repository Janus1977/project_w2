<?php
	/**
	 * Fichier point d'entree du module de traitement de la carte
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
	
	/* PASSAGE EN MODE EDITION */
	$_SESSION['editionCarte'] = 1;

	/* FONCTIONS GENERIQUES */
	require_once _DIR_INCLUDES_BASE_.'fonctions.inc.php';
	
	/* Connexion Base de donnees */
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	
	/* FONCTIONS SPECIFIQUES */
	require_once _INCLUDES_TRAITEMENT_CARTE_.'fonctions.inc.php';
	
	$_SESSION['parametres_carte']['nb_cases_en_x'] = 10;
	$_SESSION['parametres_carte']['nb_cases_en_y'] = 10;
	
	$aParamCaseMaxX = array();
	$aParamCaseMaxY = array();
	for ($i = 1; $i < _TAILLE_MAX_CARTE_; $i++) {
		if ($i <= $_SESSION['parametres_carte']['nb_cases_en_x']) {
			$aParamCaseMaxX[$i] = $i;
		}
		if ($i <= $_SESSION['parametres_carte']['nb_cases_en_y']) {
			$aParamCaseMaxY[$i] = $i;
		}
		
	}

	require_once _SMARTY_LOAD_;
	
	$smarty->assign('charset',_CHARSET_);
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	
	$smarty->assign('URL_IMAGES',_URL_IMGS_);
	$smarty->assign('URL_IMGS_SOL',_URL_IMGS_PLATEAUX_);
	$smarty->assign('URL_IMGS_DECORS',_URL_IMGS_DECORS_);
	$smarty->assign('URL_MINIATURE',_URL_MINIATURES_);
	
	$smarty->assign('URL_INCLUDES',_URL_INCLUDES_BASE_);
	$smarty->assign('URL_MODULES',_URL_MODULES_BASES_);
	$smarty->assign('TPL_BASE',_TEMPLATES_BASE_);
	$smarty->assign('TPL_CARTE',_TEMPLATES_CARTE_);
	$smarty->assign('TPL_MINI_CARTE',_TEMPLATES_MINI_CARTE_);
	
	$smarty->assign('URL_TUTOS',_URL_TUTOS_);
	
	
	/* La liste des carte en preparation */
	$oManagerCarte = ManagerCarte::getInstance();	
	$listeCartesEnEdition = $oManagerCarte->getCartesEnEdition();
	$smarty->assign('listeCartesEnEdition',$listeCartesEnEdition);
	
	$oManagerDimensionCarte = ManagerDimension::getInstance();
	$listeDimensionsCarte = ManagerType::getInstance()->getById(ManagerType::getInstance()->getByType('carte')->getId());

	$smarty->assign('listeDimensionsCarte',$listeDimensionsCarte);
	
	$smarty->assign('nbCasesDimensionX',$aParamCaseMaxX);
	$smarty->assign('nbCasesDimensionY',$aParamCaseMaxY);
	
	$smarty->assign('previewImage','');
	$smarty->assign('info','');	
	
	$smarty->assign('cheminImageFond',_URL_IMGS_.'blanc.png');
	$smarty->display(_TEMPLATES_TRAITEMENT_CARTE_.'traitement_carte.tpl');
?>
