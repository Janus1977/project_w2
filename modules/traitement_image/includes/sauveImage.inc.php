<?php
	/**
	 * Script permettant de sauver une image
	 */
	$path='../../config/config.php';
	$i=0;
	while (!file_exists($path)) {
	    if($i>10) {
	        echo 'Impossible de trouver les fichiers de configuration';
	        exit;
	    }
	    
	    $path='../'.$path;
	    $i++;
	}
	
	require_once $path;
	require_once _DIR_BASE_.'lib/smarty/Smarty.class.php';
	/* FONCTIONS GENERIQUES */
	require_once _DIR_BASE_.'includes/fonctions.inc.php';
	/* FONCTIONS SPECIFIQUES */
	require_once _INCLUDES_TRAITEMENT_IMAGE_.'fonctions.inc.php';
	
	 if (!empty($_POST)) {
	 	/* On copie seulement le temporaire dans un fichier renommé */
	 	debug($_POST);
	 	$source = _IMGS_TEMP_.trim(basename($_POST['imageSource']));
	 	$cible = _DIR_IMGS_.trim($_POST['repertoireDestination']).'/'.trim($_POST['nomNouvelleImage']).'.jpg';
	 	debug($source);debug($cible);
	 	if (!copy($source, $cible)) {
		    echo "La copie $file du fichier a échoué...\n";
		} else {
			unlink($source);
		}
	 }
?>
