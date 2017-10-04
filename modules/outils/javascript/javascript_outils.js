	function afficheListeCasesCarte(idCarte) {
		if (idCarte != null) {
			new Ajax.Updater(
				'liste_cases_carte',
				URL_MODULES_BASES+'outils/includes/liste_cases_carte.inc.php',
				{
					method: 'post',
					parameters: {
						idCarte: idCarte
					}
				}
			);
		}
	}
	
	function placeUniteSurCase() {
		if (document.getElementById('validPutUnitOnMap').checked === true) {
			var sel = document.getElementById('nomUnitePlacer');
			idUnite = parseInt(sel[sel.selectedIndex].value);
			sel = document.getElementById('nomCarte');
			idCarte = parseInt(sel[sel.selectedIndex].value);
			sel = document.getElementById('caseCarte');
			idTile = parseInt(sel[sel.selectedIndex].value);
			if (idUnite > -1 && idCarte > -1 && idTile > -1) {
				alert('Unite '+idUnite+' Carte '+idCarte+' Case '+idTile);				
			}
		}
	}
	
	function retireUniteSurCase(idUnite) {
		if (document.getElementById('validPutUnitOnMap').checked === true) {
			var sel = document.getElementById('nomUniteSupp');
			idUnite = parseInt(sel[sel.selectedIndex].value);			
			if (idUnite > -1) {
				alert('Unite '+idUnite);return;
				new Ajax.Updater(
					'infos',
					URL_INCLUDES_BASE+'majBase.inc.php',
					{
						method: 'post',
						parameters: {
							table: 'unite',
							action: 'modification',
							data: idUnite
						},
						insertion: Insertion.Bottom
					}
				);
			}
		}		
	}
	
	function poseUniteSurCase() {		
	}