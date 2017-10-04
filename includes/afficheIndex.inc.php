<?php
	// Chargement SMARTY
	//deja fait dans config
// 	require_once _SMARTY_LOAD_;
	$smarty->assign('CHARSET',_CHARSET_);
	
	/* Les URLs */

	/* BASE */
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	$smarty->assign('URL_REDIR',_URL_BASE_);
	
	/* INCLUDES */
	$smarty->assign('URL_INCLUDES_BASE',_URL_INCLUDES_BASE_);
	
	
	/* MODULES */
	$smarty->assign('URL_MODULES_BASES',_URL_MODULES_BASES_);
	
	/* IMAGES */
	$smarty->assign('URL_IMAGES',_URL_IMGS_);
	$smarty->assign('URL_IMGS_SOL',_URL_IMGS_PLATEAUX_);
	$smarty->assign('URL_IMGS_DECORS',_URL_IMGS_DECORS_);
	$smarty->assign('URL_MINIATURE',_URL_MINIATURES_);
	
	/* TEMPLATES */	
	$smarty->assign('TPL_BASE',_TEMPLATES_BASE_);
	$smarty->assign('URL_TEMPLATES_BASE',_URL_TEMPLATES_BASE_);
	$smarty->assign('DIR_TEMPLATES_BASE',_TEMPLATES_BASE_);
	$smarty->assign('TPL_CARTE',_TEMPLATES_CARTE_);
	$smarty->assign('TPL_MINI_CARTE',_TEMPLATES_MINI_CARTE_);
	
	$smarty->assign('URL_EQUIPEMENT',_URL_MODULE_EQUIPEMENT_);
	$smarty->assign('URL_INCLUDES_EQUIPEMENT',_URL_INCLUDES_EQUIPEMENT_);
	$smarty->assign('URL_INCLUDES_INSCRIPTION',_URL_INCLUDES_INSCRIPTION_);
	$smarty->assign('TEMPLATE_INSCRIPTION',_TEMPLATES_INSCRIPTION_);
	$smarty->assign('URL_IMGS_EQUIPEMENT',_URL_IMGS_EQUIPEMENT_);
	
	$smarty->assign('URL_TUTOS',_URL_TUTOS_);
	
	$smarty->assign('TPL_BASES',_TEMPLATES_BASE_);
	
	$smarty->assign('TITRE',_PROJET_);
	
	$aListeModulesSmarty = array();
	foreach (ManagerModule::getInstance()->getById() AS $module) {
		if (isset($_SESSION['staffSession']) && $_SESSION['staffSession'] == 0 && $module->getActif() == 2) {
			$aListeModulesSmarty[] = $module;
		}
		if (isset($_SESSION['staffSession']) && $_SESSION['staffSession'] == 1) {
			$aListeModulesSmarty[] = $module;
		}
	}
	$smarty->assign('aListeModulesSmarty',$aListeModulesSmarty);
	
	$smarty->assign('identifieAdmin',false);
	$smarty->assign('dateHeure',date("Y,m,d,H,i,s"));
	$smarty->assign('inscriptionOK',$_SESSION['MODULES']['INSCRIPTION']);
	
	if (!empty($_SESSION['user'])) {
		$smarty->assign('user',$_SESSION['user']);
		$smarty->assign('listeCartes',ManagerCarte::getInstance()->getCartesDisponibles());
	}
	$smarty->assign('listeParties',ManagerPartie::getInstance()->getById());
	$smarty->display(_TEMPLATES_BASE_.'index.tpl');
?>