<?php

class Actionevenement {

	protected $_date;
    public function __construct() {
        $this->_date = new DateTime(null, new DateTimeZone('Europe/Paris'));
    	//decalage temporel: ajout de 256 ans P256Y, ajout de 5ans et 10 minutes P5YT5M
//     	$this->_date->add(new DateInterval(P2560Y));
    }
}
?>