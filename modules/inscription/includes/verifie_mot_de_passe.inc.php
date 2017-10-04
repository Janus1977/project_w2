<?php
	$path='../../config/config.php';
	$i=0;
	while (!file_exists($path)) {
		if($i>10) {
			echo 'Impossible de trouver les fichiers de configuration global,<br/>remplacement par celui du module';
			$path='config/config.php';
			break;
		}
			
		$path='../'.$path;
		$i++;
	}
	
	require_once $path;
	
	if ($_POST['userpassword'] != $_POST['userconfirm']) {
		alerte('Le mot de passe et sa v&eacute;rification sont diff&eacute;rents.');
	}
?>