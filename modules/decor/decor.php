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
	require_once _INCLUDES_DECOR_.'fonctions.inc.php';
	
	/* Connexion Base de donnees */
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	
	
	//liste des decors
	$smarty->assign('listeDecor',ManagerDecor::getInstance()->getById());
	
	//Liste des images des decors
	$smarty->assign('listeImagesDecor',listeImages(_DIR_IMGS_DECOR_));
	
	$smarty->display(_TEMPLATES_DECOR_.'decor.tpl');
?>