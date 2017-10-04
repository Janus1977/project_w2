<?php
	$path='config/config.php';
	$i=0;
	while (!file_exists($path)) {
		if($i>10) {
//		        echo 'Impossible de trouver les fichiers de configuration';
			alerte('Impossible de trouver les fichiers de configuration');
			exit;
		}
	
		$path='../'.$path;
		$i++;
	}
	
	require_once $path;
	require_once _DIR_INCLUDES_BASE_.'fonctions.inc.php';
	if (!empty($_POST)) {
		if (!empty($_POST['emailMotDePasseOublie'])) {
			debug('modification base');
			$oMembre = ManagerMembre::getInstance()->getByMail($_POST['emailMotDePasseOublie']);
			if (empty($oMembre)) {
				alerte("Le mail fourni n'est pas reconnu");
				return;
			}
			$mailFromDataBAse = $oMembre->getMail();
			debug('envoie de mail');
			//retour au template de l'index car nous sommes toujours dans le DIV 'centre'
			require_once _SMARTY_LOAD_;
			$smarty->assign('DIR_BASE',_DIR_BASE_);
			$smarty->assign('URL_BASE',_URL_BASE_);
			$smarty->assign('TEMPLATE_INSCRIPTION',_TEMPLATES_INSCRIPTION_);
			//TEST
	//		$smarty->assign('identifie',true);
	 		$smarty->assign('identifie',false);
	 		$smarty->assign('inscriptionOK',false);
			//\TEST
			$smarty->display(_TEMPLATES_BASE_.'centre.tpl');
			exit;
		} else {
			alerte('Veuillez renseigner votre email s\'il vous plait');
		}		
	}

	require_once (_TEMPLATES_BASE_.'motDePasseOublie.tpl');
?>