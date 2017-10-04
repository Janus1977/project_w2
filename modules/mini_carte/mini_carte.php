<?php
	/*
	 * Differents tests:
	 * 		- 1 case == 1px   => trop petit
	 * 		- 1 case == 2x2px => trop petit
	 * 		- 1 case == 4x4px => peu aller => OK
	 * 		- 1 case == 8x8px => trop grand pour le test (20x20 cases)
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
	
	/* FONCTIONS GENERIQUES */
	require_once _DIR_BASE_.'includes/fonctions.inc.php';
	
	/* Connexion Base de donnees */
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	
	/* FONCTIONS SPECIFIQUES */
	require_once _INCLUDES_MINI_CARTE_.'fonctions.inc.php';
	
	require_once _SMARTY_LOAD_;
	$smarty->assign('charset',_CHARSET_);
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	
	/* Traitement du cas de l'acces au module mini-carte directement */
	if (empty($_POST)) {
		/* Acces direct via l'url */
		$smarty->assign('accesDirect',true);
		
		//1) nombre de mini carte
		$aListeMiniCartes = new DirectoryIterator(_DIR_IMGS_MINI_CARTES_);
		$aListeMiniCartesSmarty = array();
		foreach ($aListeMiniCartes AS $file) {
			if ($file->getExtension() == 'jpg') {
				list($width,$height) = getimagesize(_DIR_IMGS_MINI_CARTES_.$file->getFilename());
				debug(_TAILLE_CASE_X_);
				debug($width);
				debug($width/_TAILLE_CASE_X_);
				$aListeMiniCartesSmarty[] = array('nom'=>$file->getFilename(),'dimension' =>'('.floor($width/_TAILLE_CASE_X_).'x'.floor($height/_TAILLE_CASE_Y_).'cases)');
			}
		}
		$smarty->assign('aListeMiniCartesSmarty',$aListeMiniCartesSmarty);
		$smarty->assign('urlMiniCartesSmarty',_URL_IMGS_MINI_CARTES_);
	} else {
		/* Acces via un outil */
		$smarty->assign('accesDirect',false);
		
		$_POST = protectionFormulaire($_POST);
		
		if (!empty($_POST)) {
			/* L'image de la mini carte existe */
			try  {
				$oManagerCarte = ManagerCarte::getInstance();
				$oCarteEnEdition = $oManagerCarte->getCarteEnEdition(intval($_POST['id']));
		
// 				foreach ($data AS $carte) {
					$smarty->assign('dataMiniCarte',true);
					$smarty->assign('nomCarte',$oCarteEnEdition->getNom());
					$cheminVersImageMiniCarte = searchFile(_DIR_IMGS_MINI_CARTES_,$oCarteEnEdition->getNom().'.jpg');
						
					/* les dimensions de la mini carte */
					list($width,$height) = getimagesize($cheminVersImageMiniCarte);
					$smarty->assign('largeurCarte',$width);
					$smarty->assign('hauteurCarte',$height);
						
					/* Image de fond a remplacer par l'image de la carte selectionnee */
					$smarty->assign('cheminImageMiniCarte',str_replace(_DIR_IMGS_MINI_CARTES_,_URL_IMGS_MINI_CARTES_,$cheminVersImageMiniCarte));
					$smarty->assign('random',time());
// 				}
			} catch (Exception $e) {
				debug('Erreur:<br/>'.$e->getMessage());
				debug($e->getCode());
			}
		} else {
			/* Pas d'image pour le depart */
			$smarty->assign('dataMiniCarte',false);
			$smarty->assign('x',$_POST['x']);
			$smarty->assign('y',$_POST['y']);
			$smarty->assign('largeurCarte',1);
			$smarty->assign('hauteurCarte',1);
			$smarty->assign('cheminImageMiniCarte',_URL_IMGS_CARTES_.'blanc.png');
		}
		
		$smarty->assign('cheminPointRouge',_URL_IMGS_.'pointRouge.jpg');
		/* Pour test */
		$smarty->assign('dataPosition',true);
		$smarty->assign('positionTop',floor((5 * _TAILLE_CASE_Y_) / 10)); //coordonnees Y=5
		$smarty->assign('positionLeft',floor((9 * _TAILLE_CASE_Y_) / 10)); //coordonnees X=9
	}	

	$smarty->display(_TEMPLATES_MINI_CARTE_.'mini_carte.tpl');
?>
