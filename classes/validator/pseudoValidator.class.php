<?php

final class pseudoValidator extends validator {

	private $_regExp = "#^[^за@]*$#";
	
    public function __construct() {
    	parent::__construct(5,50);
    }
    
     ////////// LES FONCTIONS PUBLIQUES \\\\\\\\\\\\\   
    public function isValid($value) {
     	if ($this -> checkLength($value)) {
	      	if (preg_match($this -> _regExp,$value) > 0) {
	    		return true;
	    	} else {
	    		throw new exceptionValidator("Le pseudo <span class=\"souligne\">NE DOIT PAS</span> contenir de caract&egrave;res sp&eacute;ciaux (з,а,@)",3);
	    	}
    	} else {
    		throw new exceptionValidator("Le pseudo doit avoir entre ".$this -> _minLength." et ".$this -> _maxLength." caract&egrave;res",2);
    	}
    }
}
?>