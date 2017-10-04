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
	require_once _INCLUDES_EQUIPEMENT_.'fonctions.inc.php';
	
	/* Connexion Base de donnees */
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	
	/* LIBRAIRIE SMARTY */
	require_once _SMARTY_LOAD_;
	
	$smarty->assign('random',time());
	$smarty->assign('jeu',true);

	$smarty->assign('charset',_CHARSET_);
	$smarty->assign('TPL_BASE',_TEMPLATES_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	$smarty->assign('INCLUDES_EQUIPEMENT',_INCLUDES_EQUIPEMENT_);
	$smarty->assign('TEMPLATES_EQUIPEMENT',_TEMPLATES_EQUIPEMENT_);
	$smarty->assign('URL_JAVASCRIPT_EQUIPEMENT',_URL_JAVASCRIPT_EQUIPEMENT_);
	$smarty->assign('URL_EQUIPEMENT',_URL_MODULE_EQUIPEMENT_);
	$smarty->assign('URL_INCLUDES_EQUIPEMENT',_URL_INCLUDES_EQUIPEMENT_);
	$smarty->assign('URL_IMGS_EQUIPEMENT',_URL_IMGS_EQUIPEMENT_);
	
	/* Chargement d'un manager d'equipement */
	if (!empty($_POST)) {
		$_POST = protectionFormulaire($_POST);		
		if (!empty($_POST['id']) && is_numeric($_POST['id'])) {
			/* Affichage de l'equipement passe en parametre */
			$oEquipement = ManagerEquipement::getInstance()->getById(intval($_POST['id']));
			list($width, $height) = getimagesize(_DIR_IMGS_EQUIPEMENT_.$oEquipement->getChemin());
			$smarty->assign('IMG',str_replace(_DIR_BASE_,_URL_BASE_,_DIR_IMGS_EQUIPEMENT_.$oEquipement->getChemin()));
		    $smarty->assign('WIDTH',$width);
		    $smarty->assign('HEIGHT',$height);
			$smarty->assign('TPL_BASE',_TEMPLATES_BASE_);
			$smarty->assign('equipement',$oEquipement);
// 			$smarty->display(_TEMPLATES_EQUIPEMENT_.'equipement.tpl');
			$smarty->display(_TEMPLATES_BASE_.'classes/Equipement.tpl');
		}		
	} else {
		list($width, $height) = getimagesize(_DIR_IMGS_EQUIPEMENT_.'aucune.gif');
		$smarty->assign('IMG',str_replace(_DIR_BASE_,_URL_BASE_,_DIR_IMGS_EQUIPEMENT_.'aucune.gif'));
	    $smarty->assign('WIDTH',$width);
	    $smarty->assign('HEIGHT',$height);
		$smarty->assign('equipement',$oEquipement);
		$smarty->display(_TEMPLATES_BASE_.'classes/Equipement.tpl');
	}
	
	/* Dans tous les cas, chargement de la liste des equipements */
	$smarty->assign('listeEquipements',ManagerEquipement::getInstance()->getById());
	$listeEquipementJoueurs = ManagerEquipement_joueur::getInstance()->getListeEquipementsJoueur();
	$smarty->assign('listeEquipementsJoueur',$listeEquipementJoueurs);

	$smarty->assign('jeu',false);
	$smarty->display(_TEMPLATES_EQUIPEMENT_.'equipement.tpl');
?>
