	function confirmation() {
		return confirm("Certain de faire cela ?");
	}

	function retourVersCompte() {
		if (confirmation()) {
			windows.location = URL_COMPTE+'compte.php';
		}
	}
	
	function choisitAvatar(formulaire) {
		if (confirmation()) {
			new Ajax.Updater(
				'infos',
				URL_INCLUDES_BASE+'majBase.inc.php',
				{
					method: 'post',
					parameters: {
						action: 'modification',
						table: 'membre',
						type: 'standalone',
						id: idMembre,
						nomChamp: 'avatar',
						valeurChamp: idAvatar
					},
					onSuccess:function () {
						alert('Avatar modifie');
//						new Ajax.Updater(
//							URL_INCLUDES_COMPTE+'afficheAvatarEnCours.inc.php',
//							{
//								method: 'post',
//								parameters: {
//									idAvatar:id
//								}
//							}
//						);
					},
					onFailure: function () {
						alert('Avatar non modifie');
					}
				}
			);
		}
	}
	
	function supprimeAvatar(indiceAvatarASupprimer,indiceAvatarActuel) {
		if (indiceAvatarASupprimer == indiceAvatarActuel) {
			alert("Vous devez changer votre avatar actuel avant de le supprimer.");
		} else {
			if (confirmation()) {
				new Ajax.Updater(
					'listesAvatars',
					URL_INCLUDES_COMPTE+'supprimeAvatar.inc.php',
					{
						method: 'post',
						parameters: {
							indiceAvatarASupprimer:indiceAvatarASupprimer,
							indiceAvatarActuel:indiceAvatarActuel
						}
					}
				);
			}
		}
	}