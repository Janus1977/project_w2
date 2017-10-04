<?php
	/////////////////////////
	// GESTION DES MEMBRES //
	/////////////////////////
	if ($_POST['action'] == 'insertion') {
		if ($_POST['captcha'] == $_SESSION['inscription']['captcha']) {
			$oMembre = ManagerMembre::getInstance()->getMembreVide();
			$oMembre->setPseudo($_POST['pseudo']);
			$oMembre->setPassword($_POST['password']);
			$oMembre->setMail($_POST['mail']);
			$oMembre->setIdgroupe(1);
			$oMembre->setStaff(0);
			$oMembre->setCle_activation(sha1(substr($_POST['pseudo'],0,5).$_POST['password'].substr($_POST['pseudo'],0,5)));
			$oMembre->setPoints(100);
			if (!ManagerMembre::getInstance()->save($oMembre)) {
				alerte('erreur sauvegarde nouveau membre');
				//trace
				//alerte utilisateur
				alerte("Impossible de modifier le membre '".$oMembre->getNom()."', alertez l'administrateur du site.");
				//l'exception
				throw new Exception("Erreur modification membre");
			} else {
				info('Un mail de validation vient d\'e&circ;tre envoy&eacute; &agrave; l\'adresse mail renseign&eacute;e.');
			}
			//penser a envoyer un mail pour valider l'inscription
// 			use Zend\Mail;
// 			$mail = new Mail\Message();
// 			$mail->setBody('This is the text of the email.');
// 			$mail->setFrom('Freeaqingme@example.org', 'Sender\'s name');
// 			$mail->addTo('Matthew@example.com', 'Name o. recipient');
// 			$mail->setSubject('TestSubject');

// 			$transport = new Mail\Transport\Sendmail();
// 			$transport->send($mail);
		} else {
			alerte('le captcha fourni ne correspond pas.');
			return false;
		}
	} else if ($_POST['action'] == 'modification') {
		$oMembre = ManagerMembre::getInstance()->getById(intval($_POST['id']));
		$methode = 'set'.ucfirst($_POST['nomChamp']);
		$oMembre->$methode($_POST['valeurChamp']);
		if (!ManagerMembre::getInstance()->update($oMembre)) {
			//trace
			//alerte utilisateur
			alerte("Impossible de modifier le membre '".$oMembre->getNom()."', alertez l'administrateur du site.");
			//l'exception
			throw new Exception("Erreur modification membre");
		}
	} else if ($_POST['action'] == 'suppression') {
	    if (!ManagerMembre::getInstance()->delete(ManagerMembre::getInstance()->getById(intval($_POST['id'])))) {
	        //trace
	        //alerte utilisateur
	        alerte("Impossible de modifier le membre ID ".intval($_POST['id']).", alertez l'administrateur du site.");
	        //l'exception
	        throw new Exception("Erreur suppression membre");
	    }
	    ;
	}
?>