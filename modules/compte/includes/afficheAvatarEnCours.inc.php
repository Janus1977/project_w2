<?php
	$path='../../config/config.php';
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
	
	/* LIBRAIRIE SMARTY */
	require_once _DIR_BASE_ .'lib/smarty/Smarty.class.php';
	
	/* FONCTIONS GENERIQUES */
	require_once _DIR_INCLUDES_BASE_.'fonctions.inc.php';
	
	/* FONCTIONS SPECIFIQUES */
	require_once _INCLUDES_COMPTE_.'fonctions.inc.php';
	
	/* Connexion Base de donnees */
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';

	/* pour TEST */
	$compte = 'test';
	
	require_once _SMARTY_LOAD_;
	
	$smarty->assign('charset',_CHARSET_);
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	
	/* Donnees generiques sur un avatar */
	$smarty->assign('largeurAvatar',_LARGEUR_AVATAR_);
	$smarty->assign('hauteurAvatar',_HAUTEUR_AVATAR_);
	$smarty->assign('poidsAvatar',_POIDS_AVATAR_);
	
	/* Donnees specifique pour l'avatar a afficher */
	$smarty->assign('URL_IMAGE_COMPTE',_URL_IMGS_.$compte.'.jpg');
	$smarty->assign('xAvatar',((! intval($_POST['idAvatar'])) ? 0 :intval($_POST['idAvatar'])) * _LARGEUR_AVATAR_);
	$smarty->assign('yAvatar',0);
	$smarty->assign('idDiv','avatarEnCours');
	$smarty->assign('indiceAvatarActuel',intval($_POST['idAvatar']));
	
	$smarty->assign('random',time());
	
	$smarty->display(_TEMPLATES_COMPTE_.'avatar.tpl');
?>
