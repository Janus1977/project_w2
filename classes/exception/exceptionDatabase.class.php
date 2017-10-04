<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of exceptionDatabase
 *
 * @author cbarrau-a
 */
class exceptionDatabase extends Exception {

	public function __construct($message = null, $code = 0, \Exception $previous = null) {
		if (null === $message) {
			$message = 'Database Exception.';
		}
		parent::__construct($message,$code);
	}
}
?>
