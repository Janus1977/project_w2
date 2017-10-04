<?php
	$path='config/config.php';
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
	
	//Partie à revoir pour ce site pour gérer les modules
	if (empty($_SESSION) || empty($_SESSION['user']) || $_SESSION['user']->getStaff() == 0) {
		//require_once _DIR_BASE_ . 'lib/smarty/Smarty.class.php';
		
		$smarty = new Smarty();
		$smarty->compile_dir = _SMARTY_COMPILE_;
		$smarty->assign('charset',_CHARSET_);
		$smarty->assign('DIR_BASE',_DIR_BASE_);
		$smarty->assign('URL_BASE',_URL_BASE_);
		$smarty->assign('url_redir',_URL_BASE_);
		$smarty->assign('TITRE',$aListeErreurMessages[403]['titre']);
		$smarty->assign('ID_ERREUR','403');
		$smarty->assign('MESSAGE',$aListeErreurMessages[403]['message']);
		$smarty->display(_DIR_BASE_.'templates/msg_erreur.tpl');
	} else {
		require_once(_DIR_MODULES_BASES_.'modules.php');
	}
?>