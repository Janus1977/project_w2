<?php	
	/*
	 * CONNEXION A LA BASE
	 */
	$path='config/config.local.cfg';
	$i=0;
	$fichierConfigLocal = true;
	while (!file_exists($path)) {
	    if($i>10) {
	    	/* Fichier de config serveur local non trouve. Pas d'erreurs. */
	    	$fichierConfigLocal = false;
	        break;
	    }
	    
	    $path='../'.$path;
	    $i++;
	}
	if (!$fichierConfigLocal) {
		$path='config/config.cfg';
		$i=0;
		while (!file_exists($path)) {
		    if($i>10) {
		    	throw new exceptionFileNotFound("Aucun fichier de configuration de la base de donn&eacute;es trouv&eacute;. Arr&ecirc;t.");
// 		    	echo 'Aucun fichier de configuration de la base de donn&eacute;es trouv&eacute;. Arr&ecirc;t.';
// 		    	exit;
		    }
		    
		    $path='../'.$path;
		    $i++;
		}
	}

	$dataDB = parse_ini_file($path,true);

	$oPdo = database::getInstance(); // avec singleton
    $oPdo -> setDbDns($dataDB['dbengine'],$dataDB['dbname'],$dataDB['host']);
    $oPdo -> setDbUser($dataDB['dbuser']);
    $oPdo -> setDbPassword($dataDB['dbpass']);
    $oPdo -> setNombreRequetes();
    $oPdo -> connexion();
    unset($dataDB);
?>