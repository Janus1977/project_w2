
<?php
	//Penser a faire un TPL
// 	echo '<center>Lancement des scripts de test du r&eacute;pertoire</center>';
	
	require("../config/config.php");
	
	// liste des fichiers "*.test.php"
	$aListeFichiers = new DirectoryIterator(_DIR_BASE_.'test/');
	
	// Parcours des fichier pour creer les liens
	foreach ($aListeFichiers AS $fichier) {
	    if (!is_dir($fichier->getFilename()) && strpos($fichier->getFilename(),_TEST_EXTENSION_) > 0) {
	        $aListeFichiersTests[] = array($fichier->getFilename());
		}
	}	
	
	$smarty->assign('URL_TEST',_URL_TEMPLATES_BASE_.'test/');
	$smarty->assign('aListeFichiersTests',$aListeFichiersTests);
	
	$smarty->display(_TEMPLATES_BASE_."test/index.tpl");
	exit;
	
	
	echo '<hr>';
	echo 'Nettoyage tables';
	nettoieTables();
	echo '<hr>';
	
	ini_set('max_execution_time', 86400); // 1 jours
	
	
	

	echo 'Termin&eacute;<hr>';
?>