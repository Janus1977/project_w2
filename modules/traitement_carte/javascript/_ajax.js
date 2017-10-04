/*
 * Liste des fonctions javascript du traitement d'une carte
 * utilisation de la librairie Prototype
 */
	function trim(myString) {
		return (myString.replace(/^\s+/g,'').replace(/\s+$/g,''));
	}
	
	/**
	 * fonction permettant de confirmer une action
	 * @return boolean
	 */
	function confirmation() {
		return confirm("Certain de faire cela ?");
	}
	
	/**
	 * Cette fonction est appelee par les SELECT de X/Y
	 * pour modifier en base les informations et les repercuter
	 * sur l'affichage:
	 * 		=> changement de la taille de la carte a creer.
	 */
	function changeTailleCarte(nomChamp,valeurChamp) {
		/* On verifie d'abord que l'utilisateur a choisi une carte, sinon c'est une nouvelle carte et on ne fait rien */
		var id = document.getElementById('nomCarteEnregistree')[document.getElementById('nomCarteEnregistree').selectedIndex].value;
		if (!isNaN(id)) {
			/* Carte selectionnee et changement de taille */
			/* Verification de la valeur numerique */
			if (!isNaN(valeurChamp)) {
				if (confirmation()) {
					new Ajax.Updater(
						'infos',
						URL_INCLUDES+'majBase.inc.php',
						{
							method: 'get',
							parameters: {
								action: 'modification',
								table: 'carte_edit',
								id: id,
								nomChamp: nomChamp,
								valeurChamp: valeurChamp
							}
						}
					);
				}
			}
		}
	}
	
	function afficheTailleCarte(nb_cases_x,nb_cases_y) {
		document.getElementById('nb_cases_x').options[nb_cases_x].selected = 'selected';
		document.getElementById('nb_cases_y').options[nb_cases_y].selected = 'selected';
	}
	
	function activeTypeImage(typeImage) {
		var tabImages = document.getElementsByTagName('select');
		for (var i=0; i<tabImages.length; i++) {
			if (tabImages[i].name == 'image_sol' || tabImages[i].name == 'image_decor') {
				tabImages[i].disabled = true;
			}
		}
		document.getElementById('image_'+typeImage).disabled = false;
	}
	
	function afficheImage(nomImage,type) {
		new Ajax.Updater(
			'preview_image',
			URL_INCLUDES+'affiche_image.inc.php?src='+URL_MINIATURE+nomImage+'&type='+type,
			{ method: 'get' });
	}
	
	function afficheCarte(id,action,x,y) {
		if (!isNaN(id)) {
			new Ajax.Request(
				URL_MODULES+'carte/carte.php?id='+id+'&action='+action+'&x='+x+'&y='+y,
				{
					method: 'get',
					onComplete:function(RETOUR){
						parent.document.getElementById('conteneur_carte').innerHTML = RETOUR.responseText;
						/* La mini carte */
						new Ajax.Updater(
							'conteneur_mini_carte',
							URL_MODULES+'mini_carte/mini_carte.php',
							{ 
								method: 'get',
								parameters: {
									id: id
								},
								onComplete: function() {
									/* La liste des plateaux de la carte pour eventuelle suppression */
									afficheListePlateauxCarte(id);
									
									/* Le bouton de suppression de la carte */
									document.getElementById('boutonSupprimeCarte').disabled = false;
									
									/* Affichage des actions sur zone */
									afficheActionsZone();
								}
							}
						);
					}
				}
			);
//			/* La liste des plateaux de la carte pour eventuelle suppression */
//			afficheListePlateauxCarte(id);
//			
//			/* Le bouton de suppression de la carte */
//			document.getElementById('boutonSupprimeCarte').disabled = false;
//			
//			/* Affichage des actions sur zone */
//			afficheActionsZone();
		}
	}
	
	function afficheCase(idCase,idDiv) {
		new Ajax.Updater(
			idDiv,
			URL_MODULES+'carte/includes/afficheCase.inc.php',
			{
				method: 'get',
				parameters: {
					id: idCase,
					editionCarte: 1
				}
			}
		);
	}
	
	function afficheListePlateauxCarte(id) {
		new Ajax.Updater(
			'supprime_plateau_carte',
			URL_MODULES+'traitement_carte/includes/supprime_plateau_jeu.inc.php?id='+id,
			{ method: 'get' }
		);
	}
	
	function afficheListeCarte() {
		new Ajax.Updater(
			'liste_cartes',
			URL_MODULES+'traitement_carte/includes/liste_cartes_jeu.inc.php',
			{ method: 'get' }
		);
	}
	
	function creerMiniature(cheminVersImage) {
		new Ajax.Updater(
			'preview_image',
			URL_INCLUDES+'affiche_image.inc.php?src='+cheminVersImage+'&action=creerMiniature',
			{ method: 'get' });
	}
	
	function supprimeCarte() {
		if (confirmation()) {
			new Ajax.Updater(
				'infos',
				URL_INCLUDES+'majBase.inc.php',
				{
					method: 'get',
					parameters: {
						action: 'suppression',
						table: 'carte_edit',
						id: document.getElementById('nomCarteEnregistree')[document.getElementById('nomCarteEnregistree').selectedIndex].value
					},
					onComplete: function() {
						afficheListeCarte();
					}
				}
			);
		}
	}
	
	function creeCarteVide() {
		if (document.getElementById('nomNouvelleCarte') == null || 
			document.getElementById('nomNouvelleCarte').value.trim().length == 0) {
			alert("Vous devez donner un nom à la nouvelle carte.");
			return false;
		} else {
			var nomCarte = document.getElementById('nomNouvelleCarte').value;
			var nb_cases_x = document.getElementById('nb_cases_x')[document.getElementById('nb_cases_x').selectedIndex].value;
			var nb_cases_y = document.getElementById('nb_cases_y')[document.getElementById('nb_cases_y').selectedIndex].value;
			if (confirmation()) {
				alert("Création de la nouvelle carte confirmé.");
				new Ajax.Updater(
					'infos',
					URL_INCLUDES+'majBase.inc.php',
					{
						method: 'get',
						parameters: {
							action: 'insertion',
							table: 'carte_edit',
							nom: nomCarte,
							nb_cases_x: nb_cases_x,
							nb_cases_y: nb_cases_y
						},
						onComplete: function() {
							afficheListeCarte();
						}
					}
				);
			} else {
				alert("Création de la nouvelle carte annulée.");
			}
		}
	}
	
	/**
	 * Fonction permettant de supprimer un plateau de carte au plateau de jeu de la carte
	 * en edition.
	 */
	function supprimerImageCarte() {
		var id = document.getElementById('supprimePlateauCarte')[document.getElementById('supprimePlateauCarte').selectedIndex].value;
		if (!isNaN(id)) {
			if (confirmation()) {
				/* Supression de l'element selectionne */
				new Ajax.Request(
						URL_INCLUDES+'majBase.inc.php',
						{
							method: 'get',
							parameters: {
								action: 'suppression',
								table: 'carte_plateaux',
								id: id
							},
							onComplete:function(RETOUR){
								parent.document.getElementById('infos').innerHTML = RETOUR.responseText;
								
								/* Reaffichage de la carte */
								afficheCarte(document.getElementById('nomCarteEnregistree')[document.getElementById('nomCarteEnregistree').selectedIndex].value,'',0,0);
							}
						}
					);
//				
//				
//				
//				
//				
//				new Ajax.Updater(
//					'infos',
//					URL_INCLUDES+'majBase.inc.php',
//					{
//						method: 'get',
//						parameters: {
//							action: 'suppression',
//							table: 'carte_plateaux',
//							id: id
//						}
//					}
//				);
//				
//				/* Reaffichage de la carte */
//				afficheCarte(document.getElementById('nomCarteEnregistree')[document.getElementById('nomCarteEnregistree').selectedIndex].value,'',0,0);
			}
		} else {
			alert("Choisissez un plateau à supprimer.");
		}
	}
	
	/**
	 * Fonction qui permet d'envoyer les information pour associer un plateau à une case
	 * lors du clic sur cette derniere.
	 * @param idCase
	 */
	function ajouteImageCarte(idCase) {
		var typeActif = document.getElementsByName('typeActif');
		if (typeActif[0].checked == false && typeActif[1].checked == false) {
			alert("Vous devez choisir un sol ou un décor.");
			return;
		}
		if (confirmation()) {
			var chaine = "Mettre";
			var nomImage = '';
			var idCarte = document.getElementById('idCarte').value;
			if (typeActif[0].checked == true) {
				/* L'image du sol */
				nomImage = document.getElementById('image_sol')[document.getElementById('image_sol').selectedIndex].value;
				if (trim(nomImage).length > 0) {
					chaine = chaine + " le sol "+nomImage;
				}
			} else if (typeActif[1].checked == true) {
				/* L'image du decor */
				nomImage = document.getElementById('image_decor')[document.getElementById('image_decor').selectedIndex].value;
				if (trim(nomImage).length > 0) {
					chaine = chaine + " le décor "+nomImage;
				}
			}
			chaine = chaine + " sur la case "+idCase;
			/* Test */
			document.getElementById('infos').innerHTML = chaine;
			
			/* Maj des donnees */
			new Ajax.Updater(
					'infos',
					URL_INCLUDES+'majBase.inc.php',
					{
						method: 'get',
						parameters: {
							action: 'insertion',
							table: 'carte_plateaux',
							idcarte: idCarte,
							idcase: idCase,
							nomImage: nomImage
						},
						onComplete: function() {
							/* On va re-afficher la carte avec les modifications apportees */
							afficheCarte(idCarte,'',0,0);
						},							
						insertion: Insertion.Bottom
					}
				);
			

			
			/* On va raffraichir la liste des plateaux pour suppression */
			// non deja fait dans la fonction appelee au-dessus
//			afficheListePlateauxCarte(idCarte);
			
//			new Ajax.Updater(
//				'conteneur_carte',
//				URL_MODULES+'carte/carte.php',
//				{
//					method: 'get',
//					parameters: {
//						id: idCarte,
//						action: '',
//						x: 0,
//						y: 0
//					}
//				}
//			);			
		}		
	}
	
	function montreOptionsCase(idCase) {
		new Ajax.Updater(
			'optionsCase',
			URL_BASE+'modules/carte/includes/optionsCases.php',
			{
				method: 'get',
				parameters: {
					id: idCase
				}
			}
		);
	}
	function debloqueCase(idCase,idDiv) {
		new Ajax.Updater(
			'infos',
			URL_INCLUDES+'majBase.inc.php',
			{
				method: 'get',
				parameters: {
					action: 'modification',
					table: 'cases',
					id: idCase,
					type: 'case',
					effet: 'bloque',
					valeur: 0
				},
				onComplete: function() {
					/* On va re-afficher la case avec les modifications apportees */
					document.getElementById(idDiv).style.backgroundColor= 'transparent';
					afficheCase(idCase,idDiv);
					montreOptionsCase(idCase);
				},							
				insertion: Insertion.Bottom
			}
		);
	}
	
	function bloqueCase(idCase,idDiv) {
		new Ajax.Updater(
			'infos',
			URL_INCLUDES+'majBase.inc.php',
			{
				method: 'get',
				parameters: {
					action: 'modification',
					table: 'cases',
					id: idCase,
					type: 'case',
					effet: 'bloque',
					valeur: 1
				},
				onComplete: function() {
					/* On va re-afficher la case avec les modifications apportees */
					document.getElementById(idDiv).style.backgroundColor= '#FF0000';
					afficheCase(idCase,idDiv);
					montreOptionsCase(idCase);
				},							
				insertion: Insertion.Bottom
			}
		);
	}
	
	function afficheActionsZone() {
		new Ajax.Updater(
			'actionZone',
			URL_BASE+'modules/traitement_carte/includes/actions_zone.inc.php',
			{
				method: 'get'
			}
		);
	}
	
	function actionZone() {
		if (confirmation()) {
			var xCentre = parseInt(document.getElementById('xCentre').value);
			var yCentre = parseInt(document.getElementById('yCentre').value);
			if (xCentre <= 0 || yCentre <= 0) {
				alert("Le centre de la zone DOIT être sur la carte.");
				return false;
			}
			var rayon = document.getElementById('rayonAction')[document.getElementById('rayonAction').selectedIndex].value;
			if (rayon.length == 0) {
				alert("Le rayon d'action DOIT être choisi.");
				return false;
			}
			var actionSurZone = document.getElementById('actionSurZone')[document.getElementById('actionSurZone').selectedIndex].value;
			if (actionSurZone.length == 0) {
				alert("Une action DOIT être choisie.");
				return false;
			}
			new Ajax.Updater(
				'infos',
				URL_INCLUDES+'majBase.inc.php',
				{
					method: 'get',
					parameters: {
						action: 'modification',
						table: 'cases',
						type: 'zone',
						effet: actionSurZone,
						xCentre: xCentre,
						yCentre: yCentre,
						rayon: rayon
					},
					onComplete: function() {
						/* On va re-afficher la carte avec les modifications apportees */
						afficheCarte(document.getElementById('nomCarteEnregistree')[document.getElementById('nomCarteEnregistree').selectedIndex].value,'',0,0);
					},							
					insertion: Insertion.Bottom
				}
			);
		}
	}
	
//	function bloqueZone() {
//		new Ajax.Updater(
//			'infos',
//			URL_INCLUDES+'majBase.inc.php',
//			{
//				method: 'get',
//				parameters: {
//					action: 'modification',
//					table: 'cases',
//					id: idCase,
//					type: 'zone',
//					nomChamp: 'bloque',
//					valeurChamp: 1,
//					xDebutBlocage: document.getElementById('xDebutBlocage').value,
//					xFinBlocage: document.getElementById('xFinBlocage').value,
//					yDebutBlocage: document.getElementById('yDebutBlocage').value,
//					yFinBlocage: document.getElementById('yFinBlocage').value
//				},
//				onComplete: function() {
//					/* On va re-afficher la carte avec les modifications apportees */
//					afficheCarte(document.getElementById('nomCarteEnregistree')[document.getElementById('nomCarteEnregistree').selectedIndex].value,'',0,0);
//				},							
//				insertion: Insertion.Bottom
//			}
//		);
//	}
	

	
//	function debloqueZone() {
//		new Ajax.Updater(
//			'infos',
//			URL_INCLUDES+'majBase.inc.php',
//			{
//				method: 'get',
//				parameters: {
//					action: 'modification',
//					table: 'cases',
//					id: idCase,
//					type: 'zone',
//					nomChamp: 'bloque',
//					valeurChamp: 0,
//					xDebutBlocage: document.getElementById('xDebutBlocage').value,
//					xFinBlocage: document.getElementById('xFinBlocage').value,
//					yDebutBlocage: document.getElementById('yDebutBlocage').value,
//					yFinBlocage: document.getElementById('yFinBlocage').value
//				},
//				onComplete: function() {
//					/* On va re-afficher la carte avec les modifications apportees */
//					afficheCarte(document.getElementById('nomCarteEnregistree')[document.getElementById('nomCarteEnregistree').selectedIndex].value,'',0,0);
//				},							
//				insertion: Insertion.Bottom
//			}
//		);
//	}