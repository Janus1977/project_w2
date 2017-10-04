

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
						'infos_traitement_carte',
						URL_INCLUDES_BASE+'majBase.inc.php',
						{
							method: 'post',
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
		var i = 0;
		for (i=0; i<tabImages.length; i++) {
			if (tabImages[i].name == 'image_sol' || tabImages[i].name == 'image_decor') {
				tabImages[i].disabled = true;
			}
		}
		document.getElementById('image_'+typeImage).disabled = false;
	}
	
	/**
	 * Affichage d'une preview de l'image du décor (par exemple) que l'on veut affecter a une case
	 * @param nomImage
	 * @param type
	 */
	function afficheImage(nomImage,type) {
		new Ajax.Updater(
			'preview_image',
			URL_INCLUDES_BASE+'affiche_image.inc.php',
			{
				method: 'post',
				parameters: {
					src: URL_MINIATURE+nomImage,
					type: type
				},
				onComplete: function (retour) {
					document.getElementById('but_'+type+'_ok').disabled = false;
				}
			}
		);
	}
	
	function afficheCarte(id,action,x,y) {
		if (!isNaN(id)) {
			//OLD: URL_MODULES_BASES+'carte/carte.php?id='+id+'&action='+action+'&x='+x+'&y='+y, + GET
			new Ajax.Request(
				URL_MODULES_BASES+'carte/carte.php',
				{
					method: 'post',
					parameters:{
						source:'traitement_carte',
						id: id,
						action: action,
						x: x,
						y: y
					},
					onComplete:function(RETOUR){
						//on rempli de DIV de la carte choisie
						parent.document.getElementById('conteneur_carte').innerHTML = RETOUR.responseText;
						/* La mini carte */
						new Ajax.Updater(
							'conteneur_mini_carte',
							URL_MODULES_BASES+'mini_carte/mini_carte.php',
							{ 
								method: 'post',
								parameters: {
									id: id
								},
								onComplete: function() {
									/* La liste des plateaux de la carte pour eventuelle suppression */
									afficheListePlateauxCarte(id);
									
									/* Le bouton de suppression de la carte */
									document.getElementById('boutonSupprimeCarte').disabled = false;
									
									/* Affichage des actions sur zone */
									afficheActionsZone(id);
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
			URL_MODULES_BASES+'carte/includes/afficheCase.inc.php',
			{
				method: 'post',
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
			URL_MODULES_BASES+'traitement_carte/includes/supprime_plateau_edition.inc.php',
			{
				method: 'post',
				parameters: {
					id:id
				}
			}
		);
	}
	
	function afficheListeCarteEdition() {
		new Ajax.Updater(
			'liste_cartes',
			URL_MODULES_BASES+'traitement_carte/includes/liste_cartes_edition.inc.php',
			{ method: 'post' }
		);
	}
	
	//penser a mettre idCase pour virer la case cliquee
	function afficheListeCasesLienCarte(idCarte) {
		if (idCarte != null) {
			new Ajax.Updater(
				'liste_cases_liens_carte',
				URL_MODULES_BASES+'traitement_carte/includes/liste_cases_liens_carte.inc.php',
				{
					method: 'post',
					parameters: {
						idCarte: idCarte
					},
					onSuccess: function () {
						document.getElementById('boutonOKLien').disabled = false;
					}
				}
			);
		}
	}
	
	function creerMiniature(cheminVersImage) {
		new Ajax.Updater(
			'preview_image',
			URL_INCLUDES_BASE+'affiche_image.inc.php?src='+cheminVersImage+'&action=creerMiniature',
			{ method: 'get' });
	}
	
	function supprimeCarte() {
		if (confirmation()) {
			new Ajax.Updater(
				'infos_traitement_carte',
				URL_INCLUDES_BASE+'majBase.inc.php',
				{
					method: 'post',
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
			alert("Vous devez donner un nom � la nouvelle carte.");
			return false;
		} else {
			var nomCarte = document.getElementById('nomNouvelleCarte').value;
			var idDimension = document.getElementById('tailleCarte')[document.getElementById('tailleCarte').selectedIndex].value;
			if (confirmation()) {
				new Ajax.Updater(
					'infos_traitement_carte',
					URL_INCLUDES_BASE+'majBase.inc.php',
					{
						method: 'post',
						parameters: {
							table: 'carte',
							action: 'insertion',
							nom: nomCarte,
							idDimension: idDimension
						},
						onSuccess: function () {
							alert("Creation de la nouvelle carte terminee.");
						},
						onFailure: function () {
							alert("Creation de la nouvelle carte impossible.");
						},
						onComplete: function() {							
							/* On raffraichit la liste des cartes en edition */
							afficheListeCarteEdition();
						}
					}
				);
			} else {
				alert("Cr�ation de la nouvelle carte annul�e.");
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
						URL_INCLUDES_BASE+'majBase.inc.php',
						{
							method: 'post',
							parameters: {
								table: 'carteplateaux',
								action: 'suppression',
								idCartePlateau: id
							},
							onSuccess: function () {
								parent.document.getElementById('infos_traitement_carte').innerHTML = RETOUR.responseText;
							},
							onFailure: function () {
								parent.document.getElementById('infos_traitement_carte').innerHTML = RETOUR.responseText;
							},
							onComplete:function(RETOUR){
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
//					URL_INCLUDES_BASE+'majBase.inc.php',
//					{
//						method: 'get',
//						parameters: {
//							action: 'suppression',
//							table: 'carteplateaux',
//							id: id
//						}
//					}
//				);
//				
//				/* Reaffichage de la carte */
//				afficheCarte(document.getElementById('nomCarteEnregistree')[document.getElementById('nomCarteEnregistree').selectedIndex].value,'',0,0);
			}
		} else {
			alert("Choisissez un plateau � supprimer.");
		}
	}
	
	/**
	 * Fonction qui permet d'envoyer les information pour associer un plateau � une case
	 * lors du clic sur cette derniere.
	 * @param idCase
	 */
	function ajouteImageCarte(idCase,idCarte) {
		var typeActif = document.getElementsByName('typeActif');
		if (typeActif[0].checked == false && typeActif[1].checked == false) {
			alert("Vous devez choisir un sol ou un d�cor.");
			return;
		}
		if (confirmation()) {
			var chaine = "Mettre";
			var nomImage = '';
			if (typeActif[0].checked == true) {
				/* L'image du sol */
				idPlateau = document.getElementById('image_plateau')[document.getElementById('image_plateau').selectedIndex].value;
				if (trim(nomImage).length > 0) {
					chaine = chaine + " le plateau ID"+idPlateau;
				}
			} else if (typeActif[1].checked == true) {
				/* L'image du decor */
				idImage = document.getElementById('image_decor')[document.getElementById('image_decor').selectedIndex].value;
				if (trim(nomImage).length > 0) {
					chaine = chaine + " le d�cor "+nomImage;
				}
			}
			chaine = chaine + " sur la case "+idCase;
			/* Test */
			document.getElementById('infos_traitement_carte').innerHTML = chaine;
			
			/* Maj des donnees */
			new Ajax.Updater(
					'infos_traitement_carte',
					URL_INCLUDES_BASE+'majBase.inc.php',
					{
						method: 'post',
						parameters: {
							table: 'carteplateaux',
							action: 'insertion',
							idCarte: idCarte,
							idCase: idCase,
							idPlateau: idPlateau
						},
						onSuccess: function() {
							alert('Ajout plateau reussi.');
						},
						onFailure: function() {
							alert('Echec d\'ajout de plateau.');
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
//				URL_MODULES_BASES+'carte/carte.php',
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
	
	function ajouteDecorALaCase(idCase,idDiv) {
		var decorList = document.getElementById('image_decor');
		var decorId = decorList[decorList.selectedIndex].value;
		alert("ID decor choisit: "+ decorId);
		new Ajax.Updater(
				'infos_traitement_carte',
				URL_INCLUDES_BASE+'majBase.inc.php',
				{
					method: 'post',
					parameters: {
						action: 'modification',
						table: 'tile',
						id: idCase,
						type: 'case',
						nomChamp: 'decor',
						valeurChamp: decorId
					},
//					onSuccess: function() {
//						
//					},
					onComplete: function() {
						/* On va re-afficher la case avec les modifications apportees */
						afficheCase(idCase,idDiv);
						montreOptionsCase(idCase);
					},							
					insertion: Insertion.Bottom
				}
			);
	}
	
	function ajouteUniteALaCase(idCase,idDiv) {
		var decorList = document.getElementById('image_unite');
		var uniteId = decorList[decorList.selectedIndex].value;
		alert("ID unite choisit: "+ uniteId);
		new Ajax.Updater(
				'infos_traitement_carte',
				URL_INCLUDES_BASE+'majBase.inc.php',
				{
					method: 'post',
					parameters: {
						action: 'modification',
						table: 'tile',
						id: idCase,
						type: 'case',
						nomChamp: 'unite',
						valeurChamp: uniteId
					},
//					onSuccess: function() {
//						
//					},
					onComplete: function() {
						/* On va re-afficher la case avec les modifications apportees */
						afficheCase(idCase,idDiv);
						montreOptionsCase(idCase);
					},							
					insertion: Insertion.Bottom
				}
			);
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
	
	/*
	 * La fonction permet de changer l'etat de la case:
	 * 	libre (0) -> liante (98) pour afficher la liste des autres cases liantes
	 */
	function creeCaseLiante(idCase,idDiv,idCarte) {
		new Ajax.Updater(
			'infos_traitement_carte',
			URL_INCLUDES_BASE+'majBase.inc.php',
			{
				method: 'post',
				parameters: {
					table: 'tile',
					action: 'modification',
					type: 'case',
					idCase: idCase,
					nomChamp: 'etatCase',
					valeurChamp: 98
				},
				onSuccess: function () {
					alert('Case liante creee.');
					/* Affichage de la liste des cases possible */
					afficheListesCreationLien(idCarte);
				},
				onFailure: function () {
					alert('Echec de creation de la case liante.');
				},
				onComplete: function () {
					/* re-affichage de la case */
					afficheCase(idCase,idDiv);
					/* Changement de couleur transparent => vert du fond */
					document.getElementById(idDiv).style.backgroundColor= '#008000';
					montreOptionsCase(idCase);
				},
				insertion: Insertion.Bottom
			}
		);
	}
	
	function afficheListesCreationLien(idCase,idCarte) {
		new Ajax.Updater(
			'infos_traitement_carte',
			URL_INCLUDES_TRAITEMENT_CARTE+'listes_creation_liens.inc.php',
			//ou
			//URL_BASE+'modules/traitement_carte/includes/listes_creation_liens.inc.php',
			{
				method: 'post',
				parameters: {
					idCase: idCase,
					idCarte: idCarte
				},
				insertion: Insertion.Bottom
			}
		);
	}
	
	function supprimeCaseLiante(idCase,idDiv,idCarte) {
		/* il faut supprimer le lien existant */
		
		/* il faut modifier l'etat de la case */
		new Ajax.Updater(
			'infos_traitement_carte',
			URL_INCLUDES_BASE+'majBase.inc.php',
			{
				method: 'post',
				parameters: {
					table: 'tile',
					action: 'modification',
					type: 'case',
					idCase: idCase,
					nomChamp: 'etatCase',
					valeurChamp: 0
				},
				onSuccess: function () {
					alert('Case liante supprimee.');
					/* Affichage de la liste des cases possible */
					document.getElementById(idDiv).style.backgroundColor= 'transparent';
					cacheDiv('listes_creation_liens');
				},
				onFailure: function () {
					alert('Echec de suppression de la case liante.');
				},
				onComplete: function () {
					afficheCase(idCase,idDiv);
					montreOptionsCase(idCase);
				},
				insertion: Insertion.Bottom
			}
		);
	}
	
	function creeLienEntreCases(idCase) {
		var idCaseLiee = document.getElementById('caseLienCarte')[document.getElementById('caseLienCarte').selectedIndex].value;
		new Ajax.Updater(
			'infos_traitement_carte',
			URL_INCLUDES_BASE+'majBase.inc.php',
			{
				method: 'post',
				parameters: {
					action: 'modification',
					table: 'tile',
					type: 'case',
					idCase: idCase,
					nomChamp: 'idtile',
					valeurChamp: idCaseLiee
				},
				onSucess: function() {
					alert('Cases '+idCase+' et '+idCaseLiee+' liees.');
				},
				onFailure: function() {
					alert('Echec dans la liaison des cases '+idCase+' et '+idCaseLiee+'.');
				},
				onComplete: function() {
					afficheCase(idCase,idDiv);
					montreOptionsCase(idCase);
				}
			}
		);
	}
	
	function supprimeLienEntreCases(idCase,idCaseLiee) {
		alert('supprimer le lien entre la case '+idCase+' et la case '+idCaseLiee);
		new Ajax.Updater(
			'infos_traitement_carte',
			URL_INCLUDES_BASE+'majBase.inc.php',
			{
				method: 'post',
				parameters: {
					action: 'modification',
					table: 'tile',
					type: 'case',
					idCase: idCase,
					idCaseLiee: idCaseLiee,
					nomChamp: 'idtile',
					valeurChamp: 0
				},
				onSucess: function() {
					alert('Le lien entre les cases '+idCase+' et '+idCaseLiee+' est supprime.');
				},
				onFailure: function() {
					alert('Echec de suppression du lien entre les cases '+idCase+' et '+idCaseLiee+'.');
				},
				onComplete: function() {
					afficheCase(idCase,idDiv);
					montreOptionsCase(idCase);
				}
			}
		);
	}
	
	function debloqueCase(idCase,idDiv) {
		new Ajax.Updater(
			'infos_traitement_carte',
			URL_INCLUDES_BASE+'majBase.inc.php',
			{
				method: 'post',
				parameters: {
					action: 'modification',
					table: 'tile',
					type: 'case',
					idCase: idCase,
					nomChamp: 'bloque',
					valeurChamp: 0
				},
				onComplete: function() {
					/* On va re-afficher la case avec les modifications apportees */
					afficheCase(idCase,idDiv);
					document.getElementById(idDiv).style.backgroundColor= 'transparent';
					montreOptionsCase(idCase);
				},							
				insertion: Insertion.Bottom
			}
		);
	}
	
	function bloqueCase(idCase,idDiv) {
		new Ajax.Updater(
			'infos_traitement_carte',
			URL_INCLUDES_BASE+'majBase.inc.php',
			{
				method: 'post',
				parameters: {
					action: 'modification',
					table: 'tile',
					id: idCase,
					type: 'case',
					nomChamp: 'bloque',
					valeurChamp: 1
				},
//				onSuccess: function() {
//					
//				},
				onComplete: function() {
					/* On va re-afficher la case avec les modifications apportees */
					afficheCase(idCase,idDiv);
					document.getElementById(idDiv).style.backgroundColor= '#FF0000';
					montreOptionsCase(idCase);
				},							
				insertion: Insertion.Bottom
			}
		);
	}
	
	function afficheActionsZone(idCarte) {
		new Ajax.Updater(
			'actionZone',
			URL_BASE+'modules/traitement_carte/includes/actions_zone.inc.php',
			{
				method: 'post',
				parameters: {
					idCarte:idCarte
				}
			}
		);
	}
	
	function actionZone(idCarte) {
		if (confirmation()) {
			var xCentre = parseInt(document.getElementById('xCentre').value);
			var yCentre = parseInt(document.getElementById('yCentre').value);
			if (xCentre <= 0 || yCentre <= 0) {
				alert("Le centre de la zone DOIT �tre sur la carte.");
				return false;
			}
			var rayon = document.getElementById('rayonAction')[document.getElementById('rayonAction').selectedIndex].value;
			if (rayon.length == 0) {
				alert("Le rayon d'action DOIT �tre choisi.");
				return false;
			}
			var actionSurZone = document.getElementById('actionSurZone')[document.getElementById('actionSurZone').selectedIndex].value;
			if (actionSurZone.length == 0) {
				alert("Une action DOIT �tre choisie.");
				return false;
			}
			new Ajax.Updater(
				'infos_traitement_carte',
				URL_INCLUDES_BASE+'majBase.inc.php',
				{
					method: 'post',
					parameters: {
						action: 'modification',
						table: 'tile',
						type: 'zone',
						effet: actionSurZone,
						idCarte: idCarte,
						xCentre: xCentre,
						yCentre: yCentre,
						rayon: rayon
					},
					onSuccess: function() {
						alert('Action demandee ('+actionSurZone+') effectuee.');
					},
					onFailure: function() {
						alert('Erreur sur l\'action demandee ('+actionSurZone+').');
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
//			URL_INCLUDES_BASE+'majBase.inc.php',
//			{
//				method: 'get',
//				parameters: {
//					action: 'modification',
//					table: 'tile',
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
//			URL_INCLUDES_BASE+'majBase.inc.php',
//			{
//				method: 'get',
//				parameters: {
//					action: 'modification',
//					table: 'tile',
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