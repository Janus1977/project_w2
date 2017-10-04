function creeTest(moduleATester) {
	alert(moduleATester);
	new Ajax.Updater(
			'centreTest',
			URL_INCLUDES_TEST+'creeTest.inc.php',
			{
				method: 'post',
				parameters: {
					moduleATester: moduleATester
				}
			}
		);
}