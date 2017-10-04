<?php
	/**
	 * Fichier centralisant la creation de l'objet $smarty et de seon parametrage
	 * A installer dans toutes les pages utilisant smarty
	 */
	 
	// La bibliotheque
	require_once _SMARTY_CLASS_;
	 
	 // l'objet
	$smarty = new Smarty();
	
	// le repertoire de compilation
	$smarty->compile_dir = _SMARTY_COMPILE_;
	
	// Le repertoire de cache
	$smarty->cache_dir = _SMARTY_CACHE_;
	
	// le parametrage de cache
	$smarty->caching = false;
	
	// Le forçage de compilation: dev == true, prod == false
	if (file_exists(_DOC_ROOT_._PROJET_.'/config/config.local.php')) {
		$smarty->force_compile = true;
	} else {
		$smarty->force_compile = false;
	}
	
	// Verification de l'etat de compilation du template
	$smarty->compile_check = true;
?>