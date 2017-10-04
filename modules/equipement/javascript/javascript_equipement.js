	/**
	 * fonction permettant de confirmer une action
	 * @return boolean
	 */
	function confirmation() {
		return confirm("Certain de faire cela ?");
	}
	

	function ajouteEquipement() {
		var theForm = document.getElementById('formNewObject');		
		if (theForm == null) {
			//Etape 1: afficher une unite vide
			afficheEquipement();
		} else {
			if (confirmation()) {
				var aData = theForm.serialize(true);
				aData['action'] = 'insertion';
				new Ajax.Request(
					URL_INCLUDES_BASE+'majBase.inc.php',
					{
						method: 'post',
						parameters: aData,
						onComplete: function (response) {
//							alert(response.responseText);return;
							afficheEquipement(aData['table'],response.responseText);
						}
					}
				);
			}
		}
	}
	
	function modifieEquipement() {
		var theForm = document.getElementById('formNewObject');		
		if (theForm == null) {
			alert("Il faut choisir SOIT une Unite SOIT une UniteJoueur");
			return;
		} else {
			//Envoie des informations au serveur
			if (confirmation()) {
				var aData = theForm.serialize(true);
				aData['action'] = 'modification';
//				var table = aData['table'];
				new Ajax.Updater(
					'affichage',
					URL_INCLUDES_BASE+'majBase.inc.php',
					{
						method: 'post',
						parameters: aData,
						onSuccess: function () {
							afficheEquipement();
						}
					}
				);
			}
		}
	}
	
	function afficheEquipement() {
		var idEquipement = parseInt(listeEquipements[listeEquipements.selectedIndex].value);
		var table = 'equipement';
		if (idEquipement == -1) {
			idEquipement = parseInt(listeEquipementsJoueur[listeEquipementsJoueur.selectedIndex].value);
			table = 'equipement_joueur';
			if (idEquipement == -1) {
				alert("Il faut choisir SOIT un Equipement SOIT un EquipementJoueur");
				return;
			}
		}
		new Ajax.Updater(
			'affichage',
			URL_INCLUDES_EQUIPEMENT+'affiche_equipement.inc.php',
			{
				method: 'post',
				parameters: {
					table:table,
					idEquipement:idEquipement
				},
				onSuccess: function () {
					document.getElementById('info_equipement').innerHTML = 'OK';
				},
				onFailure: function () {
					document.getElementById('info_equipement').innerHTML = 'NOK';
				}
			}
		);
	}
	
	function supprimeEquipement() {
		var idEquipement = parseInt(listeEquipements[listeEquipements.selectedIndex].value);
		var table = 'equipement';
		if (idEquipement == -1) {
			idEquipement = parseInt(listeEquipementsJoueur[listeEquipementsJoueur.selectedIndex].value);
			table = 'equipement_joueur';
			if (idEquipement == -1) {
				alert("Il faut choisir SOIT un Equipement SOIT un EquipementJoueur");
				return;
			}
		}
		if (confirmation()) {
			new Ajax.Request(
				URL_INCLUDES_BASE+'majBase.inc.php',
				{
					method: 'post',
					parameters: {
						table:table,
						action:'suppression',
						id:idEquipement
					},
					onSuccess: function () {
						if (table == 'equipement_joueur') {
							document.getElementById('info_equipement').innerHTML = 'EQUIPEMENT DE JOUEUR ID '+idUnite+' SUPPRIM&Eacute;E';
						} else {
							document.getElementById('info_equipement').innerHTML = 'EQUIPEMENT ID '+idUnite+' SUPPRIM&Eacute;E';
						}
						
					},
					onFailure: function () {
						document.getElementById('info_equipement').innerHTML = 'NOK';
					}
				}
			);
		}
	}
	
	function cloneEquipement() {
		var idEquipement = parseInt(listeEquipements[listeEquipements.selectedIndex].value);
		var table = 'equipement';
		if (idEquipement == -1) {
			idEquipement = parseInt(listeEquipementsJoueur[listeEquipementsJoueur.selectedIndex].value);
			table = 'equipement_joueur';
			if (idEquipement == -1) {
				alert("Il faut choisir SOIT un Equipement SOIT un EquipementJoueur");
				return;
			}
		}
		if (confirmation()) {
			new Ajax.Request(
				URL_INCLUDES_BASE+'majBase.inc.php',
				{
					method: 'post',
					parameters: {
						table:table,
						action:'clonage',
						id:idEquipement
					},
					onSuccess: function (response) {
						new Ajax.Updater(
							'affichage',
							URL_INCLUDES_UNITE+'affiche_equipement.inc.php',
							{
								method: 'post',
								parameters: {
									table:table,
									idEquipement:response.responseText
								}
							}
						);
					},
					onFailure: function () {
						document.getElementById('info_equipement').innerHTML = 'NOK';
					}
				}
			);
		}
	}