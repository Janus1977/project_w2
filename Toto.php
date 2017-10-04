<?php
require_once 'Tutu.php';
class Toto extends Tutu {
    public function __construct() {
        parent::__construct();
    }
        
    public function goToto() {
        echo '<br/>Toto';
    }
}

$oToto = new Toto();
$oToto->goToto();
$oToto->goTutu();

