<?php
	/**
	 * Recherche d'un fichier dans un dossier et son arborescence
	 * @param str $dir dossier a chercher
	 * @param str $filename nom du fichier a chercher
	 * @return str chemin complet du fichier ou bool false si introuvable
	 */
	function searchFile($dir,$filename) {
		//si pas de slash final on l'ajoute
		$last = $dir[strlen($dir)-1];
		if($last != '/' && $last != '\\') {
			$dir .= '/';
		}
		//chargement dossier
		if (is_dir($dir)) {
			$filelist = new DirectoryIterator($dir);
			//on boucle le contenu
			foreach($filelist as $file) {
				//si . ou .. on zappe
				if ($file->isDot()) {
					continue;
				}
				//si dir on explore
				if($file->isDir()) {
					echo '<br>REP: '.$file;
					//si on trouve on renvoi
					if($res = searchFile($dir.$file->getFilename(),$filename)) {
						return $res;
					//sinon on continue
					} else {
						continue;
					}
				} else {
					echo '<br>Recherch&eacute;: '.$filename.'/ trouv&eacute;: '.$file->getFilename();
					//si on a un fichier correspondant a ce qu'on cherche, on le renvoi
					if($file->getFilename() == $filename) {
						echo '<br>TROUVE';
						return $dir.$file->getFilename();
					}				
				}
			}
		} else {
			return "<br/>Dossier ".$dir." inexistant";
		}
	}

	$realpath = $_SERVER['DOCUMENT_ROOT'].'<NOM_SITE>/PATH/TO/FILE'; // met le chemin vers ton projet
	echo '<br/>'.$realpath; //VERIF
	$fileToFind = '<FILE.NAME.EXT>'; // met le nom du fichier recherche
	echo '<br/>'.$fileToFind; //VERIF
	echo '<pre>'.print_r(searchFile($realpath,$fileToFind),true).'</pre>';
?>
