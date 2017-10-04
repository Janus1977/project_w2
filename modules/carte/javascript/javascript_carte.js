/*
 * Liste des fonctions javascript du traitement d'une carte
 * utilisation de la librairie Prototype
 */
	function trim(myString) {
		return myString.replace(/^\s+/g,'').replace(/\s+$/g,'');
	}
	
	/**
	 * fonction permettant de confirmer une action
	 * @return boolean
	 */
	function confirmation() {
		return confirm("Certain de faire cela ?");
	}
	
	function joueCarte(idJoueur,idCarte) {
		alert('Jouer (ID '+idJoueur+') sur carte (ID '+idCarte+')');
		//1) mise a jour base avec la carte sur laquelle on veut jouer idjoueur / idcarte
	}
	
	function editeCarte(idCarte) {
		//1) mise a jour base avec la carte sur laquelle on veut editer idcarte
		if (confirmation()) {
			new Ajax.Updater(
				'info_carte',
				URL_INCLUDES_BASE+'majBase.inc.php',
				{
					method: 'post',
					parameters: {
						action: 'modification',
						table: 'carte',
						idCarte: idCarte,
						nomChamp: 'edition',
						valeurChamp: 1
					},
					//2) lancement affichage dans le DIV centre de l'edition de la carte
					onComplete: function() {
						new Ajax.Updater(
							'centre',
							URL_MODULE_TRAITEMENT_CARTE+'traitement_carte.php',
							{
								method: 'post',
								parameters: {
									id: idCarte,
									toto:'toto'
								}
							}
						);
					}
				}
			);
		}
	}
	
	function publieCarte(idCarte) {
		//1) mise a jour base avec la carte sur laquelle on veut editer idcarte
		if (confirmation()) {
			new Ajax.Updater(
				'info_carte',
				URL_INCLUDES_BASE+'majBase.inc.php',
				{
					method: 'post',
					parameters: {
						action: 'modification',
						table: 'carte',
						idCarte: idCarte,
						nomChamp: 'edition',
						valeurChamp: 0
					},
					//2) lancement affichage dans le DIV centre de l'edition de la carte
					onComplete: function() {
						new Ajax.Updater(
							'centre',
							URL_MODULE_CARTE_+'carte.php',
							{
								method: 'post',
								parameters: {
									id: idCarte
								}
							}
						);
					}
				}
			);
		}
	}
	
	function montreOptionsCase(idCase) {
		new Ajax.Updater(
			'optionsCase',
			URL_BASE+'modules/carte/includes/optionsCases.php',
			{
				method: 'post',
				parameters: {
					id: idCase
				}
			}
		);
	}