	function confirmation() {
		return confirm("Certain de faire cela ?");
	}
	
	function afficheUnite() {
		var idUnite = parseInt(listeUnites[listeUnites.selectedIndex].value);
		var table = 'unite';
		if (idUnite == -1) {
			idUnite = parseInt(listeUnitesJoueur[listeUnitesJoueur.selectedIndex].value);
			table = 'unite_joueur';
			if (idUnite == -1) {
				alert("Il faut choisir SOIT une Unite SOIT une UniteJoueur");
				return;
			}
		}
		new Ajax.Updater(
			'affichage',
			URL_INCLUDES_UNITE+'affiche_unite.inc.php',
			{
				method: 'post',
				parameters: {
					table:table,
					idUnite:idUnite
				},
//						onSuccess: function () {
//							document.getElementById('info_unite').innerHTML = 'OK';
//						},
				onFailure: function () {
					document.getElementById('info_unite').innerHTML = 'NOK';
				}
			}
		);
	}
	
	function afficheListeUnites() {
		new Ajax.Updater(
			'afficheListeUnites',
			URL_INCLUDES_UNITE+'liste_unite.inc.php',
			{
				method: 'post',
				parameters: {},
				onComplete: function () {
					document.getElementById('info_unite').innerHTML = 'OK';
				}
			}
		);
	}
	
	function afficheListeUNitesJoueur() {
		
	}
	function ajouteUnite() {
		var theForm = document.getElementById('formNewObject');
		if (theForm == null) {
			//Etape 1: afficher une unite vide
			afficheUnite();
		} else {
			//Etape 2: envoie des informations au serveur
			if (confirmation()) {
				var aData = theForm.serialize(true);
				aData['action'] = 'insertion';
				new Ajax.Request(
					URL_INCLUDES_BASE+'majBase.inc.php',
					{
						method: 'post',
						parameters: aData,
						onComplete: function (response) {
							//si la reponse est un nombre => ID
							//sinon => ERREUR
//							var retour = parseInt(response.responseText);
							if (isNaN(parseInt(response.responseText))) {
								//ERREUR
								document.getElementById('info_unite').innerHTML = '<span style="background-color: red;">'+response.responseText+'</span>';
							} else {
								afficheUnite(aData['table'],response.responseText);
							}
						}
					}
				);
			}
		}
	}
	
	function cloneUnite() {
		var idUnite = parseInt(listeUnites[listeUnites.selectedIndex].value);
		var table = 'unite';
		if (idUnite == -1) {
			idUnite = parseInt(listeUnitesJoueur[listeUnitesJoueur.selectedIndex].value);
			table = 'unite_joueur';
			if (idUnite == -1) {
				alert("Il faut choisir SOIT une Unite SOIT une UniteJoueur");
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
						id:idUnite
					},
					onComplete: function (response) {
						//si la reponse est un nombre => ID
						//sinon => ERREUR
						if (isNaN(parseInt(response.responseText))) {
							//ERREUR
							document.getElementById('info_unite').innerHTML = '<span style="background-color: red;">'+response.responseText+'</span>';
						} else {
							//il faut g�rer les identifiants ET les bool�ens renvoyes par le PHP
							if (parseInt(response.responseText) == 1) {
								if (table == 'unite_joueur') {
									//raffraichissement liste en ajoutant une <option></option>
									
									//affichage information
									document.getElementById('info_unite').innerHTML = 'UNITE DE JOUEUR ID '+idUnite+' CL&Ocirc;N&Eacute;E';
								} else {
									//raffraichissement liste en ajoutant une <option></option>
									//affichage information
									document.getElementById('info_unite').innerHTML = 'UNITE ID '+idUnite+' CL&Ocirc;N&Eacute;E';
								}
								afficheUnite(aData['table'],response.responseText);
							}
						}
					}
				}
			);
		}
	}
	
	function modifieUnite() {
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
						onComplete: function (response) {
							if (isNaN(parseInt(response.responseText))) {
								//ERREUR
								document.getElementById('info_unite').innerHTML = '<span style="background-color: red;">'+response.responseText+'</span>';
							} else {
								afficheUnite(aData['table'],aData['id']);								
							}							
						}
					}
				);
			}
		}
	}
	
	function supprimeUnite() {
		var idUnite = parseInt(listeUnites[listeUnites.selectedIndex].value);
		var table = 'unite';
		if (idUnite == -1) {
			idUnite = parseInt(listeUnitesJoueur[listeUnitesJoueur.selectedIndex].value);
			table = 'unite_joueur';
			if (idUnite == -1) {
				alert("Il faut choisir SOIT une Unite SOIT une UniteJoueur");
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
						id:idUnite
					},
					onComplete: function (response) {
						if (isNaN(parseInt(response.responseText))) {
							//ERREUR
							document.getElementById('info_unite').innerHTML = '<span style="background-color: red;">'+response.responseText+'</span>';
						} else {
							if (parseInt(response.responseText) == 1) {
								if (table == 'unite_joueur') {
									document.getElementById('info_unite').innerHTML = 'UNITE DE JOUEUR ID '+idUnite+' SUPPRIM&Eacute;E';
								} else {
									document.getElementById('info_unite').innerHTML = 'UNITE ID '+idUnite+' SUPPRIM&Eacute;E';
								}
							}
						}
					}
				}
			);
		}
	}

	function montreActionUnite(idUnite,table) {
		new Ajax.Updater(
			'actionUnite',
			URL_INCLUDES_UNITE+'affiche_actions.inc.php',
			{
				method: 'post',
				table: table,
				idUnite: idUnite
			}
		);
	}
	
	function deplace(idUnite) {
		new Ajax.Updater(
			'actionUnite',
			URL_INCLUDES_UNITE+'affiche_actions.inc.php',
			{
				method: 'post',
				action: 'deplace',
				idUnite: idUnite
			}
		);
	}
	
	function attaque(idUnite,idUniteEnnemie) {
		new Ajax.Updater(
			'actionUnite',
			URL_INCLUDES_UNITE+'affiche_actions.inc.php',
			{
				method: 'post',
				action: 'attaque',
				idUnite: idUnite,
				idUniteEnnemie: idUniteEnnemie
			}
		);
	}