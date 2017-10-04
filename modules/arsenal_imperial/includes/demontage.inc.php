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
	require_once _INCLUDES_ARSENAL_IMPERIAL_.'fonctions.inc.php';
	
	/* Connexion Base de donnees */
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	
	//la liste des objets du joueur
	$listeObjets = ManagerEquipement_joueur::getInstance()->getRemovableEquipment(28);//$_SESSION['user']->getId());
	
	$smarty->display(_TEMPLATES_ARSENAL_IMPERIAL_.'demontage.tpl');
	echo 'demontage de l\'arsenal imperial';
?>