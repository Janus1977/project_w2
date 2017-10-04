<?php
echo 'test.inc.php';
	if (!empty($_POST)) {
		$path='config/config.php';
		$i=0;
		while (!file_exists($path)) {
		    if($i>10) {
//		        echo 'Impossible de trouver les fichiers de configuration';
		        alerte('Impossible de trouver les fichiers de configuration');
		        exit;
		    }
		    
		    $path='../'.$path;
		    $i++;
		}
		
		require_once $path;
		require_once _DIR_INCLUDES_BASE_.'fonctions.inc.php';		
		spl_autoload_register('autoload');
		require_once _DIR_INCLUDES_BASE_.'connexionBase.inc.php';

		$_POST = protectionFormulaire($_POST);
	
	
	debug($_POST);
	
}