<?php	
	//Point d'entree du site	
	try {
		ini_set('date.timezone', 'Europe/Paris');

		//nom du projet
		$aFolders = explode('\\', realpath(dirname(__FILE__)));
		define('_PROJET_',$aFolders[sizeof($aFolders) - 1]);
		
	    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
//      		$docRoot = $_SERVER['DOCUMENT_ROOT'];
     		define('_DOC_ROOT_',$_SERVER['DOCUMENT_ROOT']);
     	} else {
//      		$docRoot = $_SERVER['DOCUMENT_ROOT'].'/';
     		define('_DOC_ROOT_',$_SERVER['DOCUMENT_ROOT'].'/');
     	}
		$pathToConfig=_DOC_ROOT_._PROJET_.'/config/config.php';
		
		if (!file_exists($pathToConfig)) {
			throw new Exception('Impossible de trouver les fichiers de configuration');
		} else {
			require_once $pathToConfig;
			
			//Cas particulier des sessions et des utilisateurs en session
			
			if (!empty($_POST)) {
				$_POST = protectionFormulaire($_POST);
				/////////////////////////
				// CAS PARTICULIER DEV //
				/////////////////////////
				if (array_key_exists('initsession',$_POST)){
					session_destroy();
					$_SESSION = array();
					unset($_SESSION);
				}

				//////////////////////
				// AUTHENTIFICATION //
				//////////////////////
				if (array_key_exists('identification',$_POST)) {
					/* on supprime l'index du bouton */
					unset($_POST['identification']);
					$_SESSION['user'] = ManagerMembre::getInstance()->getByPseudoPassword($_POST['identifiant'],sha1(trim($_POST['motDePasse'])));
					if (empty($_SESSION['user'])) {
						throw new Exception('Pas de Membre connu par le pseudo "'.$_POST['identifiant'].'"');
					}
					$_SESSION['staffSession'] = $_SESSION['user']->getStaff();
					if (empty($_SESSION['user'])) {
// 						alerte('Aucun membre ne correspond &agrave; vos donn&eacute;es, ressaisissez.');
						throw new Exception("Connexion: Aucun membre ne correspond &agrave; vos donn&eacute;es, ressaisissez.");
					}
					//Date de connexion
					$_SESSION['user']->setDate_der_connexion(date("Y-m-d H:i:s",time()));
					//mise en place du password pour la sauvegarde du user
					$_SESSION['user']->setPassword(ManagerMembre::getInstance()->getById($_SESSION['user']->getId())->getPassword());					
					if (!ManagerMembre::getInstance()->update($_SESSION['user'])) {
						//trace
						//alerte utilisateur
						// 						alerte("Impossible de modifier le membre '".$_SESSION['user']->getPseudo()."', alertez l'administrateur du site.");
						//l'exception
						throw new Exception("Connexion: Impossible de modifier le membre '".$_SESSION['user']->getPseudo()."', alertez l'administrateur du site.");
					}
					//suppression du mot de passe en session
					$_SESSION['user']->setPassword("");
				}

				///////////////////
				// GESTION STAFF //
				///////////////////
				if (array_key_exists('staffSession',$_POST) && !empty($_SESSION['user']) && 
					$_SESSION['user']->getStaff() == 1) {
					//Connexion / Deconnexion Staff via le bouton
					$_SESSION['staffSession'] = intval($_POST['staffSession']);
				}

				/////////////////
				// DECONNEXION //
				/////////////////
				if (array_key_exists('deconnexion',$_POST) && !empty($_SESSION['user'])) {
					//Mise a jour du membre
					$_SESSION['user']->setDate_der_connexion(date("Y-m-d H:i:s",time()));
					//mise en place du password pour la sauvegarde du user
					$_SESSION['user']->setPassword(ManagerMembre::getInstance()->getById($_SESSION['user']->getId())->getPassword());					
					if (!ManagerMembre::getInstance()->update($_SESSION['user'])) {
						//trace
						//alerte utilisateur
// 						alerte("Impossible de modifier le membre '".$_SESSION['user']->getPseudo()."', alertez l'administrateur du site.");
						//l'exception
						throw new Exception("D&eacute;connexion: Impossible de modifier le membre '".$_SESSION['user']->getPseudo()."', alertez l'administrateur du site.");
					} else {
						informe("Votre compte a &eacute;t&eacute; correctement mis &agrave; jour.");
					}
					unset($_SESSION['user']);
					informe("Vous avez &eacute;t&eacute; d&eacute;connect&eacute;.");					
				}
			}
				
			// init variables session
			if (isset($_SESSION)) {
				if (isset($_SESSION['editionCarte'])) {
					$_SESSION['editionCarte'] = 0;
				} else {
					$_SESSION['editionCarte'] = 0;
				}				
			}
		}
		require_once (_DIR_INCLUDES_BASE_.'afficheIndex.inc.php');
	} catch (Exception $e) {
		$smarty->assign('message',$e->getMessage());
		$smarty->assign('CHARSET',_CHARSET_);
		$smarty->assign('URL_BASE',_URL_BASE_);
		$smarty->display(_DOC_ROOT_._PROJET_.'/templates/msg_erreur.tpl');
	}
?>
