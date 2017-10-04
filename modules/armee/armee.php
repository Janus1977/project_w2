<?php
	$pathToConfig='config/config.php';
	$i=0;
	while (!file_exists($pathToConfig)) {
	    if($i>10) {
	        echo 'Impossible de trouver les fichiers de configuration global,<br/>remplacement par celui du module';
	        $pathToConfig='config/config.php';
	        break;
	    }
	    
	    $pathToConfig='../'.$pathToConfig;
	    $i++;
	}
	require_once $pathToConfig;	
	
	/* FONCTIONS GENERIQUES */
	require_once _DIR_INCLUDES_BASE_.'fonctions.inc.php';
	
	/* FONCTIONS SPECIFIQUES */
	require_once _INCLUDES_ARMEE_.'fonctions.inc.php';
	
	/* Connexion Base de donnees */
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	
	/////////////////
	// A COMPLETER //
	/////////////////
	if (empty($_POST['id'])) {
		$aListeArmeesBd = ManagerArmee::getInstance()->getById();
		$aListeMembres = ManagerMembre::getInstance()->getById();
		$aListeArmeesMembre = array();
		foreach ($aListeArmeesBd AS $armeeBd) {
			if (empty($membre)) {
				$membre = $armeeBd->getMembreObject()->getPseudo();
			} else if ($membre <> $armeeBd->getMembreObject()->getPseudo()) {
				$aListeArmeesMembre[] = array('membre' => $membre,'armees' => $armees);
				$membre = $armeeBd->getMembreObject()->getPseudo();
				$armees = array();
			}
			$armees[] = array('id'=>$armeeBd->getId(),'nom'=>$armeeBd->getNom());
		}
		//ne pas oublier la derniere ligne
		$aListeArmeesMembre[] = array('membre' => $membre,'armees' => $armees);
		$smarty->assign('aListeArmeesMembre',$aListeArmeesMembre);
		$smarty->assign('aListeMembres',$aListeMembres);
	} else {
		//informations sur une armee
		$oArmee = ManagerArmee::getInstance()->getById(intval($_POST['id']));
		
	}

	$smarty->display(_TEMPLATES_ARMEE_.'armee.tpl');
?>