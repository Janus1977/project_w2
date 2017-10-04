	function confirmation() {
		return confirm("Certain de faire cela ?");
	}
	
	function afficheInventaire() {
		var listeSelect = document.getElementsByTagName("select");
		var id = -1;
		var champ = "";
		for (var i = 0; i < listeSelect.length; ++i) {
			id = parseInt(document.getElementById(listeSelect[i].name)[document.getElementById(listeSelect[i].name).selectedIndex].value);
			champ = listeSelect[i].name;
			if (id > -1) {
				//si l'id est supérieur a 0 on sort
				break;
			}
		}
		
		//est ce que cela peut arriver ?
//		if (id == -1) {
//			alert("Il faut choisir SOIT un Membre SOIT un Equipement SOIT un EquipementJoueur");
//			return;
//		}

		new Ajax.Updater(
				'listedroite',
				URL_INCLUDES_INVENTAIRE+'affiche_liste.inc.php',
				{
					method: 'post',
					parameters: {
						champ: champ,
						id:id
					}
				}
			);
	}
	
	/**
	 * Fonction permettant de repérer l'inventaire depuis lequel on va mettre
	 * un equipement dans l'inventaire cible
	 */
	function ajouteVersListeDroite() {
//		extraitDonneesFormulaire('formListeGauche');
//		return;
		if (confirmation()) {
			var selectedId = -1;
			var listesFrom = document.getElementsByTagName("select");
			var sTableFrom = "";
			var sListeTo = "";
			var sTableTo = "";
			var idProprio = -1;
			var aData = new Array;
			
			//Positionnement de l'identifiant du futur proprietaire
			var listeSelect = document.getElementsByTagName("select");
			for (var i = 0; i < listeSelect.length; ++i) {
				idProprio = parseInt(document.getElementById(listeSelect[i].name)[document.getElementById(listeSelect[i].name).selectedIndex].value);
				if (idProprio > -1) {
					//si l'id est supérieur a 0 on sort
					break;
				}
			}
			
			//Positionnement de la tableFrom
			if (listesFrom.length > 1) {
				//partie admin
				sTableFrom = 'equipement';
			} else {
				//partie jeu
				sTableFrom = 'equipement_joueur';				
			}
//			alert("table FROM: "+sTableFrom);
			
			//Vers quelle table allons nous ajouter les donnees ?
			for (var i = 0; i < listesFrom.length; ++i) {
				selectedId = parseInt(document.getElementById(listesFrom[i].name)[document.getElementById(listesFrom[i].name).selectedIndex].value);
				sListeTo = listesFrom[i].name;
				if (selectedId > -1) {
					//si l'id est supérieur a 0 on sort
					break;
				}
			}
			
			//Positionnement de la tableTo
			if (sListeTo == 'unite') {
				//partie admin
				sTableTo = 'equipement';
			} else {
				//partie jeu
				sTableTo = 'equipement_joueur';				
			}
//			alert("table TO: "+sTableTo);
			
			//On ne fait rien si pas d'inventaire sélectionné
			if (selectedId == -1) {
				alert("Il faut choisir SOIT un Membre SOIT un Equipement SOIT un EquipementJoueur");
				return;
			}
			
			//Y-a-t-il des données à ajouter ?
			var aFromInputListe = document.getElementById('formListeGauche').getElementsByTagName('input');
			var cpt = 0;
			for (var i = 0; i < aFromInputListe.length; ++i) {
				if (aFromInputListe[i].checked == true) {
					aData.push(parseInt(aFromInputListe[i].value));
					cpt += 1;
				}
			}
			
			//On ne fait rien si rien n'est sélectionné
			if (cpt == 0) {
				alert('Il faut sélectionner au moins une option dans la liste de gauche.');
				return;
			}

			new Ajax.Updater(
				'listedroite',
				URL_INCLUDES_BASE+'majBase.inc.php',
				{
					method: 'post',
					parameters: {
						table: 'inventaire',
						action: 'clonage',
						idProprio:idProprio,
						tableFrom:sTableFrom,
						tableTo:sTableTo,
						data: aData.join(",")
					}
//				,
//					onComplete: function (response) {
//						afficheInventaire();
//					}
				}
			);
		}
	}
	
	/**
	 * Fonction permettant de supprimer les éléments de l'inventaire droite
	 */
	function enleverDeListeDroite($tout) {
	}