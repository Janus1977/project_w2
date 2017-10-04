<?php

class LengthValidator extends validator {

	private $_minLength;
	private $_maxLength;
	
    public function __construct($min=0,$max=255) {
    	$this -> _minLength = $min;
    	$this -> _maxLength = $max;
    }
    
    public function isValid($value) {
    	if (strlen($value) >= $this -> _minLength) {
    		if (strlen($value) < $this -> _maxLength) {
    			return true;
    		} else {
    			return false;
    		}
    	} else {
    		return false;
    	}
    }
}
?>