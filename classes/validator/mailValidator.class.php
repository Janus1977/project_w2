<?php

final class mailValidator extends validator {

    public function __construct() {
    	parent::__construct();
    }
    
    ////////// LES FONCTIONS PUBLIQUES \\\\\\\\\\\\\    
    public function isValid($value) {
    	if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
    		return true;
    	} else {
    		return false;
//     		throw new exceptionValidator("Le mail n'est pas correctement renseign&eacute; (Exemple: dupont@domaine.com)",3);
    	}
    }
}
?>