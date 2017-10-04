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
	
	//1) les champs sont-il identiques ?
	if ($_POST['usermail'] != $_POST['usermailconfirm']) {
		alerte('Le mail et sa v&eacute;rification sont diff&eacute;rents.');
	} else {
		//2) le mail est-il un mail valide ?
		$oMailValidator = new mailValidator();
		if (!$oMailValidator->isValid($_POST['usermail'])) {
			alerte('Le mail n\'est pas correctement renseign&eacute; (Exemple: dupont@domaine.com).');
		} else {
			unset($oMailValidator);
			/* Connexion Base de donnees */
			spl_autoload_register('autoload');
			require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';
			
			//l'adresse mail est unique
			$oMembre = ManagerMembre::getInstance()->getByMail($_POST['usermail']);
		
			if (!empty($oMembre) && sizeof($oMembre) > 0) {
				alerte('Un membre existe d&eacute;j&agrave; avec cette adresse. Changez-la.');
			}
		}
	}
?>