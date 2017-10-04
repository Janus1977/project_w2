<?php
/*
 * 
 */

class Mailer {
	
	private $_from;			//array('mail@domain','real name')
	private $_to;			//array(array('mail@domain','real name'),...)
	private $_cc;			//array(array('mail@domain','real name'),...)
	private $_bcc;			//array(array('mail@domain','real name'),...)
	private $_subject;
	private $_attachedFile;
	private $_header;
	private $_message;
	private $_footer;
	
	public function __construct() {
		//
	}
	
	public function addFrom(array $from) {
		$this->_from = $from;
	}
	
	public function getFrom() {
		return $this->_from;
	}
	
	public function addTo(array $to) {
		if (sizeof($this->getTo()) == 0) {
			$this->_to = $to;
		} else {
			$this->_to[] = $to;
		}
	}
	
	public function getTo() {
		return $this->_to;
	}
	
	public function addCc(array $cc) {
		if (sizeof($this->getCc()) == 0) {
			$this->_cc = $cc;
		} else {
			$this->_cc[] = $cc;
		}
	}
	
	public function getCc() {
		return $this->_cc;
	}
	
	public function addBCc(array $bcc) {
		if (sizeof($this->getBCc()) == 0) {
			$this->_bcc = $bcc;
		} else {
			$this->_bcc[] = $bcc;
		}
	}
	
	public function getBCc() {
		return $this->_bcc;
	}
	
	public function setSubject($subject) {
		$this->_subject = $subject;
	}
	
	public function getSubject() {
		return $this->_subject;
	}
	
	public function addAttachedFile(array $attachedFile) {
		if (sizeof($this->getAttachedFile()) == 0) {
			$this->_attachedFile = $attachedFile;
		} else {
			$this->_attachedFile[] = $attachedFile;
		}
	}
	
	public function getAttachedFile() {
		return $this->_attachedFile;
	}
	
	public function setHeader($header) {
		$this->_header = $header;
	}
	
	public function getHeader() {
		return $this->_header;
	}
	
	public function setMessage($message) {
		$this->_message = $message;
	}
	
	public function getMessage() {
		return $this->_message;
	}
	
	public function setFooter($footer) {
		$this->_footer = $footer;
	}
	
	public function getFooter() {
		return $this->_footer;
	}
	
	protected function getDestinatairesPrincipaux() {
		$aListeDestinatairesPrincipaux = '';
		foreach ($this->getTo() AS $destinataire) {
			$aListeDestinatairesPrincipaux[] = $destinataire[1];
		}
		return implode(',', $aListeDestinatairesPrincipaux);
	}
	
	protected function getDestinatairesEnCopie() {
		$aListeDestinatairesEnCopie = '';
		foreach ($this->getCc() AS $destinataire) {
			$aListeDestinatairesEnCopie[] = $destinataire[1];
		}
		return implode(',', $aListeDestinatairesEnCopie);
	}
	
	protected function getDestinatairesEnCopieCachee() {
		$aListeDestinatairesEnCopieCachee = '';
		foreach ($this->getCc() AS $destinataire) {
			$aListeDestinatairesEnCopieCachee[] = $destinataire[1];
		}
		return implode(',', $aListeDestinatairesEnCopieCachee);
	}
	
	public function send() {
		if (sizeof($this->getFrom()) == 0) {
			throw  new MailerException('Pas d\'adresse exp&eacute;diteur');
		}
		if (sizeof($this->getTo()) == 0) {
			throw  new MailerException('Pas d\'adresse destinataire');
		}
		/* la librairie */
		require_once($_SERVER[].'');
		
		/* objet PHPMailer */
		$mailer = new PHPMailer();
		
		/* Ajout de l'expediteur */
		$mailer->From = $this->getFrom()[0];
		$mailer->FromName = $this->getFrom()[1];
		
		/* Ajout des destinataires */
		foreach ($this->getTo() AS $destinataire) {
			$mailer->AddAddress($destinataire[0],$destinataire[1]);
		}
		
		/* Ajout de destinataires en copie */
		if (sizeof($this->getCc()) > 0) {
			foreach ($this->getCc() AS $destinataire) {
				$mailer->AddCC($destinataire[0],$destinataire[1]);
			}
		}
		
		/* Ajout de destinataires en copie cachee*/
		if (sizeof($this->getBCc()) > 0) {
			foreach ($this->getBCc() AS $destinataire) {
				$mailer->AddBCC($destinataire[0],$destinataire[1]);
			}
		}
		
		/* Ajout du sujet */
		$mailer->Subject = $this->getSubject();
		
		/* Ajout du message */
		$mailer->Body = $this->getHeader().$this->getMessage().$this->getFooter();
		/* Message HTML ?*/
		if (strpos($message,'<html>') !== false) {
			$mailer->IsHTML(true);
			$search = array('@<script[^>]*?>.*?</script>@si',	// Strip out javascript
							'@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
							'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
							'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments including CDATA
			);
			$mailer->AltBody = preg_replace($search, '', $this->getHeader().$this->getMessage().$this->getFooter());
		}
		
		/* Ajout des fichiers attaches */
		if (sizeof($this->getAttachedFile()) > 0) {
			foreach ($this->getAttachedFile() AS $fichierAAttacher) {
				$mailer->AddAttachment($fichierAAttacher[0],$fichierAAttacher[1]);
			}
		}
		
		if (!$mailer->Send()) {
			//TODO NOK
			$message = 'Impossible d\'envoyer le message &agrave; :';
			$message .= '<br/>Destinataire(s) principal(aux):'.$this->getDestinatairesPrincipaux();
			$message .= '<br/>Destinataire(s) en copie: '.$this->getDestinatairesEnCopie();
			$message .= '<br/>Destinataire(s) en copie cach&eacute;e: '.$this->getDestinatairesEnCopieCachee();
			throw new MailerException($message);
		} else {
			//TODO OK
		}
	}
}

class MailerException extends Exception {
	public function errorMessage() {
		$errorMsg = '<strong>' . $this->getMessage() . "</strong><br />";
		return $errorMsg;
	}
}
?>