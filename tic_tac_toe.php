<?php
	//CONSTANTES
	define('_TAILLE_TABLEAU_X_',3);
	define('_TAILLE_TABLEAU_Y_',3);
	
	session_start();
	
	//INIT SESSION
	if (empty($_SESSION)) {
		$_SESSION['joueur'] = 1;
		$_SESSION['jeton'] = "X";
		$_SESSION['grille'] = array();
		for ($x=0; $x<_TAILLE_TABLEAU_X_;$x++) {
			$_SESSION['grille'][$x] = array();
			for ($y=0; $y<_TAILLE_TABLEAU_Y_;$y++) {
				$_SESSION['grille'][$x][$y] = "X/O";
			}
		}
	}
	
	if (!empty($_POST)) {
		echo '<pre>'.print_r($_POST,true).'</pre>';
		//INIT SESSION
		if (isset($_POST['initSession'])) {
			$_SESSION = array();
			$_SESSION['joueur'] = 1;
			$_SESSION['jeton'] = "X";
			$_SESSION['grille'] = array();
			for ($x=0; $x<_TAILLE_TABLEAU_X_;$x++) {
				$_SESSION['grille'][$x] = array();
				for ($y=0; $y<_TAILLE_TABLEAU_Y_;$y++) {
					$_SESSION['grille'][$x][$y] = "X/O";
				}
			}
		} else {
			//MEMORISATION DU CHOIX DE LA CASE
			foreach ($_POST AS $key => $value) {
				$aCoordonnees = explode('_', $key);
			}
			
			$_SESSION['grille'][$aCoordonnees[0]][$aCoordonnees[1]] = $_SESSION['jeton'];
			
			//GAGNE ? TEST sur un 3x3
			echo $aCoordonnees[0].'/'.$aCoordonnees[1];
			echo ($aCoordonnees[0]+1).'/'.$aCoordonnees[1];
			echo ($aCoordonnees[0]+2).'/'.$aCoordonnees[1];
			
			if (($aCoordonnees[0] == 0 &&
				$_SESSION['grille'][$aCoordonnees[0]][$aCoordonnees[1]+1] == $_SESSION['jeton'] &&
				$_SESSION['grille'][$aCoordonnees[0]][$aCoordonnees[1]+2] == $_SESSION['jeton']) ||
				($aCoordonnees[0] == 1 &&
				$_SESSION['grille'][$aCoordonnees[0]][$aCoordonnees[1]+1] == $_SESSION['jeton'] &&
				$_SESSION['grille'][$aCoordonnees[0]][$aCoordonnees[1]+2] == $_SESSION['jeton']) ||
				($aCoordonnees[0] == 2 &&
				$_SESSION['grille'][$aCoordonnees[0]][$aCoordonnees[1]+1] == $_SESSION['jeton'] &&
				$_SESSION['grille'][$aCoordonnees[0]][$aCoordonnees[1]+2] == $_SESSION['jeton'])) {
				//une ligne horizontale
				echo '<br>GAGNE ligne H';
			} else if (($aCoordonnees[1] == 0 &&
				$_SESSION['grille'][$aCoordonnees[0]+1][$aCoordonnees[1]] == $_SESSION['jeton'] &&
		 		$_SESSION['grille'][$aCoordonnees[0]+2][$aCoordonnees[1]] == $_SESSION['jeton']) ||
		 		($aCoordonnees[1] == 1 &&
		 		$_SESSION['grille'][$aCoordonnees[0]-1][$aCoordonnees[1]] == $_SESSION['jeton'] &&
		 		$_SESSION['grille'][$aCoordonnees[0]+1][$aCoordonnees[1]] == $_SESSION['jeton']) ||
				($aCoordonnees[1] == 2 &&
				$_SESSION['grille'][$aCoordonnees[0]-2][$aCoordonnees[1]] == $_SESSION['jeton'] &&
		 		$_SESSION['grille'][$aCoordonnees[0]-1][$aCoordonnees[1]] == $_SESSION['jeton'])) {
				//une ligne verticale
				echo '<br>GAGNE ligne V';
// 			} else if () {
// 				//une ligne diagonale G->D
// 			} else if () {
// 				//une ligne diagonale D->G
			}
			
			//CHANGEMENT DE JOUEUR
			$_SESSION['joueur'] = (intval($_SESSION['joueur']) == 1) ? 2 : 1;
			
			//CHANGEMENT DE JETON
			$_SESSION['jeton'] = (intval($_SESSION['joueur']) == 1) ? "X" : "O";
		}
	}

	//AFFICHAGE TABLEAU
	echo '<table border="1">'.PHP_EOL;
	echo '<caption>Joueur '.$_SESSION['joueur'].'</caption>'.PHP_EOL;
	foreach ($_SESSION['grille'] AS $numLigne => $ligne) {
		echo '<tr>'.PHP_EOL;
		foreach ($ligne AS $numCase => $case) {
			echo '<td width="30" height="30" align="center" valign="center">';
			if ($case != "X/O") {
				echo $case;
			} else {
				echo '<form name="case_'.$numLigne.'_'.$numCase.'" action="" method="post">';
				echo '<input type="submit" name="'.$numLigne.'_'.$numCase.'" value="'.$case.'"/>';
				echo '</form>';
			}	
			echo '</td>'.PHP_EOL;
		}
		echo '</tr>'.PHP_EOL;
	}
	
	echo '<tr>'.PHP_EOL;
	echo '<td colspan="'._TAILLE_TABLEAU_X_.'">'.PHP_EOL;
	echo '<form action="" method="post">';
	echo '<input type="submit" name="initSession" value="Initialisation"/>';
	echo '</form>';
	echo '</td>'.PHP_EOL;
	echo '</tr>'.PHP_EOL;
	echo '</table>'.PHP_EOL;
?>