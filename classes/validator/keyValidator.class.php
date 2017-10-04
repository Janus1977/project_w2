<?php

final class keyValidator extends validator {
	
    public function __construct($minLength=40,$maxLength=40) {
    	parent::__construct($minLength,$maxLength);
    }
    
    public function isValid($key) {
    	if ($this -> checkLength($key)) {
    		return true;
    	} else {
    		throw new exceptionValidator("Cl&eacute; d'activation non valide",5);
    	}
    }
}
?>