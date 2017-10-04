<?php
/**
 * INTERFACE GENERATOR
 */
 class InterfaceGenerator extends Generator {
 	
 	public function __construct() {
 		parent::__construct();
 	}
 	
 	public function generate($nomFichierInterface) {
		debug("Classe ".ucfirst($nomFichierInterface));
		$aMemo = array();
		$memo = "";
		$nomTag = 0;
		/*
		 * Si le fichier existe, on l'ouvre, et on cherche les parties
		 *  de code specifique pour ne pas les perdre
		 */
		$nomClasse = substr($nomFichierInterface,1,sizeof($nomFichierInterface) - 19);
		debug($nomClasse);
		$cheminFichier = _INTERFACE_DIR_.ucfirst($nomClasse).".class.php";
		debug($cheminFichier);
		if (file_exists($cheminFichier)) {
			$fichierALire = fopen($cheminFichier,"r");
			$memorisation = false;
			while ($tampon = fgets($fichierALire)) {
				$tamponTest = $tampon;
				if (preg_match('/\[TAG(?<digit>\d+)/',$tamponTest,$matches) == 1) {
					if (!empty($nomTag)) {
						/* En cours de fichier => TAGx, il fau vider la memorisation anterieure */
						$memo = "";
					}
					$nomTag = substr($matches[0],1,strlen($matches[0]));
					$memorisation = true;
				} else {
					if (strpos($tampon,'[/TAG') !== false) {
						$memorisation = false;
					}
					if ($memorisation === true) {
						/* Memorisation du code specifique entre les deux TAG */
						$memo .= $tampon;
					}
					if ($memorisation === false && strlen($memo) > 0) {
						/* Sauvegarde du code specifique pour le re-injecter plus tard */
						$this->_aListOfSpecificCode[$nomTag] = $memo;
					}
				}

			}
			fclose($fichierALire);
		}
		debug($this->_aListOfSpecificCode);
 	}
 }
?>