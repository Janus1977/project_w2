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
	require_once _DIR_BASE_.'includes/fonctions.inc.php';
	
	spl_autoload_register('autoload');
	require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
	
	/* FONCTIONS SPECIFIQUES */
	require_once _DIR_BASE_.'modules/traitement_carte/includes/fonctions.inc.php';
	
	$_GET = protectionFormulaire($_GET);
	
	if (!empty($_GET['editionCarte'])) {
		$editionCarte = true;
	} else {
		$editionCarte = false;
	}
	
	$smarty = new Smarty();
	$smarty->compile_dir = _SMARTY_COMPILE_;
	$smarty->assign('charset',_CHARSET_);
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	$smarty->assign('url_redir',_URL_BASE_);
	
	if (!defined('_EDITION_CARTE_')) {
		define('_EDITION_CARTE_',true);
	}
	
	$oManagerCases = managerCasesCarte::getInstance();
	$oManagerCases->setConnexion($oPdo);
	$smarty->assign('case',$oManagerCases->getByID(intval($_GET['id'])));
	$smarty->assign('URL_IMGS',_URL_IMGS_);
	$smarty->assign('TAILLE_CASE_X',_TAILLE_CASE_X_);
	$smarty->assign('TAILLE_CASE_Y',_TAILLE_CASE_Y_);
	
	/*
	 * La partie JS du mouseOver du DIV de la case
	 */
	$actionJavascriptSupplementaire = "";
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
	
	$smarty->display(_MODULES_BASES_.'carte/templates/case.tpl');
?>
