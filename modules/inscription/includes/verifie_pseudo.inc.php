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
	
	/* Connexion Base de donnees */
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	
// 	/* FONCTIONS SPECIFIQUES */
// 	require_once _INCLUDES_TRAITEMENT_CARTE_.'fonctions.inc.php';
	
	$oMembre = ManagerMembre::getInstance()->getByPseudo($_POST['userpseudo']);
	
	if (!empty($oMembre) && sizeof($oMembre) > 0) {
		alerte('Un membre <b><i>'.$_POST['userpseudo'].'</i></b> existe d&eacute;j&agrave;. Nous vous proposons de le changer.');
	}
?>