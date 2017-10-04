<?php

class comparator
{
	
	// Champs qu'on va comparer
	private $fields = array();
	
	// Tri croissant/d�croissant
	protected $ascending = true;
	
	// Constructeur
	// $fields la liste des champs � comparer, format $fieldName => $compareFunction
	public function __construct($fields, $asc = true) {
		if (!is_array($fields)) {
			$fields = array($fields => 'strnatcasecmp');
		}
		$this -> fields = $fields;
		$this -> ascending = $asc;
	}
	
	public function setOrder($asc) {
		$this -> ascending = $asc;
	}
	
	// La fonction de comparaison qui renvoie -1/0/1
	// a utiliser avec usort()
	public function compare($a, $b) {
		$result = 0;
		foreach ($this -> fields as $field => $compare) {
            $methode = 'get'.$field;
			$result = call_user_func($compare, $a -> $methode(), $b -> $methode());
//			if ($result != 0) {
//				return $result;
//			}
		}
		return $this -> ascending ? $result : -$result;
	}
	
	// Trier un tableau avec mon comparateur
	public function sort(&$array) {
		usort($array, array($this, 'compare'));
	}
}

// Exemple d'utilisation :
//$comparator = new ObjectComparator(array(
//  'genre' => 'strcmp',
//  'nom' => 'strnatcasecmp',
//));
//$comparator->sort($tableau);
?>