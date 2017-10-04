<?php

	function listeCartesEnModification($oConnexion,&$listeCarteEnPReparation) {
		$requete = "SELECT id,nom,nb_cases_x,nb_cases_y FROM carte_edit";
		$oConnexion->prepareRequete($requete);
		if (!$oConnexion -> executeRequete()) {
            throw new PDOException("S&eacute;lection impossible");
        } else {
        	$data = $oConnexion -> getTableauResultat();
        	foreach ($data AS $carte) {
        		$listeCarteEnPReparation[] = $carte;
        	}
		}
	}
	
// 	function listeImages($repertoire,&$listeImages) {
// 		$listeExtensions = array('jpg','jpeg','gif','png');
// 		$ressource = opendir($repertoire) or die('Erreur de listage : le r&eacute;pertoire "'.$repertoire.'" n\'existe pas');
// 		while($element = readdir($ressource)) {
// 			/* Surtout ne pas supprimer le repertoire d'upload */
// 			if($element != '.' && $element != '..' && $element != 'miniature') {
// 				if (is_dir($repertoire.'/'.$element)) {
// 					listeImages($repertoire.'/'.$element,$listeImages);
// 				} else {
// 					/* Si c'est une image */
// 					$elements = explode(".",$element);
// 					if (in_array(strtolower($elements[1]),$listeExtensions)) {
// 						$listeImages[] = array('chemin' => $repertoire.'/'.$element, 'nom' => $element);
// 					}
// 				}
// 			}
// 		}	
// 		closedir($ressource);
// 		return $listeImages;
// 	}
	
	function listeMiniatures($repertoire,&$listeImages) {
		$listeExtensions = array('jpg','jpeg','gif','png');
		$ressource = opendir($repertoire) or die('Erreur de listage : le r&eacute;pertoire "'.$repertoire.'" n\'existe pas');
		while($element = readdir($ressource)) {
			if($element != '.' && $element != '..') {				
				if (is_dir($repertoire.'/'.$element)) {
					listeMiniatures($repertoire.'/'.$element,$listeImages);
				} else {
					
					/* Si c'est une image */
					$elements = explode(".",$element);
					if (in_array(strtolower($elements[1]),$listeExtensions)) {
						$datas = explode(".",$element);
						$listeImages[] = array(	'chemin' => $repertoire.$element,
												'nom' => str_replace("_"," ",$element),
												'id' => $datas[0]);
					}
				}
			}
		}	
		closedir($ressource);
		return $listeImages;
	}
	
	/**
	 * Fonction permettant de faire pivoter une image d'un angle donne
	 */
	function rotate($cheminVersImageOriginale,$angleDeRotation) {
		$data = explode(".",$cheminVersImageOriginale);
		$extension = $data[1];
		if ($angleDeRotation < 0) {
			$angleDeRotation = 360 + $angleDeRotation;
		}
		if ($extension == 'jpg') {
			$extension = 'jpeg';
		}
		$fonction = 'imagecreatefrom'.$extension;
		$source = $fonction($cheminVersImageOriginale) or die('Error opening file '.$cheminVersImageOriginale);
	    imagealphablending($source, false);
	    imagesavealpha($source, true);
	    
	    $imageTraitee = imagerotate($source, $angleDeRotation, imageColorAllocateAlpha($source, 0, 0, 0, 127));
	    imagealphablending($imageTraitee, false);
	    imagesavealpha($imageTraitee, true);
	    
	    header('Content-type: image/'.$extension);
	    $fonction = 'image'.$extension;
	    if (is_file(_IMGS_TEMP_.$extension)) {
	    	unlink(_IMGS_TEMP_.$extension);
	    }
	    /* Sauvegarde de l'image dans le temporaire */
		$fonction($imageTraitee,_IMGS_TEMP_.$extension,100);
		imagedestroy($source);
		imagedestroy($imageTraitee);
		return str_replace (_DIR_BASE_ , _URL_BASE_ ,_IMGS_TEMP_.$extension);
	}
	
	function creeMiniature($cheminVersSource,$largeur,$hauteur) {
		$nomImage = basename($cheminVersSource);
		$data = explode(".",$nomImage);
		$extension = $data[1];		
		if ($extension == 'jpg') {
			$extension = 'jpeg';
		}
		// Definition du chemin de la miniature
		$cheminVersMiniature = _DIR_MINIATURES_.$nomImage;
		
		// si l'image qu'on lit est déjà une miniature
		// on applique pas la fonction
		if (is_file($cheminVersMiniature)) {
		        return false;
		} else {
	        // Cacul des nouvelles dimensions proportionnelles
	        list($width_src, $height_src) = getimagesize($cheminVersSource);
	        /* Pöur les images inferieure a la taille des miniature, on ne touche pas aux dimensions */
			if ($width_src > $largeur || $height_src > $hauteur) {
				if ($largeur && ($width_src < $height_src)) {
		           $largeur = ($hauteur / $height_src) * $width_src;
		        } else {
		           $hauteur = ($largeur / $width_src) * $height_src;
		        }
			} else {
				$largeur = $width_src;
				$hauteur = $height_src;
			}
	       
	        // créé une image vide
	        $im = ImageCreateTrueColor ($largeur, $hauteur)	or die ("Erreur pour cr&eacute;er l'image");
	       
	        // lit l'image source
	        $fonction = 'imagecreatefrom'.$extension;
	        $source = $fonction($cheminVersSource);
	       
	        // on créé un cadre autour de la miniature
	        $blanc = ImageColorAllocate ($im, 255, 255, 255);
	        $gris[0] = ImageColorAllocate ($im, 69, 69, 69);
	        $gris[1] = ImageColorAllocate ($im, 82, 82, 82);
	        $gris[2] = ImageColorAllocate ($im, 97, 97, 97);
	        $gris[3] = ImageColorAllocate ($im, 107, 107, 107);
	        $gris[4] = ImageColorAllocate ($im, 120, 120, 120);
	        $gris[5] = ImageColorAllocate ($im, 134, 134, 134);
	        $gris[6] = ImageColorAllocate ($im, 145, 145, 145);
	
	        for ($i=0; $i<7; $i++) {
	               ImageFilledRectangle($im, $i, $i, $largeur-$i, $hauteur-$i, $gris[$i]);
	        }
	       
	        // créé la miniature : attention fonction lourde
	        ImageCopyResampled(	$im, $source, 8, 8, 0, 0, $largeur-(2*8), $hauteur-(2*8), $width_src, $height_src);
	        // ajoute une chaine d'info sur l'image
	        ImageString($im, 0, 12, $hauteur-18, "$nomImage - ($width_src x $height_src)", $blanc);
	       
	        // sauvegarde du résultat
	        $fonction = 'image'.$extension;
	        $fonction($im, $cheminVersMiniature);
	    }			
		return $cheminVersMiniature;
	}
	
	function supprimeMiniature($cheminVersMiniature) {
		return unlink($cheminVersMiniature);
	}
	
	/**
	 * Permet d'ajouter des cases a une carte existante
	 * @param idCarte	l'identifiant de la carte en edition
	 * @param xDebut	la valeur de X de depart de la plage
	 * @param xFin		la valeur de X de fin de la plage
	 * @param yDebut	la valeur de Y de depart de la plage
	 * @param yFin		la valeur de Y de fin de la plage
	 */
	function ajouteCaseCarte(&$requete,$idCarte,$xDebut,$xFin,$yDebut,$yFin) {
		for ($x = $xDebut; $x <= $xFin; $x++) {
			for ($y = $yDebut; $y <= $yFin; $y++) {
				$requete .= "(".$idCarte.",".$x.",".$y.")";
				if ($x <= $xFin && $y <= $yFin) {
					$requete .= ",";
				}
			}
		}
		$requete = substr($requete,0,-1);
	}
	
	function supprimeCaseCarte($idCarte,$xDebut,$xFin,$yDebut,$yFin) {
		
	}
	
	/**
	  * Fonction permettant de creer un plateau de jeu vide pour la carte donnee.
	  * @param string nomCarte	le nom de la carte => du plateau de jeu
	  * @param int largeur		la largeur en pixels
	  * @param int hauteur		la hauteur en pixels
	  */
	 function creePlateauCarte($nomCarte,$largeur,$hauteur) {	 	
	 	/* L'image */
	 	$im = ImageCreateTrueColor($largeur, $hauteur)	or die ("Erreur pour cr&eacute;er l'image");
	 	
	 	/* La couleur de fond*/
	 	ImageColorAllocate ($im, 255, 0, 0);
	 	
	 	/* L'enregistrement */ 
	 	imagejpeg($im, _DIR_IMGS_CARTES_.$nomCarte.'.jpg');
	 }
	 
	 /**
	  * Fonction qui permettra de modifier une image de plateau de jeu (+/-)
	  * appelee lors de la modification de la taille de la carte.
	  * @param string cheminVersImagePlateauAModifier
	  * @param int nouvelleLargeur nouvelle largeur en pixels
	  * @param int nouvelleHauteur nouvelle hauteur en pixels
	  */
	 function redimensionnePlateauDeJeu($cheminVersImagePlateauAModifier,$nouvelleLargeur,$nouvelleHauteur) {
	 	/* Dimensions actuelles */
	 	list($largeurImageSource,$hauteurImageSource) = getimagesize($cheminVersImagePlateauAModifier);
	 	/* Divers tests */
	 	if ((($largeurImageSource < $nouvelleLargeur) && ($hauteurImageSource < $nouvelleHauteur)) ||
	 		($largeurImageSource < $nouvelleLargeur) ||
	 		($hauteurImageSource < $nouvelleHauteur)){
	 		debug("/!\\ Futures dimensions plus petites au celles actuelle /!\\");
	 	}
	 	/* L'image vide de destination */
	 	$destination = ImageCreateTrueColor($nouvelleLargeur, $nouvelleHauteur)	or die ("Erreur pour cr&eacute;er l'image");
	 	
	 	/* La couleur de fond*/
	 	ImageColorAllocate ($destination, 0, 0, 0);
	 	
	 	/* lecture de l'image a redimensionner */
        $source = imagecreatefromjpeg($cheminVersImagePlateauAModifier);
        
 		imagecopymerge(	$destination,				//image de destination
 						$source,					//image source (a integrer dans la destination)
 						0,							//X coin sup gauche 
 						0,							//Y coin sup gauche
 						0,							//X depart dans la source
 						0,							//Y depart dans la source
 						$largeurImageSource,		//largeur de la source
 						$hauteurImageSource,		//hauteur de la source
 						100);						// taux <=> transparence
        
	 	/* L'enregistrement */ 
	 	imagejpeg($destination, $cheminVersImagePlateauAModifier);
	 }
	 
	 /**
	  * Cette fonction modifiera la carte a partir de la base de donnees.
	  */
	 function modifiePlateauCarte() {
	 	
	 }
?>