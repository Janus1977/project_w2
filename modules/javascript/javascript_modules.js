/*
 * Les fonctions javascripts appelees par les actions sur le smodules du site
 */

	/**
	 * fonction permettant de confirmer une action
	 * @return boolean
	 */
	function actionModule(id,nomChamp,valeurChamp) {
		if (confirmation()) {
			if (valeurChamp == 0) {
				new Ajax.Updater(
						'infos_modules',
						URL_INCLUDES_BASE+'majBase.inc.php',
						{
							method: 'post',
							parameters: {
								table: 'module',
								action: 'insertion',
								nom: id,
								nomChamp: nomChamp,
								valeurChamp: valeurChamp
							},
							onSuccess: function() {
								alert("Module "+ id +" créé, rechargez la page");
							},
							insertion: 'bottom'
						}
					);
			} else if (valeurChamp > 0) {
				new Ajax.Updater(
						'infos_modules',
						URL_INCLUDES_BASE+'majBase.inc.php',
						{
							method: 'post',
							parameters: {
								table: 'module',
								action: 'modification',
								id: id,
								nomChamp: nomChamp,
								valeurChamp: valeurChamp
							},
//							onSuccess: function() {
//								chargeModule('modules');
//							},
							insertion: 'bottom'
						}
					);			
			} else if (valeurChamp < 0) {
				new Ajax.Updater(
					'infos_modules',
					URL_INCLUDES_BASE+'majBase.inc.php',
					{
						method: 'post',
						parameters: {
							table: 'module',
							action: 'suppression',
							id: id
						},
//						onSuccess: function() {
//							chargeModule('modules');
//						},
						insertion: 'bottom'
					}
				);
			}
		}
	}