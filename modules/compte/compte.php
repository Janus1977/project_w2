<?php
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
	require_once _DIR_INCLUDES_BASE_.'fonctions.inc.php';
	
	/* FONCTIONS SPECIFIQUES */
	require_once _INCLUDES_COMPTE_.'fonctions.inc.php';
	
	/* Connexion Base de donnees */
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';

	/* Que fait-on ? */
	if (!empty($_POST['template']) && $_POST['template'] == 1) {
		/* On doit gerer les avatars */
		$template = 'Avatars';
	} else {
		$template = 'Compte';
	}
	
	if (!empty($_FILES)) {
		/* On ajoute un avatar a sa liste d'avatar(s) */
		if (!empty($_FILES['monAvatar'])) {
			/* Les valeurs sont-elles correcte ? */
			if ($_FILES['monAvatar']['size'] <= 25000) {
				/* Bon poids de fichier */
				list($width,$height) = getimagesize($_FILES['monAvatar']['tmp_name']);
				if (!empty($_POST['redimensionner']) && $_POST['redimensionner']) {
					echo '<br/>Demande de redimensionner l\'image de ('.$width.', '.$height.')';
					echo ' vers ('._LARGEUR_AVATAR_.', '._HAUTEUR_AVATAR_.')';
				} else {
					if ($width <= _LARGEUR_AVATAR_) {
						if ($height <= _HAUTEUR_AVATAR_) {
							/* bonne hauteur*/
							ajouteAvatarAuSprite($_FILES['monAvatar']['tmp_name'],'test');
						} else {
							echo '<br>La hauteur ('.$height.'px) est sup&eacute;rieure &agrave; '._HAUTEUR_AVATAR_;
						}
					} else {
						echo '<br>La largeur ('.$width.'px) est sup&eacute;rieure &agrave; '._LARGEUR_AVATAR_;
					}
				}
			} else {
				/* Erreur */
				echo '<br>Le poids est sup&eacute;rieure &agrave; '._POIDS_AVATAR_;
			}
		}
	}
	
	/* Chargement des avatar du compte */
	//pour test
	if (empty($_SESSION['compte'])) {
		$_SESSION['compte'] = ManagerMembre::getInstance()->getById(12); // pour test chargement ID12
		$_SESSION['derniere_connexion'] = ManagerConnectes::getInstance()->getFromExtTableMembre(12);
	}
	//fin pour test

	$nombreAvatarsDispos = 0;
	if (file_exists(_DIR_IMGS_COMPTE_.$_SESSION['compte']->getPseudo().'.jpg')) {
		/* On va compter le nombre d'avatars disponibles */
		list($width,$height) = getimagesize(_DIR_IMGS_COMPTE_.$_SESSION['compte']->getPseudo().'.jpg');
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
	
	/* Donnees pour l'avatar en cours */
	$smarty->assign('xAvatar',$_SESSION['compte']->getAvatar() * _LARGEUR_AVATAR_);
	$smarty->assign('yAvatar',0);
	/*Chargement de l'avatar en cour d'utilisation */
	$smarty->assign('indiceAvatarActuel',$_SESSION['compte']->getAvatar());
	
	/* Donnees pour l'affichage des avatars du compte */
	$smarty->assign('nombreAvatarsDispos',$nombreAvatarsDispos);

	$smarty->assign('TEMPLATES_COMPTE',_TEMPLATES_COMPTE_);
	$smarty->assign('URL_TEMPLATES_COMPTE',_URL_TEMPLATES_COMPTE_);
	$smarty->assign('URL_COMPTE',_URL_MODULE_COMPTE_);
	$smarty->assign('URL_MODULES_BASE',_URL_MODULES_BASES_);
	$smarty->assign('URL_INCLUDES_BASE',_URL_INCLUDES_BASE_);
	$smarty->assign('URL_INCLUDES_COMPTE',_URL_INCLUDES_COMPTE_);
	$smarty->assign('URL_JAVASCRIPT_COMPTE',_URL_JAVASCRIPT_COMPTE_);
	$smarty->assign('URL_IMAGE_COMPTE',_URL_IMGS_COMPTE_.$_SESSION['compte']->getPseudo().'.jpg');
	$smarty->assign('URL_IMAGES',_URL_IMGS_);
	
	$smarty->assign('random',time());
	
	/* le template a afficher gereCompte / gereAvatar */
	$smarty->assign('template',$template);
	$smarty->display(_TEMPLATES_COMPTE_.'compte.tpl');
?>