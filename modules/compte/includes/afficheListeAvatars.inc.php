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
		
	/* FONCTIONS GENERIQUES */
	require_once _DIR_INCLUDES_BASE_.'fonctions.inc.php';
	
	/* FONCTIONS SPECIFIQUES */
	require_once _INCLUDES_COMPTE_.'fonctions.inc.php';
	
	/* Connexion Base de donnees */
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';

	/* pour TEST */
	$compte = 'test';
	
	$nombreAvatarsDispos = 0;
	if (file_exists(_DIR_IMGS_.$compte.'.jpg')) {
		/* On va compter le nombre d'avatars disponibles */
		list($width,$height) = getimagesize(_DIR_IMGS_COMPTE_.$compte.'.jpg');
		$nombreAvatarsDispos = floor($width / _LARGEUR_AVATAR_);
	}
	
	require_once _SMARTY_LOAD_;
	$smarty->assign('charset',_CHARSET_);
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	
	/* Donnees generiques sur un avatar */
	$smarty->assign('largeurAvatar',_LARGEUR_AVATAR_);
	$smarty->assign('hauteurAvatar',_HAUTEUR_AVATAR_);
	$smarty->assign('poidsAvatar',_POIDS_AVATAR_);
	
	/* Donnees pour l'affichage des avatars du compte */
	$smarty->assign('nombreAvatarsDispos',$nombreAvatarsDispos);

	$smarty->assign('TEMPLATES_COMPTE',_TEMPLATES_COMPTE_);
	$smarty->assign('URL_COMPTE',_URL_MODULE_COMPTE_);
	$smarty->assign('URL_INCLUDES_COMPTE',_URL_INCLUDES_COMPTE_);
	$smarty->assign('URL_JAVASCRIPT_COMPTE',_URL_JAVASCRIPT_COMPTE_);
	$smarty->assign('URL_IMAGE_COMPTE',_URL_IMGS_COMPTE_.$compte.'.jpg');
	$smarty->assign('URL_IMAGES',_URL_IMGS_);
	
	$smarty->display(_TEMPLATES_COMPTE_.'listeAvatars.tpl');
?>
