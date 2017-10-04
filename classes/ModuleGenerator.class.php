<?php
/**
 * generateur des Module appele lors de l'ajout d'un module via l'interface.
 * Un module "de base" est toujours consitiué de:
 * 
 */

class ModuleGenerator extends Generator {
	
	protected $_moduleName;
	
	public function __construct($nomModule) {
		parent::__construct();
		$this->_moduleName = $nomModule;
	}
	
	protected function generateFolders() {
		$retour = true;
	 	if (mkdir(_DIR_MODULES_BASES_.$this->_moduleName)) {
	 		if (mkdir(_DIR_MODULES_BASES_.$this->_moduleName.'/config')) {
	 			if (mkdir(_DIR_MODULES_BASES_.$this->_moduleName.'/includes')) {
	 				if (mkdir(_DIR_MODULES_BASES_.$this->_moduleName.'/javascript')) {
	 					if (mkdir(_DIR_MODULES_BASES_.$this->_moduleName.'/templates')) {
	 						if (!mkdir(_DIR_MODULES_BASES_.$this->_moduleName.'/templates_c')) {
	 							$retour = false;
	 						}
	 					} else {
	 						$retour = false;
	 					}
	 				} else {
	 					$retour = false;
	 				}
	 			} else {
	 				$retour = false;
	 			}
	 		} else {
	 			$retour = false;
	 		}
	 	} else {
	 		$retour = false;
	 	}
	 	return $retour; 	
	}
	
	protected function generateFiles($filePath) {
		$tmp = explode('/', $filePath);
		$name = explode('.',$tmp[sizeof($tmp)-1]);
		//ici le @ est là pour ne pas lever le WARNING, j'aurai le FALSE dans la variable
		$contenu = @file_get_contents(_TEMPLATES_BASE_.'template_module_'.$name[0].'.txt');
		if (!$contenu) {
			$contenu='';
			if ($name[1] == 'php') {
				$contenu = file_get_contents(_TEMPLATES_BASE_.'template_module.txt');
			} else if ($name[1] == 'tpl') {
				$contenu = file_get_contents(_TEMPLATES_BASE_.'template_module_template.txt');
			}
		}
		$contenu = str_replace('<NOM_MODULE_MAJ>', strtoupper($this->_moduleName), $contenu);
		$contenu = str_replace('<NOM_MODULE_MIN>', strtolower($this->_moduleName), $contenu);
		return file_put_contents($filePath, $contenu);
	}
	
	/**
	 * Methode de suppression de l'arborescence d'un module
	 */
	public function delete($dir) {
		$files = array_diff(scandir($dir), array('.','..'));
		foreach ($files as $file) {
			if (is_dir("$dir/$file")) {
				$this->delete("$dir/$file");
			} else {
// 				debug("Fichier: $dir/$file");
	 			unlink("$dir/$file");
			}
		}
// 		debug("Rep: $dir");
	 	return rmdir($dir);
	}
	
	/**
	 * Methode de generation de l'arborescence des modules
	 * @return boolean
	 */
	public function generate() {
		$retour = true;
		$filePathList = array(
			_DIR_MODULES_BASES_.$this->_moduleName.'/index.php',
			_DIR_MODULES_BASES_.$this->_moduleName.'/'.strtolower($this->_moduleName).'.php',
			_DIR_MODULES_BASES_.$this->_moduleName.'/config/config.mod.php',
			_DIR_MODULES_BASES_.$this->_moduleName.'/includes/fonctions.inc.php',
			_DIR_MODULES_BASES_.$this->_moduleName.'/javascript/javascript_'.strtolower($this->_moduleName).'.js',
			_DIR_MODULES_BASES_.$this->_moduleName.'/templates/'.strtolower($this->_moduleName).'.tpl'
		);
		if ($this->generateFolders()) {
			foreach ($filePathList AS $filePath) {
				$retour = $this->generateFiles($filePath);
			}			
		}
		return $retour;
	}
}
?>