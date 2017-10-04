	/**
	 * Fonction permettant d'afficher les option de l'arsenal en AJAX
	 * @param option
	 */
	function afficheArsenal(option) {
		new Ajax.Updater(
			'contenu_arsenal_imperial',
			URL_MODULES_BASES+'arsenal_imperial/includes/'+option+'.inc.php',
			{
				method: 'post'
			}
		);
	}
	
	/**
	 * Fonction permettant de lancer la reparation d'un objet (joueur)
	 * @param idObjet
	 */
	function repare(idObjet) {
		new Ajax.Updater(
				'infos_equipement',
				URL_INCLUDES_BASE+'majBase.inc.php',
				{
					method: 'post',
					parameters: {
						table: 'equipement',
						action: 'modification',
						data: JSON.stringify($('formEquipement').serialize(true))
					},
					insertion: Insertion.Bottom
				}
			);
	}
	
	/**
	 * Fonction permettant de lancer la reparation instantanee d'un objet (admin)
	 * @param idObjet
	 */
	function repareInstant(idObjet) {
		new Ajax.Updater(
			'contenu_arsenal_imperial',
			URL_MODULES_BASES+'arsenal_imperial/includes/'+option+'.inc.php',
			{
				method: 'post'
			}
		);
	}