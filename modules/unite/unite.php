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
	require_once _INCLUDES_UNITE_.'fonctions.inc.php';
	
	/* Connexion Base de donnees */
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	
	/* LIBRAIRIE SMARTY */
	require_once _SMARTY_LOAD_;

	//pour test le staff est a true
// 	$_SESSION['staffSession'] = 1;
	
	//la liste des unites du jeu
	$smarty->assign('listeUnites',ManagerUnite::getInstance()->getById());

	//la liste des unites de joueurs du jeu
	$smarty->assign('listeUnitesJoueurs',ManagerUnite_joueur::getInstance()->getById());
	
	$smarty->assign('TEMPLATES_UNITE',_TEMPLATES_UNITE_);
	
	$smarty->display(_TEMPLATES_UNITE_.'unite.tpl');
?>