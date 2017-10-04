<?php

abstract class FactoryTest {
	public static function access($className,$methodName) {
		if ($className == 'Tutu') {
			echo '<br/>OK';
			return self::$methodName();
		} else {
			echo '<br/>KO';
		}
	}
	private static function toto() {
		echo '<br/>on est dans toto.';
	}
}

class Tutu {
	public function __construct() {}
	public function getClass() {
		return get_class($this);
	}
	public function testAccess() {
		return FactoryTest::access($this->getClass(),'toto');
	}
}

$oTutu = new Tutu();
echo '<br/>Je suis une instance de '.$oTutu->getClass();
$oTutu->testAccess();
?>
