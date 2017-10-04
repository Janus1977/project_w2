<?php

final class passwordValidator extends validator {

	private $_md5Length = 32;
	private $_sha1Length = 40;
	
	private $_hashType = "";
	private $_salt = "";
	private $_hashedPassword = "";
	private $_score = 0;
	
    public function __construct($hashType,$salt) {
    	parent::__construct(5,12);
    	$this -> _hashType = $hashType;
    	$this -> _salt = $salt;
    }
    
    ////////// LES FONCTIONS PUBLIQUES \\\\\\\\\\\\\
    public function isValid($value) {
    	//Si la longueur est deja de 40/32, on a un mdp hashe
    	$longueur = "_".$this -> _hashType."Length";
    	if (strlen($value) == $this -> $longueur) {
    		$this -> _hashedPassword = $value;
    		return true;
    	} else {
    		//V�rification de la longueur du mot de passe
	    	if ($this -> checkLength($value)) {
	    		//V�rification du score obtenu => alerte si mauvais score
	    		//if () {
		    		$this -> _hashedPassword = $this -> hashPassword($value);
		    		return true;	    			
	    		//}
	    	} else {
	    		throw new exceptionValidator("Le mot de passe doit avoir entre ".$this -> _minLength." et ".$this -> _maxLength." caract&egrave;res",2);
	    	}    		
    	}

    }
    
    public function getHashedPassword() {
    	return $this -> _hashedPassword;
    }
    
    ////////// LES FONCTIONS PRIVEES \\\\\\\\\\\\\
    private function hashPassword($value) {
		$function = $this -> _hashType;
		return $function($this -> _salt.$value);
    }
    
    private function score($value) {
    }
}
?>