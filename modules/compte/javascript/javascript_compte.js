

	function confirmation() {
		return confirm("Certain de faire cela ?");
	}
	
	function choisitAvatar(idMembre,idAvatar) {
		if (confirmation()) {
			new Ajax.Updater(
				'infos_compte',
				URL_INCLUDES_BASE+'majBase.inc.php',
				{
					method: 'post',
					parameters: {
						table: 'membre',
						action: 'modification',
						id: idMembre,
						nomChamp: 'avatar',
						valeurChamp: idAvatar
					},
					onSuccess: function () {
						chargeModule('compte');
					}
				}
			);
		}
	}
	
	function supprimeAvatar(idMembre,indiceAvatar,indiceAvatarActuel) {
		if (indiceAvatar == indiceAvatarActuel) {
			alert("Vous devez changer votre avatar actuel avant de le supprimer.");
		} else {
			if (confirmation()) {
				new Ajax.Updater(
					'infos_compte',
					URL_INCLUDES_COMPTE+'supprimeAvatar.inc.php',
					{
						method: 'post',
						parameters: {
							idAvatar:formulaire.valeurChamp.value,
							indiceAvatarActuel:formulaire.indiceAvatarActuel.value
						},
						onSuccess: function () {
							chargeModule('compte');
						}
					}
				);
			}
		}
	}