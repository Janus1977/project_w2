<?php

class exceptionValidator extends Exception {

	public function __construct($message,$key) {
		parent::__construct($message,$key);
	}
    
    public function __toString() {
    	return '<div class="gras rouge grande centre">'.$this -> getMessage().'</div>';
    }
}
?>