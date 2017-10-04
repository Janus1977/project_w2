<?php
	/**
	 * Cette fonction permet de fournir a l'appelant la liste des repertoire des modules
	 * @param string $repertoire le repertoire de depart de la recherche
	 * @param array listeRepertoireDestination la liste a remplir
	 */
	function listeRepertoiresModules($repertoire,&$listeRepertoireModules) {
		$repertoiresInaccessibles = array('includes','javascript','templates','templates_c');
		$ressource = opendir($repertoire) or die('Erreur de listage : le r&eacute;pertoire "'.$repertoire.'" n\'existe pas');
		while($element = readdir($ressource)) {
			if($element != '.' && $element != '..') {
				if (is_dir($repertoire.'/'.$element)) {
					/* Si c'est un repertoire */
					if (!in_array(strtolower($element),$repertoiresInaccessibles)) {
						$listeRepertoireModules[] = $element;
					}					
				}
			}
		}	
		closedir($ressource);
	}
?>
