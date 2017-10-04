	function chargeDecorEnBase() {
		if (confirmation()) {
			new Ajax.Updater(
				'info_decor',
				URL_INCLUDES_DECOR+'chargeDecorEnBase.inc.php',
				{
					method: 'post'
				}
			);
		}
	}
	
	function ajouteDecor() {
		if (confirmation()) {
			var theForm = document.getElementById('addDecorForm');
			var aData = theForm.serialize(true);
			aData['action'] = 'insertion';
			aData['table'] = 'decor';
			alert(aData.toString());
			new Ajax.Request(
				'info_decor',
				URL_INCLUDES_DECOR+'test.inc.php',
				{
					method: 'post',
					parameters: {
						aData: aData.toString()
					}
				}
			);
		}
	}