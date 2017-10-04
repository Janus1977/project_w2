<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of exeptionFactory
 *
 * @author a459000
 */
class exeptionFactory extends Exception {

	public function __construct($message,$key) {
		parent::__construct($message,$key);
	}

    public function __toString() {
    	return '<div class="gras rouge grande centre">'.$this -> getMessage().'</div>';
    }
}
?>
