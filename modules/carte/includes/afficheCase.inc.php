<?php
	$path=$_SERVER['DOCUMENT_ROOT'].'/project_w2/config/config.php';
//	$i=0;
//	while (!file_exists($path)) {
//	    if($i>10) {
//	        echo 'Impossible de trouver les fichiers de configuration';
//	        exit;
//	    }
//	    
//	    $path='../'.$path;
//	    $i++;
//	}
	
	require_once $path;
	require_once($_SERVER['DOCUMENT_ROOT'].'/project_w2/includes/smarty.inc.php');
//	require_once _DIR_BASE_ . 'lib/smarty/Smarty.class.php';
	
	/* FONCTIONS GENERIQUES */
	require_once _DIR_INCLUDES_BASE_.'fonctions.inc.php';
	
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	
	/* FONCTIONS SPECIFIQUES */
	require_once _INCLUDES_TRAITEMENT_CARTE_.'fonctions.inc.php';
	
	$_POST = protectionFormulaire($_POST);
	
	if (!empty($_POST['editionCarte'])) {
		$editionCarte = true;
	} else {
		$editionCarte = false;
	}
	
	require_once _SMARTY_LOAD_;
	$smarty->assign('charset',_CHARSET_);
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	$smarty->assign('url_redir',_URL_BASE_);
	$smarty->assign('VIDE',_CASE_VIDE_);
	$smarty->assign('PLATEAU',_CASE_PLATEAU_);
	$smarty->assign('DECOR',_CASE_DECOR_); 		// == plateau + decor
	$smarty->assign('LIEN',_CASE_LIEN_);		//case lien entre les cartes
	
	if (!defined('_EDITION_CARTE_')) {
		define('_EDITION_CARTE_',true);
	}
	
	$smarty->assign('case',ManagerTile::getInstance()->getById(intval($_POST['id'])));
	$smarty->assign('URL_IMGS',_URL_IMGS_);
	$smarty->assign('TAILLE_CASE_X',_TAILLE_CASE_X_);
	$smarty->assign('TAILLE_CASE_Y',_TAILLE_CASE_Y_);
	$smarty->assign('xDebut',1);
	$smarty->assign('yDebut',1);
	$smarty->assign('EDITION_CARTE',$editionCarte);
	
	/*
	 * La partie JS du mouseOver du DIV de la case
	 */
	$actionJavascriptSupplementaire = "";
	$typeDAction = "";
	if (!_EDITION_CARTE_) {
	    switch($typeDAction) {
	        case _DEPLACEMENT_: {
	            if (!empty($caseDeLUniteSelectionnee)) {
	                echo ' caseAccessible(this,'.$caseDeLUniteSelectionnee->getX().','.$caseDeLUniteSelectionnee->getY().','.$this->getX().','.$this->getY().',\'_DEPLACEMENT_\');';
	            }
	            break;
	        }
	        case _ATTAQUE_: {
	            if (!empty($caseDeLUniteSelectionnee)) {
	                echo ' caseAccessible(this,'.$caseDeLUniteSelectionnee->getX().','.$caseDeLUniteSelectionnee->getY().','.$this->getX().','.$this->getY().',\'_ATTAQUE_\');';
	            }
	            break;
	        }
	        case _CHARGE_: {
	            if (!empty($caseDeLUniteSelectionnee)) {
	                echo ' caseAccessible(this,'.$caseDeLUniteSelectionnee->getX().','.$caseDeLUniteSelectionnee->getY().','.$this->getX().','.$this->getY().',\'_CHARGE_\');';
	            }
	            break;
	        }
	    }
	}
	$smarty->assign('actionJavascriptSupplementaire',$actionJavascriptSupplementaire);

	$smarty->assign('majCase',true);
	
	$smarty->display(_TEMPLATES_CARTE_.'case.tpl');
?>
