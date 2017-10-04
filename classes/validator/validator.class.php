<?php

class validator {
	protected $_minLength;
	protected $_maxLength;
		
	public function __construct($minLength=0,$maxLength=255) {
		$this -> _minLength = $minLength;
		$this -> _maxLength = $maxLength;
	}
	
    protected function checkLength($value) {
    	if (strlen($value) < $this -> _minLength) {
    		return false;
    	} else {
    		if (strlen($value) > $this -> _maxLength) {
    			return false;
    		} else {
    			return true;
    		}
    	}
    }
}
?>