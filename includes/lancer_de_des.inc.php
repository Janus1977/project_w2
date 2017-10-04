<?php
	/**
	 * Script rassemblant tous les lancer de dés du jeu
	 */
	 
	 function lanceLesDes($type,$nombre=1) {
	 	$lancer = array();
	 	$compteur = 0;
	 	
	 	if (is_file('./des_specifiques.inc.php')) {
	 		require_once('./des_specifiques.inc.php');	 		
	 	}
	 	
	 	do {
	 		if (is_numeric($type)) {
		 		$lancer[$compteur] = mt_rand(1,$type);
	 		} else {	 
				$lancer[$compteur] = ${'de'.ucfirst($type)}[(mt_rand(1,6) - 1)];
	 		}
		 	$compteur += 1;
	 	} while ($compteur < $nombre);
	 	return $lancer;
	 }
	 
	 function lanceLesDes_2(array $listeOrdres,$array=false) {
		/** le D de dispersion oriente letir d'artillerie ou d'arme lourde à obus */
		$deDispersion = array('E','NE','N','NO','O','SO','S','SE');
		
		/** Le D rouge du jeu de plateau Space Crusade */
		$deRouge = array(3,2,1,0,0,0);
		
		/** Le D blanc du jeu de plateau Space Crusade */
		$deBlanc = array(2,1,0,0,0,0);
	 	
		if (!$array) {
			$resultat = 0;
		}
		
		$jetMaxDes = 0;
	 	foreach ($listeOrdres AS $ordre) {
			// Recherche du signe + ou -
			if (strpos($ordre,'+') !== false) {
				// Addition d'un modificateur
				$aOrdres = explode('+',$ordre);
				$ajout = true;
			} else if (strpos($ordre,'-') !== false) {
				// Soustraction d'un modificateur
				$aOrdres = explode('-',$ordre);
				$ajout = false;
			} else {
				$aOrdres = array($ordre);
			}
			
			if (isset($aOrdres[1]) && strpos(strtolower($aOrdres[1]),'d') !== false) {
				// Si le modificateur est un lance de de, il faut le faire
				$aOrdres[1] = lanceDes2(array($aOrdres[1]));				
			}

 			// A ce moment, nous avons un array:
 			// 		aOrdres(0=>'XdY',1=>z)
 			// Il faut alors savoir combien de dé et de quel type
 			$aNombreType = explode('d',strtolower(trim($aOrdres[0])));
 			 //Le lance du(des) dé(s)
 			 $cpt = 0;
 			 $valeurLancer = 0;
 			 do {
 			 	if (is_numeric($aNombreType[1])) {
 			 		$valeurLancer += mt_rand(1,$aNombreType[1]);
 			 		$jetMaxDes += $aNombreType[1];
 			 	} else {
 			 		if (strtolower($aNombreType[1]) == 'b') {
 			 			$valeurLancer += $deBlanc[mt_rand(0,(sizeof($deBlanc) - 1))];
 			 			$jetMaxDes += max($deBlanc);
 			 		} else if (strtolower($aNombreType[1]) == 'r') {
 			 			$valeurLancer += $deRouge[mt_rand(0,(sizeof($deRouge) - 1))];
 			 			$jetMaxDes += max($deRouge);
 			 		} else if (preg_match('/orient/i',strtolower($aNombreType[1]))) {
 			 			// Prend la derniere valeur du lancer, si quelqu'un fait XDorient, 
 			 			// il n'aura le resultat que du dernier jet
 			 			$valeurLancer = $deDispersion[mt_rand(0,(sizeof($deDispersion) - 1))];
 			 		}
 			 	} 			 	
 			 	$cpt += 1;
 			 } while ($cpt < $aNombreType[0]);
 			 
			//Ajout du modificateur
 			if (is_numeric($valeurLancer) &&isset($ajout) && $ajout === true) {	 				
				$valeurLancer += ((sizeof($aOrdres) == 2) ? intval($aOrdres[1]) : 0);
 				$jetMaxDes += intval($aOrdres[1]);
			} else if (is_numeric($valeurLancer) &&isset($ajout) && $ajout === false) {
				$valeurLancer -= ((sizeof($aOrdres) == 2) ? intval($aOrdres[1]) : 0);
		 		$jetMaxDes -= intval($aOrdres[1]);
 			}

 			if (is_numeric($valeurLancer) && $valeurLancer < 0) {
 				$valeurLancer = 0;
 			}
 			
// 			$texte = '<br/>Lancer de <i>'.$ordre.'</i>:&nbsp;'.$valeurLancer;
//			if (is_numeric($aNombreType[1])) {
//				$texte .= ' /'.($aNombreType[0] * $aNombreType[1]);
//			}
//			$texte .= PHP_EOL;
			
 			if ($array) {
 				/* Il faut retourner autant de valeur que de des lances */
 				if (is_numeric($aNombreType[1])) {
// 					$valeurLancer .= ' / '.($aNombreType[0] * $aNombreType[1]);
					$valeurLancer .= ' sur '.$jetMaxDes;
				}
 				$resultat[$ordre] = $valeurLancer;
 			} else {
 				/* Il faut retourner la somme des lancers de des */
//  				$jetMaxDes += ($aNombreType[0] * $aNombreType[1]);
//  				if (isset($ajout)) {
// 					if (isset($ajout)) {
// 						if ($ajout === true) {
//  							$jetMaxDes += intval($aOrdres[1]);
// 		 				} else {
// 		 					$jetMaxDes -= intval($aOrdres[1]);
// 		 				}
// 					}
//  				}
 				$resultat += $valeurLancer;
 			}
 		}
 		if (is_numeric($aNombreType[1]) && !$array) {
			$resultat .= ' sur '.$jetMaxDes;
		}
 		return $resultat;
	 }	 
?>