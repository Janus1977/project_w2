
function ajouteArmee() {
	var idMembre = parseInt(listeMembres[listeMembres.selectedIndex].value);
	var nomArmee = nomNouvelleArmee.value;
	alert("Nouvelle armee: idMembre ("+ idMembre +"), nom ("+ nomArmee +")");
}

function afficheDetails(armeeId) {
	new Ajax.Updater(
		'centre',
		URL_INCLUDES_ARMEE+'affiche_detail.inc.php',
		{
			method: 'post',
			parameters: {
				id:armeeId
			}
		}
	);
}