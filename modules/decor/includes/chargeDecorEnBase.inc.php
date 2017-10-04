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
	require_once _DIR_INCLUDES_BASE_.'fonctions.inc.php';
	
	/* Connexion Base de donnees */
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	
	/* FONCTIONS SPECIFIQUES */
	require_once _INCLUDES_DECOR_.'fonctions.inc.php';
	
	require_once _SMARTY_LOAD_;
	$smarty->assign('charset',_CHARSET_);
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	
	$_POST = protectionFormulaire($_POST);
	
	debug("dans chargeDecorEnBase");
	
	$listeImagesDecor = array();
	//temporaire car doit etre gere par BD
	listeImages(_DIR_IMGS_DECORS_,$listeImagesDecor);
	
	$oNewDecor = ManagerDecor::getInstance()->getDecorVide();
	
	foreach ($listeImagesDecor AS $imageDecor) {
		try {
			$oNewDecor->setChemin($imageDecor['nom']);
			$oNewDecor->setNom(substr($imageDecor['nom'],0,strpos($imageDecor['nom'],'.')));
		
			list($largeurImageDecor,$hauteurImageDecor) = getimagesize($imageDecor['chemin']);
		
			//on va cherche la dimension en case de l'image
			$largeurCase = $largeurImageDecor / (_TAILLE_CASE_X_ - 10); //taille case == 40, taille image == 30
			$hauteurCase = $hauteurImageDecor / (_TAILLE_CASE_Y_ - 10);
			
			$oDimension = ManagerDimension::getInstance()->getByLargeurAndLongueur($largeurCase, $hauteurCase);
			$oNewDecor->setDimension($oDimension->getId());
			ManagerDecor::getInstance()->save($oNewDecor);
			debug("<b>".$oNewDecor->getNom()."</b> est int&eacute;gr&eacute; &agrave; la table '<b>d&eacute;cor</b>'");
		} catch (Exception $nfe) {
			if (strpos($nfe->getMessage(), 'Duplicate entry')) {
				debug($oNewDecor->getNom()." est d&eacute;j&agrave; en base");
			} else {
				debug($nfe->getMessage());
			}			
		}
	}