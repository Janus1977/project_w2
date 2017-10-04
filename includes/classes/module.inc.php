<?php
	if (!empty($_POST['nom']) && strpos($_POST['nom'],'_') !== false) {
		alerte("Vous ne pouvez pas utiliser le caract&egrave;re '_' dans le nom d'un module");
		throw new Exception("Erreur nom du module");
	}
	if ($_POST['action'] == 'insertion') {
		//on supprime les elements inutiles de $_POST
		unset($_POST['action']);
		//encodage pour envoie vers l'objet afin de remplir ce dernier
		$oModule = ManagerModule::getInstance()->getModuleVide();
		// Remplacement des espaces ' ' par des underscores '_'
		$oModule->setNom(str_replace(' ', '_',$_POST['nom']));
		$oModule->setActif(0);
		if (ManagerModule::getInstance()->save($oModule)) {
			/* Creation de la structure de base du module */
	//		creeStructureModule($_POST['nom']);
			$oModuleGenerator = new ModuleGenerator($oModule->getNom());
			if (!$oModuleGenerator->generate()) {
				//trace
				//alerte utilisateur
				alerte("Impossible de cr&eacute;er le module '".str_replace('_', ' ', $oModule->getNom())."', alertez l'administrateur du site.");
				//l'exception
				throw new Exception("Erreur cr&eacute;ation module");
			}
		} else {
			//trace
			//alerte utilisateur
			alerte("Impossible de cr&eacute;er le module '".str_replace('_', ' ', $oModule->getNom())."', alertez l'administrateur du site.");
			//l'exception
			throw new Exception("Erreur cr&eacute;ation module");
		}
	} else if ($_POST['action'] == 'modification') {
		$oModule = ManagerModule::getInstance()->getById(intval($_POST['id']));
		$methode = 'set'.ucfirst($_POST['nomChamp']);
		$oModule->$methode($_POST['valeurChamp']);
		if (!ManagerModule::getInstance()->update($oModule)) {
			//trace
			//alerte utilisateur
			alerte("Impossible de modifier le module '".str_replace('_', ' ', $oModule->getNom())."', alertez l'administrateur du site.");
			//l'exception
			throw new Exception("Erreur modification module");
		}
	} else if ($_POST['action'] == 'suppression') {
		$oModule = ManagerModule::getInstance()->getById(intval($_POST['id']));
		if (!ManagerModule::getInstance()->delete($oModule)) {
			//trace
			//alerte utilisateur
			alerte("Impossible de supprimer le module '".str_replace('_', ' ', $oModule->getNom())."', alertez l'administrateur du site.");
			//l'exception
			throw new Exception("Erreur suppression module");
		} else {
			// 						delTree(_DIR_MODULES_BASES_.$oModule->getNom());
			$oModuleGenerator = new ModuleGenerator($oModule->getNom());
			$oModuleGenerator->delete(_DIR_MODULES_BASES_.$oModule->getNom());
		}
	}
?>