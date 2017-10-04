
/*
 *
 *
 */

	function checkPseudo() {
		new Ajax.Updater(
			'infos_inscription',
			URL_INCLUDES_INSCRIPTION+'verifie_pseudo.inc.php',
			{
				method: 'post',
				parameters: {
					userpseudo: document.getElementById('userpseudo').value
				}
			}
		);
	}
	
	function checkMotDePasse() {
		new Ajax.Updater(
			'infos_inscription',
			URL_INCLUDES_INSCRIPTION+'verifie_mot_de_passe.inc.php',
			{
				method: 'post',
				parameters: {
					userpassword: document.getElementById('userpassword').value,
					userconfirm: document.getElementById('userconfirm').value
				}
			}
		);
	}
	
	function checkMail() {
		new Ajax.Updater(
			'infos_inscription',
			URL_INCLUDES_INSCRIPTION+'verifie_mail.inc.php',
			{
				method: 'post',
				parameters: {
					usermail: document.getElementById('usermail').value,
					usermailconfirm: document.getElementById('usermailconfirm').value
				}
			}
		);
	}
	
	function inscritNouveauMembre() {
		new Ajax.Updater(
			'infos_inscription',
			URL_INCLUDES_BASE+'majBase.inc.php',
			{
				method: 'post',
				parameters: {
					table: 'membre',
					action: 'insertion',
					pseudo: document.getElementById('userpseudo').value,
					password: document.getElementById('userpassword').value,
					mail: document.getElementById('usermail').value,
					captcha: document.getElementById('captchaconfirm').value
				}
			}
		);
	}